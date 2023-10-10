<?php
session_start();
require_once '../../config/database.php';

$kode = htmlspecialchars($_POST['kode']);
$nama = htmlspecialchars($_POST['nama']);
$jam = htmlspecialchars($_POST['jam-awal']);
// $jamakhir = htmlspecialchars($_POST['jam-akhir']);

// $jam = $jamawal . '-' . $jamakhir;

$i = 0;
$e = ['kode', 'nama', 'jam'];
$errors = array();

foreach ($_POST as $field) {
  if (empty($field)) {
    $errors[] = $e[$i] . ' harus diisi!';
  }
  $i++;
}
if (strlen($kode) < 8) {
  $errors[] = "kode setidaknya 8 karakter";
}
if (strlen($nama) < 3) {
  $errors[] = "nama mapel setidaknya 3 karakter";
}
if (!is_numeric($kode)) {
  $errors[] = 'kode harus angka!';
}
if (count($errors) > 0) {
  $_SESSION['errors'] = $errors;
  header('Location: http://ev.final.eva/?v=mapel');
  exit;
}
$connection = connect();

$query = "INSERT INTO mapel (kode_mapel, nama_mapel, jp) VALUES ('$kode', '$nama', '$jam')";

$datas = $connection->query($query);

if (!$datas) {
  'Unkwon error: ' . $connection->connect_error;
}

$_SESSION['info'] = "Mapel {$nama} berhasil ditambahkan";
header('Location: http://ev.final.eva/?v=mapel');
exit;
