@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-xl font-bold mb-4">Tambah Model Rumah</h1>
    <form action="{{ route('admin.model_rumah.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block">Nama Model</label>
            <input type="text" name="nama_model" class="border p-2 w-full" required>
        </div>
        <div>
            <label class="block">Status</label>
            <select name="status" class="border p-2 w-full">
                <option value="aktif">Aktif</option>
                <option value="nonaktif">Nonaktif</option>
            </select>
        </div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection
