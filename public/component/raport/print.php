<?php
require_once __DIR__ . '/../../../config/database.php';

if (!isset($_GET['i'])) {
  die("TIDAK MEMILIKI HAK AKSES");
}
$nis = $_GET['i'];
$connection = connect();

$q = "SELECT s.nis, s.nama_lengkap AS nama_siswa, k.nama AS nama_kelas, s.jurusan, (SELECT nama_guru FROM gurus WHERE kode_guru = k.kode_guru) AS nama_walas, m.nama_mapel, g.nama_guru, n.nilai_akhir, n.grade
        FROM siswas s 
        JOIN kelas k ON s.id_kelas = k.id
        JOIN nilai n ON n.nis_siswa = s.nis
        JOIN mapel m ON m.kode_mapel = n.kd_mapel
        JOIN gurus g ON m.kode_guru = g.kode_guru
        WHERE s.nis = '$nis'";

$result = $connection->query($q);
$hasil = $connection->query($q);
$jumlah = 0;

if (!$hasil) {
  die("masalah : " . $con->error);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Raport</title>
</head>

<body>
  <?php
  if ($result) :
    if (!$result->num_rows > 0) {
      die("<div class='alert alert-danger'>Data Nilai Belum Ada Bos</div>");
    }
    $no = 1;
    $row = $result->fetch_object();
  ?>
    <div class="max-w-7xl mx-auto">
      <div class="mb-5 mt-1">
        <div class="text-4xl leading-relaxed  border-green-600 border-b-4" style="text-align: center;">
          <h1><b>LAPORAN PENCAPAIAN</b></h1>
          <h1><b>SMK TARUNA BANGSA</b></h1>
        </div>
      </div>
      <table class="mt-12 border-collapse w-1/3">
        <tr>
          <td>Nama</td>
          <td>:</td>
          <td><?= str_replace('.', ' ', ucfirst($row->nama_siswa)) ?></td>
        </tr>
        <tr>
          <td>Nis</td>
          <td>:</td>
          <td><?= $row->nis ?></td>
        </tr>
        <tr>
          <td>Kelas</td>
          <td>:</td>
          <td><?= $row->nama_kelas ?></td>
        </tr>
      </table>
      <table class="border-collapse border border-slate-900 table-auto w-full mt-5">
        <thead>
          <tr class="font-semibold capitalize text-center">
            <td class="border border-slate-900 px-2.5 py-2 w-16">
              <h5>No</h5>
            </td>
            <td class="border border-slate-900 px-2.5 py-2">
              <h5>Mata Pelajaran</h5>
            </td>
            <td class="border border-slate-900 px-2.5 py-2 w-1/6">
              <h5>nilai</h5>
            </td>
            <td class="border border-slate-900 px-2.5 py-2 w-32">
              <h5>grade</h5>
            </td>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($hasil->num_rows > 0) :
            $no = 0;
            while ($row = $hasil->fetch_object()) :
              $no++;
          ?>
              <tr>
                <td class="border border-slate-900 px-2.5 py-2 text-center">
                  <?= $no; ?>
                </td>

                <td class="border border-slate-900 px-2.5 py-2">
                  <?= $row->nama_mapel ?>
                  <span class="text-gray-700 block"><?= str_replace('.', '', ucfirst($row->nama_guru)) ?></span>
                </td>

                <td class="border border-slate-900 px-2.5 py-2 text-center">
                  <?= $row->nilai_akhir;
                  $jumlah += $row->nilai_akhir ?>
                </td>

                <td class="border border-slate-900 px-2.5 py-2 text-center">
                  <?= $row->grade ?>
                </td>
              </tr>
          <?php
              $walas = str_replace('.', ' ', ucfirst($row->nama_walas));
            endwhile;
          endif;
          ?>
          <tr>
            <td colspan="2" class="px-2.5">
              Jumlah <br> Rata Rata
            </td>
            <td colspan="2" class="border border-slate-900 px-2.5 py-2">
              <?= $jumlah . '<br>' . $jumlah / $hasil->num_rows ?>
            </td>
          </tr>
        </tbody>
      </table>


      <div class="mt-12 w-full flex">
        <div class="basis-1/2">
          <h6>Orang Tua/Wali Murid</h6>
        </div>
        <div class="basis-1/2 text-right">
          <h6>Bekasi, <?= date('Y M d') ?></h6>
          <div class="text-center w-36 mt-3 ml-auto">
            <h6>Wali Kelas</h6>
            <br>
            <br>
            <br>
            <h6><?= $walas ?></h6>
          </div>
        </div>
      </div>
    </div>
  <?php
  endif;
  ?>
</body>
<script>
  window.print();
</script>

</html>