<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\AgentPanel;
use App\Models\AgentUser;
use App\Models\AgentCommission;
use App\Models\User;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Order;
use App\Models\SiteSetting;
use App\Models\AgentPaymentStatement;
use Auth;
use Illuminate\Http\Request;
use App\Models\CustomerAddress;
use App\Models\PostCode;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;



class AgentPanelController extends Controller
{
    ///////////////////////////////////////// agent user data get start//////////////////////////////////////////////////////////////////
    /*
    AgentUserDataGet used for activities - 1. 2. 3.
     at 1. page-1, 2. page-cdv

    */

    /*
    AgentUserDataGet
        $role       : Long Integer
        $user_id    : Long Integer

        Return :
            HTTP:Response
                message text
                code 200, 400, 403
    */

    public function AgentUserDataGet($role, $user_id)
    {
        $user = User::where('id', $user_id)->first();
        return response([
            'user' => $user,
        ]);
    }

    ///////////////////////////////////////// agent user data get end//////////////////////////////////////////////////////////////////


    // =============    ==    ================ new shopping start ===============================

    // start shopping
    public function startShoppingAgent(Request $request)
    {

        $all_product_show = Product::where('status', 1)->paginate(20);
        if ($request->ajax()) {
            return $all_product_show;
        }
        return view('frontend.agent_panel.start_shopping', compact('all_product_show'));
    } // end


    // ==========          =================     ==    === end new shopping  ================================


