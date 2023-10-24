<?php
$connection = connect();

$id = (isset($_GET['i'])) ? $_GET['i'] : die('Unauthorized');

$query = "SELECT * FROM mapel where mapel.kode_mapel = '$id'";

$datas = $connection->query($query);

$data = $datas->fetch_object();
?>

<div class="py-8 px-4 mx-auto max-w-screen-lg text-left lg:py-16">
  <!-- Modal content -->
  <div class="relative bg-white rounded-lg shadow-2xl dark:bg-gray-700">
    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
      </svg>
      <span class="sr-only">Close modal</span>
    </button>

    <form action="mapel/edit.php" method="post">
      <input type="hidden" name="kode" value="<?= $data->kode_mapel; ?>" readonly>
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <div class="px-6 py-6 lg:px-8 space-y-4">
          <h3 class="mb-4 text-xl md:text-2xl font-medium text-gray-900 dark:text-white">Edit mapel <?= $data->nama_mapel; ?></h3>
          <div class="space-y-3">
            <div>
              <span class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode</span>
              <div class=" bg-gray-50 select-all border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                <span class="select-none"><?= $data->kode_mapel; ?></span>
              </div>
            </div>
            <div>
              <p class="-mt-2 text-sm text-gray-500 dark:text-gray-300 cursor-default select-none">Kode tidak bisa diubah dalam mode ini</p>
            </div>
            <div>
              <label for="nama" class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">nama mapel</label>
              <input type="text" value="<?= $data->nama_mapel; ?>" name="nama" id="nama" placeholder="~" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white select-all" required="">
            </div>
            <div>
              <label for="jam" class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">jam</label>
              <div class="grid grid-cols-2 space-x-3">
                <input type="time" name="jam-awal" id="j" placeholder="~" value="<?= $data->jp ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required="">
              </div>
            </div>

            <div class="flex items-center pt-6 pb-3 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
              <button type="submit" class="text-white uppercase bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">update</button>
              <button type="reset" class="text-gray-500 uppercase bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">kembali</button>
            </div>

          </div>
        </div>
    </form>


  </div>
</div>