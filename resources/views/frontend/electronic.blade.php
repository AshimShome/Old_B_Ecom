@extends('frontend.main_master')
@section('islamic')
<style>
        .slide-arrow {
            position: absolute;
            top: 50%;
            margin-top: -15px;
        }

        .prev-arrow {
            left: 40px;
            width: 0;
            height: 0;
            border-left: 0 solid transparent;
            border-right: 15px solid #113463;
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent;
            z-index: 99;
        }

        .next-arrow {
            right: 40px;
            width: 0;
            height: 0;
            border-right: 0 solid transparent;
            border-left: 15px solid #113463;
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent;
        }

        .products-custom-tab-content {
            height: fit-content;
        }

        .electronic .featured-new-topsales .nav .nav-link.active {
            background-color: #008081;
        }

        .custom-header-ecom-title {
            margin-top: 122px !important;
        }
        

        .product-title {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            min-height: 30px!important;
        }

        .modal-rating {
            margin-bottom: 0px !important;
        }

        .card-footer {
            position: relative;
        }

        .card-footer button {
            z-index: 99999;
        }

        .card-footer hr {
            position: absolute;
            bottom: 9px;
            width: 100%;
        }

        .featured-new-topsales-card .card-title {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            min-height: auto !important;
        }
        
        @media only screen and (max-width: 600px) {
            .custom-header-ecom-title {
                margin-top: 107px !important;
            }
            #megastore-collection-banner.collection-banner-close .slick-dots {
                margin-bottom: -10px;
            }
            .megastore-slide .slide-main .slide-contain{
                padding-left: 0px;
                padding-right: 0px;
            }
            .featured-new-topsales,
            .deals-of-the-day,
            .electronics-all-section-cont,
            .top-category-progress,
            #megastore-sub-collection-banner{
                display: none!important;
            }
            .slide-top-category{
                display: flex;
                flex-wrap: wrap;
            }
            .slide-top-category{
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
            }
            .slide-top-category-card{
                width: 150px;
                margin: 6px;
            }
            .electronic .featured-category .featured-category-item{
                margin: 0px;
            }
        }
        
        .font-size-18{
            font-size: 18px!important;
        }
        .btn-all-categories{
            background-color: #008081;
            color: white;
            padding: 8px 32px;
        }
        .btn-all-categories:hover{
            background-color: #064a4a;
            color: white;
        }
        .featured-category-item h6{
            height: 35px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .electronic .featured-new-topsales .featured-new-topsales-card .card-body h5{
            height: 38px;
            overflow: hidden;
        }
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
                                    <a id="category-toggle-custom-sidemenu-button" onclick="toggleCategorySidemenu()"
                                        class="category-toggle-btn"><i class="fa fa-bars"></i></a>
                                    </a>
                                    <a href="{{ url('/electronic') }}"
                                        class="logo-container custom-header-ecom-title-home">
                                        <i class="fas fa-home"></i> Electronics Home
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- ---------- Search with Category ------------- -->
                        <div>
                            <a href="{{ url('/electronic') }}" class="logo-container custom-header-ecom-title-home">
                                <h2 class="text-white">Electronics</h2>
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
    
      <div id="sidemenu-container" class="sidemenu-container">
        <ul id="category-toggle-custom-sidemenu" class="category-sidemenu">

            @php
                $special_offer = App\Models\Product::where('special_offer', '1')
                    ->where('ecom_name', '4')
                    ->count();
                $coupons = App\Models\Coupon::where('status', '1')
                    ->orderBy('id', 'DESC')
                    ->count();
            @endphp

            <li class="menu-heading">
                <a href="{{ url('/special/electronic/offer') }}"><span class="text">Special Offers</span> <span
                        class="number">{{ $special_offer }}</span></a>
                
            </li>

            @php
                $currentUrl = Request::segment(1);
                // dd($currentUrl);
                $categories = App\Models\Category::with('subcategory')
                    ->where('ecom_id', '4')
                    ->get();
            @endphp
            <li class="mb-1 mt-3">
                <div class="collapse">
                    {{-- for category --}}
                    @foreach ($categories as $category)
            <li class="mb-1 mt-2">
                {{-- vvvvvv --}}
                @if (Request::segment(2) != $category->category_slug_name)
                    <a href="{{ url('/ebs/' . $category->category_slug_name) }}">
                @endif
                <button
                    class="btn btn-toggle align-items-center rounded {{ Request::segment(2) != $category->category_slug_name ? 'collapsed' : '' }} "
                    data-bs-toggle="collapse" data-bs-target="#cat{{ $category->id }}"
                    aria-expanded="{{ Request::segment(2) != $category->category_slug_name ? 'false' : 'true' }}">
                    <img style="height:20px;width:20px" src="{{ asset($category->category_icon) }}" alt=""
                        class="sidemenu-icon">
                    {{ $category->category_name }}
                </button>

                @if (Request::segment(2) != $category->category_slug_name)
                    </a>
                @endif
                <div class="collapse {{ Request::segment(2) != $category->category_slug_name ? '' : 'show' }}"
                    id="cat{{ $category->id }}">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small sub-category">
                        @php
                            $subcategories = App\Models\SubCategory::with('category')
                                ->where('category_id', $category->id)
                                ->get();
                        @endphp
                        @foreach ($subcategories as $subcategory)
                            <li>

                                @if (collect(request()->segments())->last() != $subcategory->sub_category_slug_name)
                                    <a
                                        href="{{ url('/ebs/' . $subcategory->category->category_slug_name . '/' . $subcategory->sub_category_slug_name) }}">
                                @endif
                                <button
                                    class="btn btn-toggle align-items-center rounded {{ Request::segment(3) != $subcategory->sub_category_slug_name ? 'collapsed' : '' }}"
                                    data-bs-toggle="collapse" data-bs-target="#sub{{ $subcategory->id }}"
                                    aria-expanded="{{ Request::segment(3) != $subcategory->sub_category_slug_name ? 'false' : 'true' }}">
                                    {{ $subcategory->sub_category_name }}
                                </button>
                                @if (collect(request()->segments())->last() != $subcategory->sub_category_slug_name)
                                    </a>
                                @endif
                                <div class="collapse {{ Request::segment(3) != $subcategory->sub_category_slug_name ? '' : 'show' }}"
                                    id="sub{{ $subcategory->id }}">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small sub-sub-category">
                                        @php
                                            $sub_subcategories = App\Models\SubSubCategory::with('category', 'subcategory')
                                                ->where('subcategory_id', $subcategory->id)
                                                ->get();
                                        @endphp
                                        @foreach ($sub_subcategories as $subsubcategory)
                                            <li><a href="{{ url('/ebs/' . $subsubcategory->category->category_slug_name . '/' . $subsubcategory->subcategory->sub_category_slug_name . '/' . $subsubcategory->subsubcategory_slug_name) }}"
                                                    class="link-dark rounded">{{ $subsubcategory->subsubcategory_name }}</a>
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

    </ul>
    </div>
    
    
    <main class="electronic main-body">
        <section class="main-content" id="main-content">
            <!--home slider start-->
            <section class="megastore-slide collection-banner section-py-space">
                <div class="container-fluid">
                    <div class="row mega-slide-block">
                        <div class="col-xl-7 col-md-12 collection-banner-close" id="megastore-collection-banner">
                            <div class="row">
                                <div class="col-12">
                                    <div class="electronics_slide_1 no-arrow">
                                        @foreach ($sliders as $slider)
                                            <div>
                                                <div class="slide-main" style="background-color: #F1F1F9;">
                                                    <div class="slide-contain row">
                                                        <div class="col-12 d-flex justify-content-end">
                                                            <img src="{{ asset('/' . $slider->slider_img) }}"
                                                                class="img-fluid" alt="mega-store">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-md-12" id="megastore-sub-collection-banner">
                            <div class="row collection-p6 h-100">
                                @foreach ($banners as $banner)
                                    <div class="col-lg-12 col-md-12">
                                        <div class="collection-banner-contain">
                                            <div class="col-md-12 align-items-center justify-content-center">
                                                <img src="{{ asset('/' . $banner->bennar_img) }}" class="img-fluid"
                                                    alt="banner">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach




                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--home slider end-->


            <!--rounded category start-->
            <div class="section-title-no-bg px-md-5 px-3">
                <h5 class="text-center text-sm-start">Top Categories</h5>
            </div>

            <div class="px-md-5 px-3">
                <div class="top-category-progress mt-3" role="progressbar" aria-valuemin="0" aria-valuemax="100"><span
                        class="slider__label sr-only"></span></div>
            </div>

            <section class="featured-category mt-3 px-1 px-sm-3">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="slide-top-category">
                                @foreach ($categories as $category)
                                    <div class="slide-top-category-card">
                                        <a href="{{ url('ebs/' . $category->category_slug_name) }}">
                                            <div class="featured-category-item text-center">
                                                <div class="d-flex justify-content-center">
                                                    <img src="{{ asset('/' . $category->category_image) }}" alt="">
                                                </div>
                                                <h6 class="fw-bold text-dark mt-2">{{ $category->category_name }} ({{$category->products_list->count()}})</h6>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <a href="{{url('electronic/all/category')}}" class="btn btn-all-categories">All Categories</a>
                </div>
            </section>
            <!--rounded category end-->


            <!--Featured, New Arrivals, Top Sales Start-->

            <div class="featured-new-topsales mt-5 px-md-5 px-3">
                <nav class="pt-3">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" onclick="toggleFeaturedNewTopSalesElectornic('nav-featured')"
                            id="nav-featured-tab" data-bs-toggle="tab" role="tab">Featured</button>
                        <button class="nav-link" onclick="toggleFeaturedNewTopSalesElectornic('nav-new-arrivals')"
                            id="nav-new-arrivals-tab" data-bs-toggle="tab" role="tab">New
                            Arrivals</button>
                        <button class="nav-link" onclick="toggleFeaturedNewTopSalesElectornic('nav-top-sales')"
                            data-bs-toggle="tab" role="tab">Top
                            Sales</button>
                    </div>
                </nav>


                <!-- ---------------- Featured Products --------------------- -->
                <div id="custom-tab-content" class="featured-products-contents custom-tab-content">
                    <div class="tab-inner display" id="nav-featured">
                        <section class="mt-3 px-3">
                            <div class="container-fluid">
                                <div class="featured-new-topsales-slide">
                                    @foreach ($featureds as $product)
                                    @if($product->product_qty > 0)
                                    <div>
                                        <div class="card featured-new-topsales-card">
                                            <a href="#">
                                                <div class="card-header p-5">
                                                    <a href="{{route('electronicProductDetails',[$product->category_id,$product->sub_category_id,$product->product_slug_name ] )}}">
                                                    <img class="img-fluid"
                                                        src="{{ asset('/' . $product->product_thambnail) }}" alt="">
                                                    </a>
                                                    <div class="float-badge">
                                                        <span class="badge-blue">New</span>
                                                    </div>
                                                </div>
                                                <div class="card-body px-4 pt-4 pb-1">
                                                    @if ($product->discount_price == 0)
                                                    @else
                                                    @php
                                                        $amount = $product->selling_price - $product->discount_price;
                                                        if ($product->selling_price) {
                                                            $discount = ($amount / $product->selling_price) * 100;
                                                        } else {
                                                            $discount = ($amount / 1) * 100;
                                                        }
                                                    @endphp

                                                    <span class="sale-float"
                                                        style="color:black">-{{ round($discount) }}%
                                                        SALE</span>
                                                    @endif
                                                    <a style="color:black" href="{{route('electronicProductDetails',[$product->category_id,$product->sub_category_id,$product->product_slug_name ] )}}">
                                                    <h5 class="card-title" style="color:black"> {{ $product->product_name }}</h5>
                                                    </a>
                                                    <p class="brand fw-bold " style="color:black">
                                                        <b>Brand Name:</b> {{ $product->brand->brand_name_cats_eye }}
                                                    </p>
                                                    <hr>
                                                    @if ($product->discount_price != 0)
                                                        <div class="d-flex justify-content-between pricing px-4">
                                                            <p class="text-dark fw-bolder font-size-18">
                                                                &#2547;{{ intval($product->discount_price) }}</p>
                                                            <p class="text-danger fw-bolder font-size-18">
                                                                <del
                                                                    class="text-danger">&#2547;{{ intval($product->selling_price) }}</del>
                                                            </p>
                                                        </div>
                                                    @else
                                                        <div class="d-flex justify-content-between pricing px-4">
                                                            <p class="text-dark fw-bolder font-size-18">
                                                                &#2547;{{ intval($product->selling_price) }}</p>

                                                        </div>
                                                    @endif
                                                </div>
                                            </a>
                                            <a href="{{route('electronicProductDetails',[$product->category_id,$product->sub_category_id,$product->product_slug_name ] )}}">
                                            <div class="card-footer px-0">
                                                <div class="add-to-card-cont">
                                                    @if($product->product_qty <= 0)
                                                        <button 
                                                        class="btn btn-primary-filled px-4 py-1 bg-secondary opacity-100"
                                                        disabled>Stock Out</button>
                                                    @else
                                                        <button 
                                                        class="btn btn-primary-filled px-4 py-1"
                                                        style="background-color:#008081">Shop Now</button>
                                                    @endif
                                                    
                                                </div>
                                            </div>
                                        </a>
                                        </div>
                                    </div>
                                    @else
                                    <div style="margin-top: 15px;">
                                        <div class="card featured-new-topsales-card">
                                            <a href="#" style="background-color: rgba(0, 0, 0, 0.4);">
                                                <div class="card-header p-5">
                                                    <img class="img-fluid"
                                                        src="{{ asset('/' . $product->product_thambnail) }}" alt="">
                                                    <div class="float-badge">
                                                        <span class="badge-blue">New</span>
                                                    </div>
                                                </div>
                                                <div class="card-body px-4 pt-4 pb-1">

                                                    @if ($product->discount_price == 0)
                                                    @else
                                                    @php
                                                        $amount = $product->selling_price - $product->discount_price;
                                                        if ($product->selling_price) {
                                                            $discount = ($amount / $product->selling_price) * 100;
                                                        } else {
                                                            $discount = ($amount / 1) * 100;
                                                        }
                                                    @endphp

                                                    <span class="sale-float"
                                                        style="color:black">-{{ round($discount) }}%
                                                        SALE</span>
                                                    @endif
                                                    <h5 class="card-title" style="color:black"> {{ $product->product_name }}</h5>
                                                    <p class="brand fw-bold " style="color:black">
                                                        <b>Brand Name:</b> {{ $product->brand->brand_name_cats_eye }}
                                                    </p>
                                                    <hr>
                                                    @if ($product->discount_price != 0)
                                                        <div class="d-flex justify-content-between pricing px-4">
                                                            <p class="text-dark fw-bolder font-size-18">
                                                                &#2547;{{ intval($product->discount_price) }}</p>
                                                            <p class="text-danger fw-bolder font-size-18">
                                                                <del
                                                                    class="text-danger">&#2547;{{ intval($product->selling_price) }}</del>
                                                            </p>
                                                        </div>
                                                    @else
                                                        <div class="d-flex justify-content-between pricing px-4">
                                                            <p class="text-dark fw-bolder font-size-18">
                                                                &#2547;{{ intval($product->selling_price) }}</p>

                                                        </div>
                                                    @endif
                                                </div>
                                            </a>
                                             <!--overlay-->
                                             <div id="overlay_background">
                                                <div class="text-light" style="font-size:30px;margin-top:150px;text-align:center">Stock Out  </div>
                                             </div>
                                              <!--end overlay-->
                                              <div class="card-footer px-0">
                                                <div class="add-to-card-cont">
                                                    @if($product->product_qty <= 0)
                                                        <button 
                                                        class="btn btn-primary-filled px-4 py-1 bg-secondary opacity-100"
                                                        disabled>Stock Out</button>
                                                    @else
                                                        <button 
                                                        
                                                        class="btn btn-primary-filled px-4 py-1"
                                                        style="background-color:#008081">Stock Out</button>
                                                    @endif
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                        
                                    @endforeach
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="tab-inner hidden" id="nav-new-arrivals">
                        <section class="mt-3 px-3">
                            <div class="container-fluid">
                                <div class="featured-new-topsales-slide">

                                    @foreach ($latest_products as $product)
                                    @if($product->product_qty > 0)
                                    <div>
                                        <div class="card featured-new-topsales-card">
                                            <a href="#">
                                                <div class="card-header p-5">
                                                    <a href="{{route('electronicProductDetails',[$product->category_id,$product->sub_category_id,$product->product_slug_name ] )}}">
                                                    <img class="img-fluid"
                                                        src="{{ asset('/' . $product->product_thambnail) }}" alt="">
                                                    </a>
                                                    <div class="float-badge">
                                                        <span class="badge-blue">New</span>
                                                    </div>
                                                </div>
                                                <div class="card-body px-4 pt-4 pb-1">

                                                    @if ($product->discount_price == 0)
                                                    @else
                                                    @php
                                                        $amount = $product->selling_price - $product->discount_price;
                                                        if ($product->selling_price) {
                                                            $discount = ($amount / $product->selling_price) * 100;
                                                        } else {
                                                            $discount = ($amount / 1) * 100;
                                                        }
                                                    @endphp

                                                    <span class="sale-float"
                                                        style="color:black">-{{ round($discount) }}%
                                                        SALE</span>
                                                    @endif
                                                    <a style="color:black" href="{{route('electronicProductDetails',[$product->category_id,$product->sub_category_id,$product->product_slug_name ] )}}">
                                                    <h5 class="card-title" style="color:black"> {{ $product->product_name }}
                                                    </a>
                                                    </h5>
                                                    <p class="brand fw-bold " style="color:black">
                                                        <b>Brand Name:</b> {{ $product->brand->brand_name_cats_eye }}
                                                    </p>
                                                    <hr>
                                                    @if ($product->discount_price != 0)
                                                        <div class="d-flex justify-content-between pricing px-4">
                                                            <p class="text-dark fw-bolder font-size-18">
                                                                &#2547;{{ intval($product->discount_price) }}</p>
                                                            <p class="text-danger fw-bolder font-size-18">
                                                                <del
                                                                    class="text-danger">&#2547;{{ intval($product->selling_price) }}</del>
                                                            </p>
                                                        </div>
                                                    @else
                                                        <div class="d-flex justify-content-between pricing px-4">
                                                            <p class="text-dark fw-bolder font-size-18">
                                                                &#2547;{{ intval($product->selling_price) }}</p>

                                                        </div>
                                                    @endif
                                                </div>
                                            </a>
                                            <a href="{{route('electronicProductDetails',[$product->category_id,$product->sub_category_id,$product->product_slug_name ] )}}">
                                            <div class="card-footer px-0">
                                                <div class="add-to-card-cont">
                                                    <div class="add-to-card-cont">
                                                        @if($product->product_qty <= 0)
                                                            <button 
                                                            class="btn btn-primary-filled px-4 py-1 bg-secondary opacity-100"
                                                            disabled>Stock Out</button>
                                                        @else
                                                            <button 
                                                            class="btn btn-primary-filled px-4 py-1"
                                                            style="background-color:#008081">Shop Now</button>
                                                        @endif
                                                        
                                                    </div>
                                                </div>

                                            </div>
                                        </a>
                                        </div>
                                    </div>
                                    @else
                                    <div style="margin-top: 15px;">
                                        <div class="card featured-new-topsales-card" >
                                            <a href="#" style="background-color: rgba(0, 0, 0, 0.4);">
                                                <div class="card-header p-5">
                                                    <img class="img-fluid"
                                                        src="{{ asset('/' . $product->product_thambnail) }}" alt="">
                                                    <div class="float-badge">
                                                        <span class="badge-blue">New</span>
                                                    </div>
                                                </div>
                                                <div class="card-body px-4 pt-4 pb-1">

                                                    @if ($product->discount_price == 0)
                                                    @else
                                                    @php
                                                        $amount = $product->selling_price - $product->discount_price;
                                                        if ($product->selling_price) {
                                                            $discount = ($amount / $product->selling_price) * 100;
                                                        } else {
                                                            $discount = ($amount / 1) * 100;
                                                        }
                                                    @endphp

                                                    <span class="sale-float"
                                                        style="color:black">-{{ round($discount) }}%
                                                        SALE</span>
                                                    @endif
                                                    <h5 class="card-title" style="color:black"> {{ $product->product_name }}
                                                    </h5>
                                                    <p class="brand fw-bold " style="color:black">
                                                        <b>Brand Name:</b> {{ $product->brand->brand_name_cats_eye }}
                                                    </p>
                                                    <hr>
                                                    @if ($product->discount_price != 0)
                                                        <div class="d-flex justify-content-between pricing px-4">
                                                            <p class="text-dark fw-bolder font-size-18">
                                                                &#2547;{{ intval($product->discount_price) }}</p>
                                                            <p class="text-danger fw-bolder font-size-18">
                                                                <del
                                                                    class="text-danger">&#2547;{{ intval($product->selling_price) }}</del>
                                                            </p>
                                                        </div>
                                                    @else
                                                        <div class="d-flex justify-content-between pricing px-4">
                                                            <p class="text-dark fw-bolder font-size-18">
                                                                &#2547;{{ intval($product->selling_price) }}</p>

                                                        </div>
                                                    @endif
                                                </div>
                                            </a>
                                            <!--overlay-->
                                            <div id="overlay_background">
                                                <div class="text-light" style="font-size:30px;margin-top:150px;text-align:center">Stock Out  </div>
                                             </div>
                                              <!--end overlay-->
                                            <div class="card-footer px-0">
                                                <div class="add-to-card-cont">
                                                    <div class="add-to-card-cont">
                                                            <button 
                                                            class="btn btn-primary-filled px-4 py-1"
                                                            style="background-color:#008081" disabled>Out of stock</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    
                                    @endforeach

                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="tab-inner hidden" id="nav-top-sales">
                        <section class="mt-3 px-3">
                            <div class="container-fluid">
                                <div class="featured-new-topsales-slide">
                                    @foreach ($topSales as $product)
                                    @if ($product->product_qty > 0)
                                    <div>
                                        <div class="card featured-new-topsales-card">
                                            <a
                                                href="#">
                                                <div class="card-header p-5">
                                                    <a href="{{route('electronicProductDetails',[$product->category_id,$product->sub_category_id,$product->product_slug_name ] )}}">
                                                    <img class="img-fluid"
                                                        src="{{ asset('/' . $product->product_thambnail) }}" alt="">
                                                    </a>
                                                    <div class="float-badge">
                                                        <span class="badge-blue">New</span>
                                                    </div>
                                                </div>
                                                <div class="card-body px-4 pt-4 pb-1">

                                                    @if ($product->discount_price == 0)
                                                    @else
                                                    @php
                                                        $amount = $product->selling_price - $product->discount_price;
                                                        if ($product->selling_price) {
                                                            $discount = ($amount / $product->selling_price) * 100;
                                                        } else {
                                                            $discount = ($amount / 1) * 100;
                                                        }
                                                    @endphp

                                                    <span class="sale-float"
                                                        style="color:black">-{{ round($discount) }}%
                                                        SALE</span>
                                                    @endif
                                                    <a style="color:black" href="{{route('electronicProductDetails',[$product->category_id,$product->sub_category_id,$product->product_slug_name ] )}}">
                                                    <h5  class="card-title" style="color:black"> {{ $product->product_name }}</h5>
                                                    </a>
                                                    <p class="brand fw-bold " style="color:black">
                                                        <b>Brand Name:</b>
                                                        {{ optional($product->brand)->brand_name_cats_eye }}
                                                    </p>
                                                    <hr>
                                                    @if ($product->discount_price != 0)
                                                        <div class="d-flex justify-content-between pricing px-4">
                                                            <p class="text-dark fw-bolder font-size-18">
                                                                &#2547;{{ intval($product->discount_price) }}</p>
                                                            <p class="text-danger fw-bolder font-size-18">
                                                                <del
                                                                    class="text-danger">&#2547;{{ intval($product->selling_price) }}</del>
                                                            </p>
                                                        </div>
                                                    @else
                                                        <div class="d-flex justify-content-between pricing px-4">
                                                            <p class="text-dark fw-bolder font-size-18">
                                                                &#2547;{{ intval($product->selling_price) }}</p>

                                                        </div>
                                                    @endif
                                                </div>
                                            </a>
                                            <a href="{{route('electronicProductDetails',[$product->category_id,$product->sub_category_id,$product->product_slug_name ] )}}">
                                                <div class="card-footer px-0">
                                                    <div class="add-to-card-cont">
                                                        <button 
                                                            class="btn btn-primary-filled px-4 py-1"
                                                            style="background-color:#008081">Shop Now
                                                        </button>
                                                    </div>
                                                </div>
                                           </a>
                                        </div>
                                    </div>
                                    @else
                                    <div style="margin-top: 15px;">
                                        <div class="card featured-new-topsales-card">
                                            <a
                                                href="#" style="background-color: rgba(0, 0, 0, 0.4);">
                                                <div class="card-header p-5">
                                                    <img class="img-fluid"
                                                        src="{{ asset('/' . $product->product_thambnail) }}" alt="">
                                                    <div class="float-badge img-fluid  bg-img">
                                                        <span class="badge-blue">New</span>
                                                    </div>
                                                </div>
                                                <div class="card-body px-4 pt-4 pb-1">

                                                    @if ($product->discount_price == 0)
                                                    @else
                                                    @php
                                                        $amount = $product->selling_price - $product->discount_price;
                                                        if ($product->selling_price) {
                                                            $discount = ($amount / $product->selling_price) * 100;
                                                        } else {
                                                            $discount = ($amount / 1) * 100;
                                                        }
                                                    @endphp

                                                    <span class="sale-float"
                                                        style="color:black">-{{ round($discount) }}%
                                                        SALE</span>
                                                    @endif
                                                    <h5 class="card-title" style="color:black"> {{ $product->product_name }}</h5>
                                                    <p class="brand fw-bold " style="color:black">
                                                        <b>Brand Name:</b>
                                                        {{ optional($product->brand)->brand_name_cats_eye }}
                                                    </p>
                                                    <hr>
                                                    @if ($product->discount_price != 0)
                                                        <div class="d-flex justify-content-between pricing px-4">
                                                            <p class="text-dark fw-bolder font-size-18">
                                                                &#2547;{{ intval($product->discount_price) }}</p>
                                                            <p class="text-danger fw-bolder font-size-18">
                                                                <del
                                                                    class="text-danger">&#2547;{{ intval($product->selling_price) }}</del>
                                                            </p>
                                                        </div>
                                                    @else
                                                        <div class="d-flex justify-content-between pricing px-4">
                                                            <p class="text-dark fw-bolder font-size-18">
                                                                &#2547;{{ intval($product->selling_price) }}</p>

                                                        </div>
                                                    @endif
                                                </div>
                                            </a>
                                            <!--overlay-->
                                            <div id="overlay_background">
                                                <div class="text-light" style="font-size:30px;margin-top:150px;text-align:center">Stock Out  </div>
                                             </div>
                                              <!--end overlay-->
                                            <div class="card-footer px-0">
                                                <div class="add-to-card-cont">
                                                        <button 
                                                            class="btn btn-primary-filled px-4 py-1"
                                                            style="background-color:#008081" disabled>Out of stock</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    
                                    @endif
                                    
                                        
                                    @endforeach


                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>

            <!--Featured, New Arrivals, Top Sales End-->



            <!-- Deals of The Day Start -->
            <div class="section-title-no-bg mt-5 px-md-5 px-3 pt-5 d-flex align-items-center justify-content-between deals-of-the-day">
                <div class="d-flex align-items-center">
                    <h5>Deals of The Day</h5>
                    <!--<div class="d-flex ms-4 align-items-center">-->
                    <!--    <p class="text-dark">Ends after: </p>-->
                    <!--    <div class="deals-of-the-day-countdown">-->
                    <!--        <ul>-->
                    <!--            <li><span id="deals-hours"></span>h :</li>-->
                    <!--            <li><span id="deals-minutes"></span>m :</li>-->
                    <!--            <li><span id="deals-seconds"></span>s</li>-->
                    <!--        </ul>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
                <div>
                    <a href="#" class="btn">View All</a>
                </div>
            </div>
            <section class="mt-4 px-md-4 px-3 electronics-all-section-cont" style="height: fit-content;">
                <div class="container-fluid">
                    <div class="deals-of-the-day-slide">
                        @foreach ($dailyBestSales as $dailyBestSale)
                            <div>
                                <div class="card deals-of-the-day-card">
                                    <a href="#">
                                        <div class="card-header p-3">
                                            <img class="img-fluid"
                                                src="{{ asset($dailyBestSale->product_thambnail) }}" alt="">
                                        </div>
                                    </a>
                                    <div class="card-body px-3 pt-1 pb-0">
                                        <h6 class="price">
                                            <!-- Selling and Discount Price Start -->
                                            @if ($dailyBestSale->discount_price == 0)
                                                <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                                    {{ intval($dailyBestSale->selling_price) }} </h4>
                                            @else
                                                <h4>
                                                    <span style="color:black"> <span style="font-size:15px">৳</span>
                                                        {{ intval($dailyBestSale->discount_price) }}</span>
                                                    <span><s class="text-danger"><span style="font-size:15px">৳</span>
                                                            {{ intval($dailyBestSale->selling_price) }}</s></span>
                                                </h4>
                                            @endif
                                            <!-- Selling and Discount Price End -->
                                        </h6>
                                        <h6 class="product-title mt-3"> {{ $dailyBestSale->product_name }}</h6>
                                    </div>
                                    <div class="card-footer px-0">
                                        <div class="add-to-card-cont" style="display: flex; justify-content: center;">
                                            @if($product->product_qty <= 0)
                                                <button 
                                                class="btn btn-primary-filled px-4 py-1 bg-secondary opacity-100"
                                                disabled>Stock Out</button>
                                            @else
                                                <button onclick="electronicPoductView({{ $product->id }})"
                                                    data-bs-toggle="modal" data-bs-target="#productQuickViewModalElectronics"
                                                    class="btn btn-primary-filled px-4 py-1"
                                                    style="background-color:#008081">Add to
                                                    Cart</button>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="card-footer px-3">
                                        <div class="rating">
                                            @if ($dailyBestSale->totalReview == 0)
                                                <ul class="rating">
                                                    <li><i class="fas fa-star text-secondary"></i></li>
                                                    <li><i class="fas fa-star text-secondary"></i></li>
                                                    <li><i class="fas fa-star text-secondary"></i></li>
                                                    <li><i class="fas fa-star text-secondary"></i></li>
                                                    <li><i class="fas fa-star text-secondary"></i></li>
                                                    <li>(0)</li>
                                                </ul>
                                            @else
                                                @php
                                                    $total = $dailyBestSale->totalReview;
                                                    $rating = ($dailyBestSale->sum_star_quality / $total + $dailyBestSale->sum_star_price / $total + $dailyBestSale->sum_star_value / $total) / 3;
                                                @endphp

                                                <div id="pvm-rating" class="modal-rating">
                                                    @php
                                                        $rating_blank = 5 - floor($rating);
                                                    @endphp
                                                    <ul class="rating">
                                                        @for ($i = 1; $i <= $rating; $i++)
                                                            <li><i class="fa-solid fa-star text-warning"></i></li>
                                                        @endfor
                                                        @for ($i = 1; $i <= $rating_blank; $i++)
                                                            <li><i class="fa-solid fa-star"
                                                                    style="color: #c2c2c2!important"></i></li>
                                                        @endfor
                                                        <li>({{ $dailyBestSale->totalReview }})</li>
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="sale-progress mt-3 mb-1">
                                            <div class="progress-bar">
                                                <div class="progress-bar-inner" data-percent="10">
                                                </div>
                                            </div>
                                            <p class="mt-3 text-dark">Sold: {{ $dailyBestSale->totalOrders }}</p>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Deals of The Day End -->


                <!-- Best Seller In The Last month Start -->
                <div
                    class="section-title-no-bg bottom-border mt-5 mx-md-5 mx-3 pt-5 pb-2 d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <h5>Best Selleing In The Last month</h5>
                    </div>
                    <div class="display-products-nav">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active"
                                    onclick="toggleDisplayProductsContent('best-seller-in-the-last-month-all','best-seller-in-the-last-month-tab-content')"
                                    id="nav-featured-tab" data-bs-toggle="tab" role="tab">All</button>
                                @foreach ($categoryWiseLastMonthBestSalesProduct as $category)
                                    <button class="nav-link"
                                        onclick="toggleDisplayProductsContent('{{ $category->category_slug_name }}','best-seller-in-the-last-month-tab-content')"
                                        id="nav-featured-tab" data-bs-toggle="tab" role="tab">
                                        {{ $category->category_name }}</button>
                                @endforeach
                            </div>
                        </nav>
                    </div>
                </div>
                <div id="custom-tab-content" class="products-custom-tab-content best-seller-in-the-last-month-tab-content">
                    <div class="tab-inner display-products-tab-inner display" id="best-seller-in-the-last-month-all">
                        <section class="mt-4 px-md-4 px-3">
                            <div class="container-fluid">
                                <div class="display-products-slide">
                                    @foreach ($categoryWiseLastMonthBestSalesProduct as $category)
                                        @foreach ($category->electronicProduct as $product)
                                            <div>
                                                <div class="card display-products-card">
                                                    <a
                                                        href="{{ route('electronicProductDetails', [$category->category_slug_name, $product->subcategory->sub_category_slug_name, $product->product_slug_name]) }}">
                                                        <div class="card-header p-3">
                                                            <img class="img-fluid"
                                                                src="{{ $product->product_thambnail }}" alt="">
                                                        </div>
                                                        <div class="card-body px-3 pt-4 pb-1">
                                                            <h6 class="product-title">{{ $product->product_name }}</h6>
                                                        </div>
                                                        <div class="card-footer px-3">
                                                            <div class="rating">
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star text-muted"></i>
                                                                <span class="ms-1 text-dark">2</span>
                                                            </div>
                                                            @if ($product->discount_price != 0)
                                                                <h6 class="my-3 text-dark fw-bold">
                                                                    <del>&#2547;{{ intval($product->selling_price) }}</del>
                                                                    &#2547;{{ intval($product->discount_price) }}
                                                                </h6>
                                                            @else
                                                                <h6 class="my-3 text-dark fw-bold">
                                                                    &#2547;{{ intval($product->selling_price) }}</h6>
                                                            @endif

                                                        </div>

                                                    </a>
                                                    <!-- 303030 -->

                                                    <div class="card-footer px-0">
                                                        <div class="add-to-card-cont"
                                                            style="display: flex; justify-content: center;">
                                                             @if($product->product_qty <= 0)
                                                                <button 
                                                                class="btn btn-primary-filled px-4 py-1 bg-secondary opacity-100"
                                                                disabled>Stock Out</button>
                                                            @else
                                                                <button onclick="electronicPoductView({{ $product->id }})"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#productQuickViewModalElectronics"
                                                                    class="btn btn-primary-filled px-4 py-1"
                                                                    style="background-color:#008081">Add to
                                                                    Cart</button>
                                                            @endif
                                                            
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        @endforeach
                                    @endforeach

                                </div>
                            </div>
                        </section>
                    </div>
                    @foreach ($categoryWiseLastMonthBestSalesProduct as $category)
                        <div class="tab-inner display-products-tab-inner hidden"
                            id="{{ $category->category_slug_name }}">
                            <section class="mt-4 px-md-4 px-3">
                                <div class="container-fluid">
                                    <div class="display-products-slide">

                                        @foreach ($category->electronicProduct as $product)
                                            <div>
                                                <div class="card display-products-card">
                                                    <a
                                                        href="{{ route('electronicProductDetails', [$category->category_slug_name, $product->subcategory->sub_category_slug_name, $product->product_slug_name]) }}">
                                                        <div class="card-header p-3">
                                                            <img class="img-fluid"
                                                                src="{{ asset('/' . $product->product_thambnail) }}"
                                                                alt="">
                                                        </div>
                                                        <div class="card-body px-3 pt-4 pb-1">
                                                            <h6 class="product-title">{{ $product->product_name }}</h6>
                                                        </div>
                                                        <div class="card-footer px-3">
                                                            <div class="rating">
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star text-muted"></i>
                                                                <span class="ms-1 text-dark">2</span>
                                                            </div>
                                                            <h6 class="my-3 text-dark fw-bold">&#2547;32,000</h6>
                                                        </div>
                                                    </a>
                                                    <div class="card-footer px-0">
                                                        <div class="add-to-card-cont"
                                                            style="display: flex; justify-content: center;">
                                                             @if($product->product_qty <= 0)
                                                                <button 
                                                                class="btn btn-primary-filled px-4 py-1 bg-secondary opacity-100"
                                                                disabled>Stock Out</button>
                                                            @else
                                                                <button onclick="electronicPoductView({{ $product->id }})"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#productQuickViewModalElectronics"
                                                                    class="btn btn-primary-filled px-4 py-1"
                                                                    style="background-color:#008081">Add to
                                                                    Cart</button>
                                                            @endif
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </section>
                        </div>
                    @endforeach

                </div>
                <!-- Best Seller In The Last month End -->
                
        <!-- Home Electronics Start -->
         @foreach ($firstCategory as $firstCategory)
            <div
                class="section-title-no-bg bottom-border mt-5 mx-md-5 mx-3 pt-5 pb-2 d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center text-capitalize">
                    <h5>{{ $firstCategory->category_name }}</h5>

                </div>
                <div class="display-products-nav">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active"
                                onclick="toggleDisplayProductsContent('home-electronics-all{{ $loop->iteration }}', 'home-electronics-tab-content{{ $firstCategory->category_slug_name }}')"
                                id="nav-featured-tab" data-bs-toggle="tab" role="tab">All</button>
                            @foreach ($firstCategory->subcategory as $subcategory)
                                <button class="nav-link"
                                    onclick="toggleDisplayProductsContent('{{ $subcategory->sub_category_slug_name }}', 'home-electronics-tab-content{{ $firstCategory->category_slug_name }}')"
                                    id="nav-featured-tab" data-bs-toggle="tab"
                                    role="tab">{{ $subcategory->sub_category_name }}</button>
                            @endforeach

                        </div>
                    </nav>
                </div>
            </div>
            
            <div id="custom-tab-content"
                class="products-custom-tab-content home-electronics-tab-content{{ $firstCategory->category_slug_name }}">
                <div class="tab-inner display-products-tab-inner display"
                            id="home-electronics-all{{ $loop->iteration }}">
                            <section class="mt-4 px-md-4 px-3">
                                <div class="container-fluid">
                                    <div class="display-products-slide">
                                        @foreach ($firstCategory->electronicProduct as $product)
                                            <div>
                                                <div class="card display-products-card">
                                                    <a onclick="electronicPoductView({{ $product->id }})"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#productQuickViewModalElectronics">
                                                        <div class="card-header p-3">
                                                            <img class="img-fluid"
                                                                src="{{ asset('/' . $product->product_thambnail) }}"
                                                                alt="">
                                                        </div>
                                                        <div class="card-body px-3 pt-4 pb-1"
                                                            style="display: flex; justify-content: center;">
                                                            <h6 class="product-title">{{ $product->product_name }}
                                                            </h6>
                                                        </div>
                                                        <div class="card-footer px-3"
                                                            style="display: flex; justify-content: center;">
                                                            <div class="rating">

                                                                @if (count($product->review) == 0)
                                                                    <ul class="rating">
                                                                        <li><i class="fas fa-star text-secondary"></i></li>
                                                                        <li><i class="fas fa-star text-secondary"></i></li>
                                                                        <li><i class="fas fa-star text-secondary"></i></li>
                                                                        <li><i class="fas fa-star text-secondary"></i></li>
                                                                        <li><i class="fas fa-star text-secondary"></i></li>
                                                                        <li>(0)</li>
                                                                    </ul>
                                                                @else
                                                                    @php
                                                                        $rating = 0;
                                                                    @endphp
                                                                    @foreach ($product->review as $review)
                                                                        @php
                                                                            $rating = $rating + (intval($review->quality) + intval($review->price) + intval($review->value)) / 3;
                                                                        @endphp
                                                                    @endforeach
                                                                    @php
                                                                        $rating = $rating / count($product->review);
                                                                        $rating_blank = 5 - floor($rating);
                                                                    @endphp
                                                                    <ul class="rating">
                                                                        @for ($i = 1; $i <= $rating; $i++)
                                                                            <li><i
                                                                                    class="fa-solid fa-star text-warning"></i>
                                                                            </li>
                                                                        @endfor
                                                                        @for ($i = 1; $i <= $rating_blank; $i++)
                                                                            <li><i class="fa-solid fa-star"
                                                                                    style="color: #c2c2c2!important"></i>
                                                                            </li>
                                                                        @endfor
                                                                        <li>({{ count($product->review) }})</li>
                                                                    </ul>
                                                                @endif
                                                            </div>

                                                        </div>

                                                        @if ($product->discount_price != 0)
                                                            <h6 class="my-2 text-dark fw-bold"
                                                                style="display: flex; justify-content: center;">
                                                                <del
                                                                    class="text-danger">&#2547;{{ intval($product->selling_price) }}</del>
                                                                &nbsp; &#2547;{{ intval($product->discount_price) }}
                                                            </h6>
                                                        @else
                                                            <h6 class="my-2 text-dark fw-bold"
                                                                style="display: flex; justify-content: center;">
                                                                &#2547;{{ intval($product->selling_price) }}</h6>
                                                        @endif

                                                    </a>
                                                    <div class="card-footer px-0">
                                                        <div class="add-to-card-cont"
                                                            style="display: flex; justify-content: center;">
                                                            @if($product->product_qty <= 0)
                                                                <button 
                                                                class="btn btn-primary-filled px-4 py-1 bg-secondary opacity-100"
                                                                disabled>Stock Out</button>
                                                            @else
                                                                <button onclick="electronicPoductView({{ $product->id }})"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#productQuickViewModalElectronics"
                                                                    class="btn btn-primary-filled px-4 py-1"
                                                                    style="background-color:#008081">Add
                                                                    to
                                                                    Cart</button>
                                                            @endif
                                                            
                                                        </div>
                                                        <hr />
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </section>
                        </div>
                        
                @foreach ($firstCategory->subcategory as $subcategory)
                     <div class="tab-inner display-products-tab-inner hidden"
                            id="{{ $subcategory->sub_category_slug_name }}">
                            <section class="mt-4 px-md-4 px-3">
                                <div class="container-fluid">
                                    <div class="display-products-slide">
                                        @foreach ($subcategory->electronicProducts as $product)
                                            <div>
                                                <div class="card display-products-card">
                                                    <a onclick="electronicPoductView({{ $product->id }})"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#productQuickViewModalElectronics">
                                                        <div class="card-header p-3">
                                                            <img class="img-fluid"
                                                                src="{{ asset('/' . $product->product_thambnail) }}"
                                                                alt="">
                                                        </div>
                                                        <div class="card-body px-3 pt-4 pb-1">
                                                            <h6 class="product-title">{{ $product->product_name }}
                                                                ssssssss
                                                            </h6>
                                                        </div>

                                                        <div class="card-footer px-3">
                                                            @if (count($product->review) == 0)
                                                                <ul class="rating">
                                                                    <li><i class="fas fa-star text-secondary"></i></li>
                                                                    <li><i class="fas fa-star text-secondary"></i></li>
                                                                    <li><i class="fas fa-star text-secondary"></i></li>
                                                                    <li><i class="fas fa-star text-secondary"></i></li>
                                                                    <li><i class="fas fa-star text-secondary"></i></li>
                                                                    <li>(0)</li>
                                                                </ul>
                                                            @else
                                                                @php
                                                                    $rating = 0;
                                                                @endphp
                                                                @foreach ($product->review as $review)
                                                                    @php
                                                                        $rating = $rating + (intval($review->quality) + intval($review->price) + intval($review->value)) / 3;
                                                                    @endphp
                                                                @endforeach
                                                                @php
                                                                    $rating = $rating / count($product->review);
                                                                    $rating_blank = 5 - floor($rating);
                                                                @endphp
                                                                <ul class="rating">
                                                                    @for ($i = 1; $i <= $rating; $i++)
                                                                        <li><i class="fa-solid fa-star text-warning"></i>
                                                                        </li>
                                                                    @endfor
                                                                    @for ($i = 1; $i <= $rating_blank; $i++)
                                                                        <li><i class="fa-solid fa-star"
                                                                                style="color: #c2c2c2!important"></i>
                                                                        </li>
                                                                    @endfor
                                                                    <li>({{ count($product->review) }})</li>
                                                                </ul>
                                                            @endif
                                                            <h6 class="my-2 text-dark fw-bold">&#2547;
                                                                {{ intval($product->selling_price) }}</h6>
                                                        </div>
                                                    </a>
                                                    <div class="card-footer px-0">
                                                        <div class="add-to-card-cont"
                                                            style="display: flex; justify-content: center;">
                                                            @if($product->product_qty <= 0)
                                                                <button 
                                                                class="btn btn-primary-filled px-4 py-1 bg-secondary opacity-100"
                                                                disabled>Stock Out</button>
                                                            @else
                                                                <button onclick="electronicPoductView({{ $product->id }})"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#productQuickViewModalElectronics"
                                                                    class="btn btn-primary-filled px-4 py-1"
                                                                    style="background-color:#008081">Add to
                                                                    Cart</button>
                                                            @endif
                                                        </div>
                                                        <hr />
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </section>
                        </div>
                @endforeach
            </div>
         @endforeach
        <!-- Home Electronics End -->
        </section>
    </main>
    
    
    
    <div class="modal fade" id="bppshops_promo" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <button type="button" class="btn-close bppshops_promo_close_btn" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                    <img class="img-fluid" src="{{ asset('frontend/assets/images/home_popup.jpg') }}" alt=""
                        srcset="">
                </div>
            </div>
        </div>
    </div>
    <script>
        //======================== Search option start ======================//
        let searchById = document.getElementById("searchId");

        searchById.addEventListener("keyup", event => {
            let searchBy = event.target.value;
            if (searchBy != '') {
                $.ajax({
                    url: "{{ route('searchproduct.ajax') }}",
                    method: "GET",
                    data: {
                        squery: searchBy
                    },
                    success: function(response) {
                        //  console.log(response);
                        $("#show-list").html(response);
                    }
                });
            } else {
                $.ajax({
                    url: "{{ route('searchproduct.ajax') }}",
                    method: "GET",
                    data: {
                        squery: searchBy
                    },
                    success: function(response) {
                        //  console.log(response);
                        $("#show-list").html('');
                    }
                });
            }

        });

        //======================== Search option end ======================//
    </script>

@endsection
