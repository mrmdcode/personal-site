<?php

namespace App\Http\Controllers\Res;

use App\Http\Controllers\Controller;
use App\Models\ReservationServiceProfile;
use App\Models\RSOrder;
use App\Models\RSTable;
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
        $table = $rsp->tables()->with(['orders'=> function ($query) {
            $query->orderByDesc('created_at')
                ->where('status','!=', 'cancelled');
        }])->get();
        $table->each(function($table) {
            $a = $table->orders->first();
            unset($table->orders);
            $table->orders = $a;
        });
        return response(compact('table','rsp','menus'));
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

    public function edit($id)
    {
        $table = RSTable::find($id);

        if (!$table) {
            return response()->json(['message' => 'Table not found'], 404);
        }

        // دریافت آخرین سفارش مرتبط با میز
        $order = $table->orders()->orderByDesc('created_at')->first();

        if (!$order) {
            return response()->json(['message' => 'No orders found for this table'], 404);
        }

        // واکشی آیتم‌های منو مرتبط با آخرین سفارش
        $menuItems = $order->rs_menu_items()->get();

        // بازگرداندن داده‌ها به صورت JSON
        return response()->json([
            'order' => [$order->id,$order->customer_name,$order->customer_phone],
            'table_id' => $table->id,
            'rs_menu_items' => $menuItems
        ], 202);

    }

    public function update(Request $req, $id)
    {
        try {

            // یافتن سفارش بر اساس شناسه
            $order = RSOrder::where('id', $id)->first();

            if (!$order) {
                return response()->json(['message' => 'Order not found'], 404);
            }

            // به‌روزرسانی اطلاعات سفارش
            $order->customer_name = $req->input('customer_name');
            $order->customer_phone = $req->input('customer_phone');
            $order->update();

            // آماده‌سازی داده‌ها برای sync
            $syncData = [];
            foreach ($req->input('ordersItem') as $item) {
                $syncData[$item['id']] = ['qty' => $item['qty']];
            }

            // به‌روزرسانی آیتم‌های منوی مرتبط با استفاده از sync
            $order->rs_menu_items()->sync($syncData);

            return response()->json(['order' => $order], 200);
        } catch (Exception $e) {
            // ارسال خطا به کلاینت
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
