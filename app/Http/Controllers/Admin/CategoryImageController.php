<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\category_image;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CategoryImageController extends Controller
{
    // public function AllCatImage()
    // {
    //     $cat_image = category_image::latest()->get();
    //     return view('admin.backend.category_image.all_catimage', compact('cat_image'));
    // }

    // public function AddCatImage()
    // {
    //     $categories = Category::all();
    //     return view('admin.backend.category_image.add_catimage', compact('categories'));
    // }

    // public function cnaj(Request $request)
    // {
    //     if ($request->file('image_path')) {
    //         $image = $request->file('image_path');
    //         $manager = new ImageManager(new Driver());

    //         $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
    //         $save_path = public_path('upload/category_images/' . $name_gen);

    //         $img = $manager->read($image);

    //         // Resize hanya width = 600px, height otomatis, tetap proporsional
    //         $img->resize(1600, 900, function ($constraint) {
    //             $constraint->aspectRatio(); // Jaga rasio asli
    //             $constraint->upsize();      // Jangan perbesar gambar kecil
    //         });

    //         $img->save($save_path);

    //         $save_url = 'upload/category_images/' . $name_gen;

    //         category_image::create([
    //             'category_id' => $request->category_id,
    //             'image_path' => $save_url,
    //         ]);
    //     }

    //     return redirect()->route('all.catimage')->with([
    //         'message' => 'Berhasil menambahkan foto kategori',
    //         'alert-type' => 'success'
    //     ]);
    // }



    public function StoreCatImage(Request $request, $id)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $category = Category::findOrFail($id);
        $manager = new ImageManager(new Driver());

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {

                // Nama unik file
                $name_gen = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
                $save_path = public_path('upload/category_images/' . $name_gen);

                // Resize gambar
                $img = $manager->read($file);
                $img->resize(1600, 900, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $img->save($save_path);

                // Simpan path ke DB
                $save_url = 'upload/category_images/' . $name_gen;

                category_image::create([
                    'category_id' => $category->id,
                    'image_path' => $save_url,
                ]);
            }
        }

        $notification = array(
            'message' => 'Berhasil Menambahkan Foto Desain Rumah',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function DeleteCatImage($id)
    {
        $image = category_image::findOrFail($id);

        // Hapus file fisik
        if (file_exists(public_path($image->image_path))) {
            unlink(public_path($image->image_path));
        }

        $image->delete();

        $notification = array(
            'message' => 'Berhasil Menghapus Foto Desain Rumah',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    // public function vf($id) {
    //     $item = category_image::find($id);
    //     $img = $item->image_path;
    //     unlink($img);

    //     category_image::find($id)->delete();

    //     $notification = array(
    //         'message' => 'Foto Category Berhasil Dihapus',
    //         'alert-type' => 'success'
    //     );

    //     return redirect()->back()->with($notification);
    // }
}
