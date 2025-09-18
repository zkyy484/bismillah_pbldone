<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelRumah extends Model
{
    use HasFactory;

    protected $table = 'model_rumahs';

    protected $fillable = [
        'nama_model',
        'image_path'
    ];

    public function category() {
        return $this->hasMany(Category::class, 'model_rumah_id');
    }

//     public function category()
// {
//     return $this->belongsTo(Category::class, 'kategori_id');
// }
}
