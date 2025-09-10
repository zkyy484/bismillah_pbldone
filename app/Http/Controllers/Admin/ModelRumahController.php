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

    // simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_model' => 'required|string|max:255',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        ModelRumah::create($request->all());

        return redirect()->route('admin.model_rumah.index')->with('success', 'Data berhasil ditambahkan');
    }

    // edit form
    public function edit( $id)
    {
        $modelRumah= ModelRumah::find( $id );
        return view('admin.backend.model_rumah.edit_model_rumah', compact('modelRumah'));
    }

    // update data
    public function update(Request $request, ModelRumah $modelRumah)
    {
        $request->validate([
            'nama_model' => 'required|string|max:255',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $modelRumah->update($request->all());

        return redirect()->route('admin.model_rumah.index')->with('success', 'Data berhasil diperbarui');
    }

    // hapus data
    public function destroy($id)
    {
        $modelRumah= ModelRumah::find( $id )->delete();
        if (!$modelRumah){
          return redirect()->route('admin.model_rumah.index')->with('success', 'Data berhasil dihapus');  
        }
        
    }

}
