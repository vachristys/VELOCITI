<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('parkir', function (Blueprint $table) {
        $table->id();
        $table->string('plat_nomor');
        $table->enum('jenis_kendaraan', ['motor', 'mobil']);
        $table->timestamp('waktu_masuk');
        $table->timestamp('waktu_keluar')->nullable();
        $table->integer('durasi')->nullable(); // dalam menit
        $table->integer('biaya')->nullable();
        $table->enum('status', ['masuk', 'keluar'])->default('masuk');
        $table->timestamps();
    });

    Schema::create('tarifs', function (Blueprint $table) {
        $table->id();
        $table->enum('jenis_kendaraan', ['motor', 'mobil'])->unique();
        $table->integer('tarif_per_jam');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parkir');
    }
};
