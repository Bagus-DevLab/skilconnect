<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillConnect.id - Belajar, Tumbuh, dan Tersertifikasi</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: #1a1a1a;
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Navbar */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.05);
            z-index: 1000;
            transition: all 0.3s ease;
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
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
            align-items: center;
        }

        .nav-links a {
            text-decoration: none;
            color: #4a5568;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #667eea;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.7rem 1.5rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        /* User Dropdown */
        .user-menu {
            position: relative;
        }

        .user-button {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.7rem 1.2rem;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
            border: none;
        }

        .user-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .user-avatar {
            width: 32px;
            height: 32px;
            background: white;
            color: #667eea;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            right: 0;
            margin-top: 0.5rem;
            background: white;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            min-width: 200px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }

        .dropdown-menu.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            padding: 0.8rem 1.2rem;
            color: #4a5568;
            text-decoration: none;
            transition: background 0.2s;
            border-bottom: 1px solid #f0f0f0;
        }

        .dropdown-item:first-child {
            border-radius: 8px 8px 0 0;
        }

        .dropdown-item:last-child {
            border-bottom: none;
            border-radius: 0 0 8px 8px;
        }

        .dropdown-item:hover {
            background: #f7fafc;
        }

        .dropdown-item i {
            width: 20px;
            color: #667eea;
        }

        .dropdown-item.logout {
            color: #e53e3e;
        }

        .dropdown-item.logout i {
            color: #e53e3e;
        }

        .btn-outline-nav {
            background: transparent;
            color: #667eea;
            border: 2px solid #667eea;
            padding: 0.5rem 1.2rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-outline-nav:hover {
            background: #667eea;
            color: white;
        }

        /* Hero Section */
        .hero {
            margin-top: 80px;
            padding: 5rem 2rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -200px;
            right: -200px;
        }

        .hero-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .hero-content h1 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn-white {
            background: white;
            color: #667eea;
            padding: 0.8rem 2rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: transform 0.3s;
        }

        .btn-white:hover {
            transform: translateY(-2px);
        }

        .btn-outline {
            background: transparent;
            color: white;
            border: 2px solid white;
            padding: 0.8rem 2rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-outline:hover {
            background: white;
            color: #667eea;
        }

        .hero-image {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .hero-image-placeholder {
            width: 100%;
            height: 400px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(10px);
        }

        .hero-image-placeholder i {
            font-size: 5rem;
            opacity: 0.3;
        }

        /* Stats Section */
        .stats {
            background: #f7fafc;
            padding: 3rem 2rem;
        }

        .stats-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
            text-align: center;
        }

        .stat-item h3 {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stat-item p {
            color: #718096;
            font-weight: 500;
        }

        /* Features Section */
        .features {
            padding: 5rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-title {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-title h2 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            color: #1a202c;
        }

        .section-title p {
            font-size: 1.1rem;
            color: #718096;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
        }

        .feature-card {
            cursor: pointer;
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s, box-shadow 0.3s;
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            cursor: pointer;
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .feature-card:hover::before {
            cursor: pointer;
            transform: scaleX(1);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.2);
        }

        .feature-card:hover .feature-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            transition: transform 0.3s ease;
        }

        .feature-icon i {
            font-size: 1.8rem;
            color: white;
        }

        .feature-card h3 {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #1a202c;
        }

        .feature-card p {
            color: #718096;
            line-height: 1.8;
            margin-bottom: 1rem;
        }

        .feature-card p strong {
            color: #667eea;
            font-weight: 600;
        }

        .feature-stats {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #48bb78;
            font-weight: 600;
            font-size: 0.9rem;
            padding-top: 1rem;
            border-top: 1px solid #e2e8f0;
        }

        .feature-stats i {
            font-size: 1rem;
        }

        /* Popular Courses */
        .courses {
            background: #f7fafc;
            padding: 5rem 2rem;
        }

        .courses-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .courses-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
        }

        .course-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s;
        }

        .course-card:hover {
            transform: translateY(-10px);
        }

        .course-image {
            width: 100%;
            height: 200px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .course-image i {
            font-size: 3rem;
            color: rgba(255, 255, 255, 0.3);
        }

        .course-content {
            padding: 1.5rem;
        }

        .course-category {
            display: inline-block;
            background: #edf2f7;
            color: #667eea;
            padding: 0.3rem 0.8rem;
            border-radius: 5px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 0.8rem;
        }

        .course-content h3 {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 0.8rem;
            color: #1a202c;
        }

        .course-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #718096;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .course-price {
            font-size: 1.5rem;
            font-weight: 800;
            color: #667eea;
        }

        /* CTA Section */
        .cta {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 5rem 2rem;
            text-align: center;
        }

        .cta h2 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }

        .cta p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        /* Footer */
        .footer {
            background: #1a202c;
            color: white;
            padding: 3rem 2rem 1rem;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 3rem;
            margin-bottom: 2rem;
        }

        .footer h3 {
            margin-bottom: 1rem;
            font-size: 1.2rem;
        }

        .footer p {
            color: #a0aec0;
            line-height: 1.8;
        }

        .footer ul {
            list-style: none;
        }

        .footer ul li {
            margin-bottom: 0.8rem;
        }

        .footer ul li a {
            color: #a0aec0;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer ul li a:hover {
            color: white;
        }

        .footer-bottom {
            max-width: 1200px;
            margin: 0 auto;
            padding-top: 2rem;
            border-top: 1px solid #2d3748;
            text-align: center;
            color: #a0aec0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-container {
                grid-template-columns: 1fr;
            }

            .hero-content h1 {
                font-size: 2rem;
            }

            .stats-container {
                grid-template-columns: repeat(2, 1fr);
            }

            .features-grid,
            .courses-grid {
                grid-template-columns: 1fr;
            }

            .footer-container {
                grid-template-columns: 1fr;
            }

            .nav-links {
                gap: 1rem;
            }

            .nav-links a {
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    @include('components.navbar')

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-container">
            <div class="hero-content">
                <h1>Belajar, Tumbuh, dan Tersertifikasi untuk Masa Depan yang Lebih Baik</h1>
                <p>Platform pelatihan kerja online dengan sertifikasi resmi yang diakui industri. Fleksibel, terjangkau,
                    dan praktis.</p>
                <div class="hero-buttons">
                    <a href="#courses" class="btn-white">Jelajahi Kursus</a>
                    <a href="{{ route('about') }}" class="btn-outline">Pelajari Lebih Lanjut</a>
                </div>
            </div>
            <div class="hero-image">
                <div class="hero-image-placeholder">
                    <i class="fas fa-graduation-cap"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="stats-container">
            <div class="stat-item">
                <h3>10,000+</h3>
                <p>Peserta Aktif</p>
            </div>
            <div class="stat-item">
                <h3>50+</h3>
                <p>Kursus Tersedia</p>
            </div>
            <div class="stat-item">
                <h3>95%</h3>
                <p>Tingkat Kepuasan</p>
            </div>
            <div class="stat-item">
                <h3>100%</h3>
                <p>Sertifikat Resmi</p>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="section-title">
            <h2>Mengapa Memilih SkillConnect.id?</h2>
            <p>Platform terlengkap untuk pengembangan keterampilan profesional Anda</p>
        </div>
        <div class="features-grid">
            <div class="feature-card" onclick="openFeature('fleksibel')" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <h3>Belajar Fleksibel</h3>
                <p>Akses kursus <strong>24/7</strong> kapan saja, di mana saja sesuai dengan jadwal Anda. Tidak ada batasan waktu untuk belajar.</p>
                <div class="feature-stats">
                    <i class="fas fa-check-circle"></i>
                    <span>Akses Selamanya</span>
                </div>
            </div>
            <div class="feature-card" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-icon">
                    <i class="fas fa-certificate"></i>
                </div>
                <h3>Sertifikat Resmi</h3>
                <p>Dapatkan sertifikat digital yang <strong>diakui industri</strong> dan dapat diverifikasi secara online dengan QR code.</p>
                <div class="feature-stats">
                    <i class="fas fa-shield-alt"></i>
                    <span>Terverifikasi</span>
                </div>
            </div>
            <div class="feature-card" onclick="openFeature('sertifikat')" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-icon">
                    <i class="fas fa-money-bill-wave"></i>
                </div>
                <h3>Harga Terjangkau</h3>
                <p>Sistem pembayaran <strong>fleksibel</strong> dengan cicilan atau pay-after-job untuk memudahkan akses pelatihan.</p>
                <div class="feature-stats">
                    <i class="fas fa-credit-card"></i>
                    <span>Cicilan 0%</span>
                </div>
            </div>
            <div class="feature-card" onclick="openFeature('harga')" data-aos="fade-up" data-aos-delay="300">
                <div class="feature-icon">
                    <i class="fas fa-laptop-code"></i>
                </div>
                <h3>Keterampilan Praktis</h3>
                <p>Fokus pada skill yang <strong>langsung bisa diterapkan</strong> di dunia kerja dengan studi kasus nyata dari industri.</p>
                <div class="feature-stats">
                    <i class="fas fa-briefcase"></i>
                    <span>Job-Ready Skills</span>
                </div>
            </div>
            <div class="feature-card" data-aos="fade-up" data-aos-delay="500">
                <div class="feature-icon">
                    <i class="fas fa-user-tie"></i>
                </div>
                <h3>Mentoring Karier</h3>
                <p>Bimbingan <strong>1-on-1</strong> dari mentor profesional untuk mempersiapkan Anda memasuki dunia kerja.</p>
                <div class="feature-stats">
                    <i class="fas fa-user-check"></i>
                    <span>Expert Mentors</span>
                </div>
            </div>
            <div class="feature-card" data-aos="fade-up" data-aos-delay="600">
                <div class="feature-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3>Komunitas Aktif</h3>
                <p>Bergabung dengan <strong>10,000+ peserta</strong> lain, berbagi pengalaman, dan networking untuk peluang karier.</p>
                <div class="feature-stats">
                    <i class="fas fa-network-wired"></i>
                    <span>Active Community</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Courses -->
    @include('components.popular-courses', ['courses' => $courses])
    <!-- CTA Section -->
    <section class="cta">
        <h2>Siap Memulai Perjalanan Belajar Anda?</h2>
        <p>Bergabunglah dengan ribuan peserta lain dan tingkatkan keterampilan Anda hari ini</p>
        @auth
            <a href="#courses" class="btn-white">Lihat Kursus Saya</a>
        @else
            <a href="{{ route('register') }}" class="btn-white">Daftar Gratis Sekarang</a>
        @endauth
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div>
                <h3 class="logo">SkillConnect.id</h3>
                <p>Platform pelatihan kerja dan sertifikasi online terpercaya untuk masa depan karier yang lebih cerah.
                </p>
            </div>
            <div>
                <h3>Perusahaan</h3>
                <ul>
                    <li><a href="{{ route('about') }}">Tentang Kami</a></li>
                    <li><a href="#">Karier</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="{{ route('contact') }}">Kontak</a></li>
                </ul>
            </div>
            <div>
                <h3>Layanan</h3>
                <ul>
                    <li><a href="#courses">Kursus Online</a></li>
                    <li><a href="#">Sertifikasi</a></li>
                    <li><a href="#">Mentoring</a></li>
                    <li><a href="#">Komunitas</a></li>
                </ul>
            </div>
            <div>
                <h3>Legal</h3>
                <ul>
                    <li><a href="#">Syarat & Ketentuan</a></li>
                    <li><a href="#">Kebijakan Privasi</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 SkillConnect.id. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Toggle Dropdown
        function toggleDropdown() {
            const dropdown = document.getElementById('userDropdown');
            dropdown.classList.toggle('show');
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const userMenu = document.querySelector('.user-menu');
            const dropdown = document.getElementById('userDropdown');
            
            if (userMenu && !userMenu.contains(event.target)) {
                dropdown.classList.remove('show');
            }
        });

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function () {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.boxShadow = '0 2px 30px rgba(0, 0, 0, 0.1)';
            } else {
                navbar.style.boxShadow = '0 2px 20px rgba(0, 0, 0, 0.05)';
            }
        });

        // Animate features on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe all feature cards
        document.addEventListener('DOMContentLoaded', function() {
            const featureCards = document.querySelectorAll('.feature-card');
            featureCards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                card.style.transition = `all 0.6s ease ${index * 0.1}s`;
                observer.observe(card);
            });

            // Animate stats on scroll
            const statItems = document.querySelectorAll('.stat-item');
            statItems.forEach((item, index) => {
                item.style.opacity = '0';
                item.style.transform = 'scale(0.8)';
                item.style.transition = `all 0.5s ease ${index * 0.1}s`;
                observer.observe(item);
            });

            // Counter animation for stats
            const animateCounter = (element, target) => {
                let current = 0;
                const increment = target / 50;
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        element.textContent = target.toLocaleString() + (target >= 100 ? '%' : '+');
                        clearInterval(timer);
                    } else {
                        if (target >= 100) {
                            element.textContent = Math.floor(current) + '%';
                        } else {
                            element.textContent = Math.floor(current).toLocaleString() + '+';
                        }
                    }
                }, 30);
            };

            const statsObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting && !entry.target.classList.contains('animated')) {
                        entry.target.classList.add('animated');
                        const h3 = entry.target.querySelector('h3');
                        const text = h3.textContent.replace(/[^0-9]/g, '');
                        const target = parseInt(text);
                        if (target) {
                            h3.textContent = '0';
                            setTimeout(() => animateCounter(h3, target), 300);
                        }
                    }
                });
            }, observerOptions);

            statItems.forEach(item => statsObserver.observe(item));
        });

        // Add hover effect sound (optional - commented out)
        // document.querySelectorAll('.feature-card').forEach(card => {
        //     card.addEventListener('mouseenter', () => {
        //         // Add subtle animation or sound here if needed
        //     });
        // });
    </script>
</body>

</html>