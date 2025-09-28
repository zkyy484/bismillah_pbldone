<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Admin;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Transaction;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function downloadPdf($id)
    {
        $transaction = Transaction::with('order.category', 'order.user')->findOrFail($id);
        $order = $transaction->order;
        $users = $transaction->order->user;
        $dataAdmin = Admin::get();

        //encode gambar ke base64
        foreach ($dataAdmin as $admin) {
            if ($admin->photo) {
                $imagePath = public_path('upload/admin_images/' . $admin->photo);
                if (file_exists($imagePath)) {
                    $imageData = base64_encode(file_get_contents($imagePath));
                    $admin->image_base64 = 'data:image/' . pathinfo($imagePath, PATHINFO_EXTENSION) . ';base64,' . $imageData;
                }
            }
        }

        $cts = Transaction::whereHas('order', function ($query) {
            $query->where('user_id', auth()->id());
        })->findOrFail($id);

        $pdf = Pdf::loadView('customer.invoice', compact('transaction', 'dataAdmin', 'order','cts'));
        return $pdf->download("invoice-{$transaction->id}.pdf");
    }
}