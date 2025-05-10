@extends('admin.layouts.app')

@section('content')
    <!-- Main Content -->
    <div class="flex-1 overflow-auto">
        @php
            $profileData = Auth::guard('admin')->user();
        @endphp
        <div class="container mx-auto px-32 py-8">
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-6">PROFIL ADMIN</h2>

                <form action="{{ route('admin.password.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Profile Picture Section -->

                    <!-- Form Fields -->
                    <div class="grid grid-cols-1 md:grid-cols-1 gap-6 mb-6 px-8">
                        <div>
                            <label class="block text-gray-700 mb-2">Password Lama</label>
                            <input type="password" name="old_password" id="old_password" @error('old_password') is invalid
                            @enderror
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500">
                                @error('old_password')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">Password Baru</label>
                            <input type="password" name="new_password" id="new_password" @error('new_password') is invalid
                            @enderror
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500">
                                @error('new_password')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">Konfirmasi Password Baru</label>
                            <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500">
                                
                        </div>


                        <div class="flex justify-end space-x-4 mt-8">
                            <button type="submit"
                                class="px-6 py-2 bg-amber-600 text-white rounded-lg hover:bg-amber-700 transition">
                                Simpan
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
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