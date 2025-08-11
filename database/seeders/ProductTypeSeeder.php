<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
Use App\Models\ProductType;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1) Desactivar FK checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // 2) Truncar la tabla
        ProductType::truncate();

        // 3) Sembrar los tipos de producto
        ProductType::create([
            'name'        => 'fragile',
            'description' => 'Productos frágiles',
        ]);
        ProductType::create([
            'name'        => 'standard',
            'description' => 'Productos estándar',
        ]);
        ProductType::create([
            'name'        => 'bulk',
            'description' => 'Carga a granel',
        ]);

        // 4) Volver a habilitar FK checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
