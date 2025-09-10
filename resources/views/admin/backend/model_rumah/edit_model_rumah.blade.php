@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-xl font-bold mb-4">Edit Model Rumah</h1>
    <form action="{{ route('admin.model_rumah.update', $modelRumah->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label class="block">Nama Model</label>
            <input type="text" name="nama_model" value="{{ $modelRumah->nama_model }}" class="border p-2 w-full" required>
        </div>
        <div>
            <label class="block">Status</label>
            <select name="status" class="border p-2 w-full">
                <option value="aktif" {{ $modelRumah->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ $modelRumah->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>
        <button class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
