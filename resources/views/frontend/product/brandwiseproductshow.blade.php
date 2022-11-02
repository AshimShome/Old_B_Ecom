@extends('frontend.main_master')
@include('frontend.body.cosmeticts_fontend_sidber')

@section('islamic')
<main class="main-body">
    <div id="sidemenu-container" class="sidemenu-container hide-menu">
        <ul id="category-toggle-custom-sidemenu" class="category-sidemenu">
            <div class="category-sidemenu-back-container">
                <a href="index.html">
                    <h3 class="mb-2">Cosmetic</h3>
                </a>
            </div>

            <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                    data-bs-target="#food-collapse" aria-expanded="false">
                    <img src="../assets/images/cosmeticProjectImage/lip.png" class="sidemenu-icon" alt="" srcset="">
                    Lips
                </button>
                <div class="collapse" id="food-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small sub-category">
                        <li>
                            <button class="btn btn-toggle align-items-center rounded collapsed"
                                data-bs-toggle="collapse" data-bs-target="#meat-fish-collapse" aria-expanded="false">
                                Liquid Lipi
                            </button>
                            <div class="collapse" id="meat-fish-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small sub-sub-category">
                                    <li><a href="#" class="link-dark rounded">Mini Version</a></li>
                                    <li><a href="#" class="link-dark rounded">Regular Version</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="#">Lip Primer</a></li>
                        <li><a href="#">Matte Lip</a></li>
                        <li><a href="#">Lip Color Finder</a></li>
                        <li><a href="#">Lip Liner</a></li>
                        <li><a href="#">Lip Gel</a></li>
                    </ul>
                </div>
            </li>

            <li class="mb-1 mt-3">
                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                    data-bs-target="#women-collapse" aria-expanded="false">
                    <img src="../assets/images/cosmeticProjectImage/hair.png" class="sidemenu-icon" alt="" srcset="">
                    Hair
                </button>
                <div class="collapse" id="women-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small sub-category">
                        <li><a href="#">Item 1</a></li>
                        <li><a href="#">Item 2</a></li>
                        <li><a href="#">Item 3</a></li>
                    </ul>
                </div>
            </li>

            <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                    data-bs-target="#popular-collapse" aria-expanded="false">
                    <img src="../assets/images/cosmeticProjectImage/brush.png" class="sidemenu-icon" alt="" srcset="">
                    Brushes
                </button>
                <div class="collapse" id="popular-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small sub-category">
                        <li><a href="#">Item 1</a></li>
                        <li><a href="#">Item 2</a></li>
                        <li><a href="#">Item 3</a></li>
                    </ul>
                </div>
            </li>

            <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                    data-bs-target="#flash-collapse" aria-expanded="false">
                    <img src="../assets/images/cosmeticProjectImage/eye.png" class="sidemenu-icon" alt="" srcset="">
                    Eyes
                </button>
                <div class="collapse" id="flash-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small sub-category">
                        <li><a href="#">Item 1</a></li>
                        <li><a href="#">Item 2</a></li>
                        <li><a href="#">Item 3</a></li>
                    </ul>
                </div>
            </li>

            <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                    data-bs-target="#pet-care-collapse" aria-expanded="false">
                    <img src="../assets/images/cosmeticProjectImage/nail.png" class="sidemenu-icon" alt="" srcset="">
                    Nail care
                </button>
                <div class="collapse" id="pet-care-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small sub-category">
                        <li><a href="#">Item 1</a></li>
                        <li><a href="#">Item 2</a></li>
                        <li><a href="#">Item 3</a></li>
                    </ul>
                </div>
            </li>

            <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                    data-bs-target="#toys-games-collapse" aria-expanded="false">
                    <img src="../assets/images/cosmeticProjectImage/face.png" class="sidemenu-icon" alt="" srcset="">
                    Face
                </button>
                <div class="collapse" id="toys-games-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small sub-category">
                        <li><a href="#">Item 1</a></li>
                        <li><a href="#">Item 2</a></li>
                        <li><a href="#">Item 3</a></li>
                    </ul>
                </div>
            </li>

            <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                    data-bs-target="#brand-collapse" aria-expanded="false">
                    <img src="../assets/images/sidemenu/accessories.png" class="sidemenu-icon" alt="" srcset="">
                    User Profile
                </button>
                <div class="collapse" id="brand-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small sub-category">
                        <li><a href="profile.html">Profile - TEST</a></li>
                        <li><a href="checkout.html">Checkout - TEST</a></li>
                        <li><a href="order-tracking.html">Order Tracking - TEST</a></li>
                        <li><a href="contact.html">Contact - TEST</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>

    <section class="main-content category-closed" id="main-content">
        <div class="cosmetic_products_container_wrapper container" style="background: #fff;">
            <div class="brand_prd_container row">
                @forelse($brandwiseproduct as $brandproduct)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-slider-card">
                        <div class="d-flex justify-content-center">
                            <img class="image" src="{{ asset($brandproduct->product_thambnail) }}" alt="">
                        </div>
                        <h5 class="title">{{ $brandproduct->product_name }}</h5>
                        <p>Color: {{ $brandproduct->product_color }}</p>
                        <h6>{!! $brandproduct->product_descp !!}</h6>
                        <div class="price pt-1">
                            @if($brandproduct->discount_price ==null)
                            <h5> ৳ {{ $brandproduct->selling_price }}</h5>
                            @elseif($brandproduct->discount_price)
                            <h5 class="disprc"><del>৳ {{ $brandproduct->selling_price }}</del>
                            </h5>
                            <h5> ৳ {{ $brandproduct->discount_price }}</h5>
                            @endif
                        </div>
                        <button class="shopNowBtn"><a
                                href="{{ route('cosmeticproduct_view.index',$brandproduct->id) }}"> Shop
                                Now</a></button>
                    </div>
                </div>
                @empty
                <h2 style="margin-top: 100px;margin-left: 100px;text-align:center;margin-bottom:100px;">Product Not Found</h2>
                @endforelse
            </div>
        </div>
    </section>



    </section>
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
            </div>
            <div class="cart_media">
                <ul id="cart_product_container" class="cart_product">
                    <li class="cart-item">
                        <div class="media">
                            <a href="product-page(left-sidebar).html">
                                <img alt="megastore1" class="me-3" src="../assets/images/mega-store/product/1.jpg">
                            </a>
                            <div class="media-body">
                                <a href="product-page(left-sidebar).html">
                                    <h4>women fashion shoes</h4>
                                </a>
                                <h6>
                                    $80.00 <span>$120.00</span>
                                </h6>
                                <div class="addit-box">
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <button onclick="cartQuantityDecrement(event)" class="qty-minus"><i
                                                    class="fas fa-minus"></i></button>
                                            <input class="qty-adj form-control" type="number" value="1" />
                                            <button onclick="cartQuantityIncrement(event)" class="qty-plus"><i
                                                    class="fas fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="cart-item">
                        <div class="media">
                            <a href="product-page(left-sidebar).html">
                                <img alt="megastore1" class="me-3" src="../assets/images/mega-store/product/2.jpg">
                            </a>
                            <div class="media-body">
                                <a href="product-page(left-sidebar).html">
                                    <h4>men analogue watch</h4>
                                </a>
                                <h6>
                                    $80.00 <span>$120.00</span>
                                </h6>
                                <div class="addit-box">
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <button onclick="cartQuantityDecrement(event)" class="qty-minus"><i
                                                    class="fas fa-minus"></i></button>
                                            <input class="qty-adj form-control" type="number" value="1" />
                                            <button onclick="cartQuantityIncrement(event)" class="qty-plus"><i
                                                    class="fas fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="cart-item">
                        <div class="media">
                            <a href="product-page(left-sidebar).html">
                                <img alt="megastore1" class="me-3" src="../assets/images/mega-store/product/3.jpg">
                            </a>
                            <div class="media-body">
                                <a href="product-page(left-sidebar).html">
                                    <h4>wireless headphones</h4>
                                </a>
                                <h6>
                                    $80.00 <span>$120.00</span>
                                </h6>
                                <div class="addit-box">
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <button onclick="cartQuantityDecrement(event)" class="qty-minus"><i
                                                    class="fas fa-minus"></i></button>
                                            <input class="qty-adj form-control" type="number" value="1" />
                                            <button onclick="cartQuantityIncrement(event)" class="qty-plus"><i
                                                    class="fas fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <ul class="cart_total py-3">
                    <li class="mx-3">
                        subtotal : <span>$1050.00</span>
                    </li>
                    <li class="mx-3">
                        shpping <span>free</span>
                    </li>
                    <li class="mx-3">
                        taxes <span>$0.00</span>
                    </li>
                    <li class="mx-3">
                        <div class="total">
                            total<span>$1050.00</span>
                        </div>
                    </li>
                    <li>
                        <div class="add-coupons text-center">
                            <small><i class="fas fa-chevron-circle-down"></i> Have a special code?</small>
                            <div class="coupon-input d-flex justify-content-center mt-2">
                                <input type="text" placeholder="Referral Code">
                                <button class="btn btn-primary-filled">GO</button>
                            </div>

                        </div>

                    </li>
                    <li>
                        <div class="buttons d-flex justify-content-center">
                            <a href="checkout.html" class="btn"><span class="btn-primary-filled px-4 py-2">PLACE
                                    ORDER</span> <span class="btn-secondary-filled px-2 py-2">$1050.00</span></a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Add to cart bar end-->
</main>
@endsection
