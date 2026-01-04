    <!DOCTYPE html>
    <html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SkillConnect.id - Semua Kursus</title>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <style>
            /* CSS yang diambil dari halaman utama untuk konsistensi */
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
                padding-top: 80px; /* Tambahkan padding agar konten tidak tertutup navbar fixed */
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

            /* User Dropdown (dibiarkan karena ada di komponen navbar) */
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
            
            /* Section Title (Gaya dari home) */
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

            /* Courses Section - Bagian ini adalah fokus utama */
            .courses {
                background: white; /* Diubah menjadi putih agar beda dengan home yang bagian courses-nya abu */
                padding: 5rem 2rem;
                min-height: calc(100vh - 100px); /* Memastikan halaman memiliki tinggi minimal */
            }

            .courses-container {
                max-width: 1200px;
                margin: 0 auto;
            }
            
            /* Tambahan untuk Filter/Pencarian di halaman ini */
            .course-filter-bar {
                margin-bottom: 3rem;
                padding: 1.5rem;
                background: #f7fafc;
                border-radius: 10px;
                display: flex;
                gap: 1rem;
                flex-wrap: wrap;
                justify-content: center;
            }

            .course-filter-bar input[type="text"],
            .course-filter-bar select {
                padding: 0.75rem 1rem;
                border: 1px solid #e2e8f0;
                border-radius: 8px;
                font-size: 1rem;
                width: 100%;
                max-width: 300px;
                transition: border-color 0.3s, box-shadow 0.3s;
            }

            .course-filter-bar input[type="text"]:focus,
            .course-filter-bar select:focus {
                border-color: #667eea;
                outline: none;
                box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
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
                cursor: pointer;
                display: flex;
                flex-direction: column;
                height: 100%;
            }

            .course-card:hover {
                transform: translateY(-10px);
                box-shadow: 0 15px 40px rgba(102, 126, 234, 0.2);
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
                flex-grow: 1;
                display: flex;
                flex-direction: column;
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

            .course-meta span i {
                margin-right: 0.4rem;
                color: #667eea;
            }

            .course-price {
                font-size: 1.5rem;
                font-weight: 800;
                color: #667eea;
                margin-top: auto; /* Memastikan harga selalu di bagian bawah */
            }
            
            /* Paginasi */
            .pagination {
                display: flex;
                justify-content: center;
                margin-top: 3rem;
                gap: 0.5rem;
            }

            .pagination a, .pagination span {
                text-decoration: none;
                padding: 0.7rem 1rem;
                border-radius: 8px;
                font-weight: 600;
                transition: all 0.3s;
            }

            .pagination a {
                background: #f7fafc;
                color: #667eea;
            }

            .pagination a:hover {
                background: #e2e8f0;
            }

            .pagination span.active {
                background: #667eea;
                color: white;
                box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
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
                .courses-grid {
                    grid-template-columns: 1fr;
                }

                .footer-container {
                    grid-template-columns: 1fr;
                }
                
                .course-filter-bar {
                    flex-direction: column;
                    align-items: stretch;
                }

                .course-filter-bar input[type="text"],
                .course-filter-bar select {
                    max-width: 100%;
                }
            }
        </style>
    </head>

    <body>
        
        {{-- Komponen Navbar (Diasumsikan ada di 'components.navbar') --}}
        @include('components.navbar')

        <section class="courses" id="all-courses">
            <div class="courses-container">
                <div class="section-title">
                    <h2>Semua Kursus Kami 📚</h2>
                    <p>Temukan ratusan kursus berkualitas dari berbagai kategori untuk meningkatkan keterampilan Anda.</p>
                </div>

                {{-- Filter dan Pencarian --}}
                <div class="course-filter-bar">
                    <input type="text" placeholder="Cari kursus (misalnya: Data Science, UI/UX)">
                    <select>
                        <option value="">Semua Kategori</option>
                        <option value="teknologi">Teknologi</option>
                        <option value="desain">Desain</option>
                        <option value="bisnis">Bisnis</option>
                        <option value="pemasaran">Pemasaran</option>
                        {{-- Tambahkan kategori lain sesuai kebutuhan --}}
                    </select>
                    <select>
                        <option value="">Urutkan Berdasarkan</option>
                        <option value="populer">Paling Populer</option>
                        <option value="terbaru">Terbaru</option>
                        <option value="termurah">Harga Termurah</option>
                    </select>
                </div>
                
                <div class="courses-grid">
                    {{-- Loop melalui data kursus yang dilewatkan dari Controller --}}
                    @forelse ($courses as $course)
                        <a href="{{ route('courses.show', $course->slug) }}" class="course-card">
                            <div class="course-image">
                                {{-- Gunakan icon yang relevan, misalnya fa-code untuk coding, fa-palette untuk desain, dll. --}}
                                <i class="fas {{ $course->icon_class ?? 'fa-book-open' }}"></i>
                            </div>
                            <div class="course-content">
                                <span class="course-category">{{ $course->category }}</span>
                                <h3>{{ $course->title }}</h3>
                                <div class="course-meta">
                                    <span><i class="fas fa-clock"></i> {{ $course->duration }}</span>
                                    <span><i class="fas fa-user"></i> {{ number_format($course->participants, 0, ',', '.') }} Peserta</span>
                                </div>
                                <div class="course-price">Rp {{ number_format($course->price, 0, ',', '.') }}</div>
                            </div>
                        </a>
                    @empty
                        <div style="grid-column: 1 / -1; text-align: center; padding: 3rem; background: #fff; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
                            <i class="fas fa-exclamation-triangle" style="font-size: 2rem; color: #e53e3e; margin-bottom: 1rem;"></i>
                            <p style="font-size: 1.1rem; color: #4a5568;">Maaf, belum ada kursus yang tersedia dalam kategori ini atau kriteria pencarian.</p>
                            <a href="{{ route('home') }}" class="btn-primary" style="display: inline-block; margin-top: 1.5rem;">Kembali ke Beranda</a>
                        </div>
                    @endforelse
                </div>

                {{-- Paginasi (Asumsikan Laravel melakukan paginasi) --}}
                {{-- <div class="pagination">
                    {{ $courses->links() }}
                </div> --}}
                <div class="pagination">
                    <a href="#" class="prev"><i class="fas fa-arrow-left"></i> Sebelumnya</a>
                    <span class="active">1</span>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#" class="next">Berikutnya <i class="fas fa-arrow-right"></i></a>
                </div>

            </div>
        </section>

        {{-- Komponen Footer --}}
        <footer class="footer">
            <div class="footer-container">
                <div>
                    <h3 class="logo">SkillConnect.id</h3>
                    <p>Platform pelatihan kerja dan sertifikasi online terpercaya untuk masa depan karier yang lebih cerah.</p>
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
                        <li><a href="{{ route('courses.index') }}">Kursus Online</a></li>
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
            // SCRIPT UNTUK NAVBAR DAN LAIN-LAIN (Jika diperlukan)
            // Toggle Dropdown (Jika komponen navbar-nya tidak memiliki logic sendiri)
            function toggleDropdown() {
                const dropdown = document.getElementById('userDropdown');
                dropdown.classList.toggle('show');
            }

            document.addEventListener('click', function(event) {
                const userMenu = document.querySelector('.user-menu');
                const dropdown = document.getElementById('userDropdown');
                
                if (userMenu && dropdown && !userMenu.contains(event.target)) {
                    dropdown.classList.remove('show');
                }
            });
        </script>
    </body>

    </html>