<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Med</title>

    <!-- Google Font -->
    {{-- <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet"> --}}

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('ns/css/bootstrap.min.css') }}" type="text/css">
    {{-- <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css"> --}}
    {{-- <link rel="stylesheet" href="css/elegant-icons.css" type="text/css"> --}}
    <!-- <link rel="stylesheet" href="css/nice-select.css" type="text/css"> -->
    {{-- <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css"> --}}
    {{-- <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css"> --}}
    {{-- <link rel="stylesheet" href="css/slicknav.min.css" type="text/css"> --}}
    <link rel="stylesheet" href="{{ asset('ns/css/style.css') }}" type="text/css">
</head>


<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-9XQ8XSDXCH"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-9XQ8XSDXCH');
</script>


<body>
    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->


    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">

        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <!-- <a href="/"></a> -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{ route('home') }}">الرئيسية</a></li>
                            <li><a href="{{ route('register') }}">عنــدك دواء ؟</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div>
                    </div>
                </div> -->
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="">
        <div class="container">
            <div class="row">
                <div class="container">
                    <form action="{{ route('search') }}" method="post">
                        @csrf
                        <input type="text" name="search" class="form-control"
                            placeholder="اكتب اسم الدواء , عربي او انجليزي">
                        <label for="city_id"> اختــار المدينة </label>
                        <br>
                        <select name="city_id" class="form-control" id="">
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                        <!-- <div class="row"> -->
                        <button class="form-control btn btn-primary mt-2 mb-1 d-flex justify-content-center"
                            type="submit">
                            ابحـــث
                        </button>
                        <!-- </div> -->
                    </form>
                </div>

            </div>

        </div>
        </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <section class="featured spad">
        <div class="container">
            <div class="d-flex justify-content-center">
                <h3>الصيدليات</h3>
            </div>
            <hr>
            <div class="row ">
                <!--  -->
                @foreach ($pharms as $pharm)
                    <div class="col-6 col-lg-4 col-md-4">
                        <div class="card mb-1 mt-1 ">
                            <div class="card-body ">
                                <div class="card-title">
                                    {{ $pharm->name }}
                                </div>
                                <p>{{ $pharm->city->name }}</p>
                                <p>{{ $pharm->address }}</p>
                                <p>{{ $pharm->hood }}</p>
                                <a href="tel:{{ $pharm->phone }}" class="btn btn-success"> اتصال
                                    {{ $pharm->phone }}</a>
                                <br>
                                <a href="tel:{{ $pharm->wa }}" class="btn btn-success"> واتساب
                                    {{ $pharm->wa }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!--  -->
            </div>
            <div class="d-flex justify-content-center">
                {{ $pharms->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </section>
    <!-- Featured Section End -->




    <!-- Footer Section Begin -->

    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ asset('ns/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('ns/js/bootstrap.min.js') }}"></script>
    <!-- <script src="js/jquery.nice-select.min.js"></script> -->
    <script src="{{ asset('ns/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('ns/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('ns/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('ns/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('ns/js/main.js') }}"></script>



</body>

</html>
