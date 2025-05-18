@extends('layouts.petugas')

@section('title', 'Catat Masuk')

@section('content')
<h2 class="mb-4 fw-bold display-6">Catat Kendaraan Masuk</h2>

<form method="POST" action="{{ url('/petugas/masuk') }}">
    @csrf
    <div class="row g-4 align-items-center">
        {{-- Kolom Kiri: Gambar --}}
        <div class="col-md-4 text-center">
            <img src="https://ui-avatars.com/api/?name=Kendaraan&background=6f42c1&color=fff&size=300"
                 alt="Gambar Kendaraan" class="img-fluid rounded" style="max-height: 240px;">
        </div>

        {{-- Kolom Kanan: Form --}}
<div class="col-md-8 bg-white shadow rounded-4 mx-auto" style="max-width: 600px;" data-aos="fade-up">


            <div class="card shadow-sm p-4 border-0">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Plat Nomor</label>
                    <input type="text" name="plat_nomor" class="form-control" placeholder="Contoh: B 1234 XYZ" required>
                </div>

                <div class="mb-3">
    <label class="form-label fw-semibold d-block mb-2">Jenis Kendaraan</label>
    <div class="d-flex gap-4">
        <label>
            <input type="radio" name="jenis_kendaraan" value="motor" class="peer hidden" required>
            <div class="border rounded p-2 text-center cursor-pointer transition
                        peer-checked:border-purple-600 peer-checked:ring-2 peer-checked:ring-purple-200">
                <i class="bi bi-bicycle fs-1 text-primary"></i>
            </div>
        </label>
        <label>
            <input type="radio" name="jenis_kendaraan" value="mobil" class="peer hidden" required>
            <div class="border rounded p-2 text-center cursor-pointer transition
                        peer-checked:border-purple-600 peer-checked:ring-2 peer-checked:ring-purple-200">
                <i class="bi bi-car-front fs-1 text-success"></i>
            </div>
        </label>
    </div>
</div>

<div class="mb-3">
    <label class="form-label fw-semibold d-block mb-2">Waktu Masuk</label>
    <div class="text-muted">
        {{ \Carbon\Carbon::now()->format('d-m-Y H:i:s') }}
    </div>
</div>

                <div class="text-end mt-3">
    <button type="submit" class="btn px-4" style="background:#7c3aed; color:#fff;">
        <i class="bi bi-save me-1"></i> Catat Masuk
    </button>
</div>
            </div>
        </div>
    </div>
</form>
@endsection
