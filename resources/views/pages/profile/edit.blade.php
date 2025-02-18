@extends('layout.default')

@section('title', 'Edit Profil Sekolah')

@push('css')
  <!-- extra css here -->
@endpush

@push('js')
  <!-- extra js here -->
@endpush

@section('content')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('profile.index') }}">Profil Lembaga</a></li>
    <li class="breadcrumb-item active">Edit Profil Sekolah</li>
  </ul>

  <div class="card">
    <div class="card-header">
      <h3 class="mb-4"><i class="fa fa-school"></i> Edit Profil Sekolah</h3>
      <form action="{{ route('profile.update') }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-12">
            <h5 class="mb-3"><i class="fa fa-info-circle"></i> Informasi Profil Sekolah</h5>
            <hr>
          </div>
          
          <!-- Nama Sekolah -->
          <div class="col-md-6 mb-3">
            <label for="nama_sekolah" class="form-label">
              <i class="fa fa-school"></i> Nama Sekolah<span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control @error('nama_sekolah') is-invalid @enderror" id="nama_sekolah" name="nama_sekolah" value="{{ $profile->nama_sekolah }}">
            @error('nama_sekolah')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>
      
          <!-- Bentuk Sekolah -->
          <div class="col-md-6 mb-3">
            <label for="bentuk_sekolah" class="form-label">
              <i class="fa fa-building"></i> Bentuk Sekolah
            </label>
            <input type="text" class="form-control" id="bentuk_sekolah" name="bentuk_sekolah" value="{{ $profile->bentuk_sekolah }}">
          </div>
      
          <!-- NPSN -->
          <div class="col-md-6 mb-3">
            <label for="npsn" class="form-label">
              <i class="fa fa-id-badge"></i> NPSN<span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control @error('npsn') is-invalid @enderror" id="npsn" name="npsn" value="{{ $profile->npsn }}">
            @error('npsn')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>
      
          <!-- Alamat -->
          <div class="col-md-6 mb-3">
            <label for="alamat" class="form-label">
              <i class="fa fa-map-marker-alt"></i> Alamat<span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ $profile->alamat }}">
            @error('alamat')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>
      
          <!-- Desa/Kelurahan -->
          <div class="col-md-6 mb-3">
            <label for="desa_kelurahan" class="form-label">
              <i class="fa fa-map-signs"></i> Desa/Kelurahan
            </label>
            <input type="text" class="form-control" id="desa_kelurahan" name="desa_kelurahan" value="{{ $profile->desa_kelurahan }}">
          </div>
      
          <!-- Kabupaten/Kota -->
          <div class="col-md-6 mb-3">
            <label for="kabupaten_kota" class="form-label">
              <i class="fa fa-city"></i> Kabupaten/Kota
            </label>
            <input type="text" class="form-control" id="kabupaten_kota" name="kabupaten_kota" value="{{ $profile->kabupaten_kota }}">
          </div>
      
          <!-- Provinsi -->
          <div class="col-md-6 mb-3">
            <label for="provinsi" class="form-label">
              <i class="fa fa-map"></i> Provinsi
            </label>
            <input type="text" class="form-control" id="provinsi" name="provinsi" value="{{ $profile->provinsi }}">
          </div>
      
          <!-- Kode Pos -->
          <div class="col-md-6 mb-3">
            <label for="kode_pos" class="form-label">
              <i class="fa fa-envelope"></i> Kode Pos
            </label>
            <input type="text" class="form-control" id="kode_pos" name="kode_pos" value="{{ $profile->kode_pos }}">
          </div>
      
          <!-- Telp -->
          <div class="col-md-6 mb-3">
            <label for="telp" class="form-label">
              <i class="fa fa-phone"></i> Telp
            </label>
            <input type="text" class="form-control" id="telp" name="telp" value="{{ $profile->telp }}">
          </div>
      
          <!-- Email -->
          <div class="col-md-6 mb-3">
            <label for="email" class="form-label">
              <i class="fa fa-envelope"></i> Email
            </label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $profile->email }}">
          </div>
      
          <!-- Website -->
          <div class="col-md-6 mb-3">
            <label for="website" class="form-label">
              <i class="fa fa-globe"></i> Website
            </label>
            <input type="text" class="form-control" id="website" name="website" value="{{ $profile->website }}">
          </div>

          <!-- Photo Profile -->
          <div class="col-md-12 mb-3">
            <label for="image" class="form-label">
              <i class="fa fa-image"></i> Photo Profile
            </label>
            <input class="form-control" type="file" name="image" id="image" accept="image/*">
          </div>
        </div>
      
        <div class="mb-2">
          <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
        </div>
      </form>
    </div>
  </div>
@endsection
