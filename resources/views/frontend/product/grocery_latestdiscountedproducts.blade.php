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
<style>
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
       #faruk_shovo {
        overflow: hidden;
      text-overflow: ellipsis;
      white-space: initial;
      display: -webkit-box;
      -webkit-line-clamp: 2;
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
                                 <a href="{{ url('/grocery') }}" class="logo-container custom-header-ecom-title-home">
                                    <i class="fas fa-home"></i> Grocery Home
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- ---------- Search with Category ------------- -->
                    <div>
                          <a href="{{ url('/grocery') }}" class="logo-container custom-header-ecom-title-home">
                            <h2 class="text-white">Grocery</h2>
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


<!-- left sidebar start-->
<div id="sidemenu-container" class="sidemenu-container hide-menu">
    <ul id="category-toggle-custom-sidemenu" class="category-sidemenu">
        @php
        $special_offer = App\Models\Product::where('special_offer','1')->where('ecom_name','2')->count();        
       $coupons = App\Models\Coupon::where('status','1')->orderBy('id', 'DESC')->count();
        @endphp       
        <li class="menu-heading">
            <a href="{{ url('/special/grocery/offer') }}"><span class="text">Special Offers</span> <span class="number">{{
                    $special_offer }}</span></a>
  
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
<!-- left sidebar end -->
   <section class="main-content" id="main-content">
    <div class="container-fluid px-md-5 px-3 mt-3">
        <!--~~~~~~category page banner starts~~~~~~-->
        <div class="category01--banner">
           <div class="row">
                  @php
                $subcategorybanner=App\Models\SubCategorypBanner::where('ecom_id',2)->latest()->get();
                @endphp
                @foreach($subcategorybanner->take(2) as $banner)
                <div class="col-lg-6 col-md-6 com-sm-12 mt-1">
                    <div class="subcat_banner_img h-100">
                        <div class="wrap_left h-100">
                            <img src=" {{ asset( $banner->subcat_banner_image) }}  " alt=""
                                class="img-fluid w-100 h-100">
                        </div>
                    </div>
                </div>
                @endforeach
           </div>
        </div>
        <section class="popular-products">
                        <div class="product-gallery-wrapper  portfolio-section grid-portfolio ratio2_3 portfolio-padding ">
                        <h3 class="mt-5 text-center"style="color:black" >Latest Discounted Products </h3>
                            <div class="ec-card-group zoom-gallery portfolio-2 px-lg-5 pt-lg-4 pb-lg-3 px-3 py-3">
                            @foreach ($latest as $subsubcat)
                             @if($subsubcat->product_qty>0)
                             <div class="isotopeSelector filter all ec-card-lg">
                                        <div class="overlay ec-card-inner">
                                            <div class="border-portfolio">
                                                <div class="card product-port">
                                                    <div class="image-overlay-container">
                                                        <img src="{{asset($subsubcat->product_thambnail ) }}"
                                                            class="img-fluid  bg-img" alt="portfolio-image">
                                                    </div>
                                                    <div class="text-center my-3">
                                                    <h4 class="text-dark" id="faruk_shovo">{{ $subsubcat->product_name }}</h4>
                                                     <br>
                                                     
                                                    <h4 style="font-weight: bold; font-size: 16px">{{ $subsubcat->unit }}</h4>
                                                  
                                                <?php
                                                    $productName = strval("'" . $subsubcat->product_name . "'");
                                                    ?>
                                                
                                                      <!-- Selling and Discount Price Start -->
                                                    @if ($subsubcat->discount_price == 0)
                                                 
                                                    <h4 style="color:black;font-weight: bold; font-size: 16px"> <span style="font-size:16px;font-weight: bold;">৳</span>
                                                        {{ intval($subsubcat->selling_price) }} </h4>
                                                    @else
                                                    <br>
                                                    <h4>
                                                        <span style="color:black;font-weight: bold;"> <span style="font-size:16px;font-weight: bold;">৳</span>
                                                            {{ intval($subsubcat->discount_price) }}</span>
                                                        <span><s class="text-danger" style="font-weight: bold; font-size: 16px"><span style="font-size:15px;font-weight: bold;">৳</span>
                                                                {{ intval($subsubcat->selling_price) }}</s></span>
                                                    </h4>
                                                    @endif
                                                    <!-- Selling and Discount Price End -->
                                          
                                                    </div>                                                  
                                                    <div class="overlay-background">
                                                 
                                              
                                                 <button class="overlay-add-to-bag"
                                            onclick="addToCart({{ $subsubcat->id }}, <?php echo $productName; ?>)">Add to <br> Shopping <br> Bag </button>
                                                   <a class="overlay-details-link"
                                              onclick="groceryproductView ({{ $subsubcat->id }})"
                                            data-bs-toggle="modal" data-bs-target="#groceryproductQuickViewModal"
                                           disabled="">Details
                                         >></a>
                                             </div>
                                        </div>
                                               <div class="d-flex justify-content-center cart-details-btn">  <a onclick="groceryproductView({{ $subsubcat->id }})"  >

                                            <button
                                            class="btn btn-primary-filled px-4"  onclick="addToCart({{ $subsubcat->id }}, <?php echo $productName; ?>)" 
                                            style="background-color:#65C21B"><i class="fas fa-cart-plus me-2"></i> Shop Now
                                        </button>
                                        
                                        
                                        </a>
                                     </div>
                                            </div>
                                        </div>
                                    </div>
                             @else
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
                                                    <h4 style="font-weight: bold; font-size: 16px">{{ $subsubcat->unit }}</h4>
                                                  
                                                <?php
                                                    $productName = strval("'" . $subsubcat->product_name . "'");
                                                    ?>
                                                
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
                                          
                                                    </div>                                                  
                                                   <div id="overlay_background">
                                                    <button class="overlay-add-to-bag"
                                                    disabled>
                                                    <div class="text-light">
                                                       Stock <br> Out
                                                    </div>
                                                    </button>
                                                   
                                                  </div>
                                               
                                        </div>
                                               <div class="d-flex justify-content-center cart-details-btn">  <a  >

                                                     <a href="#" style="pointer-events: none;"><button style="background-color:#65C21B"
                                                   class="btn btn-primary-filled px-4" disabled><i
                                                       class="fas fa-cart-plus me-2"></i>Stock Out
                                               </button></a>
                                        
                                        
                                        </a>
                                     </div>
                                            </div>
                                        </div>
                                    </div>
                             @endif
                                    
                                @endforeach
                            </div>
                        </div>
                    </section>
                    <!--  End -->
                
     
     
     
                  </div>       
               </div>
   </section>

