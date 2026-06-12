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
        Schema::create('sale_details', function (Blueprint $table) {
            $table->id();
            $table->decimal('quantity_sold', 8, 3)->default(0.000);
            $table->foreignId('unit_measure_id')->constrained('units_measures')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('unit_price', 8, 2);
            $table->decimal('subtotal', 10, 2);
            $table->foreignId('sale_id')->constrained('sales')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('finished_product_id')->constrained('finished_products')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_details');
    }
};
