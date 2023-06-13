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
                                <li class="breadcrumb-item active" aria-current="page">الادوية</li>
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
            {{-- @if (!Auth::user()->lat || !Auth::user()->lat)
                <p class="alert alert-info">
                    ضيف بيانات موقعك بالخريطة عشان البحث يكون اسهل للناس _ ||
                    <a href="{{ route('dash.update_geo') }}">
                        اضــغط هنا
                    </a>
                </p>
            @endif --}}
            <!-- Row -->
            <div class="row">
                <!-- Column -->

                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-8 col-xlg-9 col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-horizontal form-material mx-2" method="POST"
                                action="{{ route('admin.medicines_save_with_user') }}"
                                    enctype="multipart/form-data"
                                >
                                @csrf
                                <div class="form-group">
                                    <label class="col-md-12 mb-0">اسم الدواء عربي</label>
                                    <div class="col-md-12">
                                        <input type="text" required name="name"
                                            class="form-control ps-0 form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">اسم الدواء انجليزي</label>
                                    <div class="col-md-12">
                                        <input type="text" name="name_en" class="form-control ps-0 form-control-line"
                                            name="example-email" id="example-email">
                                    </div>
                                </div>

                                {{-- <div class="form-group">
                                    <label for="example-email" class="col-md-12">صورة للدواء</label>
                                    <div class="col-md-12">
                                        <input type="file" accept="image/*" name="img"
                                            class="form-control ps-0 form-control-line" name="example-email"
                                            id="example-email">
                                    </div>
                                </div> --}}

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="col-md-12 mb-0">هل الدواء مجاني ام مدفوع</label>
                                            <div class="col-md-12">
                                                <select name="price_type" class="form-control">
                                                    <option value="free">مجاني</option>
                                                    <option value="not_free">مدفوع</option>
                                                </select>
                                                {{-- <input type="text" name="price"
                                                    class="form-control ps-0 form-control-line"> --}}
                                            </div>
                                            {{-- <small>اذا كان الدواء مجانيا , اترك الحقل فارغا او اكتب 0</small> --}}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="col-md-12 mb-0">
                                                {{-- هل الدواء مجاني ام مدفوع --}}
                                                اختــار التصنيف


                                            </label>

                                            {{-- <label for="city_id">
                                                 اختــار التصنيف
                                                </label> --}}
                                            <select name="category_id" class="form-control" id="" required>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12 mb-0">اسماء الادوية البديلة للدواء</label>
                                    <div class="col-md-12">
                                        <textarea rows="5" class="form-control ps-0 form-control-line" name="tags"></textarea>
                                    </div>
                                </div>


                                <input type="text"  name="user_id" hidden required  value="{{$user->id}}" id="">
                                <input type="text"  name="city_id"  hidden required value="{{$user->city->id}}" id="">


                                <div class="form-group">
                                    <div class="col-sm-12 d-flex">
                                        <button class="btn btn-success mx-auto mx-md-0 text-white">
                                            حــفظ
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
