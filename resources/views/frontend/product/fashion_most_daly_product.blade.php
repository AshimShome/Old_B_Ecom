@extends('frontend.main_master')

@section('islamic')
<style>
    .gallery-item-inner{
        height: 412px!important;
    }
    
    @media (max-width: 600px){
 .gallery-item-inner{
        height: auto!important;
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
<!-- left sidebar start-->
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
<!-- left sidebar end -->
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
   <section class="main-content" id="main-content">
    <div class="container-fluid px-md-5 px-3 mt-3 fashion-home">
        <!--~~~~~~category page banner starts~~~~~~-->
        <div class="category01--banner">
           <div class="row">
               
                   @php
                $subcategorybanner=App\Models\SubCategorypBanner::where('ecom_id',3)->latest()->get();
                @endphp
                @foreach($subcategorybanner->take(2) as $banner)
              <div class="col-lg-6 col-md-6 com-sm-12">
                 <div class="subcat_banner_img h-100">
                    <div class="wrap_left h-100">
                        <img src=" {{ asset( $banner->subcat_banner_image) }} " alt="BppShops"
                                class="img-fluid w-100 h-100">
                    </div>
                 </div>
              </div>
               @endforeach
              
           </div>
        </div>

        <section class="popular-products">
                        <div class="product-gallery-wrapper  portfolio-section grid-portfolio ratio2_3 portfolio-padding ">
                        <h3 class="mt-5 text-center"style="color:black" >Daily Best Sale Products</h3>
                            <div class="gallery px-lg-5 pt-lg-4 pb-lg-3 px-3 py-3">
                                <div class="row justify-content-center">
                                    @foreach ($dailyBestSales as $subsubcat)
                                     
                                     @if($subsubcat->product_qty == 0)
                                     <div class="card gallery-item woman">
                                        <div class="gallery-item-inner woman">
                                             <a  id="fashion_details_link" >
                                            <img src="{{asset($subsubcat->product_thambnail ) }}" alt="" class="product-img">
                                            </a>
                                            <div class=" card-body">
                                                
                                                 <a 
                                                 id="fashion_details_link" >
                                                     
                                                     <h4 class="gallery-card-heading" style="color: black">{{ $subsubcat->product_name }}</h4>
                                                 </a>
                                               <!-- Selling and Discount Price Start -->
                                                        @if ($subsubcat->discount_price == 0)
                                                        <h4 style="color:black;font-size:15px"> <span>৳</span>
                                                            {{ intval($subsubcat->selling_price) }} </h4>
                                                        @else
                                                        <h4 style="color:black;font-size:15px">
                                                            <span style="color:black"> <span>৳</span>
                                                                {{ intval($subsubcat->discount_price) }}</span>
                                                            <span><s class="text-danger"><span>৳</span>
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
                                                
                                                 <a href="{{route('ProductDetailsFashion',[$subsubcat->category_id,$subsubcat->sub_category_id,$subsubcat->product_slug_name ] )}}"
                                                 id="fashion_details_link" >
                                                     
                                                     <h4 class="gallery-card-heading" style="color: black">{{ $subsubcat->product_name }}</h4>
                                                 </a>
                                               <!-- Selling and Discount Price Start -->
                                                        @if ($subsubcat->discount_price == 0)
                                                        <h4 style="color:black;font-size:15px"> <span>৳</span>
                                                            {{ intval($subsubcat->selling_price) }} </h4>
                                                        @else
                                                        <h4 style="color:black;font-size:15px">
                                                            <span style="color:black"> <span>৳</span>
                                                                {{ intval($subsubcat->discount_price) }}</span>
                                                            <span><s class="text-danger"><span>৳</span>
                                                                    {{ intval($subsubcat->selling_price) }}</s></span>
                                                        </h4>
                                                        @endif
                                                        <!-- Selling and Discount Price End -->
                                                 <div class="fashion-btn-holder">
                                                     <a  class="fashion-btn" href="{{route('ProductDetailsFashion',[$subsubcat->category_id,$subsubcat->sub_category_id,$subsubcat->product_slug_name ] )}}" 
                                                     id="fashion_details_link" class="cart-btn"><i class="fas fa-shopping-cart"></i>Shop Now</a>
                                                </div>
                                            </div>
    
                                        </div>
                                        </div>
                                     @endif
                                     
                                     
                                    @endforeach
                                </div>
                            
                            </div>
                        </div>
                    </section>
                    <!--  End -->
                    <div class="loading_img_section d-block text-center" style="display: none"><img  src="https://i.gifer.com/4V0b.gif" alt="" ></div>
                  </div>       
               </div>
       </section>
    </main>
@endsection

@section('script')
<!--lazy loading --><script>
    function loadMoreData(page){
           $.ajax({
               url:'?page='+page,
               type:'get',
               beforeSend:function(){
                   $('.loading_img_section').show();
               }
           })
           .done(function(response){
                
            $('.loading_img_section').html('');
               if(response.data.length == 0){
                   $('.loading_img_section').html('');
                   return;
               }



               $('.loading_img_section').hide();
               var loadData='';
               
               $.each(response.data,function(index,value){
                loadData+= `

                 <div class="card gallery-item woman">
                            <div class="gallery-item-inner woman">
                            <a  href="/product/detail/fashion/${value.category_id}/${value.sub_category_id}/${value.product_slug_name }" id="fashion_details_link">
                                            <img src="../../../${value.product_thambnail}" alt="" class="product-img">
                                            </a>
                                
                                <div class=" card-body">
                                   <a  href="/product/detail/fashion/${value.category_id}/${value.sub_category_id}/${value.product_slug_name }" id="fashion_details_link" > <h4 style="color:black" >${value.product_name}</h4></a>
                                    <!-- Selling and Discount Price Start -->
                                    <h4 style="color:black; font-size:15px"> <span>৳</span>
                                       ${value.discount_price}</h4>
                                    <!-- Selling and Discount Price End -->
                                     <div class="fashion-btn-holder">
                                       <a class="fashion-btn" href="/product/detail/fashion/${value.category_id}/${value.sub_category_id}/${value.product_slug_name }" id="fashion_details_link" class="cart-btn"><i class="fas fa-shopping-cart"></i>Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                `
               })
               
               $('.ec-card-group').append(loadData);
               
           })
           .fail(function(jqXHR,ajaxOptions,thrownError){
               alert('Server not responding...');
           })


       }

    var pages=1;

       $(window).scroll(function(){

           if($(window).scrollTop() + $(window).height() >= $(document).height() -500 ){

            pages++;
               loadMoreData(pages);
               console.log(pages);


           }
       })



</script>
<!--lazy loading end -->
@endsection