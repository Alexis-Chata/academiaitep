@extends('adminlte::page')

@section('title', 'Sedes y Series')

@section('content_header')
    <h1>Gestión de Sedes y Series</h1>
@stop

@section('content')
    <livewire:sedes-series>
@stop

@section('css')
    @vite(['resources/css/style.css'])
@stop

@section('js')
    <script>
        console.log("Página de Sedes y Series cargada");
    </script>
@stop