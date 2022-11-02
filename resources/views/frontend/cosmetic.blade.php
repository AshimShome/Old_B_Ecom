@extends('frontend.main_master')

@section('css')
<style>
    .collection-banner-main:nth-child(2) {
        margin-top: 14px !important;
    }

    .slick-track {
        display: flex !important;
    }

    .slick-slide {
        height: inherit !important;
    }
    .price {
        display: flex;
        justify-content: center;
        gap: 5px
    }
    
    .cosmetic_products_container_wrapper .single-slider-card p, .cosmetic_newly_launched_prd_container .launched_prd_slider .single_slider_cart p,
    .cosmetic_mega_sale_container .mega_sale_slider .single-slider-card p {
        word-break: break-word;
    }
    .cosmetic_products_container_wrapper .single-slider-card{
        height: 279px;
    }
    
    .cosmetic_products_container_wrapper .single-slider-card{
        height: 410px;
    }
    
    @media screen and (max-width: 600px) {
        .latest-discounted-products-banner {
            display: none;
        }
        .cosmetic_products_container_wrapper,
        .cosmetic_prd_discount_container,
        .cosmetic_mega_sale_container,
        .cosmetic_newly_launched_prd_container,
        #cosmetic-secondary-banner{
            display: none;
        }
        
        .cosmetic-slide-2{
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }
    }
    
    .all-category-btn{
        background-color: #471c6b;
        color: white;
        padding: 6px 32px;
    }
    .all-category-btn:hover {
        background-color: #7b42aa;
        color: white;
    }

    .cosmetic_mega_sale_container .mega_sale_slider .single-slider-card{
         position: relative;
        padding-bottom: 45px;
    }
    
    .single-slider-card .shopNowBtn-slider{
        position: absolute;
        bottom: 5px;
        left: 50%;
        transform: translate(-50%, 0);
    }
    .cosmetic_mega_sale_container .mega_sale_slider .single-slider-card h5{
        height: 36px;
        overflow: hidden;
    }

    .cosmetic_products_container_wrapper {
        background-color: #f4e2ff;
    }
    .cosmetic_products_container_wrapper .single-slider-card h5{
        height:52px;
        overflow:hidden;
    }
