<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Kursus - SkillConnect.id</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 2rem 0;
        }

        .navbar {
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
            margin-bottom: 2rem;
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

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .payment-wrapper {
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 2rem;
            align-items: start;
        }

        .payment-card, .summary-card {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            margin-bottom: 2rem;
        }

        .card-header h2 {
            font-size: 1.8rem;
            font-weight: 800;
            color: #1a202c;
            margin-bottom: 0.5rem;
        }

        .card-header p {
            color: #718096;
            font-size: 0.95rem;
        }

        .course-info {
            background: #f7fafc;
            padding: 1.5rem;
            border-radius: 12px;
            margin-bottom: 2rem;
        }

        .course-info h3 {
            font-size: 1.2rem;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 0.5rem;
        }

        .course-info .price {
            font-size: 1.8rem;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .section-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .payment-methods {
            display: grid;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .method-group {
            margin-bottom: 1.5rem;
        }

        .method-group-title {
            font-size: 0.9rem;
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .method-options {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        .payment-method {
            position: relative;
        }

        .payment-method input[type="radio"] {
            position: absolute;
            opacity: 0;
        }

        .payment-method label {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.2rem;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .payment-method input[type="radio"]:checked + label {
            border-color: #667eea;
            background: #f0f4ff;
        }

        .payment-icon {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
            border-radius: 8px;
            font-size: 1.5rem;
        }

        .payment-details h4 {
            font-size: 0.95rem;
            font-weight: 600;
            color: #1a202c;
            margin-bottom: 0.2rem;
        }

        .payment-details p {
            font-size: 0.8rem;
            color: #718096;
        }

        .upload-section {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 2px solid #e2e8f0;
        }

        .file-upload {
            position: relative;
            margin-top: 1rem;
        }

        .file-upload input[type="file"] {
            display: none;
        }

        .file-upload-label {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            border: 2px dashed #cbd5e0;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s;
            background: #f7fafc;
        }

        .file-upload-label:hover {
            border-color: #667eea;
            background: #f0f4ff;
        }

        .file-upload-label i {
            font-size: 2.5rem;
            color: #cbd5e0;
            margin-bottom: 1rem;
        }

        .file-upload-label.has-file i {
            color: #48bb78;
        }

        .file-name {
            margin-top: 0.5rem;
            font-size: 0.9rem;
            color: #4a5568;
            font-weight: 500;
        }

        .btn-submit {
            width: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1.2rem;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 2rem;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        }

        .btn-submit:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            padding: 1rem 0;
            border-bottom: 1px solid #e2e8f0;
        }

        .summary-item:last-child {
            border-bottom: none;
            padding-top: 1.5rem;
            margin-top: 1rem;
            border-top: 2px solid #e2e8f0;
        }

        .summary-label {
            color: #718096;
            font-weight: 500;
        }

        .summary-value {
            font-weight: 700;
            color: #1a202c;
        }

        .summary-total .summary-value {
            font-size: 1.8rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .account-info {
            background: #fef5e7;
            border: 2px solid #f9e79f;
            border-radius: 12px;
            padding: 1.5rem;
            margin-top: 1.5rem;
            display: none;
        }

        .account-info.show {
            display: block;
        }

        .account-info h4 {
            color: #d68910;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .account-details {
            background: white;
            padding: 1rem;
            border-radius: 8px;
        }

        .account-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 0;
        }

        .account-number {
            font-family: 'Courier New', monospace;
            font-size: 1.1rem;
            font-weight: 700;
            color: #1a202c;
        }

        .btn-copy {
            background: #667eea;
            color: white;
            border: none;
            padding: 0.4rem 0.8rem;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.8rem;
            transition: all 0.3s;
        }

        .btn-copy:hover {
            background: #5568d3;
        }

        @media (max-width: 768px) {
            .payment-wrapper {
                grid-template-columns: 1fr;
            }

            .method-options {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="nav-container">
            <a href="{{ route('home') }}" class="logo">SkillConnect.id</a>
        </div>
    </nav>

    <div class="container">
        <div class="payment-wrapper">
            
            <!-- Form Pembayaran -->
            <div class="payment-card">
                <div class="card-header">
                    <h2><i class="fas fa-credit-card"></i> Pembayaran Kursus</h2>
                    <p>Pilih metode pembayaran dan upload bukti transfer</p>
                </div>

                <div class="course-info">
                    <h3>{{ $course->title }}</h3>
                    <p class="price">Rp {{ number_format($course->price, 0, ',', '.') }}</p>
                </div>

                <form action="{{ route('payment.process', $course->id) }}" method="POST" enctype="multipart/form-data" id="paymentForm">
                    @csrf

                    <!-- Transfer Bank -->
                    <div class="method-group">
                        <div class="method-group-title">
                            <i class="fas fa-university"></i> Transfer Bank
                        </div>
                        <div class="method-options">
                            <div class="payment-method">
                                <input type="radio" name="payment_method" value="bca" id="bca" required>
                                <label for="bca">
                                    <div class="payment-icon" style="color: #003d99;">
                                        <i class="fas fa-university"></i>
                                    </div>
                                    <div class="payment-details">
                                        <h4>BCA</h4>
                                        <p>Bank Central Asia</p>
                                    </div>
                                </label>
                            </div>

                            <div class="payment-method">
                                <input type="radio" name="payment_method" value="mandiri" id="mandiri">
                                <label for="mandiri">
                                    <div class="payment-icon" style="color: #003d79;">
                                        <i class="fas fa-university"></i>
                                    </div>
                                    <div class="payment-details">
                                        <h4>Mandiri</h4>
                                        <p>Bank Mandiri</p>
                                    </div>
                                </label>
                            </div>

                            <div class="payment-method">
                                <input type="radio" name="payment_method" value="bni" id="bni">
                                <label for="bni">
                                    <div class="payment-icon" style="color: #ed8b00;">
                                        <i class="fas fa-university"></i>
                                    </div>
                                    <div class="payment-details">
                                        <h4>BNI</h4>
                                        <p>Bank Negara Indonesia</p>
                                    </div>
                                </label>
                            </div>

                            <div class="payment-method">
                                <input type="radio" name="payment_method" value="bri" id="bri">
                                <label for="bri">
                                    <div class="payment-icon" style="color: #00529c;">
                                        <i class="fas fa-university"></i>
                                    </div>
                                    <div class="payment-details">
                                        <h4>BRI</h4>
                                        <p>Bank Rakyat Indonesia</p>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- E-Wallet -->
                    <div class="method-group">
                        <div class="method-group-title">
                            <i class="fas fa-wallet"></i> E-Wallet
                        </div>
                        <div class="method-options">
                            <div class="payment-method">
                                <input type="radio" name="payment_method" value="gopay" id="gopay">
                                <label for="gopay">
                                    <div class="payment-icon" style="color: #00aa13;">
                                        <i class="fas fa-wallet"></i>
                                    </div>
                                    <div class="payment-details">
                                        <h4>GoPay</h4>
                                        <p>Gojek Payment</p>
                                    </div>
                                </label>
                            </div>

                            <div class="payment-method">
                                <input type="radio" name="payment_method" value="ovo" id="ovo">
                                <label for="ovo">
                                    <div class="payment-icon" style="color: #4c3494;">
                                        <i class="fas fa-wallet"></i>
                                    </div>
                                    <div class="payment-details">
                                        <h4>OVO</h4>
                                        <p>OVO Payment</p>
                                    </div>
                                </label>
                            </div>

                            <div class="payment-method">
                                <input type="radio" name="payment_method" value="dana" id="dana">
                                <label for="dana">
                                    <div class="payment-icon" style="color: #118eea;">
                                        <i class="fas fa-wallet"></i>
                                    </div>
                                    <div class="payment-details">
                                        <h4>DANA</h4>
                                        <p>DANA Payment</p>
                                    </div>
                                </label>
                            </div>

                            <div class="payment-method">
                                <input type="radio" name="payment_method" value="shopeepay" id="shopeepay">
                                <label for="shopeepay">
                                    <div class="payment-icon" style="color: #ee4d2d;">
                                        <i class="fas fa-wallet"></i>
                                    </div>
                                    <div class="payment-details">
                                        <h4>ShopeePay</h4>
                                        <p>Shopee Payment</p>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Info Rekening -->
                    <div class="account-info" id="accountInfo">
                        <h4><i class="fas fa-info-circle"></i> Informasi Transfer</h4>
                        <div class="account-details">
                            <div class="account-item">
                                <div>
                                    <small>Nomor Rekening / E-Wallet</small>
                                    <div class="account-number" id="accountNumber">-</div>
                                </div>
                                <button type="button" class="btn-copy" onclick="copyAccount()">
                                    <i class="fas fa-copy"></i> Salin
                                </button>
                            </div>
                            <div class="account-item">
                                <div>
                                    <small>Atas Nama</small>
                                    <div class="account-number">SkillConnect Indonesia</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Upload Bukti -->
                    <div class="upload-section">
                        <div class="section-title">
                            <i class="fas fa-upload"></i>
                            Upload Bukti Pembayaran
                        </div>

                        <div class="file-upload">
                            <input type="file" name="payment_proof" id="paymentProof" accept="image/*" required onchange="handleFileSelect(event)">
                            <label for="paymentProof" class="file-upload-label" id="uploadLabel">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <span>Klik untuk upload bukti transfer</span>
                                <small style="color: #718096; margin-top: 0.5rem;">Format: JPG, PNG (Max 2MB)</small>
                                <div class="file-name" id="fileName"></div>
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn-submit" id="submitBtn" disabled>
                        <i class="fas fa-paper-plane"></i> Kirim Pembayaran
                    </button>
                </form>
            </div>

            <!-- Ringkasan -->
            <div class="summary-card">
                <div class="card-header">
                    <h2>Ringkasan Pembayaran</h2>
                </div>

                <div class="summary-item">
                    <span class="summary-label">Harga Kursus</span>
                    <span class="summary-value">Rp {{ number_format($course->price, 0, ',', '.') }}</span>
                </div>

                <div class="summary-item">
                    <span class="summary-label">Biaya Admin</span>
                    <span class="summary-value">Rp 0</span>
                </div>

                <div class="summary-item summary-total">
                    <span class="summary-label">Total Pembayaran</span>
                    <span class="summary-value">Rp {{ number_format($course->price, 0, ',', '.') }}</span>
                </div>
            </div>

        </div>
    </div>

    <script>
        // Data rekening untuk setiap metode pembayaran
        const accountNumbers = {
            bca: '1234567890',
            mandiri: '0987654321',
            bni: '1122334455',
            bri: '5544332211',
            gopay: '081234567890',
            ovo: '081234567890',
            dana: '081234567890',
            shopeepay: '081234567890'
        };

        // Handle pemilihan metode pembayaran
        document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
            radio.addEventListener('change', function() {
                const method = this.value;
                const accountInfo = document.getElementById('accountInfo');
                const accountNumber = document.getElementById('accountNumber');
                
                accountInfo.classList.add('show');
                accountNumber.textContent = accountNumbers[method];
                
                checkFormValidity();
            });
        });

        // Handle file upload
        function handleFileSelect(event) {
            const file = event.target.files[0];
            const label = document.getElementById('uploadLabel');
            const fileName = document.getElementById('fileName');
            
            if (file) {
                if (file.size > 2 * 1024 * 1024) {
                    alert('Ukuran file terlalu besar. Maksimal 2MB');
                    event.target.value = '';
                    return;
                }
                
                label.classList.add('has-file');
                fileName.textContent = file.name;
                
                checkFormValidity();
            }
        }

        // Copy nomor rekening
        function copyAccount() {
            const accountNumber = document.getElementById('accountNumber').textContent;
            navigator.clipboard.writeText(accountNumber).then(() => {
                alert('Nomor rekening berhasil disalin!');
            });
        }

        // Validasi form
        function checkFormValidity() {
            const paymentMethod = document.querySelector('input[name="payment_method"]:checked');
            const paymentProof = document.getElementById('paymentProof').files[0];
            const submitBtn = document.getElementById('submitBtn');
            
            if (paymentMethod && paymentProof) {
                submitBtn.disabled = false;
            } else {
                submitBtn.disabled = true;
            }
        }
    </script>

</body>
</html>