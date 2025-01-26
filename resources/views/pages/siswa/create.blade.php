@extends('layout.default', [])

@section('title', 'Siswa')

@push('css')
  <!-- extra css here -->
@endpush

@push('js')
	<!-- extra js here -->
@endpush

@section('content')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('siswa.index') }}">Siswa</a></li>
    <li class="breadcrumb-item active">Tambah Siswa</li>
  </ul>
	<div class="card">
    <div class="card-header">
      <h3>Tambah Siswa</h3>
      <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="nama_lengkap" class="form-label">Nama Lengkap<span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}">
            @error('nama_lengkap')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="nama_panggilan" class="form-label">Nama Panggilan</label>
            <input type="text" class="form-control @error('nama_panggilan') is-invalid @enderror" id="nama_panggilan" name="nama_panggilan" value="{{ old('nama_panggilan') }}">
            @error('nama_panggilan')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>          

          <div class="col-md-6 mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin<span class="text-danger">*</span></label>
            <select name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror">
              <option value="laki-laki" {{ old('jenis_kelamin') === "laki-laki" ? "selected" : "" }}>Laki-Laki</option>
              <option value="perempuan" {{ old('jenis_kelamin') === "perempuan" ? "selected" : "" }}>Perempuan</option>
            </select>
            @error('jenis_kelamin')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="nis" class="form-label">NIS<span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('nis') is-invalid @enderror" id="nis" name="nis" value="{{ old('nis') }}">
            @error('nis')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="nisn" class="form-label">NISN<span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('nisn') is-invalid @enderror" id="nisn" name="nisn" value="{{ old('nisn') }}">
            @error('nisn')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="nik" class="form-label">NIK<span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik') }}">
            @error('nik')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="nikk" class="form-label">NIK Keluarga</label>
            <input type="text" class="form-control @error('nikk') is-invalid @enderror" id="nikk" name="nikk" value="{{ old('nikk') }}">
            @error('nikk')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
            @error('tempat_lahir')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
            @error('tanggal_lahir')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="agama" class="form-label">Agama</label>
            <select name="agama" id="agama" class="form-select @error('agama') is-invalid @enderror">
              <option value="" disabled {{ old('agama') ? '' : 'selected' }}>Pilih Agama</option>
              <option value="Islam" {{ old('agama') === "Islam" ? "selected" : "" }}>Islam</option>
              <option value="Kristen Protestan" {{ old('agama') === "Kristen Protestan" ? "selected" : "" }}>Kristen Protestan</option>
              <option value="Kristen Katolik" {{ old('agama') === "Kristen Katolik" ? "selected" : "" }}>Kristen Katolik</option>
              <option value="Hindu" {{ old('agama') === "Hindu" ? "selected" : "" }}>Hindu</option>
              <option value="Buddha" {{ old('agama') === "Buddha" ? "selected" : "" }}>Buddha</option>
              <option value="Khonghucu" {{ old('agama') === "Khonghucu" ? "selected" : "" }}>Khonghucu</option>
            </select>
            @error('agama')
            @enderror
          </div>
          
          

          <div class="col-md-6 mb-3">
            <label for="aktif" class="form-label">Status Aktif</label>
            <select name="aktif" class="form-select @error('aktif') is-invalid @enderror">
              <option value="1" {{ old('aktif') === "1" ? "selected" : "" }}>Aktif</option>
              <option value="0" {{ old('aktif') === "0" ? "selected" : "" }}>Tidak Aktif</option>
            </select>
            @error('aktif')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat') }}">
            @error('alamat')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="kelurahan" class="form-label">Kelurahan</label>
            <input type="text" class="form-control @error('kelurahan') is-invalid @enderror" id="kelurahan" name="kelurahan" value="{{ old('kelurahan') }}">
            @error('kelurahan')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="kecamatan" class="form-label">Kecamatan</label>
            <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" id="kecamatan" name="kecamatan" value="{{ old('kecamatan') }}">
            @error('kecamatan')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="kota" class="form-label">Kota</label>
            <input type="text" class="form-control @error('kota') is-invalid @enderror" id="kota" name="kota" value="{{ old('kota') }}">
            @error('kota')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="provinsi" class="form-label">Provinsi</label>
            <input type="text" class="form-control @error('provinsi') is-invalid @enderror" id="provinsi" name="provinsi" value="{{ old('provinsi') }}">
            @error('provinsi')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="tahun_masuk" class="form-label">Tahun Masuk<span class="text-danger">*</span></label>
            <input type="number" class="form-control @error('tahun_masuk') is-invalid @enderror" id="tahun_masuk" name="tahun_masuk" value="{{ old('tahun_masuk') }}">
            @error('tahun_masuk')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" value="{{ old('foto') }}">
            @error('foto')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="nama_ayah" class="form-label">Nama Ayah</label>
            <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" id="nama_ayah" name="nama_ayah" value="{{ old('nama_ayah') }}">
            @error('nama_ayah')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah</label>
            <input type="text" class="form-control @error('pekerjaan_ayah') is-invalid @enderror" id="pekerjaan_ayah" name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}">
            @error('pekerjaan_ayah')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="penghasilan_ayah" class="form-label">Penghasilan Ayah</label>
            <input type="number" class="form-control @error('penghasilan_ayah') is-invalid @enderror" id="penghasilan_ayah" name="penghasilan_ayah" value="{{ old('penghasilan_ayah') }}">
            @error('penghasilan_ayah')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="nama_ibu" class="form-label">Nama Ibu</label>
            <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" id="nama_ibu" name="nama_ibu" value="{{ old('nama_ibu') }}">
            @error('nama_ibu')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu</label>
            <input type="text" class="form-control @error('pekerjaan_ibu') is-invalid @enderror" id="pekerjaan_ibu" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}">
            @error('pekerjaan_ibu')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="penghasilan_ibu" class="form-label">Penghasilan Ibu</label>
            <input type="number" class="form-control @error('penghasilan_ibu') is-invalid @enderror" id="penghasilan_ibu" name="penghasilan_ibu" value="{{ old('penghasilan_ibu') }}">
            @error('penghasilan_ibu')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="nama_wali" class="form-label">Nama Wali</label>
            <input type="text" class="form-control @error('nama_wali') is-invalid @enderror" id="nama_wali" name="nama_wali" value="{{ old('nama_wali') }}">
            @error('nama_wali')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="pekerjaan_wali" class="form-label">Pekerjaan Wali</label>
            <input type="text" class="form-control @error('pekerjaan_wali') is-invalid @enderror" id="pekerjaan_wali" name="pekerjaan_wali" value="{{ old('pekerjaan_wali') }}">
            @error('pekerjaan_wali')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="penghasilan_wali" class="form-label">Penghasilan Wali</label>
            <input type="number" class="form-control @error('penghasilan_wali') is-invalid @enderror" id="penghasilan_wali" name="penghasilan_wali" value="{{ old('penghasilan_wali') }}">
            @error('penghasilan_wali')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

        </div>

        <div class="mb-2">
          <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Submit</button>
        </div>
      </form>
    </div>
	</div>
@endsection
