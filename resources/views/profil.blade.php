@extends('layouts.main')

@section('content')

<div class="box">
@if(Auth::user()->akses == '2')
<div class="box-header with-border">
      <h3 class="box-title">Profile Apotek

      <div class="box-tools pull-right">
        <a href="{{ route('apotekProfil.edit', Auth::user()->id) }}" class="btn btn-warning"><i class="fa fa-plus-circle">Ubah Data</i></a>
      </div></h3>
</div>
<div class="box-body">
      <div class="row">
        <div class="col-xs-12">
            <!-- /.box-header -->
            <div class="form-title">
                <h4 class="text-center"> Informasi Umum :</h4>
            </div>
                                <div class="form-body">
                                    <form class="form-horizontal" >
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Nama Apotek</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="nama" class="form-control" id="name" value="{{Auth::user()->name}}" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Alamat</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="alamat" class="form-control" id="alamat" value="{{$profil->alamat}}" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Jam Buka</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="jam_buka" class="form-control" id="jam_buka" value="{{$profil->jam_buka}}" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Jam Tutup</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="jam_tutup" class="form-control" id="jam_tutup" value="{{$profil->jam_tutup}}" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Apoteker</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="apoteker" class="form-control" id="apoteker" value="{{$profil->apoteker}}" disabled>
                                            </div>
                                        </div>

                                        <h4 class="text-center"> Informasi Koordinat :</h4>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Latitude</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="latitude" class="form-control" id="latitude" value="{{$profil->latitude}}" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Longitude</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="longitude" class="form-control" id="longitude" value="{{$profil->longitude}}" disabled>
                                            </div>
                                        </div>
                                    </form>
                                </div>
            <!-- /.box-body -->
        </div>
          <!-- /.box -->
      </div>
</div>

@elseif(Auth::user()->akses == '1')
<div class="box-header with-border">
      <h3 class="box-title">Profile Pengguna(Umum)

      <div class="box-tools pull-right">
        <a href="{{ route('peopleProfil.edit', Auth::user()->id) }}" class="btn btn-warning"><i class="fa fa-plus-circle">Ubah Data</i></a>
      </div></h3>
</div>
<div class="box-body">
      <div class="row">
        <div class="col-xs-12">
            <!-- /.box-header -->
            <div class="form-title">
                <h4 class="text-center"> Informasi Umum :</h4>
            </div>
                                <div class="form-body">
                                    <form class="form-horizontal" >
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Nama Pengguna</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="nama" class="form-control" id="name" value="{{Auth::user()->name}}" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Alamat</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="alamat" class="form-control" id="alamat" value="{{$pprofil->alamat}}" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Tanggal Lahir</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="jam_buka" class="form-control" id="jam_buka" value="{{$pprofil->tgl_lahir}}" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">No HP</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="jam_tutup" class="form-control" id="jam_tutup" value="{{$pprofil->no_hp}}" disabled>
                                            </div>
                                        </div>

                                    </form>
                                </div>
            <!-- /.box-body -->
        </div>
          <!-- /.box -->
      </div>
</div>

@elseif(Auth::user()->akses == '3')
<div class="box-header with-border">
      <h3 class="box-title">Profile Dokter

      <div class="box-tools pull-right">
        <a href="{{ route('dokterProfil.edit', Auth::user()->id) }}" class="btn btn-warning"><i class="fa fa-plus-circle">Ubah Data</i></a>
      </div></h3>
</div>
<div class="box-body">
      <div class="row">
        <div class="col-xs-12">
            <!-- /.box-header -->
            <div class="form-title">
                <h4 class="text-center"> Informasi Umum :</h4>
            </div>
                                <div class="form-body">
                                    <form class="form-horizontal" >
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Nama Dokter</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="nama" class="form-control" id="name" value="{{Auth::user()->name}}" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Alamat Praktek</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="alamatdinas" class="form-control" id="alamatdinas" value="{{$dprofil->alamatdinas}}" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">NIP</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="nip" class="form-control" id="nip" value="{{$dprofil->nip}}" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">No HP</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="no_hp" class="form-control" id="no_hp" value="{{$dprofil->no_hp}}" disabled>
                                            </div>
                                        </div>

                                    </form>
                                </div>
            <!-- /.box-body -->
        </div>
          <!-- /.box -->
      </div>
</div>

@else

@endif

</div>

@endsection
