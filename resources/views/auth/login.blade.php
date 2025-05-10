<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Elegant</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .login-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            width: 400px;
            padding: 40px;
            text-align: center;
        }
        
        .login-header {
            margin-bottom: 30px;
        }
        
        .login-header h1 {
            color: #333;
            font-size: 28px;
            font-weight: 700; /* Dipertebal dari 600 */
            margin-bottom: 10px;
        }
        
        .login-header p {
            color: #777;
            font-size: 14px;
            font-weight: 500; /* Ditambahkan untuk mempertebal */
        }
        
        .input-group {
            margin-bottom: 20px;
            text-align: left;
        }
        
        .input-group label {
            display: block;
            color: #555;
            font-size: 14px;
            margin-bottom: 8px;
            font-weight: 600; /* Dipertebal dari 500 */
        }
        
        .input-group input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s;
            font-weight: 500; /* Ditambahkan untuk teks input */
        }
        
        .input-group input:focus {
            border-color: #4a90e2;
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.2);
            outline: none;
        }
        
        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            font-size: 13px;
        }
        
        .remember-me {
            display: flex;
            align-items: center;
        }
        
        .remember-me input {
            margin-right: 5px;
        }
        
        .remember-me label {
            font-weight: 500; /* Ditambahkan untuk mempertebal */
            color: #555; /* Ditambahkan untuk konsistensi */
        }
        
        .forgot-password a {
            color: #4a90e2;
            text-decoration: none;
            font-weight: 600; /* Dipertebal */
        }
        
        .login-button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(to right, #4a90e2, #63b3ed);
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 16px;
            font-weight: 700; /* Dipertebal dari 600 */
            cursor: pointer;
            transition: all 0.3s;
            letter-spacing: 0.5px; /* Ditambahkan untuk memperjelas teks */
        }
        
        .login-button:hover {
            background: linear-gradient(to right, #3a7bc8, #4a90e2);
            box-shadow: 0 5px 15px rgba(74, 144, 226, 0.4);
        }
        
        .signup-link {
            margin-top: 25px;
            font-size: 14px;
            color: #777;
            font-weight: 500; /* Ditambahkan untuk mempertebal */
        }
        
        .signup-link a {
            color: #4a90e2;
            text-decoration: none;
            font-weight: 600; /* Dipertebal dari 500 */
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h1>Welcome Back</h1>
            <p>Please enter your credentials to login</p>
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
        
        <form method="POST" action="{{route('login')}}" >
            @csrf
            <div class="input-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" placeholder="Enter your email">
            </div>
            
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password">
            </div>
            
            <div class="remember-forgot">
                <div class="remember-me">
                    <input type="checkbox" id="remember">
                    <label for="remember">Remember me</label>
                </div>
                <div class="forgot-password">
                    <a href="{{route('password.request')}}">Forgot password?</a>
                </div>
            </div>
            
            <button type="submit" class="login-button">LOGIN</button>
            
            <div class="signup-link">
                Don't have an account? <a href="{{route('register')}}">Sign up now</a>
            </div>
        </form>
    </div>
</body>
</html>