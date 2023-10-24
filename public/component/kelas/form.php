<?php
try {
  $connection = connect();

  if ($connection->connect_errno) {
    throw new Exception(
      "Error to connect :" . $connection->connect_error
    );
  }

  $query = "SELECT kode_guru,nama_guru from gurus";

  $datas = $connection->query($query);
  $byk = mysqli_num_rows($datas);

  if (!$datas) {
    throw new Exception("Error to get data");
  }

  $connection->close();
} catch (\Throwable $e) {
  $error = $e->getMessage();
}

?>

<div class="relative w-full max-w-md max-h-full">
  <!-- Modal content -->
  <div class="relative bg-white rounded-lg shadow-2xl dark:bg-gray-700">
    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
      </svg>
      <span class="sr-only">Close modal</span>
    </button>


    <form action="kelas/store.php" method="post" class="relative w-full max-w-md max-h-full">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal" fdprocessedid="sae9pi">
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"></path>
          </svg>
          <span class="sr-only">Close modal</span>
        </button>
        <div class="px-6 py-6 lg:px-8 space-y-4">
          <h3 class="mb-4 text-xl md:text-2xl font-medium text-gray-900 dark:text-white">Tambah kelas</h3>
          <div>
            <label for="id" class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">Id</label>
            <input type="number" name="id" id="id" autofocus value="<?= mt_rand(10000000, 99999999) ?>" class="bg-gray-50 select-all border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="~" required="" fdprocessedid="pybon">
            <p id="helper-text-explanation" class="mt-1 text-sm text-gray-500 dark:text-gray-300 cursor-default select-none">Kode otomatis digenerate dan bisa diedit </p>
          </div>
          <div>
            <label for="nama" class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">nama kelas</label>
            <input type="text" name="nama" id="nama" placeholder="~" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required="" fdprocessedid="ju39cs">
          </div>
          <div>
            <label for="kapasitas" class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">kapasitas kelas</label>
            <input type="number" name="kapasitas" id="kapasitas" placeholder="~" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required="" fdprocessedid="ju39cs">
          </div>
          <div>
            <label for="sel" class="capitalize block mb-2 mt-3 text-sm font-medium text-gray-900 dark:text-white">Guru</label>
            <select id="sel" name="id_guru" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" fdprocessedid="7bq3m7">
              <option value="-1">~</option>
              <?php while ($data = $datas->fetch_object()) : ?>
                <option value="<?= $data->kode_guru ?>"><?= ucfirst(str_replace('.', ' ', $data->nama_guru)) ?></option>
              <?php endwhile; ?>
            </select>
          </div>
        </div>

        <div class="flex items-center pt-6 pb-3 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
          <button data-modal-hide="authentication-modal" type="submit" class="text-white uppercase bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" fdprocessedid="3qf5km">tambah</button>
          <button data-modal-hide="authentication-modal" type="reset" class="text-gray-500 uppercase bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600" fdprocessedid="c5ftij">kembali</button>
        </div>

      </div>
    </form>
  </div>
</div>