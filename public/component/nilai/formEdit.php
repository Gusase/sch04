<?php
$id = (isset($_GET['i'])) ? $_GET['i'] : die('Unauthorized');

$connection = connect();

$query = "SELECT * FROM nilai n JOIN siswas s ON s.nis = n.nis_siswa JOIN kelas k ON k.id = s.id_kelas WHERE n.nis_siswa = '$id'";


$datas = $connection->query($query);

$data = $datas->fetch_object();

if (is_null($data)) {
  $errors[] = "Data dengan nis {$_GET['i']} tidak ditemukan";
}
?>

<form class="mx-auto mt-16 max-w-5xl sm:mt-20" action="nilai/store.php" method="post">
  <div class=" mx-auto w-full">
    <div class="mt-2 w-full">
      <div class="mb-3">
        <div class="relative z-0 w-full mb-6 group">
          <input type="text" name="nama" id="nama" disabled value="<?= $data->nama_lengkap ?? null ?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="nama" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama</label>
        </div>
      </div>
      <div class="mb-3">
        <div class="relative z-0 w-full mb-6 group">
          <input type="text" name="kelas" id="kelas" disabled value="<?= $data->kelas ?? null ?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="kelas" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Kelas</label>
        </div>
      </div>
      <div class="mb-3">
        <div class="relative z-0 w-full mb-6 group">
          <input type="number" name="hadir" id="floating_hadir" value="<?= $data->kehadiran ?? null ?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_hadir" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Jumlah kehadiran</label>
        </div>
      </div>
      <div class="mb-3">
        <div class="relative z-0 w-full mb-6 group">
          <input type="number" name="tugas" value="<?= $data->tugas ?? null ?>" id="floating_tsg" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_tsg" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nilai tugas</label>
        </div>
      </div>
      <div class="mb-3">
        <div class="relative z-0 w-full mb-6 group">
          <input type="number" name="formatif" value="<?= $data->formatif ?? null ?>" id="floating_for" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_for" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nilai formatif</label>
        </div>
      </div>
      <div class="mb-3">
        <div class="relative z-0 w-full mb-6 group">
          <input type="number" name="uts" value="<?= $data->uts ?? null ?>" id="floating_uts" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_uts" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nilai uts</label>
        </div>
      </div>
      <div class="mb-3">
        <div class="relative z-0 w-full mb-6 group">
          <input type="number" name="uas" value="<?= $data->uas ?? null ?>" id="floating_uas" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_uas" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nilai uas</label>
        </div>
      </div>
    </div>
    <div class="mt-5">
      <input type="submit" value="Kirim" class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
    </div>
    <input type="hidden" name="nis" value="<?= $id ?>">
  </div>
</form>