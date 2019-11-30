<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderProduct;
use Auth;
use App\Obat;
use \Cart;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
  //Adding to cart
public function productOrder(Request $request)
{
    $id = $request->input('product');
    $qty = $request->input('quantity');

    $productItem = Obat::find($id);

    //checking Quantity requirement
    $Qty_left = $productItem->stok;
    if ($qty > $Qty_left){

        return redirect()->back()->with('error', 'Stok tidak mencukupi!!');
    }


   Cart::add($productItem ->obatid, $productItem ->namaobat, $qty, $productItem ->harga);

    return redirect()->back()->with('success', 'Obat telah dimasukkan ke keranjang!!');
}


//creating order
public function payment(Request $request)
{
    // $name = $request->input('name');
    // $cash = $request->input('cash');
    $user = Auth::user();
    //
    //
    // $order = new Order();
    //
    // $order->customer_name = $name;
    // $order->customer_cash = $cash;
    // $order->user_id = $user->id;
    //
    // $order->save();

    $allPrice = 0;


    foreach (\Cart::content() as $orderItem) {
        // $apotek = Obat::find($orderItem->apotek_id);
        $orderProduct = new OrderProduct();

        $orderProduct->user_id = $user->id;
        $orderProduct->product_id = $orderItem->id;
        // $orderProduct->apotek_id = $apotek;
        $orderProduct->kuantitas = $orderItem->qty;
        // $orderProduct->status = $orderItem->status;

        $allPrice = $allPrice + $orderProduct->total;

        $orderProduct->save();

        //updateing product table quantity;
        $product = Obat::find($orderProduct->product_id);

        $num = $product->stok - $orderProduct->kuantitas;
        $product->stok = $num;
        // $product->total= $product->harga * $num;
        $product->save();

    }

    // $price = Order::find($order->id);
    // $price->total_price = $allPrice;

    // $change = $cash - $allPrice;
    // $price->change = $change;

    // $price->save();

    Cart::destroy();

    return redirect(route('aktiforder'))->with('success', 'Order Sukses -- segera ambil pesanan anda diapotek');
}


//Adding to cart
public function remove($id)
{
    Cart::remove($id);

    return redirect()->back()->with('success', 'Obat telah dihapus!!');
}

public function history()
{
    $id = Auth::id();
    $users = \App\User::all();
    $order = OrderProduct::all();
    // $order2 = OrderProduct::where('user_id', '=', $id)->get();

    $order2 = DB::table('obats')
      ->join('users', 'users.id', '=', 'obats.apotek_id')
      ->join('order_products', 'order_products.product_id', '=', 'obats.obatid')
      ->where('order_products.user_id','=', $id)
      ->where('order_products.status','=','1')
      ->orderBy('order_products.created_at', 'desc');
    $order2 = $order2->get();

    // $order3 = DB::table('order_products')
    //   ->join('users', 'users.id', '=', 'order_products.user_id')
    //   ->join('obats', 'obats.obatid', '=', 'order_products.product_id')
    //   ->where('obats.apotek_id', '=', $id)
    //   ->orderBy('order_products.created_at', 'desc');
    // $order3 = $order3->get();

    $order3 = DB::table('order_products')
      ->select('order_products.orderid','obats.namaobat','obats.harga','users.name','order_products.kuantitas','order_products.created_at','order_products.status')
      ->join('users', 'users.id', '=', 'order_products.user_id')
      ->join('obats', 'obats.obatid', '=', 'order_products.product_id')
      ->where('obats.apotek_id', '=', $id)
      ->where('order_products.status','=','1')
      ->orderBy('order_products.created_at', 'desc');
    $order3 = $order3->get();


    return view('order', ['order' => $order, 'user' => $users, 'order2' => $order2, 'order3' => $order3]);
}


public function aktiforder()
{
    $id = Auth::id();
    $users = \App\User::all();
    $order = OrderProduct::all();
    // $order2 = OrderProduct::where('user_id', '=', $id)->get();

    $order2 = DB::table('obats')
      ->join('users', 'users.id', '=', 'obats.apotek_id')
      ->join('order_products', 'order_products.product_id', '=', 'obats.obatid')
      ->where('order_products.user_id','=', $id)
      ->where('order_products.status','=','0')
      ->orderBy('order_products.created_at', 'desc');
    $order2 = $order2->get();

    // $order3 = DB::table('order_products')
    //   ->join('users', 'users.id', '=', 'order_products.user_id')
    //   ->join('obats', 'obats.obatid', '=', 'order_products.product_id')
    //   ->where('obats.apotek_id', '=', $id)
    //   ->orderBy('order_products.created_at', 'desc');
    // $order3 = $order3->get();

    $order3 = DB::table('order_products')
      ->select('order_products.orderid','obats.namaobat','obats.harga','users.name','order_products.kuantitas','order_products.created_at','order_products.status')
      ->join('users', 'users.id', '=', 'order_products.user_id')
      ->join('obats', 'obats.obatid', '=', 'order_products.product_id')
      ->where('obats.apotek_id', '=', $id)
      ->where('order_products.status','=','0')
      ->orderBy('order_products.created_at', 'desc');
    $order3 = $order3->get();


    return view('aktiforder', ['order' => $order, 'user' => $users, 'order2' => $order2, 'order3' => $order3]);
}


public function status($id)
{
  $order = OrderProduct::findOrFail($id);
  $order->status = '1';
  $order->save();
  return redirect()->back()->with('success', 'Order telah selesai!!');
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $orderProduct = OrderProduct::findOrFail($id);

      $product = Obat::find($orderProduct->product_id);
      $num = $product->stok + $orderProduct->kuantitas;
      $product->stok = $num;
      $product->save();

      $orderProduct->delete();

      return redirect('aktiforder')->with('success', 'Pemesanan Dibatalkan!');
    }



}
