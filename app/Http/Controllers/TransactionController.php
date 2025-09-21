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

    public function TransaksiStore(Request $request, Order $order)
    {
        $validated = $request->validate([
            'payment_method' => 'required|string',
            'amount' => 'required|numeric',
            'payment_receipt' => 'required|file|mimes:jpg,png,pdf|max:5120',
        ]);

        // Simpan bukti pembayaran ke folder public/upload/image_transaksi
        $receipt_path = null;
        if ($request->hasFile('payment_receipt')) {
            $file = $request->file('payment_receipt');
            $filename = time() . '_' . $file->getClientOriginalName(); // nama file unik
            $file->move(public_path('upload/image_transaksi'), $filename);
            $receipt_path = 'upload/image_transaksi/' . $filename;
        }

        // Buat transaksi
        $transaksi = Transaction::create([
            'order_id' => $order->id,
            'payment_method' => $validated['payment_method'],
            'amount' => $validated['amount'],
            'status' => 'pending',
            'payment_receipt' => $receipt_path,
        ]);

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


        $transaction->delete();

        $notification = array(
            'message' => 'Berhasil menghapus transaksi',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function Thanks($id)
    {
        $cts = Transaction::whereHas('order', function ($query) {
            $query->where('user_id', auth()->id());
        })->findOrFail($id);

        return view('customer.thanku', compact('cts'));
    }
}
