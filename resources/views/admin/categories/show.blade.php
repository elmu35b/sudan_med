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
                                <li class="breadcrumb-item active" aria-current="page">التصنيفات</li>
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

            <!-- Row -->
            <div class="row">
                <!-- column -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">التصنيفات </h4>
                            {{-- <h6 class="card-subtitle">Add class <code>.table</code></h6> --}}
                            {{-- <a href="{{ route('admin.categoryicines_new') }}" class="btn btn-primary">اضــافة دواء </a
                                href="{{ route('dash.medicines_new') }}"> --}}
                            <div class="table-responsive">
                                <table class="table user-table">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">الاسم</th>
                                            <th class="border-top-0">عدد الادوية</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $category->name }}</td>

                                            <td>
                                                {{ $category->medicines->count() }}
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.categories_delete',['category'=> $category]) }}" class="btn btn-danger" onclick="confirm('حذف','الغاء')">
                                                    حذف
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- Meds Of Category --}}


                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">الادوية </h4>
                            <div class="table-responsive">
                                <table class="table user-table">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">الكمية</th>
                                            <th class="border-top-0">اسم الدواء</th>
                                            <th class="border-top-0">المدينة</th>
                                            <th class="border-top-0">اسماء البدائل</th>
                                            <th class="border-top-0">مجاني </th>
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
                                                <td>{{ $med->price_type == 'free' ? 'مجاني' : 'عير مجاني' }}</td>
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
