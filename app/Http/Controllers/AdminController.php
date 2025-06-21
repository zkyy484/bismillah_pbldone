<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\CategoryController;
use App\Models\Category;
use App\Models\order;
use App\Models\Review;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\Websitemail;
use App\Models\Admin;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function AdminLogin()
    {
        return view('admin.login');
    }
    //End Method

    public function AdminDashboard()
    {
        // Hitung jumlah total dari masing-masing entitas
        $totalDesain = Category::count();
        $totalPesanan = Order::count();
        $totalTransaksi = Transaction::count();
        $totalUlasan = Review::count();

        // Ambil aktivitas terbaru: 3 pesanan dan 3 ulasan terbaru
        $orders = Order::latest()->take(5)->get()->map(function ($order) {
            return (object) [
                'id' => '#PSN-' . $order->id,
                'activity' => 'Pesanan baru oleh User ID ' . $order->user_id,
                'created_at' => $order->created_at,
                'type' => 'order',
                'link' => route('all.order', $order->id)
            ];
        });

        $reviews = Review::latest()->take(5)->get()->map(function ($review) {
            return (object) [
                'id' => '#ULS-' . $review->id,
                'activity' => 'Ulasan baru oleh User ID ' . $review->user_id,
                'created_at' => $review->created_at,
                'type' => 'review',
                'link' => route('ulasan', $review->id)
            ];
        });

        $latestActivities = $orders->concat($reviews)
            ->sortByDesc('created_at')
            ->take(5);


        return view('admin.dashboard', compact(
            'totalDesain',
            'totalPesanan',
            'totalTransaksi',
            'totalUlasan',
            'latestActivities'
        ));
    }

    // End Method

    public function AdminLoginSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $check = $request->all();
        $data = [
            'email' => $check['email'],
            'password' => $check['password'],
        ];
        if (Auth::guard('admin')->attempt($data)) {
            return redirect()->route('admin.dashboard')->with('success', 'Login Successfully');
        } else {
            return redirect()->route('admin.login')->with('error', 'Invalid Credentials');
        }
    }

    public function AdminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'Success Logout');
    }

    public function AdminForgetPassword()
    {
        return view('admin.forget_password');
    }

    public function AdminPasswordSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $admin_data = Admin::where('email', $request->email)->first();
        if (!$admin_data) {
            return redirect()->back()->with('error', 'Email Tidak Tersedia');
        }
        $token = Str::random(64);
        $admin_data->token = $token;
        $admin_data->update();

        $reset_link = url('admin/reset_password/' . $token . '/' . $request->email);
        $subject = "Reset Password";
        $message = "Tolong Klink tombol untuk reset password";
        $message .= "<a href='" . $reset_link . " '> Click Here </a>";

        \Mail::to($request->email)->send(new Websitemail($subject, $message));
        return redirect()->back()->with('success', "Reset Password Link Send On Your Email");
    }

    public function AdminResetPassword($token, $email)
    {
        $admin_data = Admin::where('email', $email)->where('token', $token)->first();

        if (!$admin_data) {
            return redirect()->route('admin.login')->with('error', 'Invalid Token or Email');
        }
        return view('admin.reset_password', compact('token', 'email'));
    }

    public function AdminResetPasswordSubmit(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:6',
        ]);

        $admin_data = Admin::where('email', $request->email)->where('token', $request->token)->first();

        if (!$admin_data) {
            return redirect()->route('admin.login')->with('error', 'Invalid token or email.');
        }

        $admin_data->password = Hash::make($request->password);
        $admin_data->token = "";
        $admin_data->save(); // lebih baik pakai save() untuk menyimpan perubahan

        return redirect()->route('admin.login')->with('success', 'Password Berhasil Diperbarui');
    }

    public function AdminProfile()
    {
        $id = Auth::guard('admin')->id();
        $profileData = Admin::find($id);
        return view('admin.admin_profile', compact('profileData'));
    }


    public function AdminProfileStore(Request $request)
    {
        $id = Auth::guard('admin')->id();
        $data = Admin::find($id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->addres = $request->addres;

        $oldPhotoPath = $data->photo;

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $Filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/admin_images'), $Filename);
            $data->photo = $Filename;

            if ($oldPhotoPath && $oldPhotoPath !== $Filename) {
                $this->deleteOldImage($oldPhotoPath);
            }
        }
        $data->save();

        $notification = array(
            'message' => 'Profile Berhasil diperbarui',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    // End Method

    private function deleteOldImage(string $oldPhotoPath): void
    {
        $fullPath = public_path('upload/admin_images/' . $oldPhotoPath);
        if (file_exists($fullPath)) {
            unlink($fullPath);
        }
    }

    public function AdminChangePassword()
    {
        $id = Auth::guard('admin')->id();
        $profileData = Admin::find($id);
        return view('admin.admin_change_password', compact('profileData'));
    }

    public function AdminPasswordUpdate(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        if (!Hash::check($request->old_password, $admin->password)) {
            $notification = array(
                'message' => 'Paasword Lama Salah',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }

        // Update password admin
        Admin::whereId($admin->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message' => 'Paasword Berhasil Diperbarui',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

}
