@extends('customer.layouts.app')

@section('content')

    <!-- Main Content -->
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 mt-28">
        <h1 class="text-4xl text-coklat text-center mb-4 font-semibold">CHOOSE YOUR CATEGORY DESIGN</h1>
        <p class=" text-coklat text-center mb-12 font-medium">Pilih category rumah anda sesuai dengan keinginan anda</p>

        <!-- First Category Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
            <div
                class="bg-white rounded-lg overflow-hidden shadow-card hover:shadow-cardhover hover:-translate-y-1 transition-all duration-300 cursor-pointer">
                <div class="h-48 overflow-hidden">
                    <img src="{{url('/upload/rumah.jpg')}}" alt="" class="w-full h-full object-cover">
                </div>
                <div class="p-5">
                    <h3 class="text-xl text-coklat text-center font-semibold mb-2">Kategori 1</h3>
                    <p class="text-abu text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>

            <div
                class="bg-white rounded-lg overflow-hidden shadow-card hover:shadow-cardhover hover:-translate-y-1 transition-all duration-300 cursor-pointer">
                <div class="h-48 overflow-hidden">
                    <img src="{{url('/upload/rumah.jpg')}}" alt="" class="w-full h-full object-cover">
                </div>
                <div class="p-5">
                    <h3 class="text-xl text-coklat text-center font-semibold mb-2">Kategori 2</h3>
                    <p class="text-abu text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>

            <div
                class="bg-white rounded-lg overflow-hidden shadow-card hover:shadow-cardhover hover:-translate-y-1 transition-all duration-300 cursor-pointer">
                <div class="h-48 overflow-hidden">
                    <img src="{{url('/upload/rumah.jpg')}}" alt="" class="w-full h-full object-cover">
                </div>
                <div class="p-5">
                    <h3 class="text-xl text-coklat text-center font-semibold mb-2">Kategori 3</h3>
                    <p class="text-abu text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>

            <div
                class="bg-white rounded-lg overflow-hidden shadow-card hover:shadow-cardhover hover:-translate-y-1 transition-all duration-300 cursor-pointer">
                <div class="h-48 overflow-hidden">
                    <img src="{{url('/upload/rumah.jpg')}}" alt="" class="w-full h-full object-cover">
                </div>
                <div class="p-5">
                    <h3 class="text-xl text-coklat text-center font-semibold mb-2">Kategori 3</h3>
                    <p class="text-abu text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>

            <div
                class="bg-white rounded-lg overflow-hidden shadow-card hover:shadow-cardhover hover:-translate-y-1 transition-all duration-300 cursor-pointer">
                <div class="h-48 overflow-hidden">
                    <img src="{{url('/upload/rumah.jpg')}}" alt="" class="w-full h-full object-cover">
                </div>
                <div class="p-5">
                    <h3 class="text-xl text-coklat text-center font-semibold mb-2">Kategori 3</h3>
                    <p class="text-abu text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>

            <div
                class="bg-white rounded-lg overflow-hidden shadow-card hover:shadow-cardhover hover:-translate-y-1 transition-all duration-300 cursor-pointer">
                <div class="h-48 overflow-hidden">
                    <img src="{{url('/upload/rumah.jpg')}}" alt="" class="w-full h-full object-cover">
                </div>
                <div class="p-5">
                    <h3 class="text-xl text-coklat text-center font-semibold mb-2">Kategori 3</h3>
                    <p class="text-abu text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>
        </div>
    </div>
@endsection