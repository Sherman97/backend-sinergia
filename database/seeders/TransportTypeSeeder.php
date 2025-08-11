<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use App\Models\TransportType;

class TransportTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        TransportType::query()->delete();
        // (opcional) resetear auto-increment:
        DB::statement('ALTER TABLE transport_types AUTO_INCREMENT = 1;');
        TransportType::create(['code'=>'TER','name'=>'Terrestre','discount_base_rate'=>5.00]);
        TransportType::create(['code'=>'MAR','name'=>'Marítimo','discount_base_rate'=>3.00]);
    }

}
