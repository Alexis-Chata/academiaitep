<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Fonts -->
        <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
        <link href="{{asset('css/css_bootstrap.min.css')}}" rel="stylesheet" />
        <link href="{{asset('css/login1/style.css')}}" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body>
        <section class="h-100 gradient-form" style="background-color: #eee;">
            {{ $slot }}
        </section>

        @livewireScripts
    </body>
</html>
