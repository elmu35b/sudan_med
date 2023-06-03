<?php

use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MedController;
use App\Http\Controllers\Admin\PharmacyController;
use App\Http\Controllers\Admin\UserController;
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

// Auth::routes();

Route::prefix('admin')->middleware(['auth', 'is_admin'])->name('admin.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/cities', [CityController::class, 'index'])->name('cities');
    Route::get('/medicines', [MedController::class, 'medicines'])->name('medicines');
    Route::post('/search', [HomeController::class, 'search'])->name('search');
    Route::post('/profile', [HomeController::class, 'profile'])->name('profile');


    Route::get('/users', [UserController::class, 'users'])->name('users');
    Route::get('/users/show/{user}', [UserController::class, 'showUser'])->name('users.show');
    Route::post('/users/search/', [UserController::class, 'searchUser'])->name('users.search');
    Route::get('users/meds/new/{user}', [MedController::class ,'newMedUser'])->name('medicines_new.user');


    Route::get('/by_city', [HomeController::class, 'byCity'])->name('by_city');
    Route::post('/by_city', [HomeController::class, 'byCityResult'])->name('by_city');


    Route::get('/pharmacy', [PharmacyController::class, 'pharmacy'])->name('pharm');
    Route::get('/pharmacy/city', [PharmacyController::class, 'pharmacyCity'])->name('pharm.by_city');
    Route::get('/pharm/show/{pharm}', [PharmacyController::class, 'showPharm'])->name('pharm.show');
    Route::post('/pharm/search/', [PharmacyController::class, 'searchPharm'])->name('pharm.search');
    Route::get('pharm/meds/new/{pharm}', [MedController::class ,'newMedPharm'])->name('medicines_new.pharm');

    Route::post('/meds/with-user/save', [MedController::class ,'saveWithUser'])->name('medicines_save_with_user');




    //
    Route::get('/cities', [CityController::class ,'index'])->name('cities');
    Route::get('/cities/new', [CityController::class ,'newCity'])->name('cities_new');
    Route::post('/cities/save', [CityController::class ,'saveCity'])->name('cities_save');




    Route::get('/meds/new', [MedController::class ,'newMed'])->name('medicines_new');
    Route::get('/meds/show/{med}', [MedController::class ,'show'])->name('medicines_show');
    Route::post('/meds/save', [MedController::class ,'saveMed'])->name('medicines_save');
    Route::get('/profile', [HomeController::class ,'profile'])->name('profile');
    Route::post('/profile/update-number', [HomeController::class ,'updateNumber'])->name('update_number');
    Route::post('/profile/update-password', [HomeController::class ,'updatePassword'])->name('update_password');
});
