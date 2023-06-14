@extends('dash')


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
                    <h3 class="page-title mb-0 p-0">حــسابي</h3>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">_</a></li>
                                <li class="breadcrumb-item active" aria-current="page">تحــديث بيانات الصيدلية</li>
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
            @if (Session::has('data_updated'))
                <p class="alert alert-info">تم تحديث البيانات</p>
            @endif
            <!-- Row -->
            <div class="row">

                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-12 col-xlg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-horizontal form-material mx-2" method="POST"
                                action="{{ route('dash.pharm_info_save') }}">
                                @csrf



                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">اسم الصيدلية</label>
                                        <div class="col-md-12">
                                            <input type="text"  name="name" required
                                            class="form-control ps-0 form-control-line">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">مواعيد الفتح</label>
                                        <div class="col-md-12">
                                            <input type="text"  name="open_at" required
                                            class="form-control ps-0 form-control-line">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">

                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">مواعيد الاغلاق</label>
                                        <div class="col-md-12">
                                            <input type="text"  name="close_at" required
                                            class="form-control ps-0 form-control-line">
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="form-group">
                                    <label class="col-md-12 mb-0">رقم احتياطي للتواصل</label>
                                    <div class="col-md-12">
                                        <input type="text"
                                            name="extra_phone" class="form-control ps-0 form-control-line">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-md-12 mb-0">الصيدلية تعمل او متوقفة تماما</label>
                                    <div class="col-md-12">

                                        <select name="active" id=""  class="form-control" required>

                                            <option value="true">
                                                تعمل
                                            </option>
                                            <option value="false">
                                                متوقفة
                                            </option>
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12 d-flex">
                                        <button type="submit" class="btn btn-success mx-auto mx-md-0 text-white">
                                            تحديث البيانات
                                        </button>
                                    </div>
                                </div>
                            </form>
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
