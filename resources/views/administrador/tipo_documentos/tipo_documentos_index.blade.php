@extends('adminlte::page')

@section('title', 'Tipo de Documentos')

@section('content_header')

@stop

@section('content')
    <livewire:tipo-documentos>
@stop

@section('css')
    @vite(['resources/css/style.css'])
@stop

@section('js')
    <script>
        console.log("Página de Tipo de Documentos cargada");
    </script>
@stop