@extends('frontend.main_master')
@section('islamic')
<style>
    #overlay_background {
        -webkit-transform: scale(1);
        transform: scale(1);
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.4);
        opacity: 1;
        z-index: 1;
        -webkit-transition: opacity .3s linear;
        transition: opacity .3s linear;
        border-radius: 5px;
    }

    #faruk_shovo {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: initial;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }

    .price_top_padding {

        margin-top: 10px;
        font-weight: bold;
    }

    .collection-banner-main:nth-child(2) {
        margin-top: 14px !important;
    }

    .slick-dotted.slick-slider {
        margin-bottom: 0px !important;
    }


    .topSliderBannerSection-banner {
        padding: 5px;
    }


    @media screen and (max-width: 600px) {

        .topSliderBannerSection-banner {
            display: none;
        }
    }
    }

    .img-fluid {
        margin-top: 5px;
    }

    .selling-product-info h6 {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 250px;
    }

    .color_see_more {
        font-size: 20px;
        margin-bottom: 41px;
        color: white;
    }

    .color_see_more:hover {
        background-color: #f77c31;
        color: white;
    }

</style>

<div class="custom-header d-flex align-items-center custom-header-islamic custom-header-ecom-title">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="category-contain">
                    <!-- ---------- Category Sidebar and Logo ------------- -->
                    <div class="category-left">
                        <div class="header-category">
                            <div class="category-btn-logo-container">
                                <a id="category-toggle-custom-sidemenu-button" onclick="toggleCategorySidemenu()" class="category-toggle-btn"><i class="fa fa-bars"></i></a>
                                </a>
                                <a href="{{ url('/islamic') }}" class="logo-container custom-header-ecom-title-home">
                                    <i class="fas fa-home"></i> Islamic Home
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- ---------- Search with Category ------------- -->
                    <div>
                        <a href="{{ url('/islamic') }}" class="logo-container custom-header-ecom-title-home">
                            <h2 class="text-white">Islamic</h2>
                        </a>

                    </div>
                    <!-- ---------- Category Right Buttons ------------- -->
                    <div id="icon-block" class="icon-block">
                    </div>
                    <div class="icon-block-mobile">

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="sidemenu-container" class="sidemenu-container hide-menu">
        <ul id="category-toggle-custom-sidemenu" class="category-sidemenu">

            @php
            $special_offer = App\Models\Product::where('status',1)->where('special_offer', '1')
            ->where('ecom_name', '1')
            ->count();
            $coupons = App\Models\Coupon::where('status', '1')
            ->orderBy('id', 'DESC')
            ->count();
            @endphp

            <li class="menu-heading">
                <a href="{{ url('/special/offer') }}"><span class="text">Special Offers</span> <span class="number">{{ $special_offer }}</span></a>

            </li>

            @php
            $currentUrl = Request::segment(1);
            // dd($currentUrl);
            $categories = App\Models\Category::with([
            'subcategory' => function ($q) {
            $q->where('status', 1);
            },
            ])
            ->where('status', 1)
            ->where('ecom_id', '1')
            ->get();

            @endphp
            <li class="mb-1 mt-3">
                <div class="collapse">
                    {{-- for category --}}
                    @foreach ($categories as $category)
            <li class="mb-1 mt-2">
                {{-- vvvvvv --}}
                @if (Request::segment(2) != $category->category_slug_name)
                <a href="{{ url('/bs/' . $category->category_slug_name) }}">
                    @endif
                    <button class="btn btn-toggle align-items-center rounded {{ Request::segment(2) != $category->category_slug_name ? 'collapsed' : '' }} " data-bs-toggle="collapse" data-bs-target="#cat{{ $category->id }}" aria-expanded="{{ Request::segment(2) != $category->category_slug_name ? 'false' : 'true' }}">
                        <img style="height:20px;width:20px" src="{{ asset($category->category_icon) }}" alt="bppshops" class="sidemenu-icon">
                        {{ $category->category_name }}
                    </button>

                    @if (Request::segment(2) != $category->category_slug_name)
                </a>
                @endif
                <div class="collapse {{ Request::segment(2) != $category->category_slug_name ? '' : 'show' }}" id="cat{{ $category->id }}">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small sub-category">
                        @php
                        $subcategories = App\Models\SubCategory::with('category')
                        ->where('category_id', $category->id)
                        ->get();
                        @endphp
                        @foreach ($subcategories as $subcategory)
                        <li>

                            @if (collect(request()->segments())->last() != $subcategory->sub_category_slug_name)
                            <a href="{{ url('/bs/' . $subcategory->category->category_slug_name . '/' . $subcategory->sub_category_slug_name) }}">
                                @endif
                                <button class="btn btn-toggle align-items-center rounded {{ Request::segment(3) != $subcategory->sub_category_slug_name ? 'collapsed' : '' }}" data-bs-toggle="collapse" data-bs-target="#sub{{ $subcategory->id }}" aria-expanded="{{ Request::segment(3) != $subcategory->sub_category_slug_name ? 'false' : 'true' }}">
                                    {{ $subcategory->sub_category_name }}
                                </button>
                                @if (collect(request()->segments())->last() != $subcategory->sub_category_slug_name)
                            </a>
                            @endif
                            <div class="collapse {{ Request::segment(3) != $subcategory->sub_category_slug_name ? '' : 'show' }}" id="sub{{ $subcategory->id }}">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small sub-sub-category">
                                    @php
                                    $sub_subcategories = App\Models\SubSubCategory::with('category', 'subcategory')
                                    ->where('subcategory_id', $subcategory->id)
                                    ->get();
                                    @endphp
                                    @foreach ($sub_subcategories as $subsubcategory)
                                    <li><a href="{{ url('/bs/' . $subsubcategory->category->category_slug_name . '/' . $subsubcategory->subcategory->sub_category_slug_name . '/' . $subsubcategory->subsubcategory_slug_name) }}" class="link-dark rounded">{{ $subsubcategory->subsubcategory_name }}</a>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                        </li>
                        @endforeach

                    </ul>
                </div>
            </li>
            @endforeach
    </div>
    </li>

    </ul>
