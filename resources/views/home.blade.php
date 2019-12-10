@extends('layouts.main')

@section('content')

@if(Auth::user()->akses == '3')
        <h1 style="text-align: center">HOMEPAGE Dokter</h1>

@elseif(Auth::user()->akses == '1')
<div style="margin-top: 15px;" class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div style="background-color: red; height: 235px" class="card bg-gradient-danger card-img-holder ">
                  <div class="card-body">
                    <img style="height: 200px" src="{{ url('/') }}/assets/images/dashboard/circle.svg" class="pull-right card-img-absolute" alt="circle-image" />

                    <h1 class="mb-5 text-white">{{count($pesan2)}}</h1>

                    <h3 class="font-weight-normal mb-3 text-white">Total Semua Pemesanan<i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h3>
                    <h5 class="pull-right text-white">More Info</h5>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div style="background-color: green; height: 235px" class="card bg-gradient-danger card-img-holder ">
                  <div class="card-body">
                    <img style="height: 200px" src="{{ url('/') }}/assets/images/dashboard/circle.svg" class="pull-right card-img-absolute" alt="circle-image" />

                    <h1 class="mb-5 text-white">{{count($pesan3)}}</h1>

                    <h3 class="font-weight-normal mb-3 text-white">Total Pemesanan yang Masih Aktif<i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h3>
                    <h5 class="pull-right text-white">More Info</h5>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div style="background-color: blue; height: 235px" class="card bg-gradient-danger card-img-holder ">
                  <div class="card-body">
                    <img style="height: 200px" src="{{ url('/') }}/assets/images/dashboard/circle.svg" class="pull-right card-img-absolute" alt="circle-image" />

                    <h1 class="mb-5 text-white">{{count($pesan4)}}</h1>

                    <h3 class="font-weight-normal mb-3 text-white">Total Pemesanan yang Sudah Selesai<i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h3>
                    <h5 class="pull-right text-white">More Info</h5>
                  </div>
                </div>
              </div>
</div>

@elseif(Auth::user()->akses == '2')
<div style="margin-top: 15px;" class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div style="background-color: red; height: 235px" class="card bg-gradient-danger card-img-holder ">
                  <div class="card-body">
                    <img style="height: 200px" src="{{ url('/') }}/assets/images/dashboard/circle.svg" class="pull-right card-img-absolute" alt="circle-image" />

                    <h1 class="mb-5 text-white">{{count($pesan2a)}}</h1>

                    <h3 class="font-weight-normal mb-3 text-white">Total Semua Pemesanan<i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h3>
                    <h5 class="pull-right text-white">More Info</h5>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div style="background-color: green; height: 235px" class="card bg-gradient-danger card-img-holder ">
                  <div class="card-body">
                    <img style="height: 200px" src="{{ url('/') }}/assets/images/dashboard/circle.svg" class="pull-right card-img-absolute" alt="circle-image" />

                    <h1 class="mb-5 text-white">{{count($pesan3a)}}</h1>

                    <h3 class="font-weight-normal mb-3 text-white">Total Pemesanan yang Masih Aktif<i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h3>
                    <h5 class="pull-right text-white">More Info</h5>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div style="background-color: blue; height: 235px" class="card bg-gradient-danger card-img-holder ">
                  <div class="card-body">
                    <img style="height: 200px" src="{{ url('/') }}/assets/images/dashboard/circle.svg" class="pull-right card-img-absolute" alt="circle-image" />

                    <h1 class="mb-5 text-white">{{count($pesan4a)}}</h1>

                    <h3 class="font-weight-normal mb-3 text-white">Total Pemesanan yang Sudah Selesai<i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h3>
                    <h5 class="pull-right text-white">More Info</h5>
                  </div>
                </div>
              </div>
</div>

@else
<div style="margin-top: 15px;" class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div style="background-color: red; height: 235px" class="card bg-gradient-danger card-img-holder ">
                  <div class="card-body">
                    <img style="height: 200px" src="{{ url('/') }}/assets/images/dashboard/circle.svg" class="pull-right card-img-absolute" alt="circle-image" />

                    <h1 class="mb-5 text-white">{{count($pesan)}}</h1>

                    <h3 class="font-weight-normal mb-3 text-white">Total Semua Pemesanan<i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h3>
                    <h5 class="pull-right text-white">More Info</h5>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div style="background-color: green; height: 235px" class="card bg-gradient-danger card-img-holder ">
                  <div class="card-body">
                    <img style="height: 200px" src="{{ url('/') }}/assets/images/dashboard/circle.svg" class="pull-right card-img-absolute" alt="circle-image" />

                    <h1 class="mb-5 text-white">{{count($pesan3b)}}</h1>

                    <h3 class="font-weight-normal mb-3 text-white">Total Pemesanan yang Masih Aktif<i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h3>
                    <h5 class="pull-right text-white">More Info</h5>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div style="background-color: blue; height: 235px" class="card bg-gradient-danger card-img-holder ">
                  <div class="card-body">
                    <img style="height: 200px" src="{{ url('/') }}/assets/images/dashboard/circle.svg" class="pull-right card-img-absolute" alt="circle-image" />

                    <h1 class="mb-5 text-white">{{count($pesan4b)}}</h1>

                    <h3 class="font-weight-normal mb-3 text-white">Total Pemesanan yang Sudah Selesai<i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h3>
                    <h5 class="pull-right text-white">More Info</h5>
                  </div>
                </div>
              </div>
</div>

@endif

@endsection
