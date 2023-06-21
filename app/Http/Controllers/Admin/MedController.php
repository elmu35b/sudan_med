<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Medicine;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MedController extends Controller
{
    //


    private $cities;

    public function __construct()

    {
        $cities =  Cache::get('cities');
        if (!$cities) {
            logger('caching');
            $temp = $this->getCities();
            $caching =   Cache::put('cities', $temp, 120);

            $cities = Cache::get('cities');
            $this->cities = $cities;
        }
        $this->cities = $cities;
    }

    public function medicines()
    {
        $medicines = Medicine::where('available', true)->paginate(25);
        $cities = $this->cities;

        // return $medicines;
        return view('admin.meds.meds', compact('medicines', 'cities'));
    }


    public function newMed()
    {
        $categories = Category::all();

        return view('admin.med_new', compact('categories'));
    }

    public function saveMed(Request $request)
    {

        $user =  Auth::user();
        $med = new Medicine([
            'name' => $request->name,
            'price_type' => $request->price_type,
            'dose' => $request->dose,
            'name_en' => $request->name_en,
            'ex_date' => $request->ex_date,
            'tags' => $request->tags,
            'user_id' => $user->id,
            'quantity' => $request->quantity
        ]);

        // if ($user->lat != null  && $user->lng != null) {
        //     $med->lat = $user->lat;
        //     $med->lng = $user->lng;
        // }
        $med->city_id = $user->city_id;
        // $med->img_url =   $this->imageResize($request->img);

        $med->save();
        return redirect()->route('admin.medicines')->with('success', 'success');
    }

    public function imageResize($image)
    {
        $img = \Image::make($image)->resize(300, 200)->encode('jpg', 80);
        $img_uuid = Str::uuid();
        $final = $img_uuid . '.' . $image->getClientOriginalExtension();
        Storage::disk('public')->put($final, $img);
        return $final;
        // return $img->response('jpg');
    }


    public function show(Medicine $med)
    {

        $alters = Medicine::where(['city_id' => $med->city_id , 'available'=> true])
            ->where(function ($query)  use ($med) {
                $query->where('tags', 'like', '%' . $med->name . '%')
                    ->orWhere('tags', 'like', '%' . $med->name_en . '%');
            })->paginate(15);

        return view('admin.meds.med_show', compact('med', 'alters'));
    }


    public function getCities()
    {
        $cities = City::all();
        return $cities;
    }


    public function newMedPharm(User $pharm,)
    {
        $categories = Category::all();
        return view('admin.meds.med_new_with_user', ['user' => $pharm, 'categories' => $categories]);
    }

    public function newMeduser(User $user,)
    {
        $categories = Category::all();
        return view('admin.meds.med_new_with_user', ['user' => $user, 'categories' => $categories]);
    }

    public function saveWithUser(Request $request)
    {

        $med = new Medicine([
            'name' => $request->name,
            'price_type' => $request->price_type,
            'dose' => $request->dose,
            'name_en' => $request->name_en,
            'ex_date' => $request->ex_date,
            'tags' => $request->tags,
            'user_id' => $request->user_id,
            'quantity' => $request->quantity
        ]);

        // if ($user->lat != null  && $user->lng != null) {
        //     $med->lat = $user->lat;
        //     $med->lng = $user->lng;
        // }
        $med->city_id = $request->city_id;
        // $med->img_url =   $this->imageResize($request->img);

        $med->save();
        return redirect()->route('admin.medicines')->with('success', 'success');

    }

    public function updateMedNotAvailable(Medicine $medicine, Request $request)
    {
        $medicine->update(['available'=> false]);
        return redirect()->route('admin.medicines_show',['med'=> $medicine]);
    }


    public function updateMedAvailable(Medicine $medicine, Request $request)
    {
        $medicine->update(['available'=> true]);
        return redirect()->route('admin.medicines_show',['med'=> $medicine]);
    }
}
