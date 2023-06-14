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
                {{-- Medicine Details --}}


                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">تفاصيل الدواء</h4>
                            {{-- <h6 class="card-subtitle">Add class <code>.table</code></h6> --}}
                            <div class="table-responsive">
                                <table class="table user-table">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">اسم الصيدلية </th>
                                            <th class="border-top-0">اسم الدواء</th>
                                            <th class="border-top-0">المدينة</th>
                                            <th class="border-top-0">اسماء البدائل</th>
                                            <th class="border-top-0">مجاني ؟</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($alters as $med) --}}
                                        <tr>
                                            <td>{{ $med->user->name }}</td>
                                            <td>{{ $med->name }} / {{ $med->name_en }}</td>
                                            <td>{{ $med->city->name }}</td>
                                            <td>{{ $med->tags }}</td>

                                            <td>{{ $med->price_type == 'free' ? 'مجاني' : 'بيع' }}</td>
                                            {{-- <td>{{$med->price ?? '0'}}</td> --}}
                                        </tr>
                                        {{-- @endforeach --}}
                                    </tbody>
                                </table>

                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        {{-- <div class="form-group"> --}}
                                        <div>
                                            <label class="col-md-12 mb-0">رقم الهاتف</label>
                                            <div class="col-md-12">
                                                <p class="btn btn-success mx-auto mx-md-0 text-white">
                                                    {{ $med->user->phone }}</p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        {{-- <div class="form-group"> --}}
                                        <div>
                                            <label class="col-md-12 mb-0">رقم الواتساب</label>
                                            <div class="col-md-12">
                                                <p class="btn btn-success mx-auto mx-md-0 text-white">{{ $med->user->wa }}
                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- {{ $alters->links('pagination::bootstrap-4') }} --}}
                            </div>
                        </div>
                    </div>
                </div>


                {{-- Medicine Alternatives --}}

                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">الادوية البديلة </h4>
                            <div class="table-responsive">
                                <table class="table user-table">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">الكمية</th>
                                            <th class="border-top-0">اسم الدواء</th>
                                            <th class="border-top-0">المدينة</th>
                                            <th class="border-top-0">اسماء البدائل</th>
                                            <th class="border-top-0">مجاني</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alters as $alter_med)
                                            @if ($alter_med->id == $med->id)
                                            @else
                                                <tr
                                                    onclick="window.location.href = '{{ route('admin.medicines_show', ['med' => $alter_med]) }}'">
                                                    <td>{{ $alter_med->quantity }}</td>
                                                    <td>{{ $alter_med->name }} / {{ $alter_med->name_en }}</td>
                                                    <td>{{ $alter_med->city->name }}</td>
                                                    <td>{{ $alter_med->tags }}</td>
                                                    <td>{{ $med->price_type == 'free' ? 'مجاني' : 'بيع' }}</td>

                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $alters->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
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
