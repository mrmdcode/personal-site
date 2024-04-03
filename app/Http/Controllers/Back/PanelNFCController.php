<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Panel_nfc;
use Illuminate\Http\Request;

class PanelNFCController extends Controller
{
    public function Panel_nfc()
    {
        $nfcs = Panel_nfc::all();
        return view("dashboard.PanelNFC.PanelNFC",compact("nfcs"));
    }

    public function store(Request $request)
    {
        $Pic = $request->file('Image');
        $path = $Pic->store('public/nfc/Images');
        $key = time().rand(111,9999);
        Panel_nfc::create([
            "key"=> $key,
            "Image" => $path,
            "Name" => $request->input("Name"),
            "Phone" => $request->input("Phone"),
            "Instagram" => $request->input("Instagram"),
            "Telegram" => $request->input("Telegram"),
            "Rubika" => $request->input("Rubika"),
            "Twitter" => $request->input("Twitter"),
            "WhatsApp" => $request->input("WhatsApp"),
            "Linkedin" => $request->input("Linkedin"),
            "Website" => $request->input("Website"),
            "Theme" => $request->input("Theme"),
        ]);
        session()->flash("status","success");
        return redirect()->route("Panel_nfc.Index");
    }

    public function edit($id)
    {
        $nfc = Panel_nfc::findOrFail($id);
        return view("dashboard.PanelNFC.Edit",compact('nfc'));
    }

    public function update(Request $request,$id)
    {
        Panel_nfc::find($id)->update([
            "Name" => $request->Name,
            "Phone" => $request->Phone,
            "Instagram" => $request->Instagram,
            "Telegram" => $request->Telegram,
            "Rubika" => $request->Rubika,
            "Twitter" => $request->Twitter,
            "WhatsApp" => $request->WhatsApp,
            "Linkedin" => $request->Linkedin,
            "Website" => $request->Website,
            "Theme" => $request->Theme,
        ]);
        session()->flash("sucess","update is success fuly");
        return redirect()->route("Panel_nfc.Index");
    }

    public function delete($id)
    {
        Panel_nfc::destroy($id);
        session()->flash("sucess","Delete is success fuly");
        return redirect()->route("Panel_nfc.Index");
    }
}
