@extends('admin.layouts.app')

@section('content')
<div class="flex-1 overflow-auto">
    @php
        $profileData = Auth::guard('admin')->user();
    @endphp

    <div class="container mx-auto px-4 py-10">
        <div class="bg-white rounded-2xl shadow-xl p-8 max-w-4xl mx-auto">
            <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center">PROFILE ADMIN</h2>

            <form action="{{ route('admin.profile.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Foto Profil -->
                <div class="flex flex-col items-center mb-10">
                    <div class="relative">
                        <img src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/' . $profileData->photo) : url('upload/rumah.jpg') }}"
                            id="showImage"
                            alt="Profile Photo"
                            class="w-36 h-36 rounded-full object-cover border-4 border-gray-300 shadow-md transition-transform duration-300 hover:scale-105">

                        <label for="profile-photo"
                            class="absolute bottom-2 right-2 bg-cokelat text-white p-2 rounded-full cursor-pointer hover:bg-amber-700 shadow-md">
                            <i class="fas fa-camera text-white"></i>
                            <input id="profile-photo" type="file" accept="image/*" class="hidden" name="photo"
                                onchange="previewProfileImage(this)">
                        </label>
                    </div>
                    <p class="text-sm text-gray-500 mt-3">Klik ikon kamera untuk mengganti foto profil</p>
                </div>

                <!-- Form Input -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Nama</label>
                        <input type="text" name="name" id="name"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500"
                            value="{{ old('name', $profileData->name) }}">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Email</label>
                        <input type="email" name="email" id="email"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500"
                            value="{{ old('email', $profileData->email) }}">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">No Telepon</label>
                        <input type="text" name="phone" id="phone"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500"
                            value="{{ old('phone', $profileData->phone) }}">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Alamat</label>
                        <input type="text" name="addres" id="addres"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500"
                            value="{{ old('addres', $profileData->addres) }}">
                    </div>
                </div>

                <!-- Tombol Simpan -->
                <div class="flex justify-end mt-10">
                    <button type="submit"
                        class="px-6 py-2 bg-cokelat text-white font-semibold rounded-lg hover:bg-amber-700 transition border-2 hover:border-cokelat hover:text-cokelat hover:bg-putih">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Preview Foto -->
<script>
    function previewProfileImage(input) {
        const preview = document.getElementById('showImage');
        const file = input.files[0];
        const reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "https://via.placeholder.com/150";
        }
    }
</script>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    @if(Session::has('message'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr["{{ Session::get('alert-type', 'info') }}"]("{{ Session::get('message') }}");
    @endif
</script>
@endsection
