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


    /*.fashion-home .slick-next .slick-arrow{*/
    /*    color:#333;*/
    /*}*/
    .product-gallery-wrap {
        margin: 10px;
        /*width:100%;*/
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

   
    
    
.electronic .display-products-card {
    border-radius: 0;
    margin-right: 5px;
    margin-bottom: 10px;
    width: 250px;
}

.electronic .display-products-card .card-header {
    background-color: transparent;
    border-bottom: 0;
    display: flex;
    justify-content: center;
}

.electronic .display-products-card .card-body .product-title {
    min-height: 30px!important;
    font-size: 16px;
    font-weight: 700;
    color: #356BBD;
    margin-bottom: 0;
    overflow: hidden;
      text-overflow: ellipsis;
      white-space: initial;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
}

.electronic .display-products-card .card-footer {
    background-color: transparent;
    border-top: 0;
    position: relative;
}
.electronic .display-products-card .card-footer hr{
    position: absolute;
    bottom: 7px;
    width: 100%;
}
.electronic .display-products-card .card-footer button{
    z-index: 99;
}

.electronic .display-products-card .card-footer .rating {
    font-size: 12px;
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
                                    <a href="{{ url('/electronic') }}" class="logo-container custom-header-ecom-title-home">
                                        <i class="fas fa-home"></i> Electronics Home
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- ---------- Search with Category ------------- -->
                        <div>
                            <a href="{{ url('/electronic') }}" class="logo-container custom-header-ecom-title-home">
                              <h2 class="text-white">Electronics</h2>
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
              $special_offer = App\Models\Product::where('special_offer','1')->where('ecom_name','4')->count();
        $coupons = App\Models\Coupon::where('status','1')->orderBy('id', 'DESC')->count();
        @endphp
       
        <li class="menu-heading">
            <a href="{{ url('/special/electronic/offer') }}"><span class="text">Special Offers</span> <span class="number">{{
                    $special_offer }}</span></a>
           
        </li>

        @php
        $currentUrl = Request::segment(1);
        // dd($currentUrl);
        $categories=App\Models\Category::with('subcategory')->where('ecom_id','4')->get();
        @endphp
        <li class="mb-1 mt-3">
            <div class="collapse">               
                {{-- for category --}}
                @foreach ($categories as $category)
                <li class="mb-1 mt-2">
                    {{-- vvvvvv --}}
                    @if(Request::segment(2) != $category->category_slug_name)
                    <a href="{{ url('/ebs/'. $category->category_slug_name) }}">                      
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
                                        href="{{ url('/ebs/' . $subcategory->category->category_slug_name .'/'. $subcategory->sub_category_slug_name) }}">
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
                                            <li><a href="{{ url('/ebs/'.$subsubcategory->category->category_slug_name.'/'. $subsubcategory->subcategory->sub_category_slug_name.'/'. $subsubcategory->subsubcategory_slug_name) }}"
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
@php
$products = App\Models\Product::with('review', 'orderItems')->where('special_offer','1')->where('ecom_name','4')->get();

@endphp
 <main class="electronic main-body">
    <section class="main-content electronic " id="main-content electronic">
        <div class="container-fluid px-md-3 px-3">

            <!-- Popular products Start -->
            <div class="section-title-no-bg px-md-5 px-3">
                <h4 class="pt-4 text-center text-dark" style="margin-right: 89px;">Special Offers</h4>
            </div>
                    <section class="my-4 px-md-4 px-3" style="height: fit-content;">
                            <div class="container-fluid">
                                <div class="ec-card-group row">
                                     @foreach ($products as $product)
                                     @if($product->product_qty > 0)
                                     <div class="card display-products-card px-0">
                                        <a onclick="electronicPoductView({{ $product->id }})" data-bs-toggle="modal"
                                                         data-bs-target="#productQuickViewModalElectronics">
                                             <div class="card-header p-3">
                                                <a href="{{route('electronicProductDetails',[$product->category_id,$product->sub_category_id,$product->product_slug_name ] )}}">
                                                 <img class="img-fluid"
                                                     src="{{asset('/'.$product->product_thambnail)}}" alt="">
                                                </a>
                                             </div>
                                             <div class="card-body px-3 pt-4 pb-1">
                                                <a style="color:black" href="{{route('electronicProductDetails',[$product->category_id,$product->sub_category_id,$product->product_slug_name ] )}}">
                                                 <h6 class="product-title" style="color:black">{{$product->product_name}}</h6>
                                                </a>
                                             </div>
                                             
                                             <div class="card-footer px-3">
                                                 @if(count($product->review) == 0)
                                                     <ul class="rating">
                                                         <li><i class="fas fa-star text-secondary"></i></li>
                                                         <li><i class="fas fa-star text-secondary"></i></li>
                                                         <li><i class="fas fa-star text-secondary"></i></li>
                                                         <li><i class="fas fa-star text-secondary"></i></li>
                                                         <li><i class="fas fa-star text-secondary"></i></li>
                                                         <li>(0)</li>
                                                     </ul>
                                                 @else
                                                     @php
                                                         $rating = 0;
                                                     @endphp
                                                     @foreach ($product->review as $review )
                                                     
                                                         @php
                                                             $rating = $rating+((intval($review->quality) + intval($review->price) + intval($review->value)) / 3);
                                                         @endphp
                                                     @endforeach
                                                     @php
                                                         $rating = $rating/count($product->review);
                                                         $rating_blank = 5 - floor($rating);
                                                     @endphp
                                                     <ul class="rating">
                                                         @for ($i = 1; $i <= $rating; $i++)
                                                             <li><i class="fa-solid fa-star text-warning"></i></li>
                                                         @endfor
                                                         @for ($i = 1; $i <= $rating_blank; $i++)
                                                             <li><i class="fa-solid fa-star" style="color: #c2c2c2!important"></i></li>
                                                         @endfor
                                                             <li>({{count($product->review)}})</li>
                                                     </ul>
                                                 @endif
                                                 @if ($product->discount_price != 0)
                                                     <h6 class="my-2 text-dark fw-bold">&#2547; {{intval($product->discount_price)}} <del>&#2547<span>{{intval($product->selling_price)}}</span></del></h6>
                                                     <!--<h6 class="my-2 text-danger fw-bold text-decoration-line-through">; </h6>-->
                                                 @else
                                                     <h6 class="my-2 text-dark fw-bold">&#2547; {{intval($product->selling_price)}}</h6>
                                                 @endif
                                             </div>
                                         </a>
                                         <a href="{{route('electronicProductDetails',[$product->category_id,$product->sub_category_id,$product->product_slug_name ] )}}">
                                         <div class="card-footer px-0">
                                             <div class="add-to-card-cont" style="display: flex; justify-content: center;">
                                                 <button 
                                                     class="btn btn-primary-filled px-4 py-1" style="background-color:#008081">Shop Now</button>
                                             </div>
                                             <hr/>
                                         </div> 
                                        </a>        
                                     </div>
                                     @else
                                     <div class="card display-products-card px-0">
                                        <a onclick="electronicPoductView({{ $product->id }})" data-bs-toggle="modal"
                                                         data-bs-target="#productQuickViewModalElectronics">
                                             <div class="card-header p-3">
                                                 <img class="img-fluid"
                                                     src="{{asset('/'.$product->product_thambnail)}}" alt="">
                                             </div>
                                             <div class="card-body px-3 pt-4 pb-1">
                                                 <h6 class="product-title" style="color:black">{{$product->product_name}}</h6>
                                             </div>
                                             
                                             <div class="card-footer px-3">
                                                 @if(count($product->review) == 0)
                                                     <ul class="rating">
                                                         <li><i class="fas fa-star text-secondary"></i></li>
                                                         <li><i class="fas fa-star text-secondary"></i></li>
                                                         <li><i class="fas fa-star text-secondary"></i></li>
                                                         <li><i class="fas fa-star text-secondary"></i></li>
                                                         <li><i class="fas fa-star text-secondary"></i></li>
                                                         <li>(0)</li>
                                                     </ul>
                                                 @else
                                                     @php
                                                         $rating = 0;
                                                     @endphp
                                                     @foreach ($product->review as $review )
                                                     
                                                         @php
                                                             $rating = $rating+((intval($review->quality) + intval($review->price) + intval($review->value)) / 3);
                                                         @endphp
                                                     @endforeach
                                                     @php
                                                         $rating = $rating/count($product->review);
                                                         $rating_blank = 5 - floor($rating);
                                                     @endphp
                                                     <ul class="rating">
                                                         @for ($i = 1; $i <= $rating; $i++)
                                                             <li><i class="fa-solid fa-star text-warning"></i></li>
                                                         @endfor
                                                         @for ($i = 1; $i <= $rating_blank; $i++)
                                                             <li><i class="fa-solid fa-star" style="color: #c2c2c2!important"></i></li>
                                                         @endfor
                                                             <li>({{count($product->review)}})</li>
                                                     </ul>
                                                 @endif
                                                 @if ($product->discount_price != 0)
                                                     <h6 class="my-2 text-dark fw-bold">&#2547; {{intval($product->discount_price)}} <del>&#2547<span>{{intval($product->selling_price)}}</span></del></h6>
                                                     <!--<h6 class="my-2 text-danger fw-bold text-decoration-line-through">; </h6>-->
                                                 @else
                                                     <h6 class="my-2 text-dark fw-bold">&#2547; {{intval($product->selling_price)}}</h6>
                                                 @endif
                                             </div>
                                         </a>
                                         <!--overlay-->
                                         <div id="overlay_background">
                                            <div class="text-light" style="font-size:30px;margin-top:150px;text-align:center">Stock Out  </div>
                                         </div>
                                          <!--end overlay-->
                                         <div class="card-footer px-0">
                                             <div class="add-to-card-cont" style="display: flex; justify-content: center;">
                                                 <button 
                                                     class="btn btn-primary-filled px-4 py-1" style="background-color:#008081" disabled>Out of stock</button>
                                             </div>
                                             <hr/>
                                         </div>         
                                     </div>
                                     @endif
                                        
                                    @endforeach
                                </div>
                                <div class="loading_img_section d-block text-center" style="display: none"><img  src="https://i.gifer.com/4V0b.gif" alt="" ></div>
                            </div>
                    </section>
         </main>
            <!-- Popular products End -->
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
                loadData+= `

                <div class="isotopeSelector filter all ec-card-lg">
             <div class="overlay ec-card-inner">
                <div class="border-portfolio">
                   <div class="card product-port">
                      <div class="image-overlay-container">
                         <img src="/${value.product_thambnail}" class="img-fluid  bg-img"
                            alt="portfolio-image">
                      </div>
                      <div class="text-center my-3">
                         <h4 class="text-dark">${value.product_name} </h4>
                         <small>${value.unit == null ? `<p>&nbsp;</p>`: `${value.unit}`}</small>
                          <!-- Selling and Discount Price Start -->
                                        ${value.discount_price < 1 ?
                                          `
                                          <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                             ${value.selling_price } </h4>
                                          `
                                          :
                                          `
                                          <h4>
                                            <span style="color:black"> <span style="font-size:15px">৳</span>
                                                 ${value.discount_price } </span>
                                            <span><s class="text-danger"><span style="font-size:15px">৳</span>
                                                     ${value.selling_price }</s></span>
                                          </h4>
                                          `
                                       }
                                        <!-- Selling and Discount Price End -->


                      </div>
                      <?php
                    //   $productName = strval("'".$item->product_name."'");
                      ?>
                      <div class="overlay-background">

                         <button class="overlay-add-to-bag"
                            onclick="productView( ${value.id })"
                            data-bs-toggle="modal"
                            data-bs-target="#productQuickViewModal">Add to <br> Shopping <br> Bag </button>

                             <a class="overlay-details-link"
                                            onclick="productView( ${value.id })" data-bs-toggle="modal"
                                            data-bs-target="#productQuickViewModal">Details
                                            >></a>
                     </div>
                   </div>
                   <div class="d-flex justify-content-center cart-details-btn">
                     <a onclick="productView(${value.id })" data-bs-toggle="modal"
                         data-bs-target="#productQuickViewModal"><button
                         class=" btn btn-primary-filled px-4"><i class="fas fa-cart-plus me-2"></i>Add To Cart </button></a>

                   </div>
                </div>
             </div>
          </div>

                `
               })
               $('#products_load_with_ajax').append(loadData);
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