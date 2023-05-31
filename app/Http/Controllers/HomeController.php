<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\EssentialMedicine;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // Cache::clear();
        // return 'jhh';
        $cities = Cache::get('cities');
        if (!$cities) {
            logger('caching');
            $temp = $this->getCities();
            $caching =   Cache::put('cities', $temp, 120);

            $cities = Cache::get('cities');
        }
        // else {
        //     logger('cache exist');

        //     // return $c->count();
        // }
        $meds = [];
        return view('home', compact('cities', 'meds'));

        // $cities = City::all();

        // $meds = EssentialMedicine::with('medicine')->get(10);

    }

    public function getCities()
    {
        $cities = City::all();
        return $cities;
    }




    public function searchByCity(Request $request)
    {

        $medicines = Medicine::where(['city_id' => $request->city_id, 'available' => true,])
            ->where('name', 'like', '%' . $request->search . '%')
            ->orWhere('name_en', 'like', '%' . $request->search . '%')
            ->orWhere('tags', 'like', '%' . $request->search . '%')
            ->with('user')
            ->get();

        return view('search', compact('medicines','cities'));
    }
    public function searchByLocation(Request $request)
    {
        // return $request;
        $cities = Cache::get('cities');
        if (!$cities) {
            logger('caching');
            $temp = $this->getCities();
            $caching =   Cache::put('cities', $temp, 120);

            $cities = Cache::get('cities');
        }




        // return $request;
        // $request->la


        $medicines = Medicine::where(['city_id' => $request->city_id, 'available' => true,])
            ->where('name', 'like', '%' . $request->search . '%')
            ->orWhere('name_en', 'like', '%' . $request->search . '%')
            ->orWhere('tags', 'like', '%' . $request->search . '%')
            ->with('user')
            ->select(
                "medicines.id",
                "medicines.user_id",
                "medicines.name",
                "medicines.price",
                "medicines.dose",

                "medicines.lat",
                "medicines.lng",
                "medicines.img_url",
                /**
                 *  to use miles instead change @var[6371]
                 * to @var
                 */
                //
                DB::raw("6371 * acos(cos(radians(" . $request->lat . "))
            * cos(radians(medicines.lat))
            * cos(radians(medicines.lng) - radians(" . $request->lng . "))
            + sin(radians(" . $request->lat . "))
            * sin(radians(medicines.lat))) AS distance ")

            )
            // will search in provided radius
            // or use default as told to customers [default : 5 km]
            ->having('distance', '<', 25)
            ->groupBy("medicines.id")
            ->get();

        // return $showResult;
        // $type = $request->city_id;
        // $medicines = Medicine::where('city_id', $request->city_id)
        //     ->where('name', 'like', '%' . $request->search . '%')
        //     ->orWhere('name_en', 'like', '%' . $request->search . '%')
        //     ->orWhere('tags', 'like', '%' . $request->search . '%')
        //     ->paginate(25);

        // return $medicines;
        return view('search', compact('medicines','cities'));
    }
}
