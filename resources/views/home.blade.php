<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="عافية بتسهل عليك تفتيش الادوية وتعرف الدواء متوفر وين من دون ما تتعب تلف على الصيدليات">
    <meta name="keywords" content="عافية , دواء ,أدوية">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>عافية للدواء</title>

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
{{-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-9XQ8XSDXCH"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-9XQ8XSDXCH');
</script> --}}



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
                 <div class="col-lg-3">
                    <div class="header__cart">

                        <div>
                            <h3>
                                عـــافية للدواء
                            </h3>
                        </div>
                    </div>
                </div>
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

    {{-- By Category Search --}}

    <hr class="mt-2 mb-3">


    <section class="">
        <div class="container">
            <center class="mb-2">
                <h6 >
                    <b>
                        أو أختــار تصنيف الدواء المرغوب
                    </b>
                </h6>
            </center>
            <div class="row">
                <div class="container">
                    <form action="{{ route('search_category') }}" method="post">
                        @csrf


                        <label for="city_id"> اختــار التصنيف </label>

                        <select name="category_id" class="form-control" id="" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                        <label for="city_id"> اختــار المدينة </label>

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

    {{-- By Category Search End --}}



    {{-- Search Pharmacy Only --}}
    <section class="">
        <div class="container">
            <center class="mb-2">
                <h6 >
                    <b>
                        أو ابحث عن صيدليات فقط
                    </b>
                </h6>
            </center>
            <div class="row">
                <div class="container">
                    <form action="{{ route('search_pharmacy') }}" method="post">
                        @csrf

                        <label for="city_id"> اختــار المدينة </label>

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

    {{-- Search Pharmacy Only End --}}

    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">

        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">

            <div class="row featured__filter">
                <!--  -->
                {{-- @foreach ($medicines as $med)
                    <div class="col-6">
                       <a href="{{route('medicine.show',['med'=> $med])}}">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg"
                                onclick="window.location.href = 'route('medicine.show',['med'=> $med])'"
                                data-setbg="{{ asset('storage/' . $med->img_url) }}">

                            </div>
                            <div class="featured__item__text">
                                <h6><a href="#">{{ $med->name }}</a></h6>
                                <h5>{{ $med->price_type }}</h5>
                            </div>
                        </div>
                    </a>
                    </div>
                @endforeach --}}
                <!--  -->

            </div>
        </div>
    </section>
    <!-- Featured Section End -->




    <!-- Footer Section Begin -->

    <footer class="site-footer">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
                    <h3 class="footer-heading mb-4">روابط سريعة</h3>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('register') }}">عندك ادوية ؟</a></li>
                        <li><a href="{{ route('login') }}">تسجيــل دخول</a></li>
                        {{-- <li><a href="#">Diet &amp; Nutrition</a></li>
                        <li><a href="#">Tea &amp; Coffee</a></li> --}}
                    </ul>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="block-5 mb-5">
                        <h3 class="footer-heading mb-4">تواصل معنا</h3>
                        <ul class="list-unstyled">

                            <li class="phone"><a href="https://wa.me/+249919232991">+249919232991</a></li>
                            <li class="email"><a href="email:musabgaili@gmail.com"> musabgaili@gmail.com</a></li>
                        </ul>
                    </div>


                </div>
            </div>
        </div>
    </footer>

    <!-- Footer Section End -->

    <!-- Js Plugins -->

    <script>
        document.addEventListener('contextmenu', (e) => {
                          e.preventDefault();
                      });
                      document.onkeydown = function(e) {
                          if (event.keyCode == 123) {
                              return false;
                          }
                          if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
                              return false;
                          }
                          if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
                              return false;
                          }
                          if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
                              return false;
                          }
                          if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
                              return false;
                          }
                      }
</script>
    {{-- <script src="{{ asset('ns/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('ns/js/bootstrap.min.js') }}"></script>
    <!-- <script src="js/jquery.nice-select.min.js"></script> -->
    <script src="{{ asset('ns/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('ns/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('ns/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('ns/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('ns/js/main.js') }}"></script> --}}



</body>

</html>
