@extends('admin.layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">MODEL</h1>
            <a href="" class="text-gray-600 hover:text-gray-900">
                <i class="fas fa-arrow-left mr-1"></i> Kembali
            </a>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold mb-4 text-gray-800">TAMBAH DATA MODEL</h2>

            <form id="myForm" action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf

                {{-- Nama Kategori --}}
                <div class="form-group mb-4">
                    <label for="nama_categori" class="block text-sm font-medium text-gray-700 mb-2">Nama Model</label>
                    <input type="text" name="nama_categori" id="nama_categori"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                        placeholder="Masukkan nama kategori">
                    @error('nama_categori')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Pilih Model Rumah --}}
                <div class="form-group mb-4">
                    <label for="model_rumah_id" class="block text-sm font-medium text-gray-700 mb-2">
                        Kategori
                    </label>
                    <select name="model_rumah_id" id="model_rumah_id"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($modelRumah as $model)
                            <option value="{{ $model->id }}">{{ $model->nama_model }}</option>
                        @endforeach
                    </select>
                    @error('model_rumah_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Deskripsi --}}
                <div class="form-group mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                    <input type="text" name="description" id="description"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                        placeholder="Masukkan deskripsi">
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Harga --}}
                <div class="form-group mb-4">
                    <label for="base_price" class="block text-sm font-medium text-gray-700 mb-2">Harga</label>
                    <input type="text" name="base_price" id="base_price"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                        placeholder="Masukkan harga kategori">
                    @error('base_price')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Ukuran Tanah (Panjang x Lebar) --}}
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="panjang_tanah" class="block text-sm font-medium text-gray-700 mb-2">Panjang Tanah
                            (m)</label>
                        <input type="number" name="panjang_tanah" id="panjang_tanah"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                            placeholder="Masukkan panjang tanah">
                    </div>
                    <div>
                        <label for="lebar_tanah" class="block text-sm font-medium text-gray-700 mb-2">Lebar Tanah
                            (m)</label>
                        <input type="number" name="lebar_tanah" id="lebar_tanah"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                            placeholder="Masukkan lebar tanah">
                    </div>
                </div>

                {{-- Luas Lahan (otomatis hasil perkalian) --}}
                <div class="form-group mb-4">
                    <label for="luas_lahan" class="block text-sm font-medium text-gray-700 mb-2">Luas Lahan (m²)</label>
                    <input type="number" name="luas_lahan" id="luas_lahan" readonly
                        class="bg-gray-100 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none">
                </div>

                {{-- Luas Bangunan --}}
                <div class="form-group mb-4">
                    <label for="luas_bangunan" class="block text-sm font-medium text-gray-700 mb-2">Luas Bangunan
                        (m²)</label>
                    <input type="number" name="luas_bangunan" id="luas_bangunan"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                        placeholder="Masukkan luas bangunan">
                </div>

                {{-- Lantai, Kamar Tidur, Kamar Mandi --}}
                <div class="grid grid-cols-3 gap-4 mb-4">
                    <div>
                        <label for="lantai" class="block text-sm font-medium text-gray-700 mb-2">Jumlah Lantai</label>
                        <input type="number" name="lantai" id="lantai"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none" value="1">
                    </div>
                    <div>
                        <label for="kamar_tidur" class="block text-sm font-medium text-gray-700 mb-2">Kamar Tidur</label>
                        <input type="number" name="kamar_tidur" id="kamar_tidur"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none" value="0">
                    </div>
                    <div>
                        <label for="kamar_mandi" class="block text-sm font-medium text-gray-700 mb-2">Kamar Mandi</label>
                        <input type="number" name="kamar_mandi" id="kamar_mandi"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none" value="0">
                    </div>
                </div>

                {{-- Foto --}}
                <div class="form-group mb-4">
                    <label for="photo" class="block text-sm font-medium text-gray-700 mb-2">Foto Kategori</label>
                    <input type="file" name="photo" id="photo"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                        accept="image/*">

                    {{-- Preview --}}
                    <div id="preview-container" class="mt-4 hidden">
                        <p class="text-sm text-gray-600 mb-2">Preview:</p>
                        <img id="preview-image" src="" alt="Preview"
                            class="w-40 h-auto rounded-md border border-amber-800 shadow-md">
                    </div>
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

@section('scripts')
    {{-- Hitung luas lahan otomatis --}}
    <script>
        function hitungLuas() {
            let panjang = parseFloat(document.getElementById("panjang_tanah").value) || 0;
            let lebar = parseFloat(document.getElementById("lebar_tanah").value) || 0;
            document.getElementById("luas_lahan").value = panjang * lebar;
        }

        document.getElementById("panjang_tanah").addEventListener("input", hitungLuas);
        document.getElementById("lebar_tanah").addEventListener("input", hitungLuas);

        // Preview gambar
        document.getElementById('photo').addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('preview-image').src = e.target.result;
                    document.getElementById('preview-container').classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            } else {
                document.getElementById('preview-container').classList.add('hidden');
                document.getElementById('preview-image').src = '';
            }
        });
    </script>
@endsection