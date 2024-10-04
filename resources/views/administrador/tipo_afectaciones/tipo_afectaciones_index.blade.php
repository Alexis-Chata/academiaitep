@extends('adminlte::page')

@section('title', 'Tipo de Afectaciones')

@section('content_header')

@stop

@section('content')
    <livewire:tipo-afectaciones>
@stop

@section('css')
    @vite(['resources/css/style.css'])
@stop

@section('js')
    <script>
        console.log("Página de Tipo de Afectaciones cargada");
    </script>
@stop
