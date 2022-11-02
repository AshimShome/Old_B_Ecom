<style>
    .modal-main-row {
        margin: 0;
    }

    .modal-img {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .modal-img {
        background: #fff;
        width: 100%;
        height: 750px;
        margin: 0;
        padding: 0;
    }

    .modal-img img {
        /* width: 350px;
    height: 750px;
    padding: 0; */

        /* width: 300px;
    height: 650px; */
        width: 300px;
        height: 550px;
        margin: 40px 20px;
    }

    .modal-wrap {
        padding: 20px;
    }

    .modal-content-border {
        /* border-bottom: 1px solid #939B9E; */
        margin-bottom: 15px;
    }

    .modal-content-img {
        margin-bottom: 50px;
    }

    .modal-content-inner h3 {
        font-weight: 500;
        font-size: 24px;
        line-height: 34px;
        color: #444444;
    }

    .modal-content-img1 {
        background: #fff;
        width: 100px;
        height: 100px;
        border: 1px solid #d2d2d2;
    }

    .modal-content-img2 {
        background: #fff;
        width: 100px;
        height: 100px;
        border: 1px solid #d2d2d2;
    }

    .modal-content-img3 {
        background: #fff;
        width: 100px;
        height: 100px;
        border: 1px solid #d2d2d2;
    }

    .modal-content-img4 {
        background: #fff;
        width: 100px;
        height: 100px;
        border: 1px solid #d2d2d2;
    }

    .modal-content-img {
        width: 120px;
        height: 120px;
        border: 1px solid #d2d2d2;
        padding: 10px;
    }

    .modal-content-img img {
        width: 100px;
        height: 100px;
    }

    .modal-content-inner .pera {
        font-family: Poppins;
        font-size: 12px;
        line-height: 20px;
        color: #939b9e;
        margin-bottom: 15px;
    }

    .modal-offer {
        display: flex;
    }

    .modal-offer h5 {
        font-family: Montserrat;
        font-style: normal;
        font-weight: bold;
        font-size: 16px;
        color: #ffbb34;
        margin-bottom: 10px;
        margin-right: 5px;
    }

    .modal-offer span {
        font-weight: 600;
        font-size: 12px;
        color: #444444;
        margin-right: 5px;
        margin-bottom: 10px;
    }

    .modal-offer span del {
        color: #939b9e;
    }

    .modal-rating span {
        font-size: 16px;
    }

    .modal-rating .yellow {
        color: #ffb31f;
    }

    .modal-rating {
        margin-bottom: 10px;
    }

    .modal-btn-holder .modal-btn1 {
        background: #e3e3e3;
        border-radius: 5px;
        font-style: normal;
        font-weight: normal;
        font-size: 12px;
        line-height: 15px;
        margin-bottom: 10px;
        padding: 6px 20px;
        margin-right: 8px;
        color: #111;
    }

    .modal-cart-innr span h4 {
        font-family: Montserrat;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 17px;
        color: #444444;
        margin-bottom: 10px;
        margin-right: 30px;
    }

    .modal-cart-innr span h4 span {
        font-weight: 600;
    }

    .modal-cart-innr .liner {
        position: relative;
    }

    .modal-cart-innr .liner::before {
        position: absolute;
        content: " ";
        width: 2px;
        height: 22px;
        background: #939b9e;
        top: 4%;
        right: 13px;
    }

    .modal-cart-innr p {
        font-size: 12px;
        line-height: 19px;
        font-family: Roboto;
        color: #000000;
    }

    .modal-clr .clr1,
    .clr2,
    .clr3,
    .clr4,
    .clr5,
    .clr6,
    .clr7 {
        width: 26px;
        height: 26px;
        background: pink;
        border-radius: 50%;
        margin: 10px 0;
    }

    .modal-clr .clr2 {
        background: #3c96ff;
    }

    .modal-clr .clr3 {
        background: #000000;
    }

    .modal-clr .clr4 {
        background: #1f9b00;
    }

    .modal-clr .clr5 {
        background: #ffd12e;
    }

    .modal-clr .clr6 {
        background: #f9b92e;
    }

    .modal-clr .clr7 {
        background: #ef0000;
    }

    .cart-add-btn-holder .cart-btn {
        background: var(--primary);
        font-family: Roboto;
        font-style: normal;
        font-weight: 600;
        font-size: 17px;
        line-height: 17px;
        display: flex;
        align-items: center;
        color: #ffffff;
        padding: 11px 20px;
        border-radius: 5px;
        margin-right: 5px;
        margin-bottom: 10px;
    }

    .cart-add-btn-holder .cart-btn i {
        padding: 0 5px;
    }

    .image-list .column img {
        margin-top: 10px;
        margin-bottom: 10px;
        border: 1px solid rgb(206, 206, 206);
    }

    .product-color-list div {
        margin: 5px;
        text-align: center;
    }

    .product-color-list div img {
        border: 1px solid rgb(206, 206, 206);
    }

    .product-size .size-inner span {
        background: #c9c9c9;
        padding: 1px 12px;
        color: #fff;
        margin-right: 15px;
        border-radius: 5px;
        font-size: 20px;
        font-weight: normal;
    }

    .product-size .size-inner {
        margin-bottom: 12px;
        display: flex;
        flex-wrap: wrap;
    }
    .product-size .size-inner span{
        margin-top: 5px;
    }

    .product-size .size-inner span:hover {
        background: #FFA800;
    }

    .product-size .size-inner .size-clr.active {
        background: #FFA800;
    }

    .color-family {
        border: 1px solid #c9c9c9;
        padding: 4px 16px;
        font-size: 16px;
        border-radius: 6px;
    }

    .color-family:hover {
        border: 1px solid #FFA800;
        padding: 4px 16px;
        font-size: 16px;
        border-radius: 6px;
    }

    .product-color-list .color-family.active {
        border: 1px solid #FFA800;
    }

    .discountprice {
        color: green;
        font-size: 16px;
        font-weight: bold;
    }

    #sellingprice {
        font-family: Montserrat;
        font-style: normal;
        font-weight: bold;
        font-size: 16px;
        margin-bottom: 10px;
        margin-right: 5px;
    }

    .sellingprice {
        font-family: Montserrat;
        font-style: normal;
        font-weight: bold;
        font-size: 15px;
        margin-bottom: 10px;
    }
    
    .xzoom-preview{
        z-index: 1100000;
        /* right: 100px!important;
        top: 100px!important;
        left: 100px!important; */
    }
    .xzoom-source{
        z-index: 1100000;
    }
    .product-img-innr{
        border: 1px solid #d2d2d2;
    }
    #xzoom-modal-thumb{
        /*padding: 20px 10px;*/
    }
    #xzoom-modal-multiimage a img{
        border: 1px solid #d2d2d2;   
    }
    .product-color-list div{
        cursor: pointer;
    }
    .size-inner{
        cursor: pointer;
    }
    .shuvo ul li{
            display: list-item;
        }
      
