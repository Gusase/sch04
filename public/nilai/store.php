<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../utils/Helper.php';

if (!isset($_POST['nis'])) {
  header('Location: http://ev.final.test/?v=nilai');
  exit;
}

$connect = connect();

$nis = $_POST['nis'];
$kelas = $_POST['kelas'];
$kdmpl = $_POST['mpl'];

// $resHadir = ($_POST['hadir'] / 14) * 5;
// $resTugas = $_POST['tugas'] * 0.1;
// $resFormatif = $_POST['formatif'] * .15;
// $resUts = $_POST['uts'] * .3;
// $resUas = $_POST['uas'] * .4;

$resHadir = $_POST['hadir'];
$resTugas = $_POST['tugas'];
$resFormatif = $_POST['formatif'];
$resUts = $_POST['uts'];
$resUas = $_POST['uas'];

$nilaiAkhir = ($resHadir * 0.20) + ($resTugas * 0.20) + ($resFormatif * 0.20) + ($resUts * 0.25) + ($resUas * 0.25);
$nilaiAkhir = number_format($nilaiAkhir, 2);

$result = Helper::grade($nilaiAkhir);

$query = "UPDATE nilai n SET kelas = '$kelas', kehadiran = '$resHadir', tugas = '$resTugas', formatif = '$resFormatif' , uts = '$resUts', uas = '$resUas', nilai_akhir = '$nilaiAkhir', grade = '$result' WHERE n.nis_siswa = '$nis' AND kd_mapel = $kdmpl";

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
