 
@extends('frontend.main_master')
@section('islamic')
 <style>
    .portfolio-padding{
      margin-top: 15px;
    }
    .main-content{
        margin-left: 0px!important;
    }
    .popular-products .image-overlay-container img {
    margin-top: -113px !important;
    display: block !important;
    }
    .portfolio-section .isotopeSelector:hover img{
        transform: none;
    }
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
    border-radius: 5px;
    }
    .grocery{
        border: 1px solid #CACACA;
    }
     
 </style>
 <main class="main-body">
   <div class="row">
      <div id="productDiv">
	<section class="main-content" id="main-content">
       <section class="popular-products">
           <div class="product-gallery-wrapper  portfolio-section grid-portfolio ratio2_3 portfolio-padding ">
               <div class="ec-card-group zoom-gallery portfolio-2 px-lg-5 pt-lg-2 pb-lg-3 px-3 py-3">
                   @if(count($products) > 0)
                    @foreach($products as $product)
                    @if($product->status == 1)
                    <div class="isotopeSelector filter all ec-card-lg">
                           <div class="overlay ec-card-inner grocery">
                                @if($product->ecom_name == '1')
                                    @if($product->product_qty <= 0) 
                                    <div class="border-portfolio">
                                        <div class="card product-port">
                                            <div class="">
                                                <img src="{{ asset($product->product_thambnail) }}"
                                                    class="img-fluid  bg-img" alt="portfolio-image" height="20px">
                                            </div>
                                            <div class="text-center mt-3 mb-1">
                                                <h4 class="text-dark">
                                                    {{ $product->product_name }}
                                                </h4>
                                                
                                                <br>
                                                
                                                <b style="font-size:16px; font-weight: bold">{{ $product->unit }}</b>

                                                <!-- Selling and Discount Price Start -->
                                                @if ($product->discount_price == 0)
                                                <h5 style="font-size:16px; font-weight: bold"> <span>&#2547;</span>
                                                    {{ intval($product->selling_price) }} </h5>
                                                @else
                                                <h5>
                                                    <span class="price_style_new" style="font-size:16px; font-weight: bold"> <span>&#2547;</span>
                                                        {{ intval($product->discount_price) }}</span>
                                                    <span class="price_style_new" style="font-size:16px; font-weight: bold"><s class="text-danger" style="font-size:16px; font-weight: bold" ><span>	&#2547;</span>
                                                            {{ intval($product->selling_price) }}</s></span>
                                                </h5>
                                                @endif
                                                <!-- Selling and Discount Price End -->
                                            </div>

                                            <?php
                                             $productName = strval("'" . $product->product_name . "'");
                                             ?>

                                            
                                        </div>
                                        <div class="d-flex justify-content-center cart-details-btn ">
                                            <a href="#"><button
                                                    class="btn btn-primary-filled px-4" disabled><i
                                                        class="fas fa-cart-plus me-2" href="#"></i>Stock Out
                                                </button></a>

                                        </div>
                                    </div>
                                    @else
                                    <div class="border-portfolio">
                                        <div class="card product-port">
                                            <div class="image-overlay-container">
                                                 <a  href="{{route('ProductDetails_islamic',[$product->category_id,$product->sub_category_id,$product->product_slug_name ] )}}">
                                                <img src="{{ asset($product->product_thambnail) }}"
                                                    class="img-fluid  bg-img" alt="{{ $product->product_slug_name }}" height="20px">
                                                    </a>
                                            </div>
                                            <div class="text-center mt-3 mb-1">
                                                 <a  href="{{route('ProductDetails_islamic',[$product->category_id,$product->sub_category_id,$product->product_slug_name ] )}}"> <h4 class="text-dark">
                                                    {{ $product->product_name }}
                                                </h4></a>
                                                    
                                                    
                                                    <br>
                                               
                                                <b style="font-size:16px; font-weight: bold">{{ $product->unit }}</b>
    
                                                <!-- Selling and Discount Price Start -->
                                                @if ($product->discount_price == 0)
                                                <h4 style="color:black; font-size:16px; font-weight: bold"> <span>	&#2547;</span>
                                                    {{ intval($product->selling_price) }} </h4>
                                                @else
                                                <h4>
                                                    <span style="color:black; font-size:16px; font-weight: bold"> <span>	&#2547;</span>
                                                        {{ intval($product->discount_price) }}</span>
                                                    <span><s class="text-danger" style="font-size:16px; font-weight: bold"><span>	&#2547;</span>
                                                            {{ intval($product->selling_price) }}</s></span>
                                                </h4>
                                                @endif
                                                <!-- Selling and Discount Price End -->
                                            </div>
    
                                            <?php
                                                $productName = strval("'" . $product->product_name . "'");
                                             ?>
    
                                            <div >
                                               
    
                                                
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center cart-details-btn ">
                                            <a  href="{{route('ProductDetails_islamic',[$product->category_id,$product->sub_category_id,$product->product_slug_name ] )}}" ><button
                                                    class="btn btn-primary-filled px-4"><i
                                                        class="fas fa-cart-plus me-2"></i>Shop Now
                                                </button></a>
    
                                        </div>
                                    </div>
                                    @endif
                                @elseif ($product->ecom_name == '2')
                                     
                                      <div class="border-portfolio">
                                         <div class="card product-port added-to-bag">
                                            <div class="">
                                               <img src="{{ asset($product->product_thambnail) }}" class="img-fluid "
                                                  alt="{{ $product->product_name }}">
                                            </div>
                                            <div class="text-center mt-5 mb-1">
                                               <h4 class="text-dark"> {{ $product->product_name }}</h4>
                                               
                                               <br>
                                               
                                               <b style="font-size:16px; font-weight: bold">{{ $product->unit }}</b>
                                               <h4 style="font-size:16px; font-weight: bold" class="price">
                                                   
                                                   
                                                   
                                                <!-- Selling and Discount Price Start -->
                                                @if ($product->discount_price == 0)
                                                <h4 style="color:black; font-size:16px; font-weight: bold"> <span style="font-size:16px; font-weight: bold">৳</span>
                                                    {{ intval($product->selling_price) }} </h4>
                                                @else
                                                <h4>
                                                    <span style="color:black" style="font-size:16px; font-weight: bold"> <span style="font-size:16px; font-weight: bold">৳</span>
                                                        {{ intval($product->discount_price) }}</span>
                                                    <span><s class="text-danger" style="font-size:16px; font-weight: bold"><span style="font-size:16px; font-weight: bold">৳</span>
                                                            {{ intval($product->selling_price) }}</s></span>
                                                </h4>
                                                @endif
                                                <!-- Selling and Discount Price End -->
                                                
                                                
                                               </h4>
                                            </div>
                                            <?php
                                            $productName = strval("'" . $product->product_name . "'");
                                            ?>
                                            
                                            @if($product->product_qty <= 0)
                                                <div id="overlay_background">
                                                 <button class="overlay-add-to-bag"
                                                 disabled>
                                                 <div class="text-light">
                                                    Stock <br> Out
                                                 </div>
                                                 </button>
                                               <div class="overlay-button" id="add_inc_dec" style="display: none;">
                                                  <h4 class="overlay-product-amount">TK. <span class="pro-price">420.0</span></h4>
                                                  <div class="overlay-product-quantity">
                                                     <button class="btn incre-btn" onclick="quickViewQunatityIncrOverlay(event)"><i
                                                           class="fas fa-plus"></i></button>
                                                     <input class="quantity-text" id="input_value" type="text" value="1">
                                                     <button class="btn decre-btn" onclick="quickViewQunatityDecOverlay(event)"><i
                                                           class="fas fa-minus"></i></button>
                                                  </div>
                                                  <h4 class="overlay-product-in-bag">In Bag</h4>
                                               </div>
                                              
                                                </div>
                                                 </div>
                        
                                                 <div class="d-flex justify-content-center cart-details-btn ">
                                                   <a href="#" style="pointer-events: none;"><button
                                                           class="btn btn-primary-filled px-4" style="background-color: #65C21B;" disabled><i
                                                               class="fas fa-cart-plus me-2"></i>Stock Out
                                                       </button></a>
                        
                                               </div>
                                            @else
                                                <div class="overlay-background">
                                                 <button class="overlay-add-to-bag"
                                                 onclick="addToCart({{ $product->id }}, <?php echo $productName; ?>)">
                                                 <div class="text-white">
                                                    Add <br> To <br> Bag
                                                 </div>
                                                 </button>
                                               <div class="overlay-button" id="add_inc_dec" style="display: none;">
                                                  <h4 class="overlay-product-amount">TK. <span class="pro-price">420.0</span></h4>
                                                  <div class="overlay-product-quantity">
                                                     <button class="btn incre-btn" onclick="quickViewQunatityIncrOverlay(event)"><i
                                                           class="fas fa-plus"></i></button>
                                                     <input class="quantity-text" id="input_value" type="text" value="1">
                                                     <button class="btn decre-btn" onclick="quickViewQunatityDecOverlay(event)"><i
                                                           class="fas fa-minus"></i></button>
                                                  </div>
                                                  <h4 class="overlay-product-in-bag">In Bag</h4>
                                               </div>
                                               <a class="overlay-details-link"
                                                                    onclick="groceryproductView({{ $product->id }})"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#groceryproductQuickViewModal">Details
                                                                    >></a>
                                                </div>
                                            </div>
                
                                            <div class="d-flex justify-content-center cart-details-btn ">
                                                <a onclick="addToCart({{ $product->id }}, <?php echo $productName; ?>)">
                                                   <button class="btn btn-primary-filled px-4"style="background-color: #65C21B;">
                                                       <i class="fas fa-cart-plus me-2"></i>Shop Now</button></a>
                                            </div>
                                            @endif    
                                    </div>
                                @elseif ($product->ecom_name == '3')
                                    @if($product->product_qty <= 0) 
                                    <div class="border-portfolio">
                                        <div class="card product-port">
                                            <div class="">
                                                <img src="{{ asset($product->product_thambnail) }}"
                                                    class="img-fluid  bg-img" alt="portfolio-image" height="20px">
                                            </div>
                                            <div class="text-center mt-3 mb-1">
                                                <h4 class="text-dark">
                                                    {{ $product->product_name }}
                                                </h4>
                                                
                                                <br>
                                                
                                                <b style="font-size:16px; font-weight: bold">{{ $product->unit }}</b>

                                                <!-- Selling and Discount Price Start -->
                                                @if ($product->discount_price == 0)
                                                <h5 style="color:black; font-size:16px; font-weight: bold"> <span>&#2547;</span>
                                                    {{ intval($product->selling_price) }} </h5>
                                                @else
                                                <h5>
                                                    <span class="price_style_new" style="font-size:16px; font-weight: bold"> <span>&#2547;</span>
                                                        {{ intval($product->discount_price) }}</span>
                                                    <span class="price_style_new" style="font-size:16px; font-weight: bold"><s class="text-danger " style="font-size:16px; font-weight: bold"><span>	&#2547;</span>
                                                            {{ intval($product->selling_price) }}</s></span>
                                                </h5>
                                                @endif
                                                <!-- Selling and Discount Price End -->
                                            </div>

                                            <?php
                                             $productName = strval("'" . $product->product_name . "'");
                                             ?>

                                            
                                        </div>
                                        <div class="d-flex justify-content-center cart-details-btn ">
                                            <a href="#"><button
                                                    class="btn btn-primary-filled px-4" style="background-color: #ff6000;" disabled><i
                                                        class="fas fa-cart-plus me-2" href="#"></i>Stock Out
                                                </button></a>

                                        </div>
                                    </div>
                                    @else
                                    <div class="border-portfolio">
                                        <div class="card product-port">
                                            <div class="image-overlay-container">
                                                 <a  href="{{route('ProductDetailsFashion',[$product->category_id,$product->sub_category_id,$product->product_slug_name ] )}}">
                                                <img src="{{ asset($product->product_thambnail) }}"
                                                    class="img-fluid  bg-img" alt="bppshops" height="20px">
                                                    </a>
                                            </div>
                                            <div class="text-center mt-3 mb-1">
                                                 <a  href="{{route('ProductDetailsFashion',[$product->category_id,$product->sub_category_id,$product->product_slug_name ] )}}"> <h4 class="text-dark">
                                                    {{ $product->product_name }}
                                                </h4></a>
                                                    
                                               <br>
                                                <b style="font-size:16px; font-weight: bold">{{ $product->unit }}</b>
    
                                                <!-- Selling and Discount Price Start -->
                                                @if ($product->discount_price == 0)
                                                <h4 style="color:black font-size:16px; font-weight: bold"> <span>	&#2547;</span>
                                                    {{ intval($product->selling_price) }} </h4>
                                                @else
                                                <h4>
                                                    <span style="color:black font-size:16px; font-weight: bold"> <span>	&#2547;</span>
                                                        {{ intval($product->discount_price) }}</span>
                                                    <span><s class="text-danger" style="font-size:16px; font-weight: bold"><span>	&#2547;</span>
                                                            {{ intval($product->selling_price) }}</s></span>
                                                </h4>
                                                @endif
                                                <!-- Selling and Discount Price End -->
                                            </div>
    
                                            <?php
                                                $productName = strval("'" . $product->product_name . "'");
                                             ?>
    
                                            <div >
                                               
    
                                                
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center cart-details-btn ">
                                            <a  href="{{route('ProductDetailsFashion',[$product->category_id,$product->sub_category_id,$product->product_slug_name ] )}}" ><button
                                                    class="btn btn-primary-filled px-4" style="background-color: #ff6000;"><i
                                                        class="fas fa-cart-plus me-2"></i>Shop Now
                                                </button></a>
    
                                        </div>
                                    </div>
                                    @endif
                                @endif
                           </div>
                        </div>
                        @endif
                    @endforeach
                   @else
                    <h4 class="text-danger fs-4 mt-5">Product Not Found</h4>
                   @endif
                </div>
           </div>
       </section>
       <!-- Popular products End -->
   </section>
      </div>
   </div>
</main>

@endsection