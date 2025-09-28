@extends('admin.layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">DAFTAR PEMESANAN</h1>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow overflow-x-auto">
            <!-- Scroll wrapper -->
            <div class="max-h-[580px] overflow-y-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-cokelat sticky top-0 z-10">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-putih uppercase tracking-wider">Nama
                                Pemesan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-putih uppercase tracking-wider">Kategori
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-putih uppercase tracking-wider">Luas
                                (m²)</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-putih uppercase tracking-wider">Catatan
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-putih uppercase tracking-wider">Total
                                Harga</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-putih uppercase tracking-wider">Status
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-putih uppercase tracking-wider">Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($orders as $order)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $order->user->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $order->category->nama_categori }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $order->total_area }} m²
                                </td>
                                <td class="px-6 py-4 whitespace-pre-wrap break-words text-sm text-gray-900 max-w-xs">
                                    {{ $order->notes }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    Rp {{ number_format($order->price, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <span
                                        class="inline-block px-2 py-1 rounded-full text-xs font-semibold
                                        @if ($order->status == 'Selesai') bg-green-100 text-green-700
                                        @elseif($order->status == 'Diproses') bg-yellow-100 text-yellow-700
                                        @else bg-red-100 text-red-700 @endif">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-center">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('edit.order', $order->id) }}"
                                            class="bg-amber-500 hover:bg-amber-600 text-white px-3 py-1 rounded inline-flex items-center text-sm">
                                            <i class="fas fa-edit mr-1"></i> Edit
                                        </a>

                                        <button onclick="confirmDelete('{{ $order->id }}')"
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded inline-flex items-center text-sm">
                                            <i class="fas fa-trash mr-1"></i> Hapus
                                        </button>
                                    </div>

                                    <form id="delete-form-{{ $order->id }}"
                                        action="{{ route('delete.order', $order->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Yakin ingin menghapus pemesanan ini?',
                text: "Tindakan ini tidak dapat dibatalkan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal',
                customClass: {
                    popup: 'custom-swal-popup',
                    confirmButton: 'swal2-confirm-button',
                    cancelButton: 'swal2-cancel-button'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>

    <style>
        .custom-swal-popup .swal2-actions {
            display: flex;
            justify-content: center;
            gap: 10px;
            /* jarak antar tombol */
        }

        .swal2-confirm-button {
            background-color: #e3342f;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-weight: 600;
        }

        .swal2-confirm-button:hover {
            background-color: #cc1f1a;
        }

        .swal2-cancel-button {
            background-color: #e2e8f0;
            color: black;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-weight: 600;
        }

        .swal2-cancel-button:hover {
            background-color: #cbd5e0;
        }
    </style>
@endsection
