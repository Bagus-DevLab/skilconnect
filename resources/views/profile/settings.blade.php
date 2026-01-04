<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan - SkillConnect.id</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f7fafc;
            color: #1a1a1a;
        }

        .navbar {
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-decoration: none;
        }

        .btn-back {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.7rem 1.5rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s;
        }

        .btn-back:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        .main-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 3rem 2rem;
        }

        .page-header {
            margin-bottom: 2rem;
        }

        .page-header h1 {
            font-size: 2.5rem;
            font-weight: 800;
            color: #1a202c;
            margin-bottom: 0.5rem;
        }

        .page-header p {
            color: #718096;
            font-size: 1.1rem;
        }

        .settings-card {
            background: white;
            border-radius: 15px;
            padding: 2.5rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            margin-bottom: 2rem;
        }

        .section-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #e2e8f0;
        }

        .section-title i {
            color: #667eea;
        }

        .alert {
            padding: 1rem 1.5rem;
            border-radius: 10px;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }

        .form-control {
            width: 100%;
            padding: 0.9rem 1.2rem;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s;
            font-family: 'Inter', sans-serif;
        }

        .form-control:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-control.is-invalid {
            border-color: #e53e3e;
        }

        .invalid-feedback {
            color: #e53e3e;
            font-size: 0.85rem;
            margin-top: 0.3rem;
            display: block;
        }

        .form-help {
            color: #718096;
            font-size: 0.85rem;
            margin-top: 0.3rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.9rem 2rem;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-danger {
            background: #e53e3e;
            color: white;
            padding: 0.9rem 2rem;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-danger:hover {
            background: #c53030;
        }

        .toggle-switch {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.2rem;
            background: #f7fafc;
            border-radius: 10px;
            margin-bottom: 1rem;
        }

        .toggle-info h4 {
            font-size: 1rem;
            font-weight: 600;
            color: #1a202c;
            margin-bottom: 0.3rem;
        }

        .toggle-info p {
            font-size: 0.85rem;
            color: #718096;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 28px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #cbd5e0;
            transition: 0.4s;
            border-radius: 28px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 20px;
            width: 20px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: 0.4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        input:checked + .slider:before {
            transform: translateX(22px);
        }

        .danger-zone {
            border: 2px solid #feb2b2;
            border-radius: 10px;
            padding: 1.5rem;
            background: #fff5f5;
        }

        .danger-zone h4 {
            color: #c53030;
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .danger-zone p {
            color: #742a2a;
            margin-bottom: 1rem;
        }

        @media (max-width: 768px) {
            .settings-card {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <a href="{{ route('home') }}" class="logo">SkillConnect.id</a>
            <a href="{{ route('profile') }}" class="btn-back">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Profile
            </a>
        </div>
    </nav>

    <div class="main-container">
        <div class="page-header">
            <h1>Pengaturan Akun</h1>
            <p>Kelola akun dan preferensi Anda</p>
        </div>

        <!-- Success Alert -->
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        <!-- Account Settings -->
        <div class="settings-card">
            <h2 class="section-title">
                <i class="fas fa-user-cog"></i>
                Informasi Akun
            </h2>

            <form action="{{ route('settings.update') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        class="form-control @error('name') is-invalid @enderror" 
                        value="{{ old('name', $user->name) }}"
                        required
                    >
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        class="form-control @error('email') is-invalid @enderror" 
                        value="{{ old('email', $user->email) }}"
                        required
                    >
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-help">Email digunakan untuk login dan notifikasi</div>
                </div>

                <button type="submit" class="btn-primary">
                    <i class="fas fa-save"></i>
                    Simpan Perubahan
                </button>
            </form>
        </div>

        <!-- Change Password -->
        <div class="settings-card">
            <h2 class="section-title">
                <i class="fas fa-lock"></i>
                Ubah Kata Sandi
            </h2>

            <form action="{{ route('settings.password') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="current_password">Kata Sandi Saat Ini</label>
                    <input 
                        type="password" 
                        id="current_password" 
                        name="current_password" 
                        class="form-control @error('current_password') is-invalid @enderror"
                        required
                    >
                    @error('current_password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Kata Sandi Baru</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        class="form-control @error('password') is-invalid @enderror"
                        required
                    >
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-help">Minimal 8 karakter</div>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Kata Sandi Baru</label>
                    <input 
                        type="password" 
                        id="password_confirmation" 
                        name="password_confirmation" 
                        class="form-control"
                        required
                    >
                </div>

                <button type="submit" class="btn-primary">
                    <i class="fas fa-key"></i>
                    Ubah Kata Sandi
                </button>
            </form>
        </div>

        <!-- Notification Settings -->
        <div class="settings-card">
            <h2 class="section-title">
                <i class="fas fa-bell"></i>
                Notifikasi
            </h2>

            <div class="toggle-switch">
                <div class="toggle-info">
                    <h4>Email Notifikasi</h4>
                    <p>Terima notifikasi tentang kursus dan aktivitas akun Anda</p>
                </div>
                <label class="switch">
                    <input type="checkbox" checked>
                    <span class="slider"></span>
                </label>
            </div>

            <div class="toggle-switch">
                <div class="toggle-info">
                    <h4>Newsletter</h4>
                    <p>Dapatkan tips belajar dan informasi kursus baru</p>
                </div>
                <label class="switch">
                    <input type="checkbox" checked>
                    <span class="slider"></span>
                </label>
            </div>

            <div class="toggle-switch">
                <div class="toggle-info">
                    <h4>Pengingat Belajar</h4>
                    <p>Ingatkan saya untuk melanjutkan kursus yang belum selesai</p>
                </div>
                <label class="switch">
                    <input type="checkbox" checked>
                    <span class="slider"></span>
                </label>
            </div>
        </div>

        <!-- Privacy Settings -->
        <div class="settings-card">
            <h2 class="section-title">
                <i class="fas fa-shield-alt"></i>
                Privasi
            </h2>

            <div class="toggle-switch">
                <div class="toggle-info">
                    <h4>Profil Publik</h4>
                    <p>Izinkan pengguna lain melihat profil Anda</p>
                </div>
                <label class="switch">
                    <input type="checkbox">
                    <span class="slider"></span>
                </label>
            </div>

            <div class="toggle-switch">
                <div class="toggle-info">
                    <h4>Tampilkan Progress</h4>
                    <p>Tampilkan progress belajar di profil publik</p>
                </div>
                <label class="switch">
                    <input type="checkbox">
                    <span class="slider"></span>
                </label>
            </div>
        </div>

        <!-- Danger Zone -->
        <div class="settings-card">
            <h2 class="section-title">
                <i class="fas fa-exclamation-triangle"></i>
                Zona Berbahaya
            </h2>

            <div class="danger-zone">
                <h4>
                    <i class="fas fa-trash-alt"></i>
                    Hapus Akun
                </h4>
                <p>Setelah akun dihapus, semua data Anda akan dihapus permanen. Tindakan ini tidak dapat dibatalkan.</p>
                <button class="btn-danger" onclick="confirmDelete()">
                    <i class="fas fa-exclamation-triangle"></i>
                    Hapus Akun Saya
                </button>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete() {
            if (confirm('Apakah Anda yakin ingin menghapus akun? Tindakan ini tidak dapat dibatalkan!')) {
                if (confirm('Konfirmasi sekali lagi. Semua data Anda akan hilang permanen!')) {
                    alert('Fitur hapus akun akan segera tersedia');
                    // TODO: Implement delete account logic
                }
            }
        }
    </script>
</body>
</html>