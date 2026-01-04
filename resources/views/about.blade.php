<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - SkillConnect.id</title>
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

        /* Hero Section */
        .hero {
            margin-top: 80px;
            padding: 5rem 2rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-align: center;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.2rem;
            opacity: 0.9;
            max-width: 700px;
            margin: 0 auto;
        }

        /* About Content */
        .about-section {
            max-width: 1200px;
            margin: 5rem auto;
            padding: 0 2rem;
        }

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            margin-bottom: 5rem;
        }

        .about-content h2 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            color: #1a202c;
        }

        .about-content p {
            color: #718096;
            line-height: 1.8;
            margin-bottom: 1rem;
            font-size: 1.1rem;
        }

        .about-image {
            width: 100%;
            height: 400px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .about-image i {
            font-size: 5rem;
            color: rgba(255, 255, 255, 0.3);
        }

        /* Mission Vision */
        .mission-vision {
            background: #f7fafc;
            padding: 5rem 2rem;
        }

        .mv-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
        }

        .mv-card {
            background: white;
            padding: 3rem;
            border-radius: 20px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
        }

        .mv-card h3 {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            color: #1a202c;
        }

        .mv-card p {
            color: #718096;
            line-height: 1.8;
            font-size: 1.1rem;
        }

        /* Values Section */
        .values {
            max-width: 1200px;
            margin: 5rem auto;
            padding: 0 2rem;
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

        .values-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
        }

        .value-card {
            text-align: center;
            padding: 2rem;
        }

        .value-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
        }

        .value-icon i {
            font-size: 2rem;
            color: white;
        }

        .value-card h3 {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #1a202c;
        }

        .value-card p {
            color: #718096;
            line-height: 1.8;
        }

        /* Team Section */
        .team {
            background: #f7fafc;
            padding: 5rem 2rem;
        }

        .team-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
        }

        .team-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s;
        }

        .team-card:hover {
            transform: translateY(-10px);
        }

        .team-avatar {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
        }

        .team-avatar i {
            font-size: 3rem;
            color: rgba(255, 255, 255, 0.5);
        }

        .team-card h3 {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: #1a202c;
        }

        .team-card p {
            color: #667eea;
            font-weight: 600;
            font-size: 0.9rem;
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
            .hero h1 {
                font-size: 2rem;
            }

            .about-grid,
            .mv-container {
                grid-template-columns: 1fr;
            }

            .values-grid,
            .team-grid {
                grid-template-columns: 1fr;
            }

            .footer-container {
                grid-template-columns: 1fr;
            }

            .nav-links {
                display: none;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    @include('components.navbar')

    <!-- Hero Section -->
    <section class="hero">
        <h1>Tentang SkillConnect.id</h1>
        <p>Platform pelatihan kerja online yang berkomitmen mengembangkan talenta Indonesia melalui pendidikan
            berkualitas dan sertifikasi profesional</p>
    </section>

    <!-- About Content -->
    <section class="about-section">
        <div class="about-grid">
            <div class="about-content">
                <h2>Memberdayakan Talenta Indonesia</h2>
                <p>SkillConnect.id didirikan dengan visi untuk menjembatani kesenjangan keterampilan antara lulusan
                    pendidikan dengan kebutuhan industri di Indonesia.</p>
                <p>Kami percaya bahwa setiap individu memiliki potensi untuk berkembang, dan dengan akses ke pelatihan
                    berkualitas, mereka dapat mencapai karier impian mereka.</p>
                <p>Dengan kurikulum yang dirancang bersama praktisi industri, kami memastikan setiap peserta mendapatkan
                    keterampilan yang relevan dan siap diterapkan di dunia kerja.</p>
            </div>
            <div class="about-image">
                <i class="fas fa-lightbulb"></i>
            </div>
        </div>

        <div class="about-grid" style="direction: rtl;">
            <div class="about-content" style="direction: ltr;">
                <h2>Komitmen Kami</h2>
                <p>Sejak diluncurkan, kami telah membantu ribuan individu meningkatkan keterampilan mereka dan
                    mendapatkan pekerjaan yang lebih baik.</p>
                <p>Kami bekerja sama dengan lebih dari 100 perusahaan terkemuka di Indonesia untuk memahami kebutuhan
                    industri dan menyediakan pelatihan yang tepat sasaran.</p>
                <p>Platform kami dirancang dengan teknologi terkini untuk memberikan pengalaman belajar yang interaktif,
                    fleksibel, dan dapat diakses dari mana saja.</p>
            </div>
            <div class="about-image" style="direction: ltr;">
                <i class="fas fa-rocket"></i>
            </div>
        </div>
    </section>

    <!-- Mission Vision -->
    <section class="mission-vision">
        <div class="mv-container">
            <div class="mv-card">
                <h3>Misi Kami</h3>
                <p>Menyediakan akses pendidikan dan pelatihan berkualitas tinggi yang terjangkau untuk semua kalangan,
                    membantu mereka mengembangkan keterampilan yang dibutuhkan industri, dan membuka peluang karier yang
                    lebih luas melalui sertifikasi profesional yang diakui.</p>
            </div>
            <div class="mv-card">
                <h3>Visi Kami</h3>
                <p>Menjadi platform pelatihan kerja online terdepan di Indonesia yang menjembatani talenta dengan
                    peluang karier, menciptakan ekosistem pembelajaran berkelanjutan, dan berkontribusi dalam
                    pengembangan SDM Indonesia yang kompetitif di era digital.</p>
            </div>
        </div>
    </section>

    <!-- Values -->
    <section class="values">
        <div class="section-title">
            <h2>Nilai-Nilai Kami</h2>
            <p>Prinsip yang menjadi fondasi dalam setiap langkah kami</p>
        </div>
        <div class="values-grid">
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-star"></i>
                </div>
                <h3>Kualitas</h3>
                <p>Menyediakan konten pelatihan berkualitas tinggi dengan standar industri internasional</p>
            </div>
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-hands-helping"></i>
                </div>
                <h3>Aksesibilitas</h3>
                <p>Membuat pendidikan berkualitas dapat diakses oleh semua kalangan tanpa batasan</p>
            </div>
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3>Inovasi</h3>
                <p>Terus berinovasi dalam metode pembelajaran dan teknologi platform</p>
            </div>
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Integritas</h3>
                <p>Menjunjung tinggi kejujuran dan transparansi dalam setiap layanan kami</p>
            </div>
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3>Kolaborasi</h3>
                <p>Membangun ekosistem pembelajaran melalui kolaborasi dengan industri</p>
            </div>
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-trophy"></i>
                </div>
                <h3>Keunggulan</h3>
                <p>Berkomitmen untuk selalu memberikan hasil terbaik bagi peserta kami</p>
            </div>
        </div>
    </section>

    <!-- Team -->
    <section class="team">
        <div class="team-container">
            <div class="section-title">
                <h2>Tim Kami</h2>
                <p>Profesional berpengalaman yang berdedikasi untuk kesuksesan Anda</p>
            </div>

            <div class="team-grid" style="
            grid-template-columns: repeat(2, 1fr);
            justify-items: center;
            gap: 1.2rem;
        ">
                <div class="team-card" style="
                background: white;
                border-radius: 15px;
                padding: 1.5rem;
                text-align: center;
                width: 100%;
                max-width: 340px;
                min-height: 340px;
                box-shadow: 0 5px 20px rgba(0,0,0,0.07);
                transition: transform 0.3s;
            ">
                    <div class="team-avatar" style="background: none;">
                        <img src="{{ asset('images/1.jpg') }}" alt="Aficha Lhara Beliandha"
                            style="width:132px; height:132px; border-radius:50%; object-fit:cover; margin-bottom:15px;">
                    </div>
                    <h3 style="font-size:1.2rem; font-weight:700; margin-bottom:0.5rem;">Aficha Lhara Beliandha</h3>
                    <p style="color:#667eea; font-weight:600;">CEO & Founder</p>
                </div>

                <div class="team-card" style="
                background: white;
                border-radius: 15px;
                padding: 1.5rem;
                text-align: center;
                width: 100%;
                max-width: 340px;
                min-height: 340px;
                box-shadow: 0 5px 20px rgba(0,0,0,0.07);
                transition: transform 0.3s;
            ">
                    <div class="team-avatar" style="background: none;">
                        <img src="{{ asset('images/2.jpg') }}" alt="Usman bin afan"
                            style="width:132px; height:132px; border-radius:50%; object-fit:cover; margin-bottom:15px;">
                    </div>
                    <h3 style="font-size:1.2rem; font-weight:700; margin-bottom:0.5rem;">Usman</h3>
                    <p style="color:#667eea; font-weight:600;">Head of Learning</p>
                </div>
            </div>
        </div>
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
                    <li><a href="{{ route('home') }}#courses">Kursus Online</a></li>
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
        window.addEventListener('scroll', function () {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.boxShadow = '0 2px 30px rgba(0, 0, 0, 0.1)';
            } else {
                navbar.style.boxShadow = '0 2px 20px rgba(0, 0, 0, 0.05)';
            }
        });
    </script>
</body>

</html>