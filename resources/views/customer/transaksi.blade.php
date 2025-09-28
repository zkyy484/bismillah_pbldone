@extends('customer.layouts.app')

@section('content')
    <section class="bg-gradient-to-b from-cream-light to-cream pt-16 pb-12 px-4 md:px-8 lg:px-16">
        <div class="w-full max-w-4xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden my-8 border border-gray-100">
            <!-- Header -->
            <div class="bg-coklat-dark px-6 py-4">
                <div class="flex items-center justify-center mt-6">
                    <h1 class="text-3xl font-bold text-coklat">Konfirmasi Pembayaran</h1>
                </div>
            </div>

            <div class="p-6 md:p-8">
                <!-- Payment Illustration -->
                <div class="mb-8 flex justify-center relative">
                    <img src="{{ asset('upload/logo.jpg') }}" alt="Payment Illustration"
                        class="relative max-w-md w-full rounded-lg transform ">
                </div>

                <!-- Order summary -->
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

                <!-- Pesan sukses -->
                @if (session('success'))
                    <div
                        class="mb-6 px-4 py-3 bg-green-50 text-green-700 rounded-lg border border-green-200 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Form pembayaran -->
                <form action="{{ route('user.transaksi.desain', $order->id) }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf

                    <!-- Pilih metode pembayaran -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Metode Pembayaran</label>
                        <button type="button" id="openModal"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 text-left bg-white hover:bg-gray-50">
                            Pilih Metode Pembayaran
                        </button>
                        <input type="hidden" id="payment_method" name="payment_method" required>
                    </div>

                    <!-- Modal Pilih Bank -->
                    <div id="paymentModal"
                        class="hidden fixed inset-0 w-screen h-screen bg-black bg-opacity-50 flex items-center justify-center z-[99999]">
                        <div class="bg-white rounded-lg w-full max-w-md p-6 shadow-lg relative z-[100000]">
                            <h3 class="text-lg font-semibold mb-4">Pilih Metode Pembayaran</h3>
                            <div class="space-y-3">
                                <label
                                    class="flex items-center space-x-3 border p-2 rounded-lg cursor-pointer hover:bg-gray-50">
                                    <input type="radio" name="method" value="Bank BCA" class="form-radio">
                                    <img src="{{ asset('upload/bca.png') }}" alt="BCA" class="h-6">
                                    <span>Bank BCA</span>
                                </label>
                                <label
                                    class="flex items-center space-x-3 border p-2 rounded-lg cursor-pointer hover:bg-gray-50">
                                    <input type="radio" name="method" value="Bank BRI" class="form-radio">
                                    <img src="{{ asset('upload/bri.png') }}" alt="BRI" class="h-6">
                                    <span>Bank BRI</span>
                                </label>
                                <label
                                    class="flex items-center space-x-3 border p-2 rounded-lg cursor-pointer hover:bg-gray-50">
                                    <input type="radio" name="method" value="Bank Mandiri" class="form-radio">
                                    <img src="{{ asset('upload/mandiri.png') }}" alt="Mandiri" class="h-6">
                                    <span>Bank Mandiri</span>
                                </label>
                                <label
                                    class="flex items-center space-x-3 border p-2 rounded-lg cursor-pointer hover:bg-gray-50">
                                    <input type="radio" name="method" value="Bank BNI" class="form-radio">
                                    <img src="{{ asset('upload/bni.png') }}" alt="BNI" class="h-6">
                                    <span>Bank BNI</span>
                                </label>
                                <label
                                    class="flex items-center space-x-3 border p-2 rounded-lg cursor-pointer hover:bg-gray-50">
                                    <input type="radio" name="method" value="Bank BSI" class="form-radio">
                                    <img src="{{ asset('upload/bsi.png') }}" alt="BSI" class="h-6">
                                    <span>Bank BSI</span>
                                </label>
                            </div>
                            <div class="mt-6 flex justify-end space-x-3">
                                <button type="button" id="closeModal"
                                    class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Batal</button>
                                <button type="button" id="chooseMethod"
                                    class="px-4 py-2 bg-coklat text-white rounded-lg hover:bg-coklat-dark">Pilih</button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Detail Pembayaran -->
                    <div id="paymentDetailModal"
                        class="hidden fixed inset-0 w-screen h-screen bg-black bg-opacity-50 flex items-center justify-center z-[100000]">
                        <div class="bg-white rounded-lg w-full max-w-lg p-6 shadow-lg relative">
                            <h3 class="text-lg font-semibold mb-4">Detail Pembayaran</h3>

                            <!-- Informasi Bank -->
                            <div class="flex items-center space-x-3 mb-4">
                                <img id="bankLogo" src="" alt="Bank Logo" class="h-8">
                                <span id="bankName" class="font-semibold text-gray-800"></span>
                            </div>

                            <!-- Nomor Rekening -->
                            <p class="text-sm text-gray-600">No. Rekening:</p>
                            <div class="flex items-center justify-between bg-gray-100 p-3 rounded-lg mb-4">
                                <span id="bankAccount" class="font-mono text-lg font-bold text-red-600"></span>
                                <button type="button" onclick="copyAccount()"
                                    class="text-blue-500 text-sm font-medium">SALIN</button>
                            </div>

                            <!-- Countdown -->
                            <p class="text-sm text-gray-600">Bayar Dalam</p>
                            <p id="countdown" class="text-red-600 font-bold mb-4"></p>

                            <!-- Accordion Petunjuk -->
                            <details class="mb-2 border rounded">
                                <summary class="cursor-pointer px-4 py-2 font-medium">Petunjuk Transfer mBanking</summary>
                                <div class="px-4 py-2 text-sm text-gray-600">
                                    Masuk aplikasi mBanking, pilih Transfer, masukkan nomor rekening di atas, dan selesaikan
                                    transaksi.
                                </div>
                            </details>
                            <details class="mb-2 border rounded">
                                <summary class="cursor-pointer px-4 py-2 font-medium">Petunjuk Transfer iBanking</summary>
                                <div class="px-4 py-2 text-sm text-gray-600">
                                    Login Internet Banking, pilih Transfer, input nomor rekening diatas, dan konfirmasi
                                    pembayaran.
                                </div>
                            </details>
                            <details class="mb-2 border rounded">
                                <summary class="cursor-pointer px-4 py-2 font-medium">Petunjuk Transfer ATM</summary>
                                <div class="px-4 py-2 text-sm text-gray-600">
                                    Masukkan kartu ATM, pilih Transfer, masukkan nomor rekening diatas, lalu konfirmasi.
                                </div>
                            </details>

                            <!-- Tombol -->
                            <div class="mt-6 text-right">
                                <button type="button" id="closeDetail"
                                    class="px-6 py-2 bg-coklat text-white rounded-lg hover:bg-coklat-dark">OK</button>
                            </div>
                        </div>
                    </div>

                    <!-- Upload Bukti Pembayaran -->
                    <div>
                        <label for="payment_receipt" class="block text-gray-700 font-medium mb-2">Upload Bukti
                            Pembayaran</label>
                        <div class="flex items-center justify-center w-full">
                            <label id="preview-label" for="payment_receipt"
                                class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer hover:bg-gray-50 overflow-hidden relative">
                                <div id="default-upload"
                                    class="flex flex-col items-center justify-center pt-5 pb-6 px-4 text-center z-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500">
                                        <span class="font-semibold">Klik untuk upload</span> atau drag and drop
                                    </p>
                                    <p class="text-xs text-gray-500">Format: JPG, PNG (Maks. 5MB)</p>
                                </div>
                                <input type="hidden" name="amount" value="{{ $order->price }}">
                                <img id="preview-image" src="#" alt="Preview"
                                    class="hidden absolute inset-0 w-full h-full object-contain rounded-lg z-10" />
                                <input id="payment_receipt" name="payment_receipt" type="file" class="hidden"
                                    accept="image/*" required />
                            </label>
                        </div>
                    </div>

                    <!-- Tombol submit -->
                    <div class="pt-4">
                        <button type="submit"
                            class="w-full bg-coklat from-coklat text-white font-bold py-3 px-4 rounded-lg transition duration-300 border-2 border-putih hover:bg-putih hover:text-coklat hover:border-coklat flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
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
@endsection

