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

    .isotopeSelector.stock-out-wrapper .overlay-background .overlay-add-to-bag {
        color: #fff;
        display: block
    }

    .isotopeSelector.stock-out-wrapper .border-portfolio:hover:after {
        -webkit-animation: portfolio-circle 0.5s ease;
        animation: none;
        /* animation: portfolio-circle 0.5s ease;  */
    }

    .isotopeSelector.stock-out-wrapper .border-portfolio:hover:before {
        -webkit-animation: portfolio-circle 0.8s ease;
        animation: none;
        /* animation: portfolio-circle 0.8s ease; */
    }

    .collection-banner-main:nth-child(2) {
        margin-top: 14px !important;
    }

    .slick-track {
        display: flex !important;
    }

    .slick-slide {
        height: inherit !important;
    }

    .topSliderBannerSectionbanner {
        padding: 5px 5px;
    }

    @media screen and (max-width: 600px) {
        .latest-discounted-products-banner {
            display: none;
        }

        .topSliderBannerSectionbanner {
            display: none;
        }
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
        background-color: green;
        color: white;
        border: none;
    }

    .color_see_more:hover {
        background-color: #00ab00;
        color: white;
    }

    .latestdiscountproductsName {
        height: 100px;
    }

    .latestdiscountproductsNameLineClam {
        height: 30px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        font-size: 12px;

    }

    #faruk_with_shuvo {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
        overflow: hidden;
    }

    .grocery-home .main-content .top-buttons .top-button-feature {
        height: 60px;
    }

    .grocery-home .main-content .top-buttons button span {
        font-size: 14px;
    }

    .latest-discounted-products .discounted-product-card {
        border-radius: 10px;
    }

    .grocery-home .latest-discounted-products .overlay-add-to-bag {
        border-radius: 0px;
        height: 93%;
        width: 93%;
        margin: 8px 8px;
    }

</style>


