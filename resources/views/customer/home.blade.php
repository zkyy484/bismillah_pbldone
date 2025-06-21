@extends('customer.layouts.app')

@section('content')

    <!-- Main Content -->

    <!-- Hero Section -->
    <section class="my-10 px-5 pt-14">
        <div class="max-w-6xl mx-auto relative rounded-[40px] overflow-hidden shadow-custom h-[500px]">
            <!-- Video background -->
            <video autoplay muted loop class="absolute inset-0 w-full h-full object-cover z-0">
                <source src="{{url('/upload/video.mp4')}}" type="video/mp4">
                <!-- Fallback image if video doesn't load -->
                <img src="{{url('/upload/rumah1.jpg')}}" class="absolute inset-0 w-full h-full object-cover">
            </video>

            <!-- Overlay content -->
            <div
                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-center z-10 w-full px-5">
                <h1 class="font-serif font-bold text-5xl mb-2 text-shadow-md">Kami Membuat Desain</h1>
                <h1 class="font-serif font-bold text-5xl mb-6 text-shadow-md">Luar Biasa</h1>
                <div class="flex justify-center gap-4">
                    @auth
                        @php
                            $id = Auth::user()->id;
                            $profileData = App\Models\User::find($id);
                        @endphp
                    @else
                        <button
                            class="bg-white text-hitam px-6 py-2 rounded-full font-semibold hover:bg-coklat hover:text-putih transition-all">
                            <a href="{{route('login')}}">Login</a>
                        </button>
                        <button
                            class="bg-coklat text-white px-6 py-2 rounded-full font-semibold hover:bg-putih hover:text-hitam transition-all">
                            <a href="{{route('register')}}">Register</a>
                        </button>
                    @endauth
                </div>
            </div>
        </div>
    </section>


    <!-- Features Section -->
    <section class="py-16 px-5 bg-coklat overflow-hidden">
        <div class="max-w-6xl mx-auto flex flex-wrap gap-10">
            <!-- Left Side -->
            <div class="flex-1 min-w-[300px]">
                <h2 class="text-2xl font-bold mb-5 text-putih">Kami adalah perusahaan Desain Interior dan Arsitektur yang kreatif</h2>
                <div class="relative w-fit">
                    <img src="{{url('/upload/rumah.jpg')}}" alt="image 1"
                        class="w-[300px] h-[150px] object-cover rounded-lg">
                    <img src="{{url('/upload/rumah1.jpg')}}" alt="image 2"
                        class="absolute top-[80px] left-[60px] w-[300px] h-[150px] object-cover rounded-lg shadow-md z-10">
                </div>
                <div class="h-[80px] invisible">spacer</div>
            </div>

            <!-- Right Side -->
            <div class="flex-1 min-w-[300px]">
                <p class="mb-4 text-md text-putih">
                    Desain arsitektur adalah seni mengubah ruang menjadi pengalaman. Setiap sudut, setiap garis,
                    setiap material memiliki cerita yang ingin diceritakan. Menciptakan ruang yang tidak hanya
                    dilihat, tetapi juga dirasakan.
                </p>

                <!-- Buttons in 3 Columns -->
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 my-5">
                    @foreach ($allcts as $category)
                        <a href="{{ route('kategori.detail', $category->id) }}"
                            class="flex items-center justify-center bg-coklat border-2 border-putih text-white px-4 py-2 rounded-full text-[11px] sm:text-xs text-center hover:bg-cream hover:text-coklat hover:border-2 border-cream transition-colors">
                            {{ strtoupper($category->nama_categori) }}
                        </a>
                    @endforeach
                </div>


                <p class="mb-1  text-md text-putih">Arsitektur menyatukan fungsi dan keindahan, membentuk ruang yang mencerminkan identitas dan
                    membangkitkan emosi. Setiap elemen dirancang untuk menciptakan suasana yang menginspirasi dan bermakna.
                </p>
                <p><a href="#" class="hover:underline text-bold text-putih">Jelajahi lebih dalam tentang desain yang
                        tersedia</a></p>
            </div>
        </div>
    </section>



    <!-- Gallery Section -->
    <section class="py-16 bg-putih text-center">
        <div class="container mx-auto px-5">
            <div class="mb-10">
                <h2 class="text-3xl font-bold text-coklat">Jelajahi Desain Kami</h2>
                <p class="text-gray mt-2">Dapatkan inspirasi dari mahakarya arsitektur dan interior kreatif terbaru kami.
                </p>
            </div>

            <div class="grid grid-cols-3 grid-rows-2 gap-4 py-10">
                @foreach ($cts as $index => $category)
                    @php
                        $colSpan = $index === 2 ? 'col-span-1 row-span-2 h-[528px]' : 'col-span-1 row-span-1 h-64';
                    @endphp

                    <a href="{{ route('kategori.detail', $category->id) }}"
                        class="relative overflow-hidden rounded-lg item {{ $colSpan }} group">
                        <img src="{{ (!empty($category->photo)) ? url($category->photo) : url('upload/rumah.jpg') }}" alt=""
                            class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110" />

                        <div
                            class="absolute left-0 bottom-0 w-full h-1/4 
                                                                bg-black/50 text-white text-center text-xl font-bold 
                                                                flex items-center justify-center 
                                                                transition-all duration-500 ease-in-out 
                                                                group-hover:bottom-0 group-hover:h-full group-hover:bg-black/70">
                            {{ $category->nama_categori }}
                        </div>
                    </a>


                @endforeach

                <!-- Slideshow Manual -->
                <a href="{{ route('show.kategory') }}"
                    class="relative overflow-hidden rounded-lg item col-span-2 row-span-1 h-64 group">

                    <!-- Slideshow Container -->
                    <div class="relative w-full h-full" id="manual-slideshow">
                        <!-- Gambar akan dimasukkan via JavaScript -->
                    </div>

                    <!-- Overlay -->
                    <div class="absolute bottom-0 left-0 right-0 
                            bg-black/40 text-white text-center text-xl font-bold
                            h-1/4 group-hover:h-full
                            flex items-center justify-center
                            transition-all duration-500 ease-in-out">
                        Selengkapnya
                    </div>
                </a>



            </div>


        </div>
    </section>



    <!-- Rating & Reviews Section -->
    @php
        $totalReviews = $reviews->count();
        $averageRating = $totalReviews > 0 ? round($reviews->avg('rating'), 1) : 0;
        $ratingBreakdown = [
            5 => $reviews->where('rating', 5)->count(),
            4 => $reviews->where('rating', 4)->count(),
            3 => $reviews->where('rating', 3)->count(),
            2 => $reviews->where('rating', 2)->count(),
            1 => $reviews->where('rating', 1)->count(),
        ];
    @endphp

    <section class="py-16 bg-light">
        <div class="container mx-auto px-5">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-primary">Ulasan Pelanggan</h2>
                <p class="text-gray mt-2">Apa yang klien kami katakan tentang desain dan layanan kami</p>
            </div>

            <!-- Overall Rating -->
            <div class="bg-white rounded-xl shadow-card p-8 mb-10 max-w-3xl mx-auto">
                <div class="flex flex-col md:flex-row items-center gap-12">
                    <div class="text-center">
                        <div class="text-5xl font-bold text-primary">{{ number_format($averageRating, 1) }}</div>
                        <div class="flex justify-center mt-2">
                            <div class="flex">
                                @for ($i = 1; $i <= 5; $i++)
                                    <svg class="w-6 h-6 {{ $i <= round($averageRating) ? 'text-yellow-400' : 'text-gray-300' }}"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                            </div>
                        </div>
                        <div class="text-gray mt-1">Berdasarkan {{ $totalReviews }} Review</div>
                    </div>

                    <!-- Rating Breakdown -->
                    <div class="flex-1 w-full">
                        @foreach([5, 4, 3, 2, 1] as $stars)
                            @php
                                $count = $ratingBreakdown[$stars] ?? 0;
                                $percent = $totalReviews > 0 ? ($count / $totalReviews) * 100 : 0;
                            @endphp
                            <div class="flex items-center mb-2">
                                <div class="w-16 text-sm font-medium text-primary whitespace-nowrap">{{ $stars }} Bintang</div>
                                <div class="flex-1 mx-2 h-2.5 bg-gray-200 rounded-full">
                                    <div class="h-2.5 bg-yellow-400 rounded-full" style="width: {{ $percent }}%"></div>
                                </div>
                                <div class="w-10 text-sm text-right text-gray">{{ $count }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Customer Reviews -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 items-stretch content-stretch"
                id="review-container">
                @forelse ($reviews as $index => $review)
                    <div class="review-item {{ $index >= 3 ? 'hidden' : '' }} h-full">
                        <div
                            class="bg-white h-full flex flex-col justify-between rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden">
                            <div class="p-6 pb-4 bg-gray-100">
                                <div class="flex items-center">
                                    <div class="relative w-20 aspect-square">
                                        <img src="{{ asset('upload/user_images/' . $review->user->photo) }}" alt="Customer"
                                            class="w-full h-full object-cover rounded-full border-2 border-cream shadow-sm">
                                    </div>

                                    <div class="ml-4">
                                        <h4 class="font-semibold text-gray-800">{{ $review->user->name }}</h4>
                                        <div class="flex items-center mt-1">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <svg class="w-4 h-4 {{ $i <= $review->rating ? 'text-amber-400' : 'text-gray-300' }}"
                                                    fill="currentColor" viewBox="0 0 20 20">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                            @endfor
                                            <span class="ml-2 text-xs font-medium text-gray-500">{{ $review->rating }}.0</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-6 pt-4 flex-1 flex flex-col justify-between">
                                <div>
                                    <div class="mb-3">
                                        <a href="{{route('kategori.detail', $category->id)}}"
                                            class="inline-block px-2 py-1 text-xs font-semibold text-coklat bg-cream rounded-full">
                                            {{ $review->order->category->nama_categori ?? 'General' }}
                                        </a>
                                    </div>

                                    <p class="text-gray-600 italic mb-5 relative">
                                        <span class="absolute -top-3 -left-1 text-2xl text-gray-300">"</span>
                                        {{ $review->comment }}
                                        <span class="absolute -bottom-4 -right-1 text-2xl text-gray-300">"</span>
                                    </p>
                                </div>

                                <div class="flex items-center justify-between text-xs text-gray-400 border-t pt-3 mt-auto">
                                    <span>{{ $review->created_at->format('M d, Y') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 py-12 text-center">
                        <div class="mx-auto w-24 h-24 text-gray-300 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                            </svg>
                        </div>
                        <h4 class="text-lg font-medium text-gray-500 mb-1">Belum ada review</h4>
                        <p class="text-gray-400 max-w-md mx-auto">Jadilah orang pertama yang berbagi pengalaman Anda dengan
                            layanan ini</p>
                    </div>
                @endforelse
            </div>

            <!-- Toggle Button -->
            @if ($totalReviews > 3)
                <div class="text-center mt-10">
                    <button onclick="toggleReviews()" id="toggle-review-btn"
                        class="bg-coklat text-white px-6 py-2 rounded-full border-2 font-medium hover:bg-cream hover:text-coklat hover:border-coklat transition-colors">
                        View All Reviews
                    </button>
                </div>
            @endif
        </div>
    </section>

    <script>
        function toggleReviews() {
            const items = document.querySelectorAll('.review-item');
            const btn = document.getElementById('toggle-review-btn');
            items.forEach(item => item.classList.toggle('hidden'));
            btn.textContent = btn.textContent === 'View All Reviews' ? 'Hide Reviews' : 'View All Reviews';
        }
    </script>



    <!-- Toggle Script -->
    <script>
        function toggleReviews() {
            const hiddenReviews = document.querySelectorAll('.review-item.hidden');
            const btn = document.getElementById('toggle-review-btn');

            if (hiddenReviews.length > 0) {
                hiddenReviews.forEach(item => item.classList.remove('hidden'));
                btn.textContent = "Show Less";
            } else {
                const allReviews = document.querySelectorAll('.review-item');
                allReviews.forEach((item, index) => {
                    if (index >= 3) item.classList.add('hidden');
                });
                btn.textContent = "View All Reviews";
            }
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const slideshow = document.getElementById('manual-slideshow');
            const slideImages = [
                "{{ url('upload/slideshow/slide1.jpg') }}",
                "{{ url('upload/slideshow/slide2.jpg') }}",
                "{{ url('upload/slideshow/slide3.jpg') }}",
                "{{ url('upload/slideshow/slide4.jpg') }}",
                "{{ url('upload/slideshow/slide5.jpg') }}"
            ];

            // Create slides
            slideImages.forEach((imgSrc, index) => {
                const slide = document.createElement('div');
                slide.className = `absolute inset-0 w-full h-full transition-opacity duration-1000 ${index === 0 ? 'opacity-100' : 'opacity-0'}`;
                slide.innerHTML = `<img src="${imgSrc}" alt="Slide ${index + 1}" class="w-full h-full object-cover">`;
                slideshow.appendChild(slide);
            });

            // Simple slideshow logic
            let currentSlide = 0;
            const slides = slideshow.querySelectorAll('div');

            setInterval(() => {
                slides[currentSlide].classList.replace('opacity-100', 'opacity-0');
                currentSlide = (currentSlide + 1) % slides.length;
                slides[currentSlide].classList.replace('opacity-0', 'opacity-100');
            }, 3000);
        });
    </script>

@endsection