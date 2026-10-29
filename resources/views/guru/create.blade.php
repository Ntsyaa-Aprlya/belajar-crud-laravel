@extends('_layouts.app')

@section('title', 'Tambah Guru')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-semibold">Tambah Data Guru</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('guru.store') }}" method="POST">
                    @csrf
                    @include('guru._form', ['submitLabel' => 'Simpan'])
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
