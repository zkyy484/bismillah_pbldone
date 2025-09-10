@extends('admin.layouts.app')


@section('content')

    <!-- Detail Rumah -->
    <section class="max-w-7xl mx-auto px-6 pt-28 pb-2 grid lg:grid-cols-2 gap-8">
        <!-- Gambar -->
        <div class="relative rounded-2xl overflow-hidden shadow-md">
            @if($category->images->isNotEmpty())
                <img src="{{ asset($category->images->first()->image_path) }}" 
                     alt="{{ $category->nama_categori }}" 
                     class="w-full h-[400px] object-cover">
            @else
                <img src="https://via.placeholder.com/800x400?text=No+Image" 
                     alt="No Image" 
                     class="w-full h-[400px] object-cover">
            @endif

            <!-- Tombol Navigasi -->
            <button class="absolute top-1/2 left-4 -translate-y-1/2 bg-white p-2 rounded-full shadow hover:bg-gray-100">
                ←
            </button>
            <button class="absolute top-1/2 right-4 -translate-y-1/2 bg-white p-2 rounded-full shadow hover:bg-gray-100">
                →
            </button>
        </div>

        <!-- Info -->
        <div>
            <h1 class="text-2xl font-bold">{{ $category->nama_categori }}</h1>
            <p class="text-gray-600 mb-2">

            </p>

            <!-- Harga -->
            <p class="text-gray-600">Biaya desain mulai dari</p>
            <p class="text-2xl font-bold text-gray-900 mb-6">
                Rp{{ number_format($category->base_price, 0, ',', '.') }}
            </p>

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
