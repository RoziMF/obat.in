<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\OrderProduct;
use Auth;
use DB;

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
        $id = Auth::id();
        $pesan = OrderProduct::all();
        $pesan4b = OrderProduct::where('status', '=', 1)->get();
        $pesan3b = OrderProduct::where('status', '=', 0)->get();
        $pesan2 = OrderProduct::where('user_id', '=', $id)->get();
        $pesan4 = OrderProduct::where('user_id', '=', $id)->where('status', '=', 1)->get();
        $pesan3 = OrderProduct::where('user_id', '=', $id)->where('status', '=', 0)->get();
        $pesan2a = DB::table('order_products')
          ->select('order_products.orderid','obats.namaobat','obats.harga','users.name','order_products.kuantitas','order_products.created_at','order_products.status')
          ->join('users', 'users.id', '=', 'order_products.user_id')
          ->join('obats', 'obats.obatid', '=', 'order_products.product_id')
          ->where('obats.apotek_id', '=', $id)
          ->get();
        $pesan4a = DB::table('order_products')
          ->select('order_products.orderid','obats.namaobat','obats.harga','users.name','order_products.kuantitas','order_products.created_at','order_products.status')
          ->join('users', 'users.id', '=', 'order_products.user_id')
          ->join('obats', 'obats.obatid', '=', 'order_products.product_id')
          ->where('obats.apotek_id', '=', $id)
          ->where('order_products.status','=','1')
          ->get();
        $pesan3a = DB::table('order_products')
          ->select('order_products.orderid','obats.namaobat','obats.harga','users.name','order_products.kuantitas','order_products.created_at','order_products.status')
          ->join('users', 'users.id', '=', 'order_products.user_id')
          ->join('obats', 'obats.obatid', '=', 'order_products.product_id')
          ->where('obats.apotek_id', '=', $id)
          ->where('order_products.status','=','0')
          ->get();
        return view('home', [
          'pesan4' => $pesan4,
          'pesan2' => $pesan2,
          'pesan3' => $pesan3,
          'pesan4a' => $pesan4a,
          'pesan2a' => $pesan2a,
          'pesan3a' => $pesan3a,
          'pesan4b' => $pesan4b,
          'pesan3b' => $pesan3b,
          'pesan' => $pesan
        ]);
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

    public function cari()
    {
        return view('search');
    }

    public function reguser()
    {
        return view('reg2');
    }

    public function userstore(Request $request)
    {
        $this->validate($request,[
          'name' => 'required|string|max:255',
          'email' => 'required|string|email|max:255|unique:users',
          'password' => 'required|string|min:6|confirmed',
          'akses' => 'required',
        ]);

        $request['password'] = bcrypt($request->password);

        $user = User::create($request->all());

        return redirect(route('reguser'));

    }

}
