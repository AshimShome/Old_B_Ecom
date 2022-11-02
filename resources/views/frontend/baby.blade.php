
@extends('frontend.main_master')
@section('islamic')
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
        

        @media screen and (max-width: 600px) {
            .latest-discounted-products-banner {
                display: none;
            }
        }

        .baby-home .tbd-wrapper .tbd-item-wrapper .tdb-item .tbdi-content .tbdi-content-bottom .add-btn{
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 140px;
            height: 39px;
            background-color: var(--baby_primary);
            border-radius: 5px;
            text-transform: uppercase;
            color: #fff;
            margin-top: 20px;
        }
        
        .featured-category-item-header{
            color: #f11a1a;
        }
        .gro-featured-slider-card{
            padding: 5px;
        }
        .baby-home .tbd-wrapper .tbd-item-wrapper .tdb-item .tbdi-content .tbdi-content-bottom .product-name,
        .baby-home .tdb-item-product .tbdi-content .tbdi-content-bottom .product-name{
            height: 44px;
            overflow: hidden;
            text-overflow: ellipsis;
            -webkit-line-clamp: 2;
            display: -webkit-box;
            -webkit-box-orient: vertical;
        }
        @media only screen and (max-width: 600px) {
          .custom-header-ecom-title{
              margin-top: 100px!important;
          }
          .tbd-wrapper,
          .tbdb-wrapper,
          .filter-feature,
          .countdown-section,
          .sponsor-section{
              display:none!important;
          }
          .gro-featured-slider{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
          }
          .gro-featured-slider .gro-featured-slider-card{
            padding: 10px;
            width: 150px;
          }
          .featured-category-item-header h6{
              height: 34px;
              overflow: hidden;
          }
        }
    </style>
