@extends('layouts.main')

@section('content')

<div class="box">

<div class="box-header with-border">
      <h3 class="box-title">Form Profile Masyarakat</h3>
</div>

<div class="box-body">
      <div class="row">
        <div class="col-xs-12">
            <!-- /.box-header -->
            <div class="form-title">
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

                                <div class="form-body">

                                    <form class="form-horizontal" method="post" action="{{ route('peopleProfil.update', $pprofil->profileid) }}" >
                                      @csrf
                                      @method('PUT')

                                      <input type="hidden" name="userID" class="form-control" id="userID" value="{{Auth::user()->id}}" readonly>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Nama</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="nama" class="form-control" id="name" value="{{Auth::user()->name}}" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Alamat</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="alamat" class="form-control" id="alamatdinas" value="{{$pprofil->alamat}}" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Tanggal Lahir</label>
                                            <div class="col-sm-9">
                                                <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" value="{{$pprofil->tgl_lahir}}" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">No HP</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="no_hp" class="form-control" id="no_hp" value="{{$pprofil->no_hp}}" >
                                            </div>
                                        </div>


                                        <!-- <div id="mapid"></div> -->

                                        <div class="box-footer col-sm-offset-9 col-sm-2">
                                          <button type="submit" class="btn btn-info pull-right">Simpan</button>
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