</div>


<main class="main-body islamic-home">
    <div class="row">
        <div id="productDiv">
            <section class="main-content category-closed" id="main-content">
                <!--home slider start-->
                <section class="megastore-slide collection-banner section-py-space">
                    <div class="container-fluid px-2">
                        <div class="row mega-slide-block">
                            <div class="col-xl-6 col-lg-12 collection-banner-close" id="megastore-collection-banner">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="slide-1 no-arrow">
                                            @foreach ($sliders as $slider)
                                            <div class="slide-main">
                                                <img src=" {{ asset($slider->slider_img) }} " class="img-fluid bg-img" alt="mega-store">
                                                <div class="slide-contain">
                                                    <div>
                                                        <h4>{{ $slider->title }}</h4>
                                                        <p>{{ $slider->description }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 top-banner">
                                <div class="row collection-p6">
                                    <div class="col-12 collection-banner-main-cont">
                                        @php
                                        $bennars = App\Models\Banner::where('status',1)->where('ecom_id','1')->orderBy('id','DESC')->limit(2)->get();
                                        @endphp
                                        @foreach ($bennars as $bennar)
                                        <div class="collection-banner-main banner-17 banner-style7 collection-color14 p-left">
                                            @isset($bennar->bennar_img)
                                            <div class="collection-img" style="background-image: url({{ asset($bennar->bennar_img) }});
                                                background-size: cover; background-position: center center; display: block;">
                                            </div>
                                            @endisset
                                            <div class="collection-banner-contain ">
                                                <div>

                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section> --}}
                {{-- 7145section --}}
                <section>
                    <div class="container-fluid">
                        <div class="row mt-2">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="topSliderBannerSection-slider">
                                    @foreach ($sliders as $slider)
                                    <img class="img-fluid" src=" {{ asset($slider->slider_img) }} " alt="mega-store">
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                @php
                                $bennars = App\Models\Banner::where('status', 1)
                                ->where('ecom_id', '1')
                                ->orderBy('id', 'DESC')
                                ->limit(2)
                                ->get();
                                @endphp
                                @foreach ($bennars as $bennar)
                                <div class="topSliderBannerSection-banner">
                                    @isset($bennar->bennar_img)
                                    <img class="img-fluid" src="{{ asset($bennar->bennar_img) }}">
                                    @endisset
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>

                <!--home slider end-->
                <section class="featured-category">

                    <div class="container">
                        <div class="row">
                            <h4 class="my-5 text-center" style="font-size:33px;color:#212529;">All
                                Category</h4>
                            @foreach ($categories as $category)
                            <div class="col-sm-12 col-md-6 col-lg-3">

                                <div class="d-flex justify-content-center islamic-category">
                                    <img src=" {{ asset($category->category_image) }} " alt="bppshops">
                                </div>
                                <a href="{{ url('/bs/' . $category->category_slug_name) }}">
                                    <div class="featured-category-item text-center">
                                        <div class="d-flex justify-content-center islamic-category">
                                            <img src=" {{ asset($category->category_image) }} " alt="bppshops">
                                        </div>
                                        <div class="islamic-category-text">
                                            <h6 class="fw-bold mt-3">
                                                {{ $category->category_name }}({{$category->products_list->count()}})
                                            </h6>

                                        </div>

                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
        </div>
    </div>
    </section>


                                            <?php
                                             $productName = strval("'" . $most_popular_alls->product_name . "'");
                                             ?>
                                               

                                        </div>
                                        <div id="overlay_background">
                                            <button class="overlay-add-to-bag" disabled>
                                                <div class="text-light">
                                                   Stock <br> Out
                                                </div>
                                           </button>

                                          </div>
                                        <div class="d-flex justify-content-center cart-details-btn ">
                                            <a href="#"><button
                                                    class="btn btn-primary-filled px-4" disabled><i
                                                        class="fas fa-cart-plus me-2" href="#"></i>Stock Out
                                                </button></a>

                            </div>
                            <div id="overlay_background">
                                <button class="overlay-add-to-bag" disabled>
                                    <div class="text-light">
                                        Stock <br> Out
                                    </div>
                                </button>

                            </div>
                            </button>

                        </div>

                    </div>
                    <div class="d-flex justify-content-center cart-details-btn ">
                        <a href="#"><button class="btn btn-primary-filled px-4" disabled><i class="fas fa-cart-plus me-2" href="#"></i>Stock Out
                            </button></a>

                    </div>
                    @else
                    <div class="isotopeSelector filter all ec-card-lg">
                        <div class="overlay ec-card-inner">
                            <div class="border-portfolio">
                                <div class="card product-port">
                                    <div class="image-overlay-container">
                                        <a href="{{ route('ProductDetails_islamic', [$most_popular_alls->category_id, $most_popular_alls->sub_category_id, $most_popular_alls->product_slug_name]) }}">
                                            <img src="{{ asset($most_popular_alls->product_thambnail) }}" alt="portfolio-image" height="20px">
                                        </a>
                                    </div>
                                    <div class="text-center mt-3 mb-1">
                                        <a href="{{ route('ProductDetails_islamic', [$most_popular_alls->category_id, $most_popular_alls->sub_category_id, $most_popular_alls->product_slug_name]) }}">
                                            <h4 class="text-dark" style="font-size: 18px; color:#212529 !important">
                                                {{ $most_popular_alls->product_name }}

                                                <?php
                                            $productName = strval("'" . $most_popular_alls->product_name . "'");
                                         ?>

                                                <div>

                                                </div>
                                    </div>
                                    <div class="d-flex justify-content-center cart-details-btn ">
                                        <a href="{{route('ProductDetails_islamic',[$most_popular_alls->category_id,$most_popular_alls->sub_category_id,$most_popular_alls->product_slug_name ] )}}"><button class="btn btn-primary-filled px-4"><i class="fas fa-cart-plus me-2"></i>Shop Now
                                            </button></a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif


                        @endforeach
                    </div>
                    <section class="daily-best-sells">
                        <div class="product-gallery-wrapper portfolio-section grid-portfolio ratio2_3 portfolio-padding">
                            <div class="ec-card-group zoom-gallery portfolio-2 px-lg-5 px-3 py-3">
                                @foreach ($dailyBestSales as $dailyBestSale)
                                @php
                                $stockqty = App\Models\Product::where('product_qty', '<', '1' )->get();
                                    @endphp
                                    @if ($dailyBestSale->product_qty < 1) <div class="isotopeSelector ec-card-lg">
                                        <div class="overlay">
                                            <div class="border-portfolio bg-white">
                                                <div class="card product-port">
                                                    <div class="image-overlay-container">
                                                        <a>
                                                            <img src="{{ asset($dailyBestSale->product_thambnail) }}" alt="portfolio-image">
                                                        </a>
                                                    </div>
                                                    <div class="mt-3 mb-1 px-2 text-center">
                                                        <div class="daily-best-sales-text-cont">
                                                            <h4 class="text-dark fw-normal" style="font-size: 14px;">
                                                                {{ $dailyBestSale->product_name }}</h4>
                                                            <br>
                                                            <p style="font-size:14px; color:#212529 !important">
                                                                {{ $dailyBestSale->unit }}</p>

                                                        </div>

                                                        <div class="text-center mt-2 mb-1">
                                                            <!-- Selling and Discount Price Start -->
                                                            @if ($dailyBestSale->discount_price == 0)
                                                            <h4 class="price_top_padding" style="color:black;font-weight:bold; font-size: 16px;">
                                                                <span> &#2547;</span>
                                                                {{ intval($dailyBestSale->selling_price) }}
                                                            </h4>
                                                            @else
                                                            <h4 class="price_top_padding" style="color:black;font-weight:bold; font-size: 16px;">
                                                                <span style="color:black;font-weight:bold; font-size: 16px;">
                                                                    <span> &#2547;</span>
                                                                    {{ intval($dailyBestSale->discount_price) }}</span>
                                                                <span><s class="text-danger" style="color:black;font-weight:bold; font-size: 16px;"><span>
                                                                            &#2547;</span>
                                                                        {{ intval($dailyBestSale->selling_price) }}</s></span>
                                                            </h4>
                                                            @endif
                                                            <!-- Selling and Discount Price End -->

                                                        </div>
                                                    </div>
                                                    <?php
                                                        $productName = strval("'" . $dailyBestSale->product_name . "'");
                                                        ?>

                                                    @php
                                                    $satockqty = App\Models\Product::where('product_qty', '<', '1' )->first();
                                                        @endphp


                                                </div>
                                                <div id="overlay_background">
                                                    <button class="overlay-add-to-bag" disabled>
                                                        <div class="text-light">
                                                            Stock <br> Out
                                                        </div>
                                                    </button>

                                                </div>
                                                <div class="d-flex justify-content-center mb-2">
                                                    <button class="btn btn-primary-filled px-4" style="margin-top: 8px;" disabled><i class="fas fa-cart-plus me-2"></i>Stock Out
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                              $productName = strval("'" . $dailyBestSale->product_name . "'");
                                          ?>

                                        @php
                                        $satockqty=App\Models\Product::where('product_qty','<','1')->
                                            first();
                                            @endphp
                                    </div>
                                    <div id="overlay_background">
                                        <button class="overlay-add-to-bag"
                                        disabled>
                                        <div class="text-light">
                                           Stock <br> Out
                                        </div>
                                        </button>

                                      </div>
                                    <div class="d-flex justify-content-center mb-2">
                                        <button class="btn btn-primary-filled px-4" style="margin-top: 8px;" disabled><i class="fas fa-cart-plus me-2"></i>Stock Out
                                           </button>
                                    </div>
                                </div>
                            </div>
                </div>
                @else

                                                <div class="daily-best-sales-text-cont">
                                                    <a href="{{ route('ProductDetails_islamic', [$dailyBestSale->category_id, $dailyBestSale->sub_category_id, $dailyBestSale->product_slug_name]) }}">
                                                        <h4 class="text-dark" style="font-size: 18px;">
                                                            {{ $dailyBestSale->product_name }}
                                                            <br>
                                                            <p>{{ $dailyBestSale->unit }}</p>
                                                        </h4>
                                                    </a>


                                                </div>


                                                <div class="text-center mt-2 mb-1">
                                                    <!-- Selling and Discount Price Start -->
                                                    @if ($dailyBestSale->discount_price == 0)
                                                    <h4 class="price_top_padding" style="color:black;font-weight:bold; font-size: 16px;">
                                                        <span> &#2547;</span>
                                                        {{ intval($dailyBestSale->selling_price) }}
                                                    </h4>
                                                    @else
                                                    <h4 class="price_top_padding" style="color:black;font-weight:bold; font-size: 16px;">
                                                        <span style="color:black;font-weight:bold; font-size: 16px;">
                                                            <span> &#2547;</span>
                                                            {{ intval($dailyBestSale->discount_price) }}</span>
                                                        <span><s class="text-danger" style="color:black;font-weight:bold; font-size: 16px;"><span>
                                                                    &#2547;</span>
                                                                {{ intval($dailyBestSale->selling_price) }}</s></span>
                                                    </h4>
                                                    @endif
                                                    <!-- Selling and Discount Price End -->
                                                </div>
                                            </div>
                                            <?php
                                                        $productName = strval("'" . $dailyBestSale->product_name . "'");
                                                        ?>

                                            @php
                                            $satockqty = App\Models\Product::where('product_qty', '<', '1' )->first();
                                                @endphp

                                        </div>
                                        <div class="d-flex justify-content-center mb-2">
                                            <a href="{{ route('ProductDetails_islamic', [$dailyBestSale->category_id, $dailyBestSale->sub_category_id, $dailyBestSale->product_slug_name]) }}">
                                                <button class="btn btn-primary-filled px-4"><i class="fas fa-cart-plus me-2"></i>Shop Now
                                                </button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
            </div>
    </section>


    <!-- Best Selling Products End-->
    <section class="top-buttons px-md-5 px-3">
        <div class="row">
            <div id="" class="section-title-no-bg mt-2 px-md-5 px-3 d-flex justify-content-center">
                <a class="btn btn-warning color_see_more" href="{{ url('product/dalyProductislamic') }}">
                    See More Product
                </a>
            </div>
        </div>
        </div>
        <section>
            <div class="latest-discounted-products px-md-5 px-3 mt-2">
                <div class="row mx-auto" style="width: 95%">
                    <div class="col-lg-3 col-md-4 col-sm-4 my-3 latest-discounted-products-banner">
                        @php
                        $left_banner_is = App\Models\ShopBanner::where('ecom_id', '1')->first();
                        @endphp
                        <div class="discounted-card-inner  d-flex align-items-center p-5" style="background:url({{ asset(optional($left_banner_is)->shopbanner_image) }} ); background-size: 100% 100%; height: 100%;">
                            <div>

                                <a href="{{url('/latestdiscountedproducts')}}" class="btn btn-primary-filled px-4" style="background-color: #ff6000">See
                                    More Product</a>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-8 my-3 latest-discounted-products-slider-cont">
                        <div class="slide-4">

                            @foreach ($latestdiscountproduct as $latestdiscountproducts)
                            @if ($latestdiscountproducts->product_qty < 1) <div class="discounted-product-card-wrapper">
                                <div class="discounted-product-card">
                                    <div class="discounted-product-card-inner mt-1">
                                        <div class="discount-percent">
                                            @php
                                            $amount = $latestdiscountproducts->selling_price - $latestdiscountproducts->discount_price;
                                            if ($latestdiscountproducts->selling_price) {
                                            $discount = ($amount / $latestdiscountproducts->selling_price) * 100;
                                            } else {
                                            $discount = ($amount / 1) * 100;
                                            }
                                            @endphp

                                            <span class="badge badge-pill badge-danger" style="font-size:15px">-{{ round($discount) }}%</span>
                                        </div>



                                        <div>
                                            <a>
                                                <img src=" {{ asset($latestdiscountproducts->product_thambnail) }} " class="img-fluid" alt="portfolio-image">
                                            </a>
                                        </div>



                                        <div class="my-3 px-3 text-center">
                                            <a>
                                                <h4 class="text-dark fw-bold" style="height: 50px; margin-top: -5px;">
                                                    {{ $latestdiscountproducts->product_name }}</h4>
                                            </a>




                                            <b style="font-size:14px">{{ $latestdiscountproducts->unit }}</b>
                                            <div class="text-center my-2">
                                                <!-- Selling and Discount Price Start -->
                                                @if ($latestdiscountproducts->discount_price == 0)
                                                <h4 class="price_top_padding" style="color:black">
                                                    <span>&#2547;</span>
                                                    {{ intval($latestdiscountproducts->selling_price) }}
                                                </h4>
                                                @else
                                                <h4 class="price_top_padding">
                                                    <span style="color:black"> <span>&#2547;</span>
                                                        {{ intval($latestdiscountproducts->discount_price) }}</span>
                                                    <span><s class="text-danger"><span>&#2547;</span>
                                                            {{ intval($latestdiscountproducts->selling_price) }}</s></span>
                                                </h4>
                                                @endif
                                            </div>

                                        </div>

                                    </div>
                                    <div id="overlay_background">
                                        <button class="overlay-add-to-bag" disabled>
                                            <div class="text-light">
                                                Stock <br> Out
                                            </div>
                                        </button>

                                    </div>
                                    <div class="d-flex justify-content-center mb-2">
                                        <button class="btn btn-primary-filled px-4" style="margin-top: 8px;" disabled><i class="fas fa-cart-plus me-2"></i>Stock Out
                                        </button>
                                    </div>
                                </div>
                        </div>
                        @else
                        <div class="discounted-product-card-wrapper">
                            <div class="discounted-product-card">
                                <div class="discounted-product-card-inner">
                                    <div class="discount-percent">
                                        @php
                                        $amount = $latestdiscountproducts->selling_price - $latestdiscountproducts->discount_price;
                                        if ($latestdiscountproducts->selling_price) {
                                        $discount = ($amount / $latestdiscountproducts->selling_price) * 100;
                                        } else {
                                        $discount = ($amount / 1) * 100;
                                        }
                                        @endphp

                                        <span class="badge badge-pill badge-danger" style="font-size:15px">-{{ round($discount) }}%</span>
                                    </div>
                                    <div class="" style="padding-top: 10px">
                                        <a href="{{ route('ProductDetails_islamic', [$latestdiscountproducts->category_id, $latestdiscountproducts->sub_category_id, $latestdiscountproducts->product_slug_name]) }}">
                                            <img src=" {{ asset($latestdiscountproducts->product_thambnail) }} " class="img-fluid" alt="portfolio-image">
                                        </a>
                                    </div>
                                    <div class="my-3 px-3 text-center">
                                        <a href="{{ route('ProductDetails_islamic', [$latestdiscountproducts->category_id, $latestdiscountproducts->sub_category_id, $latestdiscountproducts->product_slug_name]) }}">
                                            <h4 class="text-dark fw-bold" style="height: 50px; margin-top: -5px;">
                                                {{ $latestdiscountproducts->product_name }}</h4>
                                        </a>


                                        <b style="font-size:14px">{{ $latestdiscountproducts->unit }}</b>
                                        <div class="text-center my-2">
                                            <!-- Selling and Discount Price Start -->
                                            @if ($latestdiscountproducts->discount_price == 0)
                                            <h4 class="price_top_padding" style="color:black">
                                                <span>&#2547;</span>
                                                {{ intval($latestdiscountproducts->selling_price) }}
                                            </h4>
                                            @else
                                            <h4 class="price_top_padding">
                                                <span style="color:black"> <span>&#2547;</span>
                                                    {{ intval($latestdiscountproducts->discount_price) }}</span>
                                                <span><s class="text-danger"><span>&#2547;</span>
                                                        {{ intval($latestdiscountproducts->selling_price) }}</s></span>
                                            </h4>
                                            @endif
                                            <!-- Selling and Discount Price End -->
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center cart-details-btn ">
                                        <input type="hidden" id="product_id">
                                        <a href="{{ route('ProductDetails_islamic', [$latestdiscountproducts->category_id, $latestdiscountproducts->sub_category_id, $latestdiscountproducts->product_slug_name]) }}"><button class="btn btn-primary-filled px-4"><i class="fas fa-cart-plus me-2"></i>Shop Now
                                            </button></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
            </div>
        </section>
        <!-- Popular products End -->
        <!-- Top Selling, Trending Products, Recently Added, Top Rated Start -->
        <section class="selling-product">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-4">
                        <div class="selling-product-header">
                            <h4>Top Selling</h4>
                        </div>
                        <!-- end selling-product-header  -->
                        <div class="row">
                            @foreach ($trendingProducts as $top_selling)
                            @if ($top_selling->product_qty == 0)
                            <div class="col-md-12 col-4 mt-3 mt-md-1">
                                <div class="selling-product-wrapper">
                                    <div class="selling-product-inner">
                                        <div class="selling-product-img">
                                            <a>

                                                <img src=" {{ asset($top_selling->product_thambnail) }} " alt="bppshops">
                                            </a>
                                        </div>
                                        <!-- end selling-product-img  -->
                                        <div class="selling-product-info">
                                            <a>
                                                <h6>{{ $top_selling->product_name }}</h6>
                                            </a>

                                            <!-- end ratting-product  -->
                                            <!-- Selling and Discount Price Start -->
                                            @if ($top_selling->discount_price == 0)
                                            <h4 class="price_top_padding" style="color:black">
                                                <span> &#2547;</span>
                                                <span>{{ intval($top_selling->selling_price) }}</span>
                                            </h4>
                                            @else
                                            <h4 class="price_top_padding">
                                                <span style="color:black"> <span> &#2547;</span>
                                                    {{ intval($top_selling->discount_price) }}</span>
                                                <span><s class="text-danger"><span class="text-danger"> &#2547;</span>
                                                        {{ intval($top_selling->selling_price) }}</s></span>
                                            </h4>
                                            @endif
                                            <!-- Selling and Discount Price End -->
                                        </div>
                                        <!-- end selling-product-info  -->
                                    </div>
                                    <!-- end selling-product-inner  -->
                                </div>
                                <!-- end selling-product-wrapper  -->


                            </div>
                            @else
                            <div class="col-md-12 col-4 mt-3 mt-md-1">
                                <div class="selling-product-wrapper">
                                    <div class="selling-product-inner">
                                        <div class="selling-product-img">
                                            <a href="{{ route('ProductDetails_islamic', [$top_selling->category_id, $top_selling->sub_category_id, $top_selling->product_slug_name]) }}">

                                                <img src=" {{ asset($top_selling->product_thambnail) }} " alt="bppshops">
                                            </a>
                                        </div>
                                        <!-- end selling-product-img  -->
                                        <div class="selling-product-info">
                                            <a href="{{ route('ProductDetails_islamic', [$top_selling->category_id, $top_selling->sub_category_id, $top_selling->product_slug_name]) }}">
                                                <h6>{{ $top_selling->product_name }}</h6>
                                            </a>

                                            <!-- end ratting-product  -->
                                            <!-- Selling and Discount Price Start -->
                                            @if ($top_selling->discount_price == 0)
                                            <h4 class="price_top_padding" style="color:black">
                                                <span> &#2547;</span>
                                                <span>{{ intval($top_selling->selling_price) }}</span>
                                            </h4>
                                            @else
                                            <h4 class="price_top_padding">
                                                <span style="color:black"> <span> &#2547;</span>
                                                    {{ intval($top_selling->discount_price) }}
                                                    </span)>
                                                    <span><s class="text-danger"><span>
                                                                &#2547;</span>
                                                            {{ intval($top_selling->selling_price) }}</s></span>
                                            </h4>
                                            @endif
                                            <!-- Selling and Discount Price End -->
                                        </div>
                                        <!-- end selling-product-info  -->
                                    </div>
                                    <!-- end selling-product-inner  -->
                                </div>
                                <!-- end selling-product-wrapper  -->


                                <a href="{{ route('ProductDetails_islamic', [$top_selling->category_id, $top_selling->sub_category_id, $top_selling->product_slug_name]) }}">
                                    <button class="btn btn-primary-filled py-0 px-2"><small> <i class="fas fa-cart-plus me-1"></i>Shop
                                            Now</small></button>
                                </a>

                            </div>
                            @endif
                            @endforeach
                        </div>
                        <!-- end selling-product-inner  -->
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12 mt-4">
                        <div class="selling-product-header">
                            <h4>Trending Products</h4>
                        </div>
                        <!-- end selling-product-img  -->
                        <div class="selling-product-info">
                            <a href="{{route('ProductDetails_islamic',[$latest_product->category_id,$latest_product->sub_category_id,$latest_product->product_slug_name ] )}}">
                                <h6>{{ $latest_product->product_name }}</h6>
                            </a>
                            <!-- end ratting-product  -->
                            <!-- Selling and Discount Price Start -->
                            @if ($latest_product->discount_price == 0)
                            <h4 class="price_top_padding" style="color:black"> <span> &#2547;</span>
                                <span>{{ intval($latest_product->selling_price) }}</span>
                            </h4>
                            @else
                            <h4 class="price_top_padding">
                                <span style="color:black"> <span> &#2547;</span>
                                    {{ intval($latest_product->discount_price) }}</span>
                                <span><s class="text-danger"><span> &#2547;</span>
                                        {{ intval($latest_product->selling_price) }}</s></span>
                            </h4>
                            @endif
                            <!-- Selling and Discount Price End -->
                        </div>
                        <!-- end selling-product-info  -->
                    </div>
                    <!-- end selling-product-wrapper  -->


                    <div id="recently-added" class="col-lg-3 col-md-6 col-sm-12 mt-4">
                        <div class="selling-product-header">
                            <h4>Recently Added</h4>
                        </div>
                        <!-- end selling-product-img  -->
                        <div class="selling-product-info">
                            <a>
                                <h6>{{ $latest_product->product_name }}</h6>
                            </a>
                            <!-- end ratting-product  -->
                            <!-- Selling and Discount Price Start -->
                            @if ($top_selling->discount_price == 0)
                            <h4 class="price_top_padding" style="color:black"> <span> &#2547;</span>
                                <span>{{ intval($top_selling->selling_price) }}</span>
                            </h4>
                            @else
                            <h4 class="price_top_padding">
                                <span style="color:black"> <span> &#2547;</span>
                                    {{ intval($top_selling->discount_price) }}</span>
                                <span><s class="text-danger"><span> &#2547;</span>
                                        {{ intval($top_selling->selling_price) }}</s></span>
                            </h4>
                            @endif
                            <!-- Selling and Discount Price End -->
                        </div>
                        <!-- end selling-product-info  -->
                    </div>
                    <!-- end selling-product-wrapper  -->






                    <div class="col-lg-3 col-md-6 col-sm-12 mt-4">
                        <div class="selling-product-header">
                            <h4>Top Rated</h4>
                        </div>
                        <!-- end selling-product-img  -->
                        <div class="selling-product-info">
                            <a href="{{route('ProductDetails_islamic',[$latest_product->category_id,$latest_product->sub_category_id,$latest_product->product_slug_name ] )}}">
                                <h6>{{ $latest_product->product_name }}</h6>
                            </a>
                            <!-- end ratting-product  -->
                            <!-- Selling and Discount Price Start -->
                            @if ($top_selling->discount_price == 0)
                            <h4 class="price_top_padding" style="color:black"> <span> &#2547;</span>
                                <span>{{ intval($top_selling->selling_price) }}</span>
                            </h4>
                            @else
                            <h4 class="price_top_padding">
                                <span style="color:black"> <span> &#2547;</span>
                                    {{ intval($top_selling->discount_price) }}</span>
                                <span><s class="text-danger"><span> &#2547;</span>
                                        {{ intval($top_selling->selling_price) }}</s></span>
                            </h4>
                            @endif
                            <!-- Selling and Discount Price End -->
                        </div>
                        <!-- end selling-product-info  -->
                    </div>
                    <!-- end selling-product-inner  -->
                </div>
                <!-- end row  -->
            </div>
            @endif
            @endforeach
            </div>
            <!-- end selling-product-inner  -->
            </div>
            <!-- end selling-product-wrapper  -->
            </div>
            <!-- end row  -->
            </div>
