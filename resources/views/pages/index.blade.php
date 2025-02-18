@extends('layout.default')

@section('title', 'Home')

@push('css')
  <!-- extra css here -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    /* Styling untuk card */
    .card {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      min-width: 150px; /* Set a minimum width for the cards */
    }

    .card-body {
      padding: 10px;
    }

    .card-title {
      font-size: 16px;
      margin-bottom: 10px;
    }

    .card-text {
      font-size: 18px;
      font-weight: bold;
    }
  </style>
@endpush

@push('js')
  <!-- extra js here -->
@endpush

@section('content')
<!-- Card Profil Sekolah -->
<div class="card">
  <div class="card-body">
    <div class="row align-items-center">
      <div class="col-md-3 text-center mb-3 mb-md-0">
        <img src="{{ $profile->photo_profile ? asset('storage/' . $profile->photo_profile) : 'https://picsum.photos/200' }}" class="img-thumbnail img-fluid" alt="Profile Photo">
      </div>
      <div class="col-md-9">
        <h3 class="text-primary">
          <i class="fas fa-school"></i> Sistem Informasi Akademik
        </h3>
        <h4 class="text-bold text-uppercase">{{ $profile->nama_sekolah }}</h4>
        <ul class="list-unstyled">
          <li><i class="fas fa-university"></i> NPSN : {{ $profile->npsn }}</li>
          <li><i class="fas fa-map-marker-alt"></i> Alamat : {{ $profile->alamat }}</li>
          <li><i class="fas fa-phone-alt"></i> Telp : {{ $profile->telp }}</li>
          <li><i class="fas fa-envelope"></i> Email : {{ $profile->email }}</li>
          <li><i class="fas fa-globe"></i> Website : {{ $profile->website }}</li>
        </ul>
        <a href="{{ route('profile.edit') }}" class="btn btn-primary">
          <i class="fas fa-edit"></i> Edit Profil
        </a>
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
        <h5 class="card-title"><i class="fas fa-users"></i> Siswa</h5>
        <p class="card-text">{{ $siswaCount }}</p>
      </div>
    </div>
  </div>

  <!-- Jumlah Guru -->
  <div class="col-md-2">
    <div class="card text-center">
      <div class="card-body">
        <h5 class="card-title"><i class="fas fa-chalkboard-teacher"></i> Guru</h5>
        <p class="card-text">{{ $guruCount }}</p>
      </div>
    </div>
  </div>

  <!-- Jumlah Kelas -->
  <div class="col-md-2">
    <div class="card text-center">
      <div class="card-body">
        <h5 class="card-title"><i class="fas fa-building"></i> Kelas</h5>
        <p class="card-text">{{ $kelasCount }}</p>
      </div>
    </div>
  </div>

  <!-- Jumlah Rombel -->
  <div class="col-md-2">
    <div class="card text-center">
      <div class="card-body">
        <h5 class="card-title"><i class="fas fa-users-cog"></i> Rombel</h5>
        <p class="card-text">{{ $rombelCount }}</p>
      </div>
    </div>
  </div>

  <!-- Jumlah Mata Pelajaran -->
  <div class="col-md-2">
    <div class="card text-center">
      <div class="card-body">
        <h5 class="card-title"><i class="fas fa-book"></i> Mata Pelajaran</h5>
        <p class="card-text">{{ $mataPelajaranCount }}</p>
      </div>
    </div>
  </div>
</div>
@endsection
