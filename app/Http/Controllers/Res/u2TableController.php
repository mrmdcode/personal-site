<?php

namespace App\Http\Controllers\Res;

use App\Http\Controllers\Controller;
use App\Models\RSTable;
use Illuminate\Http\Request;

class u2TableController extends Controller
{

    public function index()
    {
        $tables = RSTable::where('rsp_id',auth()->user()->id)->get();
        return view("Reservation.dashboard.Table.index" ,compact('tables'));
    }

    public function create()
    {
        return redirect()->route('u2-table.index');
    }

    public function store(Request $request)
    {
        RSTable::create([
            'rsp_id' => auth()->user()->rsp->id,
            'name'=>$request->input('name')
        ]);
        session()->flash('status','success');
        session()->flash('message','Category Created.');
        return redirect()->route('u2-table.index');

    }

    public function show($id)
    {
        return redirect()->route('u2-table.index');
        //
    }

    public function edit($id)
    {
        return redirect()->route('u2-table.index');
        //
    }

    public function update(Request $request, $id)
    {
        //
        return redirect()->route('u2-table.index');
    }

    public function destroy($id)
    {
        RSTable::destroy($id);
        session()->flash('status','success');
        session()->flash('message','Category Created.');
        return redirect()->route('u2-table.index');
    }
}
