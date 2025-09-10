<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CategoryController extends Controller
{
    public function AllCategory()
    {
        $category = Category::latest()->get();
        return view('admin.backend.category.all_category', compact('category'));
    }

    public function AddCategory()
    {
        return view('admin.backend.category.add_category');
    }

    public function StoreCategory(Request $request)
    {
        // Hitung luas_lahan otomatis
        $luas_lahan = null;
        if ($request->panjang_tanah && $request->lebar_tanah) {
            $luas_lahan = $request->panjang_tanah * $request->lebar_tanah;
        }

        if ($request->file('photo')) {
            $image = $request->file('photo');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);

            // Resize
            $img->resize(1600, 900, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $save_path = public_path('upload/category/' . $name_gen);
            $img->save($save_path);

            $save_url = 'upload/category/' . $name_gen;

            Category::create([
                'nama_categori' => $request->nama_categori,
                'photo' => $save_url,
                'description' => $request->description,
                'base_price' => $request->base_price,
                'panjang_tanah' => $request->panjang_tanah,
                'lebar_tanah' => $request->lebar_tanah,
                'luas_lahan' => $luas_lahan,
                'luas_bangunan' => $request->luas_bangunan,
                'lantai' => $request->lantai,
                'kamar_tidur' => $request->kamar_tidur,
                'kamar_mandi' => $request->kamar_mandi,
            ]);
        }

        return redirect()->route('all.category')->with([
            'message' => 'Berhasil menambahkan kategori',
            'alert-type' => 'success',
        ]);
    }

    public function EditCategory($id)
    {
        $category = Category::find($id);
        return view('admin.backend.category.edit_category', compact('category'));
    }

    public function UpdateCategory(Request $request)
    {
        $cat_id = $request->id;
        $category = Category::find($cat_id);

        // Hitung luas_lahan otomatis
        $luas_lahan = null;
        if ($request->panjang_tanah && $request->lebar_tanah) {
            $luas_lahan = $request->panjang_tanah * $request->lebar_tanah;
        }

        if ($request->file('photo')) {
            if ($category->photo && file_exists(public_path($category->photo))) {
                unlink(public_path($category->photo));
            }

            $image = $request->file('photo');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(1600, 900)->save(public_path('upload/category/' . $name_gen));
            $save_url = 'upload/category/' . $name_gen;

            $category->update([
                'nama_categori' => $request->nama_categori,
                'photo' => $save_url,
                'description' => $request->description,
                'base_price' => $request->base_price,
                'panjang_tanah' => $request->panjang_tanah,
                'lebar_tanah' => $request->lebar_tanah,
                'luas_lahan' => $luas_lahan,
                'luas_bangunan' => $request->luas_bangunan,
                'lantai' => $request->lantai,
                'kamar_tidur' => $request->kamar_tidur,
                'kamar_mandi' => $request->kamar_mandi,
            ]);

            $notification = [
                'message' => 'Berhasil mengubah kategori dan mengganti foto',
                'alert-type' => 'success',
            ];
        } else {
            $category->update([
                'nama_categori' => $request->nama_categori,
                'description' => $request->description,
                'base_price' => $request->base_price,
                'panjang_tanah' => $request->panjang_tanah,
                'lebar_tanah' => $request->lebar_tanah,
                'luas_lahan' => $luas_lahan,
                'luas_bangunan' => $request->luas_bangunan,
                'lantai' => $request->lantai,
                'kamar_tidur' => $request->kamar_tidur,
                'kamar_mandi' => $request->kamar_mandi,
            ]);

            $notification = [
                'message' => 'Berhasil mengubah kategori',
                'alert-type' => 'success',
            ];
        }

        return redirect()->route('all.category')->with($notification);
    }

    public function DeleteCategory($id)
    {
        $item = Category::find($id);

        if ($item->photo && file_exists(public_path($item->photo))) {
            unlink(public_path($item->photo));
        }

        $item->delete();

        return redirect()->back()->with([
            'message' => 'Category Berhasil Dihapus',
            'alert-type' => 'success',
        ]);
    }

    public function DetailCategory($id)
    {
        // ambil data kategori + relasi gambar
        $category = Category::with('images')->findOrFail($id);

        return view('admin.backend.category.detail_category', compact('category'));
    }

}
