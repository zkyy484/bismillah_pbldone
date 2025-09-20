@extends('admin.layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">
                DAFTAR MODEL {{ ucfirst($modelRumah->nama_model) }}
            </h1>

            </h1>
            <a href="{{ route('add.category') }}"
                class="bg-cokelat hover:bg-amber-800 text-white px-4 py-2 rounded-lg flex items-center">
                <i class="fas fa-plus mr-2"></i>
                Tambah Data
            </a>
        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full table-fixed border-collapse">
                    <thead class="bg-cokelat sticky top-0 z-10">
                        <tr>
                            <th class="w-16 px-4 py-3 text-center text-xs font-medium text-putih uppercase tracking-wider">
                                ID
                            </th>
                            <th class="w-64 px-4 py-3 text-left text-xs font-medium text-putih uppercase tracking-wider">
                                Nama Model
                            </th>
                            <th class="w-40 px-4 py-3 text-center text-xs font-medium text-putih uppercase tracking-wider">
                                Harga
                            </th>
                            <th class="w-32 px-4 py-3 text-center text-xs font-medium text-putih uppercase tracking-wider">
                                Status
                            </th>
                            <th class="w-64 px-4 py-3 text-center text-xs font-medium text-putih uppercase tracking-wider">
                                Action
                            </th>
                        </tr>
                    </thead>
                </table>

                <div class="overflow-y-auto max-h-[500px]">
                    <table class="min-w-full table-fixed border-collapse">
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($produk as $key => $item)
                                <tr>
                                    <!-- ID -->
                                    <td class="w-16 px-4 py-4 text-center text-sm text-gray-500">
                                        {{ $key + 1 }}
                                    </td>

                                    <!-- Nama Kategori -->
                                    <td class="w-64 px-4 py-4 text-left text-sm font-medium text-gray-900">
                                        {{ $item->nama_categori }}
                                    </td>

                                    <!-- Harga -->
                                    <td class="w-40 px-4 py-4 text-center text-sm font-medium text-gray-900">
                                        Rp {{ number_format($item->base_price, 0, ',', '.') }}
                                    </td>

                                    <!-- Status -->
                                    <td class="w-32 px-4 py-4 text-center">
                                        @if ($item->status == 'active')
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Aktif
                                            </span>
                                        @else
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                Nonaktif
                                            </span>
                                        @endif
                                        <!-- Tombol Toggle Status -->
                                        <form action="{{ route('admin.category.status', $item->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                class="px-3 py-1 rounded text-sm font-medium
                                        {{ $item->status == 'active' ? 'bg-red-500 hover:bg-red-600 text-white' : 'bg-green-500 hover:bg-green-600 text-white' }}">
                                                {{ $item->status == 'active' ? 'Nonaktifkan' : 'Aktifkan' }}
                                            </button>
                                        </form>
                                    </td>

                                    <!-- Action -->
                                    <td class="w-64 px-4 py-4 text-center text-sm text-gray-500 space-x-2">


                                        <!-- Tombol Edit -->
                                        <a href="{{ route('edit.category', $item->id) }}"
                                            class="bg-amber-500 hover:bg-amber-600 text-white px-3 py-1 rounded inline-flex items-center text-sm">
                                            <i class="fas fa-edit mr-1"></i> Edit
                                        </a>

                                        <!-- Tombol Hapus -->
                                        <a href="{{ route('delete.category', $item->id) }}"
                                            class="delete-confirm bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded inline-flex items-center text-sm">
                                            <i class="fas fa-trash mr-1"></i> Hapus
                                        </a>

                                        <!-- Tombol Detail -->
                                        <a href="{{ route('admin.detail.category', $item->id) }}"
                                            class="bg-biru hover:bg-biru text-white px-3 py-1 rounded inline-flex items-center text-sm">
                                            <i class="fas fa-info-circle mr-1"></i> Detail
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        @if (Session::has('message'))
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
