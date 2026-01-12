@extends('layout.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            
            {{-- Header --}}
            <div class="text-center mb-5">
                <h1 class="fw-bold text-primary">AI Career Assistant</h1>
                <p class="text-muted">Asisten cerdas untuk rekomendasi kursus dan analisis karir Anda</p>
            </div>

            {{-- Navigation Tabs --}}
            <ul class="nav nav-pills nav-fill mb-4 p-1 bg-white rounded shadow-sm" id="aiTabs" role="tablist" style="border: 1px solid #e9ecef;">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active fw-bold rounded-pill py-3" id="course-tab" data-bs-toggle="tab" data-bs-target="#course-content" type="button" role="tab">
                        <i class="fas fa-book-open me-2"></i> Rekomendasi Kursus
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-bold rounded-pill py-3" id="skill-tab" data-bs-toggle="tab" data-bs-target="#skill-content" type="button" role="tab">
                        <i class="fas fa-chart-line me-2"></i> Analisis Skill Gap
                    </button>
                </li>
            </ul>

            {{-- Tab Content --}}
            <div class="tab-content" id="aiTabsContent">
                
                {{-- TAB 1: REKOMENDASI KURSUS --}}
                <div class="tab-pane fade show active" id="course-content" role="tabpanel">
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-4 text-primary"><i class="fas fa-search me-2"></i>Cari Kursus Ideal</h5>
                            <form id="courseForm">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Minat Belajar</label>
                                        <input type="text" class="form-control" id="interest" placeholder="Contoh: Web Development" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Level Saat Ini</label>
                                        <select class="form-select" id="level" required>
                                            <option value="beginner">Pemula (Beginner)</option>
                                            <option value="intermediate">Menengah (Intermediate)</option>
                                            <option value="advanced">Mahir (Advanced)</option>
                                        </select>
                                    </div>
                                    <div class="col-12 text-end">
                                        <button type="submit" class="btn btn-primary px-4" id="btnCourseSubmit">
                                            <i class="fas fa-robot me-2"></i> Analisis
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    {{-- Hasil Kursus --}}
                    <div id="courseLoading" class="text-center d-none py-5">
                        <div class="spinner-border text-primary" role="status"></div>
                        <p class="mt-2 text-muted">Menganalisis database kursus...</p>
                    </div>
                    <div id="courseResult" class="d-none">
                        <div class="alert alert-primary border-0 shadow-sm d-flex align-items-center mb-4">
                            <i class="fas fa-info-circle fs-4 me-3"></i>
                            <span id="courseSummary" class="fw-bold"></span>
                        </div>
                        <div class="row" id="courseList"></div>
                    </div>
                </div>

                {{-- TAB 2: ANALISIS SKILL GAP (BARU) --}}
                <div class="tab-pane fade" id="skill-content" role="tabpanel">
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-4 text-primary"><i class="fas fa-user-graduate me-2"></i>Cek Kesenjangan Skill (Gap Analysis)</h5>
                            <form id="skillForm">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Posisi Saat Ini</label>
                                        <input type="text" class="form-control" id="position" placeholder="Contoh: Mahasiswa, Admin" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Tujuan Karir (Goal)</label>
                                        <input type="text" class="form-control" id="goal" placeholder="Contoh: Fullstack Developer" required>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label fw-bold">Skill yang Sudah Dimiliki</label>
                                        <input type="text" class="form-control" id="currentSkills" placeholder="Contoh: HTML, Microsoft Word (Pisahkan dengan koma)">
                                        <div class="form-text">Biarkan kosong jika belum punya skill spesifik.</div>
                                    </div>
                                    <div class="col-12 text-end">
                                        <button type="submit" class="btn btn-primary px-4" id="btnSkillSubmit">
                                            <i class="fas fa-microchip me-2"></i> Analisis Gap
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    {{-- Hasil Skill --}}
                    <div id="skillLoading" class="text-center d-none py-5">
                        <div class="spinner-border text-info" role="status"></div>
                        <p class="mt-2 text-muted">Menganalisis jalur karir...</p>
                    </div>
                    
                    <div id="skillResult" class="d-none">
                        <div class="alert alert-info border-0 shadow-sm mb-4">
                            <i class="fas fa-lightbulb me-2"></i> <span id="skillSummary" class="fw-bold"></span>
                        </div>

                        {{-- Bagian Skill Gaps --}}
                        <div class="row mb-4">
                            <div class="col-12">
                                <h6 class="fw-bold text-danger mb-3">Skill yang PERLU Anda Pelajari (Missing Skills):</h6>
                                <div id="skillGapTags" class="d-flex flex-wrap gap-2"></div>
                            </div>
                        </div>

                        {{-- Rekomendasi Roadmap --}}
                        <div class="card border-0 bg-light">
                            <div class="card-body">
                                <h6 class="fw-bold mb-3">Rekomendasi Langkah Pembelajaran:</h6>
                                <div class="list-group" id="skillRecommendationList"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

{{-- JAVASCRIPT --}}
<script>
    const csrfToken = document.querySelector('input[name="_token"]') ? document.querySelector('input[name="_token"]').value : '';

    // ==========================================
    // 1. LOGIKA REKOMENDASI KURSUS
    // ==========================================
    document.getElementById('courseForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // UI Handling
        document.getElementById('courseLoading').classList.remove('d-none');
        document.getElementById('courseResult').classList.add('d-none');
        document.getElementById('btnCourseSubmit').disabled = true;

        fetch('/ai/recommend-course', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            body: JSON.stringify({
                interest: document.getElementById('interest').value,
                level: document.getElementById('level').value
            })
        })
        .then(res => res.json())
        .then(data => {
            document.getElementById('courseLoading').classList.add('d-none');
            document.getElementById('btnCourseSubmit').disabled = false;

            if(data.success) {
                document.getElementById('courseResult').classList.remove('d-none');
                document.getElementById('courseSummary').innerText = data.summary;
                
                const list = document.getElementById('courseList');
                list.innerHTML = '';

                data.recommendations.forEach(course => {
                    let matchColor = course.ahp_score >= 4 ? 'bg-success' : (course.ahp_score >= 3 ? 'bg-primary' : 'bg-warning text-dark');
                    
                    const html = `
                    <div class="col-md-12 mb-3">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="d-flex align-items-center mb-2">
                                            <span class="badge ${matchColor} me-2">Match: ${course.match_percentage}%</span>
                                            <small class="text-muted"><i class="fas fa-layer-group me-1"></i> ${course.level}</small>
                                        </div>
                                        <h5 class="card-title fw-bold mb-1">
                                            <a href="${course.url}" class="text-decoration-none text-dark stretched-link">${course.title}</a>
                                        </h5>
                                        <p class="text-success small mb-2"><i class="fas fa-robot me-1"></i> ${course.analysis}</p>
                                        <div class="d-flex flex-wrap gap-2 mt-2">
                                            <span class="badge bg-light text-dark border">Harga: ${course.harga_rating}</span>
                                            <span class="badge bg-light text-dark border">Rating: ${course.rating_rating}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-end">
                                        <h4 class="fw-bold text-primary">${course.price_format}</h4>
                                        <a href="${course.url}" class="btn btn-outline-primary btn-sm rounded-pill mt-2">Lihat Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`;
                    list.insertAdjacentHTML('beforeend', html);
                });
            }
        })
        .catch(err => {
            console.error(err);
            document.getElementById('courseLoading').classList.add('d-none');
            document.getElementById('btnCourseSubmit').disabled = false;
        });
    });

    // ==========================================
    // 2. LOGIKA ANALISIS SKILL GAP
    // ==========================================
    document.getElementById('skillForm').addEventListener('submit', function(e) {
        e.preventDefault();

        // UI Handling
        document.getElementById('skillLoading').classList.remove('d-none');
        document.getElementById('skillResult').classList.add('d-none');
        document.getElementById('btnSkillSubmit').disabled = true;

        fetch('/ai/recommend-skill', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            body: JSON.stringify({
                position: document.getElementById('position').value,
                goal: document.getElementById('goal').value,
                currentSkills: document.getElementById('currentSkills').value
            })
        })
        .then(res => res.json())
        .then(data => {
            document.getElementById('skillLoading').classList.add('d-none');
            document.getElementById('btnSkillSubmit').disabled = false;

            if(data.success) {
                document.getElementById('skillResult').classList.remove('d-none');
                document.getElementById('skillSummary').innerText = data.summary;

                // Render Gap Tags
                const gapContainer = document.getElementById('skillGapTags');
                gapContainer.innerHTML = '';
                if(data.skillGaps.length > 0) {
                    data.skillGaps.forEach(skill => {
                        gapContainer.insertAdjacentHTML('beforeend', `<span class="badge bg-danger p-2">${skill}</span>`);
                    });
                } else {
                    gapContainer.innerHTML = '<span class="badge bg-success p-2">Tidak ada gap! Anda siap naik level.</span>';
                }

                // Render Recommendations List
                const recList = document.getElementById('skillRecommendationList');
                recList.innerHTML = '';
                
                data.recommendations.forEach((rec, index) => {
                    const html = `
                    <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <div>
                            <div class="d-flex align-items-center mb-1">
                                <span class="badge bg-secondary me-2">Prioritas: ${rec.priority}</span>
                                <h6 class="mb-0 fw-bold">${rec.skill}</h6>
                            </div>
                            <p class="mb-1 small text-muted">${rec.reason}</p>
                            <small class="text-primary"><i class="fas fa-link me-1"></i> ${rec.learningPath}</small>
                        </div>
                        <a href="${rec.course_url}" class="btn btn-sm btn-light border"><i class="fas fa-chevron-right"></i></a>
                    </div>`;
                    recList.insertAdjacentHTML('beforeend', html);
                });
            }
        })
        .catch(err => {
            console.error(err);
            document.getElementById('skillLoading').classList.add('d-none');
            document.getElementById('btnSkillSubmit').disabled = false;
        });
    });
</script>
@endsection