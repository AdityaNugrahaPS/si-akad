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
            <h3 class="mb-4"><i class="fa fa-user-plus"></i> Tambah Siswa</h3>
            <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <h5 class="mb-3"><i class="fa fa-id-card"></i> Informasi Pribadi</h5>
                        <hr>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="nama_lengkap" class="form-label"><i class="fa fa-user"></i> Nama Lengkap<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror"
                            id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}">
                        @error('nama_lengkap')
                            <div class="invalid-feedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="nama_panggilan" class="form-label"><i class="fa fa-user-o"></i> Nama Panggilan</label>
                        <input type="text" class="form-control @error('nama_panggilan') is-invalid @enderror"
                            id="nama_panggilan" name="nama_panggilan" value="{{ old('nama_panggilan') }}">
                        @error('nama_panggilan')
                            <div class="invalid-feedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="jenis_kelamin" class="form-label"><i class="fa fa-venus-mars"></i> Jenis Kelamin<span
                                class="text-danger">*</span></label>
                        <select name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror">
                            <option value="laki-laki" {{ old('jenis_kelamin') === 'laki-laki' ? 'selected' : '' }}>Laki-Laki
                            </option>
                            <option value="perempuan" {{ old('jenis_kelamin') === 'perempuan' ? 'selected' : '' }}>Perempuan
                            </option>
                        </select>
                        @error('jenis_kelamin')
                            <div class="invalid-feedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="agama" class="form-label"><i class="fa fa-pray"></i> Agama</label>
                        <select name="agama" id="agama" class="form-select @error('agama') is-invalid @enderror">
                            <option value="" disabled {{ old('agama') ? '' : 'selected' }}>Pilih Agama</option>
                            <option value="Islam" {{ old('agama') === 'Islam' ? 'selected' : '' }}>Islam</option>
                            <option value="Kristen Protestan" {{ old('agama') === 'Kristen Protestan' ? 'selected' : '' }}>
                                Kristen Protestan</option>
                            <option value="Kristen Katolik" {{ old('agama') === 'Kristen Katolik' ? 'selected' : '' }}>
                                Kristen Katolik</option>
                            <option value="Hindu" {{ old('agama') === 'Hindu' ? 'selected' : '' }}>Hindu</option>
                            <option value="Buddha" {{ old('agama') === 'Buddha' ? 'selected' : '' }}>Buddha</option>
                            <option value="Khonghucu" {{ old('agama') === 'Khonghucu' ? 'selected' : '' }}>Khonghucu
                            </option>
                        </select>
                        @error('agama')
                            <div class="invalid-feedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="tempat_lahir" class="form-label"><i class="fa fa-map-marker"></i> Tempat Lahir</label>
                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                            id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                        @error('tempat_lahir')
                            <div class="invalid-feedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="tanggal_lahir" class="form-label"><i class="fa fa-calendar"></i> Tanggal Lahir</label>
                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                            id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                        @error('tanggal_lahir')
                            <div class="invalid-feedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                      <label for="telp_siswa" class="form-label"><i class="fa fa-phone"></i> Nomor Telepon
                          Siswa</label>
                      <input type="text" class="form-control @error('telp_siswa') is-invalid @enderror"
                          id="telp_siswa" name="telp_siswa" value="{{ old('telp_siswa') }}">
                      @error('telp_siswa')
                          <div class="invalid-feedback text-danger">{{ $message }}</div>
                      @enderror
                  </div>




                    <div class="col-12 mt-3">
                        <h5 class="mb-3"><i class="fa fa-address-card"></i> Identitas Resmi</h5>
                        <hr>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="nis" class="form-label"><i class="fa fa-id-badge"></i> NIS<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nis') is-invalid @enderror" id="nis"
                            name="nis" value="{{ old('nis') }}">
                        @error('nis')
                            <div class="invalid-feedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="nisn" class="form-label"><i class="fa fa-id-card"></i> NISN<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nisn') is-invalid @enderror" id="nisn"
                            name="nisn" value="{{ old('nisn') }}">
                        @error('nisn')
                            <div class="invalid-feedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="nik" class="form-label"><i class="fa fa-id-card-o"></i> NIK<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik"
                            name="nik" value="{{ old('nik') }}">
                        @error('nik')
                            <div class="invalid-feedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="nikk" class="form-label"><i class="fa fa-users"></i> NIK Keluarga</label>
                        <input type="text" class="form-control @error('nikk') is-invalid @enderror" id="nikk"
                            name="nikk" value="{{ old('nikk') }}">
                        @error('nikk')
                            <div class="invalid-feedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                   

                    <div class="col-12 mt-3">
                        <h5 class="mb-3"><i class="fa fa-home"></i> Alamat</h5>
                        <hr>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="alamat" class="form-label"><i class="fa fa-road"></i> Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                            name="alamat" value="{{ old('alamat') }}">
                        @error('alamat')
                            <div class="invalid-feedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="kelurahan" class="form-label"><i class="fa fa-building-o"></i> Kelurahan</label>
                        <input type="text" class="form-control @error('kelurahan') is-invalid @enderror"
                            id="kelurahan" name="kelurahan" value="{{ old('kelurahan') }}">
                        @error('kelurahan')
                            <div class="invalid-feedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="kecamatan" class="form-label"><i class="fa fa-building"></i> Kecamatan</label>
                        <input type="text" class="form-control @error('kecamatan') is-invalid @enderror"
                            id="kecamatan" name="kecamatan" value="{{ old('kecamatan') }}">
                        @error('kecamatan')
                            <div class="invalid-feedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="kota" class="form-label"><i class="fa fa-city"></i> Kota</label>
                        <input type="text" class="form-control @error('kota') is-invalid @enderror" id="kota"
                            name="kota" value="{{ old('kota') }}">
                        @error('kota')
                            <div class="invalid-feedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="provinsi" class="form-label"><i class="fa fa-map"></i> Provinsi</label>
                        <input type="text" class="form-control @error('provinsi') is-invalid @enderror"
                            id="provinsi" name="provinsi" value="{{ old('provinsi') }}">
                        @error('provinsi')
                            <div class="invalid-feedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mt-3">
                        <h5 class="mb-3"><i class="fa fa-school"></i> Informasi Akademik</h5>
                        <hr>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="tahun_masuk" class="form-label"><i class="fa fa-calendar-check"></i> Tahun Masuk<span
                                class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('tahun_masuk') is-invalid @enderror"
                            id="tahun_masuk" name="tahun_masuk" value="{{ old('tahun_masuk') }}">
                        @error('tahun_masuk')
                            <div class="invalid-feedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="aktif" class="form-label"><i class="fa fa-toggle-on"></i> Status Aktif</label>
                        <select name="aktif" class="form-select @error('aktif') is-invalid @enderror">
                            <option value="1" {{ old('aktif') === '1' ? 'selected' : '' }}>Aktif</option>
                            <option value="0" {{ old('aktif') === '0' ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                        @error('aktif')
                            <div class="invalid-feedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="foto" class="form-label"><i class="fa fa-camera"></i> Foto</label>
                        <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto"
                            name="foto" value="{{ old('foto') }}">
                        @error('foto')
                            <div class="invalid-feedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mt-3">
                        <h5 class="mb-3"><i class="fa fa-users"></i> Informasi Orang Tua/Wali</h5>
                        <hr>
                    </div>

                    <div class="row">
                        <!-- Informasi Ayah -->
                        <div class="col-md-6">
                            <div class="card p-3 mb-3">
                                <h6 class="mb-3"><i class="fa fa-male"></i> Informasi Ayah</h6>
                                <div class="mb-3">
                                    <label for="nama_ayah" class="form-label">Nama Ayah</label>
                                    <input type="text" class="form-control" id="nama_ayah" name="nama_ayah"
                                        value="{{ old('nama_ayah') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="telp_ayah" class="form-label">Nomor Telepon Ayah</label>
                                    <input type="text" class="form-control" id="telp_ayah" name="telp_ayah"
                                        value="{{ old('telp_ayah') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah</label>
                                    <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah"
                                        value="{{ old('pekerjaan_ayah') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="penghasilan_ayah" class="form-label">Penghasilan Ayah</label>
                                    <input type="number" class="form-control" id="penghasilan_ayah"
                                        name="penghasilan_ayah" value="{{ old('penghasilan_ayah') }}">
                                </div>
                            </div>
                        </div>

                        <!-- Informasi Ibu -->
                        <div class="col-md-6">
                            <div class="card p-3 mb-3">
                                <h6 class="mb-3"><i class="fa fa-female"></i> Informasi Ibu</h6>
                                <div class="mb-3">
                                    <label for="nama_ibu" class="form-label">Nama Ibu</label>
                                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu"
                                        value="{{ old('nama_ibu') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="telp_ibu" class="form-label">Nomor Telepon Ibu</label>
                                    <input type="text" class="form-control" id="telp_ibu" name="telp_ibu"
                                        value="{{ old('telp_ibu') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu</label>
                                    <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu"
                                        value="{{ old('pekerjaan_ibu') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="penghasilan_ibu" class="form-label">Penghasilan Ibu</label>
                                    <input type="number" class="form-control" id="penghasilan_ibu"
                                        name="penghasilan_ibu" value="{{ old('penghasilan_ibu') }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Wali -->
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <div class="card p-3 mb-3">
                                <h6 class="mb-3"><i class="fa fa-user-friends"></i> Informasi Wali</h6>
                                <div class="mb-3">
                                    <label for="nama_wali" class="form-label">Nama Wali</label>
                                    <input type="text" class="form-control" id="nama_wali" name="nama_wali"
                                        value="{{ old('nama_wali') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="telp_wali" class="form-label">Nomor Telepon Wali</label>
                                    <input type="text" class="form-control" id="telp_wali" name="telp_wali"
                                        value="{{ old('telp_wali') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="pekerjaan_wali" class="form-label">Pekerjaan Wali</label>
                                    <input type="text" class="form-control" id="pekerjaan_wali" name="pekerjaan_wali"
                                        value="{{ old('pekerjaan_wali') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="penghasilan_wali" class="form-label">Penghasilan Wali</label>
                                    <input type="number" class="form-control" id="penghasilan_wali"
                                        name="penghasilan_wali" value="{{ old('penghasilan_wali') }}">
                                </div>
                            </div>
                        </div>
                    </div>



                </div>

                <div class="mb-2">
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
