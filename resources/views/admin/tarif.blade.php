@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">Pengaturan Tarif Parkir</h4>

<div class="row row-cols-1 row-cols-md-2 g-4">
@foreach ($tarif as $row)
    <div class="col">
        <div class="card p-4 shadow rounded-4 border-0">
            <form method="POST" action="{{ route('admin.tarif.update', $row->id) }}">
                @csrf @method('PUT')
                <div class="mb-2">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="fw-bold mb-0">
                            <i class="bi {{ $row->jenis_kendaraan === 'mobil' ? 'bi-car-front-fill text-primary' : 'bi-bicycle text-success' }} me-2"></i>
                            {{ ucfirst($row->jenis_kendaraan) }}
                        </h6>
                    </div>
                    <label class="text-muted">Tarif / Jam</label>
                    <input type="number" name="tarif_per_jam" value="{{ $row->tarif_per_jam }}" class="form-control rounded" required>
                </div>
                <button class="btn btn-primary bg-purple-700 w-100 rounded" style="background:#7c3aed; color:#fff;">Update</button>
            </form>
        </div>
    </div>
@endforeach
</div>
@endsection
