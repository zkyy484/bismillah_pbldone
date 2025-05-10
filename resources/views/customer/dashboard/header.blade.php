<header class="bg-white shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <div class="flex items-center">
            <img src="https://via.placeholder.com/40" alt="Logo Toko" class="h-10 mr-2">
            <h1 class="text-xl font-semibold text-gray-800">Nama Toko</h1>
        </div>

        @php
            $id = Auth::user()->id;
            $profileData = App\Models\User::find($id);
        @endphp

        <nav class="hidden md:block">
            <ul class="flex space-x-6">
                <li><a href="#" class="text-gray-800 hover:text-primary transition"><i class="fas fa-home mr-1"></i>
                        Home</a></li>
                <li><a href="#" class="text-gray-800 hover:text-primary transition"><i class="fas fa-list mr-1"></i>
                        Kategori</a></li>
                <li><a href="#" class="text-gray-800 hover:text-primary transition"><i
                            class="fas fa-info-circle mr-1"></i> Tentang</a></li>
                <li><a href="#" class="text-gray-800 hover:text-primary transition"><i class="fas fa-phone mr-1"></i>
                        Kontak</a></li>
            </ul>
        </nav>

        <div class="flex items-center relative group">
            <img src="https://via.placeholder.com/35" alt="User Profile" class="w-8 h-8 rounded-full mr-2">
            <span class="text-gray-800 cursor-pointer">Nama User</span>
            
            <!-- Dropdown Menu -->
            <div class="absolute right-0 top-full mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 hidden group-hover:block">
                <a href="{{route('dashboard')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100 transition">
                    <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                </a>
                <a href="{{route('user.logout')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100 transition">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
            </div>
        </div>
    </div>
</header>