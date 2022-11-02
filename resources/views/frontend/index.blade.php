@include('frontend.body.header_top')
@include('frontend.body.bppshop_header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
<section class="bppShop-main-content  category-closed" id="main-content">
    <section class="bpp_shop_main_container">
        <div class="container">
            <div class="row mt-5 pt-5">
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <a href=" {{ route('islamic') }} ">
                        <div class="card">
                            <div class="card-body">
                                <img class="img-fluid"
                                    src=" {{ asset('frontend/assets/images/bpp_shop_main/islamic_product.webp') }}" alt="">
                            </div>
                            <div class="card-footer">
                                <h5 class="text">Islamic Product</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <a href="{{ url('/grocery') }}">
                        <div class="card">
                            <div class="card-body">
                                <img class="img-fluid"
                                    src=" {{ asset('frontend/assets/images/bpp_shop_main/grocery.webp') }}" alt="">
                            </div>
                            <div class="card-footer">
                                <h5 class="text">Grocery</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <a href="{{ url('/fashion') }}">
                        <div class="card">
                            <div class="card-body">
                                <img class="img-fluid"
                                    src=" {{ asset('frontend/assets/images/bpp_shop_main/fashion.webp') }}" alt="">
                            </div>
                            <div class="card-footer">
                                <h5 class="text">Fashion</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    
                    <a href="{{ url('/electronic') }}">
                    <div class="card">      
                     <div class="upcoming">
                         
                        </div>
                        <div class="card-body">
                            <img class="img-fluid"
                                src=" {{ asset('frontend/assets/images/bpp_shop_main/electronics.webp') }}" alt="">
                        </div>
                        <div class="card-footer">
                            <h5 class="text">Electronics</h5>
                        </div>
                    </div>

                </a>

                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <a href="#">
                    <div class="card">
                         <div class="upcoming">
                            <p>Upcoming...</p>
                        </div>

                        <div class="card-body">
                            <img class="img-fluid"
                                src=" {{ asset('frontend/assets/images/bpp_shop_main/baby_care.webp') }}" alt="">
                        </div>
                        <div class="card-footer">
                            <h5 class="text">Baby Care</h5>
                        </div>
                    </div>
                </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <a href="#">
                        <div class="card">
                             <div class="upcoming">
                            <p>Upcoming...</p>
                        </div>
                            <div class="card-body">
                                <img class="img-fluid"
                                    src=" {{ asset('frontend/assets/images/bpp_shop_main/cosmetic.webp') }}" alt="">
                            </div>
                            <div class="card-footer">
                                <h5 class="text">Cosmetic</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <a href="#">
                    <div class="card">  
                     <div class="upcoming">
                            <p>Upcoming...</p>
                        </div>
                        <div class="card-body">
                            <img class="img-fluid"
                                src=" {{ asset('frontend/assets/images/bpp_shop_main/furniture.webp') }}" alt="">
                        </div>
                        <div class="card-footer">
                            <h5 class="text">Furniture</h5>
                        </div>
                    </div>

                </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="card">    
                     <div class="upcoming">
                            <p>Upcoming...</p>
                        </div>
                        <div class="card-body">
                            <img class="img-fluid" src=" {{ asset('frontend/assets/images/bpp_shop_main/shoe.webp') }}"
                                alt="">
                        </div>
                        <div class="card-footer">
                            <h5 class="text">Shoe</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
  
  
  <!-- footer start ==================================================================================  -->
  <footer>
    @php
        $setting = App\Models\SiteSetting::find(1);
    @endphp
    <div class="footer-main " >
        {{--  subscribtion modal start  --}}
        <div class="modal fade" id="subscribtion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="SubscribtionForm_Bpp"  method="POST">
                    @csrf

                    <div class="modal-body">
                        <div class="row m-0 p-0">
                            <div class="col-lg-8  mt-0 pt-0">
                                <input type="email" class="form-control" name="subscription_email" id="subscribtion" placeholder="Enter Your Email" required>

                            </div>
                             <div class="col-lg-4  mt-0 pt-0">
                                <button type="submit" class="btn btn-warning subscribe_btn" style="color:black" >Subscribe</button>
                            </div>
                        </div>
                    </div>

                </form>
                </div>
            </div>
        </div>
         {{--  subscribtion modal end  --}}
        <div class="container-fluid">
            <div class="row py-5 px-lg-5 px-3">
                <div class="col-md-3 col-sm-6 col-12 d-flex justify-content-center ">
                    <div class="footer-section-1 px-3 px-md-1">
                        <a class="title"
                            href="{{ route('user.index') }}"  ><img src={{ asset(optional($setting)->logo) }}   alt=""  height="40px"  ></a>
                        <ul class="mt-3 social-icons">
                              <li><a href={{ optional($setting)->facebook }}><i class="fa fa-brands fa-facebook-f facebook-icon"></i></a></li>
                              <li><a href={{ optional($setting)->youtube }}><i class="fa fa-brands fa-youtube youtube-icon"></i></a></li>
                              <li><a href={{ optional($setting)->twitter }}><i class="fa fa-brands fa-twitter twitter-icon"></i></a></li>
                              <li><a href={{ optional($setting)->linkedin }}><i class="fa fa-brands fa-linkedin-in linkedin-icon"></i></a></li>
                        </ul>
                        <br>
                        <div class="company_info" style="color:azure">
                            <div class="d-flex mb-2">
                                <div>
                                    <i class="fa-solid fa-location-pin"></i>
                                </div>
                                <div>
                                    <span> {{ optional($setting)->company_address }} </span>
                                </div>
                            </div>
                            <div class="d-flex mb-2">
                                <div>
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                                <div>
                                    <span> {{ optional($setting)->email }} </span>
                                </div>
                            </div>
                            <div class="d-flex mb-2">
                                <div>
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <div>
                                    <span> {{ optional($setting)->phone_one }} </span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12 d-flex justify-content-center">
                    <div class="footer-section-2 px-3 px-md-1">
                        <h6 class="secondary-text">WE ARE HERE TO HELP !</h6>
                        <h6 style="color:white">FAQ</h6>
                        <h6 class="secondary-text">24/7 CUSTOMER SUPPORT</h6>
                        <h6 style="color:white"><i class="fas fa-phone me-2"
                                style="color:#f9b92e"></i>{{ optional($setting)->phone_two }}</h6>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12 d-flex justify-content-center">
                    <div class="footer-section-3 px-3 px-md-1">
                        <h6 class="secondary-text">KNOW US BETTER</h6>
                        <ul class="important-links-list">
                            <li><a href="{{ route('info.aboutPage') }}">About Us</a></li>
                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                            <li><a href="{{ route('info.privacy') }}">Privacy Policy</a></li>
                            <!--<li><a href="#">Shipping Rates & Policies</a></li>-->
                            <li><a href="{{ url('/terms-condition') }}">Terms and Conditions</a></li>
                            <li><a href="{{ route('info.policy') }}">Return Policy</a></li>
                            <!--<li><a href="#">Taxes & Import Duties</a></li>-->
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12 d-flex justify-content-center">
                    <div class="footer-section-3 px-3 px-md-1">
                        <h6 class="secondary-text">MAKE MONEY WITH US</h6>
                        <ul class="important-links-list">
                            <li><a href="#">Sell on BPPSHOPS</a></li>
                            <li><a href="#">Seller term & conditions</a></li>
                        </ul>
                        <div>
                            <button type="button" class="btn btn-secondary-transparent px-4 text-white mt-3" data-bs-toggle="modal" data-bs-target="#subscribtion">SUBSCRIBE</button>
                        </div>
                        <div class="mt-3 app-cont row">
                            <div class="col-md-12 col-6 text-center text-md-start">
                                <a href="#"><img class="img-fluid me-2"
                                        src=" {{ asset('frontend/assets//images/icon/apple-app-store.png') }} "
                                        alt="" srcset=""></a>
                            </div>
                            <div class="col-md-12 col-6 mt-0 mt-md-2 text-center text-md-start">
                                <a href="#"><img class="img-fluid"
                                        src=" {{ asset('frontend/assets//images/icon/google-play-store.png') }} "
                                        alt="" srcset=""></a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-12 px-5 mt-5">
                    <div class="d-flex flex-wrap bg-white justify-content-evenly align-items-center p-3 rounded-2 payment-method">
                        <div class="d-flex align-items-center">
                            <h5 class="text-dark">Pay With</h5>
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/bppshops_ssl.webp') }} "
                                alt="bppshopsbppshops" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src="bppshopsbppshops {{ asset('frontend/assets/images/footer-brands/bppshops_ipay.webp') }} "
                                alt="" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/bppshops_ab_bank.webp') }} "
                                alt="bppshopsbppshops" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/bppshops_brack_bank.webp') }} "
                                alt="bppshopsbppshops" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/bppshops_city_bank.webp') }} "
                                alt="bppshopsbppshops" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/bppshops_islamic.webp') }} "
                                alt="bppshopsbppshops" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/bppshops_bk_asia.webp') }} "
                                alt="bppshopsbppshops" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/bppshops_dbbl.webp') }} "
                                alt="bppshopsbppshops" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/bppshops_q.webp') }} "
                                alt="bppshopsbppshops" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/bppshops_bk.webp') }} "
                                alt="bppshopsbppshops" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/bppshops_mtb.webp') }} "
                                alt="bppshopsbppshops" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/bppshops_sure_cash.webp') }} "
                                alt="bppshopsbppshops" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/bppshops_oupy.webp') }} "
                                alt="bppshopsbppshops" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/bppshops_m_cash.webp') }} "
                                alt="bppshopsbppshops" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/bppshops_-_cash.webp') }} "
                                alt="bppshopsbppshops" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/bppshops_my.webp') }} "
                                alt="bppshopsbppshops" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/bppshops_fast.webp') }} "
                                alt="bppshopsbppshops" srcset="">
                        </div>
                        
                    </div>
                </div>
            </div>

        </div>


        <div class="subfooter">
            <div class="container-fluid px-5">
                <div class="row">
                    <div
                        class="col-md-3 col-12 d-flex align-items-center justify-content-center justify-content-md-start">
                        <p class="text-white">&#169; All Right Reserved BPPSHOPS</p>
                    </div>
                    <div class="col-md-3 col-12 text-center mt-3 mt-md-0">
                        <img src=" {{ asset('frontend/assets/images/company/excel-it-logo.png') }} "
                            alt="bppshops">
                        <p class="text-white mt-2">Our logistics Partner</p>
                    </div>
                    <div class="col-md-3 col-12 text-center mt-3 mt-md-0">
                        <img src=" {{ asset('frontend/assets/images/company/excel-it-with-text.png') }} "
                            alt="bppshops">
                        <p class="text-white mt-2">Our IT Partner</p>
                       
                    </div>
                    <div class="col-md-3 col-12 text-center mt-3 mt-md-0">
                        <div>
                             <a style="font-size: 49px;" target="_blank" href="https://api.WhatsApp.com/send?phone=+8801911655303&text=Hello ! " class="whatsapp"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                   
                    
                </div>
            </div>
        </div>
    </div>
</footer>


<script>
    //-------------------------- Nav Icon Block -----------------------------
function toggleNavIconBlock() {
    const iconBlock = document.getElementById('icon-block');

    if (iconBlock.classList.contains('icon-block-show')) {
        iconBlock.classList.remove('icon-block-show');
    }
    else {
        iconBlock.classList.add('icon-block-show');
    }
}
</script>



    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#SubscribtionForm_Bpp').on('submit',function(e)
            {
                e.preventDefault();
                //console.log ('here');

                let formData = new FormData($('#SubscribtionForm_Bpp')[0]);
                    $.ajax({
                        type: "POST",
                        url: `/subscribe`,
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            console.log(response);

                            if (response.status == 400) {
                                $('#error_name').text(response.errors.subscription_email);


                            } else {
                                toastr.success(response.message);
                                location.reload();
                                $('#subscribtion').modal('hide');
                            }
                        }

                    });
            });
        });
    </script>


  <!-- footer End ==================================================================================  -->


    <div class="modal fade" id="bppshops_promo" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" style="width: auto">
                <div class="modal-body p-0">
                    <!--<button type="button" class="btn-close bppshops_promo_close_btn" data-bs-dismiss="modal"-->
                    <!--    aria-label="Close"></button>-->
                    <!--<img class="img-fluid" src="{{asset('frontend/assets/images/home_popup.jpg')}}" alt="" srcset="">-->
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    // document.addEventListener("DOMContentLoaded", function(event) {
    //     var myModal = new bootstrap.Modal(document.getElementById('bppshops_promo'));
    //     myModal.show();
    // });
