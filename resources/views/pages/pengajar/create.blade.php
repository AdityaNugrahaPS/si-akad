@extends('layout.default', [])

@section('title', 'Tambah Pengajar')

@push('css')
    <!-- extra css here -->
@endpush

@push('js')
    <!-- extra js here -->
@endpush

@section('content')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('pengajar.index') }}">Pengajar</a></li>
        <li class="breadcrumb-item active">Tambah Pengajar</li>
    </ul>
    <div class="card">
        <div class="card-header">
            <h3>Tambah Pengajar</h3>
            <form action="{{ route('pengajar.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="tahun_pelajaran" class="form-label">Tahun Pelajaran<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('tahun_pelajaran') is-invalid @enderror"
                            id="tahun_pelajaran" name="tahun_pelajaran" value="{{ old('tahun_pelajaran') }}"
                            placeholder="YYYY/YYYY">
                        @error('tahun_pelajaran')
                            <div class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="semester" class="form-label">Semester<span class="text-danger">*</span></label>
                        <select name="semester" class="form-select @error('semester') is-invalid @enderror">
                            <option value="ganjil" {{ old('semester') === 'ganjil' ? 'selected' : '' }}>Ganjil</option>
                            <option value="genap" {{ old('semester') === 'genap' ? 'selected' : '' }}>Genap</option>
                        </select>
                        @error('semester')
                            <div class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="nama_guru" class="form-label">Nama Guru<span class="text-danger">*</span></label>
                        <select name="nama_guru" id="nama_guru"
                            class="form-select @error('nama_guru') is-invalid @enderror">
                            <option value="" disabled selected>Pilih Guru</option>
                            @foreach ($gurus as $guru)
                                <option value="{{ $guru->nama_lengkap }}"
                                    {{ old('nama_guru') === $guru->nama_lengkap ? 'selected' : '' }}>
                                    {{ $guru->nama_lengkap }}
                                </option>
                            @endforeach
                        </select>
                        @error('nama_guru')
                            <div class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="nama_mapel" class="form-label">Nama Mata Pelajaran<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama_mapel') is-invalid @enderror" id="nama_mapel"
                            name="nama_mapel" value="{{ old('nama_mapel') }}">
                        @error('nama_mapel')
                            <div class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="nama_kelas" class="form-label">Nama Kelas<span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror" id="nama_kelas"
                            name="nama_kelas" value="{{ old('nama_kelas') }}">
                        @error('nama_kelas')
                            <div class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-2">
                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
