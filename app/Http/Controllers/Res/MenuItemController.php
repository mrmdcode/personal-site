<?php

namespace App\Http\Controllers\Res;

use App\Http\Controllers\Controller;
use App\Models\RSCategory;
use App\Models\RSMenu;
use App\Models\RSMenuItem;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{

    public function index()
    {

        $menus =RSMenu::where('rsp_id', auth()->user()->rsp->id)->get();
        $menuItems =RSMenuItem::with('rs_menu')->get();
        return view("Reservation.dashboard.MenuItem.MenuItem" ,compact('menus','menuItems'));

    }

    public function create()
    {
        return abort(404,"you cant access to this part of site");
    }


    public function store(Request $request)
    {
        RSMenuItem::create($request->all(
            "r_s_menu_id",
            "name",
            "description",
            "price")
        );
        session()->flash("status","Menu Item Created");
        return redirect()->route('u2-menuItem.index');

    }


    public function show($id)
    {
        return abort(404,"you cant access to this part of site");
    }

    public function edit($id)
    {
        return abort(404,"you cant access to this part of site");
    }


    public function update(Request $request, $id)
    {
        return abort(404,"you cant access to this part of site");
    }

    public function destroy($id)
    {
        RSMenuItem::destroy($id);
        session()->flash("status","Menu Item Created");
        return redirect()->route('u2-menuItem.index');
    }
}
