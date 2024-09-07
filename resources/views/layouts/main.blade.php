<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>EcoBottle | Your Eco-Friendly Store</title>

    <!-- Fav Icon -->
    <link rel="icon" href="{{asset('assets/images/favicon.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('assets/css/custom-preloader.css')}}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <!-- Font Awsome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Stylesheets -->
    <link href="{{asset('assets/css/font-awesome-all.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/flaticon.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/owl.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/jquery.fancybox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/jquery-ui.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/jquery.bootstrap-touchspin.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/nice-select.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/color.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <style>
        .item-quantity {
            display: flex;
            align-items: center;
        }

        .quantity-input {
            width: 50px;
            height: 50px;
            margin: 0 5px;
            flex: 1;
        }
    </style>
</head>


<!-- page wrapper -->

<body>

    <div class="boxed_wrapper">
        <div class="loadingio-spinner-spinner-fp2tsfk6ols">
            <div class="custom-preloader"></div>
        </div>
        <!-- main header -->
        <header class="main-header style-four">
            <div class="header-upper">
                <div class="large-container">
                    <div class="upper-inner">
                        <figure class="logo-box"><a href="{{route('welcome')}}"><img src="{{asset('assets/images/logo.png')}}" alt=""></a></figure>
                        <div class="menu-area">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler">
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                            </div>
                            <nav class="main-menu navbar-expand-md navbar-light">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
                                        <li class="{{request()->route()->getName() === 'welcome' ? 'current' : ''}}"><a href="{{route('welcome')}}">Home</a></li>
                                        <li class="{{request()->route()->getName() === 'shop' ? 'current' : ''}}"><a href="{{route('shop')}}">Shop</a></li>
                                        <li class="{{ request()->route()->getName() === 'about' ? 'current' : '' }}">
                                            <a href="{{ route('about') }}">About</a>
                                        </li>
                                        <li class="{{ request()->route()->getName() === 'contact' ? 'current' : '' }}">
                                            <a href="{{ route('contact') }}">Contact</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <ul class="menu-right-content clearfix">
                            <li><a href="{{route('login')}}"><i class="flaticon-user"></i></a></li>
                            <li class="shop-cart"><a href="{{route('cart')}}"><i class="flaticon-shopping-cart-1"></i><span id="item-count">{{count_cart_items()}}</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!--sticky Header-->
            <div class="sticky-header">
                <div class="auto-container">
                    <div class="outer-box clearfix">
                        <div class="logo-box pull-left">
                            <figure class="logo"><a href="{{route('welcome')}}"><img src="{{asset('assets/images/logo.png')}}" alt=""></a></figure>
                        </div>
                        <div class="menu-area pull-right">
                            <nav class="main-menu clearfix">
                                <!--Keep This Empty / Menu will come through Javascript-->
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- main-header end -->

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><i class="fas fa-times"></i></div>
            <nav class="menu-box">
                <div class="nav-logo"><a href="{{route('welcome')}}"><img src="{{asset('assets/images/logo-wh.png')}}" alt="" title=""></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>

            </nav>
        </div><!-- End Mobile Menu -->

        @yield('content')

        <!-- main-footer -->
        <footer class="main-footer light">
            <div class="footer-top">
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-12 col-sm-12 big-column">
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-4 col-sm-12 footer-column">
                                    <div class="footer-widget logo-widget">
                                        <figure class="footer-logo"><a href="{{ route('welcome') }}"><img src="{{ asset('assets/images/logo-wh.png') }}" alt=""></a></figure>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 footer-column">
                                    <div class="footer-widget links-widget">
                                        <div class="widget-title">
                                            <h3>Category</h3>
                                        </div>
                                        <div class="widget-content">
                                            <ul class="links-list clearfix">
                                                <li><a href="{{ route('shop') }}">Original EcoBottles</a></li>
                                                <li><a href="{{ route('shop') }}">BrewFlask Bottles</a></li>
                                                <li><a href="{{ route('shop') }}">GO Bottles</a></li>
                                                <li><a href="{{ route('shop') }}">Spare parts</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 footer-column">
                                    <div class="footer-widget links-widget">
                                        <div class="widget-title">
                                            <h3>Useful Link</h3>
                                        </div>
                                        <div class="widget-content">
                                            <ul class="links-list clearfix">
                                                <li><a href="{{ route('welcome') }}">Eco Shop</a></li>
                                                <li><a href="{{ route('about') }}">Our Mission</a></li>
                                                <li><a href="{{ route('contact') }}">Get in Touch</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 big-column">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-12 footer-column">
                                    <div class="footer-widget contact-widget">
                                        <div class="widget-title">
                                            <h3>Contact</h3>
                                        </div>
                                        <ul class="info-list clearfix">
                                            <li>11000 Belgrade, Serbia</li>
                                            <li><a href="tel:+381 11 123 123">+381 00 000 000</a></li>
                                            <li><a href="mailto:info@example.com">support@ecobottle.com</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 footer-column">
                                    <div class="footer-widget newsletter-widget">
                                        <div class="widget-title">
                                            <h3>Newsletter</h3>
                                        </div>
                                        <div class="widget-content">
                                            <p>Enter your email to receive updates on our latest eco-friendly products and promotions.</p>
                                            <form action="" method="post" class="newsletter-form">
                                                <div class="form-group">
                                                    <input type="email" name="email" placeholder="Enter your email" required="">
                                                    <button type="submit" class="theme-btn-three" disabled>Subscribe</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="auto-container clearfix">
                    <div class="copyright text-center">
                        <p><a href="{{route('welcome')}}">
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> EcoBottle © All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- main-footer end -->


    </div>
    <script>
        $(window).on('load', function() {
            // Hide the preloader
            $('.loadingio-spinner-spinner-fp2tsfk6ols').fadeOut('slow');
        });
    </script>


    <!-- jequery plugins -->
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.js')}}"></script>
    <script src="{{asset('assets/js/wow.js')}}"></script>
    <script src="{{asset('assets/js/validation.js')}}"></script>
    <script src="{{asset('assets/js/jquery.fancybox.js')}}"></script>
    <script src="{{asset('assets/js/TweenMax.min.js')}}"></script>
    <script src="{{asset('assets/js/appear.js')}}"></script>
    <script src="{{asset('assets/js/scrollbar.js')}}"></script>
    <script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('assets/js/isotope.js')}}"></script>
    <script src="{{asset('assets/js/countdown.js')}}"></script>
    <script src="{{asset('assets/js/jquery-ui.js')}}"></script>
    <script src="{{asset('assets/js/jquery.bootstrap-touchspin.js')}}"></script>

    <!-- main-js -->
    <script src="{{asset('assets/js/script.js')}}"></script>
</body>
<!-- End of .page_wrapper -->

</html>