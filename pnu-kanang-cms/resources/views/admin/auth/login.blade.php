<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | PNU Kanang CMS</title>
    <link rel="icon" href="{{ asset('img/logo-pnu.svg') }}" type="image/svg+xml">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
    <div class="login-wrap">
        <div class="login-card">
            <div class="brand">
                <img src="{{ asset('img/logo-pnu.svg') }}" alt="PNU Kanang">
                <h4>PNU Kanang CMS</h4>
                <small>Panel Admin - Pondok Pesantren Nahdlatul Ummah Kanang</small>
            </div>

            @if(session('success'))
                <div class="alert alert-success small">{{ session('success') }}</div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger small">
                    @foreach($errors->all() as $err)<div>{{ $err }}</div>@endforeach
                </div>
            @endif

            <form action="{{ route('admin.login.attempt') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="admin@pnukanang.local" required autofocus>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Kata Sandi</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan kata sandi" required>
                    </div>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label small" for="remember">Ingat saya</label>
                </div>
                <button type="submit" class="btn btn-primary-pnu w-100"><i class="bi bi-box-arrow-in-right me-1"></i> Masuk</button>
            </form>

            <hr class="my-4">
            <div class="text-center small text-muted">
                <a href="{{ route('home') }}" class="text-decoration-none" style="color:var(--nu-green-dark);">
                    <i class="bi bi-arrow-left"></i> Kembali ke Website
                </a>
            </div>
        </div>
    </div>
</body>
</html>
