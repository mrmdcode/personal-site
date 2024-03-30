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
    $setting = \App\Models\Setting::find(1);
    return view('Front.Index.index',compact("setting"));
})->name("home");
Route::post("contact",function (\Illuminate\Http\Request $req){
    \Illuminate\Support\Facades\Mail::
    to("dr.mahdikazemizade84@gmail.com")
        ->send(new \App\Mail\RequestMail(
            $req->all(["name" ,"email" ,"subject" ,"phone" ,"message"])
        ));
        return redirect()->route("home");

})->name("contact");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix("dashboard")->group(function (){
    Route::resource("Setting",\App\Http\Controllers\Back\DashboardSettingController::class);
})->middleware("auth");
