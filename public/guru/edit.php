<?php
session_start();
require_once __DIR__ . '/../../config/database.php';

$g = htmlspecialchars($_POST['kode']);
$kode = htmlspecialchars($_POST['kode_guru']);
$nama = htmlspecialchars($_POST['nama']);
$pendidikan = htmlspecialchars($_POST['pendidikan']);
$prodi = htmlspecialchars($_POST['prodi']);

$i = 0;
$e = ['kode_guru', 'nama', 'pendidikan', 'prodi'];
$errors = [];

foreach ($_POST as $field) {
  if (empty($field)) {
    $errors[] = $e[$i] . ' harus diisi!';
  }
  $i++;
}
// if (strlen($nis) < 8 && strlen($nis) != 8) {
//   $errors[] = "Nis setidaknya 8 karakter";
// }
if (strlen($nama) < 3) {
  $errors[] = "Nama guru setidaknya 3 karakter";
}
if (!is_numeric($kode)) {
  $errors[] = 'kode harus angka!';
}
if (count($errors) > 0) {
  $_SESSION['errors'] = $errors;
  header('Location: https://ev.final.test/?v=guru');
  exit;
}

$connection = connect();

$query = "UPDATE gurus g SET kode_guru = '$kode', nama_guru = '$nama', pendidikan = '$pendidikan', prodi = '$prodi' WHERE g.kode_guru = '$g'";

$datas = $connection->query($query);

if (!$datas) {
  die('Unkwon error: ' . $connection->connect_error);
}

if (!$connection->affected_rows > 0) {
  $_SESSION['info'] = "Data <span class='normal-case'>{$nama}</span> tidak ada yg diubah";
  header('Location: https://ev.final.test/?v=guru');
  exit;
}

$_SESSION['info'] = "<span class='normal-case'>{$nama}</span> berhasil diperbarui";
header('Location: https://ev.final.test/?v=guru');
exit;
