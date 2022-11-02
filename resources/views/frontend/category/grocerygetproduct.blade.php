@extends('frontend.main_master')
@section('islamic')
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
   border-radius: 5px; }
   
   .price_grocery_style{
       font-weight: bold; 
       margin-top: 10px;
      
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
        $categories=App\Models\Category::where('status',1)->with('subcategory')->where('ecom_id','2')->get();
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
                                            $sub_subcategories=App\Models\SubSubCategory::with(['category'=>function($q){
                                             $q->where('status',1);
                                             }
                                            ,'subcategory'=>function($q){
                                             $q->where('status',1);
                                             }
                                            ])->where('subcategory_id',$subcategory->id)->get();
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
    <div class="container-fluid px-3 mt-3">
        <!-- breadcrumb start -->
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb category-breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/grocery')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('grocery_category_view.view') }}">All Category</a></li>
            </ol>
        </nav>
        <!-- ~~~~filter button starts~~~~~ -->
        <div class="row px-md-5 px-2 bg-white p-2">
            <form id="filterForm" class="col-md-9">
                @php
                $maxPrice = 0;
                @endphp
                @foreach($getproductsub as $subsubcat)
                {{-- ---------- Get Max Price ----------- --}}
                @php
                if ((float) $subsubcat->selling_price > $maxPrice) {
                $maxPrice = (float) $subsubcat->selling_price;
                }
                @endphp
                @endforeach
                @php
                $step = $maxPrice / 100;
                @endphp
                <div class="d-flex">
                    <div data-role="page">
                        <div data-role="header">
                            <h1 class="mb-2" style="font-size:14px;font-weight:400px;">By Price</h1>
                        </div>
                        <div class="range-slider">
                            <input name="minPrice" value="0" min="0" max="{{ $maxPrice }}" step="{{ $step }}"
                                type="range">
                            <input name="maxPrice" value="{{ $maxPrice }}" min="0" max="{{ $maxPrice }}"
                                step="{{ $step }}" type="range">
                            <div class="pt-3">
                                <span>Range: </span><span class="rangeValues"></span>
                            </div>
                        </div>
                    </div>
                    <div class="ms-4 d-flex align-items-center">
                        <button type="submit" id="filter-btn" class="btn btn-primary-filled px-4" style="background-color:#65C21B">
                            <i class="fas fa-filter text-white"></i>
                            Filter
                        </button>
                    </div>
                </div>
                   @if($getproductsub1 == null)
                <input id="subCategory_input" name="subCategory" type="hidden" value="">
                @else
                <input id="subCategory_input" name="subCategory" type="hidden"
                    value="{{$getproductsub[0]->sub_sub_category_id }}">
                @endif
            </form>
            <div class="col-md-3 sortby--dropdown check d-flex align-items-center mt-3 mt-md-0" id="filtercombo"
                data-role="fieldcontain">
                <select style="width: auto" id="select_sort_byw" class="form-select country"
                    aria-label=".form-select-lg example">
                    <option selected disabled>Sort by:</option>
                    <option value="oldest">Oldest</option>
                    <option value="newest"> Newest</option>
                    <option value="price_low_high">Price: Low to High</option>
                    <option value="price_high_low">Price:High to Low</option>
                    <option value="alphabhatic_a-z" id="alphabhaticOrder">Name: A-Z</option>
                    <option value="alphabhatic_z-a">Name: Z-A</option>
                    {{-- <option value="2">Rating: Low to High</option>
                    <option value="2">Rating: High to Low</option> --}}
                </select>
            </div>
        </div>
        <!-- ~~~~filter button ends~~~~~ -->
        <section class="popular-products">
            <div class="product-gallery-wrapper  portfolio-section grid-portfolio ratio2_3 portfolio-padding ">
                <div id="products-cont" class="ec-card-group zoom-gallery portfolio-2 px-lg-5 px-3 py-3">
                    @forelse($getproductsub as $subsubcat)
                    
                    @if($subsubcat->product_qty>0)
                    <div class="isotopeSelector filter all ec-card-lg">
                        <div class="overlay ec-card-inner">
                            <div class="border-portfolio">
                                <div class="card product-port">
                                    <div class="image-overlay-container">
                                        <img class="img-fluid" src=" {{ asset($subsubcat->product_thambnail) }} "
                                            alt="">
                                    </div>
                                    <div class="text-center mt-3 mb-0">
                                        <h4 class="text-dark">{{ $subsubcat->product_name }}</h4>
                                        <h4 class="text-dark">{{ $subsubcat->subsubcategory_name }}</h4>
                                        <small style="color:black; font-weight: 900; font-size: 16px">{{ $subsubcat->unit }}</small>
                                        
                                        
                                        <h4 style="padding:5px" class="price_grocery_style">
                                            @if($subsubcat->discount_price == 0)
                                            <span style="color:black; font-weight: 900; font-size: 16px;" class="text-dark">৳ {{ intval($subsubcat->selling_price) }} </span>
                                            @else
                                            <span class="text-dark" style="color:black; font-weight: 900; font-size: 16px">৳ {{ intval($subsubcat->discount_price) }} </span>,
                                            <s class="text-danger" style="color:black; font-weight: 900; font-size: 16px">৳ {{ intval($subsubcat->selling_price) }}</s>
                                            @endif
                                        </h4>
                                        
                                        
                                    </div>
                                    <?php $productName = strval("'" . $subsubcat->product_name . "'");?>
       
                                    <div class="overlay-background">
                                          <button class="overlay-add-to-bag" onclick="addToCart({{ $subsubcat->id }}, <?php echo $productName; ?>)"> Add to <br> Shopping <br> Bag
                                          
                                          </button>  <a class="overlay-details-link" onclick="groceryproductView({{ $subsubcat->id }})" data-bs-toggle="modal"
                                          data-bs-target="#groceryproductQuickViewModal">Details>></a>
                                    </div>
  
                                </div>
                                <div class="d-flex justify-content-center cart-details-btn">
                                    <a onclick="addToCart({{ $subsubcat->id }}, <?php echo $productName; ?>)" >
                                        <button
                                            class="btn btn-primary-filled px-4" style="background-color: #65C21B"><i
                                                class="fas fa-cart-plus me-2"></i>Shop Now
                                        </button></a>
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
                                        <img class="img-fluid" src=" {{ asset($subsubcat->product_thambnail) }} "
                                            alt="">
                                    </div>
                                    <div class="text-center mt-3 mb-0">
                                        <h4 class="text-dark">{{ $subsubcat->product_name }}</h4>
                                        <h4 class="text-dark">{{ $subsubcat->subsubcategory_name }}</h4>
                                        <small>{{ $subsubcat->unit }}</small>
                                        <h4 style="padding:5px">
                                            @if($subsubcat->discount_price == 0)
                                            <span class="text-dark">৳ {{ intval($subsubcat->selling_price) }}</span>
                                            @else
                                            <span class="text-dark">৳ {{ intval($subsubcat->discount_price) }}</span>,
                                            <s class="text-danger">৳ {{ intval($subsubcat->selling_price) }}</s>
                                            @endif
                                        </h4>
                                    </div>
                                    <?php $productName = strval("'" . $subsubcat->product_name . "'");?>
                                     <div id="overlay_background">
                                                     <button class="overlay-add-to-bag" disabled>
                                                         <div class="text-light">
                                                            Stock <br> Out
                                                         </div>
                                                    </button>
                                                   
                                                   </div>
                                </div>
                                <div class="d-flex justify-content-center cart-details-btn">
                                    <a>
                                        <button
                                            class="btn btn-primary-filled px-4" style="background-color: #65C21B" disabled><i
                                                class="fas fa-cart-plus me-2"></i>Stock Out
                                        </button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                     @empty
                    <h4>Product Not Found</h4>
                    @endforelse
                    
                </div>
                <!--<div class="loading_img_section d-block text-center" style="display: none"><img  src="https://i.gifer.com/4V0b.gif" alt="" ></div>-->
            </div>
        </section>
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
                          ${value?.unit == null ?
                         `
                                          <b style="font-size:18px"></b>
                                          `
                                             :
                                          `
                                          <b style="font-size:18px; color: black">${value.unit}  </b>
                                  
                                          
                                   `
                                }     
                        
                        <!-- <small>${value.unit}</small>--->
                          <!-- Selling and Discount Price Start -->


                                        ${value.discount_price < 1 ?
                                          `
                                          
                                          <h4 style="color:black; font-weight: 900; font-size: 16px" class="price_grocery_style"> <span style="font-size:15px">৳</span>
                                             ${parseInt(value.selling_price)} </h4>
                                          `
                                          :
                                          `
                                         
                                          <h4 class="price_grocery_style" >
                                            <span style="color:black; font-weight: 900; font-size: 16px "> <span style="font-size:15px; font-weight: 900; font-size: 16px">৳</span>
                                                 ${parseInt(value.discount_price)} </span>
                                            <span >
                                            <s class="text-danger" style="font-weight: 900; font-size: 16px">
                                            <span>৳</span> 
                                            ${parseInt(value.selling_price)}</s>
                                            </span>
                                          </h4>
                                          `
                                       }
                                        <!-- Selling and Discount Price End -->

                                    
                                        <!-- Selling and Discount Price End -->
                                        </div>   
                                         ${value.product_qty < 1 ?
                                          `
                                           <div id="overlay_background">
                                                     <button class="overlay-add-to-bag" disabled>
                                                         <div class="text-light">
                                                            Stock <br> Out
                                                         </div>
                                                    </button>
                                                   
                                                   </div> 
                                </div>
                                <div class="d-flex justify-content-center cart-details-btn">
                                 <a style="background-color:#b6e392 !important" onclick=""
                                        data-bs-toggle="modal" data-bs-target=""><button style="background-color:#b6e392" class="btn btn-primary-filled px-4"><i
                                                class="fas fa-cart-plus me-2"></i> Out of stock
                                        </button></a> 
                                </div>
                                          `
                                          :
                                          `
                                             <div class="overlay-background">
                                          <button class="overlay-add-to-bag" onclick="addToCart( ${value.id }, <?php echo $productName; ?>)"                                                           
                                         > Add to <br> Shopping <br> Bag </button>
                                         <a class="overlay-details-link"
                                            onclick="groceryproductView( ${value.id })" data-bs-toggle="modal"
                                            data-bs-target="#groceryproductQuickViewModal">Details
                                            >></a>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center cart-details-btn">
                                    <a onclick="addToCart( ${value.id}, <?php echo $productName; ?>)"
                                       ><button style="background-color:#65C21B" class="btn btn-primary-filled px-4"><i
                                                class="fas fa-cart-plus me-2"></i>Shop Now
                                        </button></a> 
                                </div>
                                          `
                                       }

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



<script>
    //--------------- Price Slider ---------------
function getCategoryPriceSliderValue() {
    // Get slider values
    let parent = this.parentNode;
    let slides = parent.getElementsByTagName("input");
    let slide1 = parseFloat(slides[0].value);
    let slide2 = parseFloat(slides[1].value);
    // Neither slider will clip the other, so make sure we determine which is larger
    if (slide1 > slide2) {
        let tmp = slide2;
        slide2 = slide1;
        slide1 = tmp;
    }

    let displayElement = parent.getElementsByClassName("rangeValues")[0];
    displayElement.innerHTML = "৳ " + slide1 + " - ৳ " + slide2;
}

window.onload = function() {
    // Initialize Sliders
    let sliderSections = document.getElementsByClassName("range-slider");
    for (let x = 0; x < sliderSections.length; x++) {
        let sliders = sliderSections[x].getElementsByTagName("input");
        for (let y = 0; y < sliders.length; y++) {
            if (sliders[y].type === "range") {
                sliders[y].oninput = getCategoryPriceSliderValue;
                // Manually trigger event first time to display values
                sliders[y].oninput();
            }
        }
    }
}


$(document).ready(function() {
    $('#filterForm').submit(function(e) {
        e.preventDefault();
        const formData = $('#filterForm').serializeArray();
        let brandArray = [];
        let maxPrice = 0;
        let minPrice = 0;
        let subCategory = '';


        formData.forEach(data => {
            if (data.name === 'brand') {
                brandArray = [...brandArray, data.value];
            } else if (data.name === 'minPrice') {
                minPrice = data.value;
            } else if (data.name === 'maxPrice') {
                maxPrice = data.value;
            } else if (data.name === 'subCategory') {
                subCategory = data.value;
            }
        });

        const submitFormData = {
            minPrice: minPrice,
            maxPrice: maxPrice,
            subCategory: subCategory
        }


        $.ajax({
            type: 'POST',
            url: '/post/filteredProductgetpage',
            data: submitFormData,
            dataType: "json",
            success: function(response) {
                let productsContainterHtml = '';
                response.forEach(subsubcat => {

                    let priceHTML = '0';
                    if (subsubcat.discount_price == 0) {
                        price = subsubcat.selling_price;
                    } else {
                        price =
                            `<span class="text-dark">${parseInt(subsubcat.discount_price)}</span>, ৳<s class="text-danger">${parseInt(subsubcat.selling_price)}</s>`;
                    }
                    const productHtml =
                        `
                         ${subsubcat.product_qty > 0 ?
                         `
                          <div class="isotopeSelector filter all ec-card-lg">
                                    <div class="overlay ec-card-inner">
                                        <div class="border-portfolio">
                                            <div class="card product-port">
                                                <div class="image-overlay-container">
                                                <a>
                                                    <img class="img-fluid"
                                                        src="../../../${subsubcat.product_thambnail}" alt="">
                                                         </a>
                                                </div>
                                                <div class="text-center mt-3 mb-0">
                                                 <a>
                                                    <h4 class="text-dark">${subsubcat.product_name}</h4>
                                                         </a>
                                                    
                                                    <small style="color:black; font-weight: 900; font-size: 16px" >${subsubcat.unit}</small>

                                                     ${subsubcat.discount_price < 1 ?
                                                      `
                                                      
                                                      <h4 style="color:black; font-weight: 900; font-size: 16px" class="price_grocery_style"> <span style="font-size:15px">৳</span>
                                                         ${parseInt(subsubcat.selling_price)} </h4>
                                                      `
                                                      :
                                                      `
                                                     
                                                      <h4 class="price_grocery_style" >
                                                        <span style="color:black; font-weight: 900; font-size: 16px "> <span style="font-size:15px; font-weight: 900; font-size: 16px">৳</span>
                                                             ${parseInt(subsubcat.discount_price)} </span>
                                                        <span >
                                                        <s class="text-danger" style="font-weight: 900; font-size: 16px">
                                                        <span>৳</span> 
                                                        ${parseInt(subsubcat.selling_price)}</s>
                                                        </span>
                                                      </h4>
                                                      `
                                                   }
                                                </div>

                                                <div class="overlay-background">
                                                  <button class="overlay-add-to-bag" onclick="addToCart( ${subsubcat.id }, <?php echo $productName; ?>)"                                                           
                                                 > Add to <br> Shopping <br> Bag </button>
                                                 <a class="overlay-details-link"
                                                    onclick="groceryproductView( ${subsubcat.id })" data-bs-toggle="modal"
                                                    data-bs-target="#groceryproductQuickViewModal">Details
                                                    >></a>
                                            </div>
                                            </div>
                                            <div class="d-flex justify-content-center cart-details-btn">
                                                <a onclick="addToCart( ${subsubcat.id}, <?php echo $productName; ?>)"
                                                    ><button style="background-color:#65C21B" class="btn btn-primary-filled px-4"><i
                                                            class="fas fa-cart-plus me-2"></i>Shop Now
                                                    </button></a> 
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
                                                <a  href="/product/detail/${subsubcat.category_id}/${subsubcat.sub_category_id}/${subsubcat.product_slug_name }">
                                                    <img class="img-fluid"
                                                        src="../../../${subsubcat.product_thambnail}" alt="">
                                                         </a>
                                                </div>
                                                <div class="text-center mt-3 mb-0">
                                                 <a  href="/product/detail/${subsubcat.category_id}/${subsubcat.sub_category_id}/${subsubcat.product_slug_name }">
                                                    <h4 class="text-dark">${subsubcat.product_name}</h4>
                                                         </a>
                                                    
                                                    <small>${subsubcat?.unit}</small>

                                                    <h4 style="padding:5px">
                                                        ৳ ${parseInt(price)}
                                                    </h4>
                                                </div>
                                                <div id="overlay_background">
                                                     <button class="overlay-add-to-bag" disabled>
                                                         <div class="text-light">
                                                            Stock <br> Out
                                                         </div>
                                                    </button>
                                                   
                                                   </div>
                                            </div>
                                            <div class="d-flex justify-content-center cart-details-btn">
                                                <a 
                                                    ><button style="background-color:#65C21B" class="btn btn-primary-filled px-4"><i
                                                            class="fas fa-cart-plus me-2" disable></i>Out of stock
                                                    </button></a> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                         `
                             
                         }
                       
                        `;
                    productsContainterHtml = productsContainterHtml +
                        productHtml;
                });
                $('#products-cont').html(productsContainterHtml);
            }
        });
    });
});
</script>

{{-- for sorting --}}
<script>
    $(document).ready(function() {
    const renderResponseToProduct = (response) => {
        let product_view_cont_html = '';
        response.forEach(product => {

            let priceHTML = '0';
            if (product.discount_price == 0) {
                price = product.selling_price;
            } else {
                price =
                    `<span class="text-dark">${product.discount_price}</span>, ৳<s class="text-danger">${product.selling_price}</s>`;
            }
            const productHtml =
                `
                ${product.product_qty > 0 ?
                `
                <div class="isotopeSelector filter all ec-card-lg">
                                    <div class="overlay ec-card-inner">
                                        <div class="border-portfolio">
                                            <div class="card product-port">
                                                <div class="image-overlay-container">
                                                <a> 
                                                
                                                    <img class="img-fluid"
                                                        src="../../../${product.product_thambnail}" alt="">
                                                         </a>
                                                </div>
                                                <div class="text-center mt-3 mb-0">
                                                <a >
                                                     <h4 class="text-dark">${product.product_name}</h4>
                                                         </a>
                                                   
                                                     ${product?.unit == null ?  
                                                     `    <b style="font-size:16px"></b>  ` 
                                                     :
                                                     ` <b style="font-size:16px; color: black">${product.unit} </b> `  } 
                                                    
                                                   ${product.discount_price < 1 ?
                                                      `
                                                      
                                                      <h4 style="color:black; font-weight: 900; font-size: 16px" class="price_grocery_style"> <span style="font-size:15px">৳</span>
                                                         ${parseInt(product.selling_price)} </h4>
                                                      `
                                                      :
                                                      `
                                                     
                                                      <h4 class="price_grocery_style" >
                                                        <span style="color:black; font-weight: 900; font-size: 16px "> <span style="font-size:15px; font-weight: 900; font-size: 16px">৳</span>
                                                             ${parseInt(product.discount_price)} </span>
                                                        <span >
                                                        <s class="text-danger" style="font-weight: 900; font-size: 16px">
                                                        <span>৳</span> 
                                                        ${parseInt(product.selling_price)}</s>
                                                        </span>
                                                      </h4>
                                                      `
                                                   }
                                                </div>
                                                  <div class="overlay-background">
                                                  <button class="overlay-add-to-bag" onclick="addToCart( ${product.id }, <?php echo $productName; ?>)"                                                           
                                                 > Add to <br> Shopping <br> Bag </button>
                                                 <a class="overlay-details-link"
                                                    onclick="groceryproductView( ${product.id })" data-bs-toggle="modal"
                                                    data-bs-target="#groceryproductQuickViewModal">Details
                                                    >></a>
                                            </div>
                                            </div>
                                            <div class="d-flex justify-content-center cart-details-btn">
                                                    <a onclick="addToCart( ${product.id }, <?php echo $productName; ?>)"
                                                        ><button style="background-color:#65C21B" class="btn btn-primary-filled px-4"><i
                                                                class="fas fa-cart-plus me-2"></i>Shop Now
                                                        </button></a> 
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
                                                <a> 
                                                
                                                    <img class="img-fluid"
                                                        src="../../../${product.product_thambnail}" alt="">
                                                         </a>
                                                </div>
                                                <div class="text-center mt-3 mb-0">
                                                <a >
                                                     <h4 class="text-dark">${product.product_name}</h4>
                                                         </a>
                                                   
                                                     ${product?.unit == null ?  
                                                     `    <b style="font-size:16px"></b>  ` 
                                                     :
                                                     ` <b style="font-size:16px; color: black">${product.unit} </b> `  } 
                                                    <h4 style="padding:5px">
                                                        ৳ ${parseInt(price)}
                                                    </h4>
                                                </div>

                                               <div id="overlay_background">
                                                     <button class="overlay-add-to-bag" disabled>
                                                         <div class="text-light">
                                                            Stock <br> Out
                                                         </div>
                                                    </button>
                                                   
                                                   </div>
                                            </div>
                                              <div class="d-flex justify-content-center cart-details-btn">
                                                <a 
                                                    ><button style="background-color:#65C21B" class="btn btn-primary-filled px-4"><i
                                                            class="fas fa-cart-plus me-2" disable></i>Out of stock
                                                    </button></a> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                `
                    
                }
            
            `;

            product_view_cont_html = product_view_cont_html + productHtml;
        });

        $('#products-cont').html(product_view_cont_html);
    }


    $('#select_sort_byw').change(function() {
        console.log('ddddddddddddddddddddd');

        const subCategory = $('#subCategory_input').val();
        console.log(subCategory);

        const selectedValue = $('#select_sort_byw').val();
        console.log(selectedValue);
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            type: 'GET',
            url: '/get/subproductSort/grocery/' + subCategory,
            success: function(response) {
                console.log(response);
                if (selectedValue === 'alphabhatic_a-z') {
                    function alphabhaticReorder(a, b) {
                        if (a.product_name < b.product_name) {
                            return -1;
                        }
                        if (a.product_name > b.product_name) {
                            return 1;
                        }
                        return 0;
                    }
                    response.sort(alphabhaticReorder);
                    renderResponseToProduct(response);
                } else if (selectedValue === 'alphabhatic_z-a') {
                    function alphabhaticReorder(a, b) {
                        if (a.product_name > b.product_name) {
                            return -1;
                        }
                        if (a.product_name < b.product_name) {
                            return 1;
                        }
                        return 0;
                    }
                    response.sort(alphabhaticReorder);
                    renderResponseToProduct(response);

                } else if (selectedValue === 'price_low_high') {
                    function alphabhaticReorder(a, b) {
                        if (a.selling_price < b.selling_price) {
                            return -1;
                        }
                        if (a.selling_price > b.selling_price) {
                            return 1;
                        }
                        return 0;
                    }
                    response.sort(alphabhaticReorder);
                    renderResponseToProduct(response);
                } else if (selectedValue === 'price_high_low') {
                    function alphabhaticReorder(a, b) {
                        if (a.selling_price > b.selling_price) {
                            return -1;
                        }
                        if (a.selling_price < b.selling_price) {
                            return 1;
                        }
                        return 0;
                    }
                    response.sort(alphabhaticReorder);
                    renderResponseToProduct(response);
                } else if (selectedValue === 'newest') {
                    function alphabhaticReorder(a, b) {
                        if (a.id < b.id) {
                            return -1;
                        }
                        if (a.id > b.id) {
                            return 1;
                        }
                        return 0;
                    }
                    response.sort(alphabhaticReorder);
                    renderResponseToProduct(response);
                } else if (selectedValue === 'oldest') {
                    function alphabhaticReorder(a, b) {
                        if (a.id > b.id) {
                            return -1;
                        }
                        if (a.id < b.id) {
                            return 1;
                        }
                        return 0;
                    }
                    response.sort(alphabhaticReorder);
                    renderResponseToProduct(response);
                }
            }
        });
    });
});
</script>
@endsection
