<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\TahunPelajaran;

class TahunPelajaranHeader extends Component
{
    public $tahunPelajaran;

    /**
     * Create a new component instance.
     *
     * @param  mixed  $tahunPelajaran
     * @return void
     */
    public function __construct($tahunPelajaran = null)
    {
        // Jika data tidak diberikan, ambil data aktif dari database.
        // Perhatikan perbedaan antara 'Aktif' (di view) dan 'active'
        $this->tahunPelajaran = $tahunPelajaran ?: TahunPelajaran::where('status', 'Aktif')->first();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tahun-pelajaran-header');
    }
}
