<?php
session_start();
require_once __DIR__ .  '/../../config/database.php';

$i = 0;
$e = ['id', 'nama', 'kapasitas', 'guru'];
$errors = [];

if (!isset($_POST['id'])) {
  $errors[] = 'Anda tidak memberi nilai apapun';
  $_SESSION['errors'] = $errors;
  header('Location: http://ev.final.test/?v=kelas');
  exit;
}

$id = htmlspecialchars($_POST['id']);
$nama = htmlspecialchars($_POST['nama']);
$kapasitas = htmlspecialchars($_POST['kapasitas']);
$id_guru = htmlspecialchars($_POST['id_guru']);

foreach ($_POST as $field) {
  if (empty($field) || $field === '-1') {
    $errors[] = $e[$i] . ' harus diisi!';
  }
  $i++;
}
if (strlen($id) < 8) {
  $errors[] = "id setidaknya 8 karakter";
}
if (strlen($nama) < 3) {
  $errors[] = "nama kelas setidaknya 3 karakter";
}
if (!is_numeric($id) || !is_numeric($kapasitas)) {
  $errors[] = 'id harus angka!';
}
if (count($errors) > 0) {
  $_SESSION['errors'] = $errors;
  header('Location: http://ev.final.test/?v=kelas');
  exit;
}
$connection = connect();

$queryAvaible = "SELECT * FROM kelas WHERE nama LIKE '%$nama%'";
$datas = $connection->query($queryAvaible);

if ($datas->num_rows > 0) {
  $errors[] = 'Nama kelas "' . $nama . '" sudah ada';
  $_SESSION['errors'] = $errors;
  header('Location: http://ev.final.test/?v=kelas');
  exit;
}

$query = "INSERT INTO kelas (id, nama, kapasitas,kode_guru) VALUES ('$id', '$nama','$kapasitas', '$id_guru')";
$datas = $connection->query($query);

if (!$datas) {
  'Unkwon error: ' . $connection->connect_error;
}

$_SESSION['info'] = "Kelas {$nama} berhasil didaftarkan";
header('Location: http://ev.final.test/?v=kelas');
exit;
