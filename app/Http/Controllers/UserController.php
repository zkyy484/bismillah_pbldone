<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\ModelRumah;
use App\Models\order;
use App\Models\Review;
use App\Models\Transaction;
use App\Models\User;
use GuzzleHttp\Psr7\FnStream;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    // tampilan homepage
    public function index()
    {
        $banner = Banner::where('status', 'active')
            ->orderBy('id', 'asc')
            ->take(4)
            ->get();

        // ambil hanya kategori aktif
        $allcts = Category::where('status', 'active')
            ->orderBy('id', 'asc')
            ->take(18)
            ->get();

        $cts = Category::where('status', 'active')
            ->orderBy('id', 'asc')
            ->take(3)
            ->get();

        $model = ModelRumah::all();

        // Hanya ambil review yang disetujui
        $reviews = Review::with(['user', 'order.category'])
            ->where('is_approved', true)
            ->latest()
            ->take(6)
            ->get();

        return view('customer.home', compact(
            'cts',
            'banner',
            'allcts',
            'reviews',
            'model'
        ));
    }

    public function daftarCategory($id)
    {
        // Cari model rumah
        $modelRumah = \App\Models\ModelRumah::findOrFail($id);

        // Ambil hanya kategori yang aktif dan sesuai model_rumah_id
        $produkAktif = \App\Models\Category::where('model_rumah_id', $id)
            ->where(function ($query) {
                $query->where('status', 'active')
                    ->orWhere('status', 1);
            })
            ->get();

        return view('customer.model', [
            'modelRumah' => $modelRumah,
            'produk' => $produkAktif // Langsung produk aktif
        ]);
    }

    // public function Detail()
    // {
    //     return view('customer.detail');
    // }

    public function Order()
    {
        $category = Category::latest()->get();
        return view('customer.pemesanan', compact('category'));
    }

    // Tampilan eddit profile
    public function ProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->addres = $request->addres;

        $oldPhotoPath = $data->photo;

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/user_images'), $filename);
            $data->photo = $filename;
            if ($oldPhotoPath && $oldPhotoPath !== $filename) {
                $this->deleteOldImage($oldPhotoPath);
            }
        }
        $data->save();

        $notification = array(
            'message' => 'Profile Berhasil Diupdate',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    // menghapus foto profile user jika terjadi update pada foto profile
    private function deleteOldImage(string $oldPhotoPath): void
    {
        $fullPath = public_path('upload/user_images/' . $oldPhotoPath);
        if (file_exists($fullPath)) {
            unlink($fullPath);
        }
    }

    public function UserLogout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('login')->with('success', 'Logout Berhasil');
    }

    public function ChangePassword()
    {
        return view('customer.dashboard.change_password');
    }

    public function PasswordUpdate(Request $request)
    {
        $user = Auth::guard('web')->user();
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        if (!Hash::check($request->old_password, $user->password)) {
            $notification = array(
                'message' => 'Paasword Lama Salah',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }

        // Update password admin
        User::whereId($user->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message' => 'Password Berhasil Diperbarui',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    // show detail order
    public function HistoryOrder()
    {
        $orders = Order::where('user_id', auth()->id())->latest()->get();

        // Ambil semua order_id yang sudah diulas oleh user yang sedang login
        $reviewedOrderIds = \App\Models\Review::where('user_id', auth()->id())
            ->pluck('order_id')
            ->toArray();

        return view('customer.dashboard.order', compact('orders', 'reviewedOrderIds'));
    }


    public function HistoryTransaksi()
    {
        $transactions = Transaction::with(['order.category'])
            ->whereHas('order', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->latest()
            ->get();
        return view('customer.dashboard.transaksi', compact('transactions'));
    }


    // Frontend
    public function showCategory($id)
    {
        $category = Category::with('images')->findOrFail($id);
        return view('customer.detail', compact('category'));
    }

    public function showContact()
    {
        return view('customer.contact');
    }

    public function showAboutUs()
    {
        return view('customer.about');
    }

    public function showModel()
    {
        $cts = ModelRumah::latest()->get();
        return view('customer.kategori', compact('cts'));
    }

    public function Daftar()
    {
        return view('customer.model');

    }
}

