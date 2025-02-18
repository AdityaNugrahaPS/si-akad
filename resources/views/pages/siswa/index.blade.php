@extends('layout.default', [])

@section('title', 'Siswa')

@push('css')
    <!-- extra css here -->
    <link href="/assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="/assets/plugins/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet">
    <link href="/assets/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet">
    <link href="/assets/plugins/bootstrap-table/dist/bootstrap-table.min.css" rel="stylesheet">
@endpush

@push('js')
    <!-- extra js here -->
    <script src="/assets/plugins/@highlightjs/cdn-assets/highlight.min.js"></script>
    <script src="/assets/plugins/datatables.net/js/dataTables.min.js"></script>
    <script src="/assets/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="/assets/plugins/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/assets/plugins/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="/assets/plugins/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="/assets/plugins/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="/assets/plugins/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="/assets/plugins/bootstrap-table/dist/bootstrap-table.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var handleRenderTableData = function() {
            var table = $('#dataTable').DataTable({
                scrollX: true
            });
        };

        $(document).ready(function() {
            handleRenderTableData();

            // Event klik untuk foto agar dapat diperbesar
            $('.zoomable').on('click', function() {
                var src = $(this).data('photo');
                $('#modalImage').attr('src', src);
                $('#photoModal').modal('show');
            });
        });

        function showUploadAlertSiswa() {
            // Ambil konten HTML dari komponen UploadAlert siswa yang tersembunyi
            var htmlContent = document.getElementById('uploadAlertContent').innerHTML;

            Swal.fire({
                title: 'Upload Data Siswa',
                html: htmlContent,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: 'Simpan',
                cancelButtonText: 'Batal',
                preConfirm: () => {
                    // Proses validasi atau upload jika diperlukan
                }
            });
        }
    </script>
@endpush

