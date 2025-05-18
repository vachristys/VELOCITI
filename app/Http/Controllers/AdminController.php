<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Parkir;
use App\Models\Tarif;

class AdminController extends Controller
{
    public function dashboard(Request $request)
{
    // Filter laporan default harian
    $filter = $request->query('filter', 'harian');
    $query = Parkir::where('status', 'keluar');

    if ($filter === 'harian') {
        $query->whereDate('waktu_keluar', today());
    } elseif ($filter === 'mingguan') {
        $query->whereBetween('waktu_keluar', [now()->startOfWeek(), now()->endOfWeek()]);
    } elseif ($filter === 'bulanan') {
        $query->whereMonth('waktu_keluar', now()->month);
    }

    $data = $query->orderBy('waktu_keluar', 'desc')->get();

    // Data petugas lengkap
    $users = User::where('role', 'petugas')->get();

    // Total transaksi hari ini
    $totalTransaksi = Parkir::whereDate('waktu_keluar', today())->count();

    // Tarif aktif semua
    $tarif = Tarif::all();

    return view('admin.dashboard', compact('data', 'filter', 'users', 'totalTransaksi', 'tarif'));
}

    public function user() {
    $users = User::where('role', 'petugas')->get();
    return view('admin.user', compact('users'));
}

public function storeUser(Request $request) {
    User::create([
        'username' => $request->username,
        'password' => Hash::make($request->password),
        'role' => 'petugas'
    ]);
    return redirect()->route('admin.user');
}

public function destroyUser($id) {
    User::findOrFail($id)->delete();
    return back();
}
    public function laporan(Request $request)
    {
        $filter = $request->query('filter', 'harian');
        $query = Parkir::where('status', 'keluar');

        if ($filter === 'harian') {
            $query->whereDate('waktu_keluar', today());
        } elseif ($filter === 'mingguan') {
            $query->whereBetween('waktu_keluar', [now()->startOfWeek(), now()->endOfWeek()]);
        } elseif ($filter === 'bulanan') {
            $query->whereMonth('waktu_keluar', now()->month);
        }

        $data = $query->orderBy('waktu_keluar', 'desc')->get();
        return view('admin.laporan', compact('data', 'filter'));
    }

    public function tarif()
    {
        $tarif = Tarif::all();
        return view('admin.tarif', compact('tarif'));
    }

    public function updateTarif(Request $request, $id)
    {
        $request->validate(['tarif_per_jam' => 'required|numeric']);
        Tarif::findOrFail($id)->update(['tarif_per_jam' => $request->tarif_per_jam]);
        return redirect()->route('admin.tarif')->with('success', 'Tarif berhasil diperbarui.');
    }
}