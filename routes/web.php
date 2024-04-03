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

//Route::group(['domain' => '{data}.{services}.'.env("APP_URL")], function () {
//    Route::get('/', function ($data,$service) {
//        return [$data,$service];
//    });
//});

Route::get('/', function () {
    $setting = \App\Models\Setting::find(1);
    $Works = \App\Models\Works::all();
    return view('Front.Index.index',compact("setting","Works"));
})->name("lp");
Route::post("contact",[\App\Http\Controllers\Back\CURequestController::class,'requestStore'])->name("contact");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix("dashboard")->group(function (){
    Route::resource("Setting",\App\Http\Controllers\Back\DashboardSettingController::class);
    Route::get("Request",[\App\Http\Controllers\Back\CURequestController::class,'viewRequests'])->name("Request.Index");
    Route::get("Works",[\App\Http\Controllers\Back\LandingPageController::class,'Works'])->name("Works.Index");
    Route::post("CreateWorks",[\App\Http\Controllers\Back\LandingPageController::class,'StoreWork'])->name("Work.store");
    Route::get("DeleteWork/{id}",[\App\Http\Controllers\Back\LandingPageController::class,'DestroyWork'])->name("Work.destroy");
    Route::get("Posts",[\App\Http\Controllers\Back\LandingPageController::class,'Posts'])->name("Posts.Index");
})->middleware("auth");



