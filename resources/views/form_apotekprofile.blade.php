@extends('layouts.main')

@section('content')

<div class="box">

<div class="box-header with-border">
      <h3 class="box-title">Form Profile Apotek</h3>
</div>

<div class="box-body">
      <div class="row">
        <div class="col-xs-12">
            <!-- /.box-header -->
            <div class="form-title">
                                    <h4 class="text-center"> Basic Information:</h4>
                                </div>
                                <div class="form-body">

                                    <form class="form-horizontal" method="post" action="{{ route('apotekProfil.update', Auth::user()->id) }}" >
                                      @csrf
                                      @method('PUT')

                                      <input type="hidden" name="userID" class="form-control" id="userID" value="{{Auth::user()->id}}" >
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Nama Apotek</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="nama" class="form-control" id="name" value="{{Auth::user()->name}}" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Alamat</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="alamat" class="form-control" id="alamat" value="{{$profil[0]->alamat}}" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Jam Buka</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="jam_buka" class="form-control" id="jam_buka" value="{{$profil[0]->jam_buka}}" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Jam Tutup</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="jam_tutup" class="form-control" id="jam_tutup" value="{{$profil[0]->jam_tutup}}" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Latitude</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="latitude" class="form-control" id="latitude" value="{{$profil[0]->latitude}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Longitude</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="longitude" class="form-control" id="longitude" value="{{$profil[0]->longitude}}">
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

  @section('styles')
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
      integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
      crossorigin=""/>

  <style>
    #mapid { height: 300px; width: 80%; margin-left: 11%; margin-bottom: 15px;}
  </style>
  @endsection

  @push('scripts')
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>

<!-- location control -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.css" />

<!-- location control -->
<script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.js" charset="utf-8"></script>

<script>
    var mapCenter = [{{ request('latitude', config('leaflet.map_center_latitude')) }}, {{ request('longitude', config('leaflet.map_center_longitude')) }}];
    var map = L.map('mapid').setView(mapCenter, {{ config('leaflet.zoom_level') }});

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var marker = L.marker(mapCenter).addTo(map);
    function updateMarker(lat, lng) {
        marker
        .setLatLng([lat, lng])
        .bindPopup("Your location :  " + marker.getLatLng().toString())
        .openPopup();
        return false;
    };

    map.on('click', function(e) {
        let latitude = e.latlng.lat.toString().substring(0, 15);
        let longitude = e.latlng.lng.toString().substring(0, 15);
        $('#latitude').val(latitude);
        $('#longitude').val(longitude);
        updateMarker(latitude, longitude);
    });

    var updateMarkerByInputs = function() {
        return updateMarker( $('#latitude').val() , $('#longitude').val());
    }
    $('#latitude').on('input', updateMarkerByInputs);
    $('#longitude').on('input', updateMarkerByInputs);

    L.control.locate({
        position: "bottomright"
    }).addTo(map);
</script>
@endpush
