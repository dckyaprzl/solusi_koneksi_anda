<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f2f6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .login-container {
            background-color: white;
            width: 340px;
            padding: 40px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }
        
        .logo {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        
        .logo-image {
            width: 50px;
            height: 50px;
        }
        
        .login-title {
            text-align: center;
            margin-bottom: 20px;
            font-size: 20px;
            color: #333;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        .form-control {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }
        
        .btn-login {
            background-color: #a55eea;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            text-transform: uppercase;
            font-weight: bold;
            margin-top: 10px;
        }
        
        .divider {
            border-top: 1px solid #eee;
            margin: 20px 0;
        }
                
        .error-message {
            color: #e74c3c;
            font-size: 12px;
            margin-top: 5px;
        }
                
        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
                
        .remember-me input {
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="logo">
            <svg class="logo-image" viewBox="0 0 100 100">
                <rect x="20" y="20" width="30" height="60" fill="#4a8399" />
                <polygon points="50,20 80,20 80,80 50,80" fill="#f5a623" />
            </svg>
        </div>
        <div class="login-title">Masuk ke Akun Anda</div>
        <div class="divider"></div>
                
        @if($errors->any())
            <div class="error-message">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
                
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}" required autofocus>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Kata Sandi" required>
            </div>
            <div class="remember-me">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Ingat saya</label>
            </div>
            <button type="submit" class="btn-login">MASUK</button>
        </form>
    </div>
</body>
</html>