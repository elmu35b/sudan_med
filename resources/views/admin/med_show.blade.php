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
                    <h3 class="page-title mb-0 p-0">تفاصيل الدواء</h3>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">_</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $med->name }}</li>
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
            <!-- Row -->
            <div class="row">

                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-12 col-xlg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-horizontal form-material mx-2">
                                {{-- @csrf --}}
                                {{-- <small style="color:red">Only Password can be updated</small> --}}

                                <div class="form-group">
                                    <label class="col-md-12 mb-0">الاسم / Name</label>
                                    <div class="col-md-12">
                                        <p>{{ $med->name }} / {{ $med->name_en }}</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">وصف الدواء / الجرعة</label>
                                    <div class="col-md-12">
                                        <p>{{ $med->dose }}</p>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 mb-0">السعر</label>
                                    <div class="col-md-12">
                                        <p>{{ $med->price_type == 'free' ? 'مجاني' : 'غير مجاني' }}</p>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 mb-0">الاسم / المدينة</label>
                                    <div class="col-md-12">
                                        <p class="e">{{ $med->city->name }} / {{ $med->user->address }}  / {{ $med->user->hood }}</p>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 mb-0">رقم الهاتف</label>
                                    <div class="col-md-12">
                                        <p class="btn btn-success mx-auto mx-md-0 text-white">{{ $med->user->phone }}</p>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 mb-0">رقم الواتساب</label>
                                    <div class="col-md-12">
                                        <p class="btn btn-success mx-auto mx-md-0 text-white">{{ $med->user->wa }}</p>

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
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
