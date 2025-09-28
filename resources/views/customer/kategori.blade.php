@extends('customer.layouts.app')

@section('content')
    <!-- Main Content -->
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 mt-28">
        <h1 class="text-4xl text-coklat text-center mb-4 font-semibold">PILIH JENIS DESAIN RUMAH</h1>
        <p class="text-coklat text-center mb-12 font-medium">
            Pilih kategori rumah anda sesuai dengan keinginan anda
        </p>

        <!-- Category Section -->
        <div id="category-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-6">
            @foreach ($cts as $index => $item)
                <a href="{{ route('daftar.category', $item->id) }}"
                    class="category-item group relative bg-white rounded-lg overflow-hidden shadow-card hover:shadow-cardhover hover:-translate-y-1 transition-all duration-300 cursor-pointer
                    {{ $index >= 6 ? 'hidden' : '' }}">

                    <!-- Gambar -->
                    <div class="h-48 overflow-hidden relative">
                        <img src="{{ !empty($item->image_path) ? url($item->image_path) : url('upload/rumah.jpg') }}"
                            alt="" class="w-full h-full object-cover">

                        <!-- Overlay Hitam -->
                        <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition duration-500"></div>

                        <!-- Judul -->
                        <h3 class="absolute bottom-0 w-full text-center text-lg font-semibold text-white bg-black/40 py-2 transition-all duration-500 group-hover:bottom-1/2 group-hover:translate-y-1/2">
                            {{ $item->nama_model }}
                        </h3>
                    </div>
                </a>
            @endforeach
        </div>

        <!-- Tombol Lihat Semua / Tampilkan Lebih Sedikit -->
        @if ($cts->count() > 6)
            <div class="text-center mb-4">
                <button id="toggle-button"
                    class="px-6 py-3 bg-[rgb(64,52,42)] text-white rounded-lg hover:opacity-90 transition">
                    Lihat Semua
                </button>
            </div>
        @endif
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const button = document.getElementById("toggle-button");
            const items = document.querySelectorAll(".category-item");

            if (button) {
                button.addEventListener("click", function() {
                    const hiddenItems = document.querySelectorAll(".category-item.hidden");

                    if (hiddenItems.length > 0) {
                        // Tampilkan semua item
                        hiddenItems.forEach(el => el.classList.remove("hidden"));
                        button.textContent = "Tampilkan Lebih Sedikit";
                    } else {
                        // Sembunyikan lagi jadi 6 item
                        items.forEach((el, index) => {
                            if (index >= 6) {
                                el.classList.add("hidden");
                            }
                        });
                        button.textContent = "Lihat Semua";
                    }
                });
            }
        });
    </script>
@endsection
