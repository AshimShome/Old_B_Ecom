@extends('frontend.main_master')

@section('islamic')
    <style>
    .main-content{
        margin-left: 0px!important;
    }
    </style>

<main>
    <!-- main_contact_section - start ================================================== -->
    <section class="main-content main_contact_section sec_ptb_100 clearfix" id="main-content">
        <div class="container  profile mt-3 px-0">
            <div class="row justify-content-lg-between">

                <div class="col-lg-12">
                    {{--  <div class="main_contact_content">
                        <h3 class="title_text mb_15">Contact With Us</h3>
                        <p class="mb_50">
                            If you are interested in working with us, please get in touch.
                        </p>
                        <ul class="main_contact_info ul_li_block clearfix">
                            <li>
                                <span class="icon">
                                    <i class="fal fa-map-marked-alt"></i>
                                </span>
                                <p class="mb-0">
                                    17, Alhaz Samsuddin Mansion (9th Floor), Moghbazar, New Easkaton, Ramna, Dhaka-1217
                                </p>
                            </li>
                            <li>
                                <span class="icon">
                                    <i class="fal fa-phone-volume"></i>
                                </span>
                                <p class="mb-0">+88 01611 815656</p>

                            </li>
                            <li>
                                <span class="icon">
                                    <i class="fal fa-paper-plane"></i>
                                </span>
                                <p class="mb-0">info@excelitai.com</p>
                            </li>
                        </ul>
                    </div>  --}}
                    <div class="header-title" style="padding-top: 2rem;">
                        <h2 style="color: black ;text-align: center "> <b> Get In Touch </b>  </h2>
                    </div>

                    <div class="main_contact_content" style="padding-top: 2rem; color:black">
                        <p>Do you want to contact someone at BppShops?</p>
                        <br>
                        <p>For any query/help, Feel free to contact with us </p>
                        <br>
                        <p>Phone: <b>+8801611815656</b>, </p>
                        <br>
                        <p>Or send us an email: <a href="https://mail.google.com/">info@bppshops.com</a> </p>
                        <br>
                        <p>Working Hour : 9 AM to 10PM, every day</p>
                        <br>
                        <p>Visit our Website: <a href="https://bppshops.com/islamic">www.bppshops.com</a> </p>
                        <br>
                        <p>Visit our facebook page: <a href="https://www.facebook.com/bppshopsofficial">www.facebook.com/bppshopsofficial</a></p>

                        <br>
                        <div class="map_section clearfix">
                            <h3>Find Us</h3>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1825.9918214524862!2d90.4031737!3d23.7479627!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b926c620f459%3A0xf0b4514991e507c8!2sExcel%20IT%20AI!5e0!3m2!1sbn!2sbd!4v1635045505234!5m2!1sbn!2sbd" width="100%" height="300px" style="border:0;" loading="lazy"></iframe>
                        </div>

                    </div>
                    <br><br>

                    <div class="main_contact_form"  style="padding-top: 2rem;">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 offset-md-2">
                                    <div class="card">
                                        <div class="card-header">

                                            <h3 class="header-title" style="text-align: center;color: black ;">Contact Us</h3>
                                        </div>
                                        <div class="card-body">

                                            <form action="{{route('contactUs.send')}}" method="POST" >
                                                @csrf
                                                <div class="row" style="font-size:15px;">

                                                            <div class="form-group">
                                                                <label for=""> Your Name </label>
                                                                <input type="text" class="form-control" name="name" placeholder="Your Name">
                                                                @error('name')

                                                                    <span class="text-danger">{{$message}}</span>

                                                                @enderror
                                                            </div>



                                                            <div class="form-group">
                                                                <label for=""> Your Email</label>
                                                                <input type="email" class="form-control" name="email" placeholder="Your Email">
                                                                @error('email')

                                                                    <span class="text-danger">{{$message}}</span>

                                                                @enderror
                                                            </div>



                                                            <div class="form-group">
                                                                <label for=""> Subject </label>
                                                                <input type="text" class="form-control" name="subject" placeholder="Subject">
                                                                @error('subject')

                                                                    <span class="text-danger">{{$message}}</span>

                                                                @enderror
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="">Messgae Us</label>
                                                                <textarea name="message" cols="30" rows="10" class="form-control" placeholder="Your Message"></textarea>
                                                                @error('message')

                                                                    <span class="text-danger">{{$message}}</span>

                                                                @enderror
                                                            </div>

                                                </div>

                                                <button type="submit" class="btn btn-primary float-end">Submit</button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>




            </div>
        </div>
        <br><br><br>
    </section>
    <!-- main_contact_section - end ================================================== -->


</main>

@endsection

