@extends('layouts.main')

@section('content')

<div class="box-header with-border col-xs-6">
      <h3 class="box-title">Nama Apotek : {{$obat4->name}}</h3>
      <h3 class="box-title">Alamat : {{$obat4->alamat}}</h3>
      <br>
</div>
<div class="box-header with-border col-xs-6">
      <h3 class="box-title">Jam Buka : {{$obat4->jam_buka}}</h3>
      <h3 class="box-title">Jam Tutup : {{$obat4->jam_tutup}}</h3>
      <br>
</div>

<div class="box-body">
      <!-- <div class="row"> -->
        <div class="col-xs-12">
            <!-- /.box-header -->
            <div class="form-body">
                <form class="form-horizontal" method="POST" action="{{ route('product.order') }}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <div class="col-sm-7">
                            <select id="inputState" class="form-control" name="product">
                                @foreach($obat3 as $product)
                                    <option value="{{$product->obatid}}">{{$product->namaobat}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <input type="number" name="quantity" class="form-control" id="name" placeholder="QTY" required>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            <button class="btn btn-primary" type="submit"><strong>+</strong>Add To Cart</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="well">
                <div class="w3l-table-info">
                    <table id="customer" class="table">
                        <thead>
                        <tr>
                            {{--<th class="text-center">ID</th>--}}
                            <th class="text-center">Nama Obat</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Kuantitas</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(\Cart::content() as $sale)
                            <tr>
                                <td class="text-center"><strong>{!! $sale->name !!}</strong></td>
                                <td class="text-center"><strong>{!! $sale->price !!}</strong></td>
                                <td class="text-center"><strong>{!! $sale->qty !!}</strong></td>
                                <td class="text-center"><strong>{!! $sale->subtotal !!}</strong></td>
                                <td class="text-center">
                                    <a class="btn btn-danger" href="{{ route('product.remove',$sale->rowId) }}">Cancel</a>
                                </td>
                            </tr>
                         @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-7">
                        </div>
                        <div class="col-md-5">
                            <h3>Total Semua : {{ \Cart::subtotal() }}</h3>
                        </div>
                    </div>
                    <div class="pull-right">
                        <form class="" action="/payment" method="post">
                          @csrf
                            <button class="btn btn-primary" type="submit" >Simpan</button>
                        </form>
                    </div>
                </div>
                <br>



               <!-- begin:modal Add product -->
                <!-- <div id="myModal_product" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content" >
                            <center>
                                <div class="modal-header">
                                    <div class="row">
                                        <div class="col-md-11">
                                            <h3 class="modal-title">Cash</h3>
                                        </div>
                                        <div class="col-md-1">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                    </div>
                                </div>
                            </center>
                            <div class="modal-body" >
                                <form class="form-horizontal" method="POST" action="/payment">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Customer Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Customer Name" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Cash Amount</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="cash" class="form-control" id="name" placeholder="100" required>
                                        </div>
                                    </div>
                                    <br>
                                    <input class="btn btn-primary" type="submit" value="Save">
                                </form>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- End:modal Add Product -->

            </div>
            <!-- <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Nama Obat</th>
                  <th>Stok</th>
                  <th>Harga</th>
                  <th>Option</th>
                </tr>

                @foreach($obat3 as $key=>$value)
                <tr>
                  <td>{{$value->namaobat}}</td>
                  <td>{{$value->stok}}</td>
                  <td>{{$value->harga}}</td>
                  <td><a href="" class="btn btn-warning">Add to Cart</a></td>
                @endforeach
              </table>
            </div> -->
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        <!-- </div> -->
      </div>

@endsection
