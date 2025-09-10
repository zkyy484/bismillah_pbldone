<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        cokelat: '#40342A',
                        cream: '#F2F0EB',
                        abu: '#333',
                        putih: '#fff',
                        kuning: '#FFF6CC',
                        hitam: '#000000',
                        biru: '#3498DB'
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body class="bg-cream font-sans" x-data="{ sidebarOpen: false }">
    <div class="flex h-screen relative">

        <!-- Sidebar -->
        <div
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
            class="fixed md:static z-50 inset-y-0 left-0 w-64 bg-cokelat text-putih transform md:translate-x-0 transition-transform duration-300 ease-in-out"
        >
            @include('admin.layouts.sidebar')
        </div>

        <!-- Overlay (untuk mobile saat sidebar terbuka) -->
        <div
            x-show="sidebarOpen"
            @click="sidebarOpen = false"
            class="fixed inset-0 bg-black bg-opacity-50 z-40 md:hidden"
        ></div>

        <!-- Mobile Navbar -->
        <div class="md:hidden fixed top-0 left-0 right-0 z-40 flex items-center justify-between bg-cokelat p-4">
            <button @click="sidebarOpen = !sidebarOpen" class="text-putih">
                <i class="fas fa-bars text-xl"></i>
            </button>
            <h1 class="text-putih text-lg font-bold">Nazarch<span class="text-kuning">Studio</span></h1>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden pt-16 md:pt-0">
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-cream p-4">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('backend/assets/js/validate.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('backend/assets/js/code.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="//unpkg.com/alpinejs" defer></script>

    @yield('scripts')
</body>

</html>
