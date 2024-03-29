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
        $fileMetaVoImage = $request->file("metaVoImage");
        $pathMetaVoImage = $fileMetaVoImage->store("public/Images");
//        dd($pathMetaVoImage);
        $fileMyPic = $request->file("myPic");
        $pathMyPic = $fileMyPic->store("public/Images");
        $fileIcon = $request->file("icon");
        $pathIcon = $fileIcon->store("public/Images");



        Setting::where("id",$id)->update([
          "title" => $request->title ,
          "myName" => $request->myName ,
          "myPosition" => $request->myPosition ,
          "metaKeyword" => $request->metaKeyword ,
          "metaDescription" => $request->metaDescription ,
          "metaAuthor" => $request->metaAuthor ,
          "metaCopyright" => $request->metaCopyright ,
          "metaRobots" => $request->metaRobots ,
          "metaLang" => $request->metaLang ,
          "metaVoTitle" => $request->metaVoTitle ,
          "metaVoDescription" => $request->metaVoDescription ,
          "metaVoType" => $request->metaVoType ,
          "metaVoUrl" => $request->metaVoUrl ,
          "metaVoImage" => $pathMetaVoImage,
          "myPic" => $pathMyPic,
          "icon" => $pathIcon,
        ]);
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
