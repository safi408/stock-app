<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
        protected $fillable = [
        'brand_id',
        'name',
        'description',
        'price',
        'stock',
        'image',
    ];

    /**
     * Relationship: Product belongs to a Brand
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function purchases()
{
    return $this->hasMany(Purchase::class);
}

}
