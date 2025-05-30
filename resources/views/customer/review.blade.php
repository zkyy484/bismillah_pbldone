@extends('customer.layouts.app')

@section('content')
    <section class="bg-gradient-to-b from-cream-light to-cream py-16 min-h-screen flex items-center">
        <div class="container mx-auto px-4 mt-10">
            <div
                class="max-w-2xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-xl">
                <!-- Decorative header -->
                <div class="bg-coklat text-white py-4 px-6">
                    <div class="flex items-center justify-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                        <h2 class="text-xl font-semibold">Beri Ulasan</h2>
                    </div>
                </div>

                <div class="p-8 md:p-12">
                    <!-- Order reference with elegant styling -->
                    <div class="mb-8 text-center border-b border-gray-100 pb-6">
                        <p class="text-sm text-gray-500 mb-1">Pesanan Anda</p>
                        <h3 class="text-2xl font-bold text-coklat-dark">#00{{ $order->id }}NAZARCH</h3>
                    </div>

                    <!-- Form -->
                    <form action="{{route('user.create.review', $order->id)}}" method="POST" class="space-y-8">
                        @csrf

                        <!-- Rating with stars -->
                        <div class="space-y-3">
                            <label class="block text-sm font-medium text-gray-700">Rating</label>
                            <div class="flex items-center justify-center space-x-2">
                                @for($i = 1; $i <= 5; $i++)
                                    <input type="radio" name="rating" id="star{{$i}}" value="{{$i}}" class="hidden peer" {{ $i == 5 ? 'checked' : '' }}>
                                    <label for="star{{$i}}"
                                        class="text-3xl cursor-pointer text-gray-300 transition-colors duration-200">
                                        ★
                                    </label>

                                @endfor
                            </div>
                            <p class="text-center text-xs text-gray-500 mt-1">Pilih 1-5 bintang</p>
                        </div>

                        <!-- Comment with floating label -->
                        <div class="relative">
                            <textarea name="comment" id="comment" rows="4"
                                class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-coklat focus:border-transparent peer"
                                placeholder=" "></textarea>
                            <label for="comment"
                                class="absolute left-3 -top-2.5 bg-white px-1 text-sm text-gray-500 transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-3 peer-focus:-top-2.5 peer-focus:text-sm peer-focus:text-gray-600">Komentar
                                (Opsional)</label>
                        </div>

                        <!-- Submit button with animation -->
                        <div class="pt-4">
                            <button type="submit"
                                class="w-full py-3 px-6 bg-coklat from-coklat to-coklat-dark text-white font-medium rounded-lg hover:from-coklat-dark hover:to-coklat transition-all duration-300 transform hover:scale-[1.02] shadow-md hover:shadow-lg flex items-center justify-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>Kirim Ulasan</span>
                            </button>
                        </div>
                    </form>

                    <!-- Back link with better spacing -->
                    <div class="mt-10 text-center">
                        <a href="{{ route('user.history.order') }}"
                            class="inline-flex items-center text-sm text-coklat hover:text-coklat-dark hover:underline transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Kembali ke Riwayat Pesanan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        const stars = document.querySelectorAll('input[name="rating"]');

        stars.forEach(star => {
            star.addEventListener('change', () => {
                const value = parseInt(star.value);

                stars.forEach(s => {
                    const label = document.querySelector(`label[for="${s.id}"]`);
                    if (parseInt(s.value) <= value) {
                        label.classList.add('text-yellow-400');
                        label.classList.remove('text-gray-300');
                    } else {
                        label.classList.add('text-gray-300');
                        label.classList.remove('text-yellow-400');
                    }
                });
            });
        });
    </script>

@endsection