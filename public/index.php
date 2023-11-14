<?php
session_start();

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ .  '/../config/database.php';
require_once __DIR__ .  '/../utils/redirect.php';
require_once __DIR__ . '/../utils/Helper.php';
require_once __DIR__ . '/../utils/constant.php';

if (isset($_SESSION['errors'])) {
  $errors = $_SESSION['errors'];
  unset($_SESSION['errors']);
}

if (isset($_SESSION['info'])) {
  $info = $_SESSION['info'];
  unset($_SESSION['info']);
}

// page
$v = isset($_GET['v']) ? $_GET['v'] : '';
$page = redirect($v);

// if (isset($_POST['go'])) {
//   $nama = trim($_POST['nama']);
//   $kelas = trim($_POST['kelas']);
//   $jurusan = trim($_POST['jurusan']);
//   $agama = trim($_POST['agama']);
//   $gender = trim($_POST['gender']);
//   $alamat = trim($_POST['alamat']);
//   $telepon = trim($_POST['telepon']);

//   // var_dump($_POST);
//   try {
//     if (empty($nama) || empty($kelas) || empty($jurusan) || empty($agama) || empty($gender) || empty($alamat) || empty($telepon)) {
//       throw new Exception('Isi semua field!');
//     }

//     if ($jurusan === 'x' || $kelas === 'x' || $agama === 'x') {
//       throw new Exception("Mohon isi semua field dengan benar.");
//     }
//   } catch (\Throwable $e) {
//     $error = $e->getMessage();
//   }
// }


?>

<!doctype html>
<html lang="en" class="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="client/css/style.css" rel="stylesheet">
  <title><?= $page['t'] ?? 'Not found' ?></title>
  <style>
    ::-webkit-scrollbar {
      width: 0 !important;
    }
  </style>
</head>

<body class="antialiased text-slate-500 dark:text-slate-400 bg-white dark:bg-slate-900">
  <?php include 'component/nav.php';
  include 'component/toggle.php'; ?>

  <?php if (isset($page)) : ?>
    <section class="bg-[#404eed] dark:bg-gray-900 isolate relative max-w-full pt-36 pb-40">
      <div class="container min-h-0 uppercase mx-auto">
        <div class="min-h-[80px] text-center max-w-[1480px]">
          <h1 class="text-4xl sm:text-6xl font-extrabold text-white tracking-tight mt-3"><?= $page['head'] ?? 'Where are you from?' ?></h1>
          <div class="max-w-xl capitalize mx-auto mt-5 sm:mt-7 text-base font-inital text-gray-100 font-subHeading">Aplikasi dalam pengembangan dalam rangka pembuatan <span class="font-semibold">CRUD</span> system</div>
        </div>
      </div>
      <div class="bg-gradient-to-b from-indigo-900 to-transparent dark:from-blue-900 w-full h-full absolute top-0 left-0 -z-10"></div>

    </section>

    <?php
    $url = isset($_GET['v']) ? $_GET['v'] : false;

    include_once $page['page'];

    ?>

    <!-- error -->
    <div class="space-y-4 absolute top-20 z-30 right-5">
      <?php if (!empty($info)) : ?>
        <div id="alert-<?= $index ?? 'aa' ?>" class="flex items-center max-w-lg mx-auto p-4 -mb-6 text-red-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
          <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
          </svg>
          <span class="sr-only">Info</span>
          <div class="ml-3 text-sm font-medium font-subHeading">
            <span class="uppercase"><?= $info ?? 'asuka' ?></span>
          </div>
          <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-<?= $index ?? 'aa' ?>" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
          </button>
        </div>
      <?php endif; ?>
      <?php if (!empty($errors)) : ?>
        <?php foreach ($errors as $index => $error) : ?>
          <div id="alert-<?= $index ?>" class="flex items-center max-w-lg mx-auto p-4 -mb-6 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-medium font-subHeading">
              Field <span class="uppercase"><?= $error ?? 'asuka' ?></span>
            </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-<?= $index ?>" aria-label="Close">
              <span class="sr-only">Close</span>
              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
              </svg>
            </button>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
    <!-- error -->


    <?php
    /**
     * Modal box 
     */
    if ($url) : ?>
      <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden fixed bg-black/10 backdrop-blur-sm top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] min-h-screen duration-200 justify-center items-center">
        <?php
        $pagg = match ($_GET['v']) {
          'siswa' => 'component/siswa/form.php',
          'mapel' => 'component/mapel/form.php',
          'nilai' => 'component/nilai/form.php',
          'guru' => 'component/guru/form.php',
          'kelas' => 'component/kelas/form.php',
          'raport' => null,
        };

        include_once $pagg
        ?>
      </div>
    <?php endif; ?>
  <?php endif ?>

  <!-- <script src="client/js/flowbite.min.js"></script> -->
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