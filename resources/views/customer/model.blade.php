@extends('customer.layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-10">
    <!-- Header -->
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Rekomendasi Desain</h2>

    <!-- Grid Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6" id="cards-container">
        @foreach ($models as $model)
        <!-- Card -->
        <div class="group bg-white rounded-xl shadow hover:shadow-lg transition relative overflow-hidden">
            <img src="{{ !empty($model->image_path) ? asset($model->image_path) : asset('upload/rumah.jpg') }}"
                alt="{{ $model->nama_model }}"
                class="rounded-t-xl w-full h-48 object-cover">

            <div class="p-4">
                <h3 class="font-semibold text-lg">{{ $model->nama_model }}</h3>
                <p class="text-sm text-gray-500 mb-3">Design by {{ $model->desainer ?? 'Unknown' }}</p>
                <div class="text-sm text-gray-700 space-y-2">
                    <p>Lahan Minimal <b>{{ $model->lahan_minimal }}</b></p>
                    <p>Biaya Konstruksi <b>Rp{{ number_format($model->biaya_konstruksi, 0, ',', '.') }}</b></p>
                </div>
            </div>

            <!-- Hover Detail -->
            <div class="absolute bottom-0 left-0 right-0 bg-white px-4 pt-4 pb-6 
                        transform translate-y-full group-hover:translate-y-0 
                        transition duration-300 ease-in-out shadow-inner">
                <div class="grid grid-cols-2 gap-3 text-sm text-gray-700 mb-4">
                    <p><span class="block text-gray-500">Luas Bangunan</span><b>{{ $model->luas_bangunan }}</b></p>
                    <p><span class="block text-gray-500">Kamar Tidur</span><b>{{ $model->kamar_tidur }}</b></p>
                    <p><span class="block text-gray-500">Jumlah Lantai</span><b>{{ $model->jumlah_lantai }}</b></p>
                    <p><span class="block text-gray-500">Kamar Mandi</span><b>{{ $model->kamar_mandi }}</b></p>
                </div>
                <a href="{{ route('customer.model.detail', $model->id) }}"
                   class="block w-full text-center bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                    Lihat Detail
                </a>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Tombol Lihat Semua -->
    <div id="lihat-semua" class="fixed bottom-6 right-6 hidden">
        <a href="{{ route('customer.model.all') }}"
            class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg shadow-lg hover:bg-blue-700 transition">
            Lihat Semua
            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </a>
    </div>
</div>
@endsection

@section('scripts')
<script>
  const button = document.getElementById("lihat-semua");
  const container = document.getElementById("cards-container");

  window.addEventListener("scroll", () => {
    const containerBottom = container.getBoundingClientRect().bottom;

    if (containerBottom <= window.innerHeight) {
      button.classList.remove("hidden");
    } else {
      button.classList.add("hidden");
    }
  });
</script>
@endsection
