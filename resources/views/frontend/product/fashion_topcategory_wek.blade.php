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
        
         .gallery-item-inner{
        height: 412px!important;
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
            width:100px;
            height:100px;
        
        }
        }
        
        .fashion-home .product-gallery-wrap{
            height:100%;
        }
        
        .fashion-home .product-gallery-inner h4 {
            height:40px;
            margin-bottom:10px;
        }

    .fashion-home .hot-deal-price span{
    color: #222;
    }

    .gallery-card-heading h4{
    height:30px;
    }

    .fashion-home .media-body-innr{
    height:30px;
    margin-bottom:10px;

    }

    .product-gallery-inner
    {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .fashion-btn-holder .fashion-btn{
        background: var(--primary);
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

    .product_new_add h4{
        margin-bottom: 15px;
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
    
    
    <main>
        <section class="main-content" id="main-content">
            <div class="container-fluid px-md-3 px-3 fashion-home">
                       <section class="popular-products">
                        <div class="product-gallery-wrapper  portfolio-section grid-portfolio ratio2_3 portfolio-padding ">
                        <h3 class="mt-5 text-center"style="color:black" >{{$header}}</h3>
                            <div class="gallery px-lg-5 pt-lg-4 pb-lg-3 px-3 py-3">
                                <div class="ec-card-group row justify-content-center" id="products-cont">
                                    @foreach ($products as $subsubcat)
                                        
                                        @if($subsubcat->product_qty == 0)
                                           <div class="card gallery-item woman">
                                        <div class="gallery-item-inner woman">
                                             <a id="fashion_details_link" >
                                            <img src="{{asset($subsubcat->product_thambnail ) }}" alt="" class="product-img">
                                            </a>
                                            <div class=" card-body">
                                                 <a  id="fashion_details_link" ><h4 style="color:black">{{ $subsubcat->product_name }}</h4></a>
                                                
                                               <!-- Selling and Discount Price Start -->
                                                        @if ($subsubcat->discount_price == 0)
                                                        <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                                            {{ intval($subsubcat->selling_price) }} </h4>
                                                        @else
                                                        <h4>
                                                            <span style="color:black"> <span style="font-size:15px">৳</span>
                                                                {{ intval($subsubcat->discount_price) }}</span>
                                                            <span><s class="text-danger"><span style="font-size:15px">৳</span>
                                                                    {{ intval($subsubcat->selling_price) }}</s></span>
                                                        </h4>
                                                        @endif
                                                        <!-- Selling and Discount Price End -->
                                                        
                                                        
                                                     <!--over lay-->
                                                     <div id="overlay_background">
                                                      <div class="text-light" style="font-size:30px;margin-top:100px;text-align:center">Stock <br> Out  </div>
                                                   </div>
                                                   <!--end overlay-->
                                                                         
                                                <div class="fashion-btn-holder">
                                                     <a class="fashion-btn" style="font-size:14px !important;padding: 7px 14px; pointer-events: none; background-color: #6c757d" 
                                                     id="fashion_details_link" class="cart-btn"><i class="fas fa-shopping-cart"> </i> Out of Stock</a>
                                                </div>
                                                
                                                
                                            </div>
    
                                        </div>
                                        </div>
                                        @else
                                           <div class="card gallery-item woman">
                                        <div class="gallery-item-inner woman">
                                             <a href="{{route('ProductDetailsFashion',[$subsubcat->category_id,$subsubcat->sub_category_id,$subsubcat->product_slug_name ] )}}" id="fashion_details_link" >
                                            <img src="{{asset($subsubcat->product_thambnail ) }}" alt="" class="product-img">
                                            </a>
                                            <div class=" card-body">
                                                 <a href="{{route('ProductDetailsFashion',[$subsubcat->category_id,$subsubcat->sub_category_id,$subsubcat->product_slug_name ] )}}" id="fashion_details_link" ><h4 style="color:black">{{ $subsubcat->product_name }}</h4></a>
                                                
                                               <!-- Selling and Discount Price Start -->
                                                        @if ($subsubcat->discount_price == 0)
                                                        <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                                            {{ intval($subsubcat->selling_price) }} </h4>
                                                        @else
                                                        <h4>
                                                            <span style="color:black"> <span style="font-size:15px">৳</span>
                                                                {{ intval($subsubcat->discount_price) }}</span>
                                                            <span><s class="text-danger"><span style="font-size:15px">৳</span>
                                                                    {{ intval($subsubcat->selling_price) }}</s></span>
                                                        </h4>
                                                        @endif
                                                        <!-- Selling and Discount Price End -->
                                                 <div class="fashion-btn-holder">
                                            <a class="fashion-btn" href="{{route('ProductDetailsFashion',[$subsubcat->category_id,$subsubcat->sub_category_id,$subsubcat->product_slug_name ] )}}" 
                                            id="fashion_details_link" class="cart-btn"><i class="fas fa-shopping-cart"></i> Shop Now</a>
                                                </div>
                                            </div>
    
                                        </div>
                                        </div>
                                        @endif
                                        
                                    @endforeach
                                </div>
                              <div class="loading_img_section d-block text-center" style="display: none"><img  src="https://i.gifer.com/4V0b.gif" alt="Bppshops" ></div>
                            </div>
                        </div>
                    </section>   
                        </div>
                </div>
        </section>

    </main>
@endsection

@section('script')
<script>
    function loadMoreData(page){
           $.ajax({
               url:'?page='+page,
               type:'get',
               beforeSend:function(){
                   $('.loading_img_section').show();
               }
           })
           .done(function(response){
                // console.log(response);
            
               if(response.data.length == 0){
                   $('.loading_img_section').html('');
                   return;
               }

               $('.loading_img_section').hide();
               var loadData='';
               $.each(response.data,function(index,value){
                   console.log(value)
                loadData+= `
                 ${value.product_qty < 1 ?
                 `
                 <div class="card gallery-item woman">
                            <div class="gallery-item-inner woman">
                               <a id="fashion_details_link">
                                            <img src="/${value.product_thambnail}" alt="" class="product-img">
                                            </a>
                                <div class=" card-body">
                                      <a  id="fashion_details_link" > <h4 style="color:black" >${value.product_name}</h4></a>
                                    <!-- Selling and Discount Price Start -->
                                     ${value.discount_price == 0 ?
                                    `
                                    <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                       ${parseInt(value.selling_price)} </h4>
                                    `:
                                    `
                                    
                                    <h4>
                                    <span style="color:black"> <span style="font-size:15px">৳</span>
                                        <b>${parseInt(value.discount_price)} </b></span>
                                    <span><s class="text-danger" style="font-size:15px"><span>৳</span>
                                           <b>${parseInt(value.selling_price)} </b></s></span>
                                    </h4>
             
                                        `}
                                    <!-- Selling and Discount Price End -->
                                      <!--overlay-->
                                        <div id="overlay_background">
                                          <div class="text-light" style="font-size:30px;margin-top:50px;text-align:center">Stock <br> Out  </div>
                                       </div>
                                        <!--end overlay-->
                                   <!-- overlay -->
                                      <div style="margin-top: -10px">
                                        <a class="fashion-btn" style="color: white; font-size: 14px; background-color: #777; border-radius: 5px; padding: 5px;
                                        " class="cart-btn"> <i class="fas fa-shopping-cart"> </i> Out of Stock</a>
                                    </div>
                                    <!-- overlay cccf-->
                                </div>
                            </div>
                        </div>
                 `:
                 `
                  <div class="card gallery-item woman">
                            <div class="gallery-item-inner woman">
                               <a  href="/product/detail/fashion/${value.category_id}/${value.sub_category_id}/${value.product_slug_name }" id="fashion_details_link">
                                            <img src="/${value.product_thambnail}" alt="" class="product-img">
                                            </a>
                                <div class=" card-body">
                                      <a  href="/product/detail/fashion/${value.category_id}/${value.sub_category_id}/${value.product_slug_name }" id="fashion_details_link" > <h4 style="color:black" >${value.product_name}</h4></a>
                                    <!-- Selling and Discount Price Start -->
                                    ${value.discount_price == 0 ?
                                    `
                                    <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                       ${parseInt(value.selling_price)} </h4>
                                    `:
                                    `
                                    
                                    <h4>
                                    <span style="color:black"> <span style="font-size:15px">৳</span>
                                        <b>${parseInt(value.discount_price)} </b></span>
                                    <span><s class="text-danger" style="font-size:15px"><span>৳</span>
                                           <b>${parseInt(value.selling_price)} </b></s></span>
                                </h4>
         
                                    `}
                                    
                                    <!-- Selling and Discount Price End -->
                                     <div class="fashion-btn-holder">
                                       <a class="fashion-btn" href="/product/detail/fashion/${value.category_id}/${value.sub_category_id}/${value.product_slug_name }" id="fashion_details_link" class="cart-btn"><i class="fas fa-shopping-cart"></i> Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                 
                 `}
                `
               })
              $('.ec-card-group').append(loadData);
           })
           .fail(function(jqXHR,ajaxOptions,thrownError){
               alert('Server not responding...');
           }) }
        var pages=1;
       $(window).scroll(function(){
           if($(window).scrollTop() + $(window).height() >= $(document).height()-600 ){
            pages++;
               loadMoreData(pages);
               console.log(pages);  }  })
        </script>


@endsection
