<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\ApotekProfile;
use Illuminate\Http\Request;

class ApotekProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $id = Auth::id();
      $user = User::all();
      $profil = ApotekProfile::where('user_id', '=', $id)->get();

      if (is_null($profil)) {
        $profile = new ApotekProfile();
        $profile->user_id = $id;
        $profile->save();
      }else {

      }

      return view('profil', ['profil' => $profil, 'user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $id = Auth::id();
      $user = \App\User::all();
      $profil = ApotekProfile::where('user_id', '=', $id)->get();
      return view('form_apotekprofile', ['profil' => $profil, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $profil = ApotekProfile::findOrFail($id);
        $profil->alamat = $request->input('alamat');
        $profil->jam_buka = $request->input('jam_buka');
        $profil->jam_tutup = $request->input('jam_tutup');
        $profil->latitude = $request->input('latitude');
        $profil->longitude = $request->input('longitude');
        $profil->user_id = $request->input('userID');
        $profil->save();
        return redirect('apotekProfil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
