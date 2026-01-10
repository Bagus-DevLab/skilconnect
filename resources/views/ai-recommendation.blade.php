<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Recommendation Hub - SkillConnect.id</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 3rem 2rem;
        }

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
            pointer-events: auto;
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

        .results {
            display: none;
            margin-top: 2rem;
        }

        .results.show {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .result-section {
            margin-bottom: 2rem;
        }

        .result-section-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .result-section-title i {
            color: #667eea;
        }

        .result-card {
            background: #f7fafc;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            border-left: 4px solid #667eea;
            transition: all 0.3s;
        }

        .result-card:hover {
            background: #edf2f7;
            transform: translateX(5px);
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

        .result-content ul {
            margin-left: 1.5rem;
            margin-top: 0.5rem;
        }

        .result-content li {
            margin-bottom: 0.5rem;
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

        .skill-item {
            background: white;
            padding: 1.2rem;
            border-radius: 10px;
            margin-bottom: 1rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .skill-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.8rem;
        }

        .skill-name {
            font-weight: 700;
            color: #2d3748;
            font-size: 1.1rem;
        }

        .priority-badge {
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .priority-high {
            background: #fef5e7;
            color: #f39c12;
        }

        .priority-medium {
            background: #e8f5e9;
            color: #27ae60;
        }

        .priority-low {
            background: #e3f2fd;
            color: #2196f3;
        }

        .course-item {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            margin-bottom: 1rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .course-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .course-title {
            font-weight: 700;
            color: #2d3748;
            font-size: 1.15rem;
            flex: 1;
        }

        .match-score {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-weight: 700;
            font-size: 0.9rem;
        }

        .course-meta {
            display: flex;
            gap: 1.5rem;
            margin-top: 0.8rem;
            flex-wrap: wrap;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #4a5568;
            font-size: 0.9rem;
        }

        .meta-item i {
            color: #667eea;
        }

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
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo">SkillConnect.id</div>
            <div class="nav-links">
                <a href="/">
                    <i class="fas fa-home"></i> Beranda
                </a>
                <a href="/courses">
                    <i class="fas fa-book"></i> Kursus
                </a>
                <a href="/ai-recommendation" class="active">
                    <i class="fas fa-brain"></i> AI Rekomendasi
                </a>
                <a href="/profile">
                    <i class="fas fa-user"></i> Profile
                </a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="hero">
            <h1>
                <span class="ai-icon">
                    <i class="fas fa-brain"></i>
                </span>
                AI Recommendation Hub
            </h1>
            <p>Dapatkan rekomendasi yang dipersonalisasi untuk skill, job, dan kursus menggunakan teknologi AI yang canggih</p>
        </div>

        <div class="rec-grid">
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
                        <input type="text" id="skillPosition" class="form-control" placeholder="Contoh: Web Developer, Marketing, Designer" required>
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
                        <textarea id="skillGoal" class="form-control" placeholder="Contoh: Ingin menjadi Full Stack Developer, pindah ke bidang Data Science, atau naik jabatan" required></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-cogs"></i>
                            Skill yang sudah Anda kuasai (opsional)
                        </label>
                        <input type="text" id="skillCurrent" class="form-control" placeholder="Contoh: HTML, CSS, JavaScript, Python">
                    </div>

                    <button type="submit" class="btn-generate" id="skillBtn">
                        <i class="fas fa-magic"></i>
                        Generate Rekomendasi Skill
                    </button>
                </form>

                <div class="results" id="skillResults"></div>
            </div>
        </div>
    </div>

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
                        <input type="text" id="courseInterest" class="form-control" placeholder="Contoh: Web Development, Digital Marketing, Data Science" required>
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
                                    Lanjutan
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-bullseye"></i>
                            Apa tujuan pembelajaran Anda?
                        </label>
                        <textarea id="coursePurpose" class="form-control" placeholder="Contoh: Mendapat sertifikasi, switch career, upgrade skill untuk promosi" required></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-clock"></i>
                            Waktu belajar yang tersedia per minggu
                        </label>
                        <div class="radio-group">
                            <div class="radio-option">
                                <input type="radio" id="time-low" name="time" value="<5 jam" required>
                                <label for="time-low">
                                    <i class="fas fa-hourglass-start"></i><br>
                                    < 5 jam
                                </label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" id="time-medium" name="time" value="5-10 jam">
                                <label for="time-medium">
                                    <i class="fas fa-hourglass-half"></i><br>
                                    5-10 jam
                                </label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" id="time-high" name="time" value=">10 jam">
                                <label for="time-high">
                                    <i class="fas fa-hourglass-end"></i><br>
                                    > 10 jam
                                </label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn-generate" id="courseBtn">
                        <i class="fas fa-magic"></i>
                        Generate Rekomendasi Kursus
                    </button>
                </form>

                <div class="results" id="courseResults"></div>
            </div>
        </div>
    </div>

    <script>
    // --- 1. SETUP & HELPER FUNCTIONS ---

    // Fungsi untuk membuka Modal
    window.openModal = function(type) {
        const modal = document.getElementById(type + 'Modal');
        if (modal) {
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    }

    // Fungsi untuk menutup Modal
    window.closeModal = function(type) {
        const modal = document.getElementById(type + 'Modal');
        if (modal) {
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';

            const form = document.getElementById(type + 'Form');
            const results = document.getElementById(type + 'Results');
            if (form) form.reset();
            if (results) {
                results.classList.remove('show');
                results.innerHTML = '';
            }
        }
    }

    // Tutup modal jika klik di luar area konten
    document.addEventListener('click', (e) => {
        if (e.target.classList.contains('modal')) {
            const modalId = e.target.id;
            const type = modalId.replace('Modal', '');
            closeModal(type);
        }
    });

    // Helper untuk menampilkan Error di UI
    function showError(container, message) {
        container.innerHTML = `
            <div class="result-card" style="border-left-color: #e53e3e; background: #fff5f5; padding: 1rem;">
                <p class="result-content" style="color: #e53e3e;">
                    <i class="fas fa-exclamation-circle"></i> 
                    ${message || 'Maaf, terjadi kesalahan pada server. Coba lagi nanti.'}
                </p>
            </div>
        `;
        container.classList.add('show');
    }

    // --- 2. CORE LOGIC: PANGGIL LARAVEL ---

    async function callLaravelAi(url, data) {
        // Ambil CSRF Token
        const csrfToken = document.querySelector('meta[name="csrf-token"]');
        if (!csrfToken) {
            alert("Error: CSRF Token tidak ditemukan. Pastikan <meta name='csrf-token' ...> ada di <head>.");
            return null;
        }

        try {
            const response = await fetch(url, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken.getAttribute('content'),
                    "Accept": "application/json" // Agar Laravel mengembalikan JSON saat error
                },
                body: JSON.stringify(data)
            });

            const result = await response.json();

            if (!response.ok) {
                // Jika server 500 atau 400, lempar error dengan pesan dari server
                throw new Error(result.message || result.error || 'Terjadi kesalahan server');
            }

            return result;
        } catch (error) {
            console.error('Error Detail:', error);
            throw error; // Lempar ke handler di bawah
        }
    }

    // --- 3. EVENT LISTENERS ---

    // Handler Form Skill
    document.getElementById('skillForm').addEventListener('submit', async (e) => {
        e.preventDefault();

        const btn = document.getElementById('skillBtn');
        const resultsDiv = document.getElementById('skillResults');

        // Loading UI
        btn.disabled = true;
        btn.innerHTML = '<div class="spinner"></div> Menganalisis...';
        resultsDiv.classList.remove('show');
        resultsDiv.innerHTML = '';

        const formData = {
            position: document.getElementById('skillPosition').value,
            level: document.querySelector('input[name="skill-level"]:checked').value,
            goal: document.getElementById('skillGoal').value,
            currentSkills: document.getElementById('skillCurrent').value
        };

        try {
            const results = await callLaravelAi('/ai/analyze-skill', formData);
            if (results) {
                displaySkillResults(results);
            }
        } catch (error) {
            showError(resultsDiv, error.message);
        } finally {
            btn.disabled = false;
            btn.innerHTML = '<i class="fas fa-magic"></i> Generate Rekomendasi Skill';
        }
    });

    // Handler Form Course
    document.getElementById('courseForm').addEventListener('submit', async (e) => {
        e.preventDefault();

        const btn = document.getElementById('courseBtn');
        const resultsDiv = document.getElementById('courseResults');

        btn.disabled = true;
        btn.innerHTML = '<div class="spinner"></div> Mencari kursus terbaik...';
        resultsDiv.classList.remove('show');
        resultsDiv.innerHTML = '';

        const formData = {
            interest: document.getElementById('courseInterest').value,
            level: document.querySelector('input[name="course-level"]:checked').value,
            purpose: document.getElementById('coursePurpose').value,
            time: document.querySelector('input[name="time"]:checked').value
        };

        try {
            const results = await callLaravelAi('/ai/analyze-course', formData);
            if (results) {
                displayCourseResults(results);
            }
        } catch (error) {
            showError(resultsDiv, error.message);
        } finally {
            btn.disabled = false;
            btn.innerHTML = '<i class="fas fa-magic"></i> Generate Rekomendasi Kursus';
        }
    });

    // --- 4. DISPLAY FUNCTIONS (TAMPILAN HASIL) ---

    function displaySkillResults(data) {
        const resultsDiv = document.getElementById('skillResults');
        let html = `
            <div class="result-section">
                <div class="result-section-title"><i class="fas fa-chart-pie"></i> Analisis Profil</div>
                <div class="result-card"><p class="result-content">${data.summary}</p></div>
            </div>
            
            <div class="result-section">
                <div class="result-section-title"><i class="fas fa-exclamation-triangle"></i> Skill Gaps</div>
                <div class="result-card"><div class="result-content">
                    ${data.skillGaps.map(gap => `<span class="tag">${gap}</span>`).join('')}
                </div></div>
            </div>

            <div class="result-section">
                <div class="result-section-title"><i class="fas fa-star"></i> Rekomendasi Prioritas</div>
                ${data.recommendations.map(rec => `
                    <div class="skill-item">
                        <div class="skill-header">
                            <div class="skill-name">${rec.skill}</div>
                            <div class="priority-badge priority-${rec.priority}">${rec.priority.toUpperCase()}</div>
                        </div>
                        <div class="result-content">
                            <p><strong>Kenapa:</strong> ${rec.reason}</p>
                            <p><strong>Cara:</strong> ${rec.learningPath}</p>
                            <p><strong>Waktu:</strong> ${rec.timeframe}</p>
                        </div>
                    </div>
                `).join('')}
            </div>
        `;
        resultsDiv.innerHTML = html;
        resultsDiv.classList.add('show');
        resultsDiv.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    function displayCourseResults(data) {
        const resultsDiv = document.getElementById('courseResults');
        let html = `
            <div class="result-section">
                <div class="result-section-title"><i class="fas fa-info-circle"></i> Ringkasan</div>
                <div class="result-card"><p class="result-content">${data.summary}</p></div>
            </div>

            <div class="result-section">
                <div class="result-section-title"><i class="fas fa-graduation-cap"></i> Kursus Direkomendasikan</div>
                ${data.courses.map(course => `
                    <div class="course-item">
                        <div class="course-header">
                            <div class="course-title">${course.title}</div>
                            <div class="match-score">${course.matchScore}% Match</div>
                        </div>
                        <div class="course-meta">
                            <div class="meta-item"><i class="fas fa-building"></i> ${course.platform}</div>
                            <div class="meta-item"><i class="fas fa-signal"></i> ${course.level}</div>
                            <div class="meta-item"><i class="fas fa-clock"></i> ${course.duration}</div>
                            <div class="meta-item"><i class="fas fa-tag"></i> ${course.estimatedPrice}</div>
                        </div>
                        <div class="result-content" style="margin-top: 1rem;">
                            <p><strong>Topik:</strong> ${course.keyTopics.map(t => `<span class="tag">${t}</span>`).join('')}</p>
                            <p style="margin-top:0.5rem;"><strong>Alasan:</strong> ${course.whyRecommended}</p>
                        </div>
                    </div>
                `).join('')}
            </div>
        `;
        resultsDiv.innerHTML = html;
        resultsDiv.classList.add('show');
        resultsDiv.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }
</script>
</body>
</html>