<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Account</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
        }
        
        .register-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            width: 480px;
            padding: 32px;
            text-align: center;
        }
        
        .register-header {
            margin-bottom: 16px;
        }
        
        .register-header h1 {
            color: #333;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 12px;
        }
        
        .register-header p {
            color: #777;
            font-size: 14px;
            font-weight: 500;
        }
        
        .input-group {
            margin-bottom: 12px;
            text-align: left;
        }
        
        .input-group label {
            display: block;
            color: #555;
            font-size: 14px;
            margin-bottom: 6px;
            font-weight: 600;
        }
        
        .input-group input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s;
            font-weight: 500;
        }
        
        .input-group input:focus {
            border-color: #4a90e2;
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.2);
            outline: none;
        }
        
        .name-fields {
            display: flex;
            gap: 2px;
        }
        
        .name-fields .input-group {
            flex: 1;
        }
        
        .terms {
            display: flex;
            align-items: flex-start;
            margin: 20px 0 25px;
            font-size: 13px;
            text-align: left;
        }
        
        .terms input {
            margin-right: 10px;
            margin-top: 3px;
        }
        
        .terms label {
            color: #555;
            font-weight: 500;
        }
        
        .terms a {
            color: #4a90e2;
            text-decoration: none;
            font-weight: 600;
        }
        
        .register-button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(to right, #4a90e2, #63b3ed);
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            letter-spacing: 0.5px;
            margin-bottom: 20px;
        }
        
        .register-button:hover {
            background: linear-gradient(to right, #3a7bc8, #4a90e2);
            box-shadow: 0 5px 15px rgba(74, 144, 226, 0.4);
        }
        
        .login-link {
            font-size: 14px;
            color: #777;
            font-weight: 500;
        }
        
        .login-link a {
            color: #4a90e2;
            text-decoration: none;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-header">
            <h1>Create Account</h1>
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
        
        <form method="POST" action="{{route('register')}}">
          @csrf
            <div class="name-fields">
                <div class="input-group">
                    <label for="first-name">Username  </label>
                    <input type="text" name="name" id="first-name" placeholder="Enter first name">
                </div>
            </div>
            
            <div class="input-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" placeholder="Enter your email">
            </div>
            
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Create password">
            </div>
            
            <div class="input-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" name="password_confirmation" id="confirm-password" placeholder="Repeat password">
            </div>
            
            <button type="submit" class="register-button">REGISTER</button>
            
            <div class="login-link">
                Already have an account? <a href="{{route('login')}}">Login here</a>
            </div>
        </form>
    </div>
</body>
</html>