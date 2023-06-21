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
                <div class="col-lg-8 col-xlg-9 col-md-7">
                    <div class="card">
                        <div class="card-header">
                            <h6>
                                توفر الدواء لديك
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="col-6">

                                <div class="form-group">
                                    <label class="col-md-12 mb-0">هل الدواء متوفر ام لا ؟</label>
                                    <div class="col-md-12">
                                       @if ($medicine->available)
                                       <form action="{{route('dash.medicines_update_not_available',['medicine'=>$medicine])}}" method="POST" class="mt-1 mb-1">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-primary">
                                            تعديل الحالة الى عير متوفر
                                        </button>
                                    </form>

                                       @else
                                       <form action="{{route('dash.medicines_update_available',['medicine'=>$medicine])}}" method="POST" class="mt-1 mb-1">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-primary">
                                            تعديل الحالة الى  متوفر
                                        </button>
                                    </form>
                                       @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-8 col-xlg-9 col-md-7">

                    @if (Session::has('updated'))
                        <div class="alert alert-primary" role="alert">
                            تم تحديث بيانات المنتج
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <form class="form-horizontal form-material mx-2" method="POST"
                                action="{{ route('dash.medicines_update', ['medicine' => $medicine]) }}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-6">

                                        <div class="form-group">
                                            <label class="col-md-12 mb-0">اسم الدواء عربي</label>
                                            <div class="col-md-12">
                                                <input type="text" required name="name" value="{{ $medicine->name }}"
                                                    class="form-control ps-0 form-control-line">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">

                                        <div class="form-group">
                                            <label for="example-email" class="col-md-12 mb-0">اسم الدواء انجليزي</label>
                                            <div class="col-md-12">
                                                <input type="text" name="name_en"
                                                    class="form-control ps-0 form-control-line"
                                                    value="{{ $medicine->name_en }}" name="example-email"
                                                    id="example-email">
                                            </div>
                                        </div>
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
                                    {{-- <div class="col-6">
                                        <div class="form-group">
                                            <label class="col-md-12 mb-0">السعر</label>
                                            <div class="col-md-12">
                                                <input type="text" name="price"
                                                    class="form-control ps-0 form-control-line">
                                            </div>
                                            <small>اذا كان الدواء مجانيا , اترك الحقل فارغا او اكتب 0</small>
                                        </div>
                                    </div> --}}
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="col-md-12 mb-0">هل الدواء مجاني ام مدفوع</label>
                                            <div class="col-md-12">
                                                <select name="price_type" class="form-control">
                                                    <option value="{{ $medicine->price_type }}" selected>
                                                        {{ $medicine->price_type == 'free' ? 'مجاني' : 'مدفوع' }}
                                                    </option>
                                                    <option value="free">مجاني</option>
                                                    <option value="not_free">مدفوع</option>
                                                </select>
                                                {{-- <input type="text" name="price"
                                                    class="form-control ps-0 form-control-line"> --}}
                                            </div>
                                            {{-- <small>اذا كان الدواء مجانيا , اترك الحقل فارغا او اكتب 0</small> --}}
                                        </div>
                                    </div>
                                    {{-- <div class="col-6">
                                        <div class="form-group">
                                            <label class="col-md-12 mb-0">حجم الجرعة او الوصف</label>
                                            <div class="col-md-12">
                                                <input type="text" name="dose"
                                                    class="form-control ps-0 form-control-line">
                                            </div>
                                            <small>يرجى كتابة وصف او حجم الجرعة </small>
                                        </div>
                                    </div> --}}
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="city_id" class="col-md-12 mb-0"> اختــار التصنيف </label>
                                            <select name="category_id" class="form-control" id="" required>
                                                <option value="{{ $medicine->category_id }}" selected>
                                                    {{ $medicine->category->name ?? '' }}
                                                </option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                    <label class="col-md-12 mb-0">الكمية المتوفرة</label>
                                    <div class="col-md-12">
                                        <input type="text" name="quantity" class="form-control ps-0 form-control-line">
                                    </div>
                                </div> --}}


                                {{--
                                <div class="form-group">
                                    <label class="col-md-12 mb-0">تاريخ الانتهاء </label>
                                    <div class="col-md-12">
                                        <input type="text" name="ex_date" class="form-control ps-0 form-control-line">
                                    </div>
                                </div> --}}
                                <div class="form-group">
                                    <label class="col-md-12 mb-0">اسماء الادوية البديلة للدواء</label>
                                    <div class="col-md-12">
                                        <textarea rows="5" class="form-control ps-0 form-control-line" name="tags">{{ $medicine->tags }}</textarea>
                                    </div>
                                </div>


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


                    {{-- Alternative Medicines And Similar in other Pharmacies inside the same City --}}

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">الادوية المشابهة</h4>

                            <div class="table-responsive">
                                <table class="table user-table">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">اسم الدواء</th>
                                            <th class="border-top-0">الاسم الانجليزي</th>
                                            {{-- <th class="border-top-0">اسماء البدائل</th> --}}
                                            {{-- <th class="border-top-0">متوفر</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alter_medicines as $alter_med)
                                            @if ($alter_med->id == $medicine->id)
                                            @else
                                                <tr
                                                    onclick="window.location.href = '{{ route('dash.medicines.show', ['medicine' => $alter_med]) }}'">
                                                    <td></td>
                                                    <td>{{ $alter_med->name }}</td>
                                                    <td>{{ $alter_med->name_en }}</td>
                                                    <td></td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $alter_medicines->links('pagination::bootstrap-4') }}
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
