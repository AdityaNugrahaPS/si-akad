@extends('layout.default', [
])

@section('title', 'Home')

@push('css')
  <!-- extra css here -->
@endpush

@push('js')
	<!-- extra js here -->
@endpush

@section('content')
<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-md-3">
				<img src="{{ $profile->photo_profile ? asset('storage/' . $profile->photo_profile) : 'https://picsum.photos/200' }}" class="img-thumbnail" alt="">
			</div>
			<div class="col-md-9">
				<h3 class="text-primary">
					Sistem Informasi Akademik
				</h3>
				<h4 class="text-bold text-uppercase">
					{{ $profile->nama_sekolah }}
				</h4>
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
@endsection
