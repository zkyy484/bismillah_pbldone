<aside class="w-full lg:w-64 bg-white rounded-lg shadow-md p-6 h-fit">
    <div class="flex flex-col items-center pb-6 border-b border-gray-200 mb-6">
        <img src="https://via.placeholder.com/100" alt="Profile Picture" class="w-24 h-24 rounded-full border-4 border-primary object-cover mb-4">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Nama User</h3>
        <button class="bg-primary text-white px-4 py-2 rounded hover:bg-primaryHover transition">
            Edit Profile
        </button>
    </div>

    @php
    $id = Auth::user()->id;
    $profileData = App\Models\User::find($id);
    @endphp
    
    <ul class="space-y-2">
        <li>
            <a href="#" class="{{Route::currentRouteName() === 'dashboard' ? 'active' : ''}} flex items-center px-4 py-3 rounded bg-gray-100 text-primary">
                <i class="fas fa-user w-5 mr-3 text-center"></i>
                Profil Saya
            </a>
        </li>
        <li>
            <a href="{{route('change.password')}}" class="{{Route::currentRouteName() === 'dashboard' ? 'active' : ''}} flex items-center px-4 py-3 rounded text-gray-600 hover:bg-gray-100 hover:text-primary transition">
                <i class="fas fa-lock w-5 mr-3 text-center"></i>
                Change Password
            </a>
        </li>
        <li>
            <a href="#" class="{{Route::currentRouteName() === 'dashboard' ? 'active' : ''}} flex items-center px-4 py-3 rounded text-gray-600 hover:bg-gray-100 hover:text-primary transition">
                <i class="fas fa-shopping-cart w-5 mr-3 text-center"></i>
                Pesanan
            </a>
        </li>
        <li>
            <a href="#" class="{{Route::currentRouteName() === 'dashboard' ? 'active' : ''}} flex items-center px-4 py-3 rounded text-gray-600 hover:bg-gray-100 hover:text-primary transition">
                <i class="fas fa-history w-5 mr-3 text-center"></i>
                Riwayat Pesanan
            </a>
        </li>
        <li>
            <a href="#" class="flex items-center px-4 py-3 rounded text-gray-600 hover:bg-gray-100 hover:text-primary transition">
                <i class="fas fa-box w-5 mr-3 text-center"></i>
                Orderan
            </a>
        </li>
        <li>
            <a href="#" class="flex items-center px-4 py-3 rounded text-gray-600 hover:bg-gray-100 hover:text-primary transition">
                <i class="fas fa-star w-5 mr-3 text-center"></i>
                Ulasan
            </a>
        </li>
        <li>
            <a href="#" class="flex items-center px-4 py-3 rounded text-gray-600 hover:bg-gray-100 hover:text-primary transition">
                <i class="fas fa-sign-out-alt w-5 mr-3 text-center"></i>
                Keluar
            </a>
        </li>
    </ul>
</aside>