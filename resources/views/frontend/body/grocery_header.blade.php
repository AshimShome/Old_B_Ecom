<style>
    .dropbtn {
        background-color: transparent;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
        padding: 19px 51px;
    }

 .dropbtn:hover{
       color: white!important;
   }
    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        width: 100%;
        display: none;
        position: absolute;
        background-color: #F1F1F1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 999999999;
        top: 30px;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        border-bottom: 1px solid #D1D1D1;
        font-size: 12px;
    }

    .dropdown-content a:hover {
        background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown:hover .dropbtn {
        background-color: #fd7e14;
    }

    .category-contain {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .ht-top-bar{
        padding: 8px 0;
    }
    .ht-top-bar .category-left .category-btn-logo-container {
        height: 100%;
    }

    .ht-top-bar .category-left .category-btn-logo-container a {
        /*padding: 5px;*/
        color: white;
        font-size: 18px;
    }

    .bpp-header-menu{
        width: 200px;
    }
    .bpp-header-menu ul li{
       display: block;
       padding: 5px 25px;
   }
   .bpp-header-menu ul li:hover{
       background-color: #e9e9e9;
   }
   .bpp-header-menu ul li a{
       color: black;
       font-size: 16px;
       display: flex;
       align-items: center;
   }
   .bpp-header-menu ul li a span{
     display: inline-block;
     width: 24px;
     height: 24px;
     background-color: #ffd47d;
     margin-right: 8px;
   }
   .custom-header-islamic{
       height: 30px;
       z-index: -1;
   }
   .custom-header-islamic h2{
       font-size: 18px;
    }
    
    .mobileViewLogo {
    position: absolute;
    opacity: 0;
}
@media (max-width:767px){
    .mobileViewLogo {
     opacity: 1;
     top: -7px;
    left: 25px;
    }

    .header-top .search-ber-top {
        margin-left: 69px;
    }
}

@media (max-width:600px){
    .category-contain .icon-block-mobile {
        display: block;
    }
    
    .dropdown-content{
        display:block;
        position: relative;
        background-color: white;
        box-shadow: none;
        top: 0px;
    }
    
    .dropdown-content a:hover{
        background-color: #fd7e14;
    }
}


  .group-list{
    overflow-y: auto;
    max-height: 80vh;
    position: absolute;
    width: 595px;
    margin-top: 0px;
    margin-left: 20px;
    z-index: 10000;
   }
   /*#searchId{*/
   /*    font-size: 17px;*/
   /*    padding-left: 20px;*/
   /*}*/

</style>

<header style="position: fixed;
width: 100%;
z-index: 99999;">

    {{-- new header design page --}}
    <div class="header-top">
        <div class="ht-top-bar">
            <div class="container-fluid ht-bar-wrapper px-1">
                <div class="category-contain">
                    <!-- ---------- Category Sidebar and Logo ------------- -->
                    <div class="category-left">
                        <div class="header-category h-100">
                            <div class="category-btn-logo-container">
                                <a id="category-toggle-custom-sidemenu-button" onclick="toggleBPPCategorySidemenu()"
                                    class="category-toggle-btn"><i class="fa fa-bars"></i></a>
                                      @php
                                    $setting = App\Models\SiteSetting::select('logo')->first();
                                      @endphp
                              <h2><a href="{{ url('/')}}"> <img src="{{ asset(optional($setting)->logo) }}"   alt=""  height="40px" width="200px" > </a> </h2>
                              
                              <a href="{{ url('/')}}"> <img class="mobileViewLogo" src="{{ asset('frontend/assets/images/bpp_icon.png') }}"   alt=""  height="40px" width="40px" >  </a>
                                  
                                 
                                   </a>
                            </div>
                        </div>

                        <div class="bpp-header-menu">
                            <ul>
                                <li><a class="justify-content-center" href="{{url('/')}}"><i class="fa-solid fa-house"></i></a></li>
                                <li><a href="{{route('islamic')}}"><span>    <img class="img-fluid" src="{{ asset('frontend/assets/images/icons/08.png')}}"></span> Islamic Products</a></li>
                                
                                 <li><a href="#"><span><img class="img-fluid" src="{{ asset('frontend/assets/images/icons/02.png')}}"></span> Fashion</a></li>
                                    <li><a href="#"><span><img class="img-fluid" src="{{ asset('frontend/assets/images/icons/05.png')}}"></span> Grocery</a></li>
                                    <li><a href="#"><span><img class="img-fluid" src="{{ asset('frontend/assets/images/icons/electronics.png')}}"></span> Electronics</a></li>
                                    <li><a href="#"><span><img class="img-fluid" src="{{ asset('frontend/assets/images/icons/03.png')}}"></span> Baby Care</a></li>
                                    <li><a href="#"><span><img class="img-fluid" src="{{ asset('frontend/assets/images/icons/04.png')}}"></span> Cosmetics</a></li>
                                    <li><a href="#"><span><img class="img-fluid" src="{{ asset('frontend/assets/images/icons/06.png')}}"></span> Furniture</a></li>
                                    <li><a href="#"><span><img class="img-fluid" src="{{ asset('frontend/assets/images/icons/01.png')}}"></span>Shoe</a></li>
                               
                            </ul>
                        </div>
                    </div>
                    <!-- ---------- Search with Category ------------- -->
                    <div class="search-ber-top" id="search-box-container">
                         <form class="mb-0" action="{{ route('searchproduct.view') }}"
                                    method="GET">
                        <div class="search d-flex align-items-center justify-content-between">
                          
                            <div class="search-input">
                                <input class="search-input-top" name="searchValue" id="searchId" type="text" autocomplete="off">
                            </div>
                            <div class="search-btn-top">
                                <button class="btn w-100" style="padding: 8px;"><i
                                        class="fas fa-search"></i></button>
                            </div>
                        </div>
                         </form>
                           <div class="group-list pe-0">
                                <div class="list-group" id="show-list">
                                                                       
                                </div>
                            </div>
                    </div>
                    
                    
                    
                    <div class="icon-block" id="icon-block">
                        <ul class="wr-menu">
                            <li class="mobile-user icon-desk-none"  >
                                @auth
                                    <div class="dropdown">
                                        <a class="dropbtn" href="#" ><i class="fa-solid fa-user"></i>
                                        
                                            @if (Auth::guard(config('fortify.guard'))->user()->mobile)
                                                {{ Auth::guard(config('fortify.guard'))->user()->mobile }}
                                        </a>
                                        
                                        
                                    @elseif(Auth::guard(config('fortify.guard'))->user()->email)
                                        {{ Auth::guard(config('fortify.guard'))->user()->email }}</a>
                                        @endif

                                        <div class="dropdown-content">
                                            <a href="{{ route('user.profile') }}">Your Profile</a>
                                            <a href="{{ route('my.orders') }}">Your Orders</a>
                                             <a href="#" data-bs-toggle="modal" data-bs-target="#traking_order_2022_20233">
                                                Track your Order
                                            </a>
                                            <a href="{{ route('change.password') }}">Change Password</a>
                                            <a href="{{ route('user.logout') }}">Log Out</a>
                                        </div>
                                    </div>
                                    @endauth
                                          @guest
                                    <a class="text-white" data-bs-toggle="modal" data-bs-target="#loginModal"
                                        href="#" style="margin-left: 20px; font-size:20px; font-weight:bold" > Login </a>
                                    
                                @endguest
                            </li>
                        </ul>
                    </div>
                    
                    
                   <div class="icon-block-mobile">
                            <button onclick="toggleNavIconBlock()" class="btn text-white fs-5"><i
                                    class="fas fa-ellipsis-v"></i></button>
                        </div>
                    
                    
                </div>
            </div>
        </div>
        <div class="ht-bottom-bar">
            <div class="htb-wrapper">
                <div class="col-lg-12 col-md-12 col-12">
                    <div>
                        <div class="htb-menu slide-bpp-7">
                            <div class="htb-item">
                                <div>
                                    <a href="{{route('islamic')}}">
                                        <div class="btb-icon">
                                            <img class="img-fluid" src={{ asset('frontend/assets/images/icons/08.png')}}>
                                     
                                        </div>  Islamic Product
                                    </a>
                                </div>                                   
                            </div>
                            <div class="htb-item">
                               <div>
                                   
                                    <a href="#">
                                        <div class="btb-icon">
                                             <img class="img-fluid" src={{ asset('frontend/assets/images/icons/02.png')}}>
                                        </div> Grocery
                                    </a>
                               </div>
                            </div>
                            <div class="htb-item">
                                <div>
                                    <a href="#">
                                        <div class="btb-icon">
                                             <img class="img-fluid" src={{ asset('frontend/assets/images/icons/05.png')}}>
                                        </div> Fashion
                                    </a>
                                </div>
                            </div>
                            <div class="htb-item">
                                <div>
                                    <a href="#">
                                        <div class="btb-icon">
                                             <img class="img-fluid" src={{ asset('frontend/assets/images/icons/electronics.png')}}>
                                        </div> Electronics
                                    </a>
                                </div>
                            </div>                           
                        
                            <div class="htb-item">
                               <div>
                                    <a href="{{route('islamic')}}">
                                        <div class="btb-icon">
                                             <img class="img-fluid" src={{ asset('frontend/assets/images/icons/03.png')}}>
                                        </div> Baby Care
                                    </a>
                               </div>
                            </div>
                            <div class="htb-item">
                               <div>
                                    <a href="#">
                                        <div class="btb-icon">
                                             <img class="img-fluid" src={{ asset('frontend/assets/images/icons/04.png')}}>
                                        </div> Cosmetics
                                    </a>
                               </div>
                            </div>
                            <div class="htb-item">
                                <div>
                                    <a href="#">
                                        <div class="btb-icon">
                                             <img class="img-fluid" src={{ asset('frontend/assets/images/icons/06.png')}}>
                                        </div> Furniture
                                    </a>
                                </div>
                            </div>
                            <div class="htb-item">
                                <div>
                                    <a href="#">
                                        <div class="btb-icon">
                                             <img class="img-fluid" src={{ asset('frontend/assets/images/icons/01.png')}}>
                                        </div> Shoe
                                    </a>
                                </div>
                            </div>                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="custom-header d-flex align-items-center custom-header-islamic">
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
                                    <a href="{{ route('user.index') }}" class="text-white logo-container">
                                        @php
                                            $setting = App\Models\SiteSetting::select('logo')->first();
                                        @endphp
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- ---------- Search with Category ------------- -->
                        <div>
                            <h2 class="text-white">Grocery</h2>
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
    
    
    
    
      <!--  Order Tracking Modal -->
    <div class="modal fade" id="traking_order_2022_20233" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Track Your Order </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('order.tracking') }}">
                    @csrf
                   <div class="modal-body">
                    <label>Invoice Code</label>
                    <input type="text" name="code" required="" class="form-control" placeholder="Your Order Invoice Number">
                   </div>

                   <button class="btn btn-danger" type="submit" style="margin-left: 17px;"> Track Now </button>

                  </form>
            </div>

          </div>
        </div>
      </div>
      <!--end modal traking-->
    

