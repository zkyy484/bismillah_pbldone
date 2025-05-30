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
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Order
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                            Pemesan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                            Produk</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Metode
                            Pembayaran</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Foto
                            Pembayaran</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        <!-- Kolom aksi -->
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($transactions as $transaction)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $transaction->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $transaction->order_id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $transaction->order->user->name}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $transaction->order->category->nama_categori}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ ucfirst($transaction->payment_method) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp
                                {{ number_format($transaction->amount, 0, ',', '.') }}</td>
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
                                    <a href="{{ asset('storage/' . $transaction->payment_receipt) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $transaction->payment_receipt) }}" alt="Bukti Pembayaran"
                                            class="w-16 h-16 object-cover rounded">
                                    </a>
                                @else
                                    <span class="text-gray-400 italic">Belum ada</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm space-x-2">
                                <!-- Tombol Edit -->
                                <a href="{{ route('admin.edit.transaksi', $transaction->id) }}"
                                    class="inline-block px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 text-xs">
                                    Edit
                                </a>

                                <!-- Form Hapus -->
                                <form action="{{ route('transaksi.delete', $transaction->id) }}" method="POST"
                                    class="inline-block" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-xs">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection

@section('scripts')
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
@endsection