<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillConnect.id</title>
    
    {{-- 1. Bootstrap CSS (Wajib untuk tata letak container/row/col) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    {{-- 2. Font Awesome (Wajib untuk ikon fas fa-robot, dll) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    {{-- 3. Custom CSS jika ada --}}
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 80px; /* Jarak agar konten tidak tertutup Navbar Fixed */
        }
    </style>
</head>
<body>

    {{-- A. INCLUDE NAVBAR DI SINI --}}
    @include('components.navbar')

    {{-- B. KONTEN HALAMAN AKAN MUNCUL DI SINI --}}
    <main>
        @yield('content')
    </main>

    {{-- 4. Bootstrap JS Bundle --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>