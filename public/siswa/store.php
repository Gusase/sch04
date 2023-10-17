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
require_once __DIR__ . '/../../utils/Helper.php';
Helper::generate(50);
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
