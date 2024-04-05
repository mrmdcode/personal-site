<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewU2DashboardController extends Controller
{
    public function LandingPage()
    {
        return "res";
    }
    public function dashboardIndex()
    {
        return view("Reservation.dashboard.dashboard");
    }

    public function landingPageData()
    {
        return view("Reservation.dashboard/DataSetting.DataSetting");
    }
}
