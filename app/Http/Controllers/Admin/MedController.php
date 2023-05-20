<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MedController extends Controller
{
    //

    public function medicines()
    {
        $medicines = Medicine::where('available', true)->paginate(25);
        // return $medicines;
        return view('admin.meds', compact('medicines'));
    }


    public function newMed()
    {
        return view('admin.med_new');
    }

    public function saveMed(Request $request)
    {
        return $request;
        // return   $this->imageResize($request->img);

        $user =  Auth::user();
        $med = new Medicine([
            'name' => $request->name,
            'price' => $request->price,
            'dose' => $request->dose,
            'name_en' => $request->name_en,
            'ex_date' => $request->ex_date,
            'tags' => $request->tags,
            'user_id' => $user->id,
            'quantity' => $request->quantity
        ]);

        if ($user->lat != null  && $user->lng != null) {
            $med->lat = $user->lat;
            $med->lng = $user->lng;
        }
        $med->city_id = $user->city_id;
        $med->img_url =   $this->imageResize($request->img);


        // return $med;
        $med->save();
        return redirect()->route('admin.medicines')->with('success', 'success');
        // return view('dashboard.med_save');
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
}
