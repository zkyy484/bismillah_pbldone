{{-- <!-- Footer -->
<footer class="bg-primary text-white pt-12 pb-5">
    <div class="container mx-auto px-5">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
            <div>
                <div class="flex items-center gap-4 mb-4">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="w-14 rounded">
                    <h3 class="text-xl font-bold">Nazarch Studio</h3>
                </div>
                <p>We create aesthetic spaces with soul. Architecture, Interior, and beyond.</p>
            </div>
            
            <div>
                <h3 class="text-lg font-bold mb-4 pb-2 border-b-2 border-secondary inline-block">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="" class="hover:text-light transition-colors">Home</a></li>
                    <li><a href="" class="hover:text-light transition-colors">Categories</a></li>
                    <li><a href="" class="hover:text-light transition-colors">About</a></li>
                    <li><a href="" class="hover:text-light transition-colors">Contact</a></li>
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
            <p>&copy; {{ now()->year }} Nazarch Studio. All rights reserved.</p>
            <p>Designed with passion by Nazarch Team</p>
        </div>
    </div>
</footer> --}}

<footer class="bg-coklat text-white pt-14 pb-5">
    <div class="container mx-auto px-0">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
            <div>
                <div class="flex items-center gap-4 mb-4">
                    <img src="{{url('/upload/rumah.jpg')}}" alt="Nazarch Studio Logo" class="w-16 rounded">
                    <h3 class="text-lg font-semibold border-b-2 border-transparent inline-block">Nazarch Studio</h3>
                </div>
                <p>We create aesthetic spaces with soul. Architecture, Interior, and beyond.</p>
            </div>

            <div>
                <h3 class="text-lg font-semibold border-b-2 border-transparent inline-block mb-3">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-light transition-colors">Home</a></li>
                    <li><a href="#" class="hover:text-light transition-colors">Categories</a></li>
                    <li><a href="#" class="hover:text-light transition-colors">About</a></li>
                    <li><a href="#" class="hover:text-light transition-colors">Contact</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-semibold border-b-2 border-transparent inline-block mb-3">Contact Us</h3>
                <div class="flex items-center gap-2 mb-2">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>3015 Grand Ave, Coconut Grove, Merrick Way, FL 12345</span>
                </div>
                <div class="flex items-center gap-2 mb-2">
                    <i class="fas fa-phone-alt"></i>
                    <span>+023-456-789</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="fas fa-envelope"></i>
                    <span>sales@example.com</span>
                </div>
            </div>

            <div>
                <h3 class="text-lg font-semibold border-b-2 border-transparent inline-block mb-3">Stay Updated</h3>
                <form class="flex gap-1">
                    <input type="email" placeholder="Enter your email"
                        class="flex-1 px-3 py-2 rounded text-hitam outline-none" required>
                    <button type="submit"
                        class="bg-hitam text-white px-4 py-2 rounded hover:bg-orange-700 transition-colors">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
                <div class="mt-4">
                    <a href="#" class="mr-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.tiktok.com/@nazarch.studio?_t=ZS-8wfhyj3r46S&_r=1" class="mr-3"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com/nazarch.studio?igsh=c3UzMmM2bHBtcnBy Ig" class="mr-3"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="mr-3"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>

        <div class="pt-5 border-t border-white/10 text-center text-light text-sm">
            <p>&copy; 2023 Nazarch Studio. All rights reserved.</p>
            <p>Designed with passion by Nazarch Team</p>
        </div>
    </div>
</footer>