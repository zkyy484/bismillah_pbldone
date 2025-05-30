@extends('customer.layouts.app')

@section('content')
    <!-- Header Section -->
    <header class="text-center py-16 md:py-20 mb-8 mt-16">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl md:text-5xl font-bold text-coklat mb-4">Tentang Perusahaan Kami</h1>
            <p class="text-lg md:text-xl text-abu max-w-3xl mx-auto">
                Membangun solusi inovatif sejak 2010 dengan komitmen untuk keunggulan dan kepuasan pelanggan
            </p>
        </div>
    </header>

    <!-- Mission, Vision, Values Cards -->
    <div class="container mx-auto px-4 mb-16">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Mission Card -->
            <div class="bg-putih rounded-xl shadow-lg overflow-hidden hover:-translate-y-2 transition-transform hover:shadow-xl">
                <div class="bg-coklat text-puthi text-center py-5">
                    <i class="fas fa-bullseye text-4xl mb-3 text-putih"></i>
                    <h3 class="text-xl font-bold text-putih">Misi Kami</h3>
                </div>
                <div class="p-6">
                    <p class="mb-4">Memberikan solusi terbaik yang memenuhi kebutuhan bisnis modern melalui inovasi dan layanan berkualitas tinggi.</p>
                    <ul class="space-y-2">
                        <li class="flex items-start">
                            <i class="fas fa-check text-blue-600 mt-1 mr-2"></i>
                            <span>Menyediakan produk unggulan</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-blue-600 mt-1 mr-2"></i>
                            <span>Memberikan pengalaman pelanggan terbaik</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-blue-600 mt-1 mr-2"></i>
                            <span>Mengembangkan solusi berkelanjutan</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Vision Card -->
            <div class="bg-putih rounded-xl shadow-lg overflow-hidden hover:-translate-y-2 transition-transform hover:shadow-xl">
                <div class="bg-coklat text-puthi text-center py-5">
                    <i class="fas fa-eye text-4xl mb-3 text-putih"></i>
                    <h3 class="text-xl font-bold text-putih">Visi Kami</h3>
                </div>
                <div class="p-6">
                    <p class="mb-4">Menjadi pemimpin industri dalam penyediaan solusi digital yang transformatif di Asia Tenggara pada tahun 2025.</p>
                    <p>Kami bertekad untuk terus berinovasi dan menciptakan nilai tambah bagi semua pemangku kepentingan.</p>
                </div>
            </div>
            
            <!-- Values Card -->
            <div class="bg-putih rounded-xl shadow-lg overflow-hidden hover:-translate-y-2 transition-transform hover:shadow-xl">
                <div class="bg-coklat text-puthi text-center py-5">
                    <i class="fas fa-heart text-4xl mb-3 text-putih"></i>
                    <h3 class="text-xl font-bold text-putih" >Nilai Kami</h3>
                </div>
                <div class="p-6 space-y-4">
                    <div>
                        <h4 class="font-bold text-lg">Integritas</h4>
                        <p class="text-sm">Kejujuran dan transparansi dalam semua aspek bisnis</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-lg">Inovasi</h4>
                        <p class="text-sm">Terus mencari cara yang lebih baik</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-lg">Kolaborasi</h4>
                        <p class="text-sm">Bekerja sama untuk hasil terbaik</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Team Section -->
    <div class="container mx-auto px-4 mb-16">
        <div class="relative text-center mb-12">
            <h2 class="text-3xl font-bold text-coklat inline-block bg-cream px-6 relative z-10">Tim Kami</h2>
            <div class="absolute h-px bg-gray-300 w-full top-1/2 left-0 -z-0"></div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Team Member 1 -->
            <div class="bg-putih rounded-xl shadow-lg overflow-hidden text-center hover:-translate-y-2 transition-transform hover:shadow-xl">
                <img src="https://via.placeholder.com/150" alt="CEO" class="w-36 h-36 rounded-full object-cover mx-auto mt-8 border-4 border-cream">
                <div class="p-6">
                    <h4 class="text-xl font-bold">Budi Santoso</h4>
                    <p class="text-blue-600 font-medium mb-3">CEO & Founder</p>
                    <p class="text-sm">Memimpin perusahaan dengan visi strategis dan pengalaman 15 tahun di industri teknologi.</p>
                </div>
            </div>
            
            <!-- Team Member 2 -->
            <div class="bg-putih rounded-xl shadow-lg overflow-hidden text-center hover:-translate-y-2 transition-transform hover:shadow-xl">
                <img src="https://via.placeholder.com/150" alt="CTO" class="w-36 h-36 rounded-full object-cover mx-auto mt-8 border-4 border-cream">
                <div class="p-6">
                    <h4 class="text-xl font-bold">Ani Wijaya</h4>
                    <p class="text-blue-600 font-medium mb-3">Chief Technology Officer</p>
                    <p class="text-sm">Ahli dalam pengembangan produk dan arsitektur sistem dengan spesialisasi dalam AI.</p>
                </div>
            </div>
            
            <!-- Team Member 3 -->
            <div class="bg-putih rounded-xl shadow-lg overflow-hidden text-center hover:-translate-y-2 transition-transform hover:shadow-xl">
                <img src="https://via.placeholder.com/150" alt="CMO" class="w-36 h-36 rounded-full object-cover mx-auto mt-8 border-4 border-cream">
                <div class="p-6">
                    <h4 class="text-xl font-bold">Rudi Hermawan</h4>
                    <p class="text-blue-600 font-medium mb-3">Chief Marketing Officer</p>
                    <p class="text-sm">Membangun merek dan strategi pemasaran yang telah meningkatkan pendapatan 300%.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Achievements Section -->
    <div class="container mx-auto px-4 mb-16">
        <div class="relative text-center mb-12">
            <h2 class="text-3xl font-bold text-coklat inline-block bg-cream px-6 relative z-10">Pencapaian Kami</h2>
            <div class="absolute h-px bg-gray-300 w-full top-1/2 left-0 -z-0"></div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Achievement 1 -->
            <div class="bg-putih rounded-xl shadow-lg overflow-hidden flex items-center p-6 hover:-translate-y-2 transition-transform hover:shadow-xl">
                <div class="text-red-500 text-4xl font-bold min-w-[80px] text-center">500+</div>
                <div class="ml-6">Klien yang telah mempercayai solusi kami</div>
            </div>
            
            <!-- Achievement 2 -->
            <div class="bg-putih rounded-xl shadow-lg overflow-hidden flex items-center p-6 hover:-translate-y-2 transition-transform hover:shadow-xl">
                <div class="text-red-500 text-4xl font-bold min-w-[80px] text-center">15+</div>
                <div class="ml-6">Penghargaan industri yang telah diraih</div>
            </div>
            
            <!-- Achievement 3 -->
            <div class="bg-putih rounded-xl shadow-lg overflow-hidden flex items-center p-6 hover:-translate-y-2 transition-transform hover:shadow-xl">
                <div class="text-red-500 text-4xl font-bold min-w-[80px] text-center">95%</div>
                <div class="ml-6">Tingkat kepuasan pelanggan berdasarkan survei</div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="text-center py-12 bg-coklat bg-opacity-10 mx-4 rounded-xl mb-16">
        <h3 class="text-2xl font-bold text-coklat mb-6">Tertarik untuk bekerja sama dengan kami?</h3>
        <a href="#" class="bg-blue-600 hover:bg-blue-700 text-putih font-bold py-3 px-8 rounded-lg transition-colors inline-block">
            Hubungi Tim Kami
        </a>
    </div>
@endsection