</style>
<!-- Add to cart bar -->
<div id="cart_side" class="add_to_cart right">
    <div class="cart-inner">
        <div class="cart_top">
            <h3>my cart</h3>
            <div class="close-cart">
                <a href="javascript:void(0)" onclick="closeCart()">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
            <div id="cart_side">

            </div>
        </div>
        <div class="cart_media">
            <ul id="cart_product_container" class="cart_product">
            </ul>
            <ul class="cart_total ">
                <li class="mx-3">
                    <div class="total">
                        Grant total<span id="cartSubTotal"></span>
                    </div>
                </li>

                <li class="mx-3">
                
                </li>

                </li>
                <li>
                    <div class="buttons d-flex justify-content-center">
                        <a href="{{ route('checkout') }}" type="submit" class="btn"><span
                                class="btn-primary-filled px-4 py-2">PLACE
                                ORDER</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>


<!-- Product Quick View Modal-->
<div class="modal fade" id="productQuickViewModal" tabindex="-1" aria-labelledby="adduserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered product-quick-view-modal">
        <div class="modal-content">
            <div class="modal-body p-0">
                <button type="button" class="btn-close btn-close-design" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                <div class="row modal-main-row w-100">
                    <div class="col-lg-6 col-md-12 col-sm-12 p-0 modal-syle-img d-flex align-items-center">
                        <div class="row">
                            <div class="col-12">
                                
                                <div class="xzoom-container p-4">
                                    <div class="product-img-innr">
                                        <img class="xzoom5 img-fluid" id="xzoom-modal-thumb" src="" xoriginal="" />     
                                    </div>

                                    <div class="xzoom-thumbs product-slider-img-innr pt-3" id="xzoom-modal-multiimage">
                                        <a id="xzoom-modal-multiimage-link-1" href="">
                                            <img id="xzoom-modal-multiimage-1" class="xzoom-gallery5"
                                                    width="80" src="" title="">
                                        </a> 
                                        <a id="xzoom-modal-multiimage-link-2" href="">
                                            <img id="xzoom-modal-multiimage-2" class="xzoom-gallery5"
                                                    width="80" src="" title="">
                                        </a>            
                                        <a id="xzoom-modal-multiimage-link-3" href="">
                                            <img id="xzoom-modal-multiimage-3" class="xzoom-gallery5"
                                                    width="80" src="" title="">
                                        </a>            
                                        <a id="xzoom-modal-multiimage-link-4" href="">
                                            <img id="xzoom-modal-multiimage-4" class="xzoom-gallery5"
                                                    width="80" src="" title="">
                                        </a>
                                        <a id="xzoom-modal-multiimage-link-5" href="">
                                            <img id="xzoom-modal-multiimage-5" class="xzoom-gallery5"
                                                    width="80" src="" title="">
                                        </a>
                                        <a id="xzoom-modal-multiimage-link-6" href="">
                                            <img id="xzoom-modal-multiimage-6" class="xzoom-gallery5"
                                                    width="80" src="" title="">
                                        </a>              
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col  -->
                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="modal-wrap">
                            <div class="row w-100">
                                <!-- end col  -->
                                <div class="col-lg-12  col-md-12 col-sm-12">

                                    <div class="modal-content-inner modal-content-border ">
                                        <h3 id="pname"></h3>
                                         <h6 class="mb-3 product-title" >Product Code : <span style="color:#ffa800;margin-left:7px" id="product_code_islamic"> </span></h6>
                                        <div class="d-flex">
                                           
                                          <div class="mt-2">
                                                <span class="me-2" style="font-size: 16px; font-weight:bold !important; color:#cf6208 !important;"><span class="fs-6" style="font-size: 16px; font-weight:bold !important; color:red !important"></span> &#2547;
                                                    <span class="fw-bold" id="price" style="font-weight:bold; color:#cf6208 !important; font-size: 16px " > </span> </span>
                                                    
                                                <span style="font-size: 16px; font-weight:bold !important; color:red !important" ><span class="fs-6"></span> <s>
                                                <span class="primary-text fw-bold" id="oldprice" style="font-size: 16px; font-weight:bold !important; color:red !important"></span> </s> </span>
                                                
                                            </div>
                                            
                                            
                                        </div>
                                        <!-- end modal-offer  -->
                                         <div id="pvm-rating" class="modal-rating">
                                             
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span>(0 Reviews)</span>
                                        </div>
                                        <p class="pera" id="pdetails"> </p>
                                        <p style="width: 0px: height: 0px" id="product_id"></p>

                                        <div class="modal-cart-innr d-flex align-items-center flex-wrap">
                                            <span class="liner">
                                                <h4>Product Material: <span id="pmtrl" style="color: Crimson">
                                                    </span>
                                                </h4>
                                            </span>
                                            <span>
                                                <h4>Stock: <span id="aviable" style="color: green;"></span></h4>
                                            </span>
                                        </div>
                                        <!-- end modal-cart-innr  -->
                                        <div class="product-size pt-2">
                                            <h4 class="mb-2">Size </h4>
                                            <div class="size-inner" id="size_data">
                                            </div>
                                        </div>
                                        <div class="product-color py-3">
                                            <h4>Color Family :</h4>
                                            <div class="product-color-list d-flex col-lg-2 w-100 flex-wrap" id="color_data">

                                            </div>
                                        </div>


                                        <div class="product-details-quantity quality-inner">
                                            <h4 class="product-title">Quantity</h4>
                                           <div class="product-quantity-inner">
                                            <button onclick="quickViewQunatityDec(event)"><i class="fas fa-minus"></i></button>
                                                 <input id="qty" type="text" value="1">
                                            <button onclick="quickViewQunatityIncr(event)"><i class="fas fa-plus"></i></button>
                                            </div>
                                        </div>
                                        <!-- end quality-inner  -->

                                        <div
                                            class="cart-add-btn-holder d-flex justify-content-start align-items-center flex-wrap mt-4">
                                            <a style="background-color: #f9b92e;" href="#" class="cart-btn" onclick="addToCartFromModal()"> <i
                                                    class="fas fa-shopping-cart "> </i> Add
                                                to Cart </a>
                                            <a style="background-color: #f9b92e;" id="details_link" class="cart-btn"><i class="fas fa-shopping-cart"></i>Details</a>
                                        </div>
                                    </div>
                                    <!-- end modal-content-inner  -->
                                </div>
                                <!-- end col  -->

                                <div class="col-lg-9 col-sm-12">

                                    <!-- end cart-add-btn-holder  -->

                                </div>
                                <!-- end col  -->
                            </div>
                            <!-- end row  -->

                        </div>
                        <!-- end modal-wrap  -->
                    </div>
                    <!-- end col  -->
                </div>
                <!-- end row  -->
            </div>
            <!-- end modal-body  -->
        </div>
    </div>