</main>

@endsection
@section('script')
<!--lazy loading -->
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
                
            $('.loading_img_section').html('');
               if(response.data.length == 0){
                   $('.loading_img_section').html('');
                   return;
               }



               $('.loading_img_section').hide();
               var loadData='';
               
               $.each(response.data,function(index,value){
                loadData+= `
            ${value.product_qty > 0 ?
            `
            <div class="isotopeSelector filter all ec-card-lg">
             <div class="overlay ec-card-inner">
                <div class="border-portfolio">
                   <div class="card product-port">
                      <div class="image-overlay-container">
                         <img src="/${value.product_thambnail}" class="img-fluid  bg-img"
                            alt="portfolio-image">
                      </div>
                      <div class="text-center my-3">
                         <h4 class="text-dark" id="faruk_shovo">${value.product_name} </h4>
                          ${value.unit == null ?
                         `  <br>
                            <b style="font-size:16px; font-weight: bold;"> </b>
                                          `
                                             :
                                          `
                                
                                    <b style="font-size:16px; font-weight: bold;">${value.unit} </b>
                                          
                                   `
                                }     
                                         
                         
                          <!-- Selling and Discount Price Start -->
                          <!-- Selling and Discount Price Start -->


                                        ${value.discount_price < 1 ?
                                          `
                                          <h4 style="color:black; font-size:16px; font-weight: bold"> <span style="font-size:16px; font-weight: bold">৳</span>
                                             ${value.selling_price } </h4>
                                          `
                                          :
                                          `
                                          <h4>
                                            <span style="color:black;font-size:16px; font-weight: bold"> <span style="font-size:16px; font-weight: bold">৳</span>
                                                 ${value.discount_price } </span>
                                            <span><s class="text-danger" style=" font-size:16px; font-weight: bold"><span style="font-size:16px; font-weight: bold">৳</span>
                                                     ${value.selling_price }</s></span>
                                          </h4>
                                          `
                                       }
                                        <!-- Selling and Discount Price End -->


                      </div>
                      
                      <div class="overlay-background">

                         <button class="overlay-add-to-bag"
                           onclick="addToCart(( ${value.id }), <?php echo $productName; ?>)"
                            >Add to <br> Shopping <br> Bag </button>

                             <a class="overlay-details-link"
                                            onclick="groceryproductView( ${value.id })" data-bs-toggle="modal"
                                            data-bs-target="#groceryproductQuickViewModal">Details
                                            >></a>
                     </div>
                   </div>
                   <div class="d-flex justify-content-center cart-details-btn">
                     <a onclick="addToCart(( ${value.id }), <?php echo $productName; ?>)" ><button  style="background-color:#65C21B"
                         class=" btn btn-primary-filled px-4"><i class="fas fa-cart-plus me-2"></i>Shop Now </button></a>

                   </div>
                </div>
             </div>
          </div>
            `:
            `
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
                      
                                              <div id="overlay_background">
                                                    <button class="overlay-add-to-bag"
                                                    disabled>
                                                    <div class="text-danger">
                                                       Stock <br> Out
                                                    </div>
                                                    </button>
                                                   
                                                  </div>
                   </div>
                   <div class="d-flex justify-content-center cart-details-btn">
                     <a  ><button  style="background-color:#65C21B"
                         class=" btn btn-primary-filled px-4" disabled><i class="fas fa-cart-plus me-2"></i> Out of stock </button></a>

                   </div>
                </div>
             </div>
          </div>
            `
                
            }
                

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
