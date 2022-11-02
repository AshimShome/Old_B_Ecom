
@extends('frontend.main_master')
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
   border-radius: 5px; }
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
                                    <a href="{{ url('/fashion') }}" class="logo-container custom-header-ecom-title-home">
                                        <i class="fas fa-home"></i> Fashion Homee
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- ---------- Search with Category  ------------- -->
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
<!-- left sidebar start-->
<div id="sidemenu-container" class="sidemenu-container hide-menu">
    <ul id="category-toggle-custom-sidemenu" class="category-sidemenu">
        @php
        $special_offer = App\Models\Product::where('special_offer','1')->where('ecom_name','3')->count();
       $coupons = App\Models\Coupon::where('status','1')->orderBy('id', 'DESC')->count();
        @endphp
        <li class="menu-heading">
                <a href="{{ url('/special/fashion/offer') }}"><span class="text">Special Offers</span> <span class="number">{{
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
<section class="main-content" id="main-content">
    <div class="container-fluid px-md-5 px-3 mt-3 fashion-home">
        @if(($subsubcategories->isNotEmpty()))
        <div class="category01--banner">
            <div class="row">
                    @php
                $subcategorybanner=App\Models\SubCategorypBanner::where('ecom_id',3)->latest()->get();
                @endphp
                @foreach($subcategorybanner->take(2) as $banner)
                <div class="col-lg-6 col-md-6 com-sm-12 mt-1">
                    <div class="subcat_banner_img h-100">
                        <div class="wrap_left h-100">
                            <img src=" {{ asset( $banner->subcat_banner_image) }}  " alt="bppshops"
                                class="img-fluid w-100 h-100">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- breadcrumb start -->       
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb category-breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/fashion')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{url('product/fashion/category/Product')}}">All Category </a></li>
                
            </ol>
        </nav>    
        <div class="product_items">
            <div id="category_view_cont" class="ec-card-group cause_parent">
                @forelse ($subsubcategories as $subsubcategory)
                <div id="subcategoryShow{{ $subsubcategory->id }}" class="ec-card-lg subCategroyCard">
                    <a
                        href="{{ url('/fabs/'.optional($subsubcategory->category)->category_slug_name.'/'. optional($subsubcategory->subcategory)->sub_category_slug_name.'/'. optional($subsubcategory)->subsubcategory_slug_name) }}">
                        <div class="ec-card-inner">
                            <img class="img-fluid" src=" {{ asset($subsubcategory->subsubcategory_image) }} " alt="">
                            <h4 class="text-dark text-center mt-2">{{ $subsubcategory->subsubcategory_name }}</h4>
                        </div>
                    </a>
                </div>
                 @empty
                @endforelse
            </div>
        </div>       
        @else
        <div class="row px-md-5 px-2 bg-white p-2">
            <form id="filterForm" class="col-md-9">
                @php
                $maxPrice = 10;
                @endphp
                @foreach($productUnderSubCategory as $subsubcat)
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
                            <h6 class="mb-2">By Price</h6>
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
                         <button type="submit" id="filter-btn" class="btn btn-primary-filled px-4">
                            <i class="fas fa-filter text-white"></i>
                            Filter
                        </button>
                    </div>
                </div>
              <input id="subCategory_input" name="subCategory" type="hidden"
                    value="{{ $productUnderSubCategory1?$productUnderSubCategory->first()->sub_category_id:''}}">
            </form>
            <div class="col-md-3 sortby--dropdown check d-flex align-items-center mt-3 mt-md-0" id="filtercombo"
                data-role="fieldcontain">
                <select style="width: auto" id="select_sort_by" class="form-select country"
                    aria-label=".form-select-lg example">
                    <option selected disabled>Sort by:</option>
                    <option value="oldest">Oldest</option>

                    <option value="newest"> Newest</option>

                    <option value="price_low_high">Price: Low to High</option>
                    <option value="price_high_low">Price:High to Low</option>
                    <option value="alphabhatic_a-z" id="alphabhaticOrder">Name: A-Z</option>
                    <option value="alphabhatic_z-a">Name: Z-A</option>
                </select>
            </div>
        </div>
         <section class="popular-products">
                        <div class="product-gallery-wrapper  portfolio-section grid-portfolio ratio2_3 portfolio-padding ">
                        <h3 class="mt-5 text-center"style="color:black" ></h3>
                            <div class="gallery px-lg-5 pt-lg-4 pb-lg-3 px-3 py-3">
                                <div class="products_cont_loader ec-card-group row justify-content-center" id="products-cont">
                                    @forelse ($productUnderSubCategory as $subsubcat)
                               
                                    @if($subsubcat->product_qty <= 0)
                                      <div class="card gallery-item woman">
                                        <div class="gallery-item-inner woman">
                                            <a href="#" id="fashion_details_link" ><img src="{{asset($subsubcat->product_thambnail)}}" alt="" class="product-img"></a>
                                            
                                            <div class=" card-body">
                                                 <a href="#" id="fashion_details_link" > <h4 style="color:black" >{{ $subsubcat->product_name }}</h4></a>
                                                
                                               <!-- Selling and Discount Price Start -->
                                                        @if ($subsubcat->discount_price == 0)
                                                        <h4 class="price_color_and_size" style="color:black"> <span>৳</span>
                                                            {{ intval($subsubcat->selling_price) }} </h4>
                                                        @else
                                                        <h4 class="price_color_and_size">
                                                            <span style="color:black"> <span>৳</span>
                                                                {{ intval($subsubcat->discount_price) }}</span>
                                                            <span><s class="text-danger"><span>৳</span>
                                                                    {{ intval($subsubcat->selling_price) }}</s></span>
                                                        </h4>
                                                        @endif
                                                         <div id="overlay_background">
                                                   
                                                     <div class="text-danger" style="font-size:30px;margin-top:100px">
                                                        Stock <br> Out
                                                     </div>
                                                 </div>
                                                 <div class="fashion-btn-holder">
                                            
                                                     <a class="tooltip-top fashion-btn bg-secondary" href="javascript:void(0)"
                                                     style="pointer-events: none;">Out of Stock</i>
                                                </a>
                                                </div>
                                            </div>
    
                                        </div>
                                        </div>
                                     @else
                                       <div class="card gallery-item woman">
                                        <div class="gallery-item-inner woman">
                                            <a href="{{route('ProductDetailsFashion',[$subsubcat->category_id,$subsubcat->sub_category_id,$subsubcat->product_slug_name ] )}}" id="fashion_details_link" ><img src="{{asset($subsubcat->product_thambnail ) }}" alt="" class="product-img"></a>
                                            
                                            <div class=" card-body">
                                                 <a href="{{route('ProductDetailsFashion',[$subsubcat->category_id,$subsubcat->sub_category_id,$subsubcat->product_slug_name ] )}}" id="fashion_details_link" > <h4 style="color:black" >{{ $subsubcat->product_name }}</h4></a>
                                                
                                               <!-- Selling and Discount Price Start -->
                                                        @if ($subsubcat->discount_price == 0)
                                                        <h4 class="price_color_and_size" style="color:black"> <span>৳</span>
                                                            {{ intval($subsubcat->selling_price) }} </h4>
                                                        @else
                                                        <h4 class="price_color_and_size">
                                                            <span style="color:black"> <span>৳</span>
                                                                {{ intval($subsubcat->discount_price) }}</span>
                                                            <span><s class="text-danger"><span>৳</span>
                                                                    {{ intval($subsubcat->selling_price) }}</s></span>
                                                        </h4>
                                                        @endif
                                                        <!-- Selling and Discount Price End -->
                                                 <div class="fashion-btn-holder">
                                                    <!--<a href="javascript:void(0)" data-bs-toggle="modal" onclick="productViewFashion({{ $subsubcat->id }})" -->
                                                    <!--data-bs-target="#productQuickViewModalFashion" class="fashion-btn">Shop Now-->
                                                    <!--</a>-->
                                                      <a class="fashion-btn" href="{{route('ProductDetailsFashion',[$subsubcat->category_id,$subsubcat->sub_category_id,$subsubcat->product_slug_name ] )}}" id="fashion_details_link" class="cart-btn"><i class="fas fa-shopping-cart"></i> Shop Now</a>
                                                </div>
                                            </div>
    
                                        </div>
                                        </div>
                                      @endif
                                 @empty
                              <h4 style="text-align: center;">Product Not Found</h4>
                            @endforelse
                                </div>
                              <!--<div class="loading_img_section d-block text-center" style="display: none"><img  src="https://i.gifer.com/4V0b.gif" alt="Bppshops" ></div>-->
                            </div>
                        </div>
                    </section>
        @endif
    </div>
    <div class="causes_div">
    </div>
    <div class="container-fluid">
    </div>
    </div>
    </div>
    </div>

</section>
@endsection
@section('script')
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
 <div class="card gallery-item woman">
                            <div class="gallery-item-inner woman">
                             <a  href="/product/detail/fashion/${value.category_id}/${value.sub_category_id}/${value.product_slug_name }" id="fashion_details_link" > <img src="../../../${value.product_thambnail}" alt="" class="product-img"></a>
                               
                                <div class=" card-body">
                                 <a  href="/product/detail/fashion/${value.category_id}/${value.sub_category_id}/${value.product_slug_name }" id="fashion_details_link"><h4 style="color:black">${value.product_name}</h4></a>
                                    
                                   
                                     <!-- Selling and Discount Price Start -->


                                        ${value.discount_price < 1 ?
                                          `
                                          <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                             ${parseInt(value.selling_price)} </h4>
                                          `
                                          :
                                          `
                                          <h4>
                                            <span style="color:black"> <span style="font-size:15px">৳</span>
                                                 ${parseInt(value.discount_price)} </span>
                                            <span><s class="text-danger"><span style="font-size:15px">৳</span>
                                                     ${parseInt(value.selling_price)}</s></span>
                                          </h4>
                                          `
                                       }
                                        <!-- Selling and Discount Price End -->
                                    
                                     <div class="fashion-btn-holder">
                                        <a class="fashion-btn" href="/product/detail/fashion/${value.category_id}/${value.sub_category_id}/${value.product_slug_name }" id="fashion_details_link" class="cart-btn"><i class="fas fa-shopping-cart"></i> Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>

 `:
 `
 <div class="card gallery-item woman">
                            <div class="gallery-item-inner woman">
                             <a   id="fashion_details_link" > <img src="../../../${value.product_thambnail}" alt="" class="product-img"></a>
                               
                                <div class=" card-body">
                                 <a   id="fashion_details_link"><h4 style="color:black">${value.product_name}</h4></a>
                                    
                                   
                                     <!-- Selling and Discount Price Start -->


                                        ${value.discount_price < 1 ?
                                          `
                                          <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                             ${parseInt(value.selling_price)} </h4>
                                          `
                                          :
                                          `
                                          <h4>
                                            <span style="color:black"> <span style="font-size:15px">৳</span>
                                                 ${parseInt(value.discount_price)} </span>
                                            <span><s class="text-danger"><span style="font-size:15px">৳</span>
                                                     ${parseInt(value.selling_price)}</s></span>
                                          </h4>
                                          `
                                       }
                                       
                                          <div id="overlay_background">
                                                   
                                                     <div class="text-danger" style="font-size:30px;margin-top:100px">
                                                        Stock <br> Out
                                                     </div>
                                                 </div>
                                        <!-- Selling and Discount Price End -->
                                    
                                           <div class="fashion-btn-holder">
                                            
                                                     <a class="tooltip-top fashion-btn bg-secondary" href="javascript:void(0)"
                                                     style="pointer-events: none;">Out of Stock</i>
                                                </a>
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
            minPrice: parseFloat(minPrice),
            maxPrice: parseFloat(maxPrice),
            subCategory: subCategory
        }
        
        console.log(submitFormData);


        $.ajax({
            type: 'POST',
            url: '/post/filteredProduct2/fashion/',
            data: submitFormData,
            dataType: "json",
            success: function(response) {
                console.log(response);
                let productsContainterHtml = '';
                 response.forEach((subsubcat) => {

                    let priceHTML = '0';
                    if (subsubcat.discount_price === 0 || subsubcat.discount_price === "0" || subsubcat.discount_price === "0.00") {
                        price =`<span class="text-dark"> ${subsubcat.selling_price}</span>`;
                    } else {
                        price =
                            `<span class="text-dark">${subsubcat.discount_price}</span>, <span style="font-size:15px">৳</span><s class="text-danger">${subsubcat.selling_price}</s>`;
                    }
                    const productHtml =
                        `
                        ${subsubcat.product_qty > 0 ?
                        `
                         <div class="card gallery-item woman">
                            <div class="gallery-item-inner woman">
                             <a  href="/product/detail/fashion/${subsubcat.category_id}/${subsubcat.sub_category_id}/${subsubcat.product_slug_name }" id="fashion_details_link" > <img src="../../../${subsubcat.product_thambnail}" alt="" class="product-img"></a>
                               
                                <div class=" card-body">
                                 <a  href="/product/detail/fashion/${subsubcat.category_id}/${subsubcat.sub_category_id}/${subsubcat.product_slug_name }" id="fashion_details_link" ><h4 style="color:black">${subsubcat.product_name}</h4></a>
                                    
                                   
                                     <!-- Selling and Discount Price Start -->


                                        ${subsubcat.discount_price < 1 ?
                                          `
                                          <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                             ${parseInt(subsubcat.selling_price)} </h4>
                                          `
                                          :
                                          `
                                          <h4>
                                            <span style="color:black"> <span style="font-size:15px">৳</span>
                                                 ${parseInt(subsubcat.discount_price)} </span>
                                            <span><s class="text-danger"><span style="font-size:15px">৳</span>
                                                     ${parseInt(subsubcat.selling_price)}</s></span>
                                          </h4>
                                          `
                                       }
                                        <!-- Selling and Discount Price End -->
                                    
                                     <div class="fashion-btn-holder">
                                        <a class="fashion-btn" href="/product/detail/fashion/${subsubcat.category_id}/${subsubcat.sub_category_id}/${subsubcat.product_slug_name }" id="fashion_details_link" class="cart-btn"><i class="fas fa-shopping-cart"></i> Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        `:
                        `
                         <div class="card gallery-item woman">
                            <div class="gallery-item-inner woman">
                             <a   id="fashion_details_link" > <img src="../../../${subsubcat.product_thambnail}" alt="" class="product-img"></a>
                               
                                <div class=" card-body">
                                 <a   id="fashion_details_link" ><h4 style="color:black">${subsubcat.product_name}</h4></a>
                                    
                                   
                                     <!-- Selling and Discount Price Start -->


                                        ${subsubcat.discount_price < 1 ?
                                          `
                                          <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                             ${parseInt(subsubcat.selling_price)} </h4>
                                          `
                                          :
                                          `
                                          <h4>
                                            <span style="color:black"> <span style="font-size:15px">৳</span>
                                                 ${parseInt(subsubcat.discount_price)} </span>
                                            <span><s class="text-danger"><span style="font-size:15px">৳</span>
                                                     ${parseInt(subsubcat.selling_price)}</s></span>
                                          </h4>
                                          `
                                       }
                                       
                                        <div id="overlay_background">
                                                   
                                                     <div class="text-danger" style="font-size:30px;margin-top:100px">
                                                        Stock <br> Out
                                                     </div>
                                                 </div>
                                        <!-- Selling and Discount Price End -->
                                    
                                     <div class="fashion-btn-holder">
                                            
                                         <a class="tooltip-top fashion-btn bg-secondary" href="javascript:void(0)"
                                         style="pointer-events: none;">Out of Stock</i>
                                    </a>
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
                $('.ec-card-group').html(productsContainterHtml);
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
            if (product.discount_price === 0 || product.discount_price === "0" || product.discount_price === "0.00") {
                price = product.selling_price;
            } else {
                price =
                    `<span class="text-dark">${product.discount_price}</span>, <span style="font-size:15px">৳</span><s class="text-danger">${product.selling_price}</s>`;
            }
            const productHtml =
                            `
                            ${product.product_qty > 0 ?
                            `
                            <div class="card gallery-item woman">
                            <div class="gallery-item-inner woman">
                             <a  href="/product/detail/fashion/${product.category_id}/${product.sub_category_id}/${product.product_slug_name }" id="fashion_details_link" ><img src="../../../${product.product_thambnail}" alt="" class="product-img"></a>
                                
                                <div class=" card-body">
                                 <a  href="/product/detail/fashion/${product.category_id}/${product.sub_category_id}/${product.product_slug_name }" id="fashion_details_link" ><h4 style="color:black">${product.product_name}</h4></a>
                                    
                                   
                                     <!-- Selling and Discount Price Start -->


                                        ${product.discount_price < 1 ?
                                          `
                                          <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                             ${parseInt(product.selling_price)} </h4>
                                          `
                                          :
                                          `
                                          <h4>
                                            <span style="color:black"> <span style="font-size:15px">৳</span>
                                                 ${parseInt(product.discount_price)} </span>
                                            <span><s class="text-danger"><span style="font-size:15px">৳</span>
                                                     ${parseInt(product.selling_price)}</s></span>
                                          </h4>
                                          `
                                       }
                                        <!-- Selling and Discount Price End -->
                                    
                                     <div class="fashion-btn-holder">
                                         <a class="fashion-btn" href="/product/detail/fashion/${product.category_id}/${product.sub_category_id}/${product.product_slug_name }" id="fashion_details_link" class="cart-btn"><i class="fas fa-shopping-cart"></i> Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                            `:
                            `
                            <div class="card gallery-item woman">
                            <div class="gallery-item-inner woman">
                             <a   id="fashion_details_link" ><img src="../../../${product.product_thambnail}" alt="" class="product-img"></a>
                                
                                <div class=" card-body">
                                 <a   id="fashion_details_link" ><h4 style="color:black">${product.product_name}</h4></a>
                                    
                                   
                                     <!-- Selling and Discount Price Start -->


                                        ${product.discount_price < 1 ?
                                          `
                                          <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                             ${parseInt(product.selling_price)} </h4>
                                          `
                                          :
                                          `
                                          <h4>
                                            <span style="color:black"> <span style="font-size:15px">৳</span>
                                                 ${parseInt(product.discount_price)} </span>
                                            <span><s class="text-danger"><span style="font-size:15px">৳</span>
                                                     ${parseInt(product.selling_price)}</s></span>
                                          </h4>
                                          `
                                       }
                                        <!-- Selling and Discount Price End -->
                                    <div id="overlay_background">
                                                   
                                                     <div class="text-danger" style="font-size:30px;margin-top:100px">
                                                        Stock <br> Out
                                                     </div>
                                                 </div>
                                     <div class="fashion-btn-holder">
                                            
                                         <a class="tooltip-top fashion-btn bg-secondary" href="javascript:void(0)"
                                         style="pointer-events: none;">Out of Stock</i>
                                    </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                            `}
                            
                               `;

            product_view_cont_html = product_view_cont_html + productHtml;
        });
        $('.ec-card-group').html(product_view_cont_html);
    }
    $('#select_sort_by').change(function() {   
        const subCategory = $('#subCategory_input').val();
        const selectedValue = $('#select_sort_by').val();
        $.ajax({
            type: 'GET',
            url: '/get/subproductSort/fashion/sub/' + subCategory,
            success: function(response) {
                if (selectedValue === 'alphabhatic_a-z') {
                    function alphabhaticReorder(a, b) {
                        if (a.product_name.toLowerCase() < b.product_name.toLowerCase()) {
                            return -1;
                        }
                        if (a.product_name.toLowerCase() > b.product_name.toLowerCase()) {
                            return 1;
                        }
                        return 0;
                    }
                    response.sort(alphabhaticReorder);
                    renderResponseToProduct(response);
                } else if (selectedValue === 'alphabhatic_z-a') {
                    function alphabhaticReorder(a, b) {
                        if (a.product_name.toLowerCase() > b.product_name.toLowerCase()) {
                            return -1;
                        }
                        if (a.product_name.toLowerCase() < b.product_name.toLowerCase()) {
                            return 1;
                        }
                        return 0;
                    }
                    response.sort(alphabhaticReorder);
                    renderResponseToProduct(response);

                } else if (selectedValue === 'price_low_high') {
                    function alphabhaticReorder(a, b) {
                        if (parseFloat(a.selling_price) < parseFloat(b.selling_price)) {
                            return -1;
                        }
                        if (parseFloat(a.selling_price) > parseFloat(b.selling_price)) {
                            return 1;
                        }
                        return 0;
                    }
                    // console.log(response);
                    response.sort(alphabhaticReorder);
                    renderResponseToProduct(response);
                } else if (selectedValue === 'price_high_low') {
                    function alphabhaticReorder(a, b) {
                        if (parseFloat(a.selling_price) > parseFloat(b.selling_price)) {
                            return -1;
                        }
                        if (parseFloat(a.selling_price) < parseFloat(b.selling_price)) {
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
