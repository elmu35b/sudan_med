<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Pharmacy;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }




    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        $cities = City::all();
        return view('auth.register', compact('cities'));
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $v =  Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'numeric', 'unique:users,phone'],
            'wa' => ['required', 'numeric', 'unique:users,wa'],
            'address' => ['required'],
            'hood' => ['required'],
            'password' => ['required', 'string', 'min:5',],
            'type' => ['required', 'in:single,pharmacy'],
        ]);

        if($v->fails()){
                logger('Failed');
                return redirect()->route('register');
        }
        // logger($v->errors());
        return $v;

    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user =  User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'wa' => $data['wa'],
            'password' => Hash::make($data['password']),
            'city_id' => $data['city'],
            'address' => $data['address'],
            'hood' => $data['address'],
            'type' => $data['type']
        ]);

        // if($data['type']== 'pharmacy'){
        //     Pharmacy::create([
        //         'user_id'=> $user->id,
        //         'name'=> $data['name'],
        //     ]);
        // }
        return $user;
    }



    function register(Request $request) : mixed {
      $v =  Validator::make( $request->all(), [
            'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'numeric', 'unique:users,phone'],
            'wa' => ['required', 'numeric', 'unique:users,wa'],
            'address' => ['required'],
            'hood' => ['required'],
            'password' => ['required', 'string', 'min:5',],
            'type' => ['required', 'in:single,pharmacy'],
        ]);

        if($v->fails()){
            return redirect()->route('register')->withErrors($v);
        }
        $user =  User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'wa' => $request->wa,
            'password' => Hash::make($request->password),
            'city_id' => $request->city,
            'address' => $request->address,
            'hood' => $request->address,
            'type' => $request->type
        ]);

        Auth::login($user);
        return redirect()->route('dash.home');
    }
}
