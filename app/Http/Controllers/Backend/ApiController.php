<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Coupon;
use App\Models\Banner;
use App\Models\Category;
use App\Models\DealsTime;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\PostCode;
use App\Models\Slider;
use App\Models\User;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\SubCategory;
use App\Models\SubSubCategory;

use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\BannerCatagory;
use Devfaysal\BangladeshGeocode\Models\District;
use App\Models\MultiImg;
use Intervention\Image\Facades\Image;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Auth;
use App\Models\review;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;
use App\Models\CustomerAddress;
use App\Models\SiteSetting;

use App\Providers\ProductServiceProvider as ProductProvider;
use App\Providers\BannerServiceProvider as BannerProvider;
use App\Providers\SliderServiceProvider as SliderProvider;
use App\Providers\CategoryServiceProvider as CategoryProvider;
use App\Providers\reviewServiceProvider as ReviewProvider;
use App\Providers\CarbonServiceProvider as CarbonProvider;
use App\Providers\OrderItemServiceProvider as OrderitemProvider;
use App\Providers\SubcategoryServiceProvider as SubcategoryProvider;
use App\Providers\SubSubcategoryServiceProvider as SubSubcategoryProvider;
use App\Providers\BrandServiceProvider as BrandProvider;
use App\Providers\OrderServiceProvider as OrderProvider;
use App\Providers\BannerCatagoryServiceProvider as BannerCatagoryServiceProvider;
class ApiController extends Controller
{

    //islamic
    // Frontend Index show

     //special_deals
    public function special_deals()
    {

        $special_deals = ProductProvider::getAPISpecialDeals();

        return response()->json([
            'special_deals' => $special_deals
        ]);
    }
    public function special_offers()
    {
        $special_offers = ProductProvider::getAPISpecialoffer();

        return response()->json([
            'special_offers' => $special_offers
            ]);
    }


     //banner
    public function banner1()
    {
          // home page banner-category
          $banner1 = BannerProvider::getAPIbanner1();

          return response()->json([
              'banner1' => $banner1,

          ]);
    }

    public function slider()
    {
        // for slider
        $sliders = SliderProvider::getAPISliderForIslamic();
        // end slider
        return response()->json([
            'slider' => $sliders
            ]);
    }
    public function hot_deals()
    {
         // for  hot_deals
        $hot_deals = ProductProvider::getAPIHotdeals();
        return response()->json([
            'hot_deals'=>$hot_deals
            ]);
    }

    public function products()
    {
         // for product
        $products =ProductProvider:: getAPIProducts();
        return response()->json([
            'products' => $products
            ]);
    }
        public function islamic_ProductView(Request $request)
    {
        // dd($request->all());
        $product = new Product();
        $product->sub_category_id = $request->sub_category_id;
        $product->sub_sub_category_id = $request->sub_sub_category_id;
        $p=$product->sub_category_id;
        $q=$product->sub_sub_category_id;

         if( $p && $q)
        {
            $product = ProductProvider::getAPICategorySubcategory($p,$q);

        }
        elseif($p)
        {
              $product = ProductProvider::getAPISubcategory($p);
        }
        else
        {
            $product = ProductProvider::getAPISubcategory($q);
        }
        return response()->json([
            'products' => $product
            ]);

    }

    public function categories()
    {
        $categories = CategoryProvider::getApiCategoriesForIslamic();
        return response()->json([
            'categories' => $categories
            ]);
    }

//========================= Islamic Most Popular product show start ===========================

    public function most_popular_all()
    {
         $most_popular_all = ProductProvider::getAPImost_popular_all_Forislamic();
         return response()->json([
             'most_popular_all'=> $most_popular_all
             ]);
    }
//========================= Islamic Most Popular product show end ===========================
    public function dailyBestSales()
    {
         $todayDate = CarbonProvider::getApiTodayDateForIslamic();
        $dailyBestSales = OrderitemProvider::getApiDailybestsalesForIslamic();
            return response()->json([
                'dailyBestSales' =>$dailyBestSales
                ]);
    }
    public function deliverdProducts()
    {
          $todayDate = Carbon::now();

        $deliverdProducts =  OrderItem::select('product_id')->groupBy('product_id')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->where('orders.status', 'delivered')
            ->get(['products.*']);
            return response()->json([
                'deliverdProducts' =>$deliverdProducts
                ]);
    }
    public function top_rated()
    {
         $top_rated = ReviewProvider::getApiTopRatedForIslamic();
            return response()->json([
                'top_rated' => $top_rated
                ]);
    }

