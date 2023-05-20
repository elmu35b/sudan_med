<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pharma &mdash; Colorlib Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('shop/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('shop/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('shop/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('shop/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('shop/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('shop/css/owl.theme.default.min.css') }}">


    <link rel="stylesheet" href="{{ asset('shop/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('shop/css/style.css') }}">

</head>

<body>

    <div class="site-wrap">


        <div class="site-navbar py-2">

            <div class="search-wrap">
                <div class="container">
                    <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
                    <form action="#" method="post">
                        <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
                    </form>
                </div>
            </div>

            <div class="container">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="logo">
                        <div class="site-logo">
                            <a href="index.html" class="js-logo-clone">Sudan Med</a>
                        </div>
                    </div>
                    <div class="main-nav d-none d-lg-block">
                        <nav class="site-navigation text-right text-md-center" role="navigation">
                            <ul class="site-menu js-clone-nav d-none d-lg-block">
                                <li class="active"><a href="{{ route('home') }}">الرئيسية</a></li>
                                {{-- <li><a href="shop.html">Store</a></li> --}}
                                <li><a href="{{ route('register') }}">عندك أدوية ؟</a></li>
                                <li><a href="contact.html"></a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="icons">

                        <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span
                                class="icon-menu"></span></a>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="site-blocks-cover" style="background-image: url('{{ asset('shop/images/hero_1.jpg') }}');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 mx-auto order-lg-2 align-self-center">
                        <div class="site-block-cover-content text-center">
                            <h2 class="sub-title">Effective Medicine, New Medicine Everyday</h2>
                            <h1>Welcome To Pharma</h1>
                            <p>
                                <a href="#" class="btn btn-primary px-5 py-3">Shop Now</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        @yield('content')


        {{-- <div class="site-section bg-light">
            <div class="container">
                <div class="row">
                    <div class="title-section text-center col-12">
                        <h2 class="text-uppercase">New Products</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 block-3 products-wrap">
                        <div class="nonloop-block-3 owl-carousel">

                            <div class="text-center item mb-4">
                                <a href="shop-single.html"> <img src="images/product_03.png" alt="Image"></a>
                                <h3 class="text-dark"><a href="shop-single.html">Umcka Cold Care</a></h3>
                                <p class="price">$120.00</p>
                            </div>

                            <div class="text-center item mb-4">
                                <a href="shop-single.html"> <img src="images/product_01.png" alt="Image"></a>
                                <h3 class="text-dark"><a href="shop-single.html">Umcka Cold Care</a></h3>
                                <p class="price">$120.00</p>
                            </div>

                            <div class="text-center item mb-4">
                                <a href="shop-single.html"> <img src="images/product_02.png" alt="Image"></a>
                                <h3 class="text-dark"><a href="shop-single.html">Umcka Cold Care</a></h3>
                                <p class="price">$120.00</p>
                            </div>

                            <div class="text-center item mb-4">
                                <a href="shop-single.html"> <img src="images/product_04.png" alt="Image"></a>
                                <h3 class="text-dark"><a href="shop-single.html">Umcka Cold Care</a></h3>
                                <p class="price">$120.00</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div> --}}






        <footer class="site-footer">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
                        <h3 class="footer-heading mb-4">Quick Links</h3>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('register') }}">عندك ادوية ؟</a></li>
                            <li><a href="{{ route('login') }}">تسجيــل دخول</a></li>
                            {{-- <li><a href="#">Diet &amp; Nutrition</a></li>
                            <li><a href="#">Tea &amp; Coffee</a></li> --}}
                        </ul>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="block-5 mb-5">
                            <h3 class="footer-heading mb-4">Contact Info</h3>
                            <ul class="list-unstyled">

                                <li class="phone"><a href="https://wa.me/+249919232991">+249919232991</a></li>
                                <li class="email"><a href="email:musabgaili@gmail.com"> musabgaili@gmail.com</a></li>
                            </ul>
                        </div>


                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="{{ asset('shop/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('shop/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('shop/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('shop/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('shop/js/aos.js') }}"></script>

    <script src="{{ asset('shop/js/main.js') }}"></script>

</body>

</html>
