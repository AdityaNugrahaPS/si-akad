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
      <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="nama_lengkap" class="form-label">Nama Lengkap<span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') ?? $siswa->nama_lengkap }}">
            @error('nama_lengkap')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="nama_panggilan" class="form-label">Nama Panggilan</label>
            <input type="text" class="form-control @error('nama_panggilan') is-invalid @enderror" id="nama_panggilan" name="nama_panggilan" value="{{ old('nama_panggilan') ?? $siswa->nama_panggilan }}">
            @error('nama_panggilan')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin<span class="text-danger">*</span></label>
            <select name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror">
              <option value="laki-laki" {{ (old('jenis_kelamin') ?? $siswa->jenis_kelamin) === "laki-laki" ? "selected" : "" }}>Laki-Laki</option>
              <option value="perempuan" {{ (old('jenis_kelamin') ?? $siswa->jenis_kelamin) === "perempuan" ? "selected" : "" }}>Perempuan</option>
            </select>
            @error('jenis_kelamin')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="agama" class="form-label">Agama</label>
            <select name="agama" class="form-select @error('agama') is-invalid @enderror">
              <option value="islam" {{ (old('agama') ?? $siswa->agama) === "islam" ? "selected" : "" }}>Islam</option>
              <option value="kristen" {{ (old('agama') ?? $siswa->agama) === "kristen" ? "selected" : "" }}>Kristen</option>
              <option value="katolik" {{ (old('agama') ?? $siswa->agama) === "katolik" ? "selected" : "" }}>Katolik</option>
              <option value="hindu" {{ (old('agama') ?? $siswa->agama) === "hindu" ? "selected" : "" }}>Hindu</option>
              <option value="buddha" {{ (old('agama') ?? $siswa->agama) === "buddha" ? "selected" : "" }}>Buddha</option>
              <option value="konghucu" {{ (old('agama') ?? $siswa->agama) === "konghucu" ? "selected" : "" }}>Konghucu</option>
            </select>
            @error('agama')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>
          

          <div class="col-md-6 mb-3">
            <label for="aktif" class="form-label">Aktif</label>
            <select name="aktif" class="form-select @error('aktif') is-invalid @enderror">
              <option value="1" {{ (old('aktif') ?? $siswa->aktif) === "1" ? "selected" : "" }}>Aktif</option>
              <option value="0" {{ (old('aktif') ?? $siswa->aktif) === "0" ? "selected" : "" }}>Tidak Aktif</option>
            </select>
            @error('aktif')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="nis" class="form-label">NIS<span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('nis') is-invalid @enderror" id="nis" name="nis" value="{{ old('nis') ?? $siswa->nis }}">
            @error('nis')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="nik" class="form-label">NIK<span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik') ?? $siswa->nik }}">
            @error('nik')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="nikk" class="form-label">NIK Keluarga</label>
            <input type="text" class="form-control @error('nikk') is-invalid @enderror" id="nikk" name="nikk" value="{{ old('nikk') ?? $siswa->nikk }}">
            @error('nikk')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') ?? $siswa->tempat_lahir }}">
            @error('tempat_lahir')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') ?? $siswa->tanggal_lahir }}">
            @error('tanggal_lahir')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat') ?? $siswa->alamat }}">
            @error('alamat')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="kelurahan" class="form-label">Kelurahan</label>
            <input type="text" class="form-control @error('kelurahan') is-invalid @enderror" id="kelurahan" name="kelurahan" value="{{ old('kelurahan') ?? $siswa->kelurahan }}">
            @error('kelurahan')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="kecamatan" class="form-label">Kecamatan</label>
            <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" id="kecamatan" name="kecamatan" value="{{ old('kecamatan') ?? $siswa->kecamatan }}">
            @error('kecamatan')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="kota" class="form-label">Kota</label>
            <input type="text" class="form-control @error('kota') is-invalid @enderror" id="kota" name="kota" value="{{ old('kota') ?? $siswa->kota }}">
            @error('kota')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="provinsi" class="form-label">Provinsi</label>
            <input type="text" class="form-control @error('provinsi') is-invalid @enderror" id="provinsi" name="provinsi" value="{{ old('provinsi') ?? $siswa->provinsi }}">
            @error('provinsi')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="kode_pos" class="form-label">Kode Pos</label>
            <input type="text" class="form-control @error('kode_pos') is-invalid @enderror" id="kode_pos" name="kode_pos" value="{{ old('kode_pos') ?? $siswa->kode_pos }}">
            @error('kode_pos')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="nama_ayah" class="form-label">Nama Ayah</label>
            <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" id="nama_ayah" name="nama_ayah" value="{{ old('nama_ayah') ?? $siswa->nama_ayah }}">
            @error('nama_ayah')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah</label>
            <input type="text" class="form-control @error('pekerjaan_ayah') is-invalid @enderror" id="pekerjaan_ayah" name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') ?? $siswa->pekerjaan_ayah }}">
            @error('pekerjaan_ayah')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="penghasilan_ayah" class="form-label">Penghasilan Ayah</label>
            <input type="text" class="form-control @error('penghasilan_ayah') is-invalid @enderror" id="penghasilan_ayah" name="penghasilan_ayah" value="{{ old('penghasilan_ayah') ?? $siswa->penghasilan_ayah }}">
            @error('penghasilan_ayah')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="nama_ibu" class="form-label">Nama Ibu</label>
            <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" id="nama_ibu" name="nama_ibu" value="{{ old('nama_ibu') ?? $siswa->nama_ibu }}">
            @error('nama_ibu')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu</label>
            <input type="text" class="form-control @error('pekerjaan_ibu') is-invalid @enderror" id="pekerjaan_ibu" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') ?? $siswa->pekerjaan_ibu }}">
            @error('pekerjaan_ibu')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="penghasilan_ibu" class="form-label">Penghasilan Ibu</label>
            <input type="text" class="form-control @error('penghasilan_ibu') is-invalid @enderror" id="penghasilan_ibu" name="penghasilan_ibu" value="{{ old('penghasilan_ibu') ?? $siswa->penghasilan_ibu }}">
            @error('penghasilan_ibu')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="telp_siswa" class="form-label">Telp Siswa</label>
            <input type="text" class="form-control @error('telp_siswa') is-invalid @enderror" id="telp_siswa" name="telp_siswa" value="{{ old('telp_siswa') ?? $siswa->telp_siswa }}">
            @error('telp_siswa')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="telp_ayah" class="form-label">Telp Ayah</label>
            <input type="text" class="form-control @error('telp_ayah') is-invalid @enderror" id="telp_ayah" name="telp_ayah" value="{{ old('telp_ayah') ?? $siswa->telp_ayah }}">
            @error('telp_ayah')
              <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="telp_ibu" class="form-label">Telp Ibu</label>
            <input type="text" class="form-control @error('telp_ibu') is-invalid @enderror" id="telp_ibu" name="telp_ibu" value="{{ old('telp_ibu') ?? $siswa->telp_ibu }}">
            @error('telp_ibu')
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
</div>
@endsection