    public function recently_added()
    {
          $latest_products =ProductProvider::getAPIRecently_addedislamic();
          return response()->json([
              'recently_added' => $latest_products
              ]);
    }

    public function toprated()
    {

       $toprated = reviewProvider::getApiTop_ratedForIslamic();
            return response()->json([
                'toprated' => $toprated
                ]);
    }
    //Islamic trendingProducts
    public function trendingProducts()
    {
            $trendingProducts = OrderItemProvider::getApitrendingProductsForIslamic();
            return response()->json([
                'trendingProducts'=>$trendingProducts
                ]);

    }
      //Review_islamic
    public function previous_reviews(Request $request)
    {
                $a = $request;

            $previous_reviews = ReviewProvider::getApiPrevious_ReviewsForIslamic($a);

            // $previous_reviews = Review::where('product_id',$review->product_id)->get();
            return response()->json([
                'previous_reviews' => $previous_reviews
                ]);
    }


    public function review(Request $request, $id)
    {
        $a = $request;
        $b=$id;

        $notification = ReviewProvider::getApiPost_ReviewsForIslamic($a,$b);
        return response()->json([
           'notification'=> $notification
        ]);

    }
      public function CategoryView()
    {
        $getcategory = CategoryProvider::getApiCategoryViewForIslamic();

        return response()->json([
            'getcategory' => $getcategory

        ]);
    }
      public function sidebar_CategoryView()
    {
        $getcategory=CategoryProvider::getApiSidebarCategoryViewForIslamic();
        return response()->json([
            'getcategory' => $getcategory

        ]);
    }
      public function SubCategoryView($cat_id)
    {


        $getsubcategory = SubcategoryProvider::getApiSubCategoryViewForIslamic($cat_id);
        // $newest = SubCategory::where('category_id', $cat->id)->first();
        return response()->json([
            'getsubcategory' => $getsubcategory,
            // 'getsubcategory1' => $getsubcategory1,

        ]);
    }
    public function sidebar_subcategory()
    {
        $getsubcategory = SubcategoryProvider::getApiSidebarSubCategoryViewForIslamic();
        return response()->json([
            'subcategory' =>$getsubcategory
            ]);
    }
    public function SubSubProduct(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'category_id' => 'required',
            'sub_category_id'=>'required'
            ]);
           if ($validator->fails()) {
            return response([
                'errors' => $validator->messages()
            ]);
        }else{
            $product = new Product();
            $product->sub_category_id = $request->sub_category_id;
            $product->category_id = $request->category_id;
            $sub_category_id=$product->sub_category_id ;
            $category_id= $product->category_id;
            $productUnderSubCategory =ProductProvider::getAPISubSubProduct($sub_category_id,$category_id);
            return response()->json([
                'productUnderSubCategory'=>$productUnderSubCategory
                ]);
        }
    }


    // new test comments

    public function sidebar_SubSubProduct()
    {

        $subsubproducts=SubSubcategoryProvider::getAPIsidebar_SubSubProductislamic();

        return response()->json([
            'subsubproducts' => $subsubproducts,
            // 'productUnderSubCategory' => $productUnderSubCategory
        ]);
    }



      public function SubSubCategoryView12($cat_id, $subcat_id)
    {

        $subsubproduct=SubcategoryProvider::getApiSubSubCategoryView12ForIslamic($cat_id, $subcat_id);

        return response()->json([
            'subsubproduct' => $subsubproduct

        ]);
    }
      public function GetProductView1( $subsubcat_id)
    {

        $getproduct=ProductProvider::getAPIproductUnderSubCategory($subsubcat_id);
        return response()->json([
            'getproduct' => $getproduct
        ]);
    }
     public function related_product($cat_id,$id)
    {
        $recomndedProduct=ProductProvider::getAPIrelated_product($cat_id,$id);
        return response()->json([
            'recomndedProduct'=>$recomndedProduct
        ]);
    }
    public function multiimg(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'product_id' => 'required',
            ]);
           if ($validator->fails()) {
            return response([
                'errors' => $validator->messages()
            ]);
        }else{
          $product = new Product();
          $multiimgs = new MultiImg();
          $product->product_id = $request->product_id;
          $multiimgs->product_id = $request->product_id;
        $product = Product::where('ecom_name','1')->where('id',$product->product_id)->select('video_link')->get();
        //  dd($product);
        $multiimgs =  MultiImg::where('product_id', $multiimgs->product_id)->select('photo_name')->limit(8)->get();
        //  dd($multiimgs);
        return response()->json([
            'multiimgs' => $multiimgs,
            'product_video_url' => $product
            ]);
        }

    }
      public function ProductDetails($cat_slug, $subcat_slug, $slug)
    {

        $ProductDetails=ProductProvider::getAPIProductDetails($slug);



        return response([
            'ProductDetails'=>$ProductDetails

        ]);
    } // end mathod
    // =====================================================================================Grocery_start============================================================================================================================

      public function slider_2()
    {
        // for slider
        $sliders = SliderProvider::getAPISliderForGrocery();
        // end slider
        return response()->json([
            'slider' => $sliders
            ]);
    }
     public function dailyBestSales_2()
    {
         $dailyBestSales =  OrderitemProvider::getApiDailybestsalesForGrocery();

            return response()->json([
                'dailyBestSales' =>$dailyBestSales
                ]);
    }
     public function most_popular_all_2()
    {
        $most_popular_all =ProductProvider::getAPImost_popular_all_For_Grocery();
         return response()->json([
             'most_popular_all'=> $most_popular_all
             ]);
    }
    // for  hot_deals
    public function hot_deals_2()
    {
         $hot_deals = ProductProvider::getAPIhot_deals_2_For_Grocery();
        return response()->json([
            'deal of day' => $hot_deals
            ]);
    }
        //banner
    public function banner1_2()
    {

        $banner1 =BannerProvider::getAPIbanner1Forgrocery();

        return response()->json([
            'banner1_2' => $banner1,

        ]);

    }
       public function banner2_2()
    {
          // home page banner-category
         $banner2 =BannerProvider::getAPIbanner2Forgrocery();


        return response()->json([
            'banner2_2' => $banner2,

        ]);

    }
    public function top_selling_2()
    {
          $popular_product = OrderitemProvider::getApiTop_selling_2ForGrocery();
            return response()->json([
                'Popular_product' => $popular_product
                ]);
    }
      public function trending_product_2()
    {
          $popular_product =   OrderitemProvider::getApiTop_selling_2ForGrocery();
            return response()->json([
                'trending_product' => $popular_product
                ]);
    }
    public function top_rated_2()
    {
     $top_rated = ReviewProvider::getApiTopRatedForGrocery();
        return response()->json([
            'top_rated' => $top_rated
            ]);
    }
     public function recently_added_2()
    {
          $latest_products = ProductProvider::getAPIrecently_added_2_For_Grocery();

          return response()->json([
              'recently_added' => $latest_products
              ]);
    }
     public function special_offers_2()
    {
        $special_offers = ProductProvider::getAPIspecial_offers_2_For_Grocery();

        return response()->json([
            'special_offers' => $special_offers
            ]);
    }
    public function related_product_2($cat_id,$subcat_id,$id)
    {
        // dd($id);
            $recomndedProduct = ProductProvider::getAPIrelated_product_2_For_Grocery($cat_id,$id);


        return response()->json([
            'related_product_2'=>$recomndedProduct
        ]);
    }
      public function CategoryView_2()
    {
        $getcategory =CategoryProvider::getApiCategoryViewForGrocery();
        return response()->json([
            'Category' => $getcategory

        ]);
    }
    public function sidebar_CategoryView_2()
    {
       $getcategory=CategoryProvider::getApiSidebar_CategoryView_2ForGrocery();

        return response()->json([
            'getcategory' => $getcategory

        ]);
    }
    public function SubCategoryView_2($cat_id)
    {
        $getsubcategory1 = SubcategoryProvider::getApiSubCategoryViewForGrocery($cat_id);

        return response()->json([
            'getsubcategory' => $getsubcategory1,


        ]);
    }
      public function sidebar_subcategory_2()
    {
            $subcategory=SubcategoryProvider::getApisidebar_subcategory_2ForGrocery();
        return response()->json([
            'subcategory' =>$subcategory
            ]);
    }
        public function SubSubCategroy(Request $request)
    {
            $a= $request;
            $getsubsubcategory=SubSubcategoryProvider::getAPISubSubCategroyGrocery($a);
            return response()->json([

                'SubSubCategory' => $getsubsubcategory
                ]);
        }

    public function sidebar_SubSubCategroy()
    {

        $subsubcategories=SubSubcategoryProvider::getAPIsidebar_SubSubCategroyGrocery();
        return response()->json([
            'subsubcategories' => $subsubcategories,
        ]);
    }

    public function grocery_ProductView(Request $request)
    {
        $a=$request;
        $product=ProductProvider::getAPIgrocery_ProductView_For_Grocery($a);
        return response()->json([
            'products' => $product
            ]);

    }
       /// Product View With Ajax
      public function ProductViewAjax($id)
      {
          $description = ProductProvider::getAPIProductViewAjax_For_Grocery($id);
          return response()->json([
            'description' => $description,
          ]);
      } // end mathod
    //sub_category



    public function GetFilteredProducts2(Request $request)
   {
        $a=$request;
        $querys=ProductProvider::getAPIGetFilteredProducts2_For_Grocery($a);
       return response()->json([$querys]);
   }

    //------------------------------------------------Islamic_product-------------------------------------------------------------------------

    //slider_view
    public function SliderView()
    {
        $sliders = Slider::latest()->get();
        return $sliders;
    }
    // Banner view
    public function BennarView()
    {
        $bennars = Banner::all();
        return $bennars;
    }
    // Banner view
    public function Bennar_categoryView()
    {
        $bennars_category = BannerCatagory::all();
        return $bennars_category;
    } // end mathod
    //coupon start
    public function CouponView()
    {

        $coupons = Coupon::orderBy('id', 'DESC')->get();
        // dd(  $coupons);
        return response()->json([$coupons]);
    } // end mathod
    //speciall_Offer
    public function specialOffer()
    {
        $products = Product::where('special_offer', '1')->limit(30)->paginate(9);
        return $products;
    }


    //  District selected
    public function DistrictGetAjax($division_id)
    {

        // dd($division_id);
        $ship = District::where('division_id', $division_id)->get();
        return response($ship);
        // return json_encode($ship);

    } // end method
    // state selected
    public function StateGetAjax($district_id)
    {
        // dd($district_id);

        $ship = PostCode::where('district_id', $district_id)->get();
        return response($ship);
    } // end method


    //User_Profile
    public function UserProfile()
    {
        $district = District::all();
        // what is id = specify  user and use find id
        $id = Auth::user()->id;
        $user = User::find($id);

        return response([
            'district' => $district,
            'user' => $user
        ]);
    }
    // User Profile Store
    public function UserProfileStore(Request $request)
    {

        // Auth login user id is find
        $fields = $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric',

        ]);
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->gender = $request->gender;
        $data->date_of_birth = $request->date_of_birth;


        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/users_images/' . $data->profile_photo_path));

            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/users_images'), $filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' =>  'Your Profie Update Sucessfully',

        );

        $response = [
            'data' => $data,
            'notification' => $notification
        ];
        return response($response);
    }
    // user password change
    public function UserChnagePassword()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return $user;
    }
    // User Update Password
    public function UserPasswordUpdate(Request $request)
    {

        $fields = $request->validate([
            'oldpassword' => 'required|min:6|max:12',
            'password' => 'required|min:6|max:12confirmed',
        ]);
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();

            $notification = array(
                'message' =>  'Your Passowrd Update Successfully',

            );
            $response = [
                'user' =>  $user,
                'notification' => $notification
            ];
            //Auth::logout();
            return response($response);
        } else {

            $notification = array(
                'message' =>  'New Password did not matched',

            );
            return response($notification);
        }
    }
    // end mahod
    // checkout store route
    public function CheckoutStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'street_address' => 'required',
            'district_id' => 'required',
            'thana_id' => 'required',
            'name' => 'required',
            'phone_no' => 'required',
        ]);
        if ($validator->fails()) {
            return response([
                'errors' => $validator->messages()
            ]);
        } else {

            $customerAddress = CustomerAddress::where('user_id', Auth::user()->id)->update(['status' => 0,]);
            $address = new CustomerAddress();
            $address->user_id = Auth::user()->id;
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
                'status' => 201,
                'message' => 'Address Stored Successfully',
                'address' => $address
            ]);
        }
    } // end mathod

    public function CheckoutProcess(Request $request)
    {
        $request->validate([
            'deliveryDate' => 'required',
            'deliveryTime' => 'required',
        ]);



        $total_amount_with_vat = 0;
        $carts = $request->carts;
        // dd($request) ;

        for ($i = 0; $i < count($carts); $i++) {
            $total_amount_with_vat = $total_amount_with_vat + (($carts[$i]["price"] + $carts[$i]["options"]["vat"]) * $carts[$i]["qty"]);
        }

        $total_amount = $total_amount_with_vat;


        $customer_id =  $request->customerId;
        $customerAddress = CustomerAddress::where('user_id', Auth::user()->id)->where('status', 1)->first();

        $delivery_charge = District::select('delivery_charge')->where('id', $customerAddress->district_id)->first();
        // return $delivery_charge;
// dd($delivery_charge);


        $delivery = new Order();
        $delivery->user_id = Auth::user()->id;
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


        $delivery->invoice_no = mt_rand(10000000, 99999999);
        $delivery->order_date = Carbon::now();
        $delivery->order_month = Carbon::now()->format('F');
        $delivery->order_year = Carbon::now()->format('Y');
        $delivery->status = 'Pending';
        $delivery->save();



        foreach ($carts as $cart) {
            OrderItem::insert([
                'order_id' => $delivery->id,
                'product_id' => $cart["product_id"],
                'color' => $cart["options"]["color"],
                'size' => $cart["options"]["size"],
                'qty' => $cart["qty"],
                'price' => (($cart["price"]) * $cart["qty"]),
                'created_at' => Carbon::now(),
            ]);

        }


        $order = Order::with('orderItems', 'orderItems.product', 'division', 'district', 'state')->where('id', $delivery->id)->first();
        // $order_info = Order::where('id', $delivery->id)->select('id','delivery_time','payment_method','invoice_no','amount','delivery_charge','street_address')->first();
         $order_info =  DB::table('orders')
            ->join('order_items', 'order_items.order_id', '=', 'orders.id')
            ->where('orders.id',$delivery->id)
              ->select('order_id','delivery_time','payment_method','invoice_no','amount','delivery_charge','street_address')
                ->first();
        $url = "http://66.45.237.70/api.php";
        $number = Auth::User()->mobile;
        $text = "Your BppShops Order " . $delivery->invoice_no . " Has been successful Help Line :00000";
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

        event(new \App\Events\MyEvent($order));

        //Start Send Emails
        Mail::to(Auth::user()->email)->send(new OrderMail($order));
        // remove auto cart
        Session::forget('cart');


        return response()->json([
             'message' => 'Your order has been placed',
            'order'=>$order_info
            ]);
    }
    // Chnage Payment Options
   public function CheckoutInfo()
    {
        $address = CustomerAddress::where('user_id', Auth::user()->id)->where('status', 1)->with('district', 'postCodes')->first();
        return $address;
    }
    public function CheckoutInfoAll()
    {
        $address = CustomerAddress::where('user_id', Auth::user()->id)->with('district', 'postCodes')->orderBy('id', 'DESC')->get();
        return $address;
    }
     public function CheckoutInfoSelect($id){
        $customerAddress = CustomerAddress::where('user_id', Auth::user()->id)->update(['status' => 0]);
        $customerAddress = CustomerAddress::where('id', $id)->update([
                'status' => 1
            ]);
            $address = CustomerAddress::where('user_id', Auth::user()->id)->where('status', 1)->with('district', 'postCodes')->first();
        return response([
            'address'=>$address,
            'status' => 200
        ]);
    }

    // public function CheckoutInfoSelect($id){
    //     $customerAddress = CustomerAddress::where('user_id', Auth::user()->id)->update(['status' => 0,]);
    //     $customerAddress = CustomerAddress::where('id', $id)->update([
    //             'status' => 1,
    //         ]);
    //     return response($customerAddress);
    // }

    public function CheckoutInfoDelete(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
          $customerAddress = CustomerAddress::find($request->id)->where('user_id', Auth::user()->id)->first();
        // $customerAddress = CustomerAddress::find($request->id)->first();
        // dd($customerAddress);
        $customerAddress->delete();
        $notification = array(
            'message' => 'Your address has been deleted',

        );
        return $customerAddress;
    }
    // add to cart post
    public function AddToCart(Request $request, $id)
    {
        // reomove old data add to cart
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        $product = Product::findOrfail($id);
        $cartItem = Cart::content();
        Cart::search(function ($cartItem, $rowId) {
            return $cartItem->id == 1;
        });

        if ($product) {
            // product discount
            if ($product->discount_price == NULL) {
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
                        'vat' => (float) $product->selling_price * ((float) $product->vat / 100)
                    ],
                ]);
                $notification = array(
                    'success' => 'Successfully Added on Your Cart',
                );
                return $notification;
            } else {
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
                        'vat' => (float) $product->discount_price * ((float) $product->vat / 100)
                    ],
                ]);

                $notification = array(
                    'success' => 'Successfully Added on Your Cart',
                );
                return response()->json([$notification]);
            }
        }
    } // end mathod
    public function ChangePayment($order_id)
    {

          $dailyBestSales =  DB::table('orders')
            ->join('order_items', 'order_items.order_id', '=', 'orders.id')
            ->where('orders.id',$order_id)
              ->select('order_id','delivery_time','payment_method','invoice_no','amount','delivery_charge','street_address')
                ->first();
    dd($dailyBestSales);
        return response()->json([
           'payments'=>  $dailyBestSales,

            ]);
    } // end
    // all users mathod
    public function MyOrders()
    {
        // $order = Order::with('user','division','district','state')->where('id',$order_id)->where('user_id',Auth::id())->first();
        // $orders = Order::where('user_id',Auth::id())->orderBy('id','DESC')->get();


        // dd($deliverdProducts);
        // $orderItem = OrderItem::with('product')->where('product_id',$product_id)->orderBy('id','DESC')->get();
        // dd($deliverdProducts);
        // dd($orders);
        $orders = Order::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();


        // $deliverdProducts =  OrderItem::select('product_id')->groupBy('product_id')
        //     ->join('orders', 'order_items.order_id', '=', 'orders.id')
        //     ->join('products', 'products.id', '=', 'order_items.product_id')
        //     ->where('orders.status', 'delivered')
        //     ->get(['products.*']);
        //     dd($deliverdProducts) ;

        return $orders;
    } // end mathod
     // OrderDetails
    public function OrderDetails($order_id){


          $ordersDetails = Order::with('orderItems','orderItems.product')->where('id',$order_id)->first();

            return $ordersDetails;

      } // end mehtod
    ///////////// Order Traking ///////
    public function OrderTraking(Request $request)
    {
        $request->validate([
            'invoice_no' => 'required',

        ]);


        $track = Order::where('invoice_no', $request->invoice_no)->select('order_date','payment_method','amount','status')->first();

        if ($track) {
            return $track;
        } else {
            $notification = array(
                'message' => 'Invoice Code Is Invalid',

            );
            return $notification;
        }
    } // end mehtod
    public function CancelOrder($id)
    {
        Order::findOrFail($id)->update(['status' => 'cancel']);
        $notification = array(
            'message' => 'Order Canceled Successfully',
            'alert-type' => 'success'
        );
        return $notification;
    } // end mehtod


    // ==============================================================socialite login====================================================================================================
    // Google Login
