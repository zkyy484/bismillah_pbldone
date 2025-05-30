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
        $transactions = Transaction::all();
        if ($order->user_id != auth()->id()) {
            return redirect()->route('user.order')->with('error', 'Unauthorized access.');
        }


        return view('customer.transaksi', compact('order', 'transactions'));
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
        // $order->update(['status' => 'confirmed']);

        return redirect()->route('user.thanks', $transaksi->id)->with('success', 'Pembayaran berhasil dibuat. Tunggu konfirmasi admin.');
    }

    public function AllTransaksi()
    {
        $transactions = Transaction::with('order.user', 'order.category')->get();
        return view('admin.backend.transaksi.all_transaksi', compact('transactions'));
    }

    public function EditTransaksi(Transaction $transaction)
    {
        return view('admin.backend.transaksi.edit_transaksi', compact('transaction'));
    }

    public function UpdateTransaksi(Transaction $transaction, Request $request)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,paid,failed',
        ]);

        $transaction->update([
            'status' => $validated['status'],
        ]);

        // Jika transaksi dinyatakan "paid", ubah juga status order menjadi "confirmed"
        if ($validated['status'] === 'paid') {
            $transaction->order->update([
                'status' => 'confirmed',
            ]);
        }

        $notification = array(
            'message' => 'Berhasil mengubah status transaksi dan status order',
            'alert-type' => 'success'
        );

        return redirect()->route('transaksi')->with($notification);
    }

    public function DeleteTransaksi($id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return redirect()->back()->with([
                'message' => 'Transaksi tidak ditemukan.',
                'alert-type' => 'error'
            ]);
        }

        // Jika kamu mau, bisa cek apakah transaksi ini punya file bukti pembayaran dan hapus filenya
        if ($transaction->payment_receipt) {
            \Storage::disk('public')->delete($transaction->payment_receipt);
        }

        $transaction->delete();

        return redirect()->back()->with([
            'message' => 'Transaksi berhasil dihapus.',
            'alert-type' => 'success'
        ]);
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
