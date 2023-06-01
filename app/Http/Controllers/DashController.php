<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    // dashboard view
    public function home()
    {
        // Auth::user();

        $medicines = Medicine::where('user_id', Auth::user()->id)->paginate(20);

        return view('dashboard.home', compact('medicines'));
    }

    public function myMedicines()
    {
        $medicines = Medicine::where('user_id', Auth::user()->id)->paginate(20);

        return view('dashboard.meds', compact('medicines'));
    }

    public function newMed()
    {
        return view('dashboard.med_new');
    }

    public function saveMed(Request $request)
    {
        // return $request;
    //  return   $this->imageResize($request->img);

    // ini_set('upload_max_filesize',128);


        $user =  Auth::user();
        $med = new Medicine([
            'name' => $request->name,
            'price_type' => $request->price_type,
            'dose' => $request->dose,
            'name_en' => $request->name_en,
            'ex_date' => $request->ex_date,
            'tags' => $request->tags,
            'user_id' => $user->id,
            'quantity'=> $request->quantity
        ]);

        // if($user->lat !=null  && $user->lng != null ){
        //     $med->lat = $user->lat ;
        //     $med->lng = $user->lng;
        // }
        $med->city_id = $user->city_id ;
        // $med->img_url =   $this->imageResize($request->img);

        $med->save();
        return redirect()->route('dash.medicines')->with('success','success');
    }
    public function profile()
    {
        return view('dashboard.profile');
    }

    public function updatePassword(Request $request)
    {

        Auth::user()->update(['password' => Hash::make('password')]);

        return redirect()->back()->with('password_updated', 'success');
    }

    public function updateData(Request $request)
    {
        // return $request;
        Auth::user()->update([
             'email' => $request->email,
             'name' => $request->name,
            'phone' => $request->phone,
            'wa' => $request->wa,
        ]);

        return redirect()->back()->with('data_updated', 'success');
    }


    // public function updategeo()
    // {
    //     return view('dashboard.geo');
    // }

    // public function savegeo(Request $request)
    // {
    //     return $request;
    // }



    public function imageResize($image)
    {
        $img = \Image::make($image)->resize(300, 200)->encode('jpg',80);
        $img_uuid = Str::uuid();
        $final = $img_uuid . '.' . $image->getClientOriginalExtension();
        Storage::disk('public')->put( $final, $img);
        return $final;
        // return $img->response('jpg');
    }
}
