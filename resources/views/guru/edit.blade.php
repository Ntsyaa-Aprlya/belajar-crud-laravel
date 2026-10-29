@extends('_layouts.app')

@section('title', 'Edit Guru')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-semibold">Edit Data Guru</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('guru.update', $guru->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('guru._form', ['submitLabel' => 'Perbarui'])
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
