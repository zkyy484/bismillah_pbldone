@extends('admin.layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-xl font-bold mb-4">Tambah Model Rumah</h1>
        <form action="{{ route('admin.model_rumah.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block">Nama Model</label>
                <input type="text" name="nama_model" class="border p-2 w-full" required>
            </div>

            <div class="form-group mb-4">
                <label for="image_path" class="block text-sm font-medium text-gray-700 mb-2">Foto Produk</label>
                <input type="file" name="image_path" id="image_path"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                    accept="image/*">

                {{-- Preview --}}
                <div id="preview-container" class="mt-4 hidden">
                    <p class="text-sm text-gray-600 mb-2">Photo:</p>
                    <img id="preview-image" src="" alt="Preview"
                        class="w-40 h-auto rounded-full border-4 border-amber-800 shadow-md">
                </div>

                @error('image_path')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        // Preview gambar saat dipilih
        $('#image_path').on('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    $('#preview-image').attr('src', e.target.result);
                    $('#preview-container').removeClass('hidden');
                }
                reader.readAsDataURL(file);
            } else {
                $('#preview-container').addClass('hidden');
                $('#preview-image').attr('src', '');
            }
        });
    </script>
@endsection