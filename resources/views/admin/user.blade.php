@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">Manajemen Petugas</h4>

<div class="card p-4 mb-4 shadow rounded">
    <form method="POST" action="{{ route('admin.user.store') }}">
        @csrf
        <div class="row g-3">
            <div class="col-md-4">
                <label>Username</label>
                <input type="text" name="username" class="form-control rounded" required>
            </div>
            <div class="col-md-4">
                <label>Password</label>
                <input type="password" name="password" class="form-control rounded" required>
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button class="btn btn-primary bg-purple-700 w-100 rounded" style="background:#7c3aed; color:#fff;">Tambah</button>
            </div>

        </div>
    </form>
</div>

<h5 class="fw-bold mb-3">Daftar Petugas</h5>
<div class="card shadow rounded-4 p-3">
    <table class="table align-middle">
        <thead class="table-light">
            <tr>
                <th>Petugas</th>
                <th>Username</th>
                <th>Dibuat</th>
                <th>Aksi</th>
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
                <td>
                    <form action="{{ route('admin.user.destroy', $u->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus petugas ini?');" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
