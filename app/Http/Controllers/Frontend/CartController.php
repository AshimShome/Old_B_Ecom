<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Wishlist;
use App\Models\Coupon;
use App\Models\CustomerAddress;
use App\Models\Order;
use App\Models\User;

use App\Models\AgentPanel;
use App\Models\AgentCommission;

use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Upazila;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Validator;

class CartController extends Controller
{

    public function CheckoutInfo(){
        $address = CustomerAddress::where('user_id',Auth::user()->id)->where('status',1)->with('district','postCodes')->first();
        return response($address);
    }

    public function CheckoutInfoAll(){
        $address = CustomerAddress::where('user_id',Auth::user()->id)->with('district','postCodes')->orderBy('id','DESC')->get();
        return response($address);
    }

    public function CheckoutInfoSelect($id){
        $customerAddress = CustomerAddress::where('user_id', Auth::user()->id)->update(['status' => 0,]);
        $customerAddress = CustomerAddress::where('id', $id)->update([
                'status' => 1,
            ]);
        return response($customerAddress);
    }

    public function CheckoutInfoDelete(Request $request){
        $customerAddress = CustomerAddress::find($request->id)->first();
        $customerAddress->delete();
        return response($customerAddress);
    }
    public function CheckoutProcess(Request $request){
            $request->validate([
                'deliveryDate' => 'required',
                'deliveryTime'=>'required',
                

            ]);
            $total_amount_with_vat = 0;
            $carts = Cart::content();
             foreach ($carts as $cart) {
                $total_amount_with_vat = $total_amount_with_vat + (($cart->price +$cart->options->vat) * $cart->qty);
            }

            $total_amount = $total_amount_with_vat;
            $customerAddress = CustomerAddress::where('user_id',Auth::user()->id)->where('status',1)->first();
                
             if($customerAddress == NULL){
                return back()->with('addressMessage','Address is required');
            } 
           
            $delivery_charge = District::select('delivery_charge')->where('id', $customerAddress->district_id)->first();
            

            $delivery = new Order();
            $delivery->user_id = Auth::user()->id;
            $delivery->name = $customerAddress->name;
            $delivery->district_id = $customerAddress->district_id;
            $delivery->state_id = $customerAddress->thana_id;
            $delivery->street_address = $customerAddress->street_address;
            $delivery->floor_no = $customerAddress->floor_no;
            $delivery->appartment_no = $customerAddress->appartment_no;
            $delivery->payment_method = 'Cash On Delivery';
            $delivery->amount = $total_amount;
            $delivery->delivery_date = $request->deliveryDate;
            $delivery->delivery_time = $request->deliveryTime;
            $delivery->delivery_charge = $delivery_charge['delivery_charge'];
            
            
            $delivery->invoice_no = mt_rand(10000000,99999999);
            $delivery->order_date = Carbon::now();
            $delivery->order_month = Carbon::now()->format('F');
            $delivery->order_year = Carbon::now()->format('Y');
            $delivery->status = 'Pending';
            $delivery->save();
            
           
           
// ================================= laboni ====================
           $orderdata=Order::where('id',$delivery->id)->first();
        
        // for user
        $users = User::where('id',$delivery->user_id)->first();
        
        // for agent commission start
        $agent_panel=AgentPanel::where('id',$users->agent_id)->first();
        
         
         
        if($users->agent_id !=null)
        {
            $commissionamount=floatval(($orderdata->amount * $agent_panel->commission_given)/100);
            
          $commission_for_agent =  AgentCommission::insert([
                'order_user_id' => $orderdata->user_id,
                'agent_id' => $users->agent_id,
                'order_id' => $orderdata->id,
                'total_sale_amount' => $orderdata->amount,
                'commission_rate' => $agent_panel->commission_given,
                'commission_amount' => $commissionamount,
                'created_at' => Carbon::now(),
            ]);
            
        }
        //   dd($commission_for_agent);
     
 // =========================== end laboni =====================
           
           
           

            foreach ($carts as $cart) {
                OrderItem::insert([
                    'order_id' => $delivery->id,
                    'product_id' => $cart->id,
                    'color' => $cart->options->color,
                    'size' => $cart->options->size,
                    'qty' => $cart->qty,
                    'price' => (($cart->price) *$cart->qty),
                    'created_at' => Carbon::now(),
                ]);
            }

            $order = Order::with('orderItems','orderItems.product','division','district','state')->where('id',$delivery->id)->first();
              $url = "http://66.45.237.70/api.php";
                $number= Auth::User()->mobile;
                $text="Your BppShops Order ".$delivery->invoice_no ." Has been successful Help Line :09678822444";
                $data= array(
                'username'=>"ShahidMahmum",
                'password'=>"Shahid26@.",
                'number'=>"$number",
                'message'=>"$text"
                );
        
                $ch = curl_init(); // Initialize cURL
                curl_setopt($ch, CURLOPT_URL,$url);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $smsresult = curl_exec($ch);
                $p = explode("|",$smsresult);
                $sendstatus = $p[0];

                event(new \App\Events\MyEvent("Ok Ashim"));

             //Start Send Emails
            Mail::to(Auth::user()->email)->send(new OrderMail($order));
            // remove auto cart
            Session::forget('cart');

            $notification = array(
                'message' => 'Your order has been placed',
                'alert-type' => 'success'
            );
            return redirect()->route('change.payment',$delivery->id)->with($notification);
            
    }

