@extends('layout.default', [])

@section('title', 'Kelola Grup')

@push('css')
    <!-- Extra CSS -->
    <link href="/assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="/assets/plugins/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet">
    <link href="/assets/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet">
@endpush

@push('js')
    <!-- Extra JS -->
    <script src="/assets/plugins/datatables.net/js/dataTables.min.js"></script>
    <script src="/assets/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
@endpush

@section('content')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('data-pengguna.index') }}">Data Pengguna</a></li>
        <li class="breadcrumb-item active">Kelola Grup</li>
    </ul>

    <div class="mb-3">
        <!-- Tombol tambah grup -->
        <a href="{{ route('data-pengguna.kelola-grup.create') }}" class="btn btn-success">
            <i class="fa fa-plus"></i> Tambah Grup
        </a>
    </div>

    <div class="card">
        <div class="row justify-content-center">
            <div class="col-xl-11 my-5">
                <table id="dataTable" class="table table-striped table-bordered text-nowrap w-100">
                    <thead>
                        <tr>
                            <th scope="col">Nama Grup</th>
                            <th scope="col">Deskripsi Grup</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($grups as $grup)
                            <tr>
                                <td>{{ $grup->nama_grup }}</td>
                                <td>{{ $grup->deskripsi_grup }}</td>
                                <td>
                                    <!-- Tombol hapus -->
                                    <form action="{{ route('data-pengguna.kelola-grup.destroy', $grup->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus grup ini?');">
                                            <i class="fa fa-trash"></i> Hapus
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
