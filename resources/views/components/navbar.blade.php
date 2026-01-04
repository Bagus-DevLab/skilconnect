<style>
    /*
    =================================================
             GAYA NAVIGASI UNTUK SEMUA HALAMAN
    =================================================
    */
    .navbar {
        position: fixed;
        top: 0;
        width: 100%;
        background: rgba(255, 255, 255, 0.98); /* Sedikit lebih solid */
        backdrop-filter: blur(12px);
        box-shadow: 0 4px 25px rgba(0, 0, 0, 0.08); /* Bayangan lebih jelas */
        z-index: 1000; /* Penting agar selalu di atas */
        transition: box-shadow 0.3s;
    }

    .nav-container {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 2rem;
    }

    .logo {
        font-size: 1.5rem;
        font-weight: 800;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-decoration: none;
    }

    .nav-links {
        display: flex;
        gap: 2rem;
        list-style: none;
        align-items: center;
    }

    .nav-links li {
        position: relative;
    }

    .nav-links a {
        text-decoration: none;
        color: #4a5568;
        font-weight: 500;
        transition: color 0.3s;
    }

    .nav-links a:hover,
    .nav-links a.active {
        color: #667eea;
    }

    /* --- Tombol Masuk/Daftar --- */
    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 0.7rem 1.5rem;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        transition: transform 0.3s, box-shadow 0.3s;
        border: none;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
    }
    
    .btn-outline-nav {
        color: #667eea;
        padding: 0.7rem 1.5rem;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        border: 2px solid #667eea;
        transition: background-color 0.3s, color 0.3s;
    }
    .btn-outline-nav:hover {
        background-color: #667eea;
        color: white;
    }


    /* --- Menu Pengguna (Dropdown) --- */
    .user-menu {
        position: relative;
        display: inline-block;
        margin-left: 1rem;
    }

    .user-button {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        border: none;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: box-shadow 0.3s;
    }

    .user-button:hover {
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
    }

    .user-avatar {
        width: 30px;
        height: 30px;
        background-color: white;
        color: #667eea;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.8rem;
        font-weight: 700;
    }

    .user-button span {
        margin-right: 0.25rem;
    }

    /* Dropdown Menu */
    .dropdown-menu {
        position: absolute;
        top: 100%; /* Turun tepat di bawah tombol */
        right: 0;
        width: 200px;
        background: white;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        overflow: hidden;
        margin-top: 10px;
        z-index: 1005; /* HARUS lebih tinggi dari navbar, tapi tetap di atas konten */
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: opacity 0.2s ease, transform 0.2s ease;
    }

    .dropdown-menu.show {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .dropdown-item {
        display: flex;
        align-items: center;
        padding: 0.75rem 1rem;
        text-decoration: none;
        color: #4a5568;
        font-weight: 500;
        transition: background-color 0.2s;
    }

    .dropdown-item i {
        margin-right: 0.75rem;
        width: 1.2rem;
        color: #718096;
    }

    .dropdown-item:hover {
        background-color: #f7fafc;
        color: #667eea;
    }
    
    .dropdown-item:hover i {
        color: #667eea;
    }

    .dropdown-item.logout {
        color: #f56565;
        border-top: 1px solid #e2e8f0;
    }
    
    .dropdown-item.logout i {
        color: #f56565;
    }

    /* Chevron rotation on open */
    .user-button i {
        transition: transform 0.2s;
    }

    .user-button.open i {
        transform: rotate(180deg);
    }

    /* Media Queries for Responsiveness (Optional but recommended) */
    @media (max-width: 768px) {
        .nav-links {
            display: none; /* Sembunyikan links di mobile, biasanya diganti menu burger */
        }
        .nav-container {
            padding: 0.75rem 1.5rem;
        }
    }
</style>

<nav class="navbar">
    <div class="nav-container">
        <div class="logo">SkillConnect.id</div>
        <ul class="nav-links">
            <li><a href="{{ url('/') }}" class="{{ Request::is('/') ? 'active' : '' }}">Beranda</a></li>
            {{-- Menggunakan is-active jika Anda berada di halaman kursus --}}
            <li><a href="{{ url('/') }}#courses" class="{{ Request::is('courses*') ? 'active' : '' }}">Kursus</a></li> 
            <li><a href="{{ route('ai.recommendation') }}" class="{{ Request::is('ai-recommendation') ? 'active' : '' }}">AI Rekomendasi</a></li>
            <li><a href="{{ route('about') }}" class="{{ Request::is('about') ? 'active' : '' }}">Tentang</a></li>
            <li><a href="{{ route('contact') }}" class="{{ Request::is('contact') ? 'active' : '' }}">Kontak</a></li>
            
            @auth
                <li class="user-menu">
                    <button class="user-button" onclick="toggleDropdown(event)">
                        {{-- Menggunakan Auth::user() untuk mendapatkan data pengguna --}}
                        <div class="user-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                        <span>{{ explode(' ', Auth::user()->name)[0] }}</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="dropdown-menu" id="userDropdown">
                        <a href="{{ route('profile') }}" class="dropdown-item">
                            <i class="fas fa-user"></i>
                            <span>Profil Saya</span>
                        </a>
                        <a href="{{ route('my.courses') }}" class="dropdown-item">
                            <i class="fas fa-book"></i>
                            <span>Kursus Saya</span>
                        </a>
                        <a href="{{ route('certificates') }}" class="dropdown-item">
                            <i class="fas fa-certificate"></i>
                            <span>Sertifikat</span>
                        </a>
                        <a href="{{ route('settings') }}" class="dropdown-item">
                            <i class="fas fa-cog"></i>
                            <span>Pengaturan</span>
                        </a>
                        <form action="{{ url('/logout') }}" method="POST" style="margin: 0;">
                            @csrf
                            <button type="submit" class="dropdown-item logout" style="width: 100%; background: none; border: none; cursor: pointer; text-align: left;">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Keluar</span>
                            </button>
                        </form>
                    </div>
                </li>
            @else
                <li><a href="{{ route('login') }}" class="btn-outline-nav">Masuk</a></li>
                <li><a href="{{ route('register') }}" class="btn-primary">Daftar Sekarang</a></li>
            @endauth
        </ul>
    </div>
</nav>

<script>
    // FUNGSI JAVASCRIPT UNTUK TOGGLE DROPDOWN
    function toggleDropdown(event) {
        // Mencegah klik di dalam tombol menutup dropdown segera
        event.stopPropagation(); 
        
        const dropdown = document.getElementById('userDropdown');
        const button = document.querySelector('.user-button');
        
        dropdown.classList.toggle('show');
        button.classList.toggle('open');
    }

    // Menutup dropdown ketika mengklik di mana saja di luar dropdown
    document.addEventListener('click', function(event) {
        const dropdown = document.getElementById('userDropdown');
        const button = document.querySelector('.user-button');
        const userMenu = document.querySelector('.user-menu');

        // Memastikan klik tidak berasal dari dalam user-menu (termasuk tombol)
        if (dropdown && !userMenu.contains(event.target)) {
            dropdown.classList.remove('show');
            button.classList.remove('open');
        }
    });
</script>