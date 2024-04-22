<?php

namespace App\Http\Controllers\Res;

use App\Http\Controllers\Controller;
use App\Models\RSTimeSlot;

class u2TableTimeController extends Controller
{
    public function index($id)
    {
        $times = RSTimeSlot::where('r_s_table_id',$id)->get();
        return view('Reservation.dashboard.TableTimes.TableTimes',compact('times'));
    }


    public function store()
    {
        session()->flash('status','success');
        session()->flash('message','time created.');
        return redirect()->route('u2-table.index');
    }

    public function destroy()
    {
        session()->flash('status','success');
        session()->flash('message','time Deleted.');
        return redirect()->route('u2-table.index');
    }
}
