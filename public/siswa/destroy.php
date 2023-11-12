<?php
session_start();
require_once '../../config/database.php';

if (isset($_POST['nama'])) {
  $connection = connect();

  $id = $_POST['nama'];
  $query = "DELETE FROM siswas s WHERE s.nama_lengkap = '$id'";
  // $query = "delete from nilai where id = '$id'";
  $datas = mysqli_query($connection, $query);
  // $name = $name->fetch_object();
  // $datas = mysqli_query($connect, $query);

  if (!$datas) {
    $_SESSION['info'] = "Siswa masih disini";
    header('Location: http://ev.final.test/?v=siswa');
    exit;
  }

  $_SESSION['info'] = "Siswa adios";
  header('Location: http://ev.final.test/?v=siswa');
  exit;
}
