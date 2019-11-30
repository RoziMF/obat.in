@extends('layouts.main')

@section('content')

<div class="box">

<div class="box-header with-border">
      <h3 class="box-title">Form Profile Dokter</h3>
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

                                    <form class="form-horizontal" method="post" action="{{ route('dokterProfil.update', $dprofil->profileid) }}" >
                                      @csrf
                                      @method('PUT')

                                      <input type="hidden" name="userID" class="form-control" id="userID" value="{{Auth::user()->id}}" >
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Nama Dokter</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="nama" class="form-control" id="name" value="{{Auth::user()->name}}" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Alamat Praktek</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="alamatdinas" class="form-control" id="alamatdinas" value="{{$dprofil->alamatdinas}}" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">NIP</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="nip" class="form-control" id="nip" value="{{$dprofil->nip}}" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">No HP</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="no_hp" class="form-control" id="no_hp" value="{{$dprofil->no_hp}}" >
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
