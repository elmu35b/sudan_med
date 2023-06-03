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

class PharmacyController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function getCities()
    {
        $cities = City::all();
        return $cities;
    }





    public function pharmacy()
    {
        $pharmas = User::where('type', 'pharmacy')->paginate(10);

        return view('admin.pharmacy', compact('pharmas'));
    }


    public function showPharm(User $pharm)
    {
       $medicines = $pharm->medicines()->paginate(25);
        return view('admin.show_pharm',compact('pharm','medicines'));
    }

    public function searchPharm(Request $request)
    {
        $pharmas = User::where('type','pharmacy')->where('phone','like','%'.$request->search .'%')->paginate(10);
        return view('admin.pharmacy',compact('pharmas'));
    }

    public function updatePassword(Request $request, User $user)
    {
        $user->update(['password' => Hash::make('password')]);

        return redirect()->back()->with('password_updated', 'success');
    }


}
