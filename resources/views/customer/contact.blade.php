@extends('customer.layouts.app')

@section('content')

<section>
    <header class="bg-gradient-to-br from-coklat to-coklat text-white py-20 text-center mb-12 mt-16">
        <div class="container mx-auto px-5 max-w-6xl">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Hubungi Kami</h1>
            <p class="text-xl max-w-3xl mx-auto opacity-90">
                Tim kami siap membantu Anda. Silakan hubungi melalui berbagai cara di bawah ini atau kirim pesan
                langsung melalui form kontak.
            </p>
        </div>
    </header>

    <div class="container mx-auto px-5 max-w-6xl">
        <!-- Contact Cards Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
            <!-- Location Card -->
            <div class="bg-white rounded-xl shadow-lg p-8 transition-transform duration-300 hover:-translate-y-2">
                <i class="fas fa-map-marker-alt text-primary text-4xl mb-6"></i>
                <h3 class="text-secondary text-xl font-bold mb-4">Lokasi Kami</h3>
                <div class="space-y-2">
                    <p><strong>Kantor Pusat</strong></p>
                    <p>Gedung Contoh, Lantai 5</p>
                    <p>Jl. Contoh Raya No. 123</p>
                    <p>Jakarta Selatan, 12345</p>
                    <p>Indonesia</p>
                </div>
            </div>

            <!-- Phone Card -->
            <div class="bg-white rounded-xl shadow-lg p-8 transition-transform duration-300 hover:-translate-y-2">
                <i class="fas fa-phone-alt text-primary text-4xl mb-6"></i>
                <h3 class="text-secondary text-xl font-bold mb-4">Telepon & WhatsApp</h3>
                <div class="space-y-2">
                    <p><strong>Customer Service</strong></p>
                    <p>+62 21 1234 5678</p>
                    <p>+62 812 3456 7890 (WhatsApp)</p>
                    <p><strong>Jam Operasional:</strong></p>
                    <p>Senin-Jumat: 08.00-17.00 WIB</p>
                </div>
            </div>

            <!-- Email Card -->
            <div class="bg-white rounded-xl shadow-lg p-8 transition-transform duration-300 hover:-translate-y-2">
                <i class="fas fa-envelope text-primary text-4xl mb-6"></i>
                <h3 class="text-secondary text-xl font-bold mb-4">Email & Media Sosial</h3>
                <div class="space-y-2">
                    <p><strong>Email Utama</strong></p>
                    <p>info@perusahaananda.com</p>
                    <p><strong>Marketing</strong></p>
                    <p>marketing@perusahaananda.com</p>
                    <p><strong>Instagram:</strong> @perusahaananda</p>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="bg-white rounded-xl shadow-lg p-10 mb-16">
            <h2 class="text-secondary text-2xl font-bold mb-8">Kirim Pesan Langsung</h2>
            <form action="#" method="POST">
                <div class="mb-6">
                    <label for="name" class="block text-secondary font-semibold mb-2">Nama Lengkap</label>
                    <input type="text" id="name" name="name"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-primary outline-none transition"
                        required>
                </div>

                <div class="mb-6">
                    <label for="email" class="block text-secondary font-semibold mb-2">Alamat Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-primary outline-none transition"
                        required>
                </div>

                <div class="mb-6">
                    <label for="phone" class="block text-secondary font-semibold mb-2">Nomor Telepon</label>
                    <input type="tel" id="phone" name="phone"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-primary outline-none transition">
                </div>

                <div class="mb-6">
                    <label for="subject" class="block text-secondary font-semibold mb-2">Subjek</label>
                    <select id="subject" name="subject"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-primary outline-none transition"
                        required>
                        <option value="" disabled selected>Pilih subjek</option>
                        <option value="general">Pertanyaan Umum</option>
                        <option value="product">Informasi Produk</option>
                        <option value="support">Dukungan Teknis</option>
                        <option value="partnership">Kemitraan</option>
                        <option value="career">Karir</option>
                        <option value="other">Lainnya</option>
                    </select>
                </div>

                <div class="mb-8">
                    <label for="message" class="block text-secondary font-semibold mb-2">Pesan Anda</label>
                    <textarea id="message" name="message"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-primary outline-none transition min-h-[150px]"
                        required></textarea>
                </div>

                <button type="submit"
                    class="bg-coklat text-white px-8 py-4 rounded-lg font-semibold hover:bg-secondary transition">
                    Kirim Pesan
                </button>
            </form>
        </div>

        <!-- Map Section -->
        <div class="h-96 mb-16 rounded-xl shadow-lg overflow-hidden">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.81956135000001!3d-6.1945959999999945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTEnNDAuNiJTIDEwNsKwNDknMTAuNCJF!5e0!3m2!1sen!2sid!4v1620000000000!5m2!1sen!2sid"
                class="w-full h-full border-0" allowfullscreen="" loading="lazy">
            </iframe>
        </div>

        <!-- Business Hours -->
        <div class="bg-white rounded-xl shadow-lg p-8 mb-16">
            <h2 class="text-secondary text-2xl font-bold mb-6">Jam Operasional</h2>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="text-left">
                            <th class="py-3 px-4">Hari</th>
                            <th class="py-3 px-4">Jam Buka</th>
                            <th class="py-3 px-4">Jam Tutup</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="even:bg-lightbg">
                            <td class="py-3 px-4">Senin</td>
                            <td class="py-3 px-4">08.00</td>
                            <td class="py-3 px-4">17.00</td>
                        </tr>
                        <tr class="even:bg-lightbg">
                            <td class="py-3 px-4">Selasa</td>
                            <td class="py-3 px-4">08.00</td>
                            <td class="py-3 px-4">17.00</td>
                        </tr>
                        <tr class="even:bg-lightbg">
                            <td class="py-3 px-4">Rabu</td>
                            <td class="py-3 px-4">08.00</td>
                            <td class="py-3 px-4">17.00</td>
                        </tr>
                        <tr class="even:bg-lightbg">
                            <td class="py-3 px-4">Kamis</td>
                            <td class="py-3 px-4">08.00</td>
                            <td class="py-3 px-4">17.00</td>
                        </tr>
                        <tr class="even:bg-lightbg">
                            <td class="py-3 px-4">Jumat</td>
                            <td class="py-3 px-4">08.00</td>
                            <td class="py-3 px-4">16.30</td>
                        </tr>
                        <tr class="even:bg-lightbg">
                            <td class="py-3 px-4">Sabtu</td>
                            <td class="py-3 px-4">09.00</td>
                            <td class="py-3 px-4">14.00</td>
                        </tr>
                        <tr class="even:bg-lightbg">
                            <td class="py-3 px-4">Minggu</td>
                            <td colspan="2" class="py-3 px-4 text-center">Libur</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection