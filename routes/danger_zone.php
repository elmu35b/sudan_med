<?php

use App\Models\Medicine;
use App\Models\User;
use App\Services\ApiDanger;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Route;


Route::prefix('/danger')->group(function () {

    Route::post('/find/{id}', function (Request $request) {
        if (!(new ApiDanger())->hashedKey($request->key)) {
            // abort(404);
            return response()->json(['message' => 'not found'], 200,);
        }
        $request->validate(['id' => 'required', 'key' => 'required']);
        if (!(new ApiDanger())->hashedKey($request->key)) {
            // abort(404);
            return response()->json(['message' => 'not found'], 200,);
        }
        return $request->id;
    });

    Route::post('/delete-pharmacy', function (Request $request) {
        if (!(new ApiDanger())->hashedKey($request->key)) {
            // abort(404);
            return response()->json(['message' => 'not found'], 200,);
        }
        $request->validate(['phone' => 'required', 'key' => 'required']);
        $user = User::where('phone', $request->phone)->first();

        if (!$user) {
            return response()->json(['message' => 'not found'], 200,);
        }

        Medicine::where('user_id', $user->id)->delete();
        if(!$user->pharmacy) {}else {
            $user->pharmacy->delete();
        }
    });

    Route::post('/delete-med', function (Request $request) {
        if (!(new ApiDanger())->hashedKey($request->key)) {
            // abort(404);
            return response()->json(['message' => 'not found'], 200,);
        }
        $request->validate(['med' => 'required', 'key' => 'required']);
        $user = Medicine::distroy($request->med);
    });
});

