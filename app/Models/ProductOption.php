<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductOption extends Model
{
    protected $fillable = [
        'product_id',
        'title',
        'price',
        'price_before_discount',
        'has_shipping_fee',
        'shipping_fees'
    ];

     public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
