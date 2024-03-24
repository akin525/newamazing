<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Amazing-Data </title>
    <meta content="We offer instant recharge of Airtime, Databundle, CableTV (DStv, GOtv & Startimes), Electricity Bill Payment and more" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="https://amazingdata.com.ng/ama.jpg" rel="icon">
    <link href="https://amazingdata.com.ng/ama.jpg" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('land/cdn.jsdelivr.net/npm/bootstrap-icons%401.7.2/font/bootstrap-icons.css')}}">

    <!-- bootstrap 5 -->
    <link rel="stylesheet" href="{{asset('land/assets/css/lib/bootstrap.min.css')}}">

    <!-- ====== font family ====== -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
          rel="stylesheet">

    <link rel="stylesheet" href="{{asset('land/assets/css/lib/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('land/assets/css/lib/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('land/assets/css/lib/jquery.fancybox.css')}}" />
    <link rel="stylesheet" href="{{asset('land/assets/css/lib/lity.css')}}" />
    <link rel="stylesheet" href="{{asset('land/assets/css/lib/swiper.min.css')}}" />
    <!-- ====== global style ====== -->
    <link rel="stylesheet" href="{{asset('land/assets/css/style.css')}}" />
</head>

<body>
<!-- ---------- loader ---------- -->
<div id="preloader">
    <div id="loading-wrapper" class="show">
        <div id="loading-text"> <img src="{{asset('ama.jpg')}}" alt=""> </div>
        <div id="loading-content"></div>
    </div>
</div>
<!-- ====== end loading page ====== -->

@include('sweetalert::alert')



{{--<!-- ====== start top navbar ====== -->--}}
{{--<div class="top-navbar style-1">--}}
{{--    <div class="container">--}}
{{--        <div class="content">--}}
{{--            <div class="row align-items-center">--}}
{{--                <div class="col-lg-8">--}}
{{--                    <div class="top-links">--}}
{{--                        <div class="text text-white">--}}
{{--                            <i class="fas fa-bullhorn"></i>--}}
{{--                            <strong>Welcome:</strong>--}}
{{--                            <span>To Amazing Mobile Data/Airtime<a href="#" class="p-0"><u>1st Line IT Support--}}
{{--                                            </u></a></span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4">--}}
{{--                    <div class="r-side">--}}
{{--                        <div class="socail-icons">--}}
{{--                            <a href="#">--}}
{{--                                <i class="fab fa-twitter"></i>--}}
{{--                            </a>--}}
{{--                            <a href="#">--}}
{{--                                <i class="fab fa-facebook-f"></i>--}}
{{--                            </a>--}}
{{--                            <a href="#">--}}
{{--                                <i class="fab fa-linkedin-in"></i>--}}
{{--                            </a>--}}
{{--                            <a href="#">--}}
{{--                                <i class="fab fa-instagram"></i>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="dropdown">--}}
{{--                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"--}}
{{--                               data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                <img class="me-1" src="assets/img/lang.png" alt=""> English--}}
{{--                            </a>--}}
{{--                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">--}}
{{--                                <li><a class="dropdown-item" href="#">French</a></li>--}}
{{--                                <li><a class="dropdown-item" href="#">Arabic</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<!-- ====== end top navbar ====== -->--}}

<!-- ====== start navbar ====== -->
<nav class="navbar navbar-expand-lg navbar-light style-1">
    <div class="container">
        <a class="navbar-brand" href="#" data-scroll-nav="0">
            <img width="100" src="{{asset('ama.jpg')}}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link active"  data-scroll-nav="1">
                        about us
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link"  data-scroll-nav="2">
                        services
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  data-scroll-nav="3">
                        why us
                    </a>
                </li>
            </ul>
            <div class="nav-side">
                <div class="hotline pe-4">
                    <div class="icon me-3">
                        <i class="bi bi-telephone"></i>
                    </div>
                    <div class="cont">
                        <small class="text-muted m-0">hotline 24/7</small>
                        <h6>07036710638</h6>
                    </div>
                </div>
                <div class="qoute-nav ps-4">
                    @if(\Illuminate\Support\Facades\Auth::check())
                    <a href="{{route('dashboard')}}" class="btn sm-butn butn-gard border-0 text-white">
                        <span>Dashboard</span>
                    </a>
                    @else

                    <a href="{{route('login')}}" class="btn sm-butn butn-gard border-0 text-white">
                        <span>Login/Signup</span>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- ====== end navbar ====== -->

<!-- ====== start header ====== -->
<header class="section-padding style-1" data-scroll-index="0">
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-lg-6">
                    <div class="info">
                        <div class="section-head mb-60">
                            <h6 class="color-main text-uppercase">Welcome To AmazingData!</h6>
                            <h2>
                                DATA, AIRTIME, EDUCATIONAL PINS, TV SUBSCRIPTION,
                                <span class="fw-normal">ELECTRICITY BILLS!!</span>
                            </h2>
                        </div>
                        <div class="text">
                            ...Your Satisfaction is Our Priority!!
                        </div>
                        <div class="bttns mt-5">
                            @if(\Illuminate\Support\Facades\Auth::check())
                            <a href="{{route('dashboard')}}" class="btn btn-dark">
                                <span>Dashboard</span>
                            </a>
                            @else
                                <a href="{{route('login')}}" class="btn btn-dark">
                                <span>Login/Signup</span>
                            </a>
                            @endif
                            <a href="https://play.google.com/store/apps/details?id=com.a5starcompany.amazingdata" data-lity class="vid-btn">
                                <img width="200" src="{{asset('play.png')}}"/>
                                <span>
                                        <br>
                                    </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="img">
                        <img src="{{asset('land/assets/img/header/head.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img src="{{asset('land/assets/img/header/head_shape_r.png')}}" alt="" class="head-shape-r wow">
    <img src="{{asset('land/assets/img/header/head_shape_l.png')}}" alt="" class="head-shape-l wow">
</header>
<!-- ====== end header ====== -->

<!--Contents-->
<main>


    <!-- ====== start about ====== -->
    <section class="about style-1"  data-scroll-index="1">
        <div class="container">
            <div class="content">
{{--                <div class="about-logos d-flex align-items-center justify-content-between border-bottom border-1 brd-light pb-20">--}}
{{--                    <a href="#" class="logo wow fadeInUp" data-wow-delay="0">--}}
{{--                        <img src="assets/img/about/about_logos/1.png" alt="">--}}
{{--                    </a>--}}
{{--                    <a href="#" class="logo wow fadeInUp" data-wow-delay="0.2s">--}}
{{--                        <img src="assets/img/about/about_logos/2.png" alt="">--}}
{{--                    </a>--}}
{{--                    <a href="#" class="logo wow fadeInUp" data-wow-delay="0.4s">--}}
{{--                        <img src="assets/img/about/about_logos/3.png" alt="">--}}
{{--                    </a>--}}
{{--                    <a href="#" class="logo wow fadeInUp" data-wow-delay="0.6s">--}}
{{--                        <img src="assets/img/about/about_logos/4.png" alt="">--}}
{{--                    </a>--}}
{{--                    <a href="#" class="logo wow fadeInUp" data-wow-delay="0.8s">--}}
{{--                        <img src="assets/img/about/about_logos/5.png" alt="">--}}
{{--                    </a>--}}
{{--                </div>--}}
                <div class="about-info">
                    <div class="row justify-content-between">
                        <div class="col-lg-5">
                            <div class="title">
                                <h3 class=" wow fadeInUp slow">“AmazingData is a registered telecommunication vendor known for providing internet services, airtime VTU, cable TV subscriptions, electricity payment,”</h3>
                                <small class=" wow fadeInUp slow fw-bold">converting airtime to cash..</small>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="info">
                                <h6 class=" wow fadeInUp slow">
                                    Convert MTN, 9mobile, Airtel and Glo airtime to cash instantly. Airtime topup and data purchase are automated and get delivered to you almost instantly.
                                </h6>
                                <p class=" wow fadeInUp slow">
                                    We use a customized application specifically designed a testing gnose to keep away for people.
                                </p>
                                <a href="#" class="btn btn-outline-light mt-5 sm-butn wow fadeInUp slow">
                                    <span>more about us</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <img src="{{asset('land/assets/img/about/num_shap.png')}}" alt="" class="about_shap">
            </div>
        </div>
    </section>
    <!-- ====== end about ====== -->




    <!-- ====== start services ====== -->
    <section class="services section-padding style-1"  data-scroll-index="2">
        <div class="container">
            <div class="row">
                <div class="col offset-lg-1">
                    <div class="section-head mb-60">
                        <h6 class="color-main text-uppercase wow fadeInUp">our services</h6>
                        <h2 class="wow fadeInUp">
                            Perfect IT Solutions <span class="fw-normal">For Your Business</span>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="service-box mb-4 wow fadeInUp" data-wow-delay="0">
                            <h5>
                                <a href="{{route('select')}}">Mobile Data</a>
                                <span class="num">01</span>
                            </h5>
                            <div class="icon">
                                <img src="{{asset('land/assets/img/icons/serv_icons/1.png')}}" alt="">
                            </div>
                            <div class="info">
                                <div class="text">
                                    Start enjoying this very low rates Data plan for your internet browsing databundle.
                                </div>
                                <div class="tags">
                                    <a href="#">MTN</a>
                                    <a href="#">AIRTEL</a>
                                    <a href="#">GLO</a>
                                    <a href="#">9MOBILE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="service-box mb-4 wow fadeInUp" data-wow-delay="0.2s">
                            <h5>
                                <a href="{{route('airtime')}}">Airtime </a>
                                <span class="num">02</span>
                            </h5>
                            <div class="icon">
                                <img src="{{asset('land/assets/img/icons/serv_icons/2.png')}}" alt="">
                            </div>
                            <div class="info">
                                <div class="text">
                                    Never run low on airtime, purchase airtime for all networks instantly.
                                </div>
                                <div class="tags">
                                    <a href="#">MTN</a>
                                    <a href="#">AIRTEL</a>
                                    <a href="#">GLO</a>
                                    <a href="#">9MOBILE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="service-box mb-4 wow fadeInUp" data-wow-delay="0.4s">
                            <h5>
                                <a href="{{url('vtu')}}"> Website Development </a>
                                <span class="num">03</span>
                            </h5>
                            <div class="icon">
                                <img src="{{asset('land/assets/img/icons/serv_icons/3.png')}}" alt="">
                            </div>
                            <div class="info">
                                <div class="text">
                                   Helping you becoming a website owner by upgrading your account to reseller
                                </div>
                                <div class="tags">
                                    <a href="#">Ecommerce</a>
                                    <a href="#">Landing Page</a>
                                    <a href="#">CMS</a>
                                    <a href="#">Plugin</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="service-box mb-4 mb-md-0 wow fadeInUp" data-wow-delay="0">
                            <h5>
                                <a href="{{url('picktv')}}"> TV Subscription</a>
                                <span class="num">04</span>
                            </h5>
                            <div class="icon">
                                <img src="{{asset('land/assets/img/icons/serv_icons/4.png')}}" alt="">
                            </div>
                            <div class="info">
                                <div class="text">
                                    Stay connected! Subscribe and Renew your Tv subscription instantly.
                                </div>
                                <div class="tags">
                                    <a href="#">GOTV</a>
                                    <a href="#">DSTV</a>
                                    <a href="#">STARTIMES</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="service-box mb-4 mb-md-0 wow fadeInUp" data-wow-delay="0.2s">
                            <h5>
                                <a href="page-services-5.html">Electricity Bills</a>
                                <span class="num">05</span>
                            </h5>
                            <div class="icon">
                                <img src="{{asset('land/assets/img/icons/serv_icons/5.png')}}" alt="">
                            </div>
                            <div class="info">
                                <div class="text">
                                    Purchase prepaid meter tokens instantly and Pay estimated bill.
                                </div>
                                <div class="tags">
                                    <a href="#">IKEDC</a>
                                    <a href="#">EKO</a>
                                    <a href="#">Etc..</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="service-box wow fadeInUp" data-wow-delay="0.4s">
                            <h5>
                                <a href="/waec"> WAEC/NECO Result Checker </a>
                                <span class="num">06</span>
                            </h5>
                            <div class="icon">
                                <img src="{{asset('land/assets/img/icons/serv_icons/6.png')}}" alt="">
                            </div>
                            <div class="info">
                                <div class="text">
                                    (Pin & Serial No.)
                                </div>
                                <div class="tags">
                                    <a href="#">WAEC</a>
                                    <a href="#">NECO</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{asset('land/assets/img/services/ser_shap_l.png')}}" alt="" class="ser_shap_l">
        <img src="{{asset('land/assets/img/services/ser_shap_r.png')}}" alt="" class="ser_shap_r">
    </section>
    <!-- ====== end services ====== -->

    <!-- ====== start choose-us====== -->
    <section class="choose-us section-padding pt-0 style-1"  data-scroll-index="3">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-5">
                    <div class="info">
                        <div class="section-head mb-60">
                            <h6 class="color-main text-uppercase wow fadeInUp">Why choose us</h6>
                            <h2 class="wow fadeInUp">
                                Boost Your Business <span class="fw-normal">With New Tech</span>
                            </h2>
                        </div>
                        <div class="text">
                            The enterprise is a leading business in telecommunication and other aspect of needs of business owners and individuals.
                        </div>
                        <ul>
                            <li class="wow fadeInUp">
                                <span class="icon">
                                    <i class="bi bi-check2"></i>
                                </span>
                                <h6>
                                    Buy Airtime & Data at cheaper rate
                                </h6>
                            </li>
                            <li class="wow fadeInUp">
                                <span class="icon">
                                    <i class="bi bi-check2"></i>
                                </span>
                                <h6>
                                    Over 100+ Payment Gateways Support
                                </h6>
                            </li>
                            <li class="wow fadeInUp">
                                <span class="icon">
                                    <i class="bi bi-check2"></i>
                                </span>
                                <h6>
                                    Your payment is secure and your details will never be at risk
                                </h6>
                            </li>
                            <li class="wow fadeInUp">
                                <span class="icon">
                                    <i class="bi bi-check2"></i>
                                </span>
                                <h6>
                                    Dedicated Support 24/7
                                </h6>
                            </li>
                        </ul>

                        <a href="#" class="btn butn-gard border-0 text-white wow fadeInUp">
                            <span>How We Works</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{asset('land/assets/img/choose_us/choose_lines.svg')}}" alt="" class="choose-us-img">
        <img src="{{asset('land/assets/img/choose_us/choose_brands.png')}}" alt="" class="choose-us-brands">
        <img src="{{asset('land/assets/img/choose_us/choose_bubbles.png')}}" alt="" class="choose-us-bubbles">
    </section>
    <!-- ====== end choose-us====== -->

    <!-- ====== start contact ====== -->
    <section class="contact section-padding bg-gradient style-1"  data-scroll-index="7">
        <div class="container">
            <div class="section-head mb-60 text-center">
                <h6 class="text-white text-uppercase wow fadeInUp">contact us</h6>
                <h2 class="wow fadeInUp text-white">
                    Request Free <span class="fw-normal">Consultancy</span>
                </h2>
            </div>
            <div class="content">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="contact_info text-white">
                            <p class="wow fadeInUp">Hotline 24/7</p>
                            <h4 class="wow fadeInUp">+2347036710638</h4>
                            <ul>
                                <li class="wow fadeInUp">
                                    <strong>Address : </strong>No 53 Famuyiwa House,Mokin road, Ilaramokin, No 8,New Palace road, Behind UBA Ilaramokin
                                </li>
                                <li class="wow fadeInUp">
                                    <strong>Email : </strong> info@amazingdata.com.ng
                                </li>

                                <li class="wow fadeInUp">
                                    <strong>Work Hour : </strong> Mon - Sat: 9:00 - 18:00
                                </li>
                            </ul>
                            <a href="#" class="wow fadeInUp">get direction</a>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-1">
                        <form class="contact_form" action="https://iteck-html.themescamp.com/contact.php" method="post">
                            <div class="row gx-3">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3 wow fadeInUp">
                                        <input type="text" name="name" class="form-control" placeholder="name *">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3 wow fadeInUp">
                                        <input type="text" name="email" class="form-control" placeholder="Email Address *">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3 wow fadeInUp">
                                        <select  name="option" class="form-select" aria-label="Default select example">
                                            <option selected>Your inquiry about</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3 wow fadeInUp">
                                        <textarea class="form-control" rows="4" placeholder="Write your inquiry here"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-check mb-4 wow fadeInUp">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label text-light small" for="flexCheckDefault">
                                            By submitting, i’m agreed to the <a href="#" class="text-decoration-underline">Terms & Conditons</a>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <input type="submit" value="Request Now" class="btn btn-dark wow fadeInUp text-light fs-14px">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{asset('land/assets/img/contact_globe.svg')}}" alt="" class="contact_globe">
    </section>
    <!-- ====== end contact ====== -->
</main>
<!--End-Contents-->

<!-- ====== start footer ====== -->
<footer class="style-1">
    <div class="container">
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="foot_info">
                        <a href="#" class="logo mb-3">
                            <img src="{{asset('ama.jpg')}}" alt="">
                        </a>
                        <div class="text mb-4">
                            Best IT Solutions & Technology WordPress <br>
                        </div>
                        <ul class="mb-4">
                            <li class="d-flex">
                                <i class="bi bi-house me-3"></i>
                                <a href="#">
                                    <span>No 53 Famuyiwa House,Mokin road, Ilaramokin, No 8,New Palace road, Behind UBA Ilaramokin</span>
                                </a>
                            </li>
                            <li class="d-flex">
                                <i class="bi bi-envelope me-3"></i>
                                <a href="#">
                                    <span>info@amazingdata.com.ng</span>
                                </a>
                            </li>
                            <li class="d-flex">
                                <i class="bi bi-phone me-3"></i>
                                <a href="#">
                                    <span>+2347036710638</span>
                                </a>
                            </li>
                        </ul>
                        <div class="social_icons">
                            <a href="#">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#">
                                <i class="fab fa-github"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="links">
                        <div class="cont">
                            <h6 class="link_title">
                                Services
                            </h6>
                            <ul>
                                <li>
                                    <a href="#">IT Consultations </a>
                                </li>
                                <li>
                                    <a href="#">Data Security </a>
                                </li>
                                <li>
                                    <a href="#">Website Development </a>
                                </li>
                                <li>
                                    <a href="#">CRM & Software </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="links">
                        <div class="cont">
                            <h6 class="link_title">
                                Information
                            </h6>
                            <ul>
                                <li>
                                    <a href="#">About AmazingData </a>
                                </li>
                                <li>
                                    <a href="#">Investors </a>
                                </li>
                                <li>
                                    <a href="#">Blog </a>
                                </li>
                                <li>
                                    <a href="#">Career </a>
                                </li>
                                <li>
                                    <a href="#">Contact </a>
                                </li>
                                <li>
                                    <a href="#">How It Works </a>
                                </li>
                                <li>
                                    <a href="#">Pricing Plan </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="foot_subscribe">
                        <h6 class="link_title">
                            Newsletter
                        </h6>
                        <p>
                            Register now to get latest updates SME MTN DATA.
                        </p>
                        <div class="input-group my-4">
                            <input type="text" class="form-control" placeholder="Enter your email" aria-label="Enter your email" aria-describedby="button-addon2">
                            <button class="btn butn-gard border-0 text-white px-3" type="button" id="button-addon2">
                                <span>Subscribe</span>
                            </button>
                        </div>
                        <p class="fst-italic">By subscribing, you accepted the our <a href="{{route('login')}}" class="text-decoration-underline"> Policy</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="foot">
                    <p>
                        © 2023 Copyrights by <a href="#" class="text-white text-decoration-underline">AmazingData</a> All Rights Reserved by <a href="#" class="text-white text-decoration-underline"> Amazing</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <img src="{{asset('land/assets/img/footer/foot_l.png')}}" alt="" class="foot_l">
    <img src="{{asset('land/assets/img/footer/foot_r.png')}}" alt="" class="foot_r">
</footer>
<!-- ====== end footer ====== -->


<!-- ====== start to top button ====== -->
<a href="#" class="to_top">
    <i class="bi bi-chevron-up"></i>
    <small>top</small>
</a>
<!-- ====== end to top button ====== -->


<!-- ====== request ====== -->
<script src="{{asset('land/assets/js/lib/jquery-3.0.0.min.js')}}"></script>
<script src="{{asset('land/assets/js/lib/jquery-migrate-3.0.0.min.js')}}"></script>
<script src="{{asset('land/assets/js/lib/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('land/assets/js/lib/wow.min.js')}}"></script>
<script src="{{asset('land/assets/js/lib/jquery.fancybox.js')}}"></script>
<script src="{{asset('land/assets/js/lib/lity.js')}}"></script>
<script src="{{asset('land/assets/js/lib/swiper.min.js')}}"></script>
<script src="{{asset('land/assets/js/lib/jquery.waypoints.min.j')}}s"></script>
<script src="{{asset('land/assets/js/lib/jquery.counterup.js')}}"></script>
<script src="{{asset('land/assets/js/lib/scrollIt.min.js')}}"></script>
<script src="{{asset('land/assets/js/main.js')}}"></script>


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
<a href="http:wa.me/2347036710638/?text=Goodday, My Username is....." class="float" target="_blank">
    <i class="fa fa-whatsapp my-float"></i>
</a>
<script>
    window.onload = function(){ document.querySelector(".preloader").style.display = "none"; }
</script>

</body>

</html>
