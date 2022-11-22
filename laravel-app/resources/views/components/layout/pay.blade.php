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
    <link rel="stylesheet" href="{{asset('build/assets/app.8473a5be.css')}}">
    <script src="{{ asset('js/sweetalert.all.js') }}"></script>
    @vite(['resources/js/app.js'])

<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    @livewireStyles
    {{-- <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.2/dist/flowbite.min.css" /> --}}
</head>

<body>
    {{$slot}}
    @stack('modal')
    @livewireScripts
    <script src="{{asset('js/pay.js')}}"></script>
    {{-- <script defer src="{{asset('build/assets/app.d225c007.js')}}"></script> --}}

</body>
</html>
