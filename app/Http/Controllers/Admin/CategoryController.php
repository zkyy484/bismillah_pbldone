<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ModelRumah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CategoryController extends Controller
{
    public function AllDesain($id)
    {
        // Cari model rumah
        $modelRumah = \App\Models\ModelRumah::findOrFail($id);

        // Ambil hanya kategori/produk yang punya model_rumah_id sesuai
        $produk = \App\Models\Category::where('model_rumah_id', $id)->get();

        return view('admin.backend.category.all_category', [
            'modelRumah' => $modelRumah,
            'produk' => $produk
        ]);
    }


    public function AllCategory()
    {
        $category = Category::latest()->get();
        return view('admin.backend.category.all_category', compact('categories'));
    }

    public function AddCategory()
    {
        $modelRumah = ModelRumah::all();
        return view('admin.backend.category.add_category', compact('modelRumah'));
    }

    public function StoreCategory(Request $request)
    {
        // ✅ Validasi dulu biar aman
        $request->validate([
            'nama_categori' => 'required|string|max:255',
            'description' => 'nullable|string',
            'base_price' => 'required|numeric',
            'panjang_tanah' => 'nullable|numeric',
            'lebar_tanah' => 'nullable|numeric',
            'luas_bangunan' => 'nullable|numeric',
            'lantai' => 'nullable|integer',
            'kamar_tidur' => 'nullable|integer',
            'kamar_mandi' => 'nullable|integer',
            'model_rumah_id' => 'required|exists:model_rumahs,id', // foreign key wajib valid
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // ✅ Hitung luas_lahan otomatis
        $luas_lahan = null;
        if ($request->panjang_tanah && $request->lebar_tanah) {
            $luas_lahan = $request->panjang_tanah * $request->lebar_tanah;
        }

        $save_url = null;

        // ✅ Proses upload foto
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            $img = $manager->read($image);
            $img->resize(1600, 900, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $save_path = public_path('upload/category/' . $name_gen);
            $img->save($save_path);

            $save_url = 'upload/category/' . $name_gen;
        }

        // ✅ Simpan ke database
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
            'model_rumah_id' => $request->model_rumah_id, // 🔥 simpan relasi
        ]);

        return redirect()->route('admin.all.desain', $request->model_rumah_id)->with([
            'message' => 'Berhasil menambahkan kategori',
            'alert-type' => 'success',
        ]);
    }

    public function EditCategory($id)
    {
        $category = Category::find($id);
        return view('admin.backend.category.edit_category', compact('category'));
    }

    public function ToggleStatus($id)
    {
        $category = Category::findOrFail($id);

        // toggle status
        $category->status = $category->status === 'active' ? 'inactive' : 'active';
        $category->save();

        return redirect()->back()->with([
            'message' => 'Status kategori berhasil diperbarui!',
            'alert-type' => 'success'
        ]);
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

    public function filterByCategory($id)
    {
        // Ambil satu kategori
        $category = Category::findOrFail($id);

        // Ambil semua model rumah dengan kategori tsb
        $models = ModelRumah::where('kategori_id', $id)->with('category')->get();
        return view('admin.model_rumah.index', compact('models', 'category'));
    }

}
