@extends('layouts.dokter')

@section('content')

        <private-chat :user="{{auth()->user()}}"></private-chat>

@endsection
