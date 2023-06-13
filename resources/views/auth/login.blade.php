<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="">
    <meta name=""
        content="">
    <meta name="robots" content="noindex,nofollow">
    <title> Sudan Med</title>
    {{-- <link rel="canonical" href="https://www.wrappixel.com/templates/materialpro-lite/" /> --}}
    <!-- Favicon icon -->
    {{-- <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png"> --}}


    <!--This page css - Morris CSS -->

    {{-- <link href="{{ asset('assets/assets/plugins/c3-master/c3.min.css') }}" rel="stylesheet"> --}}
    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/style.min.css') }}" rel="stylesheet">
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    {{-- <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div> --}}
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    {{-- <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full"> --}}
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    {{-- @yield('content') --}}

    <div class="page-wrapper py-5">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">

                        <br>
                        <div class="card-header">{{ __('دخــول') }}</div>
                        {{-- <div class="card-header">{{ __('Login') }}</div> --}}

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="phone"
                                        class="col-md-4 col-form-label text-md-end">{{ __('رقم الهاتف') }}</label>

                                    <div class="col-md-6">
                                        <input id="phone" type="phone"
                                            class="form-control @error('phone') is-invalid @enderror" name="phone"
                                            value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-end">{{ __('كلمة السر') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('دخــول') }}
                                        </button>

                                        {{-- @if (Route::has('password.request')) --}}
                                        {{-- <a class="btn btn-link" href="{{ route('password.request') }}"> --}}
                                        <a class="btn btn-link" href="https://wa.me/+24991923299">
                                            {{ __('نسيــت كلمة السر ؟؟') }}
                                        </a>
                                        {{-- @endif --}}
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-8 offset-md-4">
                                        {{-- <button type="submit" class="btn btn-primary">
                                            {{ __('دخــول') }}
                                        </button> --}}

                                        {{-- @if (Route::has('password.request')) --}}
                                        {{-- <a class="btn btn-link" href="{{ route('password.request') }}"> --}}
                                        <a class="btn btn-link" href="{{route('register')}}">
                                            {{ __('لو ما عندك حساب ,, اعمل تسجيل') }}
                                        </a>
                                        {{-- @endif --}}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
    {{-- </div> --}}
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    {{-- <script src="{{ asset('assets/assets/plugins/jquery/dist/jquery.min.js') }}"></script> --}}
    <!-- Bootstrap tether Core JavaScript -->
    {{-- <script src="{{ asset('assets/assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/js/app-style-switcher.js') }}"></script> --}}
    {{-- <!--Wave Effects --> --}}
    {{-- <script src="{{ asset('assets/js/waves.js') }}"></script> --}}
    <!--Menu sidebar -->
    {{-- <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script> --}}
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- chartist chart -->
    {{-- <script src="../assets/plugins/chartist-js/dist/chartist.min.js"></script> --}}
    {{-- <script src="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script> --}}
    <!--c3 JavaScript -->
    {{-- <script src="../assets/plugins/d3/d3.min.js"></script> --}}
    {{-- <script src="../assets/plugins/c3-master/c3.min.js"></script> --}}
    {{-- <!--Custom JavaScript --> --}}
    {{-- <script src="{{ asset('assets/js/pages/dashboards/dashboard1.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/js/custom.js') }}"></script> --}}
</body>

</html>
