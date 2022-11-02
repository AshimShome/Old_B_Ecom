@extends('frontend.main_master')

@section('islamic')


<style>
    .cardPart {
        border: 1px solid #885a9a;
        border-radius: 20px 20px 0px 0px;
    }

    .dreamyImg img {
        margin-left: -84px;
    }
    .best-selling-pd-desc{
        height: 40px;
        overflow:hidden;
    }
    .best-selling-pd-name{
        height: 78px;
        overflow:hidden;
    }
    .add_to_btn{
        background-color: #471c6b;
        color: white;
        padding: 4px 12px;
        border-radius: 5px;
    }
    
    .add_to_btn:hover{
        background-color: #471c6b;
        color: white;
    }
</style><!-- product category starts -->




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
                                    <a href="{{ url('/cosmetic') }}" class="logo-container custom-header-ecom-title-home">
                                        <i class="fas fa-home"></i> Cosmetics Home
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- ---------- Search with Category ------------- -->
                        <div>
                        <a href="{{ url('/cosmetic') }}">     <h2 class="text-white">Cosmetics</h2> </a>
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
        $special_offer = App\Models\Product::where('special_offer','1')->where('ecom_name','5')->count();
       $coupons = App\Models\Coupon::where('status','1')->orderBy('id', 'DESC')->count();
        @endphp
        <li class="menu-heading">
            <a href="{{ url('/special/cosmetics/offer') }}"><span class="text">Special Offers</span> <span class="number">{{
                    $special_offer }}</span></a>
            <a href="{{ route('coupon.view') }}"><span class="text">Coupon</span><span class="number">{{ $coupons
                    }}</span></a>
        </li>
        @php
        $currentUrl = Request::segment(2);
        // dd($currentUrl);
        $categories=App\Models\Category::with('subcategory')->where('ecom_id','5')->get();
        @endphp
        <li class="mb-1 mt-3">
            <div class="collapse">  
                @foreach ($categories as $category)
                <li class="mb-1 mt-2">
                    @if(Request::segment(2) != $category->category_slug_name)
                    <a href="{{ url('/cbs/'. $category->category_slug_name) }}">                      
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
                                        href="{{ url('/cbs/' . $subcategory->category->category_slug_name .'/'. $subcategory->sub_category_slug_name) }}">
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
                                            <li><a href="{{ url('/cbs/'.$subsubcategory->category->category_slug_name.'/'. $subsubcategory->subcategory->sub_category_slug_name.'/'. $subsubcategory->subsubcategory_slug_name) }}"
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
        

        <div class="row">
              @php
                $subcategorybanner=App\Models\SubCategorypBanner::where('ecom_id',5)->latest()->get();
                @endphp
                @foreach($subcategorybanner->take(2) as $banner)
                    <div class="col-lg-6 col-md-6 com-sm-12 mt-1">
                      <div class="wrap_left h-100">
                                    <img src=" {{ asset( $banner->subcat_banner_image) }}" alt="" class="img-fluid" style="width: 100%">
                        </div>
                    </div>
             @endforeach
        </div>
        
      
        
        
        
        <section class="cos_sub_cat_lipstick container">
            <div class="text-center pt-5 pb-4">
                <img style="height: 73px;" class="img-fluid" src="{{ asset('frontend/assets/images/cosmeticProjectImage/subCat/lips.png')}}" alt="">
            </div>

            <div class="lipstick_card_container row">
                @forelse($getsubcategory->take(8) as $subcategory)

                <div class="col-lg-3">
                    <div class="cardPart" style="text-align: center;">
                        <a
                            href="{{ url('/cbs/' . $subcategory->category->category_slug_name .'/'. $subcategory->sub_category_slug_name) }}">
                            <img style="height: 100%;" class="img-fluid"
                                src="{{ asset($subcategory->subcategory_image) }} " alt="">
                            <p class="title">{{ $subcategory->sub_category_name }}({{ $subcategory->products_list->count()}})</p>
                        </a>
                    </div>
                </div>
                @empty
                <h4 style="text-align: center;margin-top:100px;margin-bottom-200px;font-color:#d9dbde;"><i>Not
                        Found</i>
                </h4>
                
                @endforelse
                <span id="subCatDots"></span>
            
                @if(!$getsubcategory->isEmpty())
               
                @endif
            </div>
        </section>
        
        
       
        <section class="cos_sub_cat_best_selling_container container" style="margin-bottom:50px;">
            <h1 class="selling_title">Best Selling Product</h1>
            <div class="card_container_wrapper row">
                @forelse($bestSellingProducts as $bestproduct)
                <div class="col-lg-4 col-md-8 col-sm-12">
                    <div class="card_container">
                        <div class="col-lg-6">
                            <div class="sub_card">
                                <img src="{{ asset($bestproduct->product_thambnail)}}" alt="">
                                <div class="review">
                                    <p>Review</p>
                                    <p class="reviewIcon"><i class="fa-solid fa-star"></i><i
                                            class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                            class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card_content" style="margin-left: 20px;">
                                <p class="best-selling-pd-name">{{ $bestproduct->product_name }}</p>
                                <!--<div class="best-selling-pd-desc">{!! $bestproduct->product_descp !!}</div>-->
                                <!--<p>Shade Name : {{$bestproduct->product_color}}</p>-->
                                @if($bestproduct->discount_price == 0)
                                    <h5> ৳ {{ intval($bestproduct->selling_price) }}</h5>
                                @elseif($bestproduct->discount_price)
                                    <h5 class="disprc"><del>৳ {{ intval($bestproduct->selling_price) }}</del>
                                    </h5>
                                    <h5> ৳ {{ intval($bestproduct->discount_price) }}</h5>
                                @endif
                                <div class="product-buttons mt-2">
                                    <a href="{{ url('/cosmetic/product/detail/'.optional($bestproduct->category)->category_slug_name.'/'.optional($bestproduct->subcategory)->sub_category_slug_name.'/'.optional($bestproduct)->product_slug_name) }}"
                                            class="add_to_btn">
                                                Shop Now
                                            </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                @endforelse

    </div>
        </section>
    </div>
