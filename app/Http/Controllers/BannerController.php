<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class BannerController extends Controller
{
    public function BannerView()
    {
        $banner = Banner::all();
        return view('admin.backend.banner.all_banner', compact('banner'));
    }

    public function TambahBanner()
    {
        return view('admin.backend.banner.add_banner');
    }

    public function BannerStore(Request $request)
    {
        $request->validate([
            'photo_banner' => 'required|image|mimes:jpg,jpeg,png|max:2048', // ✅ Sesuai dengan form
        ]);

        $manager = new ImageManager(new Driver());

        if ($request->hasFile('photo_banner')) { // ✅ Sesuai dengan form
            $file = $request->file('photo_banner');

            // Nama unik file
            $name_gen = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            $save_path = public_path('upload/banner/' . $name_gen);

            // Resize gambar
            $img = $manager->read($file);
            $img->resize(1600, 900, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->save($save_path);

            // Simpan path ke DB
            $save_url = 'upload/banner/' . $name_gen;

            Banner::create([
                'photo_banner' => $save_url,
            ]);
        }

        $notification = array(
            'message' => 'Berhasil Menambahkan Foto Banner',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.banner')->with($notification);
    }

    public function BannerDelete($id) {
        $image = Banner::findOrFail($id);

        // Hapus file fisik
        if (file_exists(public_path($image->photo_banner))) {
            unlink(public_path($image->photo_banner));
        }

        $image->delete();

        $notification = array(
            'message' => 'Berhasil Menghapus Foto Desain Rumah',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function BannerStatus($id)
    {
        $banner = Banner::findOrFail($id);

        // toggle status
        $banner->status = $banner->status === 'active' ? 'inactive' : 'active';
        $banner->save();

        $notification = array(
            'message' => 'Status Banner Berhasil Diperbarui',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
