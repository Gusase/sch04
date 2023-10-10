<?php

/**
 * Dynamic redirect
 * 
 * @param string Url yg mau di ambil
 * @return array array assosiatif
 */
function redirect(string $url): array
{

  if ($url == 'siswa') {
    if (isset($_GET['m']) && $_GET['m'] == 'edit') {
      return [
        't' => 'Edit',
        'head' => 'Mari Ubah Beberapa Hal',
        'page' => 'component/siswa/formEdit.php'
      ];
    }
    return [
      't' => 'Semua siswa',
      'head' => 'Prepare for chaos my rule begins',
      'page' => 'siswa/index.php'
    ];
  } elseif ($url == 'mapel') {
    if (isset($_GET['m']) && $_GET['m'] == 'edit') {
      return [
        't' => 'Edit',
        'head' => 'Edit Mapel',
        'page' => 'component/mapel/formEdit.php'
      ];
    }
    return [
      't' => 'Semua mapel',
      'head' => 'Your fate is sealed, I control destiny',
      'page' => 'mapel/index.php'
    ];
  } elseif ($url == 'nilai') {
    if (isset($_GET['m']) && $_GET['m'] == 'edit') {
      return [
        't' => 'Edit',
        'head' => 'Edit Nilai',
        'page' => 'component/nilai/formEdit.php'
      ];
    }
    return [
      't' => 'Semua Nilai',
      'head' => '😎🥵',
      'page' => 'nilai/index.php'
    ];
  } else {
    return [
      't' => 'Overview',
      'head' => 'Your feeble resistance amuses me',
      'page' => 'home.php'
    ];
  }
}
