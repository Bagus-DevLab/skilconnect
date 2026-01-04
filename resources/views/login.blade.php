<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SkillConnect.id</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            color: #333;
        }
        .container {
            padding: 1.5rem;
        }
        .card {
            border-radius: 1.5rem;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
            padding: 3rem;
            max-width: 420px;
            width: 100%;
            border: none;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }
        .card h3 {
            font-size: 2rem;
            font-weight: 800;
            color: #4a5568;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
        }
        .card h3 i {
            color: #667eea;
            font-size: 1.8rem;
        }
        .form-label {
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 0.75rem;
        }
        .form-control {
            border-radius: 0.75rem;
            padding: 0.85rem 1.2rem;
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.25rem rgba(102, 126, 234, 0.25);
            background-color: #f8faff;
        }
        .form-control.is-invalid {
            border-color: #ef4444;
        }
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 0.75rem;
            padding: 0.85rem 1.5rem;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.4);
            filter: brightness(1.05);
        }
        .text-center.mt-3 {
            margin-top: 2rem !important;
            font-size: 0.95rem;
            color: #718096;
        }
        .text-center.mt-3 a {
            color: #667eea;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .text-center.mt-3 a:hover {
            color: #764ba2;
            text-decoration: underline;
        }
        .alert {
            border-radius: 0.75rem;
            margin-bottom: 1.5rem;
        }
        .invalid-feedback {
            font-size: 0.85rem;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center">
        <div class="card shadow p-4">
            <h3 class="text-center mb-3">
                <i class="fas fa-sign-in-alt"></i> Masuk
            </h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Alamat Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" id="email" name="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               placeholder="Masukkan email Anda" 
                               value="{{ old('email') }}" 
                               required autofocus>
                    </div>
                    @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" id="password" name="password" 
                               class="form-control @error('password') is-invalid @enderror" 
                               placeholder="Masukkan kata sandi" 
                               required>
                    </div>
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            Ingat Saya
                        </label>
                    </div>
                    <a href="#" class="text-decoration-none" style="color: #667eea; font-weight: 500;">Lupa Kata Sandi?</a>
                </div>

                <button type="submit" class="btn btn-primary w-100">Masuk</button>
            </form>

            <p class="text-center mt-3">
                Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a>
            </p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>