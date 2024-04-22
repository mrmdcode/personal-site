<?php

namespace App\Http\Controllers\Res;

use App\Http\Controllers\Controller;
use App\Models\ReservationServiceProfile;
use App\Models\User;
use Illuminate\Http\Request;

class RSPAdminController extends Controller
{
    public function index()
    {
        $rsps = ReservationServiceProfile::with('user')->get();
//            return $rsps;
        return view("dashboard.ServiceRSP.ServiceRSP",compact('rsps'));
    }
   public function create()
    {
        $user2s = User::where("type","user2")->get();

        return view('dashboard.ServiceRSP.Create' ,compact('user2s'));

    }
    public function store(Request $request)
    {
        $rsp = ReservationServiceProfile::create([
            "companyName" => $request->input('companyName'),
            "admin_user_id" => $request->input('admin_user_id'),
            "informationPhone" => $request->input('informationPhone'),
            "informationActivity" => $request->input('informationActivity'),
            "informationSmTel" => $request->input('informationSmTel'),
            "informationSmIns" => $request->input('informationSmIns'),
            "informationSmWh" => $request->input('informationSmWh'),
        ]);
        session()->flash("status","Create Successfully");
        return redirect()->route("rsp.index");
    }

    public function show($id)
    {
        return abort(404);
    }

    public function edit($id)
    {
        $user2s = User::where("type","user2")->get();
        $rsps = ReservationServiceProfile::findOrFail($id);
        return view('dashboard.ServiceRSP.Edit' ,compact('rsps','user2s'));
    }

    public function update(Request $request, $id)
    {
        ReservationServiceProfile::where('id',$id)->update($request->all(["companyName","admin_user_id","informationPhone","informationActivity","informationSmTel","informationSmIns","informationSmWh",]));
        session()->flash("status","Update Successfully");
        return redirect()->route("rsp.index");
//        return $request;
    }
    public function destroy($id)
    {
        ReservationServiceProfile::destroy($id);
        session()->flash("status","Delete Successfully");
        return redirect()->route("rsp.index");

    }
}
