@extends('frontend.main_master')
<head>
    @php
    $seo = App\Models\Seo::first();
    // dd($seo);
    @endphp
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>BPP Shops | Best Product Best Price</title>
    <meta name="title" content={{ optional($seo)->meta_title }}>
    <meta name="author" content={{ optional($seo)->meta_author }}>
    <meta name="description" content={{ optional($seo)->meta_description }} />
    <meta name="keywords" content={{ optional($seo)->meta_keyword }}>
    <meta name="google" content={{ optional($seo)->google_analytics }}>
    <meta name="google-site-verification" content="kSn5VBlGeZved4nGvSwToyfqlnjD8vTjxdFfk44GgMA"/>
 </head>
@section('islamic')

<!-- left sidebar start-->
<div id="sidemenu-container" class="sidemenu-container hide-menu">
    <ul id="category-toggle-custom-sidemenu" class="category-sidemenu">
        @php
        $special_offers = App\Models\Product::where('special_offer','1')->where('ecom_name','2')->count();        
       $coupons = App\Models\Coupon::where('status','1')->orderBy('id', 'DESC')->count();
        @endphp       
        <li class="menu-heading">
            <a href="{{ url('/special/grocery/offer') }}"><span class="text">Special Offers</span> <span class="number">{{
                    $special_offers }}</span></a>
           
        </li>
        @php
        $currentUrl = Request::segment(2);
        $categories=App\Models\Category::with('subcategory')->where('ecom_id','2')->get();
        @endphp      
        <li class="mb-1 mt-3">
            <div class="collapse">               
                {{-- for category --}}
                @foreach ($categories as $category)
                <li class="mb-1 mt-2">
                    {{-- vvvvvv --}}
                    @if(Request::segment(2) != $category->category_slug_name)
                    <a href="{{ url('/gbs/'. $category->category_slug_name) }}">                      
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
                                        href="{{ url('/gbs/' . $subcategory->category->category_slug_name .'/'. $subcategory->sub_category_slug_name) }}">
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
                                            <li><a href="{{ url('/gbs/'.optional($subsubcategory->category)->category_slug_name.'/'. optional($subsubcategory->subcategory)->sub_category_slug_name.'/'. optional($subsubcategory)->subsubcategory_slug_name) }}"
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
    <div class="container-fluid px-md-5 px-3 mt-3">
        <!--~~~~~~category page banner starts~~~~~~-->
        <div class="category01--banner">
           <div class="row">
              <div class="col-lg-6 col-md-6 com-sm-12">
                 <div class="subcat_banner_img h-100">
                    <div class="wrap_left h-100">
                       <img src=" {{ asset('frontend/assets/images/category/grocery_sub_cat.png') }} " alt=""
                          class="img-fluid w-100 h-100">
                    </div>
                 </div>
              </div>
              <div class="col-lg-6 col-md-6 com-sm-12">
                 <div class="subcat_banner_img h-100">
                    <div class="wrap_right h-100">
                       <img src=" {{ asset('frontend/assets/images/category/grocery_sub_cat2.png') }} " alt="" height="100px"
                          class="img-fluid w-100 h-100">
                    </div>
                 </div>
              </div>
           </div>
        </div>

        <section class="popular-products">
                        <div class="product-gallery-wrapper  portfolio-section grid-portfolio ratio2_3 portfolio-padding ">
                        <h3 class="mt-5 text-center"style="color:black" >Latest Discounted Products</h3>
                            <div class="products_load_with_ajax ec-card-group zoom-gallery portfolio-2 px-lg-5 pt-lg-4 pb-lg-3 px-3 py-3">
                            @foreach ($latest as $subsubcat)
                                    <div class="isotopeSelector filter all ec-card-lg">
                                        <div class="overlay ec-card-inner">
                                            <div class="border-portfolio">
                                                <div class="card product-port">
                                                    <div class="image-overlay-container">
                                                        <img src="{{asset($subsubcat->product_thambnail ) }}"
                                                            class="img-fluid  bg-img" alt="portfolio-image">
                                                    </div>
                                                    <div class="text-center my-3">
                                                    <h4 class="text-dark">{{ $subsubcat->product_name }}</h4>
                                                    <h4 style="color:green">{{ $subsubcat->unit }}</h4>
                                                  
                                               
                                                
                                                      <!-- Selling and Discount Price Start -->
                                                    @if ($subsubcat->discount_price == null)
                                                    <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                                        {{ $subsubcat->selling_price }} </h4>
                                                    @else
                                                    <h4>
                                                        <span style="color:black"> <span style="font-size:15px">৳</span>
                                                            {{ $subsubcat->discount_price }}</span>
                                                        <span><s class="text-danger"><span style="font-size:15px">৳</span>
                                                                {{ $subsubcat->selling_price }}</s></span>
                                                    </h4>
                                                    @endif
                                                    <!-- Selling and Discount Price End -->
                                          
                                                    </div>                                                  
                                                    <div class="overlay-background">
                                                 
                                                
                                                 <button class="overlay-add-to-bag"
                                                onclick="productView({{ $subsubcat->id }})" 
                                                data-bs-toggle="modal"
                                                data-bs-target="#productQuickViewModal">Add to <br> Shopping <br> Bag </button>
                                                
                                                <a class="overlay-details-link"onclick="productView({{ $subsubcat->id }})" 
                                                data-bs-toggle="modal" data-bs-target="#productQuickViewModal">Details >></a>
                                                    </div>
                                                </div>
                                                
                                                   <a class="overlay-details-link"
                                            onclick="productView({{ $subsubcat->id }})" data-bs-toggle="modal"
                                            data-bs-target="#productQuickViewModal">Details
                                            >></a>

                                                <div class="d-flex justify-content-center cart-details-btn ">

                                               
                                                 <a onclick="productView({{ $subsubcat->id }})" data-bs-toggle="modal"
                                         data-bs-target="#productQuickViewModal"><button
                                         class="btn-primary-filled-grocery px-4"><i class="fas fa-cart-plus me-2"></i>Shop Now </button></a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="loading_img_section d-block text-center" style="display: none"><img  src="https://i.gifer.com/4V0b.gif" alt="" ></div>
                        </div>
                    </section>
                    <!--  End -->
     
     
     
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
                         <h4 class="text-dark">${value.product_name}</h4>
                         ${value.unit > 0 ?
                         `
                                          <b style="font-size:18px">${value.unit} </b>
                                          `
                                             :
                                          `
                                  <b style="font-size:18px"></b>
                                          
                                   `
                                }     
                                         
                         
                          <!-- Selling and Discount Price Start -->
                         
                          <!-- Selling and Discount Price Start -->


                                        ${value.discount_price < 1 ?
                                          `
                                          <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                             ${parseInt(value.selling_price) } </h4>
                                          `
                                          :
                                          `
                                          <h4>
                                            <span style="color:black"> <span style="font-size:15px">৳</span>
                                                 ${parseInt(value.discount_price) } </span>
                                            <span><s class="text-danger"><span style="font-size:15px">৳</span>
                                                     ${parseInt(value.selling_price) }</s></span>
                                          </h4>
                                          `
                                       }
                                        <!-- Selling and Discount Price End -->

                      </div>
                      <?php
                      $productName = strval("'".$item->product_name."'");
                      ?>
                      <div class="overlay-background">

                         <button class="overlay-add-to-bag"
                            onclick="groceryproductView( ${value.id })"
                            data-bs-toggle="modal"
                            data-bs-target="#groceryproductQuickViewModal">Add to <br> Shopping <br> Bag </button>

                             <a class="overlay-details-link"
                                            onclick="groceryproductView( ${value.id })" data-bs-toggle="modal"
                                            data-bs-target="#groceryproductQuickViewModal">Details
                                            >></a>
                     </div>
                   </div>
                   <div class="d-flex justify-content-center cart-details-btn">
                     <a onclick="groceryproductView(${value.id })" data-bs-toggle="modal"
                         data-bs-target="#groceryproductQuickViewModal"><button
                         class=" btn btn-primary-filled px-4"  style="background-color:#65C21B"><i class="fas fa-cart-plus me-2"></i>Add To Cart </button></a>

                   </div>
                </div>
             </div>
          </div>

                `
               })
               $('.products_load_with_ajax').append(loadData);
           })
           .fail(function(jqXHR,ajaxOptions,thrownError){
               alert('Server not responding...');
           })


       }

    var pages=1;

       $(window).scroll(function(){
        if(screen.width <= 600){
            if($(window).scrollTop() + $(window).height() >= $(document).height() - 1400){
            pages++;
               loadMoreData(pages);
           }
        }
        else{
            if($(window).scrollTop() + $(window).height() >= $(document).height() - 700){
            console.log('Hit')
            pages++;
               loadMoreData(pages);
           }
        }
       })



</script>
@endsection