    // add to cart post
    public function AddToCart(Request $request, $id){
        // reomove old data add to cart
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        $product = Product::findOrfail($id);
        $cartItem = Cart::content();
        Cart::search(function($cartItem, $rowId) {
            return $cartItem->id == 1;
        });
        
        if($product){
        // product discount
            if ($product->discount_price == 0) {
                Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                            'image' => $product->product_thambnail,
                            'color' => $request->color,
                            'size' => $request->size,
                            'vat' => (float) $product->selling_price * ((float) $product->vat / 100 )
                        ],
                ]);
                return response()->json(['success' => 'Successfully Added on Your Cart']);

            }else{
                Cart::add([

                    'id' => $id,
                    'name' => $request->product_name,
                    'qty' => $request->quantity,
                    'price' => $product->discount_price,
                    'weight' => 1,
                    'options' => [
                        'image' => $product->product_thambnail,
                        'color' => $request->color,
                        'size' => $request->size,
                        'regular_price' => $product->selling_price,
                        'vat' => (float) $product->discount_price * ((float) $product->vat / 100 )
                    ],
                    ]);

            return response()->json(['success' => 'Successfully Added on Your Cart']);
            }
        }
    } // end mathod
    // Mini Cart Section
    public function AddMiniCart(){
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => round($cartTotal),

        ));
    } // end method



    /// remove mini cart
    public function RemoveMiniCart($rowId){
        Cart::remove($rowId);
        return response()->json(['success' => 'Product Remove from Cart']);

    } // end mehtod
    // add to wishlist Product mathod
    public function AddToWishlist($product_id){

        if (Auth::check()) {
            $exists = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();
            if (!$exists) {
            Wishlist::insert([
                'user_id' => Auth::id(),
                'product_id' => $product_id,
                'created_at' => Carbon::now(),
            ]);
            return response()->json(['success' => 'Successfully Added On Your Wishlist']);
            }else{
                return response()->json(['error' => 'Product Already Wishlist Add ']);
            }
        }else{
            return response()->json(['error' => 'At First Login Your Account']);
        }
    } // end method
    // apply coupon
    public function CouponApply(Request $request){
                    $coupon = Coupon::where('coupon_name',$request->coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();
                    if ($coupon) {
                            Session::put('coupon',[
                                'coupon_name' => $coupon->coupon_name,
                                'coupon_discount' => $coupon->coupon_discount,
                                'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100),
                                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100)
                            ]);
                            return response()->json(array(
                                'validity' => true,
                                'success' => 'Coupon Applied Successfully'
                            ));
                    }else{
                        return response()->json(['error' => 'Invalid Coupon']);
                    }

    } // end method
  // Coupon Calculation
    public function CouponCalculation(){

        if (Session::has('coupon')) {
            return response()->json(array(
                'subtotal' => Cart::total(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount'],
            ));
        }else{
            $cartTotal = Cart::total();
            return response()->json(array(
                'cartTotal' => round($cartTotal),
            ));

        }
    } // end method
    // Remove Coupon
    public function CouponRemove(){
        Session::forget('coupon');
        return response()->json(['success' => 'Coupon Remove Successfully']);
    }
    public function CheckoutCreate(Request $request){
        if (Auth::check()) {
            if (Cart::total() > 0) {
                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::total();
                //for total amount get
                $total_amount_with_vat = 0;
                $carts = Cart::content();
                foreach ($carts as $cart) {
                    $total_amount_with_vat = $total_amount_with_vat + (($cart->price +$cart->options->vat) * $cart->qty);
                }
                $total_amount = $total_amount_with_vat;
                $district = District::all();
                $address = CustomerAddress::where('user_id',Auth::user()->id)->orderBy('id','DESC')->first();
                $count = 4;
                $dates = [];
                $date = Carbon::now();
                $dates[] = Carbon::now()->format('m/d/Y');
                for ($i = 0; $i < $count; $i++) {
                    $dates[] = $date->addDay()->format('m/d/Y');
                }
                return view('frontend.checkout.checkout_view',compact('carts','cartQty','cartTotal','district','address','dates','total_amount'));

            }else{
                    $notification = array(
                    'message' => 'Shopping At list One Product',
                    'alert-type' => 'error'
                );
                return redirect()->to('/')->with($notification);
            }

        }else{
            
             $request->session()->put('redirectUrlAfterLogin', url()->current());

            $notification = array(
            'message' => 'You Need to Login First',
            'alert-type' => 'error'
        );

        return redirect()->route('login')->with($notification);

        }

    } // end method
} // main end
