@extends('frontend.main_master')
@section('islamic')
    <style>
     
     /* for price and color size set*/
  .price_color_and_size{
      font-size:16px;
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
    .gallery-item-inner{
        height: 412px!important;
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
        min-height: 35px;
        font-size: 16px;
        font-weight: 700;
        color: #356BBD;
        margin-bottom: 0;
    }
    
    .electronic .display-products-card .card-footer {
        background-color: transparent;
        border-top: 0;
    }
    
    .electronic .display-products-card .card-footer .rating {
        font-size: 12px;
        text-align: center;
    }
    .card-footer{
        position: relative;
    }
    .card-footer button{
        z-index: 99;
    }
    .card-footer hr{
        position: absolute;
        bottom: 9px;
        width: 100%;
    }
    
    .display-products-card .product-title{
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2; 
        -webkit-box-orient: vertical;
        min-height: 30px!important;
    }
    
    @media only screen and (max-width: 600px) {
        .custom-header-ecom-title {
            margin-top: 100px!important;
        }
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
        
<div id="sidemenu-container" class="sidemenu-container hide-menu">
    <ul id="category-toggle-custom-sidemenu" class="category-sidemenu">
        @php
        $special_offer_subcat = App\Models\Product::where('special_offer','1')->where('ecom_name','4')->count();
        $coupons = App\Models\Coupon::where('status','1')->orderBy('id', 'DESC')->count();
        @endphp
        <li class="menu-heading">
            <a href="{{ url('/special/fashion/offer') }}"><span class="text">Special Offers</span> <span class="number">{{
                    $special_offer_subcat }}</span></a>
            
        @php
        $currentUrl = Request::segment(3);
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
<!-- Left Sidebar -->
<section class="main-content" id="main-content">
    <div class="container-fluid px-3 mt-3 fashion-home">
        <!-- breadcrumb start -->
         <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb category-breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/electronic')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a  href="{{url('electronic/all/category')}}">All Category </a></li>
              

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
                
                   @if($getproductsub1 == '0')
                <input id="subCategory_input" name="subCategory" type="hidden" value="">
                @else
                <input id="subCategory_input" name="subCategory" type="hidden"
                    value="{{optional($getproductsub[0])->sub_sub_category_id }}">
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
                </select>
            </div>
            
            
            
        </div>
        
           <section class="popular-products">
                        <div class="product-gallery-wrapper  portfolio-section grid-portfolio ratio2_3 portfolio-padding ">
                        <h3 class="mt-5 text-center"style="color:black" ></h3>
                            <div class="gallery electronic px-lg-5 pt-lg-4 pb-lg-3 px-3 py-3">
                                <div class="ec-card-group row justify-content-center ec-card-group" id="products-cont">
                                    @foreach ($getproductsub as $subsubcat)
                                        <div class="card display-products-card px-0">
                                                <a onclick="electronicPoductView({{ $subsubcat->id }})" data-bs-toggle="modal"
                                                            data-bs-target="#productQuickViewModalElectronics">
                                                    <div class="card-header p-3">
                                                        <img class="img-fluid"
                                                            src="{{ asset('/' . $subsubcat->product_thambnail) }}" alt="">
                                                    </div>
                                                    <div class="card-body pt-2 pb-1">
                                                        <h6 class="product-title">{{ $subsubcat->product_name }}</h6>
                                                    </div>
                                                    <div class="card-footer">
                                                         <div class="rating">
                                                          
                                                            @if(count($subsubcat->review) == 0)
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
                                                                @foreach ($subsubcat->review as $review )
                                                                <div id="pvm-rating" class="modal-rating">
                                                                    @php
                                                                        $rating = $rating+((intval($review->quality) + intval($review->price) + intval($review->value)) / 3);
                                                                    @endphp
                                                                @endforeach
                                                                    @php
                                                                        $rating = $rating/count($subsubcat->review);
                                                                        $rating_blank = 5 - floor($rating);
                                                                    @endphp
                                                                    <ul class="rating">
                                                                        @for ($i = 1; $i <= $rating; $i++)
                                                                            <li><i class="fa-solid fa-star text-warning"></i></li>
                                                                        @endfor
                                                                        @for ($i = 1; $i <= $rating_blank; $i++)
                                                                            <li><i class="fa-solid fa-star" style="color: #c2c2c2!important"></i></li>
                                                                        @endfor
                                                                            <li>({{count($subsubcat->review)}})</li>
                                                                    </ul>
                                                                </div>
                                                            @endif
                                                        </div>
                                                       
                                                  
                                                    
                                                     @if ($subsubcat->discount_price != 0)

                                                            <h6 class="my-2 text-dark fw-bold" style="display: flex; justify-content: center;" >
                                                                <del  class="text-danger">&#2547;{{ intval($subsubcat->selling_price) }}</del>	&nbsp; &#2547;{{ intval($subsubcat->discount_price) }}</h6>
                                                        
                                                        @else
                                                            <h6 class="my-2 text-dark fw-bold" style="display: flex; justify-content: center;">&#2547;{{ intval($subsubcat->selling_price) }}</h6>
                                                    @endif
                                                    </div>
                                                </a>
                                                  <div class="card-footer px-0 pt-0">
                                                    <div class="add-to-card-cont" style="display: flex; justify-content: center;">
                                                        <button onclick="electronicPoductView({{ $subsubcat->id }})" data-bs-toggle="modal"
                                                            data-bs-target="#productQuickViewModalElectronics"
                                                            class="btn btn-primary-filled px-4 py-1" style="background-color:#008081">Add to
                                                            Cart</button>
                                                    </div>
                                                    <hr/>
                                                </div>

                                            </div>
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

// <!-- ================================================Fashion Product filter and Shorting Start =====================================-->
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
            url: '/post/filteredProduct',
            data: submitFormData,
            dataType: "json",
            success: function(response) {
                let productsContainterHtml = '';
                response.forEach(subsubcat => {
                    let priceHTML = '0';
                    if (subsubcat.discount_price === 0 || subsubcat.discount_price === "0" || subsubcat.discount_price === "0.00") {
                        price = parseInt(subsubcat.selling_price);
                    } else {
                        price =
                            `<span class="text-dark">${parseInt(subsubcat.discount_price)}</span> TK.<s class="text-danger">${parseInt(subsubcat.selling_price)}</s>`;
                    }
                    const productHtml =
                       `<div class="card gallery-item woman">
                            <div class="gallery-item-inner woman">
                                <img src="../../../${subsubcat.product_thambnail}" alt="" class="product-img">
                                <div class=" card-body">
                                    <h4 class="gallery-card-heading">${subsubcat.product_name}</h4>
                                    <!-- Selling and Discount Price Start -->
                                    <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                        ${price} </h4>
                                    <!-- Selling and Discount Price End -->
                                     <div class="fashion-btn-holder">
                                        <a href="javascript:void(0)" data-bs-toggle="modal" onclick="productViewFashion(${subsubcat.id})" 
                                        data-bs-target="#productQuickViewModalFashion" class="fashion-btn">Shop Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div> `;
                    productsContainterHtml = productsContainterHtml +
                        productHtml;
                });
                $('#products-cont').html(productsContainterHtml);
            }
        });
    });
});
</script>
<!-- ================================================Fashion Product Shorting End =====================================-->

