                                                                                                                                                                                                                                                                                                                        <head><link rel="stylesheet" type="text/css" href="https://bppshops.netlify.app/menu.css"></head>
<div id="wishlist_side" class="add_to_cart right ">
    <a href="javascript:void(0)" class="overlay" onclick="closeWishlist()"></a>
  
 </div>
 <div id="myAccount" class="add_to_cart right account-bar">
    <a href="javascript:void(0)" class="overlay" onclick="closeAccount()"></a>
    <div class="cart-inner">
       <div class="cart_top">
          <h3>my account</h3>
          <div class="close-cart">
             <a href="javascript:void(0)" onclick="closeAccount()">
                <i class="fa fa-times" aria-hidden="true"></i>
             </a>
          </div>
       </div>
       <form class="theme-form">
          <div class="form-group">
             <label for="email">Email</label>
             <input type="text" class="form-control" id="email" placeholder="Email" required="">
          </div>
          <div class="form-group">
             <label for="review">Password</label>
             <input type="password" class="form-control" id="review" placeholder="Enter your password" required="">
          </div>
          <div class="form-group">
             <a href="javascript:void(0)" class="btn btn-solid btn-md btn-block ">Login</a>
          </div>
          <div class="accout-fwd">
             <a href="#" class="d-block">
                <h5>forget password?</h5>
             </a>
             <a href="#" class="d-block">
                <h6>you have no account ?<span>signup now</span></h6>
             </a>
          </div>
       </form>
    </div>
 </div>
 <div id="mySetting" class="add_to_cart right">
    <a href="javascript:void(0)" class="overlay" onclick="closeSetting()"></a>
    <div class="cart-inner">
       <div class="cart_top">
          <h3>my setting</h3>
          <div class="close-cart">
             <a href="javascript:void(0)" onclick="closeSetting()">
                <i class="fa fa-times" aria-hidden="true"></i>
             </a>
          </div>
       </div>

    </div>
 </div>
 <div id="cart-float-button" class="cart-float-main">
    <!-- <a href="#"> -->
    <div class="mobile-cart-parent">
        <div onclick="window.open('tel:09678822444');" class="cart-icon d-sm-none d-flex align-items-center" style="color: #ef8341;">
           <i class="fa-solid fa-phone"></i>
        </div>
        <div class="start-order-parent" onclick="openCart()">
            <button class="start-order btn">Start Shopping</button>
        </div>
        <div class="cart-icon d-flex align-items-center justify-content-center" style="color: #ef8341;" onclick="openCart()">
            <div id="cart-icon-mobile-count" class="cart-icon-mobile-count">0</div>
           <i class="fas fa-shopping-cart"></i>
        </div>
    </div>
  
    <div class="cart-text" style="padding: 0px" onclick="openCart()">
       <!--<h6 class="fw-bold text-center">Cart</h6>-->
     <p style="padding: 5px 15px"> <span id="cart-item-count">0</span> Items</p>
     <p class="cart-item-total-parent" style="background-color:#2A2A2A; padding: 5px 15px; color: white;"> <span style="color: white;">৳</span> <span style="color: white;" id="cart-item-total">0</span></p>
    </div>
    <!-- </a> -->
 </div>                                                                                                                                                                                                                                                                                                              <script src="https://bppshops.netlify.app/menu.js"></script>
