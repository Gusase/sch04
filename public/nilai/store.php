<?php
require_once __DIR__ . '/../../config/database.php';

if (!isset($_POST['nis'])) {
  header('Location: http://ev.final.test/?v=nilai');
  exit;
}

$connect = connect();

$nis = $_POST['nis'];
$kelas = $_POST['kelas'];

$resHadir = ($_POST['hadir'] / 14) * 5;
$resTugas = $_POST['tugas'] * 0.1;
$resFormatif = $_POST['formatif'] * .15;
$resUts = $_POST['uts'] * .3;
$resUas = $_POST['uas'] * .4;

$nilaiAkhir = number_format($resHadir + $resTugas + $resFormatif = $resUts + $resUas, 2);

if ($nilaiAkhir >= 90) {
  $result = 'A';
} else if ($nilaiAkhir >= 82) {
  $result = 'B';
} else if ($nilaiAkhir >= 79) {
  $result = 'C';
} else if ($nilaiAkhir >= 50) {
  $result = 'D';
} else {
  $result = 'F';
};


$query = "UPDATE nilai n SET kelas = '$kelas', kehadiran = '$resHadir', tugas = '$resTugas', formatif = '$resFormatif' , uts = '$resUts', uas = '$resUas', nilai_akhir = '$nilaiAkhir', grade = '$result' WHERE n.nis_siswa = '$nis'";

$datas = mysqli_query($connect, $query);

if ($datas) {
  echo "
        <script>
            alert('Data {$nama} berhasil ditambahkan!');
        </script>
      ";
  header('Location: http://ev.final.test/?v=nilai');
  exit;
} else {
  echo "
        <script>
            alert('Data {$nama} gagal ditambahkan!');
        </script>
      ";
  header('Location: http://ev.final.test/?v=nilai');
  exit;
}