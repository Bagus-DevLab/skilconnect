<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Kursus - SkillConnect.id</title>
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
            background: #f7fafc;
        }

        /* Navbar - Sama seperti home */
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
            border: none;
            cursor: pointer;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        /* Page Header */
        .page-header {
            margin-top: 80px;
            padding: 4rem 2rem 3rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-align: center;
        }

        .page-header h1 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }

        .page-header p {
            font-size: 1.1rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Filters Section */
        .filters-section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 2rem 1rem;
        }

        .filters-container {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            align-items: center;
        }

        .filter-group {
            flex: 1;
            min-width: 200px;
        }

        .filter-group label {
            display: block;
            font-size: 0.9rem;
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 0.5rem;
        }

        .filter-group select,
        .filter-group input {
            width: 100%;
            padding: 0.7rem;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: border-color 0.3s;
            font-family: 'Inter', sans-serif;
        }

        .filter-group select:focus,
        .filter-group input:focus {
            outline: none;
            border-color: #667eea;
        }

        .search-box {
            position: relative;
        }

        .search-box i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #a0aec0;
        }

        .search-box input {
            padding-left: 2.5rem;
        }

        .filter-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .btn-filter {
            padding: 0.7rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-filter-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-filter-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-filter-secondary {
            background: #edf2f7;
            color: #4a5568;
        }

        .btn-filter-secondary:hover {
            background: #e2e8f0;
        }

        /* Courses Section */
        .courses-section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .courses-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .courses-count {
            font-size: 1.1rem;
            color: #4a5568;
        }

        .courses-count strong {
            color: #667eea;
            font-weight: 700;
        }

        .sort-dropdown {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .sort-dropdown select {
            padding: 0.5rem 1rem;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
        }

        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .course-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
            transition: all 0.3s;
            cursor: pointer;
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
            position: relative;
            overflow: hidden;
        }

        .course-image::before {
            content: '';
            position: absolute;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -100px;
            right: -100px;
        }

        .course-image i {
            font-size: 3.5rem;
            color: rgba(255, 255, 255, 0.4);
            z-index: 1;
        }

        .course-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: rgba(255, 255, 255, 0.95);
            color: #667eea;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
            z-index: 2;
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
            line-height: 1.4;
            min-height: 2.8em;
        }

        .course-description {
            color: #718096;
            font-size: 0.9rem;
            line-height: 1.6;
            margin-bottom: 1rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .course-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #718096;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e2e8f0;
        }

        .course-meta span {
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .course-meta i {
            font-size: 0.85rem;
        }

        .course-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .course-price {
            font-size: 1.5rem;
            font-weight: 800;
            color: #667eea;
        }

        .course-price small {
            font-size: 0.7rem;
            color: #a0aec0;
            font-weight: 500;
            text-decoration: line-through;
        }

        .btn-enroll {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
        }

        .btn-enroll:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
            margin-top: 3rem;
        }

        .pagination-btn {
            padding: 0.7rem 1.2rem;
            border: 2px solid #e2e8f0;
            background: white;
            color: #4a5568;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
        }

        .pagination-btn:hover:not(.disabled) {
            border-color: #667eea;
            color: #667eea;
        }

        .pagination-btn.active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-color: transparent;
        }

        .pagination-btn.disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
        }

        .empty-state i {
            font-size: 4rem;
            color: #cbd5e0;
            margin-bottom: 1rem;
        }

        .empty-state h3 {
            font-size: 1.5rem;
            color: #4a5568;
            margin-bottom: 0.5rem;
        }

        .empty-state p {
            color: #a0aec0;
        }

        /* Loading State */
        .loading {
            text-align: center;
            padding: 3rem;
        }

        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 4px solid #e2e8f0;
            border-top-color: #667eea;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 1rem;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Footer */
        .footer {
            background: #1a202c;
            color: white;
            padding: 3rem 2rem 1rem;
            margin-top: 4rem;
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
            .page-header h1 {
                font-size: 1.8rem;
            }

            .filters-container {
                flex-direction: column;
            }

            .filter-group {
                min-width: 100%;
            }

            .courses-header {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }

            .courses-grid {
                grid-template-columns: 1fr;
            }

            .footer-container {
                grid-template-columns: 1fr;
            }

            .nav-links {
                gap: 1rem;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    @include('components.navbar')

    <!-- Page Header -->
    <section class="page-header">
        <h1>Jelajahi Semua Kursus</h1>
        <p>Temukan kursus yang tepat untuk mengembangkan keterampilan dan karier Anda</p>
    </section>

    <!-- Filters Section -->
    <section class="filters-section">
        <div class="filters-container">
            <div class="filter-group search-box">
                <label>Cari Kursus</label>
                <i class="fas fa-search"></i>
                <input type="text" id="searchInput" placeholder="Cari berdasarkan judul atau kategori...">
            </div>
            <div class="filter-group">
                <label>Kategori</label>
                <select id="categoryFilter">
                    <option value="">Semua Kategori</option>
                    <option value="Programming">Programming</option>
                    <option value="Design">Design</option>
                    <option value="Business">Business</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Data Science">Data Science</option>
                </select>
            </div>
            <div class="filter-group">
                <label>Harga</label>
                <select id="priceFilter">
                    <option value="">Semua Harga</option>
                    <option value="free">Gratis</option>
                    <option value="0-500000">Rp 0 - 500.000</option>
                    <option value="500000-1000000">Rp 500.000 - 1.000.000</option>
                    <option value="1000000+">Rp 1.000.000+</option>
                </select>
            </div>
            <div class="filter-buttons">
                <button class="btn-filter btn-filter-primary" onclick="applyFilters()">
                    <i class="fas fa-filter"></i> Filter
                </button>
                <button class="btn-filter btn-filter-secondary" onclick="resetFilters()">
                    <i class="fas fa-redo"></i> Reset
                </button>
            </div>
        </div>
    </section>

    <!-- Courses Section -->
    <section class="courses-section">
        <div class="courses-header">
            <div class="courses-count">
                Menampilkan <strong id="coursesCount">{{ count($courses) }}</strong> kursus
            </div>
            <div class="sort-dropdown">
                <label>Urutkan:</label>
                <select id="sortBy" onchange="sortCourses()">
                    <option value="popular">Paling Populer</option>
                    <option value="newest">Terbaru</option>
                    <option value="price-low">Harga Terendah</option>
                    <option value="price-high">Harga Tertinggi</option>
                    <option value="title">Nama (A-Z)</option>
                </select>
            </div>
        </div>

        <div class="courses-grid" id="coursesGrid">
            @forelse ($courses as $course)
                <div class="course-card" data-category="{{ $course->category }}" data-price="{{ $course->price }}">
                    <div class="course-image">
                        @if($course->participants > 1000)
                            <span class="course-badge"><i class="fas fa-fire"></i> Populer</span>
                        @endif
                        <i class="fas {{ $course->icon_class ?? 'fa-book-open' }}"></i>
                    </div>
                    <div class="course-content">
                        <span class="course-category">{{ $course->category }}</span>
                        <h3>{{ $course->title }}</h3>
                        <p class="course-description">{{ $course->description ?? 'Pelajari keterampilan praktis yang langsung dapat diterapkan di dunia kerja.' }}</p>
                        <div class="course-meta">
                            <span><i class="fas fa-clock"></i> {{ $course->duration }}</span>
                            <span><i class="fas fa-user"></i> {{ number_format($course->participants, 0, ',', '.') }}</span>
                        </div>
                        <div class="course-footer">
                            <div class="course-price">
                                @if($course->price == 0)
                                    Gratis
                                @else
                                    Rp {{ number_format($course->price, 0, ',', '.') }}
                                @endif
                            </div>
                            <button class="btn-enroll">Daftar Sekarang</button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <i class="fas fa-folder-open"></i>
                    <h3>Belum Ada Kursus</h3>
                    <p>Kursus akan segera tersedia. Silakan cek kembali nanti.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination (jika menggunakan pagination) -->
        <div class="pagination" id="pagination" style="display: none;">
            <button class="pagination-btn disabled"><i class="fas fa-chevron-left"></i></button>
            <button class="pagination-btn active">1</button>
            <button class="pagination-btn">2</button>
            <button class="pagination-btn">3</button>
            <button class="pagination-btn"><i class="fas fa-chevron-right"></i></button>
        </div>
    </section>

    <!-- Footer -->
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
        // Store original courses data
        let allCourses = [];
        let filteredCourses = [];

        document.addEventListener('DOMContentLoaded', function() {
            // Get all course cards
            allCourses = Array.from(document.querySelectorAll('.course-card'));
            filteredCourses = [...allCourses];
            updateCoursesCount();
        });

        // Apply Filters
        function applyFilters() {
            const searchValue = document.getElementById('searchInput').value.toLowerCase();
            const categoryValue = document.getElementById('categoryFilter').value;
            const priceValue = document.getElementById('priceFilter').value;

            filteredCourses = allCourses.filter(card => {
                const title = card.querySelector('h3').textContent.toLowerCase();
                const category = card.dataset.category;
                const price = parseInt(card.dataset.price);

                // Search filter
                const matchesSearch = searchValue === '' || title.includes(searchValue) || category.toLowerCase().includes(searchValue);

                // Category filter
                const matchesCategory = categoryValue === '' || category === categoryValue;

                // Price filter
                let matchesPrice = true;
                if (priceValue === 'free') {
                    matchesPrice = price === 0;
                } else if (priceValue === '0-500000') {
                    matchesPrice = price > 0 && price <= 500000;
                } else if (priceValue === '500000-1000000') {
                    matchesPrice = price > 500000 && price <= 1000000;
                } else if (priceValue === '1000000+') {
                    matchesPrice = price > 1000000;
                }

                return matchesSearch && matchesCategory && matchesPrice;
            });

            updateDisplay();
        }

        // Reset Filters
        function resetFilters() {
            document.getElementById('searchInput').value = '';
            document.getElementById('categoryFilter').value = '';
            document.getElementById('priceFilter').value = '';
            document.getElementById('sortBy').value = 'popular';
            
            filteredCourses = [...allCourses];
            updateDisplay();
        }

        // Sort Courses
        function sortCourses() {
            const sortBy = document.getElementById('sortBy').value;

            filteredCourses.sort((a, b) => {
                switch(sortBy) {
                    case 'popular':
                        const participantsA = parseInt(a.querySelector('.course-meta span:last-child').textContent.replace(/\D/g, ''));
                        const participantsB = parseInt(b.querySelector('.course-meta span:last-child').textContent.replace(/\D/g, ''));
                        return participantsB - participantsA;
                    
                    case 'price-low':
                        return parseInt(a.dataset.price) - parseInt(b.dataset.price);
                    
                    case 'price-high':
                        return parseInt(b.dataset.price) - parseInt(a.dataset.price);
                    
                    case 'title':
                        const titleA = a.querySelector('h3').textContent;
                        const titleB = b.querySelector('h3').textContent;
                        return titleA.localeCompare(titleB);
                    
                    default:
                        return 0;
                }
            });

            updateDisplay();
        }

        // Update Display
        function updateDisplay() {
            const grid = document.getElementById('coursesGrid');
            
            // Clear grid
            grid.innerHTML = '';

            // Show filtered and sorted courses
            if (filteredCourses.length === 0) {
                grid.innerHTML = `
                    <div class="empty-state" style="grid-column: 1 / -1;">
                        <i class="fas fa-search"></i>
                        <h3>Tidak Ada Hasil</h3>
                        <p>Tidak ada kursus yang sesuai dengan filter Anda. Coba ubah filter atau reset pencarian.</p>
                    </div>
                `;
            } else {
                filteredCourses.forEach(card => {
                    grid.appendChild(card);
                });
            }

            updateCoursesCount();
            animateCourseCards();
        }

        // Update Courses Count
        function updateCoursesCount() {
            document.getElementById('coursesCount').textContent = filteredCourses.length;
        }

        // Animate Course Cards
        function animateCourseCards() {
            const cards = document.querySelectorAll('.course-card');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    card.style.transition = 'all 0.5s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 50);
            });
        }

        // Search on Enter
        document.getElementById('searchInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                applyFilters();
            }
        });

        // Smooth scroll for navigation
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

        // Initial animation
        window.addEventListener('load', animateCourseCards);
    </script>
</body>

</html>