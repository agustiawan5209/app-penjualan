<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->

    <!-- Scripts -->
    @livewireStyles
    <link rel="stylesheet" href="{{asset('build/assets/app.071e00f0.css')}}">
    <script src="{{asset('build/assets/app.ab93cf8a.js')}}"></script>

    @livewireStyles
    {{-- <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.2/dist/flowbite.min.css" /> --}}
</head>

<body>

    {{$slot}}
    @stack('modal')
    @livewireScripts
</body>
</html>
