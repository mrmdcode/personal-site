<?php

namespace App\Http\Controllers\Res;

use App\Http\Controllers\Controller;
use App\Models\ReservationServiceProfile;
use App\Models\RSOrder;
use Illuminate\Http\Request;

class orderTakerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->status != 'active'){
            return abort(403,'دسترسی شما از بین رفته با مدیر خود صحبت کنید .');
        }
        $user = auth()->user();
        $parent = auth()->user()->parent ;
        $rsp = ReservationServiceProfile::where('admin_user_id',$parent)->first();
        $menus =$rsp->rs_menu()->with('MenuItems')->get();
        $table = $rsp->tables;
        return view('OrderTaker.dashboard.dashboard',compact('menus','table','rsp','user'));
    }

    public function indexData()
    {
        if (auth()->user()->status != 'active'){
            return abort(403,'دسترسی شما از بین رفته با مدیر خود صحبت کنید .');
        }
        $parent = auth()->user()->parent ;
        $rsp = ReservationServiceProfile::where('admin_user_id',$parent)->first();
        $menus =$rsp->rs_menu()->with('MenuItems')->get();
        $table = $rsp->tables;
        return response(compact('rsp','menus','table'));
    }

    public function store(Request $req)
    {
        try {

            $parent = auth()->user()->parent ;
            $rsp = ReservationServiceProfile::where('admin_user_id',$parent)->first();
            $order = RSOrder::create([
                'table_id' => $req->input('tableSelected'),
                'reservation_service_profiles_id' => $rsp->id,
                'order_taker_id'=>auth()->user()->id,
                'status' => 'pending',
                'customer_name' => $req->input('customer_name'),
                'customer_phone' => $req->input('customer_phone'),
            ]);
            foreach ($req->input('ordersItem') as $items){
                $order->rs_menu_items()->attach($items['id'], ['qty'=>$items['qty']]);
            }
            return response(['success'],201);
        }
        catch (\Exception $e){
            return response(compact('e'));
        }
    }
}
