<div class="row">
    <!-- NIP -->
    <div class="col-md-6 mb-3">
        <label for="nip" class="form-label">NIP</label>
        <input
            type="text"
            class="form-control @error('nip') is-invalid @enderror"
            id="nip"
            name="nip"
            value="{{ old('nip', $guru->nip ?? '') }}"
            placeholder="Contoh: 198501012010011001"
        >
        @error('nip')
            <div class="invalid-feedback">{{ $message }}</div>
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
            <option value="L" {{ old('jenis_kelamin', $guru->jenis_kelamin ?? '') == 'L' ? 'selected' : '' }}>Laki-laki</option>
            <option value="P" {{ old('jenis_kelamin', $guru->jenis_kelamin ?? '') == 'P' ? 'selected' : '' }}>Perempuan</option>
        </select>
        @error('jenis_kelamin')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<!-- Nama Guru -->
<div class="mb-3">
    <label for="nama_guru" class="form-label">Nama Guru <span class="text-danger">*</span></label>
    <input
        type="text"
        class="form-control @error('nama_guru') is-invalid @enderror"
        id="nama_guru"
        name="nama_guru"
        value="{{ old('nama_guru', $guru->nama_guru ?? '') }}"
        placeholder="Contoh: Drs. Budi Santoso, M.Pd."
        required
    >
    @error('nama_guru')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
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
            value="{{ old('nomor_telepon', $guru->nomor_telepon ?? '') }}"
            placeholder="Contoh: 08123456789"
        >
        @error('nomor_telepon')
            <div class="invalid-feedback">{{ $message }}</div>
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
            value="{{ old('email', $guru->email ?? '') }}"
            placeholder="Contoh: budi@school.id"
        >
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
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
        placeholder="Contoh: Jl. Melati No. 5, Bandung"
    >{{ old('alamat', $guru->alamat ?? '') }}</textarea>
    @error('alamat')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Tombol Aksi -->
<div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary">
        {{ $submitLabel ?? 'Simpan' }}
    </button>
    <a href="{{ route('guru.index') }}" class="btn btn-secondary">
        Kembali
    </a>
</div>