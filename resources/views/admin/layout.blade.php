<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .sidebar { min-height: 100vh; background: #2c3e50; }
        .sidebar a { color: #ecf0f1; padding: 12px 20px; display: block; text-decoration: none; transition: 0.3s; }
        .sidebar a:hover, .sidebar a.active { background: #34495e; color: #fff; }
        .main-content { padding: 30px; background: #ecf0f1; min-height: 100vh; }
        .stat-card { background: white; border-radius: 10px; padding: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .badge-new { background: #e74c3c; }
        .badge-read { background: #3498db; }
        .badge-replied { background: #2ecc71; }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar p-0">
                <div class="p-3 text-white border-bottom">
                    <h4><i class="fas fa-user-shield"></i> Admin Panel</h4>
                </div>
                <nav class="mt-2">
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                    <a href="{{ route('admin.courses') }}" class="{{ request()->routeIs('admin.courses*') ? 'active' : '' }}">
                        <i class="fas fa-book"></i> Kelola Kursus
                    </a>
                    <a href="{{ route('admin.contacts') }}" class="{{ request()->routeIs('admin.contacts*') ? 'active' : '' }}">
                        <i class="fas fa-envelope"></i> Pesan Kontak
                    </a>
                    <a href="{{ route('admin.users') }}" class="{{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                        <i class="fas fa-users"></i> Kelola User
                    </a>
                    <hr class="bg-light">
                    <a href="{{ route('home') }}">
                        <i class="fas fa-arrow-left"></i> Kembali ke Website
                    </a>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 main-content">
                <!-- Alert Messages -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <i class="fas fa-check-circle"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>