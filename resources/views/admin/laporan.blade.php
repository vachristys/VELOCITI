@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">Laporan Transaksi Parkir – {{ ucfirst($filter) }}</h4>

{{-- Filter --}}
<div class="mb-4 d-flex gap-2">
    <a href="?filter=harian" class="btn {{ $filter === 'harian' ? 'btn-primary' : 'btn-outline-primary' }}" style="background:{{ $filter === 'harian' ? '#7c3aed' : 'transparent' }}; color:{{ $filter === 'harian' ? '#fff' : '#7c3aed' }}; border-color:#7c3aed;">
        Harian
    </a>
    <a href="?filter=mingguan" class="btn {{ $filter === 'mingguan' ? 'btn-primary' : 'btn-outline-primary' }}" style="background:{{ $filter === 'mingguan' ? '#7c3aed' : 'transparent' }}; color:{{ $filter === 'mingguan' ? '#fff' : '#7c3aed' }}; border-color:#7c3aed;">
        Mingguan
    </a>
    <a href="?filter=bulanan" class="btn {{ $filter === 'bulanan' ? 'btn-primary' : 'btn-outline-primary' }}" style="background:{{ $filter === 'bulanan' ? '#7c3aed' : 'transparent' }}; color:{{ $filter === 'bulanan' ? '#fff' : '#7c3aed' }}; border-color:#7c3aed;">
        Bulanan
    </a>
</div>

{{-- Card List --}}
<div class="row row-cols-1 row-cols-md-3 g-4">
    @forelse ($data as $item)
    <div class="col">
        <div class="card shadow-sm rounded-4 border-0 h-100 hover:scale-105 transition-transform" id="card-{{ $item->id }}">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <div>
                        <h6 class="fw-bold mb-1">{{ $item->plat_nomor }}</h6>
                        <span class="badge bg-{{ $item->jenis_kendaraan === 'mobil' ? 'primary' : 'success' }}">
                            {{ ucfirst($item->jenis_kendaraan) }}
                        </span>
                    </div>
                    <small class="text-muted">{{ \Carbon\Carbon::parse($item->waktu_keluar)->format('d M Y') }}</small>
                </div>

                <ul class="list-unstyled small mb-3">
                    <li><i class="bi bi-clock me-1 text-primary"></i> Masuk: <strong>{{ \Carbon\Carbon::parse($item->waktu_masuk)->format('H:i') }}</strong></li>
                    <li><i class="bi bi-clock-history me-1 text-secondary"></i> Keluar: <strong>{{ \Carbon\Carbon::parse($item->waktu_keluar)->format('H:i') }}</strong></li>
                    <li><i class="bi bi-hourglass-split me-1 text-warning"></i> Durasi: {{ $item->durasi }} menit</li>
                </ul>

                <div class="d-flex justify-content-between align-items-center">
                    <span class="fw-bold text-success">Rp {{ number_format($item->biaya) }}</span>
                    <button onclick="printCard('card-{{ $item->id }}')" class="btn btn-outline-dark btn-sm">
                        <i class="bi bi-printer-fill me-1"></i> Cetak
                    </button>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="alert alert-info text-center">
            Tidak ada data transaksi {{ $filter }}.
        </div>
    </div>
    @endforelse
</div>
@endsection
