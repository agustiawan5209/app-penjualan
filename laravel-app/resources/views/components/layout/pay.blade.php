<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    <link rel="stylesheet" href="{{asset('build/assets/app.f5e02a9a.css')}}">
    <script src="{{asset('build/assets/app.ab93cf8a.js')}}"></script>
    <script src="{{ asset('js/sweetalert.all.js') }}"></script>

<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    @livewireStyles
    {{-- <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.2/dist/flowbite.min.css" /> --}}
</head>

<body>
    {{$slot}}
    @stack('modal')
    @livewireScripts
    <script src="{{asset('js/pay.js')}}"></script>
</body>
</html>
