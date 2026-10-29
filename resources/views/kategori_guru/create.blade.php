@extends('_layouts.app')

@section('title', 'Tambah Kategori Guru')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Tambah Kategori Guru Baru</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('kategori_guru.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_kategori" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Contoh: Guru Normatif / Adaptif" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('kategori_guru.index') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-success">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection