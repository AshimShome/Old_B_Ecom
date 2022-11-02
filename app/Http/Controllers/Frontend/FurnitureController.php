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

class FurnitureController extends Controller
{
    public function landing()
    {

        $ecomName = 7;
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


        return view(
            'frontend.furniture',
            compact(
                'categories',
                'sliders',
                'products',
                'featureds',
                'hot_deals',
                'special_offers',
                'special_deals',
                'banner2',
                'latest_products',
                'banner1',
                'top_rated',
                'newTwoproducts',
                'latestdiscountproduct',
                'toprated',
                'most_popular_all'
            )
        );
    }

    public function FurnitureProductMore(Request $request)
    {

        $products = Product::where('status', 1)->where('ecom_name', '7')->paginate();
        if ($request->ajax()) {
            return  $products;
        }

        return view('frontend.product.furnitur_more_product', compact('products'));
    }
    public function FurCategoryView()
    {
        $getcategory = Category::where('ecom_id', 7)->get();
        $newest = $getcategory->pluck('id');
        return view('frontend.category.fur_category', compact('getcategory', 'newest'));
    }

    public function FurSubCategoryView($cat_slug)
    {
        $cat = Category::where('category_slug_name', $cat_slug)->first();
        $getsubcategory1 = SubCategory::where('category_id', $cat->id)->distinct('category_id')->get();
        $getsubcategory = SubCategory::with('category')->where('category_id', $cat->id)->get();
        $newest = SubCategory::where('category_id', $cat->id)->first();
        return view('frontend.category.fur_sub_category', compact('getsubcategory', 'getsubcategory1', 'newest'));
    }


    public function FurSubSubCategoryView12($cat_slug, $subcat_slug, Request $request)
    {
        $subcat22 = SubCategory::where('sub_category_slug_name', $subcat_slug)->first();
        $subsubcategories = SubSubCategory::where('subcategory_id', $subcat22->id)->with('category', 'subcategory')->get();
        $productUnderSubCategory = Product::where('sub_category_id', $subcat22->id)->where('sub_sub_category_id', null)->paginate();
        if ($request->ajax()) {
            return $productUnderSubCategory;
        }
        $productUnderSubCategory1 = Product::where('sub_category_id', $subcat22->id)->first();
        $getsubsubcategory1 = Product::where('sub_sub_category_id', $subcat22->id)->select('sub_sub_category_id', 'sub_category_id')->distinct('sub_sub_category_id')->get();

        return view('frontend.category.fur_sub_sub_category', compact('subsubcategories', 'productUnderSubCategory', 'getsubsubcategory1', 'productUnderSubCategory1'));
    }
    public function FurGetProductView1($cat_slug, $subcat_slug, $subsubcat_slug, Request $request)
    {
        $subsubcat = SubSubCategory::where('subsubcategory_slug_name', $subsubcat_slug)->first();
        $getproductsub = Product::where('sub_sub_category_id', $subsubcat->id)->with('category', 'subcategory', 'subsubcategory')->paginate();
        if ($request->ajax()) {
            return $getproductsub;
        }
        $getproductsub1 = Product::where('sub_sub_category_id', $subsubcat->id)->with('category', 'subcategory', 'subsubcategory')->first();
        return view('frontend.category.fur_getproduct', compact('getproductsub', 'getproductsub1'));
    }
    public function FurnitureOffer(Request $request)
    {
        $products = Product::where('special_offer', '1')->where('ecom_name', '7')->paginate();
        if ($request->ajax()) {
            return $products;
        }

        return view('frontend.product.furniture_specialoffer', compact('products'));
    }
}
