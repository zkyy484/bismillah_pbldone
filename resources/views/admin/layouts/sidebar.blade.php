<aside class="w-64 bg-cokelat text-putih h-full">
    <!-- Logo -->
    <div class="p-5 border-b border-abu/20 flex items-center justify-center">
        <h1 class="text-2xl font-bold tracking-wide">Nazarch<span class="text-kuning">Studio</span></h1>
    </div>

    <!-- Navigation -->
    <nav class="mt-6 px-3 space-y-1">
        <a href="{{ route('admin.dashboard') }}"
            class="flex items-center px-4 py-3 group transition-all duration-200 rounded-lg hover:bg-putih hover:bg-opacity-90 hover:scale-[1.02]
            {{ request()->routeIs('admin.dashboard') ? 'bg-putih text-cokelat font-medium' : 'text-putih' }}">
            <i class="fas fa-tachometer-alt mr-3 text-lg {{ request()->routeIs('admin.dashboard') ? 'text-cokelat' : 'group-hover:text-cokelat' }}"></i>
            <span class="{{ request()->routeIs('admin.dashboard') ? 'text-cokelat' : 'group-hover:text-cokelat' }}">Dashboard</span>
        </a>

        <a href="{{ route('all.category') }}"
            class="flex items-center px-4 py-3 group transition-all duration-200 rounded-lg hover:bg-putih hover:bg-opacity-90 hover:scale-[1.02]
            {{ request()->routeIs('all.category') ? 'bg-putih text-cokelat font-medium' : 'text-putih' }}">
            <i class="fas fa-drafting-compass mr-3 text-lg {{ request()->routeIs('all.category') ? 'text-cokelat' : 'group-hover:text-cokelat' }}"></i>
            <span class="{{ request()->routeIs('all.category') ? 'text-cokelat' : 'group-hover:text-cokelat' }}">Desain Rumah</span>
        </a>

        <a href="{{route('admin.model_rumah.index')}}"
            class="flex items-center px-4 py-3 group transition-all duration-200 rounded-lg hover:bg-putih hover:bg-opacity-90 hover:scale-[1.02]
            {{ request()->routeIs('admin.model_rumah.index') ? 'bg-putih text-cokelat font-medium' : 'text-putih' }}">
            <i class="fas fa-images mr-3 text-lg {{ request()->routeIs('admin.model_rumah.index') ? 'text-cokelat' : 'group-hover:text-cokelat' }}"></i>
            <span class="{{ request()->routeIs('admin.model_rumah.index') ? 'text-cokelat' : 'group-hover:text-cokelat' }}">Model Rumah</span>
        </a>

        <a href="{{route('all.catimage')}}"
            class="flex items-center px-4 py-3 group transition-all duration-200 rounded-lg hover:bg-putih hover:bg-opacity-90 hover:scale-[1.02]
            {{ request()->routeIs('all.catimage') ? 'bg-putih text-cokelat font-medium' : 'text-putih' }}">
            <i class="fas fa-images mr-3 text-lg {{ request()->routeIs('all.catimage') ? 'text-cokelat' : 'group-hover:text-cokelat' }}"></i>
            <span class="{{ request()->routeIs('all.catimage') ? 'text-cokelat' : 'group-hover:text-cokelat' }}">Foto Desain Rumah</span>
        </a>

        <a href="{{route('all.order')}}"
            class="flex items-center px-4 py-3 group transition-all duration-200 rounded-lg hover:bg-putih hover:bg-opacity-90 hover:scale-[1.02]
            {{ request()->routeIs('all.order') ? 'bg-putih text-cokelat font-medium' : 'text-putih' }}">
            <i class="fas fa-file-alt mr-3 text-lg {{ request()->routeIs('all.order') ? 'text-cokelat' : 'group-hover:text-cokelat' }}"></i>
            <span class="{{ request()->routeIs('all.order') ? 'text-cokelat' : 'group-hover:text-cokelat' }}">Pesanan</span>
        </a>

        <a href="{{route('transaksi')}}"
            class="flex items-center px-4 py-3 group transition-all duration-200 rounded-lg hover:bg-putih hover:bg-opacity-90 hover:scale-[1.02]
            {{ request()->routeIs('transaksi') ? 'bg-putih text-cokelat font-medium' : 'text-putih' }}">
            <i class="fas fa-credit-card mr-3 text-lg {{ request()->routeIs('transaksi') ? 'text-cokelat' : 'group-hover:text-cokelat' }}"></i>
            <span class="{{ request()->routeIs('transaksi') ? 'text-cokelat' : 'group-hover:text-cokelat' }}">Transaksi</span>
        </a>

        <a href="{{route('ulasan')}}"
            class="flex items-center px-4 py-3 group transition-all duration-200 rounded-lg hover:bg-putih hover:bg-opacity-90 hover:scale-[1.02]
            {{ request()->routeIs('ulasan') ? 'bg-putih text-cokelat font-medium' : 'text-putih' }}">
            <i class="fas fa-star mr-3 text-lg {{ request()->routeIs('ulasan') ? 'text-cokelat' : 'group-hover:text-cokelat' }}"></i>
            <span class="{{ request()->routeIs('ulasan') ? 'text-cokelat' : 'group-hover:text-cokelat' }}">Penilaian</span>
        </a>
    </nav>

    <!-- Divider -->
    <div class="border-t border-abu/20 my-4"></div>

    <!-- Bottom: Pengaturan Akun -->
    <div class="absolute bottom-0 left-0 right-0 p-4">
        <a href="{{ route('admin.profile') }}" class="flex items-center px-4 py-3 group transition-all duration-200 rounded-lg hover:bg-putih hover:bg-opacity-90 hover:scale-[1.02]
            {{ request()->routeIs('admin.profile') ? 'bg-putih text-cokelat font-medium' : 'text-putih' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-coklat text-lg {{ request()->routeIs('admin.profile') ? 'text-cokelat' : 'group-hover:text-cokelat' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11.25 2.25c.414 0 .75.336.75.75V4.05a7.5 7.5 0 013.975 1.725l1.025-.6a.75.75 0 01.95.275l1.5 2.598a.75.75 0 01-.275.95l-.9.525a7.5 7.5 0 010 3.45l.9.525a.75.75 0 01.275.95l-1.5 2.598a.75.75 0 01-.95.275l-1.025-.6a7.5 7.5 0 01-3.975 1.725v1.05a.75.75 0 01-1.5 0v-1.05a7.5 7.5 0 01-3.975-1.725l-1.025.6a.75.75 0 01-.95-.275l-1.5-2.598a.75.75 0 01.275-.95l.9-.525a7.5 7.5 0 010-3.45l-.9-.525a.75.75 0 01-.275-.95l1.5-2.598a.75.75 0 01.95-.275l1.025.6A7.5 7.5 0 0110.5 4.05V3a.75.75 0 01.75-.75zM12 9a3 3 0 100 6 3 3 0 000-6z" />
            </svg>
            <span class="{{ request()->routeIs('admin.profile') ? 'text-cokelat' : 'group-hover:text-cokelat' }}">Pengaturan Akun</span>
        </a>
    </div>
</aside>
