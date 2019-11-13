<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Obat;
use Illuminate\Support\Facades\DB;

class ApotekController extends Controller
{
    public function index($id)
    {
      // $obat = Obat::findOrFail($id);
      // $obat3 = Obat::where('apotek_id', '=', $id)->get();

      $obat3 = DB::table('users')
        ->join('obats', 'users.id', '=', 'obats.apotek_id')
        ->join('apotek_profiles', 'users.id', '=', 'apotek_profiles.user_id')
        ->where('apotek_id','=', $id)
        ->orderBy('obats.namaobat');
      $obat3 = $obat3->get();
      $obat4 = $obat3->first();

      return view('apotek', ['obat3' => $obat3, 'obat4' => $obat4]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $products = Product::all();
        $id = $request->input('product');
        $qty = $request->input('quantity');
        $product = Product::find($id);
        /*return $product;*/
        //creating sale data
        $sale = new Sale();
        $sale->product_id = $id;
        $sale->user_id = $user->id;
        $sale->namaobat = $product->namaobat;
        $sale->harga = $product->harga;
        $sale->kuantitas = $qty;

        $sell_price = $product->harga;
        $total = $sell_price * $qty;
        $sale->total= $total;

        $sale->save();

        return view('sale.sale',compact('user','products','sale'))->with('title','Sales');
    }

    //deleting sale item
    public function destroy($id){
        Sale::where('id',$id)->delete($id);
        $notification = [
            'message' => 'Sale Product Deleted Sucessfully.!',
            'alert-type' => 'info'
        ];
        return redirect('/sales')->with($notification);
    }
}
