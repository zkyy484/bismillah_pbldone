<aside class="w-full lg:w-64 bg-white rounded-lg shadow-md p-6 h-fit">
    <div class="flex flex-col items-center pb-6 border-b border-gray-200 mb-6">
        <img src="{{(!empty($profileData->photo)) ? url('upload/user_images/'. $profileData->photo) : url('upload/no_image.jpg') }}" alt="Profile Picture" class="w-24 h-24 rounded-full border-4 border-coklat object-cover mb-4">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">{{$profileData->name}}</h3>

        <a href="{{route('dashboard')}}" class="bg-coklat text-white px-4 py-2 rounded hover:bg-abu transition">
            Edit Profile
        </a>
    </div>
{{-- 
    @php
    $id = Auth::user()->id;
    $profileData = App\Models\User::find($id);
    @endphp --}}
    
    <ul class="space-y-2">
        <li>
            <a href="{{route('dashboard')}}" class="{{Route::currentRouteName() === 'dashboard' ? 'active' : ''}} flex items-center px-4 py-3 rounded bg-gray-100 text-coklat">
                <i class="fas fa-user w-5 mr-3 text-center"></i>
                Profile
            </a>
        </li>
        <li>
            <a href="{{route('change.password')}}" class="{{Route::currentRouteName() === 'change.password' ? 'active' : ''}} flex items-center px-4 py-3 rounded text-gray-600 hover:bg-gray-100 hover:text-coklat transition">
                <i class="fas fa-lock w-5 mr-3 text-center"></i>
                Change Password
            </a>
        </li>
        <li>
            <a href="{{route('user.history.order')}}" class="{{Route::currentRouteName() === 'user.history.order' ? 'active' : ''}} flex items-center px-4 py-3 rounded text-gray-600 hover:bg-gray-100 hover:text-coklat transition">
                <i class="fas fa-shopping-cart w-5 mr-3 text-center"></i>
                Pesanan
            </a>
        </li>
        <li>
            <a href="{{route('user.history.transaksi')}}" class="{{Route::currentRouteName() === 'user.history.transaksi' ? 'active' : ''}} flex items-center px-4 py-3 rounded text-gray-600 hover:bg-gray-100 hover:text-coklat transition">
                <i class="fas fa-history w-5 mr-3 text-center"></i>
                Riwayat Transaksi
            </a>
        </li>
        <li>
            <a href="{{route('user.logout')}}" class="flex items-center px-4 py-3 rounded text-gray-600 hover:bg-gray-100 hover:text-coklat transition">
                <i class="fas fa-sign-out-alt w-5 mr-3 text-center"></i>
                Log Out
            </a>
        </li>
    </ul>
</aside>