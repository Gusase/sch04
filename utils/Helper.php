<?php

/**
 * undocumented class
 */
class Helper
{
  public static function generateSiswa(int $count): void
  {
    $jurusan = [
      "Rekayasa Perangkat Lunak",
      "Teknik Komputer dan Jaringan",
      "Teknik Audio Video",
      "Teknik Pemesinan",
      "Teknik Gambar Bangunan",
      "Teknik Instalasi Tenaga Listrik",
      "Office Administration"
    ];
    $agama = [
      "Islam",
      "Kristen Protestan",
      "Katolik",
      "Hindu",
      "Buddha",
      "Konghucu",
    ];
    $kelasId = [
      '89047200',
      '90254266',
      '90671033',
      '91404352',
      '91404553',
      '91638904',
      '91697310',
      '91912706',
      '93022510',
      '93199995',
      '93344760',
      '93972096',
      '93975010',
      '94474940',
      '94574911',
      '95474959',
      '96089847',
      '96918984',
      '98964721',
      '99762217',
      '93191295'
    ];
    for ($i = 0; $i < $count; $i++) {
      $user = Faker\Factory::create('ja_JP');
      $datas = (object)[
        'nis' => $user->randomNumber(8, true),
        'id_kelas' => $user->randomElement($kelasId),
        'nama' => $user->userName(),
        'tanggal' => $user->date('Y-m-d'),
        'jk' => $user->randomElement(['l', 'p']),
        'alamat' => $user->address(),
        'tel' => $user->phoneNumber(),
        'agama' => $user->randomElement($agama),
        'jurusan' => $user->randomElement($jurusan),
      ];
      $connection = connect();
      $query = "INSERT INTO siswas (nis,id_kelas, nama_lengkap, tgl_lahir, jk, alamat, telp, agama, jurusan) 
                VALUES ('$datas->nis',$datas->id_kelas ,'$datas->nama', '$datas->tanggal', '$datas->jk', '$datas->alamat', '$datas->tel', '$datas->agama', '$datas->jurusan')";
      $datas = $connection->query($query);
    }
  }

  public static function generateGuru(int $count): void
  {
    $prodi = ["Teknik Informatika", "Ilmu Komputer", "Sistem Informasi", "Manajemen", "Akuntansi", "Hukum", "Kedokteran", "Farmasi", "Arsitektur", "Teknik Elektro", "Pendidikan Bahasa Inggris", "Psikologi", "Ilmu Biologi", "Ilmu Fisika", "Ilmu Kimia", "Ilmu Ekonomi", "Teknik Mesin", "Teknik Sipil", "Agribisnis", "Sastra Jepang", "Seni Rupa", "Perhotelan", "Hubungan Internasional", "Ilmu Keperawatan", "Pendidikan Dokter Gigi", "Pariwisata", "Teknik Perminyakan", "Filsafat", "Ilmu Politik", "Ilmu Sejarah"];
    $pendkk = ["SD", "SMP", "SMA", "SMK", "D1", "D2", "D3", "D4", "S1", "S2", "S3", "Profesi", "Doktor", "Magister", "Sarjana", "Ahli Madya", "Diploma", "Sarjana Ekonomi", "Sarjana Hukum", "Sarjana Teknik", "Sarjana Ilmu Komputer", "Magister Administrasi Publik", "Sarjana Ekonomi Islam", "Sarjana Psikologi", "Magister Manajemen", "Sarjana Farmasi", "Sarjana Kedokteran", "Sarjana Kedokteran Gigi", "Sarjana Ilmu Biologi", "Sarjana Ilmu Fisika", "Sarjana Ilmu Kimia", "Sarjana Agribisnis", "Sarjana Sastra Jepang", "Sarjana Seni Rupa", "Sarjana Perhotelan", "Sarjana Hubungan Internasional", "Sarjana Teknik Elektro", "Sarjana Teknik Mesin", "Sarjana Teknik Sipil", "Sarjana Ilmu Komunikasi", "Sarjana Pendidikan Bahasa Inggris", "Sarjana Psikologi", "Sarjana Ilmu Keperawatan", "Sarjana Pendidikan Dokter Gigi", "Magister Kesehatan Masyarakat"];
    for ($i = 0; $i < $count; $i++) {
      $user = Faker\Factory::create('ja_JP');
      $datas = (object)[
        'kode_guru' => $i,
        'nama_guru' => $user->userName(),
        'pendidikan' => $user->randomElement($pendkk),
        'prodi' => $user->randomElement($prodi)
      ];
      $connection = connect();
      $query = "INSERT INTO gurus (kode_guru, nama_guru, pendidikan, prodi) 
                VALUES ('$datas->kode_guru', '$datas->nama_guru', '$datas->pendidikan', '$datas->prodi')";
      $datas = $connection->query($query);
    }
  }

