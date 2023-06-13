<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::paginate(20);
        return view('admin.cities.cities',compact('cities'));
    }

    public function newCity()
    {
        return view('admin.cities.city_new');
    }

    public function saveCity(Request $request)
    {
        $city = new City(['name'=> $request->name]);
        $city->save();

        return redirect()->route('admin.cities')->with('ok',);
    }
}
