<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - Nama Toko</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
    <main class="flex-grow container mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row gap-6">
            <!-- Sidebar -->
            @include('customer.dashboard.sidebar')

            <!-- Content -->
            <div class="flex-grow bg-white rounded-lg shadow-md p-8">
                <div class="flex justify-between items-center pb-4 mb-8 border-b border-gray-200">
                    <h2 class="text-2xl font-semibold text-gray-800">Change Password Profile</h2>
                </div>

                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="firstName" class="block text-gray-700 font-medium mb-2">Nama Depan</label>
                            <input type="text" id="firstName" value="Nama"
                                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>
                        <div>
                            <label for="lastName" class="block text-gray-700 font-medium mb-2">Nama Belakang</label>
                            <input type="text" id="lastName" value="User"
                                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                        <input type="email" id="email" value="user@example.com"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    </div>

                    <div>
                        <label for="phone" class="block text-gray-700 font-medium mb-2">Nomor Telepon</label>
                        <input type="tel" id="phone" value="081234567890"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    </div>

                    <div>
                        <label for="address" class="block text-gray-700 font-medium mb-2">Alamat</label>
                        <textarea id="address" rows="4"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">Jl. Contoh No. 123, Kota Contoh, 12345</textarea>
                    </div>

                    <div>
                        <label for="gender" class="block text-gray-700 font-medium mb-2">Jenis Kelamin</label>
                        <select id="gender"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                            <option value="male">Laki-laki</option>
                            <option value="female">Perempuan</option>
                            <option value="other" selected>Lainnya</option>
                        </select>
                    </div>

                    <div>
                        <label for="birthdate" class="block text-gray-700 font-medium mb-2">Tanggal Lahir</label>
                        <input type="date" id="birthdate" value="1990-01-01"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    </div>

                    <button type="submit"
                        class="bg-primary text-white px-6 py-3 rounded hover:bg-primaryHover transition">
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
                item.addEventListener('click', function (e) {
                    e.preventDefault();
                    menuItems.forEach(i => i.classList.remove('bg-gray-100', 'text-primary'));
                    this.classList.add('bg-gray-100', 'text-primary');
                });
            });

            // Handle form submission
            const profileForm = document.querySelector('form');
            profileForm.addEventListener('submit', function (e) {
                e.preventDefault();
                alert('Perubahan profil berhasil disimpan!');
                // Di sini Anda bisa menambahkan kode untuk mengirim data ke server
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
</body>

</html>