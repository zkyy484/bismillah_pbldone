@extends('customer.layouts.app')

@section('content')
    <section class="bg-gradient-to-b from-cream-light to-cream py-16 min-h-screen flex items-center">
        <div class="container mx-auto px-4 mt-8">
            <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">

                <!-- Main content -->
                <div class="p-8 md:p-12 text-center">
                    <!-- Animated checkmark -->
                    <div class="mb-6 flex justify-center mt-10">
                        <div class="w-40 h-40 bg-green-100 rounded-full flex items-center justify-center animate-bounce">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-green-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </div>

                    <h2 class="text-3xl  font-bold text-gray-800 mb-4">Terima Kasih!</h2>

                    <p class="text-lg text-gray-600 mb-6 max-w-md mx-auto">
                        Pembayaran Anda telah berhasil dikirim. Tim kami akan memverifikasi pembayaran dan mengirimkan
                        konfirmasi melalui email dalam 1x24 jam.
                    </p>

                    <div class="mb-8 p-6 bg-gray-50 rounded-lg border border-gray-200 max-w-md mx-auto">
                        <h3 class="font-medium text-gray-700 mb-3">Detail Transaksi</h3>
                        <div class="flex justify-between py-2 border-b border-gray-100">
                            <span class="text-gray-600">Nomor Pesanan:</span>
                            <span class="font-medium">#00{{ $cts->order_id ?? 'NAZARCH' }}NAZARCH</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-gray-100">
                            <span class="text-gray-600">Metode:</span>
                            <span class="font-medium">{{ $cts->payment_method }}</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-gray-100">
                            <span class="text-gray-600">Total Bayar:</span>
                            <span class="font-medium">Rp {{ number_format($cts->amount, 0, ',', '.') }}</span>
                        </div>

                    </div>

                    <div class="flex flex-col sm:flex-row justify-center gap-4 mt-8">
                        <a href="{{route('user.history.order')}}"
                            class="px-6 py-3 bg-white border border-coklat text-coklat rounded-lg hover:bg-coklat hover:text-white transition duration-300 shadow-sm flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            Lihat Pesanan
                        </a>
                        <a href="{{route('user.order', $cts->id)}}"
                            class="px-6 py-3 bg-coklat text-white rounded-lg hover:bg-coklat-dark transition duration-300 shadow-sm flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Buat Pesanan Baru
                        </a>
                    </div>

                    <div class="mt-8 text-sm text-gray-500">
                        <p>Butuh bantuan? <a href="{{route('show.contact')}}" class="text-coklat hover:underline">Hubungi
                                Customer Service</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection