<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApotekController extends Controller
{
    public function index($id)
    {
      // $obat = Obat::findOrFail($id);
      $obat2 = Obat::where('apotek_id', '=', $id)->get();
      return view('obat', ['obat2' => $obat2]);
    }
}
