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

    <script>
        tailwind.config = {
            darkMode: 'class'
        }
    </script>

    <!-- Alpine Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    {{-- <link href="https://cdn.jsdelivr.net/npm/enlighterjs@3.4.0/dist/enlighterjs.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/enlighterjs@3.4.0/dist/enlighterjs.dracula.min.css" rel="stylesheet">

</head>

<body class="font-sans transition-colors duration-300 bg-slate-200 text-slate-600 dark:bg-slate-900 dark:text-slate-300"
    x-data="{
        isDark: document.documentElement.classList.contains('dark'),
        toggle() {
            this.isDark = !this.isDark;
            document.documentElement.classList.toggle('dark', this.isDark);
            localStorage.setItem('theme', this.isDark ? 'dark' : 'light');
        }
    }">

    <div>
        <button @click.prevent="toggle()"
            class="flex items-center gap-2 px-4 py-2 transition rounded-lg shadow bg-slate-200 dark:bg-slate-800 hover:bg-slate-300 dark:hover:bg-slate-700"
            aria-label="Toggle Dark Mode">
            <!-- Sun Icon -->
            <svg x-show="!isDark" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 3v1m0 16v1m8.49-8.49h1M3.51 12H2.5m15.364 6.364l.707.707M5.636 5.636l-.707-.707m12.728 0l.707-.707M5.636 18.364l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>

            <!-- Moon Icon -->
            <svg x-cloak x-show="isDark" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor"
                viewBox="0 0 24 24">
                <path d="M21 12.79A9 9 0 1111.21 3a7 7 0 109.79 9.79z" />
            </svg>
        </button>
    </div>
    <div class="container mx-auto mb-7">
        <ul class="flex flex-wrap gap-5 py-5">
            <li><a href="{{ route('componist.mini-helper.model') }}" wire:navigate>Model</a></li>
            <li><a href="{{ route('componist.mini-helper.validation') }}" wire:navigate>Validation</a></li>
            <li><a href="{{ route('componist.mini-helper.grud') }}" wire:navigate>GRUD</a></li>
            <li><a href="{{ route('componist.mini-helper.rest-api') }}" wire:navigate>REST API</a></li>
            <li><a href="{{ route('componist.mini-helper.search.string') }}" wire:navigate>Search String</a></li>
            <li><a href="{{ route('componist.mini-helper.create.migration') }}" wire:navigate>Create Migration</a></li>
            <li><a href="{{ route('componist.mini-helper.create.view') }}" wire:navigate>Create View</a></li>
            <li><a href="{{ route('componist.mini-helper.database.schema') }}" wire:navigate>Database Schema</a></li>
            <li><a href="{{ route('componist.mini-helper.database.tools') }}" wire:navigate>Database Tools</a></li>
            <li><a href="{{ route('componist.mini-helper.pest-exampels') }}" wire:navigate>Pest Examples</a></li>
            <li><a href="{{ route('componist.mini-helper.routes') }}" wire:navigate>Route Liste</a></li>
            <li><a href="{{ route('componist.mini-helper.test.routes') }}" wire:navigate>Test Routes</a></li>
            <li><a href="{{ route('componist.mini-helper.root.icons') }}" wire:navigate>Root Icons</a></li>
            <li><a href="{{ route('componist.mini-helper.crawler.route.json') }}" wire:navigate>Crawler Route Json</a>
            </li>
            <li><a href="{{ route('componist.mini-helper.artisan.list') }}" wire:navigate>Artisan Liste</a></li>

            <li><a href="{{ route('componist.mini-helper.job.liste') }}" wire:navigate>Job Liste</a></li>


        </ul>
    </div>


    {{-- <div class="container p-5 mx-auto bg-white rounded-md shadow-sm"> --}}
    <!-- Page Content -->
    <main class="mb-14">
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
