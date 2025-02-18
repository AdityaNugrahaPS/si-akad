@extends('layout.default')

@section('title', 'Profil Sekolah')

@push('css')
  <!-- extra css here -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endpush

@push('js')
	<!-- extra js here -->
@endpush

@section('content')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><i class="fas fa-school me-1"></i> Profil Lembaga</li>
    <li class="breadcrumb-item active"><i class="fas fa-info-circle me-1"></i> Detail</li>
  </ul>
  
  <div class="card">
    <div class="card-body">
      <div class="row mb-3">
        <div class="col-md-6">
          <h1><i class="fas fa-school me-2"></i> Profil Lembaga</h1>
          {{-- Uncomment untuk menampilkan foto profil jika diinginkan --}}
          {{-- <img src="{{ $profile->photo_profile ? asset('storage/' . $profile->photo_profile) : 'https://picsum.photos/200' }}" alt="Foto Profil" class="img-fluid mw-30"> --}}
        </div>
        <div class="col-md-6 text-end">
          <a href="{{ route('profile.edit') }}" class="btn btn-primary">
            <i class="fas fa-edit me-1"></i> Edit Profil
          </a>
        </div>
      </div>

      @if (session()->has('editProfileSuccess'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <i class="fas fa-check-circle me-1"></i> {{ session('editProfileSuccess') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <h3 class="text-uppercase fw-bold mb-3">
        <i class="fas fa-university me-2"></i> {{ $profile->nama_sekolah }}
      </h3>
      
      <ul class="list-unstyled fs-5">
        <li class="mb-2">
          <i class="fas fa-building me-2"></i>
          <span class="fw-semibold">Bentuk Sekolah:</span> {{ $profile->bentuk_sekolah }}
        </li>
        <li class="mb-2">
          <i class="fas fa-id-badge me-2"></i>
          <span class="fw-semibold">NPSN:</span> {{ $profile->npsn }}
        </li>
        <li class="mb-2">
          <i class="fas fa-map-marker-alt me-2"></i>
          <span class="fw-semibold">Alamat:</span> {{ $profile->alamat }}
        </li>
        <li class="mb-2">
          <i class="fas fa-map me-2"></i>
          <span class="fw-semibold">Desa/Kelurahan:</span> {{ $profile->desa_kelurahan }}
        </li>
        <li class="mb-2">
          <i class="fas fa-city me-2"></i>
          <span class="fw-semibold">Kabupaten/Kota:</span> {{ $profile->kabupaten_kota }}
        </li>
        <li class="mb-2">
          <i class="fas fa-flag me-2"></i>
          <span class="fw-semibold">Provinsi:</span> {{ $profile->provinsi }}
        </li>
        <li class="mb-2">
          <i class="fas fa-mail-bulk me-2"></i>
          <span class="fw-semibold">Kode Pos:</span> {{ $profile->kode_pos }}
        </li>
        <li class="mb-2">
          <i class="fas fa-phone me-2"></i>
          <span class="fw-semibold">Telp:</span> {{ $profile->telp }}
        </li>
        <li class="mb-2">
          <i class="fas fa-envelope me-2"></i>
          <span class="fw-semibold">Email:</span> {{ $profile->email }}
        </li>
        <li class="mb-2">
          <i class="fas fa-globe me-2"></i>
          <span class="fw-semibold">Website:</span> {{ $profile->website }}
        </li>
      </ul>
    </div>
  </div>
@endsection
