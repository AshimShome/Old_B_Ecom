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
   .bpp-header-menu{
       width: 200px;
       display: none;
       padding-top: 10px;
        padding-bottom: 10px;
       position: absolute;
       background-color: white;
       top: 55px;
   }
   .bpp-header-menu.show{
       display: block;     
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
   .wr-menu{
       position: relative;
   }
   .wr-menu li{
    position: relative;
   } 
   
   
   /* style for bppShop LOgin Modal */
#bppShopLoginModaltop .loginTitle {
    display: flex;
    justify-content: space-between;
}
#bppShopLoginModaltop .loginTitle p{
    font-size: 16px;
}

.facebookLogin {
    background: #49639F;
    border: 1px solid #3E4E7C;
    text-align: center;
    border-radius: 3px;
    margin-top: 10px;
}
.facebookLogin:hover {
    background: #3E4E7C;
}
.facebookLogin button {
    background: transparent;
    border: transparent;
    color: #FFFFFF;
    padding: 15px 0;
    font-size: 16px;
    width: 100%;
}
.facebookLogin button span {
    font-weight: 700;
}
.emailLogin {
    background: #FFFFFF;
    border: 1px solid #AFAEAF;
    text-align: center;
    border-radius: 3px;
    margin-top: 10px;
}
.emailLogin:hover {
    background: #F3F3F3;
}
.emailLogin button {
    background: transparent;
    border: transparent;
    color: #464646;
    padding: 15px 0;
    font-size: 18px;
    width: 100%;
}
.emailLogin button .emailIcon {
    color: #FCD462;
}
.emailLogin button span {
    font-weight: 700;
}
.or {
    width: 100%;
    text-align: center;
    position: relative;
    margin-top: 10px;
    margin-bottom: 30px;
}
.or p {
    background-color: #fff;
    width: auto;
    display: inline-block;
    z-index: 3;
    padding: 0 20px 0 20px;
    color: #464646;
    position: relative;
    font-weight: bold;
    margin: 0;
}
.or::after {
    content: '';
    width: 100%;
    border-bottom: solid 1px #E8E8E8;
    position: absolute;
    left: 0;
    top: 50%;
}
.phoneContainer h6 {
    text-align: center;
    font-size: 14px;
    text-transform: uppercase;
    color: #464646;
    padding-bottom: 15px;
}
.phoneContainer .phoneNumberContainer {
    display: flex;
    align-items: center;
    width: 100%;
}
.phoneContainer .phoneNumberContainer img {
    height: 25px;
    margin-right: 10px;
}
.phoneContainer .phoneNumberContainer .number {
    width: 100%;
    border-bottom: 2px solid #E8E8E8;
    padding: 10px 0;
}
.phoneContainer .phoneNumberContainer .number input {
    width: 100%;
    border: transparent;
    font-size: 18px;
}
.phoneContainer .phoneNumberContainer .number input:focus {
    outline: none;
}
.phoneContainer .hidePhoneText {
    text-align: center;
    padding: 5px 0;
    opacity: -1;
}
.singUpLogin {
    background: #fd7e14;
    border: 1px solid #fd7e14;
    text-align: center;
    border-radius: 3px;
    margin-top: 10px;
    box-shadow: 0 1px 6px rgb(0 0 0 / 50%);
}
.singUpLogin:hover {
    background:#d66304;
}
.pinCodeButton {
    display: flex;
    justify-content: center;
    align-items: center;
}
.pinCodeButton button {
    background: #fd7e14;
    border: 1px solid #fd7e14;
    text-align: center;
    border-radius: 3px;
    margin: 10px 10px 0 0;
    box-shadow: 0 1px 6px rgb(0 0 0 / 50%);
    color: #fff;
    padding: 5px 30px;
}
.pinCodeButton h6 {
    color: #fd7e14;
    margin-top: 12px;
}
.singUpLogin button {
    background: transparent;
    border: transparent;
    color: #fff;
    padding: 15px 0;
    font-size: 18px;
    width: 100%;
}
#loginWithEmail {
    display: block;
}
#loginWithPassword {
    display: none;
}
.emailInput[type="email"],
.pinCodeInput[type="text"],
.passwordInput[type="password"]
{
    box-sizing: border-box;
    width: 100%;
    height: calc(4em + 1px);
    margin: 0 0 1em;
    border: none;
    border-bottom: 1px solid #E8E8E8;
    background: #fff;
    resize: none;
    outline: none;
}
.emailInput[type="email"][required]:focus,
.pinCodeInput[type="text"][required]:focus,
.passwordInput[type="password"][required]:focus
{
   border-color: #fd7e14;
}
.emailInput[type="email"][required]:focus + label[placeholder]:before,
.pinCodeInput[type="text"][required]:focus + label[placeholder]:before,
.passwordInput[type="password"][required]:focus + label[placeholder]:before
{
   color: #fd7e14;
}
.emailInput[type="email"][required]:focus + label[placeholder]:before,
.emailInput[type="email"][required]:valid + label[placeholder]:before,
.pinCodeInput[type="text"][required]:focus + label[placeholder]:before,
.pinCodeInput[type="text"][required]:valid + label[placeholder]:before,
.passwordInput[type="password"][required]:focus + label[placeholder]:before,
.passwordInput[type="password"][required]:valid + label[placeholder]:before
{
    transition-duration: .2s;
    transform: translate(0, -1.5em) scale(1, 1);
}
.emailInput[type="email"][required]:invalid + label[placeholder][alt]:before,
.pinCodeInput[type="text"][required]:invalid + label[placeholder][alt]:before,
.passwordInput[type="password"][required]:invalid + label[placeholder][alt]:before
{
    content: attr(alt);
}
.emailInput[type="email"][required] + label[placeholder],
.pinCodeInput[type="text"][required] + label[placeholder],
.passwordInput[type="password"][required] + label[placeholder]
{
    display: block;
    pointer-events: none;
    line-height: 1em;
    margin-top: calc(-3.9em - 2px);
    margin-bottom: calc((4em - 1em) + 2px);
}
.emailInput[type="email"][required] + label[placeholder]:before,
.pinCodeInput[type="text"][required] + label[placeholder]:before,
.passwordInput[type="password"][required] + label[placeholder]:before
{
    content: attr(placeholder);
    display: inline-block;
    margin: 0;
    padding: 0;
    color: #464646;
    white-space: nowrap;
    transition: 0.3s ease-in-out;
}


