<?php

/**
 * Dynamic redirect
 * 
 * @param string Url yg mau di ambil
 * @return array array assosiatif
 */
function redirect($url)
{

  if ($url == 'siswa') {
    if (isset($_GET['m']) && $_GET['m'] == 'edit') {
      return [
        't' => 'Edit',
        'head' => '( ´･･)ﾉ(._.`)',
        'page' => 'component/siswa/formEdit.php'
      ];
    }
    return [
      't' => 'Semua siswa',
      'head' => '( •_•)>⌐■-■',
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
      'head' => '(^///^)',
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
    if (isset($_GET['m']) && $_GET['m'] == 'tertinggi') {
      return [
        't' => 'Semua nilai | Tertinggi',
        'head' => 'Nilai tertinggi',
        'page' => 'component/nilai/nilaiTertinggi.php'
      ];
    }
    return [
      't' => 'Semua Nilai',
      'head' => '(⊙_⊙;)',
      'page' => 'nilai/index.php'
    ];
  } elseif ($url == 'guru') {
    if (isset($_GET['m']) && $_GET['m'] == 'edit') {
      return [
        't' => 'Edit',
        'head' => 'Edit guru',
        'page' => 'component/guru/formEdit.php'
      ];
    }
    return [
      't' => 'Semua guru',
      'head' => '(╯°□°）╯︵ ┻━┻',
      'page' => 'guru/index.php'
    ];
  } elseif ($url == 'kelas') {
    if (isset($_GET['m']) && $_GET['m'] == 'edit') {
      return [
        't' => 'Edit',
        'head' => 'Edit kelas',
        'page' => 'component/kelas/formEdit.php'
      ];
    }
    return [
      't' => 'Semua kelas',
      'head' => '╯︵ ┻━┻',
      'page' => 'kelas/index.php'
    ];
  } elseif ($url == 'raport') {
    if (isset($_GET['m']) && $_GET['m'] == 'print') {
      $id = $_GET['i'];
      // return [
      //   't' => 'Raport',
      //   'head' => 'rport',
      //   'page' => 'component/raport/print.php'
      // ];
      $url = "/component/raport/print.php?i=$id";
      $url = str_replace(PHP_EOL, '', $url);
      return header("Location: $url");
    }
    return [
      't' => 'Raport',
      'head' => '( ˘︹˘ )',
      'page' => 'raport/index.php'
    ];
  } else {
    return [
      't' => 'Overview',
      'head' => '(*/ω＼*)',
      'page' => 'home.php'
    ];
  }
}
