@extends('layouts.main')

@section('content')

<div class="box-header with-border">
      <h3 class="box-title">Hasil Pencarian : </h3>
</div>

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
                  <th>Alamat Apotek</th>
                  <th>Jam Buka</th>
                  <th>Jam Tutup</th>
                  <th>Option</th>
                </tr>

                @foreach($obat as $key=>$value)
                <tr>
                  <td>{{$value->namaobat}}</td>
                  <td>{{$value->harga}}</td>
                  <td>{{$value->name}}</td>
                  <td>{{$value->alamat}}</td>
                  <td>{{$value->jam_buka}}</td>
                  <td>{{$value->jam_tutup}}</td>
                  <td><a href="{{ route('apotek', $value->id)}}" class="btn btn-warning">Cek Apotek</a></td>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

@endsection
