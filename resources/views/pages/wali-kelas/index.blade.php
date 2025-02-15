@extends('layout.default', [])

@section('title', 'Wali Kelas')

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
    <li class="breadcrumb-item">Wali Kelas</li>
    <li class="breadcrumb-item active"></li>
</ul>

<a href="{{ route('wali-kelas.create') }}" type="button" class="btn btn-success mb-3">
    <i class="fa fa-plus"></i> Tambah Wali Kelas
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
                        <th scope="col">Tingkat</th>
                        <th scope="col">Nama Kelas</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($waliKelas as $wali)
                        <tr>
                            <td>{{ $wali->guru->nama_lengkap }}</td> <!-- Guru through relation -->
                            <td>{{ $wali->tingkat }}</td>
                            <td>{{ $wali->kelas->nama_kelas }}</td> <!-- Class through relation -->
                            <td>
                                <a class="btn btn-primary" href="{{ route('wali-kelas.edit', $wali->id) }}">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <form class="d-inline" action="{{ route('wali-kelas.delete', $wali->id) }}" method="post">
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
