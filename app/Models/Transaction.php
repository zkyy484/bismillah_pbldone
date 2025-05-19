<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id', 'payment_method', 'amount', 'status', 'payment_receipt'
    ];

    public function order()
    {
        return $this->belongsTo(order::class);
    }

}
