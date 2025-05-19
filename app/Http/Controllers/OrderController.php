<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
     public function CreateOrder()
    {
        $categories = Category::all();
        return view('customer.order', compact('categories'));
    }

    public function StoreOrder(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'length' => 'required|numeric|min:1',
            'width' => 'required|numeric|min:1',
            'notes' => 'nullable|string|max:1000',
        ]);

        $category = Category::find($validated['category_id']);
        $total_area = $validated['length'] * $validated['width'];
        $price = $category->base_price * $total_area;

        $orders = order::create([
            'user_id' => auth()->id(),
            'category_id' => $validated['category_id'],
            'length' => $validated['length'],
            'width' => $validated['width'],
            'total_area' => $total_area,
            'price' => $price,
            'status' => 'pending',
            'notes' => $request->notes
        ]);

        return redirect()->route('user.transaksi', $orders->id)->with('success', 'Pesanan berhasil dibuat.');
    }

    public function AllOrder()
    {
        $orders = Order::with('category')->get();
        return view('admin.backend.order.all_order', compact('orders'));
    }

    public function EditCatgery(Order $order)
    {
        $categories = Category::all();
        return view('admin.backend.order.edit_order', compact('order', 'categories'));
    }

    public function UpdateOrder(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,completed',
        ]);

        $order->update($validated);

        return redirect()->route('all.order')->with('success', 'Status pemesanan berhasil diperbarui.');
    }

    public function DeleteOrder($id)
    {
        order::find($id)->delete();

        $notification = array(
            'message' => 'Category Berhasil Dihapus',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
