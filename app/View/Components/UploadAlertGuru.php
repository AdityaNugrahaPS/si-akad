<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UploadAlert extends Component
{
    public $title;
    public $templateLink;

    /**
     * Buat instance baru dari komponen.
     *
     * @param  string  $title
     * @param  string  $templateLink
     * @return void
     */
    public function __construct($title = 'Upload Data', $templateLink = '#')
    {
        $this->title = $title;
        $this->templateLink = $templateLink;
    }

    /**
     * Mendapatkan tampilan yang mewakili komponen.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('components.upload-alert-guru');
    }
}
