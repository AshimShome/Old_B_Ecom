@extends('frontend.main_master')
<!--@include('frontend.body.b_fontend_sidber')-->
@section('islamic')

<style>
    .baby-home .tbd-wrapper .tbd-item-wrapper .tdb-item .tbdi-content .tbdi-content-bottom .product-name{
        height: 44px;
        overflow: hidden;
        text-overflow: ellipsis;
        -webkit-line-clamp: 2;
        display: -webkit-box;
        -webkit-box-orient: vertical;
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


<section class="main-content" id="main-content">
    <div class="container-fluid px-md-3 px-3">

  <!-- Popular products Start -->
 @php
 $special_offer = App\Models\Product::where('special_offer','1')->where('ecom_name','6')->get();
 @endphp

 <section class="baby-home">
     <section class="tbd-wrapper">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12 section-title  mt-5 px-md-5 px-3">
                        <h2 class="text-center">Special Offers</h2>
                    </div>
                </div>
                <div class="container baby-container">
                    <div class="products_load_with_ajax row tbd-item-wrapper">
                        @foreach ($special_offer as $latestdiscountproduct)
                        <!--@php-->
                        <!--dd($latestdiscountproduct);-->
                        <!--@endphp-->
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 pt-3">
                                <div class="tdb-item">
                                    <div class="tbdi-thumb">
                                        <img src="{{ asset($latestdiscountproduct->product_thambnail) }}" alt="best deal">
                                        <div class="tbdi-overlay">
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
                                                <p class="price" style="color:black" >৳{{ intval($latestdiscountproduct->selling_price) }} </p>
                                                @else
                                                <p class="price" style="color:black">৳{{ intval($latestdiscountproduct->discount_price) }}  <del class="discount-price text-danger" >
                                                     ৳{{  intval($latestdiscountproduct->selling_price) }}</del> </p>
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
                     <div class="loading_img_section d-block text-center" style="display: none"><img  src="https://i.gifer.com/4V0b.gif" alt="" ></div>
                </div>
            </section>
 </section>
  
 <!-- Popular products End -->
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
             
             var loadData = '';
               
            $.each(response.data,function(index,value){
               loadData=`
                      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 pt-3">
                                <div class="tdb-item">
                                    <div class="tbdi-thumb">
                                        <img src="/${value.product_thambnail}" alt="best deal">
                                        <div class="tbdi-overlay">
                                            <ul class="tbdi-overlay-menu">
                                                <li> <a href="#" data-bs-toggle="modal" onclick="productViewBaby(${value.id})"
                                                        data-bs-target="#productQuickViewModalBaby">
                                                        <i class="fa-regular fa-eye"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tbdi-content">
                                        <ul class="rating-star">
                                            
                                        </ul>
                                        <div class="tbdi-content-bottom">
                                                <p class="product-name"> ${value.product_name}</p>
                                                 ${value.discount_price == 0 ?
                                                  `<p class="price" style="color:black" >৳${value.selling_price } </p>` 
                                                  :
                                                  `
                                                  <p class="price" style="color:black">৳${value.discount_price }  <del class="discount-price text-danger" >
                                                     ৳${value.selling_price }</del> </p>
                                                  `
                                                }
                                                
                                                
                                               <a class="add-btn" onclick="productViewBaby(${value.id})" 
                                               href="#" data-bs-toggle="modal" data-bs-target="#productQuickViewModalBaby">Add to Bag</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
               `;
               
               })
               $('.products_load_with_ajax').append(loadData);
           })
           .fail(function(jqXHR,ajaxOptions,thrownError){
               alert('Server not responding...');
           })


       }

    var pages=1;

       $(window).scroll(function(){

           if($(window).scrollTop() + $(window).height() >= $(document).height()-600 ){

            pages++;
               loadMoreData(pages);
               console.log(pages);


           }
       })



</script>
@endsection

