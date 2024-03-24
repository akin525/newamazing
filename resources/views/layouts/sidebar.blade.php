<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('tittle')</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/plugin.min.css')}}">
    <link rel="stylesheet" href="{{asset('style.css')}}">

    <link rel="icon"  sizes="16x16" href="{{asset('ama.jpg')}}">

    <link rel="stylesheet" href="{{asset('unicons.iconscout.com/release/v4.0.0/css/line.css')}}">
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">

    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<style>
    .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .loading-spinner {
        width: 40px;
        height: 40px;
        border: 4px solid #f3f3f3;
        border-top: 4px solid #3498db;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>

<body class="layout-light side-menu">
@include('sweetalert::alert')
<div class="mobile-search">
    <form action="#" class="search-form">
        <img src="img/svg/search.svg" alt="search" class="svg">
        <input class="form-control me-sm-2 box-shadow-none" type="search" placeholder="Search..." aria-label="Search">
    </form>
</div>
<div class="mobile-author-actions"></div>
<header class="header-top">
    <nav class="navbar navbar-light">
        <div class="navbar-left">
            <div class="logo-area ">

                <a href="javascript:;" class="nav-item-toggle"><img width="50" src="{{asset('pa.jpg')}}" alt class="rounded-circle">
{{--                    <span class="nav-item__title">{{\Illuminate\Support\Facades\Auth::user()->username}}<i class="las la-angle-down nav-item__arrow"></i></span>--}}
                </a>


{{--                <a class="navbar-brand rounded-circle" href="{{route('dashboard')}}">--}}
{{--                    <img class="dark" width="100" src="{{asset('pa.jpg')}}" alt="logo">--}}
{{--                    <img class="light" width="100" src="{{asset('pa.jpg')}}" alt="logo">--}}
{{--                </a>--}}
                <a href="#" class="sidebar-toggle">
                    <img class="svg" src="img/svg/align-center-alt.svg" alt="img"></a>
            </div>
            <a href="#" class="customizer-trigger">
                <i class="uil uil-edit-alt"></i>
                <span>Customize...</span>
            </a>
            <div class="top-menu">
                <div class="hexadash-top-menu position-relative">
                    <ul class="d-flex align-items-center flex-wrap">
                        <li>
                            <a href="#" class="active">Dashboard</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="navbar-right">
            <ul class="navbar-right__menu">
                <li class="nav-search">
                    <a href="#" class="search-toggle">
                        <i class="uil uil-search"></i>
                        <i class="uil uil-times"></i>
                    </a>
                    <form action="#" class="search-form-topMenu">
                        <span class="search-icon uil uil-search"></span>
                        <input class="form-control me-sm-2 box-shadow-none" type="search" placeholder="Search..." aria-label="Search">
                    </form>
                </li>

                <li class="nav-author">
                    <div class="dropdown-custom">
                        <a href="javascript:;" class="nav-item-toggle"><img src="{{asset('pa.jpg')}}" alt class="rounded-circle">
                            <span class="nav-item__title">{{\Illuminate\Support\Facades\Auth::user()->username}}<i class="las la-angle-down nav-item__arrow"></i></span>
                        </a>
                        <div class="dropdown-parent-wrapper">
                            <div class="dropdown-wrapper">
                                <div class="nav-author__info">
                                    <div class="author-img">
                                        <img src="{{asset('pa.jpg')}}" alt class="rounded-circle">
                                    </div>
                                    <div>
                                        <h6>{{\Illuminate\Support\Facades\Auth::user()->name}}</h6>
                                        <span>Customer</span>
                                    </div>
                                </div>
                                <div class="nav-author__options">
                                    <ul>
                                        <li>
                                            <a href="{{route('myaccount')}}">
                                                <i class="uil uil-user"></i> Profile</a>
                                        </li>
                                        <li>
                                            <a href="{{route('myaccount')}}">
                                                <i class="uil uil-setting"></i>
                                                Settings</a>
                                        </li>
                                    </ul>
                                    <a href="{{route('logout')}}" class="nav-author__signout">
                                        <i class="uil uil-sign-out-alt"></i> Sign Out</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </li>

            </ul>

            <div class="navbar-right__mobileAction d-md-none">
                <a href="#" class="btn-search">
                    <img src="img/svg/search.svg" alt="search" class="svg feather-search">
                    <img src="img/svg/x.svg" alt="x" class="svg feather-x"></a>
                <a href="#" class="btn-author-action">
                    <img class="svg" src="img/svg/more-vertical.svg" alt="more-vertical"></a>
            </div>
        </div>

    </nav>
</header>
<main class="main-content">
    <div class="sidebar-wrapper">

        <div class="sidebar sidebar-collapse" id="sidebar">
            <div class="sidebar__menu-group">
                <ul class="sidebar_nav">
                    @if(Auth::user()->role =="admin")
                    <li>
                        <a href="{{route('admin/dashboard')}}" class="active">
                            <span class="nav-icon uil uil-create-dashboard"></span>
                            <span class="menu-text">Admin</span>
                        </a>
                    </li>
                    @endif
                    <li>
                        <a href="{{url('/')}}" class="active">
                            <span class="nav-icon uil uil-home"></span>
                            <span class="menu-text">Home</span>
                        </a>
                    </li>
                        <li>
                        <a href="https://play.google.com/store/apps/details?id=com.a5starcompany.amazingdata" target="_blank" class="active">
                            <span class="nav-icon uil uil-google-play"></span>
                            <span class="menu-text">Download Our App</span>
                        </a>
                    </li>

                        <li>
                        <a href="{{route('dashboard')}}" class="active">
                            <span class="nav-icon uil uil-create-dashboard"></span>
                            <span class="menu-text">Dashboard</span>
                        </a>
                    </li>


                        <li>
                        <a href="{{route('fund')}}" class="active">
                            <span class="nav-icon uil uil-money-bill"></span>
                            <span class="menu-text">Fund Wallet</span>
                        </a>
                    </li>

                        <li class="has-child">
                        <a href="#" class>
                            <span class="nav-icon uil uil-tv-retro"></span>
                            <span class="menu-text">Recharge</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <li class>
                                <a href="{{route('airtime')}}">Buy Airtime</a>
                            </li>
                            <li class>
                                <a href="{{route('select')}}">Buy Data</a>
                            </li>
                            <li class>
                                <a href="{{route('datapin')}}">Buy Datapin</a>
                            </li>
                            <li class>
                                <a href="{{url('picktv')}}">Tv Subscription</a>
                            </li>
                            <li class>
                                <a href="{{route('elect')}}">Electricity</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-child">
                        <a href="#" class>
                            <span class="nav-icon uil uil-basketball"></span>
                            <span class="menu-text">Education</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <li class>
                                <a href="{{route('waec')}}">Waec Cardpin</a>
                            </li>
                            <li class>
                                <a href="{{route('neco')}}">Neco Token</a>
                            </li>
                            <li class>
                                <a href="{{route('nabteb')}}">Nabteb Pin</a>
                            </li>
                            <li class>
                                <a href="{{route('jamb')}}">Jamb</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-child">
                        <a href="#" class>
                            <span class="nav-icon uil uil-invoice"></span>
                            <span class="menu-text">Transaction</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <li class>
                                <a href="{{route('deposit')}}">Deposit History</a>
                            </li>
                            <li class>
                                <a href="{{route('invoice')}}">Purchase History</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-child">
                        <a href="#" class>
                            <span class="nav-icon uil uil-usd-square"></span>
                            <span class="menu-text">Self Service</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <li class>
                                <a href="{{url('service')}}">Verify Data/Airtime Status</a>
                            </li>
                            <li class>
                                <a href="{{url('service1')}}">Verify Deposit</a>
                            </li>
                            <li class>
                                <a href="{{url('service')}}">Verify Tv Subscription</a>
                            </li>
                            <li class>
                                <a href="{{url('service')}}">Verify Electricity</a>
                            </li>


                        </ul>
                    </li>
                    <li>
                        <a href="{{route('reseller')}}" class="nav-link">
                            <span class="nav-icon uil uil-arrow-up-left"></span>
                            <span class="menu-text">Become a Reseller</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('vtu')}}" class="nav-link">
                            <span class="nav-icon uil uil-webcam"></span>
                            <span class="menu-text">Own A VTU Website</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('referal')}}" class="nav-link">
                            <span class="nav-icon uil uil-eye-slash"></span>
                            <span class="menu-text">View Referral</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('myaccount')}}" class="nav-link">
                            <span class="nav-icon uil uil-user"></span>
                            <span class="menu-text">My Account</span>
                        </a>
                    </li>


                </ul>
            </div>
        </div>
    </div>
    <div class="contents">
        <div class="demo5 mt-30 mb-25">
            <div class="container-fluid">
                <div class="row">
                @yield('content')

            </div>
        </div>
    </div>
    </div>
    <footer class="footer-wrapper">
        <div class="footer-wrapper__inside">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="footer-copyright">
                            <p><span>© 2023</span><a href="#">Amazing-Data</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-menu text-end">
                            <ul>
                                <li>
                                    <a href="#">About</a>
                                </li>
                                <li>
                                    <a href="#">Team</a>
                                </li>
                                <li>
                                    <a href="#">Contact</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </footer>

