<?php

namespace App\Http\Controllers\Res;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class APIReservationController extends Controller
{
    public function landingPage($username){
        $rsp = \App\Models\ReservationServiceProfile::where('companyName',$username)->with(['template_data'])->first();
        $menus = \App\Models\RSMenu::with(['MenuItems'])->get();
        if ($rsp){
            return response(compact('rsp','menus'));
        }
        else{
            return response(["rsp"=>"Not Found Reservation Company"],404);
        }

    }

    public function menu($username){
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

    }

    public function tables($username){
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
    }

    public function tableCheckOut($username,$table){
        $rsp = \App\Models\ReservationServiceProfile::where('companyName',$username)
            ->with(['template_data'])
            ->first();
        $dis_times = \App\Models\RSReservation::where('r_s_table_id',$table)->get(['start','end']);

        if ($rsp){
            return response(compact('dis_times','rsp'));
        }
        else{
            return response(["rsp"=>"Not Found Reservation Company"],404);
        }
    }

    public function tableDateCheckOut($username,$table,$date){
        $rsp = \App\Models\ReservationServiceProfile::where('companyName',$username)
            ->with(['template_data'])
            ->first();
        $dis_times = \App\Models\RSReservation::where('r_s_table_id',$table)->where('date',$date)->get(['start','end']);

        if ($rsp){
            return response(compact('dis_times','rsp'));
        }
        else{
            return response(["rsp"=>"Not Found Reservation Company"],404);
        }
    }

    public function reservation (Request $req,$username,$table){
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
                'count' => $req->input('count'),
                'date' => $req->input('date'),
                'start' => $req->input('start'),
                'end' => $req->input('end'),
            ]);
            if ($res){
                return response(['create successful'],201);
            }
        }
        else{
            return response(["rsp"=>"Not Found Reservation Company"],404);
        }
        return [$req,$username,$table];
    }
}
