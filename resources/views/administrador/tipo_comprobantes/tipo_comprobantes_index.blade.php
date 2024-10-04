@extends('adminlte::page')

@section('title', 'Tipo de Comprobantes')

@section('content_header')

@stop

@section('content')
    <livewire:tipo-comprobantes>
@stop

@section('css')
    @vite(['resources/css/style.css'])
@stop

@section('js')
    <script>
        console.log("Página de Tipo de Comprobantes cargada");
    </script>
@stop