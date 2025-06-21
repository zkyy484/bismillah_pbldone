@extends('admin.layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">DAFTAR FOTO DESAIN RUMAH</h1>
            <a href="{{ route('add.catimage') }}"
                class="bg-cokelat hover:bg-amber-800 text-white px-4 py-2 rounded-lg flex items-center">
                <i class="fas fa-plus mr-2"></i>
                Tambah Data
            </a>
        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full table-fixed">
                    <thead class="bg-cokelat sticky top-0 z-10">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-putih uppercase tracking-wider w-12">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-putih uppercase tracking-wider w-48">ID Desain Rumah</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-putih uppercase tracking-wider w-36">Foto</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-putih uppercase tracking-wider w-48">Action</th>
                        </tr>
                    </thead>
                </table>
                <div class="overflow-y-auto max-h-[500px]">
                    <table class="min-w-full table-fixed">
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($cat_image as $key => $item)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 w-12">{{ $key + 1 }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 w-48">
                                        {{ $item->category->nama_categori }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap w-36">
                                        @if($item->image_path)
                                            <img src="{{ asset($item->image_path) }}" alt="Foto Kategori"
                                                class="w-16 h-16 object-cover rounded border border-gray-300">
                                        @else
                                            <span class="text-sm text-gray-400 italic">Tidak ada foto</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 w-48">
                                        <a href="{{ route('edit.catimage', $item->id) }}"
                                            class="bg-amber-500 hover:bg-amber-600 text-white px-3 py-1 rounded mr-2 inline-flex items-center text-sm">
                                            <i class="fas fa-edit mr-1"></i> Edit
                                        </a>
                                        <button data-href="{{ route('delete.catimage', $item->id) }}"
                                            class="delete-button bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded inline-flex items-center text-sm">
                                            <i class="fas fa-trash mr-1"></i> Hapus
                                        </button>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteButtons = document.querySelectorAll('.delete-button');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    const href = this.getAttribute('data-href');

                    Swal.fire({
                        title: 'Yakin ingin menghapus?',
                        text: 'Data ini akan dihapus secara permanen.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#e3342f',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal',
                        customClass: {
                            confirmButton: 'bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded',
                            cancelButton: 'bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded'
                        },
                        buttonsStyling: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = href;
                        }
                    });
                });
            });
        });

        // Toastr
        @if(Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch (type) {
                case 'info': toastr.info("{{ Session::get('message') }}"); break;
                case 'success': toastr.success("{{ Session::get('message') }}"); break;
                case 'warning': toastr.warning("{{ Session::get('message') }}"); break;
                case 'error': toastr.error("{{ Session::get('message') }}"); break;
            }
        @endif
    </script>
@endsection
