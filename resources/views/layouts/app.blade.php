<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'RAVCONNECT - eSIM Global Roaming anti ribet')</title>
            @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('head')
    <link rel="icon" href="{{asset('resources\assets\img\Logo-transparent 1.png')}}" type="image/x-icon">
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>
<body class="bg-white">
    @include('partials.navbar')
    <main>
        @yield('content')
    </main>
    @include('partials.bottom-navbar-new')
    @stack('scripts')
</body>
</html>