</main>
<div class="modal fade" id="bppshops_promo" tabindex="1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body p-0">
                <button type="button" class="btn-close bppshops_promo_close_btn" data-bs-dismiss="modal" aria-label="Close"></button>
                <img class="img-fluid" src="{{ asset('frontend/assets/images/home_popup.jpg') }}" alt="bppshops" srcset="">
            </div>
        </div>
    </div>
</div>
<script>
    // document.addEventListener("DOMContentLoaded", function(event) {
    //         var myModal = new bootstrap.Modal(document.getElementById('bppshops_promo'));
    //         myModal.show();
    //     });

</script>
<script>
    //======================== Search option start ======================//
    let searchById = document.getElementById("searchId");

    searchById.addEventListener("keyup", event => {
        let searchBy = event.target.value;
        if (searchBy != '') {
            $.ajax({
                url: "{{ route('searchproduct.ajax') }}"
                , method: "GET"
                , data: {
                    squery: searchBy
                }
                , success: function(response) {
                    //  console.log(response);
                    $("#show-list").html(response);
                }
            });
        } else {
            $.ajax({
                url: "{{ route('searchproduct.ajax') }}"
                , method: "GET"
                , data: {
                    squery: searchBy
                }
                , success: function(response) {
                    //  console.log(response);
                    $("#show-list").html('');
                }
            });
        }

    });

    //======================== Search option end ======================//

</script>
<script>
    $(document).ready(function() {
        $('.topSliderBannerSection-slider').slick({
            arrows: false
            , slidesToShow: 1
            , slidesToScroll: 1
            , autoplay: true
            , autoplaySpeed: 1500
            , dots: true
        , });
    }

    });

    //======================== Search option end ======================//

</script>
@endsection
