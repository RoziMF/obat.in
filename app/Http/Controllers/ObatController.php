<?php

namespace App\Http\Controllers;

use Auth;
use App\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $id = Auth::id();
    $users = \App\User::all();
    $obat = Obat::all();
    $obat2 = Obat::where('apotek_id', '=', $id)->get();
    return view('obat', ['obat' => $obat, 'obat2' => $obat2, 'user' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form_obat', [
        'obat' => new Obat(),
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $obat = new Obat();
      $obat->apotek_id = $request->input('apotekid');
      $obat->namaobat = $request->input('nama');
      $obat->stok = $request->input('stok');
      $obat->harga = $request->input('harga');
      $obat->save();
      return redirect('obat');
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
      $obat = Obat::findOrFail($id);
      return view('form_obat', ['obat' => $obat]);
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
      $obat = Obat::findOrFail($id);
      $obat->namaobat = $request->input('nama');
      $obat->stok = $request->input('stok');
      $obat->harga = $request->input('harga');
      $obat->save();
      return redirect('obat');
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
