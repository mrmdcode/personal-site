<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class DashboardSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::find(1);
        return view("dashboard.Setting.Setting",compact("setting"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return abort(404);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $sett = Setting::where("id",1)->first();
        $sett->title != $request->title ?  $sett->title = $request->title:null;
        $sett->myName != $request->myName ? $sett->myName = $request->myName:null;
        $sett->myPosition != $request->myPosition ? $sett->myPosition = $request->myPosition:null;
        $sett->metaKeyword != $request->metaKeyword ? $sett->metaKeyword = $request->metaKeyword:null;
        $sett->metaDescription != $request->metaDescription ? $sett->metaDescription = $request->metaDescription:null;
        $sett->metaAuthor != $request->metaAuthor ? $sett->metaAuthor = $request->metaAuthor:null;
        $sett->metaCopyright != $request->metaCopyright ? $sett->metaCopyright = $request->metaCopyright:null;
        $sett->metaRobots != $request->metaRobots ? $sett->metaRobots = $request->metaRobots:null;
        $sett->metaLang != $request->metaLang ? $sett->metaLang = $request->metaLang:null;
        $sett->metaVoTitle != $request->metaVoTitle ? $sett->metaVoTitle = $request->metaVoTitle:null;
        $sett->metaVoDescription != $request->metaVoDescription ? $sett->metaVoDescription = $request->metaVoDescription:null;
        $sett->metaVoType != $request->metaVoType ? $sett->metaVoType = $request->metaVoType:null;
        $sett->metaVoUrl != $request->metaVoUrl ? $sett->metaVoUrl = $request->metaVoUrl:null;

        if ($request->file("metaVoImage")){
            $fileMetaVoImage = $request->file("metaVoImage");
            $pathMetaVoImage = $fileMetaVoImage->store("public/Images");
            $sett->metaVoImage = $pathMetaVoImage;
        }
        if ($request->file("myPic")){
            $fileMyPic = $request->file("myPic");
            $pathMyPic = $fileMyPic->store("public/Images");
            $sett->myPic = $pathMyPic;
        }
        if ($request->file("icon")){
            $fileIcon = $request->file("icon");
            $pathIcon = $fileIcon->store("public/Images");
            $sett->icon = $pathIcon;
        }

        $sett->update();

        session()->flash("success" , "update is successfully");
        return redirect()->route("Setting.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return abort(404);
    }
}
