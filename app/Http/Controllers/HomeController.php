<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

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
  

    public function home()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    public function konsultasi()
    {
        return view('konsultasi');
    }

    public function users()
    {

      if (Auth::user()->akses == "3") {
        $user = User::where('akses', '=', '1')->get();
        return $user;
      }else {
        $user = User::where('akses', '=', '3')->get();
        return $user;
      }

    }
}
