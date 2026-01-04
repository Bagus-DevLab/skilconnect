<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat Saya - SkillConnect.id</title>
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
            text-align: center;
            margin-bottom: 3rem;
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

        .certificates-stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            text-align: center;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.8rem;
            color: white;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 800;
            color: #1a202c;
            margin-bottom: 0.3rem;
        }

        .stat-label {
            color: #718096;
            font-size: 0.9rem;
        }

        .certificates-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(500px, 1fr));
            gap: 2rem;
        }

        .certificate-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s;
            position: relative;
        }

        .certificate-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .certificate-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 2.5rem 2rem;
            position: relative;
            overflow: hidden;
        }

        .certificate-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .certificate-icon {
            font-size: 3.5rem;
            color: white;
            text-align: center;
            position: relative;
            z-index: 1;
            opacity: 0.9;
        }

        .grade-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            width: 60px;
            height: 60px;
            background: #48bb78;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 800;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            z-index: 2;
        }

        .certificate-body {
            padding: 2rem;
        }

        .certificate-category {
            display: inline-block;
            background: #edf2f7;
            color: #667eea;
            padding: 0.3rem 0.8rem;
            border-radius: 5px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .certificate-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 1rem;
        }

        .certificate-info {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #718096;
            font-size: 0.9rem;
        }

        .info-item i {
            color: #667eea;
        }

        .certificate-number {
            background: #f7fafc;
            padding: 1rem;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 1.5rem;
            border: 2px dashed #e2e8f0;
        }

        .certificate-number-label {
            font-size: 0.8rem;
            color: #718096;
            margin-bottom: 0.3rem;
        }

        .certificate-number-value {
            font-size: 1.1rem;
            font-weight: 700;
            color: #1a202c;
            font-family: 'Courier New', monospace;
        }

        .certificate-actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .btn {
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .btn-view {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-view:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-download {
            background: #48bb78;
            color: white;
        }

        .btn-download:hover {
            background: #38a169;
        }

        .btn-share {
            background: #4299e1;
            color: white;
        }

        .btn-share:hover {
            background: #3182ce;
        }

        .btn-verify {
            background: #ed8936;
            color: white;
        }

        .btn-verify:hover {
            background: #dd6b20;
        }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            background: white;
            border-radius: 15px;
        }

        .empty-state i {
            font-size: 5rem;
            color: #cbd5e0;
            margin-bottom: 1.5rem;
        }

        .empty-state h3 {
            font-size: 1.8rem;
            color: #4a5568;
            margin-bottom: 0.8rem;
        }

        .empty-state p {
            color: #718096;
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }

        .btn-browse {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1rem 2.5rem;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s;
        }

        .btn-browse:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        @media (max-width: 768px) {
            .certificates-stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .certificates-grid {
                grid-template-columns: 1fr;
            }

            .certificate-actions {
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
            <h1>🏆 Sertifikat Saya</h1>
            <p>Koleksi sertifikat dan pencapaian pembelajaran Anda</p>
        </div>

        @if(count($certificates) > 0)
        <div class="certificates-stats">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-certificate"></i>
                </div>
                <div class="stat-number">{{ count($certificates) }}</div>
                <div class="stat-label">Total Sertifikat</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-star"></i>
                </div>
                <div class="stat-number">{{ number_format(array_sum(array_column($certificates, 'score')) / count($certificates), 1) }}</div>
                <div class="stat-label">Rata-rata Nilai</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-award"></i>
                </div>
                <div class="stat-number">{{ count(array_filter($certificates, fn($c) => $c['grade'] === 'A')) }}</div>
                <div class="stat-label">Grade A</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-number">{{ date('Y') }}</div>
                <div class="stat-label">Tahun Ini</div>
            </div>
        </div>

        <div class="certificates-grid">
            @foreach($certificates as $cert)
            <div class="certificate-card">
                <div class="certificate-header">
                    <div class="grade-badge">{{ $cert['grade'] }}</div>
                    <div class="certificate-icon">
                        <i class="fas {{ $cert['icon'] }}"></i>
                    </div>
                </div>
                <div class="certificate-body">
                    <span class="certificate-category">{{ $cert['category'] }}</span>
                    <h3 class="certificate-title">{{ $cert['course_title'] }}</h3>
                    
                    <div class="certificate-info">
                        <div class="info-item">
                            <i class="fas fa-calendar"></i>
                            <span>{{ date('d M Y', strtotime($cert['issued_date'])) }}</span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <span>{{ $cert['instructor'] }}</span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-star"></i>
                            <span>Nilai: {{ $cert['score'] }}/100</span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-medal"></i>
                            <span>Grade: {{ $cert['grade'] }}</span>
                        </div>
                    </div>

                    <div class="certificate-number">
                        <div class="certificate-number-label">Nomor Sertifikat</div>
                        <div class="certificate-number-value">{{ $cert['certificate_number'] }}</div>
                    </div>

                    <div class="certificate-actions">
                        <button class="btn btn-view">
                            <i class="fas fa-eye"></i>
                            Lihat
                        </button>
                        <button class="btn btn-download">
                            <i class="fas fa-download"></i>
                            Download
                        </button>
                        <button class="btn btn-share">
                            <i class="fas fa-share-alt"></i>
                            Bagikan
                        </button>
                        <button class="btn btn-verify">
                            <i class="fas fa-check-circle"></i>
                            Verifikasi
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="empty-state">
            <i class="fas fa-certificate"></i>
            <h3>Belum Ada Sertifikat</h3>
            <p>Selesaikan kursus Anda untuk mendapatkan sertifikat resmi</p>
            <a href="{{ route('home') }}#courses" class="btn-browse">
                <i class="fas fa-book"></i>
                Jelajahi Kursus
            </a>
        </div>
        @endif
    </div>
</body>
</html>