<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    //
        protected $fillable = [
        'product_id',
        'quantity',
        'purchase_price',
        'purchase_date',
        'notes',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
