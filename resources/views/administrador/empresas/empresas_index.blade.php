@extends('adminlte::page')

@section('title', 'Empresas')

@section('content_header')
    <h1>Gestión de Empresas</h1>
@stop

@section('content')
    <livewire:empresas>
@stop

@section('css')
    @vite(['resources/css/style.css'])
@stop

@section('js')
    <script>
        console.log("Página de Empresas cargada");
    </script>
@stop