@section('content')
    <ul class="breadcrumb">
        <li class="breadcrumb-item">Siswa</li>
        <li class="breadcrumb-item active"></li>
    </ul>

    <div class="mb-3 d-flex align-items-center gap-2">
        <a href="{{ route('siswa.create') }}" type="button" class="btn btn-success" style="margin-right: 2px;">
            <i class="fa fa-plus"></i> Tambah Siswa
        </a>
        <button type="button" class="btn btn-info" onclick="showUploadAlertSiswa()">
            <i class="fa fa-upload"></i> Upload Siswa
        </button>
    </div>


    <div class="card">
        <div class="row justify-content-center">
            <div class="col-xl-11 my-5">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                        <strong><i class="fa fa-check-circle"></i></strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                <table id="dataTable" class="table table-striped table-bordered text-nowrap w-100">
                    <thead>
                        <tr>
                            <th scope="col" class="text-start">Nama Lengkap</th>
                            <th scope="col" class="text-start">Nama Panggilan</th>
                            <th scope="col" class="text-start">Jenis Kelamin</th>
                            <th scope="col" class="text-start">Agama</th>
                            <th scope="col" class="text-start">Aktif</th>
                            <th scope="col" class="text-start">NIS</th>
                            <th scope="col" class="text-start">NIK</th>
                            <th scope="col" class="text-start">NIKK</th>
                            <th scope="col" class="text-start">Tanggal Lahir</th>
                            <th scope="col" class="text-start">Tempat Lahir</th>
                            <th scope="col" class="text-start">Alamat</th>
                            <th scope="col" class="text-start">Kelurahan</th>
                            <th scope="col" class="text-start">Kecamatan</th>
                            <th scope="col" class="text-start">Kota</th>
                            <th scope="col" class="text-start">Provinsi</th>
                            <th scope="col" class="text-start">Kode Pos</th>
                            <th scope="col" class="text-start">Nama Ayah</th>
                            <th scope="col" class="text-start">Pekerjaan Ayah</th>
                            <th scope="col" class="text-start">Penghasilan Ayah</th>
                            <th scope="col" class="text-start">Nama Ibu</th>
                            <th scope="col" class="text-start">Pekerjaan Ibu</th>
                            <th scope="col" class="text-start">Penghasilan Ibu</th>
                            <th scope="col" class="text-start">Nama Wali</th>
                            <th scope="col" class="text-start">Pekerjaan Wali</th>
                            <th scope="col" class="text-start">Penghasilan Wali</th>
                            <th scope="col" class="text-start">Foto</th>
                            <th scope="col" class="text-start">Tahun Masuk</th>
                            <th scope="col" class="text-start">Telp Siswa</th>
                            <th scope="col" class="text-start">Telp Ayah</th>
                            <th scope="col" class="text-start">Telp Ibu</th>
                            <th scope="col" class="text-start">Telp Wali</th>
                            <th scope="col" class="text-start">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswas as $siswa)
                            <tr>
                                <td class="text-start">{{ $siswa->nama_lengkap }}</td>
                                <td class="text-start">{{ $siswa->nama_panggilan }}</td>
                                <td class="text-start">{{ $siswa->jenis_kelamin }}</td>
                                <td class="text-start">{{ $siswa->agama }}</td>
                                <td class="text-start">{{ $siswa->aktif ? 'Aktif' : 'Tidak Aktif' }}</td>
                                <td class="text-start">{{ $siswa->nis }}</td>
                                <td class="text-start">{{ $siswa->nik }}</td>
                                <td class="text-start">{{ $siswa->nikk }}</td>
                                <td class="text-start">{{ $siswa->tanggal_lahir }}</td>
                                <td class="text-start">{{ $siswa->tempat_lahir }}</td>
                                <td class="text-start">{{ $siswa->alamat }}</td>
                                <td class="text-start">{{ $siswa->kelurahan }}</td>
                                <td class="text-start">{{ $siswa->kecamatan }}</td>
                                <td class="text-start">{{ $siswa->kota }}</td>
                                <td class="text-start">{{ $siswa->provinsi }}</td>
                                <td class="text-start">{{ $siswa->kode_pos }}</td>
                                <td class="text-start">{{ $siswa->nama_ayah }}</td>
                                <td class="text-start">{{ $siswa->pekerjaan_ayah }}</td>
                                <td class="text-start">{{ $siswa->penghasilan_ayah }}</td>
                                <td class="text-start">{{ $siswa->nama_ibu }}</td>
                                <td class="text-start">{{ $siswa->pekerjaan_ibu }}</td>
                                <td class="text-start">{{ $siswa->penghasilan_ibu }}</td>
                                <td class="text-start">{{ $siswa->nama_wali }}</td>
                                <td class="text-start">{{ $siswa->pekerjaan_wali }}</td>
                                <td class="text-start">{{ $siswa->penghasilan_wali }}</td>
                                <td class="text-start">
                                    @if ($siswa->foto)
                                        <!-- Tambahkan kelas "zoomable" dan atribut data-photo -->
                                        <img src="{{ asset('storage/' . $siswa->foto) }}" width="50" height="50"
                                            alt="Foto Siswa" class="zoomable"
                                            data-photo="{{ asset('storage/' . $siswa->foto) }}" style="cursor: pointer;">
                                    @else
                                        <span class="badge bg-secondary">No Photo</span>
                                    @endif
                                </td>
                                <td class="text-start">{{ $siswa->tahun_masuk }}</td>
                                <td class="text-start">{{ $siswa->telp_siswa }}</td>
                                <td class="text-start">{{ $siswa->telp_ayah }}</td>
                                <td class="text-start">{{ $siswa->telp_ibu }}</td>
                                <td class="text-start">{{ $siswa->telp_wali }}</td>
                                <td class="text-start">
                                    <a class="btn btn-primary" href="{{ route('siswa.edit', $siswa->id) }}">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <form class="d-inline" action="{{ route('siswa.delete', $siswa->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <!-- Modal untuk menampilkan foto dalam mode zoom -->
                <div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="photoModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-body p-0">
                                <img src="" id="modalImage" class="img-fluid" alt="Foto Siswa">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sisipkan komponen UploadAlert secara tersembunyi (tidak tampil di page) -->
    <div style="display: none;">
        <x-upload-alert-siswa title="Upload Data Siswa" template-link="{{ asset('template/template-siswa.xlsx') }}" />
    </div>

@endsection
