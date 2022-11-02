<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactUsMail;
use App\Mail\OrderMail;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;
use App\Models\MultiImg;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;
use App\Models\ContactUs;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Validator;
use App\Models\review;
use Devfaysal\BangladeshGeocode\Models\District;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;


//use App\Providers\CategoryServiceProvider as CategoryProvider;

class IndexController extends Controller
{

    public function landing()
    {
        return view('frontend.index');
    } // end

    // product_detalis for baby
    public function ProductDetailsBaby($cat_slug, $subcat_slug, $slug)
    {
        // for multi img show
        $product = Product::where('product_slug_name', $slug)->first();
        //  $product = Product::where('id', $id);
        Product::find($product->id)->increment('product_views');
        $product_color = $product->product_color;
        $product_color_all = explode(',', $product_color);
        $product_size = $product->product_size;
        $product_size_all = explode(',', $product_size);
        // for related product show
        $cat_id = $product->category_id;
        $relatedProduct = Product::where('category_id', $cat_id)->where('id', '!=', $product->id)->orderBy('id', 'DESC')->get();
        $multiimgs =  MultiImg::where('product_id', $product->id)->limit(8)->get();

        $reviews = review::where('product_id', $product->id)->with('user')->orderBy('id', 'DESC')->get();


        return view('frontend.product.product_detalis_baby', compact(

            'product',
            'multiimgs',
            'product_color_all',
            'product_size_all',
            'relatedProduct',
            'reviews'
        ));
    } // end mathod

    // product_detalis for fashion
    public function ProductDetailsFashion($cat_slug, $subcat_slug, $slug)
    {
        // for multi img show
        $product = Product::where('product_slug_name', $slug)->first();

        Product::where('product_slug_name', $slug)->first()->increment('product_views');

        $recomndedProduct = Product::where('category_id', $product->category_id)
            ->join('reviews', function ($join) {
                $join->on('products.id', '=', 'reviews.product_id');
            })
            ->where('products.id', '!=', $product->id)
            ->limit(6)
            ->groupBy('products.id')
            ->get(['products.*', DB::raw('sum(reviews.quality) as sum_star'), DB::raw('count(reviews.id) as total_star')]);




        $product_color = $product->product_color;
        $product_color_all = explode(',', $product_color);
        $product_size = $product->product_size;
        $product_size_all = explode(',', $product_size);
        // for related product show
        $cat_id = $product->category_id;
        $multiimgs =  MultiImg::where('product_id', $product->id)->limit(8)->get();
        $reviews = review::where('product_id', $product->id)->with('user')->orderBy('id', 'DESC')->get();
        return view('frontend.product.fashion_product_detalis', compact(
            'product',
            'multiimgs',
            'product_color_all',
            'product_size_all',
            'recomndedProduct',
            'reviews'
        ));
    } // end mathod

    /// Product View for baby With Ajax
    public function BabyProductViewAjax($id)
    {
        $product = Product::with('category', 'subcategory', 'subsubcategory')->whereHas('supplier', function ($q) {
            $q->where('supplyer_status', 1);
        })->findOrFail($id);
        $review = Review::where('product_id', $id)->get()->first();
        $users = Review::where('product_id', $id)->count();
        $multiimgs =  MultiImg::where('product_id', $id)->limit(6)->get();
        $color = $product->product_color;
        $product_colors = explode(',', $color);
        $size = $product->product_size;
        $product_sizes = explode(',', $size);
        $reviews = review::where('product_id', $product->id)->with('user')->orderBy('id', 'DESC')->get();

        return response()->json(array(
            'product' => $product,
            'review' => $review,
            'color' => $product_colors,
            'size' => $product_sizes,
            'users' => $users,
            'multiimgs' => $multiimgs,
            'reviews' => $reviews
        ));
    } // end mathod


