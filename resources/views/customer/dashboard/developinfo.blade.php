@extends('customer.layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-20">
    <div class="container mx-auto px-4">
        <!-- Header Section -->
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Tim Pengembang Kami</h1>
            <p class="text-lg md:text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Tim profesional yang berdedikasi untuk menciptakan solusi teknologi terbaik bagi Anda dengan pengalaman dan inovasi yang unggul.
            </p>
        </div>

        <!-- Team Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-8 mb-16">
            <!-- Card 1 -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden transform transition-all duration-300 hover:-translate-y-3 hover:shadow-2xl border border-gray-100">
                <div class="p-6">
                    <div class="flex justify-center mb-6">
                        <div class="w-28 h-28 rounded-full flex items-center justify-center overflow-hidden border-4 border-blue-100 shadow-lg">
                            <img src="{{ asset('upload/tim/dzaky.jpg')}}" 
                                 alt="Moch Dzaky Musyaddad" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-center text-gray-800 mb-2">Moch. Dzaky Musyaddad</h3>
                    <p class="text-blue-600 text-center font-semibold mb-3">Full Stack Developer</p>
                    
                    <!-- Email -->
                    <div class="flex items-center justify-center mb-4">
                        <i class="fas fa-envelope text-gray-400 text-sm mr-2"></i>
                        <span class="text-gray-600 text-sm">dzakymusyaddad@gmail.com</span>
                    </div>
                    
                    <!-- Deskripsi yang diperbaiki -->
                    <div class="mb-6">
                        <p class="text-gray-600 text-sm text-center leading-relaxed break-words hyphens-auto" style="word-wrap: break-word; overflow-wrap: break-word;">
                            Spesialis dalam pengembangan aplikasi web modern dengan fokus pada performa dan user experience yang optimal.
                        </p>
                    </div>
                    
                    <!-- Social Media Links -->
                    <div class="flex justify-center space-x-4">
                        <a href="https://www.instagram.com/_4z1ky/" 
                           class="text-gray-400 hover:text-pink-600 transition-all duration-300 transform hover:scale-110"
                           target="_blank">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/dzaky-musyaddad" 
                           class="text-gray-400 hover:text-blue-600 transition-all duration-300 transform hover:scale-110"
                           target="_blank">
                            <i class="fab fa-linkedin text-xl"></i>
                        </a>
                    </div>
                </div>
                <div class="bg-gradient-to-r from-blue-500 to-purple-600 h-2 w-full"></div>
            </div>
            
            <!-- Card 2 -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden transform transition-all duration-300 hover:-translate-y-3 hover:shadow-2xl border border-gray-100">
                <div class="p-6">
                    <div class="flex justify-center mb-6">
                        <div class="w-28 h-28 rounded-full flex items-center justify-center overflow-hidden border-4 border-green-100 shadow-lg">
                            <img src="{{ asset('upload/tim/adit.jpg')}}" 
                                 alt="Aditya Purnama Herlambang" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-center text-gray-800 mb-2">Aditya Purnama Herlambang</h3>
                    <p class="text-green-600 text-center font-semibold mb-3">Frontend Developer</p>
                    
                    <!-- Email -->
                    <div class="flex items-center justify-center mb-4">
                        <i class="fas fa-envelope text-gray-400 text-sm mr-2"></i>
                        <span class="text-gray-600 text-sm">aditya@gmail.com</span>
                    </div>
                    
                    <!-- Deskripsi yang diperbaiki -->
                    <div class="mb-6">
                        <p class="text-gray-600 text-sm text-center leading-relaxed break-words hyphens-auto" style="word-wrap: break-word; overflow-wrap: break-word;">
                           Ahli dalam React, Vue, dan teknologi frontend modern untuk membangun antarmuka yang responsif dan dinamis.
                        </p>
                    </div>
                    
                    <!-- Social Media Links -->
                    <div class="flex justify-center space-x-4">
                        <a href="https://www.instagram.com/adityamewtwo/" 
                           class="text-gray-400 hover:text-pink-600 transition-all duration-300 transform hover:scale-110"
                           target="_blank">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/aditya-herlambang" 
                           class="text-gray-400 hover:text-blue-600 transition-all duration-300 transform hover:scale-110"
                           target="_blank">
                            <i class="fab fa-linkedin text-xl"></i>
                        </a>
                    </div>
                </div>
                <div class="bg-gradient-to-r from-green-500 to-teal-600 h-2 w-full"></div>
            </div>
            
            <!-- Card 3 -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden transform transition-all duration-300 hover:-translate-y-3 hover:shadow-2xl border border-gray-100">
                <div class="p-6">
                    <div class="flex justify-center mb-6">
                        <div class="w-28 h-28 rounded-full flex items-center justify-center overflow-hidden border-4 border-purple-100 shadow-lg">
                            <img src="{{ asset('upload/tim/nurvi.jpg')}}" 
                                 alt="Nurvi Amalina" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-center text-gray-800 mb-2">Nurvi Amalina</h3>
                    <p class="text-purple-600 text-center font-semibold mb-3">Backend Developer</p>
                    
                    <!-- Email -->
                    <div class="flex items-center justify-center mb-4">
                        <i class="fas fa-envelope text-gray-400 text-sm mr-2"></i>
                        <span class="text-gray-600 text-sm">nurviamalina@gmail.com</span>
                    </div>
                    
                    <!-- Deskripsi yang diperbaiki -->
                    <div class="mb-6">
                        <p class="text-gray-600 text-sm text-center leading-relaxed break-words hyphens-auto" style="word-wrap: break-word; overflow-wrap: break-word;">
                            Mengembangkan API yang aman dan scalable dengan teknologi terbaru seperti Node.js, Python, dan database systems.
                        </p>
                        </p>
                    </div>
                    
                    <!-- Social Media Links -->
                    <div class="flex justify-center space-x-4">
                        <a href="https://www.instagram.com/nurviamalina/" 
                           class="text-gray-400 hover:text-pink-600 transition-all duration-300 transform hover:scale-110"
                           target="_blank">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/nurvi-amalina" 
                           class="text-gray-400 hover:text-blue-600 transition-all duration-300 transform hover:scale-110"
                           target="_blank">
                            <i class="fab fa-linkedin text-xl"></i>
                        </a>
                    </div>
                </div>
                <div class="bg-gradient-to-r from-purple-500 to-pink-600 h-2 w-full"></div>
            </div>
            
            <!-- Card 4 -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden transform transition-all duration-300 hover:-translate-y-3 hover:shadow-2xl border border-gray-100">
                <div class="p-6">
                    <div class="flex justify-center mb-6">
                        <div class="w-28 h-28 rounded-full flex items-center justify-center overflow-hidden border-4 border-yellow-100 shadow-lg">
                            <img src="{{ asset('upload/tim/nobel.jpg')}}" 
                                 alt="Nobel Rahamat Sani" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-center text-gray-800 mb-2">Nobel Rahmat Sani</h3>
                    <p class="text-yellow-600 text-center font-semibold mb-3">UI/UX Designer</p>
                    
                    <!-- Email -->
                    <div class="flex items-center justify-center mb-4">
                        <i class="fas fa-envelope text-gray-400 text-sm mr-2"></i>
                        <span class="text-gray-600 text-sm">nobelrahmat54@gmail.com</span>
                    </div>
                    
                    <!-- Deskripsi yang diperbaiki -->
                    <div class="mb-6">
                        <p class="text-gray-600 text-sm text-center leading-relaxed break-words hyphens-auto" style="word-wrap: break-word; overflow-wrap: break-word;">
                            Menciptakan desain yang intuitif dan menarik dengan fokus pada kebutuhan pengguna dan pengalaman terbaik.
                        </p>
                    </div>
                    
                    <!-- Social Media Links -->
                    <div class="flex justify-center space-x-4">
                        <a href="https://www.instagram.com/noblrhmts_/" 
                           class="text-gray-400 hover:text-pink-600 transition-all duration-300 transform hover:scale-110"
                           target="_blank">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/nobel-rahmat" 
                           class="text-gray-400 hover:text-blue-600 transition-all duration-300 transform hover:scale-110"
                           target="_blank">
                            <i class="fab fa-linkedin text-xl"></i>
                        </a>
                    </div>
                </div>
                <div class="bg-gradient-to-r from-yellow-500 to-orange-600 h-2 w-full"></div>
            </div>
            
            <!-- Card 5 -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden transform transition-all duration-300 hover:-translate-y-3 hover:shadow-2xl border border-gray-100">
                <div class="p-6">
                    <div class="flex justify-center mb-6">
                        <div class="w-28 h-28 rounded-full flex items-center justify-center overflow-hidden border-4 border-red-100 shadow-lg">
                            <img src="{{ asset('upload/tim/ayu.jpg')}}"  
                                 alt="Dwi Ayu Setiawati" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-center text-gray-800 mb-2">Dwi Ayu Setiawati</h3>
                    <p class="text-red-600 text-center font-semibold mb-3">System Analys</p>
                    
                    <!-- Email -->
                    <div class="flex items-center justify-center mb-4">
                        <i class="fas fa-envelope text-gray-400 text-sm mr-2"></i>
                        <span class="text-gray-600 text-sm">dwi60522@gmail.com</span>
                    </div>
                    
                    <!-- Deskripsi yang diperbaiki -->
                    <div class="mb-6">
                        <p class="text-gray-600 text-sm text-center leading-relaxed break-words hyphens-auto" style="word-wrap: break-word; overflow-wrap: break-word;">
                            Mengubah kebutuhan bisnis menjadi solusi sistem yang cerdas, terstruktur, dan siap mendukung transformasi digital organisasi.
                        </p>
                    </div>
                    
                    <!-- Social Media Links -->
                    <div class="flex justify-center space-x-4">
                        <a href="https://www.instagram.com/dwiayuuus/" 
                           class="text-gray-400 hover:text-pink-600 transition-all duration-300 transform hover:scale-110"
                           target="_blank">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/dwi-ayu" 
                           class="text-gray-400 hover:text-blue-600 transition-all duration-300 transform hover:scale-110"
                           target="_blank">
                            <i class="fab fa-linkedin text-xl"></i>
                        </a>
                    </div>
                </div>
                <div class="bg-gradient-to-r from-red-500 to-pink-600 h-2 w-full"></div>
            </div>
        </div>

@endsection