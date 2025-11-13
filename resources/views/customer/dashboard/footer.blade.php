<footer class="bg-coklat text-white pt-14 pb-5">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
            <div>
                <div class="flex items-center gap-4 mb-4">
                    <img src="{{ url('/upload/image.png') }}" alt="Nazarch Studio Logo" class="w-16 rounded">
                    <h3 class="text-lg font-semibold border-b-2 border-transparent inline-block">Nazarch Studio</h3>
                </div>
                <p>Kami menciptakan ruang estetis yang berjiwa. Arsitektur, Interior, dan lainnya.</p>
            </div>

            <div>
                <h3 class="text-lg font-semibold border-b-2 border-white inline-block mb-3 pb-1">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="{{route('dashboard')}}" class="hover:text-light transition-colors block">Halaman Utama</a></li>
                    <li><a href="{{route('show.kategory')}}" class="hover:text-light transition-colors block">Kategori</a></li>
                    <li><a href="{{route('show.about_us')}}" class="hover:text-light transition-colors block">Tentang Kita</a></li>
                    <li><a href="{{route('show.contact')}}" class="hover:text-light transition-colors block">Kontak</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-semibold border-b-2 border-white inline-block mb-3 pb-1">Contact Us</h3>
                <div class="flex items-start gap-2 mb-2">
                    <i class="fas fa-map-marker-alt mt-1"></i>
                    <span class="text-sm">jln cengkeh, grogol giri banyuwangi</span>
                </div>
                <div class="flex items-center gap-2 mb-2">
                    <i class="fas fa-phone-alt"></i>
                    <span class="text-sm">+62 857-4841-1185</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="fas fa-envelope"></i>
                    <span class="text-sm">nazastudio1223@gmail.com</span>
                </div>
            </div>

            <div>
                <h3 class="text-lg font-semibold border-b-2 border-white inline-block mb-3 pb-1">Stay Updated</h3>
                <form class="flex flex-col sm:flex-row gap-2">
                    <input type="email" placeholder="Enter your email"
                        class="flex-1 px-3 py-2 rounded text-hitam outline-none" required>
                    <button type="submit"
                        class="bg-hitam text-white px-4 py-2 rounded hover:bg-orange-700 transition-colors flex items-center justify-center">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
                <div class="mt-4 flex space-x-4 text-xl justify-center md:justify-start">
                    <a href="#" aria-label="Facebook" class="hover:text-light transition-colors"><i
                            class="fab fa-facebook-f"></i></a>
                    <a href="https://www.tiktok.com/@nazarch.studio?_t=ZS-8wfhyj3r46S&_r=1" aria-label="TikTok"
                        class="hover:text-light transition-colors"><i class="fab fa-tiktok"></i></a>
                    <a href="https://www.instagram.com/nazarch.studio?igsh=c3UzMmM2bHBtcnBy" aria-label="Instagram"
                        class="hover:text-light transition-colors"><i class="fab fa-instagram"></i></a>
                    <a href="https://youtube.com/@nazarchstudio?si=E0Easn1c6wN7i5PE" aria-label="LinkedIn" class="hover:text-light transition-colors"><i
                            class="fab fa-youtube"></i></a>
                </div>

            </div>
        </div>

        <div class="pt-5 border-t border-white/10 text-center text-light text-sm space-y-1">
            <p>Copyright &copy; 2025 
                <a href="https://poliwangi.ac.id/" target="_blank" rel="noopener noreferrer"
       class="text-white-400 hover:text-blue-300 transition-colors">
       poliwangi.ac.id</a></p>
        </div>
        
        <div class="pt-1 text-center text-light text-sm space-y-1">
         <p>Dirancang Oleh <a href="{{ route('developinfo') }}" class="pt-5 border-t border-white/10 text-center text-light text-sm space-y-1">Tim Nazarch</a></p>
         </div>
    </div>
</footer>