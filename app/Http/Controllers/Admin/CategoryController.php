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
        if ($request->file('photo')) {
            $image = $request->file('photo');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' .
                $image->getClientOriginalExtension();
            $img = $manager->read($image);

            // Resize hanya width = 600px, height otomatis, tetap proporsional
            $img->resize(1600, 900, function ($constraint) {
                $constraint->aspectRatio(); // Jaga rasio asli
                $constraint->upsize();      // Jangan perbesar gambar kecil
            });

            $save_url = 'upload/category/' . $name_gen;

            Category::create([
                'nama_categori' => $request->nama_categori,
                'photo' => $save_url,
                'description' => $request->description,
                'base_price' => $request->base_price
            ]);
        }

        $notification = array(
            'message' => 'Berhasil menambahkan kategori',
            'alert-type' => 'success'
        );

        return redirect()->route('all.category')->with($notification);
    }

    public function EditCategory($id)
    {
        $category = Category::find($id);
        return view('admin.backend.category.edit_category', compact('category'));
    }


    public function UpdateCategory(Request $request)
    {
        $cat_id = $request->id;

        if ($request->file('photo')) {
            $image = $request->file('photo');
            $manager = new ImageManager(new Driver());
            
            $name_gen = hexdec(uniqid()) . '.' .
                $image->getClientOriginalExtension();
            $img = $manager->read($image);
            
            $img->resize(1600, 900)->save(public_path('upload/category/' . $name_gen));
            $save_url = 'upload/category/' . $name_gen;



            Category::find($cat_id)->update([
                'nama_categori' => $request->nama_categori,
                'photo' => $save_url,
                'description' => $request->description,
                'base_price' => $request->base_price
            ]);

            $notification = array(
                'message' => 'Berhasil menambahkan kategori',
                'alert-type' => 'success'
            );

            return redirect()->route('all.category')->with($notification);

        } else {
            Category::find($cat_id)->update([
                'nama_categori' => $request->nama_categori,
                'description' => $request->description,
                'base_price' => $request->base_price
            ]);

            $notification = array(
                'message' => 'Berhasil mengubah kategori',
                'alert-type' => 'success'
            );

            return redirect()->route('all.category')->with($notification);
        }


    }

    public function DeleteCategory($id)
    {
        $item = Category::find($id);
        $img = $item->photo;
        unlink($img);

        Category::find($id)->delete();

        $notification = array(
            'message' => 'Category Berhasil Dihapus',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

}
