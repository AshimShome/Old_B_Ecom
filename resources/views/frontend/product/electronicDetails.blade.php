
@extends('frontend.main_master')

@section('islamic')



<style>
      .video-link-iocon iframe
        {
            height:450px;
            width:700px;
            
        }
        .product-right .pro-group .product-social li:hover a {
            background-color: #008081 !important;
            border-color: #008081 !important;
            color: #ffffff;
        }
        .product-detail-pill .product-detail-button.active {
            color:  #008081 !important;
        }
        .product-detail-pill .product-detail-button.active::after {
            background: #008081 !important;
        }
        .custom-header-ecom-title{
             /*margin-top: 116px!important;*/
        }
        .price{
            font-size: 18px;
            color: #015252 !important;
        }
        .fashion-btn{
            background-color: #008081 !important;
            color: #ffffff;
            font-size: 14px;
            padding: 4px 12px;
        }
        .fashion-btn:hover{
            color: #ffffff;
        }
        .recommended-title{
            font-size: 16px;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3; 
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
            <a href="{{ route('coupon.view') }}"><span class="text">Coupon</span><span class="number">{{ $coupons
                    }}</span></a>
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
    
        <!-- sidebar mobile menu & sidebar cart - start
       ================================================== --
       ================================================== -->
       <section class="main-content" id="main-content">
        <div class="container-fluid profile px-md-5 px-3 mt-3">

       

           <!-- section start -->
           <section class="section-big-pt-space container-fluid b-g-light">
              <div class="collection-wrapper">
                 <div class="custom-container">
                    <div class="row">
                       <div class="col-lg-4 p-4 d-flex justify-content-center">
                             <div class="xzoom-container">
                                <img class="xzoom5 img-fluid" id="xzoom-default"
                                   src="{{asset('/'.$product->product_thambnail)}} "
                                   xoriginal="{{asset('/'.$product->product_thambnail)}}" />
                                <div class="xzoom-thumbs">
                                   @foreach ($multiimgs as $img)
                                                <a href="{{ asset($img->photo_name) }}"><img class="xzoom-gallery5"
                                                        width="80" src="{{ asset($img->photo_name) }}" title=""></a>
                                    @endforeach

                                   
                                </div>
                             </div>
                       </div>
                       <div class="col-lg-8 rtl-text px-5 py-4">
                          <div class="product-right">
                             <div class="pro-group">
                                <h2>{{$product->product_name}}</h2>
                                 <h6 class="fw-bold text-dark my-2">{{$product->unit}}</h6>
                                <h6 class="fw-bold text-dark my-2"> 
                                @if($product->discount_price == 0)
                                     <p class="price">&#2547;{{ intval($product->selling_price)}}</del></p>
                                @else
                                     <p class="price">&#2547;{{ intval($product->discount_price) }} <del class="text-danger">&#2547;{{ intval($product->selling_price)}}</del></p>
                                @endif
                               </h6>
                                       
                                       
                                <div class="rating-box mb-3">
                                   <ul>
                                        @if(count($reviews) == 0)
                                                <span><i class="fas fa-star text-secondary"></i></span>
                                                <span><i class="fas fa-star text-secondary"></i></span>
                                                <span><i class="fas fa-star text-secondary"></i></span>
                                                <span><i class="fas fa-star text-secondary"></i></span>
                                                <span><i class="fas fa-star text-secondary"></i></span>
                                                <span>(0 Review)</span>

                                        @else
                                            @php
                                            $rating = 0;
                                            @endphp
                                            @foreach ($reviews as $review )
                                            <div id="pvm-rating" class="modal-rating">
                                            @php
                                                $rating = $rating+((intval($review->quality) + intval($review->price) + intval($review->value)) / 3);
                                            @endphp
                                            @endforeach
                                                @php
                                                    $rating = $rating/count($reviews);
                                                    $rating_blank = 5 - floor($rating);
                                                @endphp
                                                <ul class="rating">
                                                    @for ($i = 1; $i <= $rating; $i++)
                                                        <li><i class="fa-solid fa-star"></i></li>
                                                    @endfor
                                                    @for ($i = 1; $i <= $rating_blank; $i++)
                                                        <li><i class="fa-solid fa-star" style="color: #c2c2c2!important"></i></li>
                                                    @endfor
                                                    <li> <span>({{count($reviews)}} Reviews)</span></li>
                                                </ul>
                                               
                                            </div>
                                        @endif
                                   </ul>
                                </div>
                                {{-- <ul class="best-seller">
                                   <li>
                                      <svg width="10" height="12" viewBox="0 0 10 12" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                         <path
                                            d="M0.943898 2.25564L1.31868 3.85194L0.943898 5.4413L2.33892 6.30191L3.1926 7.69693L4.7889 7.32215L6.38519 7.69693L7.23887 6.30191L8.63389 5.4413L8.25911 3.85194L8.63389 2.25564L7.24581 1.39503L6.38519 0L4.7889 0.381724L3.19954 0.00694042L2.33198 1.39503L0.943898 2.25564ZM4.79584 6.65587C4.05955 6.65587 3.35342 6.36338 2.83279 5.84275C2.31215 5.32212 2.01966 4.61599 2.01966 3.8797C2.01966 3.14341 2.31215 2.43728 2.83279 1.91665C3.35342 1.39602 4.05955 1.10353 4.79584 1.10353C6.32273 1.10353 7.56507 2.34586 7.56507 3.87276C7.56507 5.41353 6.32273 6.65587 4.79584 6.65587ZM4.78195 5.96183C3.62984 5.96183 2.70677 5.03181 2.70677 3.8797C2.70677 2.73453 3.62984 1.79757 4.78195 1.79757C5.93407 1.79757 6.87102 2.73453 6.87102 3.8797C6.87102 5.03181 5.93407 5.96183 4.78195 5.96183ZM7.44708 6.72527L6.5587 8.27993L5.1151 7.95373L6.87102 12L7.84268 10.4731H9.57779L7.44708 6.72527ZM2.10295 6.77386L2.9705 8.33545L4.44881 7.98149L2.70677 12L1.73511 10.4731H0L2.10295 6.77386Z"
                                            fill="#FF6000" />
                                      </svg>
                                      5 Best Seller
                                   </li>
                                   <li>
                                      <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                         <path
                                            d="M2.84211 2.84211C2.84211 4.40905 4.11726 5.68421 5.68421 5.68421C7.25116 5.68421 8.52632 4.40905 8.52632 2.84211C8.52632 1.27516 7.25116 0 5.68421 0C4.11726 0 2.84211 1.27516 2.84211 2.84211ZM10.7368 12H11.3684V11.3684C11.3684 8.93116 9.38463 6.94737 6.94737 6.94737H4.42105C1.98316 6.94737 0 8.93116 0 11.3684V12H10.7368Z"
                                            fill="#FF6000" />
                                      </svg>
                                      50 Active View This
                                   </li>
                                </ul> --}}
                             </div>
                             <div id="selectSize"
                                class="pro-group addeffect-section product-description border-product mb-0">
                                <ul class="material mb-3">

                                   <li><span class="material-span" ><b style="font-size:18px;color:#000000;margin: 8px;">Product Material :</b> </span>
                                    {{ strtoupper($product->product_material) }}</li>
                                    @if ($product->product_qty > 0)
                                        <li><span class="material-span" > | <b style="font-size:18px;color:#000000;margin: 8px;">Stock:</b></span> <span
                                                class=" badge bg-success pt-1"> Available</span></li>
                                    @else
                                        <li><span class="material-span">Stock:</span> <span
                                                class="badge bg-danger pt-1">Stock Out</span></li>
                                    @endif

                                </ul>

                                <div class="modal fade" id="sizemodal" tabindex="-1" role="dialog"
                                   aria-labelledby="exampleModalLabel" aria-hidden="true">
                                   <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                         <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Sheer Straight Kurta</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                               aria-label="Close"></button>
                                         </div>
                                         <div class="modal-body"><img src="../assets/images/size-chart.jpg" alt=""
                                               class="img-fluid "></div>
                                      </div>
                                   </div>
                                </div>
                               

                                @if (count($product_size_all) == 1 && $product_size_all[0] == '')
                                    <ul id="productSize" style="display: none">

                                    </ul>
                                @else
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="error-mes-innr">
                                            <h6 class="product-title">SIZE</h6>
                                            <div class="size-box">
                                                <ul id="productSize">
                                                    @foreach ($product_size_all as $key => $value)
                                                        @if ($key == 0)
                                                            <li class="productSize-inner" eia-value="{{ $value }}">
                                                                <span>{{ $value }}</span>
                                                            </li>
                                                        @else
                                                            <li class="productSize-inner" eia-value="{{ $value }}">
                                                                <span>{{ $value }}</span>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="color-selector inline">
                                    @if (count($product_color_all) == 1 && $product_color_all[0] == '')
                                        <ul id="productColor" style="display: none">

                                        </ul>
                                    @else
                                        <!-- end col  -->
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="color-select-innr">
                                                <h6 class="product-title">color</h6>
                                                <div class="color-selector inline">
                                                    <div class="product-color-list d-flex col-lg-2 w-100 flex-wrap" id="productColor">
                                                        @foreach($product_color_all as $key => $value)
                                                        <div class="">
                                                            <p eia-value={{$value}} class="color-family" onclick="colorModalOnClick(this, 'productColor')">{{$value}}</p>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                  
                                </div>


                                <div class="product-details-quantity mb-3">
                                   <h6 class="product-title">Quantity</h6>
                                   <div class="product-quantity-inner">
                                      <button onclick="quickViewQunatityIncr(event)"><i
                                            class="fas fa-plus"></i></button>
                                      <input type="text" id="productQuantity" value="1">
                                      <button onclick="quickViewQunatityDec(event)"><i
                                            class="fas fa-minus"></i></button>
                                   </div>

                                </div>

                                <div class="product-buttons">
                                    <?php
                                    $productName = strval("'" . $product->product_name . "'");
                                    // dd($most_popular_alls->id);
                                    ?>
                                   <a href="javascript:void(0)" id="cartEffect" onclick="addToCartProductDetails({{ $product->id }}, <?php echo $productName; ?>)"
                                      class="btn btn-primary-filled tooltip-top py-1" data-tippy-content="Add to cart" style="background-color:#008081;">
                                      <i class="fa fa-shopping-cart"></i>
                                      Add to Cart
                                   </a>

                                </div>
                             </div>



                             <div class="pro-group product-tag pb-0 row">
                                <div class="col-md-6 my-2">
                                   <h6 class="product-title">Tags</h6>
                                   <ul class="product-tags">
                                       @foreach ($tags as $tag)

                                       <li><a href="#" class="text-capitalize">{{$tag}}</a></li>
                                       @endforeach

                                   </ul>
                                </div>
                                <div class="col-md-6 my-2">
                                   <h6 class="product-title">share</h6>
                                   <ul class="product-social ">

                                      <li><a href="javascript:void(0)"><i class="fa-brands fa-facebook-f"></i></a></li>
                                      <li><a href="javascript:void(0)"><i class=" fa-brands fa-youtube "></i></a></li>
                                      <li><a href="javascript:void(0)"><i class=" fa-brands fa-linkedin-in "></i></a></li>
                                      <li><a href="javascript:void(0)"><i class=" fa-brands fa-twitter "></i></a></li>


                                   </ul>
                                </div>

                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </section>
           <!-- Section ends -->


           <!-- content part starts-->
           <section id="product-details" class="container mt-5">
              <ul class="nav nav-pills product-detail-pill mb-3" id="pills-tab" role="tablist">
                 <li class="nav-item product-detail-btn" role="presentation">
                    <button class="nav-link active product-detail-button" id="pills-home-tab" data-bs-toggle="pill"
                       data-bs-target="#pills-detail" type="button" role="tab" aria-controls="pills-detail"
                       aria-selected="true">Product Details</button>
                 </li>
                 {{-- <li class="nav-item" role="presentation">
                    <button class="nav-link product-detail-button" id="pills-chart-tab" data-bs-toggle="pill"
                       data-bs-target="#pills-chart" type="button" role="tab" aria-controls="pills-chart"
                       aria-selected="false">Size Chart</button>
                 </li> --}}
                 <li class="nav-item" role="presentation">
                    <button class="nav-link product-detail-button" id="pills-contact-tab" data-bs-toggle="pill"
                       data-bs-target="#pills-review" type="button" role="tab" aria-controls="pills-review"
                       aria-selected="false">Write review</button>
                 </li>
              </ul>
              <div class="tab-content p-3" id="pills-tabContent">
                 <div class="tab-pane fade show active" id="pills-detail" role="tabpanel"
                    aria-labelledby="pills-detail-tab">
                    <div class="product-detail-video">
                       <div class="product-detail-title">
                          <h3 class="pb-4">Product  description</h3>
                          {!! $product->product_descp!!}
                       </div>
                       <div class="product-detail-video-link mt-5">
                          <div class="video-link-iocon" >
                                                            
                            <iframe 
                            src="{{ asset($product->video_link) }}"  ><i class="fab fa-youtube"></i>
                            </iframe>
                            </div>

                       </div>
                    </div>
                 </div>
               

                 <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review">
                    <div class="product-detail-review">
                     
                       <form method="POST" action="/product/review/{{ $product->id }}">
                        @csrf
                        {{-- <h5 class="mb-2">Customer Reviews</h5> --}}
                        <div class="client-reviews">
                            @foreach ($reviews as $review )
                                <div class="client-review d-flex w-100 mt-2">
                                    <div>
                                        <img src="../../frontend/assets/images/user/1.png" alt="" srcset="">
                                    </div>
                                    <div class="flex-grow-1 ms-2">
                                        <div class="w-100">
                                            <div class="d-flex justify-content-between">
                                                
                                                @php
                                                    $rating = (intval($review->quality) + intval($review->price) + intval($review->value)) / 3;
                                                    $rating_blank = 5 - floor($rating);
                                                @endphp
                                                <ul class="rating">
                                                    @for ($i = 1; $i <= $rating; $i++)
                                                        <li><i class="fa-solid fa-star"></i></li>
                                                    @endfor
                                                    @for ($i = 1; $i <= $rating_blank; $i++)
                                                        <li><i class="fa-solid fa-star" style="color: #c2c2c2!important"></i></li>
                                                    @endfor
                                                </ul>
                                            </div>
                                            <p>{{$review->review}} </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="submit-review mt-4 mb-3">
                            <h4 class="mb-3">Write Your Own review</h4>
                            <input type="hidden" name="product_id" value={{ $product->id }}>
                            <div class="review-table">
                                <div class="row review-table-header">
                                    <div class="col-2"></div>
                                    <div class="col-2">1 Star</div>
                                    <div class="col-2">2 Star</div>
                                    <div class="col-2">3 Star</div>
                                    <div class="col-2">4 Star</div>
                                    <div class="col-2">5 Star</div>
                                </div>
                                <div class="row">
                                    <div class="col-2">Quality</div>
                                    <div class="col-2">
                                        <input class="form-check-input"
                                            type="radio" name="quality" value="1">
                                    </div>
                                    <div class="col-2">
                                        <input class="form-check-input"
                                            type="radio" name="quality" value="2">
                                    </div>
                                    <div class="col-2">
                                        <input class="form-check-input"
                                            type="radio" name="quality" value="3">
                                    </div>
                                    <div class="col-2">
                                        <input class="form-check-input"
                                            type="radio" name="quality" value="4">
                                    </div>
                                    <div class="col-2">
                                        <input class="form-check-input"
                                            type="radio" name="quality" value="5">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">Price</div>
                                    <div class="col-2">
                                        <input class="form-check-input"
                                            type="radio" name="price" value="1">
                                    </div>
                                    <div class="col-2">
                                        <input class="form-check-input"
                                            type="radio" name="price" value="2">
                                    </div>
                                    <div class="col-2">
                                        <input class="form-check-input"
                                            type="radio" name="price" value="3">
                                    </div>
                                    <div class="col-2">
                                        <input class="form-check-input"
                                            type="radio" name="price" value="4">
                                    </div>
                                    <div class="col-2">
                                        <input class="form-check-input"
                                            type="radio" name="price" value="5">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">Value</div>
                                    <div class="col-2">
                                        <input class="form-check-input"
                                            type="radio" name="value" value="1">
                                    </div>
                                    <div class="col-2">
                                        <input class="form-check-input"
                                            type="radio" name="value" value="2">
                                    </div>
                                    <div class="col-2">
                                        <input class="form-check-input"
                                            type="radio" name="value" value="3">
                                    </div>
                                    <div class="col-2">
                                        <input class="form-check-input"
                                            type="radio" name="value" value="4">
                                    </div>
                                    <div class="col-2">
                                        <input class="form-check-input"
                                            type="radio" name="value" value="5">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div>
                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Review <span class="text-danger">*</span></label>
                                        <textarea class="form-control" rows="5" name="review"></textarea>
                                    </div>
                                </div>
                                <div class="submit-button">
                                    <button class="btn btn-primary-filled py-1" type="submit" style="background-color:#008081;">SUBMIT REVIEW</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                 </div>

              </div>
           </section>
           <!-- content part ends -->




                    <!--  Recommended start -->
      <section class="best-selling-product-section">
            <div class="container">
               <div class="best-selling-header2 text-center mt-4">
                  <h2 class="">Recommended for you</h2>
               </div>
            </div>
            <div class="row p-4">
                @foreach($recomndedProduct as $item)
                        @php
                            if($item->sum_star!=0 && $item->total_star!=0)
                            {
                                $review = $item->sum_star / $item->total_star;
                            }
                            else
                            {
                                $review = 0;
                            }
                            
                        @endphp
                
                    <div class="col-lg-3 col-md-3 col-sm-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-inner">
                                   <div class="row">
                                       <div class="col-6">
                                           <img src="{{ asset($product->product_thambnail) }}" alt="" class="img-fluid" >
                                       </div>
                                       <div class="col-6 d-flex align-items-center">
                                            <div class="">
                                                <h5 class="recommended-title">{{ $product->product_name }}</h5>
                                                @if ($item->discount_price == 0)
                                                    <span style="color:black; font-size: 16px;">৳ {{ intval($item->selling_price) }}  </span>
                                                        
                                                @else
                                                     <span style="color:red; font-size: 16px;"><del> ৳ {{ intval($item->discount_price) }}</del></span>
                                                     <span style="color:black; font-size: 16px;">৳ {{ intval($item->selling_price) }} </span>
                                                      
                                                @endif
                                                <div class="ratting">
                                                   
                                                </div>
                                                <div class="fashion-btn-holder">
                                                    <div class="mt-2">
                                                         <a href="javascript:void(0)" data-bs-toggle="modal" onclick="productViewFashion({{ $item->id }})" 
                                                        data-bs-target="#productQuickViewModalFashion" class="btn fashion-btn">Shop Now
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                       </div>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
               
                
                @endforeach
               
               <!-- end col  -->

            </div>
         </section>





     </section>
    </main>
@endsection

@section('scripts')

<script>
    var $grid = $('.product-main-content-inner').isotope({
        // options
    });
    // filter items on button click
    $('.product-content-menu').on('click', 'a', function() {
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({
            filter: filterValue
        });
    });
</script>


{{-- --------- Add To Cart - Seyam ----------- --}}
{{-- <script>
    function addToCartProductDetails(productId, productName) {
        const quantity = document.getElementById('productQuantity').value;
        const productSizeList = document.getElementById('productSize').children;
        let productSize = '';
        for (var i = 0; i < productSizeList.length; i++) {
            if (productSizeList[i].classList.contains('active')) {
                productSize = productSizeList[i].getAttribute('eia-value');
            }
        }

        const productColorList = document.getElementById('productColor').children;
        let productColor = '';
        for (var i = 0; i < productColorList.length; i++) {
            if (productColorList[i].children[0].classList.contains('active')) {
                productColor = productColorList[i].children[0].getAttribute('eia-value');
            }
        }
        console.log(productId, productName, quantity, productSize, productColor);

    }
</script> --}}


@endsection

