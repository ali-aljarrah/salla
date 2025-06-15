<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'slug',
        'is_active',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

     /**
     * Get category slug by ID
     *
     * @param int $id Category ID
     * @return string|null Category slug or null if not found
     */
    public static function getSlugById($id)
    {
        return optional(self::find($id))->slug;
    }

    protected static function boot()
    {
        parent::boot();

        // Listen for the updating event
        static::updating(function ($model) {
            // Check if the image attribute is being updated
            if ($model->isDirty('image')) {
                // Get the old image path
                $oldImage = $model->getOriginal('image');

                // Delete the old image if it exists
                if ($oldImage && Storage::disk('public')->exists($oldImage)) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
        });

        // Optionally, delete the image when the model is deleted
        static::deleting(function ($model) {
            if ($model->image && Storage::disk('public')->exists($model->image)) {
                Storage::disk('public')->delete($model->image);
            }
        });
    }
}
