@extends('layout.default')

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
            <h3 class="mb-4"><i class="fa fa-user-plus"></i> Tambah Pengajar</h3>
            <form action="{{ route('pengajar.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <h5 class="mb-3"><i class="fa fa-info-circle"></i> Informasi Pengajar</h5>
                        <hr>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="tahun_pelajaran" class="form-label">
                            <i class="fa fa-calendar"></i> Tahun Pelajaran<span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control @error('tahun_pelajaran') is-invalid @enderror"
                            id="tahun_pelajaran" name="tahun_pelajaran" value="{{ old('tahun_pelajaran') }}"
                            placeholder="yyyy/yyyy">
                        @error('tahun_pelajaran')
                            <div class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="semester" class="form-label">
                            <i class="fa fa-layer-group"></i> Semester<span class="text-danger">*</span>
                        </label>
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
                        <label for="guru_id" class="form-label">
                            <i class="fa fa-chalkboard-teacher"></i> Nama Guru<span class="text-danger">*</span>
                        </label>
                        <select name="guru_id" id="guru_id" class="form-select @error('guru_id') is-invalid @enderror">
                            <option value="" disabled selected>Pilih Guru</option>
                            @foreach ($gurus as $guru)
                                <option value="{{ $guru->id }}" {{ old('guru_id') == $guru->id ? 'selected' : '' }}>
                                    {{ $guru->nama_lengkap }}
                                </option>
                            @endforeach
                        </select>
                        @error('guru_id')
                            <div class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Ubah kolom Nama Mata Pelajaran dari input text menjadi dropdown -->
                    <div class="col-md-6 mb-3">
                        <label for="mata_pelajaran_id" class="form-label">
                            <i class="fa fa-book"></i> Nama Mata Pelajaran<span class="text-danger">*</span>
                        </label>
                        <select name="mata_pelajaran_id" id="mata_pelajaran_id"
                            class="form-select @error('mata_pelajaran_id') is-invalid @enderror">
                            <option value="" disabled selected>Pilih Mata Pelajaran</option>
                            @foreach ($mataPelajarans as $mapel)
                                <option value="{{ $mapel->id }}"
                                    {{ old('mata_pelajaran_id') == $mapel->id ? 'selected' : '' }}>
                                    {{ $mapel->nama_mata_pelajaran }}
                                </option>
                            @endforeach
                        </select>
                        @error('mata_pelajaran_id')
                            <div class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Dropdown untuk Kelas -->
                    <div class="col-md-6 mb-3">
                        <label for="kelas_id" class="form-label">
                            <i class="fa fa-building"></i> Kelas<span class="text-danger">*</span>
                        </label>
                        <select name="kelas_id" id="kelas_id" class="form-select @error('kelas_id') is-invalid @enderror">
                            <option value="" disabled selected>Pilih Kelas</option>
                            @foreach ($kelas as $item)
                                <option value="{{ $item->id }}" {{ old('kelas_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_kelas }}
                                </option>
                            @endforeach
                        </select>
                        @error('kelas_id')
                            <div class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>

                <div class="mb-2">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-check"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
