@extends('layouts.main')

@section('content')

<div class="box">

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
                                    <h4 class="text-center"> Informasu Umum :</h4>
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
                                                <input type="text" name="alamat" class="form-control" id="alamat" value="{{$profil[0]->alamat}}" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Jam Buka</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="jam_buka" class="form-control" id="jam_buka" value="{{$profil[0]->jam_buka}}" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Jam Tutup</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="jam_tutup" class="form-control" id="jam_tutup" value="{{$profil[0]->jam_tutup}}" disabled>
                                            </div>
                                        </div>

                                        <h4 class="text-center"> Informasi Koordinat :</h4>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Latitude</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="latitude" class="form-control" id="latitude" value="{{$profil[0]->latitude}}" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Longitude</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="longitude" class="form-control" id="longitude" value="{{$profil[0]->longitude}}" disabled>
                                            </div>
                                        </div>
                                    </form>
                                </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

    </div>

  @endsection
