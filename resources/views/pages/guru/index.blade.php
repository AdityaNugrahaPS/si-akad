@extends('layout.default', [])

@section('title', 'Guru')

@push('css')
  <!-- Extra CSS -->
  <link href="/assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <link href="/assets/plugins/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet">
  <link href="/assets/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet">
  <link href="/assets/plugins/bootstrap-table/dist/bootstrap-table.min.css" rel="stylesheet">
@endpush

@push('js')
  <!-- Extra JS -->
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
  <!-- Sertakan SweetAlert2 dari CDN -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    var handleRenderTableData = function() {
      var table = $('#dataTable').DataTable({
        scrollX: true
      });
    };

    $(document).ready(function() {
      handleRenderTableData();
    });

    // Fungsi untuk menampilkan SweetAlert2 dengan konten upload
    function showUploadAlert() {
      // Ambil konten HTML dari komponen UploadAlert yang tersembunyi
      var htmlContent = document.getElementById('uploadAlertContent').innerHTML;
      
      Swal.fire({
        title: 'Upload Data Guru',
        html: htmlContent,
        showCancelButton: true,
        focusConfirm: false,
        confirmButtonText: 'Simpan',
        cancelButtonText: 'Batal',
        // Jika perlu, tambahkan preConfirm untuk validasi form
        preConfirm: () => {
          // Contoh: ambil file dari input (jika ingin proses upload via AJAX)
          // var file = document.getElementById('fileInput').files[0];
          // Lakukan validasi atau proses lainnya di sini...
        }
      });
    }
  </script>
@endpush

@section('content')
<ul class="breadcrumb">
  <li class="breadcrumb-item">Guru</li>
  <li class="breadcrumb-item active"></li>
</ul>

<div class="mb-3">
  <!-- Tombol tambah data guru -->
  <a href="{{ route('guru.create') }}" class="btn btn-success">
    <i class="fa fa-plus"></i> Add
  </a>
  
  <!-- Tombol untuk membuka alert upload guru -->
  <button type="button" class="btn btn-info" onclick="showUploadAlert()">
    <i class="fa fa-upload"></i> Upload Guru
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
            <th scope="col">Nama Lengkap</th>
            <th scope="col">NIP</th>
            <th scope="col">NIK</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Tempat Lahir</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Alamat</th>
            <th scope="col">Gelar Depan</th>
            <th scope="col">Gelar Belakang</th>
            <th scope="col">Pendidikan Terakhir</th>
            <th scope="col">Email</th>
            <th scope="col">Telp</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($gurus as $guru)
            <tr>
              <td>{{ $guru->nama_lengkap }}</td>
              <td>{{ $guru->nip }}</td>
              <td>{{ $guru->nik }}</td>
              <td>{{ $guru->jenis_kelamin }}</td>
              <td>{{ $guru->tempat_lahir }}</td>
              <td>{{ $guru->tanggal_lahir }}</td>
              <td>{{ $guru->alamat }}</td>
              <td>{{ $guru->gelar_depan }}</td>
              <td>{{ $guru->gelar_belakang }}</td>
              <td>{{ $guru->pendidikan_terakhir }}</td>
              <td>{{ $guru->email }}</td>
              <td>{{ $guru->telp }}</td>
              <td>
                <a class="btn btn-primary" href="{{ route('guru.edit', $guru->id) }}">
                  <i class="fa fa-edit"></i> Edit
                </a>
                <form class="d-inline" action="{{ route('guru.delete', $guru->id) }}" method="post">
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
    </div>
  </div>
</div>

<!-- Sisipkan komponen UploadAlert secara tersembunyi (tidak tampil di page) -->
<div style="display: none;">
  <x-upload-alert-guru title="Upload Data Guru" template-link="{{ asset('template/template-guru.xlsx') }}" />
</div>

@endsection
  