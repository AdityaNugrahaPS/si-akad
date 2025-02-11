<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */

    'menu' => [
      [
        'text' => 'Navigation',
        'is_header' => true
      ],
      [
        'url' => '/',
        'icon' => 'fa fa-home',
        'text' => 'Dashboard'
      ],
      [
        'text' => 'Administrator',
        'is_header' => true
      ],
      [
        'url' => '/profile',
        'icon' => 'fa fa-school',
        'text' => 'Profil Lembaga'
      ],
      [
        'url' => '/tahun-pelajaran',
        'icon' => 'fa fa-calendar',
        'text' => 'Tahun Pelajaran'
      ],
      [
        'icon' => 'fa fa-graduation-cap',
        'text' => 'Data Akademik',
        'children' => [
          [
            'url' => '/siswa',
            'text' => 'Siswa'
          ],
          [
            'url' => '/kelas',
            'text' => 'Kelas'
          ],
          [
            'url' => '/rombel',
            'text' => 'Rombel'
          ],
          [
            'url' => '/wali-kelas',
            'text' => 'Wali Kelas'
          ],
          [
            'url' => '/guru',
            'text' => 'Guru'
          ],
          [
            'url' => '/mata-pelajaran',
            'text' => 'Mata Pelajaran'
          ],
          [
            'url' => '/pengajar',
            'text' => 'Pengajar'
          ],
          [
            'url' => '/jenjang-pendidikan',
            'text' => 'Jenjang Pendidikan'
          ]
        ]
      ],
      [
        'url' => '/data-pengguna',
        'icon' => 'fa fa-users',
        'text' => 'Data Pengguna'
      ]
    ]
];
