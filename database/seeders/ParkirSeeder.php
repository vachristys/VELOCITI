<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Parkir;
use Carbon\Carbon;

class ParkirSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        Parkir::create([
            'plat_nomor' => 'B1234ABC',
            'jenis_kendaraan' => 'motor',
            'waktu_masuk' => $now->copy()->subHours(3),
            'waktu_keluar' => $now->copy(),
            'durasi' => 180,
            'biaya' => 9000,
            'status' => 'keluar'
        ]);

        Parkir::create([
            'plat_nomor' => 'D5678XYZ',
            'jenis_kendaraan' => 'mobil',
            'waktu_masuk' => $now->copy()->subHours(2),
            'waktu_keluar' => $now->copy(),
            'durasi' => 120,
            'biaya' => 10000,
            'status' => 'keluar'
        ]);

        Parkir::create([
            'plat_nomor' => 'F1111HIJ',
            'jenis_kendaraan' => 'motor',
            'waktu_masuk' => $now->copy()->subMinutes(30),
            'status' => 'masuk'
        ]);
    }
}
