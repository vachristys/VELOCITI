@extends('layouts.petugas')

@section('title', 'Struk Keluar')

@section('content')
<div class="row g-4">
    {{-- Kiri: Kamera & QR --}}
    <div class="col-md-6">
        {{-- Kamera --}}
        <h5 class="fw-bold mb-2">Kamera Parkir</h5>
        <video id="preview" autoplay playsinline class="w-100 rounded shadow-sm mb-4" style="height: 240px; object-fit: cover;"></video>

        {{-- QR Code + Gambar --}}
        <div class="d-flex align-items-center justify-content-center gap-3">
            {{-- Gambar --}}
            
            {{-- QR --}}
            <div class="text-center">
                <h6 class="mb-2">Kode Parkir</h6>
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=120x120&data={{ $parkir->plat_nomor }}" alt="QR Code" class="img-thumbnail">
            </div>
        </div>
    </div>

    {{-- Kanan: Info + Total --}}
    <div class="col-md-6">
{{-- Info Kendaraan --}}
<div class="card shadow-sm mb-3 transition transform hover:shadow-lg hover:scale-105" style="max-width: 320px; margin-left:auto; margin-right:auto;">
    <div class="card-header bg-white fw-bold">Detail Kendaraan</div>
    <div class="card-body">
        <p class="mb-1"><strong>Plat:</strong> {{ $parkir->plat_nomor }}</p>
        <p class="mb-1"><strong>Jenis:</strong> {{ ucfirst($parkir->jenis_kendaraan) }}</p>
        <p class="mb-1"><strong>Masuk:</strong> {{ $parkir->waktu_masuk }}</p>
        <p class="mb-1"><strong>Keluar:</strong> {{ $parkir->waktu_keluar }}</p>
        <p class="mb-0"><strong>Durasi:</strong> {{ $parkir->durasi }} menit</p>
    </div>
</div>

       {{-- Total Biaya + Tarif --}}
<div class="d-flex justify-content-between align-items-start gap-2 mb-3">
    {{-- Tarif --}}
    <div class="card text-center shadow-sm p-3 transition transform hover:shadow-lg hover:scale-105" style="width: 220px;">
        <h6 class="mb-1">Tarif per Jam</h6>
        <div class="text-dark fw-bold fs-3">
            Rp {{ number_format(App\Models\Tarif::where('jenis_kendaraan', $parkir->jenis_kendaraan)->first()->tarif_per_jam ?? 5000) }}
        </div>
    </div>
    {{-- Total --}}
    <div class="card text-center shadow-sm p-3 transition transform hover:shadow-lg hover:scale-105" style="width: 220px;">
        <h6 class="mb-1">Total Biaya</h6>
        <div class="text-success fw-bold fs-3">Rp {{ number_format($parkir->biaya) }}</div>
    </div>
</div>

        {{-- Button Selesai --}}
        <form method="POST" action="{{ route('petugas.selesaiBayar', $parkir->id) }}">
            @csrf
            <button type="submit" class="btn w-100 hover:scale-105" style="background:#7c3aed; color:#fff;">Selesai Bayar</button>
        </form>
    </div>
</div>

{{-- Kamera --}}
<script>
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(stream => {
            document.getElementById('preview').srcObject = stream;
        })
        .catch(error => {
            alert('Kamera tidak tersedia: ' + error.message);
        });
</script>
@endsection
