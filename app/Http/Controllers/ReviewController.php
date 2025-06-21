<?php

namespace App\Http\Controllers;


use App\Models\order;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function CreateReview(order $order)
    {
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        if ($order->status !== 'completed') {
            abort(403, 'Order belum selesai.');
        }

        if ($order->review) {
            return redirect()->back()->with('info', 'Ulasan sudah diberikan.');
        }

        return view('customer.review', compact('order'));
    }

    public function StoreReview(Request $request, Order $order)
    {
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        if ($order->review) {
            $notification = array(
                'message' => 'Berhasil mengubah status transaksi dan status order',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        }

        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        Review::create([
            'user_id' => auth()->id(),
            'order_id' => $order->id,
            'rating' => $validated['rating'],
            'comment' => $validated['comment'],
        ]);

        return redirect()->route('user.history.order', $order)->with('success', 'Ulasan berhasil dikirim.');
    }

    public function AdminReview()
    {
        $reviews = Review::latest()->get();
        return view('admin.backend.ulasan.all_ulasan', compact('reviews'));
    }

    public function ApproveReview($id)
    {
        $review = Review::findOrFail($id);
        $review->is_approved = true;
        $review->save();

        $notification = array(
            'message' => 'Berhasil menyetujui ulasan',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function unapprove(Review $review)
    {
        $review->is_approved = false;
        $review->save();

        return redirect()->back()->with([
            'message' => 'Persetujuan ulasan dibatalkan.',
            'alert-type' => 'success',
        ]);
    }


}
