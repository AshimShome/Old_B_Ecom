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

        .p_name_long{
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }


        .fashion-home .slick-next .slick-arrow{
            color:#333;
        }
        .product-gallery-wrap {
            margin: 10px;
        }

        .hot-deal-nav-tabs {
            justify-content: end;
        }

        .hot-deal-nav-tabs .nav-link {
            border: none;
            margin-bottom: 0px;
            background-color: transparent;
            padding: 5px 20px;
            font-size: 16px;
        }

        .hot-deal-nav-tabs .nav-link.active {
            color: orangered;
            border-bottom: 2px solid orangered;
        }

        .product-gallery-wrap img {
            margin-bottom: 10px;
            width:100%;
            height:150px;

        }

        .fashion-home .creative-card {
            padding: 20px;
        }

        .fashion-home .offer-section {
            padding-bottom: 110px;
        }


        .product-banner-img img {
            height: 250px;
            width: 550px;
        }

        .brand-section {
            padding: 50px 10px;

        }

        .fashion-brand .slick-slide {
            height: auto;
        }


        .product-details-quantity {
            margin-bottom: 20px;
        }



        .gallery-item .product-price{

            margin-bottom:20px;
        }

        .gallery-item .product_new_add{

            padding-bottom:15px !important;
        }

        .fashion-btn-holder .tooltip-top.fashion-btn{
            border: none;
        }

        del{
            color :#dc3545 ;
        }

        @media(max-width:575px){
            .product-gallery-wrap img {
            margin-bottom: 10px;
            width:100%;
            height:160px;

        }
        }

        .myButton {
        	box-shadow: 0px 1px 0px 0px #fff6af;
        	background:linear-gradient(to bottom, #ffec64 5%, #ffab23 100%);
        	background-color:#ffec64;
        	border-radius:8px;
        	border:2px solid #ffaa22;
        	display:inline-block;
        	cursor:pointer;
        	color:#333333;
        	font-family:Arial;
        	font-size:11px;
        	font-weight:bold;
        	padding:8px 32px;
        	text-decoration:none;
        	text-shadow:0px 1px 0px #ffee66;
        }
        .myButton:hover {
        	background:linear-gradient(to bottom, #ffab23 5%, #ffec64 100%);
        	background-color:#ffab23;
        }
        .myButton:active {
        	position:relative;
        	top:1px;
        }

        .fashion-home .product-gallery-wrap{
            height:100%;
        }

        .fashion-home .product-gallery-inner h4 {
            height:40px;
            margin-bottom:10px;
            text-align:center;
        }


        .fashion-home .product_new_add h4{
            height:10px;
            margin-bottom:30px;
        }

        .fashion-home .hot-deal-price span{
            color: #222;
        }

        .gallery-card-heading h4{
            height:30px;
        }

        .fashion-home .product-gallery-inner h4 {
            font-size: 15px;
        }



        .fashion-home .media-body-innr{
            height:30px;
            margin-bottom:10px;

        }

        .cate-pro-inners
        {
            display: flex;
            justify-content: space-between;
            align-items:center;
            width: 100%;
        }

        .hot_deals_shopnow_button_wrap{
            display : flex;
            justify-content: space-around;
            align-items:center;
            margin-top:20px;
        }


        .best-selling-product-section .pro-info .product_new_add h4{

            margin-bottom:20px;
        }

        .category-pro-info{
            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        .catgory_content_div{
            margin-right:20px;
        }

        .category-pro-card{
            height:180px;
        }

    .fashion-btn-2 {
        background: #FF6000;
        color: #fff;
        padding: 8px 20px;
        font-family: 'Poppins';
        font-style: normal;
        font-weight: 600;
        font-size: 16px;
        line-height: 24px;
        border-radius: 10px;
        color: #FFFFFF;
        margin-bottom: 20px;
    }
    .fashion-btn-2:hover {
        background: #ff914d;
        color: #fff;
    }
    .product-gallery-inner > h4{
        overflow: hidden;
       text-overflow: ellipsis;
       display: -webkit-box;
       -webkit-line-clamp: 2; /* number of lines to show */
               line-clamp: 2;
       -webkit-box-orient: vertical;
    }

    .topSliderBannerSectionbanner {
            padding: 5px;
        }
    
    @media only screen and (max-width: 600px) {
        .hot-deal-section,
        .gallery,
        .best-selling-product-section,
        .category-headers,
        .category-sections,
        .sale-product-section-title,
        .daily-best-sale-product,
        .offer-section,
        .fashion-secondary-banner
        {
            display: none!important;
        }
        .topSliderBannerSectionbanner {
                display: none;
            }
        .fashion-pro-cate{
            display:flex;
            height: 335px;
            flex-wrap: wrap;
            justify-content: center;
            overflow: hidden;

        }
        .fashion-brand{
            height: 320px;
            display: grid;
           grid-template-columns: 50% 50%;
           overflow: hidden;
        }
        .fashion-brand-child{
           flex-grow: 1;
        }
    }

    .bg_r_color{
        color:#ff6000;
    }

    .fashion-home .gallery-item-inner{
        height: auto!important;
    }
    .theme-card h5.mini-title{
        height: 51px;
        overflow: hidden;
    }

     @media(max-width:480px){
         .fashion-home .gallery-item-inner h4 {
        margin-bottom:10px !important;
        font-size:18px !important;
         }
    .fashion-home .fashion-btn-holder{
    margin-top: 10px;
    }
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

    <div class="custom-header d-flex align-items-center custom-header-islamic custom-header-ecom-title all_header_global_top">
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
                                    <a href="{{ url('/fashion') }}" class="logo-container custom-header-ecom-title-home">
                                        <i class="fas fa-home"></i> Fashion Home
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- ---------- Search with Category ------------- -->
                        <div>
                            <a href="{{ url('/fashion') }}" class="logo-container custom-header-ecom-title-home">
                              <h2 class="text-white">Fashion</h2>
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


<div id="sidemenu-container" class="sidemenu-container hide-menu">
    <ul id="category-toggle-custom-sidemenu" class="category-sidemenu">
        @php
        $special_offer = App\Models\Product::where('special_offer','1')->where('ecom_name','3')->count();
       $coupons = App\Models\Coupon::where('status','1')->orderBy('id', 'DESC')->count();
        @endphp
        <li class="menu-heading">
            <a href="{{ url('/special/fashion/offer') }}"><span class="text">Special Offers</span> <span class="number">{{
                    $special_offer }}</span></a>

        </li>
        @php
        $currentUrl = Request::segment(2);
        $categories=App\Models\Category::where('status',1)->with('subcategory')->where('ecom_id','3')->get();
        @endphp
        <li class="mb-1 mt-3">
            <div class="collapse">
                {{-- for category --}}
                @foreach ($categories as $category)
                <li class="mb-1 mt-2">
                    {{-- vvvvvv --}}
                    @if(Request::segment(2) != $category->category_slug_name)
                    <a href="{{ url('/fabs/'. $category->category_slug_name) }}">
                            @endif
                            <button
                                class="btn btn-toggle align-items-center rounded {{ Request::segment(2) != $category->category_slug_name? 'collapsed' : '' }} "
                                data-bs-toggle="collapse" data-bs-target="#cat{{$category->id}}"
                                aria-expanded="{{ Request::segment(2) != $category->category_slug_name? 'false' : 'true' }}">
                                <img style="height:20px;width:20px" src="{{ asset($category->category_icon)}}" alt="bppshops"
                                    class="sidemenu-icon">
                                {{$category->category_name}}
                            </button>

                            @if(Request::segment(2) != $category->category_slug_name)
                        </a>
                        @endif
                        <div class="collapse {{ Request::segment(2) != $category->category_slug_name? '' : 'show' }}"
                            id="cat{{$category->id}}">
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
                                    <a
                                        href="{{ url('/fabs/' . $subcategory->category->category_slug_name .'/'. $subcategory->sub_category_slug_name) }}">
                                        @endif
                                        <button
                                            class="btn btn-toggle align-items-center rounded {{ Request::segment(3) != $subcategory->sub_category_slug_name? 'collapsed' : '' }}"
                                            data-bs-toggle="collapse" data-bs-target="#sub{{$subcategory->id}}"
                                            aria-expanded="{{ Request::segment(3) != $subcategory->sub_category_slug_name? 'false' : 'true' }}">
                                            {{$subcategory->sub_category_name}}
                                        </button>
                                        @if( collect(request()->segments())->last()!= $subcategory->sub_category_slug_name)
                                    </a>
                                    @endif
                                    <div class="collapse {{ Request::segment(3) != $subcategory->sub_category_slug_name? '' : 'show' }}"
                                        id="sub{{$subcategory->id}}">
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
                                            <li><a href="{{ url('/fabs/'.optional($subsubcategory->category)->category_slug_name.'/'. optional($subsubcategory->subcategory)->sub_category_slug_name.'/'. optional($subsubcategory)->subsubcategory_slug_name) }}"
                                                    class="link-dark rounded">{{$subsubcategory->subsubcategory_name}}</a>
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



<!-- Left Sidebar -->
    <main class="main-body fashion-home">
        <section class="main-content category-closed" id="main-content">
            <!--home slider start-->
            {{-- <section class="megastore-slide collection-banner section-py-space">
                <div class="container-fluid">
                    <div class="row mega-slide-block">
                        <div class="col-xl-6 col-lg-12 collection-banner-close" id="megastore-collection-banner">
                            <div class="row">
                                <div class="col-12">
                                    <div class="slide-1 no-arrow">
                                        @foreach ($sliders as $slider)
                                            <div>
                                                <div class="slide-main">
                                                    <img src="{{ asset($slider->slider_img) }}" class="img-fluid bg-img"
                                                        alt="bppshops">
                                                    <div
                                                        class="slide-contain  fashion-banner-slider-content d-flex align-items-start justify-content-center  flex-wrap flex-column">

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 fashion-secondary-banner">
                            <div class="row collection-p6">
                                @foreach ($banner as $item)
                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-6">
                                        <div
                                            class="collection-banner-main banner-17 banner-style7 collection-color14 p-left">
                                            <div class="collection-img">
                                                <img src="{{ asset(optional($item)->bennar_img) }}"
                                                    class="img-fluid bg-img  " alt="bppshops">
                                            </div>

                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <div class="row collection-p6">
                                @foreach ($banner2 as $item2)
                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-6">
                                        <div
                                            class="collection-banner-main banner-17 banner-style7 collection-color14 p-left">
                                            <div class="collection-img">
                                                <img src="{{ asset(optional($item2)->bennar_img) }}"
                                                    class="img-fluid bg-img  " alt="bppshops">
                                            </div>

                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                    </div>
                </div>
            </section> --}}
            <section>
                <div class="container-fluid">
                    <div class="row mt-2">
                        <div class="col-sm-12 col-md-6 col-lg-6 shuvoSliderCol">
                            <div class="topSliderBannerSectionslider">
                                @foreach ($sliders as $slider)
                                    <img class="img-fluid" src=" {{ asset($slider->slider_img) }} "
                                        alt="mega-store">
                                @endforeach
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 shuvoBannerCol">
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
            <!-- fdfdfdfjdsjfdsf -->

            <!--rounded category start-->
            <div class="section-title-no-bg px-md-5 px-3 fashion-pro-category">
                <h4 class="pt-4 text-center cate-heading pro-heading">Our Product Categories</h4>
            </div>
            <section class="featured-category mt-3 px-md-5 px-3">
                <div class="container-fluid px-2 px-lg-5">
                    <div class="row">
                        <div class="col">
                            <div class="fashion-pro-cate">
                                @foreach ($categories as $category)
                                    <div>
                                        <a href="{{ url('/fabs/' . $category->category_slug_name) }}">
                                            <div class="featured-category-item text-center">
                                                <div class="d-flex justify-content-center fash-pro-cate-img">
                                                    <img src="{{ asset($category->category_image) }}" alt="bppshops">
                                                </div>
                                                <div class="featured-category-item-header">
                                                    <h6 class="fw-bold mt-3">{{ $category->category_name }} ({{$category->products_list->count()}})</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="jfss-brand-holder d-flex justify-content-center align-items-center mt-4">
                        <a href="{{url('product/fashion/category/Product')}}" class="jfss-brand-btn"> All Categories <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                </div>
            </section>
            <!--rounded category end-->

            <!-- brand -->
            <section class="brand-section brand-category mt-3 px-md-5 px-3">
                <h2 class="">Our Brands</h2>
                <div class="container-fluid px-2 px-lg-5">
                    <div class="row">
                        <div class="col">
                            <div class="fashion-brand mb-5">
                                @foreach ($brands as $brand)
                                    <div class="fashion-brand-child">
                                         <a href="{{route('fashion.product.brandWiseProduct',$brand->id)}}">
                                            <div class="featured-category-item text-center">
                                                <div class="d-flex justify-content-center fash-pro-cate-img">
                                                    <img src="{{ asset($brand->brand_image) }}" alt="bppshops">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>

                            <div class="jfss-brand-holder d-flex justify-content-center align-items-center">
                                <a href="{{url('product/fashion/brand/AllProduct')}}" class="jfss-brand-btn"> All Brands <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Brand Section  -->


            <!-- Start Hot Deals Section  -->

            <div class="hot-deal-section">
                <div class="container-fluid">
                    <div class="row ">
                        <div class="col-lg-4 col-md-12 col-sm-12 ">
                            <div class="row ">
                                <div class="col-12 ">
                                    <div class="hot-deal-wrapper">
                                        <div class="hot-deal-header">
                                            <h2>Hot Deals</h2>
                                        </div>
                                        <!-- end hot-deal-header  -->

                                        <div class="slider-wrap">
                                            <div class="slider-main" id="slider-main">


                                                            @foreach($hot_deals as $item)
                                                                <div class="item {{$loop->first?'show':'hide'}} hot_deal_{{$item->id}}">
                                                                    <div class="hot-deal-inner ">
                                                            <div class="hot-deal-img-wrap">
                                                                @php
                                                             $amount = $item->selling_price - $item->discount_price;
                                                             $discount = ($amount / $item->selling_price) * 100;
                                                             @endphp
                                                                @foreach ($item->multiImg->take(4) as $image)

                                                                    <img src="{{ asset($image->photo_name) }}" alt="bppshops" width="80" height="80" onclick="myGallary(this,{{$item->id}})">

                                                                @endforeach

                                                            </div>
                                                            <!-- end hot-deal-img-wrap  -->
                                                            <div class="hot-deal-price d-flex justify-content-start" >
                                                                @if($item->discount_price == 0)
                                                                 <span class="d-none end_date">{{$item->end_date}}</span>
                                                                <span>
                                                                    &#2547;
                                                                    {{ intval($item->selling_price) }}
                                                                </span>
                                                                @else
                                                                 <span class="d-none end_date">{{$item->end_date}}</span>
                                                                 <span> &#2547;   {{ intval($item->discount_price) }}   </span>
                                                                 <span> <del>   &#2547; {{ intval($item->selling_price) }}</del> </span>
                                                                @endif


                                                            </div>

                                                            <!-- end hot-deal-main-img ccf -->
                                                             @if($item->product_qty==0)
                                                             <a
                                                             id="fashion_details_link" > <h4>{{ $item->product_name }}</h4></a>

                                                            <div class="hot-deal-main-img image-zoom imageID{{$item->id}}">



                                                                 <a id="fashion_details_link" >

                                                        <!-- % discount offer start-->
                                                             @if($discount==100)
                                                             <div class="tbdi-offer"> </div>
                                                              @else
                                                               <div class="tbdi-offer" style="background-color:#ef8341;border-radius:10px;color:#ffff;text-align:center;width:
                                                               45px;position: absolute;margin-top:5px;margin-right: 97px;">
                                                                     <p>-{{ round($discount) }}%</p>
                                                                   </div>
                                                              @endif
                                                            <!--% discount offer end-->

                                                                <img src="{{ asset($item->product_thambnail) }}"
                                                                class="imageID{{$item->id}}"
                                                                    alt="bppshops"    id="imageID{{$item->id}}" width="230" height="250"
                                                                    data-zoom-image="{{ asset($item->product_thambnail) }}">
                                                                   </a>
                                                            </div>
                                                                     <div
                                                                class="hot-deal-offer-inner d-flex justify-content-between align-items-center flex-wrap">
                                                                <div class="hot-deal-off-end">
                                                                    <h6>Hurry Up!</h6>
                                                                    <span>Offer ends in:</span>
                                                                </div>
                                                                <!-- end hot-deal-off-end -->
                                                                <div class="hot-deal-time">
                                                                    <div id="countdown">
                                                                        <ul>
                                                                            <li>
                                                                                <h5 data-id="#"  style="background-color:#696969">0</h5>
                                                                                <span>Days</span>
                                                                            </li>
                                                                            <li>
                                                                                <h5  style="background-color:#696969">0</h5>
                                                                                <span>Hours</span>
                                                                            </li>
                                                                            <li>
                                                                                <h5  style="background-color:#696969">0</h5>
                                                                                <span>Minutes</span>
                                                                            </li>
                                                                            <li>
                                                                                <h5  style="background-color:#696969">0</h5>
                                                                                <span>Seconds</span>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <!-- end hot-deal-time  -->
                                                            </div>


                                                            <!-- end hot-deal-offer-inner  -->
                                                               <div class =" hot_deals_shopnow_button_wrap">
                                                              <span> </span>
                                                                   <div class="fashion-btn-holder ">
                                                                        <a class="fashion-btn" style="background-color:#696969"
                                                                        id="fashion_details_link" class="cart-btn"><i class="fas fa-shopping-cart"></i>Out of stock</a>
                                                                    </div>
                                                               </div>
                                                            @else
                                                            <a  href="{{route('ProductDetailsFashion',[$item->category_id,$item->sub_category_id,$item->product_slug_name ] )}}"
                                                             id="fashion_details_link" > <h4>{{ $item->product_name }}</h4></a>

                                                            <div class="hot-deal-main-img image-zoom imageID{{$item->id}}">
                                                                 <a  href="{{route('ProductDetailsFashion',[$item->category_id,$item->sub_category_id,$item->product_slug_name ] )}}"
                                                                 id="fashion_details_link" >
                                                                <img src="{{ asset($item->product_thambnail) }}"
                                                                class="imageID{{$item->id}}"
                                                                    alt="bppshops" id="imageID{{$item->id}}" width="230" height="250"
                                                                    data-zoom-image="{{ asset($item->product_thambnail) }}">
                                                                    </a>

                                                            </div>
                                                             <div
                                                                class="hot-deal-offer-inner d-flex justify-content-between align-items-center flex-wrap">
                                                                <div class="hot-deal-off-end">
                                                                    <h6>Hurry Up!</h6>
                                                                    <span>Offer ends in:</span>
                                                                </div>
                                                                <!-- end hot-deal-off-end -->
                                                                <div class="hot-deal-time">
                                                                    <div id="countdown">
                                                                        <ul>
                                                                            <li>
                                                                                <h5 data-id="{{$item->id}}" class="days"></h5>
                                                                                <span>Days</span>
                                                                            </li>
                                                                            <li>
                                                                                <h5 class="hours mt-3"></h5>
                                                                                <span>Hours</span>
                                                                            </li>
                                                                            <li>
                                                                                <h5 class="minutes mt-3"></h5>
                                                                                <span>Minutes</span>
                                                                            </li>
                                                                            <li>
                                                                                <h5 class="seconds mt-3"></h5>
                                                                                <span>Seconds</span>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <!-- end hot-deal-time  -->
                                                            </div>


                                                            <!-- end hot-deal-offer-inner  -->
                                                               <div class =" hot_deals_shopnow_button_wrap">
                                                              <span> </span>
                                                                   <div class="fashion-btn-holder ">
                                                                        <a class="fashion-btn" href="{{route('ProductDetailsFashion',[$item->category_id,$item->sub_category_id,$item->product_slug_name ] )}}"
                                                                        id="fashion_details_link" class="cart-btn"><i class="fas fa-shopping-cart"></i> Shop Now</a>
                                                                    </div>
                                                               </div>
                                                           @endif


                                                        </div>
                                                        <!-- end hot-deal-inner  -->
                                                    </div>
                                                @endforeach
                                            </div>
                                            <!-- end owl-carousel  -->
                                        </div>
                                        @foreach($hot_deals as $item)

                                            <div class="hot-deal-footer {{$loop->first?'show':''}} hot_button_{{$item->id}}" style="display:{{$loop->first?"":"none"}}"  >
                                                <button class="prev-btn slider-btn " type="button" onclick="prev({{$item->id}})"> <i
                                                        class="fa-solid fa-angle-left"></i> Previous Deal
                                                </button>
                                                <button class="prev-btn slider-btn " type="button" onclick="next({{$item->id}})"> Next Deal
                                                    <i class="fa-solid fa-angle-right"></i> </button>
                                            </div>

                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col  -->







                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="hot-deal-product-wrapper">
                                <ul class="nav nav-tabs hot-deal-nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" data-bs-toggle="tab"
                                            data-bs-target="#latest-products-tab" type="button" role="tab"
                                            aria-controls="home" aria-selected="true">Latest product</button>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                            data-bs-target="#top_retes_all" type="button" role="tab"
                                            aria-controls="contact" aria-selected="false">Top Rated</button>
                                    </li>
                                </ul>
                                <div class="tab-content mt-4 " id="myTabContent">
                                    <div class="tab-pane fade show active" id="latest-products-tab" role="tabpanel"
                                        aria-labelledby="home-tab">
                                        {{-- ---------------- Latest Products Start------------- --}}
                                        <div
                                            class="latest-product-innr d-flex justify-content-start align-items-center flex-wrap">
                                            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 row-cols-xl-5 g-4 w-100">
                                                @foreach ($latest_products as $latest_product)
                                                    @if($latest_product->product_qty == 0)
                                                    <div class="col">
                                                        <div class="card product-gallery-wrap  ">
                                                             <a  href="{{route('ProductDetailsFashion',[$latest_product->category_id,$latest_product->sub_category_id,$latest_product->product_slug_name ] )}}"
                                                             id="fashion_details_link" >
                                                            <img src="{{ asset($latest_product->product_thambnail) }}"alt="bppshops"  class="card-img-top">
                                                            </a>
                                                            <div class="card-body">

                                                             @php
                                                             $amount = $latest_product->selling_price - $latest_product->discount_price;
                                                             $discount = ($amount / $latest_product->selling_price) * 100;
                                                             @endphp

                                                             @if($discount==100)
                                                             <div class="tbdi-offer">
                                                                   </div>
                                                              @else
                                                               <div class="tbdi-offer" style="background-color:#ef8341;border-radius:10px;color:#ffff;text-align:center;width:
                                                               45px;position: absolute;margin-top:-186px;margin-right: 97px;">
                                                                         <p>-{{ round($discount) }}%</p>
                                                                   </div>
                                                              @endif

                                                                <div class="product-gallery-inner">
                                                    <a  href="{{route('ProductDetailsFashion',[$latest_product->category_id,$latest_product->sub_category_id,$latest_product->product_slug_name ] )}}"
                                                    id="fashion_details_link" >
                                                        <h4 class="p_name_long"><b>{{ $latest_product->product_name }}</b></h4>
                                                        </a>
                                                                    <!-- Selling and Discount Price Start 9090 -->
                                                                    <div class="product_new_add">
                                                                        @if ($latest_product->discount_price == 0)
                                                                        <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                                                            <b>{{ intval($latest_product->selling_price) }}</b> </h4>
                                                                        @else
                                                                        <h4>
                                                                            <span style="color:black"> <span style="font-size:15px">৳</span>
                                                                                <b>{{ intval($latest_product->discount_price) }}</b></span>
                                                                            <span><s class="text-danger" style="font-size:15px"><span >৳</span>
                                                                                    <b>{{ intval($latest_product->selling_price) }}</b></s></span>
                                                                        </h4>
                                                                        @endif
                                                                     </div>
                                                                     <!-- Selling and Discount Price End -->

                                                                     <!--over lay-->
                                                                     <div id="overlay_background">
                                                                      <div class="text-light" style="font-size:30px;margin-top:100px;text-align:center">Stock <br> Out  </div>
                                                                   </div>
                                                                   <!--end overlay-->

                                                                    <div class="fashion-btn-holder">
                                                                         <a class="fashion-btn" style="font-size:14px !important;padding: 7px 14px; pointer-events: none; background-color: #6c757d"
                                                                         href="{{route('ProductDetailsFashion',[$latest_product->category_id,$latest_product->sub_category_id,$latest_product->product_slug_name ] )}}"
                                                                         id="fashion_details_link" class="cart-btn"><i class="fas fa-shopping-cart"> </i> Out of Stock</a>
                                                                    </div>

                                                                </div>


                                                            </div>

                                                        </div>
                                                    </div>

                                                    @else




                                                       <div class="col">
                                                        <div class="card product-gallery-wrap  ">
                                                             <a  href="{{route('ProductDetailsFashion',[$latest_product->category_id,$latest_product->sub_category_id,$latest_product->product_slug_name ] )}}" id="fashion_details_link" >
                                                            <img src="{{ asset($latest_product->product_thambnail) }}"alt="bppshops"  class="card-img-top">
                                                            </a>
                                                            <div class="card-body">

                                                             @php
                                                             $amount = $latest_product->selling_price - $latest_product->discount_price;
                                                             $discount = ($amount / $latest_product->selling_price) * 100;
                                                             @endphp

                                                             @if($discount==100)
                                                             <div class="tbdi-offer">
                                                                   </div>
                                                              @else
                                                               <div class="tbdi-offer" style="background-color:#ef8341;border-radius:10px;color:#ffff;text-align:center;width:
                                                               45px;position: absolute;margin-top:-186px;margin-right: 97px;">
                                                                         <p>-{{ round($discount) }}%</p>
                                                                   </div>
                                                              @endif

                                                                <div class="product-gallery-inner">
                                                    <a  href="{{route('ProductDetailsFashion',[$latest_product->category_id,$latest_product->sub_category_id,$latest_product->product_slug_name ] )}}"
                                                    id="fashion_details_link" ><h4 class="p_name_long" >{{ $latest_product->product_name }}</h4></a>
                                                                    <!-- Selling and Discount Price Start 9090 -->
                                                                    <div class="product_new_add">
                                                                        @if ($latest_product->discount_price == 0)
                                                                        <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                                                            <b>{{ intval($latest_product->selling_price) }}</b> </h4>
                                                                        @else
                                                                        <h4>
                                                                            <span style="color:black"> <span style="font-size:15px">৳</span>
                                                                                <b>{{ intval($latest_product->discount_price) }}</b></span>
                                                                            <span><s class="text-danger" style="font-size:15px"><span >৳</span>
                                                                                    <b>{{ intval($latest_product->selling_price) }}</b></s></span>
                                                                        </h4>
                                                                        @endif
                                                                     </div>
                                                                     <!-- Selling and Discount Price End -->
                                                                    <div class="fashion-btn-holder">
                                                                         <a class="fashion-btn" style="font-size:14px !important;padding: 7px 14px;"
                                                                         href="{{route('ProductDetailsFashion',[$latest_product->category_id,$latest_product->sub_category_id,$latest_product->product_slug_name ] )}}" id="fashion_details_link" class="cart-btn"><i class="fas fa-shopping-cart"> </i> Shop Now</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        {{-- ---------------- Latest Products End------------- --}}
                                    </div>


                            <div class="tab-pane" id="top_retes_all" role="tabpanel"
                                        aria-labelledby="home-tab">
                                        {{-- ---------------- top reted Products Start------------- --}}
                                        <div
                                            class="latest-product-innr d-flex justify-content-start align-items-center flex-wrap">
                                            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 row-cols-xl-5 g-4 w-100">

                                                @foreach ( $top_rated as $item )

                                                  @if($item->product_qty == 0)
                                                <div class="col">
                                                        <div class="card product-gallery-wrap">
                                                             <a  href="{{route('ProductDetailsFashion',[$item->category_id,$item->sub_category_id,$item->product_slug_name ] )}}" id="fashion_details_link" >
                                                            <img src="{{ asset($item->product_thambnail) }}"alt="bppshops"  class="card-img-top">
                                                            </a>
                                                            <div class="card-body">
                                                                      @php
                                                             $amount = $item->selling_price - $item->discount_price;
                                                             $discount = ($amount / $item->selling_price) * 100;
                                                             @endphp
                                                             @if($discount==100)

                                                             <div class="tbdi-offer">
                                                                   </div>
                                                              @else
                                                               <div class="tbdi-offer" style="background-color:#ef8341;border-radius:10px;color:#ffff;text-align:center;width:
                                                               45px;position: absolute;margin-top:-190px;">
                                                                     <p>-{{ round($discount) }}%</p>

                                                                   </div>
                                                              @endif
                                                                <div class="product-gallery-inner">
                                                               <a  href="{{route('ProductDetailsFashion',[$item->category_id,$item->sub_category_id,$item->product_slug_name ] )}}"
                                                               id="fashion_details_link" ><h4 class="p_name_long">{{ $item->product_name }}</h4></a>

                                                                    <!-- Selling and Discount Price Start 9090 -->
                                                                    <div class="product_new_add">
                                                                        @if ($item->discount_price == 0)
                                                                        <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                                                            <b>{{ intval($item->selling_price) }}</b> </h4>
                                                                        @else
                                                                        <h4>
                                                                            <span style="color:black"> <span style="font-size:15px">৳</span>
                                                                                <b>{{ intval($item->discount_price) }}</b></span>
                                                                            <span><s class="text-danger" style="font-size:15px"><span>৳</span>
                                                                                    <b>{{ intval($item->selling_price) }}</b></s></span>
                                                                        </h4>
                                                                        @endif
                                                                     </div>
                                                                     <!-- Selling and Discount Price End -->

                                                                       <!--over lay-->
                                                                     <div id="overlay_background">
                                                                      <div class="text-light" style="font-size:30px;margin-top:100px;text-align:center">Stock <br> Out  </div>
                                                                   </div>
                                                                   <!--end overlay-->



                                                                    <div class="fashion-btn-holder">
                                                                         <a class="fashion-btn"
                                                                         style="font-size:14px !important;padding: 7px 14px; pointer-events: none; background-color: #6c757d"
                                                                         href="{{route('ProductDetailsFashion',[$item->category_id,$item->sub_category_id,$item->product_slug_name ] )}}"
                                                                         id="fashion_details_link" class="cart-btn"><i class="fas fa-shopping-cart"></i>Out Of Stock</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @else
                                                      <div class="col">
                                                        <div class="card product-gallery-wrap">
                                                             <a  href="{{route('ProductDetailsFashion',[$item->category_id,$item->sub_category_id,$item->product_slug_name ] )}}" id="fashion_details_link" >
                                                            <img src="{{ asset($item->product_thambnail) }}"alt="bppshops"  class="card-img-top">
                                                            </a>
                                                            <div class="card-body">
                                                                      @php
                                                             $amount = $item->selling_price - $item->discount_price;
                                                             $discount = ($amount / $item->selling_price) * 100;
                                                             @endphp
                                                             @if($discount==100)

                                                             <div class="tbdi-offer">
                                                                   </div>
                                                              @else
                                                               <div class="tbdi-offer" style="background-color:#ef8341;border-radius:10px;color:#ffff;text-align:center;width: 45px;position:
                                                               absolute;margin-top:-190px;">
                                                                     <p>-{{ round($discount) }}%</p>

                                                                   </div>
                                                              @endif
                                                                <div class="product-gallery-inner">
                                                               <a  href="{{route('ProductDetailsFashion',[$item->category_id,$item->sub_category_id,$item->product_slug_name ] )}}"
                                                               id="fashion_details_link" ><h4 class="p_name_long">{{ $item->product_name }}</h4></a>

                                                                    <!-- Selling and Discount Price Start 9090 -->
                                                                    <div class="product_new_add">
                                                                        @if ($item->discount_price == 0)
                                                                        <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                                                            <b>{{ intval($item->selling_price) }}</b> </h4>
                                                                        @else
                                                                        <h4>
                                                                            <span style="color:black"> <span style="font-size:15px">৳</span>
                                                                                {{ intval($item->discount_price) }}</span>
                                                                            <span><s class="text-danger" style="font-size:15px"><span >৳</span>
                                                                                    <b>{{ intval($item->selling_price) }}</b></s></span>
                                                                        </h4>
                                                                        @endif
                                                                     </div>
                                                                     <!-- Selling and Discount Price End -->

                                                                    <div class="fashion-btn-holder">
                                                                         <a class="fashion-btn" href="{{route('ProductDetailsFashion',[$item->category_id,$item->sub_category_id,$item->product_slug_name ] )}}" id="fashion_details_link" class="cart-btn"><i class="fas fa-shopping-cart"></i>Shop Now</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif


                                                @endforeach
                                            </div>
                                        </div>
                                        {{-- ---------------- Latest Products End------------- --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col  -->
                </div>
            </div>
            <!-- End Hot Deals Section  -->
            <!-- Start Most Popular Product  -->
            <section class="gallery">
                <div class="container-fluid">
                    <div class="row">
                        <div class="gallery-filter" >
                        <a href="{{url('porduct/fashion/category')}}"><span class="myButton" style="font-size: 16px">All Product</span></a>
                            <span class="filter-item active" data-filter="all"></span>
                            @foreach ($categories as $item)
                                <span class="filter-item myButton" data-filter="{{ $item->category_slug_name }}">{{ $item->category_name }}</span>
                            @endforeach
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <!-- gallery item start -->
                        @foreach ($categories as $item)
                            @foreach ($item->fashionProduct->take(10) as $product)
                                <div class=" card gallery-item {{ $item->category_slug_name }}">
                                    <div class="gallery-item-inner {{ $item->category_slug_name }}">
                                         @if($product->product_qty <= 0)
                                        <img src="{{ asset($product->product_thambnail) }}" alt="bppshops"
                                            class="product-img">

                                        <div class = " card-body">
                                                  @php
                                                  $amount = $product->selling_price - $product->discount_price;
                                                             $discount = ($amount / $product->selling_price) * 100;
                                                             @endphp
                                                             @if($discount==100)

                                                             <div class="tbdi-offer">
                                                                   </div>
                                                              @else
                                                               <div class="tbdi-offer" style="background-color:#ef8341;border-radius:10px;color:#ffff;text-align:center;width: 45px;position:
                                                               absolute;margin-top: -246px;">
                                                                     <p>-{{ round($discount) }}%</p>
                                                                   </div>
                                                              @endif
                                                              <h4 class="gallery-card-heading" style="color:black">{{ $product->product_name }}</h4>

                                          <!-- Selling and Discount Price Start -->
                                            <div class="media-body-innr ">
                                                @if ($product->discount_price == 0)
                                                <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                                    <b>{{ intval($product->selling_price) }} </b></h4>
                                                @else
                                                <h4>
                                                    <span style="color:black"> <span style="font-size:15px">৳</span>
                                                        <b>{{ intval($product->discount_price) }}</b></span>
                                                    <span><s class="text-danger" style="font-size:15px"><span >৳</span>
                                                            <b>{{ intval($product->selling_price) }}</b></s></span>
                                                </h4>
                                                @endif
                                             </div>
                                             <!-- Selling and Discount Price End -->

                                             <!--overlay-->
                                            <div id="overlay_background">
                                              <div class="text-light" style="font-size:30px;margin-top:100px;text-align:center">Stock <br> Out  </div>
                                           </div>
                                            <!--end overlay-->


                                         <div class="fashion-btn-holder">
                                                <a class="tooltip-top fashion-btn bg-secondary" href="javascript:void(0)"
                                                     style="pointer-events: none;">Out of Stock</i>
                                                </a>





                                            @else

                                             <a  href="{{route('ProductDetailsFashion',[$product->category_id,$product->sub_category_id,$product->product_slug_name ] )}}" id="fashion_details_link" >
                                              <img src="{{ asset($product->product_thambnail) }}" alt="bppshops"
                                            class="product-img">
                                            </a>
                                             <div class = " card-body">
                                                  @php

                                                             $amount = $product->selling_price - $product->discount_price;
                                                             $discount = ($amount / $product->selling_price) * 100;
                                                             @endphp
                                                             @if($discount==100)

                                                             <div class="tbdi-offer">

                                                                   </div>

                                                              @else
                                                               <div class="tbdi-offer" style="background-color:#ef8341;border-radius:10px;color:#ffff;text-align:center;width: 45px;position: absolute;margin-top: -246px;">
                                                                     <p>-{{ round($discount) }}%</p>

                                                                   </div>
                                                              @endif
                                                               <a  href="{{route('ProductDetailsFashion',[$product->category_id,$product->sub_category_id,$product->product_slug_name ] )}}" id="fashion_details_link" > <h4 class="gallery-card-heading" style="color:black">{{ $product->product_name }}</h4></a>

                                          <!-- Selling and Discount Price Start -->
                                            <div class="media-body-innr ">
                                                @if ($product->discount_price == 0)
                                                <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                                    <b>{{ intval($product->selling_price) }}</b> </h4>
                                                @else
                                                <h4>
                                                    <span style="color:black"> <span style="font-size:15px">৳</span>
                                                        <b>{{ intval($product->discount_price) }}</b></span>
                                                    <span><s class="text-danger" style="font-size:15px"><span >৳</span>
                                                           <b> {{ intval($product->selling_price) }}</b></s></span>
                                                </h4>
                                                @endif
                                             </div>
                                             <!-- Selling and Discount Price End -->
                                         <div class="fashion-btn-holder">
                                            <a class="fashion-btn" href="{{route('ProductDetailsFashion',[$product->category_id,$product->sub_category_id,$product->product_slug_name ] )}}"
                                            id="fashion_details_link" class="cart-btn"><i class="fas fa-shopping-cart"></i> Shop Now</a>
                                            @endif
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                        <!-- gallery item end -->
                    </div>
                </div>
            </section>
            <!-- Start most popular product gallery  -->
            <!-- End Most Popular Product  -->
            <!-- Start Best Selling Product  -->
            <section class="best-selling-product-section">
                <div class="best-selling-header">
                    <h2> Best selling Products</h2>
                </div>
                <div class="row">
                    @foreach ($fashion_best_selling_new as $item)


                       @if($item->product_qty == 0)
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-inner d-flex justify-content-around align-items-center">
                                        <div class="card-img">
                                             <a
                                             id="fashion_details_link" >
                                            <img src="{{ asset($item->product_thambnail) }}" alt="bppshops" style="height: 150px;" >
                                            </a>
                                        </div>
                                        <div class="pro-info">
                                                  @php
                                                 $amount = $item->selling_price - $item->discount_price;
                                                 $discount = ($amount / $item->selling_price) * 100;

                                                             @endphp
                                                             @if($discount==100)

                                                             <div class="tbdi-offer">  </div>

                                                              @else
                                                               <div class="tbdi-offer" style="background-color:#ef8341;border-radius:10px;color:#ffff;text-align:center;width: 45px;position: absolute;margin-top:-190px;">
                                                                     <!--<p>-{{ round($discount) }}%</p>-->

                                                                   </div>
                                                              @endif
                                                               <a id="fashion_details_link" >
                                                               <h4 class="pd-name">{{ $item->product_name }}</h4></a>

                                            <!-- Selling and Discount Price Start 9090 -->
                                            <div class="product_new_add">
                                                @if ($item->discount_price == 0)
                                                <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                                    <b>{{ intval($item->selling_price) }}</b> </h4>
                                                @else
                                                <h4>
                                                    <span style="color:black"> <span style="font-size:15px">৳</span>
                                                        <b>{{ intval($item->discount_price) }}</b></span>
                                                    <span class="text-danger"style="font-size:15px; color: "><del>৳ {<b>{ intval($item->selling_price) }}</b></del></span>
                                                </h4>
                                                @endif
                                             </div>
                                             <!-- Selling and Discount Price End -->
                                            @php
                                                $review = 0;
                                                if($item->sum_star!=0 && $item->total_star!=0)
                                                { $review = $item->sum_star / $item->total_star;
                                                }else
                                                { $review = 0;}
                                            @endphp
                                            <div class="ratting">
                                                @if ($review == 1 || $review>1)
                                                    <span><i class="fa-solid fa-star"></i></span>
                                                @else
                                                    <span><i class="fa-regular fa-star"></i></i></span>
                                                @endif

                                                @if($review == 2 || $review>2)
                                                    <span><i class="fa-solid fa-star"></i></span>
                                                @else
                                                    <span><i class="fa-regular fa-star"></i></i></span>
                                                @endif

                                                @if($review == 3 || $review>3)
                                                    <span><i class="fa-solid fa-star"></i></span>
                                                @else
                                                    <span><i class="fa-regular fa-star"></i></i></span>
                                                @endif

                                                @if($review == 4 || $review>4)
                                                    <span><i class="fa-solid fa-star"></i></span>
                                                @else
                                                    <span><i class="fa-regular fa-star"></i></i></span>
                                                @endif

                                                @if($review == 5 || $review>5)
                                                    <span><i class="fa-solid fa-star"></i></span>
                                                @else
                                                    <span><i class="fa-regular fa-star"></i></i></span>
                                                @endif
                                            </div>




                                            <!--overlay-->
                                            <div id="overlay_background">
                                              <div class="text-light" style="font-size:30px;margin-top:50px;text-align:center">Stock Out  </div>
                                           </div>
                                            <!--end overlay-->


                                       <!-- overlay -->
                                          <div style="margin-top: 10px">
                                            <a class="fashion-btn" style="color: white; font-size: 14px; background-color: #777; border-radius: 5px; padding: 5px;
                                            " class="cart-btn"> <i class="fas fa-shopping-cart"> </i> Out of Stock</a>
                                        </div>
                                        <!-- overlay cccf-->


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                       @else
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-inner d-flex justify-content-around align-items-center">
                                        <div class="card-img">
                                             <a  href="{{route('ProductDetailsFashion',[$item->category_id,$item->sub_category_id,$item->product_slug_name ] )}}"
                                             id="fashion_details_link" >
                                            <img src="{{ asset($item->product_thambnail) }}" alt="bppshops" style="height: 150px;" >
                                            </a>
                                        </div>
                                        <div class="pro-info">
                                                  @php
                                                 $amount = $item->selling_price - $item->discount_price;
                                                 $discount = ($amount / $item->selling_price) * 100;

                                                             @endphp
                                                             @if($discount==100)

                                                             <div class="tbdi-offer">  </div>

                                                              @else
                                                               <div class="tbdi-offer" style="background-color:#ef8341;border-radius:10px;color:#ffff;text-align:center;width: 45px;position: absolute;margin-top:-190px;">
                                                                     <!--<p>-{{ round($discount) }}%</p>-->

                                                                   </div>
                                                              @endif
                                                               <a  href="{{route('ProductDetailsFashion',[$item->category_id,$item->sub_category_id,$item->product_slug_name ] )}}" id="fashion_details_link" >
                                                               <h4 class="pd-name">{{ $item->product_name }}</h4></a>

                                            <!-- Selling and Discount Price Start 9090 -->
                                            <div class="product_new_add">
                                                @if ($item->discount_price == 0)
                                                <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                                    <b>{{ intval($item->selling_price) }}</b> </h4>
                                                @else
                                                <h4>
                                                    <span style="color:black"> <span style="font-size:15px">৳</span>
                                                        <b>{{ intval($item->discount_price) }}</b></span>
                                                    <span class="text-danger"style="font-size:15px; color: "><del>৳ {<b>{ intval($item->selling_price) }}</b></del></span>
                                                </h4>
                                                @endif
                                             </div>
                                             <!-- Selling and Discount Price End -->
                                            @php
                                                $review = 0;
                                                if($item->sum_star!=0 && $item->total_star!=0)
                                                { $review = $item->sum_star / $item->total_star;
                                                }else
                                                { $review = 0;}
                                            @endphp
                                            <div class="ratting">
                                                @if ($review == 1 || $review>1)
                                                    <span><i class="fa-solid fa-star"></i></span>
                                                @else
                                                    <span><i class="fa-regular fa-star"></i></i></span>
                                                @endif

                                                @if($review == 2 || $review>2)
                                                    <span><i class="fa-solid fa-star"></i></span>
                                                @else
                                                    <span><i class="fa-regular fa-star"></i></i></span>
                                                @endif

                                                @if($review == 3 || $review>3)
                                                    <span><i class="fa-solid fa-star"></i></span>
                                                @else
                                                    <span><i class="fa-regular fa-star"></i></i></span>
                                                @endif

                                                @if($review == 4 || $review>4)
                                                    <span><i class="fa-solid fa-star"></i></span>
                                                @else
                                                    <span><i class="fa-regular fa-star"></i></i></span>
                                                @endif

                                                @if($review == 5 || $review>5)
                                                    <span><i class="fa-solid fa-star"></i></span>
                                                @else
                                                    <span><i class="fa-regular fa-star"></i></i></span>
                                                @endif
                                            </div>

                                               <div class="fashion-btn-holder" style="margin-top: 20px;">

                                             <a class="fashion-btn" href="{{route('ProductDetailsFashion',[$item->category_id,$item->sub_category_id,$item->product_slug_name ] )}}" id="fashion_details_link" class="cart-btn"><i class="fas fa-shopping-cart"></i> Shop Now</a>
                                        </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       @endif

                    @endforeach
                </div>
            </section>


            <div class="d-sm-flex d-none justify-content-center">
                 <a class="btn fashion-btn-2" href="{{url('product/fashion/BestProduct')}}">See More Product</a>


            </div>


            <!-- End Best Selling Product  -->
            <!-- Start Top Category  -->
            <div class="category-headers">
                <h2>Top Categories This Week</h2>
            </div>
            <div class="category-sections">
                <div class="container-fluid">
                    <div class="row">
                       @foreach ($topCategoriesThisWeek as $item)
                            <div class="col-lg-3 col-sm-12 col-md-3">
                                <div class=" card category-pro-card">
                                    <div class="card-body">

                                        <div
                                            class="category-pro-card-innr d-flex justify-content-between align-items-center ">

                                            <div class="cate-pro-inners">
                                                <div class="catgory_content_div">

                                                    <h5>{{ $item->category_name }}</h5>
                                                    @foreach ($item->subcategory->take(4) as $subCategory)

                                                    <div class="category-pro-info">
                                                        <a href="{{route('fashion.subCategory.product',[$item->category_slug_name,$subCategory->sub_category_slug_name])}}"><h6>{{ $subCategory->sub_category_name }}</h6></a>
                                                        <span><i class="fa-solid fa-arrow-right"></i></span>
                                                    </div>

                                                    @endforeach
                                                </div>
                                                <div class="category-pro-img">
                                                    <img src="{{ asset($item->category_image) }}" alt="bppshops" class="img-fluid">
                                                </div>
                                                    <!-- end category-pro-info  -->

                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                        <!-- end col  -->


                        <!-- end col  -->
                    </div>
                </div>
            </div>
            <!-- End Top Category  -->



            <!-- Daily Best Sale Products Start ccf-->
            <div class="sale-product-section-title mx-md-5 mx-3">
                <h3 style="margin-bottom: 10px">Daily Best Sale Products    </h3>
                 <a class="text-light" style="background-color: #003c53; padding: 0px 5px; font-size: 21px; margin-top: 3px; border-radius: 5px;" href="{{url('product/fashion/dalyProduct')}}">  See More Product.</a>
            </div>
            <section class="daily-best-sale-product p-3 mb-3 mx-md-5 mx-3" style="height:470px">
                <div class="fash-best-sale-pro" style="width: 50%; margin: auto;">
                    @foreach ($dailyBestSales_new as $item)

                      @if($item->product_qty == 0)
                       <div class="col">
                        <div class="card product-gallery-wrap  ">
                             <a style="pointer-events: none;" id="fashion_details_link" >
                            <img src="{{ asset($item->product_thambnail) }}"alt="bppshops"  class="card-img-top" style="height: 270px">
                            </a>
                            <div class="card-body">
                             @php
                             $amount = $item->selling_price - $item->discount_price;
                             $discount = ($amount / $item->selling_price) * 100;
                             @endphp
                             @if($discount==100)
                             <div class="tbdi-offer">  </div>
                              @else
                               <div class="tbdi-offer" style="background-color:#ef8341;border-radius:10px;color:#ffff;text-align:center;width:
                               45px;position: absolute;margin-top:-186px;margin-left: 97px;">

                                     <p>-{{ round($discount) }}%</p>

                                   </div>
                              @endif
                                    <div class="product-gallery-inner">
                        <a  style="pointer-events: none;" id="fashion_details_link" >
                            <h4>{{ $item->product_name }}</h4></a>

                                        <!-- Selling and Discount Price Start 9090 -->
                                        <div class="product_new_add">
                                            @if ($item->discount_price == 0)
                                            <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                                <b>{{ intval($item->selling_price) }}</b> </h4>
                                            @else
                                            <h4>
                                                <span style="color:black"> <span style="font-size:15px">৳</span>
                                                    <b>{{ intval($item->discount_price) }}</b></span>
                                                <span><s class="text-danger" style="font-size:15px"><span >৳</span>
                                                        <b>{{ intval($item->selling_price) }}</b></s></span>
                                            </h4>
                                            @endif
                                         </div>
                                         <!-- Selling and Discount Price End -->


                                       <!--overlay-->
                                            <div id="overlay_background">
                                              <div class="text-light" style="font-size:30px;margin-top:100px;text-align:center">Stock <br> Out  </div>
                                           </div>
                                            <!--end overlay-->


                                       <!-- overlay -->
                                          <div style="margin-top: 10px">
                                            <a class="fashion-btn" style="color: white; font-size: 14px; background-color: #777; border-radius: 5px; padding: 5px;
                                            " class="cart-btn"> <i class="fas fa-shopping-cart"> </i> Out of Stock</a>
                                        </div>
                                        <!-- overlay cccf-->



                                    </div>


                                </div>

                            </div>
                        </div>

                      @else
                       <div class="col">
                        <div class="card product-gallery-wrap  ">
                             <a  href="{{route('ProductDetailsFashion',[$item->category_id,$item->sub_category_id,$item->product_slug_name ] )}}" id="fashion_details_link" >
                            <img src="{{ asset($item->product_thambnail) }}"alt="bppshops"  class="card-img-top" style="height: 270px">
                            </a>
                            <div class="card-body">
                             @php
                             $amount = $item->selling_price - $item->discount_price;
                             $discount = ($amount / $item->selling_price) * 100;
                             @endphp
                             @if($discount==100)
                             <div class="tbdi-offer">  </div>
                              @else
                               <div class="tbdi-offer" style="background-color:#ef8341;border-radius:10px;color:#ffff;text-align:center;width:
                               45px;position: absolute;margin-top:-186px;margin-left: 97px;">

                                     <p>-{{ round($discount) }}%</p>

                                   </div>
                              @endif
                                    <div class="product-gallery-inner">
                        <a  href="{{route('ProductDetailsFashion',[$item->category_id,$item->sub_category_id,$item->product_slug_name ] )}}" id="fashion_details_link" >
                            <h4>{{ $item->product_name }}</h4></a>

                                        <!-- Selling and Discount Price Start 9090 -->
                                        <div class="product_new_add">
                                            @if ($item->discount_price == 0)
                                            <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                                <b>{{ intval($item->selling_price) }}</b> </h4>
                                            @else
                                            <h4>
                                                <span style="color:black"> <span style="font-size:15px">৳</span>
                                                    <b>{{ intval($item->discount_price) }}</b></span>
                                                <span><s class="text-danger" style="font-size:15px"><span >৳</span>
                                                        <b>{{ intval($item->selling_price) }}</b></s></span>
                                            </h4>
                                            @endif
                                         </div>
                                         <!-- Selling and Discount Price End -->

                                        <div class="fashion-btn-holder">
                                             <a class="fashion-btn" style="font-size:14px !important;padding: 7px 14px;"
                                             href="{{route('ProductDetailsFashion',[$item->category_id,$item->sub_category_id,$item->product_slug_name ] )}}"
                                             id="fashion_details_link" class="cart-btn"><i class="fas fa-shopping-cart"> </i> Shop Now</a>
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>
                      @endif


                    @endforeach
                </div>
            </section>
            <!-- Daily Best Sale Products Ends -->


            <!-- Start Offer Section  -->
            <section class="offer-section offer-sec">
                <div class="custom-container">
                    <div class="row multiple-slider">
                        <div class="col-lg-3 col-sm-6">
                            <div class="theme-card creative-card creative-inner">
                                <h5 class="title-border">Special Offer</h5>
                                <div class="fash-special-offer">
                                    <div>
                                        <div class="media-banner b-g-white1 border-0">

                                            @foreach ($special_offers->take(3) as $item)

                                            @if($item->product_qty == 0)
                                             <div class="media-banner-box">
                                                    <div class="media">
                                                        <a href="#" id="fashion_details_link"  style="pointer-events: none;" tabindex="0"> <img
                                                                src="{{ asset($item->product_thambnail) }}"
                                                                class="img-fluid  " alt="bppshops">
                                                        </a>
                                                        <div class="tbdi-offer" style="background-color:#ef8341;border-radius:10px;color:#ffff;text-align:center;width:
                                                               45px;position: absolute;margin-top: -390px;">
                                                                     <p>-{{ round($discount) }}%</p>
                                                                   </div>
                                                        <div class="media-body">
                                                            <div class="media-contant">
                                                                 @php
                                                             $amount = $item->selling_price - $item->discount_price;
                                                             $discount = ($amount / $item->selling_price) * 100;
                                                             @endphp
                                                             @if($discount==100)
                                                             <div class="tbdi-offer">
                                                                   </div>
                                                              @else
                                                              @endif
                                                                <div>
                                                                      <!-- Selling and Discount Price Start -->
                                                                        <div class="product-detail_fgfgfgfgfgfg ">
                                                                            <a  href="#" id="fashion_details_link" style="pointer-events: none;" >
                                                                                 <h5 class="mini-title"
                                                                                 style="font-size:14px;  text-transform: capitalize;  margin-bottom:5px; padding-bottom:0;">{{ $item->product_name }}</h5></a>

                                                                            @if ($item->discount_price == 0)
                                                                            <h4 class="ms-3" style="color:black;"> <span style="font-size:17px; margin-bottom:10px;">৳</span>
                                                                                <b>{{ intval($item->selling_price) }}</b> </h4>
                                                                            @else
                                                                            <h4 class="ms-3" style="font-size: 16px;">
                                                                                <span style="color:black; margin-bottom:10px;"> <span style="font-size:15px">৳</span>
                                                                                    <b>{{ intval($item->discount_price) }}</b></span>
                                                                                    </br>
                                                                                    <span class="text-danger"style="font-size:15px; color: "><del>৳ <b>{{ intval($item->selling_price) }}</b></del></span>
                                                                            </h4>
                                                                            @endif
                                                                         </div>



                                                                <!-- overlay -->
                                                                  <div style="margin-top: 10px">
                                                                    <a class="fashion-btn" style="color: white; font-size: 14px; background-color: #777; border-radius: 5px; padding: 5px;
                                                                    " class="cart-btn"> <i class="fas fa-shopping-cart"> </i> Out of Stock</a>
                                                                </div>
                                                                <!-- overlay-->

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                            @else
                                             <div class="media-banner-box">
                                                    <div class="media">
                                                        <a href="{{route('ProductDetailsFashion',[$item->category_id,$item->sub_category_id,$item->product_slug_name ] )}}" id="fashion_details_link"tabindex="0"> <img
                                                                src="{{ asset($item->product_thambnail) }}"
                                                                class="img-fluid  " alt="bppshops">
                                                        </a>
                                                        <div class="tbdi-offer" style="background-color:#ef8341;border-radius:10px;color:#ffff;text-align:center;width:
                                                               45px;position: absolute;margin-top: -390px;">
                                                                     <p>-{{ round($discount) }}%</p>
                                                                   </div>
                                                        <div class="media-body">
                                                            <div class="media-contant">
                                                                 @php
                                                             $amount = $item->selling_price - $item->discount_price;
                                                             $discount = ($amount / $item->selling_price) * 100;
                                                             @endphp
                                                             @if($discount==100)
                                                             <div class="tbdi-offer">
                                                                   </div>
                                                              @else
                                                              @endif
                                                                <div>
                                                                      <!-- Selling and Discount Price Start -->
                                                                        <div class="product-detail_fgfgfgfgfgfg ">
                                                                            <a  href="{{route('ProductDetailsFashion',[$item->category_id,$item->sub_category_id,$item->product_slug_name ] )}}" id="fashion_details_link" >
                                                                                 <h5 class="mini-title"
                                                                                 style="font-size:14px;  text-transform: capitalize;  margin-bottom:5px; padding-bottom:0;">{{ $item->product_name }}</h5></a>

                                                                            @if ($item->discount_price == 0)
                                                                            <h4 class="ms-3" style="color:black;"> <span style="font-size:17px; margin-bottom:10px;">৳</span>
                                                                                <b>{{ intval($item->selling_price) }}</b> </h4>
                                                                            @else
                                                                            <h4 class="ms-3" style="font-size: 16px;">
                                                                                <span style="color:black; margin-bottom:10px;"> <span style="font-size:15px">৳</span>
                                                                                    <b>{{ intval($item->discount_price) }}</b></span>
                                                                                    </br>
                                                                                    <span class="text-danger"style="font-size:15px; color: "><del>৳ <b>{{ intval($item->selling_price) }}</b></del></span>
                                                                            </h4>
                                                                            @endif
                                                                         </div>


                                                       <!-- overlay-->
                                                        <div style="margin-top: 10px">
                                                        <a class="fashion-btn" href="{{route('ProductDetailsFashion',[$item->category_id,$item->sub_category_id,$item->product_slug_name ] )}}" style="
                                                        background-color: #ff6000; color: white; font-size: 14px; border-radius: 5px; padding: 5px;
                                                        " class="cart-btn"> <i class="fas fa-shopping-cart"> </i> Shop Now </a>

                                                    </div>
                                                       <!-- overlay-->



                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            @endforeach
                                        </div>
                                    </div>



                                    <div>
                                        <div class="media-banner b-g-white1 border-0">

                                            @foreach ($special_offers->slice(4, 6) as $item)

                                               @if($item->product_qty == 0)
                                                <div class="media-banner-box">
                                                    <div class="media">
                                                         <a  style="pointer-events: none;" id="fashion_details_link" >
                                                        <img
                                                                src="{{ asset($item->product_thambnail) }}"
                                                                class="img-fluid  " alt="bppshops">
                                                                </a>
                                                                 <div class="tbdi-offer" style="background-color:#ef8341;border-radius:10px;color:#ffff;text-align:center;width: 45px;position: absolute;margin-top: -390px;">
                                                                     <p>-{{ round($discount) }}%</p>

                                                                   </div>

                                                        <div class="media-body">

                                                            <div class="media-contant">
                                                                   @php

                                                             $amount = $item->selling_price - $item->discount_price;
                                                             $discount = ($amount / $item->selling_price) * 100;


                                                             @endphp
                                                             @if($discount==100)

                                                             <div class="tbdi-offer">

                                                                   </div>
                                                              @else
                                                              @endif
                                                                <div>

                                                                      <!-- Selling and Discount Price Start -->
                                                                        <div class="product-detail_fdddghjd">
                                                                            <a id="fashion_details_link" ><h5 class="mini-title" style="font-size:14px; pointer-events: none; text-transform: capitalize;
                                                                            margin-bottom:8px; padding-bottom:0;">{{ $item->product_name }}</h5></a>

                                                                            @if ($item->discount_price == 0)
                                                                            <h4 class="ms-3" style="color:black;"> <span style="font-size:17px; margin-bottom:5px;">৳</span>
                                                                                <b>{{ intval($item->selling_price) }}</b> </h4>
                                                                            @else
                                                                            <h4 class="ms-3"  style="font-size: 16px;">
                                                                                <span style="color:black; margin-bottom:10px;"> <span style="font-size:15px">৳</span>
                                                                                    <b>{{ intval($item->discount_price) }}</b></span>
                                                                                    </br>
                                                                                <del><span class="text-danger" style="font-size:15px; margin-bottom:10px;"><span>৳</span>
                                                                                        <b>{{ intval($item->selling_price) }}</b></span></del>
                                                                            </h4>
                                                                            @endif
                                                                         </div>

                                                                             <!-- overlay -->
                                                                  <div style="margin-top: 10px">
                                                                    <a class="fashion-btn" style="color: white; font-size: 14px; background-color: #777; border-radius: 5px; padding: 5px;
                                                                    " class="cart-btn"> <i class="fas fa-shopping-cart"> </i> Out of Stock</a>
                                                                </div>
                                                                <!-- overlay-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                               @else
                                                <div class="media-banner-box">
                                                    <div class="media">
                                                         <a  href="{{route('ProductDetailsFashion',[$item->category_id,$item->sub_category_id,$item->product_slug_name ] )}}" id="fashion_details_link" >
                                                        <img
                                                                src="{{ asset($item->product_thambnail) }}"
                                                                class="img-fluid  " alt="bppshops">
                                                                </a>
                                                                 <div class="tbdi-offer" style="background-color:#ef8341;border-radius:10px;color:#ffff;text-align:center;width: 45px;position: absolute;margin-top: -390px;">
                                                                     <p>-{{ round($discount) }}%</p>

                                                                   </div>

                                                        <div class="media-body">

                                                            <div class="media-contant">
                                                                   @php

                                                             $amount = $item->selling_price - $item->discount_price;
                                                             $discount = ($amount / $item->selling_price) * 100;


                                                             @endphp
                                                             @if($discount==100)

                                                             <div class="tbdi-offer">

                                                                   </div>
                                                              @else
                                                              @endif
                                                                <div>

                                                                      <!-- Selling and Discount Price Start -->
                                                                        <div class="product-detail_fdddghjd">
                                                                            <a  href="{{route('ProductDetailsFashion',[$item->category_id,$item->sub_category_id,$item->product_slug_name ] )}}" id="fashion_details_link" ><h5 class="mini-title" style="font-size:14px;  text-transform: capitalize;  margin-bottom:8px; padding-bottom:0;">{{ $item->product_name }}</h5></a>

                                                                            @if ($item->discount_price == 0)
                                                                            <h4 class="ms-3" style="color:black;"> <span style="font-size:17px; margin-bottom:5px;">৳</span>
                                                                                <b>{{ intval($item->selling_price) }}</b> </h4>
                                                                            @else
                                                                            <h4 class="ms-3"  style="font-size: 16px;">
                                                                                <span style="color:black; margin-bottom:10px;"> <span style="font-size:15px">৳</span>
                                                                                    <b>{{ intval($item->discount_price) }}</b></span>
                                                                                    </br>
                                                                                <del><span class="text-danger" style="font-size:15px; margin-bottom:10px;"><span>৳</span>
                                                                                        <b>{{ intval($item->selling_price) }}</b></span></del>
                                                                            </h4>
                                                                            @endif
                                                                         </div>


                                                                            <!-- overlay-->
                                                        <div style="margin-top: 10px">
                                                        <a class="fashion-btn" href="{{route('ProductDetailsFashion',[$item->category_id,$item->sub_category_id,$item->product_slug_name ] )}}" style="
                                                        background-color: #ff6000; color: white; font-size: 14px; border-radius: 5px; padding: 5px;
                                                        " class="cart-btn"> <i class="fas fa-shopping-cart"> </i> Shop Now </a>

                                                    </div>
                                                       <!-- overlay-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                               @endif

                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                               <!--<a href="https://bppshops.com/special/fashion/offer" class="view-more">View More <i class="fas fa-long-arrow-alt-right"></i> </a>-->

                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="theme-card creative-card creative-inner mid-div">
                                <h5 class="title-border" style="text-align: center;">Hot Deals</h5>
                                <div class=" fash-special-offer">
                                    @foreach ($hot_deals as $item)

                                      @if($item->product_qty == 0)

                                        <div>
                                            <div class="media-banner main-media-banner b-g-1 border-0">
                                                <div class="media-banner-box boxx">

                                                    <div>
                                                        <a  style="pointer-events: none;">
                                                        <img src="{{ asset($item->product_thambnail) }}" class="img-fluid  " alt="bppshops">
                                                            <div class="tbdi-offer"
                                                            style="background-color:#ef8341;border-radius:10px;color:#ffff;text-align:center;width: 45px;position:
                                                            absolute;margin-top:-380px;margin-left:600px;">
                                                                     <p>{{ round($discount) }}%</p>
                                                                   </div>
                                                        </a>
                                                    </div>

                                                </div>
                                                              @php
                                                             $amount = $item->selling_price - $item->discount_price;
                                                             $discount = ($amount / $item->selling_price) * 100;
                                                             @endphp
                                                             @if($discount==100)

                                                             <div class="tbdi-offer">
                                                                   </div>
                                                              @else
                                                               <div class="tbdi-offer" style="background-color:#ef8341;border-radius:10px;color:#ffff;
                                                               text-align:center;width: 45px;position: absolute;margin-top:-380px;margin-left:600px;">
                                                                     <p>-{{ round($discount) }}%</p>

                                                                   </div>
                                                              @endif


                                        <a
                                        id="fashion_details_link" ><h5 class="mini-title" style="font-size:14px;  text-transform: capitalize;  margin-bottom:2px; padding-bottom:0;">
                                            {{ $item->product_name }}</h5></a>


                                            <!-- Selling and Discount Price Start -->
                                                    <div class="product-detailhghghgh">
                                                    @if ($item->discount_price == 0)
                                                    <h4 class="ms-3" style="color:black;"> <span style="font-size:17px">৳</span>
                                                        <b>{{ intval($item->selling_price) }}</b> </h4>
                                                    @else
                                                    <h4 class="ms-3"  style="font-size: 16px; margin-bottom:10px;">
                                                        <span style="color:black; margin-bottom:15px;"> <span style="font-size:15px">৳</span>
                                                            <b>{{ intval($item->discount_price) }}</b></span>
                                                            </br>


                                                            <span class="text-danger"style="font-size:15px; color: "><del>৳ <b>{{ intval($latest_product->selling_price) }}</b></del></span>
                                                    </h4>
                                                    @endif

                                                      <div style="margin-top: 10px">
                                                        <a class="fashion-btn" style="color: white; font-size: 14px; background-color: #777; border-radius: 5px; padding: 5px;
                                                        " class="cart-btn"> <i class="fas fa-shopping-cart"> </i> Out of Stock</a>

                                                    </div>

                                                 </div>
                                            </div>
                                        </div>



                                       @else
                                           <div>
                                            <div class="media-banner main-media-banner b-g-1 border-0">
                                                <div class="media-banner-box boxx">

                                                    <div>
                                                        <a  href="{{route('ProductDetailsFashion',[$item->category_id,$item->sub_category_id,$item->product_slug_name ] )}}"> <img src="{{ asset($item->product_thambnail) }}" class="img-fluid  " alt="bppshops">
                                                            <div class="tbdi-offer" style="background-color:#ef8341;border-radius:10px;color:#ffff;text-align:center;width: 45px;position: absolute;margin-top:-380px;margin-left:600px;">
                                                                     <p>{{ round($discount) }}%</p>
                                                                   </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                              @php
                                                             $amount = $item->selling_price - $item->discount_price;
                                                             $discount = ($amount / $item->selling_price) * 100;
                                                             @endphp
                                                             @if($discount==100)

                                                             <div class="tbdi-offer">
                                                                   </div>
                                                              @else
                                                               <div class="tbdi-offer" style="background-color:#ef8341;border-radius:10px;color:#ffff;text-align:center;width: 45px;position: absolute;margin-top:-380px;margin-left:600px;">
                                                                     <p>-{{ round($discount) }}%</p>

                                                                   </div>
                                                              @endif

                                                 <a  href="{{route('ProductDetailsFashion',[$item->category_id,$item->sub_category_id,$item->product_slug_name ] )}}" id="fashion_details_link" ><h5 class="mini-title" style="font-size:14px;  text-transform: capitalize;  margin-bottom:2px; padding-bottom:0;">{{ $item->product_name }}</h5></a>
                                            <!-- Selling and Discount Price Start -->
                                                    <div class="product-detailhghghgh">
                                                    @if ($item->discount_price == 0)
                                                    <h4 class="ms-3" style="color:black;"> <span style="font-size:17px">৳</span>
                                                        <b>{{ intval($item->selling_price) }}</b> </h4>
                                                    @else
                                                    <h4 class="ms-3"  style="font-size: 16px; margin-bottom:10px;">
                                                        <span style="color:black; margin-bottom:15px;"> <span style="font-size:15px">৳</span>
                                                            <b>{{ intval($item->discount_price) }}</b></span>
                                                            </br>


                                                            <span class="text-danger"style="font-size:15px; color: "><del>৳ <b>{{ intval($latest_product->selling_price) }}</b></del></span>
                                                    </h4>
                                                    @endif

                                                             <div style="margin-top: 10px">
                                                        <a class="fashion-btn" href="{{route('ProductDetailsFashion',[$item->category_id,$item->sub_category_id,$item->product_slug_name ] )}}" style="
                                                        background-color: #ff6000; color: white; font-size: 14px; border-radius: 5px; padding: 5px;
                                                        " class="cart-btn"> <i class="fas fa-shopping-cart"> </i> Shop Now </a>

                                                    </div>

                                                 </div>
                                            </div>
                                        </div>
                                       @endif


                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="theme-card creative-card creative-inner">
                                <h5 class="title-border">Special Deals</h5>
                                <div class="fash-special-offer">
                                    <div>
                                        <div class="media-banner media-banners b-g-1 border-0">


                                            @foreach ($special_deals->take(3) as $item)

                                              @if($item->product_qty == 0)
                                              <div class="media-banner-box">
                                                    <div class="media">
                                                        <a  tabindex="0"> <img
                                                                src="{{ asset($item->product_thambnail) }}"
                                                                class="img-fluid  " alt="bppshops">  </a>
                                                        <div class="media-body">

                                                            <div class="media-contant">
                                                                   @php

                                                             $amount = $item->selling_price - $item->discount_price;
                                                             $discount = ($amount / $item->selling_price) * 100;


                                                             @endphp
                                                             @if($discount==100)

                                                             <div class="tbdi-offer">

                                                                   </div>

                                                              @else
                                                               <div class="tbdi-offer" style="background-color:#ef8341;border-radius:10px;color:#ffff;text-align:center;width:
                                                               45px;position: absolute;margin-top: -333px;">
                                                                     <p>-{{ round($discount) }}%</p>

                                                                   </div>
                                                              @endif
                                                                <div>
                                                                <!-- Selling and Discount Price Start -->
                                                                     <div class="product-detailgfgfgf">
                                                                         <a  id="fashion_details_link" > <h5 class="mini-title" style="font-size:14px;
                                                                         text-transform: capitalize; padding-bottom:0;">{{ $item->product_name }}</h5></a>

                                                                            @if ($item->discount_price == 0)
                                                                            <h4 class="ms-3" style="color:black;"> <span style="font-size:17px; margin-bottom:10px;">৳</span>
                                                                                <b>{{ intval($item->selling_price) }}</b> </h4>
                                                                            @else
                                                                            <h4 class="ms-3" style="font-size: 16px;">
                                                                                <span style="color:black; margin-bottom:10px;"> <span style="font-size:15px">৳</span>
                                                                                    <b>{{ intval($item->discount_price) }}</b></span>
                                                                                    </br>

                                                                                <del><span class="text-danger" style="font-size:15px; margin-bottom:10px;"><span>৳</span>
                                                                                        <b>{{ intval($item->selling_price) }}</b></span></del>
                                                                            </h4>
                                                                            @endif
                                                                         </div>
                                                                         <!-- Selling and Discount Price End -->


                                                       <div style="margin-top: 10px">
                                                        <a class="fashion-btn" style="color: white; font-size: 14px; background-color: #777; border-radius: 5px; padding: 5px;
                                                        " class="cart-btn"> <i class="fas fa-shopping-cart"> </i> Out Of Stock </a>

                                                    </div>




                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                              @else
                                                <div class="media-banner-box">
                                                    <div class="media">
                                                        <a href="{{route('ProductDetailsFashion',[$item->category_id,$item->sub_category_id,$item->product_slug_name ] )}}" tabindex="0"> <img
                                                                src="{{ asset($item->product_thambnail) }}"
                                                                class="img-fluid  " alt="bppshops">  </a>
                                                        <div class="media-body">

                                                            <div class="media-contant">
                                                                   @php

                                                             $amount = $item->selling_price - $item->discount_price;
                                                             $discount = ($amount / $item->selling_price) * 100;


                                                             @endphp
                                                             @if($discount==100)

                                                             <div class="tbdi-offer">

                                                                   </div>

                                                              @else
                                                               <div class="tbdi-offer" style="background-color:#ef8341;border-radius:10px;color:#ffff;text-align:center;width: 45px;position: absolute;margin-top: -333px;">
                                                                     <p>-{{ round($discount) }}%</p>

                                                                   </div>
                                                              @endif
                                                                <div>
                                                                <!-- Selling and Discount Price Start -->
                                                                     <div class="product-detailgfgfgf">
                                                                         <a  href="{{route('ProductDetailsFashion',[$item->category_id,$item->sub_category_id,$item->product_slug_name ] )}}" id="fashion_details_link" > <h5 class="mini-title" style="font-size:14px;  text-transform: capitalize; padding-bottom:0;">{{ $item->product_name }}</h5></a>

                                                                            @if ($item->discount_price == 0)
                                                                            <h4 class="ms-3" style="color:black;"> <span style="font-size:17px; margin-bottom:10px;">৳</span>
                                                                                <b>{{ intval($item->selling_price) }}</b> </h4>
                                                                            @else
                                                                            <h4 class="ms-3" style="font-size: 16px;">
                                                                                <span style="color:black; margin-bottom:10px;"> <span style="font-size:15px">৳</span>
                                                                                    <b>{{ intval($item->discount_price) }}</b></span>
                                                                                    </br>

                                                                                <del><span class="text-danger" style="font-size:15px; margin-bottom:10px;"><span>৳</span>
                                                                                        <b>{{ intval($item->selling_price) }}</b></span></del>
                                                                            </h4>
                                                                            @endif
                                                                         </div>
                                                                         <!-- ccf-->
                                                                         <!-- Selling and Discount Price End -->


                                                                   <div style="margin-top: 10px">
                                                        <a class="fashion-btn" href="{{route('ProductDetailsFashion',[$item->category_id,$item->sub_category_id,$item->product_slug_name ] )}}" style="
                                                        background-color: #ff6000; color: white; font-size: 14px; border-radius: 5px; padding: 5px;
                                                        " class="cart-btn"> <i class="fas fa-shopping-cart"> </i> Shop Now </a>

                                                    </div>



                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                              @endif

                                            @endforeach
                                        </div>
                                    </div>
                                    <div>
                                        <div class="media-banner b-g-white1 border-0">
                                            @foreach ($special_deals->slice(4, 6) as $item)
                                               @if($item->product_qty == 0)
                                                <div class="media-banner-box">
                                                    <div class="media">
                                                        <a  href="" tabindex="0"> <img
                                                                src="{{ asset($item->product_thambnail) }}"
                                                                class="img-fluid  " alt="bppshops">

                                                                <div class="tbdi-offer" style="background-color:#ef8341;border-radius:10px;
                                                                color:#ffff;text-align:center;width: 45px;position: absolute;margin-top: -265px;">
                                                                     <p>-{{ round($discount) }}%</p>

                                                                   </div>
                                                        </a>
                                                        <div class="media-body">

                                                            <div class="media-contant">
                                                                   @php

                                                             $amount = $item->selling_price - $item->discount_price;
                                                             $discount = ($amount / $item->selling_price) * 100;
                                                             @endphp
                                                             @if($discount==100)
                                                             <div class="tbdi-offer"> </div>
                                                              @else
                                                              @endif
                                                                <div>
                                                                 <!-- Selling and Discount Price Start -->
                                                                    <div class="product-detailgfgfg" >
                                                                         <a  href="" id="fashion_details_link" > <h5 class="mini-title" style="font-size:14px;
                                                                         text-transform: capitalize;  margin-bottom:8px; padding-bottom:0;">{{ $item->product_name }}</h5></a>

                                                                            @if ($item->discount_price == 0)
                                                                            <h4 class="ms-3" style="color:black;"> <span style="font-size:17px; margin-bottom:10px;">৳</span>
                                                                                <b>{{ intval($item->selling_price) }}</b> </h4>
                                                                            @else
                                                                            <h4 class="ms-3"  style="font-size: 16px;">
                                                                                <span style="color:black; margin-bottom:10px; "> <span style="font-size:15px">৳</span>
                                                                                    <b>{{ intval($item->discount_price) }}</b></span>
                                                                                    </br>
                                                                                <span class="text-danger"style="font-size:15px;"><del>৳ <b>{{ intval($item->selling_price) }}</b></del></span>
                                                                            </h4>
                                                                            @endif
                                                                         </div>

                                                                    <div style="margin-top: 10px">
                                                                            <a class="fashion-btn" style="color: white; font-size: 14px; background-color: #777; border-radius: 5px; padding: 5px;
                                                                            " class="cart-btn"> <i class="fas fa-shopping-cart"> </i> Out Of Stock </a>

                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                               @else
                                                <div class="media-banner-box">
                                                    <div class="media">
                                                        <a  href="{{route('ProductDetailsFashion',[$item->category_id,$item->sub_category_id,$item->product_slug_name ] )}}" tabindex="0"> <img
                                                                src="{{ asset($item->product_thambnail) }}"
                                                                class="img-fluid  " alt="bppshops">

                                                                <div class="tbdi-offer" style="background-color:#ef8341;border-radius:10px;color:#ffff;text-align:center;width: 45px;
                                                                position: absolute;margin-top: -265px;">
                                                                     <p>-{{ round($discount) }}%</p>

                                                                   </div>
                                                        </a>
                                                        <div class="media-body">

                                                            <div class="media-contant">
                                                                   @php

                                                             $amount = $item->selling_price - $item->discount_price;
                                                             $discount = ($amount / $item->selling_price) * 100;
                                                             @endphp
                                                             @if($discount==100)
                                                             <div class="tbdi-offer"> </div>
                                                              @else
                                                              @endif
                                                                <div>
                                                                 <!-- Selling and Discount Price Start -->
                                                                    <div class="product-detailgfgfg" >
                                                                         <a  href="{{route('ProductDetailsFashion',[$latest_product->category_id,$latest_product->sub_category_id,$latest_product->product_slug_name ] )}}" id="fashion_details_link" > <h5 class="mini-title" style="font-size:14px;  text-transform: capitalize;  margin-bottom:8px; padding-bottom:0;">{{ $item->product_name }}</h5></a>

                                                                            @if ($item->discount_price == 0)
                                                                            <h4 class="ms-3" style="color:black;"> <span style="font-size:17px; margin-bottom:10px;">৳</span>
                                                                                <b>{{ intval($item->selling_price) }}</b> </h4>
                                                                            @else
                                                                            <h4 class="ms-3"  style="font-size: 16px;">
                                                                                <span style="color:black; margin-bottom:10px; "> <span style="font-size:15px">৳</span>
                                                                                    <b>{{ intval($item->discount_price) }}</b></span>
                                                                                    </br>
                                                                                <span class="text-danger"style="font-size:15px;"><del>৳ <b>{{ intval($item->selling_price) }}</b></del></span>
                                                                            </h4>
                                                                            @endif
                                                                         </div>


                                                                           <div style="margin-top: 10px">
                                                        <a class="fashion-btn" href="{{route('ProductDetailsFashion',[$item->category_id,$item->sub_category_id,$item->product_slug_name ] )}}" style="
                                                        background-color: #ff6000; color: white; font-size: 14px; border-radius: 5px; padding: 5px;
                                                        " class="cart-btn"> <i class="fas fa-shopping-cart"> </i> Shop Now </a>

                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                               @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!--<a href="#" class="view-more"> View More <i class="fas fa-long-arrow-alt-right"></i>-->
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </main>
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
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"
        integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script>
        function myGallary(images,id) {
            var image = document.getElementById(`imageID${id}`);
              image.src = images.src;}
    </script>
    <script>
        let sortBtn = document.querySelector('.filter-menu').children;
        let sortItem = document.querySelector('.filter-item').children;

        for (let i = 0; i < sortBtn.length; i++) {
            sortBtn[i].addEventListener('click', function() {
                for (let j = 0; j < sortBtn.length; j++) {
                    sortBtn[j].classList.remove('current');
                }

                this.classList.add('current');


                let targetData = this.getAttribute('data-target');

                for (let k = 0; k < sortItem.length; k++) {
                    sortItem[k].classList.remove('active');
                    sortItem[k].classList.add('delete');

                    if (sortItem[k].getAttribute('data-item') == targetData || targetData == "all") {
                        sortItem[k].classList.remove('delete');
                        sortItem[k].classList.add('active');
                    }
                }
            });
        }
    </script>
    <script>
        const filterContainer = document.querySelector(".gallery-filter"),
            galleryItems = document.querySelectorAll(".gallery-item");
           console.log(typeof(galleryItems),'here is the check');

        filterContainer.addEventListener("click", (event) => {
            if (event.target.classList.contains("filter-item")) {
                // deactivate existing active 'filter-item'
                filterContainer.querySelector(".active").classList.remove("active");
                // activate new 'filter-item'
                event.target.classList.add("active");
                const filterValue = event.target.getAttribute("data-filter");
                let count = 0;
                galleryItems.forEach((item) => {
                    if(filterValue === 'all')
                    {
                        item.classList.remove("show");
                        item.classList.add("hide");
                        if(count>=20)
                        {
                            return false;

                        }
                        item.classList.remove("hide");
                        item.classList.add("show");
                        count++;


                    }
                    else if (item.classList.contains(filterValue)) {
                        item.classList.remove("hide");
                        item.classList.add("show");
                    }else {
                        item.classList.remove("show");
                        item.classList.add("hide");
                    }
                });
            }
        });

        forLimitAllProduct();

        function forLimitAllProduct()
        {
            let count = 0;
            galleryItems.forEach((item) => {

                item.classList.remove("show");
                item.classList.add("hide");

                if(count>=10)
                {
                    return false;

                }
                item.classList.remove("hide");
                item.classList.add("show");
                count++;


            });

        }

    </script>

    <!-- hot deal slider  -->

    <script>
        var sliderMain = document.getElementById("slider-main");
        var item = sliderMain.getElementsByClassName("item");
        var footerItem = sliderMain.getElementsByClassName("hot-deal-footer");

        function next(id) {
            if($(`.hot_deal_${id}`).next().is('.item'))
            {
                $('.item').hide();
                $('.hot-deal-footer').hide();
                $(`.hot_deal_${id}`).next().show();
            }
            if($(`.hot_button_${id}`).next().is('.hot-deal-footer'))
            {
                $(`.hot_button_${id}`).next().show();
            }


        }

        function prev(id) {


            if($(`.hot_deal_${id}`).prev().is('.item'))
            {
                $('.item').hide();
                $('.hot-deal-footer').hide();
                // console
                $(`.hot_deal_${id}`).prev().show();

            }


            if($(`.hot_button_${id}`).prev().is('.hot-deal-footer'))
            {
                $(`.hot_button_${id}`).prev().show();
            }}
        for (let index = 0; index < item.length; index++) {


            (function() {
                const second = 1000,
                    minute = second * 60,
                    hour = minute * 60,
                    day = hour * 24;
                let today = new Date(),
                    dd = String(today.getDate()).padStart(2, "0"),
                    mm = String(today.getMonth() + 1).padStart(2, "0"),
                    yyyy = today.getFullYear(),


                    birthday = item[index].querySelector('.end_date').innerText;



                today = mm + "/" + dd + "/" + yyyy;
                if (today > birthday) {
                    birthday = dayMonth + nextYear;
                }
                //end

                const countDown = new Date(birthday).getTime(),
                    x = setInterval(function() {

                        const now = new Date().getTime(),
                            distance = countDown - now;

                            item[index].querySelector(".days").innerText = Math.floor(distance / (day)),
                            item[index].querySelector(".hours").innerText = Math.floor((distance % (day)) / (hour)),
                            item[index].querySelector(".minutes").innerText = Math.floor((distance % (hour)) / (minute)),
                            item[index].querySelector(".seconds").innerText = Math.floor((distance % (minute)) / second);


                        //do something later when date is reached
                        if (distance < 0) {

                            clearInterval(x);
                        }
                        //seconds
                    }, 0)


            }());

        }

    </script>
    <script>
        $(document).ready(function() {
            $('.topSliderBannerSectionslider').slick({
                arrows: false,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 1500,
                dots: true,
            });
        });
    </script>
@endsection

