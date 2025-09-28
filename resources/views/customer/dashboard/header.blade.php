@php
    $id = Auth::user()->id;
    $profileData = App\Models\User::find($id);

    $dataAdmin = Auth::guard('admin')->user();
@endphp

<nav class="fixed w-full top-0 left-0 z-50 bg-coklat py-2.5 shadow-navbar">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center">
            <!-- Left Section -->
            <div class="flex items-center gap-4 min-w-[180px]">
                <img src="{{ !empty($dataAdmin->photo) ? url('upload/admin_images/' . $dataAdmin->photo) : url('upload/rumah.jpg') }}"
                    alt="Logo" class="w-11 h-11 object-cover rounded-full border-2 border-white">
                <a href="{{ route('index') }}" class="text-white text-xl font-bold">Nazarch Studio</a>
            </div>

            <!-- Middle Section -->
            <div class="hidden md:flex gap-12 items-center justify-center flex-1">
                <a href="{{ route('index') }}" class="text-white font-medium hover:text-cream transition-colors">Halaman
                    Utama</a>
                <a href="{{ route('show.kategory') }}"
                    class="text-white font-medium hover:text-cream transition-colors">Kategori</a>
                <a href="{{ route('show.about_us') }}"
                    class="text-white font-medium hover:text-cream transition-colors">Tentang Kami</a>
                <a href="{{ route('show.contact') }}"
                    class="text-white font-medium hover:text-cream transition-colors">Kontak</a>
            </div>

            <!-- Right Section -->
            <div class="hidden md:flex gap-4 items-center min-w-[180px] justify-end">
                @auth
                    @php
                        $id = Auth::user()->id;
                        $profileData = App\Models\User::find($id);
                    @endphp
                    <div class="relative flex items-center gap-4">
                        <span class="text-white font-semibold hidden sm:inline">{{ $profileData->name }}</span>
                        <a href="{{ route('dashboard') }}" class="focus:outline-none">
                            <img src="{{ !empty($profileData->photo) ? url('upload/user_images/' . $profileData->photo) : url('upload/no_images.jpg') }}"
                                alt="Profile" class="w-11 h-11 object-cover rounded-full border-2 border-white">
                        </a>
                    </div>
                @else
                    <div class="flex gap-2">
                        <a href="{{ route('login') }}"
                            class="bg-coklat text-putih font-semibold px-4 py-2 rounded-2xl border-2 border-putih hover:bg-cream hover:text-coklat transition">Login</a>
                        <a href="{{ route('register') }}"
                            class="bg-cream text-coklat font-semibold px-4 py-2 rounded-2xl border-2 border-coklat hover:border-putih hover:bg-coklat hover:text-putih transition">Register</a>
                    </div>
                @endauth
            </div>

            <!-- Hamburger for mobile -->
            <button id="mobileMenuButton" class="md:hidden text-white focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="md:hidden hidden mt-4 flex flex-col items-center space-y-2 text-white text-center">
            <a href="{{ route('index') }}"
                class="w-full max-w-xs px-4 py-2 font-medium rounded hover:bg-cream hover:text-coklat transition">Halaman
                Utama</a>
            <a href="{{ route('show.kategory') }}"
                class="w-full max-w-xs px-4 py-2 font-medium rounded hover:bg-cream hover:text-coklat transition">Kategori</a>
            <a href="{{ route('show.about_us') }}"
                class="w-full max-w-xs px-4 py-2 font-medium rounded hover:bg-cream hover:text-coklat transition">Tentang
                Kami</a>
            <a href="{{ route('show.contact') }}"
                class="w-full max-w-xs px-4 py-2 font-medium rounded hover:bg-cream hover:text-coklat transition">Kontak</a>

            <div class="border-t border-white/30 my-2 w-full max-w-xs"></div>

            @auth
                <div class="px-4 text-sm text-putih w-full max-w-xs">Halo, {{ Auth::user()->name }}</div>
                <a href="{{ route('dashboard') }}"
                    class="w-full max-w-xs px-4 py-2 font-medium rounded hover:bg-cream hover:text-coklat transition">Profile</a>
                <a href="{{ route('user.logout') }}"
                    class="w-full max-w-xs px-4 py-2 font-medium rounded hover:bg-cream hover:text-coklat transition">Log
                    Out</a>
            @else
                <a href="{{ route('login') }}"
                    class="w-full max-w-xs px-4 py-2 font-medium rounded hover:bg-cream hover:text-coklat transition">Login</a>
                <a href="{{ route('register') }}"
                    class="w-full max-w-xs px-4 py-2 font-medium rounded hover:bg-cream hover:text-coklat transition">Register</a>
            @endauth
        </div>
    </div>
</nav>
