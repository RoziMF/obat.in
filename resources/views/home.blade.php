@extends('layouts.main')

@section('content')

@if(Auth::user()->akses == '3')
        <h1>HOMEPAGE Dokter</h1>
@elseif(Auth::user()->akses == '1')
        <h1>HOMEPAGE People</h1>
@elseif(Auth::user()->akses == '2')
        <h1>HOMEPAGE Apotek</h1>
@else
        <h1>HOMEPAGE Admin</h1>
@endif

@endsection
