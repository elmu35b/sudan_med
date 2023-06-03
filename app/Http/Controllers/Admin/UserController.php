<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function users()
    {
        $users = User::paginate(25);
        return view('admin.users',compact('users'));
    }

    public function showUser(User $user)
    {
       $medicines = $user->medicines()->paginate(25);

        return view('admin.show_user',compact('user','medicines'));
    }

    public function updateUser(Request $request , User $user)
    {
        $user->update(['password' => Hash::make('password')]);

        return redirect()->back()->with('password_updated', 'success');
    }



    public function searchUser(Request $request)
    {
        $users = User::where('type','single')->where('phone','like','%'.$request->search .'%')->paginate(10);
        return view('admin.users',compact('users'));
    }


}
