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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
         * Wenn Trennung der User anhand der
         */
        if(Auth::user()->userlevel < 1)
            return $this->showDashboard();
        return $this->showACP();
    }

    public function showDashboard() {
        return view('dashboard');
    }

    public function showACP() {

    }
}
