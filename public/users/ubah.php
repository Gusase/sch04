<?php
session_start();

require_once __DIR__ . '/../../database/connect.php';
if (!isset($_GET['nama']) && empty($_GET['nama'])) {
  $_SESSION['error'] = 'Maaf data yg diberikan kurang';
  header('Location: ../');
  exit;
} else {
  $nama = $_GET['nama'];
}

$connection = connect();

if (!$connection) {
  $error =
    "Error to connect :" . $connection->errno;
}

$query = "select * from siswas where nama_lengkap = '$nama'";

$datas = $connection->query($query);

if (!$datas) {
  $error = "Error to get data";
}

if (!$datas->num_rows > 0) {
  $_SESSION['error'] = $nama;
  header('Location: ../err/gaada.php');
  exit;
}

$data = $datas->fetch_object();

$connection->close();

if (isset($_POST['go'])) {
  $nis = $_POST["nis"];
  $nama = $_POST["nama"];
  $tanggal_lahir = $_POST["tanggal_lahir"];
  $jenis_kelamin = $_POST["jenis_kelamin"];
  $alamat = $_POST["alamat"];
  $telepon = $_POST["telepon"];
  $jurusan = $_POST["jurusan"];
  $agama = $_POST["agama"];

  try {
    if (empty($nama) || empty($tanggal_lahir) || empty($jenis_kelamin) || empty($alamat) || empty($telepon) || empty($agama) || empty($jurusan)) {
      throw new Exception("Semua kolom harus diisi!");
    }

    $query = "UPDATE siswas SET nama_lengkap='$nama', tgl_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin', alamat='$alamat', no_telp='$telepon', agama='$agama', jurusan='$jurusan' WHERE siswas.nis='$nis'";

    $datas = $connection->query($query);

    if (!$datas) {
      throw new Exception("Error ketika updt");
    }

    $connection->close();

    // $_SESSION['error'] = $nama;
    header("Location: siswa.php?nama={$nama}");
    exit;
  } catch (\Throwable $e) {
    $error = $e->getMessage();
  }
}


?>

<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../css/style.css" rel="stylesheet">
  <title><?= $data->nama_lengkap . ' / ' . $data->jurusan ?></title>
</head>

