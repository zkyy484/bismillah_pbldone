<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    // relasi ke galeri foto
    public function images() {
        return $this->hasMany(category_image::class, 'category_id');
    }

    // relasi ke pemesanan
    public function orders() {
        return $this->hasMany(order::class);
    }

    // relasi ke model runah
    public function modelRumah() {
        return $this->belongsTo(ModelRumah::class, 'model_rumah_id', 'id');
    }

//     public function category()
// {
//     return $this->belongsTo(Category::class, 'kategori_id');
// }
}
