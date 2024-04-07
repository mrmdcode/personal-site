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

Route::group(['domain' => 'nfc.localhost'], function () {
    Route::get('/id={id}', function ($id) {
        $nfc = \App\Models\Panel_nfc::where("key",$id)->first();
        if ($nfc){
            if ($nfc->Theme == "temp_1") {
                return view("NFC.temp_1", compact("nfc"));
            }
            if ($nfc->Theme == "temp_2") {
                return view("NFC.temp_2", compact("nfc"));
            }
        }
        return abort(404);
    });
});
Route::group(['domain' => 'res.localhost'], function () {
    Route::get('/',[\App\Http\Controllers\Res\ViewU2DashboardController::class,'LandingPage']);
    Route::prefix("dashboard")->middleware("auth")->group(function (){
        Route::get('/',[\App\Http\Controllers\Res\ViewU2DashboardController::class,'dashboardIndex'])->name("u2-dashboard");
        Route::resource("u2-menu",\App\Http\Controllers\Res\MenuController::class);
        Route::post("categoryStore",[\App\Http\Controllers\Res\MenuController::class,'categoryStore'])->name('u2-menu-category.sote');
        Route::resource("u2-menuItem",\App\Http\Controllers\Res\MenuItemController::class);
        Route::get('setting',[\App\Http\Controllers\Res\ViewU2DashboardController::class,'landingPageData'])->name("u2-landingPageData");
        Route::post('setting',[\App\Http\Controllers\Res\ViewU2DashboardController::class,'storeLPD'])->name("u2-storeLPD");
    });
    Route::get('cafe',function (){
        return view("Reservation.Front.Themes.Theme_1");
    });
});

Route::get('/', function () {
    $setting = \App\Models\Setting::find(1);
    $Works = \App\Models\Works::all();
    return view('Front.Index.index',compact("setting","Works"));
})->name("lp");
//Route::get("/",function (){
//    return view("Reservation.Front.Themes.Theme_1");
//});
Route::post("contact",[\App\Http\Controllers\Back\CURequestController::class,'requestStore'])->name("contact")->middleware("throttle");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix("dashboard")->middleware(["auth",'CheckAdmin'])->group(function (){
    Route::get("/",[\App\Http\Controllers\Back\DashboardSettingController::class,'dashboard'])->name("n-dashboard");
    Route::resource("Setting",\App\Http\Controllers\Back\DashboardSettingController::class);
    Route::get("Request",[\App\Http\Controllers\Back\CURequestController::class,'viewRequests'])->name("Request.Index");
    Route::get("Works",[\App\Http\Controllers\Back\LandingPageController::class,'Works'])->name("Works.Index");
    Route::post("CreateWorks",[\App\Http\Controllers\Back\LandingPageController::class,'StoreWork'])->name("Work.store");
    Route::get("DeleteWork/{id}",[\App\Http\Controllers\Back\LandingPageController::class,'DestroyWork'])->name("Work.destroy");
    Route::get("Posts",[\App\Http\Controllers\Back\LandingPageController::class,'Posts'])->name("Posts.Index");
    Route::get("nfc",[\App\Http\Controllers\Back\PanelNFCController::class,'Panel_nfc'])->name("Panel_nfc.Index");
    Route::post("nfc/store",[\App\Http\Controllers\Back\PanelNFCController::class,'store'])->name("Panel_nfc.store");
    Route::get("nfc/edit/{id}",[\App\Http\Controllers\Back\PanelNFCController::class,'edit'])->name("Panel_nfc.edit");
    Route::put("nfc/update/{id}",[\App\Http\Controllers\Back\PanelNFCController::class,'update'])->name("Panel_nfc.update");
    Route::get("nfc/{id}/delete",[\App\Http\Controllers\Back\PanelNFCController::class,'delete'])->name("Panel_nfc.delete");
    Route::resource("rsp",\App\Http\Controllers\Res\RSPAdminController::class);

});



