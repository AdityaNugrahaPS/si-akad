@extends('layout.default', [
])

@section('title', 'Mata Pelajaran')

@push('css')
  <!-- extra css here -->
@endpush

@push('js')
  <!-- extra js here -->
@endpush

@section('content')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('mata-pelajaran.index') }}">Mata Pelajaran</a></li>
    <li class="breadcrumb-item active">Edit Mata Pelajaran</li>
  </ul>
  <div class="card">
    <div class="card-header">
      <h3>Edit Mata Pelajaran</h3>
      <form action="{{ route('mata-pelajaran.update', $mataPelajaran->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="nama_mata_pelajaran" class="form-label">Nama Mata Pelajaran<span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('nama_mata_pelajaran') is-invalid @enderror" id="nama_mata_pelajaran" name="nama_mata_pelajaran" value="{{ old('nama_mata_pelajaran') ?? $mataPelajaran->nama_mata_pelajaran }}">
            @error('nama_mata_pelajaran')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="kode_mata_pelajaran" class="form-label">Kode Mata Pelajaran<span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('kode_mata_pelajaran') is-invalid @enderror" id="kode_mata_pelajaran" name="kode_mata_pelajaran" value="{{ old('kode_mata_pelajaran') ?? $mataPelajaran->kode_mata_pelajaran }}">
            @error('kode_mata_pelajaran')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="kelompok" class="form-label">Kelompok<span class="text-danger">*</span></label>
            <select name="kelompok" class="form-select @error('kelompok') is-invalid @enderror">
              <option value="A" {{ (old('kelompok') ?? $mataPelajaran->kelompok) === "A" ? "selected" : "" }}>A</option>
              <option value="B" {{ (old('kelompok') ?? $mataPelajaran->kelompok) === "B" ? "selected" : "" }}>B</option>
              <option value="C" {{ (old('kelompok') ?? $mataPelajaran->kelompok) === "C" ? "selected" : "" }}>C</option>
            </select>
            @error('kelompok')
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