</section>


@endsection
@section('script')
<script>
    var subCategroyCardCount = 0;

    $('.category_checkbox1').on('click',function()
    {
        var id = $(this).attr('id');

        if($(this).is(":checked"))
        {
            if(subCategroyCardCount == 0)
            {
                $('.subCategroyCard').hide(500);
                subCategroyCardCount++;
            }

            $(`#subcategoryShow${id}`).show(500);
            console.log(`#subcategoryShow${id}`);
        }

        if($(this).is(":not(:checked)"))
        {
            $(`#subcategoryShow${id}`).hide(500);
            console.log(`#subcategoryShow${id}`);
        }
    });
    $('.reset').on('click',function()
    {
        $('.subCategroyCard').show(500);
    });

</script>
{{-- for sorting --}}
<script>
    $(document).ready(function() {

            const renderResponseToCategory = (response) => {
                let category_view_cont_html = '';
                response.forEach(category => {
                    let categoryHtml =
                        `
                        <div class="ec-card-lg categoryBox">
                                <a href="/${category.category_slug_name}">
                                <div class="ec-card-inner text-center">
                                    <img class="img-fluid" src="../../${category.subcategory_image}" alt="">
                                <p>${category.sub_category_name}</p>
                            </div>
                        </a>
                    </div>
                    `;
                    category_view_cont_html = category_view_cont_html + categoryHtml;
                });

                $('#category_view_cont').html(category_view_cont_html);
            }

            $('#select_sort_by').change(function() {
                // const selectedValue = $('#select_sort_by').find(":selected").text();
                var selectedValue = $('#select_sort_by').val();
                const subCategory = $('#subCategory').val();

                $.ajax({
                    type: 'GET',
                    url: `/get_causes_against_subcategorysort/${subCategory}`,
                    success: function(response) {
                        if (selectedValue === 'alphabhatic_a-z') {
                            function alphabhaticReorder(a, b) {
                                if (a.sub_category_name < b.sub_category_name) {
                                    return -1;
                                }
                                if (a.sub_category_name > b.sub_category_name) {
                                    return 1;
                                }
                                return 0;
                            }
                            response.sort(alphabhaticReorder);
                            renderResponseToCategory(response);
                        } else if (selectedValue === 'alphabhatic_z-a') {
                            function alphabhaticReorder(a, b) {
                                if (a.sub_category_name > b.sub_category_name) {
                                    return -1;
                                }
                                if (a.sub_category_name < b.sub_category_name) {
                                    return 1;
                                }
                                return 0;
                            }
                            response.sort(alphabhaticReorder);
                            renderResponseToCategory(response);
                        }
                    }
                });
            });

        });
</script>

{{-- script for show more start --}}
<script>
    const showMoreSubCatPrdF = () => {
    const dots = document.getElementById('subCatDots')
    const moreText = document.getElementById('showMoreSubCatPrd');
    const btnText = document.getElementById('showMoreSubCatbtn');

    if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Show more...";
    moreText.style.display = "none";
    } else {
    dots.style.display = "none";
    btnText.innerHTML = 'Show less...';
    moreText.style.display = "block";
    }
    }
    // const showMoreFunction = (dot, text, btn) => {
    // const dots = document.getElementById(dot)
    // const moreText = document.getElementById(text);
    // const btnText = document.getElementById(btn);
    // if (dots.style.display === "none") {
    //     dots.style.display = "inline";
    //     btnText.innerHTML = "Show more...";
    //     moreText.style.display = "none";
    // } else {
    //     dots.style.display = "none";
    //     btnText.innerHTML = 'Show less...';
    //     moreText.style.display = "inline";
    // }
    // }
</script>

{{-- script for show more end --}}

@endsection
