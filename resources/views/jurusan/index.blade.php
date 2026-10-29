@extends('_layouts.app')

@section('title', 'Data Jurusan - SmartSekolah')

@section('content')
<div class="row">
    <div class="col-12">
        <!-- Notifikasi Berhasil -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                <h5 class="mb-0 fw-semibold">Daftar Jurusan</h5>
                <a href="{{ url('/jurusan/create') }}" class="btn btn-primary btn-sm">
                    + Tambah Jurusan
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 60px;" class="text-center">No</th>
                                <th>Nama Jurusan</th>
                                <th style="width: 180px;" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($jurusan as $index => $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_jurusan }}</td>
                                <td class="text-center">
                                    <!-- Tombol Edit -->
                                    <a href="{{ url('/jurusan/' . $item->id . '/edit') }}" class="btn btn-warning btn-sm me-1">
                                        Edit
                                    </a>

                                    <!-- Form Tombol Hapus -->
                                    <form action="{{ url('/jurusan/' . $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted py-3">
                                    Belum ada data jurusan. Silakan klik tombol <strong>+ Tambah Jurusan</strong>.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection