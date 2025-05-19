@extends('customer.layouts.app')

@section('content')
<section class="bg-cream pt-16 px-4 md:px-8 lg:px-16">
    <div class="w-full max-w-4xl mx-auto bg-white rounded-xl shadow-md overflow-hidden my-8">
        <div class="p-6 md:p-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-4">Pesan Desain Rumah</h1>
            <p class="block text-gray-700 font-medium mb-16">
                Untuk pemesanan desain rumah ini, harga satuannya menyesuaikan dengan ukuran panjang dan lebar dari rumah. Diharapkan pembeli dapat mengisi form ukuran rumah sebaik mungkin untuk menghindari kesalahan yang tidak diinginkan.
            </p>

            @if(session('success'))
                <div class="mb-4 px-4 py-3 bg-green-100 text-green-700 rounded-lg shadow">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{route('user.order.desain')}}" method="POST" class="space-y-5">
                @csrf

                <!-- Pilih Kategori -->
                <div>
                    <label for="category_id" class="block text-gray-700 font-medium mb-2">Pilih Kategori Rumah</label>
                    <select id="category_id" name="category_id"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($categories as $data)
                            <option value="{{ $data->id }}" data-price="{{ $data->base_price }}">
                                {{ $data->nama_categori }}
                            </option>
                        @endforeach
                    </select>
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
                <div class="text-lg font-semibold text-blue-700 mt-4 space-y-1 hidden" id="priceInfo">
                    <p>Harga Satuan: <span id="unitPrice"></span></p>
                    <p>Total Harga: <span id="totalPrice"></span></p>
                </div>

                <!-- Tombol Submit -->
                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-coklat hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition duration-200">
                        Pesan Sekarang
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Script Hitung Harga -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const categorySelect = document.getElementById('category_id');
        const lengthInput = document.getElementById('length');
        const widthInput = document.getElementById('width');

        const unitPriceSpan = document.getElementById('unitPrice');
        const totalPriceSpan = document.getElementById('totalPrice');
        const priceInfo = document.getElementById('priceInfo');

        function updatePrice() {
            const selectedOption = categorySelect.options[categorySelect.selectedIndex];
            const unitPrice = parseFloat(selectedOption.getAttribute('data-price')) || 0;
            const length = parseFloat(lengthInput.value) || 0;
            const width = parseFloat(widthInput.value) || 0;

            // Tampilkan harga satuan jika kategori dipilih
            if (unitPrice > 0) {
                unitPriceSpan.textContent = 'Rp' + unitPrice.toLocaleString('id-ID');
                priceInfo.classList.remove('hidden');
            } else {
                unitPriceSpan.textContent = '';
                priceInfo.classList.add('hidden');
            }

            // Tampilkan total jika panjang dan lebar terisi
            if (length > 0 && width > 0 && unitPrice > 0) {
                const total = unitPrice * length * width;
                totalPriceSpan.textContent = 'Rp' + total.toLocaleString('id-ID');
            } else {
                totalPriceSpan.textContent = '';
            }
        }

        categorySelect.addEventListener('change', updatePrice);
        lengthInput.addEventListener('input', updatePrice);
        widthInput.addEventListener('input', updatePrice);
    });
</script>

@endsection
