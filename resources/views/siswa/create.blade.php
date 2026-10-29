@extends('_layouts.app')

@section('title', 'Tambah Siswa - SmartSekolah')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-semibold">Tambah Data Siswa</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ url('/siswa') }}" method="POST">
                    @csrf

                    <div class="row">
                        <!-- NIS -->
                        <div class="col-md-6 mb-3">
                            <label for="nis" class="form-label">NIS</label>
                            <input
                                type="text"
                                class="form-control @error('nis') is-invalid @enderror"
                                id="nis"
                                name="nis"
                                value="{{ old('nis') }}"
                                placeholder="Contoh: 10245"
                            >
                            @error('nis')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- NISN -->
                        <div class="col-md-6 mb-3">
                            <label for="nisn" class="form-label">NISN</label>
                            <input
                                type="text"
                                class="form-control @error('nisn') is-invalid @enderror"
                                id="nisn"
                                name="nisn"
                                value="{{ old('nisn') }}"
                                placeholder="Contoh: 0051234567"
                            >
                            @error('nisn')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <!-- Nama Lengkap -->
                    <div class="mb-3">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                        <input
                            type="text"
                            class="form-control @error('nama_lengkap') is-invalid @enderror"
                            id="nama_lengkap"
                            name="nama_lengkap"
                            value="{{ old('nama_lengkap') }}"
                            placeholder="Contoh: Ahmad Fauzi"
                            required
                        >
                        @error('nama_lengkap')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="row">
                        <!-- Jurusan -->
                        <div class="col-md-6 mb-3">
                            <label for="jurusan_id" class="form-label">Jurusan</label>
                            <select
                                class="form-select @error('jurusan_id') is-invalid @enderror"
                                id="jurusan_id"
                                name="jurusan_id"
                            >
                                <option value="">-- Pilih Jurusan --</option>
                                @foreach ($jurusan as $j)
                                    <option value="{{ $j->id }}" {{ old('jurusan_id') == $j->id ? 'selected' : '' }}>
                                        {{ $j->nama_jurusan }}
                                    </option>
                                @endforeach
                            </select>
                            @error('jurusan_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="col-md-6 mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select
                                class="form-select @error('jenis_kelamin') is-invalid @enderror"
                                id="jenis_kelamin"
                                name="jenis_kelamin"
                            >
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <!-- Tempat Lahir -->
                        <div class="col-md-6 mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input
                                type="text"
                                class="form-control @error('tempat_lahir') is-invalid @enderror"
                                id="tempat_lahir"
                                name="tempat_lahir"
                                value="{{ old('tempat_lahir') }}"
                                placeholder="Contoh: Jakarta"
                            >
                            @error('tempat_lahir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Tanggal Lahir -->
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input
                                type="date"
                                class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                id="tanggal_lahir"
                                name="tanggal_lahir"
                                value="{{ old('tanggal_lahir') }}"
                            >
                            @error('tanggal_lahir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <!-- Nomor Telepon -->
                        <div class="col-md-6 mb-3">
                            <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                            <input
                                type="text"
                                class="form-control @error('nomor_telepon') is-invalid @enderror"
                                id="nomor_telepon"
                                name="nomor_telepon"
                                value="{{ old('nomor_telepon') }}"
                                placeholder="Contoh: 08123456789"
                            >
                            @error('nomor_telepon')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="Contoh: ahmad@gmail.com"
                            >
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <!-- Tanggal Masuk -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                            <input
                                type="date"
                                class="form-control @error('tanggal_masuk') is-invalid @enderror"
                                id="tanggal_masuk"
                                name="tanggal_masuk"
                                value="{{ old('tanggal_masuk') }}"
                            >
                            @error('tanggal_masuk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="mb-4">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea
                            class="form-control @error('alamat') is-invalid @enderror"
                            id="alamat"
                            name="alamat"
                            rows="3"
                            placeholder="Contoh: Jl. Merdeka No. 10, Jakarta Pusat"
                        >{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            Simpan
                        </button>
                        <a href="{{ url('/siswa') }}" class="btn btn-secondary">
                            Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection