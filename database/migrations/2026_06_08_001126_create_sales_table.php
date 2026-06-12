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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('sale_number', 20)->unique();
            $table->timestamp('sale_date')->useCurrent();
            $table->decimal('total_to_pay', 8, 2)->default(0.00);
            $table->foreignId('user_id')->constrained('users')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('customer_id')->constrained('customers')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
