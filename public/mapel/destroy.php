<?php
session_start();
require_once '../../config/database.php';

if (isset($_POST['k'])) {
  $connection = connect();

  $id = $_POST['k'];
  $query = "DELETE FROM mapel WHERE mapel.kode_mapel = '$id'";
  
  $datas = mysqli_query($connection, $query);
  
  if (!$datas) {
    $_SESSION['info'] = "Mapel gagal dihapus";
    header('Location: http://ev.final.test/?v=mapel');
    exit;
  }

  $_SESSION['info'] = "Mapel berhasil dihapus";
  header('Location: http://ev.final.test/?v=mapel');
  exit;
}
