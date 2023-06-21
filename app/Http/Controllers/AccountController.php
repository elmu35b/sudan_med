<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    //

    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function __construct()
    {
        $this->middleware(['auth', 'is_admin']);
    }


    function userPasswordUpdate(Request $request, User $user): mixed
    {

        $request->validate(['password'=> 'min:4 |required']);
        $user->update(['password' => Hash::make($request->password)]);
        Session::flash('successful', true);
        return redirect()->back();
    }

    function userDataUpdate(Request $request, User $user): mixed
    {
        $request->validate(['wa'=> 'required|numeric|min:10' , 'phone'=> 'required|numeric|min:10']);
        $user->update(['phone' => $request->phone, 'wa' => $request->wa ]);
        Session::flash('successful', true);
        return redirect()->back();
    }
}
