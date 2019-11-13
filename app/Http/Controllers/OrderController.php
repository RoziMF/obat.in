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

        $notification = [
            'message' => 'This product is out of quantity!',
            'alert-type' => 'error'
        ];
        return redirect()->back()->with($notification);
    }


   Cart::add($productItem ->obatid, $productItem ->namaobat, $qty, $productItem ->harga);

    $notification = [
        'message' => 'A product is successfully added to your cart!',
        'alert-type' => 'success'
    ];

    return redirect()->back()->with($notification);
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

    $notification = [
        'message' => 'Order is successfully processed!',
        'alert-type' => 'success'
    ];

    return redirect(route('order'))->with($notification);
}


//Adding to cart
public function remove($id)
{
    Cart::remove($id);
    $notification = [
        'message' => 'An product is successfully removed .!',
        'alert-type' => 'success'
    ];

    return redirect()->back()->with($notification);
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
      ->orderBy('order_products.created_at', 'desc');
    $order2 = $order2->get();

    $order3 = DB::table('order_products')
      ->join('users', 'users.id', '=', 'order_products.user_id')
      ->join('obats', 'obats.obatid', '=', 'order_products.product_id')
      ->where('obats.apotek_id', '=', $id)
      ->orderBy('order_products.created_at', 'desc');
    $order3 = $order3->get();

    return view('order', ['order' => $order, 'user' => $users, 'order2' => $order2, 'order3' => $order3]);
}

public function status($id)
{
  $order = OrderProduct::findOrFail($id);
  $order->status = '1';
  $order->save();
  return redirect()->back();
}

}
