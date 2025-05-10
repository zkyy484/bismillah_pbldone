<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nazarch Studio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Serif:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#40342A',
                        secondary: '#F97316',
                        light: '#F2F0EB',
                        dark: '#000000',
                        gray: '#666',
                    },
                    fontFamily: {
                        serif: ['Serif', 'serif'],
                        poppins: ['Poppins', 'sans-serif'],
                    },
                    boxShadow: {
                        custom: '0 4px 10px rgba(0, 0, 0, 0.1)',
                        card: '0 8px 24px rgba(0, 0, 0, 0.08)',
                    },
                }
            }
        }
    </script>
    <style type="text/tailwindcss">
        @layer utilities {
            .stacked-shadow {
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            }
            .text-shadow {
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            }
        }
    </style>
</head>
<body class="font-poppins bg-light text-dark">
    <!-- Navigation Bar -->
    <nav class="bg-primary py-2.5 shadow-custom sticky top-0 z-50 transition-opacity duration-300">
        <div class="container mx-auto px-5">
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-4">
                    <img src="logo.jpg" alt="Logo" class="w-11 h-11 object-cover rounded-full border-2 border-white">
                    <a href="#" class="text-white text-xl font-bold">Nazarch Studio</a>
                </div>

                <div class="hidden md:flex gap-10">
                    <a href="#" class="text-white font-medium hover:text-light transition-colors">Home</a>
                    <a href="#" class="text-white font-medium hover:text-light transition-colors">Categories</a>
                    <a href="#" class="text-white font-medium hover:text-light transition-colors">About</a>
                    <a href="#" class="text-white font-medium hover:text-light transition-colors">Contact</a>
                </div>

                <div class="flex items-center gap-4">
                    <span class="text-white font-semibold">Moch. Dzaky Musyaddad</span>
                    <img src="ganteng.jpg" alt="Profile" class="w-11 h-11 object-cover rounded-full border-2 border-white">
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="my-10 flex justify-center px-5">
        <div class="relative w-full max-w-6xl h-[500px] rounded-[40px] overflow-hidden shadow-custom">
            <img src="{{url('/upload/rumah.jpg')}}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000" style="opacity: 1;">
            <img src="{{url('/upload/rumah1.jpg')}}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000" style="opacity: 0;">
            
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-center z-10 w-full px-5">
                <h1 class="font-serif font-bold text-5xl text-shadow mb-6">We Create Amazing Design</h1>
                <div class="flex justify-center gap-4">
                    <button class="bg-white text-primary px-6 py-2 rounded-full font-semibold hover:bg-light transition-all">Login</button>
                    <button class="bg-secondary text-white px-6 py-2 rounded-full font-semibold hover:bg-[#e05d0a] transition-all">Register</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class=" py-16 px-5 bg-[#f8f6f2] flex justify-center">
        <div class="max-w-6xl flex flex-wrap gap-10">
            <div class="flex-1 min-w-[300px]">
                <h2 class="text-2xl font-bold mb-5 text-primary">We are creative Interior and architect - Design company</h2>
                <div class="relative w-fit">
                    <img src="{{ asset('image/foto.jpg') }}" alt="image 1" class="w-[300px] h-[150px] object-cover rounded-lg">
                    <img src="{{ asset('image/foto.jpg') }}" alt="image 2" class="absolute top-[90px] left-[60px] z-20 w-[300px] h-[150px] object-cover rounded-lg stacked-shadow">
                </div>
            </div>

            <div class="flex-1 min-w-[300px]">
                <p class="mb-4">
                    Desain arsitektur adalah seni mengubah ruang menjadi pengalaman. Setiap sudut, setiap garis,
                    setiap material memiliki cerita yang ingin diceritakan. Menciptakan ruang yang tidak hanya
                    dilihat, tetapi juga dirasakan.
                </p>

                <div class="flex flex-wrap gap-3 my-5">
                    <button class="bg-[#3d2b1f] text-white px-4 py-2 rounded-full text-xs hover:bg-[#5c4436] transition-colors">3D SPACE DESIGN</button>
                    <button class="bg-[#3d2b1f] text-white px-4 py-2 rounded-full text-xs hover:bg-[#5c4436] transition-colors">ARCHITECTURE</button>
                    <button class="bg-[#3d2b1f] text-white px-4 py-2 rounded-full text-xs hover:bg-[#5c4436] transition-colors">INTERIOR DESIGN</button>
                    <button class="bg-[#3d2b1f] text-white px-4 py-2 rounded-full text-xs hover:bg-[#5c4436] transition-colors">VEGAN DESIGN</button>
                </div>

                <p class="mb-2">Lorem ipsum dolor sit amet</p>
                <p><a href="#" class="hover:underline">Lorem ipsum dolor sit amet asiekewww</a></p>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="py-16 bg-light text-center">
        <div class="container mx-auto px-5">
            <div class="mb-10">
                <h2 class="text-3xl font-bold text-primary">Explore Our Designs</h2>
                <p class="text-gray mt-2">Get inspired by our latest creative interior and architectural masterpieces.</p>
            </div>
            
            <div class="flex flex-wrap justify-center gap-8 mb-8">
                <div class="w-[300px] bg-white rounded-xl overflow-hidden shadow-card hover:-translate-y-1 transition-transform">
                    <img src="{{ asset('image/foto.jpg') }}" alt="Design 1" class="w-full h-[200px] object-cover">
                    <h4 class="text-lg p-4 text-primary">Modern Living Room</h4>
                </div>
                <div class="w-[300px] bg-white rounded-xl overflow-hidden shadow-card hover:-translate-y-1 transition-transform">
                    <img src="{{ asset('image/foto.jpg') }}" alt="Design 2" class="w-full h-[200px] object-cover">
                    <h4 class="text-lg p-4 text-primary">Contemporary Kitchen</h4>
                </div>
                <div class="w-[300px] bg-white rounded-xl overflow-hidden shadow-card hover:-translate-y-1 transition-transform">
                    <img src="{{ asset('image/foto.jpg') }}" alt="Design 3" class="w-full h-[200px] object-cover">
                    <h4 class="text-lg p-4 text-primary">Minimalist Bedroom</h4>
                </div>
            </div>
            
            <a href="#" class="inline-block bg-primary text-white px-6 py-3 rounded-full hover:bg-opacity-90 transition-colors">View More Designs</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-primary text-white pt-12 pb-5">
        <div class="container mx-auto px-5">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div>
                    <div class="flex items-center gap-4 mb-4">
                        <img src="{{url('/public/upload/rumah.jpg')}}" alt="Logo" class="w-14 rounded">
                        <h3 class="text-xl font-bold">Nazarch Studio</h3>
                    </div>
                    <p>We create aesthetic spaces with soul. Architecture, Interior, and beyond.</p>
                </div>
                
                <div>
                    <h3 class="text-lg font-bold mb-4 pb-2 border-b-2 border-secondary inline-block">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-light transition-colors">Home</a></li>
                        <li><a href="#" class="hover:text-light transition-colors">Categories</a></li>
                        <li><a href="#" class="hover:text-light transition-colors">About</a></li>
                        <li><a href="#" class="hover:text-light transition-colors">Contact</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-bold mb-4 pb-2 border-b-2 border-secondary inline-block">Contact Us</h3>
                    <div class="flex items-center gap-2 mb-2">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>3015 Grand Ave, Coconut Grove, Merrick Way, FL 12345</span>
                    </div>
                    <div class="flex items-center gap-2 mb-2">
                        <i class="fas fa-phone-alt"></i>
                        <span>+023-456-789</span>
                    </div>
                    <div class="flex items-center gap-2 mb-2">
                        <i class="fas fa-envelope"></i>
                        <span>sales@example.com</span>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-lg font-bold mb-4 pb-2 border-b-2 border-secondary inline-block">Stay Updated</h3>
                    <form class="flex gap-2 mb-4">
                        <input type="email" placeholder="Enter your email" class="flex-1 px-3 py-2 rounded" required>
                        <button type="submit" class="bg-secondary text-white px-4 py-2 rounded hover:bg-[#e05d0a] transition-colors">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                    <div class="flex gap-3">
                        <a href="#" class="text-white hover:text-light transition-colors"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white hover:text-light transition-colors"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white hover:text-light transition-colors"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white hover:text-light transition-colors"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="pt-5 border-t border-white border-opacity-10 text-center text-sm text-light">
                <p>&copy; 2023 Nazarch Studio. All rights reserved.</p>
                <p>Designed with passion by Nazarch Team</p>
            </div>
        </div>
    </footer>

    <script>
        // Image carousel
        let slideIndex = 0;
        const slides = document.querySelectorAll('.slide');

        setInterval(() => {
            slides.forEach((img, i) => {
                img.style.opacity = (i === slideIndex) ? '1' : '0';
            });
            slideIndex = (slideIndex + 1) % slides.length;
        }, 3000);

        // Navbar scroll effect
        const navbar = document.querySelector('nav');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.style.opacity = '0.9';
            } else {
                navbar.style.opacity = '1';
            }
        });
    </script>
</body>
</html>