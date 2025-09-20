@extends('customer.layouts.app')

@section('content')
    <section class="bg-cream pt-12 px-4 md:px-8 lg:px-16">
        <div class="w-full max-w-7xl mx-auto bg-white rounded-xl shadow-md overflow-hidden my-8">
            <div class="grid md:grid-cols-2 gap-12 p-6 md:p-10">

                <!-- Kolom Kiri: Info & Ilustrasi -->
                <div class="flex flex-col justify-center">
                    <h1 class="text-3xl font-bold text-gray-800 mb-4">Pesan Desain Rumah</h1>
                    <p class="text-red-700 leading-relaxed mb-6"><b>NOTE:</b>
                        Untuk pemesanan desain rumah ini, harga satuannya menyesuaikan dengan ukuran panjang dan lebar dari
                        rumah.
                        Diharapkan pembeli dapat mengisi form ukuran rumah sebaik mungkin untuk menghindari kesalahan yang
                        tidak diinginkan.
                    </p>

                    <!-- Slider Gambar -->
                    <div class="relative w-full overflow-hidden rounded-lg shadow">
                        <div class="flex transition-transform duration-500 ease-out" id="sliderTrack">
                            @foreach ($categories->images as $image)
                                <div class="min-w-full">
                                    <img src="{{ asset($image->image_path) }}" alt="Desain Rumah"
                                        class="w-full h-[280px] md:h-[350px] object-cover">
                                </div>
                            @endforeach
                        </div>

                        <!-- Tombol Navigasi -->
                        <button id="prevBtn"
                            class="absolute top-1/2 left-2 -translate-y-1/2 bg-white/70 hover:bg-white text-black p-2 rounded-full shadow">
                            &#10094;
                        </button>
                        <button id="nextBtn"
                            class="absolute top-1/2 right-2 -translate-y-1/2 bg-white/70 hover:bg-white text-black p-2 rounded-full shadow">
                            &#10095;
                        </button>
                    </div>
                </div>

                <!-- Kolom Kanan: Form -->
                <div>
                    @if (session('success'))
                        <div class="mb-4 px-4 py-2 bg-green-100 text-green-700 rounded-lg shadow">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('user.order.desain') }}" method="POST" class="space-y-3">
                        @csrf

                        <!-- Pilih Kategori -->
                        <div>
                            <label for="category_id" class="block text-gray-700 font-medium mb-2">
                                Desain Rumah
                            </label>

                            <!-- Hidden input untuk dikirim ke backend -->
                            <input type="hidden" id="category_id" name="category_id" value="{{ $categories->id }}"
                                data-price="{{ $categories->base_price }}">

                            <!-- Tampilkan nama kategori sebagai info -->
                            <input type="text" value="{{ $categories->nama_categori }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-gray-100 text-gray-700"
                                readonly>
                        </div>


                        <!-- Panjang -->
                        <div>
                            <label for="length" class="block text-gray-700 font-medium mb-2">Panjang Rumah (m)</label>
                            <input type="number" id="length" name="length"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required min="1">
                        </div>

                        <!-- Lebar -->
                        <div>
                            <label for="width" class="block text-gray-700 font-medium mb-2">Lebar Rumah (m)</label>
                            <input type="number" id="width" name="width"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required min="1">
                        </div>

                        <!-- Catatan -->
                        <div>
                            <label for="notes" class="block text-gray-700 font-medium mb-2">Catatan Tambahan</label>
                            <textarea id="notes" name="notes" rows="4"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="Contoh: Ingin desain dengan taman belakang, rooftop, dll."></textarea>
                        </div>

                        <!-- Label Harga -->
                        <div class="text-lg font-semibold text-blue-700 mt-2 space-y-1 hidden" id="priceInfo">
                            <p>Harga Satuan: <span id="unitPrice"></span></p>
                            <p>Total Harga: <span id="totalPrice"></span></p>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="pt-2">
                            <button type="submit"
                                class="w-full bg-coklat hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition duration-200">
                                Pesan Sekarang
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const categoryInput = document.getElementById('category_id');
            const lengthInput = document.getElementById('length');
            const widthInput = document.getElementById('width');

            const unitPriceSpan = document.getElementById('unitPrice');
            const totalPriceSpan = document.getElementById('totalPrice');
            const priceInfo = document.getElementById('priceInfo');

            function updatePrice() {
                const unitPrice = parseFloat(categoryInput.dataset.price) || 0;
                const length = parseFloat(lengthInput.value) || 0;
                const width = parseFloat(widthInput.value) || 0;

                if (unitPrice > 0) {
                    unitPriceSpan.textContent = 'Rp' + unitPrice.toLocaleString('id-ID');
                    priceInfo.classList.remove('hidden');
                } else {
                    unitPriceSpan.textContent = '';
                    priceInfo.classList.add('hidden');
                }

                if (length > 0 && width > 0 && unitPrice > 0) {
                    const total = unitPrice * length * width;
                    totalPriceSpan.textContent = 'Rp' + total.toLocaleString('id-ID');
                } else {
                    totalPriceSpan.textContent = '';
                }
            }

            // langsung hitung saat halaman load
            updatePrice();

            lengthInput.addEventListener('input', updatePrice);
            widthInput.addEventListener('input', updatePrice);
        });
    </script>


    <!-- Script Slider -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const track = document.getElementById("sliderTrack");
            const slides = track.children;
            const prevBtn = document.getElementById("prevBtn");
            const nextBtn = document.getElementById("nextBtn");

            let index = 0;

            function updateSlide() {
                track.style.transform = `translateX(-${index * 100}%)`;
            }

            prevBtn.addEventListener("click", () => {
                index = (index - 1 + slides.length) % slides.length;
                updateSlide();
            });

            nextBtn.addEventListener("click", () => {
                index = (index + 1) % slides.length;
                updateSlide();
            });
        });
    </script>
@endsection
