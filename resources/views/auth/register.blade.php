<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Account</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        cokelat: "#40342A",
                        cream: "#F2F0EB",
                        abu: "#333",
                        putih: "#fff",
                        kuning: "#FFF6CC",
                        hitam: "#000000"
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body class="bg-cream min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-lg w-full max-w-sm border border-opacity-5 border-cokelat">
        <div class="p-6">
            <div class="text-center mb-5">
                <h1 class="text-xl font-semibold text-cokelat mb-1">Create Account</h1>
                <p class="text-gray-500 text-xs">Join us to get started</p>
            </div>

            <!-- Error Messages -->
            @if ($errors->any())
                <ul class="mb-4 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li class="text-xs bg-opacity-10 bg-cokelat text-cokelat px-3 py-2 rounded border-l-2 border-cokelat">
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            @endif

            @if (Session::has('error'))
                <div class="text-xs bg-opacity-10 bg-cokelat text-cokelat px-3 py-2 rounded border-l-2 border-cokelat mb-4">
                    {{ Session::get('error') }}
                </div>
            @endif

            @if (Session::has('success'))
                <div class="text-xs bg-opacity-10 bg-cokelat text-cokelat px-3 py-2 rounded border-l-2 border-cokelat mb-4">
                    {{ Session::get('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" class="space-y-3">
                @csrf
                
                <div>
                    <label for="username" class="block text-xs font-medium text-cokelat mb-1">Username</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="username" 
                        placeholder="Masukkan Username"
                        class="w-full px-3 py-2 text-sm rounded-lg border border-gray-200 focus:border-cokelat focus:ring-1 focus:ring-opacity-20 focus:ring-cokelat bg-cream bg-opacity-30">
                </div>
                
                <div>
                    <label for="email" class="block text-xs font-medium text-cokelat mb-1">Email</label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        placeholder="Masukkan Email"
                        class="w-full px-3 py-2 text-sm rounded-lg border border-gray-200 focus:border-cokelat focus:ring-1 focus:ring-opacity-20 focus:ring-cokelat bg-cream bg-opacity-30">
                </div>
                
                <div>
                    <label for="password" class="block text-xs font-medium text-cokelat mb-1">Password</label>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        placeholder="Masukkan password"
                        class="w-full px-3 py-2 text-sm rounded-lg border border-gray-200 focus:border-cokelat focus:ring-1 focus:ring-opacity-20 focus:ring-cokelat bg-cream bg-opacity-30">
                </div>
                
                <div>
                    <label for="confirm-password" class="block text-xs font-medium text-cokelat mb-1">Confirm Password</label>
                    <input 
                        type="password" 
                        name="password_confirmation" 
                        id="confirm-password" 
                        placeholder="Masukkan ulang password"
                        class="w-full px-3 py-2 text-sm rounded-lg border border-gray-200 focus:border-cokelat focus:ring-1 focus:ring-opacity-20 focus:ring-cokelat bg-cream bg-opacity-30">
                </div>
                
                <button 
                    type="submit" 
                    class="w-full py-2 px-4 bg-cokelat hover:bg-opacity-90 text-kuning text-sm font-medium rounded-lg mt-4">
                    Register
                </button>
                
                <div class="text-center text-xs text-gray-500 mt-4">
                    Already have an account? <a href="{{ route('login') }}" class="text-cokelat font-medium">Sign in</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>