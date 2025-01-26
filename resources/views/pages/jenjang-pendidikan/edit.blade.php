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
    <li class="breadcrumb-item active">Edit Jenjang Pendidikan</li>
  </ul>
  <div class="card">
    <div class="card-header">
      <h3 class="mb-4"><i class="fa fa-graduation-cap"></i> Edit Jenjang Pendidikan</h3>
      <form action="{{ route('jenjang-pendidikan.update', $jenjangPendidikan->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="row">
          <div class="col-12">
            <h5 class="mb-3"><i class="fa fa-info-circle"></i> Informasi Jenjang</h5>
            <hr>
          </div>

          <div class="col-md-6 mb-3">
            <label for="jenjang_pendidikan" class="form-label"><i class="fa fa-graduation-cap"></i> Jenjang Pendidikan<span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('jenjang_pendidikan') is-invalid @enderror" id="jenjang_pendidikan" name="jenjang_pendidikan" value="{{ old('jenjang_pendidikan') ?? $jenjangPendidikan->jenjang_pendidikan }}">
            @error('jenjang_pendidikan')
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
