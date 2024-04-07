<?php

namespace App\Http\Controllers\Res;

use App\Http\Controllers\Controller;
use App\Models\RSCategory;
use App\Models\RSMenu;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function index()
    {
        $category =RSCategory::paginate(4);
        $categories =RSCategory::all();
        $menus =RSMenu::where('rsp_id', auth()->user()->rsp->id)->with('category')->paginate(3);
        return view("Reservation.dashboard.Menu.Menu" ,compact('categories','menus','category'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        RSMenu::create($request->all());
        session()->flash('status','menu created ');
        return $this->index();
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }

    public function categoryStore(Request $req)
    {
        RSCategory::create([
            'name' => $req->name,
            'rsp_id' => auth()->user()->rsp->id
        ]);
        session()->flash('status','Category Created.');
        return redirect()->route('u2-menu.index');
    }
}
