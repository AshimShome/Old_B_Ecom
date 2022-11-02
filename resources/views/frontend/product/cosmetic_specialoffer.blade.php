@extends('frontend.main_master')
@section('islamic')

<style>
     .cosmetic_products_container_wrapper .single-slider-card p {
        word-break: break-word;
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
                                    <a href="{{ url('/cosmetic') }}" class="logo-container custom-header-ecom-title-home">
                                        <i class="fas fa-home"></i> Cosmetics Home
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- ---------- Search with Category ------------- -->
                        <div>
                        <a href="{{ url('/cosmetic') }}"> <h2 class="text-white">Cosmetics</h2> </a>
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
    <div class="container-fluid px-md-3 px-3 cosmetic_products_container_wrapper pb-5">

 <div class="container">
      <!-- Popular products Start -->
      <div class="section-title-no-bg px-md-5 px-3">
        <h4 class="pt-4 text-center text-dark" >Special Offers</h4>
     </div>
     @php
     $special_offer = App\Models\Product::where('special_offer','1')->where('ecom_name','5')->get();
     @endphp
     <section class="popular-products">
         <div class="popular_prd_container_wrapper">
            <div class="popular_prd_container row">
                @foreach ($special_offer as $item)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-slider-card">
                        <div class="d-flex justify-content-center">
                            <img class="image"
                                src="{{ asset($item->product_thambnail) }}" alt="">
                        </div>
                        <h5 class="title mt-2">{{ $item->product_name }}</h5>
    
                        <p><b style="font-size:14px; font-weight:bold">Color:</b> {{$item->product_color }}</p>
    
                        <h6> Weight: {{ $item->unit }}</h6>
    
                        <div class="price pt-1">
                            @if($item->discount_price == 0)
                            <h5 class="mt-2"> ৳ {{ intval($item->selling_price) }}</h5>
    
                            @elseif($item->discount_price)
                            <h5 class="disprc"><del><b style="font-weight:bold">৳ {{
                                        intval($item->selling_price) }}</b></del>
                            </h5>
                            <h5> ৳ {{ intval($item->discount_price) }}</h5>
                            @endif
                        </div>
                        @if($item->product_qty>0)
                        <button class="shopNowBtn"><a
                                href="{{ url('/cosmetic/product/detail/'.$item->category->category_slug_name.'/'.$item->subcategory->sub_category_slug_name.'/'.$item->product_slug_name) }}">
                                Shop Now</a></button>
                        @else
                        <button style="background-color:#839AA8; pointer-events: none" class="shopNowBtn"><a
                                href="{{ url('/cosmetic/product/detail/'.$item->category->category_slug_name.'/'.$item->subcategory->sub_category_slug_name.'/'.$item->product_slug_name) }}">
                                Stock Out</a></button>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
 </section>
 <!-- Popular products End -->
 </div>
    </div>


   </section>

</main>

@endsection

