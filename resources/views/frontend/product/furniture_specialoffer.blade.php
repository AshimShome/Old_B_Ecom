@extends('frontend.main_master')
@section('islamic')
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
                                    <a href="{{ url('/furniture') }}" class="logo-container custom-header-ecom-title-home">
                                        <i class="fas fa-home"></i> Furniture Home
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- ---------- Search with Category ------------- -->
                        <div>
                           <a href="{{ url('/furniture') }}" class="logo-container custom-header-ecom-title-home">
                          <h2 class="text-white">Furniture</h2>
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
        $special_offer = App\Models\Product::where('special_offer','1')->where('ecom_name','7')->count();
        $coupons = App\Models\Coupon::where('status','1')->orderBy('id', 'DESC')->count();
        @endphp
       
        <li class="menu-heading">
            <a href="{{ url('/special/furniture/offer') }}"><span class="text">Special Offers</span> <span class="number">{{
                    $special_offer }}</span></a>
            <a href="{{ route('coupon.view') }}"><span class="text">Coupon</span><span class="number">{{ $coupons
                    }}</span></a>
        </li>

        @php
        $currentUrl = Request::segment(1);
        // dd($currentUrl);
        $categories=App\Models\Category::with('subcategory')->where('ecom_id','7')->get();
        @endphp
        <li class="mb-1 mt-3">
            <div class="collapse">               
                {{-- for category --}}
                @foreach ($categories as $category)
                <li class="mb-1 mt-2">
                    {{-- vvvvvv --}}
                    @if(Request::segment(2) != $category->category_slug_name)
                    <a href="{{ url('/fbs/'. $category->category_slug_name) }}">                      
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
                                        href="{{ url('/fbs/' . $subcategory->category->category_slug_name .'/'. $subcategory->sub_category_slug_name) }}">
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
                                            <li><a href="{{ url('/fbs/'.$subsubcategory->category->category_slug_name.'/'. $subsubcategory->subcategory->sub_category_slug_name.'/'. $subsubcategory->subsubcategory_slug_name) }}"
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
   <section class="main-content furniture-home " id="main-content">
    <div class="container-fluid px-md-3 px-3">

  <!-- Popular products Start -->
  <div class="section-title-no-bg px-md-5 px-3">
    <h4 class="pt-2 text-center text-dark" style="margin-top: 20px;" >Special Offers</h4>
 </div>
 @php
 $special_offer = App\Models\Product::where('special_offer','1')->where('ecom_name','7')->get();
 
 @endphp
 <section class="product-section section-padding">
        <div class="">
                    <!--<div class="product-section-head">-->
                    <!--    <h2>Our Top Products</h2>-->
                    <!--</div>-->
                    <div class="product-category-box-wrap products_load_with_ajax">


                        @foreach ($products as $value)
                            <div class="card card-innr">
                                <img src="../../{{ $value->product_thambnail }}" alt="" class="card-img-top images-p img-fluid">
                                <div class="overly-icon">
                                    @if($value->product_qty>0)
                                    <a onclick="productViewFurnitur({{$value->id}})" class=""
                                        data-bs-toggle="modal" data-bs-target="#productQuickViewModalFurnitur"><i
                                            class="fas fa-search"></i> 
                                             </a>

                                    <!--<a href="#" class=""><i class="fas fa-shopping-bag"></i></a>-->
                                    @endif
                                </div>
                              
                                <div class="card-body">
                                    
                                    
                                    
                                    
                                    <div class="card-body-innr" style="height:92px;">
                                     <!-- Selling and Discount Price Start -->
                                     
                                     <p>{{ $value->product_name }}</p>
                                     
                                        @if ($value->discount_price == 0)
                                        <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                            {{ intval($value->selling_price) }} </h4>
                                            <div class="ratting">
                                        </div>
                                        @else
                                        <h4>
                                            <span style="color:black"> <span style="font-size:15px">৳</span>
                                                {{ intval($value->discount_price) }}</span>
                                            <span><s class="text-danger"><span style="font-size:15px">৳</span>
                                                    {{ intval($value->selling_price) }}</s></span>
                                        </h4>
                                        <div class="ratting">
                                        </div>
                                        @endif
                                        <!-- Selling and Discount Price End --> 
                                    </div>
                                    @if($value->product_qty>0)
                                     <div class="d-flex justify-content-center cart-details-btn ">
                                            <a onclick="productViewFurnitur({{ $value->id }})"
                                                data-bs-toggle="modal" data-bs-target="#productQuickViewModalFurnitur">
                                          <button class="btn btn-primary-filled px-4" style="background-color:#223E3"><i class="fas fa-cart-plus me-2"></i>Add To Cart </button></a>
                                    </div>
                                    @else
                                    <div class="d-flex justify-content-center cart-details-btn ">
                                        <button disabled style="background-color:#839AA8" class="btn btn-primary-filled px-4"><i class="fas fa-cart-plus me-2"></i>Stock Out</button>
                                    </div>
                                    @endif
                                    
                                </div>
                                <!-- end card-body  -->
                            </div>
                        @endforeach
                        <!-- end card  -->
                    </div>
                    <div class="loading_img_section d-block text-center" style="display: none"><img  src="https://i.gifer.com/4V0b.gif" alt="Bppshops" ></div>
                    <!-- end product-category-box-wrap  -->

                    <div class="view-product-holder">
                        <a href="{{url('/product/furniture/more')}}" class="view-product-btn">View More Products</a>
                    </div>
                    <!-- end view-product-holder  -->
                </div>
      <!-- end container  -->
  </section>
 <!--// Popular products End -->
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
               <div class="card gallery-item woman">
                            <div class="gallery-item-inner woman">
                                <img src="../../../${subsubcat.product_thambnail}" alt="" class="product-img">
                                <div class=" card-body">
                                    <h4 class="gallery-card-heading">${subsubcat.product_name}</h4>
                                    <!-- Selling and Discount Price Start -->
                                    <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                        ${value.discount_price} </h4>
                                    <!-- Selling and Discount Price End -->
                                     <div class="fashion-btn-holder">
                                        <a href="javascript:void(0)" data-bs-toggle="modal" onclick="productViewFashion(${subsubcat.id})" 
                                        data-bs-target="#productQuickViewModalFashion" class="fashion-btn">Shop Now
                                        </a>
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

          if($(window).scrollTop() + $(window).height() >= $(document).height() - 400){

            pages++;
               loadMoreData(pages);


           }
       })



</script>
@endsection

