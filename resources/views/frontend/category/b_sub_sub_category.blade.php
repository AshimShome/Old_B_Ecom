@extends('frontend.main_master')

@section('islamic')
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
<section class="main-content" id="main-content">
    <div class="container-fluid px-md-5 px-3 mt-3">
        <!-- breadcrumb end -->
        <!-- ~~~~filter button ends~~~~~ -->
        @if(($baby_subsubcategories->isNotEmpty()))
        <!--~~~~~~category page banner starts~~~~~~-->
        <!--<div class="category01--banner">-->
        <!--    <div class="row">-->
        <!--        <div class="col-lg-6 col-md-6 com-sm-12 mt-1">-->
        <!--            <div class="subcat_banner_img h-100">-->
        <!--                <div class="wrap_left h-100">-->
        <!--                    <img src=" {{ asset('frontend/assets/images/category/sub-cat/sub_sub_cat1.png') }} " alt=""-->
        <!--                        class="img-fluid w-100 h-100">-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--        <div class="col-lg-6 col-md-6 com-sm-12 mt-1">-->
        <!--            <div class="subcat_banner_img h-100">-->
        <!--                <div class="wrap_right h-100">-->
        <!--                    <img src=" {{ asset('frontend/assets/images/category/sub-cat/sub_sub_cat2.png') }} " alt=""-->
        <!--                        height="100px" class="img-fluid w-100 h-100">-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <!-- breadcrumb start -->
        
       <div class="breadcrumb-main">
          <ul>
             <a href="{{ url('baby') }}"><li>Home </li></a>
             <li><i class="fas fa-angle-right"></i></li>
             <li class="active breadcrumb-item" aria-current="page">
                 <a href="{{ route('babycategory.view') }}">All Category</a>
             </li>
             
          </ul>
       </div>
        
        
        <div class="product_items">
            <div id="category_view_cont" class="ec-card-group cause_parent">
                @forelse ($baby_subsubcategories as $subsubcategory)
                <div id="subcategoryShow{{ $subsubcategory->id }}" class="ec-card-lg subCategroyCard">
                    <a href="{{ url('/bbs/'.$subsubcategory->category->category_slug_name.'/'. $subsubcategory->subcategory->sub_category_slug_name.'/'. $subsubcategory->subsubcategory_slug_name) }}">
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
                    @foreach($baby_productUnderSubCategory as $subsubcat)
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
                    value="{{ optional($baby_productUnderSubCategory1)->sub_category_id}}">
    
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
            
            
            
            <section class ="popular-products baby-home">
                <div class="tbd-wrapper">
                    <div class="container baby-container">
                        <div id="products-cont" class="products_load_with_ajax row tbd-item-wrapper">
                            @foreach ($baby_productUnderSubCategory as $subsubcat)
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 pt-3">
                                    <div class="tdb-item">
                                        <div class="tbdi-thumb">
                                            <img src="{{ asset($subsubcat->product_thambnail) }}" alt="best deal">
                                            <div class="tbdi-overlay">
                                                <ul class="tbdi-overlay-menu">
                                                    <li> <a href="#" onclick="productViewBaby({{ $subsubcat->id }})" data-bs-toggle="modal"
                                                        data-bs-target="#productQuickViewModalBaby"> <i
                                                            class="fa-regular fa-eye"></i></a> </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="tbdi-content">
    
                                            <div class="tbdi-content-bottom">
                                                <p class="product-name"> {{ $subsubcat->product_name }}</p>
                                                @if ($subsubcat->discount_price == 0)
                                                <p class="price" style="color: black">৳{{ $subsubcat->selling_price }}</p>
                                                @else
                                                <p class="price" style="color: black">৳{{ $subsubcat->discount_price }}  <del class="discount-price" style="color: red">৳{{ $latestdiscountproduct->selling_price }}</del> </p>
                                                @endif
                                                <a class="add-btn" onclick="productViewBaby({{ $subsubcat->id }})"
                                                    href="#" data-bs-toggle="modal" data-bs-target="#productQuickViewModalBaby">Add to Bag</a>
                                            </div>
    
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                          <div class="loading_img_section d-block text-center" style="display: none"><img  src="https://i.gifer.com/4V0b.gif" alt="" ></div>
                    </div>
                </div>
            </section>
            @endif

        

    </div>
        <div class="causes_div">
        </div>
        <div class="container-fluid">
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
               $('#products-cont').append(loadData);
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
            url: '/post/filteredProduct2',
            data: submitFormData,
            dataType: "json",
            success: function(response) {
                let productsContainterHtml = '';
                response.forEach(subsubcat => {

                    let priceHTML = '0';
                    if (subsubcat.discount_price === 0) {
                        price = subsubcat.selling_price;
                    } else {
                        price =
                            `<span class="text-dark">${subsubcat.discount_price}</span>, <span style="font-size:15px">৳</span><s class="text-danger">${subsubcat.selling_price}</s>`;
                    }
                    const productHtml =
                        `
                                <div class="isotopeSelector filter all ec-card-lg">
                                    <div class="overlay ec-card-inner">
                                        <div class="border-portfolio">
                                            <div class="card product-port">
                                                <div class="image-overlay-container">
                                                    <img class="img-fluid"
                                                        src="../../../${subsubcat.product_thambnail}" alt="">
                                                </div>
                                                <div class="text-center my-3">
                                                    <h4 class="text-dark">${subsubcat.product_name}</h4>
                                                    

                                                    <h4 style="padding:5px">
                                                        <span style="font-size:15px">৳</span> ${price}
                                                    </h4>
                                                </div>

                                                <div class="overlay-background">
                                                  <button class="overlay-add-to-bag" onclick="productView(${subsubcat.id})"
                                                    data-bs-toggle="modal" data-bs-target="#productQuickViewModalBaby" >
                                                     Add to <br> Shopping <br> Bag 
                                                </button>
                                                    
                                                    <a class="overlay-details-link"
                                                        onclick="productView(${subsubcat.id})" data-bs-toggle="modal"
                                                        data-bs-target="#productQuickViewModalBaby">Details
                                                        >></a>
                                                        
                                                        
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center cart-details-btn">
                                            <a onclick="productView(${subsubcat.id}" data-bs-toggle="modal"
                                           data-bs-target="#productQuickViewModalBaby"><button
                                               class="btn btn-primary-filled px-4"><i class="fas fa-cart-plus me-2"></i>Add
                                               To Cart
                                           </button></a>
                                           
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
            if (product.discount_price === 0) {
                price = product.selling_price;
            } else {
                price =
                    `<span class="text-dark">${product.discount_price}</span>, <span style="font-size:15px">৳</span><s class="text-danger">${product.selling_price}</s>`;
            }
            const productHtml =
                `
                                <div class="isotopeSelector filter all ec-card-lg">
                                    <div class="overlay ec-card-inner">
                                        <div class="border-portfolio">
                                            <div class="card product-port">
                                                <div class="image-overlay-container">
                                                    <img class="img-fluid"
                                                        src="../../${product.product_thambnail}" alt="">
                                                </div>
                                                <div class="text-center my-3">
                                                    <h4 class="text-dark">${product.product_name}</h4>
                                                   
                                                    <h4 style="padding:5px">
                                                        <span style="font-size:15px">৳</span> ${price}
                                                    </h4>
                                                </div>

                                                <div class="overlay-background">
                                                     <button class="overlay-add-to-bag" onclick="productView(${product.id})"
                                                     data-bs-toggle="modal" data-bs-target="#productQuickViewModalBaby"                                                            
                                                       > Add to <br> Shopping <br> Bag </button>
                                                        
                                                          <a class="overlay-details-link"
                                                       onclick="productView(${product.id})" data-bs-toggle="modal"
                                                       data-bs-target="#productQuickViewModalBaby">Details
                                                       >></a>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center cart-details-btn">
                                            
                                            
                                                 <a onclick="productView(${product.id})" data-bs-toggle="modal"
                                               data-bs-target="#productQuickViewModalBaby"><button
                                                   class="btn btn-primary-filled px-4"><i class="fas fa-cart-plus me-2"></i>Add
                                                   To Cart
                                               </button></a>
                                               
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>`;

            product_view_cont_html = product_view_cont_html + productHtml;
        });

        $('#products-cont').html(product_view_cont_html);
    }


    $('#select_sort_by').change(function() {
        // const selectedValue = $('#select_sort_by').find(":selected").text();
        const subCategory = $('#subCategory_input').val();
        const selectedValue = $('#select_sort_by').val();


        $.ajax({
            type: 'GET',
            url: '/get/subproductSort/' + subCategory,
            success: function(response) {
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
