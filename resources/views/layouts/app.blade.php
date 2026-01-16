<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'Al-Selmi Center'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Your Site CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body class="font-sans antialiased">
    <!-- ✅ CHANGED HERE -->
    <div class="min-h-screen flex flex-col bg-gray-100">

        {{-- Site Navigation (safe for auth + guest) --}}
        @include('layouts.navigation')

        {{-- Optional Breeze header (used only if set) --}}
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        {{-- Page Content --}}
        <!-- ✅ CHANGED HERE -->
        <main role="main" class="py-6 flex-grow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @yield('content')
        </main>

        {{-- Site Footer --}}
        @include('partials.footer')

    </div>
</body>
</html>
