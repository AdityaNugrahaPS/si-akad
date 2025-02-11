@if($tahunPelajaran)
    <div class="header-tahun-pelajaran">
        Tahun Pelajaran {{ $tahunPelajaran->tahun }} ({{ $tahunPelajaran->semester }})
    </div>
@else
    <div class="header-tahun-pelajaran">
        Data tahun pelajaran tidak tersedia.
    </div>
@endif
