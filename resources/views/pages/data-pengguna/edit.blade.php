@extends('layout.default', [])

@section('title', 'Edit Data Pengguna')

@push('css')
  <!-- Extra CSS here -->
@endpush

@push('js')
  <!-- Extra JS here -->
@endpush

@section('content')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('data-pengguna.index') }}">Data Pengguna</a></li>
    <li class="breadcrumb-item active">Edit Data Pengguna</li>
  </ul>
  
  <div class="card">
    <div class="card-header">
      <h3 class="mb-4"><i class="fa fa-user-edit"></i> Edit Data Pengguna</h3>
      <form action="{{ route('data-pengguna.update', $dataPengguna->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="row">
          <!-- Informasi Pribadi -->
          <div class="col-12">
            <h5 class="mb-3"><i class="fa fa-id-card"></i> Informasi Pribadi</h5>
            <hr>
          </div>
          
          <div class="col-md-6 mb-3">
            <label for="nama_depan" class="form-label">
              <i class="fa fa-user"></i> Nama Depan<span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control @error('nama_depan') is-invalid @enderror" 
                   id="nama_depan" name="nama_depan" 
                   value="{{ old('nama_depan', $dataPengguna->nama_depan) }}">
            @error('nama_depan')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <div class="col-md-6 mb-3">
            <label for="nama_belakang" class="form-label">
              <i class="fa fa-user"></i> Nama Belakang<span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control @error('nama_belakang') is-invalid @enderror" 
                   id="nama_belakang" name="nama_belakang" 
                   value="{{ old('nama_belakang', $dataPengguna->nama_belakang) }}">
            @error('nama_belakang')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <!-- Informasi Lembaga -->
          <div class="col-md-6 mb-3">
            <label for="lembaga" class="form-label">
              <i class="fa fa-building"></i> Lembaga<span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control @error('lembaga') is-invalid @enderror" 
                   id="lembaga" name="lembaga" 
                   value="{{ old('lembaga', $dataPengguna->lembaga) }}">
            @error('lembaga')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <!-- Pilihan Grup -->
          <div class="col-md-6 mb-3">
            <label for="grup_id" class="form-label">
              <i class="fa fa-users"></i> Grup<span class="text-danger">*</span>
            </label>
            <select class="form-control @error('grup_id') is-invalid @enderror" id="grup_id" name="grup_id">
              <option value="">Pilih Grup</option>
              @foreach($grups as $grup)
                <option value="{{ $grup->id }}" {{ old('grup_id', $dataPengguna->grup_id) == $grup->id ? 'selected' : '' }}>
                  {{ $grup->nama_grup }}
                </option>
              @endforeach
            </select>
            @error('grup_id')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <!-- Informasi Kontak -->
          <div class="col-md-6 mb-3">
            <label for="email" class="form-label">
              <i class="fa fa-envelope"></i> Email<span class="text-danger">*</span>
            </label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                   id="email" name="email" 
                   value="{{ old('email', $dataPengguna->email) }}">
            @error('email')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <div class="col-md-6 mb-3">
            <label for="nomor_telfon" class="form-label">
              <i class="fa fa-phone"></i> Nomor Telfon<span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control @error('nomor_telfon') is-invalid @enderror" 
                   id="nomor_telfon" name="nomor_telfon" 
                   value="{{ old('nomor_telfon', $dataPengguna->nomor_telfon) }}">
            @error('nomor_telfon')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <!-- Informasi Keamanan -->
          <div class="col-12 mt-3">
            <h5 class="mb-3"><i class="fa fa-lock"></i> Keamanan</h5>
            <hr>
          </div>
          
          <div class="col-md-6 mb-3">
            <label for="password" class="form-label">
              <i class="fa fa-unlock-alt"></i> Password (kosongkan jika tidak ingin mengubah)
            </label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                   id="password" name="password">
            @error('password')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <div class="col-md-6 mb-3">
            <label for="konfirmasi_password" class="form-label">
              <i class="fa fa-unlock-alt"></i> Konfirmasi Password
            </label>
            <input type="password" class="form-control @error('konfirmasi_password') is-invalid @enderror" 
                   id="konfirmasi_password" name="konfirmasi_password">
            @error('konfirmasi_password')
              <div class="invalid-feedback text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>
          
        </div>
        <div class="mb-2">
          <button type="submit" class="btn btn-success">
            <i class="fa fa-save"></i> Update
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection
