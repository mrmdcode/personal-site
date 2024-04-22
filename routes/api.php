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
$localH = 'localhost';
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['domain' => 'reservation.'.$localH], function () {
    Route::get('/{username}',function ($username){
        $rsp = \App\Models\ReservationServiceProfile::where('companyName',$username)->with(['template_data'])->first();
        $menus = \App\Models\RSMenu::with(['MenuItems'])->get();
        if ($rsp){
            return response(compact('rsp','menus'));
        }
        else{
            return response(["rsp"=>"Not Found Reservation Company"],404);
        }

    });
    Route::get('/{username}/menu',function ($username){
        $rsp = \App\Models\ReservationServiceProfile::where('companyName',$username)
            ->with(['template_data'])
            ->first();
        $menus = \App\Models\RSCategory::where('rsp_id',$rsp->id)->with(['menu.MenuItems'])->get();
        if ($rsp){
            return response(compact('menus','rsp'));
        }
        else{
            return response(["rsp"=>"Not Found Reservation Company"],404);
        }

    });
    Route::get('/{username}/tables',function ($username){
        $rsp = \App\Models\ReservationServiceProfile::where('companyName',$username)
            ->with(['template_data'])
            ->first();
        $tables = $rsp->tables;
        if ($rsp){
            return response(compact('tables','rsp'));
        }
        else{
            return response(["rsp"=>"Not Found Reservation Company"],404);
        }
    });
    Route::get('/{username}/tables/{table}',function ($username,$table){
        $rsp = \App\Models\ReservationServiceProfile::where('companyName',$username)
            ->with(['template_data'])
            ->first();
        $dis_times = \App\Models\RSReservation::where('r_s_table_id',$table)->get(['date','start','end']);

        if ($rsp){
            return response(compact('dis_times','rsp'));
        }
        else{
            return response(["rsp"=>"Not Found Reservation Company"],404);
        }
    });
    Route::post('/{username}/tables/{table}',function (Request $req,$username,$table){
        $rsp = \App\Models\ReservationServiceProfile::where('companyName',$username)
            ->with(['template_data'])
            ->first();
        $table = $rsp->tables->where('id',$table)->first();

        if ($rsp && !!$table){
//            return response(compact('table','rsp','req'));
            $res = \App\Models\RSReservation::create([
                'rsp_id' => $rsp->id,
                'r_s_table_id' => $table->id,
                'customer_name' => $req->input('customer_name'),
                'customer_phone' => $req->input('customer_phone'),
                'message' => $req->input('message'),
                'date' => $req->input('date'),
                'start' => $req->input('start'),
                'end' => $req->input('end'),
            ]);
            if ($res){
                return response('create successful',201);
            }
        }
        else{
            return response(["rsp"=>"Not Found Reservation Company"],404);
        }
        return [$req,$username,$table];
    });

});
