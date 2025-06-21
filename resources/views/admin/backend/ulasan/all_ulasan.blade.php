@extends('admin.layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">DAFTAR ULASAN</h1>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-cokelat">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-putih uppercase tracking-wider">ID Order</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-putih uppercase tracking-wider">Nama Pemesan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-putih uppercase tracking-wider">Rating</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-putih uppercase tracking-wider">Komentar</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-putih uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($reviews as $review)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">#00{{ $review->order->id }}NAZARCH</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $review->user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-yellow-500 font-semibold">{{ $review->rating }} ★</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 max-w-xs break-words">{{ $review->comment }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm space-x-2">
                                @if(!$review->is_approved)
                                    <form id="approve-form-{{ $review->id }}" action="{{ route('admin.approve.ulasan', $review->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="button" onclick="confirmApprove({{ $review->id }})" class="bg-amber-500 hover:bg-amber-600 text-white px-3 py-1 rounded inline-flex items-center text-sm">
                                            <i class="fas fa-check mr-1"></i> Setujui
                                        </button>
                                    </form>
                                @else
                                    <span class="text-green-600 font-semibold text-sm mr-2">Disetujui</span>

                                    <form id="unapprove-form-{{ $review->id }}" action="{{ route('admin.unapprove.ulasan', $review->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="button" onclick="confirmUnapprove({{ $review->id }})" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded inline-flex items-center text-sm">
                                            <i class="fas fa-times mr-1"></i> Batal
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Load SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmApprove(id) {
            Swal.fire({
                title: 'Yakin ingin menyetujui ulasan ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, setujui',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('approve-form-' + id).submit();
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire('Batal', 'Ulasan batal disetujui', 'info');
                }
            });
        }

        function confirmUnapprove(id) {
            Swal.fire({
                title: 'Yakin ingin membatalkan persetujuan ulasan ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, batal',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('unapprove-form-' + id).submit();
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire('Batal', 'Aksi dibatalkan', 'info');
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