<div id="sidemenu-container" class="sidemenu-container hide-menu">
    <ul id="category-toggle-custom-sidemenu" class="category-sidemenu">
        @php
        $special_offer = App\Models\Product::where('special_offer','1')->where('ecom_name','2')->count();
        $coupons = App\Models\Coupon::where('status','1')->orderBy('id', 'DESC')->count();
        @endphp
        <li class="menu-heading">
            <a href="{{ url('/special/grocery/offer') }}"><span class="text">Special Offers</span> <span class="number">{{
                    $special_offer }}</span></a>

        </li>
        @php
        $currentUrl = Request::segment(2);
        $categories=App\Models\Category::where('status',1)->with('subcategory')->where('ecom_id','2')->get();
        @endphp
        <li class="mb-1 mt-3">
            <div class="collapse">
                {{-- for category --}}
                @foreach ($categories as $category)
        <li class="mb-1 mt-2">
            {{-- vvvvvv --}}
            @if(Request::segment(2) != $category->category_slug_name)
            <a href="{{ url('/gbs/'. $category->category_slug_name) }}">
                @endif
                <button class="btn btn-toggle align-items-center rounded {{ Request::segment(2) != $category->category_slug_name? 'collapsed' : '' }} " data-bs-toggle="collapse" data-bs-target="#cat{{$category->id}}" aria-expanded="{{ Request::segment(2) != $category->category_slug_name? 'false' : 'true' }}">
                    <img style="height:20px;width:20px" src="{{ asset($category->category_icon)}}" alt="bppshops" class="sidemenu-icon">
                    {{$category->category_name}}
                </button>

                @if(Request::segment(2) != $category->category_slug_name)
            </a>
            @endif
            <div class="collapse {{ Request::segment(2) != $category->category_slug_name? '' : 'show' }}" id="cat{{$category->id}}">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small sub-category">
                    @php
                    $subcategories=App\Models\SubCategory::where('status',1)->with(['category'=>function($q){
                    $q->where('status',1);
                    }
                    ])->where('category_id',$category->id)->get();

                    @endphp
                    @foreach ($subcategories as $subcategory)
                    <li>

                        @if(collect(request()->segments())->last() != $subcategory->sub_category_slug_name)
                        <a href="{{ url('/gbs/' . $subcategory->category->category_slug_name .'/'. $subcategory->sub_category_slug_name) }}">
                            @endif
                            <button class="btn btn-toggle align-items-center rounded {{ Request::segment(3) != $subcategory->sub_category_slug_name? 'collapsed' : '' }}" data-bs-toggle="collapse" data-bs-target="#sub{{$subcategory->id}}" aria-expanded="{{ Request::segment(3) != $subcategory->sub_category_slug_name? 'false' : 'true' }}">
                                {{$subcategory->sub_category_name}}
                            </button>
                            @if( collect(request()->segments())->last()!= $subcategory->sub_category_slug_name)
                        </a>
                        @endif
                        <div class="collapse {{ Request::segment(3) != $subcategory->sub_category_slug_name? '' : 'show' }}" id="sub{{$subcategory->id}}">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small sub-sub-category">
                                @php
                                $sub_subcategories=App\Models\SubSubCategory::with(['category'=>function($q){
                                $q->where('status',1);
                                }
                                ,'subcategory'=>function($q){
                                $q->where('status',1);
                                }
                                ])->where('subcategory_id',$subcategory->id)->get();
                                @endphp

                                @foreach ($sub_subcategories as $subsubcategory)
                                <li><a href="{{ url('/gbs/'.optional($subsubcategory->category)->category_slug_name.'/'. optional($subsubcategory->subcategory)->sub_category_slug_name.'/'. optional($subsubcategory)->subsubcategory_slug_name) }}" class="link-dark rounded">{{$subsubcategory->subsubcategory_name}}</a>
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
                                <a href="{{ url('/grocery') }}" class="logo-container custom-header-ecom-title-home">
                                    <i class="fas fa-home"></i> Grocery Home
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- ---------- Search with Category ------------- -->
                    <div>
                        <a href="{{ url('/grocery') }}" class="logo-container custom-header-ecom-title-home">
                            <h2 class="text-white">Grocery</h2>
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
</div>
<main class="main-body grocery-home">
    <section class="main-content category-closed" id="main-content">
        <!--home slider start-->
        <section class="megastore-slide collection-banner section-py-space">
            <div class="container-fluid">
                <div class="row mega-slide-block">
                    <div class="col-xl-6 col-lg-12 collection-banner-close" id="megastore-collection-banner">

                        <div class="row">
                            <div class="col-12">
                                <div class="gro-banner-slider no-arrow">
                                    @foreach ($sliders as $slider)
                                    <div class="slide-main">
                                        <img src=" {{ asset($slider->slider_img) }} " class="img-fluid bg-img" alt="mega-store">
                                        <div class="slide-contain">

                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-xl-6 col-lg-12 ">
                        <div class="row collection-p6">
                            <div class="col-12 d-none d-md-block">

                                @php
                                $bennars = App\Models\Banner::where('status', 1)->where('ecom_id','2')
                                ->orderBy('id', 'DESC')
                                ->limit(2)
                                ->get();
                                @endphp
                                @foreach ($bennars as $bennar)

                                <div class="collection-banner-main banner-17 banner-style7 collection-color14 p-left">
                                    <div class="collection-img">
                                        <img src="{{ asset($bennar->bennar_img) }}" class="img-fluid bg-img" alt="banner">
                                    </div>
                                    <div class="collection-banner-contain ">
                                    </div>
                                </div>

                                @endforeach

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section> --}}
        <section>
            <div class="container-fluid">
                <div class="row mt-2">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="topSliderBannerSectionslider">
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
                        <div class="topSliderBannerSectionbanner">
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

        <!-- buttons start -->
        <section class="top-buttons px-md-5 px-3">
            <div class="row">
                <div class="col-xl-2 col-6 mt-1 mb-2">
                    <div class="top-button-feature">
                        <a href="{{url('product/popularProduct')}}"><button type="button" class="btn btn-primary btn-block"><img src="{{ asset('frontend/assets/images/grocery/top-cards/popular.png') }}" alt="Popular Products"><span>Popular
                                    Products</span></button></a>
                    </div>
                    <div class="col-xl-2 col-6 mt-1 mb-2">
                        <div class="top-button-feature">
                            <a href="{{url('product/latestProduct')}}"><button type="button" class="btn btn-primary btn-block"><img src="{{ asset('frontend/assets/images/grocery/top-cards/popular.png ')}}" alt="Latest Products Added"><span>Latest Products
                                        Added</span></button></a>
                        </div>
                    </div>
                    <div class="col-xl-2 col-6 mt-1 mb-2">
                        <div class="top-button-feature">
                            <a href="{{url('/latestdiscountedproductsgrocery')}}"><button type="button" class="btn btn-primary btn-block"><img src="{{ asset('frontend/assets/images/grocery/top-cards/popular.png ')}}" alt="Latest Discount Products"><span>Latest Discount
                                        Products</span></button></a>
                        </div>
                    </div>
                    <div class="col-xl-2 col-6 mt-1 mb-2">
                        <div class="top-button-feature">
                            <a href="#recently-added"><button type="button" class="btn btn-primary btn-block"><img src="{{ asset('frontend/assets/images/grocery/top-cards/discount.png ')}}" alt="Flash Sale"><span>Flash
                                        Sale</span></button></a>
                        </div>
                    </div>
                    <div class="col-xl-2 col-6 mt-1 mb-2">
                        <div class="top-button-feature">
                            <a href="{{url('product/dalyProduct')}}"><button type="button" class="btn btn-primary btn-block"><img src="{{ asset('frontend/assets/images/grocery/top-cards/popular.png ')}}" alt="Daily Best Sell"><span>Daily Best
                                        Sell</span></button></a>
                        </div>
                    </div>
                    <div class="col-xl-2 col-6 mt-1 mb-2">
                        <div class="top-button-feature">
                            <a href="#recently-added"><button type="button" class="btn btn-primary btn-block"><img src="{{ asset('frontend/assets/images/grocery/top-cards/popular.png ')}}" alt="Daily Needs"><span>Daily
                                        Needs</span></button></a>
                        </div>
                    </div>
                </div>
        </section>
        <!-- buttons end -->
        <!--rounded category start-->
        <div class="section-title-no-bg px-md-5 px-3">
            <h4 class="pt-lg-4 pt-2 text-center">Featured Categories</h4>
        </div>
        <section class="featured-category mt-lg-3 mt-0 px-md-5 px-3">
            <div class="container-fluid px-2 px-lg-5">
                <div class="row">
                    <div class="col">
                        <div class="gro-featured-slider">

                            @foreach ($categories as $category)
                            <div>
                                <a href="{{ url('/gbs/'. $category->category_slug_name) }}">
                                    <div class="featured-category-item text-center">
                                        <div class="d-flex justify-content-center">
                                            <img src="{{ asset($category->category_image) }}" alt="BppShops">
                                        </div>
                                        <div class="featured-category-item-header">
                                            <h6 class="fw-bold mt-3"> {{ $category->category_name }} ({{$category->products_list->count()}})</h6>
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
        <!--rounded category end-->

        <!-- featured category promo start -->
        <div class="featured-category-promo mx-md-5 mx-3 mt-5 d-none d-md-block">
            <div class="row">

                @php
                $bennars = App\Models\BannerCatagory::where('status', 2)
                ->orderBy('id', 'DESC')
                ->limit(3)
                ->get();
                @endphp

                @foreach ($bennars as $bennar)
                <div class="col-xl-4 col-lg-6 col-md-6 col-12 px-4 py-3">
                    <div class="row bg-white px-3 promo-card h-100">
                        <div class="col-8 d-flex align-items-center justify-content-center py-2">
                            <div>
                                <h4>Everyday Fresh & Clean with our products</h4>

                            </div>
                        </div>
                        <div class="col-4 d-flex align-items-center justify-content-center">
                            <img class="img-fluid" src="{{ asset($bennar->bennar_img) }}" alt="bppshops" srcset="">
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <!-- featured category promo end -->
        <!-- Popular products Start -->
        <div id="popular-products" class="section-title-no-bg px-md-5 px-3">
            <h4 class="pt-3 text-center">Popular Products</h4>
        </div>

        <section class="popular-products">
            <div class="product-gallery-wrapper  portfolio-section grid-portfolio ratio2_3 portfolio-padding ">
                <div class="ec-card-group card-group zoom-gallery portfolio-2 px-lg-5 pt-lg-2 pb-lg-3 px-3 py-3">

                    @foreach ($most_popular_all as $most_popular_alls)
                    <div class="isotopeSelector filter all ec-card-lg">
                        <div class="overlay ec-card-inner">
                            <div class="border-portfolio">
                                <div class="card product-port added-to-bag">
                                    <div class="image-overlay-container">
                                        <img src="{{ asset($most_popular_alls->product_thambnail) }}" class="img-fluid  bg-img" alt="">
                                    </div>
                                    <div class="text-center mt-3 mb-1">
                                        <h4 class="text-dark"> {{ $most_popular_alls->product_name }}</h4>
                                        <b style="font-size:16px; margin-top: 5px">{{ $most_popular_alls->unit }}</b>
                                        <h4 class="price">



                                            <!-- Selling and Discount Price Start -->
                                            @if ($most_popular_alls->discount_price == 0)
                                            <h4 style="color:black; font-size:16px; margin-top: 5px; font-weight: bold"> <span style="font-size:16px; margin-top: 5px; font-weight: bold">৳</span>
                                                {{ intval($most_popular_alls->selling_price) }} </h4>
                                            @else
                                            <h4>
                                                <span style="font-size:16px; margin-top: 5px; font-weight: bold"> <span style="font-size:16px; margin-top: 5px; font-weight: bold">৳</span>
                                                    {{ intval($most_popular_alls->discount_price) }}</span>
                                                <span><s class="text-danger"><span style="font-size:16px; margin-top: 5px; font-weight: bold">৳</span>
                                                        {{ intval($most_popular_alls->selling_price) }}</s></span>
                                            </h4>
                                            @endif
                                            <!-- Selling and Discount Price End -->


                                        </h4>
                                    </div>
                                    <?php
                            $productName = strval("'" . $most_popular_alls->product_name . "'");
                            ?>

                                    @if($most_popular_alls->product_qty <= 0) <div id="overlay_background">
                                        <button class="overlay-add-to-bag" id="overlay_background" disabled>
                                            <div class="text-light">
                                                Stock <br> Out
                                            </div>
                                        </button>
                                        <div class="overlay-button" id="add_inc_dec" style="display: none;">
                                            <h4 class="overlay-product-amount">TK. <span class="pro-price">420.0</span></h4>
                                            <div class="overlay-product-quantity">
                                                <button class="btn incre-btn" onclick="quickViewQunatityIncrOverlay(event)"><i class="fas fa-plus"></i></button>
                                                <input class="quantity-text" id="input_value" type="text" value="1">
                                                <button class="btn decre-btn" onclick="quickViewQunatityDecOverlay(event)"><i class="fas fa-minus"></i></button>
                                            </div>
                                            <h4 class="overlay-product-in-bag">In Bag</h4>
                                        </div>

                                </div>
                            </div>

                            <div class="d-flex justify-content-center cart-details-btn ">
                                <a href="#" style="pointer-events: none;"><button class="btn btn-primary-filled px-4" disabled><i class="fas fa-cart-plus me-2"></i>Stock Out
                                    </button></a>

                            </div>
                            @else
                            <div class="overlay-background">

                                <button class="overlay-add-to-bag" onclick="addToCart({{ $most_popular_alls->id }}, <?php echo $productName; ?>)">
                                    <div class="text-white">
                                        Add <br> To <br> Bag
                                    </div>
                                </button>



                                <div class="overlay-button" id="add_inc_dec" style="display: none;">
                                    <h4 class="overlay-product-amount">TK. <span class="pro-price">420.0</span></h4>
                                    <div class="overlay-product-quantity">
                                        <button class="btn incre-btn" onclick="quickViewQunatityIncrOverlay(event)"><i class="fas fa-plus"></i></button>
                                        <input class="quantity-text" id="input_value" type="text" value="1">
                                        <button class="btn decre-btn" onclick="quickViewQunatityDecOverlay(event)"><i class="fas fa-minus"></i></button>
                                    </div>
                                    <h4 class="overlay-product-in-bag">In Bag</h4>
                                </div>
                                <a class="overlay-details-link" onclick="groceryproductView({{ $most_popular_alls->id }})" data-bs-toggle="modal" data-bs-target="#groceryproductQuickViewModal">Details
                                    >></a>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center cart-details-btn ">
                            <a onclick="addToCart({{ $most_popular_alls->id }}, <?php echo $productName; ?>)"><button class="btn btn-primary-filled px-4"><i class="fas fa-cart-plus me-2"></i>Shop Now
                                </button></a>

                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
            </div>
            </div>
        </section>
        <!-- Popular products End -->
        <section class="top-buttons px-md-5 px-3">
            <div class="row">
                <div id="" class="section-title-no-bg mt-2 px-md-5 px-3 d-flex justify-content-center">
                    <a class="btn btn-warning color_see_more" href="https://bppshops.com/product/popularProduct">
                        See More Product
                    </a>
                </div>
            </div>
        </section>

        <!-- Daily Best Sells Start-->
        <div id="daily-best-sales" class="section-title-no-bg px-md-5 px-3">
            <h4 class="text-center">Daily Best Sells </h4>
        </div>
        <section class="daily-best-sells">
            <div class="product-gallery-wrapper  portfolio-section grid-portfolio ratio2_3 portfolio-padding ">
                <div class="ec-card-group card-group zoom-gallery portfolio-2 px-lg-5 pt-lg-2 pb-lg-3 px-3 py-3">

                    @foreach ($dailyBestSales as $dailyBestSale)
                    @if($dailyBestSale->product_qty <= 0) <div class="isotopeSelector filter all ec-card-lg">
                        <div class="overlay ec-card-inner" style="padding-bottom: 15px!important">
                            <div class="border-portfolio">
                                <div class="card product-port added-to-bag">
                                    <div class="image-overlay-container">
                                        <img src="{{ asset($dailyBestSale->product_thambnail) }}" class="img-fluid  bg-img" alt="{{ $dailyBestSale->product_name }}">
                                    </div>
                                    <div class="text-center mt-3 mb-1">
                                        <h4 class="text-dark" id="faruk_with_shuvo">{{ $dailyBestSale->product_name }}</h4>
                                        <b>{{ $dailyBestSale->unit }}</b>
                                        <h4 class="price">
                                            <div class="text-center mt-2 mb-1">
                                                <!-- Selling and Discount Price Start -->
                                                @if ($dailyBestSale->discount_price == 0)
                                                <h4 style="color:black; font-weight: bold; font-size: 16px"> <span style="font-weight: bold; font-size: 16px">৳</span>
                                                    {{ intval($dailyBestSale->selling_price) }} </h4>

                                                @else
                                                <h4>
                                                    <span style="color:black; font-weight: bold; font-size: 16px"> <span style="font-weight: bold; font-size: 16px">৳</span>
                                                        {{ intval($dailyBestSale->discount_price) }}</span>
                                                    <span><s class="text-danger"><span style="font-weight: bold; font-size: 16px">৳</span>
                                                            {{ intval($dailyBestSale->selling_price) }}</s></span>
                                                </h4>
                                                @endif
                                                <!-- Selling and Discount Price End -->
                                            </div>
                                        </h4>
                                    </div>
                                    <?php
                               $productName = strval("'" . $dailyBestSale->product_name . "'");
                             ?>


                                    <div id="overlay_background">
                                        <button class="overlay-add-to-bag" disabled>
                                            <div class="text-light">
                                                Stock <br> Out
                                            </div>
                                        </button>

                                    </div>
                                </div>

                                <div class="d-flex justify-content-center cart-details-btn ">
                                    <a href="#" style="pointer-events: none;"><button class="btn btn-primary-filled px-4" disabled><i class="fas fa-cart-plus me-2"></i>Stock Out
                                        </button></a>

                                </div>

                            </div>
                        </div>
                </div>


                @else

                <div class="isotopeSelector filter all ec-card-lg">
                    <div class="overlay ec-card-inner" style="padding-bottom: 12px!important">
                        <div class="border-portfolio">
                            <div class="card product-port added-to-bag">
                                <div class="image-overlay-container">
                                    <img src="{{ asset($dailyBestSale->product_thambnail) }}" class="img-fluid  bg-img" alt="{{ $dailyBestSale->product_name }}">
                                </div>
                                <div class="text-center mt-3 mb-1">
                                    <h4 class="text-dark" id="faruk_with_shuvo">{{ $dailyBestSale->product_name }}</h4>
                                    <br>
                                    <b>{{ $dailyBestSale->unit }}</b>
                                    <h4 class="price">
                                        <div class="text-center mb-1">
                                            <!-- Selling and Discount Price Start -->
                                            @if ($dailyBestSale->discount_price == 0)
                                            <h4 style="color:black; font-weight: bold; font-size: 16px"> <span style="font-weight: bold; font-size: 16px">৳</span>
                                                {{ intval($dailyBestSale->selling_price) }} </h4>

                                            @else
                                            <h4>
                                                <span style="color:black; font-weight: bold; font-size: 16px"> <span style="font-weight: bold; font-size: 16px">৳</span>
                                                    {{ intval($dailyBestSale->discount_price) }}</span>
                                                <span><del class="text-danger" style="font-weight:bold; font-size: 16px;"><span style="font-weight:bold; font-size: 16px;">৳</span>{{intval($dailyBestSale->selling_price) }}</del></span>
                                            </h4>
                                            @endif
                                            <!-- Selling and Discount Price End -->
                                        </div>
                                    </h4>
                                </div>
                                <?php
                               $productName = strval("'" . $dailyBestSale->product_name . "'");
                             ?>


                                <div class="overlay-background">
                                    <button class="overlay-add-to-bag" onclick="addToCart({{ $dailyBestSale->id }}, <?php echo $productName; ?>)">
                                        <div class="text-white">
                                            Add <br> To <br> Bag
                                        </div>
                                    </button>
                                    <a class="overlay-details-link" onclick="groceryproductView ({{ $dailyBestSale->id }})" data-bs-toggle="modal" data-bs-target="#groceryproductQuickViewModal" disabled="">Details
                                        >></a>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center mb-2">
                                <button onclick="addToCart({{ $dailyBestSale->id }}, <?php echo $productName; ?>)" class="btn btn-primary-filled px-4"><i class="fas fa-cart-plus me-2"></i>Shop Now</button>
                            </div>

                        </div>
                    </div>
                </div>
                @endif

                @endforeach

            </div>
            </div>
        </section>
        <!-- Daily Best Sells End-->
        <section class="top-buttons px-md-5 px-3">
            <div class="row">
                <div id="" class="section-title-no-bg mt-2 px-md-5 px-3 d-flex justify-content-center">
                    <a class="btn btn-warning color_see_more" href="https://bppshops.com/product/dalyProduct">
                        See More Product
                    </a>
                </div>
            </div>
        </section>
        <!-- Latest Discounted Products Start -->
        <div id="latest-discounted-products" class="section-title-no-bg mt-5 px-md-5 px-3">
            <h4 class="text-center">Latest Discounted Products</h4>
        </div>
        <section>
            <div class="latest-discounted-products px-md-5 px-3 mt-3">
                <div class="row">
                    <div class="col-xl-2 col-lg-4 col-md-4 col-12 my-3 latest-discounted-products-banner" style="min-height: 294px;">
                        @php
                        $left_banner = App\Models\ShopBanner::where('ecom_id', '2')->first();
                        @endphp
                        <div class="discounted-card-inner h-100 d-flex align-items-center p-5" style="background-image: url({{ asset(optional($left_banner)->shopbanner_image) }} ); border-radius: 20px;">

                            <div>

                                <a href="{{ url('/latestdiscountedproductsgrocery') }}" class="btn btn-primary-filled px-4" class="fas fa-arrow-right" style="background-color: green">Shop Now</a>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-8 col-md-8 col-12 my-3 latest-discounted-products-slider-cont">
                        <div class="gro-disct-pro">

                            @foreach ($latestdiscountproduct as $latestdiscountproducts)
                            @if($latestdiscountproducts->product_qty <= 0) <div class="discounted-product-card-wrapper">
                                <div class="discounted-product-card ">
                                    <div class="discounted-product-card-inner added-to-bag">
                                        <div class="discount-percent">
                                            @php

                                            $amount = $latestdiscountproducts->selling_price - $latestdiscountproducts->discount_price;
                                            $discount = ($amount / $latestdiscountproducts->selling_price) * 100;
                                            @endphp
                                            @if($discount==100)
                                            <div class="tbdi-offer">
                                            </div>
                                            @else
                                            <span class="badge badge-pill badge-danger" style="font-size:15px">-{{
                                            round($discount) }}%</span>
                                            @endif

                                        </div>
                                        <div class="image-overlay-container">
                                            <img src="{{ asset($latestdiscountproducts->product_thambnail) }}" class="img-fluid  bg-img" alt="{{ $latestdiscountproducts->product_name }}">
                                        </div>
                                        <div class="my-4 px-3 text-center latestdiscountproductsName">
                                            <h4 class="text-dark fw-bold latestdiscountproductsNameLineClam">
                                                {{ $latestdiscountproducts->product_name }}</h4>
                                            <b style="font-size:14px">{{ $latestdiscountproducts->unit }}</b>
                                            <br>
                                            <b style="color:black"> <span style="color:green">Brand:</span>
                                                Grocery</b>
                                            <div class="text-center my-2">
                                                <?php
                                        $productName = strval("'" . $latestdiscountproducts->product_name . "'");
                                        ?>
                                                <h4>
                                                    <div class="text-center my-2">
                                                        <!-- Selling and Discount Price Start -->
                                                        @if ($latestdiscountproducts->discount_price == 0)
                                                        <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                                            {{ intval($latestdiscountproducts->selling_price) }}
                                                        </h4>
                                                        @else
                                                        <h4>
                                                            <span style="color:black"> <span style="font-size:15px">৳</span>
                                                                {{ intval($latestdiscountproducts->discount_price) }}</span>
                                                            <span><s class="text-danger"><span style="font-size:15px">৳</span>
                                                                    {{ intval($latestdiscountproducts->selling_price) }}</s></span>
                                                        </h4>
                                                        @endif
                                                        <!-- Selling and Discount Price End -->


                                                    </div>
                                                </h4>
                                            </div>
                                        </div>
                                        <div id="overlay_background">
                                            <div class="text-light" style="text-align: center; margin-top: 59px;font-size:30px">

                                                <p style="font-size:30px"> Stock</p>
                                                <p style="font-size:30px"> Out</p>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center cart-details-btn ">
                                        <a href="#" style="pointer-events: none;"><button class="btn btn-primary-filled px-4" disabled><i class="fas fa-cart-plus me-2"></i>Stock Out
                                            </button></a>

                                    </div>
                                </div>
                        </div>
                        @else
                        <div class="discounted-product-card-wrapper">
                            <div class="discounted-product-card ">
                                <div class="discounted-product-card-inner added-to-bag">
                                    <div class="discount-percent">
                                        @php

                                        $amount = $latestdiscountproducts->selling_price - $latestdiscountproducts->discount_price;
                                        $discount = ($amount / $latestdiscountproducts->selling_price) * 100;
                                        @endphp
                                        @if($discount==100)
                                        <div class="tbdi-offer">
                                        </div>
                                        @else
                                        <span class="badge badge-pill badge-danger" style="font-size:15px">-{{
                                            round($discount) }}%</span>
                                        @endif

                                    </div>
                                    <div class="image-overlay-container">
                                        <img src="{{ asset($latestdiscountproducts->product_thambnail) }}" class="img-fluid  bg-img" alt="{{ $latestdiscountproducts->product_name }}">
                                    </div>
                                    <div class="my-4 px-3 text-center latestdiscountproductsName">
                                        <h4 class="text-dark fw-bold latestdiscountproductsNameLineClam">
                                            {{ $latestdiscountproducts->product_name }}</h4>
                                        <b style="font-size:14px">{{ $latestdiscountproducts->unit }}</b>
                                        <br>
                                        <b style="color:black"> <span style="color:green">Brand:</span>
                                            Grocery</b>
                                        <div class="text-center my-2">
                                            <?php
                                        $productName = strval("'" . $latestdiscountproducts->product_name . "'");
                                        ?>
                                            <h4>
                                                <div class="text-center my-2">
                                                    <!-- Selling and Discount Price Start -->
                                                    @if ($latestdiscountproducts->discount_price == 0)
                                                    <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                                        {{ intval($latestdiscountproducts->selling_price) }}
                                                    </h4>
                                                    @else
                                                    <h4>
                                                        <span style="color:black"> <span style="font-size:15px">৳</span>
                                                            {{ intval($latestdiscountproducts->discount_price) }}</span>
                                                        <span><s class="text-danger"><span style="font-size:15px">৳</span>
                                                                {{ intval($latestdiscountproducts->selling_price) }}</s></span>
                                                    </h4>
                                                    @endif
                                                    <!-- Selling and Discount Price End -->


                                                </div>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="overlay-background">
                                        <button class="overlay-add-to-bag" onclick="addToCart({{ $latestdiscountproducts->id }}, <?php echo $productName; ?>)">
                                            <div class="text-white">
                                                Add <br> To <br> Bag
                                            </div>
                                        </button>
                                        <a class="overlay-details-link" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#groceryproductQuickViewModal" onclick="groceryproductView({{ $latestdiscountproducts->id }})">Details >></a>

                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button onclick="addToCart({{ $latestdiscountproducts->id }}, <?php echo $productName; ?>)" class="btn px-4 py-1"><i class="fas fa-cart-plus me-2"></i>
                                        Shop Now</button>
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
        <!-- Latest Discounted Products End -->

        <!-- Top Selling, Trending Products, Recently Added, Top Rated Start -->
        <section class="selling-product mb-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-4">
                        <div class="selling-product-header">
                            <h4>Top Selling</h4>
                        </div>
                        <!-- end selling-product-header  -->
                        <div class="row">
                            @foreach ($trendingProducts as $top_selling)
                            <div class="col-md-12 col-4 mt-3 mt-md-1">
                                <div class="selling-product-wrapper">
                                    <div class="selling-product-inner">
                                        <?php
                                        $productName = strval("'" . $top_selling->product_name . "'");
                                        ?>
                                        <div class="selling-product-img">
                                            <img src="{{ asset($top_selling->product_thambnail) }}" alt="{{ $top_selling->product_name }}">
                                        </div>
                                        <!-- end selling-product-img  -->
                                        <div class="selling-product-info">
                                            <h6>{{ $top_selling->product_name }}</h6>
                                            <p>
                                                <!-- Selling and Discount Price Start -->
                                                @if ($top_selling->discount_price == 0)
                                                <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                                    <span>{{ intval($top_selling->selling_price) }}</span>
                                                </h4>
                                                @else
                                                <h4>
                                                    <span style="color:black"> <span style="font-size:15px">৳</span>
                                                        {{ intval($top_selling->discount_price) }}</span>
                                                    <span><s class="text-danger"><span style="font-size:15px">৳</span>
                                                            {{ intval($top_selling->selling_price) }}</s></span>
                                                </h4>
                                                @endif
                                                <!-- Selling and Discount Price End -->
                                            </p>
                                        </div>
                                        <!-- end selling-product-info  -->
                                    </div>
                                    <!-- end selling-product-inner  -->

                                </div>
                                @if($top_selling->product_qty < 1) <button class="btn btn-primary-filled py-0 px-2 bg-secondary" disabled><small> <i class="fas fa-cart-plus me-1"></i>Stock Out</small></button>
                                    @else
                                    <button class="btn btn-primary-filled py-0 px-2" onclick="groceryproductView({{ $top_selling->id }})" data-bs-toggle="modal" data-bs-target="#groceryproductQuickViewModal"><small> <i class="fas fa-cart-plus me-1"></i>Details</small></button>
                                    @endif

                            </div>
                            <!-- end selling-product-wrapper  -->
                            @endforeach
                        </div>
                        <!-- end selling-product-wrapper  -->

                    </div>
                    <!-- end col   -->
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-4">
                        <div class="selling-product-header">
                            <h4>Trending Products</h4>
                        </div>
                        <!-- end selling-product-header  -->
                        <div class="row">
                            @foreach ($trendingProducts as $top_selling)
                            <div class="col-md-12 col-4 mt-3 mt-md-1">
                                <div class="selling-product-wrapper">
                                    <div class="selling-product-inner">
                                        <?php
                                        $productName = strval("'" . $top_selling->product_name . "'");
                                        ?>
                                        <div class="selling-product-img">
                                            <img src="{{ asset($top_selling->product_thambnail) }}" alt="{{ $top_selling->product_name }}">
                                        </div>
                                        <!-- end selling-product-img  -->
                                        <div class="selling-product-info">
                                            <h6>{{ $top_selling->product_name }}</h6>
                                            <p>
                                                <!-- Selling and Discount Price Start -->
                                                @if ($top_selling->discount_price == 0)
                                                <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                                    <span>{{ intval($top_selling->selling_price) }}</span>
                                                </h4>
                                                @else
                                                <h4>
                                                    <span style="color:black"> <span style="font-size:15px">৳</span>
                                                        {{ intval($top_selling->discount_price) }}</span>
                                                    <span><s class="text-danger"><span style="font-size:15px">৳</span>
                                                            {{ intval($top_selling->selling_price) }}</s></span>
                                                </h4>
                                                @endif
                                                <!-- Selling and Discount Price End -->
                                            </p>
                                        </div>
                                        <!-- end selling-product-info  -->
                                    </div>
                                    <!-- end selling-product-inner  -->
                                </div>
                                @if($top_selling->product_qty < 1) <button class="btn btn-primary-filled py-0 px-2 bg-secondary" disabled><small> <i class="fas fa-cart-plus me-1"></i>Stock Out</small></button>
                                    @else
                                    <button class="btn btn-primary-filled py-0 px-2" onclick="groceryproductView({{ $top_selling->id }})" data-bs-toggle="modal" data-bs-target="#groceryproductQuickViewModal"><small> <i class="fas fa-cart-plus me-1"></i>Details</small></button>
                                    @endif

                            </div>
                            <!-- end selling-product-wrapper  -->
                            @endforeach
                        </div>
                    </div>
                    <!-- end col   -->
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-4" id="recently-added">
                        <div class="selling-product-header">
                            <h4>Recently Added</h4>
                        </div>
                        <!-- end selling-product-header  -->
                        <div class="row">
                            @foreach ($latest_products as $latest_product)
                            <div class="col-md-12 col-4 mt-3 mt-md-1">
                                <div class="selling-product-wrapper">
                                    <div class="selling-product-inner">
                                        <?php
                                        $productName = strval("'" . $latest_product->product_name . "'");
                                        ?>
                                        <div class="selling-product-img">
                                            <img src="{{ asset($latest_product->product_thambnail) }}" alt="{{ $latest_product->product_name }}">
                                        </div>
                                        <!-- end selling-product-img  -->
                                        <div class="selling-product-info">
                                            <h6>{{ $latest_product->product_name }}</h6>
                                            <p>
                                                <!-- Selling and Discount Price Start -->
                                                @if ($latest_product->discount_price == 0)
                                                <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                                    <span>{{ intval($latest_product->selling_price) }}</span>
                                                </h4>
                                                @else
                                                <h4>
                                                    <span style="color:black"> <span style="font-size:15px">৳</span>
                                                        {{ intval($latest_product->discount_price) }}</span>
                                                    <span><s class="text-danger"><span style="font-size:15px">৳</span>
                                                            {{ intval($latest_product->selling_price) }}</s></span>
                                                </h4>
                                                @endif
                                                <!-- Selling and Discount Price End -->
                                            </p>
                                        </div>
                                        <!-- end selling-product-info  -->
                                    </div>
                                    <!-- end selling-product-inner  -->
                                </div>
                                @if($latest_product->product_qty < 1) <button class="btn btn-primary-filled py-0 px-2 bg-secondary" disabled><small> <i class="fas fa-cart-plus me-1"></i>Stock Out</small></button>
                                    @else
                                    <button class="btn btn-primary-filled py-0 px-2" onclick="groceryproductView({{ $latest_product->id }})" data-bs-toggle="modal" data-bs-target="#groceryproductQuickViewModal"><small> <i class="fas fa-cart-plus me-1"></i>Details</small></button>
                                    @endif

                            </div>
                            <!-- end selling-product-wrapper  -->
                            @endforeach
                        </div>
                        <!-- end selling-product-wrapper  -->
                    </div>
                    <!-- end col   -->
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-4">
                        <div class="selling-product-header">
                            <h4>Top Rated</h4>
                        </div>
                        <!-- end selling-product-header  -->

                        <div class="row">
                            @foreach ($trendingProducts as $top_selling)
                            <div class="col-md-12 col-4 mt-3 mt-md-1">
                                <div class="selling-product-wrapper">
                                    <?php
                                        $productName = strval("'" . $top_selling->product_name . "'");
                                        ?>
                                    <div class="selling-product-inner">
                                        <div class="selling-product-img">
                                            <img src=" {{ asset($top_selling->product_thambnail) }}" alt="{{ $top_selling->product_name }}">
                                        </div>
                                        <!-- end selling-product-img  -->
                                        <div class="selling-product-info">
                                            <h6>{{ $top_selling->product_name }}</h6>
                                            <p>
                                                <!-- Selling and Discount Price Start -->
                                                @if ($top_selling->discount_price == 0)
                                                <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                                    <span>{{ intval($top_selling->selling_price) }}</span>
                                                </h4>
                                                @else
                                                <h4>
                                                    <span style="color:black"> <span style="font-size:15px">৳</span>
                                                        {{ intval($top_selling->discount_price) }}</span>
                                                    <span><s class="text-danger"><span style="font-size:15px">৳</span>
                                                            {{ intval($top_selling->selling_price) }}</s></span>
                                                </h4>
                                                @endif
                                                <!-- Selling and Discount Price End -->

                                            </p>
                                        </div>
                                        <!-- end selling-product-info  -->
                                    </div>
                                    <!-- end selling-product-inner  -->
                                </div>
                                @if($top_selling->product_qty < 1) <button class="btn btn-primary-filled py-0 px-2 bg-secondary" disabled><small> <i class="fas fa-cart-plus me-1"></i>Stock Out</small></button>
                                    @else
                                    <button class="btn btn-primary-filled py-0 px-2" onclick="groceryproductView({{ $top_selling->id }})" data-bs-toggle="modal" data-bs-target="#groceryproductQuickViewModal"><small> <i class="fas fa-cart-plus me-1"></i>Details</small></button>
                                    @endif
                            </div>
                            <!-- end selling-product-wrapper  -->
                            @endforeach
                        </div>
                        <!-- end selling-product-wrapper  -->
                    </div>
                    <!-- end col   -->
                </div>
                <!-- end row  -->
            </div>
            <!-- end container-fluid  -->
        </section>
        <!-- end selling-product  -->


    </section>
