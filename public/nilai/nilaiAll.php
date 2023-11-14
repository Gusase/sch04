<?php
$criteria = '';
$isFilter = false;

if (isset($_POST['kelas']) && $_POST['kelas'] != 'x') {
  $filKelas = $_POST['kelas'];
  $criteria .= " s.id_kelas='$filKelas'";
  $isFilter = !$isFilter;
}

if (isset($_POST['mapel']) && $_POST['mapel'] != 'x') {
  $filMapel = $_POST['mapel'];
  $criteria .= $isFilter ? " AND " : "" . "n.kd_mapel='$filMapel'";
  $isFilter = !$isFilter;
}

if ($isFilter) $criteria .= " WHERE $criteria";

$queryAll = "SELECT s.nis, s.nama_lengkap, k.nama, m.nama_mapel, n.uts AS  max_uts, n.uas AS max_uas, ((n.uas + n.uts)/2) AS max_nilai_akhir 
            FROM nilai n
            JOIN siswas s ON n.nis_siswa = s.nis
            JOIN mapel m ON n.kd_mapel = m.kode_mapel
            JOIN kelas k ON s.id_kelas = k.id
            $criteria
            GROUP BY s.nis,s.nama_lengkap,m.nama_mapel
            ORDER BY max_nilai_akhir DESC";

$datas = $connection->query($queryAll);