</main>

<div id="overlayer">
    <div class="loader-overlay">
        <div class="dm-spin-dots spin-lg">
            <span class="spin-dot badge-dot dot-primary"></span>
            <span class="spin-dot badge-dot dot-primary"></span>
            <span class="spin-dot badge-dot dot-primary"></span>
            <span class="spin-dot badge-dot dot-primary"></span>
        </div>
    </div>
</div>
<div class="overlay-dark-sidebar"></div>
<div class="customizer-overlay"></div>
<div class="customizer-wrapper">
    <div class="customizer">
        <div class="customizer__head">
            <h4 class="customizer__title">Customizer</h4>
            <span class="customizer__sub-title">Customize your overview page layout</span>
            <a href="#" class="customizer-close">
                <img class="svg" src="img/svg/x2.svg" alt>
            </a>
        </div>
        <div class="customizer__body">
            <div class="customizer__single">
                <h4>Layout Type</h4>
                <ul class="customizer-list d-flex layout">
                    <li class="customizer-list__item">
                        <a href="https://demo.dashboardmarket.com/hexadash-html/ltr" class="active">
                            <img src="img/ltr.png" alt>
                            <i class="fa fa-check-circle"></i>
                        </a>
                    </li>
                    <li class="customizer-list__item">
                        <a href="https://demo.dashboardmarket.com/hexadash-html/rtl">
                            <img src="img/rtl.png" alt>
                            <i class="fa fa-check-circle"></i>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="customizer__single">
                <h4>Sidebar Type</h4>
                <ul class="customizer-list d-flex l_sidebar">
                    <li class="customizer-list__item">
                        <a href="#" data-layout="light" class="dark-mode-toggle active">
                            <img src="img/light.png" alt>
                            <i class="fa fa-check-circle"></i>
                        </a>
                    </li>
                    <li class="customizer-list__item">
                        <a href="#" data-layout="dark" class="dark-mode-toggle">
                            <img src="img/dark.png" alt>
                            <i class="fa fa-check-circle"></i>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="customizer__single">
                <h4>Navbar Type</h4>
                <ul class="customizer-list d-flex l_navbar">
                    <li class="customizer-list__item">
                        <a href="#" data-layout="side" class="active">
                            <img src="img/side.png" alt>
                            <i class="fa fa-check-circle"></i>
                        </a>
                    </li>
                    <li class="customizer-list__item top">
                        <a href="#" data-layout="top">
                            <img src="img/top.png" alt>
                            <i class="fa fa-check-circle"></i>
                        </a>
                    </li>
                    <li class="colors"></li>
                </ul>
            </div>

        </div>
    </div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgYKHZB_QKKLWfIRaYPCadza3nhTAbv7c"></script>
@yield('script')
<script src="{{asset('js/plugins.min.js')}}"></script>
<script src="{{asset('js/script.min.js')}}"></script>

<style>
    .float{
        position:fixed;
        width:60px;
        height:60px;
        bottom:40px;
        right:40px;
        background-color:#25d366;
        color:#FFF;
        border-radius:50px;
        text-align:center;
        font-size:30px;
        box-shadow: 2px 2px 3px #999;
        z-index:100;
    }

    .my-float{
        margin-top:16px;
    }
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="https://chat.whatsapp.com/GgBq2QWvj46Awh1JRNj2KK" class="float" target="_blank">
    <i class="fa fa-whatsapp my-float"></i>
</a>
</body>

<!-- Mirrored from demo.dashboardmarket.com/hexadash-html/ltr/demo10.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 22 Jun 2023 15:31:43 GMT -->
</html>
