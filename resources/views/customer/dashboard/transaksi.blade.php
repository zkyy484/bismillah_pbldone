<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - Nama Toko</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <style>
        /* Scrollbar vertikal */
        .overflow-y-auto::-webkit-scrollbar {
            width: 6px;
        }

        .overflow-y-auto::-webkit-scrollbar-thumb {
            background-color: #c1c1c1;
            border-radius: 3px;
        }

        .overflow-y-auto::-webkit-scrollbar-track {
            background-color: #f1f1f1;
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

        .slide {
            transition: opacity 1s ease-in-out;
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

            <!-- Riwayat Pemesanan -->
            <div class="flex-grow bg-white rounded-lg shadow-none p-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Riwayat Transaksi</h2>
                <hr class="border-a border-gray-300 mb-8">

                <!-- Container utama dengan batasan tinggi -->
                <div class="max-h-[70vh] flex flex-col"> <!-- Batasi tinggi maksimal -->
                    <!-- Container scroll dengan flex-1 -->
                    <div class="flex-1 overflow-y-auto pr-2"> <!-- Gunakan flex-1 untuk mengisi ruang tersedia -->
                        <div class="flex flex-col gap-4"> <!-- Container untuk card-card -->
                            @forelse ($transactions as $transaction)
                                <div class="flex flex-col md:flex-row bg-cream rounded-lg shadow p-4 gap-6 hover:scale-[1.005] transition">
                                    <!-- Gambar bukti pembayaran -->
                                    <div class="w-full md:w-1/4 h-48">
                                        @if($transaction->payment_receipt)
                                            <img src="{{ asset($transaction->payment_receipt) }}" alt="Bukti Pembayaran"
                                                class="w-full h-full object-cover rounded-lg shadow">
                                        @else
                                            <div
                                                class="w-full h-full flex items-center justify-center bg-gray-200 rounded-lg text-gray-500">
                                                Tidak ada bukti
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Informasi transaksi -->
                                    <div class="flex-1 flex flex-col justify-between">
                                        <div>
                                            <h3 class="text-xl font-bold text-coklat mb-2">Invoice: #00{{ $transaction->order->id }}NAZARCH
                                            </h3>
                                            <p class="text-gray-800 mb-1"><span class="font-semibold">Nama Produk:</span>
                                                {{ $transaction->order->category->nama_categori }}
                                            </p>
                                            <p class="text-gray-800 mb-1"><span class="font-semibold">Metode Pembayaran:</span>
                                                {{ $transaction->payment_method }}
                                            </p>
                                            <p class="text-gray-800 mb-1"><span class="font-semibold">Harga Total:</span> Rp
                                                {{ number_format($transaction->amount, 0, ',', '.') }}
                                            </p>
                                            <p class="text-gray-800"><span class="font-semibold">Status:</span>
                                                <span class="inline-block px-2 py-1 text-sm rounded 
                                        @if($transaction->status === 'pending') bg-yellow-400 text-white 
                                        @elseif($transaction->status === 'paid') bg-green-500 text-white 
                                        @else bg-gray-400 text-white @endif">
                                                    {{ ucfirst($transaction->status) }}
                                                </span>
                                            </p>
                                        </div>

                                        <div class="mt-4">
                                            <a href="{{ route('invoice.download', $transaction->order_id) }}"
                                                    class="inline-block bg-primary text-white px-4 py-2 rounded hover:bg-primaryHover">
                                                    Unduh Invoice
                                                </a>
                                        </div>

                
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-600">Belum ada transaksi.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
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