</main>

<!--Login Modal for grocery start-->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered d-flex justify-content-center" role="document">
        <div class="modal-content" style="width: 400px;">
            <div class="modal-body p-4">
                <div class="loginTitle">
                    <p>Login</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="facebookLogin">
                    <button><i class="fa-brands fa-facebook-f pe-2"></i> Sing Up or Login with
                        <span>Facebook</span></button>
                </div>
                <div class="emailLogin">
                    <button><i class="fa-solid fa-envelope emailIcon pe-2"></i> Login with <span>Email</span></button>
                </div>
                <div class="or">
                    <p>Or</p>
                </div>
                <div class="phoneContainer">
                    <h6>Please Enter your mobile phone number</h6>
                    <div class="phoneNumberContainer">
                        <img src="https://bppshops.com/frontend/assets/images/potaka.jpg" alt="bppshops">
                        <div class="number" id="number">
                            <input onclick="showText()" type="text" placeholder="+88">
                        </div>
                    </div>
                    <p class="hidePhoneText" id="hidePhoneText">e.g. +01712345678</p>
                </div>
                <div class="singUpLogin">
                    <button>SING UP / LOGIN</button>
                </div>
                <div class="footer py-4">
                    <p>This site is protected by reCAPTCHA and the Google <span><a href="">Privacy Policy</a></span> and
                        <span><a href="#">Terms of Service</a></span> apply.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Login Modal for grocery end-->


<div class="modal fade" id="bppshops_promo" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" style="width: auto">
            <div class="modal-body p-0">
                <button type="button" class="btn-close bppshops_promo_close_btn" data-bs-dismiss="modal" aria-label="Close"></button>
                <img class="img-fluid" src="{{ asset('frontend/assets/images/home_popup.jpg') }}" alt="bppshops" srcset="">
            </div>
        </div>
    </div>
</div>

<script>
    //     document.addEventListener("DOMContentLoaded", function(event) {
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
        $('.topSliderBannerSectionslider').slick({
            arrows: false
            , slidesToShow: 1
            , slidesToScroll: 1
            , autoplay: true
            , autoplaySpeed: 1500
            , dots: true
        , });
    });

</script>



@endsection
