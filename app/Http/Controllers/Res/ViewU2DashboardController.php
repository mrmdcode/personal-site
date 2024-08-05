<?php

namespace App\Http\Controllers\Res;

use App\Http\Controllers\Controller;
use App\Models\ReservationServiceProfile;
use App\Models\RSOrder;
use App\Models\RSPTemplateData;
use App\Models\RSReservation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ViewU2DashboardController extends Controller
{
    public function LandingPage()
    {
        return redirect()->route("login");
    }

    public function orders()
    {
        $items = RSOrder::orderByDesc('created_at')->get();
        return view("reservation.dashboard.Orders.Orders",compact('items'));
    }
    public function dashboardIndex()
    {
        $resvWeekCount = RSReservation::where('rsp_id',auth()->user()->rsp->id)
            ->where('date','>',Carbon::now('Asia/Tehran')->startOfWeek())
            ->where('date','<',Carbon::now('Asia/Tehran')->endOfWeek())
            ->count();
        $resvTodeyCount = RSReservation::where('rsp_id',auth()->user()->rsp->id)
            ->where('date','=',Carbon::today())
            ->count();
        $resv = RSReservation::where('rsp_id',auth()->user()->rsp->id)
            ->where('date','=',Carbon::today()->format('Y-m-d'))
//            ->where('date','<',Carbon::tomorrow()->format('Y-m-d'))
            ->get();

        return view("Reservation.dashboard.dashboard",compact('resvWeekCount','resvTodeyCount','resv'));
    }

    public function landingPageData()
    {
        $rsptd = RSPTemplateData::where('id',auth()->user()->rsp->template_data->id)->first();
        return view("Reservation.dashboard/DataSetting.DataSetting",compact('rsptd'));
    }
    public function storeLPD(Request $request) #LPD : landing page data
    {
        $rsptd = RSPTemplateData::where('id',auth()->user()->rsp->template_data->id)->first();
        $rsptd->address != $request->input('address') ? $rsptd->address= $request->input('address'): null;
        $rsptd->title != $request->input('title') ? $rsptd->title= $request->input('title'): null;
        $rsptd->name != $request->input('name') ? $rsptd->name= $request->input('name'): null;
        $rsptd->slider_t != $request->input('slider_t') ? $rsptd->slider_t= $request->input('slider_t'): null;
        $rsptd->slider_d != $request->input('slider_d') ? $rsptd->slider_d= $request->input('slider_d'): null;
        $rsptd->sec_1_t != $request->input('sec_1_t') ? $rsptd->sec_1_t= $request->input('sec_1_t'): null;
        $rsptd->sec_1_m != $request->input('sec_1_m') ? $rsptd->sec_1_m= $request->input('sec_1_m'): null;
        $rsptd->sec_1_d != $request->input('sec_1_d') ? $rsptd->sec_1_d= $request->input('sec_1_d'): null;
        $rsptd->sec_2_p_1_t != $request->input('sec_2_p_1_t') ? $rsptd->sec_2_p_1_t= $request->input('sec_2_p_1_t'): null;
        $rsptd->sec_2_p_2_t != $request->input('sec_2_p_2_t') ? $rsptd->sec_2_p_2_t= $request->input('sec_2_p_2_t'): null;
        $rsptd->sec_2_p_3_t != $request->input('sec_2_p_3_t') ? $rsptd->sec_2_p_3_t= $request->input('sec_2_p_3_t'): null;
        $rsptd->sec_2_p_1_d != $request->input('sec_2_p_1_d') ? $rsptd->sec_2_p_1_d= $request->input('sec_2_p_1_d'): null;
        $rsptd->sec_2_p_2_d != $request->input('sec_2_p_2_d') ? $rsptd->sec_2_p_2_d= $request->input('sec_2_p_2_d'): null;
        $rsptd->sec_2_p_3_d != $request->input('sec_2_p_3_d') ? $rsptd->sec_2_p_3_d= $request->input('sec_2_p_3_d'): null;
        $rsptd->sec_3_t != $request->input('sec_3_t') ? $rsptd->sec_3_t= $request->input('sec_3_t'): null;
        $rsptd->sec_3_m != $request->input('sec_3_m') ? $rsptd->sec_3_m= $request->input('sec_3_m'): null;
        $rsptd->sec_4_t != $request->input('sec_4_t') ? $rsptd->sec_4_t= $request->input('sec_4_t'): null;
        $rsptd->sec_4_m != $request->input('sec_4_m') ? $rsptd->sec_4_m= $request->input('sec_4_m'): null;
        $rsptd->sec_5_t != $request->input('sec_5_t') ? $rsptd->sec_5_t= $request->input('sec_5_t'): null;
        $rsptd->sec_5_m != $request->input('sec_5_m') ? $rsptd->sec_5_m= $request->input('sec_5_m'): null;
        $rsptd->sec_5_d != $request->input('sec_5_d') ? $rsptd->sec_5_d= $request->input('sec_5_d'): null;
        if ($request->file("icon")) {
           $icon = $request->file("icon");
            $icon_path = $icon->store('public/reservation/'.auth()->user()->rsp->companyName.'/tmplate');
            $rsptd->icon = $icon_path;
        }if ($request->file("s_1_i")) {
           $s_1_i = $request->file("s_1_i");
            $s_1_i_path = $s_1_i->store('public/reservation/'.auth()->user()->rsp->companyName.'/tmplate');
            $rsptd->s_1_i = $s_1_i_path;
        }if ($request->file("s_2_i")) {
           $s_2_i = $request->file("s_2_i");
            $s_2_i_path = $s_2_i->store('public/reservation/'.auth()->user()->rsp->companyName.'/tmplate');
            $rsptd->s_2_i = $s_2_i_path;
        }if ($request->file("s_3_i")) {
           $s_3_i = $request->file("s_3_i");
            $s_3_i_path = $s_3_i->store('public/reservation/'.auth()->user()->rsp->companyName.'/tmplate');
            $rsptd->s_3_i = $s_3_i_path;
        }if ($request->file("s_4_i")) {
           $s_4_i = $request->file("s_4_i");
            $s_4_i_path = $s_4_i->store('public/reservation/'.auth()->user()->rsp->companyName.'/tmplate');
            $rsptd->s_4_i = $s_4_i_path;
        }if ($request->file("s_5_i")) {
           $s_5_i = $request->file("s_5_i");
            $s_5_i_path = $s_5_i->store('public/reservation/'.auth()->user()->rsp->companyName.'/tmplate');
            $rsptd->s_5_i = $s_5_i_path;
        }
        $rsptd->save();

        return redirect()->route('u2-landingPageData');

    }
}