@section('scripts')
    <!-- Konten Anda tetap sama -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Modal Bank
            const modal = document.getElementById('paymentModal');
            const openBtn = document.getElementById('openModal');
            const closeBtn = document.getElementById('closeModal');
            const chooseBtn = document.getElementById('chooseMethod');
            const hiddenInput = document.getElementById('payment_method');

            // Modal Detail
            const detailModal = document.getElementById('paymentDetailModal');
            const closeDetail = document.getElementById('closeDetail');
            const bankNameEl = document.getElementById('bankName');
            const bankLogoEl = document.getElementById('bankLogo');
            const bankAccountEl = document.getElementById('bankAccount');
            const countdownEl = document.getElementById('countdown');

            // Data bank
            const bankData = {
                "Bank BCA": {
                    logo: "{{ asset('upload/bca.png') }}",
                    account: "126083848993791"
                },
                "Bank BRI": {
                    logo: "{{ asset('upload/bri.png') }}",
                    account: "335774912938123"
                },
                "Bank Mandiri": {
                    logo: "{{ asset('upload/mandiri.png') }}",
                    account: "449182837198273"
                },
                "Bank BNI": {
                    logo: "{{ asset('upload/bni.png') }}",
                    account: "192837465564738"
                },
                "Bank BSI": {
                    logo: "{{ asset('upload/bsi.png') }}",
                    account: "826374829183746"
                },
            };

            // Event Listeners
            if (openBtn) {
                openBtn.addEventListener('click', () => {
                    console.log('Open modal clicked');
                    modal.classList.remove('hidden');
                    modal.style.display = 'flex';
                });
            }

            if (closeBtn) {
                closeBtn.addEventListener('click', () => {
                    modal.classList.add('hidden');
                    modal.style.display = 'none';
                });
            }

            if (chooseBtn) {
                chooseBtn.addEventListener('click', () => {
                    const selected = document.querySelector('input[name="method"]:checked');
                    console.log('Selected method:', selected);

                    if (selected) {
                        hiddenInput.value = selected.value;
                        openBtn.textContent = selected.value;
                        modal.classList.add('hidden');
                        modal.style.display = 'none';

                        const bank = bankData[selected.value];
                        if (bank) {
                            bankNameEl.textContent = selected.value;
                            bankLogoEl.src = bank.logo;
                            bankAccountEl.textContent = bank.account;

                            startCountdown(300); // 5 menit
                            detailModal.classList.remove('hidden');
                            detailModal.style.display = 'flex';
                        }
                    } else {
                        alert('Silakan pilih metode pembayaran terlebih dahulu!');
                    }
                });
            }

            if (closeDetail) {
                closeDetail.addEventListener('click', () => {
                    detailModal.classList.add('hidden');
                    detailModal.style.display = 'none';
                });
            }

            // Close modal ketika klik di luar area modal
            window.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.classList.add('hidden');
                    modal.style.display = 'none';
                }
                if (e.target === detailModal) {
                    detailModal.classList.add('hidden');
                    detailModal.style.display = 'none';
                }
            });

            // Copy rekening
            window.copyAccount = function() {
                navigator.clipboard.writeText(bankAccountEl.textContent);
                alert("Nomor rekening berhasil disalin!");
            }

            // Countdown
            function startCountdown(duration) {
                let timer = duration;
                const interval = setInterval(() => {
                    let minutes = Math.floor(timer / 60);
                    let seconds = timer % 60;
                    countdownEl.textContent = `${minutes} menit ${seconds} detik`;

                    if (--timer < 0) {
                        clearInterval(interval);
                        countdownEl.textContent = "Waktu habis";
                        countdownEl.style.color = "red";
                    }
                }, 1000);
            }

            // Preview image (tetap sama)
            const paymentReceipt = document.getElementById('payment_receipt');
            if (paymentReceipt) {
                paymentReceipt.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    const previewImage = document.getElementById('preview-image');
                    const defaultUpload = document.getElementById('default-upload');

                    if (file && file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
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
            }

            // Debug info
            console.log('Payment script loaded successfully');
            console.log('Open button:', openBtn);
            console.log('Modal:', modal);
        });
    </script>
@endsection
