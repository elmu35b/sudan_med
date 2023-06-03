<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Medicine;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function getCities()
    {
        $cities = City::all();
        return $cities;
    }




    public function index()
    {
        $cities = Cache::get('cities');
        if (!$cities) {
            logger('caching');
            $temp = $this->getCities();
            $caching =   Cache::put('cities', $temp, 120);

            $cities = Cache::get('cities');
        }
        $medicines = Medicine::where('available', true)->paginate(25);
        // return $medicines;
        return view('admin.index', compact('medicines','cities'));
    }

    public function pharmacy()
    {
        $pharmas = User::where('type', 'pharmacy')->paginate(10);

        return view('admin.pharmacy', compact('pharmas'));
    }

    public function showPharm(User $pharm)
    {
        return $pharm;
    }

    public function showUser(User $user)
    {
        return $user;
    }

    public function search(Request $request)
    {
        // return $request;
        $medicines = Medicine::where('name', 'like', '%' . $request->search . '%')
            ->orWhere('name_en', 'like', '%' . $request->search . '%')
            ->orWhere('tags', 'like', '%' . $request->search . '%')
            ->paginate(25);

        //
        // return $meds;
        Session::flash('search', $request->search);
        $cities = Cache::get('cities');
        if (!$cities) {
            logger('caching');
            $temp = $this->getCities();
            $caching =   Cache::put('cities', $temp, 120);

            $cities = Cache::get('cities');
        }
        return view('admin.meds', compact('medicines','cities'))->with('search', $request->search);

        // $meds = User::  where('name','like','%'.$request->search .'%')->paginate(25);
    }



    public function profile()
    {
        return view('admin.profile');
    }

    public function updatePassword(Request $request)
    {
        Auth::user()->update(['password' => Hash::make('password')]);

        return redirect()->back()->with('password_updated', 'success');
    }


    public function updategeo()
    {
        return view('admin.geo');
    }

    public function savegeo(Request $request)
    {
        return $request;
    }
}
