<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Medicine;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
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

    function show(Medicine $medicine): mixed
    {
        $categories = Category::all();



        $alter_medicines = Medicine::where(['city_id' => Auth::user()->city_id, 'available' => true,])->where(function ($query) use ($medicine) {

            $query->where('name', 'like', '%' . $medicine->name . '%');
            $query->orWhere('name_en', 'like', '%' . $medicine->name_en . '%');

            $query->orWhere('tags', 'like', '%' . $medicine->tags . '%');
            $query->orWhere('name', 'like', '%' . $medicine->tags . '%');
            $query->orWhere('name_en', 'like', '%' . $medicine->tags . '%');
            // ->with('user')
        })->paginate(25);
        return view('dashboard.med_show', compact('medicine', 'categories', 'alter_medicines'));
    }


    function updateMed(Request $request, Medicine $medicine): mixed
    {
        // return $request;
        $request->validate([
            'name' => 'required',
            'name_en' => 'required',
            'category_id' => 'required',
            'price_type' => 'required',
            'tags' => 'min:1'
        ]);
        $medicine->fill($request->all());
        $medicine->tags = $request->tags;
        $medicine->save();
        return $medicine->refresh();
        // $medicine->update($request->all());

        Session::flash('updated', true);
        return redirect()->back();
    }

    public function myMedicines()
    {
        $medicines = Medicine::where('user_id', Auth::user()->id)->paginate(20);

        return view('dashboard.meds', compact('medicines'));
    }

    public function newMed()
    {
        $categories = Category::all();
        return view('dashboard.med_new', compact('categories'));
    }

    public function saveMed(Request $request)
    {
        // return $request;

        $user =  Auth::user();
        $med = new Medicine([
            'name' => $request->name,
            'price_type' => $request->price_type,
            'dose' => $request->dose,
            'name_en' => $request->name_en,
            'ex_date' => $request->ex_date,
            'tags' => $request->tags,
            'user_id' => $user->id,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id
        ]);

        // if($user->lat !=null  && $user->lng != null ){
        //     $med->lat = $user->lat ;
        //     $med->lng = $user->lng;
        // }
        $med->city_id = $user->city_id;
        // $med->img_url =   $this->imageResize($request->img);

        $med->save();
        return redirect()->route('dash.medicines')->with('success', 'success');
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



    // public function imageResize($image)
    // {
    //     $img = \Image::make($image)->resize(300, 200)->encode('jpg',80);
    //     $img_uuid = Str::uuid();
    //     $final = $img_uuid . '.' . $image->getClientOriginalExtension();
    //     Storage::disk('public')->put( $final, $img);
    //     return $final;
    //     // return $img->response('jpg');
    // }



    public function pharmInfo()
    {
        return view('dashboard.pharm_settings');
    }

    public function pharmInfoNew()
    {
        return view('dashboard.pharm_settings_new');
    }


    public function pharmInfoUpdate(Request $request)
    {
        // return $request;
        $active = false;
        if ($request->active == false or $request->active == 'false') {
            $active = false;
        } else $active = true;



        Auth::user()->pharmacy->update([
            'name'=> $request->name,
            'opens_at' => $request->open_at,
            'close_at' => $request->close_at,
            'extra_number' => $request->extra_phone,
            'active' => $active,
        ]);
        // return Auth::user()->pharmacy;
        return view('dashboard.pharm_settings');
    }

    function pharmInfoSave(Request $request): mixed
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
            'user_id' => Auth::id()
        ]);
        Session::flash('successful',true);
        return redirect()->route('dash.home');
        // return view('dashboard.home');
    }
}
