<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Al-Selmi Center')</title>

    <!-- Main Website CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>

    {{-- Public Website Header --}}
    @include('partials.header')

    {{-- Page Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Public Website Footer --}}
    @include('partials.footer')

</body>
</html>
