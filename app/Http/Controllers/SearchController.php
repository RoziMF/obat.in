<?php

namespace App\Http\Controllers;

use App\Obat;
use DB;
use Auth;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
      $id = Auth::id();
      $users = \App\User::all();
      $obat = Obat::all();
      return view('search', ['obat' => $obat, 'user' => $users]);
    }

    public function cari(Request $request)
	  {
// SELECT * FROM users JOIN obats ON obats.apotek_id = users.id JOIN apotek_profiles ON apotek_profiles.user_id = users.id
		    // menangkap data pencarian
		      $cari = $request->cari;

          // $profile = DB::table('apotek_profiles')
          //   ->join('users', 'users.id', '=', 'apotek_profiles.user_id');
          // $profile = $profile->get();

    		// mengambil data dari table pegawai sesuai pencarian data
		      // $obat = DB::table('obats')
          //   ->join('users', 'users.id', '=', 'obats.apotek_id')
		      //   ->where('namaobat','like',"%".$cari."%");
          // $obat = $obat->get();

          $obat = DB::table('users')
            ->join('obats', 'users.id', '=', 'obats.apotek_id')
            ->join('apotek_profiles', 'users.id', '=', 'apotek_profiles.user_id')
		        ->where('namaobat','like',"%".$cari."%");
          $obat = $obat->get();

    		// mengirim data pegawai ke view index
		      return view('search',['obat' => $obat]);

	}
}
