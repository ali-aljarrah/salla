<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
    */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId("category_id")->constrained("categories")->cascadeOnDelete();
            $table->string("slug")->unique();
            $table->string('name');
            $table->longText('description');
            $table->decimal('price', 10, 2);
            $table->decimal('discount_price', 10, 2)->nullable();
            $table->timestamp('discount_start')->nullable();
            $table->timestamp('discount_end')->nullable();
            $table->string('promo');
            $table->integer('storage_quantity');
            $table->json('images');
            $table->boolean("is_active")->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
    */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
