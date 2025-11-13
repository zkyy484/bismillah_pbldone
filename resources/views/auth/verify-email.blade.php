<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email</title>
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

        .verify-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 400px;
            padding: 40px;
            text-align: center;
            border: 1px solid rgba(0, 0, 0, 0.03);
        }

        .verify-header {
            margin-bottom: 28px;
        }

        .verify-header h1 {
            color: #40342A;
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .verify-header p {
            color: #777;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.6;
        }

        .alert {
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

        .verify-button {
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
            margin-bottom: 16px;
        }

        .verify-button:hover {
            background: #332a22;
        }

        .logout-button {
            display: inline-block;
            font-size: 14px;
            color: #777;
            text-decoration: underline;
            background: none;
            border: none;
            cursor: pointer;
            transition: color 0.2s;
        }

        .logout-button:hover {
            color: #40342A;
        }
    </style>
</head>
<body>
    <div class="verify-container">
        <div class="verify-header">
            <h1>Verifikasi Email</h1>
            <p>Terima kasih telah mendaftar! Sebelum memulai, silakan verifikasi alamat email Anda dengan mengklik tautan yang kami kirimkan. Jika belum menerima email, Anda dapat mengirim ulang tautan verifikasi.</p>
        </div>

        @if (session('status') == 'verification-link-sent')
            <li class="alert">
                {{ __('Tautan verifikasi baru telah dikirim ke alamat email yang Anda berikan saat pendaftaran.') }}
            </li>
        @endif

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="verify-button">Kirim Ulang Email Verifikasi</button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-button">Keluar</button>
        </form>
    </div>
</body>
</html>