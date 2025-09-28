@extends('customer.layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-6 py-10 mt-14">
        <!-- Header dengan nama model rumah -->
        <div class="mb-10 text-center">
            <h1 class="text-4xl text-coklat text-center mb-4 font-semibold">MODEL BANGUNAN {{ $modelRumah->nama_model ?? 'Desain Rumah' }}</h1>
            <p class=" text-coklat text-center mb-12 font-medium">Temukan inspirasi model desain bangunan dengan konsep modern dan fungsional.</p>
        </div>


        <!-- Grid Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6" id="cards-container">
            @forelse ($produk as $model)
                <!-- Cek status produk aktif -->
                @if (($model->status == 'active' || $model->status == 1) && $model->model_rumah_id == $modelRumah->id)
                    <!-- Card -->
                    <div class="group bg-white rounded-xl shadow hover:shadow-lg transition relative overflow-hidden">
                        <img src="{{ !empty($model->photo) ? asset($model->photo) : asset('upload/rumah.jpg') }}"
                            alt="{{ $model->nama_categori }}" class="rounded-t-xl w-full h-48 object-cover">

                        <div class="p-4">
                            <h3 class="font-semibold text-lg">{{ $model->nama_categori }}</h3>
                            <div class="text-sm text-gray-700 space-y-2">

                                <p>Lahan Minimal <b>{{ $model->luas_lahan }} m²</b></p>

                                <p>Biaya Konstruksi <b>Rp{{ number_format($model->base_price, 0, ',', '.') }}</b></p>
                            </div>
                        </div>

                        <!-- Hover Detail -->
                        <div
                            class="absolute bottom-0 left-0 right-0 bg-white px-4 pt-4 pb-6 
                                transform translate-y-full group-hover:translate-y-0 
                                transition duration-300 ease-in-out shadow-inner">
                            <div class="grid grid-cols-2 gap-3 text-sm text-gray-700 mb-4">
                                <p><span class="block text-gray-500">Luas
                                        Bangunan</span><b>{{ $model->luas_bangunan ?? 'N/A' }} m²</b></p>
                                <p><span class="block text-gray-500">Kamar
                                        Tidur</span><b>{{ $model->kamar_tidur ?? '0' }}</b></p>
                                <p><span class="block text-gray-500">Jumlah Lantai</span><b>{{ $model->lantai ?? '1' }}</b>
                                </p>
                                <p><span class="block text-gray-500">Kamar
                                        Mandi</span><b>{{ $model->kamar_mandi ?? '0' }}</b></p>
                            </div>
                            <a href="{{ route('kategori.detail', $model->id) }}"
                                class="block w-full text-center bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                @endif
            @empty
                <!-- Jika tidak ada produk -->
                <div class="col-span-3 text-center py-12">
                    <div class="bg-gray-100 rounded-lg p-8">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h3 class="text-xl font-semibold text-gray-600 mb-2">Tidak Ada Desain Tersedia</h3>
                        <p class="text-gray-500">Belum ada desain rumah yang aktif untuk model ini.</p>
                    </div>
                </div>
            @endforelse

            <!-- Jika ada produk tapi tidak ada yang aktif -->
            @if (
                $produk->count() > 0 &&
                    $produk->where('status', 'active')->count() == 0 &&
                    $produk->where('status', 1)->count() == 0)
                <div class="col-span-3 text-center py-12">
                    <div class="bg-yellow-50 rounded-lg p-8 border border-yellow-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-yellow-400 mb-4"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        <h3 class="text-xl font-semibold text-yellow-600 mb-2">Desain Sedang Tidak Aktif</h3>
                        <p class="text-yellow-500">Semua desain untuk model ini sedang tidak aktif. Silakan hubungi admin.
                        </p>
                    </div>
                </div>
            @endif
        </div>

        <!-- Tombol Kembali -->
        <div class="mt-8 text-center">
            <a href="{{ url()->previous() }}"
                class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali
            </a>
        </div>

        <!-- Tombol Lihat Semua (optional) -->
        @if ($produk->where('status', 'active')->count() > 0 || $produk->where('status', 1)->count() > 0)
            <div id="lihat-semua" class="fixed bottom-6 right-6 hidden">
                <a href=""
                    class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg shadow-lg hover:bg-blue-700 transition">
                    Lihat Semua Model
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        @endif
    </div>
@endsection

@section('scripts')
    <script>
        const button = document.getElementById("lihat-semua");
        const container = document.getElementById("cards-container");

        if (button) {
            window.addEventListener("scroll", () => {
                const containerBottom = container.getBoundingClientRect().bottom;

                if (containerBottom <= window.innerHeight) {
                    button.classList.remove("hidden");
                } else {
                    button.classList.add("hidden");
                }
            });
        }
    </script>
@endsection
