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
            $table->string('name');
            $table->text('description')->nullable();
            $table->foreignId('product_type_id')
                  ->constrained('product_types')
                  ->cascadeOnDelete();
            $table->json('transport_type_ids')->nullable()
                  ->comment('Array de transport_type IDs, e.g. [1,2]');
            $table->boolean('requires_special_handling')->default(false);
            $table->timestamps();
    
            $table->index('product_type_id');
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
