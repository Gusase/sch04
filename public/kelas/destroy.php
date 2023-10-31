<?php
session_start();
require_once '../../config/database.php';

if (isset($_POST['k'])) {
  $connection = connect();

  $id = $_POST['k'];
  $query = "DELETE FROM kelas WHERE kelas.id = '$id'";

  $datas = mysqli_query($connection, $query);

  if (!$datas) {
    $_SESSION['info'] = "kelas gagal dihapus";
    header('Location: http://ev.final.test/?v=kelas');
    exit;
  }

  $_SESSION['info'] = "kelas berhasil dihapus";
  header('Location: http://ev.final.test/?v=kelas');
  exit;
}
