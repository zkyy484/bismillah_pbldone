@extends('admin.layouts.app')

@section('title', 'Dashboard Overview')

@section('content')
    <div class="space-y-8">
        <div class="flex justify-between items-center mb-10 mt-4">
            <h1 class="text-2xl font-bold text-gray-800">DASHBOARD UTAMA</h1>
        </div>

        <!-- Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

            <!-- Total Desain -->
            <div class="bg-putih rounded-xl shadow-md p-6 border border-abu/10">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-abu/70">Desain Rumah</p>
                        <h3 class="text-2xl font-bold text-cokelat">{{ $totalDesain }}</h3>
                    </div>
                    <div class="bg-kuning p-3 rounded-full">
                        <i class="fas fa-drafting-compass text-cokelat text-lg"></i>
                    </div>
                </div>
            </div>

            <!-- Total Pesanan -->
            <div class="bg-putih rounded-xl shadow-md p-6 border border-abu/10">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-abu/70">Pesanan</p>
                        <h3 class="text-2xl font-bold text-cokelat">{{ $totalPesanan }}</h3>
                    </div>
                    <div class="bg-kuning p-3 rounded-full">
                        <i class="fas fa-file-alt text-cokelat text-lg"></i>
                    </div>
                </div>
            </div>

            <!-- Total Transaksi -->
            <div class="bg-putih rounded-xl shadow-md p-6 border border-abu/10">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-abu/70">Transaksi</p>
                        <h3 class="text-2xl font-bold text-cokelat">{{ $totalTransaksi }}</h3>
                    </div>
                    <div class="bg-kuning p-3 rounded-full">
                        <i class="fas fa-credit-card text-cokelat text-lg"></i>
                    </div>
                </div>
            </div>

            <!-- Total Ulasan -->
            <div class="bg-putih rounded-xl shadow-md p-6 border border-abu/10">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-abu/70">Ulasan</p>
                        <h3 class="text-2xl font-bold text-cokelat">{{ $totalUlasan }}</h3>
                    </div>
                    <div class="bg-kuning p-3 rounded-full">
                        <i class="fas fa-comments text-cokelat text-lg"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Management Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-putih rounded-xl shadow-md p-5 border border-abu/10 flex flex-col justify-between">
                <div>
                    <h4 class="text-lg font-semibold text-cokelat mb-2">Manajemen Desain</h4>
                    <p class="text-abu text-sm mb-4">Kelola desain rumah yang tersedia.</p>
                </div>
                <a href="{{ route('all.category') }}"
                    class="mt-auto text-sm bg-cokelat text-putih px-4 py-2 rounded hover:bg-opacity-90 transition">Kelola
                    Desain</a>
            </div>

            <div class="bg-putih rounded-xl shadow-md p-5 border border-abu/10 flex flex-col justify-between">
                <div>
                    <h4 class="text-lg font-semibold text-cokelat mb-2">Manajemen Pesanan</h4>
                    <p class="text-abu text-sm mb-4">Pantau dan proses pesanan pelanggan.</p>
                </div>
                <a href="{{ route('all.order') }}"
                    class="mt-auto text-sm bg-cokelat text-putih px-4 py-2 rounded hover:bg-opacity-90 transition">Kelola
                    Pesanan</a>
            </div>

            <div class="bg-putih rounded-xl shadow-md p-5 border border-abu/10 flex flex-col justify-between">
                <div>
                    <h4 class="text-lg font-semibold text-cokelat mb-2">Manajemen Transaksi</h4>
                    <p class="text-abu text-sm mb-4">Verifikasi dan kelola transaksi pembayaran.</p>
                </div>
                <a href="{{ route('transaksi') }}"
                    class="mt-auto text-sm bg-cokelat text-putih px-4 py-2 rounded hover:bg-opacity-90 transition">Kelola
                    Transaksi</a>
            </div>

            <div class="bg-putih rounded-xl shadow-md p-5 border border-abu/10 flex flex-col justify-between">
                <div>
                    <h4 class="text-lg font-semibold text-cokelat mb-2">Manajemen Ulasan</h4>
                    <p class="text-abu text-sm mb-4">Lihat dan moderasi ulasan pelanggan.</p>
                </div>
                <a href="{{ route('ulasan') }}"
                    class="mt-auto text-sm bg-cokelat text-putih px-4 py-2 rounded hover:bg-opacity-90 transition">Kelola
                    Ulasan</a>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="bg-putih rounded-xl shadow-md p-6 border border-abu/10">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-semibold text-cokelat">Aktivitas Terbaru</h3>
                <a href="" class="text-sm text-cokelat hover:underline">Lihat Semua</a>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-abu/10 text-sm">
                    <thead class="bg-abu/5">
                        <tr>
                            <th class="px-6 py-3 text-left font-medium text-abu uppercase">ID</th>
                            <th class="px-6 py-3 text-left font-medium text-abu uppercase">Aktivitas</th>
                            <th class="px-6 py-3 text-left font-medium text-abu uppercase">Waktu</th>
                            <th class="px-6 py-3 text-left font-medium text-abu uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-putih divide-y divide-abu/10">
                        @foreach ($latestActivities as $activity)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-abu">{{ $activity->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-abu">{{ $activity->activity }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-abu">
                                    {{ $activity->created_at->format('d M Y, H:i') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-abu">
                                    <a href="{{ $activity->link }}"
                                        class="inline-block px-4 py-2 bg-cokelat text-white text-sm font-semibold rounded-md shadow hover:bg-cokelat transition">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection