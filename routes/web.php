<?php

use App\Http\Controllers\DashController;
use App\Http\Controllers\HomeController;
use App\Models\Medicine;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use Spatie\Analytics\Period;

Route::get('/x', function () {

    return view('welcome');
    // $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(7));
    // return $analyticsData;
    // return view('welcome');
    // return Medicine::all();
    // User::create([
    //     'name'=> 'musab',
    //     'city_id'=> 2,
    //     'password'=> Hash::make('123456'),
    //     'type'=> 'pharmacy',
    //     'address'=> 'saudi arabia',
    //     'hood'=> 'not-required',
    //     'phone'=> '0919232997',
    //     'wa'=> '0919232997',
    // ]);

});
Route::get('/', [HomeController::class ,'index'])->name('home');
Route::get('/show/{med}', [HomeController::class ,'show'])->name('medicine.show');
Route::post('/search', [HomeController::class ,'searchByCity'])->name('search');
Route::post('/search-by-category', [HomeController::class ,'searchByCategory'])->name('search_category');
Route::post('/search-by-pharmacy', [HomeController::class ,'searchByPharmacy'])->name('search_pharmacy');

// Route::post('/search', [HomeController::class ,'search'])->name('search');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





Route::group( ['prefix'=> 'dashboard', 'as'=> 'dash.'], function () {
    Route::get('/', [DashController::class ,'home'])->name('home');
    Route::get('/meds', [DashController::class ,'myMedicines'])->name('medicines');
    Route::get('/meds/show/{medicine}', [DashController::class ,'show'])->name('medicines.show');
    Route::put('/meds/update/{medicine}', [DashController::class ,'updateMed'])->name('medicines_update');
    Route::get('/meds/create', [DashController::class ,'newMed'])->name('medicines_new');
    Route::post('/meds/save', [DashController::class ,'saveMed'])->name('medicines_save');




    Route::get('/profile', [DashController::class ,'profile'])->name('profile');
    Route::post('/profile/update-number', [DashController::class ,'updateNumber'])->name('update_number');
    Route::post('/profile/update-password', [DashController::class ,'updatePassword'])->name('update_password');
    Route::post('/profile/update-data', [DashController::class ,'updateData'])->name('update_data');



    Route::get('/pharmacy-info', [DashController::class ,'pharmInfo'])->name('pharm_info');
    Route::post('/pharmacy-info-update', [DashController::class ,'pharmInfoUpdate'])->name('pharm_info_update');
    Route::get('/pharmacy-info-new', [DashController::class ,'pharmInfoNew'])->name('pharm_info_new');
    Route::post('/pharmacy-info-save', [DashController::class ,'pharmInfoSave'])->name('pharm_info_save');


    // Route::get('/profile/update-geo', [DashController::class ,'updategeo'])->name('update_geo');
    // Route::post('/profile/save-geo', [DashController::class ,'savegeo'])->name('save_geo');
});


require __DIR__  . '/admin.php';


Route::get('is', function (Request $request) {
   return $request->user()->type;
});


Route::get('/add-admin', function () {

   
     // User::create([
        //     'name'=> 'musab',
        //     'city_id'=> 2,
        //     'password'=> Hash::make('123456'),
        //     'type'=> 'admin',
        //     'address'=> 'saudi arabia',
        //     'hood'=> 'not-required',
        //     'phone'=> '0919232991',
        //     'wa'=> '0919232991',
        // ]);
        // User::create([
        //     'name'=> 'Abdalla',
        //     'city_id'=> 2,
        //     'password'=> Hash::make('123456'),
        //     'type'=> 'admin',
        //     'address'=> '--',
        //     'hood'=> '--',
        //     'phone'=> '0121941942',
        //     'wa'=> '0121941942',
        // ]);



        // User::create([
        //     'name'=> 'نادين',
        //     'city_id'=> 1,
        //     'password'=> Hash::make('N0911493546'),
        //     'type'=> 'admin',
        //     'address'=> '--',
        //     'hood'=> '--',
        //     'phone'=> '0911493546',
        //     'wa'=> '0911493546',
        // ]);


        // User::create([
        //     'name'=> 'مختار',
        //     'city_id'=> 1,
        //     'password'=> Hash::make('M0126949107'),
        //     'type'=> 'admin',
        //     'address'=> '--',
        //     'hood'=> '--',
        //     'phone'=> '0126949107',
        //     'wa'=> '0126949107',
        // ]);
    //    User::create([
    //         'name'=> 'نجلاء',
    //         'city_id'=> 1,
    //         'password'=> Hash::make('N0119114568'),
    //         'type'=> 'admin',
    //         'address'=> '--',
    //         'hood'=> '--',
    //         'phone'=> '0119114568',
    //         'wa'=> '0119114568',
    //     ]);

    //     User::create([
    //         'name'=> 'نسيبة',
    //         'city_id'=> 1,
    //         'password'=> Hash::make('N0906202421'),
    //         'type'=> 'admin',
    //         'address'=> '--',
    //         'hood'=> '--',
    //         'phone'=> '0906202421',
    //         'wa'=> '0906202421',
    //     ]);
    abort(404);

});
