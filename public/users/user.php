<?php
session_start();

require_once '../../config/database.php';
require_once '../../utils/constant.php';
require_once '../../utils/Helper.php';

try {
  if (!isset($_GET['id']) && empty($_GET['id'])) {
    $_SESSION['error'] = 'Maaf data yg diberikan kurang';
    header('Location: ../');
    exit;
  }

  $cd = $_GET['id'];

  $connection = connect();
  if (!$connection) {
    throw new Exception(
      "Error to connect :" . $connection->errno
    );
  }

  $query = "SELECT * FROM siswas WHERE nis = '$cd' LIMIT 1 ";

  $datas = $connection->query($query);

  if (!$datas) {
    throw new Exception("Error to get data");
  }

  if (!$datas->num_rows > 0) {
    $_SESSION['error'] = $nama;
    header('Location: ../err/gaada.php');
    exit;
  }

  $data = $datas->fetch_object();

  $connection->close();
} catch (\Throwable $e) {
  $error = $e->getMessage();
}

?>

<!doctype html>
<html lang="en" class="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- <link href="../client/css/style.css" rel="stylesheet"> -->
  <title><?= Helper::username($data->nama_lengkap) . ' / ' . $data->jurusan ?></title>
  <script>
    tailwind.config = {
      darkMode: 'class',
    }
  </script>
</head>

<body class="antialiased text-slate-500 dark:text-slate-400 bg-white dark:bg-slate-900">
  <?php include '../component/nav.php';
  include '../component/toggle.php' ?>


  <section class="bg-[#404eed] dark:bg-gray-900 isolate relative max-w-full pt-36 pb-40">
    <div class="container min-h-0 uppercase mx-auto">
      <div class="min-h-[80px] text-center max-w-[1480px]">
        <h1 class="text-4xl sm:text-6xl font-extrabold text-white tracking-tight mt-3"><?= Helper::username($data->nama_lengkap) ?></h1>
        <div class="max-w-xl capitalize mx-auto mt-5 sm:mt-7 text-base font-inital text-gray-100">Aplikasi dalam pengembangan dalam rangka pembuatan <span class="font-semibold">CRUD</span> system</div>
      </div>
    </div>
    <div class="bg-gradient-to-b from-indigo-900 to-transparent dark:from-blue-900 w-full h-full absolute top-0 left-0 -z-10"></div>
  </section>

  <section class="relative -mt-14 container mx-auto overflow-x-auto border dark:border-gray-600 border-gray-200 shadow-lg sm:rounded-lg">
    <div class="relative overflow-hidden bg-white dark:bg-gray-800 sm:rounded-ss-lg">

      <!-- Breadcrumb -->
      <ol class="inline-flex py-4 px-8 border-b dark:dark:border-gray-600 items-center space-x-1 md:space-x-3">
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
            <a href="#" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white"><?= $data->nama_lengkap ?></a>
          </div>
        </li>
      </ol>

      <div class="flex-row items-center justify-between p-4 space-y-3 sm:flex sm:space-y-0 sm:space-x-4">
        <div class="flex items-center">
          <div class="w-20 h-20 rounded-full overflow-hidden">
            <img class="w-full object-cover rounded-full" src="https://placehold.co/300x300/000000/FFFFFF.webp?text=<?= mb_strtoupper(mb_substr($data->nama_lengkap, 0, 1, "UTF-8")) ?>" alt="<?= Helper::username($data->nama_lengkap) ?>">
          </div>
          <div class="ml-4">
            <h2 class="text-lg font-semibold dark:text-gray-100"><?= Helper::username($data->nama_lengkap) ?></h2>
            <p class="text-gray-600 dark:text-gray-300"><?= $data->jurusan; ?></p>
          </div>
        </div>
        <a href="/?v=siswa&n=<?= strtolower(urlencode($data->nama_lengkap)) ?>&m=edit" class="inline-flex items-center rounded-md bg-white dark:bg-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-gray-200 focus:ring-2 px-3 py-2 text-sm font-semibold text-gray-900 dark:text-gray-100 dark:ring-gray-800 shadow-sm ring-1 ring-inset ring-gray-400">
          <svg class="w-4 h-4 mr-1 text-gray-800 dark:text-gray-50" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.109 17H1v-2a4 4 0 0 1 4-4h.87M10 4.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm7.95 2.55a2 2 0 0 1 0 2.829l-6.364 6.364-3.536.707.707-3.536 6.364-6.364a2 2 0 0 1 2.829 0Z" />
          </svg>
          Edit
        </a>
      </div>
      <div class="p-4 -mt-3">
        <div class="border-t dark:dark:border-gray-600 pt-3">
          <div class="mb-2">
            <h3 class="text-md font-semibold">Informasi Pribadi</h3>
          </div>
          <div class="grid grid-cols-2 gap-4">
            <div>
              <p class="text-gray-600 dark:text-gray-400">Tanggal Lahir:</p>
              <p class="dark:text-gray-100"><?= $data->tgl_lahir; ?></p>
            </div>
            <div class="capitalize">
              <p class="text-gray-600 dark:text-gray-400">Jenis Kelamin:</p>
              <p class="dark:text-gray-100"><?= $data->jk == 'l' ? 'Laki-laki' : 'perempuan' ?></p>
            </div>
            <div>
              <p class="text-gray-600 dark:text-gray-400">Alamat:</p>
              <p class="dark:text-gray-100"><?= $data->alamat; ?></p>
            </div>
            <div>
              <p class="text-gray-600 dark:text-gray-400">Telepon:</p>
              <p class="dark:text-gray-100"><?= $data->telp; ?></p>
            </div>
            <div>
              <p class="text-gray-600 dark:text-gray-400">Agama:</p>
              <p class="dark:text-gray-100"><?= $data->agama; ?></p>
            </div>
            <div>
              <p class="text-gray-600 dark:text-gray-400">Jurusan:</p>
              <p class="dark:text-gray-100"><?= $data->jurusan; ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



  <!-- <script src="../client/js/flowbite.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function(event) {
      document.getElementById('addsiswa').click();
    });

    var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
    var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

    // Change the icons inside the button based on previous settings
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
      themeToggleLightIcon.classList.remove('hidden');
    } else {
      themeToggleDarkIcon.classList.remove('hidden');
    }

    var themeToggleBtn = document.getElementById('theme-toggle');

    themeToggleBtn.addEventListener('click', function() {

      // toggle icons inside button
      themeToggleDarkIcon.classList.toggle('hidden');
      themeToggleLightIcon.classList.toggle('hidden');

      // if set via local storage previously
      if (localStorage.getItem('color-theme')) {
        if (localStorage.getItem('color-theme') === 'light') {
          document.documentElement.classList.add('dark');
          localStorage.setItem('color-theme', 'dark');
        } else {
          document.documentElement.classList.remove('dark');
          localStorage.setItem('color-theme', 'light');
        }

        // if NOT set via local storage previously
      } else {
        if (document.documentElement.classList.contains('dark')) {
          document.documentElement.classList.remove('dark');
          localStorage.setItem('color-theme', 'light');
        } else {
          document.documentElement.classList.add('dark');
          localStorage.setItem('color-theme', 'dark');
        }
      }

    });
  </script>
</body>

</html>