@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">KATEGORI</h1>
        <a href="" class="text-gray-600 hover:text-gray-900">
            <i class="fas fa-arrow-left mr-1"></i> Kembali
        </a>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-semibold mb-4 text-gray-800">TAMBAH DATA KATEGORI</h2>
        
        <form id="myForm" action="" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nama_kategori" class="block text-sm font-medium text-gray-700 mb-2">Nama Kategori</label>
                <input type="text" name="nama_kategori" id="nama_kategori" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                       placeholder="Masukkan nama kategori" required>
                @error('nama_kategori')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" 
                        class="bg-amber-700 hover:bg-amber-800 text-white px-6 py-2 rounded-lg flex items-center">
                    <i class="fas fa-save mr-2"></i>
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection