@extends('layouts.petugas')

@section('title', 'Kendaraan Keluar')

@section('content')
<h4 class="mb-4 fw-bold">Kendaraan Keluar</h4>
@if ($data->isEmpty())
    <div class="alert alert-info">Tidak ada kendaraan yang sedang parkir.</div>
@else
<div class="row row-cols-1 row-cols-md-4 g-4">
    @foreach ($data as $d)
    <div class="col">
        <div class="card shadow h-100">
            <div class="card-body">
                <h5 class="card-title">{{ strtoupper($d->plat_nomor) }}</h5>
                <p class="mb-1"><i class="bi bi-car-front me-1"></i> Jenis: <strong>{{ ucfirst($d->jenis_kendaraan) }}</strong></p>
                <p class="mb-3"><i class="bi bi-clock me-1"></i> Masuk: {{ $d->waktu_masuk }}</p>
                <form method="POST" action="{{ url('/petugas/keluar/' . $d->id) }}">
                    @csrf
                    <button type="submit" class="btn w-100 hover:scale-105" style="background:#7c3aed; color:#fff;">Catat Keluar</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endif
@endsection
