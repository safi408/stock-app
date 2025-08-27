<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Computer Store - Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f1f3f6;
        }

        .login-box {
            max-width: 480px;
            margin: 60px auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.1);
            padding: 40px;
        }

        .login-box h2 {
            font-weight: 600;
            margin-bottom: 30px;
            text-align: center;
        }

        .btn-primary {
            background-color: #0d6efd;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #0d6efd;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2><i class="bi bi-pc-display-horizontal me-1"></i> Computer Store Login</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- Show Alert if Login Fails --}}
        @if ($errors->has('email'))
            <div class="alert alert-danger d-flex align-items-center mb-4" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <div>{{ $errors->first('email') }}</div>
            </div>
        @endif

        {{-- Email --}}
        <div class="mb-3">
            <label for="email" class="form-label"><i class="bi bi-envelope-fill me-1"></i> Email Address</label>
            <input id="email" type="email"
                   class="form-control @error('email') is-invalid @enderror"
                   name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Password --}}
        <div class="mb-3">
            <label for="password" class="form-label"><i class="bi bi-lock-fill me-1"></i> Password</label>
            <input id="password" type="password"
                   class="form-control @error('password') is-invalid @enderror"
                   name="password" required>
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Remember Me --}}
        <div class="mb-3 form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                   {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">
                Remember Me
            </label>
        </div>

        {{-- Submit Button --}}
        <div class="d-grid mb-3">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-box-arrow-in-right me-1"></i> Login
            </button>
        </div>

        {{-- Forgot Password --}}
        @if (Route::has('password.request'))
            <div class="text-center">
                <a href="{{ route('password.request') }}" class="text-decoration-none">
                    <i class="bi bi-question-circle me-1"></i> Forgot Your Password?
                </a>
            </div>
        @endif
    </form>
</div>

</body>
</html>
