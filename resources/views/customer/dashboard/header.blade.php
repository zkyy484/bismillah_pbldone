@php
    $id = Auth::user()->id;
    $profileData = App\Models\User::find($id);

    $dataAdmin = Auth::guard('admin')->user();
    @endphp

<nav class="fixed w-full top-0 left-0 z-50 bg-coklat py-2.5 shadow-navbar transition-opacity duration-300">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center">
            <div class="flex items-center gap-4">
                <img src="{{ (!empty($dataAdmin->photo)) ? url('upload/admin_images/' . $dataAdmin->photo) : url('upload/rumah.jpg') }}" alt="Logo" class="w-11 h-11 object-cover rounded-full border-2 border-white">
                <a href="{{route('index')}}" class="text-white text-xl font-bold">Nazarch Studio</a>
            </div>

            <div class="hidden md:flex gap-12">
                <a href="{{route('index')}}" class="text-white font-medium hover:text-cream transition-colors">Home</a>
                <a href="" class="text-white font-medium hover:text-cream transition-colors">Categories</a>
                <a href="#" class="text-white font-medium hover:text-cream transition-colors">About</a>
                <a href="{{route('show.contact')}}" class="text-white font-medium hover:text-cream transition-colors">Contact</a>
            </div>

            <!-- Profile Dropdown -->
            <div class="relative flex items-center gap-4">
                <a href="#" class="text-white font-semibold hidden sm:inline">{{$profileData->name}}</a>
                <button id="dropdownButton" class="focus:outline-none">
                    <img src="{{(!empty($profileData->photo)) ? url('upload/user_images/'. $profileData->photo) : url('upload/no_image.jpg') }}" alt="Profile"
                        class="w-11 h-11 object-cover rounded-full border-2 border-white">
                </button>
                <ul id="dropdownMenu"
                    class="absolute right-0 top-14 bg-white shadow-lg rounded-lg text-sm hidden min-w-[140px] z-50">
                    <li><a class="block px-4 py-2 hover:bg-gray-100" href="{{route('index')}}">Halaman Utama</a></li>
                    {{-- <li><a class="block px-4 py-2 hover:bg-gray-100" href="#">Keranjang</a></li> --}}
                    <li><a class="block px-4 py-2 hover:bg-gray-100" href="{{ route('user.logout') }}">Log Out</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>