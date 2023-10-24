<?php

use Faker\Factory;

session_start();

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config/database.php';

$kode = htmlspecialchars($_POST['kode_guru']);
$nama = htmlspecialchars($_POST['nama']);
$pendidikan = htmlspecialchars($_POST['pendidikan']);
$prodi = htmlspecialchars($_POST['prodi']);

$i = 0;
$e = ['kode', 'nama', 'pendidikan', 'prodi'];
$errors = [];

foreach ($_POST as $field) {
  if (empty($field) || $field == 'x') {
    $errors[] = $e[$i] . ' harus diisi!';
  }
  $i++;
}
if (strlen($kode) < 8) {
  $errors[] = "nis setidaknya 8 karakter";
}
if (strlen($nama) < 3) {
  $errors[] = "nama setidaknya 3 karakter";
}
if (!is_numeric($kode)) {
  $errors[] = 'harus angka!';
}

if (count($errors) > 0) {
  $_SESSION['errors'] = $errors;
  header('Location: http://ev.final.test/?v=siswa');
  exit;
}

// require_once __DIR__ . '/../../utils/Helper.php';
// Helper::generateGuru(50);
// die;

$connection = connect();

$query = "INSERT INTO gurus (kode_guru, nama_guru, pendidikan, prodi) 
        VALUES ('$kode', '$nama', '$pendidikan', '$prodi')";

$datas = $connection->query($query);

if (!$datas) {
  'Unkwon error: ' . $connection->connect_error;
}
header('Location: http://ev.final.test/?v=siswa');
exit;