.mobileViewLogo {
    position: absolute;
    display: none;
}
@media (max-width:767px){
    .mobileViewLogo {
        display: block;
        top:-7px;
        }

    .custom-header .search-container {
        margin-left: 46px;
    }

}

@media (max-width:600px){
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

.custom-header .search-container .search{
    display: flex;
    align-items: center;
}

.search{
    margin-top: 54px;
}
.proName{
    height: 50px;
    margin: 0 5px;
    }
#show-list{
    max-height: 78vh;
    overflow-y: auto;
    margin-left: 7px;
}
#show-list::-webkit-scrollbar{
    display:none;
}
.inputfild{
    background: transparent;
    width: 100%;
    margin-left: 12px;
    border: none;
    outline: none;        
    font-size: 17px;
    padding-left: 20px;
    padding: 9px;
}
.custom-header .search-container {
    flex-grow: 0.3;
    border-radius: 50px;
    width: 25%;
    margin: auto;
}

</style>

<header>
    <div class="custom-header d-flex align-items-center" style="margin-top: -50px; background-color:#ef8341;">
        <div class="container-fluid">
            <div class="row">
                    <div class="category-contain">                        
                        <div class="category-left" style="width: 10%">
                            <div class="header-category">
                               <div class="header-category h-100">
                                    <div class="category-btn-logo-container">
                                        <a id="category-toggle-custom-sidemenu-button" onclick="toggleBPPCategorySidemenu()"
                                            class="category-toggle-btn text-light"><i class="fa fa-bars"></i></a>
                                              @php
                                            $setting = App\Models\SiteSetting::select('logo')->first();
                                              @endphp
                                      <h2><a href="{{ url('/')}}"> <img src={{ asset(optional($setting)->logo) }}   alt=""  height="40px" width="200px" > </a> </h2>
                                      
                                      <a href="{{ url('/')}}"> <img class="mobileViewLogo" src={{ asset('frontend/assets/images/bpp_icon.png') }}   alt=""  height="40px" width="40px" >  </a>
                                           </a>
                                    </div>
                                </div>
                               <div class="bpp-header-menu">
                                <ul>                                   
                                    <li><a class="justify-content-center" href="{{url('/')}}"><i class="fa-solid fa-house"></i></a></li>
                                    <li><a href="{{route('islamic')}}"><span><img class="img-fluid" src={{ asset('frontend/assets/images/icons/08.png')}}></span> Islamic Products</a></li>
                                     <li><a href="{{route('grocery.index')}}"><span><img class="img-fluid" src={{ asset('frontend/assets/images/icons/02.png')}}></span> Grocery</a></li>
                                    <li><a href="{{route('fashion.index')}}"><span><img class="img-fluid" src={{ asset('frontend/assets/images/icons/05.png')}}></span> Fashion</a></li>
                                    <li><a href="#"><span><img class="img-fluid" src={{ asset('frontend/assets/images/icons/electronics.png')}}></span> Electronics</a></li>
                                    <li><a href="#"><span><img class="img-fluid" src={{ asset('frontend/assets/images/icons/03.png')}}></span> Baby Care</a></li>
                                    <li><a href="#"><span><img class="img-fluid" src={{ asset('frontend/assets/images/icons/04.png')}}></span> Cosmetics</a></li>
                                    <li><a href="#"><span><img class="img-fluid" src={{ asset('frontend/assets/images/icons/06.png')}}></span> Furniture</a></li>
                                    <li><a href="#"><span><img class="img-fluid" src={{ asset('frontend/assets/images/icons/01.png')}}></span>Shoe</a></li>
                                </ul>
                               </div>
                            </div>
                        </div>

                        <!-- ---------- Search with Category ------------- -->
                         
                        <div class="row" style="width: 80%">                            
                            <div class="search-container">
                                <div class="row">
                                    <form class="mb-0" action="{{ route('searchproduct.view') }}" method="GET">
                                        <div class="search d-flex justify-content-between align-items-center">
                                           
                                                <input type="text" class="inputfild" name="searchValue" id="searchId"
                                                    autocomplete="off"" required>
                                                <button type="submit" class="btn"><i class="fas fa-search"></i></button>
                                            
                                        </div>
                                    </form>
                                </div>
                                <div class="row proName" >
                                    <ul class="list-group" id="show-list">
                                    
                                    </ul>     
                                </div>
                            </div> 
                        </div>
                        
                        <div style="width: 10%" class="text-end">
                            <div id="icon-block" class="icon-block">
                                <ul class="wr-menu theme-color fs-5 text-white">
                                    <li class="mobile-user icon-desk-none">
                                        @auth
                                        <div class="dropdown">
                                            <a class="dropbtn" href="#"><i class="fa-solid fa-user"></i>
                                            {{ Auth::guard(config('fortify.guard'))->user()->mobile }}</a>
                                       
                                            <div class="dropdown-content">
                                                <a href="{{ route('user.profile') }}">Your Profile</a>
                                                <a href="{{ route('my.orders') }}">Your Orders</a> 
                                                <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    Track your Order
                                                </a>
                                                <!--<a href="{{ route('change.password') }}">Change Password</a>-->
                                                <a href="{{ route('user.logout')}}" >Log Out</a>
                                            </div>
                                        </div>
                                    </div>
                                           
                                    @endauth
                                    @guest
                                    <div>
                                        <ul class="wr-menu">
                                   
                                           <li class="mobile-user icon-desk-none mt-2">   
                                           <a class="text-white" data-bs-toggle="modal" data-bs-target="#bppShopLoginModaltop"
                                            href="#" style="font-size:20px; font-weight:bold"><i class="fas fa-user"></i> Login </a>
                                            </li>
                                          
                                        </ul>
                                     </div>
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
    </div>

    <!-- ============================== new login and ragister model design page================================= -->
    
    <!--  Order Tracking Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Track Your Order </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"> 
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

    <div class="modal fade loginModal_bpp_header" id="bppShopLoginModaltop" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered d-flex justify-content-center" role="document">
            <div class="modal-content" style="width: 400px;">
                <div class="modal-body p-4">
                    <div class="loginTitle">
                        <p>Login</p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="facebookLogin" id="facebookLogin">
                          <a href="{{ route('login.facebook') }}"><button><i class="fa-brands fa-facebook-f pe-2"></i> Sign Up or Login with
                            <span>Facebook</span></button></a>
                    </div>
                   <div class="facebookLogin bg-danger" id="facebookLogin" >
                        <a href="{{ route('login.google') }}"><button><i class="fa-brands fa-google pe-2"></i> Sign Up or Login with
                            <span>Google</span></button></a>
                    </div>
                    <!-- login With Email -->
                    <div id="loginWithEmail">
                        <!--<div class="emailLogin">-->
                        <!--    <button onclick="next()"><i class="fa-solid fa-envelope emailIcon pe-2"></i> Login with-->
                        <!--        <span>Email</span></button>-->
                        <!--</div>-->
                        <div class="or">
                            <p>Or</p>
                        </div>
                        <form method="POST" action="{{ route('loginWithOtp') }}">
                            @csrf
                            <div id="phone-container-wrapper">
                                <div class="phoneContainer">
                                    <h6>Please Enter your mobile phone number</h6>
                                    <div class="phoneNumberContainer">
                                        <img src=" {{ asset('/frontend/assets/images/potaka.jpg') }} " alt="">
                                        <div class="number" id="number">
                                            <input id="mobile_modal" onclick="showText()" name="mobile" type="text" value="+88">
                                        </div>
                                    </div>
                                    <p class="hidePhoneText" id="hidePhoneText" style="color:red"  >e.g. +01712345678</p>
                                </div>
                                <div class="singUpLogin">
                                    <button type="button" onclick="sentCodeInPhone()">SIGN UP / LOGIN</button>
                                </div>
                            </div>

                            <div id="sent-phone-code-wrapper" class="d-none">
                                <p class="text-center">We've sent a 4-digit one time PIN in your phone</p>
                                <h5 class="py-2 text-center" id="sent-number_modal"></h5>
                                <div>
                                    <input class="pinCodeInput" type='text' required name="otp">
                                    <label alt='Please enter 4-digit one time pin'
                                        placeholder='Please enter 4-digit one time pin'></label>
                                </div>
                                <div class="pinCodeButton">
                                    <button type="submit">ENTER</button>
                                    <h6>REQUEST PIN AGAIN=<span id="timer"></h6>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Login With Password -->




                    <div id="loginWithPassword">
                        <div class="emailLogin">
                            <button onclick="prev()"><i class="fa-solid fa-mobile-button pe-2"></i>Login with
                                <span>Phone Number</span></button>
                        </div>
                        <div class="or">
                            <p>Or</p>
                        </div>
                        <form method="PUT" onsubmit="loginWithEmail(event)">
                            @csrf
                            <div>
                                <input class="emailInput" id="loginEmail" type='email' name="email" required>
                                <label alt='Email Address' placeholder='Email Address'></label>
                            </div>
                            <div>
                                <input class="passwordInput" id="loginPassword" type='password' name="password" required>
                                <label alt='Password' placeholder='Password'></label>
                            </div>
                            <div class="singUpLogin mt-5">
                                <button type="submit">LOGIN</button>
                            </div>
                            
                            <div class="text-center pt-3"  style="cursor: pointer;">
                              <a class="pt-3" data-bs-toggle="modal" data-bs-target="#add-brand-modal" data-bs-dismiss="modal" aria-label="Close">Forget Password ?</a>
                            </div>
                        </form>
                    </div>
                    <div class="footer py-4">
                        <p>This site is protected by reCAPTCHA and the Google <span><a href="{{ route('info.privacy')}}">Privacy Policy</a></span>
                            and <span><a href="{{ route('info.terms')}}">Terms of Service</a></span> apply.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================== new login and ragister model design page================================= -->
