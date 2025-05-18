@extends('layouts.petugas')

@section('title', 'Dashboard Petugas')

@section('content')
<div class="row mb-5 mt-3 px-2">
    {{-- Kamera dan Slot --}}
    <div class="col-lg-7 mb-4">
        <div class="d-flex justify-content-between align-items-center mb-3" data-aos="fade-right">
    <h2 class="fw-bold fs-4 mb-0">Kamera Parkir</h2>
    <button class="btn btn-sm btn-outline-dark text-purple-700 fw-semibold rounded-pill shadow-sm"
        data-bs-toggle="modal" data-bs-target="#bantuanModal">
        <i class="bi bi-question-circle-fill me-1"></i> Pusat Bantuan
    </button>
</div>


        <video id="preview" autoplay playsinline 
            class="w-100 rounded shadow mb-4" 
            style="height: 240px; object-fit: cover;" 
            data-aos="zoom-in">
        </video>
{{-- Modal Bantuan --}}
<div class="modal fade" id="bantuanModal" tabindex="-1" aria-labelledby="bantuanModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark text-white rounded-4 animate__animated animate__fadeInUp">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="bantuanModalLabel">Pusat Bantuan</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body text-sm">
        <ul class="ps-3">
          <li>Pastikan kamera aktif saat mencatat kendaraan masuk.</li>
          <li>Gunakan slot sesuai kapasitas kendaraan.</li>
          <li>Hubungi Admin jika terjadi gangguan.</li>
        </ul>
      </div>
    </div>
  </div>
</div>



        <h2 class="fw-bold fs-4 mb-3 p6" data-aos="fade-right" data-aos-delay="100">Status Slot</h2>
        <div class="row g-3">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-light rounded-4 shadow text-center p-4 hover:scale-105 transition-transform">
                    <h6 class="text-muted mb-1">Total Slot</h6>
                    <h4 class="fw-bold">{{ $totalSlot ?? 50 }}</h4>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-danger text-white rounded-4 shadow text-center p-4 hover:scale-105 transition-transform">
                    <h6 class="mb-1">Terisi</h6>
                    <h4 class="fw-bold">{{ $terisi }}</h4>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="bg-success text-white rounded-4 shadow text-center p-4 hover:scale-105 transition-transform">
                    <h6 class="mb-1">Tersedia</h6>
                    <h4 class="fw-bold">{{ $tersedia }}</h4>
                </div>
            </div>
        </div>
    </div>

    {{-- Profil, Jam, Cuaca, Kalender --}}
<div class="col-lg-5 mb-4">
    {{-- Profil --}}
    <div class="bg-white text-purple-700 rounded shadow p-3 d-flex align-items-center mb-4" data-aos="fade-left">
        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->username }}" alt="Profil"
             class="rounded-circle me-3" width="60" height="60">
        <div>
            <h6 class="mb-0 fw-bold">Petugas Parkir</h6>
            <small class="text-muted">{{ Auth::user()->username }}</small>
        </div>
    </div>

    {{-- Baris Jam dan Cuaca --}}
<div class="row mb-4">
    {{-- Jam Digital --}}
    <div class="col-md-6 mb-3 mb-md-0" data-aos="fade-up" data-aos-delay="100">
        <div class="rounded-xl bg-black text-purple-400 p-4 text-center shadow-lg transition-transform-transform hover:scale-105 duration-300">
            <h6 class="text-xs tracking-widest uppercase mb-1">Jam Sekarang</h6>
            <div id="jam-digital" class="text-3xl md:text-4xl font-mono font-bold">--:--:--</div>
        </div>
    </div>

    {{-- Cuaca --}}
    <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="rounded-xl bg-gradient-to-br from-purple-700 via-black to-gray-900 text-white p-4 text-center shadow-lg transition-transform-transform hover:scale-105 duration-300">
            <h6 class="text-xs tracking-widest uppercase mb-1">Cuaca Hari Ini</h6>
            <div class="text-yellow-300 text-2xl md:text-3xl mb-1">
                <i class="bi bi-cloud-sun-fill"></i>
            </div>
            <p class="text-sm md:text-lg font-semibold">Cerah</p>
            <p class="text-xs text-gray-300">27°C - Jakarta</p>
        </div>
    </div>
</div>


<h2 class="fw-bold fs-4 mb-3" data-aos="fade-left" data-aos-delay="200">Kalender</h2>
<div class="bg-white rounded shadow p-2" data-aos="fade-left" data-aos-delay="300">
    <iframe src="https://calendar.google.com/calendar/embed?showTitle=0&showNav=0&showDate=1&showTabs=0&showPrint=0&mode=MONTH"
        style="border: 0" width="100%" height="250" frameborder="0" scrolling="no"></iframe>
</div>


</div>



{{-- Transaksi Terbaru --}}
<div class="mt-5 px-2">
    <h2 class="fw-bold fs-4 mb-3" data-aos="fade-up">Transaksi Terbaru</h2>
    <div class="table-responsive shadow-sm rounded bg-white" data-aos="fade-up" data-aos-delay="100">
        <table class="table table-hover table-striped table-borderless align-middle text-sm">
            <thead class="table-light">
                <tr class="text-muted fw-semibold">
                    <th>No</th>
                    <th>Plat</th>
                    <th>Jenis</th>
                    <th>Masuk</th>
                    <th>Keluar</th>
                    <th>Durasi</th>
                    <th>Biaya</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($parkirList->take(10) as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="fw-semibold">{{ $item->plat_nomor }}</td>
                    <td>
                        <i class="bi {{ $item->jenis_kendaraan === 'mobil' ? 'bi-car-front' : 'bi-bicycle' }}"></i>
                        {{ ucfirst($item->jenis_kendaraan) }}
                    </td>
                    <td>{{ $item->waktu_masuk }}</td>
                    <td>{{ $item->waktu_keluar ?? '-' }}</td>
                    <td>{{ $item->durasi ? $item->durasi . ' menit' : '-' }}</td>
                    <td class="fw-semibold text-success">
                        {{ $item->biaya ? 'Rp ' . number_format($item->biaya) : '-' }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- Kamera Script --}}
<script>
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(stream => {
            document.getElementById('preview').srcObject = stream;
        })
        .catch(error => {
            alert('Kamera tidak tersedia: ' + error.message);
        });
</script>

<script>
    function updateJam() {
        const now = new Date();
        const jam = now.getHours().toString().padStart(2, '0');
        const menit = now.getMinutes().toString().padStart(2, '0');
        document.getElementById('jam-digital').textContent = `${jam}:${menit}`;
    }
    setInterval(updateJam, 1000);
    updateJam();
</script>

@endsection
