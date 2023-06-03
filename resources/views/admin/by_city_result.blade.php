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
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>تم</strong>
                    تم اضافة الدواء

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <!-- Row -->
            <div class="row">
                <center>
                    <div class="col-8">
                        <div class="container">
                            <form action="{{ route('admin.by_city') }}" method="post">
                                @csrf
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
                            <h4 class="card-title">الصيدليات</h4>
                            {{-- <h6 class="card-subtitle">Add class <code>.table</code></h6> --}}
                            {{-- <a href="" class="btn btn-primary">اضافة صيدلية</a> --}}
                            <div class="table-responsive">
                                <table class="table user-table">
                                    <thead>
                                        <tr>
                                            {{-- <th class="border-top-0">#</th> --}}
                                            <th class="border-top-0">اسم </th>
                                            <th class="border-top-0"> </th>
                                            <th class="border-top-0">العنوان</th>
                                            <th class="border-top-0">المدينة</th>
                                            <th class="border-top-0">رقم الهاتف</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($accounts as $account)
                                            <tr
                                                @if ($account->type == 'pharmacy') onclick="window.location.href = '{{ route('admin.pharm.show', ['pharm' => $account]) }}'"
                                            @else
                                            onclick="window.location.href = '{{ route('admin.users.show', ['user' => $account]) }}'" @endif>
                                                <td>{{ $account->name }}</td>
                                                <td>{{ $account->type == 'pharmacy' ? 'صيدلية' : "فرد" }}</td>
                                                <td>{{ $account->address }}</td>
                                                <td>{{ $account->city->name }}</td>
                                                <td>{{ $account->phone }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $accounts->links('pagination::bootstrap-4') }}
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
