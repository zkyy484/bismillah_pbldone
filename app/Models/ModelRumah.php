<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelRumah extends Model
{
    use HasFactory;

    protected $table = 'model_rumah';

    protected $fillable = [
        'nama_model',
        'status',
    ];
}
