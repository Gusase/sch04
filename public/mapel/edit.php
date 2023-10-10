<?php
session_start();
require_once __DIR__ .  '/../../config/database.php';

$kode = htmlspecialchars($_POST['kode']);
$nama = htmlspecialchars($_POST['nama']);
$jam = htmlspecialchars($_POST['jam-awal']);
// $jamakhir = htmlspecialchars($_POST['jam-akhir']);

// $jam = $jamawal . '-' . $jamakhir;

$i = 0;
$e = array('kode', 'nama', 'jam');
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

$query = "UPDATE mapel SET kode_mapel ='$kode', nama_mapel = '$nama', jp = '$jam'  WHERE mapel.kode_mapel = '$kode'";

$datas = $connection->query($query);

if (!$datas) {
  die('Unkwon error: ' . $connection->connect_error);
}

if (!$connection->affected_rows > 0) {
  $_SESSION['info'] = "Data mapel {$nama} tidak ada yg diubah";
  header('Location: http://ev.final.eva/?v=mapel');
  exit;
}

$_SESSION['info'] = "Mapel {$nama} berhasil diubah";
header('Location: http://ev.final.eva/?v=mapel');
exit;
