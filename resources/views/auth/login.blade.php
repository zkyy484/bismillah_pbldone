<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }
        
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');
        
        body {
            background: #F2F0EB;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        .login-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 400px;
            padding: 40px;
            text-align: center;
            border: 1px solid rgba(0, 0, 0, 0.03);
        }
        
        .login-header {
            margin-bottom: 32px;
        }
        
        .login-header h1 {
            color: #40342A;
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 8px;
        }
        
        .login-header p {
            color: #777;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.5;
        }
        
        .input-group {
            margin-bottom: 20px;
            text-align: left;
        }
        
        .input-group label {
            display: block;
            color: #40342A;
            font-size: 14px;
            margin-bottom: 8px;
            font-weight: 500;
        }
        
        .input-group input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.2s;
            background-color: white;
        }
        
        .input-group input:focus {
            border-color: #40342A;
            outline: none;
            box-shadow: 0 0 0 2px rgba(64, 52, 42, 0.1);
        }
        
        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            font-size: 14px;
        }
        
        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .remember-me input {
            width: 16px;
            height: 16px;
            accent-color: #40342A;
        }
        
        .remember-me label {
            color: #40342A;
            font-weight: 400;
        }
        
        .forgot-password a {
            color: #40342A;
            text-decoration: none;
            font-weight: 500;
        }
        
        .login-button {
            width: 100%;
            padding: 14px;
            background: #40342A;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 15px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.2s;
            margin-bottom: 24px;
        }
        
        .login-button:hover {
            background: #332a22;
        }
        
        .signup-link {
            font-size: 14px;
            color: #777;
        }
        
        .signup-link a {
            color: #40342A;
            text-decoration: none;
            font-weight: 500;
        }
        
        /* Error messages */
        .login-container li {
            list-style: none;
            padding: 12px 16px;
            margin-bottom: 20px;
            border-radius: 8px;
            font-size: 14px;
            background-color: rgba(64, 52, 42, 0.05);
            color: #40342A;
            border-left: 3px solid #40342A;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h1>Welcome Back</h1>
            <p>Sign in to access your account</p>
        </div>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        @endif

        @if (Session::has('error'))
            <li>{{ Session::get('error')}}</li>
        @endif

        @if (Session::has('success'))
            <li>{{ Session::get('success')}}</li>
        @endif
        
        <form method="POST" action="{{route('login')}}">
            @csrf
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Enter your email">
            </div>
            
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password">
            </div>
            
            <div class="remember-forgot">
                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember me</label>
                </div>
                <div class="forgot-password">
                    <a href="{{route('password.request')}}">Forgot password?</a>
                </div>
            </div>
            
            <button type="submit" class="login-button">Sign In</button>
            
            <div class="signup-link">
                Don't have an account? <a href="{{route('register')}}">Sign up</a>
            </div>
        </form>
    </div>
</body>
</html>