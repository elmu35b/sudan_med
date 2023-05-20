<?php

use App\Http\Controllers\DashController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class ,'index'])->name('home');
Route::post('/search', [HomeController::class ,'search'])->name('search');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





Route::group( ['prefix'=> 'dashboard', 'as'=> 'dash.'], function () {
    Route::get('/', [DashController::class ,'home'])->name('home');
    Route::get('/meds', [DashController::class ,'myMedicines'])->name('medicines');
    Route::get('/meds/new', [DashController::class ,'newMed'])->name('medicines_new');
    Route::post('/meds/save', [DashController::class ,'saveMed'])->name('medicines_save');
    Route::get('/profile', [DashController::class ,'profile'])->name('profile');
    Route::post('/profile/update-number', [DashController::class ,'updateNumber'])->name('update_number');
    Route::post('/profile/update-password', [DashController::class ,'updatePassword'])->name('update_password');

    Route::get('/profile/update-geo', [DashController::class ,'updategeo'])->name('update_geo');
    Route::post('/profile/save-geo', [DashController::class ,'savegeo'])->name('save_geo');
});


require __DIR__  . '/admin.php';


Route::get('is', function (Request $request) {
   return $request->user()->type;
});
