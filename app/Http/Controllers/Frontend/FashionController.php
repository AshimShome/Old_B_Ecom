<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Providers\ProductServiceProvider as ProductProvider;
use App\Providers\reviewServiceProvider as reviewProvider;
use App\Providers\OrderServiceProvider as OrderProvider;
use App\Providers\OrderItemServiceProvider as OrderItemProvider;
use App\Providers\SliderServiceProvider as SliderProvider;
use App\Providers\CategoryServiceProvider as CategoryProvider;
use App\Providers\BannerCatagoryServiceProvider as BannerCatagoryProvider;
use App\Providers\CarbonServiceProvider as CarbonProvider;
use App\Providers\BannerServiceProvider as BannerProvider;
use App\Providers\BrandServiceProvider as BrandProvider;

class FashionController extends Controller
{

    public function landing()
    {
        $ecomName = 3;

        $special_deals = ProductProvider::getSpecialDeals($ecomName);
        // for  Spacial Offer
        $special_offers = ProductProvider::getspecialOffers($ecomName);
        // for  hot_deals

        $hot_deals = ProductProvider::gethotDeals($ecomName);
        // for featured
        $featureds = ProductProvider::getFeatureds($ecomName);
        // for product
        $products = ProductProvider::getProducts($ecomName);
        // for new product
        $newTwoproducts = ProductProvider::getNewTwoproducts($ecomName);
        $most_popular_all =  ProductProvider::getMostPopular($ecomName);
        $dailyBestSales = ProductProvider::getDailyBestSales($ecomName);
        $top_rated =  ProductProvider::getTopRatedProduc($ecomName);
        $latest_products = ProductProvider::getLatestProducts($ecomName);
        $trendingProducts = ProductProvider::getTrendingProducts($ecomName);
        //   latest discount products      
        $latestdiscountproduct = ProductProvider::getLatestDiscountProduct($ecomName);
        $todayDate =  CarbonProvider::getTodayDate();
        // top rated
        $toprated = reviewProvider::getTopRatedReview();


        // for slider  
        $sliders = SliderProvider::getSliders($ecomName);
        // end slider  
        $categories = CategoryProvider::getCategories($ecomName);
        // home page banner-category  
        // $bannerCategroy = BannerCatagoryProvider::getBanner1($ecomName);
        $banner1 = BannerCatagoryProvider::getBanner1();

        $banner2 = BannerProvider::getBanner2($ecomName);
        $banner = BannerProvider::getBanners($ecomName);

        $deliverdProducts = OrderItemProvider::getDeliverdProducts();
        $onsale = OrderProvider::getOnsale($ecomName);

        // for categories and total  
        $trendingProducts = ProductProvider::getTrendingProductsForFashion($ecomName);
        // for  brands
        $brands = BrandProvider::getBrand($ecomName);

        $fashion_best_selling_new = OrderProvider::fashionBestSellingNew($ecomName);

        // ====================== New Fashion Daily Best sale product New Method ===========================
        $dailyBestSales_new = ProductProvider::getdailyBestSalesnewForFashion($ecomName);
        // ====================== New Fashion Daily Best sale product New Method ===========================

        // Dialy Best Sell Product         
        $daily_best_sell_product = OrderProvider::dailyBestSellProductForFashion($ecomName);

        $topCategoriesThisWeek = CategoryProvider::getTopCategoriesThisWeekForFashion($ecomName);


        return view(
            'frontend.fashion',
            compact(
                'categories',
                'sliders',
                'products',
                'featureds',
                'hot_deals',
                'special_offers',
                'special_deals',
                'banner',
                'latest_products',
                'top_rated',
                'newTwoproducts',
                'dailyBestSales_new',
                'dailyBestSales',
                'fashion_best_selling_new',
                'deliverdProducts',
                'daily_best_sell_product',
                'latestdiscountproduct',
                'trendingProducts',
                'most_popular_all',
                'brands',
                'banner2',
                'topCategoriesThisWeek'
            )
        );
    }

    public function brands()
    {
        $brands = Brand::where('ecom_id', 3)->get()->groupBy(function ($item, $key) {
            return substr($item['brand_name_cats_eye'], 0, 1);
        })->sortBy(function ($product, $key) {
            return $key;
        });

        // dd($brands);
        return view('frontend.brands.fashion_brand', compact('brands'));
    }

    public function subcategoryProducts($cat_slug, $sub_cat_slug, Request $request)
    {
        $category = Category::where('category_slug_name', $cat_slug)->first();
        $subCategory = SubCategory::where('sub_category_slug_name', $sub_cat_slug)->first();

        $products = Product::where('category_id', $category->id)
            ->where('sub_category_id', $subCategory->id)
            ->where('status', 1)
            ->where('ecom_name', 3)
            ->paginate(12);

        if ($request->ajax()) {
            return $products;
        }
        $header = "Top Category Wise Product";
        return view('frontend.product.fashion_topcategory_wek', compact('products', 'header'));
    }

