@extends('admin.layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-xl font-bold mb-4">Edit Model Rumah</h1>

        <form action="{{ route('admin.update.model_rumah', $modelRumah->id) }}" 
              method="POST" 
              enctype="multipart/form-data"  {{-- penting untuk upload file --}}
              class="space-y-4">
            @csrf
            @method('POST')

            <div class="form-group mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Model</label>
                    <input type="text" 
                           value="{{ $modelRumah->nama_model }}" 
                           name="nama_model" 
                           class="border p-2 w-full mb-4" 
                           required>
                </div>

                {{-- Input file --}}
                <label for="image_path" class="block text-sm font-medium text-gray-700 mb-2">Foto Produk</label>
                <input type="file" name="image_path" id="image_path"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                    accept="image/*">

                {{-- Preview (foto lama atau default) --}}
                <div id="preview-container" class="mt-4">
                    <p class="text-sm text-gray-600 mb-2">Preview Foto:</p>
                    <img id="preview-image"
                         src="{{ $modelRumah->image_path ? asset($modelRumah->image_path) : 'https://via.placeholder.com/150' }}"
                         alt="Preview"
                         class="w-40 h-auto rounded-lg border-2 border-gray-300 shadow-md">
                </div>

                @error('image_path')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <button class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        // Preview foto baru saat dipilih
        $('#image_path').on('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    $('#preview-image').attr('src', e.target.result);
                    $('#preview-container').removeClass('hidden');
                }
                reader.readAsDataURL(file);
            }
        });
    </script>

     <script>
        @if(Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>
@endsection
