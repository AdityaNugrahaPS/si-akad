@extends('layout.default', [
])

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
            <label for="nama_guru" class="form-label">Nama Guru<span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('nama_guru') is-invalid @enderror" id="nama_guru" name="nama_guru" value="{{ old('nama_guru') }}">
            @error('nama_guru')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <div class="col-md-6 mb-3">
            <label for="tingkat" class="form-label">Tingkat<span class="text-danger">*</span></label>
            <select name="tingkat" class="form-select @error('tingkat') is-invalid @enderror">
              <option value="10" {{ old('tingkat') === "10" ? "selected" : "" }}>10</option>
              <option value="11" {{ old('tingkat') === "11" ? "selected" : "" }}>11</option>
              <option value="12" {{ old('tingkat') === "12" ? "selected" : "" }}>12</option>
            </select>
            @error('tingkat')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="nama_kelas" class="form-label">Nama Kelas<span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror" id="nama_kelas" name="nama_kelas" value="{{ old('nama_kelas') }}">
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
