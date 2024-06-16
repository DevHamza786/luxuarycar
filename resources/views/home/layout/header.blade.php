<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Luxuary Car</title>
    <link rel="shortcut icon" href="{{ asset('home/assets/images/logo.png') }}">

    <!-- fraimwork - css include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/assets/css/bootstrap.min.css') }}">

    <!-- icon - css include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/assets/css/fontawesome.css') }}">

    <!-- animation - css include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/assets/css/aos.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/assets/css/animate.css') }}">

    <!-- carousel - css include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/assets/css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/assets/css/slick-theme.css') }}">

    <!-- popup - css include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/assets/css/magnific-popup.css') }}">

    <!-- select options - css include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/assets/css/nice-select.css') }}">

    <!-- pricing range - css include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/assets/css/jquery-ui.css') }}">

    <!-- custom - css include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/assets/css/style.css') }}">

    <style>
        .main-p{
            font-size: 14px;
        }
    </style>

</head>


<body>


    <!-- backtotop - start -->
    <div id="thetop"></div>
    <div class="backtotop">
        <a href="#" class="scroll">
            <i class="far fa-arrow-up"></i>
        </a>
    </div>
    <!-- backtotop - end -->




    <!-- header_section - start
  ================================================== -->
    <header class="header_section secondary_header sticky text-white clearfix">
        <div class="header_bottom clearfix">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                        <div class="brand_logo">
                            <a href="index.php">
                                <img class="img-fluid" src="{{ asset('home/assets/images/logo.png') }}"
                                    srcset="{{ asset('home/assets/images/logo.png') }} 2x" alt="logo_not_found"
                                    style="width:100px;">
                                <img class="img-fluid" src="{{ asset('home/assets/images/logo.png') }}"
                                    srcset="{{ asset('home/assets/images/logo.png') }} 2x" alt="logo_not_found"
                                    style="width:100px;">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-6 order-last">
                        <ul class="header_action_btns ul_li_right clearfix">
                            <li>
                                <button type="button" class="search_btn" data-toggle="collapse"
                                    data-target="#collapse_search_body" aria-expanded="false"
                                    aria-controls="collapse_search_body">
                                    <i class="fal fa-search"></i>
                                </button>
                            </li>
                            @if (Auth::check())
                                <li class="dropdown">
                                    <span class="logi_btn"><i class="icon-user"></i><a class="logi_btn" href="{{ route('dashboard') }}">Home</a></span>
                                </li>
                                    @else
                                <li class="dropdown">
                                    <a class="logi_btn" href="{{ route('login') }}">LOGIN</a>
                                </li>
                            @endif
                            <li>
                                <button type="button" class="mobile_sidebar_btn"><i
                                        class="fal fa-align-right"></i></button>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-7 col-md-12">
                        <nav class="main_menu clearfix">
                            <ul class="ul_li_center clearfix">
                                <li class="active"><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="{{ url('/about') }}">About</a></li>
                                <li><a href="{{ url('/vehicle') }}">Vehicle</a></li>
                                <li><a href="{{ url('/blog') }}">Blog</a></li>
                                <li><a href="{{ url('/contact') }}">Contact</a></li>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </div>

        <div id="collapse_search_body" class="collapse_search_body collapse">
            <div class="search_body">
                <div class="container">
                    <form action="#">
                        <div class="form_item">
                            <input type="search" name="search" placeholder="Type here...">
                            <button type="submit"><i class="fal fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <!-- header_section - end
  ================================================== -->


    <!-- main body - start
  ================================================== -->
    <main class="mt-0">


        <!-- mobile menu - start ================================================== -->
        <div class="sidebar-menu-wrapper">
            <div class="mobile_sidebar_menu">
                <button type="button" class="close_btn"><i class="fal fa-times"></i></button>

                <div class="about_content mb_60">
                    <div class="brand_logo mb_15">
                        <a href="index.html">
                            <img src="{{ asset('home/assets/images/logo/logo_01_1x.png') }}"
                                srcset="{{ asset('home/assets/images/logo/logo_01_2x.png') }} 2x"
                                alt="logo_not_found">
                        </a>
                    </div>
                </div>

                <div class="menu_list mb_60 clearfix">
                    <h3 class="title_text text-white">Menu List</h3>
                    <ul class="ul_li_center clearfix">
                        <li class="active"><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ url('/about') }}">About</a></li>
                        <li><a href="{{ url('/vehicle') }}">Vehicle</a></li>
                        <li><a href="{{ url('/blog') }}">Blog</a></li>
                        <li><a href="{{ url('/contact') }}">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="overlay"></div>
        </div>
        <!-- mobile menu - end ================================================== -->

        @yield('content')
    </main>
    <!-- main body - end ================================================== -->

    <section class="top_footer_links" data-bg-color="#1E1E1E">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="links_box">
                        <img src="{{ asset('home/assets/images/location.png') }}" alt="">
                        <div class="right">
                            <p>Luxury Car Chauffeur Service
                                5000 Riverdale road, suite 312
                                Riverdale, New Jersey, N.J. 07457</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="links_box">
                        <img src="{{ asset('home/assets/images/fohead.png') }}" alt="">
                        <div class="right">
                            <a href="">Email: info@luxuryccs.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="links_box">
                        <img src="{{ asset('home/assets/images/time.png') }}" alt="">
                        <div class="right">
                            <p>We’re open 24/7</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- footer_section - start ================================================== -->
    <footer class="footer_section clearfix">
        <div class="footer_widget_area sec_ptb_100 clearfix" data-bg-color="#1E1E1E">
            <div class="container">
                <div class="row justify-content-lg-between">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-sm-12">
                        <div class="footer_about" data-aos="fade-up" data-aos-delay="100">
                            <div class="brand_logo mb_30">
                                <a href="{{route('home')}}">
                                    <img src="{{ asset('home/assets/images/logo.png') }}"
                                        srcset="{{ asset('home/assets/images/logo.png') }}"
                                        alt="logo" width="150">
                                </a>
                            </div>
                            <p class="mb_15">
                                Offering luxurious transportation and ensuring the utmost comfort for our clients is our priority. Whether it's a chauffeured limousine service, a private jet charter, or a VIP travel experience, we go above and beyond to provide unparalleled luxury and convenience
                            </p>
                            <div class="footer_useful_links mb_30">
                                <ul class="ul_li_block clearfix">
                                    <li><img src="{{ asset('home/assets/images/card-accepted.jpg') }}" width="200"/></li>
                                </ul>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12 col-sm-12">
                        <div class="footer_useful_links" data-aos="fade-up" data-aos-delay="300">
                            <h3 class="footer_widget_title">Quick links</h3>
                            <ul class="ul_li_block clearfix">
                                <li><a href="{{ url('/faq') }}"> Faq</a></li>
                                <li><a href="{{ url('/how-we-work') }}"> How we work</a></li>
                                <li><a href="{{ url('/services') }}"> Services</a></li>
                                <li><a href="{{ url('/contact') }}"> Contact</a></li>
                                <li><a href="{{ url('/privacy-policy') }}"> Privacy Policy</a></li>
                                <li><a href="{{ url('/refund-policy') }}"> Refund Policy</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12 col-sm-12">
                        <div class="footer_useful_links" data-aos="fade-up" data-aos-delay="300">
                            <h3 class="footer_widget_title">Our Services</h3>
                            <ul class="ul_li_block clearfix">
                                <li><a href="{{ url('/single-service') }}"> Corporate travels</a></li>
                                <li><a href="{{ url('/single-service') }}"> Special events</a></li>
                                <li><a href="{{ url('/single-service') }}"> Airport transport</a></li>
                                <li><a href="{{ url('/single-service') }}"> Wedding limousine</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer_bottom text-white clearfix text-center" data-bg-color="#1E1E1E" style="border-top:1px solid;">
            <div class="container">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p class="copyright_text mb-0">© 2024, All Rights Reserved</p>
                    </div>

                    <!-- <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <ul class="primary_social_links ul_li_right clearfix">
                                <li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#!"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#!"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#!"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div> -->
                </div>
            </div>
        </div>
    </footer>
    <!-- footer_section - end ================================================== -->


    <!-- fraimwork - jquery include -->
    <script src="{{ asset('home/assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('home/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('home/assets/js/bootstrap.min.js') }}"></script>

    <!-- animation - jquery include -->
    <script src="{{ asset('home/assets/js/aos.js') }}"></script>
    <script src="{{ asset('home/assets/js/parallaxie.js') }}"></script>

    <!-- carousel - jquery include -->
    <script src="{{ asset('home/assets/js/slick.min.js') }}"></script>

    <!-- popup - jquery include -->
    <script src="{{ asset('home/assets/js/magnific-popup.min.js') }}"></script>

    <!-- select ontions - jquery include -->
    <script src="{{ asset('home/assets/js/nice-select.min.js') }}"></script>

    <!-- isotope - jquery include -->
    <script src="{{ asset('home/assets/js/isotope.pkgd.js') }}"></script>
    <script src="{{ asset('home/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('home/assets/js/masonry.pkgd.min.js') }}"></script>

    <!-- google map - jquery include -->
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDk2HrmqE4sWSei0XdKGbOMOHN3Mm2Bf-M&ver=2.1.6"></script>
    <script src="{{ asset('home/assets/js/gmaps.min.js') }}"></script> --}}

    <!-- pricing range - jquery include -->
    <script src="{{ asset('home/assets/js/jquery-ui.js') }}"></script>

    <!-- counter - jquery include -->
    <script src="{{ asset('home/assets/js/waypoint.js') }}"></script>
    <script src="{{ asset('home/assets/js/counterup.min.js') }}"></script>

    <!-- contact form - jquery include -->
    <script src="{{ asset('home/assets/js/validate.js') }}"></script>

    <!-- mobile menu - jquery include -->
    <script src="{{ asset('home/assets/js/mCustomScrollbar.js') }}"></script>

    <!-- custom - jquery include -->
    <script src="{{ asset('home/assets/js/custom.js') }}"></script>

    @yield('script')


</body>

</html>
