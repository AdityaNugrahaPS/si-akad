@extends('layout.default', [])

@section('title', 'Data Pengguna')

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
  <script>
    var handleRenderTableData = function() {
      var table = $('#dataTable').DataTable({
        scrollX: true
      });
    };

    $(document).ready(function() {
      handleRenderTableData();
    });
  </script>
@endpush

@section('content')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('data-pengguna.index') }}">Data Pengguna</a></li>
    <li class="breadcrumb-item active">List</li>
  </ul>

  <div class="mb-3">
    <!-- Tombol tambah data pengguna -->
    <a href="{{ route('data-pengguna.create') }}" class="btn btn-success">
      <i class="fa fa-plus"></i> Tambah Data Pengguna
    </a>
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
              <th scope="col">Nama Depan</th>
              <th scope="col">Nama Belakang</th>
              <th scope="col">Lembaga</th>
              <th scope="col">Email</th>
              <th scope="col">Nomor Telfon</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($penggunas as $pengguna)
              <tr>
                <td>{{ $pengguna->nama_depan }}</td>
                <td>{{ $pengguna->nama_belakang }}</td>
                <td>{{ $pengguna->lembaga }}</td>
                <td>{{ $pengguna->email }}</td>
                <td>{{ $pengguna->nomor_telfon }}</td>
                <td>
                  <a class="btn btn-primary" href="{{ route('data-pengguna.edit', $pengguna->id) }}">
                    <i class="fa fa-edit"></i> Edit
                  </a>
                  <form class="d-inline" action="{{ route('data-pengguna.delete', $pengguna->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
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
@endsection
