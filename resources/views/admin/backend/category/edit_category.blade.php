@extends('admin.layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">KATEGORI</h1>
            <a href="{{route('all.category')}}" class="text-gray-600 hover:text-gray-900">
                <i class="fas fa-arrow-left mr-1"></i> Kembali
            </a>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold mb-4 text-gray-800">EDIT DATA KATEGORI</h2>

            <form id="myForm" action="{{route('update.category')}}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf

                <input class="hidden" type="text" name="id" value="{{$category->id}}">

                {{-- Nama Kategori --}}
                <div class="form-group mb-4">
                    <label for="nama_categori" class="block text-sm font-medium text-gray-700 mb-2">Nama Kategori</label>
                    <input type="text" name="nama_categori" id="nama_categori"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                        placeholder="Masukkan nama kategori" value="{{ old('nama_categori', $category->nama_categori) }}">
                    @error('nama_categori')
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Deskripsi --}}
                <div class="form-group mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                    <textarea name="description" id="description" rows="3"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                        placeholder="Masukkan deskripsi kategori">{{ old('description', $category->description) }}</textarea>
                    @error('description')
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Ukuran Tanah (Panjang x Lebar) --}}
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="panjang_tanah" class="block text-sm font-medium text-gray-700 mb-2">Panjang Tanah (m)</label>
                        <input type="number" name="panjang_tanah" id="panjang_tanah" step="0.01"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                            placeholder="Masukkan panjang tanah" value="{{ old('panjang_tanah', $category->panjang_tanah) }}">
                        @error('panjang_tanah')
                            <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="lebar_tanah" class="block text-sm font-medium text-gray-700 mb-2">Lebar Tanah (m)</label>
                        <input type="number" name="lebar_tanah" id="lebar_tanah" step="0.01"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                            placeholder="Masukkan lebar tanah" value="{{ old('lebar_tanah', $category->lebar_tanah) }}">
                        @error('lebar_tanah')
                            <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
                 {{-- Luas Lahan (otomatis hasil perkalian) --}}
                <div class="form-group mb-4">
                    <label for="luas_lahan" class="block text-sm font-medium text-gray-700 mb-2">Luas Lahan (m²)</label>
                    <input type="number" name="luas_lahan" id="luas_lahan" readonly step="0.01"
                        class="bg-gray-100 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none"
                        value="{{ old('luas_lahan', $category->luas_lahan) }}">
                </div>

                 {{-- Luas Bangunan --}}
                <div class="form-group mb-4">
                    <label for="luas_bangunan" class="block text-sm font-medium text-gray-700 mb-2">Luas Bangunan (m²)</label>
                    <input type="number" name="luas_bangunan" id="luas_bangunan" step="0.01"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                        placeholder="Masukkan luas bangunan" value="{{ old('luas_bangunan', $category->luas_bangunan) }}">
                    @error('luas_bangunan')
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                
                {{-- Lantai, Kamar Tidur, Kamar Mandi --}}
                <div class="grid grid-cols-3 gap-4 mb-4">
                    <div>
                        <label for="lantai" class="block text-sm font-medium text-gray-700 mb-2">Jumlah Lantai</label>
                        <input type="number" name="lantai" id="lantai" min="1"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none"
                            value="{{ old('lantai', $category->lantai ?? 1) }}">
                        @error('lantai')
                            <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="kamar_tidur" class="block text-sm font-medium text-gray-700 mb-2">Kamar Tidur</label>
                        <input type="number" name="kamar_tidur" id="kamar_tidur" min="0"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none"
                            value="{{ old('kamar_tidur', $category->kamar_tidur ?? 0) }}">
                        @error('kamar_tidur')
                            <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="kamar_mandi" class="block text-sm font-medium text-gray-700 mb-2">Kamar Mandi</label>
                        <input type="number" name="kamar_mandi" id="kamar_mandi" min="0"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none"
                            value="{{ old('kamar_mandi', $category->kamar_mandi ?? 0) }}">
                        @error('kamar_mandi')
                            <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Harga --}}
                <div class="form-group mb-4">
                    <label for="base_price" class="block text-sm font-medium text-gray-700 mb-2">Harga</label>
                    <input type="number" name="base_price" id="base_price" step="0.01"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                        placeholder="Masukkan Harga" value="{{ old('base_price', $category->base_price) }}">
                    @error('base_price')
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Foto --}}
                <div class="form-group mb-4">
                    <label for="photo" class="block text-sm font-medium text-gray-700 mb-2">Foto Kategori</label>
                    <input type="file" name="photo" id="photo"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                        accept="image/*">
                    @error('photo')
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                    @enderror

                    {{-- Preview --}}
                    <div id="preview-container" class="mt-4">
                        <p class="text-sm text-gray-600 mb-2">Preview Photo:</p>
                        @if($category->photo)
                            <img id="preview-image" src="{{ asset($category->photo) }}" alt="Preview"
                                class="w-40 h-40 object-cover rounded-lg border-4 border-amber-800 shadow-md">
                        @else
                            <img id="preview-image" src="" alt="Preview" class="w-40 h-40 object-cover rounded-lg border-4 border-amber-800 shadow-md hidden">
                            <div id="no-image" class="w-40 h-40 bg-gray-200 rounded-lg border-4 border-gray-300 flex items-center justify-center">
                                <span class="text-gray-500">No Image</span>
                            </div>
                        @endif
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            // Validasi form
            $('#myForm').validate({
                rules: {
                    nama_categori: {
                        required: true,
                    },
                    description: {
                        required: true,
                    },
                    base_price: {
                        required: true,
                        number: true,
                        min: 0
                    },
                    panjang_tanah: {
                        number: true,
                        min: 0
                    },
                    lebar_tanah: {
                        number: true,
                        min: 0
                    },
                    luas_bangunan: {
                        number: true,
                        min: 0
                    }
                },
                messages: {
                    nama_categori: {
                        required: 'Nama kategori wajib diisi',
                    },
                    description: {
                        required: 'Deskripsi wajib diisi',
                    },
                    base_price: {
                        required: 'Harga wajib diisi',
                        number: 'Harga harus berupa angka',
                        min: 'Harga tidak boleh negatif'
                    }
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('text-red-600 text-sm mt-1');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('border-red-500');
                    $(element).removeClass('border-gray-300');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('border-red-500');
                    $(element).addClass('border-gray-300');
                },
            });

            // Hitung luas lahan otomatis
            function hitungLuasLahan() {
                const panjang = parseFloat($('#panjang_tanah').val()) || 0;
                const lebar = parseFloat($('#lebar_tanah').val()) || 0;
                const luas = panjang * lebar;
                $('#luas_lahan').val(luas.toFixed(2));
            }

            $('#panjang_tanah, #lebar_tanah').on('input', hitungLuasLahan);

            // Inisialisasi luas lahan saat halaman dimuat
            hitungLuasLahan();

            // Preview gambar saat dipilih
            $('#photo').on('change', function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#preview-image').attr('src', e.target.result);
                        $('#preview-image').removeClass('hidden');
                        $('#no-image').addClass('hidden');
                    }
                    reader.readAsDataURL(file);
                } else {
                    $('#preview-image').addClass('hidden');
                    $('#no-image').removeClass('hidden');
                }
            });
        });

        // Toastr notification
        // @if(Session::has('message'))
        //     toastr.options = {
        //         "closeButton": true,
        //         "progressBar": true,
        //         "positionClass": "toast-top-right",
        //         "timeOut": 5000
        //     }
        //     toastr["{{ Session::get('alert-type', 'info') }}"]("{{ Session::get('message') }}");
        // @endif

        // @if($errors->any())
        //     toastr.options = {
        //         "closeButton": true,
        //         "progressBar": true,
        //         "positionClass": "toast-top-right",
        //         "timeOut": 5000
        //     }
        //     toastr.error("Terdapat kesalahan dalam pengisian form. Silakan periksa kembali.");
        // @endif
    </script>
@endsection