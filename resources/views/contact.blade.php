<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kontak - SkillConnect.id</title>
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

        .contact-section {
            max-width: 1200px;
            margin: 5rem auto;
            padding: 0 2rem;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
        }

        .contact-info h2 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            color: #1a202c;
        }

        .contact-info p {
            color: #718096;
            line-height: 1.8;
            margin-bottom: 2rem;
            font-size: 1.1rem;
        }

        .info-card {
            display: flex;
            align-items: start;
            gap: 1.5rem;
            margin-bottom: 2rem;
            padding: 1.5rem;
            background: #f7fafc;
            border-radius: 15px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .info-card:hover {
            transform: translateX(10px);
            box-shadow: 0 5px 25px rgba(102, 126, 234, 0.1);
        }

        .info-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .info-icon i {
            font-size: 1.5rem;
            color: white;
        }

        .info-content h3 {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: #1a202c;
        }

        .info-content p {
            color: #718096;
            margin: 0;
            font-size: 1rem;
        }

        .contact-form {
            background: white;
            padding: 3rem;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        .contact-form h3 {
            font-size: 1.8rem;
            font-weight: 800;
            margin-bottom: 2rem;
            color: #1a202c;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #1a202c;
            font-weight: 600;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 0.9rem;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            font-family: 'Inter', sans-serif;
            transition: border-color 0.3s;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #667eea;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 150px;
        }

        .submit-btn {
            width: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            display: none;
        }

        .alert.show {
            display: block;
        }

        .alert-success {
            background: #48bb78;
            color: white;
        }

        .alert-error {
            background: #f56565;
            color: white;
        }

        .social-section {
            background: #f7fafc;
            padding: 5rem 2rem;
            text-align: center;
        }

        .social-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .social-container h2 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            color: #1a202c;
        }

        .social-container p {
            font-size: 1.1rem;
            color: #718096;
            margin-bottom: 3rem;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .social-link {
            width: 60px;
            height: 60px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #667eea;
            font-size: 1.5rem;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            text-decoration: none;
        }

        .social-link:hover {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .map-section {
            padding: 5rem 2rem;
        }

        .map-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .map-container h2 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            color: #1a202c;
            text-align: center;
        }

        .map-container p {
            font-size: 1.1rem;
            color: #718096;
            text-align: center;
            margin-bottom: 3rem;
        }

        .map-placeholder {
            width: 100%;
            height: 400px;
            background: #f7fafc;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #e2e8f0;
        }

        .map-placeholder i {
            font-size: 4rem;
            color: #cbd5e0;
        }

        .faq-section {
            background: #f7fafc;
            padding: 5rem 2rem;
        }

        .faq-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .faq-container h2 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            color: #1a202c;
            text-align: center;
        }

        .faq-container>p {
            font-size: 1.1rem;
            color: #718096;
            text-align: center;
            margin-bottom: 3rem;
        }

        .faq-item {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            margin-bottom: 1.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .faq-question {
            font-size: 1.2rem;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .faq-question i {
            color: #667eea;
        }

        .faq-answer {
            color: #718096;
            line-height: 1.8;
        }

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

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2rem;
            }

            .contact-grid {
                grid-template-columns: 1fr;
            }

            .contact-form {
                padding: 2rem;
            }

            .footer-container {
                grid-template-columns: 1fr;
            }

            .nav-links {
                display: none;
            }
        }

        /* Lokasi Kami (Map Section) */
        .map-section {
            background: #f7fafc;
            padding: 5rem 2rem;
            text-align: center;
        }

        .map-container {
            max-width: 1000px;
            margin: 0 auto;
        }

        .map-container h2 {
            font-size: 2.2rem;
            font-weight: 800;
            color: #1a202c;
            margin-bottom: 0.5rem;
        }

        .map-container p {
            color: #718096;
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }

        .map-frame {
            position: relative;
            width: 100%;
            height: 450px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .map-frame iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .map-container h2 {
                font-size: 1.8rem;
            }

            .map-frame {
                height: 350px;
                border-radius: 12px;
            }
        }
    </style>
</head>

<body>
    @include('components.navbar')

    <section class="hero">
        <h1>Hubungi Kami</h1>
        <p>Ada pertanyaan? Tim kami siap membantu Anda. Jangan ragu untuk menghubungi kami melalui formulir di bawah
            atau informasi kontak yang tersedia.</p>
    </section>

    <section class="contact-section">
        <div class="contact-grid">
            <div class="contact-info">
                <h2>Mari Terhubung</h2>
                <p>Kami senang mendengar dari Anda. Baik Anda memiliki pertanyaan tentang kursus, bantuan teknis, atau
                    hanya ingin menyapa, tim kami siap membantu.</p>

                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="info-content">
                        <h3>Alamat Kantor</h3>
                        <p>Palcomtech, Jl. Jend. Basuki Rachmat 30128 Kemuning<br>Sumatera Selatan</p>
                    </div>
                </div>

                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="info-content">
                        <h3>Telepon</h3>
                        <p>+62 838-3449-5352<br>+62 838-9158-4614</p>
                    </div>
                </div>

                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="info-content">
                        <h3>Email</h3>
                        <p>Kaafii853@gmail.com<br>Usman29palembang@gmail.com</p>
                    </div>
                </div>

                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="info-content">
                        <h3>Jam Operasional</h3>
                        <p>Senin - Jumat: 09.00 - 18.00 WIB<br>Sabtu: 09.00 - 15.00 WIB</p>
                    </div>
                </div>
            </div>

            <div class="contact-form">
                <h3>Kirim Pesan</h3>

                @if(session('success'))
                    <div class="alert alert-success show">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-error show">
                        <ul style="margin: 0; padding-left: 1.5rem;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="alert alert-success" id="successMessage">
                    Pesan Anda berhasil dikirim! Kami akan segera menghubungi Anda.
                </div>

                <form action="{{ route('contact.submit') }}" method="POST" id="contactForm">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Lengkap *</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Nomor Telepon</label>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}">
                    </div>

                    <div class="form-group">
                        <label for="subject">Subjek *</label>
                        <select id="subject" name="subject" required>
                            <option value="">Pilih Subjek</option>
                            <option value="course" {{ old('subject') == 'course' ? 'selected' : '' }}>Pertanyaan tentang
                                Kursus</option>
                            <option value="technical" {{ old('subject') == 'technical' ? 'selected' : '' }}>Bantuan Teknis
                            </option>
                            <option value="partnership" {{ old('subject') == 'partnership' ? 'selected' : '' }}>Kerjasama
                                & Partnership</option>
                            <option value="feedback" {{ old('subject') == 'feedback' ? 'selected' : '' }}>Feedback & Saran
                            </option>
                            <option value="other" {{ old('subject') == 'other' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message">Pesan *</label>
                        <textarea id="message" name="message" required>{{ old('message') }}</textarea>
                    </div>

                    <button type="submit" class="submit-btn">Kirim Pesan</button>
                </form>
            </div>
        </div>
    </section>

    <section class="map-section">
        <div class="map-container">
            <h2>Lokasi Kami</h2>
            <p>Kunjungi kantor kami untuk berdiskusi dan berkolaborasi secara langsung</p>
            <div class="map-frame">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.5148145921917!2d104.74568677359643!3d-2.954545697021652!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3b7606b6ea9f07%3A0x83305e6d548171d!2sInstitut%20Teknologi%20dan%20Bisnis%20PalComTech!5e0!3m2!1sid!2sid!4v1762961973715!5m2!1sid!2sid"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>


    <section class="social-section">
        <div class="social-container">
            <h2>Ikuti Kami</h2>
            <p>Tetap terhubung dengan kami melalui media sosial untuk update terbaru, tips pembelajaran, dan promo
                menarik</p>
            <div class="social-links">
                <a href="https://www.facebook.com/share/1G3FKNdXQG/?mibextid=wwXIfr" class="social-link" aria-label="Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://www.instagram.com/aficha894_?igsh=MW5zb3hxYTlpMDlodQ==" class="social-link" aria-label="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://x.com/aficha123?s=21" class="social-link" aria-label="Twitter">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://www.linkedin.com/in/aficha-lhara-beliandha-74656a370?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app" class="social-link" aria-label="LinkedIn">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a href="#" class="social-link" aria-label="YouTube">
                    <i class="fab fa-youtube"></i>
                </a>
                <a href="wa.me/6283834495352" class="social-link" aria-label="WhatsApp">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </div>
        </div>
    </section>

    <section class="faq-section">
        <div class="faq-container">
            <h2>Pertanyaan Umum</h2>
            <p>Berikut beberapa pertanyaan yang sering diajukan</p>

            <div class="faq-item">
                <div class="faq-question">
                    <i class="fas fa-question-circle"></i>
                    Berapa lama waktu respons untuk pertanyaan?
                </div>
                <div class="faq-answer">
                    Kami berusaha merespons semua pertanyaan dalam waktu 24 jam pada hari kerja. Untuk pertanyaan
                    mendesak, Anda dapat menghubungi kami melalui WhatsApp.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <i class="fas fa-question-circle"></i>
                    Apakah bisa berkonsultasi langsung di kantor?
                </div>
                <div class="faq-answer">
                    Ya, Anda dapat mengunjungi kantor kami. Kami sarankan untuk membuat janji terlebih dahulu agar kami
                    dapat melayani Anda dengan lebih baik.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <i class="fas fa-question-circle"></i>
                    Bagaimana cara mendaftar kursus?
                </div>
                <div class="faq-answer">
                    Anda dapat mendaftar langsung melalui website kami atau menghubungi tim kami untuk bantuan
                    pendaftaran. Proses pendaftaran sangat mudah dan cepat.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <i class="fas fa-question-circle"></i>
                    Apakah ada layanan customer support 24/7?
                </div>
                <div class="faq-answer">
                    Saat ini layanan customer support kami tersedia pada jam kerja. Namun, Anda dapat mengirim pesan
                    kapan saja dan kami akan merespons pada jam kerja berikutnya.
                </div>
            </div>
        </div>
    </section>

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
            <p>© 2025 SkillConnect.id. All rights reserved.</p>
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