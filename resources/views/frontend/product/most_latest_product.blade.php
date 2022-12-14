@extends('frontend.main_master')

@section('islamic')
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
                                            <li><a href="{{ url('/gbs/'.optional($subsubcategory->category)->category_slug_name.'/'. $subsubcategory->subcategory->sub_category_slug_name.'/'. $subsubcategory->subsubcategory_slug_name) }}"
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
   <section class="main-content" id="main-content">
    <div class="container-fluid px-md-5 px-3 mt-3">
        <section class="popular-products">
                        <div class="product-gallery-wrapper  portfolio-section grid-portfolio ratio2_3 portfolio-padding ">
                        <h3 class="mt-5 text-center"style="color:black" >Latest Descount Product</h3>
                            <div class="ec-card-group zoom-gallery portfolio-2 px-lg-5 pt-lg-4 pb-lg-3 px-3 py-3">
                            @foreach ($latestdiscountproduct as $subsubcat)
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
                                                    @if ($subsubcat->discount_price == 0)
                                                    <h4 style="color:black"> <span style="font-size:15px">???</span>
                                                        {{ intval($subsubcat->selling_price) }} </h4>
                                                    @else
                                                    <h4>
                                                        <span style="color:black"> <span style="font-size:15px">???</span>
                                                            {{ intval($subsubcat->discount_price) }}</span>
                                                        <span><s class="text-danger"><span style="font-size:15px">???</span>
                                                                {{ intval($subsubcat->selling_price) }}</s></span>
                                                    </h4>
                                                    @endif
                                                    <!-- Selling and Discount Price End -->
                                          
                                                    </div>                                                  
                                                    <div class="overlay-background">
                                                        
                                                        @if($subsubcat->product_qty>0)
                                                 <button class="overlay-add-to-bag"
                                                onclick="groceryproductView({{ $subsubcat->id }})" 
                                                data-bs-toggle="modal"
                                                data-bs-target="#groceryproductQuickViewModal">Add to <br> Shopping <br> Bag </button>
                                                @else
                                                <button class="overlay-add-to-bag"
                                                onclick="groceryproductView({{ $subsubcat->id }})" 
                                                data-bs-toggle="modal"
                                                data-bs-target="#groceryproductQuickViewModal"><span class="text-danger">Stock Out</span></button>
                                                @endif
                                                
                                                <a class="overlay-details-link"onclick="groceryproductView({{ $subsubcat->id }})" 
                                                data-bs-toggle="modal" data-bs-target="#groceryproductQuickViewModal">Details >></a>
                                                    </div>
                                                </div>

                                               <div class="d-flex justify-content-center cart-details-btn">
                                       <a onclick="groceryproductView({{ $subsubcat->id }})" data-bs-toggle="modal"
                                        data-bs-target="#groceryproductQuickViewModal">
                                           @if($subsubcat->product_qty>0)
                                           <button style="background-color:#65C21B"
                                            class="btn btn-primary-filled px-4"><i class="fas fa-cart-plus me-2"></i>Add
                                            To Cart
                                        </button>
                                        @else
                                        <button style="background-color:#839AA8"
                                            class="btn btn-primary-filled px-4"><i class="fas fa-cart-plus me-2"></i>
                                            Stock Out
                                        </button>
                                        @endif
                                        </a>
                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                    <!--  End -->
                    <div class="loading_img_section d-block text-center" style="display: none"><img  src="https://i.gifer.com/4V0b.gif" alt="" ></div>
     
     
     
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
                         <small>${value.unit}</small>
                          <!-- Selling and Discount Price Start -->


                                        ${value.discount_price < 1 ?
                                          `
                                          <h4 style="color:black"> <span style="font-size:15px">???</span>
                                             ${value.selling_price } </h4>
                                          `
                                          :
                                          `
                                          <h4>
                                            <span style="color:black"> <span style="font-size:15px">???</span>
                                                 ${value.discount_price } </span>
                                            <span><s class="text-danger"><span style="font-size:15px">???</span>
                                                     ${value.selling_price }</s></span>
                                          </h4>
                                          `
                                       }
                                        <!-- Selling and Discount Price End -->


                      </div>
                      
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
                         data-bs-target="#groceryproductQuickViewModal"><button  style="background-color:#65C21B"
                         class=" btn btn-primary-filled px-4"><i class="fas fa-cart-plus me-2"></i>Add To Cart </button></a>

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