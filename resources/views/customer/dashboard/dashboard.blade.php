<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - Nama Toko</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    {{--
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#4CAF50',
                        primaryHover: '#45a049',
                    }
                }
            }
        }
    </script> --}}

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
                        primary: '#4CAF50',
                        primaryHover: '#45a049',
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
@php
    $id = Auth::user()->id;
    $profileData = App\Models\User::find($id);
@endphp

<body class="flex flex-col min-h-screen bg-gray-100">
    <!-- Header -->
    @include('customer.dashboard.header')

    <!-- Main Content -->
    <main class="flex-grow container mx-auto px-4 py-8 mt-16">
        <div class="flex flex-col lg:flex-row gap-6">
            <!-- Sidebar -->
            @include('customer.dashboard.sidebar')

            <!-- Content -->
            <div class="flex-grow bg-white rounded-lg shadow-md p-8">
                <div class="flex justify-between items-center pb-4 mb-8 border-b border-gray-200">
                    <h2 class="text-2xl font-semibold text-gray-800">Edit Profil</h2>
                </div>

                <form class="space-y-6" method="POST" action="{{ route('profile.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    
                    <div>
                        <label for="name" class="block text-gray-700 font-medium mb-2">Username</label>
                        <input type="text" id="name" name="name" value="{{$profileData->name}}"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    </div>

                    <div>
                        <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                        <input type="email" id="email" name="email" value="{{$profileData->email}}"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    </div>

                    <div>
                        <label for="phone" class="block text-gray-700 font-medium mb-2">Nomor Telepon</label>
                        <input type="tel" id="phone" name="phone" value="{{$profileData->phone}}"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    </div>

                    <div>
                        <label for="addres" class="block text-gray-700 font-medium mb-2">Alamat</label>
                        <input type="text" id="addres" name="addres" value="{{$profileData->addres}}"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    </div>

                    <div class="form-group mb-4">
                        <label for="photo" class="block text-sm font-medium text-gray-700 mb-2">Foto Profile</label>
                        <input type="file" name="photo" id="photo"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                            accept="image/*">

                        {{-- Preview --}}
                        <div id="preview-container" class="mt-4 hidden">
                            <p class="text-sm text-gray-600 mb-2">Photo:</p>
                            <img id="preview-image"
                                src="{{(!empty($profileData->photo)) ? url('upload/user_images/' . $profileData->photo) : url('upload/no_image.jpg') }}"
                                alt="Preview" class="w-40 h-auto rounded-full border-4 border-amber-800 shadow-md">
                        </div>

                        @error('photo')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="bg-coklat text-white px-6 py-3 rounded hover:bg-abu transition">
                        Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>
    </main>

    <!-- Footer -->
    @include('customer.dashboard.footer')

    <script>
        // JavaScript untuk interaksi
        document.addEventListener('DOMContentLoaded', function () {
            // Tambahkan kelas active ke menu sidebar yang diklik
            const menuItems = document.querySelectorAll('aside ul li a');
            menuItems.forEach(item => {
            });

            // Edit profile button in sidebar
            const editProfileBtn = document.querySelector('aside button');
            editProfileBtn.addEventListener('click', function () {
                document.querySelector('main h2').scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>

    {{-- sc boostrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>

    {{-- sc navbar --}}
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

    {{-- preview image --}}
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

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- message --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <script>
        // Preview gambar saat dipilih
        $('#photo').on('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    $('#preview-image').attr('src', e.target.result);
                    $('#preview-container').removeClass('hidden');
                }
                reader.readAsDataURL(file);
            } else {
                $('#preview-container').addClass('hidden');
                $('#preview-image').attr('src', '');
            }
        });
    </script>

    {{-- message --}}
    <script>
        @if(Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>
</body>

</html>