public function redirectToGoogle(Request $request)
    {
        $validated = $this->validateProvider($request);
        if (!is_null($validated)) {
            return $validated;
        }

        return Socialite::driver($request)->stateless()->redirect();
        if (!$request->session()->has('redirectUrlAfterLogin')) {

            Session::put('redirectUrlAfterLogin', url()->previous());

        }

        return Socialite::driver('google')->redirect();
    }

// Google callback
public function handleGoogleCallback(Request $request)
{

    $user = Socialite::driver('google')->stateless()->user();
    $this->_registerOrLoginUser($user);

    $redirectUrlAfterLogin = Session::get('redirectUrlAfterLogin');

    $request->session()->forget('redirectUrlAfterLogin');

    return redirect($redirectUrlAfterLogin);

}
// ==========================================================================================================================================================================================
// ==============================================================================Fashion Start===============================================================================================
   // Frontend Index show
   public function brands()
   {
        $brands=BrandProvider::getApibrand2ForFashion();
        return response()->json([
            'brands'=>$brands
        ]);

   }
   public function banner()
   {
       $banner = BannerProvider::getApibanner2ForFashion();
       return response()->json([
        'banner'=>$banner
       ]);
   }
   public function slider1()
   {
        $sliders = SliderProvider::getAPISliderForFashion();
            return response()->json([
                'sliders' =>$sliders
                ]);
   }
   public function hotdeals()
   {

        // for  special_offer
        $hot_deals = ProductProvider::getAPIhot_deals_2_For_Fashion();
        return response()->json([
             'hot_deals' => $hot_deals
             ]);
   }
   public function latestproduct()
   {
        $latest_products=ProductProvider::getAPIlatestproduct_For_Fashion();
       return response()->json([
           'latest_products'=>$latest_products
           ]);
   }
   public function fashiontoprated()
   {
        $top_rated = ProductProvider::getAPItop_rated_For_Fashion();
            return response()->json([
                'top_rated' => $top_rated
                ]);
   }
   public function popular_product(){
          $most_popular_all =ProductProvider::getAPIpopular_product_For_Fashion();
          return response()->json([
              'most_popular_all' =>$most_popular_all
              ]);
   }
   public function fashion_products()
   {
        $products =ProductProvider::getAPIfashion_products_For_Fashion();
        return response()->json([
            'products' => $products
            ]);
   }
   public function fashion_topCategoriesThisWeek()
   {
        $topCategoriesThisWeek = CategoryProvider::getApiFashion_topCategoriesThisWeek();
            return response()->json([
            'TopCategoriesThisWeek' => $topCategoriesThisWeek
            ]);
   }
   public function Best_Selling_Products()
   {
        $Best_Selling_Products = OrderProvider::getApiBest_Selling_ProductsForFashion();
                                return response()->json([
                                    'Best_Selling_Products' =>$Best_Selling_Products
                                    ]);
   }
   public function special_offer()
   {
       // for  Spacial Offer
       $special_offers=ProductProvider::getAPIspecial_offer_For_Fashion();
        return response()->json([
            'special_offers' =>$special_offers
            ]);
    }
    public function fashion_special_deals()
    {
        $special_deals = ProductProvider::getAPIfashion_special_deals_For_Fashion();
        return response()->json([
            'special_deals' =>$special_deals
            ]);
    }
    public function fashion_hot_deals()
    {
        $hot_deals = ProductProvider::getAPIfashion_hot_deals_For_Fashion();
        return response()->json([
            'hot_deals'=> $hot_deals
            ]);
    }
    public function fashion_featureds()
    {
        $featureds = ProductProvider::getAPIfashion_featureds_For_Fashion();
        return response()->json([
            'featureds'=> $featureds
            ]);
    }
    public function fashion_newTwoproducts()
    {
        $featureds = ProductProvider::getAPIfashion_newTwoproducts_For_Fashion();
        return response()->json([
            'featureds'=> $featureds
            ]);
    }
    public function fashion_Category()
    {
        $categories = CategoryProvider::getApiFashion_Category();
        return response()->json([
            'categories'=> $categories
            ]);
    }
    public function fashion_BannerCategory()
    {
        $bannerCategroy = BannerCatagoryServiceProvider::getApiFashion_BannerCategory();
        return response()->json([
            'bannerCategroy'=> $bannerCategroy
            ]);
    }
    public function fashion_DeliverdProducts()
    {
        $bannerCategroy = OrderitemProvider::getApiDeliverdProductsForFashion();
        return response()->json([
            'bannerCategroy'=> $bannerCategroy
            ]);
    }
    public function fashion_Dailybestsales()
    {
        $bannerCategroy = OrderitemProvider::getApiDailyBestSalesForFashion();
        return response()->json([
            'bannerCategroy'=> $bannerCategroy
            ]);
    }
    public function fashion_Latestdiscountproduct()
    {
        $latestdiscountproduct = ProductProvider::getAPIfashion_Latestdiscountproduct_For_Fashion();
        return response()->json([
            'latestdiscountproduct'=> $latestdiscountproduct
            ]);
    }
    public function fashion_TrendingProducts()
    {
        $trendingProducts = OrderitemProvider::getApitrendingProductsForFashion();
        return response()->json([
            'trendingProducts'=> $trendingProducts
            ]);
    }


}

