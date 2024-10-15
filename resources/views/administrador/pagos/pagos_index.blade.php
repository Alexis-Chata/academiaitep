@extends('adminlte::page')

@section('title', 'Pagos')

@section('content_header')

@stop

@section('content')
    <livewire:pagos />
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/style.css"> --}}
    @vite(['resources/css/style.css'])
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
