<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function Index() {
        $allcts = Category::orderBy('id', 'asc')->take(6)->get();
        $cts = Category::orderBy('id', 'asc')->take(3)->get();
        return view('customer.home', compact('cts', 'allcts')) ;
    }

    // public function Kategori() {
    //     return view('customer.detail');
    // }

    public function Detail() {
        return view('customer.detail');
    }

    public function Order() {
        $category = Category::latest()->get();
        return view('customer.pemesanan', compact('category'));
    }

    public function ProfileStore(Request $request) {
        $id = Auth::user()->id;
        $data = User::find($id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->addres = $request->addres;

        $oldPhotoPath = $data->photo;

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload/user_images'),$filename);
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

    private function deteletoldImage(string $oldPhotoPath): void {
        $fullPath = public_path('upload/user_images/'.$oldPhotoPath);
        if (file_exists($fullPath)) {
            unlink($fullPath);
        }
    }

    public function UserLogout() {
        Auth::guard('web')->logout();
        return redirect()->route('login')->with('success', 'Logout Berhasil');
    }

    public function ChangePassword() {
        return view('customer.dashboard.change_password');
    }

    public function PasswordUpdate(Request $request) {
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
    public function HistoryOrder() {
        $orders = order::latest()->get();
        return view('customer.dashboard.order', compact('orders'));
    }



    // Frontend
    public function showCategory($id) {
        $category = Category::with('images')->findOrFail($id);
        return view('customer.detail', compact('category'));
    }

    public function showContact() {
        return view('customer.contact');
    }

}