</header>


   <!--Add brand modal-->
   <div class="add-brand-modal">
        <div class="modal fade" tabindex="-1" id="add-brand-modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <!--<h5 class="modal-title">Forgot Password</h5>-->
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <form method="POST" action="{{ route('user.profile.store') }}" enctype="multipart/form-data" >
                        @csrf
                        <div class="modal-body">
                            <div class="form-group mb-3">
                                <h5 class="text-danger" style="color: black"> <span class="text-danger">*</span>Forgot Password </h5>
                                <div class="controls">
                                    <input type="text" name="email" id="email" placeholder="Emal Adress" class="form-control">                                       
                                    <span id="error_name" class="errorColor"></span>

                                </div>
                            </div>
                      
                        <div class="modal-footer">
                                <a type="submit" class="btn btn-danger waves-effect waves-light mb-2 me-2" href= "{{route('verification.notice')}}">Verify</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- =================================Modal================================= -->

<script>
     function changeSearchText(element) {
            document.querySelector('#searchId').value = element.innerText;
            document.querySelector('#show-list').replaceChildren('');
        }
</script>

<script>
       //----------- Modal Reset After Click Close Button -----------
       let loginData = null;        

        var loginModalEl = document.querySelector('.loginModal_bpp_header');
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
                success: function (data) {
                    // console.log(data);
                },
                error: function () {
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
                // Do validate stuff here
                return;
            }

            // Do timeout stuff here
            // alert('Timeout for otp');
            }

            timer(120);
            // -------------------------Otp timer--------------------------

</script>

<script>
    function loginWithEmail(e) {
        e.preventDefault();      
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            url: 'loginWithEmail',
            type:'PUT',
            data: {
                'email': $('#loginEmail').val(),
                'password': $('#loginPassword').val()
            },
            success: function (data) {
                {{ Redirect::to('/') }}
            },
            error: function () {
                console.log('error');
            }
        });
    }

</script>

<script>
    function toggleBPPCategorySidemenu(){
        const headerCategory = document.querySelector('.bpp-header-menu');
        if(headerCategory.classList.contains('show')){
            headerCategory.classList.remove ('show');
        }
        else{
            headerCategory.classList.add ('show');
        }}
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
            "Search by Product, Category, Brand name, and Product Code !",
        ];

        return_value = typeWriter("#searchId", text_list, true);
    // ============ Placeholder Text Animation End ===============//
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                      $("#show-list").fadeIn();
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
                      $("#show-list").fadeIn();
                      $("#show-list").html('');
                      }
                  });
              }
      });
      
      $(document).on('click', '.productname', function(e){
      e.preventDefault();
        $('#searchId').val($(this).text());
        $('#show-list').fadeOut();
      });
   //======================== Search option end ======================//
    </script>

    <!--dd -->
    
    
    
    
    
    
    