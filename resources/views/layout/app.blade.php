<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Aplikasi Kursus')</title>
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
    @stack('styles')
</head>
<body class="bg-gray-100">

    {{-- Header / Navbar Utama Aplikasi --}}
    <header>
        @include('partials.header') 
        {{-- Anda mungkin perlu membuat file parsial ini --}}
    </header>

    {{-- Konten utama aplikasi akan dimuat di sini --}}
    <main class="py-4">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer>
        @include('partials.footer') 
        {{-- Anda mungkin perlu membuat file parsial ini --}}
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>