@extends('admin.layouts.app')

@section('content')
    <!-- Main Content -->
    <div class="flex-1 overflow-auto">
        @php
            $profileData = Auth::guard('admin')->user();
        @endphp
        <div class="container mx-auto px-6 py-8">
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-6">PROFIL ADMIN</h2>

                <form action="{{ route('admin.profile.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Profile Picture Section -->
                    <div class="mb-8 flex flex-col items-center">
                        <div class="relative mb-4">
                            <img src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/' . $profileData->photo) : url('upload/rumah.jpg') }}"
                                id="showImage""   
                                alt=" Profile Photo" class="w-32 h-32 rounded-full object-cover border-4 border-gray-200">
                            <label for="profile-photo"
                                class="absolute bottom-0 right-0 bg-amber-600 text-white p-2 rounded-full cursor-pointer hover:bg-amber-700">
                                <i class="fas fa-camera text-black"></i>
                                <input id="profile-photo" type="file" accept="image/*" class="hidden" name="photo"
                                    onchange="previewProfileImage(this)">
                            </label>
                        </div>
                        <p class="text-gray-600 text-sm">Klik ikon kamera untuk mengubah foto profil</p>
                    </div>

                    <!-- Form Fields -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-gray-700 mb-2">Nama</label>
                            <input type="text" name="name" id="name"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500"
                                value="{{ old('name', $profileData->name) }}">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">Email</label>
                            <input type="email" name="email" id="email"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500"
                                value="{{ old('email', $profileData->email) }}">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">No Telepon</label>
                            <input type="text" name="phone" id="phone"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500"
                                value="{{ old('phone', $profileData->phone) }}">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">Address</label>
                            <input type="text" name="addres" id="addres"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500"
                                value="{{ old('addres', $profileData->addres) }}" </div>
                        </div>

                        <div class="flex justify-end space-x-4 mt-8">
                            <button type="submit"
                                class="px-6 py-2 bg-amber-600 text-white rounded-lg hover:bg-amber-700 transition">
                                Save
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>

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
