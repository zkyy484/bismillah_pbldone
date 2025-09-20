@extends('admin.layouts.app')

@section('content')
    <div class="container mx-auto px-6 pt-6 pb-6">

        <!-- Detail Rumah -->
        <section class="grid lg:grid-cols-2 gap-8">
            <!-- Gambar -->
            <div class="relative rounded-2xl overflow-hidden shadow-md">
                <div id="slider" class="flex transition-transform duration-500">
                    @if ($category->images->isNotEmpty())
                        @foreach ($category->images as $image)
                            <div class="relative w-full flex-shrink-0">
                                <!-- Gambar -->
                                <img src="{{ asset($image->image_path) }}" alt="{{ $category->nama_categori }}"
                                    class="w-full h-[400px] object-cover">

                                <!-- Tombol Hapus (pojok kanan atas) -->
                                <form action="{{ route('delete.catimage', $image->id) }}" method="POST"
                                    class="absolute top-2 right-2">
                                    @csrf
                                    <button type="submit" class="bg-red-600 text-white rounded-full p-1 hover:bg-red-700"
                                        onclick="return confirm('Yakin hapus foto ini?')">
                                        ✕
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    @else
                        <img src="https://via.placeholder.com/800x400?text=No+Image" alt="No Image"
                            class="w-full h-[400px] object-cover flex-shrink-0">
                    @endif
                </div>

                <button id="prevBtn"
                    class="absolute top-1/2 left-4 -translate-y-1/2 bg-white p-2 rounded-full shadow hover:bg-gray-100">
                    ←
                </button>
                <button id="nextBtn"
                    class="absolute top-1/2 right-4 -translate-y-1/2 bg-white p-2 rounded-full shadow hover:bg-gray-100">
                    →
                </button>
            </div>


            <!-- Info -->

            <div>
                <h1 class="text-2xl font-bold">{{ $category->nama_categori }}</h1>
                <p class="text-gray-600 mt-2">Biaya desain mulai dari</p>
                <p class="text-2xl font-bold text-gray-900 mb-6">
                    Rp{{ number_format($category->base_price, 0, ',', '.') }}
                </p>

                <div class="grid grid-cols-2 gap-4 text-sm text-gray-700">
                    <div>
                        Ukuran Lahan:
                        <span class="font-semibold">{{ $category->panjang_tanah }}m x {{ $category->lebar_tanah }}m</span>
                    </div>
                    <div>Lantai: <span class="font-semibold">{{ $category->lantai }}</span></div>
                    <div>
                        Luas Lahan:
                        <span class="font-semibold">{{ $category->panjang_tanah * $category->lebar_tanah }} m²</span>
                    </div>
                    <div>Kamar Tidur: <span class="font-semibold">{{ $category->kamar_tidur }}</span></div>
                    <div>Luas Bangunan: <span class="font-semibold">{{ $category->luas_bangunan }} m²</span></div>
                    <div>Kamar Mandi: <span class="font-semibold">{{ $category->kamar_mandi }}</span></div>
                </div>

                <div>
                    <h2 class="text-xl font-semibold mb-2 mt-5">Deskripsi</h2>
                    <p class="text-gray-700 leading-relaxed">
                        {{ $category->description ?? 'Belum ada deskripsi.' }}
                    </p>
                </div>
            </div>
        </section>

        <!-- Form Tambah Foto -->
        <section class="mt-12 bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-bold mb-4">Tambah Foto Produk</h2>

            <form action="{{ route('catimage.store', $category->id) }}" method="POST" enctype="multipart/form-data"
                class="space-y-4">
                @csrf
                <div>
                    <input type="file" name="images[]" multiple
                        class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-amber-400">
                </div>

                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    Upload Foto
                </button>
            </form>
        </section>
    </div>
@endsection

@section('scripts')
    <script>
        function previewMultiple(event) {
            let previewDiv = document.getElementById('multiPreview');
            previewDiv.innerHTML = ""; // reset preview setiap kali pilih file baru

            Array.from(event.target.files).forEach(file => {
                let reader = new FileReader();
                reader.onload = function(e) {
                    let img = document.createElement("img");
                    img.src = e.target.result;
                    img.classList = "w-32 h-24 object-cover rounded shadow";
                    previewDiv.appendChild(img);
                }
                reader.readAsDataURL(file);
            });
        }
    </script>

    <script>
        @if (Session::has('message'))
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM loaded'); // Debug

            const slider = document.getElementById('slider');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');

            if (!slider) {
                console.error('Slider element not found');
                return;
            }

            if (!prevBtn || !nextBtn) {
                console.error('Navigation buttons not found');
                return;
            }

            const images = slider.querySelectorAll('img');
            const totalSlides = images.length;

            console.log('Total slides:', totalSlides); // Debug

            let index = 0;

            prevBtn.addEventListener('click', function() {
                console.log('Prev button clicked'); // Debug
                index = (index > 0) ? index - 1 : totalSlides - 1;
                updateSlider();
            });

            nextBtn.addEventListener('click', function() {
                console.log('Next button clicked'); // Debug
                index = (index < totalSlides - 1) ? index + 1 : 0;
                updateSlider();
            });

            function updateSlider() {
                console.log('Current index:', index); // Debug
                const translateValue = -(index * 100);
                console.log('Translate value:', translateValue + '%'); // Debug
                slider.style.transform = `translateX(${translateValue}%)`;
            }
        });
    </script>
@endsection
