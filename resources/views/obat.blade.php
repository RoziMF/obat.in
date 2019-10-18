@extends('layouts.main')

@section('content')

<div class="box">

<div class="box-header with-border">
      <h3 class="box-title">Data Obat</h3>

      <div class="box-tools pull-right">
        <a href="{{ route('obat.create') }}" class="btn btn-warning"><i class="fa fa-plus-circle">Tambah Data</i></a>
      </div>
</div>

<div class="box-body">
      <div class="row">
        <div class="col-xs-12">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Nama Obat</th>
                  <th>Stok</th>
                  <th>Harga</th>
                  <th>Option</th>
                </tr>

                @foreach($obat2 as $key=>$value)
                <tr>
                  <td>{{$value->namaobat}}</td>
                  <td>{{$value->stok}}</td>
                  <td>{{$value->harga}}</td>
                  <td><a href="{{ route('obat.edit', $value->id)}}" class="btn btn-warning">Edit</a></td>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

    </div>

  @endsection
