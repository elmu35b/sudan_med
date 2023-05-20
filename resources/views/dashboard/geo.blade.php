@extends('dash')


@section('content')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <style>
        #map {
            height: 580px;
        }
    </style>
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                <div class="col-md-6 col-8 align-self-center">
                    <h3 class="page-title mb-0 p-0">حـسابي</h3>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">_</a></li>
                                <li class="breadcrumb-item active" aria-current="page">موقعي</li>
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

                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-12 col-xlg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-horizontal form-material mx-2" method="POST"
                                action="{{ route('dash.save_geo') }}">
                                @csrf
                                <small style="color:red">افتح ال " GPS" </small>
                                <br>
                                <small style="color:red">واسمح للموقع باستخدام موقعك الجغرافي</small>


                                <div id="map"></div>

                                <input type="number" hidden name="lat" id="latitude">
                                <input type="number" hidden name="long" id="longitude">
                            <a onclick="getMyLoc()"  class="btn btn-success " > USE MY LOCATION </a>
                                <div class="form-group mt-2">
                                    <div class="col-sm-12 d-flex">
                                        <button type="submit" class="btn btn-success mx-auto mx-md-0 text-white">
                                            حفــظ بياناتي
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


    <script>
        var map = L.map('map').setView([12.8628, 30.2176], 6);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '| stand With Sudan'
        }).addTo(map);

        // document.getElementsByClassName('leaflet-control-attribution')[0].style.display = 'none';
        map.attributionControl.setPrefix('STOP THE WAR')

        function getMyLoc(){
            map.locate({setView: true, maxZoom: 16});
            onLocationFound;
        }

        function onLocationFound(e) {
            console.log( 'e is ', e);
            var radius = e.accuracy;

            L.marker(e.latlng).addTo(map)
                .bindPopup("You are within " + radius + " meters from this point").openPopup();

            L.circle(e.latlng, radius).addTo(map);
            map.on('locationfound', onLocationFound);
        }

    </script>
@endsection
