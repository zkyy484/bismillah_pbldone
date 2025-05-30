@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="max-w-md mx-auto bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Status Transaksi</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.update.transaksi', $transaction->id) }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="status" class="block text-gray-700 font-medium mb-2">Status Transaksi</label>
                <select name="status" id="status" required
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    <option value="pending" {{ $transaction->status === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="paid" {{ $transaction->status === 'paid' ? 'selected' : '' }}>Paid</option>
                    <option value="failed" {{ $transaction->status === 'failed' ? 'selected' : '' }}>Failed</option>
                </select>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded shadow transition duration-200">
                    Update Status
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
