<?php
session_start();
require_once __DIR__ . '/../../config/database.php';

$kode = htmlspecialchars($_POST['kode']);
$nis = htmlspecialchars($_POST['nis']);
$nama = htmlspecialchars($_POST['nama']);
$tanggal = htmlspecialchars($_POST['tanggal']);
$alamat = htmlspecialchars($_POST['alamat']);
$jk = htmlspecialchars($_POST['gender']);
$tel = htmlspecialchars($_POST['nomor']);
$jurusan = htmlspecialchars($_POST['jurusan']);
$agama = htmlspecialchars($_POST['agama']);

$i = 0;
$e = ['nis', 'nama', 'tanggal lahir','no telepon','jenis kelamin','alamat','jurusan','agama'];
$errors = [];

foreach ($_POST as $field) {
  if (empty(trim($field)) || $field == '-1') {
    $errors[] = $e[$i] . ' harus diisi!';
  }
  $i++;
}
if (strlen($nis) < 8 && strlen($nis) != 8) {
  $errors[] = "Nis setidaknya 8 karakter";
}
if (strlen($nama) < 3) {
  $errors[] = "Nama siswa setidaknya 3 karakter";
}
if (!is_numeric($nis)) {
  $errors[] = 'nis harus angka!';
}
if (count($errors) > 0) {
  $_SESSION['errors'] = $errors;
  header('Location: http://ev.final.test/?v=siswa');
  exit;
}
$connection = connect();

$query = "UPDATE siswas SET nis='$nis', nama_lengkap='$nama', tgl_lahir='$tanggal', jk='$jk', alamat='$alamat', telp='$tel', agama='$agama', jurusan='$jurusan' WHERE siswas.nis='$kode'";

$datas = $connection->query($query);
$nama = str_replace('.', ' ', ucfirst($nama));

if (!$datas) {
  die('Unkwon error: ' . $connection->connect_error);
}

if (!$connection->affected_rows > 0) {
  $_SESSION['info'] = "Data <span class='normal-case'>{$nama}</span> tidak ada yg diubah";
  header('Location: http://ev.final.test/?v=siswa');
  exit;
}

$_SESSION['info'] = "<span class='normal-case'>{$nama}</span> berhasil diperbarui";
header('Location: http://ev.final.test/?v=siswa');
exit;
