<header class="bg-putih shadow-sm border-b border-abu/10 relative z-50">
    <div class="flex justify-between items-center p-4">
        <!-- Left -->
        <div class="flex items-center">
            <button class="text-abu focus:outline-none lg:hidden">
                <i class="fas fa-bars"></i>
            </button>
            <h2 class="ml-4 text-xl font-semibold text-abu">@yield('title', 'DASHBOARD ADMIN')</h2>
        </div>

        <!-- Right -->
        <div class="flex items-center space-x-4">
            

            <!-- Profile with Dropdown -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center focus:outline-none">
                    <img class="h-8 w-8 rounded-full object-cover"
                        src="https://ui-avatars.com/api/?name=Admin&background=40342A&color=F2F0EB" alt="Admin">
                    <span class="ml-2 text-abu">Admin</span>
                    <i class="ml-1 fas fa-chevron-down text-abu/70"></i>
                </button>

                <!-- Dropdown Menu -->
                <div x-show="open" @click.away="open = false" x-transition
                    class="absolute right-0 mt-2 w-48 bg-putih border border-abu/10 rounded-md shadow-md py-2 z-50">

                    <a href="{{ route('admin.profile') }}" class="block px-4 py-2 text-abu hover:bg-abu/5">
                        <i class="fas fa-user-cog mr-2 text-abu/70"></i> Profil
                    </a>
                    
                    <a href="{{ route('admin.logout') }}" class="block px-4 py-2 text-abu hover:bg-abu/5">
                        <i class="fas fa-sign-out-alt mr-2 text-abu/70"></i> Keluar
                    </a>

                </div>
            </div>
        </div>
    </div>
</header>