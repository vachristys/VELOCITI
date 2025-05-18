<?php

namespace App\Http\Controllers;
use App\Models\Parkir;
use App\Models\Tarif;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PetugasController extends Controller
{
    
    public function dashboard()
{
    $totalSlot = 50;
    $terisi = Parkir::where('status', 'masuk')->count();
    $tersedia = $totalSlot - $terisi;

    $parkirList = Parkir::orderBy('created_at', 'desc')->limit(10)->get();

    return view('petugas.dashboard', compact('parkirList', 'terisi', 'tersedia'));
}

public function createMasuk()
{
    return view('petugas.masuk');
}

public function storeMasuk(Request $request)
{
    $request->validate([
        'plat_nomor' => 'required|string',
        'jenis_kendaraan' => 'required|in:motor,mobil'
    ]);

    Parkir::create([
        'plat_nomor' => $request->plat_nomor,
        'jenis_kendaraan' => $request->jenis_kendaraan,
        'waktu_masuk' => now(),
        'status' => 'masuk'
    ]);

    return redirect()->route('petugas.dashboard')->with('success', 'Kendaraan masuk berhasil dicatat.');
}

public function createKeluar()
{
    $data = Parkir::where('status', 'masuk')->get();
    return view('petugas.keluar', compact('data'));
}

public function storeKeluar($id)
{
    $parkir = Parkir::findOrFail($id);

    // Hanya jika belum pernah dicatat keluar
    if (!$parkir->waktu_keluar) {
        $waktuKeluar = now();
        $durasi = Carbon::parse($parkir->waktu_masuk)->diffInMinutes($waktuKeluar);

        $tarif = Tarif::where('jenis_kendaraan', $parkir->jenis_kendaraan)->first()?->tarif_per_jam ?? 5000;
        $jam = ceil($durasi / 60);
        $biaya = $jam * $tarif;

        $parkir->update([
            'waktu_keluar' => $waktuKeluar,
            'durasi' => $durasi,
            'biaya' => $biaya,
        ]);
    }

    return redirect()->route('petugas.struk', ['id' => $parkir->id]);
}
public function selesaiBayar($id)
{
    $parkir = Parkir::findOrFail($id);

    // Update status jadi keluar
    $parkir->update(['status' => 'keluar']);

    return redirect()->route('petugas.dashboard')->with('success', 'Pembayaran selesai. Kendaraan keluar.');
}
public function struk($id)
{
    $parkir = Parkir::findOrFail($id);
    return view('petugas.struk', compact('parkir'));
}


}