</div>



{{-- ---------------Grocery Model--------------------- --}}
@php
$setting = App\Models\SiteSetting::find(1);
@endphp
<div class="modal fade" id="groceryproductQuickViewModal" tabindex="-1" aria-labelledby="adduserModalLabel"
      aria-hidden="true" style="padding-right: 0px;">
      <div class="modal-dialog modal-xl modal-dialog-centered product-quick-view-modal">
         <div class="modal-content">
            <div class="modal-body p-3">
               <div class="modal-close-btn">
                  <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close"><i
                        class="far fa-times-circle"></i></button>
               </div>
               <div class="row view-modal">
                  <div class="col-lg-5 col-sm-12 col-12 d-flex align-items-center">
                    <img class="xzoom5 img-fluid" id="gxzoom-modal-thumb" src="" xoriginal="" />  
                  </div>
                  <div class="col-lg-7">
                     <div class="row">
                        <div class="product-details col-lg-10 col-12">
                           <h3 class="mb-3 product-title" id="gpname"></h3>
                           <div class="col">
                               <h6 class="mb-3 product-title" >Product Code : <span style="color:#65C21B;margin-left:7px" id="product_code_grocery"> </span></h6>
                          
                              <h5>
                                 <span class="mt-2" id="gpunit">50g</span>
                                 <p style="width: 0px: height: 0px" id="gproduct_id"></p>
                              </h5>
                           </div>
                           <div class="rating-container py-2 d-flex">
                           </div>
                           <div class="row">
                              <div class="col-9 mt-2">
                
                                    <span class="me-2" style="font-size: 16px; font-weight:bold !important; color:#cf6208 !important;">
                                        <span class="fs-6" style="font-size: 16px; font-weight:bold !important; color:red !important"></span> &#2547;
                                        <span class="fw-bold" id="gprice" style="font-weight:bold; color:#cf6208 !important; font-size: 16px " > </span> </span>
                                        
                                    <span style="font-size: 16px; font-weight:bold !important; color:red !important" ><span class="fs-6"></span> <s>
                                    <span class="primary-text fw-bold" id="goldprice" style="font-size: 16px; font-weight:bold !important; color:red !important"></span> </s> </span>
                             
                              </div>
                              <!--<div class="col-2 price-container">-->
                                 
                              <!--   <p class="price-tag text-center">30%</p>-->
                              <!--</div>-->
                           </div>
                           <div class="row mt-3">
                              <div class="col-md-6 col-12">
                                 <div class="product-quantity py-3">
                                 <div class="product-quantity-inner">
                                    <button onclick="quickViewQunatityDec(event)"><i class="fas fa-minus"></i></button>
                                           <input id="gqty" type="text" value="1">
                                    <button onclick="quickViewQunatityIncr(event)"><i class="fas fa-plus"></i></button>
                                    </div> 
                                 </div>
                              </div>
                              <div class="col-md-6 col-12">
                                 <a style="background-color:#65C21B;;" onclick="addToCartFromModalGrocery()" class="btn btn-rounded btn-sm btn-buy" tabindex="0">
                                    <i class="fas fa-cart-plus me-2"></i>Add To Cart
                                 </a>
                              </div>
                           </div>
                           <div class="divider">
                           </div>
                           <div class="details shuvo">
                              <p id="gproduct_desc">
                                
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row" style=" margin: 9px">
                  <div class="top-footer">
                     <div class="banner">
                        <div class="left-part">
                           <ul>
                              <li>
                                 <span class="icon">
                                    <img src="{{ asset('frontend/assets/images/icon/delivery.png')}}" style="width: 50px;
                                    height: 40px; margin-top: 8px;">
                                    <h5>3 Hours delivery</h5>
                                 </span>
                              </li>
                              <li>
                                 <span class="icon">
                                    <img src="{{ asset('frontend/assets/images/icon/cash.png')}}"
                                       style="width: 50px; height: 35px; margin-top: 8px;">
                                    <h5>Cash on delivery</h5>
                                 </span>
                              </li>
                           </ul>
                        </div>
                        <!--<div class="right-part">-->
                        <!--   <ul>-->
                        <!--      <li class="text">Pay with</li>-->
                        <!--      <li class="icon">-->
                        <!--         <img src="{{ asset('frontend/assets/images/icon/brac-bank.png')}}" class="img-fluid"-->
                        <!--            style="height: 40px; margin: 8px;">-->
                        <!--      </li>-->
                        <!--      <li class="icon">-->
                        <!--         <img src="{{ asset('frontend/assets/images/icon/city-bank.png')}}" class="img-fluid"-->
                        <!--            style="height: 40px; margin: 8px;">-->
                        <!--      </li>-->
                        <!--      <li class="icon">-->
                        <!--         <img src="{{ asset('frontend/assets/images/icon/dbbl.png')}}" class="img-fluid"-->
                        <!--            style=" height: 40px; margin: 8px;">-->
                        <!--      </li>-->
                        <!--      <li class="icon">-->
                        <!--         <img src="{{ asset('frontend/assets/images/icon/rocket.png')}}" class="img-fluid"-->
                        <!--            style="height: 40px; margin: 8px;">-->
                        <!--      </li>-->
                        <!--   </ul>-->
                        <!--</div>-->
                     </div>
                  </div>
               </div>
               <div class="row d-none" style="padding: 14px; margin-top: 30px;">
                  <div class="col-lg-8">
                     <div class="footer-left">
                        <div class="top">
                           <h5>Grocery Shop</h5>
                           <!--<p id="gproduct_desc">-->
                            
                           </p>
                        </div>
                        <div class="bottom">
                           <div class="row">
                              <div class="col-lg-4">
                                 <h6>Customer Service</h6>
                                 <ul class="footer-links">
                                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                    <li><a href="{{ route('info.terms') }}">Terms and Conditions</a></li>
                                 </ul>
                              </div>
                              <div class="col-lg-4">
                                 <h6>About us</h6>
                                 <ul class="footer-links">
                                    <li><a href="{{ route('info.privacy') }}">Privacy Policy</a></li>
                                    <li><a href="{{ route('info.policy') }}">Return and Return Policy</a></li>
                                 </ul>
                              </div>
                             
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div class="footer-right">
                        <div class="app-section">
                           <img src="{{ asset('frontend/assets/images/icon/google_play.jpg')}}"
                              style="width: 100px; height: 30px; cursor: pointer;">
                           <img src="{{ asset('frontend/assets/images/icon/app_store.jpg')}}"
                              style="width: 100px; height: 30px; cursor: pointer;">
                        </div>
                        <div class="contact-section">
                           <div class="phone-number">
                              <span class="phone-icon">
                                 <img src="{{ asset('frontend/assets/images/icon/phone.png')}}" alt="">
                                 <span class="text">{{ optional($setting)->phone_one }}</span>
                              </span>
                           </div>
                           <div class="email-address">
                              <span class="pre-text">or email</span>
                              <span class="email"><strong>{{ optional($setting)->email }}</strong></span>
                           </div>
                        </div>
                        <div class="social-section">
                           <ul>
                              <li>
                                 <a href={{ optional($setting)->email }} target="_blank">
                                    <img src="{{ asset('frontend/assets/images/icon/gmail.png')}}" class="img-fluid"
                                       style="margin-right: 6px;">
                                 </a>
                              </li>
                              <li>
                                 <a href={{ optional($setting)->facebook }} target="_blank">
                                    <img src="{{ asset('frontend/assets/images/icon/facebook.png')}}" class="img-fluid"
                                       style="height: 25px; margin-right: 6px;">
                                 </a>
                              </li>
                              <li>
                                 <a href={{ optional($setting)->twitter }} target="_blank">
                                    <img src="{{ asset('frontend/assets/images/icon/intagram.png')}}" class="img-fluid"
                                       style="height: 25px; margin-right: 6px;">
                                 </a>
                              </li>
                              <li>
                                 <a href={{ optional($setting)->youtube }} target="_blank">
                                    <img src="{{ asset('frontend/assets/images/icon/youtube.png')}}" class="img-fluid"
                                       style="margin-right: 6px;">
                                 </a>
                              </li>
                              <li>
                                 <a href={{ optional($setting)->linkedin }} target="_blank">
                                    <img src="{{ asset('frontend/assets/images/icon/pinterest.png')}}" class="img-fluid"
                                       style="height: 25px;">
                                 </a>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!--{{-- ---------------Grocery End Model--------------------- --}}-->
   
   
   