<script>
    $(document).ready(function() {
    const renderResponseToProduct = (response) => {
        let product_view_cont_html = '';
        response.forEach(product => {

            let priceHTML = '0';
            console.log(product.discount_price);
            if (product.discount_price == 0) {
                price = parseInt(product.selling_price);
            } else {
                price =
                    `<span class="text-dark">${parseInt(product.discount_price)}</span> TK.<s class="text-danger">${parseInt(product.selling_price)}</s>`;
            }
            const productHtml =  
                        `<div class="card gallery-item woman">
                            <div class="gallery-item-inner woman">
                                <img src="../../../${product.product_thambnail}" alt="" class="product-img">
                                <div class=" card-body">
                                    <h4 class="gallery-card-heading">${product.product_name}</h4>
                                    <!-- Selling and Discount Price Start -->
                                    <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                        ${price} </h4>
                                    <!-- Selling and Discount Price End -->
                                     <div class="fashion-btn-holder">
                                        <a href="javascript:void(0)" data-bs-toggle="modal" onclick="productViewFashion(${product.id})" 
                                        data-bs-target="#productQuickViewModalFashion" class="fashion-btn">Shop Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div> `;

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
            url: '/get/productSort/' + subCategory,
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
                          <div class="card gallery-item woman">
                            <div class="gallery-item-inner woman">
                                <img src="../../../${value.product_thambnail}" alt="" class="product-img">
                                <div class=" card-body">
                                    <h4 class="gallery-card-heading">${value.product_name}</h4>
                                    <!-- Selling and Discount Price Start -->
                                    <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                        ${price} </h4>
                                    <!-- Selling and Discount Price End -->
                                     <div class="fashion-btn-holder">
                                        <a href="javascript:void(0)" data-bs-toggle="modal" onclick="productViewFashion(${value.id})" 
                                        data-bs-target="#productQuickViewModalFashion" class="fashion-btn">Shop Now
                                        </a>
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
           }) }
        var pages=1;
       $(window).scroll(function(){
           if($(window).scrollTop() + $(window).height() >= $(document).height()-600 ){
            pages++;
               loadMoreData(pages);
               console.log(pages);  }  })
        </script>
@endsection

