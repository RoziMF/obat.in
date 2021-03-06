@extends('layouts.main')

@section('content')

<div class="box">

<div class="box-header with-border">
      <h3 class="box-title">Form Data Obat</h3>
</div>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
             @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
             @endforeach
        </ul>
    </div>
@endif

<div class="box-body">
    @if($obat->obatid > 0)
    <form class="form-horizontal" method="post" action="{{ route('obat.update', $obat->obatid) }}">
      @csrf
      @method('PUT')
    @else
    <form class="form-horizontal" method="post" action="{{ route('obat.store') }}">
      @csrf
    @endif
            <div class="box-body">
              <input type="hidden" class="form-control" value="{{ Auth::user()->id }}" name="apotekid">
              <div class="form-group">
                <label for="inputNama" class="col-sm-3 control-label">Nama Obat</label>

                <div class="col-sm-6">
                  <input type="text" class="form-control" value="{{ $obat->namaobat }}" name="nama" placeholder="Masukkan Nama Obat" required>
                </div>
              </div>

              <div class="form-group">
                <label for="inputjumlah" class="col-sm-3 control-label">Stok</label>

                <div class="col-sm-6">
                  <input type="text" class="form-control" value="{{ $obat->stok }}" name="stok" placeholder="Jumlah Stok" required>
                </div>
              </div>

              <div class="form-group">
                <label for="inputharga" class="col-sm-3 control-label">Harga</label>

                <div class="col-sm-6">
                  <input type="text" class="form-control" value="{{$obat->harga}}" name="harga" placeholder="Harga" required>
                </div>
              </div>

              <!-- <div class="form-group">
                <label for="gambarobat" class="col-sm-3 control-label">Foto Obat</label>

                <div class="col-sm-6">
                  <input type="file" class="form-control" value="{{$obat->gambar}}" name="gambar" required>
                </div>
              </div> -->

            <!-- /.box-body -->
            <div class="box-footer col-sm-offset-7 col-sm-2">
              <button type="submit" class="btn btn-info pull-right">Simpan</button>
            </div>
            <!-- /.box-footer -->
            </div>
          </form>

  <!-- /.box-body -->
</div>
</div>

@endsection
