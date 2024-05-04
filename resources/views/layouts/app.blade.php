<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

        <link href="{{asset('assets/fontawsome/all.css')}}">
        <script src="{{asset('assets/fontawsome/all.js')}}"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])


    </head>
    <body class="font-sans antialiased bg-gray-100">

        <div class="min-h-screen">

            @include('layouts.navigation')

            <main id="app">

                <div class="my-0 py-8 px-8">
                    <div class="bg-white shadow-sm sm:rounded-lg">
                        <section class="px-4 py-4">
                            {{ $slot }}
                        </section>
                    </div>
                </div>
                <alert-message success="{{ session('success') }}" error="{{ session('error') }}"></alert-message>

            </main>


        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{asset('assets/js/helpers.js')}}"></script>
        @yield('js')

    </body>

</html>
