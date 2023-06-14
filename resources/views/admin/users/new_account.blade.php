@extends('admin')


@section('content')
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                <div class="col-md-6 col-8 align-self-center">
                    <h3 class="page-title mb-0 p-0">_</h3>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">_</a></li>
                                <li class="breadcrumb-item active" aria-current="page">اضافة حســاب جديد</li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->

            @foreach ($errors as $error)
                {{ $error }}
            @endforeach
            <div class="card">
                <br>
                <div class="card-header">{{ __('تسجـــيل حســاب') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.save_account') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end"> الاسم </label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <small style="color: red">
                                    اسم الشخص وليس الصيدلية
                                </small>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('رقم تلفون') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="phone"
                                    class="form-control @error('phone') is-invalid @enderror" name="phone"
                                    value="{{ old('phone') }}" required autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone"
                                class="col-md-4 col-form-label text-md-end">{{ __('رقم واتسـاب') }}</label>

                            <div class="col-md-6">
                                <input id="wa" type="wa" class="form-control @error('wa') is-invalid @enderror"
                                    name="wa" value="{{ old('wa') }}" required autocomplete="wa">

                                @error('wa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="city" class="col-md-4 col-form-label text-md-end">{{ __('المدينة') }}</label>

                            <div class="col-md-6">
                                {{-- <input id="city" type="city"
                                    class="form-control @error('city') is-invalid @enderror" name="city"
                                    value="{{ old('city') }}" required autocomplete="city"> --}}
                                <select name="city" id="city" class="form-control">

                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="city"
                                class="col-md-4 col-form-label text-md-end">{{ __('  فرد او صيدلية ؟') }}</label>

                            <div class="col-md-6">
                                {{-- <input id="city" type="city"
                                    class="form-control @error('city') is-invalid @enderror" name="city"
                                    value="{{ old('city') }}" required autocomplete="city"> --}}
                                <select name="type" id="account_type" class="form-control"
                                    onchange="accountTypeChange()">

                                    {{-- @foreach ($cities as $city) --}}
                                    {{-- <option value="{{$city->id}}">{{$city->name}}</option> --}}
                                    {{-- @endforeach --}}
                                    <option value="single"> فرد </option>
                                    <option value="pharmacy"> صيدلية </option>
                                </select>

                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('اسم الحي ') }}</label>

                            <div class="col-md-6">
                                <input id="hood" type="text"
                                    class="form-control @error('hood') is-invalid @enderror" name="hood"
                                    value="{{ old('hood') }}" required autocomplete="hood">

                                @error('hood')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                {{-- <small style="color:red">
                                    اكتب اسم الحي
                                </small> --}}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('العنوان ') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text"
                                    class="form-control @error('address') is-invalid @enderror" name="address"
                                    value="{{ old('address') }}" required autocomplete="address">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <small style="color:red">
                                    اكتب العنوان كامل , الحي والشارع
                                </small>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-end">{{ __('كلمة السر') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <hr>
                        <br>


                        {{-- Pharmacy Data --}}

                        <div id="pharmacy_details" style="display: none;">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">اسم الصيدلية</label>
                                        <div class="col-md-12">
                                            <input type="text" name="ph_name" id="ph_name"
                                                class="form-control ps-0 form-control-line">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">مواعيد الفتح</label>
                                        <div class="col-md-12">
                                            <input type="text" name="open_at" id="open_at"
                                                class="form-control ps-0 form-control-line">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">

                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">مواعيد الاغلاق</label>
                                        <div class="col-md-12">
                                            <input type="text" name="close_at" id="close_at"
                                                class="form-control ps-0 form-control-line">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0">رقم احتياطي للتواصل</label>
                                <div class="col-md-12">
                                    <input type="text" name="extra_phone" id="extra_phone"
                                        class="form-control ps-0 form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0">الصيدلية تعمل او متوقفة تماما</label>
                                <div class="col-md-12">

                                    <select name="active" id="active" id="" class="form-control" >

                                        <option value="true">
                                            تعمل
                                        </option>
                                        <option value="false">
                                            متوقفة
                                        </option>
                                    </select>

                                </div>
                            </div>
                        </div>

                        {{-- End Pharmacy Data --}}
                        <script>
                            function accountTypeChange() {
                                var account_type = document.getElementById('account_type');
                                if (account_type.value == 'pharmacy') {
                                    document.getElementById('pharmacy_details').style.display = 'block';
                                    // document.getElementById('pharmacy_details').setAttribute("required", "false");
                                    // document.getElementById("ph_name").setAttribute('required', true);
                                    document.getElementById("ph_name").required = "true";
                                    // document.getElementById("open_at").setAttribute('required', true);
                                    document.getElementById("open_at").required = "true";
                                    // document.getElementById("close_at").setAttribute('required', true);
                                    document.getElementById("close_at").required = "true";
                                    // document.getElementById("extra_phone").setAttribute('required', true);
                                    document.getElementById("extra_phone").required = "true";
                                    // document.getElementById("active").setAttribute('required', true);
                                    document.getElementById("active").required = "true";
                                } else {
                                    document.getElementById('pharmacy_details').style.display = 'none';
                                    // document.getElementById("ph_name").setAttribute('required', false);
                                    document.getElementById("ph_name").required = "false";
                                    // document.getElementById("open_at").setAttribute('required', false);
                                    document.getElementById("open_at").required = "false";
                                    // document.getElementById("close_at").setAttribute('required', false);
                                    document.getElementById("close_at").required = "false";
                                    // document.getElementById("extra_phone").setAttribute('required', false);
                                    document.getElementById("extra_phone").required = "false";
                                    // document.getElementById("active").setAttribute('required', false);
                                    document.getElementById("active").required = "false";

                                }
                                console.log(account_type.value);
                            }
                        </script>



                        {{-- <div class="row mb-3">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-end">{{ __('اكتب كلمة السر تاني') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div> --}}

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('تسجـــيل') }}
                                </button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
@endsection
