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
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Order</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                            Pemesan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rating</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Comment</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        <!-- Kolom aksi -->
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($reviews as $review)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $review->order->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $review->user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-yellow-500 font-semibold">{{ $review->rating }}
                                ★</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $review->comment }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                @if(!$review->is_approved)
                                {{-- {{ route('admin.review.approve', $review->id) }} --}}
                                    <form action="{{route('admin.approve.ulasan', $review->id)}}" method="POST"
                                        onsubmit="return confirm('Setujui ulasan ini?')">
                                        @csrf
                                        <button type="submit"
                                            class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700 text-xs">
                                            Setujui
                                        </button>
                                    </form>
                                @else
                                    <span class="text-green-600 font-semibold text-sm">Disetujui</span>
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