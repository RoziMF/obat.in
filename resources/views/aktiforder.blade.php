@extends('layouts.main')

@section('content')
@if(Auth::user()->akses == '1')
<div class="box-header with-border">
      <h3 class="box-title">Aktif Order</h3>
</div>
@else
<div class="box-header with-border">
      <h3 class="box-title">Aktif Order</h3>
</div>
@endif

@if(Auth::user()->akses == '1')
<div class="box-body">
      <div class="row">
        <div class="col-xs-12">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Nama Obat</th>
                  <th>Harga</th>
                  <th>Nama Apotek</th>
                  <th>Kuantitas</th>
                  <th>Tanggal</th>
                  <th>Total</th>
                  <th>Status</th>
                  <th>Option</th>
                </tr>

                @foreach($order2 as $key=>$value)
                <tr>
                  <td>{{$value->namaobat}}</td>
                  <td>{{$value->harga}}</td>
                  <td>{{$value->name}}</td>
                  <td>{{$value->kuantitas}}</td>
                  <td>{{$value->created_at}}</td>
                  <td>{{$value->harga*$value->kuantitas}}</td>
                  <td>
                    @if ($value->status == 0)
                      Belum Diproses
                    @else
                      Telah Diambil
                    @endif
                  </td>
                  <td>
                    <form action="{{ route('order.destroy', $value->orderid)}}" method="post" id="batal">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Batal</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
</div>
@else
<div class="box-body">
      <div class="row">
        <div class="col-xs-12">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Nama Obat</th>
                  <th>Harga</th>
                  <th>Nama Customer</th>
                  <th>Kuantitas</th>
                  <th>Tanggal</th>
                  <th>Total</th>
                  <th>Status</th>
                  <th>Option</th>
                </tr>

                @foreach($order3 as $key=>$value)
                <tr>
                  <td>{{$value->namaobat}}</td>
                  <td>{{$value->harga}}</td>
                  <td>{{$value->name}}</td>
                  <td>{{$value->kuantitas}}</td>
                  <td>{{$value->created_at}}</td>
                  <td>{{$value->harga*$value->kuantitas}}</td>
                  <td>
                    @if ($value->status == 0)
                      Belum Diproses
                    @else
                      Telah Diambil
                    @endif
                  </td>
                  <td>
                    <form class="" action="{{ route('order.status', $value->orderid) }}" method="post">
                      @csrf
                      @method('PUT')
                        <button class="btn btn-primary" type="submit" >Selesai</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
@endif

@endsection
