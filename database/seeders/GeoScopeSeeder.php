<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\GeoScope;

class GeoScopeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          // 1) Deshabilitar temporalmente las FK
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // 2) Truncar (ahora funciona aunque haya relaciones)
        GeoScope::truncate();

        // 3) Sembrar los valores
        GeoScope::create([
            'type'             => 'domestic',
            'customs_required' => false,
        ]);
        GeoScope::create([
            'type'             => 'international',
            'customs_required' => true,
        ]);

        // 4) Volver a habilitar las FK
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
