<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - SkillConnect.id</title>
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
            max-width: 1200px;
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

        .profile-container {
            display: grid;
            grid-template-columns: 350px 1fr;
            gap: 2rem;
        }

        .profile-sidebar {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            height: fit-content;
        }

        .avatar-section {
            text-align: center;
            margin-bottom: 2rem;
            position: relative;
        }

        .avatar-wrapper {
            position: relative;
            width: 120px;
            height: 120px;
            margin: 0 auto 1rem;
        }

        .avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: white;
            font-weight: 700;
            overflow: hidden;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .avatar-overlay {
            position: absolute;
            bottom: 0;
            right: 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            border: 3px solid white;
            transition: all 0.3s;
        }

        .avatar-overlay:hover {
            transform: scale(1.1);
        }

        .avatar-overlay i {
            color: white;
            font-size: 0.9rem;
        }

        #photoInput {
            display: none;
        }

        .photo-actions {
            display: flex;
            gap: 0.5rem;
            justify-content: center;
            margin-top: 0.5rem;
        }

        .btn-delete-photo {
            background: #e53e3e;
            color: white;
            padding: 0.4rem 0.8rem;
            border: none;
            border-radius: 6px;
            font-size: 0.85rem;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            transition: all 0.3s;
        }

        .btn-delete-photo:hover {
            background: #c53030;
        }

        .user-name {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 0.3rem;
        }

        .user-email {
            color: #718096;
            font-size: 0.95rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-top: 2rem;
        }

        .stat-card {
            background: #f7fafc;
            padding: 1rem;
            border-radius: 10px;
            text-align: center;
        }

        .stat-number {
            font-size: 1.8rem;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .stat-label {
            color: #718096;
            font-size: 0.85rem;
            margin-top: 0.3rem;
        }

        .profile-content {
            background: white;
            border-radius: 15px;
            padding: 2.5rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
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

        .alert-error {
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

        .is-invalid {
            border-color: #e53e3e;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
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

        .error-message {
            color: #e53e3e;
            font-size: 0.85rem;
            margin-top: 0.3rem;
        }

        .file-upload-info {
            font-size: 0.85rem;
            color: #718096;
            margin-top: 0.3rem;
        }

        @media (max-width: 768px) {
            .profile-container {
                grid-template-columns: 1fr;
            }

            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <a href="{{ route('home') }}" class="logo">SkillConnect.id</a>
            <a href="{{ route('home') }}" class="btn-back">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Beranda
            </a>
        </div>
    </nav>

    <div class="main-container">
        <div class="page-header">
            <h1>Profil Saya</h1>
            <p>Kelola informasi profil dan akun Anda</p>
        </div>

        <div class="profile-container">
            <!-- Sidebar -->
            <div class="profile-sidebar">
                <div class="avatar-section">
                    <div class="avatar-wrapper">
                        <div class="avatar" id="avatarDisplay">
                            @if($user->profile_photo)
                                <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="{{ $user->name }}" onerror="this.parentElement.innerHTML='{{ strtoupper(substr($user->name, 0, 1)) }}'">
                            @else
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            @endif
                        </div>
                        <label for="photoInput" class="avatar-overlay">
                            <i class="fas fa-camera"></i>
                        </label>
                    </div>
                    
                    @if($user->profile_photo)
                        <div class="photo-actions">
                            <form action="{{ route('profile.deletePhoto') }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus foto profil?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete-photo">
                                    <i class="fas fa-trash"></i>
                                    Hapus Foto
                                </button>
                            </form>
                        </div>
                    @endif

                    <h2 class="user-name">{{ $user->name }}</h2>
                    <p class="user-email">{{ $user->email }}</p>
                </div>

                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-number">3</div>
                        <div class="stat-label">Kursus Aktif</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">2</div>
                        <div class="stat-label">Sertifikat</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">45</div>
                        <div class="stat-label">Jam Belajar</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">92%</div>
                        <div class="stat-label">Rata-rata Nilai</div>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="profile-content">
                <h2 class="section-title">
                    <i class="fas fa-user-edit"></i>
                    Edit Profil
                </h2>

                @if(session('success'))
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle"></i>
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-error">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" id="profileForm">
                    @csrf

                    <!-- Hidden File Input -->
                    <input type="file" id="photoInput" name="profile_photo" accept="image/*">

                    <div class="form-row">
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
                                <div class="error-message">{{ $message }}</div>
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
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone">Nomor Telepon</label>
                        <input 
                            type="tel" 
                            id="phone" 
                            name="phone" 
                            class="form-control" 
                            value="{{ old('phone', $user->phone) }}"
                            placeholder="Contoh: 08123456789"
                        >
                        @error('phone')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="bio">Bio</label>
                        <textarea 
                            id="bio" 
                            name="bio" 
                            class="form-control"
                            placeholder="Ceritakan sedikit tentang diri Anda..."
                        >{{ old('bio', $user->bio) }}</textarea>
                        @error('bio')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <textarea 
                            id="address" 
                            name="address" 
                            class="form-control"
                            placeholder="Alamat lengkap Anda"
                        >{{ old('address', $user->address) }}</textarea>
                        @error('address')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    @error('profile_photo')
                        <div class="alert alert-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror

                    <button type="submit" class="btn-primary">
                        <i class="fas fa-save"></i>
                        Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Preview foto sebelum upload
        document.getElementById('photoInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                // Validasi ukuran file (max 2MB)
                if (file.size > 2048 * 1024) {
                    alert('Ukuran file terlalu besar! Maksimal 2MB');
                    this.value = '';
                    return;
                }

                // Validasi tipe file
                const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
                if (!allowedTypes.includes(file.type)) {
                    alert('Format file tidak didukung! Gunakan JPEG, PNG, JPG, atau GIF');
                    this.value = '';
                    return;
                }

                // Preview gambar
                const reader = new FileReader();
                reader.onload = function(e) {
                    const avatarDisplay = document.getElementById('avatarDisplay');
                    avatarDisplay.innerHTML = '<img src="' + e.target.result + '" alt="Preview">';
                }
                reader.readAsDataURL(file);

                // Auto submit form setelah memilih foto
                if (confirm('Upload foto profil ini?')) {
                    document.getElementById('profileForm').submit();
                } else {
                    this.value = '';
                    location.reload();
                }
            }
        });
    </script>
</body>
</html>