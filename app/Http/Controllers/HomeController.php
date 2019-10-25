<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

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
        return view('home');
    }
    public function isRole()
    {
        if (Auth()->user()->role == 'restoran') {
            return view('homeRestoran');
        }else if (Auth()->user()->role == 'admin') {
            return view('homeAdmin');
        }else if (Auth()->user()->role == 'ahli gizi') {
            return view('homeAhliGizi');
        }else if (Auth()->user()->role == 'customer') {
            return view('homeCustomer');
        }
    }
    public function restoID()
    {
        $myid = Auth()->user()->id;
        $restoID = \App\Outlet::where('user_id','=',$myid)->first();

        return view('layouts.app',compact('restoID'));
    }
}
