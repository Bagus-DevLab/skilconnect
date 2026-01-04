<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pembayaran - Admin SkillConnect.id</title>
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
            max-width: 1400px;
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

        .main-container {
            max-width: 1400px;
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

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .stat-content h3 {
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.3rem;
        }

        .stat-content p {
            color: #718096;
            font-size: 0.9rem;
        }

        .payments-table {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .table-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .table-header h2 {
            font-size: 1.5rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .refresh-btn {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .refresh-btn:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #f7fafc;
        }

        th {
            padding: 1rem 1.5rem;
            text-align: left;
            font-weight: 600;
            color: #4a5568;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            white-space: nowrap;
        }

        td {
            padding: 1.5rem;
            border-bottom: 1px solid #e2e8f0;
            vertical-align: middle;
        }

        tbody tr {
            transition: all 0.3s;
        }

        tbody tr:hover {
            background: #f7fafc;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .user-info h4 {
            font-size: 1rem;
            font-weight: 600;
            color: #1a202c;
            margin-bottom: 0.2rem;
        }

        .user-info p {
            font-size: 0.85rem;
            color: #718096;
        }

        .course-info {
            font-weight: 600;
            color: #667eea;
            max-width: 200px;
        }

        .payment-method {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: #edf2f7;
            padding: 0.4rem 0.8rem;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .price {
            font-weight: 700;
            color: #1a202c;
            font-size: 1.1rem;
            white-space: nowrap;
        }

        .date {
            font-size: 0.85rem;
            color: #718096;
            white-space: nowrap;
        }

        .proof-link {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
        }

        .proof-link:hover {
            color: #5568d3;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
            flex-wrap: nowrap;
        }

        .btn {
            padding: 0.6rem 1rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            white-space: nowrap;
        }

        .btn-approve {
            background: #48bb78;
            color: white;
        }

        .btn-approve:hover {
            background: #38a169;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(72, 187, 120, 0.3);
        }

        .btn-reject {
            background: #f56565;
            color: white;
        }

        .btn-reject:hover {
            background: #e53e3e;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(245, 101, 101, 0.3);
        }

        .btn-view {
            background: #4299e1;
            color: white;
        }

        .btn-view:hover {
            background: #3182ce;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: 2000;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        .modal.show {
            display: flex;
        }

        .modal-content {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            max-width: 500px;
            width: 100%;
            animation: slideUp 0.3s ease-out;
        }

        @keyframes slideUp {
            from {
                transform: translateY(50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .modal-header {
            margin-bottom: 1.5rem;
        }

        .modal-header h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1a202c;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 0.5rem;
        }

        .form-group textarea {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-family: 'Inter', sans-serif;
            resize: vertical;
            min-height: 120px;
            font-size: 0.95rem;
        }

        .form-group textarea:focus {
            outline: none;
            border-color: #667eea;
        }

        .modal-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn-cancel {
            flex: 1;
            background: #edf2f7;
            color: #4a5568;
        }

        .btn-cancel:hover {
            background: #e2e8f0;
        }

        .btn-submit {
            flex: 1;
            background: #f56565;
            color: white;
        }

        .btn-submit:hover {
            background: #e53e3e;
        }

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
            font-weight: 700;
            color: #4a5568;
            margin-bottom: 0.5rem;
        }

        .empty-state p {
            color: #718096;
        }

        .image-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.95);
            z-index: 3000;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .image-modal.show {
            display: flex;
        }

        .image-modal img {
            max-width: 90%;
            max-height: 90%;
            border-radius: 10px;
            box-shadow: 0 10px 50px rgba(0, 0, 0, 0.5);
        }

        .close-modal {
            position: absolute;
            top: 2rem;
            right: 2rem;
            color: white;
            font-size: 2.5rem;
            cursor: pointer;
            background: rgba(0, 0, 0, 0.5);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }

        .close-modal:hover {
            background: rgba(0, 0, 0, 0.8);
            transform: rotate(90deg);
        }

        .alert {
            padding: 1rem 1.5rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .alert-success {
            background: #c6f6d5;
            color: #22543d;
            border-left: 4px solid #38a169;
        }

        @media (max-width: 1024px) {
            .action-buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }

        @media (max-width: 768px) {
            .main-container {
                padding: 2rem 1rem;
            }

            .page-header h1 {
                font-size: 2rem;
            }

            th, td {
                padding: 1rem;
                font-size: 0.85rem;
            }

            .course-info {
                max-width: 150px;
            }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="nav-container">
            <a href="{{ route('admin.dashboard') }}" class="logo">Admin - SkillConnect.id</a>
        </div>
    </nav>

    <div class="main-container">

        <!-- Alert Success -->
        @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i>
            <span>{{ session('success') }}</span>
        </div>
        @endif

        <div class="page-header">
            <h1>Kelola Pembayaran</h1>
            <p>Verifikasi dan kelola pembayaran dari peserta kursus</p>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-hourglass-half"></i>
                </div>
                <div class="stat-content">
                    <h3>{{ count($pendingPayments) }}</h3>
                    <p>Pembayaran Menunggu</p>
                </div>
            </div>
        </div>

        <div class="payments-table">
            <div class="table-header">
                <h2>
                    <i class="fas fa-hourglass-half"></i> 
                    Pembayaran Pending
                </h2>
                <button class="refresh-btn" onclick="location.reload()">
                    <i class="fas fa-sync-alt"></i> Refresh
                </button>
            </div>

            @if(count($pendingPayments) > 0)
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Peserta</th>
                            <th>Kursus</th>
                            <th>Metode</th>
                            <th>Jumlah</th>
                            <th>Tanggal</th>
                            <th>Bukti</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendingPayments as $payment)
                        <tr>
                            <td>
                                <div class="user-info">
                                    <h4>{{ $payment->user_name }}</h4>
                                    <p>{{ $payment->user_email }}</p>
                                </div>
                            </td>
                            <td>
                                <span class="course-info">{{ $payment->course_title }}</span>
                            </td>
                            <td>
                                <span class="payment-method">
                                    @if(in_array($payment->payment_method, ['bca', 'mandiri', 'bni', 'bri']))
                                        <i class="fas fa-university"></i>
                                    @else
                                        <i class="fas fa-wallet"></i>
                                    @endif
                                    {{ strtoupper($payment->payment_method) }}
                                </span>
                            </td>
                            <td>
                                <span class="price">Rp {{ number_format($payment->price, 0, ',', '.') }}</span>
                            </td>
                            <td>
                                <span class="date">{{ \Carbon\Carbon::parse($payment->created_at)->format('d M Y') }}</span>
                                <br>
                                <span class="date">{{ \Carbon\Carbon::parse($payment->created_at)->format('H:i') }} WIB</span>
                            </td>
                            <td>
                                <a href="#" class="proof-link" onclick="showImage('{{ asset('payment_proofs/' . $payment->payment_proof) }}'); return false;">
                                    <i class="fas fa-image"></i> Lihat Bukti
                                </a>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <form action="{{ route('admin.payment.confirm', $payment->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-approve" onclick="return confirm('Konfirmasi pembayaran ini? User akan langsung bisa mengakses kursus.')">
                                            <i class="fas fa-check"></i>
                                            Setujui
                                        </button>
                                    </form>
                                    
                                    <button type="button" class="btn btn-reject" onclick="showRejectModal({{ $payment->id }})">
                                        <i class="fas fa-times"></i>
                                        Tolak
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="empty-state">
                <i class="fas fa-check-circle"></i>
                <h3>Tidak ada pembayaran pending</h3>
                <p>Semua pembayaran telah diproses</p>
            </div>
            @endif
        </div>

    </div>

    <!-- Modal Tolak Pembayaran -->
    <div class="modal" id="rejectModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>
                    <i class="fas fa-times-circle" style="color: #f56565;"></i> 
                    Tolak Pembayaran
                </h3>
            </div>
            <form id="rejectForm" method="POST">
                @csrf
                <div class="form-group">
                    <label for="rejection_reason">
                        Alasan Penolakan <span style="color: #f56565;">*</span>
                    </label>
                    <textarea 
                        name="rejection_reason" 
                        id="rejection_reason" 
                        required 
                        placeholder="Contoh: Bukti transfer tidak jelas, nominal tidak sesuai dengan harga kursus, transfer ke rekening yang salah, dll."></textarea>
                </div>
                <div class="modal-buttons">
                    <button type="button" class="btn btn-cancel" onclick="closeRejectModal()">
                        <i class="fas fa-times"></i>
                        Batal
                    </button>
                    <button type="submit" class="btn btn-submit">
                        <i class="fas fa-paper-plane"></i>
                        Tolak Pembayaran
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Lihat Gambar -->
    <div class="image-modal" id="imageModal" onclick="closeImageModal()">
        <span class="close-modal">&times;</span>
        <img src="" alt="Bukti Pembayaran" id="modalImage">
    </div>

    <script>
        function showRejectModal(enrollmentId) {
            const modal = document.getElementById('rejectModal');
            const form = document.getElementById('rejectForm');
            form.action = `/admin/payment/reject/${enrollmentId}`;
            modal.classList.add('show');
        }

        function closeRejectModal() {
            const modal = document.getElementById('rejectModal');
            const textarea = document.getElementById('rejection_reason');
            modal.classList.remove('show');
            textarea.value = '';
        }

        function showImage(imageSrc) {
            const modal = document.getElementById('imageModal');
            const img = document.getElementById('modalImage');
            img.src = imageSrc;
            modal.classList.add('show');
        }

        function closeImageModal() {
            const modal = document.getElementById('imageModal');
            modal.classList.remove('show');
        }

        // Close modal dengan tombol ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeRejectModal();
                closeImageModal();
            }
        });

        // Prevent modal close when clicking inside modal content
        document.querySelector('.modal-content').addEventListener('click', function(e) {
            e.stopPropagation();
        });

        // Auto hide success alert after 5 seconds
        const alert = document.querySelector('.alert-success');
        if (alert) {
            setTimeout(() => {
                alert.style.transition = 'opacity 0.5s';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            }, 5000);
        }
    </script>

</body>
</html>