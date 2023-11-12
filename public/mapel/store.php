<?php
session_start();
require_once __DIR__ .  '/../../config/database.php';
require_once __DIR__ . '/../../vendor/autoload.php';
// require_once __DIR__ . '/../../utils/Helper.php';
// Helper::generateMapel(25);
// die;

$i = 0;
$e = ['kode', 'nama', 'jam'];
$errors = [];

if (!isset($_POST['kode'])) {
  $errors[] = 'Anda tidak memberi nilai apapun';
  $_SESSION['errors'] = $errors;
  header('Location: http://ev.final.test/?v=mapel');
  exit;
}

$kode = htmlspecialchars($_POST['kode']);
$nama = htmlspecialchars($_POST['nama']);
$jam = htmlspecialchars($_POST['jam-awal']);
// $jamakhir = htmlspecialchars($_POST['jam-akhir']);

// $jam = $jamawal . '-' . $jamakhir;

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
  header('Location: http://ev.final.test/?v=mapel');
  exit;
}
$connection = connect();

$queryAvaible = "SELECT * FROM mapel WHERE nama_mapel LIKE '%$nama%' OR kode_mapel LIKE '%$kode%'";
$datas = $connection->query($queryAvaible);

if ($datas->num_rows > 0) {
  $errors[] = 'Nama mapel "' . $nama . '" sudah ada';
  $_SESSION['errors'] = $errors;
  header('Location: http://ev.final.test/?v=mapel');
  exit;
}

$query = "INSERT INTO mapel (kode_mapel, nama_mapel, jp) VALUES ('$kode', '$nama', '$jam')";

$datas = $connection->query($query);

if (!$datas) {
  'Unkwon error: ' . $connection->connect_error;
}

$_SESSION['info'] = "Mapel {$nama} berhasil ditambahkan";
header('Location: http://ev.final.test/?v=mapel');
exit;
