<?php
session_start();
require_once __DIR__ .  '/../../config/database.php';
// require_once __DIR__ . '/../../vendor/autoload.php';

// require_once __DIR__ . '/../../utils/Helper.php';
// Helper::generateMapel(25);
// die;

if (!isset($_POST['kode'])) {
  $_SESSION['errors'] = ['Unauthorized'];
  header('Location: http://ev.final.test/?v=kelas');
  exit;
}

$kode = htmlspecialchars($_POST['kode']);
$nama = htmlspecialchars($_POST['nama']);
$kapasitas = htmlspecialchars($_POST['kapasitas']);
$kodeGuru = htmlspecialchars($_POST['kode_guru']);

$i = 0;
$e = ['kode', 'nama', 'kapasitas'];
$errors = [];

foreach ($_POST as $field) {
  if (!$_POST['kode_guru'] != '-1') {
    if (empty($field)) {
      $errors[] = $e[$i] . ' harus diisi!';
    }
    $i++;
  }
}
if (strlen($kode) < 8) {
  $errors[] = "kode setidaknya 8 karakter";
}
if (strlen($nama) < 3) {
  $errors[] = "nama kelas setidaknya 3 karakter";
}
if (!is_numeric($kode)) {
  $errors[] = 'kode harus angka!';
}
if (count($errors) > 0) {
  $_SESSION['errors'] = $errors;
  header('Location: http://ev.final.test/?v=kelas');
  exit;
}
$connection = connect();

if ($kodeGuru == '-1') $kodeGuru = 'null';
$query = "UPDATE kelas k SET id = '{$kode}', nama = '{$nama}', kapasitas = {$kapasitas}, kode_guru = {$kodeGuru} WHERE k.id = '$kode'";

$datas = $connection->query($query);

if (!$datas) {
  die('Unkwon error: ' . $connection->connect_error);
}

if (!$connection->affected_rows > 0) {
  $_SESSION['info'] = "Data kelas {$nama} tidak ada yg diubah";
  header('Location: http://ev.final.test/?v=kelas');
  exit;
}

$_SESSION['info'] = "Data kelas {$nama} berhasil diubah";
header('Location: http://ev.final.test/?v=kelas');
exit;
