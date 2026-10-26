<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>{{ isset($pelanggan) ? 'Edit' : 'Tambah' }} Data Pelanggan</title>
</head>
<body>
<div class="container" style="max-width: 600px;">
    <h1>{{ isset($pelanggan) ? 'Edit' : 'Tambah' }} Data Pelanggan</h1>
    <div class="card-custom">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST"
              action="{{ isset($pelanggan) ? route('pelanggan.update', $pelanggan->id_pelanggan) : route('pelanggan.store') }}">
            @csrf
            @isset($pelanggan)
                @method('PUT')
            @endisset

            <div class="mb-3">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama"
                       value="{{ old('nama', $pelanggan->nama ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" placeholder="Masukkan alamat lengkap"
                       value="{{ old('alamat', $pelanggan->alamat ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label>No. Telpon</label>
                <input type="text" name="notelp" class="form-control" placeholder="Contoh: 08123456789"
                       value="{{ old('notelp', $pelanggan->notelp ?? '') }}" required>
            </div>
            <div class="mb-4">
                <label>Catatan</label>
                <input type="text" name="catatan" class="form-control" placeholder="Tambahkan catatan (opsional)"
                       value="{{ old('catatan', $pelanggan->catatan ?? '') }}">
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary w-100">
                    {{ isset($pelanggan) ? 'Update Data' : 'Simpan Data' }}
                </button>
                <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary w-100">Batal</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>