<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nazarch Studio</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Serif:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #40342A;
            --secondary-color: #F97316;
            --light-color: #F2F0EB;
            --white-color: #fff;
            --dark-color: #000000;
            --gray-color: #666;
            --shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-color);
            color: var(--dark-color);
            line-height: 1.6;
        }

        /* Navigation */
        .navbar {
            background-color: var(--primary-color);
            padding: 10px 0;
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 100;
            transition: opacity 0.3s ease;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo {
            color: var(--white-color);
            font-size: 1.3rem;
            font-weight: 700;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 60px;
        }

        .nav-links a {
            color: var(--white-color);
            text-decoration: none;
            font-weight: 500;
            font-size: 1rem;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: var(--light-color);
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .profile-name {
            color: var(--white-color);
            font-size: 1rem;
            font-weight: 600;
        }

        .profile-img {
            width: 45px;
            height: 45px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid var(--white-color);
        }

        /* Hero Section */
        .hero {
            margin: 40px 0;
            display: flex;
            justify-content: center;
            padding: 0 20px;
        }

        .hero-container {
            position: relative;
            width: 100%;
            max-width: 1100px;
            height: 500px;
            border-radius: 40px;
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        .hero-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
            transition: opacity 1s ease-in-out;
        }

        .hero-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: var(--white-color);
            text-align: center;
            z-index: 10;
            width: 100%;
            padding: 0 20px;
        }

        .hero-title {
            font-family: 'Serif', serif;
            font-weight: 700;
            font-size: 3rem;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .hero-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .btn {
            padding: 10px 25px;
            border: none;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: var(--white-color);
            color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--light-color);
        }

        .btn-secondary {
            background-color: var(--secondary-color);
            color: var(--white-color);
        }

        .btn-secondary:hover {
            background-color: #e05d0a;
        }

        /* Features Section */
        .features {
            padding: 60px 20px;
            background-color: #f8f6f2;
            display: flex;
            justify-content: center;
        }

        .features-container {
            max-width: 1200px;
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
        }

        .features-left,
        .features-right {
            flex: 1;
            min-width: 300px;
        }

        .features-left h2 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .images-stack {
            position: relative;
            width: fit-content;
        }

        .images-stack img {
            width: 300px;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
        }


        .images-stack .stacked {
            position: absolute;
            top: 90px;
            left: 60px;
            z-index: 2;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .features-right p {
            margin-bottom: 15px;
            font-size: 15px;
        }

        .design-options {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin: 20px 0;
        }

        .design-options button {
            padding: 10px 16px;
            background-color: #3d2b1f;
            color: #fff;
            border: none;
            border-radius: 20px;
            font-size: 13px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .design-options button:hover {
            background-color: #5c4436;
        }

        /* Gallery Section */
        .gallery {
            padding: 60px 0;
            background-color: var(--light-color);
            text-align: center;
        }

        .section-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--primary-color);
        }

        .section-subtitle {
            color: var(--gray-color);
            margin-bottom: 2.5rem;
        }

        .gallery-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            margin-bottom: 2rem;
        }

        .gallery-card {
            width: 300px;
            background: var(--white-color);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
        }

        .gallery-card:hover {
            transform: translateY(-5px);
        }

        .gallery-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .gallery-title {
            font-size: 1.1rem;
            padding: 1rem;
            color: var(--primary-color);
        }

        /* Footer */
        .footer {
            background-color: var(--primary-color);
            color: var(--white-color);
            padding: 50px 0 20px;
        }

        .footer-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-bottom: 30px;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 1rem;
        }

        .footer-logo-img {
            width: 70px;
            height: auto;
            border-radius: 5px;
        }

        .footer-title {
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
            color: var(--white-color);
            padding-bottom: 8px;
            border-bottom: 2px solid transparent;
            display: inline-block;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.8rem;
        }

        .footer-links a {
            color: var(--white-color);
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-links a:hover {
            color: var(--light-color);
        }

        .contact-info {
            margin-bottom: 0.8rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .newsletter-form {
            display: flex;
            gap: 5px;
        }

        .newsletter-input {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 3px;
            outline: none;
        }

        .newsletter-btn {
            background-color: var(--secondary-color);
            color: var(--white-color);
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .newsletter-btn:hover {
            background-color: #e05d0a;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--light-color);
            font-size: 0.9rem;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                gap: 15px;
            }

            .nav-links {
                gap: 20px;
            }

            .hero-title {
                font-size: 2rem;
            }

            .features-container {
                flex-direction: column;
            }

            .footer-container {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .hero-title {
                font-size: 1.8rem;
            }

            .hero-buttons {
                flex-direction: column;
                gap: 10px;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="container nav-container">
            <div class="nav-brand">
                <img src="logo.jpg" alt="Logo" class="profile-img">
                <a href="#" class="logo">Nazarch Studio</a>
            </div>

            <div class="nav-links">
                <a href="#">Home</a>
                <a href="{{route('customer.kategori')}}">Categories</a>
                <a href="#">About</a>
                <a href="#">Contact</a>
            </div>

            <div class="profile dropdown">
                <span class="profile-name">Moch. Dzaky Musyaddad</span>
                <img src="{{url ('/upload/rumah.jpg')}}" alt="Profile" class="profile-img dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"">
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Keranjang</a></li>
                    <li><a class="dropdown-item" href="{{route('logout')}}">Log Out</a></li>
                  </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-container">
            <img src="{{url('/upload/rumah.jpg')}}" class="hero-image slide" style="opacity: 1;">
            <img src="{{url('/upload/rumah1.jpg')}}" class="hero-image slide" style="opacity: 0;">
            
            <div class="hero-content">
                <h1 class="hero-title">We Create Amazing Design</h1>
                <div class="hero-buttons">
                    <button class="btn btn-primary">Login</button>
                    <button class="btn btn-secondary">Register</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="features-container">
            <!-- KIRI -->
            <div class="features-left">
                <h2>We are creative Interior and architech - Design company</h2>
                <div class="images-stack">
                    <img src="{{url('/upload/rumah.jpg')}}" alt="image 1">
                    <img src="{{url('/upload/rumah.jpg')}}" alt="image 2" class="stacked">
                </div>
            </div>

            <!-- KANAN -->
            <div class="features-right">
                <p>
                    Desain arsitektur adalah seni mengubah ruang menjadi pengalaman. Setiap sudut, setiap garis,
                    setiap material memiliki cerita yang ingin diceritakan. Menciptakan ruang yang tidak hanya
                    dilihat, tetapi juga dirasakan.
                </p>

                <div class="design-options">
                    <button>3D SPACE DESIGN</button>
                    <button>ARCHITECTURE</button>
                    <button>INTERIOR DESIGN</button>
                    <button>VEGAN DESIGN</button>
                </div>

                <p>Lorem ipsum dolor sit amet</p>
                <p><a href="#">Lorem ipsum dolor sit amet asiekewww</a></p>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery">
        <div class="container">
            <div class="explore-title">
                <h2 class="section-title">Explore Our Designs</h2>
                <p class="section-subtitle">Get inspired by our latest creative interior and architectural masterpieces.</p>
            </div>
            
            <div class="gallery-container">
                <div class="gallery-card">
                    <img src="{{ asset('image/foto.jpg') }}" alt="Design 1" class="gallery-image">
                    <h4 class="gallery-title">Modern Living Room</h4>
                </div>
                <div class="gallery-card">
                    <img src="{{ asset('image/foto.jpg') }}" alt="Design 2" class="gallery-image">
                    <h4 class="gallery-title">Contemporary Kitchen</h4>
                </div>
                <div class="gallery-card">
                    <img src="{{ asset('image/foto.jpg') }}" alt="Design 3" class="gallery-image">
                    <h4 class="gallery-title">Minimalist Bedroom</h4>
                </div>
            </div>
            
            <a href="#" class="btn btn-secondary">View More Designs</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-container">
                <div class="footer-section">
                    <div class="footer-logo">
                        <img src="{{url('/upload/rumah.jpg')}}" alt="Nazarch Studio Logo" class="footer-logo-img">
                        <h3 class="footer-title">Nazarch Studio</h3>
                    </div>
                    <p>We create aesthetic spaces with soul. Architecture, Interior, and beyond.</p>
                </div>
                
                <div class="footer-section">
                    <h3 class="footer-title">Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Categories</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3 class="footer-title">Contact Us</h3>
                    <div class="contact-info">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>3015 Grand Ave, Coconut Grove, Merrick Way, FL 12345</span>
                    </div>
                    <div class="contact-info">
                        <i class="fas fa-phone-alt"></i>
                        <span>+023-456-789</span>
                    </div>
                    <div class="contact-info">
                        <i class="fas fa-envelope"></i>
                        <span>sales@example.com</span>
                    </div>
                </div>
                
                <div class="footer-section">
                    <h3 class="footer-title">Stay Updated</h3>
                    <form class="newsletter-form">
                        <input type="email" placeholder="Enter your email" class="newsletter-input" required>
                        <button type="submit" class="newsletter-btn">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                    <div class="social-links" style="margin-top: 15px;">
                        <a href="#" style="margin-right: 10px;"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" style="margin-right: 10px;"><i class="fab fa-twitter"></i></a>
                        <a href="#" style="margin-right: 10px;"><i class="fab fa-instagram"></i></a>
                        <a href="#" style="margin-right: 10px;"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
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
        const navbar = document.querySelector('.navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.style.opacity = '0.9';
            } else {
                navbar.style.opacity = '1';
            }
        });
    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

</body>
</html>