@extends('_layouts.app')

@section('title', 'Data Siswa - SmartSekolah')

@section('content')
<div class="row">
    <div class="col-12">
        <!-- Notifikasi Berhasil -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                <h5 class="mb-0 fw-semibold">Daftar Siswa</h5>
                <a href="{{ url('/siswa/create') }}" class="btn btn-primary btn-sm">
                    + Tambah Siswa
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 50px;" class="text-center">No</th>
                                <th>NIS / NISN</th>
                                <th>Nama Lengkap</th>
                                <th class="text-center">L/P</th>
                                <th>Jurusan</th>
                                <th>Kontak</th>
                                <th style="width: 160px;" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($siswa as $index => $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>
                                    <div><strong>{{ $item->nis ?: '-' }}</strong></div>
                                    <small class="text-muted">{{ $item->nisn ?: '-' }}</small>
                                </td>
                                <td>
                                    <div class="fw-semibold">{{ $item->nama_lengkap }}</div>
                                    @if ($item->tempat_lahir || $item->tanggal_lahir)
                                        <small class="text-muted">
                                            {{ $item->tempat_lahir ? $item->tempat_lahir . ', ' : '' }}
                                            {{ $item->tanggal_lahir ? date('d-m-Y', strtotime($item->tanggal_lahir)) : '' }}
                                        </small>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($item->jenis_kelamin === 'L')
                                        <span class="badge bg-primary">L</span>
                                    @elseif ($item->jenis_kelamin === 'P')
                                        <span class="badge bg-danger">P</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $item->nama_jurusan ?: '-' }}
                                </td>
                                <td>
                                    @if ($item->nomor_telepon)
                                        <div>{{ $item->nomor_telepon }}</div>
                                    @endif
                                    @if ($item->email)
                                        <small class="text-muted">{{ $item->email }}</small>
                                    @endif
                                    @if (! $item->nomor_telepon && ! $item->email)
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('/siswa/' . $item->id . '/edit') }}" class="btn btn-warning btn-sm me-1">
                                        Edit
                                    </a>
                                    <form action="{{ url('/siswa/' . $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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
                                <td colspan="7" class="text-center text-muted py-3">
                                    Belum ada data siswa. Silakan klik tombol <strong>+ Tambah Siswa</strong>.
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