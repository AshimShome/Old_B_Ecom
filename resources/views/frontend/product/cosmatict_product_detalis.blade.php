@extends('frontend.main_master')
@section('css')
<style>
    .checked {
        color: darkorange;
    }

    .material .color {
        color: Green;
        font-size: 18px;
        font-weight: 700;
    }

    .main-content ul li a {
        text-decoration: none;
    }

    .material-span {
        font-size: 18px;
        font-weight: bold;
        color: #000;
    }

    .material {
        margin-bottom: 20px;
    }

    .product-amount-innt {
        display: flex;
        justify-content: start;
        align-items: center;
        flex-wrap: wrap;
        text-align: center;
        margin-bottom: 20px;
        padding-bottom: 5px;
    }
    .btn.prod-btn {
        color: #fff;
    }

    .product-amount-innt h6 {
        margin-right: 5px;
        color: red;
        font-weight: bold;
        font-size: 20px;
    }

    .product-amount-innt del {
        margin-right: 5px;
        color: #C2C2C2;
        font-weight: bold;
        font-size: 16px;
        margin-bottom: 20px;
    }

    .product-amount-innt .like,
    .mes {
        text-align: center;
        margin-right: 5px;
        background: #C2C2C2;
        color: #fff;
        padding: 4px 8px;
        border-radius: 5px;
        font-weight: bold;
        font-size: 14px;
    }

    .product-details-quantity {
        display: flex;
        justify-content: safe;
        align-items: center;
    }

    .product-title {
        padding-right: 10px;
    }

    .product-right .pro-group .product-social li a {
        background-color: #F9B92E;
        color: white
    }

    .product-right .pro-group .product-social li a:hover {
        background-color: #FFD06B;
        color: white
    }

    .section-big-pt-space {
        padding-top: 0px;
    }

    .section-big-pt-space .product-img-innr {
        background: #ffff;
        padding: 10px;
        border: 1px solid #C2C2C2;
        margin-bottom: 30px;
    }

    .section-big-pt-space .product-slider-img-innr {
        margin: 30px 0;
    }

    .section-big-pt-space .product-slider-img-innr a img {
        border: 1px solid #ababab;
        margin: 3px 1px;
    }

    .prod-btn {
        padding: 8px 30px;
        font-weight: bold;
        font-size: 18px;
        line-height: 29px;
        color: #1D1F1F;
        text-align: start;
        border-bottom: 1px solid #C2C2C2;
        margin: 10px;
        margin-right: 30px;
    }

    .prod-btn.active {
        font-family: Tahoma;
        font-style: normal;
        font-weight: 500;
        font-size: 18px;
        line-height: 29px;
        position: relative;
        background: var(--primary);
        color: #fff;
        margin-bottom: 20px;
        border-radius: 0;
        border-bottom: none;
    }

    .prod-btn.active:before {
        position: absolute;
        content: " ";
        width: 20px;
        height: 20px;
        background: var(--primary);
        top: 23%;
        right: -16px;
        clip-path: polygon(100% 54%, 0 0, 1% 100%);
    }

    .tab-contents {
        border: 1px solid #C2C2C2;
        padding: 50px;
    }

    .rating li i {
        color: goldenrod !important;
    }

    .client-review h6 {
        font-weight: 600;
        font-size: 16px;
        color: rgb(78, 78, 78);
    }

    .submit-review .review-table {
        border: 1px solid rgb(218, 218, 218);
        padding: 10px;
    }

    .submit-review .col-2 {
        padding: 10px;
        text-align: center;
    }

    .price-section {
        margin-right: 150px;
    }

    .price {
        font-size: 28px;
        color: green;
        font-weight: bold;
    }

    .price del {
        font-size: 20px;
        color: red;
        font-weight: bold;
    }

    .product-right .pro-group .product-choose-innr {
        padding-top: 20px;
        padding-bottom: 15px;
        border-bottom: 1px solid #DDDDDD;
    }

    .product-details-quantity {
        padding-top: 32px;
    }

    .submit-button {
        text-align: end;
    }

    .review-btn {
        background-color: var(--primary);
        border: 1px solid var(--primary);
        color: white;
        width: 200px;
        height: 42px;
        border-radius: 6px;
        font-size: 16px;
        font-weight: bold;
    }

    .rating li i {
        color: #FFCE31 !important;
    }

    .cos_product_detail_wrapper .img_zoom_container .img_zoom_des .rr {
        font-family: "Montserrat";
        font-weight: 600;
        color: #d5d9de;
    }
    .recommended-title{
        height: 40px;
        overflow: hidden;
    }
    .recommended-desc{
        height: 38px;
        overflow: hidden;
    }
   
   .size-box ul li:nth-child(n+2){
       margin-left: 0;
     
   }
   #productSize{
       display: flex;
       flex-wrap:wrap;
   }
   .product-size-list{
       margin-top: 6px;
    margin-right: 5px;
   }
   .size-box ul li{
       margin-right:10px;
       margin-top:5px;
   }

   .productSize-inner{
       display: flex;
       justify-content: center;
       align-items: center;
   }
   
   .prc_info{
       margin-bottom: 5px;
   }
   .prc_info p{
       font-size: 16px;
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
                        <a href="{{ url('/cosmetic') }}">     <h2 class="text-white">Cosmetics</h2> </a>
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
    <!-- Section Start -->
    <section class="main-content category-closed" id="main-content">
        <div class="container-fluid">
            <div class="cos_product_detail_wrapper pt-4">

                <!-- sub Header start -->
                <ul class="subHeader">
                    <li><a href="{{url('/cosmetic/')}}">Home <i class="fa-solid fa-angle-right"></i></a></li>
                    <li><a href="#">Product Details <i class="fa-solid fa-angle-right"></i></a></li>
                </ul>
                <!-- sub Header end -->

                <div class="main_body_wrapper pt-4">
                    <div class="row">
                        <div class="col-lg-8 pe-1">
                            <!--===================> image zoom container start <======================-->
                            <div class="img_zoom_container row">
                                <div class="col-lg-6">
                                    <div class="section-big-pt-space container-fluid">
                                        <div class="collection-wrapper">
                                            <div class="custom-container">
                                                <div class="row">
                                                    <div class="xzoom-container">
                                                        <div class="product-img-innr">
                                                            <img class="xzoom5 img-fluid zoomImage" id="xzoom-default"
                                                                src="{{ asset($product->product_thambnail)  }}"
                                                                xoriginal="{{ asset($product->product_thambnail) }}" />
                                                        </div>
                                                      
                                                        <div class="xzoom-thumbs product-slider-img-innr">
                                                            <a href="{{ asset($product->product_thambnail)  }}"><img
                                                                    class="xzoom-gallery5" width="80"
                                                                    src="{{ asset($product->product_thambnail)  }}"
                                                                    title=""></a>
                                                            @foreach($multiimgs as $multiimg)
                                                            <a href="{{ asset($multiimg->photo_name)  }}"><img
                                                                    class="xzoom-gallery5" width="80"
                                                                    src="{{ asset($multiimg->photo_name)  }}"
                                                                    title=""></a>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="img_zoom_des">
                                        <p class="title" style="font-family: 'Montserrat';font-style: normal;font-weight: 600;font-size: 24px;line-height: 29px;">{{ $product->product_name }}</p>
                                            <div class="price pt-1">
                                                @if($product->discount_price ==0)
                                                <p style="color:#481C69; font-family:Montserrat; font-style: normal;font-weight: 600;font-size: 24px;line-height: 29px;"> ৳{{ intval($product->selling_price) }}</p>
                                                @elseif($product->discount_price)
                                                <p class="disprc text-danger" style="color:#481C69; font-family:Montserrat; font-style: normal;font-weight: 600;font-size: 24px;line-height: 29px;">
                                                    <del style="color:red; font-family:Montserrat; font-style: normal;font-weight: 600;font-size: 24px;line-height: 29px;">৳
                                                        {{ intval($product->selling_price) }}</del>
                                                </p>
                                                <p style="color:#481C69; font-family:Montserrat; font-style: normal;font-weight: 600;font-size: 24px;line-height: 29px;"> ৳{{intval($product->discount_price) }}</p>
                                                @endif
                                            </div>
                                          
                                        <p class="quantity">Quantity</p>
                                        <div class="increaseDecrease py-2">
                                            <button onclick="quickViewQunatityIncr(event)"><i
                                                    class="fas fa-plus"></i></button>
                                            <input id="productQuantity" type="text" value="1" readonly>
                                            <button onclick="quickViewQunatityDec(event)"><i
                                                    class="fas fa-minus"></i></button>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <p class="prdCode">Product Code:{{ $product->product_code }} </p>
                                                <p class="prdCode">Sku code: #{{ $product->sku_code }}</p>
                                            </div>
                                        </div>
                                        <div class="row product-choose-innr">
                                            @if (count($product_size_all) == 1 && $product_size_all[0] == '')
                                            <ul id="productSize" style="display: none">
                                            </ul>
                                            @else
                                            <div class="col-lg-6 col-sm-12">
                                                <div class="error-mes-innr">
                                                    <h6 class="product-title">SIZE</h6>
                                                    <div class="size-box">
                                                        <ul id="productSize" class="product-size-list">
                                                            @foreach ($product_size_all as $key => $value)
                                                            @if ($key == 0)
                                                            <li class="productSize-inner d-flex justify-content-center align-items-center" eia-value="{{ $value }}">
                                                                <span>{{ $value }}</span>
                                                            </li>
                                                            @else
                                                            <li class="productSize-inner" eia-value="{{ $value }}">
                                                                <span>{{ $value }}</span>
                                                            </li>
                                                            @endif
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @if (count($product_color_all) == 1 && $product_color_all[0] == '')
                                            <ul id="productColor" style="display: none">
                                            </ul>
                                            @else
                                            <!-- end col  -->
                                            <div class="col-lg-6 col-sm-12">
                                                <div class="color-select-innr">
                                                    <h6 class="product-title">color</h6>
                                                    <div class="color-selector inline">
                                                        <div class="product-color-list d-flex col-lg-2 w-100 flex-wrap"
                                                            id="productColor">
                                                            @foreach($product_color_all as $key => $value)
                                                            <div class="">
                                                                <p eia-value={{$value}} class="color-family"
                                                                    onclick="colorModalOnClick(this, 'productColor')">
                                                                    {{$value}}</p>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                        <p class="prdDesT">Product Description</p>
                                        <p class="mb-3">{!! $product->product_descp !!}</p>
                                        <p class="prdDesT">Unit:{{ $product->unit }}</p>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                @if(count($reviews) == 0)
                                                <div id="pvm-rating" class="modal-rating rr">
                                                    <span><i class="fas fa-star"></i></span>
                                                    <span><i class="fas fa-star"></i></span>
                                                    <span><i class="fas fa-star"></i></span>
                                                    <span><i class="fas fa-star"></i></span>
                                                    <span><i class="fas fa-star"></i></span>
                                                </div>
                                                @else
                                                @php
                                                $rating = 0;
                                                @endphp
                                                @foreach ($reviews as $review )
                                                <div id="pvm-rating" class="modal-rating">
                                                    @php
                                                    $rating = $rating+((intval($review->quality) +
                                                    intval($review->price) + intval($review->value)) / 3);
                                                    @endphp
                                                    @endforeach
                                                    @php
                                                    $rating = $rating/count($reviews);
                                                    $rating_blank = 5 - floor($rating);
                                                    @endphp
                                                    <ul class="rating">
                                                        @for ($i = 1; $i <= $rating; $i++) <li><i
                                                                class="fa-solid fa-star"></i></li>
                                                            @endfor
                                                            @for ($i = 1; $i <= $rating_blank; $i++) <li><i
                                                                    class="fa-solid fa-star"
                                                                    style="color: #c2c2c2!important"></i></li>
                                                                @endfor
                                                    </ul>
                                                </div>
                                                @endif
                                            </div>
                                            {{-- <div>
                                                <p>{{ $product->unit }}</p>
                                            </div> --}}
                                        </div>
                                        <?php
                                            $productName = strval("'" . $product->product_name . "'");
                                            ?>

                                        <div class="product-buttons">
                                            <a style="background-color: #481c69;" href="javascript:void(0)"
                                                id="cartEffect"
                                                onclick="addToCartProductDetails({{ $product->id }}, <?php echo $productName; ?>)"
                                                class="btn btn-primary-filled tooltip-top py-1"
                                                data-tippy-content="Add to cart">
                                                <i class="fa fa-shopping-cart" style="margin: 6px 0;"></i>
                                                Add to Bag
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--===================> image zoom container end <======================-->

                            <!--===================> Review container start <======================-->
                            <section style="overflow: auto;" class="mb-5">
                                <div class="custom-container profile mt-3 px-0">
                                    <div class="d-md-flex align-items-start px-md-5 px-3 ">
                                        <div class="">

                                            <div class="nav nav-pills me-3  d-flex flex-md-column flex-wrap "
                                                id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <!-- ---------------------- Side Buttons -------------------------- -->
                                                <button class="btn prod-btn active"
                                                    style="background-color: #481c69; font-color:white;"
                                                    id="v-pills-my-account-tab" data-bs-toggle="pill"
                                                    data-bs-target="#v-pills-my-account" type="button" role="tab"
                                                    aria-controls="v-pills-my-account"
                                                    aria-selected="true">Description</button>
                                                <button class="btn prod-btn"
                                                    style="background-color: #481c69; font-color:white;"
                                                    data-bs-toggle="pill" data-bs-target="#v-pills-update-profile"
                                                    type="button" role="tab" aria-controls="v-pills-my-account"
                                                    aria-selected="true">Review</button>
                                            </div>
                                        </div>
                                        <div class="tab-content  tab-contents flex-grow-1" id="v-pills-tabContent">

                                            <!-- --------------------------Update Profile ---------------------------- -->
                                            <div class="tab-pane fade show active" id="v-pills-my-account"
                                                role="tabpanel" aria-labelledby="v-pills-my-account-tab">
                                                <div class="my-account">
                                                    <div class=" tab-content prod1" id="pills-tabContent">
                                                        <div class="tab-pane fade show active" id="pills-detail"
                                                            role="tabpanel" aria-labelledby="pills-detail-tab">
                                                            <div class="product-detail-video">
                                                                <div class="product-detail-title">
                                                                    <p>{!! $product->product_descp !!}</p>
                                                                </div>
                                                                <div class="product-detail-video-link mt-5 d-flex justify-content-center align-items-center">
                                                                    <div class="video-link-iocon" >
                                                                    <iframe 
                                                                    src="{{ asset($product->video_link) }}" style="height: 360px !important;width: 640px !important;"><i class="fab fa-youtube"></i>
                                                                    </iframe>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <!-- --------------------------Update Profile ---------------------------- -->
                                            <div class="tab-pane fade" id="v-pills-update-profile" role="tabpanel"
                                                aria-labelledby="v-pills-my-account-tab">

                                                <form method="POST" action="/product/review/{{ $product->id }}">
                                                    @csrf
                                                    <h5 class="mb-2">Customer Reviews</h5>
                                                    <div class="client-reviews">
                                                        @foreach ($reviews as $review )
                                                        <div class="client-review d-flex w-100 mt-2">
                                                            <div>
                                                                <img src="../../frontend/assets/images/user/1.png"
                                                                    alt="" srcset="">
                                                            </div>
                                                            <div class="flex-grow-1 ms-2">
                                                                <div class="w-100">
                                                                    <div class="d-flex justify-content-between">
                                                                        <h6>{{optional($review->user)->name}}</h6>
                                                                        @php
                                                                        $rating = (intval($review->quality) +
                                                                        intval($review->price) +
                                                                        intval($review->value)) / 3;
                                                                        $rating_blank = 5 - floor($rating);
                                                                        @endphp
                                                                        <ul class="rating">
                                                                            @for ($i = 1; $i <= $rating; $i++) <li><i
                                                                                    class="fa-solid fa-star"></i>
                                                                                </li>
                                                                                @endfor
                                                                                @for ($i = 1; $i <= $rating_blank; $i++)
                                                                                    <li><i class="fa-solid fa-star"
                                                                                        style="color: #c2c2c2!important"></i>
                                                                                    </li>
                                                                                    @endfor
                                                                        </ul>
                                                                    </div>
                                                                    <p>{{$review->review}} </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>

                                                    <div class="submit-review mt-4 mb-3">
                                                        <h4 class="mb-3">Write Your Own review</h4>
                                                        <input type="hidden" name="product_id" value={{ $product->id }}>
                                                        <div class="review-table">
                                                            <div class="row review-table-header">
                                                                <div class="col-2"></div>
                                                                <div class="col-2">1 Star</div>
                                                                <div class="col-2">2 Star</div>
                                                                <div class="col-2">3 Star</div>
                                                                <div class="col-2">4 Star</div>
                                                                <div class="col-2">5 Star</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-2">Quality</div>
                                                                <div class="col-2">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="quality" value="1">
                                                                </div>
                                                                <div class="col-2">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="quality" value="2">
                                                                </div>
                                                                <div class="col-2">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="quality" value="3">
                                                                </div>
                                                                <div class="col-2">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="quality" value="4">
                                                                </div>
                                                                <div class="col-2">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="quality" value="5">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-2">Price</div>
                                                                <div class="col-2">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="price" value="1">
                                                                </div>
                                                                <div class="col-2">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="price" value="2">
                                                                </div>
                                                                <div class="col-2">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="price" value="3">
                                                                </div>
                                                                <div class="col-2">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="price" value="4">
                                                                </div>
                                                                <div class="col-2">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="price" value="5">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-2">Value</div>
                                                                <div class="col-2">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="value" value="1">
                                                                </div>
                                                                <div class="col-2">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="value" value="2">
                                                                </div>
                                                                <div class="col-2">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="value" value="3">
                                                                </div>
                                                                <div class="col-2">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="value" value="4">
                                                                </div>
                                                                <div class="col-2">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="value" value="5">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div>
                                                        <div class="row">

                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Review <span
                                                                            class="text-danger">*</span></label>
                                                                    <textarea class="form-control" rows="5"
                                                                        name="review"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="submit-button">
                                                                <button
                                                                    style="background-color: #481c69; font-color:white;"
                                                                    class="review-btn" type="submit">SUBMIT
                                                                    REVIEW</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                        <!-- end row  -->
                                    </div>
                            </section>
                            <!--===================> Review container end <======================-->
                            <!--===================> Add Recommended Product  start <======================-->
                        </div>
                        <div class="col-lg-4 ">
                            <div class="recommended_prd_wrapper mb-3">
                                <div>
                                    <div class="rcmnd_title">
                                        <h1>Recommendes For You</h1>
                                    </div>
                                    <div class="rcmnd_card_container">
                                        @foreach ($recomndedProduct->take(5) as $rcmdProduct)
                                        <div class="rcmnd_card">
                                            <div class="d-flex">
                                                <div class="col-lg-6 p-3">
                                                    <div class="image">
                                                        <img class="img-fluid"
                                                            src="{{ asset($rcmdProduct->product_thambnail) }}" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="content_part">
                                                        <div class="sale mb-2">
                                                            <p>Sale</p>
                                                        </div>
                                                        <h4 class="recommended-title" style="font-color:#481c69 !important;">{{
                                                            $rcmdProduct->product_name
                                                            }}
                                                        </h4>
                                                        <div class="recommended-desc">
                                                            <p>{!! $rcmdProduct->product_descp !!}</p>
                                                        </div>
                                                        
                                                        <div class="prc_info">
                                                            @if($rcmdProduct->discount_price==0)
                                                            <p class="ps-3" style="color: #471C6B;">৳{{
                                                                intval($rcmdProduct->selling_price) }}</p>
                                                            @else
                                                            <p class="text-danger"><del>{{ intval($rcmdProduct->discount_price)
                                                                    }}</del></p>
                                                            <p class="ps-3" style="color: #471C6B;"> ৳ {{
                                                                intval($rcmdProduct->selling_price) }}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <button class="shopNowBtn">
                                                        <a
                                                            href="{{ url('/cosmetic/product/detail/'.$rcmdProduct->category->category_slug_name.'/'.$rcmdProduct->subcategory->sub_category_slug_name.'/'.$rcmdProduct->product_slug_name) }}">
                                                            Shop Now</a></button>
                                                </div>
                                            </div>

                                            <div class="buttonGroups">
                                                {{-- <div class="col-lg-6">
                                                    <div class="increaseDecrease">
                                                        <button onclick="quickViewQunatityIncr(event)"><i
                                                                class="fas fa-plus"></i></button>
                                                        <input type="text" value="1" readonly>
                                                        <button onclick="quickViewQunatityDec(event)"><i
                                                                class="fas fa-minus"></i></button>
                                                    </div>
                                                </div> --}}
                                                {{-- <div class="col-lg-6">
                                                    <button class="shopNowBtn">
                                                        <a
                                                            href="{{ url('/cosmetic/product/detail/'.$rcmdProduct->category->category_slug_name.'/'.$rcmdProduct->subcategory->sub_category_slug_name.'/'.$rcmdProduct->product_slug_name) }}">
                                                            Shop Now</a></button>
                                                </div> --}}
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--===================> Add Recommended Product  end <======================-->
                    </div>
                </div>

            </div>
        </div>



    </section>
    <!-- Section End -->

</main>

@endsection



@section('scripts')




@endsection
