@extends('layouts.people')

@section('content')

        <private-chat :user="{{auth()->user()}}"></private-chat>

@endsection
