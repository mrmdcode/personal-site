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
        return MenuController::index();
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
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
}
