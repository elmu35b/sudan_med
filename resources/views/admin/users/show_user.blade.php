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
                                <li class="breadcrumb-item"><a href="#">بيانات الحساب</a></li>
                                <li class="breadcrumb-item active" aria-current="page">_</li>
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
            <!-- ============================================================== -->
            @if (Session::has('password-success'))
                <p class="alert alert-info">{{ Session::get('password-success') }}</p>
            @endif
            <p class="alert alert-info"> او تغيير كلمة السر في حالة نسيها … {{__($user->name)}} …  يمكن هنا اضافة ادوية تابعة   </p>

            <!-- Row -->
            <div class="row">

                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">الادوية </h4>
                            {{-- <h6 class="card-subtitle">Add class <code>.table</code></h6> --}}
                            <a href="{{ route('admin.medicines_new.user',['user'=> $user]) }}" class="btn btn-primary">اضــافة دواء </a>
                            <div class="table-responsive">
                                <table class="table user-table">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">الكمية</th>
                                            <th class="border-top-0">اسم الدواء</th>
                                            <th class="border-top-0">المدينة</th>
                                            <th class="border-top-0">اسماء البدائل</th>
                                            <th class="border-top-0">متوفر</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($medicines as $med)
                                            <tr onclick="window.location.href = '{{route('admin.medicines_show',['med'=> $med])}}'">
                                                <td>{{$med->quantity}}</td>
                                                <td>{{$med->name}} / {{$med->name_en}}</td>
                                                <td>{{$med->city->name}}</td>
                                                <td>{{$med->tags}}</td>
                                                <td>{{$med->price_type }}</td>
                                                {{-- <td>{{$med->price ?? '0'}}</td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $medicines->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->


                {{-- Pharmacy[Password] Details Update  --}}
                <div class="col-lg-12 col-xlg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-horizontal form-material mx-2" method="POST"
                                action="{{ route('admin.accouns_password_update', ['user' => $user]) }}">
                                @csrf
                                {{-- <small style="color:red">Only Password can be updated</small> --}}

                                <div class="form-group">
                                    <label class="col-md-12 mb-0">الاسم</label>
                                    <div class="col-md-12">
                                        <input type="text" disabled value="{{ $user->name }}" name="name"
                                            class="form-control ps-0 form-control-line">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12 mb-0">تغيير كلمة سر الحساب</label>
                                    <div class="col-md-12">
                                        <input type="password" required name="password"
                                            class="form-control  @error('password') is-invalid @enderror ">
                                            @error('password')
                                                <span style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12 d-flex">
                                        <button type="submit" class="btn btn-success mx-auto mx-md-0 text-white">
                                            تحــديث البيانات
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- End of  Pharmacy[Password] Details Update  --}}



                {{-- Pharmacy[User] Details Update  --}}
                <div class="col-lg-12 col-xlg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-horizontal form-material mx-2" method="POST"
                                action="{{ route('admin.accouns_data_update', ['user' => $user]) }}">
                                @csrf
                                {{-- <small style="color:red">Only Password can be updated</small> --}}

                                <div class="form-group">
                                    <label class="col-md-12 mb-0">الاسم</label>
                                    <div class="col-md-12">
                                        <input type="text" disabled value="{{ $user->name }}" name="name"
                                            class="form-control ps-0 form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 mb-0">رقم الهاتف</label>
                                    <div class="col-md-12">
                                        <input type="number" value="{{ $user->phone }}" required name="phone"
                                            class="form-control ps-0 form-control-line">
                                            @error('phone')
                                            <span style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 mb-0">رقم الواتساب</label>
                                    <div class="col-md-12">
                                        <input type="number" value="{{ $user->wa }}" required name="wa"
                                            class="form-control ps-0 form-control-line">
                                            @error('wa')
                                            <span style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12 d-flex">
                                        <button type="submit" class="btn btn-success mx-auto mx-md-0 text-white">
                                            تحــديث البيانات
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- End of  Pharmacy[User] Details Update  --}}

                <!-- Column -->
            </div>
            <!-- Row -->
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
            <!-- .right-sidebar -->
            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
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
