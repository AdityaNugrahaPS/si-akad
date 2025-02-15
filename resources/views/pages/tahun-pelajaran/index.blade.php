@extends('layout.default', [])

@section('title', 'Tahun Pelajaran')

@push('css')
    <link href="/assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="/assets/plugins/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet">
    <link href="/assets/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet">
    <link href="/assets/plugins/bootstrap-table/dist/bootstrap-table.min.css" rel="stylesheet">
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
    <script src="/assets/plugins/bootstrap-table/dist/bootstrap-table.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#dataTable').DataTable({
                scrollX: true
            });

            $('.btn-activate').on('click', function() {
                $('.btn-activate').removeClass('d-none');
                $('.status-active').removeClass('status-active').text('Tidak Aktif');

                $(this).closest('tr').find('td:first-child')
                    .addClass('status-active')
                    .text('Aktif');

                $(this).addClass('d-none');
            });
        });
    </script>
    <style>
        .status-active {
            font-weight: bold;
            color: green;
        }
    </style>
@endpush

@section('content')
    <ul class="breadcrumb">
        <li class="breadcrumb-item">Tahun Pelajaran</li>
        <li class="breadcrumb-item active"></li>
    </ul>

    <a href="{{ route('tahun-pelajaran.create') }}" class="btn btn-success mb-3">
        <i class="fa fa-plus"></i> Tambah Tahun Pelajaran
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
                            <th>Status</th>
                            <th>Tahun</th>
                            <th>Semester</th>
                            <th>Kepala Sekolah</th>
                            <th>Tanggal Rapor</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tahunPelajarans as $tahunPelajaran)
                            <tr>
                                <td class="{{ $tahunPelajaran->status === 'Aktif' ? 'status-active' : '' }}">
                                    {{ $tahunPelajaran->status }}
                                </td>
                                <td>{{ $tahunPelajaran->tahun }}</td>
                                <td>{{ $tahunPelajaran->semester }}</td>
                                <td>{{ $tahunPelajaran->guru->nama_lengkap }}</td>
                                <td>{{ $tahunPelajaran->tanggal_rapor }}</td>
                                <td>
                                    <a class="btn btn-primary"
                                        href="{{ route('tahun-pelajaran.edit', $tahunPelajaran->id) }}">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <form class="d-inline"
                                        action="{{ route('tahun-pelajaran.delete', $tahunPelajaran->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>

                                    @if ($tahunPelajaran->status !== 'Aktif')
                                        <!-- Form to activate status -->
                                        <form class="d-inline"
                                            action="{{ route('tahun-pelajaran.aktifkan', $tahunPelajaran->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('POST')
                                            <button class="btn btn-warning" type="submit">
                                                <i class="fa fa-check"></i> Aktifkan
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
