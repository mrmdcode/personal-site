<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\UCRequestRequest;
use App\Models\CURequest;
use Illuminate\Http\Request;

class CURequestController extends Controller
{
    public function requestStore(UCRequestRequest $request)
    {
        CURequest::create([
            "name" => $request->name,
            "email" => $request->email,
            "subject" => $request->subject,
            "phone" => $request->phone,
            "message" => $request->message,
        ]);


        \Illuminate\Support\Facades\Mail::
        to("dr.mahdikazemizade84@gmail.com")
            ->send(new \App\Mail\RequestMail(
                $request->all(["name" ,"email" ,"subject" ,"phone" ,"message"])
        ));

        session()->flash("status","success");
        return redirect()->route("lp");
    }

    public function viewRequests()
    {
        $Requests = CURequest::all();
        return view("dashboard.Request.Request",compact('Requests'));
    }
}
