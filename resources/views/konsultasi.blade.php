@extends('layouts.main')

@section('content')

        <private-chat :user="{{auth()->user()}}"></private-chat>

@endsection
