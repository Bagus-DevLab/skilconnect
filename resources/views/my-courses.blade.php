<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kursus Saya - SkillConnect.id</title>
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
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }

        .back-home {
            position: fixed;
            top: 2rem;
            right: 2rem;
            background: white;
            color: #667eea;
            padding: 0.8rem 1.5rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
            transition: all 0.3s;
            z-index: 999;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .back-home:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .page-header {
            background: rgba(255, 255, 255, 0.95);
            color: #2d3748;
            padding: 3rem 2rem;
            border-radius: 20px;
            margin-bottom: 2rem;
            text-align: center;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        }

        .page-header h1 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 2rem;
        }

        .course-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
        }

        .course-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .course-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 2rem;
            color: white;
            text-align: center;
        }

        .course-icon {
            font-size: 3rem;
            margin-bottom: 0.5rem;
        }

        .course-category {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-top: 0.5rem;
        }

        .course-body {
            padding: 1.5rem;
        }

        .course-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 0.8rem;
            min-height: 60px;
        }

        .course-description {
            color: #718096;
            font-size: 0.9rem;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .course-meta {
            display: flex;
            justify-content: space-between;
            padding-top: 1rem;
            border-top: 1px solid #e2e8f0;
            font-size: 0.85rem;
            color: #718096;
            margin-bottom: 1rem;
        }

        .course-price {
            font-size: 1.8rem;
            font-weight: 800;
            color: #667eea;
            margin-bottom: 1rem;
        }

        .btn-continue, .btn-browse {
            width: 100%;
            padding: 0.9rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .btn-continue:hover, .btn-browse:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        }

        .empty-state i {
            font-size: 5rem;
            color: #e2e8f0;
            margin-bottom: 1.5rem;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: 1000;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            overflow-y: auto;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: white;
            border-radius: 20px;
            max-width: 600px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            animation: modalSlideIn 0.3s ease-out;
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
            padding: 2rem;
            color: white;
            position: relative;
        }

        .modal-close {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }

        .modal-close:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: rotate(90deg);
        }

        .modal-body {
            padding: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 0.5rem;
        }

        .form-input, .form-select, .form-textarea {
            width: 100%;
            padding: 0.9rem;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            transition: all 0.3s;
        }

        .form-input:focus, .form-select:focus, .form-textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-textarea {
            resize: vertical;
            min-height: 100px;
        }

        .payment-methods {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        .payment-method {
            border: 2px solid #e2e8f0;
            padding: 1rem;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
        }

        .payment-method:hover {
            border-color: #667eea;
            background: #f7fafc;
        }

        .payment-method.selected {
            border-color: #667eea;
            background: rgba(102, 126, 234, 0.05);
        }

        .payment-method i {
            font-size: 2rem;
            color: #667eea;
        }

        .btn-submit {
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
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        .btn-submit:disabled {
            background: #cbd5e0;
            cursor: not-allowed;
        }

        .alert {
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1rem;
        }

        .alert-success {
            background: #f0fdf4;
            border: 2px solid #86efac;
            color: #166534;
        }

        .alert-error {
            background: #fef2f2;
            border: 2px solid #fca5a5;
            color: #991b1b;
        }

        @media (max-width: 768px) {
            .courses-grid {
                grid-template-columns: 1fr;
            }
            .payment-methods {
                grid-template-columns: 1fr;
            }
            .back-home {
                top: 1rem;
                right: 1rem;
                font-size: 0.9rem;
                padding: 0.6rem 1rem;
            }
        }
    </style>
</head>
<body>
    <a href="/" class="back-home">
        <i class="fas fa-home"></i> Kembali ke Beranda
    </a>

    <div class="container">
        <div class="page-header">
            <h1><i class="fas fa-graduation-cap"></i> Kursus Saya</h1>
            <p>Lanjutkan perjalanan belajar Anda</p>
        </div>

        <div class="empty-state">
            <i class="fas fa-book-reader"></i>
            <h3>Belum Ada Kursus</h3>
            <p>Anda belum mendaftar kursus apapun. Mulai belajar sekarang!</p>
            <button onclick="showAvailableCourses()" class="btn-browse">
                <i class="fas fa-search"></i> Jelajahi Kursus
            </button>
        </div>

        <div id="availableCourses" style="display: none; margin-top: 3rem;">
            <div class="page-header">
                <h2 style="font-size: 2rem; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                    <i class="fas fa-book"></i> Kursus Tersedia
                </h2>
            </div>

            <div class="courses-grid">
                @forelse($availableCourses as $course)
                    <div class="course-card">
                        <div class="course-header">
                            <div class="course-icon">
                                <i class="fas {{ $course->icon_class ?? 'fa-book' }}"></i>
                            </div>
                            <div class="course-category">{{ $course->category }}</div>
                        </div>
                        <div class="course-body">
                            <h3 class="course-title">{{ $course->title }}</h3>
                            <p class="course-description">{{ $course->description ?? 'Tingkatkan skill Anda dengan kursus ini.' }}</p>
                            <div class="course-meta">
                                <span><i class="fas fa-clock"></i> {{ $course->duration }}</span>
                                <span><i class="fas fa-users"></i> {{ $course->participants ?? 0 }} peserta</span>
                            </div>
                            <div class="course-price">Rp {{ number_format($course->price, 0, ',', '.') }}</div>
                            <button class="btn-continue" 
                                    onclick='openModal(
                                        "{{ $course->title }}", 
                                        "Rp {{ number_format($course->price, 0, ',', '.') }}", 
                                        "{{ $course->icon_class ?? 'fa-book' }}", 
                                        "{{ $course->duration }}"
                                    )'>
                                <i class="fas fa-rocket"></i> Daftar Sekarang
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="empty-state" style="grid-column: 1 / -1;">
                        <i class="fas fa-inbox"></i>
                        <h3>Belum Ada Kursus Tersedia</h3>
                        <p>Kursus akan segera ditambahkan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal" id="registrationModal">
        <div class="modal-content">
            <div class="modal-header">
                <button class="modal-close" onclick="closeModal()">
                    <i class="fas fa-times"></i>
                </button>
                <div style="text-align: center;">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">
                        <i class="fas" id="modalIcon"></i>
                    </div>
                    <h2 id="modalCourseTitle" style="font-size: 1.8rem; font-weight: 700; margin-bottom: 0.5rem;"></h2>
                    <p id="modalCoursePrice" style="font-size: 1.5rem; font-weight: 600;"></p>
                </div>
            </div>
            <div class="modal-body">
                <div id="alertMessage"></div>

                <form id="registrationForm">
                    <div class="form-group">
                        <label class="form-label"><i class="fas fa-user"></i> Nama Lengkap *</label>
                        <input type="text" class="form-input" id="fullName" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label"><i class="fas fa-envelope"></i> Email *</label>
                        <input type="email" class="form-input" id="email" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label"><i class="fas fa-phone"></i> Nomor WhatsApp *</label>
                        <input type="tel" class="form-input" id="phone" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label"><i class="fas fa-briefcase"></i> Pekerjaan</label>
                        <select class="form-select" id="occupation">
                            <option value="">Pilih pekerjaan</option>
                            <option value="mahasiswa">Mahasiswa</option>
                            <option value="karyawan">Karyawan</option>
                            <option value="freelancer">Freelancer</option>
                            <option value="wiraswasta">Wiraswasta</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label"><i class="fas fa-bullseye"></i> Tujuan</label>
                        <textarea class="form-textarea" id="goals"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label"><i class="fas fa-credit-card"></i> Metode Pembayaran *</label>
                        <div class="payment-methods">
                            <div class="payment-method" onclick="selectPayment('transfer')">
                                <i class="fas fa-university"></i>
                                <div>Transfer Bank</div>
                            </div>
                            <div class="payment-method" onclick="selectPayment('ewallet')">
                                <i class="fas fa-wallet"></i>
                                <div>E-Wallet</div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn-submit" id="submitBtn">
                        <i class="fas fa-check"></i> Konfirmasi Pendaftaran
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        let selectedCourse = {};

        function showAvailableCourses() {
            document.getElementById('availableCourses').style.display = 'block';
            document.getElementById('availableCourses').scrollIntoView({ behavior: 'smooth' });
        }

        function openModal(courseName, price, icon, duration) {
            selectedCourse = { courseName, price, icon, duration };
            document.getElementById('modalCourseTitle').textContent = courseName;
            document.getElementById('modalCoursePrice').textContent = price;
            document.getElementById('modalIcon').className = 'fas ' + icon;
            document.getElementById('registrationModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            document.getElementById('registrationModal').classList.remove('active');
            document.body.style.overflow = 'auto';
            document.getElementById('registrationForm').reset();
            document.getElementById('alertMessage').innerHTML = '';
            document.querySelectorAll('.payment-method').forEach(pm => pm.classList.remove('selected'));
        }

        function selectPayment(method) {
            document.querySelectorAll('.payment-method').forEach(pm => pm.classList.remove('selected'));
            event.currentTarget.classList.add('selected');
            event.currentTarget.dataset.selected = method;
        }

        document.getElementById('registrationForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const selectedPayment = document.querySelector('.payment-method.selected');
            if (!selectedPayment) {
                showAlert('Silakan pilih metode pembayaran', 'error');
                return;
            }

            const submitBtn = document.getElementById('submitBtn');
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';

            const formData = {
                course_name: selectedCourse.courseName,
                course_price: selectedCourse.price,
                course_duration: selectedCourse.duration,
                full_name: document.getElementById('fullName').value,
                email: document.getElementById('email').value,
                phone: document.getElementById('phone').value,
                occupation: document.getElementById('occupation').value,
                goals: document.getElementById('goals').value,
                payment_method: selectedPayment.dataset.selected
            };

            try {
                const response = await fetch('/api/enrollments', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify(formData)
                });

                const data = await response.json();

                if (response.ok) {
                    showAlert(data.message, 'success');
                    setTimeout(() => {
                        closeModal();
                        location.reload();
                    }, 2000);
                } else {
                    showAlert(data.message || 'Terjadi kesalahan', 'error');
                }
            } catch (error) {
                showAlert('Terjadi kesalahan koneksi', 'error');
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fas fa-check"></i> Konfirmasi Pendaftaran';
            }
        });

        function showAlert(message, type) {
            const alertDiv = document.getElementById('alertMessage');
            alertDiv.innerHTML = `<div class="alert alert-${type}">${message}</div>`;
        }

        window.onclick = function(event) {
            if (event.target === document.getElementById('registrationModal')) {
                closeModal();
            }
        }
    </script>
</body>
</html>