<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ClientType;

class ClientTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1) Desactivar comprobación de FK
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // 2) Truncar la tabla (ahora sí funciona aunque haya FKs)
        ClientType::truncate();

        // 3) Sembrar los tipos de cliente
        ClientType::create([
            'name'         => 'retail',
            'description'  => 'Minorista',
            'tax_benefits' => null,
        ]);
        ClientType::create([
            'name'         => 'wholesale',
            'description'  => 'Mayorista',
            'tax_benefits' => null,
        ]);

        // 4) Volver a habilitar las FK
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
