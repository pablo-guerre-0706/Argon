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
        Schema::create('raw_materials', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->unique();
            $table->string('bar_code')->unique();
            $table->decimal('purchase_price', 8, 2)->default(0.00);
            $table->decimal('weight', 8, 3)->default(0.000);
            $table->foreignId('unit_measure_id')->constrained('units_measures')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('category_mat_id')->constrained('categories_mat')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('brand_id')->constrained('brands')->onDelete('cascade')->
            onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raw_materials');
    }
};
