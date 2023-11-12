<?php
require_once '../../config/database.php';

if (isset($_POST['nama'])) {
  $connection = connect();

  $id = $_POST['nama'];
  $query = "DELETE FROM gurus WHERE gurus.nama_guru = '$id'";
  // $query = "delete from nilai where id = '$id'";
  $datas = mysqli_query($connection, $query);
  // $name = $name->fetch_object();
  // $datas = mysqli_query($connect, $query);

  if (!$datas) {
    $_SESSION['info'] = "Guru masih disini";
    header('Location: http://ev.final.test/?v=guru');
    exit;
  }

  $_SESSION['info'] = "Guru adios";
  header('Location: http://ev.final.test/?v=guru');
  exit;
}
