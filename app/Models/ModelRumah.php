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

    public function modelsRumah() {
        return $this->hasMany(Category::class);
    }

    public function category()
{
    return $this->belongsTo(Category::class, 'kategori_id');
}
}
