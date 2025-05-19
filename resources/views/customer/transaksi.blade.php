@extends('customer.layouts.app')

@section('content')
    <section class="bg-gradient-to-b from-cream-light to-cream pt-16 pb-12 px-4 md:px-8 lg:px-16">
        <div class="w-full max-w-4xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden my-8 border border-gray-100">
            <!-- Header with decorative elements -->
            <div class="bg-coklat-dark px-6 py-4">
                <div class="flex items-center justify-center mt-6">
                    <h1 class="text-3xl font-bold text-coklat">Konfirmasi Pembayaran</h1>

                </div>
            </div>

            <div class="p-6 md:p-8">
                <!-- Payment illustration with decorative border -->
                <div class="mb-8 flex justify-center relative">
                    <img src="{{ asset('upload/rumah.jpg') }}" alt="Payment Illustration"
                        class="relative max-w-md w-full rounded-lg shadow-md transform ">
                </div>

                <!-- Order summary with elegant styling -->
                <div class="mb-8 p-6 bg-gray-50 rounded-lg border border-gray-200">
                    <h2 class=" text-xl text-gray-800 mb-4 border-b pb-2 border-gold-200">Detail Pesanan</h2>
                    <div class="space-y-3 text-gray-700">
                        <div class="flex justify-between">
                            <span class="font-medium">Produk:</span>
                            <span class="font-semibold">{{ $order->category->nama_categori }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-medium">Panjang (m):</span>
                            <span class="font-semibold">{{ $order->width }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-medium">Lebar (m):</span>
                            <span class="font-semibold">{{ $order->length }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-medium">Luas Bangunan:</span>
                            <span class="font-semibold">{{ $order->total_area }} m²</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-medium">Harga Satuan permeter:</span>
                            <span class="font-semibold">{{ $order->category->base_price }}</span>
                        </div>
                        <div class="flex justify-between pt-3 border-t border-gold-100">
                            <span class="font-medium text-lg">Total Pembayaran:</span>
                            <span class="font-bold text-lg text-coklat">Rp
                                {{ number_format($order->price, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>

                @if(session('success'))
                    <div class="mb-6 px-4 py-3 bg-green-50 text-green-700 rounded-lg border border-green-200 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Payment form with enhanced styling -->
                <form action="{{route('user.transaksi.desain', $order->id)}}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div class="space-y-6">
                        <!-- Payment Method -->
                        <div>
                            <label for="payment_method" class="block  text-gray-700 font-medium mb-2">Metode
                                Pembayaran</label>
                            <div class="relative">
                                <select name="payment_method" id="payment_method"
                                    class="w-full appearance-none border border-gray-300 rounded-lg px-4 py-3 pl-10 focus:outline-none focus:ring-2 focus:ring-coklat focus:border-coklat-light bg-white">
                                    <option value="bank_transfer">Transfer Bank</option>
                                    <option value="credit_card">Kartu Kredit</option>
                                    <option value="e-wallet">E-Wallet</option>
                                </select>
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                    </svg>
                                </div>
                            </div>
                        </div>


                        <!-- Payment Receipt -->
                        <div>
                            <label for="payment_receipt" class="block text-gray-700 font-medium mb-2">Upload Bukti
                                Pembayaran</label>

                            <div class="flex items-center justify-center w-full">
                                <label id="preview-label" for="payment_receipt"
                                    class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer hover:bg-gray-50 overflow-hidden relative">

                                    <!-- Default Upload UI -->
                                    <div id="default-upload"
                                        class="flex flex-col items-center justify-center pt-5 pb-6 px-4 text-center z-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500">
                                            <span class="font-semibold">Klik untuk upload</span> atau drag and drop
                                        </p>
                                        <p class="text-xs text-gray-500">Format: JPG, PNG (Maks. 5MB)</p>
                                    </div>

                                    <input type="hidden" name="amount" value="{{ $order->price }}">

                                    <!-- Image Preview -->
                                    <img id="preview-image" src="#" alt="Preview"
                                        class="hidden absolute inset-0 w-full h-full object-contain rounded-lg z-10" />

                                    <input id="payment_receipt" name="payment_receipt" type="file" class="hidden"
                                        accept="image/*" required />
                                </label>
                            </div>
                        </div>


                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button type="submit"
                            class="w-full bg-coklat from-coklat text-white font-bold py-3 px-4 rounded-lg transition duration-300 border-2 border-putih hover:bg-putih hover:text-coklat hover:border-coklat flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Konfirmasi Pembayaran
                        </button>
                    </div>
                </form>

                <!-- Help text -->
                <div class="mt-6 text-center text-sm text-gray-500">
                    <p>Butuh bantuan? Hubungi kami di <a href="mailto:cs@desainrumah.com"
                            class="text-coklat hover:underline">cs@desainrumah.com</a></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Script Preview -->
    <script>
        document.getElementById('payment_receipt').addEventListener('change', function (e) {
            const file = e.target.files[0];
            const previewImage = document.getElementById('preview-image');
            const defaultUpload = document.getElementById('default-upload');

            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImage.src = e.target.result;
                    previewImage.classList.remove('hidden');
                    defaultUpload.classList.add('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                previewImage.src = '#';
                previewImage.classList.add('hidden');
                defaultUpload.classList.remove('hidden');
            }
        });
    </script>


@endsection