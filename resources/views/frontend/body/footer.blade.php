<head>
    <link rel="stylesheet" type="text/css" href="https://bppshops.netlify.app/styles.css">
</head>
<footer>
    @php
        $setting = App\Models\SiteSetting::find(1);
    @endphp
    <div class="footer-main main-content" id="main-content-footer">

         {{--  subscribtion modal start  --}}
         <div class="modal fade" id="subscribtion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="SubscribtionForm"  method="POST">
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

        
        <div class="subfooter">
            <div class="container-fluid px-5">
                <div class="row">
                    <div
                        class="col-md-4 col-12 d-flex align-items-center justify-content-center justify-content-md-start">
                        <p>&#169; All Right Reserved BPPSHOPS</p>
                    </div>
                    <div class="col-md-4 col-12 text-center mt-3 mt-md-0">
                        <div class="footer-section-1 px-3 px-md-1">
                       
                            <div class="company_info" style="color:azure">
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
                                        <span> {{ optional($setting)->phone_one }}, {{ optional($setting)->phone_two }}  </span>
                                    </div>
                                </div>
    
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12 text-center mt-3 mt-md-0">
                        <img src=" {{ asset('frontend/assets/images/company/excel-it-with-text.png') }} "
                            alt="bppshops">
                        <p class="text-white mt-2">Our IT Partner</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
