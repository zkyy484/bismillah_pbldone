<div class="flex h-screen">
    <!-- Sidebar -->
    <aside id="sidebar" class="w-64 bg-[#40342A] text-white transition-transform transform duration-300">
        <div class="p-4">
            <h1 class="text-2xl font-bold">
                <a href="{{route('admin.dashboard')}}">NAZA ARCHITECT STUDIO</a>
            </h1>
        </div>
        <nav class="mt-6 px-4 pb-4"> <!-- Added horizontal padding and bottom padding -->
            <div class="px-4 py-3 bg-putih text-cokelat rounded-lg"> <!-- Added rounded-lg -->
                <span class="flex items-center">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    <a href="{{route('admin.dashboard')}}" class="font-medium">Dashboard</a>
                </span>
            </div>
            <div class="mt-4 space-y-2"> <!-- Added space-y-2 for vertical spacing between menu items -->

                <!-- Product Photos Dropdown -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="w-full flex items-center justify-between px-4 py-3 text-gray-200 hover:bg-putih hover:text-cokelat rounded-lg transition-colors duration-200">
                        <div class="flex items-center">
                            <i class="fas fa-images mr-3"></i>
                            <span>Image Category</span>
                        </div>
                        <i :class="{'transform rotate-180': open}" class="fas fa-chevron-down transition-transform duration-200 text-sm"></i>
                    </button>
                    <div x-show="open" @click.outside="open = false" class="ml-6 mt-1 bg-[#504538] rounded-lg space-y-1 py-1">
                        <a href="{{route('all.catimage')}}" class="block px-4 py-2 text-sm text-gray-200 hover:bg-putih hover:text-cokelat rounded-md">Semua Data</a>
                        <a href="{{route('add.catimage')}}" class="block px-4 py-2 text-sm text-gray-200 hover:bg-putih hover:text-cokelat rounded-md">Tambah Data</a>
                    </div>
                </div>

                <!-- Categories Dropdown -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="w-full flex items-center justify-between px-4 py-3 text-gray-200 hover:bg-putih hover:text-cokelat rounded-lg transition-colors duration-200">
                        <div class="flex items-center">
                            <i class="fas fa-layer-group mr-3"></i>
                            <span>Desain Rumah</span>
                        </div>
                        <i :class="{'transform rotate-180': open}" class="fas fa-chevron-down transition-transform duration-200 text-sm"></i>
                    </button>
                    <div x-show="open" @click.outside="open = false" class="ml-6 mt-1 bg-[#504538] rounded-lg space-y-1 py-1">
                        <a href="{{route ('all.category')}}" class="block px-4 py-2 text-sm text-gray-200 hover:bg-putih hover:text-cokelat rounded-md">Semua Data</a>
                        <a href="{{route ('add.category')}}" class="block px-4 py-2 text-sm text-gray-200 hover:bg-putih hover:text-cokelat rounded-md">Tambah Data</a>
                    </div>
                </div>

                <!-- Banner Dropdown -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="w-full flex items-center justify-between px-4 py-3 text-gray-200 hover:bg-putih hover:text-cokelat rounded-lg transition-colors duration-200">
                        <div class="flex items-center">
                            <i class="fas fa-image mr-3"></i>
                            <span>Banner</span>
                        </div>
                        <i :class="{'transform rotate-180': open}" class="fas fa-chevron-down transition-transform duration-200 text-sm"></i>
                    </button>
                    <div x-show="open" @click.outside="open = false" class="ml-6 mt-1 bg-[#504538] rounded-lg space-y-1 py-1">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-200 hover:bg-putih hover:text-cokelat rounded-md">Semua Data</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-200 hover:bg-putih hover:text-cokelat rounded-md">Tambah Data</a>
                    </div>
                </div>

                <!-- Orders Dropdown -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="w-full flex items-center justify-between px-4 py-3 text-gray-200 hover:bg-putih hover:text-cokelat rounded-lg transition-colors duration-200">
                        <div class="flex items-center">
                            <i class="fas fa-shopping-cart mr-3"></i>
                            <span>Pesanan</span>
                        </div>
                        <i :class="{'transform rotate-180': open}" class="fas fa-chevron-down transition-transform duration-200 text-sm"></i>
                    </button>
                    <div x-show="open" @click.outside="open = false" class="ml-6 mt-1 bg-[#504538] rounded-lg space-y-1 py-1">
                        <a href="{{route('all.order')}}" class="block px-4 py-2 text-sm text-gray-200 hover:bg-putih hover:text-cokelat rounded-md">Semua Data</a>
                    </div>
                </div>

                <!-- Invoice Dropdown -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="w-full flex items-center justify-between px-4 py-3 text-gray-200 hover:bg-putih hover:text-cokelat rounded-lg transition-colors duration-200">
                        <div class="flex items-center">
                            <i class="fas fa-file-invoice mr-3"></i>
                            <span>Transaksi</span>
                        </div>
                        <i :class="{'transform rotate-180': open}" class="fas fa-chevron-down transition-transform duration-200 text-sm"></i>
                    </button>
                    <div x-show="open" @click.outside="open = false" class="ml-6 mt-1 bg-[#504538] rounded-lg space-y-1 py-1">
                        <a href="{{route('transaksi')}}" class="block px-4 py-2 text-sm text-gray-200 hover:bg-putih hover:text-cokelat rounded-md">Semua Data</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-200 hover:bg-putih hover:text-cokelat rounded-md">Tambah Data</a>
                    </div>
                </div>

                <!-- Reviews Dropdown -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="w-full flex items-center justify-between px-4 py-3 text-gray-200 hover:bg-putih hover:text-cokelat rounded-lg transition-colors duration-200">
                        <div class="flex items-center">
                            <i class="fas fa-comment-alt mr-3"></i>
                            <span>Ulasan</span>
                        </div>
                        <i :class="{'transform rotate-180': open}" class="fas fa-chevron-down transition-transform duration-200 text-sm"></i>
                    </button>
                    <div x-show="open" @click.outside="open = false" class="ml-6 mt-1 bg-[#504538] rounded-lg space-y-1 py-1">
                        <a href="{{route('ulasan')}}" class="block px-4 py-2 text-sm text-gray-200 hover:bg-putih hover:text-cokelat rounded-md">Semua Data</a>
                    </div>
                </div>
            </div>
        </nav>
    </aside>
</div>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('-translate-x-full');
    }
</script>