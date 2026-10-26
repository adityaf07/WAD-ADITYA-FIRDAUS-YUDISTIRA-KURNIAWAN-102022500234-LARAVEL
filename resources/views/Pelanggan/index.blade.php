<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Modul Data Pelanggan</title>
</head>
<body>
<div class="container">
    <h1>Data Pelanggan</h1>
    <div class="card-custom">
        <a href="{{ route('pelanggan.create') }}" class="btn btn-primary mb-4">+ Tambah Data</a>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No.Telpon</th>
                        <th>Catatan</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($pelanggan as $p)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->alamat }}</td>
                        <td>{{ $p->notelp }}</td>
                        <td>{{ $p->catatan }}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-secondary text-light btn-sm"
                                data-bs-toggle="modal" data-bs-target="#detail{{ $p->id_pelanggan }}">Detail</button>
                            <a href="{{ route('pelanggan.edit', $p->id_pelanggan) }}" class="btn btn-warning text-light btn-sm">Edit</a>
                            <form action="{{ route('pelanggan.destroy', $p->id_pelanggan) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>

                    {{-- Modal Detail --}}
                    <div class="modal fade" id="detail{{ $p->id_pelanggan }}" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Detail Pelanggan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Nama:</strong> {{ $p->nama }}</p>
                                    <p><strong>Alamat:</strong> {{ $p->alamat }}</p>
                                    <p><strong>No. Telpon:</strong> {{ $p->notelp }}</p>
                                    <p><strong>Catatan:</strong> {{ $p->catatan }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>