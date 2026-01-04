<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Recommendation Hub - SkillConnect.id</title>
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #1a1a1a;
        }

        /* Navigation */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 1.2rem 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
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
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .nav-links a {
            color: #4a5568;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-links a:hover {
            color: #667eea;
        }

        .nav-links a.active {
            color: #667eea;
            font-weight: 600;
        }

        /* Main Container */
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 3rem 2rem;
        }

        /* Hero Section */
        .hero {
            text-align: center;
            color: white;
            margin-bottom: 4rem;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }

        .ai-icon {
            width: 70px;
            height: 70px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .hero p {
            font-size: 1.3rem;
            opacity: 0.95;
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Recommendation Cards Grid */
        .rec-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2.5rem;
            margin-bottom: 3rem;
        }

        .rec-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            transition: all 0.4s ease;
            cursor: pointer;
            position: relative;
        }

        .rec-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.25);
        }

        .card-header {
            padding: 3rem 2rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
            overflow: hidden;
        }

        .card-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: pulse 3s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.1); opacity: 0.8; }
        }

        .card-icon {
            font-size: 4rem;
            color: white;
            text-align: center;
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
        }

        .card-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: white;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .card-body {
            padding: 2rem;
        }

        .card-description {
            color: #4a5568;
            font-size: 1rem;
            line-height: 1.7;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .card-features {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            color: #2d3748;
            font-size: 0.95rem;
        }

        .feature-item i {
            color: #667eea;
            font-size: 1.1rem;
            width: 20px;
        }

        .btn-start {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.8rem;
        }

        .btn-start:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
        }

        .badge {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            background: rgba(255, 255, 255, 0.95);
            color: #667eea;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 700;
            z-index: 2;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(5px);
            z-index: 1000;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: white;
            border-radius: 25px;
            max-width: 800px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            animation: modalSlideIn 0.4s ease;
        }

        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 2.5rem;
            text-align: center;
            color: white;
            position: relative;
        }

        .modal-close {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 1.3rem;
            transition: all 0.3s;
        }

        .modal-close:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: rotate(90deg);
        }

        .modal-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
        }

        .modal-title {
            font-size: 2rem;
            font-weight: 800;
        }

        .modal-subtitle {
            opacity: 0.9;
            margin-top: 0.5rem;
        }

        .modal-body {
            padding: 2.5rem;
        }

        .form-group {
            margin-bottom: 1.8rem;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 0.6rem;
            font-size: 0.95rem;
        }

        .form-label i {
            color: #667eea;
            margin-right: 0.5rem;
        }

        .form-control {
            width: 100%;
            padding: 0.9rem 1.2rem;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 1rem;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        .radio-group {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1rem;
            margin-top: 0.8rem;
        }

        .radio-option {
            position: relative;
        }

        .radio-option input {
            position: absolute;
            opacity: 0;
        }

        .radio-option label {
            display: block;
            padding: 1.2rem;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: 500;
        }

        .radio-option input:checked + label {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-color: #667eea;
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.3);
            transform: scale(1.05);
        }

        .radio-option label:hover {
            border-color: #667eea;
        }

        .btn-generate {
            width: 100%;
            padding: 1.2rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.8rem;
        }

        .btn-generate:hover:not(:disabled) {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        }

        .btn-generate:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .spinner {
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Results */
        .results {
            display: none;
            margin-top: 2rem;
        }

        .results.show {
            display: block;
        }

        .result-card {
            background: #f7fafc;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            border-left: 4px solid #667eea;
        }

        .result-title {
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }

        .result-content {
            color: #4a5568;
            line-height: 1.6;
        }

        .tag {
            display: inline-block;
            background: #667eea;
            color: white;
            padding: 0.4rem 0.9rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            margin: 0.3rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.2rem;
            }

            .rec-grid {
                grid-template-columns: 1fr;
            }

            .modal-content {
                margin: 1rem;
            }

            .radio-group {
                grid-template-columns: 1fr;
            }

            .nav-links {
                gap: 1rem;
            }

            .nav-links a {
                font-size: 0.9rem;
            }

            .nav-links a i {
                display: none;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo">SkillConnect.id</div>
            <div class="nav-links">
                <a href="/" id="navBeranda">
                    <i class="fas fa-home"></i> Beranda
                </a>
                <a href="/courses" id="navKursus">
                    <i class="fas fa-book"></i> Kursus
                </a>
                <a href="/ai-recommendation" id="navAI" class="active">
                    <i class="fas fa-brain"></i> AI Rekomendasi
                </a>
                <a href="/profile" id="navProfile">
                    <i class="fas fa-user"></i> Profile
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="container">
        <!-- Hero Section -->
        <div class="hero">
            <h1>
                <span class="ai-icon">
                    <i class="fas fa-brain"></i>
                </span>
                AI Recommendation Hub
            </h1>
            <p>Dapatkan rekomendasi yang dipersonalisasi untuk skill, job, dan kursus menggunakan teknologi AI yang canggih</p>
        </div>

        <!-- Recommendation Cards -->
        <div class="rec-grid">
            <!-- Skill Recommendation -->
            <div class="rec-card" onclick="openModal('skill')">
                <div class="card-header">
                    <div class="badge">AI Powered</div>
                    <div class="card-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <div class="card-title">Rekomendasi Skill</div>
                </div>
                <div class="card-body">
                    <p class="card-description">
                        Temukan skill yang paling relevan untuk dikembangkan berdasarkan tujuan karier dan tren industri
                    </p>
                    <div class="card-features">
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Analisis skill gap personal</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-chart-line"></i>
                            <span>Tren skill terkini di industri</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-road"></i>
                            <span>Learning path yang terstruktur</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-bullseye"></i>
                            <span>Disesuaikan dengan goals Anda</span>
                        </div>
                    </div>
                    <button class="btn-start">
                        <i class="fas fa-rocket"></i>
                        Mulai Analisis
                    </button>
                </div>
            </div>

            <!-- Job Recommendation -->
            <div class="rec-card" onclick="openModal('job')">
                <div class="card-header">
                    <div class="badge">AI Powered</div>
                    <div class="card-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <div class="card-title">Rekomendasi Job</div>
                </div>
                <div class="card-body">
                    <p class="card-description">
                        Dapatkan rekomendasi pekerjaan yang sesuai dengan skill, pengalaman, dan preferensi karier Anda
                    </p>
                    <div class="card-features">
                        <div class="feature-item">
                            <i class="fas fa-user-tie"></i>
                            <span>Matching berdasarkan skill</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Filter lokasi & industri</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-money-bill-wave"></i>
                            <span>Sesuai ekspektasi gaji</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-star"></i>
                            <span>Peluang karier terbaik</span>
                        </div>
                    </div>
                    <button class="btn-start">
                        <i class="fas fa-search"></i>
                        Cari Job
                    </button>
                </div>
            </div>

            <!-- Course Recommendation -->
            <div class="rec-card" onclick="openModal('course')">
                <div class="card-header">
                    <div class="badge">AI Powered</div>
                    <div class="card-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="card-title">Rekomendasi Kursus</div>
                </div>
                <div class="card-body">
                    <p class="card-description">
                        Temukan kursus terbaik yang sesuai dengan minat, level, dan tujuan pembelajaran Anda
                    </p>
                    <div class="card-features">
                        <div class="feature-item">
                            <i class="fas fa-book-open"></i>
                            <span>Kursus dari berbagai platform</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-medal"></i>
                            <span>Sesuai level keahlian</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-wallet"></i>
                            <span>Filter budget & durasi</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-trophy"></i>
                            <span>High match score guarantee</span>
                        </div>
                    </div>
                    <button class="btn-start">
                        <i class="fas fa-play-circle"></i>
                        Mulai Belajar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Skill -->
    <div class="modal" id="skillModal">
        <div class="modal-content">
            <div class="modal-header">
                <button class="modal-close" onclick="closeModal('skill')">
                    <i class="fas fa-times"></i>
                </button>
                <div class="modal-icon">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <div class="modal-title">Rekomendasi Skill</div>
                <div class="modal-subtitle">AI akan menganalisis profil Anda dan memberikan rekomendasi skill terbaik</div>
            </div>
            <div class="modal-body">
                <form id="skillForm">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-briefcase"></i>
                            Posisi atau bidang karier saat ini
                        </label>
                        <input type="text" class="form-control" placeholder="Contoh: Web Developer, Marketing, Designer" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-chart-line"></i>
                            Level pengalaman Anda
                        </label>
                        <div class="radio-group">
                            <div class="radio-option">
                                <input type="radio" id="skill-beginner" name="skill-level" value="beginner" required>
                                <label for="skill-beginner">
                                    <i class="fas fa-seedling"></i><br>
                                    Pemula
                                </label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" id="skill-intermediate" name="skill-level" value="intermediate">
                                <label for="skill-intermediate">
                                    <i class="fas fa-layer-group"></i><br>
                                    Menengah
                                </label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" id="skill-advanced" name="skill-level" value="advanced">
                                <label for="skill-advanced">
                                    <i class="fas fa-crown"></i><br>
                                    Lanjutan
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-bullseye"></i>
                            Apa tujuan karier Anda?
                        </label>
                        <textarea class="form-control" placeholder="Contoh: Ingin menjadi Full Stack Developer, pindah ke bidang Data Science, atau naik jabatan" required></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-cogs"></i>
                            Skill yang sudah Anda kuasai (opsional)
                        </label>
                        <input type="text" class="form-control" placeholder="Contoh: HTML, CSS, JavaScript, Python">
                    </div>

                    <button type="submit" class="btn-generate">
                        <i class="fas fa-magic"></i>
                        Generate Rekomendasi Skill
                    </button>
                </form>

                <div class="results" id="skillResults"></div>
            </div>
        </div>
    </div>

    <!-- Modal Job -->
    <div class="modal" id="jobModal">
        <div class="modal-content">
            <div class="modal-header">
                <button class="modal-close" onclick="closeModal('job')">
                    <i class="fas fa-times"></i>
                </button>
                <div class="modal-icon">
                    <i class="fas fa-briefcase"></i>
                </div>
                <div class="modal-title">Rekomendasi Job</div>
                <div class="modal-subtitle">Temukan pekerjaan yang paling cocok dengan profil Anda</div>
            </div>
            <div class="modal-body">
                <form id="jobForm">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-user-tie"></i>
                            Posisi yang Anda cari
                        </label>
                        <input type="text" class="form-control" placeholder="Contoh: Frontend Developer, Digital Marketing Manager" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-cogs"></i>
                            Skill yang Anda miliki
                        </label>
                        <textarea class="form-control" placeholder="Contoh: React, Node.js, Git, SEO, Content Writing" required></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-map-marker-alt"></i>
                            Lokasi atau tipe pekerjaan
                        </label>
                        <div class="radio-group">
                            <div class="radio-option">
                                <input type="radio" id="job-onsite" name="job-type" value="onsite" required>
                                <label for="job-onsite">
                                    <i class="fas fa-building"></i><br>
                                    On-site
                                </label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" id="job-remote" name="job-type" value="remote">
                                <label for="job-remote">
                                    <i class="fas fa-home"></i><br>
                                    Remote
                                </label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" id="job-hybrid" name="job-type" value="hybrid">
                                <label for="job-hybrid">
                                    <i class="fas fa-laptop-house"></i><br>
                                    Hybrid
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-money-bill-wave"></i>
                            Ekspektasi gaji (per bulan, opsional)
                        </label>
                        <input type="number" class="form-control" placeholder="Contoh: 8000000" min="0" step="500000">
                    </div>

                    <button type="submit" class="btn-generate">
                        <i class="fas fa-search"></i>
                        Generate Rekomendasi Job
                    </button>
                </form>

                <div class="results" id="jobResults"></div>
            </div>
        </div>
    </div>

    <!-- Modal Course -->
    <div class="modal" id="courseModal">
        <div class="modal-content">
            <div class="modal-header">
                <button class="modal-close" onclick="closeModal('course')">
                    <i class="fas fa-times"></i>
                </button>
                <div class="modal-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="modal-title">Rekomendasi Kursus</div>
                <div class="modal-subtitle">Dapatkan kursus yang paling sesuai dengan kebutuhan Anda</div>
            </div>
            <div class="modal-body">
                <form id="courseForm">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-heart"></i>
                            Apa minat atau bidang yang ingin Anda pelajari?
                        </label>
                        <input type="text" class="form-control" placeholder="Contoh: Web Development, Digital Marketing, Data Science" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-chart-line"></i>
                            Level pengalaman Anda
                        </label>
                        <div class="radio-group">
                            <div class="radio-option">
                                <input type="radio" id="course-beginner" name="course-level" value="beginner" required>
                                <label for="course-beginner">
                                    <i class="fas fa-seedling"></i><br>
                                    Pemula
                                </label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" id="course-intermediate" name="course-level" value="intermediate">
                                <label for="course-intermediate">
                                    <i class="fas fa-layer-group"></i><br>
                                    Menengah
                                </label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" id="course-advanced" name="course-level" value="advanced">
                                <label for="course-advanced">
                                    <i class="fas fa-crown"></i><br>