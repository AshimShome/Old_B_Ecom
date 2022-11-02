<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
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

class IslamicController extends Controller
{
    public function landing()
    {
        $ecomName = 1;
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
            'frontend.islamic',
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
                'dailyBestSales',
                'deliverdProducts',
                'onsale',
                'latestdiscountproduct',
                'toprated',
                'trendingProducts',
                'most_popular_all'
            )
        );
    }
    public function FarukIslamicGetProductsSortIslamic($id)
    {

        return Product::where('status', 1)->where('ecom_name', 1)->where('sub_sub_category_id', $id)->orderBy('id', 'ASC')->get();
    }

    //=======================> Product Filtering by Defult Price Start <===========================================================
    public function IslamicGetFilteredProducts2(Request $request)
    {
        $querys = Product::where('status', 1)->where('ecom_name', 1)->where('sub_category_id', $request->subCategory)

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
    public function IslamicGetproductGetFilteredProductsGetpage(Request $request)
    {


        $querys = Product::where('status', 1)->where('ecom_name', 1)->where('sub_sub_category_id', $request->subCategory)

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
    // Islamic
    public function Offer(Request $request)
    {
        $special_offer = Product::where('status', 1)->where('special_offer', '1')->where('ecom_name', '1')->paginate(12);

        if ($request->ajax()) {
            return $special_offer;
        }

        return view('frontend.product.specialoffer', compact('special_offer'));
    }
    public function LatestDiscountedProducts(Request $request)
    {
        $latest = Product::where('discount_price', '!=', '0')->where('status', 1)->where('ecom_name', '1')->paginate(12);
        // $latest = Product::where('status',1)->where('ecom_name', '1')->paginate(12);
        if ($request->ajax()) {
            return $latest;
        }
        return view('frontend.product.latestdiscountedproducts', compact('latest'));
    }
}
