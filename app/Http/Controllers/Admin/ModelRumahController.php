<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModelRumah;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ModelRumahController extends Controller
{
    // tampil semua data
    public function index()
    {
        $models = ModelRumah::all();
        return view('admin.backend.model_rumah.all_model_rumah', compact('models'));

    }

    // form tambah
    public function create()
    {
        return view('admin.backend.model_rumah.add_model_rumah ');
    }

    // // simpan data baru
    public function store(Request $request)
    {

        // ✅ Validasi data
        $validated = $request->validate([
            'nama_model' => 'required|string|max:16',
            'image_path' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ], 
        [
            'nama_model.required' => 'Nama model wajib diisi',
            'image_path.required' => 'Foto wajib diunggah',
            'image_path.image' => 'File harus berupa gambar',
            'image_path.mimes' => 'Format harus jpg, jpeg, atau png',
            'image_path.max' => 'Ukuran maksimal 2MB',
        ]);

        // ✅ Proses upload gambar
        $image = $request->file('image_path');
        $manager = new ImageManager(new Driver());

        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $save_path = public_path('upload/model_rumah/' . $name_gen);

        $img = $manager->read($image);

        // Resize tetap proporsional
        $img->resize(1600, 900, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $img->save($save_path);

        $save_url = 'upload/model_rumah/' . $name_gen;

        // ✅ Simpan ke database
        ModelRumah::create([
            'nama_model' => $validated['nama_model'],
            'image_path' => $save_url,
        ]);

        return redirect()->route('admin.model_rumah.index')->with([
            'message' => 'Berhasil menambahkan model rumah baru',
            'alert-type' => 'success'
        ]);
    }

    // // edit form
    // public function edit( $id)
    // {
    //     $modelRumah= ModelRumah::find( $id );
    //     return view('admin.backend.model_rumah.edit_model_rumah', compact('modelRumah'));
    // }

    // // update data
    // public function update(Request $request, ModelRumah $modelRumah)
    // {
    //     $request->validate([
    //         'nama_model' => 'required|string|max:255',
    //         'status' => 'required|in:aktif,nonaktif',
    //     ]);

    //     $modelRumah->update($request->all());

    //     return redirect()->route('admin.model_rumah.index')->with('success', 'Data berhasil diperbarui');
    // }

    // // hapus data
    // public function destroy($id)
    // {
    //     $modelRumah= ModelRumah::find( $id )->delete();
    //     if (!$modelRumah){
    //       return redirect()->route('admin.model_rumah.index')->with('success', 'Data berhasil dihapus');  
    //     }

    // }

}
