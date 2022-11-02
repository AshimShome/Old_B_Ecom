<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Grocery E-com" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico">

    <!-- Plugins css -->
    <link href="{{asset('backend')}}/assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend')}}/assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{asset('backend')}}/assets/css/config/default/bootstrap.min.css" rel="stylesheet" type="text/css"
        id="bs-default-stylesheet" />
    <link href="{{asset('backend')}}/assets/css/config/default/app.min.css" rel="stylesheet" type="text/css"
        id="app-default-stylesheet" />

    <link href="{{asset('backend')}}/assets/css/config/default/bootstrap-dark.min.css" rel="stylesheet" type="text/css"
        id="bs-dark-stylesheet" />
    <link href="{{asset('backend')}}/assets/css/config/default/app-dark.min.css" rel="stylesheet" type="text/css"
        id="app-dark-stylesheet" />

    <!-- icons -->
    <link href="{{asset('backend')}}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend')}}/assets/css/dashboard.css" rel="stylesheet">


    <!-- font awesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Mukta&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- LIne chart js  -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-chart/2.0.28/LineChart.css"
        integrity="sha512-KTcZ1aiiCoscXQSTvRF5uR9jwSrrg9L6tBVc9zY/wKN1tJK1WopBBeur/OxX0P6Q8DJ4dGyJfMXgg0YqNO6JLw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-chart/2.0.28/LineChart.min.css"
        integrity="sha512-FJXBXgnzZanDfKn4LojPpiiuOlpyTNDrM7Q9p0OUPY+SN9Ro3kICrpsktOpfhbh2nbGSyLNbyRLtele+TprlrQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .avatar-title {
            align-items: center;
            color: #fff;
            display: flex;
            height: 100%;
            justify-content: center;
            width: 100%;
        }

        .main-head {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 28px;
            line-height: 34px;
            color: #343A40;
        }

        .dash-card-icon {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 68px;
            height: 68px;
            background: #D9D5F6;
            border: 2px solid #A088E5;
            box-sizing: border-box;
            border-radius: 50%;
        }

        .dash-card-icon2 {
            display: flex;
            justify-content: center;
            align-items: center;
            background: #D3F1F7;
            border: 2px solid #27BAD8;
            box-sizing: border-box;
            border-radius: 50%;
        }

        .dash-card-icon3 {
            background: #FDEDD2;
            background: #FDEDD2;
            border: 2px solid #F6B13C;
        }

        .dash-card-icon4 {
            background: #C6EEE6;
            border: 2px solid #1ABC9C;
        }

        /* .dashbord-card-info{
            width: 50%;
        } */
        .dashbord-card-info h2 {
            text-align: right;
        }

        .dashbord-card-info p {
            font-weight: 400;
            font-size: 16px;
            line-height: 19px;
            text-align: right;
            color: #6E768E;
        }

        .line-chart {
            flex-wrap: wrap;
        }

        .line-chart h3 {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 500;
            font-size: 24px;
            line-height: 29px;
            color: #343A40;
        }



        @media(max-width:1400px) {
            .dashbord-card-info p {
                font-weight: 400;
                font-size: 14px;
                line-height: 19px;
                text-align: right;
                color: #6E768E;
            }

            .dashbord-card-info h2 {
                font-weight: 600;
                font-size: 20px;
                line-height: 19px;
                text-align: right;
                color: #343A40;
            }
        }



        /* Chart Js  */
    </style>

</head>

<!-- body start -->

