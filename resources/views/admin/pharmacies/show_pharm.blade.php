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
                                <li class="breadcrumb-item"><a href="#">بيانات الصيدلية</a></li>
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
            <p class="alert alert-info"> او تغيير كلمة السر في حالة نسيها … {{ $pharm->name }} … يمكن هنا اضافة ادوية تابعة
                للصييدلية </p>

            <!-- Row -->
            <div class="row">

                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">الادوية </h4>
                            {{-- <h6 class="card-subtitle">Add class <code>.table</code></h6> --}}
                            <a href="{{ route('admin.medicines_new.pharm', ['pharm' => $pharm]) }}"
                                class="btn btn-primary">اضــافة دواء </a>
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
                                            <tr
                                                onclick="window.location.href = '{{ route('admin.medicines_show', ['med' => $med]) }}'">
                                                <td>{{ $med->quantity }}</td>
                                                <td>{{ $med->name }} / {{ $med->name_en }}</td>
                                                <td>{{ $med->city->name }}</td>
                                                <td>{{ $med->tags }}</td>
                                                <td>{{ $med->price_type }}</td>
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
                <div class="col-lg-12 col-xlg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-horizontal form-material mx-2" method="POST"
                                action="{{ route('admin.update_password') }}">
                                @csrf
                                {{-- <small style="color:red">Only Password can be updated</small> --}}

                                <div class="form-group">
                                    <label class="col-md-12 mb-0">الاسم</label>
                                    <div class="col-md-12">
                                        <input type="text" disabled value="{{ $pharm->name }}" name="name"
                                            class="form-control ps-0 form-control-line">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12 mb-0">تغيير كلمة سر الحساب</label>
                                    <div class="col-md-12">
                                        <input type="password" required name="password"
                                            class="form-control  @error('password') is-invalid @enderror ">
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 mb-0">رقم الهاتف</label>
                                    <div class="col-md-12">
                                        <input type="number" value="{{ $pharm->phone }}" required name="phone"
                                            class="form-control ps-0 form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 mb-0">رقم الواتساب</label>
                                    <div class="col-md-12">
                                        <input type="number" value="{{ $pharm->wa }}" required name="phone"
                                            class="form-control ps-0 form-control-line">
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
                <div class="col-lg-12 col-xlg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-horizontal form-material mx-2" method="POST"
                                action="{{ route('admin.pharm_info_update',['pharm'=> $pharm]) }}">
                                @csrf



                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="col-md-12 mb-0">اسم الصيدلية</label>
                                            <div class="col-md-12">
                                                <input type="text" name="name" required
                                                    value="{{ $pharm->pharmacy->name ?? '' }}"
                                                    class="form-control ps-0 form-control-line">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="col-md-12 mb-0">مواعيد الفتح</label>
                                            <div class="col-md-12">
                                                <input type="text" name="open_at" required
                                                    value="{{ $pharm->pharmacy->opens_at ?? '' }}"
                                                    class="form-control ps-0 form-control-line">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">

                                        <div class="form-group">
                                            <label class="col-md-12 mb-0">مواعيد الاغلاق</label>
                                            <div class="col-md-12">
                                                <input type="text" name="close_at" required
                                                    value="{{ $pharm->pharmacy->close_at ?? '' }}"
                                                    class="form-control ps-0 form-control-line">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 mb-0">رقم احتياطي للتواصل</label>
                                    <div class="col-md-12">
                                        <input type="text" name="extra_phone"
                                            class="form-control ps-0 form-control-line"
                                            value="{{ $pharm->pharmacy->extra_phone ?? '' }}">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-md-12 mb-0">الصيدلية تعمل او متوقفة تماما</label>
                                    <div class="col-md-12">

                                        <select name="active" id="" class="form-control" required>

                                            @if ($pharm->pharmacy)
                                                <option value="{{ $pharm->pharmacy->active ?? '' }}" > {{$pharm->pharmacy->active == true ? "تعمل" : 'متوقفة تماما'}} </option>
                                            @else
                                            @endif
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
