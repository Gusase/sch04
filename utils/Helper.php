<?php

/**
 * undocumented class
 */
class Helper
{
  public static function generate(int $count)
  {
    for ($i = 0; $i < $count; $i++) {
      $user = Faker\Factory::create('ja_JP');
      $datas = (object)[
        'nis' => $user->randomNumber(8, true),
        'nama' => $user->userName(),
        'tanggal' => $user->date('Y-m-d'),
        'jk' => $user->randomElement(['l', 'p']),
        'alamat' => $user->address(),
        'tel' => $user->randomNumber(8, true),
        'agama' => $user->randomElement(['islam', 'kristen']),
        'jurusan' => $user->randomElement(['otomotif', 'Rekayasa Perangkat Lunak']),
      ];
      $connection = connect();
      $query = "INSERT INTO siswas (nis, nama_lengkap, tgl_lahir, jk, alamat, telp, agama, jurusan) 
  VALUES ('$datas->nis', '$datas->nama', '$datas->tanggal', '$datas->jk', '$datas->alamat', '$datas->tel', '$datas->agama', '$datas->jurusan')";
      $datas = $connection->query($query);
    }
  }

  public static function generateGuru(int $count)
  {
    for ($i = 0; $i < $count; $i++) {
      $user = Faker\Factory::create('ja_JP');
      $datas = (object)[
        'kode_guru' => $i,
        'nama_guru' => $user->userName(),
        'pendidikan' => $user->companySuffix(),
        'prodi' => $user->text(20)
      ];
      $connection = connect();
      $query = "INSERT INTO gurus (kode_guru, nama_guru, pendidikan, prodi) 
  VALUES ('$datas->kode_guru', '$datas->nama_guru', '$datas->pendidikan', '$datas->prodi')";
      $datas = $connection->query($query);
    }
  }

  public static function getMapels(string $table): mysqli_result
  {
    $query = "SELECT * from $table";

    $connection = connect();
    return $connection->query($query);
  }

  /**
   * @deprecated bingung bjir
   */
  public static function getSiswaEqualMapel($inmapel, $inSiswa)
  {
    $connection = connect();

    $qr = "SELECT COUNT(1) FROM nilai WHERE nis_siswa = '$inSiswa'";

    $row = $connection->query($qr);
    if ($row->num_rows > 0) {
      return false;
    }

    return "INSERT INTO nilai(kd_mapel,nis_siswa) VALUES ('$inmapel','$inSiswa')";
  }
}
