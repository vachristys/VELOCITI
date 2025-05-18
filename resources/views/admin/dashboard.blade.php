@extends('layouts.admin')

@section('content')

<!-- Judul Halaman -->
<h4 class="fw-bold mb-4">Dashboard Admin</h4>

<!-- Filter Transaksi -->
<div class="mb-4 d-flex gap-2">
    <a href="{{ route('admin.dashboard', ['filter' => 'harian']) }}" class="btn {{ $filter === 'harian' ? 'btn-primary' : 'btn-outline-primary' }}" style="background:{{ $filter === 'harian' ? '#7c3aed' : 'transparent' }}; color:{{ $filter === 'harian' ? '#fff' : '#7c3aed' }}; border-color:#7c3aed;">
        Harian
    </a>
    <a href="{{ route('admin.dashboard', ['filter' => 'mingguan']) }}" class="btn {{ $filter === 'mingguan' ? 'btn-primary' : 'btn-outline-primary' }}" style="background:{{ $filter === 'mingguan' ? '#7c3aed' : 'transparent' }}; color:{{ $filter === 'mingguan' ? '#fff' : '#7c3aed' }}; border-color:#7c3aed;">
        Mingguan
    </a>
    <a href="{{ route('admin.dashboard', ['filter' => 'bulanan']) }}" class="btn {{ $filter === 'bulanan' ? 'btn-primary' : 'btn-outline-primary' }}" style="background:{{ $filter === 'bulanan' ? '#7c3aed' : 'transparent' }}; color:{{ $filter === 'bulanan' ? '#fff' : '#7c3aed' }}; border-color:#7c3aed;">
        Bulanan
    </a>
</div>

<!-- Statistik & Kartu -->
<div class="row g-4 mb-4">
    <!-- Kartu Transaksi Hari Ini -->
    <div class="col-md-6 mb-4 hover:scale-105 transition-transform">
        <div class="card text-white bg-dark shadow rounded-4 p-4">
            <div class="card-body">
                <h5 class="card-title mb-3">Transaksi Hari Ini</h5>
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h3 class="fw-bold mb-0">{{ $totalTransaksi }}</h3>
                    <small class="text-white-50">#Sekarang</small>
                </div>
                <div class="mt-2 text-white-50">Status: <span class="text-success">Stabil</span></div>
            </div>
        </div>
    </div>

    <!-- Kartu Jumlah Petugas -->
    <div class="col-md-6 mb-4 hover:scale-105 transition-transform">
        <div class="card bg-white shadow rounded-4 p-4">
            <div class="card-body">
                <h5 class="card-title text-dark mb-3">Jumlah Petugas</h5>
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h3 class="fw-bold mb-0 text-dark">{{ $users->count() }}</h3>
                    <small class="text-muted">+1 petugas baru</small>
                </div>
                <div class="mt-2 text-black">Status: <span class="text-success">Baik</span></div>
            </div>
        </div>
    </div>
</div>

<!-- Ringkasan Transaksi -->
<h5 class="fw-bold mb-4">Ringkasan Transaksi {{ ucfirst($filter) }}</h5>
<div class="row g-4 mb-4">
    <div class="col-md-4 mb-4 hover:scale-105 transition-transform">
        <div class="card bg-white p-4 shadow rounded-4">
            <h6 class="text-secondary mb-2">Jumlah Transaksi</h6>
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="fw-bold">{{ $data->count() }}</h4>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4 hover:scale-105 transition-transform">
        <div class="card bg-white p-4 shadow rounded-4">
            <h6 class="text-secondary mb-2">Total Pendapatan</h6>
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="fw-bold">Rp {{ number_format($data->sum('biaya')) }}</h4>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4 hover:scale-105 transition-transform">
        <div class="card bg-white p-4 shadow rounded-4">
            <h6 class="text-secondary mb-2">Rata-rata Biaya</h6>
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="fw-bold">Rp {{ number_format($data->avg('biaya')) }}</h4>
            </div>
        </div>
    </div>
</div>

<!-- Tarif Aktif -->
<h5 class="fw-bold mb-4">Tarif Parkir Aktif</h5>
<div class="row g-3 mb-4">
    @foreach ($tarif as $t)
    <div class="col-md-6 mb-3">
        <div class="card bg-white p-4 shadow rounded-4">
            <h6 class="text-muted mb-2">{{ ucfirst($t->jenis_kendaraan) }}</h6>
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="fw-bold">Rp {{ number_format($t->tarif_per_jam) }} / jam</h4>
                <i class="bi bi-cash-coin fs-3 text-warning"></i>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Daftar Petugas -->
<h5 class="fw-bold mb-4">Daftar Petugas</h5>
<div class="card shadow rounded-4 p-4 mb-4">
    <table class="table align-middle">
        <thead class="table-light">
            <tr>
                <th>Petugas</th>
                <th>Username</th>
                <th>Dibuat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $u)
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://ui-avatars.com/api/?name={{ $u->username }}" class="rounded-circle me-3" width="40" height="40">
                        <div>
                            <strong>{{ ucfirst($u->username) }}</strong>
                            <small class="d-block text-muted">Petugas</small>
                        </div>
                    </div>
                </td>
                <td>{{ $u->username }}</td>
                <td>{{ $u->created_at->format('d M Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection