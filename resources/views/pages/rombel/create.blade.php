@extends('layout.default')

@section('title', 'Tambah Rombel')

@push('css')
  <!-- extra css here -->
@endpush

@push('js')
  <!-- extra js here -->
@endpush

@section('content')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('rombel.index') }}">Rombel</a></li>
    <li class="breadcrumb-item active">Tambah Rombel</li>
  </ul>

  <div class="card">
    <div class="card-header">
      <h3 class="mb-4"><i class="fa fa-users"></i> Tambah Rombel</h3>
      <form action="{{ route('rombel.store') }}" method="POST">
        @csrf
        <div class="row">
          <div class="col-12">
            <h5 class="mb-3"><i class="fa fa-info-circle"></i> Informasi Rombel</h5>
            <hr>
          </div>

          <div class="col-md-6 mb-3">
            <label for="tahun_pelajaran" class="form-label"><i class="fa fa-calendar"></i> Tahun Pelajaran<span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('tahun_pelajaran') is-invalid @enderror" id="tahun_pelajaran" name="tahun_pelajaran" value="{{ old('tahun_pelajaran') }}" placeholder="yyyy/yyyy">
            @error('tahun_pelajaran')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="semester" class="form-label"><i class="fa fa-clock"></i> Semester<span class="text-danger">*</span></label>
            <select name="semester" class="form-select @error('semester') is-invalid @enderror">
              <option value="ganjil" {{ old('semester') === "ganjil" ? "selected" : "" }}>Ganjil</option>
              <option value="genap" {{ old('semester') === "genap" ? "selected" : "" }}>Genap</option>
            </select>
            @error('semester')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="kelas_id" class="form-label"><i class="fa fa-school"></i> Kelas<span class="text-danger">*</span></label>
            <select name="kelas_id" class="form-select @error('kelas_id') is-invalid @enderror">
              @foreach ($kelas as $kls)
                <option value="{{ $kls->id }}" {{ old('kelas_id') == $kls->id ? "selected" : "" }}>{{ $kls->nama_kelas }}</option>
              @endforeach
            </select>
            @error('kelas_id')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="siswa_id" class="form-label"><i class="fa fa-user"></i> Nama Siswa<span class="text-danger">*</span></label>
            <select name="siswa_id" class="form-select @error('siswa_id') is-invalid @enderror">
              @foreach ($siswas as $siswa)
                <option value="{{ $siswa->id }}" {{ old('siswa_id') == $siswa->id ? "selected" : "" }}>{{ $siswa->nama_lengkap }}</option>
              @endforeach
            </select>
            @error('siswa_id')
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
