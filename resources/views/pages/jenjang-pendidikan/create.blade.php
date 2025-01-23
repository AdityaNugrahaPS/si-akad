@extends('layout.default', [
])

@section('title', 'Jenjang Pendidikan')

@push('css')
  <!-- extra css here -->
@endpush

@push('js')
	<!-- extra js here -->
@endpush

@section('content')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('jenjang-pendidikan.index') }}">Jenjang Pendidikan</a></li>
    <li class="breadcrumb-item active">Tambah Jenjang Pendidikan</li>
  </ul>
	<div class="card">
    <div class="card-header">
      <h3>Tambah Jenjang Pendidikan</h3>
      <form action="{{ route('jenjang-pendidikan.store') }}" method="POST">
        @csrf
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="jenjang_pendidikan" class="form-label">Jenjang pendidikan<span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('jenjang_pendidikan')
              is-invalid
            @enderror" id="jenjang_pendidikan" name="jenjang_pendidikan">
            @error('jenjang_pendidikan')
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
