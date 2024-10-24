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
<script src="{{ asset('js/sweetalert2@11.js') }}"></script>
@stop