    // Product View for fashion With Ajax
    public function FashionProductViewAjax($id)
    {
        $product = Product::with('category', 'subcategory', 'subsubcategory')->whereHas('supplier', function ($q) {
            $q->where('supplyer_status', 1);
        })->findOrFail($id);
        $sumOfReview = Review::where('product_id', $id)->sum('quality');
        $users = Review::where('product_id', $id)->count();
        $multiimgs =  MultiImg::where('product_id', $id)->limit(6)->get();
        $color = $product->product_color;
        $product_colors = explode(',', $color);
        $size = $product->product_size;
        $product_sizes = explode(',', $size);

        return response()->json(array(
            'product' => $product,
            'color' => $product_colors,
            'size' => $product_sizes,
            'totalReview' => $users,
            'multiimgs' => $multiimgs,
            'sumOfReview' => $sumOfReview,
        ));
    } // end mathod

    public function GetCategory()
    {
        return view('frontend.category.category');
    }
    // Home Page Top Search Bar Start
    public function searchProduct(Request $request)
    {

        $category = Category::find($request->category_id);
        if (!$category) {
            $notification = array(
                'message' =>  'Category Not Found',
                'alert-type' => 'error'
            );
            return redirect()->route('dashboard')->with($notification);
        }

        $query  = Product::query();
        $products = $query->where('category_id', $category->id)
            ->where(function ($query) use ($request) {
                $query->orWhere('product_name', 'like', "%{$request->input('searchValue')}%")
                    ->orWhere('product_code', 'like', "%{$request->input('searchValue')}%")
                    ->orWhere('product_size', 'like', "%{$request->input('searchValue')}%")
                    ->orWhere('product_color', 'like', "%{$request->input('searchValue')}%")
                    ->orWhere('selling_price', 'like', "%{$request->input('searchValue')}%");
            })->get();
        return view('frontend.category.searchProduct', compact('products'));
    }

    //=============================== Ajax Search start ===============================
    public function searchProductByAjax(Request $req)
    {
        $search_str = $req->squery;

        $productName = DB::table('products')
            ->join('categories', 'products.category_id', 'categories.id')
            ->join('sub_categories', 'products.sub_category_id', 'sub_categories.id')
            ->select('products.product_name')
            ->Where('products.status', 1)->where('products.product_name', 'LIKE', '%' . $search_str . '%')
            ->orWhere("products.product_code", 'LIKE', '%' . $search_str . '%')
            ->orWhere("categories.category_name", 'LIKE', '%' . $search_str . '%')
            ->orWhere("sub_categories.sub_category_name", 'LIKE', '%' . $search_str . '%')
            ->get();
        //dd($productName);

        $search_result = '';
        if (count($productName) > 0) {

            foreach ($productName as $key => $value) {
                $myhref = route('searchproduct.view', ['searchValue' . '=' . $value->product_name]);

                $search_result .= '<li class="list-group-item productname" ><a href="" style="text-decoration: none; color:black;">' . $value->product_name . '</a></li>';
            }
            $search_result .= '';
        } else {
            $search_result = '<li class="list-group-item productname text-danger text-center" style="z-index:999999">Products Not Found</li>';
        }
        return $search_result;
    }

    //=============================== Ajax Search End ===============================

    //=============================== normal Search start ===============================
    public function searchByProductNameView(Request $req)
    {
        $search_str = $req->searchValue;
        $products = DB::table('products')
            ->join('categories', 'products.category_id', 'categories.id')
            ->join('sub_categories', 'products.sub_category_id', 'sub_categories.id')
            ->select('products.*', 'category_name', 'category_slug_name')
            ->Where('products.status', 1)->Where('products.product_name', 'LIKE', '%' . $search_str . '%')
            ->orWhere('products.product_code', 'LIKE', '%' . $search_str . '%')
            ->orWhere("categories.category_name", 'LIKE', '%' . $search_str . '%')
            ->orWhere("sub_categories.sub_category_name", 'LIKE', '%' . $search_str . '%')
            ->get();



        return view('frontend.product.search', compact('products'));
    }
    //=============================== Search ENd ===============================

    public function UserLogout()
    {
        Auth::logout();
        return redirect()->route('dashboard');
    }
    // user Profile Update
    public function UserProfile()
    {
        $district = District::all();
        // what is id = specify  user and use find id
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('frontend.profile.user_profile', compact('user', 'district'));
    }

