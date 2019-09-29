<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
Use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){

      if (Auth::attempt([
        'email' => $request->email,
        'password' =>$request->password
        ]))
      {

          $user = User::where('email', $request->email)->first();

          if ($user->akses == 1) {
            return redirect()->route('homepeople');
          }elseif ($user->akses == 2) {
            return redirect()->route('homeapotek');
          }elseif ($user->akses == 3) {
            return redirect()->route('homedokter');
          }else {
            return redirect()->route('homeadmin');
          }

      }
      return redirect()->back();

    }
}
