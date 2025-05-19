<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function CreateTransaksi(order $order)
    {
        // Pastikan hanya pemesan yang dapat melihat transaksi mereka
        if ($order->user_id != auth()->id()) {
            return redirect()->route('user.order')->with('error', 'Unauthorized access.');
        }

        return view('customer.transaksi', compact('order'));
    }

    public function TransaksiStore(Request $request, order $order)
    {
        $validated = $request->validate([
            'payment_method' => 'required|string',
            'amount' => 'required|numeric',
            'payment_receipt' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
        ]);

        // Simpan bukti pembayaran (jika ada)
        $receipt_path = null;
        if ($request->hasFile('payment_receipt')) {
            $receipt_path = $request->file('payment_receipt')->store('upload/image_transaksi', 'public');
        }

        // Buat transaksi
        $transaksi = Transaction::create([
            'order_id' => $order->id,
            'payment_method' => $validated['payment_method'],
            'amount' => $validated['amount'],
            'status' => 'pending',
            'payment_receipt' => $receipt_path,
        ]);

        // Update status order
        $order->update(['status' => 'pending']);

        return redirect()->route('user.thanks', $transaksi->id)->with('success', 'Pembayaran berhasil dibuat. Tunggu konfirmasi admin.');
    }

    public function AllTransaksi() {
        $transactions = Transaction::with('order.user', 'order.category')->get();
        return view('admin.backend.transaksi.all_transaksi', compact('transactions'));
    }


    // public function updateStatus(Transaction $transaction, Request $request)
    // {
    //     $validated = $request->validate([
    //         'status' => 'required|in:paid,failed',
    //     ]);

    //     // Update status transaksi
    //     $transaction->update($validated);

    //     // Update status order jika pembayaran sudah terkonfirmasi
    //     if ($transaction->status == 'paid') {
    //         $transaction->order->update(['status' => 'confirmed']);
    //     }

    //     return back()->with('success', 'Status transaksi berhasil diperbarui.');
    // }

    // public function show(order $order)
    // {
    //     return view('transactions.show', compact('order'));
    // }

    public function Thanks($id)
    {
        $cts = Transaction::whereHas('order', function ($query) {
            $query->where('user_id', auth()->id());
        })->findOrFail($id);

        return view('customer.thanku', compact('cts'));
    }
}
