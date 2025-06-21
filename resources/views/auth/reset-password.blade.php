<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
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
        }

        .login-button:hover {
            background: #332a22;
        }

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
            <h1>Reset Password</h1>
            <p>Enter your email and a new password to reset your credentials.</p>
        </div>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        @endif

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="input-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username" placeholder="Enter your email">
            </div>

            <div class="input-group">
                <label for="password">New Password</label>
                <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Enter new password">
            </div>

            <div class="input-group">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password">
            </div>

            <button type="submit" class="login-button">Reset Password</button>
        </form>
    </div>
</body>
</html>
