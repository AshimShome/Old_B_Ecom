
@extends('frontend.main_master')
@section('islamic')

<style>
    .custom-header-ecom-title{
        margin-top: 122px!important;
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
<!-- product category starts -->
<section class="main-content" id="main-content">
    <div class="container-fluid profile px-md-5 px-3 mt-3">
        {{-- <!--~~~~~~category page banner starts~~~~~~-->
        <section class="category01--banner">
            <div class="row">
                <div class="col-12">
                    <div class="category01--banner-wrap d-flex justify-content-center">
                        <img src=" {{ asset('frontend/assets/images/category/cat-banner.png') }} " alt=""
                            style="height: 100px;">
                    </div>
                </div>
            </div>
        </section>
        <!-- product category starts --> --}}
        <section class="product--category">
            <div class="container-fluid">

                <!-- breadcrumb start -->
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb category-breadcrumb">
                        <li class="breadcrumb-item"><a  href="{{url('/electronic')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a
                            href="{{url('electronic/all/category')}}">All Category</a></li>
                    </ol>
                </nav>
                <!-- breadcrumb end -->
                <!-- ~~~~filter button starts~~~~~ -->
                <section class="filter--section mt-5 mb-3">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="filter--contain">
                                    <span id="dots"></span>
                                </div>
                            </div>
                        </div>
                        <form action="">
                            <div class="filter-options my-4 p-2 p-md-5" id="more">
                                <div class="row">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h4>By Categories</h4>
                                            @php
                                            $categorys_elect = App\Models\Category::where('ecom_id','4')->get();
                                       
                                            @endphp
                                            @foreach ($categorys_elect as $cat)
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" attr-name="{{ $cat->category_name }}"
                                                    class="custom-control-input category_checkbox1" id="{{ $cat->id }}">
                                                <label class="custom-control-label" for="{{ $cat->id }}">{{
                                                    ucfirst($cat->category_name) }}</label>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>

                                </div>
                                <div class="mt-3">
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
                <!-- ~~~~filter button ends~~~~~ -->


                <div class="col-md-6 p-2 d-md-flex justify-content-md-end">
                </div>
                <!-- product ietm starts  -->
                <div class="product_items generaldata">
                    <div id="category_view_cont" class="ec-card-group cause_parent">
                        @foreach ( $getcategory as $category)
                        <div id="subcategoryShow{{ $category->id }}" class="ec-card-lg categoryBox subCategroyCard">
                            <a href="{{ url('/ebs/'. $category->category_slug_name) }}">

                                <div class="ec-card-inner text-center">
                                    <img class="img-fluid" src=" {{asset($category->category_image) }} " alt="">
                                    <p>{{ $category->category_name }} ({{$category->products_list->count()}})</p>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <div class="causes_div">
                    </div>
                    <div class="container-fluid">
                    </div>
                </div>
                {{-- for newest --}}
                <div class="generaldata">
                </div>

            </div>
            <!-- product ietm edns  -->
            <!-- end product--category--items--inner  -->
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
        else{
            $('.generaldata').show();
        }

        if($(this).is(":not(:checked)"))
        {
            $(`#subcategoryShow${id}`).hide(500);
            console.log(`#subcategoryShow${id}`);
            // $('.cause_parent').show(500);

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
                                        <a href="sub_category_view/${category.id}">
                                            <div class="ec-card-inner text-center">
                                                <img class="img-fluid" src="${category.category_image}" alt="">
                                            <p>${category.category_name}</p>
                                        </div>
                                    </a>
                                </div>
                                `;
                    category_view_cont_html = category_view_cont_html + categoryHtml;
                });

                $('#category_view_cont').html(category_view_cont_html);
            }

            $('#select_sort_by').change(function() {
                const selectedValue = $('#select_sort_by').val();
                $.ajax({
                    type: 'GET',
                    url: '/get_causes_against_categorysort',
                    success: function(response) {
                        console.log(response);
                        if (selectedValue === 'alphabhatic_a-z') {
                            function alphabhaticReorder(a, b) {
                                if (a.category_name < b.category_name) {
                                    return -1;
                                }
                                if (a.category_name > b.category_name) {
                                    return 1;
                                }
                                return 0;
                            }
                            response.sort(alphabhaticReorder);
                            renderResponseToCategory(response);
                        } else if (selectedValue === 'alphabhatic_z-a') {
                            function alphabhaticReorder(a, b) {
                                if (a.category_name > b.category_name) {
                                    return -1;
                                }
                                if (a.category_name < b.category_name) {
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


            $('#select_sort_by').change(function() {
                const selectedValue = $('#select_sort_by').val();
                $.ajax({
                    type: 'GET',
                    url: '/get_causes_against_categorysort',
                    success: function(response) {
                        console.log(response);
                        if (selectedValue === 'alphabhatic_a-z') {
                            function alphabhaticReorder(a, b) {
                                if (a.category_name < b.category_name) {
                                    return -1;
                                }
                                if (a.category_name > b.category_name) {
                                    return 1;
                                }
                                return 0;
                            }
                            response.sort(alphabhaticReorder);
                            renderResponseToCategory(response);
                        } else if (selectedValue === 'alphabhatic_z-a') {
                            function alphabhaticReorder(a, b) {
                                if (a.category_name > b.category_name) {
                                    return -1;
                                }
                                if (a.category_name < b.category_name) {
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
@endsection
