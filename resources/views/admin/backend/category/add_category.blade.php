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

            <form id="myForm" action="{{route('category.store')}}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf

                {{-- Nama Kategori --}}
                <div class="form-group mb-4">
                    <label for="nama_categori" class="block text-sm font-medium text-gray-700 mb-2">Nama Kategori</label>
                    <input type="text" name="nama_categori" id="nama_categori"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                        placeholder="Masukkan nama kategori">
                    @error('nama_categori')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Nama Deskripsi --}}
                <div class="form-group mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                    <input type="text" name="description" id="description"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                        placeholder="Masukkan deskripsi"
                        @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Nama Harga --}}
                <div class="form-group mb-4">
                    <label for="base_price" class="block text-sm font-medium text-gray-700 mb-2">Harga</label>
                    <input type="text" name="base_price" id="base_price"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                        placeholder="Masukkan nama kategori">
                        @error('base_price')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Foto --}}
                <div class="form-group mb-4">
                    <label for="photo" class="block text-sm font-medium text-gray-700 mb-2">Foto Kategori</label>
                    <input type="file" name="photo" id="photo"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                        accept="image/*">

                    {{-- Preview --}}
                    <div id="preview-container" class="mt-4 hidden">
                        <p class="text-sm text-gray-600 mb-2">Photo:</p>
                        <img id="preview-image" src="" alt="Preview"
                            class="w-40 h-auto rounded-full border-4 border-amber-800 shadow-md">
                    </div>

                    @error('photo')
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

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#myForm').validate({
                rules: {
                    nama_categori: {
                        required: true,
                    },
                    photo: {
                        required: true,
                        extension: "jpg|jpeg|png|gif"
                    }
                },
                messages: {
                    nama_categori: {
                        required: 'Please Enter Category Name',
                    },
                    photo: {
                        required: 'Please upload a photo',
                        extension: 'Only image files are allowed (jpg, jpeg, png, gif)'
                    }
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('text-red-600 text-sm mt-1');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
    <script>
        // Preview gambar saat dipilih
        $('#photo').on('change', function () {
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

    <script type="text/javascript">
        $(document).ready(function () {
            $('#myForm').validate({
                rules: {
                    nama_category: {
                        required: true,
                    },

                },
                messages: {
                    nama_category: {
                        required: 'Tolong isi kategori',
                    },


                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });

    </script>

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