    public function specialOffer()
    {

        $products = Product::where('status', 1)->where('special_offer', '1')->where('ecom_name', '3')->get();

        return view('frontend.product.fashion_specialoffer', compact('products'));
    }

    public function brandWiseProduct($id, Request $request)
    {
        $products = Product::where('status', 1)->where('brand_id', $id)->where('ecom_name', 3)->paginate(12);
        if ($request->ajax()) {
            return $products;
        }
        $header = "Brand Wise Product";
        return view('frontend.product.fashion_topcategory_wek', compact('products', 'header'));
    }
    public function CategoryWiseProduct(Request $request)
    {
        $products = Category::with('fashionProduct')->where('ecom_id', '3')->get();



        if ($request->ajax()) {
            return $products;
        }

        $header = "All Products ";
        return view('frontend.product.fashion_category_wise', compact('products', 'header'));
    }

    public function FashCategoryView()
    {
        $getcategory = Category::get();
        $newest = $getcategory->pluck('id');
        return view('frontend.category.fash_category', compact('getcategory', 'newest'));
    }

    public function FashSubCategoryView($cat_slug)
    {
        $cat = Category::where('category_slug_name', $cat_slug)->first();
        $getsubcategory1 = SubCategory::where('category_id', $cat->id)->distinct('category_id')->get();
        $getsubcategory = SubCategory::with('category')->where('category_id', $cat->id)->get();
        $newest = SubCategory::where('category_id', $cat->id)->first();
        return view('frontend.category.fash_sub_category', compact('getsubcategory', 'getsubcategory1', 'newest'));
    }

    public function FashSubSubCategoryView12($cat_slug, $subcat_slug, Request $request)
    {
        $subcat22 = SubCategory::where('sub_category_slug_name', $subcat_slug)->first();
        $subsubcategories = SubSubCategory::where('subcategory_id', $subcat22->id)->with('category', 'subcategory')->get();
        $productUnderSubCategory = Product::where('status', 1)->where('sub_category_id', $subcat22->id)->where('sub_sub_category_id', null)->paginate();
        if ($request->ajax()) {
            return $productUnderSubCategory;
        }
        $productUnderSubCategory1 = Product::where('sub_category_id', $subcat22->id)->first();
        $getsubsubcategory1 = Product::where('sub_sub_category_id', $subcat22->id)->select('sub_sub_category_id', 'sub_category_id')->distinct('sub_sub_category_id')->get();

        return view('frontend.category.fash_sub_sub_category', compact('subsubcategories', 'productUnderSubCategory', 'getsubsubcategory1', 'productUnderSubCategory1'));
    }


    public function FashGetProductView1($cat_slug, $subcat_slug, $subsubcat_slug, Request $request)
    {
        $subsubcat = SubSubCategory::where('subsubcategory_slug_name', $subsubcat_slug)->first();
        $getproductsub = Product::where('status', 1)->where('sub_sub_category_id', $subsubcat->id)->with('category', 'subcategory', 'subsubcategory')->paginate();
        if ($request->ajax()) {
            return $getproductsub;
        }

        $getproductsub1 = Product::where('sub_sub_category_id', $subsubcat->id)->with('category', 'subcategory', 'subsubcategory')->first();
        return view('frontend.category.fash_getproduct', compact('getproductsub', 'getproductsub1'));
    }

    public function FshionSubGetProductsSort2($id)
    {

        return Product::where('status', 1)->where('ecom_name', 3)->where('sub_category_id', $id)->orderBy('id', 'ASC')->get();
    }

    public function FashionfarukGetProductsSortIslamic($id)
    {

        return Product::where('status', 1)->where('ecom_name', 3)->where('sub_sub_category_id', $id)->orderBy('id', 'ASC')->get();
    }
    public function FashionGetGetFilteredProducts(Request $request)
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

    //=======================> Product Filtering by Defult Price Start <===========================================================
    public function FashionGetFilteredProducts2(Request $request)
    {
        $querys = Product::where('status', 1)->where('ecom_name', 3)->where('sub_category_id', $request->subCategory)

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
    //=======================> Product Filtering by Defult Price Start <===========================================================
    public function FashionfarukGetFilteredProductsGetpage(Request $request)
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
    //=======================> Product Filtering by Defult Price End <===========================================================

    public function FashionOffer(Request $request)
    {
        $special_offer_fashion = Product::where('status', 1)->where('special_offer', '1')->where('ecom_name', '3')->paginate(12);
        if ($request->ajax()) {
            return $special_offer_fashion;
        }
        return view('frontend.product.fashion_specialoffer', compact('special_offer_fashion'));
    }
}
