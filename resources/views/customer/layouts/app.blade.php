{{--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Nazarch Studio')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Serif:wght@700&display=swap"
        rel="stylesheet">
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
    @stack('styles')
</head>

<body class="font-poppins bg-light text-dark">
    @include('customer.layouts.header')

    <main>
        @yield('content')
    </main>

    @include('customer.layouts.footer')

    @stack('scripts')
</body>

</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nazarch Studio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .overlay {
            transform: translateY(100%);
            transition: transform 0.4s ease;
        }

        .item:hover .overlay {
            transform: translateY(0%);
        }

        .item:hover img {
            transform: scale(1.05);
        }

        .slide {
            transition: opacity 1s ease-in-out;
        }

        .overlay {
            transform: translateY(100%);
            transition: transform 0.4s ease;
        }

        .item:hover .overlay {
            transform: translateY(0%);
        }

        .item:hover img {
            transform: scale(1.05);
        }

        .slider-container {
            position: relative;
        }

        .slider-nav-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
            background: rgba(255, 255, 255, 0.7);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            border: none;
            outline: none;
            transition: all 0.3s ease;
        }

        .slider-nav-btn:hover {
            background: rgba(255, 255, 255, 0.9);
        }

        .slider-nav-btn.prev {
            left: 15px;
        }

        .slider-nav-btn.next {
            right: 15px;
        }

        .slider-nav-btn svg {
            width: 20px;
            height: 20px;
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        coklat: '#40342A',
                        cream: '#F2F0EB',
                        putih: '#fff',
                        hitam: '#000000',
                        abu: '#333',
                    },
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                    },
                    boxShadow: {
                        card: '0 4px 15px rgba(0,0,0,0.1)',
                        cardhover: '0 8px 20px rgba(63, 39, 2, 0.808)',
                        navbar: '0 2px 10px rgba(0,0,0,0.1)',
                    },
                }
            }
        }
    </script>
</head>

<body class="font-poppins bg-cream text-hitam">
    @include('customer.layouts.header')

    <main>
        @yield('content')
    </main>

    @include('customer.layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>
        const navbar = document.querySelector('nav');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.style.opacity = '0.8';
            } else {
                navbar.style.opacity = '1';
            }
        });

        const dropdownButton = document.getElementById('dropdownButton');
        const dropdownMenu = document.getElementById('dropdownMenu');
        dropdownButton.addEventListener('click', function () {
            dropdownMenu.classList.toggle('hidden');
        });

        document.addEventListener('click', function (e) {
            if (!dropdownButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    </script>

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
    </script>

    <script>
        // Inisialisasi Swiper
        document.addEventListener('DOMContentLoaded', function () {
            new Swiper('.swiper-container', {
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
            });
        });
    </script>
</body>

</html>