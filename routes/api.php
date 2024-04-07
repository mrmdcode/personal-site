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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['domain' => 'reservation.'.env("APP_URL")], function () {
    Route::get('/{username}',function ($username){
        $rsp = \App\Models\ReservationServiceProfile::where('companyName',$username)->with(['template_data'])->first();
        if ($rsp){
            return response(compact('rsp'));
        }
        else{
            return response(["rsp"=>"Not Found Reservation Company"],404);
        }

    });
    Route::get('/{username}/menu',function ($username){
        $rsp = \App\Models\ReservationServiceProfile::where('companyName',$username)->with(['template_data'])->first();
        $menus = \App\Models\RSMenu::with('MenuItems')->get();
        if ($rsp){
            return response(compact('menus'));
        }
        else{
            return response(["rsp"=>"Not Found Reservation Company"],404);
        }

    });
});