    // for generate random number
    function generateRandomString($length = 6)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }



    public function view()
    {
        return view('backend.agent_panel.view');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|max:255',
            'company_name' => 'required',
            'email' => 'email',
            'phone' => 'required|regex:/(^[-0-9A-Za-z\/ ]+$)/|min:11|max:14',
            'phone2' => 'required|regex:/(^[-0-9A-Za-z\/ ]+$)/|min:11|max:14',
            'address' => 'required',
        ]);

        $shopOwners = new AgentPanel();

        $shopOwners->shop_agent_id_code = '#' . $this->generateRandomString();
        $shopOwners->name = $request->name;
        $shopOwners->company_name = $request->company_name;
        $shopOwners->email = $request->email;
        $shopOwners->phone = $request->phone;
        $shopOwners->phone2 = $request->phone2;
        $shopOwners->shop_agent_address = $request->address;
        $shopOwners->shop_agent_status = '1';
        $shopOwners->commission_given = $request->commission_given;

        $shopOwners->save();
        $notification = array(
            'message' =>  'Shop Owner Add Sucessyfuly',
            'alert-type' => 'success'
        );

        return response([
            'shopOwner' => $shopOwners,
            'message' => $notification
        ]);
    }

    public function getAll()
    {
        $shopOwners = AgentPanel::all();
        return response($shopOwners);
    }

    public function destroy($role, Request $request, $id)
    {
        $shopOwner = AgentPanel::find($id);
        $shopOwner->delete();

        return response(true);
    }

    public function edit($role, $id)
    {
        $shopOwner = AgentPanel::findOrFail($id);
        return response($shopOwner);
    }

    public function update($role, Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|min:6|max:255',
            'company_name' => 'required',
            'email' => 'email',
            'phone' => 'required|regex:/(^[-0-9A-Za-z\/ ]+$)/|min:11|max:11',
            'phone2' => 'required|regex:/(^[-0-9A-Za-z\/ ]+$)/|min:11|max:11',
            'address' => 'required',
        ]);

        $shopOwner = AgentPanel::find($request->edit_id);

        $shopOwner->name = $request->name;
        $shopOwner->company_name = $request->company_name;
        $shopOwner->email = $request->email;
        $shopOwner->phone = $request->phone;
        $shopOwner->phone2 = $request->phone2;
        $shopOwner->shop_agent_address = $request->address;
        $shopOwner->commission_given = $request->commission_given;

        $shopOwner->save();

        return response(true);
    }

    public function dashboard()
    {
        

        $agent = Auth::guard('admin')->user()->agent_id;
        $customers = User::where('agent_id', $agent)->count();
        $totalsellamount = Order::where('agent_id', $agent)->select('amount')->sum('amount');
        $totalcommission = AgentCommission::where('agent_id', $agent)->select('commission_amount')->sum('commission_amount');
        $withdrawalamount = AgentPaymentStatement::where('agent_id', $agent)->select('total_withdrawal_amount')->latest()->first();
        return view('backend.agent_panel.dashboard', compact('customers', 'totalsellamount', 'totalcommission', 'withdrawalamount'));
    }

    public function addCustomer()
    {

        return view('backend.agent_panel.add_customer');
    }

    public function storeCustomer($role, Request $request)
    {


        // Mobile Number valadation
        $request->validate([
            'name' => 'required|min:6|max:255',
            'mobile' => 'required|unique:users|min:11|max:14',
            'email' => 'requir ed|unique:users',
        ]);

        $supplier_code = User::count();
        $user = new User();
        if ($supplier_code < 10) {
            $user->customer_id = '#000000' . $supplier_code;
        } elseif ($supplier_code <= 100) {
            $user->customer_id = '#00000' . $supplier_code;
        } elseif ($supplier_code <= 1000) {
            $user->customer_id = '#0000' . $supplier_code;
        } elseif ($supplier_code <= 10000) {
            $user->customer_id = '#000' . $supplier_code;
        } elseif ($supplier_code <= 100000) {
            $user->customer_id = '#00' . $supplier_code;
        } else {
            $user->customer_id = '#0' . $supplier_code;
        }

        $user->agent_id = Auth::user()->agent_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->mobile;
        $user->mobile = $request->mobile;
        $user->save();
        return redirect()->route('role.agent_panel.view_customer', config('fortify.guard'))->with('message', 'Customer added Successfully');
    }

    public function ViewCustomer()
    {
        $agent = Auth::user()->agent_id;
        $customers = User::where('agent_id', $agent)->get();
        return view('backend.agent_panel.view_customer', compact('customers'));
    }



    public function orderHistory()
    {
        $agent = Auth::user()->agent_id;
        $customerOrderHistoryGet = User::with('customerOrderHistory', 'agentcommission')->withCount('customerOrderHistory')->where('agent_id', $agent)->get();

        return view('backend.agent_panel.agent_all_order_history', compact('customerOrderHistoryGet'));
    }



    // pos view
    public function OrderPosView($role, $id)
    {

        $data = OrderItem::where('order_id', $id)->with('product', 'order')->first();
        return response()->json(array(
            'data' => $data
        ));
    }




    public function singleHistoryOrder($role, $id)
    {
        $customerOrder = Order::where('user_id', $id)->get();
        $customerSingleOrderHistoryGet = OrderItem::where('order_id', $id)->with('product', 'order')->get();

        return view('backend.agent_panel.agent_single_order_history', compact('customerSingleOrderHistoryGet', 'customerOrder'));
    }



    // for memo view
    public function singleOrderHistoryAjax2($role, $order_id)
    {
        $order = Order::with('division', 'district', 'state', 'user', 'postCodes')->where('id', $order_id)->first();

        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        $bppshops = SiteSetting::all();
        return view('backend.order_panel.customer_invoice', compact('orderItem', 'bppshops', 'order'));
        //          $data = Order::with('division','district','state','user','postCodes','orderItems.product')->find($id);
        //  return response()->json($data);
    } // end mathod



    /// order information View
    public function singleOrderHistoryAjas($role, $id)
    {
        $data = OrderItem::where('order_id', $id)->with('product', 'order')->first();
        return response()->json(array(
            'data' => $data
        ));
        return view('backend.agent _panel.agent_single_order_history');
    } // end mathod



    public function singleOrderHistory($role, $id)
    {
        $customerOrder = Order::where('user_id', $id)->get();
        $customerSingleOrderHistoryGet = OrderItem::whereIn('order_id', $id)->with('product', 'order')->get();
        return view('backend.agent_panel.agent_single_order_history', compact('customerSingleOrderHistoryGet'));
    }




    public function myCommision()
    {
        $orders = Order::get();
        $agent = Auth::guard('admin')->user()->agent_id;
        $agent_data = User::with('agentData', 'customerOrderHistory')->where('agent_id', $agent)->first();
        $agentOrderHistoryGet = User::with('customerOrderHistory', 'customerOrderHistory.orderItems')->where('agent_id', $agent)->get();
        $paymentstatementget = AgentPaymentStatement::where('agent_id', $agent)->with('agentcommission')->withSum('agentcommission', 'commission_amount')->get();



        return view('backend.agent_panel.my_commission', compact('agent_data', 'agentOrderHistoryGet', 'orders', 'paymentstatementget'));
    }


    public function searchProductWithAjax($value)
    {
        $product = Product::select('id', 'product_thambnail', 'product_name', 'unit', 'discount_price     ', 'selling_price', 'product_qty')
            ->where('status', 1)
            ->where('product_name', 'LIKE', "%$value%")
            ->orWhere('product_code', 'LIKE', "%$value%")
            ->get();
        return response()->json(['product' => $product]);
    }


    // for order details
    public function OrderDetails($role, $id)
    {

        $orderdetails = Order::where('user_id', $id)->get();


        return view('backend.agent_panel.customer_order_details', compact('orderdetails'));
    }
    //////////////////////////
    ////////////////////////////////////////////////////////// for pos new///////////////////////////////////////////////////////////////////////////////////
    // for district data show
    public function AgentStateGetAjax($role, $district_id)
    {
        // state selected


        $ship = PostCode::where('district_id', $district_id)->get();
        return response($ship);
    }
    public function AgentCheckoutStore(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'street_address' => 'required',
            'district_id' => 'required',
            'thana_id' => 'required',
            'name' => 'required',
            'phone_no' => 'required|max:14|regex:/(01)[0-9]{9}/',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {

            $customerAddress = CustomerAddress::where('user_id', Auth::user()->id)->update(['status' => 0,]);
            $address = new CustomerAddress();
            $address->agent_id = Auth::guard('admin')->user()->id;
            $address->user_id = $request->user_id;
            $address->street_address = $request->street_address;
            $address->district_id = $request->district_id;
            $address->thana_id = $request->thana_id;
            $address->name = $request->name;
            $address->phone_no = $request->phone_no;
            $address->floor_no = $request->floor_no;
            $address->appartment_no = $request->appartment_no;
            $address->status = 1;
            $address->save();

            return response([
                'status' => 200,
                'message' => 'Address Stored Successfully',
                'address' => $address
            ]);
        }
    }
    // ///////////////////////for deleting customer address///////////////////////////
    public function AgentCheckoutInfoDelete(Request $request)
    {
        $customerAddress = CustomerAddress::find($request->id)->first();

        $customerAddress->delete();
        return response($customerAddress);
    }

    //////////////////////////////// for confirming order////////////////////////////////////////////////////////////
    public function AgentOrderConfirm(Request $request)
    {


        $agent = Auth::guard('admin')->user()->agent_id;

        // $customer = User::findorfail($request->customerId);
        $invoice_no = 'POS' . mt_rand(10000000, 99999999);
        $order_id = Order::insertGetId([
            'user_id' => $request->user_id,
            'totalitem' => $request->totalitem,
            'totalAmount' => 0,
            'totalDiscount' => 0,
            'spesial_discount' => 0,
            'vat' => 0,
            'cash_grand_tot' => 0,
            'cashPaid_show' => 0,
            'changeAmount' => 0,
            'street_address' => $request->street_address,
            'floor_no' => $request->floor_no,
            'appartment_no' => $request->appartment_no,
            'delivery_charge' => $request->delivery_charge,

            'post_code' => "Cash On Delivery",
            'payment_type' => "Cash On Delivery",
            'currency' => "taka",
            'amount' => $request->amount,
            'invoice_no' => $invoice_no,
            'order_date' => Carbon::now(),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'Pending',
            'agent_id' => $agent,
            'created_at' => Carbon::now(),
        ]);


        // laboni ====================
        $orderdata = Order::where('id', $order_id)->first();
        // for agent commission start
        $agent_panel = AgentPanel::where('id', $orderdata->agent_id)->first();
        $commissionamount = floatval(($orderdata->amount * $agent_panel->commission_given) / 100);
        if ($orderdata->agent_id != null) {
            AgentCommission::insert([
                'order_user_id' => $orderdata->user_id,
                'agent_id' => $orderdata->agent_id,
                'order_id' => $orderdata->id,
                'total_sale_amount' => $orderdata->amount,
                'commission_rate' => $agent_panel->commission_given,
                'commission_amount' => $commissionamount,
                'created_at' => Carbon::now(),
            ]);
        }
        // end laboni =====================



        $pos = DB::table('pos')->get();
        foreach ($pos as $item) {
            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $item->pro_id,
                'qty' => $item->pro_quantity,
                'price' => $item->product_price,
                'created_at' => Carbon::now(),
            ]);
        }
        $product = OrderItem::where('order_id', $order_id)->get();
        foreach ($product as $item) {
            Product::where('id', $item->product_id)
                ->update(['product_qty' => DB::raw('product_qty-' . $item->qty)]);
        }


        // send otp start
        $user = User::where('id', $orderdata->user_id)->first();
        $number = ltrim($user->mobile, "+88");

        // $mobile_no=
        $order = Order::with('orderItems', 'orderItems.product', 'division', 'district', 'state')->where('id', $orderdata->id)->first();
        $url = "http://66.45.237.70/api.php";

        $text = "Your BppShops Order " . $orderdata->invoice_no . " Has been successful Help Line :09678822444";
        $data = array(
            'username' => "ShahidMahmum",
            'password' => "Shahid26@.",
            'number' => "$number",
            'message' => "$text"
        );

        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);
        $p = explode("|", $smsresult);
        $sendstatus = $p[0];
        // send otp end

        return response()->json(['message' => 'Order Placed Successfully', $pos]);
    }






    /////////////////////////////////////////////// agent pos customer address store /////////////////////////////////////////////
    public function AgentCustomerStore($role, Request $request)
    {


        // Mobile Number valadation
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:6|max:255',
            'mobile' => 'required|unique:users|min:11|max:14',
            'email' => 'required|unique:users',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {

            $supplier_code = User::count();
            $user = new User();
            if ($supplier_code < 10) {
                $user->customer_id = '#000000' . $supplier_code;
            } elseif ($supplier_code <= 100) {
                $user->customer_id = '#00000' . $supplier_code;
            } elseif ($supplier_code <= 1000) {
                $user->customer_id = '#0000' . $supplier_code;
            } elseif ($supplier_code <= 10000) {
                $user->customer_id = '#000' . $supplier_code;
            } elseif ($supplier_code <= 100000) {
                $user->customer_id = '#00' . $supplier_code;
            } else {
                $user->customer_id = '#0' . $supplier_code;
            }

            $user->agent_id = Auth::user()->agent_id;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->phone = $request->mobile;
            $user->mobile = $request->mobile;
            $user->save();
            return response()->json([
                'message' => 'Customer Added Successfully',
            ]);
        }
    }

    /////////////////////////////////////////////// agent pos customer address store end/////////////////////////////////////////////


}
