@extends('layout.default', [
])

@section('title', 'Profil Sekolah')

@push('css')
  <!-- extra css here -->
@endpush

@push('js')
	<!-- extra js here -->
@endpush

@section('content')
  <ul class="breadcrumb">
    <li class="breadcrumb-item">Profil Lembaga</li>
    <li class="breadcrumb-item active"></li>
  </ul>
	<div class="card">
    <div class="card-body">
      <div class="row mb-3">
        <div class="col-md-6">
          <h1>Profil Lembaga</h1>
          {{-- <img src="{{ $profile->photo_profile ? asset('storage/' . $profile->photo_profile) : 'https://picsum.photos/200' }}" alt="" class="img-fluid mw-30"> --}}
        </div>
        <div class="col-md-6 text-end">
          <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profil</a>
        </div>
      </div>
      @if (session()->has('editProfileSuccess'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('editProfileSuccess') }}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
      @endif
      <h3 class="text-uppercase text-bold">{{ $profile->nama_sekolah }}</h3>
      <ul class="list-unstyled fs-5 mb-2">
        <li class="mb-2"><span class="fw-semibold">Bentuk Sekolah : </span>{{ $profile->bentuk_sekolah }}</li>
        <li class="mb-2"><span class="fw-semibold">NPSN : </span>{{ $profile->npsn }}</li>
        <li class="mb-2"><span class="fw-semibold">Alamat : </span>{{ $profile->alamat }}</li>
        <li class="mb-2"><span class="fw-semibold">Desa/Kelurahan : </span>{{ $profile->desa_kelurahan }}</li>
        <li class="mb-2"><span class="fw-semibold">Kabupaten/Kota : </span>{{ $profile->kabupaten_kota }}</li>
        <li class="mb-2"><span class="fw-semibold">Provinsi : </span>{{ $profile->provinsi }}</li>
        <li class="mb-2"><span class="fw-semibold">Kode Pos : </span>{{ $profile->kode_pos }}</li>
        <li class="mb-2"><span class="fw-semibold">Telp : </span>{{ $profile->telp }}</li>
        <li class="mb-2"><span class="fw-semibold">Email : </span>{{ $profile->email }}</li>
        <li class="mb-2"><span class="fw-semibold">Website : </span>{{ $profile->website }}</li>
      </ul>
		</div>
	</div>
@endsection
