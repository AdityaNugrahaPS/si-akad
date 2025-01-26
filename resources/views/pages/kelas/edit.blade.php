@extends('layout.default', [
])

@section('title', 'Kelas')

@push('css')
  <!-- extra css here -->
@endpush

@push('js')
  <!-- extra js here -->
@endpush

@section('content')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('kelas.index') }}">Kelas</a></li>
    <li class="breadcrumb-item active">Edit Kelas</li>
  </ul>
  <div class="card">
    <div class="card-header">
      <h3 class="mb-4"><i class="fa fa-chalkboard-teacher"></i> Edit Kelas</h3>
      <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="row">
          <div class="col-12">
            <h5 class="mb-3"><i class="fa fa-info-circle"></i> Informasi Kelas</h5>
            <hr>
          </div>

          <div class="col-md-6 mb-3">
            <label for="tingkat" class="form-label"><i class="fa fa-graduation-cap"></i> Tingkat<span class="text-danger">*</span></label>
            <select name="tingkat" class="form-select @error('tingkat') is-invalid @enderror">
              <option value="10" {{ (old('tingkat') ?? $kelas->tingkat) === "10" ? "selected" : "" }}>10</option>
              <option value="11" {{ (old('tingkat') ?? $kelas->tingkat) === "11" ? "selected" : "" }}>11</option>
              <option value="12" {{ (old('tingkat') ?? $kelas->tingkat) === "12" ? "selected" : "" }}>12</option>
            </select>
            @error('tingkat')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="nama_kelas" class="form-label"><i class="fa fa-book"></i> Nama Kelas<span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror" id="nama_kelas" name="nama_kelas" value="{{ old('nama_kelas') ?? $kelas->nama_kelas }}">
            @error('nama_kelas')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="kode_kelas" class="form-label"><i class="fa fa-code"></i> Kode Kelas<span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('kode_kelas') is-invalid @enderror" id="kode_kelas" name="kode_kelas" value="{{ old('kode_kelas') ?? $kelas->kode_kelas }}">
            @error('kode_kelas')
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
