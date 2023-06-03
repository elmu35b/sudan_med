<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function users()
    {
        $users = User::paginate(25);
        return view('admin.users', compact('users'));
    }

    public function showUser(User $user)
    {
        $medicines = $user->medicines()->paginate(25);

        return view('admin.show_user', compact('user', 'medicines'));
    }

    public function updateUser(Request $request, User $user)
    {
        $user->update(['password' => Hash::make('password')]);

        return redirect()->back()->with('password_updated', 'success');
    }



    public function searchUser(Request $request)
    {
        $users = User::where('type', 'single')->where('phone', 'like', '%' . $request->search . '%')->paginate(10);
        return view('admin.users', compact('users'));
    }




    public function getCities()
    {
        $cities = City::all();
        return $cities;
    }

    public function newAccount()
    {

        $cities = Cache::get('cities');
        if (!$cities) {
            logger('caching');
            $temp = $this->getCities();
            $caching =   Cache::put('cities', $temp, 120);

            $cities = Cache::get('cities');
        }
        return view('admin.new_account',compact('cities'));
    }

    public function saveAccount(Request $request)
    {

        // return $request;
        $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:users,phone',
            'password' => 'required',
            'type' => 'required',
            'city' => 'required',
            'address' => 'required',
            'hood' => 'required',
        ]);
        $user = new User([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'type' => $request->type,
            'city_id' => $request->city_id,
            'address' => $request->address,
            'hood' => $request->hood,
            'wa'=> $request->wa
        ]);
        $user->save();
        if($user->type == 'pharmacy'){
        return redirect()->route('admin.pharm.show',['pharm'=> $user]);

        }
        return redirect()->route('admin.users.show',['user'=> $user]);

    }
}
