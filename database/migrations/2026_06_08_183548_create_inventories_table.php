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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->decimal('real_stock', 8, 3)->default(0.000);
            $table->decimal('max_stock', 8, 3)->default(0.000);
            $table->decimal('min_stock', 8, 3)->default(0.000);
            $table->foreignId('raw_material_id')->nullable()->constrained('raw_materials')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('finished_product_id')->nullable()->constrained('finished_products')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
