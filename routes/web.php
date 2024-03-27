<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Front.Index.index');
})->name("home");
Route::post("contact",function (\Illuminate\Http\Request $req){
    \Illuminate\Support\Facades\Mail::
    to("dr.mahdikazemizade84@gmail.com")
        ->send(new \App\Mail\RequestMail(
            $req->all(["name" ,"email" ,"subject" ,"phone" ,"message"])
        ));
        return redirect()->route("home");

})->name("contact");
