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
    #furniture-collection-sub-banner,
    .product-section,
    .product-banner-section,
    .product-slider-section{
        display: none;
    }
      
      
    .furniture-home .category-btn:hover, 
    .furniture-home .category-btn.active{
         height: fit-content;
    }
    
    .furniture-pro-cate{
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }
    .furniture-home .featured-category .featured-category-item{
        margin: 0 5px;
    }
  }

    .all-categories-btn{
        border: 1px solid #223E3F;
        color: #223E3F;
        padding: 6px 32px;
    }
    
    .all-categories-btn:hover{
        background-color:#223E3F;
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
                                <a id="category-toggle-custom-sidemenu-button" onclick="toggleCategorySidemenu()"
                                    class="category-toggle-btn"><i class="fa fa-bars"></i></a>
                                </a>
                                <a href="{{ url('/furniture') }}" class="logo-container custom-header-ecom-title-home">
                                    <i class="fas fa-home"></i> Furniture Home
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- ---------- Search with Category ------------- -->
                    <div>
                        <a href="{{ url('/furniture') }}" class="logo-container custom-header-ecom-title-home">
                          <h2 class="text-white">Furniture</h2>
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
        $special_offer = App\Models\Product::where('special_offer','1')->where('ecom_name','7')->count();
        $coupons = App\Models\Coupon::where('status','1')->orderBy('id', 'DESC')->count();
        @endphp
       
        <li class="menu-heading">
            <a href="{{ url('/special/furniture/offer') }}"><span class="text">Special Offers</span> <span class="number">{{
                    $special_offer }}</span></a>
            <a href="{{ route('coupon.view') }}"><span class="text">Coupon</span><span class="number">{{ $coupons
                    }}</span></a>
        </li>

        @php
        $currentUrl = Request::segment(1);
        // dd($currentUrl);
        $categories=App\Models\Category::with('subcategory')->where('ecom_id','7')->get();
        @endphp
        <li class="mb-1 mt-3">
            <div class="collapse">               
                {{-- for category --}}
                @foreach ($categories as $category)
                <li class="mb-1 mt-2">
                    {{-- vvvvvv --}}
                    @if(Request::segment(2) != $category->category_slug_name)
                    <a href="{{ url('/fbs/'. $category->category_slug_name) }}">                      
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
                                        href="{{ url('/fbs/' . $subcategory->category->category_slug_name .'/'. $subcategory->sub_category_slug_name) }}">
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
                                            <li><a href="{{ url('/fbs/'.$subsubcategory->category->category_slug_name.'/'. $subsubcategory->subcategory->sub_category_slug_name.'/'. $subsubcategory->subsubcategory_slug_name) }}"
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

 <main class="main-body furniture-home">
        <section class="main-content category-closed" id="main-content">
            <!--home slider start-->
            <section class="megastore-slide collection-banner section-py-space">
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
                                                        alt="mega-store">
                                                    <div class="slide-contain">
                                                        <div>
                                                          
                                                            <h4>{{ $slider->title }}</h4>
                                                            <p>{{ $slider->description }}
                                                            </p>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 " id="furniture-collection-sub-banner">
                            <div class="row collection-p6">


                                @php
                                    $bennars = App\Models\Banner::where('status', 1)->where('ecom_id', '7')->orderBy('id', 'DESC')->limit(2)->get();
                                @endphp
                                @foreach ($bennars as $bennar)
                                    <div class="col-xl-12 col-lg-3 col-md-3">
                                        <div
                                            class="collection-banner-main banner-17 banner-style7 collection-color14 p-left">
                                            <div class="collection-img">
                                                <img src="{{ asset($bennar->bennar_img) }}" class="img-fluid bg-img  "
                                                    alt="banner">
                                            </div>
                                            <div class="collection-banner-contain ">

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
            <div class="section-title-no-bg px-md-5 px-3 mt-5 mt-md-3">
                <h4 class="text-center text-dark">Our Product Categories</h4>
            </div>
            <section class="featured-category px-md-5 px-3">
                <div class="container-fluid px-1 px-md-4">
                    <div class="row">
                        <div class="col">
                            <div class="furniture-pro-cate">
                               
                                @foreach ($categories as $value)
                                    <div>
                                        <a href="{{ url('/fbs/'. $value->category_slug_name) }}">
                                            <div class="featured-category-item text-center">
                                                <div class="d-flex justify-content-center mb-md-4 mb-1">
                                                    <img src="{{ $value->category_image }}" alt="">
                                                </div>
                                                <a href="#" class="category-btn active">{{ $value->category_name }} ({{$category->products_list->count()}})</a>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                         <a class="btn all-categories-btn" href="{{ route('furniture_category.view') }}">All Categories</a>
                    </div>
                  
            </section>
            <!-- end feature-category  -->



            <section class="product-section section-padding">
                <div class="">
                    <div class="product-section-head">
                        <h2>Our Top Products</h2>
                    </div>
                    <div class="product-category-box-wrap ">


                        @foreach ($products as $value)
                            <div class="card card-innr">
                                <img src="{{ $value->product_thambnail }}" alt="" class="card-img-top images-p img-fluid">
                                <div class="overly-icon">
                                    @if($value->product_qty>0)
                                    <a onclick="productViewFurnitur({{$value->id}})" class=""
                                        data-bs-toggle="modal" data-bs-target="#productQuickViewModalFurnitur"><i
                                            class="fas fa-search"></i></a>
                                    @endif
                                    <!--<a href="#" class=""><i class="fas fa-shopping-bag"></i></a>-->
                                </div>
                              
                                <div class="card-body">
                                    
                                    <div class="card-body-innr" style="height:92px;">
                                     <!-- Selling and Discount Price Start -->
                                     
                                     <p>{{ $value->product_name }}</p>
                                     
                                        @if ($value->discount_price == 0)
                                        <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                            {{ intval($value->selling_price) }} </h4>
                                            <div class="ratting">
                                        </div>
                                        @else
                                        <h4>
                                            <span style="color:black"> <span style="font-size:15px">৳</span>
                                                {{ intval($value->discount_price) }}</span>
                                            <span><s class="text-danger"><span style="font-size:15px">৳</span>
                                                    {{ intval($value->selling_price) }}</s></span>
                                        </h4>
                                        <div class="ratting">
                                        </div>
                                        @endif
                                        <!-- Selling and Discount Price End --> 
                                    </div>
                                    
                                    @if($value->product_qty>0)
                                     <div class="d-flex justify-content-center cart-details-btn ">
                                            <a onclick="productViewFurnitur({{ $value->id }})"
                                                data-bs-toggle="modal" data-bs-target="#productQuickViewModalFurnitur">
                                        <button class="btn btn-primary-filled px-4"><i class="fas fa-cart-plus me-2"></i>Add To Cart </button></a>
                                    </div>
                                    @else
                                    <div class="d-flex justify-content-center cart-details-btn ">
                                        <button disabled style="background-color:#839AA8" class="btn btn-primary-filled px-4"><i class="fas fa-cart-plus me-2"></i>Stock Out</button>
                                    </div>
                                    @endif
                                    
                                </div>
                                <!-- end card-body  -->
                            </div>
                        @endforeach
                        <!-- end card  -->
                    </div>
                    <!-- end product-category-box-wrap  -->

                    <div class="view-product-holder">
                        <a href="{{url('/product/furniture/more')}}" class="view-product-btn">View More Products</a>
                    </div>
                    <!-- end view-product-holder  -->
                </div>
                <!-- end container  -->
            </section>
            <!-- end product-section  -->
            <section class="product-banner-section">
                <div class="row">
                    <div class="col-12">
                        <div class="product-banner-cont-wrap">
                            <div class="product-banner-cont">
                                <h3>Your Best Value Products</h3>
                                <p></p>
                                <!--<div class="pro-banner-holder">-->
                                <!--    <a href="#" class="pro-btn">SHOP NOW</a>-->
                                <!--</div>-->
                            </div>
                            <!-- end product-banner-cont  -->
                            <div class="shapes">
                                <!-- <span>Low Prices</span> -->
                            </div>
                            <img src=" {{ asset('frontend/assets/images/furniture/slider/Background.png') }} "
                                alt="banner-imgs" class="banner-imgs">

                        </div>
                        <!-- end product-banner-cont-wrap  -->
                    </div>
                </div>
            </section>
            <!-- end product-banner-section  -->
            <!-- Start Product-slider-section  -->
            <section class="product-slider-section">
                <div class="product-header">
                    <h2>Latest Products</h2>
                    
                </div>
                <!-- end product-header  -->
                <div class="row">
                    <div class="col-12">
                        <div class="slide-4">
                            @foreach ($latest_products as $specialvalue)
                                <div class="px-3 w-100">
                                    <div class="card card-innr w-100">
                                        <img src="{{ $specialvalue->product_thambnail }}" alt=""
                                            class="card-img-top images-p img-fluid">
                                        <div class="overly-icon">
                                            @if($specialvalue->product_qty>0)
                                            <a onclick="productViewFurnitur({{$specialvalue->id}})" class=""
                                                data-bs-toggle="modal" data-bs-target="#productQuickViewModalFurnitur"><i
                                                    class="fas fa-search"></i></a>
                                            <!--<a href="#" class=""><i class="fas fa-shopping-bag"></i></a>-->
                                            @endif
                                        </div>
                                        <!-- end overly-icon  -->
                                         <div class="card-body">
                                            <div class="card-body-innr" style="height:92px;">
                                                <p>{{ $specialvalue->product_name }}</p>
                                                
                                               @if ($value->discount_price == 0)
                                            <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                                {{ intval($value->selling_price) }} </h4>
                                                <div class="ratting">
                                            </div>
                                            @else
                                            <h4>
                                                <span style="color:black"> <span style="font-size:15px">৳</span>
                                                    {{ intval($value->discount_price) }}</span>
                                                <span><s class="text-danger"><span style="font-size:15px">৳</span>
                                                        {{ intval($value->selling_price) }}</s></span>
                                            </h4>
                                                <div class="ratting">
                                                </div>
                                              @endif   
                                            </div>
                                            @if($specialvalue->product_qty>0)
                                            <div class="d-flex justify-content-center cart-details-btn ">
                                                <a onclick="productViewFurnitur({{ $value->id }})"
                                                    data-bs-toggle="modal" data-bs-target="#productQuickViewModalFurnitur">
                                                <button class="btn btn-primary-filled px-4" style="background-color:#223E3"><i class="fas fa-cart-plus me-2"></i>Add To Cart </button></a>
                                            </div>
                                            @else
                                             <div class="d-flex justify-content-center cart-details-btn ">
                                        <button disabled style="background-color:#839AA8" class="btn btn-primary-filled px-4"><i class="fas fa-cart-plus me-2"></i>Stock Out</button>
                                    </div>
                                    @endif
                                            
                                            
                                        </div>
                                        <!-- end card-body  -->
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- end owl-carousel  -->
                    </div>
                    <!-- end col  -->
                </div>
                <!-- end row  -->
            </section>
            <!-- end product-slider-section  -->
        </section>
    </main>

<div class="modal fade" id="bppshops_promo" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-body p-0">
        <button type="button" class="btn-close bppshops_promo_close_btn" data-bs-dismiss="modal"
          aria-label="Close"></button>
        <img class="img-fluid" src="{{ asset('frontend/assets/images/home_popup.jpg') }}" alt="" srcset="">
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


