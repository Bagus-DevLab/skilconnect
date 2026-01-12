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
        /* --- CSS SAMA SEPERTI SEBELUMNYA, DENGAN PENAMBAHAN KHUSUS DI BAWAH --- */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; color: #1a1a1a; }
        
        /* Navbar & Basic Layout */
        .navbar { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); padding: 1.2rem 2rem; position: sticky; top: 0; z-index: 100; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .nav-container { max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center; }
        .logo { font-size: 1.5rem; font-weight: 800; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .nav-links { display: flex; gap: 2rem; }
        .nav-links a { text-decoration: none; color: #4a5568; font-weight: 500; transition: 0.3s; }
        .nav-links a:hover, .nav-links a.active { color: #667eea; font-weight: 600; }

        .container { max-width: 1400px; margin: 0 auto; padding: 3rem 2rem; }
        
        /* Hero */
        .hero { text-align: center; color: white; margin-bottom: 4rem; }
        .hero h1 { font-size: 3.5rem; font-weight: 800; margin-bottom: 1rem; display: flex; align-items: center; justify-content: center; gap: 1rem; }
        .ai-icon { width: 70px; height: 70px; background: rgba(255,255,255,0.2); border-radius: 20px; display: inline-flex; align-items: center; justify-content: center; font-size: 2.5rem; animation: float 3s infinite ease-in-out; }
        @keyframes float { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-10px); } }

        /* Cards Selection */
        .rec-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 2.5rem; }
        .rec-card { background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 40px rgba(0,0,0,0.15); transition: 0.4s; cursor: pointer; }
        .rec-card:hover { transform: translateY(-15px); box-shadow: 0 20px 60px rgba(0,0,0,0.25); }
        .card-header { padding: 3rem 2rem; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); text-align: center; color: white; position: relative; }
        .card-icon { font-size: 4rem; margin-bottom: 1rem; }
        .card-title { font-size: 1.8rem; font-weight: 700; }
        .badge { position: absolute; top: 1.5rem; right: 1.5rem; background: rgba(255,255,255,0.9); color: #667eea; padding: 0.5rem 1rem; border-radius: 20px; font-weight: 700; font-size: 0.8rem; }
        .card-body { padding: 2rem; }
        .card-features { display: flex; flex-direction: column; gap: 1rem; margin: 1.5rem 0; color: #4a5568; }
        .feature-item i { color: #667eea; width: 25px; }

        /* Buttons */
        .btn-start, .btn-generate { width: 100%; padding: 1rem; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; border-radius: 12px; font-weight: 700; cursor: pointer; transition: 0.3s; display: flex; align-items: center; justify-content: center; gap: 0.5rem; font-size: 1.1rem; }
        .btn-start:hover, .btn-generate:hover { transform: translateY(-3px); box-shadow: 0 8px 20px rgba(102,126,234,0.4); }
        .btn-generate:disabled { opacity: 0.7; cursor: not-allowed; }

        /* Modal */
        .modal { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.7); z-index: 1000; align-items: center; justify-content: center; padding: 2rem; backdrop-filter: blur(5px); }
        .modal.active { display: flex; }
        .modal-content { background: white; border-radius: 25px; width: 100%; max-width: 800px; max-height: 90vh; overflow-y: auto; animation: slideIn 0.4s ease; }
        @keyframes slideIn { from { opacity: 0; transform: translateY(-50px); } to { opacity: 1; transform: translateY(0); } }
        .modal-header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 2rem; color: white; text-align: center; position: relative; }
        .modal-close { position: absolute; top: 1.5rem; right: 1.5rem; background: rgba(255,255,255,0.2); border: none; color: white; width: 40px; height: 40px; border-radius: 50%; cursor: pointer; font-size: 1.2rem; transition: 0.3s; }
        .modal-close:hover { background: rgba(255,255,255,0.4); transform: rotate(90deg); }
        .modal-body { padding: 2.5rem; }

        /* Form Elements */
        .form-group { margin-bottom: 1.5rem; }
        .form-label { display: block; font-weight: 600; margin-bottom: 0.5rem; color: #2d3748; }
        .form-control { width: 100%; padding: 1rem; border: 2px solid #e2e8f0; border-radius: 12px; font-size: 1rem; transition: 0.3s; }
        .form-control:focus { border-color: #667eea; outline: none; }
        .radio-group { display: grid; grid-template-columns: repeat(auto-fit, minmax(120px, 1fr)); gap: 1rem; }
        .radio-option input { display: none; }
        .radio-option label { display: block; padding: 1rem; border: 2px solid #e2e8f0; border-radius: 12px; text-align: center; cursor: pointer; transition: 0.3s; font-weight: 500; }
        .radio-option input:checked + label { background: #667eea; color: white; border-color: #667eea; transform: scale(1.05); }

        /* Results Area */
        .results { display: none; margin-top: 2rem; animation: fadeIn 0.5s ease; }
        .results.show { display: block; }
        .result-section { margin-bottom: 2rem; }
        .section-title { font-size: 1.3rem; font-weight: 700; color: #2d3748; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem; }
        .section-title i { color: #667eea; }
        
        .result-card { background: #f8fafc; padding: 1.5rem; border-radius: 12px; border-left: 5px solid #667eea; margin-bottom: 1rem; }
        .result-text { color: #4a5568; line-height: 1.6; }

        /* Specific for Course Item */
        .course-item { background: white; border: 1px solid #e2e8f0; border-radius: 15px; padding: 1.5rem; margin-bottom: 1.5rem; position: relative; transition: 0.3s; }
        .course-item:hover { box-shadow: 0 5px 15px rgba(0,0,0,0.05); border-color: #cbd5e0; }
        .course-top { display: flex; justify-content: space-between; align-items: start; gap: 1rem; }
        .course-title { font-size: 1.2rem; font-weight: 700; color: #2d3748; }
        .match-score { background: #667eea; color: white; padding: 0.3rem 0.8rem; border-radius: 20px; font-size: 0.85rem; font-weight: 700; white-space: nowrap; }
        
        .ahp-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(140px, 1fr)); gap: 0.8rem; margin: 1.2rem 0; background: #f7fafc; padding: 1rem; border-radius: 10px; }
        .ahp-item { text-align: center; }
        .ahp-label { font-size: 0.75rem; color: #718096; margin-bottom: 0.2rem; }
        .ahp-value { font-weight: 700; color: #2d3748; font-size: 0.95rem; }
        .ahp-sub { font-size: 0.7rem; color: #a0aec0; }

        /* Specific for Skill Item */
        .skill-gap-list { display: flex; flex-wrap: wrap; gap: 0.5rem; margin-bottom: 1.5rem; }
        .skill-gap-tag { background: #fed7d7; color: #c53030; padding: 0.4rem 1rem; border-radius: 20px; font-weight: 600; font-size: 0.9rem; border: 1px solid #feb2b2; }
        
        .skill-card { background: white; border: 1px solid #e2e8f0; border-radius: 12px; padding: 1.2rem; margin-bottom: 1rem; }
        .skill-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem; }
        .skill-name { font-weight: 700; font-size: 1.1rem; color: #2d3748; }
        .priority-badge { font-size: 0.75rem; padding: 0.2rem 0.6rem; border-radius: 10px; font-weight: 700; text-transform: uppercase; }
        .p-High { background: #feebc8; color: #dd6b20; }
        .p-Medium { background: #c6f6d5; color: #38a169; }
        .p-Low { background: #bee3f8; color: #3182ce; }

        .spinner { border: 3px solid rgba(255,255,255,0.3); border-top: 3px solid white; border-radius: 50%; width: 20px; height: 20px; animation: spin 1s linear infinite; }
        @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }

        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 { font-size: 2rem; flex-direction: column; }
            .modal-content { margin: 1rem; max-height: 85vh; }
            .ahp-grid { grid-template-columns: 1fr 1fr; }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo">SkillConnect.id</div>
            <div class="nav-links">
                <a href="{{ url('/') }}"><i class="fas fa-home"></i> Beranda</a>
                <a href="{{ route('ai.view') }}" class="active"><i class="fas fa-brain"></i> AI Rekomendasi</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="hero">
            <h1>
                <span class="ai-icon"><i class="fas fa-robot"></i></span>
                AI Recommendation Hub
            </h1>
            <p>Personalisasi pengembangan diri Anda dengan analisis cerdas dari Database & AI</p>
        </div>

        <div class="rec-grid">
            <div class="rec-card" onclick="openModal('skill')">
                <div class="card-header">
                    <div class="badge">AI Analysis</div>
                    <div class="card-icon"><i class="fas fa-lightbulb"></i></div>
                    <div class="card-title">Skill Gap Analysis</div>
                </div>
                <div class="card-body">
                    <div class="card-features">
                        <div class="feature-item"><i class="fas fa-check-circle"></i> Analisis posisi saat ini vs goal</div>
                        <div class="feature-item"><i class="fas fa-check-circle"></i> Identifikasi gap kompetensi</div>
                        <div class="feature-item"><i class="fas fa-check-circle"></i> Rekomendasi learning path</div>
                    </div>
                    <button class="btn-start"><i class="fas fa-search"></i> Analisis Skill Saya</button>
                </div>
            </div>

            <div class="rec-card" onclick="openModal('course')">
                <div class="card-header">
                    <div class="badge">DB + AI Ranking</div>
                    <div class="card-icon"><i class="fas fa-graduation-cap"></i></div>
                    <div class="card-title">Course Recommender</div>
                </div>
                <div class="card-body">
                    <div class="card-features">
                        <div class="feature-item"><i class="fas fa-check-circle"></i> Cari kursus dari database kami</div>
                        <div class="feature-item"><i class="fas fa-check-circle"></i> Ranking AHP otomatis (Harga, Rating, dll)</div>
                        <div class="feature-item"><i class="fas fa-check-circle"></i> Disesuaikan budget & waktu Anda</div>
                    </div>
                    <button class="btn-start"><i class="fas fa-search"></i> Cari Kursus Cocok</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="skillModal">
        <div class="modal-content">
            <div class="modal-header">
                <button class="modal-close" onclick="closeModal('skill')"><i class="fas fa-times"></i></button>
                <h2><i class="fas fa-lightbulb"></i> Analisis Skill Gap</h2>
                <p>AI akan membandingkan profil Anda dengan standar industri</p>
            </div>
            <div class="modal-body">
                <form id="skillForm">
                    <div class="form-group">
                        <label class="form-label">Posisi Saat Ini</label>
                        <input type="text" id="skillPosition" class="form-control" placeholder="Cth: Junior Web Developer" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Level Keahlian</label>
                        <div class="radio-group">
                            <div class="radio-option">
                                <input type="radio" id="sl-beg" name="skill-level" value="Pemula" checked>
                                <label for="sl-beg">Pemula</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" id="sl-int" name="skill-level" value="Menengah">
                                <label for="sl-int">Menengah</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" id="sl-adv" name="skill-level" value="Lanjutan">
                                <label for="sl-adv">Lanjutan</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tujuan Karir (Goal)</label>
                        <input type="text" id="skillGoal" class="form-control" placeholder="Cth: Menjadi Fullstack Developer, Tech Lead" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Skill yang Sudah Dikuasai</label>
                        <textarea id="skillCurrent" class="form-control" placeholder="Cth: HTML, CSS, PHP Dasar..."></textarea>
                    </div>
                    <button type="submit" class="btn-generate" id="skillBtn">
                        <i class="fas fa-magic"></i> Generate Analisis
                    </button>
                </form>
                <div id="skillResults" class="results"></div>
            </div>
        </div>
    </div>

    <div class="modal" id="courseModal">
        <div class="modal-content">
            <div class="modal-header">
                <button class="modal-close" onclick="closeModal('course')"><i class="fas fa-times"></i></button>
                <h2><i class="fas fa-graduation-cap"></i> Rekomendasi Kursus</h2>
                <p>Mencari dan menilai kursus terbaik untuk Anda</p>
            </div>
            <div class="modal-body">
                <form id="courseForm">
                    <div class="form-group">
                        <label class="form-label">Topik Peminatan</label>
                        <input type="text" id="courseInterest" class="form-control" placeholder="Cth: Laravel, Data Science, Digital Marketing" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Level yang Dicari</label>
                        <div class="radio-group">
                            <div class="radio-option">
                                <input type="radio" id="cl-beg" name="course-level" value="beginner" checked>
                                <label for="cl-beg">Beginner</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" id="cl-int" name="course-level" value="intermediate">
                                <label for="cl-int">Intermediate</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" id="cl-adv" name="course-level" value="advanced">
                                <label for="cl-adv">Advanced</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tujuan Belajar</label>
                        <input type="text" id="coursePurpose" class="form-control" placeholder="Cth: Membuat skripsi, proyek kantor, sertifikasi" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Waktu Tersedia (Per Minggu)</label>
                        <div class="radio-group">
                            <div class="radio-option">
                                <input type="radio" id="tm-low" name="time" value="< 5 Jam" checked>
                                <label for="tm-low">&lt; 5 Jam</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" id="tm-med" name="time" value="5-10 Jam">
                                <label for="tm-med">5-10 Jam</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" id="tm-high" name="time" value="> 10 Jam">
                                <label for="tm-high">&gt; 10 Jam</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn-generate" id="courseBtn">
                        <i class="fas fa-magic"></i> Cari & Analisis Kursus
                    </button>
                </form>
                <div id="courseResults" class="results"></div>
            </div>
        </div>
    </div>

    <script>
        // --- Modal Control ---
        function openModal(type) {
            document.getElementById(type + 'Modal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(type) {
            document.getElementById(type + 'Modal').classList.remove('active');
            document.body.style.overflow = 'auto';
            // Reset results but not form for UX
            const results = document.getElementById(type + 'Results');
            if(results) { results.innerHTML = ''; results.classList.remove('show'); }
        }

        // Close on outside click
        window.onclick = function(e) {
            if (e.target.classList.contains('modal')) {
                closeModal(e.target.id.replace('Modal', ''));
            }
        }

        // --- Helper: Call Laravel API ---
        async function callAiEndpoint(url, data) {
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify(data)
            });

            if (!response.ok) {
                const err = await response.json();
                throw new Error(err.message || 'Terjadi kesalahan pada server');
            }
            return await response.json();
        }

        // --- Feature 1: Recommend Skill (Logic sesuai method recommendSkill) ---
        document.getElementById('skillForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            const btn = document.getElementById('skillBtn');
            const container = document.getElementById('skillResults');
            
            // UI Loading State
            btn.disabled = true;
            btn.innerHTML = '<div class="spinner"></div> Menganalisis...';
            container.classList.remove('show');

            const payload = {
                position: document.getElementById('skillPosition').value,
                level: document.querySelector('input[name="skill-level"]:checked').value,
                goal: document.getElementById('skillGoal').value,
                currentSkills: document.getElementById('skillCurrent').value
            };

            try {
                const data = await callAiEndpoint("{{ route('ai.skill') }}", payload);

                // --- PERBAIKAN: Gunakan (data.array || []) ---
                const skillGaps = data.skillGaps || [];
                const recommendations = data.recommendations || [];
                const tips = data.tips || [];

                let html = `
                    <div class="result-section">
                        <div class="section-title"><i class="fas fa-info-circle"></i> Analisis Profil</div>
                        <div class="result-card">
                            <p class="result-text">${data.summary || 'Tidak ada ringkasan tersedia.'}</p>
                        </div>
                    </div>

                    <div class="result-section">
                        <div class="section-title"><i class="fas fa-exclamation-triangle"></i> Skill Gaps (Kekurangan)</div>
                        <div class="skill-gap-list">
                            ${skillGaps.length > 0 
                                ? skillGaps.map(gap => `<span class="skill-gap-tag">${gap}</span>`).join('') 
                                : '<span style="color:#718096">Tidak ada gap skill yang terdeteksi.</span>'}
                        </div>
                    </div>

                    <div class="result-section">
                        <div class="section-title"><i class="fas fa-list-check"></i> Rekomendasi Learning Path</div>
                        ${recommendations.length > 0 ? recommendations.map(rec => `
                            <div class="skill-card">
                                <div class="skill-header">
                                    <div class="skill-name">${rec.skill}</div>
                                    <span class="priority-badge p-${rec.priority}">${rec.priority} Priority</span>
                                </div>
                                <p style="font-size:0.9rem; color:#4a5568; margin-bottom:0.5rem;"><strong>Alasan:</strong> ${rec.reason}</p>
                                <div style="background:#f7fafc; padding:0.8rem; border-radius:8px; font-size:0.85rem; color:#2d3748;">
                                    <i class="fas fa-road" style="color:#667eea"></i> <strong>Cara Belajar:</strong> ${rec.learningPath} <br>
                                    <i class="fas fa-clock" style="color:#667eea; margin-top:0.4rem;"></i> <strong>Estimasi:</strong> ${rec.timeframe}
                                </div>
                            </div>
                        `).join('') : '<p>Tidak ada rekomendasi khusus.</p>'}
                    </div>

                    ${tips.length > 0 ? `
                    <div class="result-section">
                        <div class="section-title"><i class="fas fa-star"></i> Tips Tambahan</div>
                        <ul style="padding-left: 1.5rem; color: #4a5568;">
                            ${tips.map(tip => `<li style="margin-bottom:0.5rem;">${tip}</li>`).join('')}
                        </ul>
                    </div>` : ''}
                `;
                container.innerHTML = html;
                container.classList.add('show');

            } catch (error) {
                // ... (biarkan catch error seperti sebelumnya)
                container.innerHTML = `<div class="result-card" style="border-left-color:red; background:#fff5f5; color:red;">Error: ${error.message}</div>`;
                container.classList.add('show');
            } finally {
                btn.disabled = false;
                btn.innerHTML = '<i class="fas fa-magic"></i> Generate Analisis';
            }
        });

        // --- Feature 2: Recommend Course (Logic sesuai method recommendCourse) ---
        document.getElementById('courseForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            const btn = document.getElementById('courseBtn');
            const container = document.getElementById('courseResults');
            
            btn.disabled = true;
            btn.innerHTML = '<div class="spinner"></div> Mencari & Menilai...';
            container.classList.remove('show');

            const payload = {
                interest: document.getElementById('courseInterest').value,
                level: document.querySelector('input[name="course-level"]:checked').value,
                purpose: document.getElementById('coursePurpose').value,
                time: document.querySelector('input[name="time"]:checked').value
            };

            try {
                const data = await callAiEndpoint("{{ route('ai.course') }}", payload);
                
                // --- PERBAIKAN: Definisi variable aman ---
                const recommendations = data.recommendations || [];
                const tips = data.tips || [];

                if (recommendations.length === 0) {
                     // Tampilkan pesan kosong/fallback
                     container.innerHTML = `
                        <div class="result-card" style="border-left-color: orange; background: #fffaf0;">
                            <h3 style="margin-bottom:0.5rem; color:#d69e2e;">Info</h3>
                            <p class="result-text">${data.summary || 'Tidak ditemukan kursus yang cocok.'}</p>
                            ${tips.length > 0 ? `
                            <div style="margin-top:1rem;">
                                <strong>Saran:</strong>
                                <ul style="padding-left:1.5rem; margin-top:0.5rem; color:#4a5568;">
                                    ${tips.map(t => `<li>${t}</li>`).join('')}
                                </ul>
                            </div>` : ''}
                        </div>
                     `;
                } else {
                    let html = `
                        <div class="result-section">
                            <div class="section-title"><i class="fas fa-chart-bar"></i> Hasil Analisis & Ranking</div>
                            <div class="result-card" style="background:#ebf8ff; border-left-color:#4299e1;">
                                <p class="result-text"><strong>${data.total_courses_analyzed || 0} Kursus Ditemukan.</strong> <br> ${data.summary || ''}</p>
                            </div>
                        </div>
                        
                        <div class="result-section">
                            ${recommendations.map((course, index) => `
                                <div class="course-item" style="${index === 0 ? 'border: 2px solid #667eea; box-shadow: 0 0 15px rgba(102,126,234,0.2);' : ''}">
                                    ${index === 0 ? '<div style="background:#667eea; color:white; display:inline-block; padding:0.2rem 0.8rem; border-radius:0 0 10px 10px; position:absolute; top:0; left:1.5rem; font-size:0.8rem; font-weight:bold;">REKOMENDASI TERBAIK #1</div>' : ''}
                                    
                                    <div class="course-top" style="${index === 0 ? 'margin-top:1rem;' : ''}">
                                        <div>
                                            <div class="course-title">${course.title}</div>
                                            <div style="font-size:0.9rem; color:#718096; margin-top:0.3rem;">
                                                <i class="fas fa-chalkboard-teacher"></i> ${course.platform}
                                            </div>
                                        </div>
                                        <div style="text-align:right;">
                                            <div style="font-size:0.8rem; color:#a0aec0;">Rating AI</div>
                                            <div style="color:#667eea; font-weight:800; font-size:1.1rem;">${course.rating_rating || '-'}</div>
                                        </div>
                                    </div>

                                    <div class="ahp-grid">
                                        <div class="ahp-item">
                                            <div class="ahp-label"><i class="fas fa-tag"></i> Harga</div>
                                            <div class="ahp-value">${course.harga_rating || '-'}</div>
                                        </div>
                                        <div class="ahp-item">
                                            <div class="ahp-label"><i class="fas fa-clock"></i> Durasi</div>
                                            <div class="ahp-value">${course.durasi_rating || '-'}</div>
                                        </div>
                                        <div class="ahp-item">
                                            <div class="ahp-label"><i class="fas fa-users"></i> Peminat</div>
                                            <div class="ahp-value">${course.peminat_rating || '-'}</div>
                                        </div>
                                        <div class="ahp-item">
                                            <div class="ahp-label"><i class="fas fa-layer-group"></i> Kesulitan</div>
                                            <div class="ahp-value">${course.kesulitan_rating || '-'}</div>
                                        </div>
                                    </div>

                                    <p style="font-size:0.9rem; color:#4a5568; margin-bottom:1rem;">
                                        <strong><i class="fas fa-comment-dots" style="color:#667eea"></i> Analisis:</strong> ${course.reason}
                                    </p>

                                    <a href="${course.url}" target="_blank" class="btn-start" style="padding:0.8rem; font-size:0.95rem; text-decoration:none;">
                                        Lihat Detail Kursus <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            `).join('')}
                        </div>
                    `;
                    container.innerHTML = html;
                }
                container.classList.add('show');

            } catch (error) {
                // ... (biarkan catch error seperti sebelumnya)catch (error) {
                container.innerHTML = `<div class="result-card" style="border-left-color:red; background:#fff5f5; color:red;">Error: ${error.message}</div>`;
                container.classList.add('show');
            } finally {
                btn.disabled = false;
                btn.innerHTML = '<i class="fas fa-magic"></i> Cari & Analisis Kursus';
            }
        });
    </script>
</body>
</html>