<!-- ---------------Baby End Model--------------------- -->
<div class="modal fade" id="productQuickViewModalBaby" tabindex="-1" aria-labelledby="adduserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered product-quick-view-modal">
        <div class="modal-content">
            <div class="modal-body p-0">
                <button type="button" class="btn-close btn-close-design" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                <div class="row modal-main-row w-100">
                    <div class="col-lg-6 col-md-12 col-sm-12 p-0 modal-syle-img d-flex align-items-center">
                        <div class="row">
                            <div class="col-12">

                                <div class="xzoom-container p-4">
                                    <div class="product-img-innr">
                                        <img class="xzoom img-fluid" id="b_xzoom-modal-thumb" src="" xoriginal="" />
                                    </div>

                                    <div class="xzoom-thumbs product-slider-img-innr pt-3" id="b_xzoom-modal-multiimage">
                                        <a id="b_xzoom-modal-multiimage-link-1" href="">
                                            <img id="b_xzoom-modal-multiimage-1" class="xzoom-gallery"
                                                    width="80" src="" title="">
                                        </a>
                                        <a id="b_xzoom-modal-multiimage-link-2" href="">
                                            <img id="b_xzoom-modal-multiimage-2" class="xzoom-gallery"
                                                    width="80" src="" title="">
                                        </a>
                                        <a id="b_xzoom-modal-multiimage-link-3" href="">
                                            <img id="b_xzoom-modal-multiimage-3" class="xzoom-gallery"
                                                    width="80" src="" title="">
                                        </a>
                                        <a id="b_xzoom-modal-multiimage-link-4" href="">
                                            <img id="b_xzoom-modal-multiimage-4" class="xzoom-gallery"
                                                    width="80" src="" title="">
                                        </a>
                                        <a id="b_xzoom-modal-multiimage-link-5" href="">
                                            <img id="b_xzoom-modal-multiimage-5" class="xzoom-gallery"
                                                    width="80" src="" title="">
                                        </a>
                                        <a id="b_xzoom-modal-multiimage-link-6" href="">
                                            <img id="b_xzoom-modal-multiimage-6" class="xzoom-gallery"
                                                    width="80" src="" title="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col  -->
                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="modal-wrap">
                            <div class="row w-100">
                                <!-- end col  -->
                                <div class="col-lg-12  col-md-12 col-sm-12">

                                    <div class="modal-content-inner modal-content-border ">
                                        <h3 id="b_pname"></h3>
                                        <div class="d-flex">

                                          <div class="mt-2">
                                                <span class="me-2" style="font-size: 16px; font-weight:bold !important; color:black !important;"><span class="fs-6" style="font-size: 16px; font-weight:bold !important; color:black !important"></span> &#2547;
                                                    <span class="fw-bold" id="b_price" style="font-weight:bold; color:black !important; font-size: 16px " > </span> </span>

                                                <span style="font-size: 16px; font-weight:bold !important; color:red !important" ><span class="fs-6"></span> <s> 
                                                <span class="primary-text fw-bold" id="b_oldprice" style="font-size: 16px; font-weight:bold !important; color:red !important"></span> </s> </span>

                                          </div>


                                        </div>
                                        <!-- end modal-offer  -->
                                         <div id="pvm-rating" class="modal-rating">
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span>(0 Reviews)</span>
                                        </div>
                                        <p class="pera" id="b_pdetails"> </p>
                                        <p style="width: 0px: height: 0px" id="b_product_id"></p>

                                        <div class="modal-cart-innr d-flex align-items-center flex-wrap">
                                            <span class="liner">
                                                <h4>Product Material: <span id="b_pmtrl" style="color: Crimson">
                                                    </span>
                                                </h4>
                                            </span>
                                            <span>
                                                <h4>Stock: <span id="b_aviable" style="color: green;"></span></h4>
                                            </span>
                                        </div>
                                        <!-- end modal-cart-innr  -->
                                        <div class="product-size pt-2">
                                            <h4 class="mb-2">Size </h4>
                                            <div class="size-inner" id="b_size_data">
                                            </div>
                                        </div>
                                        <div class="product-color py-3">
                                            <h4>Color Family :</h4>
                                            <div class="product-color-list b_product-color-list d-flex col-lg-2 w-100 flex-wrap" id="b_color_data">

                                            </div>
                                        </div>


                                        <div class="product-details-quantity quality-inner">
                                            <h4 class="product-title">Quantity</h4>
                                            <div class="product-quantity-inner">
                                                <button onclick="quickViewQunatityIncr(event)"><i
                                                        class="fas fa-plus"></i></button>
                                                <input id="b_qty" type="text" value="1">
                                                <button onclick="quickViewQunatityDec(event)"><i
                                                        class="fas fa-minus"></i></button>
                                            </div>
                                        </div>
                                        <!-- end quality-inner  -->

                                        <div
                                            class="cart-add-btn-holder d-flex justify-content-start align-items-center flex-wrap mt-4">
                                            <a href="#" style="background-color: #f11a1a" class="cart-btn" onclick="addToCartFromModalBaby()"> <i
                                                    class="fas fa-shopping-cart "> </i> Add
                                                to Cart </a>
                                            <a  id="b_details_link" style="background-color: #f11a1a !important"  class="cart-btn"><i class="fas fa-shopping-cart"></i>Details</a>
                                        </div>
                                    </div>
                                    <!-- end modal-content-inner  -->
                                </div>
                                <!-- end col  -->

                                <div class="col-lg-9 col-sm-12">

                                    <!-- end cart-add-btn-holder  -->

                                </div>
                                <!-- end col  -->
                            </div>
                            <!-- end row  -->

                        </div>
                        <!-- end modal-wrap  -->
                    </div>
                    <!-- end col  -->
                </div>
                <!-- end row  -->
            </div>
            <!-- end modal-body  -->
        </div>
    </div>
