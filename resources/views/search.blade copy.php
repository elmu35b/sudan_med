@extends('shop')


@section('content')
<div class="site-section">
    {{-- <div class="container">
        <div class="row align-items-stretch section-overlap">
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                <div class="banner-wrap bg-primary h-100">
                    <a href="#" class="h-100">
                        <h5>Free <br> Shipping</h5>
                        <p>
                            Amet sit amet dolor
                            <strong>Lorem, ipsum dolor sit amet consectetur adipisicing.</strong>
                        </p>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                <div class="banner-wrap h-100">
                    <a href="#" class="h-100">
                        <h5>Season <br> Sale 50% Off</h5>
                        <p>
                            Amet sit amet dolor
                            <strong>Lorem, ipsum dolor sit amet consectetur adipisicing.</strong>
                        </p>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                <div class="banner-wrap bg-warning h-100">
                    <a href="#" class="h-100">
                        <h5>Buy <br> A Gift Card</h5>
                        <p>
                            Amet sit amet dolor
                            <strong>Lorem, ipsum dolor sit amet consectetur adipisicing.</strong>
                        </p>
                    </a>
                </div>
            </div>

        </div>
    </div> --}}
    <div class="container">
        <form action="{{ route('search') }}" method="post">
            <a href="#" class="search-close js-search-close"></a>
            @csrf
            {{-- <input type="text" name="search" class="form-control" placeholder="اكتب اسم الدواء , عربي او انجليزي"> --}}
            <label for="city"> اختــار المدينة </label>
            <select name="city" class="form-control" id="">
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
            </select>
        </form>
    </div>
    <div class="container">
        <a href="#" class="search-close js-search-close"></a>
        {{-- <form action="{{ route('search') }}" method="post"> --}}
        @csrf
        <input type="text" name="search" class="form-control"
            placeholder="اكتب اسم الدواء , عربي او انجليزي">
        <input type="number" hidden name="lat" value="27">
        <input type="number" hidden name="lng" value="46">
    </div>
    </form>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="title-section text-center col-12">
                <h2 class="text-uppercase">استعــراض </h2>
            </div>
        </div>

        <div class="row">

            {{-- <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        idshfidhs
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        idshfidhs
                    </div>
                </div>
            </div> --}}

            {{-- <div class="col-6 text-center item mb-4">
                <a href="shop-single.html"> <img src="{{ asset('shop/images/product_01.png') }}"
                        alt="Image"></a>
                <h3 class="text-dark"><a href="shop-single.html">Bioderma</a></h3>
                <p class="price"><del>95.00</del> &mdash; $55.00</p>
            </div>
            <div class="col-6 text-center item mb-4">
                <a href="shop-single.html"> <img src="{{ asset('shop/images/product_01.png') }}"
                        alt="Image"></a>
                <h3 class="text-dark"><a href="shop-single.html">XXX</a></h3>
                <p class="price"><del>95.00</del> &mdash; Free</p>
            </div> --}}


            {{--  --}}
            @foreach ($medicines as $med)
                <div class="col-5 col-lg-4 text-center ">
                    <a href="{{route('medicine.show',['med'=> $med])}}"> <img src="{{ asset('storage/' . $med->img_url) }}"
                            alt="Image"></a>
                    {{-- <h3 class="text-dark"> --}}
                    <a href="{{route('medicine.show',['med'=> $med])}}">{{ $med->name }}</a>
                    {{-- </h3> --}}
                    {{-- <p>{{$med->img_url}}</p> --}}
                    <p class="price">{{ $med->price ?? 'مجان' }}</p>
                    <div class="row">
                    <button class="btn btn-primary col-4"> CAll</button>
                    &nbsp;
                    <button class="btn btn-primary col-4"> CAll</button>

                    </div>
                    {{-- <p class="price">{{ round($med->distance,2)}} كيلومتر</p> --}}
                </div>
                <div class="col-5 col-lg-4 text-center ">
                    <a href="shop-single.html"> <img src="{{ asset('storage/' . $med->img_url) }}"
                            alt="Image"></a>
                    {{-- <h3 class="text-dark"> --}}
                    <a href="shop-single.html">{{ $med->name }}</a>
                    {{-- </h3> --}}
                    {{-- <p>{{$med->img_url}}</p> --}}
                    <p class="price">{{ $med->price ?? 'مجان' }}</p>
                    <div class="row">
                    <button class="btn btn-primary col-4"> CAll</button>
                    &nbsp;
                    <button class="btn btn-primary col-4"> CAll</button>

                    </div>
                    {{-- <p class="price">{{ round($med->distance,2)}} كيلومتر</p> --}}
                </div>
                {{-- <div class="col-6 col-lg-4 text-center ">
                    <a href="shop-single.html"> <img src="{{ asset('storage/' . $med->img_url) }}"
                            alt="Image"></a>
                    <a href="shop-single.html">{{ $med->name }}</a>

                    <p class="price">{{ $med->price ?? 'مجان' }}</p>
                </div> --}}
            @endforeach

        </div>
        {{-- <div class="row mt-5">
            <div class="col-12 text-center">
                <a href="" class="btn btn-primary px-4 py-3">View All Products</a>
            </div>
        </div> --}}
    </div>
</div>
@endsection
