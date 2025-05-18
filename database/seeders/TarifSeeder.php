<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tarif;

class TarifSeeder extends Seeder
{
    public function run(): void
    {
        Tarif::create(['jenis_kendaraan' => 'motor', 'tarif_per_jam' => 3000]);
        Tarif::create(['jenis_kendaraan' => 'mobil', 'tarif_per_jam' => 5000]);
    }
}