  public static function generateKelas(int $count): void
  {
    $kelas = [
      "RPL 1",
      "RPL 2",
      "RPL 3",
      "TKJ 1",
      "TKJ 2",
      "TKJ 3",
      "TAV 1",
      "TAV 2",
      "TAV 3",
      "TPB 1",
      "TPB 2",
      "TPB 3",
      "TGB 1",
      "TGB 2",
      "TGB 3",
      "TITL 1",
      "TITL 2",
      "TITL 3",
      "OA 1",
      "OA 2",
      "OA 3",
    ];
    for ($i = 0; $i < count($kelas); $i++) {
      $user = Faker\Factory::create('ja_JP');
      $datas = (object)[
        'id' => $user->numberBetween(88888888, 99999999),
        // 'nama' => $user->randomElement($kelas),
        'nama' => $kelas[$i],
        'kapasitas' => $user->numberBetween(29, 33),
        'kode_guru' => $user->numberBetween(0, 24)
      ];
      $connection = connect();
      $query = "INSERT INTO kelas (id, nama, kapasitas,kode_guru) VALUES ('$datas->id', '$datas->nama','$datas->kapasitas', $datas->kode_guru)";
      $datas = $connection->query($query);
    }
  }

  public static function generateMapel(int $count): void
  {
    $mata_pelajaran = [
      "Matematika",
      "Bahasa Indonesia",
      "Bahasa Inggris",
      "Pendidikan Agama",
      "Pendidikan Kewarganegaraan",
      "Pendidikan Jasmani",
      "Bahasa Jepang",
      "Sejarah Indonesia",
      "Fisika",
      "Kimia",
      "Biologi",
      "Ekonomi",
      "Akuntansi",
      "Geografi",
      "Seni Budaya",
      "Sosiologi",
      "Pemrograman",
      "Pemrograman Web",
      "Desain Grafis",
      "Kejuruan TKJ",
      "Kejuruan RPL",
      "Kejuruan TAV",
      "Bahasa Sunda",
      "Bahasa Arab",
      "Bahasa Mandarin",
      "Bisnis dan Kewirausahaan",
      "Manajemen Usaha Mikro dan Kecil",
      "Otomotif",
      "Pengelasan",
      "Teknik Permesinan",
      "Manajemen Perhotelan",
      "Pemeliharaan Peralatan Komputer",
      "Prakarya dan Kewirausahaan",
      "Pertanian",
    ];
    for ($i = 0; $i < count($mata_pelajaran); $i++) {
      $user = Faker\Factory::create('ja_JP');
      $datas = (object)[
        'kode' => mt_rand(10000000, 99999999),
        'nama' => $mata_pelajaran[$i],
        'jam' => $user->date('m:d'),
        'kode_guru' => $user->numberBetween(0, 24)
      ];
      $connection = connect();
      $query = "INSERT INTO mapel VALUES ('$datas->kode', '$datas->nama', '$datas->jam','$datas->kode_guru')";
      $datas = $connection->query($query);
    }
  }

  public static function get(string $table, array $options = []): mysqli_result
  {
    $query = "SELECT * from $table";
    if (!empty($options)) {
      // if (isset($options['kolom'])) {
      //   if (count($options['kolom']) > 0) {
      //     $kolom = implode(', ', $options['kolom']);
      //   }
      //   $query = "SELECT $kolom FROM $table";
      // }
      if (isset($options['kolom'])) {
        $query = "SELECT " . $options['kolom'] . " from $table";
        $query .= " ORDER BY $table." . $options['kolom'];
        if (isset($options['order']) && in_array(strtolower($options['order']), ['asc', 'desc'])) {
          $query .= " " . strtoupper($options['order']);
        }
        if (isset($options['operator'])) {
          $query = "SELECT " . $options['operator'] . "(" . $options['kolom'] . ") FROM $table";
        }
      }

      // if (isset($options['where'])) {
      //     $query .= " WHERE " . $options['where'];
      // }
    }
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
