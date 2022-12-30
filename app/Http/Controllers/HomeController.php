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
//        $wep = \App\Models\Weapon::where('id', Auth::user()->weapon);
//        return view('home', compact('wep'));
        $weps = \App\Models\Weapon::all();
        return view('home', compact('weps'));
//        return view('home');
    }
}
