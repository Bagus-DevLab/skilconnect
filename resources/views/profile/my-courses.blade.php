<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kursus Saya - SkillConnect.id</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
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
            margin-bottom: 2rem;
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

        .tabs {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            border-bottom: 2px solid #e2e8f0;
        }

        .tab {
            padding: 1rem 1.5rem;
            background: none;
            border: none;
            font-size: 1rem;
            font-weight: 600;
            color: #718096;
            cursor: pointer;
            position: relative;
            transition: all 0.3s;
        }

        .tab.active {
            color: #667eea;
        }

        .tab.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2rem;
        }

        .course-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s;
        }

        .course-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
        }

        .course-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 2rem;
            position: relative;
        }

        .course-icon {
            font-size: 3rem;
            color: rgba(255, 255, 255, 0.3);
            text-align: center;
        }

        .status-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-active { background: #48bb78; color: white; }
        .status-completed { background: #4299e1; color: white; }

        .course-body {
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

        .course-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 0.5rem;
        }

        .course-instructor {
            color: #718096;
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .progress-section {
            margin-bottom: 1rem;
        }

        .progress-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.5rem;
        }

        .progress-label {
            font-size: 0.9rem;
            color: #4a5568;
            font-weight: 600;
        }

        .progress-percentage {
            font-size: 1.2rem;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .progress-bar {
            width: 100%;
            height: 10px;
            background: #e2e8f0;
            border-radius: 10px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: width 0.3s;
        }

        .course-stats {
            display: flex;
            justify-content: space-between;
            padding-top: 1rem;
            border-top: 1px solid #e2e8f0;
            font-size: 0.9rem;
            color: #718096;
            margin-top: 1rem;
        }

        .stat-item {
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .btn-continue {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            width: 100%;
            margin-top: 1rem;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-view-certificate {
            background: #4299e1;
            color: white;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            width: 100%;
            margin-top: 1rem;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            background: white;
            border-radius: 15px;
        }

        .empty-state i {
            font-size: 4rem;
            color: #cbd5e0;
            margin-bottom: 1rem;
        }

        @media (max-width: 768px) {
            .courses-grid {
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
            <h1>Kursus Saya</h1>
            <p>Kelola dan lanjutkan pembelajaran Anda</p>
        </div>

        <div class="tabs">
            <button class="tab active" onclick="filterCourses('all')">
                <i class="fas fa-list"></i>
                Semua ({{ count($enrolledCourses ?? []) }})
            </button>

            <button class="tab" onclick="filterCourses('active')">
                <i class="fas fa-play-circle"></i>
                Sedang Berjalan ({{ count(array_filter(($enrolledCourses ?? []), fn($c) => $c['status'] === 'active')) }})
            </button>

            <button class="tab" onclick="filterCourses('completed')">
                <i class="fas fa-check-circle"></i>
                Selesai ({{ count(array_filter(($enrolledCourses ?? []), fn($c) => $c['status'] === 'completed')) }})
            </button>
        </div>

        <div class="courses-grid" id="coursesGrid">

            @forelse(($enrolledCourses ?? []) as $course)
            <div class="course-card" data-status="{{ $course['status'] }}">

                <div class="course-header">
                    <span class="status-badge status-{{ $course['status'] }}">
                        {{ $course['status'] === 'active' ? 'Aktif' : 'Selesai' }}
                    </span>
                    <div class="course-icon">
                        <i class="fas {{ $course['icon'] }}"></i>
                    </div>
                </div>

                <div class="course-body">
                    <span class="course-category">{{ $course['category'] }}</span>

                    <h3 class="course-title">{{ $course['title'] }}</h3>

                    <p class="course-instructor">
                        <i class="fas fa-chalkboard-teacher"></i>
                        {{ $course['instructor'] }}
                    </p>

                    <div class="progress-section">
                        <div class="progress-header">
                            <span class="progress-label">Progress Belajar</span>
                            <span class="progress-percentage">{{ $course['progress'] }}%</span>
                        </div>

                        <div class="progress-bar">
                            <div class="progress-fill"
                                style="width: {{ $course['progress'] }}%">
                            </div>
                        </div>
                    </div>

                    <div class="course-stats">
                        <span class="stat-item">
                            <i class="fas fa-book"></i>
                            {{ $course['completed_lessons'] }}/{{ $course['total_lessons'] }} Pelajaran
                        </span>

                        <span class="stat-item">
                            <i class="fas fa-clock"></i>
                            {{ $course['duration'] }} Minggu
                        </span>
                    </div>

                    @if($course['status'] === 'active')
                        <button class="btn-continue">
                            <i class="fas fa-play"></i>
                            Lanjutkan Belajar
                        </button>
                    @else
                        <button class="btn-view-certificate">
                            <i class="fas fa-certificate"></i>
                            Lihat Sertifikat
                        </button>
                    @endif

                </div>
            </div>
            @empty

            <div class="empty-state">
                <i class="fas fa-book-open"></i>
                <h3>Belum ada kursus</h3>
                <p>Anda belum mendaftar kursus apapun</p>
            </div>

            @endforelse

        </div>
    </div>

<script>
function filterCourses(status) {
    const cards = document.querySelectorAll('.course-card');
    const tabs = document.querySelectorAll('.tab');

    tabs.forEach(tab => tab.classList.remove('active'));
    event.target.closest('.tab').classList.add('active');

    cards.forEach(card => {
        if (status === 'all' || card.dataset.status === status) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}
</script>

</body>
</html>
