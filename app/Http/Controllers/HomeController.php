<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (\auth()->user()->type == "admin"){
            return redirect()->route("n-dashboard");
        }
        if (\auth()->user()->type == "user1"){
            return redirect()->route("u1-dashboard");
        }
        if (\auth()->user()->type == "user2"){
            return redirect()->route("u2-dashboard");
        }
        if (\auth()->user()->type == "order-taker"){
            return redirect()->route("order-taker.index");
        }

    }
}
