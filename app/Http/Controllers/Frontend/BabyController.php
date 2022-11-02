<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
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

class BabyController extends Controller
{
    public function landing()
    {

        $ecomName = 6;
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
        $banner1 = BannerCatagoryProvider::getBanner1($ecomName);
        $banner2 = BannerProvider::getBanner2($ecomName);

        $deliverdProducts = OrderItemProvider::getDeliverdProducts();
        $onsale = OrderProvider::getOnsale($ecomName);


        return view('frontend.baby', compact(
            'categories',
            'sliders',
            'products',
            'featureds',
            'hot_deals',
            'special_offers',
            'special_deals',
            'banner2',
            'latest_products',
            'banner_1',
            'newTwoproducts',
            'dailyBestSales',
            'deliverdProducts',
            'latestdiscountproducts',
            'topratedProducts',
            'trendingProducts',
            'most_popular_all'
        ));
    }
    public function BCategoryView()
    {
        // $getcategory = Category::get();
        // $newest = $getcategory->pluck('id');
        // return view('frontend.category.b_category', compact('getcategory','newest'));
        $baby_getcategory = Category::where('ecom_id', 6)->get();
        $baby_newest = $baby_getcategory->pluck('id');
        return view('frontend.category.b_category', compact('baby_getcategory', 'baby_newest'));
    }
    public function BSubCategoryView($cat_slug)
    {
        $baby_cat = Category::where('category_slug_name', $cat_slug)->first();
        $baby_getsubcategory1 = SubCategory::where('category_id', $baby_cat->id)->distinct('category_id')->first();
        $baby_getsubcategory = SubCategory::with('category')->where('category_id', $baby_cat->id)->get();
        $baby_newest = SubCategory::where('category_id', $baby_cat->id)->first();
        return view('frontend.category.b_sub_category', compact('baby_getsubcategory1', 'baby_getsubcategory', 'baby_newest'));
    }
    public function BSubSubCategoryView12($cat_slug, $subcat_slug, Request $request)
    {

        $baby_subcat22   = SubCategory::where('sub_category_slug_name', $subcat_slug)->first();
        $baby_subsubcategories = SubSubCategory::where('subcategory_id', $baby_subcat22->id)->with('category', 'subcategory')->get();
        $baby_productUnderSubCategory = Product::where('sub_category_id', $baby_subcat22->id)->where('sub_sub_category_id', 0)->paginate(12);
        if ($request->ajax()) {
            return $baby_productUnderSubCategory;
        }
        $baby_productUnderSubCategory1 = Product::where('sub_category_id', $baby_subcat22->id)->first();
        $baby_getsubsubcategory1 = Product::where('sub_sub_category_id', $baby_subcat22->id)->select('sub_sub_category_id', 'sub_category_id')->distinct('sub_sub_category_id')->get();

        return view('frontend.category.b_sub_sub_category', compact('baby_subsubcategories', 'baby_productUnderSubCategory', 'baby_productUnderSubCategory1', 'baby_getsubsubcategory1'));
    }
    public function BGetProductView1($cat_slug, $subcat_slug, $subsubcat_slug, Request $request)
    {
        $subsubcat = SubSubCategory::where('subsubcategory_slug_name', $subsubcat_slug)->first();
        $getproductsub = Product::where('sub_sub_category_id', $subsubcat->id)->with('category', 'subcategory', 'subsubcategory')->paginate(12);
        if ($request->ajax()) {
            return $getproductsub;
        }

        $getproductsub1 = Product::where('sub_sub_category_id', $subsubcat->id)->with('category', 'subcategory', 'subsubcategory')->first();
        return view('frontend.category.b_getproduct', compact('getproductsub', 'getproductsub1'));
    }
    public function BabyOffer_last(Request $request)
    {
        $special_offer = Product::where('special_offer', '1')->where('ecom_name', '6')->paginate(12);
        if ($request->ajax()) {
            return $special_offer;
        }
        return view('frontend.product.baby_specialoffer', compact('special_offer'));
    }
}