<div id="sidemenu-container" class="sidemenu-container">
    <ul id="category-toggle-custom-sidemenu" class="category-sidemenu">

        @php
        $special_offer = App\Models\Product::where('special_offer','1')->where('ecom_name','6')->count();
        
        $coupons = App\Models\Coupon::where('status','1')->orderBy('id', 'DESC')->count();
        @endphp
       
        <li class="menu-heading">
            <a href="{{ url('/special/baby/offer') }}"><span class="text">Special Offers</span> <span class="number">{{
                    $special_offer }}</span></a>
            <a href="{{ route('coupon.view') }}"><span class="text">Coupon</span><span class="number">{{ $coupons
                    }}</span></a>
        </li>

        @php
        $currentUrl = Request::segment(1);
        
        $categories=App\Models\Category::with('subcategory')->where('ecom_id','6')->get();
        @endphp
        <li class="mb-1 mt-3">
            <div class="collapse">               
                {{-- for category --}}
                @foreach ($categories as $category)
                <li class="mb-1 mt-2">
                    {{-- vvvvvv --}}
                    @if(Request::segment(2) != $category->category_slug_name)
                    <a href="{{ url('/bbs/'. $category->category_slug_name) }}">                      
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
                                        href="{{ url('/bbs/' . $subcategory->category->category_slug_name .'/'. $subcategory->sub_category_slug_name) }}">
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
                                            <li><a href="{{ url('/bbs/'.$subsubcategory->category->category_slug_name.'/'. $subsubcategory->subcategory->sub_category_slug_name.'/'. $subsubcategory->subsubcategory_slug_name) }}"
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
                                <a href="{{ url('/baby') }}" class="logo-container custom-header-ecom-title-home">
                                    <i class="fas fa-home"></i> Baby Home
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- ---------- Search with Category ------------- -->
                    <div>
                         <a href="{{ url('/baby') }}" class="logo-container custom-header-ecom-title-home">
                          <h2 class="text-white">Baby</h2>
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


    <main class="main-body baby-home main-content">
        <section class="megastore-slide collection-banner section-py-space">
          <div class="container-fluid">
             <div class="row mega-slide-block">
                <div class="col-xl-6 col-lg-12 collection-banner-close" id="megastore-collection-banner">

                   <div class="row">
                     <div class="col-12">
                         <div class="gro-banner-slider no-arrow">
                             @foreach ($sliders as $slider)
                             <div class="slide-main">
                                 <img src=" {{ asset($slider->slider_img) }} " class="img-fluid bg-img"
                                     alt="mega-store">
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
                        $bennars = App\Models\Banner::where('status', 1)->where('ecom_id','6')
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
       </section>
      

            <!--banner category start-->
              <section class="featured-category mt-3 px-md-5 px-3">
          <div class="container-fluid px-2 px-lg-5">
             <div class="row">
                <div class="col">
                   <div class="gro-featured-slider">

                     @foreach ($categories as $category)
                      <div class="gro-featured-slider-card">
                         <a href="{{ url('/bbs/'. $category->category_slug_name) }}">
                            <div class="featured-category-item text-center">
                               <div class="d-flex justify-content-center">
                                  <img class="img-fluid" src="{{ asset($category->category_image) }}" alt="">
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
            
        

            <!-- best deal start -->
            <section class="tbd-wrapper">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12 section-title  mt-5 px-md-5 px-3">
                        <h2 class="text-center">Today’s Best Deal</h2>
                    </div>
                </div>
                <div class="container baby-container">
                    <div class="row tbd-item-wrapper">
                        @foreach ($latestdiscountproducts as $latestdiscountproduct)
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 pt-3">
                                <div class="tdb-item">
                                    <div class="tbdi-thumb">
                                        <img src="{{ asset($latestdiscountproduct->product_thambnail) }}" alt="best deal">
                                        <div class="tbdi-overlay">
                                              @php
                                                
                                                 $amount = $latestdiscountproduct->selling_price - $latestdiscountproduct->discount_price;
                                                 $discount = ($amount / $latestdiscountproduct->selling_price) * 100;
                                              
                                                 
                                                 @endphp 
                                                 @if($discount==100)
                                               
                                                 <div class="tbdi-offer">

                                                       </div>
                                              
                                                  @else
                                                   <div class="tbdi-offer" style="background-color:red;border-radius:10px;color:#ffff;text-align:center;">
                                                         <p>-{{ round($discount) }}%</p>
                                                            
                                                       </div>
                                                  @endif
                                            <ul class="tbdi-overlay-menu">
                                                <li>
                                                    @if($latestdiscountproduct->product_qty > 0)
                                                     <a href="#" data-bs-toggle="modal" onclick="productViewBaby({{ $latestdiscountproduct->id }})"
                                                        data-bs-target="#productQuickViewModalBaby">
                                                        <i class="fa-regular fa-eye"></i></a>
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tbdi-content">
                                        @php
                                            if($latestdiscountproduct->reviews_sum_quality != 0 && $latestdiscountproduct->reviews_count !=0){
                                                
                                                $review_star =  $latestdiscountproduct->reviews_sum_quality / $latestdiscountproduct->reviews_count;

                                            }
                                            else{
                                                
                                                $review_star = 0;

                                            }
    
                                        @endphp

                                                
                                        <ul class="rating-star">
                                            @if( $review_star >= 1 )

                                                <li> <i class="fa-solid fa-star"></i> </li>

                                            @endif

                                            @if ($review_star >= 2)
                                            <li> <i class="fa-solid fa-star"></i> </li>
                                                
                                            @endif

                                            @if ($review_star >= 3)
                                            <li> <i class="fa-solid fa-star"></i> </li>
                                                
                                            @endif

                                            @if ($review_star >= 4)
                                            <li> <i class="fa-solid fa-star"></i> </li>
                                                
                                            @endif

                                            @if ($review_star == 5)
                                            <li> <i class="fa-solid fa-star"></i> </li>
                                                
                                            @endif
                                        </ul>
                                        <div class="tbdi-content-bottom">
                                                <p class="product-name"> {{ $latestdiscountproduct->product_name }}</p>
                                                @if ($latestdiscountproduct->discount_price == 0)
                                                <p class="price" style="color:black" >৳{{intval($latestdiscountproduct->selling_price) }} </p>
                                                @else
                                                <p class="price" style="color:black">৳{{intval($latestdiscountproduct->discount_price) }}  <del class="discount-price text-danger" > ৳{{ intval($latestdiscountproduct->selling_price) }}</del> </p>
                                                @endif
                                                
                                                 @if($latestdiscountproduct->product_qty > 0)
                                                  <a class="add-btn" onclick="productViewBaby({{ $latestdiscountproduct->id }})" 
                                                    href="#" data-bs-toggle="modal" data-bs-target="#productQuickViewModalBaby">Add to Bag</a>
                                                @else
                                                    <a class="add-btn" style="background-color:#839AA8; pointer-events: none"
                                                   href="#" >Stock Out</a>
                                                @endif
                                                
                                               
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a href="{{url('product/baby/best/deal/Product')}}" > <button type="button" id="button" class="btn baby-button d-block mx-auto">See More Best Deal Products</button></a>
                </div>
            </section>
            <!-- best deal end -->

            <!-- best deal banner start -->
        

            <section class="tbdb-wrapper mt-5">
                <div class="container baby-container">
                    <div class="row tbdb-item-wrapper">
                        <div class="pt-3 baby_slide_2">

                            @foreach ($banner_1 as $bennar)
                                <div class="tbdb-item custom-bg-1 text-center">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <div class="thumb">
                                                <img class="img-fluid mx-auto"  src="{{ asset($bennar->bennar_img) }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </section>
            <!-- best deal banner end -->



            <!-- filter product start -->
            <section class="filter-feature pt-5">
                <div class="container baby-container">
                    <div class="row">
                        <div class="col-12">
                            <div class="filter-menu-wrapper">
                                <nav>
                                    <div class="nav nav-tabs filter-menu" id="nav-tab" role="tablist">
                                        <button class="nav-link filter-btn active" id="nav-home-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                            aria-selected="true">Top Rating</button>
                                        <button class="nav-link  filter-btn " id="nav-profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-profile" type="button" role="tab"
                                            aria-controls="nav-profile" aria-selected="false"> Best Selling </button>
                                        <button class="nav-link  filter-btn " id="nav-contact-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-contact" type="button" role="tab"
                                            aria-controls="nav-contact" aria-selected="false"> Featured</button>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="filter-content pt-2">
                        <div class="tab-content" id="nav-tabContent">
                            
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                    aria-labelledby="nav-home-tab">
                                    <div class="row justify-content-center filter-item-wrapper">
                                        @foreach ($topratedProducts as $topratedProduct)
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 pt-5">
                                            <div class="tdb-item-product">
                                                <div class="tbdi-top">
                                                    <div class="tbdi-overlay">
                                                           @php
                                                        
                                                         $amount = $topratedProduct->selling_price - $topratedProduct->discount_price;
                                                         $discount = ($amount / $topratedProduct->selling_price) * 100;
                                                      
                                                         
                                                         @endphp 
                                                         @if($discount==100)
                                                       
                                                         <div class="tbdi-offer">

                                                               </div>
                                                      
                                                          @else
                                                           <div class="tbdi-offer">
                                                                 <p>-{{ round($discount) }}%</p>
                                                                    
                                                               </div>
                                                          @endif
                                                        
                                                        <ul class="tbdi-overlay-menu">
                                                            
                                                            <li> 
                                                            @if($topratedProduct->product_qty > 0)
                                                                <a href="#" data-bs-toggle="modal" onclick="productViewBaby({{ $topratedProduct->id }})"
                                                                    data-bs-target="#productQuickViewModalBaby"> <i
                                                                        class="fa-regular fa-eye"></i></a>
                                                            @endif
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="thumb">
                                                        <img class="img-fluid" src="{{ $topratedProduct->product_thambnail }}" alt="best deal">
                                                    </div>
                                                </div>
                                                <div class="tbdi-content">
                                                    @php
                                                        if($topratedProduct->reviews_sum_quality != 0 && $topratedProduct->reviews_count !=0){
                                                            
                                                            $review_star =  $topratedProduct->reviews_sum_quality / $topratedProduct->reviews_count;

                                                        }
                                                        else{
                                                            
                                                            $review_star = 0;

                                                        }
    
                                                    @endphp

                                                
                                                    <ul class="rating-star">
                                                        @if( $review_star >= 1 )
                                                            <li> <i class="fa-solid fa-star"></i> </li>
                                                        @endif

                                                        @if ($review_star >= 2)
                                                        <li> <i class="fa-solid fa-star"></i> </li>
                                                        @endif

                                                        @if ($review_star >= 3)
                                                        <li> <i class="fa-solid fa-star"></i> </li>
                                                        @endif

                                                        @if ($review_star >= 4)
                                                        <li> <i class="fa-solid fa-star"></i> </li>
                                                        @endif

                                                        @if ($review_star == 5)
                                                        <li> <i class="fa-solid fa-star"></i> </li>
                                                        @endif
                                                    </ul>
                                                    
                                                    <div class="tbdi-content-bottom">
                                                        <p class="product-name">{{ $topratedProduct->product_name }}</p>
                                                        
                                                        @if ($topratedProduct->discount_price == 0)
                                                        <p class="price" style="color:black">৳{{ intval($topratedProduct->selling_price) }} </p>
                                                        
                                                        @else
                                                        <p class="price" style="color:black">৳{{ intval($topratedProduct->discount_price) }}  <del class="discount-price text-danger" > ৳{{ intval($topratedProduct->selling_price) }}</del> </p>
                                                        @endif
                                                        @if($topratedProduct->product_qty > 0)
                                                        <a class="add-btn" onclick="productViewBaby({{ $topratedProduct->id }})" 
                                                            href="#" data-bs-toggle="modal" data-bs-target="#productQuickViewModalBaby">Add to Bag</a>
                                                        @else
                                                        <a class="add-btn" style="background-color:#839AA8; pointer-events: none"
                                                   href="#" >Stock Out</a>
                                                   @endif
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        @endforeach
                                    </div>
                                    <div class="text-center">
                                        <a href="{{url('product/baby/top/seling/Product')}}" > <button type="button" id="button" class="btn baby-button mx-auto">See More Top Rating Product</button></a>
                                    </div>
                                     
                                    
                                </div>
                           

                            <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                aria-labelledby="nav-profile-tab">
                                <div class="row justify-content-center filter-item-wrapper">
                                        @foreach ($dailyBestSales as $best_selling)
                                        <div class="col-lg-3 col-md-4 col-12 pt-5">
                                            <div class="tdb-item-product">
                                                <div class="tbdi-top">
                                                    <div class="tbdi-overlay">
                                                       
                                                        @php
                                                        
                                                         $amount = $best_selling->selling_price - $best_selling->discount_price;
                                                         $discount = ($amount / $best_selling->selling_price) * 100;
                                                      
                                                         
                                                         @endphp 
                                                         @if($discount==100)
                                                       
                                                         <div class="tbdi-offer">
                                                                
                                                                    
                                                               </div>
                                                      
                                                          @else
                                                           <div class="tbdi-offer">
                                                                 <p>-{{ round($discount) }}%</p>
                                                                    
                                                               </div>
                                                          @endif
                                                    
                                               
                                                                                                          
                                                        
           
                                                        <ul class="tbdi-overlay-menu">
                                                            <li> 
                                                                @if($best_selling->product_qty>0)
                                                                <a href="#" data-bs-toggle="modal" onclick="productViewBaby({{ $best_selling->id }})"
                                                                    data-bs-target="#productQuickViewModalBaby"> <i
                                                                        class="fa-regular fa-eye"></i></a>
                                                                @endif
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="thumb">
                                                        <img class="img-fluid" src="{{ asset($best_selling->product_thambnail) }}"
                                                            alt="best deal">
                                                    </div>

                                                </div>
                                                <div class="tbdi-content">
                                                    
                                                </ul>
                                                    <div class="tbdi-content-bottom">
                                                        <p class="product-name">{{ $best_selling->product_name }}</p>
                                                    
                                                     
                                                        @if ($best_selling->discount_price == 0)
                                                        <p class="price" style="color:black">৳{{ intval($best_selling->selling_price) }} </p>
                                                        
                                                        @else
                                                        <p class="price" style="color:black">৳{{ intval($best_selling->discount_price) }}  <del class="discount-price text-danger" > ৳{{ intval($best_selling->selling_price) }}</del> </p>
                                                        @endif
                                                        
                                                       @if($best_selling->product_qty>0)
                                                       <a class="add-btn" onclick="productViewBaby({{ $best_selling->id }})" 
                                                            href="#" data-bs-toggle="modal" data-bs-target="#productQuickViewModalBaby">Add to Bag</a>
                                                        @else
                                                        <a class="add-btn" style="background-color:#839AA8; pointer-events: none"
                                                   href="#" >Stock Out</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="text-center">
                                         <a href="{{url('product/baby/best/seling/Product')}}" > <button type="button" id="button" class="btn baby-button mx-auto">See More Best Selling  Product</button></a>
                                    </div>
                                     
                                </div>
                              
                              
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <div class="row justify-content-center filter-item-wrapper">

                                    @foreach ($featureds as $featured)
                                        <div class="col-lg-3 col-md-4 col-12 pt-5">
                                            <div class="tdb-item-product">
                                                <div class="tbdi-top">
                                                    <div class="tbdi-overlay">
                                                           @php
                                                        
                                                         $amount = $featured->selling_price - $featured->discount_price;
                                                         $discount = ($amount / $featured->selling_price) * 100;
                                                      
                                                         
                                                         @endphp 
                                                         @if($discount==100)
                                                       
                                                         <div class="tbdi-offer">

                                                               </div>
                                                      
                                                          @else
                                                           <div class="tbdi-offer">
                                                                 <p>-{{ round($discount) }}%</p>
                                                                    
                                                               </div>
                                                          @endif
                                                    
                                                        <ul class="tbdi-overlay-menu">
                                                            
                                                            <li> 
                                                                @if($featured->product_qty>0)
                                                                <a href="#" data-bs-toggle="modal"  onclick="productViewBaby({{ $featured->id }})"
                                                                    data-bs-target="#productQuickViewModalBaby"> <i
                                                                        class="fa-regular fa-eye"></i></a>
                                                                @endif
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="thumb">
                                                        <img class="img-fluid" src="{{ $featured->product_thambnail }}" alt="best deal">
                                                    </div>

                                                </div>
                                                <div class="tbdi-content">
                                                    @php
                                                        if($featured->reviews_sum_quality != 0 && $featured->reviews_count !=0){
                                                            
                                                            $review_star =  $featured->reviews_sum_quality / $featured->reviews_count;

                                                        }
                                                        else{
                                                            
                                                            $review_star = 0;

                                                        }

                                                    @endphp
                                                    <ul class="rating-star">

                                                        @if( $review_star >= 1 )

                                                        <li> <i class="fa-solid fa-star"></i> </li>

                                                        @endif

                                                        @if ($review_star >= 2)
                                                        <li> <i class="fa-solid fa-star"></i> </li>
                                                            
                                                        @endif

                                                        @if ($review_star >= 3)
                                                        <li> <i class="fa-solid fa-star"></i> </li>
                                                            
                                                        @endif

                                                        @if ($review_star >= 4)
                                                        <li> <i class="fa-solid fa-star"></i> </li>
                                                            
                                                        @endif

                                                        @if ($review_star == 5)
                                                        <li> <i class="fa-solid fa-star"></i> </li>
                                                            
                                                        @endif
                                                    </ul>
                                                    <div class="tbdi-content-bottom">
                                                        <p class="product-name">{{ $featured->product_name }}</p>
                                                        
                                                        @if ($featured->discount_price == 0)
                                                        <p class="price" style="color:black">৳{{ intval($featured->selling_price) }} </p>
                                                        
                                                        @else
                                                        <p class="price" style="color:black">৳{{ intval($featured->discount_price) }}  <del class="discount-price text-danger" > ৳{{ intval($featured->selling_price) }}</del> </p>
                                                        @endif
                                                        @if($featured->product_qty>0)
                                                         <a class="add-btn" onclick="productViewBaby({{ $featured->id }})" 
                                                            href="#" data-bs-toggle="modal" data-bs-target="#productQuickViewModalBaby">Add to Bag
                                                         </a>
                                                         @else
                                                         <a class="add-btn" style="background-color:#839AA8; pointer-events: none"
                                                   href="#" >Stock Out</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <div class="text-center">
                                    <a href="{{url('product/baby/featur/Product')}}" > <button type="button" id="button" class="btn baby-button mx-auto">See More Featured Product</button></a>   
                                </div>
                                 
                              
                            </div>
                          
                        </div>
                    </div>
                </div>
            </section>
            <!-- filter product start -->

            <!-- countdown Product -->
                        
            <section class="countdown-section mt-5">
                <div class="container baby-container ">
                   <div class="row coundown-wrapper">
                    <h2 class="mb-2">Deals of The day</h2>
                      <div class="pt-3 baby_deal_offer">
                        @foreach ($hot_deals as $item)


                            <div class="tbdb-item custom-bg-1 text-center end_date_slider" id="end_date_slider">
                                <div class="row align-items-center">
                                <div class="d-lg-flex d-inline">
                                    <div class="coundown-content coundown-wrapper-img">
                                        <div class="cc-top">
                                            <h2>{{ $item->product_name }}</h2>

                                            @if ($item->discount_price == 0)
                                                <h6>৳{{ intval($item->selling_price) }}</h6>
                                            @else
                                                <h6>৳{{ intval($item->discount_price) }} <del>৳{{ intval($item->selling_price) }}</del> </h6>
                                            @endif

                                        </div>
                                        <div class="end_date_expire" id="end_date_time{{ $item->id }}"><b>{{ \Carbon\Carbon::parse($item->end_date)->format('d M Y');  }}</b></div>
                                        <div class="cc-bottom">
                                            <ul class="cc-timer-menu">
                                            <li>
                                                <p> <span class="countDownDay" id="countDownDay{{ $item->id }}">5</span> DAYS </p>
                                            </li>
                                            <li>
                                                <p> <span class="countDownHours" id="countDownHours{{ $item->id }}"></span> HOURS </p>
                                            </li>
                                            <li>
                                                <p> <span class="countDownMinutes" id="countDownMinutes{{ $item->id }}"></span> MINS </p>
                                            </li>
                                            <li>
                                                <p><span class="countDownSeconds" id="countDownSeconds{{ $item->id }}"></span> SECS </p>
                                            </li>
                                            </ul>
                                        </div>
                                        <div class="cc-btn">
                                            <a  href="#"><button
                                                class="btn btn-primary shop-btn" data-bs-toggle="modal" onclick="productViewBaby({{ $item->id }})" data-bs-target="#productQuickViewModalBaby">SHOP NOW</button></a>


                                        </div>
                                    </div>
                                    <div class="coundown-Thumb">
                                        <img  src="{{ asset($item->product_thambnail) }}"
                                            alt="product-img" height="450" width="650">
                                    </div>
                                </div>
                                </div>
                            </div>
                        @endforeach

                      </div>
                   </div>
                </div>
             </section>
             <!-- countdown Product -->

            <!-- countdown Product -->
            <!--home slider start-->
            <section class="sponsor-section">
                <div class="container baby-container">
                    <div class="baby_slide_sponsor  sponsor-wrapper no-arrow">
                        <div class="sw-item">
                            <img src="{{ asset('frontend/assets/images/baby/baby/sponsor/img2.png') }}" alt="sponsor-1">
                        </div>
                        <div class="sw-item">
                            <img src="{{ asset('frontend/assets/images/baby/baby/sponsor/img2.png') }}" alt="sponsor-1">
                        </div>
                        <div class="sw-item">
                            <img src="{{ asset('frontend/assets/images/baby/baby/sponsor/img3.png') }}" alt="sponsor-1">
                        </div>
                        <div class="sw-item">
                            <img src="{{ asset('frontend/assets/images/baby/baby/sponsor/img4.png') }}" alt="sponsor-1">
                        </div>
                        <div class="sw-item">
                            <img src="{{ asset('frontend/assets/images/baby/baby/sponsor/img3.png') }}" alt="sponsor-1">
                        </div>
                        <div class="sw-item">
                            <img src="{{ asset('frontend/assets/images/baby/baby/sponsor/img4.png') }}"  alt="sponsor-1">
                        </div>
                    </div>
                </div>
            </section>
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
