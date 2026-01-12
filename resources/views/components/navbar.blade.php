<style>
    /* =========================================
       1. CORE NAVBAR STYLES
       ========================================= */
    .navbar {
        position: fixed;
        top: 0;
        width: 100%;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.05);
        z-index: 9999;
        transition: all 0.3s ease;
        height: 80px; /* MENETAPKAN TINGGI FIX AGAR KONSISTEN */
        display: flex;
        align-items: center;
    }

    .nav-container {
        width: 100%;
        max-width: 1280px; /* DIPERLEBAR SEDIKIT DARI 1200px */
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
        /* PERBAIKAN: Padding diperbesar agar tidak mepet */
        padding: 0 2rem; 
    }

    /* Logo */
    .logo {
        font-size: 1.6rem; /* Sedikit diperbesar */
        font-weight: 800;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-decoration: none;
        letter-spacing: -0.5px;
    }

    /* =========================================
       2. NAVIGATION LINKS (DESKTOP)
       ========================================= */
    .nav-links {
        display: flex;
        gap: 2.5rem; /* PERBAIKAN: Jarak antar menu diperlebar */
        list-style: none;
        align-items: center;
        margin: 0;
        padding: 0;
    }

    .nav-links a {
        text-decoration: none;
        color: #64748b;
        font-weight: 600;
        font-size: 1rem; /* Font sedikit diperbesar agar terbaca jelas */
        transition: color 0.3s;
        position: relative;
    }

    .nav-links a:hover,
    .nav-links a.active {
        color: #667eea;
    }

    /* Garis bawah animasi saat hover */
    .nav-links a::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: -4px;
        left: 0;
        background-color: #667eea;
        transition: width 0.3s ease;
    }

    .nav-links a:hover::after,
    .nav-links a.active::after {
        width: 100%;
    }

    /* =========================================
       3. BUTTONS (LOGIN / REGISTER)
       ========================================= */
    .btn-auth-group {
        display: flex;
        gap: 1rem;
        align-items: center;
        margin-left: 1.5rem; /* Tambah jarak dari menu link */
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white !important;
        padding: 0.7rem 1.8rem; /* Padding tombol diperbesar */
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        border: none;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.25);
        transition: transform 0.2s, box-shadow 0.2s;
        white-space: nowrap; /* Mencegah teks turun ke bawah */
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
        color: white;
    }

    .btn-primary::after { display: none; }

    .btn-outline-nav {
        color: #667eea !important;
        padding: 0.7rem 1.8rem; /* Padding tombol diperbesar */
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        border: 2px solid #667eea;
        transition: all 0.3s;
        white-space: nowrap;
    }

    .btn-outline-nav:hover {
        background-color: #667eea;
        color: white !important;
    }
    .btn-outline-nav::after { display: none; }

    /* =========================================
       4. USER DROPDOWN
       ========================================= */
    .user-menu {
        position: relative;
        margin-left: 1rem;
    }

    .user-button {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        background: white;
        border: 1px solid #e2e8f0;
        padding: 0.5rem 0.8rem 0.5rem 0.5rem; /* Padding diperbaiki */
        border-radius: 50px;
        cursor: pointer;
        transition: all 0.3s;
    }

    .user-button:hover {
        border-color: #667eea;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }

    .user-avatar {
        width: 36px; /* Avatar diperbesar sedikit */
        height: 36px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.9rem;
        font-weight: 700;
    }

    .user-name {
        font-size: 0.95rem;
        font-weight: 600;
        color: #4a5568;
        padding-right: 0.5rem;
    }

    .dropdown-menu {
        position: absolute;
        top: 130%; /* Jarak dropdown dari tombol */
        right: 0;
        width: 240px; /* Dropdown diperlebar */
        background: white;
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        border: 1px solid #f1f5f9;
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: all 0.2s cubic-bezier(0.165, 0.84, 0.44, 1);
        overflow: hidden;
    }

    .dropdown-menu.show {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .dropdown-item {
        display: flex;
        align-items: center;
        padding: 0.9rem 1.2rem; /* Item dropdown lebih lega */
        text-decoration: none;
        color: #64748b;
        font-weight: 500;
        font-size: 0.95rem;
        transition: background 0.2s, color 0.2s;
    }

    .dropdown-item i {
        width: 20px;
        margin-right: 12px;
        color: #94a3b8;
        transition: color 0.2s;
    }

    .dropdown-item:hover {
        background-color: #f8fafc;
        color: #667eea;
    }

    .dropdown-item:hover i {
        color: #667eea;
    }

    .dropdown-item.logout {
        color: #ef4444;
        border-top: 1px solid #f1f5f9;
    }
    .dropdown-item.logout:hover {
        background-color: #fef2f2;
    }
    .dropdown-item.logout i { color: #ef4444; }

    /* =========================================
       5. HAMBURGER MENU (MOBILE)
       ========================================= */
    .hamburger {
        display: none;
        cursor: pointer;
        background: none;
        border: none;
        padding: 0.5rem;
    }

    .hamburger span {
        display: block;
        width: 28px;
        height: 3px;
        background-color: #4a5568;
        margin: 6px 0;
        border-radius: 3px;
        transition: all 0.3s;
    }

    /* =========================================
       6. RESPONSIVE DESIGN
       ========================================= */
    @media (max-width: 992px) {
        .nav-container {
            padding: 0 1.5rem; /* Padding mobile */
        }
        
        .hamburger {
            display: block;
            z-index: 1001;
        }

        .nav-links {
            position: fixed;
            top: 0;
            right: -100%;
            height: 100vh;
            width: 80%; /* Lebar menu mobile diperbesar */
            max-width: 320px;
            background: white;
            flex-direction: column;
            align-items: flex-start;
            padding: 6rem 2rem 2rem 2rem; /* Jarak atas ditambah agar tidak ketutupan navbar */
            box-shadow: -10px 0 30px rgba(0,0,0,0.1);
            transition: right 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            gap: 1.5rem;
        }

        .nav-links.active {
            right: 0;
        }

        .nav-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.4);
            backdrop-filter: blur(2px);
            z-index: 1000;
            display: none;
        }
        .nav-overlay.active { display: block; }

        .nav-links li { width: 100%; }
        .nav-links a { 
            display: block; 
            font-size: 1.1rem; 
            padding: 0.8rem 0;
            border-bottom: 1px solid #f1f5f9;
        }
        .nav-links a::after { display: none; }
        
        .btn-auth-group {
            flex-direction: column;
            width: 100%;
            gap: 1rem;
            margin-top: 1.5rem;
            margin-left: 0;
        }
        .btn-primary, .btn-outline-nav {
            width: 100%;
            text-align: center;
        }

        .user-menu { width: 100%; margin-left: 0; }
        .user-button {
            width: 100%;
            justify-content: flex-start;
            border: none;
            padding: 0;
            background: none;
            margin-bottom: 1rem;
        }
        .dropdown-menu {
            position: static;
            width: 100%;
            box-shadow: none;
            border: none;
            opacity: 1;
            visibility: visible;
            transform: none;
            display: none;
            padding-left: 0;
            margin-top: 0;
            background: #f8fafc;
        }
        .dropdown-menu.show { display: block; }
        .dropdown-item { padding: 0.8rem 1rem; }
    }
</style>
{{-- Overlay untuk Mobile --}}
<div class="nav-overlay" onclick="toggleMobileMenu()"></div>

<nav class="navbar">
    <div class="nav-container">
        <a href="{{ url('/') }}" class="logo">
            SkillConnect.id
        </a>

        <button class="hamburger" onclick="toggleMobileMenu()">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <ul class="nav-links">
            <li><a href="{{ url('/') }}" class="{{ Request::is('/') ? 'active' : '' }}">Beranda</a></li>
            <li><a href="{{ url('/') }}#courses" class="{{ Request::is('courses*') ? 'active' : '' }}">Kursus</a></li>
            <li><a href="{{ route('ai.view') }}" class="{{ Request::is('ai-recommendation') ? 'active' : '' }}">AI Rekomendasi</a></li>
            <li><a href="{{ route('about') }}" class="{{ Request::is('about') ? 'active' : '' }}">Tentang</a></li>
            <li><a href="{{ route('contact') }}" class="{{ Request::is('contact') ? 'active' : '' }}">Kontak</a></li>

            @auth
                <li class="user-menu">
                    <div class="user-button" onclick="toggleDropdown(event)">
                        <div class="user-avatar">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <span class="user-name">{{ explode(' ', Auth::user()->name)[0] }}</span>
                        <i class="fas fa-chevron-down" style="font-size: 0.8rem; color: #94a3b8;"></i>
                    </div>

                    <div class="dropdown-menu" id="userDropdown">
                        <div class="dropdown-item" style="pointer-events: none; color: #94a3b8; font-size: 0.8rem;">
                            Masuk sebagai <strong>{{ Auth::user()->name }}</strong>
                        </div>
                        <div style="border-bottom: 1px solid #f1f5f9; margin-bottom: 5px;"></div>
                        
                        <a href="{{ route('profile') }}" class="dropdown-item">
                            <i class="fas fa-user"></i> Profil Saya
                        </a>
                        <a href="{{ route('my.courses') }}" class="dropdown-item">
                            <i class="fas fa-book"></i> Kursus Saya
                        </a>
                        <a href="{{ route('certificates') }}" class="dropdown-item">
                            <i class="fas fa-certificate"></i> Sertifikat
                        </a>
                        <a href="{{ route('settings') }}" class="dropdown-item">
                            <i class="fas fa-cog"></i> Pengaturan
                        </a>
                        <form action="{{ url('/logout') }}" method="POST" style="margin: 0;">
                            @csrf
                            <button type="submit" class="dropdown-item logout" style="width: 100%; background: none; border: none; cursor: pointer; text-align: left; font-family: inherit;">
                                <i class="fas fa-sign-out-alt"></i> Keluar
                            </button>
                        </form>
                    </div>
                </li>
            @else
                <div class="btn-auth-group">
                    <li><a href="{{ route('login') }}" class="btn-outline-nav">Masuk</a></li>
                    <li><a href="{{ route('register') }}" class="btn-primary">Daftar</a></li>
                </div>
            @endauth
        </ul>
    </div>
</nav>

<script>
    // 1. Toggle Dropdown User
    function toggleDropdown(event) {
        event.stopPropagation();
        const dropdown = document.getElementById('userDropdown');
        const icon = document.querySelector('.user-button i');
        
        dropdown.classList.toggle('show');
        
        // Rotasi icon chevron (opsional)
        if(dropdown.classList.contains('show')){
            icon.style.transform = 'rotate(180deg)';
        } else {
            icon.style.transform = 'rotate(0deg)';
        }
    }

    // 2. Toggle Mobile Menu
    function toggleMobileMenu() {
        const navLinks = document.querySelector('.nav-links');
        const overlay = document.querySelector('.nav-overlay');
        const hamburger = document.querySelector('.hamburger');
        
        navLinks.classList.toggle('active');
        overlay.classList.toggle('active');

        // Animasi Hamburger menjadi X
        const spans = hamburger.querySelectorAll('span');
        if (navLinks.classList.contains('active')) {
            spans[0].style.transform = 'rotate(45deg) translate(5px, 5px)';
            spans[1].style.opacity = '0';
            spans[2].style.transform = 'rotate(-45deg) translate(5px, -6px)';
        } else {
            spans[0].style.transform = 'none';
            spans[1].style.opacity = '1';
            spans[2].style.transform = 'none';
        }
    }

    // 3. Menutup menu saat klik di luar
    document.addEventListener('click', function(event) {
        const dropdown = document.getElementById('userDropdown');
        const userButton = document.querySelector('.user-button');
        
        // Tutup Dropdown User
        if (dropdown && userButton && !userButton.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.remove('show');
            const icon = document.querySelector('.user-button i');
            if(icon) icon.style.transform = 'rotate(0deg)';
        }
    });

    // 4. Efek Shadow pada Navbar saat Scroll
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) {
            navbar.style.boxShadow = "0 4px 20px rgba(0, 0, 0, 0.1)";
            navbar.style.background = "rgba(255, 255, 255, 0.98)";
        } else {
            navbar.style.boxShadow = "0 4px 30px rgba(0, 0, 0, 0.05)";
            navbar.style.background = "rgba(255, 255, 255, 0.95)";
        }
    });
</script>