<header class="bg-white shadow">
    <div class="flex items-center justify-between px-6 py-4">
        @php
            $profileData = Auth::guard('admin')->user();
        @endphp
        <div class="flex items-center">
            <h1 class="text-xl font-semibold text-gray-800">{{$profileData->name}}</h1>
        </div>
        <div class="flex items-center space-x-4">
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <i class="fas fa-search text-gray-400"></i>
                </span>
                <input
                    class="pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    type="text" placeholder="Search...">
            </div>
            <div class="relative">
                <i class="fas fa-bell text-gray-600 text-xl"></i>
                <span class="absolute top-0 right-0 h-2 w-2 rounded-full bg-red-500"></span>
            </div>
            <div class="relative">
                <button onclick="toggleDropdown()" class="flex items-center focus:outline-none">
                    <img class="h-8 w-8 rounded-full object-cover"
                        src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/rumah.jpg')}}"
                        alt="Profile">
                    <span class="ml-2 text-gray-700"></span>
                    <i class="fas fa-chevron-down ml-2 text-gray-500"></i>
                </button>
                <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-50">
                    <a href="{{route('admin.profile')}}"
                        class="flex items-center px-4 py-2 text-gray-800 hover:bg-gray-100">
                        <i class="fas fa-user-cog mr-2"></i> Edit Profile
                    </a>
                    <a href="{{route('admin.change.password')}}"
                        class="flex items-center px-4 py-2 text-gray-800 hover:bg-gray-100">
                        <i class="fas fa-lock mr-2"></i> Change Password
                    </a>
                    <a href="{{route('admin.logout')}}"
                        class="flex items-center px-4 py-2 text-gray-800 hover:bg-gray-100">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    function toggleDropdown() {
        var menu = document.getElementById('dropdownMenu');
        menu.classList.toggle('hidden');
    }
    window.addEventListener('click', function (e) {
        var menu = document.getElementById('dropdownMenu');
        var button = e.target.closest('button');
        if (!button && !menu.contains(e.target)) {
            menu.classList.add('hidden');
        }
    });
</script>