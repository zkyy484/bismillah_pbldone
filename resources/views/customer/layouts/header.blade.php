<!-- Navigation Bar -->
<nav class="bg-primary py-2.5 shadow-custom sticky top-0 z-50 transition-opacity duration-300">
    <div class="container mx-auto px-5">
        <div class="flex justify-between items-center">
            <div class="flex items-center gap-4">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="w-11 h-11 object-cover rounded-full border-2 border-white">
                <a href="" class="text-white text-xl font-bold">Nazarch Studio</a>
            </div>

            <div class="hidden md:flex gap-10">
                <a href="">Home</a>
                <a href="">Categories</a>
                <a href="">About</a>
                <a href="">Contact</a>
            </div>

            @auth
            <div class="flex items-center gap-4">
                <span class="text-white font-semibold"></span>
                <img src="" alt="Profile" class="w-11 h-11 object-cover rounded-full border-2 border-white">
            </div>
            @else
            <div class="flex gap-4">
                <a href="{{ route('login') }}" class="bg-white text-primary px-6 py-2 rounded-full font-semibold hover:bg-light transition-all">Login</a>
                <a href="{{ route('register') }}" class="bg-secondary text-white px-6 py-2 rounded-full font-semibold hover:bg-[#e05d0a] transition-all">Register</a>
            </div>
            @endauth
        </div>
    </div>
</nav>

<script>
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