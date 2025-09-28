@extends('customer.layouts.app')

@section('content')
    <section class="relative bg-gradient-to-r from-[rgb(242,240,235)] to-[rgb(64,52,42)]">
        <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-12 items-center px-6 py-36">
            <!-- Text -->
            <div class="text-[rgb(64,52,42)]">
                <h1 class="text-6xl md:text-6xl font-bold leading-tight mb-6">
                    Dapatkan Desain Hunian Impian Anda!
                </h1>
                <p class="text-lg mb-8">
                    Bangun rumah lebih mudah bersama <span class="font-semibold">Nazarch Studio</span>
                </p>
                <div class="flex">
                    <select id="categorySelect"
                        class="w-full px-4 py-3 rounded-l-lg border border-gray-300 focus:outline-none overflow-y-auto max-h-40">
                        <option value="">Pilih desain</option>
                        @foreach ($allcts as $category)
                            <option value="{{ $category->id }}">{{ $category->nama_categori }}</option>
                        @endforeach
                    </select>
                    <button type="button" id="cariBtn"
                        class="px-5 bg-[rgb(64,52,42)] text-white rounded-r-lg hover:opacity-90">
                        Cari
                    </button>
                </div>

            </div>

            <div class="flex justify-center relative w-full h-[400px] overflow-hidden rounded-xl shadow-lg">
                <div id="carousel" class="flex transition-transform duration-700 ease-in-out w-full">
                    @foreach ($banner as $item)
                        <img src="{{ asset($item->photo_banner) }}" alt="Banner {{ $loop->iteration }}"
                            class="w-full object-cover rounded-xl">
                    @endforeach
                </div>
            </div>


        </div>
    </section>


    <!-- Fitur Showcase -->
    <section class="max-w-6xl mx-auto px-6 py-16">
        <h2 class="text-3xl font-bold text-center mb-10">Temukan Desain Impianmu</h2>
        <div class="grid md:grid-cols-2 gap-10">
            <div class="space-y-6">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 flex items-center justify-center rounded-full bg-[rgb(64,52,42)] text-white">
                        🌱
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg">Ramah Lingkungan</h3>
                        <p class="text-sm text-gray-600">Menggunakan desain hemat energi dan material ramah lingkungan.</p>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 flex items-center justify-center rounded-full bg-[rgb(64,52,42)] text-white">
                        🧱
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg">Material Premium</h3>
                        <p class="text-sm text-gray-600">Dibangun dengan bahan berkualitas tinggi untuk ketahanan maksimal.
                        </p>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 flex items-center justify-center rounded-full bg-[rgb(64,52,42)] text-white">
                        🏠
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg">Tahan Gempa</h3>
                        <p class="text-sm text-gray-600">Struktur bangunan sudah didesain sesuai standar keamanan.</p>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 flex items-center justify-center rounded-full bg-[rgb(64,52,42)] text-white">
                        💡
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg">Smart Home Ready</h3>
                        <p class="text-sm text-gray-600">Mendukung instalasi perangkat pintar untuk kenyamanan hidup.</p>
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 rounded-xl p-8 shadow">
                <label class="block font-medium mb-2">Pilih Gaya Desain</label>
                <select id="designSelect" class="w-full px-4 py-3 border rounded-lg focus:outline-none mb-6">
                    <option value="">-- Pilih desain --</option>
                    @foreach ($model as $category)
                        <option value="{{ $category->id }}">{{ $category->nama_model }}</option>
                    @endforeach
                </select>

                <button type="button" id="cariDesainBtn"
                    class="w-full block text-center px-6 py-3 bg-[rgb(64,52,42)] text-white rounded-lg hover:opacity-90">
                    Cari Desain
                </button>
            </div>
        </div>
    </section>


    <!-- Rekomendasi Desain -->
    <section class="max-w-7xl mx-auto px-6 py-16">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold">Rekomendasi Desain</h2>
            <a href="{{ route('show.kategory') }}"
                class="px-4 py-2 bg-[rgb(64,52,42)] text-white rounded-lg hover:opacity-90">Lihat Semua →</a>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            @foreach ($cts as $category)
                <div class="group relative rounded-xl overflow-hidden shadow-lg">
                    <img src="{{ !empty($category->photo) ? url($category->photo) : url('upload/rumah.jpg') }}"
                        class="w-full h-64 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold text-lg">{{ $category->nama_categori }}</h3>
                        <p class="text-sm text-gray-500">Design by Nazarch</p>
                    </div>
                    <div
                        class="absolute inset-0 bg-black/70 text-white opacity-0 group-hover:opacity-100 transition duration-300 p-6 flex flex-col justify-center">
                        <a href="{{ route('kategori.detail', $category->id) }}"
                            class="mt-4 bg-white text-black px-4 py-2 rounded-lg">Lihat Detail</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>


    <!-- Testimoni -->
    <section class="max-w-6xl mx-auto px-6 py-16">
        <h2 class="text-3xl font-bold text-center mb-10">Testimoni Klien</h2>
        <div class="grid md:grid-cols-2 gap-8">
            @foreach ($reviews as $review)
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('upload/user_images/' . $review->user->photo) }}"
                            class="w-14 h-14 rounded-full mr-4">
                        <div>
                            <h3 class="font-semibold text-lg">{{ $review->user->name }}</h3>
                            <p class="text-yellow-500">
                                @for ($i = 1; $i <= 5; $i++)
                                    {{ $i <= $review->rating ? '⭐' : '☆' }}
                                @endfor
                            </p>
                        </div>
                    </div>
                    <p class="text-gray-600">{{ $review->comment }}</p>
                </div>
            @endforeach
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const carousel = document.getElementById('carousel');
            const slides = carousel.querySelectorAll('img');
            const totalSlides = slides.length;
            let index = 0;

            function showSlide(i) {
                carousel.style.transform = `translateX(-${i * 100}%)`;
            }

            function nextSlide() {
                index = (index + 1) % totalSlides; // balik ke 0 kalau sudah slide terakhir
                showSlide(index);
            }

            // ganti slide setiap 3 detik (3000ms)
            setInterval(nextSlide, 3000);
        });
    </script>

    <script>
        document.getElementById('cariBtn').addEventListener('click', function() {
            const categoryId = document.getElementById('categorySelect').value;
            if (categoryId) {
                // redirect langsung ke route kategori.detail
                let url = "{{ route('kategori.detail', ':id') }}";
                url = url.replace(':id', categoryId);
                window.location.href = url;
            } else {
                alert("Silakan pilih desain terlebih dahulu!");
            }
        });
    </script>

    <script>
        document.getElementById('cariDesainBtn').addEventListener('click', function() {
            const selectedId = document.getElementById('designSelect').value;
            if (selectedId) {
                let url = "{{ route('daftar.category', ':id') }}";
                url = url.replace(':id', selectedId);
                window.location.href = url;
            } else {
                alert("Silakan pilih gaya desain terlebih dahulu!");
            }
        });
    </script>
@endsection
