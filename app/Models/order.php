<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'category_id',
        'length',
        'width',
        'total_area',
        'price',
        'status',
        'notes'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }

}
