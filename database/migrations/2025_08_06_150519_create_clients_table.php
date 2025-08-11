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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->string('email')->unique();
            $table->foreignId('client_type_id')
                  ->constrained('client_types')
                  ->cascadeOnDelete();
            $table->foreignId('geo_scope_id')
                  ->constrained('geo_scopes')
                  ->cascadeOnDelete();
            $table->timestamps();
            
            $table->index('email');
            $table->index('client_type_id');
            $table->index('geo_scope_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
