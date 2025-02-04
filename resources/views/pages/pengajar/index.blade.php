@extends('layout.default')

@section('title', 'Pengajar')

@push('css')
    <link href="/assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="/assets/plugins/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet">
    <link href="/assets/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet">
@endpush

@push('js')
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
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                scrollX: true
            });
        });
    </script>
@endpush

@section('content')
    <ul class="breadcrumb">
        <li class="breadcrumb-item">Pengajar</li>
        <li class="breadcrumb-item active"></li>
    </ul>

    <a href="{{ route('pengajar.create') }}" class="btn btn-success mb-3">
        <i class="fa fa-plus"></i> Tambah Pengajar
    </a>

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
                            <th scope="col">Nama Guru</th>
                            <th scope="col">Mata Pelajaran</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Tahun Pelajaran</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengajars as $pengajar)
                            <tr>
                                <td>{{ $pengajar->guru->nama_lengkap }}</td>
                                <td>{{ optional($pengajar->mataPelajaran)->nama_mata_pelajaran }}</td> 
                                <td>{{ $pengajar->kelas->nama_kelas }}</td>
                                <td>{{ $pengajar->tahun_pelajaran }}</td>
                                <td>{{ $pengajar->semester }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('pengajar.edit', $pengajar->id) }}">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <form class="d-inline" action="{{ route('pengajar.delete', $pengajar->id) }}" method="post">
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
@endsection
