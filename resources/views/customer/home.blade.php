@extends('customer.layouts.app')

@section('content')

    <!-- Main Content -->

    <!-- Hero Section -->
    <section class="my-10 px-5 pt-14">
        <div class="max-w-6xl mx-auto relative rounded-[40px] overflow-hidden shadow-custom h-[500px]">
            <img src="{{url('/upload/rumah.jpg')}}" class="absolute inset-0 w-full h-full object-cover slide opacity-100">
            <img src="{{url('/upload/rumah1.jpg')}}" class="absolute inset-0 w-full h-full object-cover slide opacity-0">

            <div
                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-center z-10 w-full px-5">
                <h1 class="font-serif font-bold text-5xl mb-6 text-shadow-md">We Create Amazing Design</h1>
                <div class="flex justify-center gap-4">

                    @auth
                        @php
                            $id = Auth::user()->id;
                            $profileData = App\Models\User::find($id);
                        @endphp
                    @else
                        <button
                            class="bg-white text-hitam px-6 py-2 rounded-full font-semibold hover:bg-coklat hover:text-putih transition-all">
                            <a href="{{route('login')}}">
                                Login</a>
                        </button>
                        <button
                            class="bg-coklat text-white px-6 py-2 rounded-full font-semibold hover:bg-putih  hover:text-hitam transition-all">
                            <a href="{{route('register')}}">
                                Register
                            </a>
                        </button>
                    @endauth

                </div>
            </div>
        </div>
    </section>


    <!-- Features Section -->
    <section class="py-16 px-5 bg-[#f8f6f2] overflow-hidden">
        <div class="max-w-6xl mx-auto flex flex-wrap gap-10">
            <!-- Left Side -->
            <div class="flex-1 min-w-[300px]">
                <h2 class="text-2xl font-bold mb-5">We are creative Interior and architech - Design company</h2>
                <div class="relative w-fit">
                    <img src="{{url('/upload/rumah.jpg')}}" alt="image 1"
                        class="w-[300px] h-[150px] object-cover rounded-lg">
                    <img src="{{url('/upload/rumah.jpg')}}" alt="image 2"
                        class="absolute top-[80px] left-[60px] w-[300px] h-[150px] object-cover rounded-lg shadow-md z-10">
                </div>
                <div class="h-[80px] invisible">spacer</div>
            </div>

            <!-- Right Side -->
            <div class="flex-1 min-w-[300px]">
                <p class="mb-4 text-sm">
                    Desain arsitektur adalah seni mengubah ruang menjadi pengalaman. Setiap sudut, setiap garis,
                    setiap material memiliki cerita yang ingin diceritakan. Menciptakan ruang yang tidak hanya
                    dilihat, tetapi juga dirasakan.
                </p>

                <!-- Buttons in 3 Columns -->
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 my-5">
                    @foreach ($allcts as $category)
                        <a href="{{ route('kategori.detail', $category->id) }}"
                            class="flex items-center justify-center bg-coklat border-2 text-white px-4 py-2 rounded-full text-[11px] sm:text-xs text-center hover:bg-cream hover:text-hitam hover:border-2 border-coklat transition-colors">
                            {{ strtoupper($category->nama_categori) }}
                        </a>
                    @endforeach
                </div>


                <p class="mb-1">Lorem ipsum dolor sit amet</p>
                <p><a href="#" class="hover:underline">Lorem ipsum dolor sit amet asiekewww</a></p>
            </div>
        </div>
    </section>



    <!-- Gallery Section -->
    <section class="py-16 bg-putih text-center">
        <div class="container mx-auto px-5">
            <div class="mb-10">
                <h2 class="text-3xl font-bold text-coklat">Explore Our Designs</h2>
                <p class="text-gray mt-2">Get inspired by our latest creative interior and architectural masterpieces.</p>
            </div>

            <div class="grid grid-cols-3 grid-rows-2 gap-4 py-10">
                @foreach ($cts as $index => $category)
                    @php
                        $colSpan = $index === 2 ? 'col-span-1 row-span-2 h-[528px]' : 'col-span-1 row-span-1 h-64';
                    @endphp

                    <a href="{{route('kategori.detail', $category->id)}}"
                        class="relative overflow-hidden rounded-lg item {{ $colSpan }}">
                        <img src="{{ asset($category->photo) }}" alt="{{ $category->nama_categori }}"
                            class="w-full h-full object-cover transition-transform duration-300">
                        <div
                            class="absolute bottom-0 left-0 right-0 bg-black/45 text-white text-center p-4 text-xl font-bold overlay">
                            {{ $category->nama_categori }}
                        </div>
                    </a>
                @endforeach

                {{-- Item Manual untuk "More" --}}
                <a href="" class="relative overflow-hidden rounded-lg item col-span-2 row-span-1 h-64">
                    <img src=" alt=" More" class="w-full h-full object-cover transition-transform duration-300">
                    <div
                        class="absolute bottom-0 left-0 right-0 bg-black/45 text-white text-center p-4 text-xl font-bold overlay">
                        Selengkapnya
                    </div>
                </a>
            </div>
        </div>
    </section>



    <!-- Rating & Reviews Section -->
    <section class="py-16 bg-light">
        <div class="container mx-auto px-5">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-primary">Customer Reviews</h2>
                <p class="text-gray mt-2">What our clients say about our designs and services</p>
            </div>

            <!-- Overall Rating -->
            <div class="bg-white rounded-xl shadow-card p-8 mb-10 max-w-3xl mx-auto">
                <div class="flex flex-col md:flex-row items-center gap-12">
                    <div class="text-center">
                        <div class="text-5xl font-bold text-primary">4.8</div>
                        <div class="flex justify-center mt-2">
                            <!-- Star Rating -->
                            <div class="flex">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= 4)
                                        <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>
                                    @else
                                        <svg class="w-6 h-6 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>
                                    @endif
                                @endfor
                            </div>
                        </div>
                        <div class="text-gray mt-1">Based on 124 reviews</div>
                    </div>

                    <!-- Rating Breakdown -->
                    <div class="flex-1 w-full">
                        @foreach([5, 4, 3, 2, 1] as $stars)
                            <div class="flex items-center mb-2">
                                <div class="w-16 text-sm font-medium text-primary whitespace-nowrap">{{ $stars }} star</div>
                                <div class="flex-1 mx-2 h-2.5 bg-gray-200 rounded-full">
                                    <div class="h-2.5 bg-yellow-400 rounded-full"
                                        style="width: {{ [5 => '90%', 4 => '7%', 3 => '2%', 2 => '1%', 1 => '0%'][$stars] }}">
                                    </div>
                                </div>
                                <div class="w-10 text-sm text-right text-gray">
                                    {{ [5 => '112', 4 => '8', 3 => '3', 2 => '1', 1 => '0'][$stars] }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Customer Reviews -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Review 1 -->
                <div class="bg-white rounded-xl shadow-card p-6">
                    <div class="flex items-center mb-4">
                        <img src="{{url('/upload/rumah.jpg')}}" alt="Customer" class="w-10 h-10 rounded-full object-cover">
                        <div class="ml-3">
                            <h4 class="font-semibold">Sarah Johnson</h4>
                            <div class="flex items-center">
                                @for ($i = 1; $i <= 5; $i++)
                                    <svg class="w-4 h-4 {{ $i <= 5 ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <h5 class="font-medium mb-2">Modern Minimalist House Design</h5>
                    <p class="text-gray text-sm">"Absolutely love the design Nazarch created for our home! They perfectly
                        captured our vision of a modern minimalist space while adding creative touches we never would have
                        thought of."</p>
                    <div class="text-xs text-gray-400 mt-3">Posted on March 15, 2023</div>
                </div>

                <!-- Review 2 -->
                <div class="bg-white rounded-xl shadow-card p-6">
                    <div class="flex items-center mb-4">
                        <img src="{{url('/upload/rumah.jpg')}}" alt="Customer" class="w-10 h-10 rounded-full object-cover">
                        <div class="ml-3">
                            <h4 class="font-semibold">Michael Chen</h4>
                            <div class="flex items-center">
                                @for ($i = 1; $i <= 5; $i++)
                                    <svg class="w-4 h-4 {{ $i <= 4 ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <h5 class="font-medium mb-2">Office Interior Remodel</h5>
                    <p class="text-gray text-sm">"The team transformed our outdated office into a bright, functional
                        workspace. Their attention to detail and understanding of our business needs was impressive. Would
                        definitely recommend!"</p>
                    <div class="text-xs text-gray-400 mt-3">Posted on January 28, 2023</div>
                </div>

                <!-- Review 3 -->
                <div class="bg-white rounded-xl shadow-card p-6">
                    <div class="flex items-center mb-4">
                        <img src="{{url('/upload/rumah.jpg')}}" alt="Customer" class="w-10 h-10 rounded-full object-cover">
                        <div class="ml-3">
                            <h4 class="font-semibold">Aisha Rahman</h4>
                            <div class="flex items-center">
                                @for ($i = 1; $i <= 5; $i++)
                                    <svg class="w-4 h-4 {{ $i <= 5 ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <h5 class="font-medium mb-2">Villa Architectural Design</h5>
                    <p class="text-gray text-sm">"Working with Nazarch Studio was a pleasure from start to finish. They
                        listened to our needs, provided multiple design options, and delivered beyond our expectations. The
                        3D renderings helped us visualize perfectly."</p>
                    <div class="text-xs text-gray-400 mt-3">Posted on December 5, 2022</div>
                </div>
            </div>

            <!-- View All Button -->
            <div class="text-center mt-10">
                <button
                    class="bg-coklat text-white px-6 py-2 rounded-full border-2 font-medium hover:bg-cream hover:text-coklat hover:border-2 hover:border-coklat transition-colors">
                    View All Reviews
                </button>
            </div>
    </section>
@endsection