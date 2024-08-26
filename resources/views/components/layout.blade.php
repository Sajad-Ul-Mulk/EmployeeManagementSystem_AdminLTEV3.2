@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <h1>{{$heading}}</h1>
@stop

@section('content')
{{--    {{$users}}--}}
    {{$slot}}
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
