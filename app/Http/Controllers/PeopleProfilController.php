<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\PeopleProfile;
use Illuminate\Http\Request;

class PeopleProfilController extends Controller
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
      $pprofil = PeopleProfile::where('user_id', '=', $id)->first();
      //
      // if (is_null($profil)) {
      //   $profile = new ApotekProfile();
      //   $profile->user_id = $id;
      //   $profile->save();
      // }else {
      //
      // }

      return view('profil', ['pprofil' => $pprofil, 'user' => $user]);
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
      $pprofil = PeopleProfile::where('user_id', '=', $id)->first();
      return view('form_peopleprofile', ['pprofil' => $pprofil, 'user' => $user]);
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
      $messages = [
        'required' => ':attribute tidak boleh kosong!',
        'min' => ':attribute minimal 10 angka!',
        'numeric' => ':attribute harus diisi angka!!!',
      ];

      $this->validate($request,[
          'tgl_lahir'=>'required|before:today',
          'alamat'=>'required',
          'no_hp'=>'required|min:999999999|numeric'
      ],$messages);

      $profil = PeopleProfile::findOrFail($id);
      $profil->alamat = $request->input('alamat');
      $profil->tgl_lahir = $request->input('tgl_lahir');
      $profil->no_hp = $request->input('no_hp');
      $profil->save();
      return redirect('peopleProfil')->with('success', 'Profil Telah Diupdate!');
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