</div>
  <!-- ---------------baby end--------------- -->  
     <!-- ---------------furnitur model--------------- -->

   <div class="modal fade" id="productQuickViewModalFurnitur" tabindex="-1" aria-labelledby="adduserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered product-quick-view-modal">
        <div class="modal-content">
            <div class="modal-body p-0">
                <button type="button" class="btn-close btn-close-design" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                <div class="row modal-main-row w-100">
                    <div class="col-lg-6 col-md-12 col-sm-12 p-0 modal-syle-img d-flex align-items-center">
                        <div class="row">
                            <div class="col-12">
                                
                                <div class="xzoom-container p-4">
                                    <div class="product-img-innr">
                                        <img class="xzoom2 img-fluid" id="fxzoom-modal-thumb" src="" xoriginal="" />     
                                    </div>

                                    <div class="xzoom-thumbs product-slider-img-innr pt-3" id="fxzoom-modal-multiimage">
                                        <a id="fxzoom-modal-multiimage-link-1" href="">
                                            <img id="fxzoom-modal-multiimage-1" class="xzoom-gallery2"
                                                    width="80" src="" title="">
                                        </a> 
                                        <a id="fxzoom-modal-multiimage-link-2" href="">
                                            <img id="fxzoom-modal-multiimage-2" class="xzoom-gallery2"
                                                    width="80" src="" title="">
                                        </a>            
                                        <a id="fxzoom-modal-multiimage-link-3" href="">
                                            <img id="fxzoom-modal-multiimage-3" class="xzoom-gallery2"
                                                    width="80" src="" title="">
                                        </a>            
                                        <a id="fxzoom-modal-multiimage-link-4" href="">
                                            <img id="fxzoom-modal-multiimage-4" class="xzoom-gallery2"
                                                    width="80" src="" title="">
                                        </a>
                                        <a id="fxzoom-modal-multiimage-link-5" href="">
                                            <img id="fxzoom-modal-multiimage-5" class="xzoom-gallery2"
                                                    width="80" src="" title="">
                                        </a>
                                        <a id="fxzoom-modal-multiimage-link-6" href="">
                                            <img id="fxzoom-modal-multiimage-6" class="xzoom-gallery2"
                                                    width="80" src="" title="">
                                        </a>              
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col  -->
                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="modal-wrap">
                            <div class="row w-100">
                                <!-- end col  -->
                                <div class="col-lg-12  col-md-12 col-sm-12">

                                    <div class="modal-content-inner modal-content-border ">
                                        <h3 id="fpname"></h3>
                                        <div class="d-flex">
                                            
                                          <div class="mt-2">
                                                <span class="me-2" style="font-size: 16px; font-weight:bold !important; color:#cf6208 !important;"><span class="fs-6" style="font-size: 16px; font-weight:bold !important; color:red !important"></span> &#2547;
                                                    <span class="fw-bold" id="fprice" style="font-weight:bold; color:#cf6208 !important; font-size: 16px " > </span> </span>
                                                    
                                                <span style="font-size: 16px; font-weight:bold !important; color:red !important" ><span class="fs-6"></span> <s>
                                                <span class="primary-text fw-bold" id="foldprice" style="font-size: 16px; font-weight:bold !important; color:red !important"></span> </s> </span>
                                                
                                            </div>
                                            
                                            
                                        </div>
                                        <!-- end modal-offer  -->
                                         <div id="pvm-rating-furniture" class="modal-rating">
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span>(0 Reviews)</span>
                                        </div>
                                        <p class="pera" id="fpdetails"> </p>
                                        <p style="width: 0px: height: 0px" id="fproduct_id"></p>

                                        <div class="modal-cart-innr d-flex align-items-center flex-wrap">
                                            <span class="liner">
                                                <h4>Product Material: <span id="fpmtrl" style="color: Crimson">
                                                    </span>
                                                </h4>
                                            </span>
                                            <span>
                                                <h4>Stock: <span id="faviable" style="color: green;"></span></h4>
                                            </span>
                                        </div>
                                        <!-- end modal-cart-innr  -->
                                        {{-- <div class="product-size pt-2">
                                            <h4 class="mb-2">Size </h4>
                                            <div class="size-inner" id="fsize_data">
                                            </div>
                                        </div> --}}
                                        <div class="product-color py-3">
                                            <h4>Color Family :</h4>
                                            <div class="product-color-list d-flex col-lg-2 w-100 flex-wrap" id="fcolor_data">

                                            </div>
                                        </div>


                                        <div class="product-details-quantity quality-inner">
                                            <h4 class="product-title">Quantity</h4>
                                            <div class="product-quantity-inner">
                                                <button onclick="quickViewQunatityIncr(event)"><i
                                                        class="fas fa-plus"></i></button>
                                                <input id="fur-qty" type="text" value="1">
                                                <button onclick="quickViewQunatityDec(event)"><i
                                                        class="fas fa-minus"></i></button>
                                            </div>
                                        </div>
                                        <!-- end quality-inner  -->

                                        <div
                                            class="cart-add-btn-holder d-flex justify-content-start align-items-center flex-wrap mt-4">
                                            <a href="#" class="cart-btn"  style ="background-color:#223E3F" onclick="addToCartFromModalFurnitur()"> <i
                                                    class="fas fa-shopping-cart "> </i> Add
                                                to Cart </a>
                                                <a id="f_details_link" class="cart-btn f_details_link" style ="background-color:#223E3F" ><i class="fas fa-shopping-cart"></i>Details</a>
                                            
                                        </div>
                                    </div>
                                    <!-- end modal-content-inner  -->
                                </div>
                                <!-- end col  -->

                                <div class="col-lg-9 col-sm-12">

                                    <!-- end cart-add-btn-holder  -->

                                </div>
                                <!-- end col  -->
                            </div>
                            <!-- end row  -->

                        </div>
                        <!-- end modal-wrap  -->
                    </div>
                    <!-- end col  -->
                </div>
                <!-- end row  -->
            </div>
            <!-- end modal-body  -->
        </div>
    </div>
