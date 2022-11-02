@extends('frontend.main_master')
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
                                    class="category-toggle-btn text-light"><i class="fa fa-bars"></i></a>
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
</div>


<div id="sidemenu-container" class="sidemenu-container hide-menu">
    <ul id="category-toggle-custom-sidemenu" class="category-sidemenu">

        @php
        $special_offer = App\Models\Product::where('special_offer','1')->where('ecom_name','1')->count();
        $coupons = App\Models\Coupon::where('status','1')->orderBy('id', 'DESC')->count();
        @endphp
       
        <li class="menu-heading">
            <a href="{{ url('/special/offer') }}"><span class="text">Special Offers</span> <span class="number">{{
                    $special_offer }}</span></a>
          
        </li>

        @php
        $currentUrl = Request::segment(1);
        // dd($currentUrl);
        $categories=App\Models\Category::with(['subcategory'=>function($q){
            $q->where('status',1);
        }])->where('status',1)->where('ecom_id','1')->get();
       
        @endphp
        <li class="mb-1 mt-3">
            <div class="collapse">               
                {{-- for category --}}
                @foreach ($categories as $category)
                <li class="mb-1 mt-2">
                    {{-- vvvvvv --}}
                    @if(Request::segment(2) != $category->category_slug_name)
                    <a href="{{ url('/bs/'. $category->category_slug_name) }}">                      
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
                                $subcategories=App\Models\SubCategory::with('category')->where('category_id',$category->id)->get();                             
                                @endphp
                                @foreach ($subcategories as $subcategory)
                                <li>

                                    @if(collect(request()->segments())->last() != $subcategory->sub_category_slug_name)
                                    <a
                                        href="{{ url('/bs/' . $subcategory->category->category_slug_name .'/'. $subcategory->sub_category_slug_name) }}">
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
                                            <li><a href="{{ url('/bs/'.$subsubcategory->category->category_slug_name.'/'. $subsubcategory->subcategory->sub_category_slug_name.'/'. $subsubcategory->subsubcategory_slug_name) }}"
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


    <style>
        .search-container {
            margin-bottom: 0 !important;
        }
        .custom-header-ecom-title{
            margin-top: 122px;
        }
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
        .pro-group ul
        {
            list-style: circle !important;
        }
        
        .pro-group ul li
        {
            display:block;
            font-weight:700;
            
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

        .product-amount-innt h6 {
            margin-right: 5px;
            color: red;
            font-weight: bold;
            font-size: 20px;
        }

        .product-amount-innt del {
            margin-right: 5px;
            color: #c2c2c2;
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 20px;
        }

        .product-amount-innt .like,
        .mes {
            text-align: center;
            margin-right: 5px;
            background: #c2c2c2;
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
            background-color: #ffd06b;
            color: white
        }

        .section-big-pt-space {
            padding-top: 0px;
        }

        .section-big-pt-space .product-img-innr {
            background: #ffff;
            padding: 10px;
            border: 1px solid #c2c2c2;
            margin-bottom: 30px;
        }

        .section-big-pt-space .product-slider-img-innr {
            margin: 30px 0;
        }

        .section-big-pt-space .product-slider-img-innr a {
            margin: 30px 0;
            border: 1px solid #c2c2c2;
            padding: 40px 15px;
        }

        .prod-btn {
            padding: 8px 30px;
            font-weight: bold;
            font-size: 18px;
            line-height: 29px;
            color: #1d1f1f;
            text-align: start;
            border-bottom: 1px solid #c2c2c2;
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
            border: 1px solid #c2c2c2;
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
        .price-section{
            margin-right: 150px;
        }
        .price{
            font-size: 28px;
            color: green;
            font-weight: bold;
        }
        .price del{
            font-size: 20px;
            color: red;
            font-weight: bold;
        }
        .product-right .pro-group .product-choose-innr{
            padding-top: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #dddddd;
        }
        .product-details-quantity{
            padding-top: 32px;
        }
        .submit-button{
            text-align: end;
        }
        .review-btn{
            background-color: var(--primary);
            border: 1px solid var(--primary);
            color: white;
            width: 200px;
            height: 42px;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
        }
        .xzoom-gallery5{
            padding: 14px 0 !important;
        }
        
        .category-breadcrumb-product , .size-list, .material li{
            list-style: none;
        }
        .shuvo ul li{
            display: list-item;
        }
        
        @media only screen and (max-width: 600px) {
           .custom-header-ecom-title{
               margin-top: 108px!important;
           }
        }
    </style>
    
    
    <main>
        <!-- sidebar mobile menu & sidebar cart - start
       ================================================== -->
     
        <!-- sidebar mobile menu & sidebar cart - end
       ================================================== -->
        <section class="main-content category-closed" id="main-content">
            <div class="container-fluid profile px-md-5 px-3 mt-3">

                <!-- breadcrumb start -->
                <div class="breadcrumb-main">
                    <ul class="category-breadcrumb-product">
                        <li class="breadcrumb-item"><a href="{{ url('/islamic') }}">Home</a></li>
                        
                      
                        @if($product->category()->exists())
                            <li><i class="fas fa-angle-right"></i></li>
                            <li class="breadcrumb-item"><a href="{{ url('/bs') .'/'. optional($product->category)->category_slug_name}}">{{optional($product->category)->category_name}} </a></li>
                        @endif
                        @if($product->subcategory()->exists())
                            <li><i class="fas fa-angle-right"></i></li>
                            <li class="breadcrumb-item"><a href="{{ url('/bs') .'/'. optional($product->category)->category_slug_name.'/'. optional($product->subcategory)->sub_category_slug_name}}">{{optional($product->subcategory)->sub_category_name}} </a></li>
                        @endif
                        @if($product->subsubcategory()->exists())
                            <li><i class="fas fa-angle-right"></i></li>
                            <li class="breadcrumb-item"><a href="{{ url('/bs') .'/'. optional($product->category)->category_slug_name.'/'. optional($product->subcategory)->sub_category_slug_name.'/'. optional($product->subsubcategory)->sub_category_slug_name}}">{{optional($product->subsubcategory)->subsubcategory_slug_name}} </a></li>
                        @endif
                    </ul>
                </div>
                <!-- breadcrumb End -->

                <!-- section start -->
                <section class="section-big-pt-space container-fluid b-g-light">
                    <div class="collection-wrapper">
                        <div class="custom-container">
                            <div class="row">

                                <div class="col-lg-4 p-lg-4 p-1 d-flex justify-content-center">
                                    <div class="xzoom-container">
                                        <div class="product-img-innr">
                                            <img class="xzoom5 img-fluid " id="xzoom-default"
                                                src="{{ asset($product->product_thambnail) }} "
                                                xoriginal="{{ asset($product->product_thambnail) }}" />
                                        </div>
                                        <!-- end product-img-innr  -->
                                        <div class="xzoom-thumbs product-slider-img-innr">
                                            @foreach ($multiimgs as $img)
                                                <a href="{{ asset($img->photo_name) }}"><img class="xzoom-gallery5"
                                                        width="80" src="{{ asset($img->photo_name) }}" title=""></a>
                                            @endforeach
                                        </div>
                                    </div>
                                 
                                </div>

                                <div class="col-lg-8 rtl-text px-lg-5 px-2 py-4 pt-0">
                                    <div class="product-right">
                                        <div class="pro-group">
                                            <h2 class="mt-0">{{ $product->product_name }}</h2> 
                                            <ul class="material">
                                                <li class="price-section">
                                                    @if($product->discount_price == 0)
                                                         <p class="price" style="color:black;font-size:20px"> &#2547;{{ intval($product->selling_price)}}</del></p>
                                                    @else
                                                         <p class="price" >&#2547;{{ intval($product->discount_price) }} <del>&#2547;{{ intval($product->selling_price)}}</del></p>
                                                    @endif
                                                    <h4 style="color:black"> Product Code:<span style="color:#ffa800";> {{ ($product->product_code) }}</span> </h4>
                                                </li>
                                           
                                                @if ($product->product_qty > 0)
                                                    <li><span class="material-span">Stock:</span> <span
                                                            class="in-stock color"> Available</span></li>
                                                @else
                                                    <li><span class="material-span">Stock:</span> <span
                                                            class="in-stock">Stock Out</span></li>
                                                @endif
                                            </ul>
                                            
                                               @if(count($reviews) == 0)
                                                <div id="pvm-rating" class="modal-rating">
                                                    <span><i class="fas fa-star"></i></span>
                                                    <span><i class="fas fa-star"></i></span>
                                                    <span><i class="fas fa-star"></i></span>
                                                    <span><i class="fas fa-star"></i></span>
                                                    <span><i class="fas fa-star"></i></span>
                                                    <span>(0 Reviews)</span>
                                                </div>
                                            @else
                                                @php
                                                $rating = 0;
                                                @endphp
                                                @foreach ($reviews as $review )                                            
                                                <div id="pvm-rating" class="modal-rating">
                                                @php
                                                    $rating = $rating+((intval($review->quality) + intval($review->price) + intval($review->value)) / 3);                                                    
                                                @endphp 
                                                @endforeach
                                                    @php
                                                        $rating = $rating/count($reviews);
                                                        $rating_blank = 5 - floor($rating);
                                                      
                                                    @endphp                                                           
                                                    <ul class="rating" style="display: flex;">
                                                        @for ($i = 1; $i <= $rating; $i++)
                                                            <li><i class="fa-solid fa-star" style="color: #ef8341!important;"></i></li>
                                                        @endfor                                                                   
                                                        @for ($i = 1; $i <= $rating_blank; $i++)
                                                            <li><i class="fa-solid fa-star" style="color: #c2c2c2!important"></i></li>
                                                            
                                                        @endfor 
                                                        <span> ({{$rating}}) Reviews</span>                                                                  
                                                    </ul>
                                                    {{-- <span>(10 Reviews)</span> --}}
                                                </div>
                                            @endif 
                                            <!-- end product-amount-innt  -->
                                            
                                             <div class="shuvo">
                                             {!!($product->product_descp)!!}
                                            </div>
                                               
                                                
                                                
                                        </div>
                                        <div id="selectSize"
                                            class="pro-group addeffect-section product-description border-product mb-0">
                                            <div class="modal fade" id="sizemodal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Sheer Straight
                                                                Kurta</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body"><img src="" alt=""
                                                                class="img-fluid "></div>
                                                    </div>
                                                </div>
                                            </div>
                                           <div class="row product-choose-innr">
                                               
                                               
                                                @if (count($product_size_all) == 1 && $product_size_all[0] == null)
                                                    <ul id="productSize" style="display: none">

                                                    </ul>
                                                @else
                                                    <div class="col-lg-6 col-sm-12">
                                                        <div class="error-mes-innr">
                                                            <h6 class="product-title">SIZE</h6>
                                                            <div class="size-box">
                                                                <ul id="productSize" style="display: flex;">
                                                                    @foreach ($product_size_all as $key => $value)
                                                                   
                                                                        @if ($key == 0)
                                                                          @if($value=='null')
                                                                          <p class="text-danger">Product size is not available</p>
                                                                          @else
                                                                          <li class="productSize-inner" eia-value="{{ $value }}">
                                                                                <span>{{ $value }}</span>
                                                                            </li>
                                                                          @endif
                                                                            
                                                                        @else
                                                                         @if($value=='null')
                                                                         @else
                                                                         <li class="productSize-inner" eia-value="{{ $value }}">
                                                                                <span>{{ $value }}</span>
                                                                            </li>
                                                                         @endif
                                                                            
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
                                                                <div class="product-color-list d-flex col-lg-2 w-100 flex-wrap" id="productColor">
                                                                    @foreach($product_color_all as $key => $value)
                                                                    
                                                                    @if($value=='null')
                                                                    <p class="text-danger">Product color is not available</p>
                                                                    @else
                                                                     <div class="">
                                                                        <p eia-value={{$value}} class="color-family" onclick="colorModalOnClick(this, 'productColor')">{{$value}}</p>
                                                                    </div>
                                                                    @endif
                                                                   
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif                                               
                                                
                                            </div>

                                             <div class="row product-details-quantity mb-3">

                                                <div class="col-sm-12 col-md-6">
                                                    <div class="d-flex justify-content-evenly align-items-center">
                                                        <h6 class="product-title pt-3">QTY:</h6>
                                                <div class="product-quantity-inner mt-2">
                                                   
                                                            
                                                              <button onclick="quickViewQunatityDec(event)"><i
                                                            class="fas fa-minus"></i></button>
                                                    <input id="productQuantity" readonly type="text" value="1">
                                                   <button onclick="quickViewQunatityIncr(event,{{ $product->product_qty }})"><i
                                                            class="fas fa-plus"></i></button>
                                                </div>

                                                <?php
                                                $productName = strval("'" . $product->product_qty . "'"); ?>

                                                <div class="product-buttons mt-2" >
                                                 
                                                    <a href="javascript:void(0)"  id="cartEffect"
                                                        onclick="addToCartProductDetails({{ $product->id }},{{ $product->product_qty }}, <?php echo $productName; ?>)"
                                                        class="btn btn-primary-filled py-2">
                                                        <i class="fa fa-shopping-cart"></i>
                                                        Add to Cart
                                                    </a>
                                                    
                                                </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="d-flex justify-content-center align-items-center">
                                                    <h6 class="product-title text-uppercase my-2">shares</h6>
                                                    <ul class="d-flex justify-content-evenly align-items-center">
                                                        <li style="font-size: 30px; margin: 9px;">
       
                                                            <div> <a href="https://www.facebook.com/sharer/sharer.php?u={{route('ProductDetailsFashion',[$product->category_id,$product->sub_category_id,$product->product_slug_name ] )}}&display=popup" rel="noopener noreferrer" target="_blank"> 
                                                            <i style="color:#4267B2" class="fa-brands fa-facebook"></i> </a>
                                                            </div>
                                                        </li>
                                                        <li style="font-size: 30px; margin: 9px;"><a href="https://www.facebook.com/sharer/sharer.php?u={{route('ProductDetailsFashion',[$product->category_id,$product->sub_category_id,$product->product_slug_name ] )}}&display=popup" rel="noopener noreferrer" target="_blank">
                                                            <i style="color:#006AFF" class="fa-brands fa-facebook-messenger"></i></a></li>
                                                        <li style="font-size: 30px; margin: 9px;">
                                                            <a target="_blank" href="https://api.WhatsApp.com/send?phone=+8801911655303&text=Hello ! " class="whatsapp"><i class="fab fa-whatsapp"></i></a>
                                                            
                                                            </li>
                                                            
                                                        <li style="font-size: 30px; margin: 9px;"><a href="http://twitter.com/share?text=text goes here&url=http://{{route('ProductDetailsFashion',[$product->category_id,$product->sub_category_id,$product->product_slug_name ] )}} goes here&hashtags=hashtag1,hashtag2,hashtag3" rel="noopener noreferrer" target="_blank">
                                                            <i style="color:#00acee" class="fa-brands fa-twitter"></i></a></li>
                                                    </ul>
                                                    </div>
                                                </div>
                                            </div>

                                      
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Section ends -->
                <!-- start Product-details -->

                <section style="overflow: auto;" class="mb-5">
                    <div class="custom-container profile mt-3 px-0">
                        <div class="d-md-flex align-items-start px-md-5 px-3 ">
                            <div class="">

                                <div class="nav nav-pills me-3  d-flex flex-md-column flex-wrap " id="v-pills-tab"
                                    role="tablist" aria-orientation="vertical">
                                    <!-- ---------------------- Side Buttons -------------------------- -->
                                    <button class="btn prod-btn active" id="v-pills-my-account-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-my-account" type="button" role="tab"
                                        aria-controls="v-pills-my-account" aria-selected="true">Description</button>
                                    <button class="btn prod-btn" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-update-profile" type="button" role="tab"
                                        aria-controls="v-pills-my-account" aria-selected="true">Review</button>
                                </div>
                            </div>
                            <div class="tab-content  tab-contents flex-grow-1" id="v-pills-tabContent">

                                <!-- --------------------------Update Profile ---------------------------- -->
                                <div class="tab-pane fade show active" id="v-pills-my-account" role="tabpanel"
                                    aria-labelledby="v-pills-my-account-tab">
                                    <div class="my-account">
                                        <div class=" tab-content prod1" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-detail" role="tabpanel"
                                                aria-labelledby="pills-detail-tab">
                                                <div class="product-detail-video">
                                                    <div class="product-detail-title">
                                                        
                                                    
                                                     <div class="shuvo">
                                                             {!!($product->long_info)!!} 
                                                            </div>
                                                    
                                                    
                                                    
                                                </div>
                                                    <div class="product-detail-video-link mt-5 d-flex justify-content-center align-items-center">
                                                        
                                                        
                                                        @if($product->video_link == null )
                                                        
                                                        @else
                                                        
                                                         <div class="video-link-iocon">
                                                                <iframe 
                                                                src="{{ asset($product->video_link) }}"><i class="fab fa-youtube"></i>
                                                                </iframe>
                                                        </div>
                                                        
                                                        @endif
                                                        
                                                        

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
                                                        <img src="../../frontend/assets/images/user/1.png" alt="" srcset="">
                                                    </div>
                                                    <div class="flex-grow-1 ms-2">
                                                        <div class="w-100">
                                                            <div class="d-flex justify-content-between">
                                                                @php
                                                                    $rating = (intval($review->quality) + intval($review->price) + intval($review->value)) / 3; 
                                                                    $rating_blank = 5 - floor($rating);
                                                                @endphp                                                             
                                                                <ul class="rating">
                                                                    @for ($i = 1; $i <= $rating; $i++)
                                                                        <li><i class="fa-solid fa-star"></i></li>
                                                                    @endfor                                                                   
                                                                    @for ($i = 1; $i <= $rating_blank; $i++)
                                                                        <li><i class="fa-solid fa-star" style="color: #c2c2c2!important"></i></li>
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
                                                        <input class="form-check-input"
                                                            type="radio" name="quality" value="1">
                                                    </div>
                                                    <div class="col-2">
                                                        <input class="form-check-input"
                                                            type="radio" name="quality" value="2">
                                                    </div>
                                                    <div class="col-2">
                                                        <input class="form-check-input"
                                                            type="radio" name="quality" value="3">
                                                    </div>
                                                    <div class="col-2">
                                                        <input class="form-check-input"
                                                            type="radio" name="quality" value="4">
                                                    </div>
                                                    <div class="col-2">
                                                        <input class="form-check-input"
                                                            type="radio" name="quality" value="5">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-2">Price</div>
                                                    <div class="col-2">
                                                        <input class="form-check-input"
                                                            type="radio" name="price" value="1">
                                                    </div>
                                                    <div class="col-2">
                                                        <input class="form-check-input"
                                                            type="radio" name="price" value="2">
                                                    </div>
                                                    <div class="col-2">
                                                        <input class="form-check-input"
                                                            type="radio" name="price" value="3">
                                                    </div>
                                                    <div class="col-2">
                                                        <input class="form-check-input"
                                                            type="radio" name="price" value="4">
                                                    </div>
                                                    <div class="col-2">
                                                        <input class="form-check-input"
                                                            type="radio" name="price" value="5">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-2">Value</div>
                                                    <div class="col-2">
                                                        <input class="form-check-input"
                                                            type="radio" name="value" value="1">
                                                    </div>
                                                    <div class="col-2">
                                                        <input class="form-check-input"
                                                            type="radio" name="value" value="2">
                                                    </div>
                                                    <div class="col-2">
                                                        <input class="form-check-input"
                                                            type="radio" name="value" value="3">
                                                    </div>
                                                    <div class="col-2">
                                                        <input class="form-check-input"
                                                            type="radio" name="value" value="4">
                                                    </div>
                                                    <div class="col-2">
                                                        <input class="form-check-input"
                                                            type="radio" name="value" value="5">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div>
                                            <div class="row">
                                               
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Review <span class="text-danger">*</span></label>
                                                        <textarea class="form-control" rows="5" name="review"></textarea>
                                                    </div>
                                                </div>
                                                <div class="submit-button text-center text-lg-start">
                                                    <button class="review-btn" type="submit">SUBMIT REVIEW</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <!-- end row  -->
                        </div>
                </section>
                <!-- End start Product-details  -->
            </div>
        </section>
    </main>
@endsection

@section('scripts')

<script>
    var productQuantity = {{$product->product_qty}};
    alert(productQuantity);
    var $grid = $('.product-main-content-inner').isotope({
        // options
    });
    // filter items on button click
    $('.product-content-menu').on('click', 'a', function() {
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({
            filter: filterValue
        });
    });
</script>





@endsection

