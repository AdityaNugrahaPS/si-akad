@extends('layout.default', [])

@section('title', 'Tambah Grup')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('data-pengguna.kelola-grup.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama_grup" class="form-label">Nama Grup</label>
                    <input type="text" class="form-control" id="nama_grup" name="nama_grup" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi_grup" class="form-label">Deskripsi Grup</label>
                    <input type="text" class="form-control" id="deskripsi_grup" name="deskripsi_grup" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