</div>
  
  <!--{{-- ---------------furnitur model end--------------- --}}-->
   
     <!-- =============================== Fashion  Product View Modal ============================================================-->
    <div class="modal fade" id="productQuickViewModalFashion" tabindex="-1" aria-labelledby="adduserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered product-quick-view-modal">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <button type="button" class="btn-close btn-close-design" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                    <div class="row modal-main-row w-100">
                        <div class="col-lg-6 col-md-12 col-sm-12 p-0 modal-syle-img d-flex align-items-center">
                            <div class="row">
                                <div class="col-12">
                                    
                                    <div class="xzoom-container p-4">
                                        <div class="product-img-innr">
                                            <img class="xzoom3 img-fluid" id="fashion_xzoom-modal-thumb" src="" xoriginal="" />     
                                        </div>
    
                                        <div class="xzoom-thumbs product-slider-img-innr " id="fashion_xzoom-modal-multiimage">
                                            <a id="fashion_xzoom-modal-multiimage-link-1" href="">
                                                <img id="fashion_xzoom-modal-multiimage-1" class="xzoom-gallery3"
                                                        width="80" src="" title="">
                                            </a> 
                                            <a id="fashion_xzoom-modal-multiimage-link-2" href="">
                                                <img id="fashion_xzoom-modal-multiimage-2" class="xzoom-gallery3"
                                                        width="80" src="" title="">
                                            </a>            
                                            <a id="fashion_xzoom-modal-multiimage-link-3" href="">
                                                <img id="fashion_xzoom-modal-multiimage-3" class="xzoom-gallery3"
                                                        width="80" src="" title="">
                                            </a>            
                                            <a id="fashion_xzoom-modal-multiimage-link-4" href="">
                                                <img id="fashion_xzoom-modal-multiimage-4" class="xzoom-gallery3"
                                                        width="80" src="" title="">
                                            </a>
                                            <a id="fashion_xzoom-modal-multiimage-link-5" href="">
                                                <img id="fashion_xzoom-modal-multiimage-5" class="xzoom-gallery3"
                                                        width="80" src="" title="">
                                            </a>
                                            <a id="fashion_xzoom-modal-multiimage-link-6" href="">
                                                <img id="fashion_xzoom-modal-multiimage-6" class="xzoom-gallery3"
                                                        width="80" src="" title="">
                                            </a>              
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col  -->
                        </div>
    
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="modal-wrap">
                                <div class="row w-100">
                                    <!-- end col  -->
                                    <div class="col-lg-12  col-md-12 col-sm-12">
    
                                        <div class="modal-content-inner modal-content-border ">
                                            <h3 id="fashion_pname"></h3>
                                             <h6 class="mb-3 product-title" >Product Code : <span style="color:#ff6000;margin-left:7px" id="product_code_fashion"> </span></h6>
                                            <div class="d-flex">
                                               
                                              <div class="mt-2">
                                                    <span class="me-2" style="font-size: 16px; font-weight:bold !important; color:#222 !important;">
                                                        <span class="fs-6" style="font-size: 16px; font-weight:bold !important; color:red !important"></span> &#2547;
                                                        <span class="fw-bold" id="fashion_price" style="font-weight:bold; color:#222 !important; font-size: 16px " > </span> </span>
                                                        
                                                    <span style="font-size: 16px; font-weight:bold !important; color:red !important" ><span class="fs-6"></span> <s> 
                                                    <span class="primary-text fw-bold" id="fashion_oldprice" style="font-size: 16px; font-weight:bold !important; color:red !important"></span> </s> </span>
                                                    
                                                </div>
                                                </div>
                                            <!-- end modal-offer  -->
                                             <div id="fashion_pvm_rating" class="modal-rating">
                                                
                                            </div>
                                            <p class="pera" id="fashion_pdetails"> </p>
                                            <p style="width: 0px: height: 0px" id="fashion_product_id"></p>
    
                                            <div class="modal-cart-innr d-flex align-items-center flex-wrap">
                                                <span class="liner">
                                                    <h4>Product Material: <span id="fashion_pmtrl" style="color: Crimson">
                                                        </span>
                                                    </h4>
                                                </span>
                                                <span>
                                                    <h4>Stock: <span id="fashion_aviable" style="color: green;"></span></h4>
                                                </span>
                                            </div>
                                            <!-- end modal-cart-innr  -->
                                            <div class="product-size pt-2">
                                                <h4 class="mb-2">Size </h4>
                                                <div class="size-inner" id="fashion_size_data">
                                                </div>
                                            </div>
                                            <div class="product-color py-3">
                                                <h4>Color Family :</h4>
                                                <div class="product-color-list d-flex col-lg-2 w-100 flex-wrap" id="fashion_color_data">
    
                                                </div>
                                            </div>
    
    
                                            <div class="product-details-quantity quality-inner">
                                                <h4 class="product-title">Quantity</h4>
                                               <div class="product-quantity-inner">
                                                <button onclick="quickViewQunatityDec(event)"><i class="fas fa-minus"></i></button>
                                                     <input id="qty" type="text" value="1">
                                                <button onclick="quickViewQunatityIncr(event)"><i class="fas fa-plus"></i></button>
                                                </div>
                                            </div>
                                            <!-- end quality-inner  -->
    
                                            <div class="cart-add-btn-holder d-flex justify-content-start align-items-center flex-wrap mt-4">
                                  <a href="#" data-bs-dismiss="modal" aria-label="Close" class="cart-btn" onclick="addToCartProductFashion()"> 
                                  <i class="fas fa-shopping-cart "> </i> Add to Cart </a>
                                <a id="fashion_details_link" class="cart-btn"><i class="fas fa-shopping-cart"></i>Details</a>
                                            </div>
                                        </div>
                                        <!-- end modal-content-inner  -->
                                    </div>
                                    <!-- end col  -->
                                    <div class="col-lg-9 col-sm-12">
                                        <!-- end cart-add-btn-holder  -->
                                    </div>
                                    <!-- end col  -->
                                </div>
                                <!-- end row  -->
    
                            </div>
                            <!-- end modal-wrap  -->
                        </div>
                        <!-- end col  -->
                    </div>
                    <!-- end row  -->
                </div>
                <!-- end modal-body  -->
            </div>
        </div>
    </div>
{{-- ----------electronic modal start--------------------- --}}
<div class="modal fade" id="productQuickViewModalElectronics" tabindex="-1" aria-labelledby="adduserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered product-quick-view-modal">
        <div class="modal-content">
            <div class="modal-body p-0">
                <button type="button" class="btn-close btn-close-design" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                <div class="row modal-main-row w-100">
                    <div class="col-lg-6 col-md-12 col-sm-12 p-0 modal-syle-img d-flex align-items-center">
                        <div class="row">
                            <div class="col-12">

                                <div class="xzoom-container p-4">
                                    <div class="product-img-innr">
                                        <img class="xzoom4 img-fluid" id="exzoom-modal-thumb" src="" xoriginal="" />
                                    </div>

                                    <div class="xzoom-thumbs product-slider-img-innr pt-3" id="exzoom-modal-multiimage">
                                        <a id="exzoom-modal-multiimage-link-1" href="">
                                            <img id="exzoom-modal-multiimage-1" class="xzoom-gallery4"
                                                    width="80" src="" title="">
                                        </a>
                                        <a id="exzoom-modal-multiimage-link-2" href="">
                                            <img id="exzoom-modal-multiimage-2" class="xzoom-gallery4"
                                                    width="80" src="" title="">
                                        </a>
                                        <a id="exzoom-modal-multiimage-link-3" href="">
                                            <img id="exzoom-modal-multiimage-3" class="xzoom-gallery4"
                                                    width="80" src="" title="">
                                        </a>
                                        <a id="exzoom-modal-multiimage-link-4" href="">
                                            <img id="exzoom-modal-multiimage-4" class="xzoom-gallery4"
                                                    width="80" src="" title="">
                                        </a>
                                        <a id="exzoom-modal-multiimage-link-5" href="">
                                            <img id="exzoom-modal-multiimage-5" class="xzoom-gallery4"
                                                    width="80" src="" title="">
                                        </a>
                                        <a id="exzoom-modal-multiimage-link-6" href="">
                                            <img id="exzoom-modal-multiimage-6" class="xzoom-gallery4"
                                                    width="80" src="" title="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="modal-wrap">
                            <div class="row w-100">
                           
                                <div class="col-lg-12  col-md-12 col-sm-12">

                                    <div class="modal-content-inner modal-content-border ">
                                        <h3 id="epname"></h3>
                                        <div class="d-flex">

                                          <div class="mt-2">
                                                <span class="me-2" style="font-size: 16px; font-weight:bold !important; color:#cf6208 !important;">
                                                    <span class="fs-6" style="font-size: 16px; font-weight:bold !important; color:red !important"></span> &#2547;
                                                    <span class="fw-bold" id="eprice" style="font-weight:bold; color:#cf6208 !important; font-size: 16px " > </span> </span>

                                                <span style="font-size: 16px; font-weight:bold !important; color:red !important" ><span class="fs-6"></span> <s> 
                                                <span class="primary-text fw-bold" id="eoldprice" style="font-size: 16px; font-weight:bold !important; color:red !important"></span> </s> </span>

                                            </div>


                                        </div>
                                       
                                         <div id="epvm-rating" class="modal-rating">
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span>(0 Reviews)</span>
                                        </div>
                                        <p class="pera" id="epdetails"> </p>
                                        <p style="width: 0px: height: 0px" id="eproduct_id"></p>

                                        <div class="modal-cart-innr d-flex align-items-center flex-wrap">
                                            <span class="liner">
                                                <h4>Product Material: <span id="epmtrl" style="color: Crimson">
                                                    </span>
                                                </h4>
                                            </span>
                                            <span>
                                                <h4>Stock: <span id="eaviable" style="color: green;"></span></h4>
                                            </span>
                                        </div>
                                        
                                        <div class="product-size pt-2">
                                            <h4 class="mb-2">Size </h4>
                                            <div class="size-inner" id="esize_data">
                                            </div>
                                        </div>
                                        <div class="product-color py-3">
                                            <h4>Color Family :</h4>
                                            <div class="product-color-list d-flex col-lg-2 w-100 flex-wrap" id="ecolor_data">

                                            </div>
                                        </div>


                                        <div class="product-details-quantity quality-inner">
                                            <h4 class="product-title">Quantity</h4>
                                            <div class="product-quantity-inner">
                                                <button onclick="quickViewQunatityIncr(event)"><i
                                                        class="fas fa-plus"></i></button>
                                                <input id="eqty" type="text" value="1">
                                                <button onclick="quickViewQunatityDec(event)"><i
                                                        class="fas fa-minus"></i></button>
                                            </div>
                                        </div>
                                      

                                        <div
                                            class="cart-add-btn-holder d-flex justify-content-start align-items-center flex-wrap mt-4">
                                            <a href="#" class="cart-btn" onclick="addToCartFromModalElectronict()" style="background-color:#008081"> <i
                                                    class="fas fa-shopping-cart " > </i> Add
                                                to Cart </a>
                                            <a id="edetails_link" class="cart-btn" style="background-color:#008081"><i class="fas fa-shopping-cart" ></i>Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function myGallary(images) {
        var image = document.getElementById("pimg");
        image.src = images.src;
    }
</script>
