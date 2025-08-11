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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')
                  ->constrained('clients')
                  ->cascadeOnDelete();
            $table->foreignId('product_id')
                  ->constrained('products')
                  ->cascadeOnDelete();
            $table->foreignId('delivery_location_id')
                  ->constrained('delivery_locations')
                  ->cascadeOnDelete();
            $table->foreignId('transport_type_id')
                  ->constrained('transport_types')
                  ->cascadeOnDelete();
    
            // Datos principales
            $table->unsignedInteger('quantity');
            $table->decimal('unit_price', 10, 2);
            $table->decimal('final_price', 12, 2);
            $table->decimal('discount_percent', 5, 2)->default(0);
    
            // Identificación
            $table->string('guide_number', 10)->unique();
            $table->string('tracking_code', 15)->unique()->nullable();
    
            // Fechas
            $table->timestamp('registered_at')->useCurrent();
            $table->dateTime('estimated_delivery'); 
            $table->dateTime('delivered_at')->nullable(); 
    
            // Campos específicos
            $table->string('vehicle_plate', 6)->nullable()
                  ->comment('Solo terrestre: AAA123');
            $table->string('fleet_number', 8)->nullable()
                  ->comment('Solo marítimo: ABC1234D');
    
            $table->timestamps();
    
            $table->index('client_id');
            $table->index('guide_number');
            $table->index('transport_type_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
