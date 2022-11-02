<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\MultiImg;
use App\Models\Brand;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\review;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
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

class CosmeticController extends Controller
{
  public function landing()
  {

    $ecomName = 5;
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
      'frontend.cosmetic',
      compact(
        'categories',
        'sliders',
        'launched_product',
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
        'most_popular_all',
        'brands'
      )
    );
  }


  // ==================================================Cosmetic Product Details View====================================================
  public function CosmatictProductView($cat_slug, $subcat_slug, $slug)
  {

    $product = Product::where('product_slug_name', $slug)->whereHas('supplier', function ($q) {
      $q->where('supplyer_status', 1);
    })->first();
    //  $product = Product::where('id', $id);
    Product::find($product->id)->whereHas('supplier', function ($q) {
      $q->where('supplyer_status', 1);
    })->increment('product_views');
    $product_color = $product->product_color;
    $product_color_all = explode(',', $product_color);
    $product_size = $product->product_size;
    $product_size_all = explode(',', $product_size);
    // for related product show
    $cat_id = $product->category_id;
    $relatedProduct = Product::where('category_id', $cat_id)->where('id', '!=', $product->id)->whereHas('supplier', function ($q) {
      $q->where('supplyer_status', 1);
    })->orderBy('id', 'DESC')->get();
    $multiimgs =  MultiImg::where('product_id', $product->id)->limit(8)->get();
    $reviews = review::where('product_id', $product->id)->with('user')->orderBy('id', 'DESC')->get();
    $recomndedProduct = Product::with('category', 'subcategory')->whereHas('supplier', function ($q) {
      $q->where('supplyer_status', 1);
    })->where('category_id', $product->category_id)->where('id', '!=', $product->id)->get();
    return view('frontend.product.cosmatict_product_detalis', compact(
      'product',
      'product_color',
      'product_color_all',
      'product_size',
      'product_size_all',
      'cat_id',
      'relatedProduct',
      'multiimgs',
      'reviews',
      'recomndedProduct'
    ));
  }
  // ==========================================Cosmatic Brand wise Product Show======================================================//

  public function CosmatictBrandWiseProductView($id)
  {
    // for brand wise product show
    $brandwiseproduct = Product::where('status', 1)->where('ecom_name', '5')->where('brand_id', $id)->get();
    return view('frontend.product.brandwiseproductshow', compact('brandwiseproduct'));
  }
  // ===============================for showing all cosmetics brand==================================================
  public function CosmatictBrand()
  {
    $brands = Brand::where('ecom_id', '5')->orderBy('id', 'DESC')->limit(12)->get();

    return view('frontend.brands.cosmetic_brands', compact('brands'));
  }
  // ===============================for showing all cosmetics brand==================================================

  public function CosmetictCategoryView()
  {
    $getcategory = Category::get();
    $newest = $getcategory->pluck('id');
    return view('frontend.category.cosmetictcategory', compact('getcategory', 'newest'));
  }

  public function CosmetictSubCategoryView($cat_slug)
  {
    $cat = Category::where('category_slug_name', $cat_slug)->first();
    $getsubcategory1 = SubCategory::where('category_id', $cat->id)->distinct('category_id')->get();
    $getsubcategory = SubCategory::with('category')->where('category_id', $cat->id)->get();
    $newest = SubCategory::where('category_id', $cat->id)->first();
    $bestSellingProducts = Order::select('products.*', DB::raw('COUNT(`order_items`.`id`) AS count'))
      ->groupBy('products.id')
      ->join('order_items', 'orders.id', '=', 'order_items.order_id')
      ->join('products', 'products.id', '=', 'order_items.product_id')
      ->where('orders.status', 'Pending')
      ->where('products.ecom_name', '5')
      ->orderBy('count', 'DESC')
      ->get();
    // dd($bestSellingProducts);
    return view('frontend.category.cosmetictsub_category', compact('getsubcategory', 'getsubcategory1', 'newest', 'bestSellingProducts'));
  }

  public function CosmetictSubSubCategoryView12($cat_slug, $subcat_slug)
  {
    $subcat22 = SubCategory::where('sub_category_slug_name', $subcat_slug)->first();
    $subsubcategories = SubSubCategory::where('subcategory_id', $subcat22->id)->with('category', 'subcategory')->get();
    $productUnderSubCategory = Product::where('sub_category_id', $subcat22->id)->where('sub_sub_category_id', null)->get();
    $productUnderSubCategory1 = Product::where('sub_category_id', $subcat22->id)->first();
    $getsubsubcategory1 = Product::where('sub_sub_category_id', $subcat22->id)->select('sub_sub_category_id', 'sub_category_id')->distinct('sub_sub_category_id')->get();

    return view('frontend.category.cosmetictsub_sub_category', compact('subsubcategories', 'productUnderSubCategory', 'getsubsubcategory1', 'productUnderSubCategory1'));
  }

  public function CosmetictGetProductView1($cat_slug, $subcat_slug, $subsubcat_slug)
  {
    $subsubcat = SubSubCategory::where('subsubcategory_slug_name', $subsubcat_slug)->first();
    $getproductsub = Product::where('sub_sub_category_id', $subsubcat->id)->with('category', 'subcategory', 'subsubcategory')->limit(18)->get();
    $getproductsub1 = Product::where('sub_sub_category_id', $subsubcat->id)->with('category', 'subcategory', 'subsubcategory')->first();
    return view('frontend.category.cosmetictgetproduct', compact('getproductsub', 'getproductsub1'));
  }
  public function CosmeticsOffer_last()
  {
    return view('frontend.product.cosmetic_specialoffer');
  }
  public function CosmeticsPopularProduct()
  {
    $most_popular_all = Product::where('status', 1)->where('ecom_name', '5')->limit(16)->get();
    return view('frontend.product.cosmetic_popular_product', compact('most_popular_all'));
  }
  public function CosmeticsFeatureProduct()
  {
    $featureds = Product::where('featured', 1)->where('ecom_name', '5')->orderBy('id', 'DESC')->limit(6)->get();
    return view('frontend.product.cosmetic_feature_product', compact('featureds'));
  } // end

  public function Coupon()
  {
    return view('frontend.common.coupon');
  }
}