</style>
@endsection
@section('islamic')


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
                                    <a href="{{ url('/cosmetic') }}" class="logo-container custom-header-ecom-title-home">
                                        <i class="fas fa-home"></i> Cosmetics Home
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- ---------- Search with Category ------------- -->
                        <div>
                        <a href="{{ url('/cosmetic') }}"> <h2 class="text-white">Cosmetics</h2> </a>
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
        $special_offer = App\Models\Product::where('special_offer','1')->where('ecom_name','5')->count();
       $coupons = App\Models\Coupon::where('status','1')->orderBy('id', 'DESC')->count();
        @endphp
        <li class="menu-heading">
            <a href="{{ url('/special/cosmetics/offer') }}"><span class="text">Special Offers</span> <span class="number">{{
                    $special_offer }}</span></a>
            <a href="{{ route('coupon.view') }}"><span class="text">Coupon</span><span class="number">{{ $coupons
                    }}</span></a>
        </li>
        @php
        $currentUrl = Request::segment(2);
        // dd($currentUrl);
        $categories=App\Models\Category::with('subcategory')->where('ecom_id','5')->get();
        @endphp
        <li class="mb-1 mt-3">
            <div class="collapse">  
                @foreach ($categories as $category)
                <li class="mb-1 mt-2">
                    @if(Request::segment(2) != $category->category_slug_name)
                    <a href="{{ url('/cbs/'. $category->category_slug_name) }}">                      
                            @endif
                            <button 
                                class="btn btn-toggle align-items-center rounded {{ Request::segment(2) != $category->category_slug_name? 'collapsed' : '' }} "
                                data-bs-toggle="collapse" data-bs-target="#cat{{$category->id}}"
                                aria-expanded="{{ Request::segment(2) != $category->category_slug_name? 'false' : 'true' }}">
                                <img style="height:20px;width:20px" src="{{ asset($category->category_icon)}}" alt=""
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
                                $subcategories=App\Models\SubCategory::with('category')->where('category_id',$category->id)->get();                             
                                @endphp
                                @foreach ($subcategories as $subcategory)
                                <li>

                                    @if(collect(request()->segments())->last() != $subcategory->sub_category_slug_name)
                                    <a
                                        href="{{ url('/cbs/' . $subcategory->category->category_slug_name .'/'. $subcategory->sub_category_slug_name) }}">
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
                                            $sub_subcategories=App\Models\SubSubCategory::with('category','subcategory')->where('subcategory_id',$subcategory->id)->get();
                                            @endphp
                                            @foreach ($sub_subcategories as $subsubcategory)
                                            <li><a href="{{ url('/cbs/'.$subsubcategory->category->category_slug_name.'/'. $subsubcategory->subcategory->sub_category_slug_name.'/'. $subsubcategory->subsubcategory_slug_name) }}"
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
<main class="main-body">
    <section class="main-content category-closed" id="main-content">
        <!--home slider start-->
        <section class="megastore-slide cos_megastore collection-banner section-py-space">
            <div class="container-fluid">
                <div class="row mega-slide-block" style="margin-bottom: -41px;    margin-top: -9px;margin-left: -25px;margin-right: -28px;">
                    <div class="col-xl-7 col-lg-12 collection-banner-close" id="megastore-collection-banner">
                        <div class="row">
                            <div class="col-12">
                                <div class="cosmetic-slide-1 no-arrow">

                                    @foreach ($sliders as $slider)
                                    <div class="slide-main">
                                        <img src="{{ asset($slider->slider_img) }}" class="img-fluid bg-img"
                                            alt="mega-store">
                                        <div class="slide-contain">
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-12" id="cosmetic-secondary-banner">
                        <div class="row collection-p6">
                            @foreach ( $banner1->take(2) as $banner)
                            <div class="col-xl-12 col-lg-6 col-md-6">
                                <div class="collection-banner-main banner-17 banner-style7 collection-color14 p-left">
                                    <div class="collection-img cosmetic-collection-img">
                                        <img src="{{ $banner->bennar_img }}" class="img-fluid" alt="banner">
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


        <!-- category Slider start-->
        <section class="cosmetic-featured-category-container">
            <div class="section-title-no-bg">
                <h4 class="pt-5 text-center">Product Categories</h4>
            </div>
            <div class="featured-category mt-5 px-md-5 px-2">
                <div class="container px-2 px-md-5">
                    <div class="row">
                        <div class="col">
                            <div class="cosmetic-slide-2">

                                 @foreach ( $categories as $category)
                                <div>
                                    <a href="">
                                        <div class="featured-category-item text-center catagory-hover-line">
                                           
                                           <div class="d-flex justify-content-center">
                                                <img src="{{ asset($category->category_image) }}" alt="">
                                            </div>
                                            <h6 class="catName mt-3">{{ $category->category_name }}({{$category->products_list->count()}})</h6>
                                  
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                                
                            </div>
                        </div>
                    </div>
                    <div class="text-center pb-4">
                        <a class="btn all-category-btn" href="{{url('product/cosmetic/category/Product')}}">All Categories</a>
                    </div>
                    
        </section>

        <!-- Products Container Star -->
        <section class="cosmetic_products_container_wrapper">
            <h4 class="prd_title">Our Products</h4>
            <div class="nav_tab_container">
                <ul class="nav nav-pills mb-3 d-flex justify-content-center" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="popularPrd" data-bs-toggle="pill"
                            data-bs-target="#popular-prd" type="button" role="tab" aria-controls="popular-prd"
                            aria-selected="true">Popular
                            Product</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="brandPrd" data-bs-toggle="pill" data-bs-target="#brand-prd"
                            type="button" role="tab" aria-controls="brand-prd" aria-selected="false">Top Brand</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="upcomingPrd" data-bs-toggle="pill" data-bs-target="#upcoming-prd"
                            type="button" role="tab" aria-controls="upcoming-prd" aria-selected="false">Featured
                            Products</button>
                    </li>
                </ul>
            </div>

            <div class="tab-content container" id="pills-tabContent">
                <!-- Popular product container -->
                <div class="tab-pane fade show active" id="popular-prd" role="tabpanel" aria-labelledby="popularPrd"
                    style="width: 100%;">
                    <div class="d-flex justify-content-center">
                        <div class="container">
                            <!-- popular product start -->
                            <div class="popular_prd_container_wrapper">
                                <div class="popular_prd_container row">
                                    @foreach ($most_popular_all->take(8) as $most_popular_alls)
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="single-slider-card">
                                            <div class="d-flex justify-content-center">
                                                <img class="image"
                                                    src="{{ asset($most_popular_alls->product_thambnail) }}" alt="">
                                            </div>
                                            <h5 class="title mt-2">{{ $most_popular_alls->product_name }}</h5>

                                            <p><b style="font-size:14px; font-weight:bold">Color:</b> {{$most_popular_alls->product_color }}</p>

                                            <h6> Weight: {{ $most_popular_alls->unit }}</h6>

                                            <div class="price pt-1">
                                                @if($most_popular_alls->discount_price == 0)
                                                <h5 class="mt-2"> ৳ {{ intval($most_popular_alls->selling_price) }}</h5>

                                                @elseif($most_popular_alls->discount_price)
                                                <h5 class="disprc"><del><b style="font-weight:bold">৳ {{
                                                            intval($most_popular_alls->selling_price) }}</b></del>
                                                </h5>
                                                <h5> ৳ {{ intval($most_popular_alls->discount_price) }}</h5>
                                                @endif
                                            </div>
                                                    @if($most_popular_alls->product_qty>0)
                                                    <button class="shopNowBtn"><a
                                                            href="{{ url('/cosmetic/product/detail/'.$most_popular_alls->category->category_slug_name.'/'.$most_popular_alls->subcategory->sub_category_slug_name.'/'.$most_popular_alls->product_slug_name) }}">
                                                            Shop Now</a></button>
                                                    @else
                                                    <button disabled class="shopNowBtn" style="background-color:#839AA8">Stock Out</button>
                                                    @endif
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="text-end my-4">
                                    <a href="{{url('/special/cosmetics/popular/product')}}" class="prdSeeMore">Show More...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Brand Product Container -->
                <div class="tab-pane fade" id="brand-prd" role="tabpanel" aria-labelledby="brandPrd">
                    <div class="d-flex justify-content-center">
                        <div class="container">
                            <div class="brand_prd_container_wrapper" style="margin:0 20px 0 20px;">
                                <div class="brand_prd_container row">
                                    
                                    @foreach ($brands as $brand )
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="single-slider-card" style="height: 340px">
                                            
                                            <div class="d-flex justify-content-center">
                                                <img class="image" src="{{ $brand->brand_image }}" alt="">
                                            </div>
                                            
                                            <h5 class="title mt-3">{{ $brand->brand_name_cats_eye }}</h5>
                                            
                                            <button class="shopNowBtn"><a
                                                    href="{{ route('cosmeticbrandwiseproduct_view',$brand->id) }}">
                                                    View Products</a></button>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="text-end my-4">
                                    <a href="{{ url('/cosmetic-all-brand') }}" class="prdSeeMore">Show More...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Upcoming Product Container -->
                <div class="tab-pane fade" id="upcoming-prd" role="tabpanel" aria-labelledby="upcomingPrd">
                    <div class="d-flex justify-content-center">
                        <div class="container">
                            <!-- upcoming product slider -->
                            <div class="upcoming_prd_container_wrapper mb-5">
                                <div class="upcoming_prd_container row">
                                    @foreach ($featureds as $featured )
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div
                                            class="single-slider-card d-flex align-items-center justify-content-center">
                                            <div>
                                                <div class="d-flex justify-content-center">
                                                    <img class="image" src="{{ asset($featured->product_thambnail) }}"
                                                        alt="">
                                                </div>
                                                <h5 class="title pt-3 mt-2">{{ $featured->product_name }}</h5>
                                                <p><b style="font-size:14px; font-weight:bold">Color:</b> {{ $featured->product_color }}</p>
                                                <h6> Weight: {{ $most_popular_alls->unit }}</h6>
                                                <div class="price pt-1">
    
                                                    @if($most_popular_alls->discount_price ==0)
                                                    <h5> ৳ {{ intval($most_popular_alls->selling_price) }}</h5>
    
                                                    @elseif($most_popular_alls->discount_price)
                                                    <h5 class="disprc"><del><b style="font-weight:bold">৳ {{
                                                                intval($most_popular_alls->selling_price) }}</b></del>
                                                    </h5>
                                                    <h5> ৳ {{ intval($most_popular_alls->discount_price) }}</h5>
                                                    @endif
                                                </div>
                                                @if($featured->product_qty>0)
                                                <button class="shopNowBtn"><a
                                                        href="{{ url('/cosmetic/product/detail/'.$most_popular_alls->category->category_slug_name.'/'.$most_popular_alls->subcategory->sub_category_slug_name.'/'.$most_popular_alls->product_slug_name) }}">
                                                        Shop Now</a></button>
                                                @else
                                                <button disabled class="shopNowBtn" style="background-color:#839AA8">Stock Out</button>
                                                @endif
                                                
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                 <div class="text-end my-4">
                                    <a href="{{ url('/special/cosmetics/feature/product') }}" class="prdSeeMore">Show More...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Products Slider end -->

        <!-- cosmetic discount section start -->
        <section class="cosmetic_prd_discount_container ">
            @foreach ( $banner2 as $banner )
            <img src="{{ $banner->bennar_img }}" alt="">
            @endforeach
        </section>
        <!-- cosmetic discount section end -->

        <div style="background: #FAF2FF;">
            <!-- cosmetic mega sale container start -->
            <section class="cosmetic_mega_sale_container">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-5 col-sm-12 d-flex justify-content-center">
                            <div class="ms-5 ps-2" style="width: 300px;">
                                <h4>Mega sale going on......</h4>
                                <p class="leftOnly">Left Only</p>
                                <div class="remaining_time">
                                    <div>
                                        <p class="count" id="countDay">0</p>
                                        <p>Days</p>
                                    </div>
                                    <div>
                                        <p class="count" id="countHour">0</p>
                                        <p>Hour</p>
                                    </div>
                                    <div>
                                        <p class="count" id="countMin">0</p>
                                        <p>Min</p>
                                    </div>
                                    <div>
                                        <p class="count" id="countSec">0</p>
                                        <p>sec</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-7 col-sm-12">
                            <div class="mega_sale_slider" style="margin:0 30px">
                                @foreach ($latestdiscountproduct as $latestdiscountproducts)
                                <div class="single-slider-card">
                                    <p class="new">New</p>
                                    <div class="d-flex justify-content-center">
                                        <img class="image" src="{{ asset($latestdiscountproducts->product_thambnail) }}"
                                            alt="">
                                    </div>
                                    
                                    <h5 class="title">{{ $latestdiscountproducts->product_name }}</h5>
                                    <p><b style="font-size:14px; font-weight:bold">Color:</b> {{ $latestdiscountproducts->product_color }}</p>
                                    @if($latestdiscountproducts->discount_price == 0)
                                        <h5> ৳{{ intval($latestdiscountproducts->selling_price) }}</h5>
                                    @else
                                        <h5> ৳{{ intval($latestdiscountproducts->discount_price) }} <s>৳{{ intval($latestdiscountproducts->selling_price) }}</s> </h5>
                                    @endif
                                    @if($latestdiscountproducts->product_qty>0)
                                    <button class="shopNowBtn shopNowBtn-slider"><a
                                            href="{{ url('/cosmetic/product/detail/'.$latestdiscountproducts->category->category_slug_name.'/'.$latestdiscountproducts->subcategory->sub_category_slug_name.'/'.$most_popular_alls->product_slug_name) }}">
                                            Shop Now</a></button>
                                     @else
                                     <!--<button disabled class="shopNowBtn" style="background-color:#839AA8">Stock Out</button>-->
                                     <button disabled style="background-color:#839AA8; pointer-events: none" class="shopNowBtn shopNowBtn-slider"><a 
                                            href="{{ url('/cosmetic/product/detail/'.$latestdiscountproducts->category->category_slug_name.'/'.$latestdiscountproducts->subcategory->sub_category_slug_name.'/'.$most_popular_alls->product_slug_name) }}">
                                            Stock Out</a></button>
                                     @endif
                                    
                                </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- cosmetic mega sale container end -->

            <!-- Cosmetic Newly Launched Product Start -->
            <section class="cosmetic_newly_launched_prd_container mt-5 pt-5">
                <div class="row" style="width: 100%;">
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="image">
                            <img class="img-fluid" src="{{ asset('frontend/assets/images/newlyLanchedBanner.png') }}"
                                alt="">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-9 col-sm-12 mt-5">
                        <div class="container">
                            <p class="line"></p>
                            <h4>Newly Launched Product</h4>
                            <div class="launched_prd_slider">
                                @foreach ($launched_product as $launched_product_itm)
                                <div class="single_slider_cart">
                                    <p class="new">new</p>
                                    <img class="image" src="{{ $launched_product_itm->product_thambnail }}" alt="">
                                    
                                    <h5 class="mt-2">{{ $launched_product_itm->product_name }}</h5>
                                    
                                    <p><b style="font-size:14px; font-weight:bold">Color:</b>{{ $launched_product_itm->product_color }}</p>
                                    
                                    <div class="price pt-1">
                                      
                                        @if($launched_product_itm->discount_price ==0)
                                        
                                        <h5> ৳{{ intval($launched_product_itm->selling_price) }}</h5>
                                        
                                        @elseif($launched_product_itm->discount_price)
                                        
                                        <h5 class="disprc text-danger"><del>৳{{ intval($launched_product_itm->selling_price) }}</del></h5>
                                        
                                        <h5> ৳{{intval($launched_product_itm->discount_price) }}</h5>
                                        
                                        @endif
                                        
                                        
                                    </div>
                                    
                                    <!--<h6>{!! $launched_product_itm->product_descp !!}</h6>-->
                                    
                                    
                                    <div class="icon">
                                        <div class="addIcon">
                                            <a
                                                href="{{ url('/cosmetic/product/detail/'.$launched_product_itm->category->category_slug_name.'/'.$launched_product_itm->subcategory->sub_category_slug_name.'/'.$launched_product_itm->product_slug_name) }}"><img
                                                    src="{{ asset('frontend/assets/images/Vector.png') }}" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Cosmetic Newly Launched Product end -->
        </div>
    </section>
</main>

@endsection
@section('script')


<script>
    //======================== Search option start ======================//
   let searchById = document.getElementById("searchId");

       searchById.addEventListener("keyup", event => {
           let searchBy = event.target.value;
           if(searchBy !=''){
                  $.ajax({
                      url:"{{ route('searchproduct.ajax') }}",
                      method:"GET",
                      data:{squery:searchBy},
                      success:function(response){
                       //  console.log(response);
                       $("#show-list").html(response);
                      }
                  });
              }else{
               $.ajax({
                      url:"{{ route('searchproduct.ajax') }}",
                      method:"GET",
                      data:{squery:searchBy},
                      success:function(response){
                       //  console.log(response);
                       $("#show-list").html('');
                      }
                  });
              }

       });

   //======================== Search option end ======================//
</script>



@endsection
