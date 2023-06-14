<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Medicine;
use App\Models\Pharmacy;
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




    public function pharmacy()
    {
        $pharmas = User::where('type', 'pharmacy')->paginate(25);

        return view('admin.pharmacies.pharmacy', compact('pharmas'));
    }




    public function showPharm(User $pharm)
    {
        $medicines = $pharm->medicines()->paginate(25);
        return view('admin.pharmacies.show_pharm', compact('pharm', 'medicines'));
    }

    public function searchPharm(Request $request)
    {
        $pharmas = User::where('type', 'pharmacy')->where('phone', 'like', '%' . $request->search . '%')->paginate(10);
        return view('admin.pharmacies.pharmacy', compact('pharmas'));
    }

    public function updatePassword(Request $request, User $user)
    {
        $user->update(['password' => Hash::make('password')]);

        return redirect()->back()->with('password_updated', 'success');
    }


    public function pharmInfoUpdate(Request $request, User $pharm)
    {
        $active = false;
        if ($request->active == false or $request->active == 'false') {
            $active = false;
        } else $active = true;

        $ph = Pharmacy::where('user_id',$pharm->id)->first();

        if(!$ph){
           return $this->pharmInfoSave($request,$pharm);
        }else

        $ph->update([
            'name'=> $request->name,
            'opens_at' => $request->open_at,
            'close_at' => $request->close_at,
            'extra_number' => $request->extra_phone,
            'active' => $active,
        ]);
        // return Auth::user()->pharmacy;
        return redirect()->route('admin.pharm.show',['pharm'=> $pharm]);
    }


    function pharmInfoSave(Request $request, User $pharmacy): mixed
    {
        // return $request;
        $request->validate(['name'=> 'required|min:3']);
        $active = false;
        if ($request->active == false or $request->active == 'false') {
            $active = false;
        } else $active = true;
        Pharmacy::create([
            'name' => $request->name,
            'opens_at' => $request->open_at,
            'close_at' => $request->close_at,
            'extra_number' => $request->extra_phone,
            'active' => $active,
            'user_id' => $pharmacy->id
        ]);
        return redirect()->route('admin.pharm.show',['pharm'=> $pharmacy]);

        // return view('dashboard.home');
    }
    /**
     * @method deprecated .. no real need for it
     * @method /App/Http/Controllers/Admin/HomeController::class/byCityResult() does the required
     */

    // public function pharmacyCity(Request $request)
    // {
    //     $pharmas = [];
    //     if ($request->city_id == null) {
    //         $pharmas = [];
    //     } else {
    //         $pharmas = User::where([
    //             'type' => 'pharmacy',
    //             'city_id' => $request->city_id
    //         ])
    //             ->paginate(25);
    //     }
    //     return view('admin.pharmacy_by_city', compact('pharmas'));
    // }
}
