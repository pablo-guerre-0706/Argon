<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PHPUnit\Event\Test\Finished;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventory_movements', function (Blueprint $table) {
            $table->id();
            $table->timestamp('movement_date')->useCurrent();
            $table->enum('movement_type', [
                'purchase_entry',
                'production_dispatch',
                'production_entry',
                'sale_dispatch'
            ]);
            $table->decimal('quantity', 8, 3);  // Guarda lo que suma o resta
            $table->string('observations', 100)->nullable();
            $table->foreignId('user_id')->constrained('users')
            ->onDelete('cascade')->onUpdate('cascade');
            // FK NULL
            $table->foreignId('raw_material_id')->nullable()
            ->constrained('raw_materials')->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('finished_product_id')->nullable()
            ->constrained('finished_products')->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('purchase_order_detail_id')->nullable()
            ->constrained('purchase_order_details')->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('sale_detail_id')->nullable()
            ->constrained('sale_details')->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('prod_order_detail_id')->nullable()
            ->constrained('prod_order_details')->onDelete('set null')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_movements');
    }
};
