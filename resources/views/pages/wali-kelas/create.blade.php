@extends('layout.default', [])

@section('title', 'Wali Kelas')

@push('css')
    <!-- extra css here -->
@endpush

@push('js')
    <!-- extra js here -->
@endpush

@section('content')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('wali-kelas.index') }}">Wali Kelas</a></li>
        <li class="breadcrumb-item active">Tambah Wali Kelas</li>
    </ul>
    <div class="card">
        <div class="card-header">
            <h3>Tambah Wali Kelas</h3>
            <form action="{{ route('wali-kelas.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="guru_id" class="form-label">Nama Guru<span class="text-danger">*</span></label>
                        <select name="guru_id" id="guru_id" class="form-select @error('guru_id') is-invalid @enderror">
                            <option value="">Pilih Guru</option>
                            @foreach ($gurus as $guru)
                                <option value="{{ $guru->id }}" {{ old('guru_id') == $guru->id ? 'selected' : '' }}>
                                    {{ $guru->nama_lengkap }}</option>
                            @endforeach
                        </select>
                        @error('guru_id')
                            <div class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="tingkat" class="form-label">Tingkat<span class="text-danger">*</span></label>
                        <select name="tingkat" class="form-select @error('tingkat') is-invalid @enderror">
                            <option value="10" {{ old('tingkat') === '10' ? 'selected' : '' }}>10</option>
                            <option value="11" {{ old('tingkat') === '11' ? 'selected' : '' }}>11</option>
                            <option value="12" {{ old('tingkat') === '12' ? 'selected' : '' }}>12</option>
                        </select>
                        @error('tingkat')
                            <div class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="kelas_id" class="form-label">Nama Kelas<span class="text-danger">*</span></label>
                        <select name="kelas_id" id="kelas_id" class="form-select @error('kelas_id') is-invalid @enderror">
                            <option value="">Pilih Kelas</option>
                            @foreach ($kelas as $k)
                                <option value="{{ $k->id }}" {{ old('kelas_id') == $k->id ? 'selected' : '' }}>
                                    {{ $k->nama_kelas }}</option>
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
                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
