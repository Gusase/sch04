<?php
session_start();

if (!isset($_SESSION['error'])) {
  header('Location: ../');
  exit;
}
?>

<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../css/style.css" rel="stylesheet">
  <title>Tidak ditemukan</title>
</head>

<body class="antialiased">
  <section class="bg-[#404eed] relative isolate max-w-full pt-32 pb-36">
    <div class="container min-h-0 uppercase mx-auto">
      <div class="min-h-[80px] text-center max-w-[1480px]">
        <h1 class="text-4xl sm:text-6xl font-extrabold text-white tracking-tight mt-3">Siswa <?php echo (isset($_SESSION['error'])) ? $_SESSION['error'] : ''; ?> tidak ada</h1>
        <div class="max-w-xl capitalize mx-auto my-5 sm:mt-7 text-base text-gray-50">Tidak ada detail lebih lanjut.</div>
        <a href="../" class="rounded-md inline-block bg-white hover:bg-gray-100 focus:outline-none focus:ring-gray-200 focus:ring-2 px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-400">
          kembali
        </a>
      </div>
    </div>
    <div class="absolute opacity-[0.4] blur-3xl inset-0 -z-10 bg-[url(https://play.tailwindcss.com/img/beams.jpg)] bg-center [mask-image:linear-gradient(180deg,white,rgba(255,255,255,0))]"></div>
  </section>

  <?php unset($_SESSION['error']); ?>

  <script src="js/flowbite.min.js"></script>
</body>

</html>