<body class="loading"
    data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <div class="navbar-custom">
            <div class="container-fluid">
                <ul class="list-unstyled topnav-menu float-end mb-0">

                    <li class="d-none d-lg-block">
                        <form class="app-search">
                            <div class="app-search-box dropdown">
                                <div class="input-group">
                                    <input type="search" class="form-control" placeholder="Search..." id="top-search">
                                    <button class="btn input-group-text" type="submit">
                                        <i class="fe-search"></i>
                                    </button>
                                </div>
                                <div class="dropdown-menu dropdown-lg" id="search-dropdown">
                                    <!-- item-->
                                    <div class="dropdown-header noti-title">
                                        <h5 class="text-overflow mb-2">Found 22 results</h5>
                                    </div>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fe-home me-1"></i>
                                        <span>Analytics Report</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fe-aperture me-1"></i>
                                        <span>How can I help you?</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fe-settings me-1"></i>
                                        <span>User profile settings</span>
                                    </a>

                                    <!-- item-->
                                    <div class="dropdown-header noti-title">
                                        <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
                                    </div>

                                    <div class="notification-list">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="d-flex align-items-start">
                                                <img class="d-flex me-2 rounded-circle"
                                                    src="../assets/images/users/user-2.jpg"
                                                    alt="Generic placeholder image" height="32">
                                                <div class="w-100">
                                                    <h5 class="m-0 font-14">Erwin E. Brown</h5>
                                                    <span class="font-12 mb-0">UI Designer</span>
                                                </div>
                                            </div>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="d-flex align-items-start">
                                                <img class="d-flex me-2 rounded-circle"
                                                    src="../assets/images/users/user-5.jpg"
                                                    alt="Generic placeholder image" height="32">
                                                <div class="w-100">
                                                    <h5 class="m-0 font-14">Jacob Deo</h5>
                                                    <span class="font-12 mb-0">Developer</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </li>

                    <li class="dropdown d-inline-block d-lg-none">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light"
                            data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                            aria-expanded="false">
                            <i class="fe-search noti-icon"></i>
                        </a>
                        <div class="dropdown-menu dropdown-lg dropdown-menu-end p-0">
                            <form class="p-3">
                                <input type="text" class="form-control" placeholder="Search ..."
                                    aria-label="Recipient's username">
                            </form>
                        </div>
                    </li>

                    <li class="dropdown d-none d-lg-inline-block">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen"
                            href="#">
                            <i class="fe-maximize noti-icon"></i>
                        </a>
                    </li>



                    <li class="dropdown notification-list topbar-dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="fe-bell noti-icon"></i>
                            <span class="badge bg-danger rounded-circle noti-icon-badge">9</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-lg">

                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5 class="m-0">
                                    <span class="float-end">
                                        <a href="" class="text-dark">
                                            <small>Clear All</small>
                                        </a>
                                    </span>Notification
                                </h5>
                            </div>

                            <div class="noti-scroll" data-simplebar>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                    <div class="notify-icon">
                                        <img src="../assets/images/users/user-1.jpg" class="img-fluid rounded-circle"
                                            alt="" />
                                    </div>
                                    <p class="notify-details">Cristina Pride</p>
                                    <p class="text-muted mb-0 user-msg">
                                        <small>Hi, How are you? What about our next meeting</small>
                                    </p>
                                </a>



                                <!-- All-->
                                <a href="javascript:void(0);"
                                    class="dropdown-item text-center text-primary notify-item notify-all">
                                    View all
                                    <i class="fe-arrow-right"></i>
                                </a>

                            </div>
                    </li>


                    <li class="dropdown notification-list topbar-dropdown">
                        <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light"
                            data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                            aria-expanded="false">
                            <img src="../assets/images/users/user-1.jpg" alt="user-image" class="rounded-circle">
                            <span class="pro-user-name ms-1">
                                Sakkhar <i class="mdi mdi-chevron-down"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end profile-dropdown ">


                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-user"></i>
                                <span>My Profile</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-settings"></i>
                                <span>Change Password</span>
                            </a>


                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-log-out"></i>
                                <span>Logout</span>
                            </a>

                        </div>
                    </li>

                    <li class="dropdown notification-list">
                        <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                            <i class="fe-settings noti-icon"></i>
                        </a>
                    </li>

                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="index.html" class="logo logo-dark text-center">
                        <span class="logo-sm">
                            <img src="../assets/images/logo.png" alt="" height="22">
                            <!-- <span class="logo-lg-text-light">Shop Owner</span> -->
                        </span>
                        <span class="logo-lg">
                            <img src="../assets/images/logo.png" alt="" height="20">
                            <!-- <span class="logo-lg-text-light">Shop Owner</span> -->
                        </span>
                    </a>

                    <a href="index.html" class="logo logo-light text-center">
                        <span class="logo-sm">
                            <img src="../assets/images/logo.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="../assets/images/logo.png" alt="" height="20">
                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="fe-menu"></i>
                        </button>
                    </li>

                    <li>
                        <!-- Mobile menu toggle (Horizontal Layout)-->
                        <a class="navbar-toggle nav-link" data-bs-toggle="collapse"
                            data-bs-target="#topnav-menu-content">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>



                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu" style="width: 263px;">

            <div class="h-100" data-simplebar>



                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <ul id="side-menu">
                        <li>
                            <a href="#owner_dashboard" data-bs-toggle="collapse">
                                <i class="fas fa-list-alt"></i>
                                <span> Shop Owner Dashboard </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="owner_dashboard">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="shop_owner_dashboard.html">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="shop-owner-product-list.html">Product List</a>
                                    </li>
                                    <li>
                                        <a href="#">Product Details</a>
                                    </li>
                                    <li>
                                        <a href="shop-owner-supplier-list.html">Supplier List</a>
                                    </li>
                                    <li>
                                        <a href="return-product.html">Return Product</a>
                                    </li>
                                    <li>
                                        <a href="payment-history.html">Payment History</a>
                                    </li>
                                    <li>
                                        <a href="profit-report.html">Profit Report</a>
                                    </li>
                                </ul>
                            </div>
                        </li>



                    </ul>

                </div>
                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid p-4">
                    <div class="row">
                        <div class="mb-3 main-head">Dashboard</div>
                        <div class=" col-xxl-3 col-xl-3  col-lg-6 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-inner d-flex justify-content-between align-items-center flex-wrap p-2">

                                    <span class="dash-card-icon">
                                        <svg width="34" height="25" viewBox="0 0 34 25" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M20.25 1H16.75H12.375M4.5 8H29M4.5 8C3.57174 8 2.6815 7.63125 2.02513 6.97487C1.36875 6.3185 1 5.42826 1 4.5C1 3.57174 1.36875 2.6815 2.02513 2.02513C2.6815 1.36875 3.57174 1 4.5 1H29C29.9283 1 30.8185 1.36875 31.4749 2.02513C32.1313 2.6815 32.5 3.57174 32.5 4.5C32.5 5.42826 32.1313 6.3185 31.4749 6.97487C30.8185 7.63125 29.9283 8 29 8M4.5 8V20.25C4.5 21.1783 4.86875 22.0685 5.52513 22.7249C6.1815 23.3813 7.07174 23.75 8 23.75H25.5C26.4283 23.75 27.3185 23.3813 27.9749 22.7249C28.6313 22.0685 29 21.1783 29 20.25V8"
                                                stroke="#8B6BE8" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>

                                    </span>
                                    <!-- end span  -->
                                    <div class="dashbord-card-info">
                                        <h2>16,500</h2>
                                        <p>Total Product</p>
                                    </div>
                                    <!-- end dashbord-card-info  -->


                                </div>
                                <!-- end card-inner  -->
                            </div>
                            <!-- end card  -->
                        </div>
                        <!-- end col  -->
                        <div class=" col-xl-3 col-lg-6 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-inner d-flex justify-content-between align-items-center flex-wrap p-2">

                                    <span class="dash-card-icon dash-card-icon2">
                                        <svg width="38" height="38" viewBox="0 0 38 38" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M17.4166 4.83691C14.7494 5.13498 12.2206 6.18009 10.1212 7.85195C8.02187 9.52382 6.43722 11.7545 5.54969 14.2872C4.66216 16.82 4.50781 19.5519 5.1044 22.1685C5.701 24.7851 7.0243 27.18 8.922 29.0777C10.8197 30.9754 13.2147 32.2987 15.8313 32.8953C18.4479 33.4919 21.1797 33.3376 23.7125 32.45C26.2452 31.5625 28.4759 29.9778 30.1478 27.8785C31.8196 25.7791 32.8647 23.2503 33.1628 20.5832H17.4166V4.83691Z"
                                                stroke="#27BAD8" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M32.4393 14.2499H23.75V5.56055C25.7535 6.27135 27.5732 7.42023 29.0764 8.92345C30.5797 10.4267 31.7285 12.2464 32.4393 14.2499Z"
                                                stroke="#27BAD8" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>


                                    </span>
                                    <!-- end span  -->
                                    <div class="dashbord-card-info">
                                        <h2>10,500</h2>
                                        <p>Total Selling Product</p>
                                    </div>
                                    <!-- end dashbord-card-info  -->


                                </div>
                                <!-- end card-inner  -->
                            </div>
                            <!-- end card  -->
                        </div>
                        <!-- end col  -->
                        <div class=" col-xl-3 col-lg-6 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-inner d-flex justify-content-between align-items-center flex-wrap p-2">

                                    <span class="dash-card-icon dash-card-icon3">
                                        <svg width="34" height="25" viewBox="0 0 34 25" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M20.25 1H16.75H12.375M4.5 8H29M4.5 8C3.57174 8 2.6815 7.63125 2.02513 6.97487C1.36875 6.3185 1 5.42826 1 4.5C1 3.57174 1.36875 2.6815 2.02513 2.02513C2.6815 1.36875 3.57174 1 4.5 1H29C29.9283 1 30.8185 1.36875 31.4749 2.02513C32.1313 2.6815 32.5 3.57174 32.5 4.5C32.5 5.42826 32.1313 6.3185 31.4749 6.97487C30.8185 7.63125 29.9283 8 29 8M4.5 8V20.25C4.5 21.1783 4.86875 22.0685 5.52513 22.7249C6.1815 23.3813 7.07174 23.75 8 23.75H25.5C26.4283 23.75 27.3185 23.3813 27.9749 22.7249C28.6313 22.0685 29 21.1783 29 20.25V8"
                                                stroke="#F6B13C" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M10 13.0016L10.5112 17.2862M10.5112 17.2862C11.0944 15.8792 12.1395 14.7008 13.4829 13.9355C14.8263 13.1703 16.392 12.8614 17.9346 13.0574C19.4772 13.2534 20.9096 13.9432 22.0072 15.0186C23.1049 16.094 23.8057 17.4943 24 19M10.5112 17.2862H14.392"
                                                stroke="#F6B13C" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>


                                    </span>
                                    <!-- end span  -->
                                    <div class="dashbord-card-info">
                                        <h2>16,500</h2>
                                        <p>Total Return Product</p>
                                    </div>
                                    <!-- end dashbord-card-info  -->


                                </div>
                                <!-- end card-inner  -->
                            </div>
                            <!-- end card  -->
                        </div>
                        <!-- end col  -->
                        <div class=" col-xl-3 col-lg-6 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-inner d-flex justify-content-between align-items-center flex-wrap p-2">

                                    <span class="dash-card-icon dash-card-icon4">
                                        <svg width="38" height="38" viewBox="0 0 38 38" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M4.75 4.75H7.91667L8.55 7.91667M8.55 7.91667H33.25L26.9167 20.5833H11.0833M8.55 7.91667L11.0833 20.5833M11.0833 20.5833L7.45275 24.2139C6.45525 25.2114 7.16142 26.9167 8.57217 26.9167H26.9167M26.9167 26.9167C26.0768 26.9167 25.2714 27.2503 24.6775 27.8442C24.0836 28.438 23.75 29.2435 23.75 30.0833C23.75 30.9232 24.0836 31.7286 24.6775 32.3225C25.2714 32.9164 26.0768 33.25 26.9167 33.25C27.7565 33.25 28.562 32.9164 29.1558 32.3225C29.7497 31.7286 30.0833 30.9232 30.0833 30.0833C30.0833 29.2435 29.7497 28.438 29.1558 27.8442C28.562 27.2503 27.7565 26.9167 26.9167 26.9167ZM14.25 30.0833C14.25 30.9232 13.9164 31.7286 13.3225 32.3225C12.7286 32.9164 11.9232 33.25 11.0833 33.25C10.2435 33.25 9.43803 32.9164 8.84416 32.3225C8.2503 31.7286 7.91667 30.9232 7.91667 30.0833C7.91667 29.2435 8.2503 28.438 8.84416 27.8442C9.43803 27.2503 10.2435 26.9167 11.0833 26.9167C11.9232 26.9167 12.7286 27.2503 13.3225 27.8442C13.9164 28.438 14.25 29.2435 14.25 30.0833Z"
                                                stroke="#1ABC9C" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M19.6464 17.3536C19.8417 17.5488 20.1583 17.5488 20.3536 17.3536L23.5355 14.1716C23.7308 13.9763 23.7308 13.6597 23.5355 13.4645C23.3403 13.2692 23.0237 13.2692 22.8284 13.4645L20 16.2929L17.1716 13.4645C16.9763 13.2692 16.6597 13.2692 16.4645 13.4645C16.2692 13.6597 16.2692 13.9763 16.4645 14.1716L19.6464 17.3536ZM19.5 10L19.5 17L20.5 17L20.5 10L19.5 10Z"
                                                fill="#1ABC9C" />
                                        </svg>


                                    </span>
                                    <!-- end span  -->
                                    <div class="dashbord-card-info">
                                        <h2>16,500</h2>
                                        <p>Total Stock</p>
                                    </div>
                                    <!-- end dashbord-card-info  -->


                                </div>
                                <!-- end card-inner  -->
                            </div>
                            <!-- end card  -->
                        </div>
                        <!-- end col  -->
                    </div>
                    <!-- end row  -->

                    <div class="row">
                        <div class="col-lg-6 col-md-8 col-sm-12">

                            <div class="card p-3">
                                <div class="card-body">
                                    <div
                                        class="line-chart mb-2 d-flex justify-content-between align-items-center flex-wrap">
                                        <h3>Sales Analytics</h3>
                                    </div>
                                    <!-- end line-chart  -->
                                    <div>
                                        <canvas id="myChart"></canvas>
                                    </div>
                                    <!-- end line chart js  -->
                                </div>
                                <!-- end card-body  -->
                            </div>
                            <!-- end card  -->
                        </div>
                        <!-- end col  -->

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="card p-3">
                                <div class="card-body">
                                    <div
                                        class="line-chart mb-2 d-flex justify-content-between align-items-center flex-wrap">
                                        <h3>Sales Analytics</h3>

                                    </div>
                                    <!-- end line-chart  -->
                                    <div>
                                        <canvas id="myChart2"></canvas>
                                    </div>
                                    <!-- end line chart js  -->
                                </div>
                                <!-- end card-body  -->
                            </div>
                            <!-- end card  -->
                        </div>
                    </div>
                    <!-- end row  -->

                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <script>document.write(new Date().getFullYear())</script> &copy; Grocery Admin Template by
                            <a href="">Excel IT AI</a>
                        </div>

                    </div>
                </div>
            </footer>
            <!-- end Footer -->
        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div data-simplebar class="h-100">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-bordered nav-justified" role="tablist">

                <li class="nav-item">
                    <a class="nav-link py-2 active" data-bs-toggle="tab" href="#settings-tab" role="tab">
                        <i class="mdi mdi-cog-outline d-block font-22 my-1"></i>
                    </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content pt-0">



                <div class="tab-pane active" id="settings-tab" role="tabpanel">
                    <h6 class="fw-medium px-3 m-0 py-2 font-13 text-uppercase bg-light">
                        <span class="d-block py-1">Template Settings</span>
                    </h6>

                    <div class="p-3">
                        <div class="alert alert-warning" role="alert">
                            <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
                        </div>

                        <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Color Scheme</h6>
                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="color-scheme-mode" value="light"
                                id="light-mode-check" checked />
                            <label class="form-check-label" for="light-mode-check">Light Mode</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="color-scheme-mode" value="dark"
                                id="dark-mode-check" />
                            <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
                        </div>





                        <!-- Left Sidebar-->
                        <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Left Sidebar Color</h6>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="leftsidebar-color" value="light"
                                id="light-check" />
                            <label class="form-check-label" for="light-check">Light</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="leftsidebar-color" value="dark"
                                id="dark-check" checked />
                            <label class="form-check-label" for="dark-check">Dark</label>
                        </div>



                        <div class="form-check form-switch mb-3">
                            <input type="checkbox" class="form-check-input" name="leftsidebar-color" value="gradient"
                                id="gradient-check" />
                            <label class="form-check-label" for="gradient-check">Gradient</label>
                        </div>

                        <!-- size -->
                        <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Left Sidebar Size</h6>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="leftsidebar-size" value="default"
                                id="default-size-check" checked />
                            <label class="form-check-label" for="default-size-check">Default</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="leftsidebar-size" value="condensed"
                                id="condensed-check" />
                            <label class="form-check-label" for="condensed-check">Condensed <small>(Extra Small
                                    size)</small></label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="leftsidebar-size" value="compact"
                                id="compact-check" />
                            <label class="form-check-label" for="compact-check">Compact <small>(Small
                                    size)</small></label>
                        </div>




                        <!-- Topbar -->
                        <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Topbar</h6>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="topbar-color" value="dark"
                                id="darktopbar-check" checked />
                            <label class="form-check-label" for="darktopbar-check">Dark</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="topbar-color" value="light"
                                id="lighttopbar-check" />
                            <label class="form-check-label" for="lighttopbar-check">Light</label>
                        </div>


                        <div class="d-grid mt-4">
                            <button class="btn btn-primary" id="resetBtn">Reset to All</button>
                        </div>

                    </div>

                </div>
            </div>

        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->
    <script src="{{asset('backend')}}/assets/js/vendor.min.js"></script>

    <!-- Plugins js-->
    <script src="{{asset('backend')}}/assets/libs/flatpickr/flatpickr.min.js"></script>
    <script src="{{asset('backend')}}/assets/libs/apexcharts/apexcharts.min.js"></script>

    <script src="{{asset('backend')}}/assets/libs/selectize/js/standalone/selectize.min.js"></script>

    <!-- Dashboar 1 init js -->
    <script src="{{asset('backend')}}/assets/js/pages/dashboard-1.init.js"></script>

    <!-- App js-->
    <script src="{{asset('backend')}}/assets/js/app.min.js"></script>
    <!-- Line chart js  -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['2005', '2007', '2009', '2011', '2013', '2015',],
                datasets: [{
                    label: '# Analytics',
                    data: [65, 56, 80, 82, 55, 53, 30],
                    backgroundColor: [
                        // 'rgba(255, 99, 132, 0.2)',
                        // 'rgba(54, 162, 235, 0.2)',
                        // 'rgba(255, 206, 86, 0.2)',
                        'rgba(20,155,198,0.7)',
                        'rgba(20,155,198,0.7)',
                        'rgba(20,155,198,0.7)',
                        'rgba(20,155,198,0.7)',
                        'rgba(20,155,198,0.7)',
                        'rgba(20,155,198,0.7)'
                        // 'rgba(153, 102, 255, 0.2)',
                        // 'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(20,155,198,0.7)',
                        'rgba(20,155,198,0.7)',
                        'rgba(20,155,198,0.7)',
                        'rgba(20,155,198,0.7)',
                        'rgba(20,155,198,0.7)',
                        'rgba(20,155,198,0.7)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            //   borderColor: 'transparent',
                            //     borderWidth: 2,
                            borderDash: [10, 10],
                            display: true
                        }
                    },
                    x: {
                        grid: {
                            lineWidth: 5,
                            display: false
                        }
                    }
                }
            }
        });
    </script>
    <script>
        const ctx2 = document.getElementById('myChart2');
        const myChart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        // 'rgba(255, 99, 132, 0.2)',
                        // 'rgba(54, 162, 235, 0.2)',
                        // 'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                        // 'rgba(153, 102, 255, 0.2)',
                        // 'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        // 'rgba(255, 99, 132, 1)',
                        // 'rgba(54, 162, 235, 1)',
                        // 'rgba(255, 206, 86, 1)',
                        // 'rgba(75, 192, 192, 1)',
                        // 'rgba(153, 102, 255, 1)',
                        // 'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>


    <!-- <script>
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script> -->

</body>

</html>