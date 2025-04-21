<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">

    <title>Mini Helper - Laravel</title>

    @livewireStyles


    <script src="https://cdn.tailwindcss.com"></script>
    {{-- <script defer src="https://unpkg.com/alpinejs@3.10.4/dist/cdn.min.js"></script> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    {{-- <link href="https://cdn.jsdelivr.net/npm/enlighterjs@3.4.0/dist/enlighterjs.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/enlighterjs@3.4.0/dist/enlighterjs.dracula.min.css" rel="stylesheet">

</head>

<body class="font-sans bg-gray-200">

    <div class="container mx-auto mb-7">
        <ul class="flex flex-wrap gap-5 py-5">
            <li><a href="{{ route('miniHelper.model') }}" wire:navigate>Model</a></li>
            <li><a href="{{ route('miniHelper.validation') }}" wire:navigate>Validation</a></li>
            <li><a href="{{ route('miniHelper.grud') }}" wire:navigate>GRUD</a></li>
            <li><a href="{{ route('miniHelper.rest-api') }}" wire:navigate>REST API</a></li>
            <li><a href="{{ route('miniHelper.search.string') }}" wire:navigate>Search String</a></li>
            <li><a href="{{ route('miniHelper.create.migration') }}" wire:navigate>Create Migration</a></li>
            <li><a href="{{ route('miniHelper.create.view') }}" wire:navigate>Create View</a></li>
            <li><a href="{{ route('miniHelper.database.schema') }}" wire:navigate>Database Schema</a></li>
            <li><a href="{{ route('miniHelper.pest-exampels') }}" wire:navigate>Pest Examples</a></li>
        </ul>
    </div>


    {{-- <div class="container p-5 mx-auto bg-white rounded-md shadow-sm"> --}}
    <!-- Page Content -->
    <main class="">
        {{ $slot }}
    </main>
    {{-- </div> --}}


    @livewireScripts

    <script src="https://cdn.jsdelivr.net/npm/enlighterjs@3.4.0/dist/enlighterjs.min.js"></script>

    <script>
        EnlighterJS.init('pre', 'code', {
            language: 'javascript,php, html, css',
            theme: 'dracula',
            indent: 2
        });
    </script>
</body>

</html>
