@extends('admin.layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">DAFTAR TRANSAKSI</h1>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow overflow-x-auto">
    <!-- Tambahin wrapper scroll -->
    <div class="max-h-[580px] overflow-y-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-cokelat sticky top-0 z-10">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-putih uppercase tracking-wider">Invoice</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-putih uppercase tracking-wider">Nama Pemesan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-putih uppercase tracking-wider">Nama Produk</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-putih uppercase tracking-wider">Metode Pembayaran</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-putih uppercase tracking-wider">Jumlah</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-putih uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-putih uppercase tracking-wider">Foto Pembayaran</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-putih uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($transactions as $transaction)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">#00{{ $transaction->order_id }}NAZARCH</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $transaction->order->user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $transaction->order->category->nama_categori }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ ucfirst($transaction->payment_method) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp {{ number_format($transaction->amount, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <span class="inline-block px-2 py-1 rounded-full text-xs font-semibold
                                @if($transaction->status == 'success') bg-green-100 text-green-700
                                @elseif($transaction->status == 'pending') bg-yellow-100 text-yellow-700
                                @else bg-red-100 text-red-700
                                @endif
                            ">
                                {{ ucfirst($transaction->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            @if($transaction->payment_receipt)
                                <a href="{{ asset($transaction->payment_receipt) }}" target="_blank">
                                    <img src="{{ asset($transaction->payment_receipt) }}" alt="Bukti Pembayaran"
                                        class="w-16 h-16 object-cover rounded">
                                </a>
                            @else
                                <span class="text-gray-400 italic">Belum ada</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <a href="{{ route('admin.edit.transaksi', $transaction->id) }}"
                                class="bg-amber-500 hover:bg-amber-600 text-white px-3 py-1 rounded mr-2 inline-flex items-center text-sm">
                                <i class="fas fa-edit mr-1"></i> Edit
                            </a>

                            <form id="delete-form-{{ $transaction->id }}" action="{{ route('transaksi.delete', $transaction->id) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="button"
                                    onclick="confirmDelete({{ $transaction->id }})"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded inline-flex items-center text-sm">
                                    <i class="fas fa-trash mr-1"></i> Hapus
                                </button>
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
                title: 'Hapus Transaksi?',
                text: "Transaksi ini akan dihapus secara permanen dari halaman transaksi!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e3342f',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire('Dibatalkan', 'Transaksi tidak jadi dihapus.', 'info');
                }
            });
        }

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
@endsection
