@extends('customer.layouts.app')

@section('content')
    <!-- Detail Rumah -->
    <section class="max-w-7xl mx-auto px-6 pt-28 pb-2 grid lg:grid-cols-2 gap-8">
        <!-- Gambar -->
        <div class="relative w-full max-w-3xl mx-auto rounded-2xl overflow-hidden shadow-md">
            <!-- Wrapper untuk menyembunyikan slide -->
            <div class="overflow-hidden relative w-full h-[400px]">
                <!-- Track slider -->
                <div id="slider" class="flex transition-transform duration-500 ease-in-out">
                    @foreach ($category->images as $image)
                        <div class="w-full flex-shrink-0">
                            <img src="{{ asset($image->image_path) }}" alt="{{ $category->nama_categori }}"
                                class="w-full h-[400px] object-cover">
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Tombol Prev -->
            <button id="prevBtn"
                class="absolute top-1/2 left-4 -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 p-2 rounded-full shadow">
                ←
            </button>

            <!-- Tombol Next -->
            <button id="nextBtn"
                class="absolute top-1/2 right-4 -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 p-2 rounded-full shadow">
                →
            </button>
        </div>




        <!-- Info -->
        <div>
            <h1 class="text-2xl font-bold">{{ $category->nama_categori }}</h1>
            <p class="text-gray-600 mb-2">
                Didesain oleh <span class="text-blue-600 font-semibold">Nazarch Studio</span>
            </p>

            <!-- Rating -->
            <div class="flex items-center gap-2 mb-4">
                <span class="text-yellow-500">★★★★★</span>
                <span class="font-semibold">4.9</span>
                <span class="text-gray-500">(152)</span>
            </div>

            <!-- Harga -->
            <p class="text-gray-600">Biaya desain mulai dari</p>
            <p class="text-2xl font-bold text-gray-900 mb-6">
                Rp{{ number_format($category->base_price, 0, ',', '.') }}
            </p>
            <!-- Tab Navigasi -->
            <div class="flex gap-3 mb-4">
                <a href="{{ route('user.order', $category->id) }}">
                    <button class="px-4 py-2 rounded-lg bg-blue-600 text-white font-medium">pesan sekarang</button>
                </a>
            </div>

            <!-- Detail Info -->
            <div class="grid grid-cols-2 gap-4 text-sm text-gray-700">
                <div>
                    Ukuran Lahan:
                    <span class="font-semibold">
                        {{ $category->panjang_tanah }}m x {{ $category->lebar_tanah }}m
                    </span>
                </div>
                <div>
                    Lantai: <span class="font-semibold">{{ $category->lantai }}</span>
                </div>
                <div>
                    Luas Lahan:
                    <span class="font-semibold">
                        {{ $category->panjang_tanah * $category->lebar_tanah }} m²
                    </span>
                </div>
                <div>
                    Kamar Tidur: <span class="font-semibold">{{ $category->kamar_tidur }}</span>
                </div>
                <div>
                    Luas Bangunan:
                    <span class="font-semibold">
                        {{ $category->luas_bangunan }} m²
                    </span>
                </div>
                <div>
                    Kamar Mandi: <span class="font-semibold">{{ $category->kamar_mandi }}</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Deskripsi -->
    <section class="max-w-7xl mx-auto px-6 pt-2 pb-12">
        <h2 class="text-xl font-semibold mb-3">Deskripsi</h2>
        <p class="text-gray-700 leading-relaxed">
            {{ $category->description ?? 'Belum ada deskripsi.' }}
        </p>
    </section>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slider = document.getElementById('slider');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const slides = slider.querySelectorAll('div'); // ambil semua slide
            const totalSlides = slides.length;

            let index = 0;

            function updateSlider() {
                slider.style.transform = `translateX(-${index * 100}%)`;
            }

            prevBtn.addEventListener('click', function() {
                index = (index > 0) ? index - 1 : totalSlides - 1;
                updateSlider();
            });

            nextBtn.addEventListener('click', function() {
                index = (index < totalSlides - 1) ? index + 1 : 0;
                updateSlider();
            });
        });
    </script>
@endsection