<body class="antialiased">

  <section class="bg-[#404eed] relative isolate max-w-full pt-32 pb-36">
    <div class="container min-h-0 uppercase mx-auto">
      <div class="min-h-[80px] text-center max-w-[1480px]">
        <h1 class="text-4xl sm:text-6xl font-extrabold text-white tracking-tight mt-3">Mari Ubah Beberapa Hal</h1>
        <div class="max-w-xl mx-auto mt-5 sm:mt-7 text-base text-gray-50">Mengubah data Siswa dengan data terbaru.</div>
      </div>
    </div>
    <div class="absolute opacity-[0.4] blur-3xl inset-0 -z-10 bg-[url(https://play.tailwindcss.com/img/beams.jpg)] bg-center [mask-image:linear-gradient(180deg,white,rgba(255,255,255,0))]"></div>
  </section>

  <section class="relative -mt-14 container mx-auto overflow-x-auto border border-gray-200 shadow-lg sm:rounded-lg">
    <div class="relative overflow-hidden bg-white dark:bg-gray-800 sm:rounded-ss-lg">

      <!-- Breadcrumb -->
      <ol class="inline-flex py-4 px-8 border-b items-center space-x-1 md:space-x-3">
        <li class="inline-flex items-center">
          <a href="../" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
            <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
            </svg>
            Home
          </a>
        </li>
        <li>
          <div class="flex items-center">
            <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
            </svg>
            <a href="siswa.php?nama=<?= strtolower(urlencode($data->nama_lengkap)); ?>" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white"><?= $data->nama_lengkap; ?></a>
          </div>
        </li>
        <li aria-current="page">
          <div class="flex items-center">
            <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
            </svg>
            <p class="ml-1 text-sm font-medium text-gray-700 md:ml-2 dark:text-gray-400 dark:hover:text-white">Ubah</p>
          </div>
        </li>
      </ol>

      <div class="flex-row items-center justify-between p-4 space-y-3 sm:flex sm:space-y-0 sm:space-x-4">
        <h2 class="text-lg -mb-5 font-semibold">Ubah data</h2>
        <a href="siswa.php?nama=<?= strtolower(urlencode($data->nama_lengkap)); ?>" class="inline-flex items-center rounded-md bg-white hover:bg-gray-100 focus:outline-none focus:ring-gray-200 focus:ring-2 px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-400">
          <svg class="w-4 h-4 mr-1 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.109 17H1v-2a4 4 0 0 1 4-4h.87M10 4.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm7.95 2.55a2 2 0 0 1 0 2.829l-6.364 6.364-3.536.707.707-3.536 6.364-6.364a2 2 0 0 1 2.829 0Z" />
          </svg>
          Kembali
        </a>
      </div>
      <div class="p-4 -mt-3">
        <div class="pt-3 flex flex-col sm:flex-row">
          <form class="w-7/12 space-y-4 md:space-y-6" action="" method="post">
            <input type="hidden" name="nis" value="<?= $data->nis; ?>">
            <div class="relative">
              <label for="nama" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Nama</label>
              <input type="text" value="<?= $data->nama_lengkap; ?>" id="nama" name="nama" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            </div>

            <div class="relative">
              <input type="date" value="<?= $data->tgl_lahir; ?>" id="tanggal_lahir" name="tanggal_lahir" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
              <label for="tanggal_lahir" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Tanggal Lahir</label>
            </div>

            <div class="relative">
              <label class=" text-sm text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-900 px-2 mb-2 inline-block">Jenis Kelamin</label>
              <div class="flex items-center space-x-2 mb-1">
                <input type="radio" id="laki_laki" name="jenis_kelamin" <?php echo ($data->jenis_kelamin == 'Laki-laki') ? 'checked' : ''; ?> value="laki laki" class="peer w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="Laki-laki" class=" text-sm text-gray-500 dark:text-gray-400">Laki-laki</label>
              </div>
              <div class="flex items-center space-x-2">
                <input type="radio" id="perempuan" name="jenis_kelamin" disable <?php echo ($data->jenis_kelamin == 'perempuan') ? 'checked' : ''; ?> value="perempuan" class="peer w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="Perempuan" class=" text-sm text-gray-400 dark:text-gray-500">Perempuan</label>
              </div>
            </div>

            <div class="relative">
              <input type="text" value="<?= $data->alamat; ?>" id="alamat" name="alamat" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
              <label for="alamat" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Alamat</label>
            </div>

            <div class="relative">
              <input type="telp" value="<?= $data->no_telp; ?>" id="telepon" name="telepon" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
              <label for="telepon" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Telepon</label>
            </div>

            <div class="relative">
              <input type="text" value="<?= $data->agama; ?>" id="agama" name="agama" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
              <label for="agama" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Agama</label>
            </div>

            <div class="relative">
              <select id="jurusan" name="jurusan" class="block capitalize px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                <option disabled selected>Pilih jurusan</option>
                <option value="rpl" <?php echo ($data->jurusan == 'Rekayasa Perangkat Lunak') ? 'selected' : ''; ?>>Rekayasa Perangkat Lunak</option>
                <option value="tkr" <?php echo ($data->jurusan == '') ? 'selected' : ''; ?>>tkr</option>
                <option value="tav" <?php echo ($data->jurusan == '') ? 'selected' : ''; ?>>tav</option>
                <option value="oto" <?php echo ($data->jurusan == '') ? 'selected' : ''; ?>>oto</option>
              </select>
              <label for="jurusan" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Jurusan</label>
            </div>

            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded mt-4 uppercase" name="go">simpan</button>
          </form>

          <div class="w-full max-w-md mx-auto bg-white rounded-lg">
            <div class="flex flex-col items-center pb-10">
              <img class="w-40 h-40 mb-3 rounded-full shadow-lg" src="https://placehold.co/300x300/000000/FFFFFF.webp?text=<?= mb_strtoupper(mb_substr($data->nama_lengkap, 0, 1, "UTF-8")) ?>" alt="<?= $data->nama_lengkap; ?>" />
              <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white"><?= $data->nama_lengkap; ?></h5>
              <span class="text-sm text-gray-500 dark:text-gray-400"><?= $data->jurusan; ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



  <script src="js/flowbite.min.js"></script>
</body>

</html>