<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
$localH = env('localH','localhost');



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['domain' => 'reservation.'.$localH], function () {
    Route::get('/{username}', [\App\Http\Controllers\Res\APIReservationController::class,'landingPage']);
    Route::get('/{username}/menu',  [\App\Http\Controllers\Res\APIReservationController::class,'menu']);
    Route::get('/{username}/tables', [\App\Http\Controllers\Res\APIReservationController::class,'tables']);
    Route::get('/{username}/tables/{table}/', [\App\Http\Controllers\Res\APIReservationController::class,'tableCheckOut']);
    Route::get('/{username}/tables/{table}/{date}', [\App\Http\Controllers\Res\APIReservationController::class,'tableDateCheckOut']);
    Route::post('/{username}/tables/{table}', [\App\Http\Controllers\Res\APIReservationController::class,'reservation']);

});
