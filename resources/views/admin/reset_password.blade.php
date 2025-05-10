<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url('/picture/rumah.jpg') no-repeat;
            background-size: cover;
            background-position: center;
        }

        .wrapper {
            width: 420px;
            background: transparent;
            border: 2px solid rgba(255, 255, 255, .2);
            backdrop-filter: blur(20px);
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
            color: #fff;
            border-radius: 10px;
            padding: 30px 40px;
        }

        .wrapper h1 {
            font-size: 28px;
            text-align: center;
            margin-bottom: 25px;
        }

        .input-box {
            position: relative;
            width: 100%;
            height: 50px;
            margin: 30px 0;
        }

        .input-box input {
            width: 100%;
            height: 100%;
            background: transparent;
            border: 2px solid rgba(255, 255, 255, .2);
            border-radius: 40px;
            padding: 20px 45px 20px 20px;
            color: #fff;
            font-size: 16px;
            outline: none;
        }

        .input-box input::placeholder {
            color: #fff;
        }

        .input-box i {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
            color: #fff;
        }

        .btn {
            width: 100%;
            height: 45px;
            background: #fff;
            border: none;
            border-radius: 40px;
            color: #333;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            text-align: center;
        }

        .back-link {
            margin-top: 20px;
            text-align: center;
        }

        .back-link a {
            color: #fff;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="wrapper">
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

        <form method="post" action="{{ route('admin.reset_password_submit') }}">
            @csrf
            {{-- @method('put') --}}

            <h1>Reset Password</h1>

            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">


            <div class="input-box">
                <input type="password" name="password" required placeholder="Password" id="exampleInputEmail">
                <i class='bx bxs-alt'></i>
            </div>


            <div class="input-box">
                <input type="password" name="password_confirmation" required placeholder="Confirm New Password">
                <i class='bx bxs-lock-alt'></i>
            </div>


            <button type="submit" class="btn">Reset Password</button>

            <div class="back-link">
                <a href="{{ route('login') }}">Back to login</a>
            </div>
        </form>
    </div>
</body>

</html>