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
    <li class="breadcrumb-item active">Tambah Guru</li>
  </ul>
	<div class="card">
    <div class="card-header">
      <h3>Tambah Guru</h3>
      <form action="{{ route('guru.store') }}" method="POST">
        @csrf
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="nama_lengkap" class="form-label">Nama Lengkap<span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('nama_lengkap')
              is-invalid
            @enderror" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}">
            @error('nama_lengkap')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <div class="col-md-6 mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin<span class="text-danger">*</span></label>
            <select name="jenis_kelamin" class="form-select @error('jenis_kelamin')
              is-invalid
            @enderror">
              <option value="laki-laki" {{ old('jenis_kelamin') === "laki-laki" ? "selected" : "" }}>Laki-Laki</option>
              <option value="perempuan" {{ old('perempuan') === "laki-laki" ? "selected" : "" }}>Perempuan</option>
            </select>
            @error('jenis_kelamin')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="nip" class="form-label">NIP<span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('nip')
              is-invalid
            @enderror" id="nip" name="nip" value="{{ old('nip') }}">
            @error('nip')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <div class="col-md-6 mb-3">
            <label for="nik" class="form-label">NIK<span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('nik')
              is-invalid
            @enderror" id="nik" name="nik" value="{{ old('nik') }}">
            @error('nik')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <div class="col-md-6 mb-3">
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control @error('tempat_lahir')
              is-invalid
            @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
            @error('tempat_lahir')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="tanggal_lahir" class="form-label">Tempat Lahir</label>
            <input type="date" class="form-control @error('tanggal_lahir')
              is-invalid
            @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
            @error('tanggal_lahir')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control @error('alamat')
              is-invalid
            @enderror" id="alamat" name="alamat" value="{{ old('alamat') }}">
            @error('alamat')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="gelar_depan" class="form-label">Gelar Depan</label>
            <input type="text" class="form-control @error('gelar_depan')
              is-invalid
            @enderror" id="gelar_depan" name="gelar_depan" value="{{ old('gelar_depan') }}">
            @error('gelar_depan')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="gelar_belakang" class="form-label">Gelar Belakang</label>
            <input type="text" class="form-control @error('gelar_belakang')
              is-invalid
            @enderror" id="gelar_belakang" name="gelar_belakang" value="{{ old('gelar_belakang') }}">
            @error('gelar_belakang')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir</label>
            <input type="text" class="form-control @error('pendidikan_terakhir')
              is-invalid
            @enderror" id="pendidikan_terakhir" name="pendidikan_terakhir" value="{{ old('pendidikan_terakhir') }}">
            @error('pendidikan_terakhir')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control @error('email')
              is-invalid
            @enderror" id="email" name="email" value="{{ old('email') }}">
            @error('email')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="telp" class="form-label">Telp</label>
            <input type="text" class="form-control @error('telp')
              is-invalid
            @enderror" id="telp" name="telp" value="{{ old('telp') }}">
            @error('telp')
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
	</div>
@endsection
