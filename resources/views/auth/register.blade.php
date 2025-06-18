<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | SportFlex</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #1a2a6c, #b21f1f, #fdbb2d);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            min-height: 100vh;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .register-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .register-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .register-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .register-subtitle {
            font-size: 1rem;
            font-weight: 300;
            opacity: 0.8;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }
        
        input {
            width: 100%;
            padding: 12px 15px;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            background: rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        input:focus {
            outline: none;
            border-color: white;
            background: rgba(255, 255, 255, 0.2);
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.2);
        }
        
        input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }
        
        .register-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
        }
        
        .login-link {
            color: white;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }
        
        .login-link:hover {
            text-decoration: underline;
        }
        
        .register-button {
            background: white;
            color: #1a2a6c;
            border: none;
            padding: 12px 30px;
            border-radius: 30px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .register-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        .error-message {
            color: #ff6b6b;
            font-size: 0.9rem;
            margin-top: 5px;
        }
        
        .password-strength {
            margin-top: 5px;
            height: 4px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 2px;
            overflow: hidden;
        }
        
        .strength-meter {
            height: 100%;
            width: 0%;
            background: #ff6b6b;
            transition: width 0.3s ease;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-header">
            <h1 class="register-title">Join SportFlex</h1>
            <p class="register-subtitle">Create your account to start tracking your multi-sport training</p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <label for="name">Full Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Enter your full name">
                @if ($errors->has('name'))
                    <div class="error-message">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>

            <!-- Email Address -->
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your email">
                @if ($errors->has('email'))
                    <div class="error-message">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Create a password" oninput="updatePasswordStrength()">
                <div class="password-strength">
                    <div class="strength-meter" id="strengthMeter"></div>
                </div>
                @if ($errors->has('password'))
                    <div class="error-message">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password">
                @if ($errors->has('password_confirmation'))
                    <div class="error-message">
                        {{ $errors->first('password_confirmation') }}
                    </div>
                @endif
            </div>

            <div class="register-footer">
                <a class="login-link" href="{{ route('login') }}">
                    Already registered?
                </a>

                <button type="submit" class="register-button">
                    Register
                </button>
            </div>
        </form>
    </div>

    <script>
        function updatePasswordStrength() {
            const password = document.getElementById('password').value;
            const meter = document.getElementById('strengthMeter');
            let strength = 0;
            
            // Check password length
            if (password.length > 0) strength += 20;
            if (password.length >= 8) strength += 20;
            
            // Check for mixed case
            if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 20;
            
            // Check for numbers
            if (password.match(/[0-9]/)) strength += 20;
            
            // Check for special chars
            if (password.match(/[^a-zA-Z0-9]/)) strength += 20;
            
            // Update meter width and color
            meter.style.width = strength + '%';
            
            if (strength < 40) {
                meter.style.background = '#ff6b6b'; // Weak (red)
            } else if (strength < 80) {
                meter.style.background = '#f9c74f'; // Medium (yellow)
            } else {
                meter.style.background = '#4ade80'; // Strong (green)
            }
        }
    </script>
</body>
</html>