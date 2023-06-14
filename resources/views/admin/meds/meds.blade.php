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
            @if (Session::has('success'))

                <div class="alert alert-warning alert-dismissible fade show" id="alerto" role="alert">
                    {{-- {{Session::get('search')}} --}}
                    تم اضافة الدواء بنجاح
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
                <center>
                    <div class="col-12">
                        <div class="container">
                            <form action="{{ route('admin.search') }}" method="post">
                                @csrf
                                <input type="text" name="search" class="form-control"
                                    placeholder="اكتب اسم الدواء , عربي او انجليزي">
                                <label for="city_id"> اختــار المدينة </label>
                                <br>
                                <select name="city_id" class="form-control" id="">
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                                <!-- <div class="row"> -->
                                <button class="form-control btn btn-primary mt-2 mb-1 d-flex justify-content-center"
                                    type="submit">
                                    ابحـــث
                                </button>
                                <!-- </div> -->
                            </form>
                        </div>
                    </div>
                </center>
                <!-- column -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">الادوية </h4>
                            {{-- <h6 class="card-subtitle">Add class <code>.table</code></h6> --}}
                            {{-- <a href="{{ route('admin.medicines_new') }}" class="btn btn-primary">اضــافة دواء </a> --}}
                            <div class="table-responsive">
                                <table class="table user-table">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">الكمية</th>
                                            <th class="border-top-0">اسم الدواء</th>
                                            <th class="border-top-0">المدينة</th>
                                            <th class="border-top-0">اسماء البدائل</th>
                                            <th class="border-top-0">محاني</th>
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
                                                <td>{{ $med->price_type == 'free'?  "مجاني" : "بيع" }}</td>
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
