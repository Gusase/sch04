<?php
session_start();
require_once '../../config/database.php';

if (isset($_POST['k'])) {
  $connection = connect();

  $id = $_POST['k'];
  $query = "DELETE FROM nilai WHERE nilai.kd_nilai = '$id'";

  $datas = $connection->query($query);

  if (!$datas) {
    $_SESSION['info'] = "Nilai gagal dihapus";
    header('Location: http://ev.final.test/?v=nilai');
    exit;
  }

  $_SESSION['info'] = "Nilai berhasil dihapus";
  header('Location: http://ev.final.test/?v=nilai');
  exit;
}