</script>
</section>
<script>
    //======================== Search option start ======================//
   let srcById = document.getElementById("searchId");

       srcById.addEventListener("keyup", event => {
           let searchBy = event.target.value;
           if(searchBy !=''){
                  $.ajax({
                      url:"{{ route('searchproduct.ajax') }}",
                      method:"GET",
                      data:{squery:searchBy},
                      success:function(response){
                       //  console.log(response);
                       $("#show-list").html(response);
                      }
                  });
              }else{
               $.ajax({
                      url:"{{ route('searchproduct.ajax') }}",
                      method:"GET",
                      data:{squery:searchBy},
                      success:function(response){
                       //  console.log(response);
                       $("#show-list").html('');
                      }
                  });
              }

       });

   //======================== Search option end ======================//
</script>

   <script>
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#SubscribtionForm').on('submit',function(e)
        {
            e.preventDefault();
            //console.log ('here');

            let formData = new FormData($('#SubscribtionForm')[0]);
                $.ajax({
                    type: "POST",
                    url: `/subscribe`,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);

                        if (response.status == 400) {
                            $('#error_name').text(response.errors.subscription_email);


                        } else {
                            toastr.success(response.message);
                            location.reload();
                            $('#subscribtion').modal('hide');
                        }
                    }

                });
        });
    });
</script>

<!-- Messenger Chat plugin Code -->
    <div id="fb-root"></div>
    <!-- Your Chat plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>
    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "103832382237009");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>
    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v14.0'
        });
      };
      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>