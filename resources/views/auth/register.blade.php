<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Khairat Management System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="register-body">

    <!-- Logo -->
    <div class="register-logo">
        <img src="{{ asset('images/logo.png') }}" alt="Masjid As-Salam Logo">
    </div>

    <!-- Register Card -->
    <div class="register-container">
        <div class="register-card">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                
                <div class="register-form-group">
                    <label>NAME</label>
                    <input type="text"
                        name="name"
                        id="name"
                        value="{{ old('name') }}"
                        placeholder="e.g. AHMAD BIN ALI"
                        autocomplete="name"
                        maxlength="255"
                        required>
                    @error('name')
                        <p class="register-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="register-form-group">
                    <label>EMAIL</label>
                    <input type="email"
                        name="email"
                        id="email"
                        value="{{ old('email') }}"
                        placeholder="e.g. ahmad@gmail.com"
                        autocomplete="email"
                        maxlength="255"
                        required>
                    @error('email')
                        <p class="register-error">{{ $message }}</p>
                    @enderror
                </div>

                <!-- PASSWORD -->
                <div class="register-form-group">
                    <label>PASSWORD</label>

                    <div class="password-input-wrapper">
                        <input type="password"
                            name="password"
                            id="password"
                            autocomplete="new-password"
                            minlength="8"
                            required>

                        <button type="button"
                                class="password-toggle"
                                onclick="togglePassword('password', this)"
                                aria-label="Show password">

                            <svg viewBox="0 0 24 24">
                                <path d="M12 5c-5.5 0-9.5 5-10 7 .5 2 4.5 7 10 7s9.5-5 10-7c-.5-2-4.5-7-10-7zm0 11a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-6a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                            </svg>

                        </button>
                    </div>

                    <p class="password-hint">
                        Your password must contain:
                    </p>

                    <ul class="password-requirements">
                        <li id="rule-length">At least 8 characters</li>
                        <li id="rule-uppercase">One uppercase letter (A-Z)</li>
                        <li id="rule-lowercase">One lowercase letter (a-z)</li>
                        <li id="rule-number">One number (0-9)</li>
                        <li id="rule-symbol">One special character (!@#$% etc.)</li>
                    </ul>

                    @error('password')
                        <p class="register-error">{{ $message }}</p>
                    @enderror
                </div>

                <!-- CONFIRM PASSWORD -->
                <div class="register-form-group">
                    <label>CONFIRM PASSWORD</label>

                    <div class="password-input-wrapper">
                        <input type="password"
                            name="password_confirmation"
                            id="password-confirmation"
                            autocomplete="new-password"
                            minlength="8"
                            required>

                        <button type="button"
                                class="password-toggle"
                                onclick="togglePassword('password-confirmation', this)"
                                aria-label="Show password">

                            <svg viewBox="0 0 24 24">
                                <path d="M12 5c-5.5 0-9.5 5-10 7 .5 2 4.5 7 10 7s9.5-5 10-7c-.5-2-4.5-7-10-7zm0 11a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-6a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                            </svg>

                        </button>
                    </div>

                    @error('password_confirmation')
                        <p class="register-error">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="register-btn">Register</button>

                <p class="register-link">
                    Already have an account? <a href="{{ route('login') }}">Log in</a>
                </p>
            </form>
        </div>
    </div>

    <script>
        // Automatically convert name to uppercase
        const nameInput = document.getElementById('name');

        nameInput.addEventListener('input', function () {
            this.value = this.value.toUpperCase();
        });


        // Live password validation
        const passwordInput = document.getElementById('password');

        const rules = {
            length: document.getElementById('rule-length'),
            uppercase: document.getElementById('rule-uppercase'),
            lowercase: document.getElementById('rule-lowercase'),
            number: document.getElementById('rule-number'),
            symbol: document.getElementById('rule-symbol')
        };

        passwordInput.addEventListener('input', function () {

            const password = this.value;

            updateRule(rules.length, password.length >= 8);
            updateRule(rules.uppercase, /[A-Z]/.test(password));
            updateRule(rules.lowercase, /[a-z]/.test(password));
            updateRule(rules.number, /[0-9]/.test(password));
            updateRule(rules.symbol, /[^A-Za-z0-9]/.test(password));
        });

        function updateRule(element, isValid) {
            if (isValid) {
                element.classList.add('password-rule-valid');
            } else {
                element.classList.remove('password-rule-valid');
            }
        }

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