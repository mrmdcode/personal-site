<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Works;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function Works()
    {
        $works = Works::all();
        return view("dashboard.LandingPage.Works",compact("works"));
    }

    public function StoreWork(Request $request)
    {
        $file = $request->file("image");
        $path = $file->store("public/Images");
        Works::create([
            "title"=> $request->title,
            "type"=> $request->type,
            "linkedin"=> $request->linkedin,
            "image"=> $path,
        ]);
        session()->flash("status","success");
        return redirect()->route("Works.Index");
    }

    public function DestroyWork($id)
    {
        Works::destroy($id);
        session()->flash("status","delete");
        return redirect()->route("Works.Index");
    }

    public function Posts()
    {
        return view("dashboard.LandingPage.Posts");

    }
}
