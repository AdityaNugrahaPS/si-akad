@extends('layout.empty')

@section('title', 'Login')

@section('content')
  <!-- BEGIN login -->
	<div class="login">
		<!-- BEGIN login-content -->
		<div class="login-content">
			<form action="{{ route('auth.login.submit') }}" method="POST">
        @csrf
				<h1 class="text-center">Welcome back</h1>
        @if (session()->has('loginError'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ session('loginError') }}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
        @endif
				<div class="mb-3">
					<label class="form-label">Email Address</label>
					<input type="text" name="email" class="form-control form-control-lg fs-15px @error('email')
            is-invalid
          @enderror" placeholder="username@example.com" value="{{ old('email') }}">
          @error('email')
            <div class="invalid-feedback text-danger">
              {{ $message }}
            </div>
          @enderror
				</div>
				<div class="mb-4">
					<div class="d-flex">
						<label class="form-label">Password</label>
					</div>
					<input type="password" name="password" class="form-control form-control-lg fs-15px @error('password')
            is-invalid
          @enderror"  placeholder="Enter your password">
          @error('password')
            <div class="invalid-feedback text-danger">
              {{ $message }}
            </div>
          @enderror
				</div>
				<button type="submit" class="btn btn-theme btn-lg d-block w-100 fw-500 mb-3">Log In</button>
			</form>
		</div>
		<!-- END login-content -->
	</div>
	<!-- END login -->
@endsection
