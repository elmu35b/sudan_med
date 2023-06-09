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
            @if (Session::has('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert" id="alerto">
                    <strong>تم</strong>
                    تم اضافة الدواء
                </div>

            @endif
            <script>
                setTimeout(() => {
                    var alertId = document.getElementById('alerto')
                    alertId.classList.add('modal')
                }, 3000);
            </script>
            <!-- Row -->
            <div class="row">
                <!-- column -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">الادوية التي ادخلتها في النظام</h4>
                            {{-- <h6 class="card-subtitle">Add class <code>.table</code></h6> --}}
                            <a href="{{ route('dash.medicines_new') }}" class="btn btn-primary">اضــافة دواء </a
                                href="{{ route('dash.medicines_new') }}">
                            <div class="table-responsive">
                                <table class="table user-table">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">اسم الدواء</th>
                                            <th class="border-top-0">الاسم الانجليزي</th>
                                            {{-- <th class="border-top-0">السعر</th> --}}
                                            {{-- <th class="border-top-0">متوفر</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($medicines as $med)
                                        <tr onclick="window.location.href = '{{route('dash.medicines.show',['medicine'=> $med])}}'">
                                            <td></td>
                                                <td>{{$med->name}} </td>
                                                <td>{{$med->name_en}}</td>
                                                {{-- <td>{{$med->price_type == 'free'? "مجاني" : 'بيع'}}</td> --}}
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
