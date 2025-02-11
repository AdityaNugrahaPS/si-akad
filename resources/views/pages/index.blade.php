@extends('layout.default')

@section('title', 'Home')

@push('css')
  <!-- extra css here -->
@endpush

@push('js')
  <!-- extra js here -->
@endpush

@section('content')
<!-- Card Profil Sekolah -->
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-md-3">
        <img src="{{ $profile->photo_profile ? asset('storage/' . $profile->photo_profile) : 'https://picsum.photos/200' }}" class="img-thumbnail" alt="">
      </div>
      <div class="col-md-9">
        <h3 class="text-primary">Sistem Informasi Akademik</h3>
        <h4 class="text-bold text-uppercase">{{ $profile->nama_sekolah }}</h4>
        <ul class="list-unstyled">
          <li>NPSN : {{ $profile->npsn }}</li>
          <li>Alamat : {{ $profile->alamat }}</li>
          <li>Telp : {{ $profile->telp }}</li>
          <li>Email : {{ $profile->email }}</li>
          <li>Website : {{ $profile->website }}</li>
        </ul>
        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profil</a>
      </div>
    </div>
  </div>
</div>

<!-- Card Informasi Jumlah Data -->
<div class="row mt-4">
  <!-- Jumlah Siswa -->
  <div class="col-md-2">
    <div class="card text-center">
      <div class="card-body">
        <h5 class="card-title">Siswa</h5>
        <p class="card-text">{{ $siswaCount }}</p>
      </div>
    </div>
  </div>
  <!-- Jumlah Guru -->
  <div class="col-md-2">
    <div class="card text-center">
      <div class="card-body">
        <h5 class="card-title">Guru</h5>
        <p class="card-text">{{ $guruCount }}</p>
      </div>
    </div>
  </div>
  <!-- Jumlah Kelas -->
  <div class="col-md-2">
    <div class="card text-center">
      <div class="card-body">
        <h5 class="card-title">Kelas</h5>
        <p class="card-text">{{ $kelasCount }}</p>
      </div>
    </div>
  </div>
  <!-- Jumlah Rombel -->
  <div class="col-md-2">
    <div class="card text-center">
      <div class="card-body">
        <h5 class="card-title">Rombel</h5>
        <p class="card-text">{{ $rombelCount }}</p>
      </div>
    </div>
  </div>
  <!-- Jumlah Mata Pelajaran -->
  <div class="col-md-2">
    <div class="card text-center">
      <div class="card-body">
        <h5 class="card-title">Mata Pelajaran</h5>
        <p class="card-text">{{ $mataPelajaranCount }}</p>
      </div>
    </div>
  </div>
</div>
@endsection
