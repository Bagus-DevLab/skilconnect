<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pembayaran - SkillConnect.id</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .status-card {
            background: white;
            border-radius: 25px;
            max-width: 600px;
            width: 100%;
            padding: 3rem;
            text-align: center;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
        }

        .status-icon {
            width: 120px;
            height: 120px;
            margin: 0 auto 2rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            animation: scaleIn 0.5s ease-out;
        }

        @keyframes scaleIn {
            from {
                transform: scale(0);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        .status-pending .status-icon {
            background: linear-gradient(135deg, #f6ad55 0%, #ed8936 100%);
            color: white;
        }

        .status-confirmed .status-icon {
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            color: white;
        }

        .status-rejected .status-icon {
            background: linear-gradient(135deg, #f56565 0%, #e53e3e 100%);
            color: white;
        }

        h1 {
            font-size: 2rem;
            font-weight: 800;
            color: #1a202c;
            margin-bottom: 1rem;
        }

        .status-description {
            color: #718096;
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        .payment-details {
            background: #f7fafc;
            border-radius: 15px;
            padding: 2rem;
            margin: 2rem 0;
            text-align: left;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            padding: 1rem 0;
            border-bottom: 1px solid #e2e8f0;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-label {
            color: #718096;
            font-weight: 500;
        }

        .detail-value {
            color: #1a202c;
            font-weight: 700;
            text-align: right;
        }

        .payment-proof {
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 2px solid #e2e8f0;
        }

        .payment-proof h4 {
            color: #4a5568;
            margin-bottom: 1rem;
            font-size: 0.95rem;
        }

        .payment-proof img {
            max-width: 100%;
            border-radius: 12px;
            border: 2px solid #e2e8f0;
            cursor: pointer;
            transition: all 0.3s;
        }

        .payment-proof img:hover {
            transform: scale(1.02);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .rejection-reason {
            background: #fff5f5;
            border: 2px solid #fc8181;
            border-radius: 12px;
            padding: 1.5rem;
            margin-top: 1.5rem;
            text-align: left;
        }

        .rejection-reason h4 {
            color: #e53e3e;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .rejection-reason p {
            color: #742a2a;
            line-height: 1.6;
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn {
            flex: 1;
            padding: 1rem 2rem;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        }

        .btn-secondary {
            background: #edf2f7;
            color: #4a5568;
        }

        .btn-secondary:hover {
            background: #e2e8f0;
        }

        .image-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
            z-index: 9999;
            align-items: center;
            justify-content: center;
        }

        .image-modal.show {
            display: flex;
        }

        .image-modal img {
            max-width: 90%;
            max-height: 90%;
            border-radius: 10px;
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

        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }

            .status-card {
                padding: 2rem;
            }

            h1 {
                font-size: 1.5rem;
            }

            .status-icon {
                width: 100px;
                height: 100px;
                font-size: 3rem;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <div class="status-card status-{{ $enrollment->payment_status }}">
        
        <!-- Icon Status -->
        <div class="status-icon">
            @if($enrollment->payment_status === 'pending')
                <i class="fas fa-clock"></i>
            @elseif($enrollment->payment_status === 'confirmed')
                <i class="fas fa-check-circle"></i>
            @else
                <i class="fas fa-times-circle"></i>
            @endif
        </div>

        <!-- Judul Status -->
        <h1>
            @if($enrollment->payment_status === 'pending')
                Menunggu Konfirmasi
            @elseif($enrollment->payment_status === 'confirmed')
                Pembayaran Berhasil!
            @else
                Pembayaran Ditolak
            @endif
        </h1>

        <!-- Deskripsi -->
        <p class="status-description">
            @if($enrollment->payment_status === 'pending')
                Pembayaran Anda sedang dalam proses verifikasi. Mohon menunggu konfirmasi dari admin kami (maksimal 1x24 jam).
            @elseif($enrollment->payment_status === 'confirmed')
                Selamat! Pembayaran Anda telah dikonfirmasi. Anda sekarang bisa mengakses kursus dan mulai belajar.
            @else
                Maaf, pembayaran Anda ditolak. Silakan cek alasan penolakan dan lakukan pembayaran ulang.
            @endif
        </p>

        <!-- Detail Pembayaran -->
        <div class="payment-details">
            <div class="detail-row">
                <span class="detail-label">Kursus</span>
                <span class="detail-value">{{ $enrollment->course_title }}</span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Harga</span>
                <span class="detail-value">Rp {{ number_format($enrollment->price, 0, ',', '.') }}</span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Metode Pembayaran</span>
                <span class="detail-value">{{ strtoupper($enrollment->payment_method) }}</span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Tanggal Pembayaran</span>
                <span class="detail-value">{{ \Carbon\Carbon::parse($enrollment->created_at)->format('d M Y, H:i') }}</span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Status Pembayaran</span>
                <span class="detail-value" style="color: 
                    @if($enrollment->payment_status === 'pending') #ed8936
                    @elseif($enrollment->payment_status === 'confirmed') #38a169
                    @else #e53e3e
                    @endif;">
                    @if($enrollment->payment_status === 'pending') 
                        <i class="fas fa-clock"></i> Menunggu Konfirmasi
                    @elseif($enrollment->payment_status === 'confirmed') 
                        <i class="fas fa-check-circle"></i> Dikonfirmasi
                    @else 
                        <i class="fas fa-times-circle"></i> Ditolak
                    @endif
                </span>
            </div>

            @if($enrollment->payment_status === 'confirmed' && $enrollment->confirmed_at)
            <div class="detail-row">
                <span class="detail-label">Tanggal Konfirmasi</span>
                <span class="detail-value">{{ \Carbon\Carbon::parse($enrollment->confirmed_at)->format('d M Y, H:i') }}</span>
            </div>
            @endif

            <!-- Bukti Pembayaran -->
            @if($enrollment->payment_proof)
            <div class="payment-proof">
                <h4><i class="fas fa-image"></i> Bukti Pembayaran yang Dikirim:</h4>
                <img src="{{ asset('payment_proofs/' . $enrollment->payment_proof) }}" 
                     alt="Bukti Pembayaran" 
                     onclick="showImage(this.src)">
                <p style="font-size: 0.85rem; color: #718096; margin-top: 0.5rem; text-align: center;">
                    <i class="fas fa-info-circle"></i> Klik gambar untuk memperbesar
                </p>
            </div>
            @endif
        </div>

        <!-- Alasan Penolakan (jika ditolak) -->
        @if($enrollment->payment_status === 'rejected' && isset($enrollment->rejection_reason))
        <div class="rejection-reason">
            <h4>
                <i class="fas fa-exclamation-triangle"></i> 
                Alasan Penolakan
            </h4>
            <p>{{ $enrollment->rejection_reason }}</p>
        </div>
        @endif

        <!-- Tombol Aksi -->
        <div class="action-buttons">
            @if($enrollment->payment_status === 'confirmed')
                <a href="{{ route('my-courses') }}" class="btn btn-primary">
                    <i class="fas fa-book-open"></i>
                    Mulai Belajar
                </a>
            @elseif($enrollment->payment_status === 'rejected')
                <a href="{{ route('payment.show', $enrollment->course_id) }}" class="btn btn-primary">
                    <i class="fas fa-redo"></i>
                    Bayar Ulang
                </a>
            @endif
            
            <a href="{{ route('home') }}" class="btn btn-secondary">
                <i class="fas fa-home"></i>
                Kembali ke Beranda
            </a>
        </div>

    </div>

    <!-- Modal untuk memperbesar gambar -->
    <div class="image-modal" id="imageModal" onclick="closeImageModal()">
        <span class="close-modal">&times;</span>
        <img src="" alt="Bukti Pembayaran" id="modalImage">
    </div>

    <script>
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
                closeImageModal();
            }
        });
    </script>

</body>
</html>