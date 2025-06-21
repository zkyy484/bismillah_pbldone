<!-- Tombol hamburger -->
<button id="sidebarToggle" 
    class="lg:hidden fixed top-16 left-0 z-50 bg-coklat text-putih p-2 rounded-md focus:outline-none">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" 
        viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
            d="M4 6h16M4 12h16M4 18h16" />
    </svg>
</button>

<!-- Sidebar -->
<aside id="sidebar" 
    class="fixed top-0 left-0 h-full bg-coklat rounded-lg shadow-md p-6 w-64
           transform -translate-x-full transition-transform duration-300 ease-in-out
           lg:relative lg:translate-x-0 lg:block z-40">

    <!-- Container foto profile diberi margin top supaya turun -->
    <div class="flex flex-col items-center pt-12 pb-6 border-b border-putih mb-6">
        <img src="{{(!empty($profileData->photo)) ? url('upload/user_images/'. $profileData->photo) : url('upload/no_image.jpg') }}" 
             alt="Profile Picture" 
             class="w-24 h-24 rounded-full border-4 border-putih object-cover mb-4">
        <h3 class="text-lg font-semibold text-putih mb-4">{{$profileData->name}}</h3>

        <a href="{{ route('dashboard') }}" 
           class="bg-coklat text-putih px-4 py-2 rounded hover:bg-putih hover:text-coklat border-putih border-2 transition">
            Edit Profile
        </a>
    </div>
    
    <ul class="space-y-2">
        <li>
            <a href="{{route('dashboard')}}" 
               class="flex items-center px-4 py-3 rounded transition
               {{ Route::currentRouteName() === 'dashboard' ? 'bg-putih text-coklat font-semibold' : 'text-putih hover:bg-cream hover:text-coklat' }}">
                <i class="fas fa-user w-5 mr-3 text-center"></i>
                Profile
            </a>
        </li>
        <li>
            <a href="{{route('change.password')}}" 
               class="flex items-center px-4 py-3 rounded transition
               {{ Route::currentRouteName() === 'change.password' ? 'bg-putih text-coklat font-semibold' : 'text-putih hover:bg-cream hover:text-coklat' }}">
                <i class="fas fa-lock w-5 mr-3 text-center"></i>
                Change Password
            </a>
        </li>
        <li>
            <a href="{{route('user.history.order')}}" 
               class="flex items-center px-4 py-3 rounded transition
               {{ Route::currentRouteName() === 'user.history.order' ? 'bg-putih text-coklat font-semibold' : 'text-putih hover:bg-cream hover:text-coklat' }}">
                <i class="fas fa-shopping-cart w-5 mr-3 text-center"></i>
                Pesanan
            </a>
        </li>
        <li>
            <a href="{{route('user.history.transaksi')}}" 
               class="flex items-center px-4 py-3 rounded transition
               {{ Route::currentRouteName() === 'user.history.transaksi' ? 'bg-putih text-coklat font-semibold' : 'text-putih hover:bg-cream hover:text-coklat' }}">
                <i class="fas fa-history w-5 mr-3 text-center"></i>
                Riwayat Transaksi
            </a>
        </li>
        <li>
            <a href="{{route('user.logout')}}" 
               class="flex items-center px-4 py-3 rounded text-putih hover:bg-cream hover:text-coklat transition">
                <i class="fas fa-sign-out-alt w-5 mr-3 text-center"></i>
                Log Out
            </a>
        </li>
    </ul>
</aside>

<!-- Overlay -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-30 lg:hidden"></div>

<script>
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    const sidebarOverlay = document.getElementById('sidebarOverlay');

    function toggleSidebar() {
        sidebar.classList.toggle('-translate-x-full');
        sidebarOverlay.classList.toggle('hidden');
    }

    sidebarToggle.addEventListener('click', toggleSidebar);
    sidebarOverlay.addEventListener('click', toggleSidebar);
</script>
