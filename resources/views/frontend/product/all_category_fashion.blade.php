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
        
        
        element.style {
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
    
    @media only screen and (max-width: 600px) {
        .hot-deal-section,
        .gallery,
        .best-selling-product-section,
        .category-headers,
        .category-sections,
        .sale-product-section-title,
        .daily-best-sale-product,
        .offer-section
        {
            display: none!important;
        }
        
        .fashion-pro-cate{
            display:flex;
            
            flex-wrap: wrap;
            justify-content: center;
         
            
        }
        .fashion-brand{
           
            display: grid;
           grid-template-columns: 50% 50%;
  
        }
        .fashion-brand-child{
           flex-grow: 1;
        }
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
            <a href="{{ url('/special/grocery/offer') }}"><span class="text">Special Offers</span> <span class="number">{{
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
            <!--rounded category start-->
            <div class="section-title-no-bg px-md-5 px-3 fashion-pro-category">
                <h4 class="pt-4 text-center cate-heading pro-heading">Our Product Categories</h4>
            </div>
            <section class="featured-category mt-3 px-md-5 px-3 mb-5">
                <div class="container-fluid px-2 px-lg-5">
                    <div class="row">
                            @foreach ($categories as $category)
                        <div class="col-lg-2 col-md-3 col-4 mt-3">
                                    <div>
                                        <a href="{{ url('/fabs/' . $category->category_slug_name) }}">
                                            <div class="featured-category-item text-center">
                                                <div class="d-flex justify-content-center fash-pro-cate-img">
                                                    <img src="{{ asset($category->category_image) }}" alt="">
                                                </div>
                                                <div class="featured-category-item-header">
                                                    <h6 class="fw-bold mt-3">{{ $category->category_name }}</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                        </div>
                         @endforeach
                    </div>      
                    </div>
            </section>
            <!--rounded category end-->
        </section>
    </main>

@endsection

