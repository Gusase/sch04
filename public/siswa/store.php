<?php

use Faker\Factory;

session_start();

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config/database.php';

// $nis = htmlspecialchars($_POST['nis']);
// $nama = htmlspecialchars($_POST['nama']);
// $tanggal = htmlspecialchars($_POST['tanggal']);
// $alamat = htmlspecialchars($_POST['alamat']);
// $jk = htmlspecialchars($_POST['gender']);
// $tel = htmlspecialchars($_POST['nomor']);
// $jurusan = htmlspecialchars($_POST['jurusan']);
// $agama = htmlspecialchars($_POST['agama']);


// $i = 0;
// $e = array('nis', 'nama', 'tanggal', 'nomor', 'gender', 'alamat', 'agama', 'jurusan');
// $errors = array();

// foreach ($_POST as $field) {
//   if (empty($field) || $field == 'x') {
//     $errors[] = $e[$i] . ' harus diisi!';
//   }
//   $i++;
// }
// if (strlen($nis) < 8) {
//   $errors[] = "nis setidaknya 8 karakter";
// }
// if (strlen($nama) < 3) {
//   $errors[] = "nama setidaknya 3 karakter";
// }
// if (!is_numeric($nis)) {
//   $errors[] = 'harus angka!';
// }

// if (count($errors) > 0) {
//   $_SESSION['errors'] = $errors;
//   header('Location: http://ev.final.eva/?v=siswa');
//   exit;
// }

for ($i = 0; $i < 50; $i++) {
  $user = Faker\Factory::create('ja_JP');
  $datas = (object)[
    'nis' => $user->randomNumber(8, true),
    'nama' => $user->userName(),
    'tanggal' => $user->date('Y-m-d'),
    'jk' => $user->randomElement(['l', 'p']),
    'alamat' => $user->address(),
    'tel' => $user->randomNumber(8, true),
    'agama' => $user->randomElement(['islam', 'kristen']),
    'jurusan' => $user->randomElement(['otomotif', 'Rekayasa Perangkat Lunak']),
  ];
  $connection = connect();
  $query = "INSERT INTO siswas (nis, nama_lengkap, tgl_lahir, jk, alamat, telp, agama, jurusan) 
  VALUES ('$datas->nis', '$datas->nama', '$datas->tanggal', '$datas->jk', '$datas->alamat', '$datas->tel', '$datas->agama', '$datas->jurusan')";
  $datas = $connection->query($query);
}
die;

$connection = connect();

// $query = "INSERT INTO siswas (nis, nama_lengkap, tgl_lahir, jk, alamat, telp, agama, jurusan) 
//         VALUES ('$nis', '$nama', '$tanggal', '$jk', '$alamat', '$tel', '$agama', '$jurusan')";

$datas = $connection->query($query);

if (!$datas) {
  'Unkwon error: ' . $connection->connect_error;
}
header('Location: http://ev.final.eva/?v=siswa');
exit;
