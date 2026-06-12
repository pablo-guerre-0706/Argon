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
        Schema::create('prod_order_details', function (Blueprint $table) {
            $table->id();
            $table->decimal('required_mat_quantity', 8, 3)->nullable();
            $table->decimal('dispatched_mat_quantity', 8, 3)->nullable();
            $table->decimal('scheduled_quantity', 8, 3)->nullable();
            $table->decimal('quantity_produced', 8, 3)->nullable();
            $table->decimal('loss_quantity', 8, 3)->nullable();
            $table->integer('bake_number')->nullable();
            $table->enum('status', ['pending', 'in_progress', 'completed',
            'canceled'])->default('pending');        //Este status controla cada horneada.
            $table->foreignId('production_order_id')->constrained('production_orders')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('recipe_id')->constrained('recipes')
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
        Schema::dropIfExists('prod_order_details');
    }
};