    // User Profile Store
    public function UserProfileStore(Request $request)

    {

        // Auth login user id is find
        $validateData = $request->validate(
            [
                'name' => 'required',
                // 'email' => 'required',
                'gender' => 'required',
                'date_of_birth' => 'required',
                'phone' => 'required|numeric',

                // 'profile_photo_path' => 'required',
            ],
            [
                'name.required' => 'Name is Required',
                'gender.required' => 'Gender is Required',
                'date_of_birth.required' => 'Date of Birth is Required',
            ]
        );
        $data = User::find(Auth::user()->id);
        dd($data);
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
            'alert-type' => 'success'
        );


        return redirect()->route('user.profile')->with($notification);
    }
    // user password change
    public function UserChnagePassword()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.change_password', compact('user'));
    }
    // User Update Password
    public function UserPasswordUpdate(Request $request)
    {

        $validateData = $request->validate([
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
                'alert-type' => 'success',
            );

            //Auth::logout();
            return redirect()->route('user.password.update')->with($notification);
        } else {

            $notification = array(
                'message' =>  'New Password did not matched',
                'alert-type' => 'warning',
            );
            return redirect()->route('user.password.update')->with($notification);
        }
    }  // end mahod
    // product_detalis
    // public function ProductDetails($cat_slug,$subcat_slug,$subsubcat_slug,$slug)
    public function ProductDetails($cat_slug, $subcat_slug, $slug)
    {

        // for multi img show
        $product = Product::where('product_slug_name', $slug)->first();
        //  $product = Product::where('id', $id);
        // Product::where('product_slug_name',$slug)->first()->increment('product_views');
        Product::where('product_slug_name', $slug)->first()->increment('product_views');
        $product_color = $product->product_color;
        $product_color_all = explode(',', $product_color);
        $product_size = $product->product_size;
        $product_qty = $product->product_qty;
        $product_size_all = explode(',', $product_size);
        // for related product show
        $cat_id = $product->category_id;
        $relatedProduct = Product::where('category_id', $cat_id)->where('id', '!=', $product->id)->orderBy('id', 'DESC')->get();
        $multiimgs =  MultiImg::where('product_id', $product->id)->limit(8)->get();

        $reviews = review::where('product_id', $product->id)->with('user')->orderBy('id', 'DESC')->get();

        // dd($product_qty);
        return view('frontend.product.product_detalis', compact(

            'product',
            'multiimgs',
            'product_color_all',
            'product_size_all',
            'relatedProduct',
            'reviews'
        ));
    } // end mathod
    // for check end


    // electronic Product Detailes


    // electronic Product Detailes end

    public function TagWiseProduct($tag)
    {
        // for tag page
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $products = Product::where('status', 1)->where('product_tags', $tag)->orderBy('id', 'DESC')->paginate(4);
        return view('frontend.tags.tags_view', compact('products', 'categories'));
    }
    // Subcategory wise data
    public function SubCatWiseProduct($subcat_id)
    {

        $breadsubcat = SubCategory::with(['category'])->where('id', $subcat_id)->get();
        $products = Product::where('status', 1)->where('subcategory_id', $subcat_id)->orderBy('id', 'DESC')->paginate(4);
        $categories = Category::orderBy('category_name', 'ASC')->get();
        return view('frontend.product.subcategory_view', compact('products', 'categories', 'breadsubcat'));
    }
    // Subcategory wise data
    public function SubSubCatWiseProduct($subsubcat_id)
    {
        $products = Product::where('status', 1)->where('sub_sub_category_id', $subsubcat_id)->orderBy('id', 'DESC')->paginate(4);
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $breadsubsubcat = SubSubCategory::with(['category', 'subcategory'])->where('id', $subsubcat_id)->get();
        return view('frontend.product.sub_subcategory_view', compact('products', 'categories', 'breadsubsubcat'));
    }
    /// Product View With Ajax
    public function ProductViewAjax($id)
    {
        $product = Product::with('category', 'subcategory', 'subsubcategory')->findOrFail($id);
        $review = Review::where('product_id', $id)
            ->select(DB::raw('count(*) as total'), DB::raw('sum(quality) as sum_total'))
            ->groupBy('product_id')
            ->first();

        $users = Review::where('product_id', $id)->count();
        $multiimgs =  MultiImg::where('product_id', $id)->limit(6)->get();
        $color = $product->product_color;
        $product_colors = explode(',', $color);
        $size = $product->product_size;
        $product_sizes = explode(',', $size);
        $reviews = review::where('product_id', $product->id)->with('user')->orderBy('id', 'DESC')->get();

        return response()->json(array(
            'product' => $product,
            'review' => $review,
            'color' => $product_colors,
            'size' => $product_sizes,
            'users' => $users,
            'multiimgs' => $multiimgs,
            'reviews' => $reviews,

        ));
    } // end mathod
    // Product Seach By Name Start
    public function ProductSearch(Request $request)
    {
        if (isset($request->cat)) {
            $categories = $request->cat;
        }
        if (isset($request->search)) {
            $item = $request->search;
        }
        if (isset($item) && !isset($categories)) {
            $products = Product::where('product_name', 'LIKE', "%$item%")->paginate(9);
            $category = "0";
            return view('frontend.product.search', compact('products', 'category'));
        } else if (!isset($item) && isset($categories)) {
            if ($request->cat == 0) {
                $products = Product::all();
            } else {
                $products = Product::where('category_id', '=', $categories)->paginate(9);
            }

            $category = "0";
            return view('frontend.product.search', compact('products', 'category'));
        } else if (isset($item) && isset($categories)) {
            $products = Product::where('category_id', '=', $categories)->where('product_name', 'LIKE', "%$item%")->paginate(9);
            $category = "0";
            return view('frontend.product.search', compact('products', 'category'));
        }
        return redirect()->route('user.index');
    }
    // Product Seach by name End
    // Product By Color  Start
    public function searchByColor($color)
    {
        $products  = Product::where('product_color', 'like', '%' . $color . '%')->paginate(6);
        return view('frontend.product.search', compact('products'));
    }
    // Product By Color  End
    // Product By Category  Start
    public function searchByCategory($category)
    {
        $subcategory_id = $category;
        $products  = Product::where('subcategory_id', $subcategory_id)->paginate(6);
        return view('frontend.product.search', compact('products'));
    }
    // Product By Color  End
    public function categoryByProduct($category)
    {
        $category_id = $category;
        $products  = Product::where('category_id', $category_id)->paginate(6);
        return view('frontend.product.search', compact('products'));
    }
    public function searchBySubSubCategory($category)
    {
        $subsubcategory_id = $category;
        $subsubcategory = SubSubCategory::find($subsubcategory_id);
        $subcategory = SubCategory::find($subsubcategory->subcategory_id);
        $category = Category::find($subcategory->category_id);

        $products  = Product::where('sub_sub_category_id', $subsubcategory_id)->paginate(6);
        return view('frontend.product.search', compact('products', 'subsubcategory', 'subcategory', 'category'));
    }
    public function latestProduct(Request $request)
    {
        $products = Product::latest()->limit(12)->paginate(9);
        if ($request->ajax()) {
            return  $products;
        }
        return view('frontend.product.search', compact('products'));
    }
    public function GroceryPopularProduct(Request $request)
    {
        $most_popular_all = Product::where('status', 1)->where('ecom_name', '2')->paginate(12);
        if ($request->ajax()) {
            return  $most_popular_all;
        }
        return view('frontend.product.most_popular_product', compact('most_popular_all'));
    }
    public function IslamicPopularProduct(Request $request)
    {
        $most_popular_all = Product::where('status', 1)->where('ecom_name', '1')->paginate(12);
        if ($request->ajax()) {
            return  $most_popular_all;
        }
        return view('frontend.product.islamic_most_popular_product', compact('most_popular_all'));
    }
    public function  GroceryDalyPopularProduct(Request $request)
    {
        $dailyBestSales =  DB::table('order_items')
            ->join('products', 'products.id', '=', 'order_items.product_id')->where('products.ecom_name', '2')->where('status', 1)->select('product_id', 'ecom_name', 'product_thambnail', 'selling_price', 'discount_price', 'product_name', 'product_slug_name', 'unit',  DB::raw('count(*) as total'), 'products.*')
            ->groupBy('product_id')->orderBy('total', 'DESC')
            ->get();
        // dd($dailyBestSales);
        if ($request->ajax()) {
            return $dailyBestSales;
        }
        return view('frontend.product.most_daly_product', compact('dailyBestSales'));
    }


    // ================== Fashion Daily Base Sall Product ccf============================
    public function  FashionDalyPopularProduct(Request $request)
    {
        $dailyBestSales =  DB::table('order_items')
            ->join('products', 'products.id', '=', 'order_items.product_id')->where('products.ecom_name', '3')->select('product_id',  DB::raw('count(*) as total'), 'products.*')
            ->groupBy('product_id')->orderBy('total', 'DESC')
            ->limit(12)
            ->get();

        if ($request->ajax()) {
            return $dailyBestSales;
        }
        return view('frontend.product.fashion_most_daly_product', compact('dailyBestSales'));
    }

    // ================== Fashion Daily Base Sall Product end ============================

    // ====================== Fashion Best Selling Product  Start ===============================
    public function  FashionBestPopularProduct(Request $request)
    {
        $fashion_best_selling = Order::select('products.*', 'brands.brand_name_cats_eye')
            ->where('orders.status', '=', 'delivered')
            ->join('order_items', 'order_items.order_id', '=', 'orders.id')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->join('brands', 'brands.id', '=', 'products.brand_id')
            ->where('ecom_id', '3')
            ->paginate(12);
        if ($request->ajax()) {
            return $fashion_best_selling;
        }
        return view('frontend.product.fashion_best_selling_product', compact('fashion_best_selling'));
    }
    // ====================== Fashion Best Selling Product  End ===============================



    public function  IslamicDalyPopularProduct(Request $request)
    {
        $dailyBestSales =  DB::table('order_items')
            ->join('products', 'products.id', '=', 'order_items.product_id')->where('status', 1)->where('products.ecom_name', '1')->select('product_id',  DB::raw('count(*) as total'), 'products.*')
            ->groupBy('product_id')->orderBy('total', 'DESC')
            ->limit(12)
            ->get();
        if ($request->ajax()) {
            return $dailyBestSales;
        }
        return view('frontend.product.islamic_daly_best_product', compact('dailyBestSales'));
    }
    public function  GroceryLatestPopularProduct(Request $request)
    {
        $latestdiscountproduct = Product::where('status', 1)->whereNotNull('discount_price')->where('ecom_name', '2')->orderBy('id', 'DESC')->paginate(12);
        if ($request->ajax()) {
            return $latestdiscountproduct;
        }
        return view('frontend.product.most_latest_product', compact('latestdiscountproduct'));
    }
    public function allProduct()
    {
        $products = Product::limit(30)->paginate(9);
        return view('frontend.product.search', compact('products'));
    }
    public function BabyFeaturProduct(Request $request)
    {
        $featureds = Product::where('featured', 1)->where('ecom_name', '6')->orderBy('id', 'DESC')->paginate();
        if ($request->ajax()) {
            return $featureds;
        }
        return view('frontend.product.baby_featur_product', compact('featureds'));
    }
    public function BabyBestsSellingProduct(Request $request)
    {
        $dailyBestSales =  DB::table('order_items')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->select('product_id', DB::raw('count(*) as total'), 'products.*')
            ->groupBy('product_id')
            ->where('ecom_name', '6')
            ->orderBy('total', 'DESC')
            ->paginate();
        if ($request->ajax()) {
            return $dailyBestSales;
        }
        return view('frontend.product.bay_best_seling_product', compact('dailyBestSales'));
    }
    public function BabyTopSellingProduct(Request $request)
    {
        $topratedProducts = Product::whereHas('reviews', function ($query) {
            $query->where('quality', '>', '3');
        })->withCount('reviews')->withSum('reviews', 'quality')->where('ecom_name', '6')->orderBy('id', 'DESC')->paginate();
        if ($request->ajax()) {
            return  $topratedProducts;
        }
        return view('frontend.product.baby_top_rate_product', compact('topratedProducts'));
    }
    public function BabyTopBestDealProduct(Request $request)
    {
        $latestdiscountproducts = Product::whereNotNull('discount_price')->where('ecom_name', '6')->orderBy('id', 'DESC')->paginate(12);
        if ($request->ajax()) {
            return $latestdiscountproducts;
        }
        return view('frontend.product.baby_beast_deal_product', compact('latestdiscountproducts'));
    }
    public function AllFashionCategoryProduct()
    {
        $categories = Category::where('ecom_id', '3')->orderBy('id', 'DESC')->get();
        return view('frontend.product.all_category_fashion', compact('categories'));
    }

    public function AllCosmeticCategoryProduct()
    {
        $categories = Category::where('ecom_id', '5')->orderBy('id', 'DESC')->get();
        return view('frontend.product.all_category_cosmetic', compact('categories'));
    }
    public function AllFashionBrandProduct()
    {
        $brands = Brand::where('ecom_id', '3')->orderBy('id', 'DESC')->get();
        return view('frontend.product.all_brand_fashion', compact('brands'));
    }



    public function popularProduct()
    {
        $products = Product::where('status', 1)->orderBy('product_views', 'DESC')->limit(30)->paginate(9);
        return view('frontend.product.search', compact('products'));
    }
    public function specialOffer()
    {
        $products = Product::where('special_offer', '1')->limit(30)->paginate(9);
        return view('frontend.product.search', compact('products'));
    }
    public function specialDeal()
    {
        $products = Product::where('special_deals', '1')->limit(30)->paginate(9);
        return view('frontend.product.search', compact('products'));
    }


    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subscription_email' => 'required|unique:subscribers|max:255',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $subscriber = new Subscriber();
            $subscriber->subscription_email = $request->input('subscription_email');

            $subscriber->save();
            return response()->json(['message' => 'Thanks For Subscribe']);
        }
    }

    // furniture ProductFurDetails //// Can not find Route
    public function ProductFurDetails($cat_slug, $subcat_slug, $slug)
    {
        // for multi img show
        $product = Product::where('product_slug_name', $slug)->first();
        //  $product = Product::where('id', $id);
        Product::find($product->id)->increment('product_views');
        $product_color = $product->product_color;
        $product_color_all = explode(',', $product_color);
        $product_size = $product->product_size;
        $product_size_all = explode(',', $product_size);
        // for related product show
        $cat_id = $product->category_id;
        $relatedProduct = Product::where('category_id', $cat_id)->where('id', '!=', $product->id)->orderBy('id', 'DESC')->get();
        $multiimgs =  MultiImg::where('product_id', $product->id)->limit(8)->get();
        $reviews = review::where('product_id', $product->id)->with('user')->orderBy('id', 'DESC')->get();
        return view('frontend.product.product_Fur_detalis', compact('product', 'multiimgs', 'product_color_all', 'product_size_all', 'relatedProduct', 'reviews'));
    } // end mathod
    // furniture ProductFurDetails //// Can not find Route

    // furniture end

    public function review(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        } else {
            $validated = $request->validate([
                'review' => 'required|max:255'
            ]);


            if ($validated) {
                $review = new review();
                $review->review = $request->review;
                $review->product_id = $id;
                $review->user_id = Auth::id();
                $review->quality = $request->quality;
                $review->price = $request->price;
                $review->value = $request->value;
                $review->save();
                $notification = array(
                    'message' =>  'Thank you for your rating.',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
        }
    }

    // Contact Us Start
    public function contactUs(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:30',
            'email' => 'required',
            'subject' => 'required|max:60',
            'subject' => 'required|max:60',
            'message' => 'required|max:255',
        ]);
        if ($validated) {
            $contact  = new ContactUs();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->message = $request->message;
            $contact->save();

            //Start Send Emails
            Mail::to('bppshops@gmail.com')->send(new ContactUsMail($contact));

            $notification = array(
                'message' =>  'We will response you very soon, Thank you',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }
    }
    // Contact Us End

    public function createAccount()
    {
        return view('auth.register');
    }

    // islamic
    public function CategoryView()
    {
        $getcategory = Category::where('status', 1)->where('ecom_id', '1')->get();
        $newest = $getcategory->pluck('id');
        return view('frontend.category.category', compact('getcategory', 'newest'));
    }

    // ==========================================================for cosmetic category view=====================================================================================

    public function SubCategoryView($cat_slug)
    {
        $cat = Category::where('status', 1)->where('category_slug_name', $cat_slug)->first();
        $getsubcategory1 = SubCategory::where('category_id', $cat->id)->distinct('category_id')->get();
        $getsubcategory = SubCategory::with(['category' => function ($q) {
            $q->where('status', 1);
        }])->where('category_id', $cat->id)->get();

        $newest = SubCategory::where('category_id', $cat->id)->first();
        return view('frontend.category.sub_category', compact('getsubcategory', 'getsubcategory1', 'newest'));
    }



    // working so far so good
    public function GetProductView1($cat_slug, $subcat_slug, $subsubcat_slug)
    {
        $subsubcat = SubSubCategory::where('subsubcategory_slug_name', $subsubcat_slug)->first();
        $getproductsub = Product::where('status', 1)->where('sub_sub_category_id', $subsubcat->id)->with('category', 'subcategory', 'subsubcategory')->get();
        $getproductsub1 = Product::where('status', 1)->where('sub_sub_category_id', $subsubcat->id)->with('category', 'subcategory', 'subsubcategory')->first();
        return view('frontend.category.getproduct', compact('getproductsub', 'getproductsub1'));
    }

    public function GetProductsSort($id)
    {

        return Product::where('status', 1)->where('sub_sub_category_id', $id)->orderBy('id', 'ASC')->get();
    }
    public function GetProductsSort2($id)
    {

        return Product::where('status', 1)->where('ecom_name', 2)->where('sub_category_id', $id)->orderBy('id', 'ASC')->get();
    }

    public function GetProductsSortIslamic($id)
    {

        return Product::where('status', 1)->where('ecom_name', 1)->where('sub_category_id', $id)->orderBy('id', 'ASC')->get();
    }

    public function GrocerygetGetProductsSort2($id)
    {

        return Product::where('status', 1)->where('ecom_name', 2)->where('sub_sub_category_id', $id)->orderBy('id', 'ASC')->get();
    }

    //=======================> Product Filtering by Selling Price And Discount Price Start <=======================================
    public function GetFilteredProducts(Request $request)
    {

        $querys = Product::where('status', 1)->where('ecom_name', 3)->where('sub_sub_category_id', $request->subCategory)
            ->where(function ($query) use ($request) {
                $query->where(function ($subquery) use ($request) {
                    $subquery->whereBetween('selling_price', [$request->minPrice, $request->maxPrice])
                        ->where('discount_price', '=', 0);
                })
                    ->orWhere(function ($subquery) use ($request) {
                        $subquery->whereBetween('discount_price', [$request->minPrice, $request->maxPrice])
                            ->where('discount_price', '!=', 0);
                    });
            })
            ->get();
        return response()->json($querys);
    }
    //=======================> Product Filtering by Selling Price And Discount Price Start <=======================================


    //=======================> Product Filtering by grocery grt prodcut Selling Price And Discount Price Start <=======================================
    public function ProductGetFilteredProducts(Request $request)
    {

        $querys = Product::where('status', 1)->where('sub_sub_category_id', $request->subCategory)
            ->where(function ($query) use ($request) {
                $query->where(function ($subquery) use ($request) {
                    $subquery->whereBetween('selling_price', [$request->minPrice, $request->maxPrice])
                        ->where('discount_price', '=', 0);
                })
                    ->orWhere(function ($subquery) use ($request) {
                        $subquery->whereBetween('discount_price', [$request->minPrice, $request->maxPrice])
                            ->where('discount_price', '!=', 0);
                    });
            })
            ->get();
        return response()->json($querys);
    }
    //=======================> Product Filtering by Selling Price And Discount Price Start <=======================================

    //=======================> Product Filtering by Defult Price Start <===========================================================
    public function GetFilteredProducts2(Request $request)
    {
        $querys = Product::where('status', 1)->where('ecom_name', 2)->where('sub_category_id', $request->subCategory)

            ->where(function ($query) use ($request) {
                $query->where(function ($subquery) use ($request) {
                    $subquery->whereBetween('selling_price', [$request->minPrice, $request->maxPrice])
                        ->where('discount_price', '=', 0);
                })
                    ->orWhere(function ($subquery) use ($request) {
                        $subquery->whereBetween('discount_price', [$request->minPrice, $request->maxPrice])
                            ->where('discount_price', '!=', 0);
                    });
            })
            ->get();
        return response()->json($querys);
    }

    //=======================> Product Filtering by Defult Price Start <===========================================================
    public function GetFilteredProductsGetpage(Request $request)
    {


        $querys = Product::where('status', 1)->where('ecom_name', 2)->where('sub_sub_category_id', $request->subCategory)

            ->where(function ($query) use ($request) {
                $query->where(function ($subquery) use ($request) {
                    $subquery->whereBetween('selling_price', [$request->minPrice, $request->maxPrice])
                        ->where('discount_price', '=', 0);
                })
                    ->orWhere(function ($subquery) use ($request) {
                        $subquery->whereBetween('discount_price', [$request->minPrice, $request->maxPrice])
                            ->where('discount_price', '!=', 0);
                    });
            })
            ->get();
        return response()->json($querys);
    }
    //=======================> Product Filtering by Defult Price End <===========================================================

    public function Sidebar()
    {
        $category = Category::get();
        return view('frontend.body.fontend_sidber', compact('category'));
    }

    public function getSubCategoryForSidebar($id)
    {
        $subItems = SubCategory::where('category_id', $id)->get();
        return response()->json($subItems);
    }
    public function getSubSubCategoryForSidebar($id)
    {
        $subItems = SubSubCategory::where('subcategory_id', $id)->get();
        return response()->json($subItems);
    }
    public function getSubSubSubCategoryForSidebar($id)
    {
        $subItems = Product::where('sub_sub_category_id', $id)->get();
        return response()->json($subItems);
    }


    // filtering category
    public function get_causes_against_category($id)
    {
        $data = Category::where('id', $id)->select('category_name', 'id', 'category_image')
            ->first();
        return response()->json($data);
    }
    // filtering sub category
    public function  get_causes_against_subcategory($id)
    {
        $data = SubCategory::where('id', $id)->select('sub_category_name', 'id', 'subcategory_image', 'sub_category_slug_name')
            ->first();
        return response()->json($data);
    }
    // filtering category
    public function get_causes_against_subsubcategory($id)
    {
        $data = SubSubCategory::where('id', $id)->select('id', 'subsubcategory_name', 'subsubcategory_image')
            ->first();
        return response()->json($data);
    }
    public function get_causes_against_categorysort()
    {
        $data = Category::orderBy('id', 'DESC')->get();
        return response()->json($data);
    }
    public function get_causes_against_subcategorysort($id)
    {
        $data = SubCategory::where('category_id', $id)->get();
        return response()->json($data);
    }
    public function get_causes_against_subsubcategorysort($id)
    {
        $data = SubSubCategory::where('subcategory_id', $id)->get();
        return response()->json($data);
    }
    //error page
    public function ErrorPage()
    {
        return view('frontend.common.errorage');
    }


    // --------------------------test-------------------
    public function SupplierDataShowAll()
    {
        $supplier = MultiImg::all();
        return response($supplier);
    }
}
// main end
