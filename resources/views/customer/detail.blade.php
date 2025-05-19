@extends('customer.layouts.app')

@section('content')
    <section class="bg-cream pt-16 px-4 md:px-8 lg:px-16">
        <div class="w-full max-w-6xl mx-auto bg-white rounded-xl shadow-md overflow-hidden my-8">
            <!-- Banner Slider dengan Padding Atas dan Rasio 16:9 -->
            <div class="slider-container pt-6 px-4 md:px-8">
                <div class="slider-wrapper overflow-hidden relative rounded-lg">

                    <div class="slider-track flex transition-transform duration-300 ease-out">
                        @foreach ($category->images as $image)
                            <div class="slider-slide min-w-full">
                                <div class="aspect-w-16 aspect-h-9">
                                    <img src="{{ asset($image->image_path) }}" alt="Image"
                                        class="w-full h-full object-cover rounded-lg">
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Tombol Navigasi -->
                    <button class="slider-nav-btn prev">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button class="slider-nav-btn next">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>

                <!-- Indikator Slider -->
                <div class="flex justify-center space-x-2 py-3">
                    @foreach ($category->images as $index => $image)
                        <button class="slider-indicator w-2 h-2 rounded-full bg-gray-300" data-index="{{ $index }}"></button>
                    @endforeach
                </div>
            </div>

            <!-- Detail Produk -->
            <div class="p-6 md:p-8">
                <h1 class="text-2xl font-bold text-gray-800 mb-4">{{ strtoupper($category->nama_categori) }}</h1>

                <div class="mb-6">
                    <h2 class="text-lg font-semibold text-gray-700 mb-2">Deskripsi Produk</h2>
                    <p class="text-gray-600">{{ $category->description }}</p>

                    <p class="text-gray-600 mt-2">
                        Paket termasuk: Desain 3D, denah lengkap dengan ukuran,
                        gambar tampak depan/samping/belakang, dan list material bangunan.
                    </p>
                </div>

                <div class="flex items-center justify-between mb-6">
                    <div>
                        <p class="text-2xl font-bold text-blue-600 mt-4">
                            Rp{{ number_format($category->base_price, 0, ',', '.') }}</p>
                    </div>
                    <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Diskon 10%</span>
                </div>

                <div class="flex flex-col space-y-3">
                    <a href="{{route('user.order')}}">
                        <button
                            class="w-full bg-coklat hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition duration-200">
                            Pesan Sekarang
                        </button>
                    </a>
                    <button
                        class="w-full border border-blue-600 text-coklat hover:coklat font-medium py-3 px-4 rounded-lg transition duration-200">
                        Konsultasi Gratis
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Tambahkan aspect-ratio polyfill jika perlu -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const track = document.querySelector('.slider-track');
            const slides = document.querySelectorAll('.slider-slide');
            const prevBtn = document.querySelector('.prev');
            const nextBtn = document.querySelector('.next');
            const indicators = document.querySelectorAll('.slider-indicator');

            let currentIndex = 0;
            const slideCount = slides.length;

            function updateSlider() {
                track.style.transform = `translateX(-${currentIndex * 100}%)`;
                indicators.forEach((indicator, index) => {
                    indicator.classList.toggle('bg-blue-600', index === currentIndex);
                    indicator.classList.toggle('bg-gray-300', index !== currentIndex);
                });
            }

            nextBtn.addEventListener('click', () => {
                currentIndex = (currentIndex + 1) % slideCount;
                updateSlider();
            });

            prevBtn.addEventListener('click', () => {
                currentIndex = (currentIndex - 1 + slideCount) % slideCount;
                updateSlider();
            });

            indicators.forEach(indicator => {
                indicator.addEventListener('click', () => {
                    currentIndex = parseInt(indicator.getAttribute('data-index'));
                    updateSlider();
                });
            });

            updateSlider();
        });
    </script>
@endsection