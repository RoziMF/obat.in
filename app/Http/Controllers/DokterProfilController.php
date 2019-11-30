<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\DokterProfile;
use Illuminate\Http\Request;

class DokterProfilController extends Controller
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
      $dprofil = DokterProfile::where('user_id', '=', $id)->first();

      if ($dprofil==false) {
        $dprofil = new PeopleProfile();
        $dprofil->user_id = $id;
        $dprofil->save();
        return view('profil', ['dprofil' => $dprofil, 'user' => $user]);
      }else {
        return view('profil', ['dprofil' => $dprofil, 'user' => $user]);
      }
      
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
      $dprofil = DokterProfile::where('user_id', '=', $id)->first();
      return view('form_dokterprofile', ['dprofil' => $dprofil, 'user' => $user]);
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
          'nip'=>'required|min:999999999|numeric',
          'alamatdinas'=>'required',
          'no_hp'=>'required|min:999999999|numeric'
      ],$messages);

      $profil = DokterProfile::findOrFail($id);
      $profil->alamatdinas = $request->input('alamatdinas');
      $profil->nip = $request->input('nip');
      $profil->no_hp = $request->input('no_hp');
      $profil->save();
      return redirect('dokterProfil')->with('success', 'Profil Telah Diupdate!');
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
