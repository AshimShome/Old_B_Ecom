<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\MultiImg;
use App\Models\review;
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

class ElectronicController extends Controller
{
    public function landing()
    {

        $ecomName = 4;
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
        $banner1 = BannerCatagoryProvider::getBanner1();
        $banner2 = BannerProvider::getBanner2($ecomName);

        $deliverdProducts = OrderItemProvider::getDeliverdProducts();
        $onsale = OrderProvider::getOnsale($ecomName);
        // for categories and total
        $firstCategory = CategoryProvider::getFirstCategory($ecomName);
        // home page banner-category
        $banners = BannerProvider::getBanners($ecomName);
        $lastMonthBestSales = ProductProvider::getlastMonthBestSales();
        $categoryWiseLastMonthBestSalesProduct = CategoryProvider::getCategoryWiseLastMonthBestSalesProduct();
        $topSales = ProductProvider::getTopSales($ecomName);
        return view(
            'frontend.electronic',
            compact(
                'categories',
                'firstCategory',
                'sliders',
                'products',
                'topSales',
                'featureds',
                'banners',
                'hot_deals',
                'special_offers',
                'special_deals',
                'banner2',
                'latest_products',
                'categoryWiseLastMonthBestSalesProduct',
                'banner1',
                'top_rated',
                'newTwoproducts',
                'dailyBestSales',
                'lastMonthBestSales',
                'deliverdProducts',
                'onsale',
                'latestdiscountproduct',
                'toprated',
                'trendingProducts',
                'most_popular_all'
            )
        );
    }
    public function ECategoryView()
    {
        $getcategory = Category::get();
        $newest = $getcategory->pluck('id');
        return view('frontend.category.e_category', compact('getcategory', 'newest'));
    }



    public function ESubSubCategoryView12($cat_slug, $subcat_slug)
    {
        $subcat22 = SubCategory::where('sub_category_slug_name', $subcat_slug)->first();
        $subsubcategories = SubSubCategory::where('subcategory_id', $subcat22->id)->with('category', 'subcategory')->get();
        $productUnderSubCategory = Product::where('sub_category_id', $subcat22->id)->where('sub_sub_category_id', null)->get();
        $productUnderSubCategory1 = Product::where('sub_category_id', $subcat22->id)->first();
        $getsubsubcategory1 = Product::where('sub_sub_category_id', $subcat22->id)->select('sub_sub_category_id', 'sub_category_id')->distinct('sub_sub_category_id')->get();

        return view('frontend.category.e_sub_sub_category', compact('subsubcategories', 'productUnderSubCategory', 'getsubsubcategory1', 'productUnderSubCategory1'));
    }

    public function EGetProductView1($cat_slug, $subcat_slug, $subsubcat_slug)
    {
        $subsubcat = SubSubCategory::where('subsubcategory_slug_name', $subsubcat_slug)->first();
        $getproductsub = Product::where('sub_sub_category_id', $subsubcat->id)->with('category', 'subcategory', 'subsubcategory')->get();
        $getproductsub1 = Product::where('sub_sub_category_id', $subsubcat->id)->with('category', 'subcategory', 'subsubcategory')->first();
        return view('frontend.category.e_getproduct', compact('getproductsub', 'getproductsub1'));
    }
    public function ElectronicOffer(Request $request)
    {
        $products = Product::with('review', 'orderItems')->where('special_offer', '1')->where('ecom_name', '4')->paginate(12);
        if ($request->ajax()) {
            return $products;
        }
        return view('frontend.product.electronic_specialoffer');
    }
    public function AllCategoryElectronic()
    {
        $getcategory = Category::withCount('products')->where('ecom_id', '4')->get();
        return view('frontend.fashioncat.all_category', compact('getcategory'));
    }

    public function ESubCategoryView($cat_slug)
    {
        $cat = Category::where('category_slug_name', $cat_slug)->first();
        $getsubcategory1 = SubCategory::where('category_id', $cat->id)->distinct('category_id')->get();
        $getsubcategory = SubCategory::with('category')->where('category_id', $cat->id)->get();
        $newest = SubCategory::where('category_id', $cat->id)->first();
        return view('frontend.category.e_sub_category', compact('getsubcategory', 'getsubcategory1', 'newest'));
    }

    public function electronicProductDetails($cat_slug, $subcat_slug, $slug)
    {
        // for multi img show
        $product = Product::where('product_slug_name', $slug)->with('subsubcategory')->first();
        //  $product = Product::where('id', $id);
        Product::find($product->id)->increment('product_views');
        $product_color = $product->product_color;
        $product_color_all = explode(',', $product_color);
        $tags = explode(',', $product->product_tags);
        $product_size = $product->product_size;
        $product_size_all = explode(',', $product_size);
        // for related product show
        $cat_id = $product->category_id;
        $relatedProduct = Product::where('category_id', $cat_id)->where('id', '!=', $product->id)->orderBy('id', 'DESC')->get();
        $multiimgs =  MultiImg::where('product_id', $product->id)->limit(8)->get();

        if ($product->discount_price) {

            $discountPercentage = (($product->selling_price - $product->discount_price) / $product->selling_price) * 100;
        } else {
            $discountPercentage = null;
        }

        $reviews = review::where('product_id', $product->id)->with('user')->orderBy('id', 'DESC')->get();

        $recomndedProduct = Product::where('category_id', $product->category_id)
            ->join('reviews', function ($join) {
                $join->on('products.id', '=', 'reviews.product_id');
            })

            ->where('products.id', '!=', $product->id)
            ->limit(6)
            ->get('products.*', DB::raw('sum(reviews.star) as sum_star'), DB::raw('count(reviews.star) as total_star'));


        return view('frontend.product.electronicDetails', compact(

            'product',
            'recomndedProduct',
            'multiimgs',
            'product_color_all',
            'product_size_all',
            'relatedProduct',
            'reviews',
            'discountPercentage',
            'tags'
        ));
    }
}
