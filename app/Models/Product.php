<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'category_id',
        'slug',
        'name',//
        'description',//
        'price',//
        'images',
        'discount_price',
        'discount_start',
        'discount_end',
        'promo',
        'storage_quantity',
        'is_active',
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function options(): HasMany
    {
        return $this->hasMany(ProductOption::class);
    }

    public function hasDiscount(): bool
    {
        return $this->discount_price &&
               $this->discount_start &&
               $this->discount_end &&
               now()->between($this->discount_start, $this->discount_end);
    }

    protected static function boot()
    {
        parent::boot();

        // Delete only the images that are no longer in the updated array
        static::updating(function ($product) {
            if ($product->isDirty('images')) {
                $oldImages = $product->getOriginal('images');
                $newImages = $product->images;

                // Find images that are in the old array but not in the new array
                $imagesToDelete = array_diff($oldImages, $newImages);

                // Delete the images that are no longer needed
                foreach ($imagesToDelete as $image) {
                    if (Storage::disk('public')->exists($image)) {
                        Storage::disk('public')->delete($image);
                    }
                }
            }
        });

        // Delete all images when deleting the product
        static::deleting(function ($product) {
            $images = $product->images;

            if (is_array($images)) {
                foreach ($images as $image) {
                    if (Storage::disk('public')->exists($image)) {
                        Storage::disk('public')->delete($image);
                    }
                }
            }
        });
    }
}
