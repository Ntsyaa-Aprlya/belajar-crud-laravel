@extends('_layouts.app')

@section('title', 'Edit Jurusan – SmartSekolah')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-semibold">Edit Data Jurusan</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ url('/jurusan/' . $jurusan->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Nama Jurusan -->
                    <div class="mb-4">
                        <label for="nama_jurusan" class="form-label">Nama Jurusan</label>
                        <input
                            type="text"
                            class="form-control @error('nama_jurusan') is-invalid @enderror"
                            id="nama_jurusan"
                            name="nama_jurusan"
                            value="{{ old('nama_jurusan', $jurusan->nama_jurusan) }}"
                            required
                        >
                        @error('nama_jurusan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                        <a href="{{ url('/jurusan') }}" class="btn btn-secondary">
                            Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection