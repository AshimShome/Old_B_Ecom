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

                         <!--@php-->
                         <!-- $setting = App\Models\SiteSetting::select('logo')->first();-->
                         <!--@endphp-->

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
                                    <span> {{ optional($setting)->phone_one }} , {{ optional($setting)->phone_two }} </span>
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
                            <li><a href="{{ route('info.terms') }}">Terms and Conditions</a></li>
                            <li><a href="{{ route('info.policy') }}">Return and Return Policy</a></li>
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
                                src=" {{ asset('frontend/assets/images/footer-brands/image 1.png') }} "
                                alt="" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/image 2.png') }} "
                                alt="" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/image 3.png') }} "
                                alt="" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/image 4.png') }} "
                                alt="" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/image 5.png') }} "
                                alt="" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/image 6.png') }} "
                                alt="" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/image 7.png') }} "
                                alt="" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/image 8.png') }} "
                                alt="" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/image 9.png') }} "
                                alt="" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/image 10.jpg') }} "
                                alt="" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/image 12.png') }} "
                                alt="" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/image 13.png') }} "
                                alt="" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/image 14.png') }} "
                                alt="" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/image 15.png') }} "
                                alt="" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/image 16.png') }} "
                                alt="" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/image 17.png') }} "
                                alt="" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/image 18.png') }} "
                                alt="" srcset="">
                        </div>
                        <div><img height="60"
                                src=" {{ asset('frontend/assets/images/footer-brands/sslcom.png') }} "
                                alt="" srcset=""></div>
                    </div>
                </div>
            </div>

        </div>


        <div class="subfooter">
            <div class="container-fluid px-5">
                <div class="row">
                    <div
                        class="col-md-4 col-12 d-flex align-items-center justify-content-center justify-content-md-start">
                        <p>&#169; All Right Reserved BPPSHOPS</p>
                    </div>
                    <div class="col-md-4 col-12 text-center mt-3 mt-md-0">
                        <img src=" {{ asset('frontend/assets/images/company/excel-it-logo.png') }} "
                            alt="">
                        <p class="text-white mt-2">Our logistics Partner</p>
                    </div>
                    <div class="col-md-4 col-12 text-center mt-3 mt-md-0">
                        <img src=" {{ asset('frontend/assets/images/company/excel-it-with-text.png') }} "
                            alt="">
                        <p class="text-white mt-2">Our IT Partner</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @if (Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}"
    switch (type) {
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;
    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;
    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;
    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break;
    default:
    break;
    }
    @endif
    <script>
        $(document).ready(function () {
            //console.log(document.getElementById('SubscribtionForm_Bpp'));

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




