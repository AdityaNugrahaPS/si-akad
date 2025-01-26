@extends('layout.default', [
])

@section('title', 'Guru')

@push('css')
  <!-- extra css here -->
@endpush

@push('js')
	<!-- extra js here -->
@endpush

@section('content')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('guru.index') }}">Guru</a></li>
    <li class="breadcrumb-item active">Edit Guru</li>
  </ul>
	<div class="card">
    <div class="card-header">
      <h3 class="mb-4"><i class="fa fa-user-edit"></i> Edit Guru</h3>
      <form action="{{ route('guru.update', $guru->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="row">
          <div class="col-12">
            <h5 class="mb-3"><i class="fa fa-id-card"></i> Informasi Pribadi</h5>
            <hr>
          </div>
          
          <div class="col-md-6 mb-3">
            <label for="nama_lengkap" class="form-label"><i class="fa fa-user"></i> Nama Lengkap<span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') ?? $guru->nama_lengkap }}">
            @error('nama_lengkap')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <div class="col-md-6 mb-3">
            <label for="jenis_kelamin" class="form-label"><i class="fa fa-venus-mars"></i> Jenis Kelamin<span class="text-danger">*</span></label>
            <select name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror">
              <option value="laki-laki" {{ (old('jenis_kelamin') ?? $guru->jenis_kelamin) === "laki-laki" ? "selected" : "" }}>Laki-Laki</option>
              <option value="perempuan" {{ (old('jenis_kelamin') ?? $guru->jenis_kelamin) === "perempuan" ? "selected" : "" }}>Perempuan</option>
            </select>
            @error('jenis_kelamin')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="tempat_lahir" class="form-label"><i class="fa fa-map-marker"></i> Tempat Lahir</label>
            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') ?? $guru->tempat_lahir }}">
            @error('tempat_lahir')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="tanggal_lahir" class="form-label"><i class="fa fa-calendar"></i> Tanggal Lahir</label>
            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') ?? $guru->tanggal_lahir }}">
            @error('tanggal_lahir')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="col-12 mt-3">
            <h5 class="mb-3"><i class="fa fa-address-card"></i> Identitas Resmi</h5>
            <hr>
          </div>

          <div class="col-md-6 mb-3">
            <label for="nip" class="form-label"><i class="fa fa-id-badge"></i> NIP<span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" value="{{ old('nip') ?? $guru->nip }}">
            @error('nip')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <div class="col-md-6 mb-3">
            <label for="nik" class="form-label"><i class="fa fa-id-card"></i> NIK<span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik') ?? $guru->nik }}">
            @error('nik')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="col-12 mt-3">
            <h5 class="mb-3"><i class="fa fa-graduation-cap"></i> Informasi Akademik</h5>
            <hr>
          </div>

          <div class="col-md-6 mb-3">
            <label for="gelar_depan" class="form-label"><i class="fa fa-certificate"></i> Gelar Depan</label>
            <input type="text" class="form-control @error('gelar_depan') is-invalid @enderror" id="gelar_depan" name="gelar_depan" value="{{ old('gelar_depan') ?? $guru->gelar_depan }}">
            @error('gelar_depan')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="gelar_belakang" class="form-label"><i class="fa fa-certificate"></i> Gelar Belakang</label>
            <input type="text" class="form-control @error('gelar_belakang') is-invalid @enderror" id="gelar_belakang" name="gelar_belakang" value="{{ old('gelar_belakang') ?? $guru->gelar_belakang }}">
            @error('gelar_belakang')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="pendidikan_terakhir" class="form-label"><i class="fa fa-university"></i> Pendidikan Terakhir</label>
            <input type="text" class="form-control @error('pendidikan_terakhir') is-invalid @enderror" id="pendidikan_terakhir" name="pendidikan_terakhir" value="{{ old('pendidikan_terakhir') ?? $guru->pendidikan_terakhir }}">
            @error('pendidikan_terakhir')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="col-12 mt-3">
            <h5 class="mb-3"><i class="fa fa-envelope"></i> Kontak</h5>
            <hr>
          </div>

          <div class="col-md-6 mb-3">
            <label for="alamat" class="form-label"><i class="fa fa-home"></i> Alamat</label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat') ?? $guru->alamat }}">
            @error('alamat')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="email" class="form-label"><i class="fa fa-envelope-o"></i> Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') ?? $guru->email }}">
            @error('email')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="telp" class="form-label"><i class="fa fa-phone"></i> Telp</label>
            <input type="text" class="form-control @error('telp') is-invalid @enderror" id="telp" name="telp" value="{{ old('telp') ?? $guru->telp }}">
            @error('telp')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
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