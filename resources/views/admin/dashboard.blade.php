@extends('layouts.admin')

@section('content')

<h4 class="fw-bold mb-4" data-aos="fade-right">Dashboard Admin</h4>

<div class="mb-4 d-flex gap-2" data-aos="zoom-in" data-aos-delay="100">
    @foreach (['harian', 'mingguan', 'bulanan'] as $tipe)
        <a href="{{ route('admin.dashboard', ['filter' => $tipe]) }}"
           class="btn {{ $filter === $tipe ? 'btn-primary' : 'btn-outline-primary' }}"
           style="background:{{ $filter === $tipe ? '#7c3aed' : 'transparent' }};
                  color:{{ $filter === $tipe ? '#fff' : '#7c3aed' }};
                  border-color:#7c3aed;">
            {{ ucfirst($tipe) }}
        </a>
    @endforeach
</div>

<div class="row g-4 mb-4">

    <div class="col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
        <div class="card text-white bg-dark shadow rounded-4 p-4 hover:scale-105 transition-transform">
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

    <div class="col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
        <div class="card bg-white shadow rounded-4 p-4 hover:scale-105 transition-transform">
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

<h5 class="fw-bold mb-4" data-aos="fade-right">Ringkasan Transaksi {{ ucfirst($filter) }}</h5>
<div class="row g-4 mb-4">
    <div class="col-md-4" data-aos="zoom-in-up" data-aos-delay="100">
        <div class="card bg-white p-4 shadow rounded-4 hover:scale-105 transition-transform">
            <h6 class="text-secondary mb-2">Jumlah Transaksi</h6>
            <h4 class="fw-bold">{{ $data->count() }}</h4>
        </div>
    </div>
    <div class="col-md-4" data-aos="zoom-in-up" data-aos-delay="200">
        <div class="card bg-white p-4 shadow rounded-4 hover:scale-105 transition-transform">
            <h6 class="text-secondary mb-2">Total Pendapatan</h6>
            <h4 class="fw-bold">Rp {{ number_format($data->sum('biaya')) }}</h4>
        </div>
    </div>
    <div class="col-md-4" data-aos="zoom-in-up" data-aos-delay="300">
        <div class="card bg-white p-4 shadow rounded-4 hover:scale-105 transition-transform">
            <h6 class="text-secondary mb-2">Rata-rata Biaya</h6>
            <h4 class="fw-bold">Rp {{ number_format($data->avg('biaya')) }}</h4>
        </div>
    </div>
</div>

<h5 class="fw-bold mb-4" data-aos="fade-right">Tarif Parkir Aktif</h5>
<div class="row g-3 mb-4">
    @foreach ($tarif as $t)
    <div class="col-md-6" data-aos="flip-left" data-aos-delay="{{ $loop->index * 100 }}">
        <div class="card bg-white p-4 shadow rounded-4 hover:scale-105 transition-transform">
            <h6 class="text-muted mb-2">{{ ucfirst($t->jenis_kendaraan) }}</h6>
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="fw-bold">Rp {{ number_format($t->tarif_per_jam) }} / jam</h4>
                <i class="bi bi-cash-coin fs-3 text-warning"></i>
            </div>
        </div>
    </div>
    @endforeach
</div>

<h5 class="fw-bold mb-4" data-aos="fade-right">Daftar Petugas</h5>
<div class="card shadow rounded-4 p-4 mb-4" data-aos="fade-up" data-aos-delay="200">
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
