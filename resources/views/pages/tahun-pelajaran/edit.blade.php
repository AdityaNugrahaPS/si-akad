@extends('layout.default')

@section('title', 'Edit Tahun Pelajaran')

@push('css')
  <!-- extra css here -->
@endpush

@push('js')
  <!-- extra js here -->
@endpush

@section('content')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('tahun-pelajaran.index') }}">Tahun Pelajaran</a></li>
    <li class="breadcrumb-item active">Edit Tahun Pelajaran</li>
  </ul>

  <div class="card">
    <div class="card-header">
      <h3 class="mb-4"><i class="fa fa-calendar-edit"></i> Edit Tahun Pelajaran</h3>
      <form action="{{ route('tahun-pelajaran.update', $tahunPelajaran->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="row">
          <div class="col-12">
            <h5 class="mb-3"><i class="fa fa-info-circle"></i> Informasi Tahun Pelajaran</h5>
            <hr>
          </div>
          
          <div class="col-md-6 mb-3">
            <label for="tahun" class="form-label"><i class="fa fa-calendar"></i> Tahun Pelajaran<span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('tahun') is-invalid @enderror" id="tahun" name="tahun" value="{{ old('tahun', $tahunPelajaran->tahun) }}" placeholder="yyyy/yyyy">
            @error('tahun')
              <div class="invalid-feedback text-danger">Isi dengan format yyyy/yyyy</div>
            @enderror
          </div>
          
          <div class="col-md-6 mb-3">
            <label for="semester" class="form-label"><i class="fa fa-book"></i> Semester<span class="text-danger">*</span></label>
            <select name="semester" class="form-select @error('semester') is-invalid @enderror">
              <option value="Ganjil" {{ (old('semester', $tahunPelajaran->semester) == 'Ganjil') ? 'selected' : '' }}>Ganjil</option>
              <option value="Genap" {{ (old('semester', $tahunPelajaran->semester) == 'Genap') ? 'selected' : '' }}>Genap</option>
            </select>
            @error('semester')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="col-md-6 mb-3">
            <label for="status" class="form-label"><i class="fa fa-toggle-on"></i> Status<span class="text-danger">*</span></label>
            <select name="status" class="form-select @error('status') is-invalid @enderror">
              <option value="Aktif" {{ (old('status', $tahunPelajaran->status) == 'Aktif') ? 'selected' : '' }}>Aktif</option>
              <option value="Tidak Aktif" {{ (old('status', $tahunPelajaran->status) == 'Tidak Aktif') ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
            @error('status')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="col-md-6 mb-3">
            <label for="guru_id" class="form-label"><i class="fa fa-user"></i> Guru<span class="text-danger">*</span></label>
            <select name="guru_id" class="form-select @error('guru_id') is-invalid @enderror">
              @foreach ($gurus as $guru)
                <option value="{{ $guru->id }}" {{ (old('guru_id', $tahunPelajaran->guru_id) == $guru->id) ? 'selected' : '' }}>{{ $guru->nama_lengkap }}</option>
              @endforeach
            </select>
            @error('guru_id')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="col-md-6 mb-3">
            <label for="tanggal_rapor" class="form-label"><i class="fa fa-calendar-day"></i> Tanggal Rapor<span class="text-danger">*</span></label>
            <input type="date" class="form-control @error('tanggal_rapor') is-invalid @enderror" id="tanggal_rapor" name="tanggal_rapor" value="{{ old('tanggal_rapor', $tahunPelajaran->tanggal_rapor) }}">
            @error('tanggal_rapor')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="mb-2">
          <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
        </div>
      </form>
    </div>
  </div>
@endsection
