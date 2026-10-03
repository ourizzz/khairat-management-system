<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Khairat Management System</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="login-body">

    <a href="{{ url('/') }}" class="login-back-home">
        Back to Homepage
    </a>

    <!-- Logo -->
    <div class="login-logo">
        <img src="{{ asset('images/logo.png') }}" alt="Masjid As-Salam Logo">
    </div>

    <!-- Admin Login Card -->
    <div class="login-container">
        <div class="login-card">

            <form method="POST" action="{{ route('admin.login.submit') }}">
                @csrf

                @if($errors->any())
                    <div class="alert">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <div class="login-form-group">
                    <label>ADMIN ID</label>
                    <input type="text"
                           name="admin_id"
                           value="{{ old('admin_id') }}"
                           required>
                </div>

                <div class="login-form-group">
                    <label>PASSWORD</label>

                    <div class="password-input-wrapper">
                        <input type="password"
                            name="password"
                            id="admin-password"
                            required>

                        <button type="button"
                                class="password-toggle"
                                onclick="togglePassword('admin-password', this)"
                                aria-label="Show password">

                            <svg viewBox="0 0 24 24">
                                <path d="M12 5c-5.5 0-9.5 5-10 7 .5 2 4.5 7 10 7s9.5-5 10-7c-.5-2-4.5-7-10-7zm0 11a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-6a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                            </svg>

                        </button>
                    </div>
                </div>

                <button type="submit" class="login-btn">
                    Log in as Admin
                </button>

                <p class="login-link">
                    Not an administrator?
                    <a href="{{ route('login') }}">Back to User Login</a>
                </p>
            </form>

        </div>
    </div>

    <script>
        function togglePassword(inputId, button) {
            const input = document.getElementById(inputId);

            if (input.type === 'password') {
                input.type = 'text';
                button.classList.add('showing');
                button.setAttribute('aria-label', 'Hide password');
            } else {
                input.type = 'password';
                button.classList.remove('showing');
                button.setAttribute('aria-label', 'Show password');
            }
        }
    </script>

</body>
</html>