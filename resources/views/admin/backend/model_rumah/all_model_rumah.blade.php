@extends('admin.layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">DAFTAR MODEL RUMAH</h1>
            <a href="{{ route('admin.model_rumah.create') }}"
                class="bg-cokelat hover:bg-amber-800 text-white px-4 py-2 rounded-lg flex items-center">
                <i class="fas fa-plus mr-2"></i>
                Tambah Data
            </a>
        </div>


<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="overflow-x-auto">
        <table class="table-auto w-full  border">
            <thead class="bg-cokelat sticky top-0 z-10">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-putih uppercase tracking-wider">
                        ID
                    </th>
                    <th class="px-2 py-3 text-left text-xs font-medium text-putih uppercase tracking-wider">
                        Nama Model
                    </th>
                    <th class="px-8 py-3 text-left text-xs font-medium text-putih uppercase tracking-wider">
                        Aksi
                    </th>
                </tr>
            </thead>
        </table>

        <div class="overflow-y-auto max-h-[500px]">
            <table class="min-w-full table-auto">
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($models as $model)
                        <tr 
                            onclick="window.location.href='{{ route('all.category', $model->id) }}'"
                            class="cursor-pointer hover:bg-gray-50 transition"
                        >
                            <td class="px-4 py-2 border">{{ $model->id }}</td>
                            <td class="px-4 py-2 border">{{ $model->nama_model }}</td>
                            <td class="px-4 py-2 border">
                                <div class="flex gap-2" onclick="event.stopPropagation();">
                                    <a href="{{ route('admin.model_rumah.edit', $model->id) }}" 
                                       class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.model_rumah.destroy', $model->id) }}" method="POST" 
                                          onsubmit="return confirm('Yakin hapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-4 py-2 border text-center">
                                Belum ada data model rumah
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
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