</header>
@section('script')
 <script>
        //----------- Modal Reset After Click Close Button -----------
        let loginData = null;        

        var loginModalEl = document.querySelector('.loginModal_header');
        loginModalEl.addEventListener('show.bs.modal', function (event) {
            loginData = $(this).html();
        })
        loginModalEl.addEventListener('hidden.bs.modal', function (event) {
            $(this).html(loginData);
        })

        function sentCodeInPhone() {
            var text = document.getElementById("mobile_modal").value;
            var validPhn = /^(?:\+88|88)?(01[3-9]\d{8})$/ ;
            if(validPhn.test(text)){
                $('#sent-number_modal').text($('#mobile_modal').val());
                console.log($('#mobile_modal').val());
                document.getElementById('sent-phone-code-wrapper').classList.remove('d-none');
                document.getElementById('phone-container-wrapper').classList.add('d-none');
                // document.getElementById('facebookLogin').classList.add('d-none');

                event.target.style.display = "none";

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: 'sendOtp',
                    type: 'post',
                    data: {
                        'mobile': $('#mobile_modal').val()
                    },
                    success: function(data) {
                        // console.log(data);
                    },
                    error: function() {
                        console.log('error');
                    }
                });
            }
            else{
                document.getElementById("hidePhoneText").innerText = "Please enter a valid bangladeshi number. e.g. +8801612345678";
            }
        }
            // ------------------------ Otp timer---------------------------
            let timerOn = true;

                function timer(remaining) {
                var m = Math.floor(remaining / 60);
                var s = remaining % 60;
                
                m = m < 10 ? '0' + m : m;
                s = s < 10 ? '0' + s : s;
                document.getElementById('timer').innerHTML = m + ':' + s;
                remaining -= 1;
                
                if(remaining >= 0 && timerOn) {
                    setTimeout(function() {
                        timer(remaining);
                    }, 1000);
                    return;
                }

                if(!timerOn) {
                    return;
                }
              
                }

                timer(120);
            // -------------------------Otp timer--------------------------
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#login_email').click(function(e) {
                e.preventDefault();
                let email = $("input[name=email]").val();
                let password = $("input[name=password]").val();


                $.ajax({
                    url: 'loginWithEmail',
                    type: "post",
                    dataType: "json",
                    data: {
                        'email': email,
                        'password': password
                    }, // the value of input having id vid
                    success: function(data) { // What to do if we succeed

                        if (data == 1) {
                            location.reload();
                        }
                    }
                });
            });
        });
    </script>
    <script>
        function toggleBPPCategorySidemenu() {
            const headerCategory = document.querySelector('.bpp-header-menu');
            if (headerCategory.classList.contains('show')) {
                headerCategory.classList.remove('show');
            } else {
                headerCategory.classList.add('show');
            }
        }
    </script>
   <!-- =================================Modal================================= -->
    <!-- Button trigger modal -->
      <!--Add brand modal-->
      <div class="add-brand-modal">
        <div class="modal fade" tabindex="-1" id="add-brand-modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Forget Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="AddBrandForm" method="POST" >
                        @csrf
                        <div class="modal-body">
                            <div class="form-group mb-3">
                                <h5 style="color: black"> <span class="">*</span>Forget Password </h5>
                                <div class="controls">
                                    <input type="email" id="brand_name_cats_eye" name="brand_name_cats_eye"
                                        placeholder="Enter Your Email" class="form-control">
                                    <span id="error_name" class="errorColor"></span>

                                </div>
                            </div>
                       
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger waves-effect waves-light mb-2 me-2"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger waves-effect waves-light mb-2 me-2"> verify</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- =================================Modal================================= -->

    <script>
        // window.onscroll = function() {
        //     let width = screen.width;
        //     if (document.documentElement.scrollTop > 50) {               
        //         document.querySelector('.ht-bottom-bar').classList.add('d-none');
                
                
        //         if(width < 600){                   
        //             document.querySelector('#category-toggle-custom-sidemenu').style.marginTop = '55px';   
        //             document.querySelector('#cart_side').style.marginTop = '120px';   
        //         }
        //         else{                   
        //             document.querySelector('#category-toggle-custom-sidemenu').style.marginTop = '140px';   
        //             document.querySelector('#cart_side').style.marginTop = '130px';   
        //         }
        //     } else {
        //         document.querySelector('.ht-bottom-bar').classList.remove('d-none');  
        //         if(width < 600){
        //             document.querySelector('#category-toggle-custom-sidemenu').style.marginTop = '105px';    
        //             document.querySelector('#cart_side').style.marginTop = '170px';
        //         }
        //         else{
        //             document.querySelector('#category-toggle-custom-sidemenu').style.marginTop = '185px';    
        //             document.querySelector('#cart_side').style.marginTop = '182px';
        //         }
        //     }
        // };  
        
        
        
          // ============ Placeholder Text Animation Start ===============//
        timeout_var = null;

        function typeWriter(selector_target, text_list, placeholder = false, i = 0, text_list_i=0, delay_ms=200) {
            if (!i) {
                if (placeholder) {
                    document.querySelector(selector_target).placeholder = "";
                }
                else {
                    document.querySelector(selector_target).innerHTML = "";
                }
            }
            txt = text_list[text_list_i];
            if (i < txt.length) {
                if (placeholder) {
                    document.querySelector(selector_target).placeholder += txt.charAt(i);
                }
                else {
                    document.querySelector(selector_target).innerHTML += txt.charAt(i);
                }
                i++;
                setTimeout(typeWriter, delay_ms, selector_target, text_list, placeholder, i, text_list_i);
            }
            else {
                text_list_i++;
                if (typeof text_list[text_list_i] === "undefined")  {
                    // set "return;" for disabled infinite loop 
                    setTimeout(typeWriter, (delay_ms*5), selector_target, text_list, placeholder);
                }
                else {
                    i = 0;
                    setTimeout(typeWriter, (delay_ms*3), selector_target, text_list, placeholder, i, text_list_i);
                }
            }
        }

        text_list = [
            "Search by Product, Category, Brand name !",
        ];

        return_value = typeWriter("#searchId", text_list, true);
    // ============ Placeholder Text Animation End ===============//
    </script>
 <script>
   //======================== Search option start ======================//
   let searchById = document.getElementById("searchId");
   
       searchById.addEventListener("keyup", event => {
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