@extends('admin.layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">DAFTAR FOTO BANNER</h1>
            <a href="{{ route('admin.tambah.banner') }}"
                class="bg-cokelat hover:bg-amber-800 text-white px-4 py-2 rounded-lg flex items-center">
                <i class="fas fa-plus mr-2"></i>
                Tambah Data
            </a>
        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="overflow-x-auto max-h-[570px] overflow-y-auto">
                <table class="min-w-full table-fixed divide-y divide-gray-200 border border-gray-200">
                    <thead class="bg-cokelat text-putih sticky top-0 z-10">
                        <tr>
                            <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider w-36">Foto</th>
                            <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider w-36">Status</th>
                            <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider w-48">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($banner as $item)
                            <tr class="text-center">
                                {{-- Foto --}}
                                <td class="px-6 py-4 w-36">
                                    @if ($item->photo_banner)
                                        <img src="{{ asset($item->photo_banner) }}" alt="Foto Banner"
                                            class="w-16 h-16 object-cover rounded border border-gray-300 mx-auto">
                                    @else
                                        <span class="text-sm text-gray-400 italic">Tidak ada foto</span>
                                    @endif
                                </td>

                                {{-- Status --}}
                                <td class="px-6 py-4 w-36">
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

                                    {{-- Tombol Toggle Status --}}
                                    <form action="{{ route('admin.banner.status', $item->id) }}" method="POST"
                                        class="mt-2">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="px-3 py-1 rounded text-sm font-medium
                                            {{ $item->status == 'active' ? 'bg-red-500 hover:bg-red-600 text-white' : 'bg-green-500 hover:bg-green-600 text-white' }}">
                                            {{ $item->status == 'active' ? 'Nonaktifkan' : 'Aktifkan' }}
                                        </button>
                                    </form>
                                </td>

                                {{-- Action --}}
                                <td class="px-6 py-4 w-48 text-center">
                                    <div class="flex justify-center">
                                        <form action="{{ route('admin.banner.delete', $item->id) }}" method="POST"
                                            class="delete-form">
                                            @csrf
                                            <button type="button"
                                                class="delete-button bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded inline-flex items-center text-sm">
                                                <i class="fas fa-trash mr-1"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
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
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-button');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();

                    const form = this.closest('form'); // cari form terdekat

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
                            form.submit(); // kirim form POST
                        }
                    });
                });
            });
        });


        // Toastr
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
