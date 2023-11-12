<?php
try {
  $connection = connect();

  if ($connection->connect_errno) {
    throw new Exception(
      "Error to connect :" . $connection->connect_error
    );
  }

  $query = "SELECT * FROM gurus ORDER BY nama_guru asc";

  $datas = $connection->query($query);

  if (!$datas) {
    throw new Exception("Error to get data");
  }

  $connection->close();
} catch (\Throwable $e) {
  $error = $e->getMessage();
}


?>

<section class="bg-white dark:bg-gray-900 mt-14">
  <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 text-center">
    <div class="bg-gradient-to-b dark:from-gray-800 to-transparent dark:border-gray-700 rounded-t-lg p-8 md:py-14 mb-7">
      <h1 class="text-gray-900 dark:text-white text-3xl md:text-5xl font-heading font-extrabold mb-2">halaman guru</h1>
      <p class="text-lg font-normal text-gray-500 mb-2 font-subHeading"><?= ($datas->num_rows == 0) ? 'Tidak ada data guru' : 'semua guru yg kedaftar.' ?></p>

      <div class="inline-flex rounded-md mt-5 shadow-sm" role="group">
        <button type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-500 dark:focus:text-white">
          <svg class="w-3 h-3 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10">
            <path d="M9.207 1A2 2 0 0 0 6.38 1L.793 6.586A2 2 0 0 0 2.207 10H13.38a2 2 0 0 0 1.414-3.414L9.207 1Z" />
          </svg>
          ASC
        </button>
        <button type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-r-md hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-500 dark:focus:text-white">
          <svg class="w-3 h-3 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10">
            <path d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z" />
          </svg> DESC
        </button>
      </div>

    </div>
  </div>

  <div class="container -mt-7 mx-auto px-8 min-h-screen">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <?php while ($data = $datas->fetch_object()) : ?>
        <div class="w-full mx-auto bg-white shadow-lg dark:shadow-xl ring-1 ring-black/5 rounded-xl flex items-center space-x-3 dark:bg-slate-800/80 hover:bg-gray-50 dark:hover:bg-slate-800/60 duration-150">
          <div class="flex items-center space-x-3 max-w-full grow ml-3">
            <img class="w-16 h-16 rounded-full shadow-lg" src="https://placehold.co/300x300/000000/FFFFFF.webp?text=<?= mb_strtoupper(mb_substr($data->nama_guru, 0, 1, "UTF-8")) ?>" alt="<?= $data->nama_guru; ?>">
            <div class="min-w-0 py-5 pl-2">
              <a href="/guru/guru.php?n=<?= $data->nama_guru ?>&id=<?= $data->kode_guru ?>" class="text-slate-900 font-subHeading font-medium cursor-pointer hover:underline hover:underline-offset-2 text-sm sm:text-lg truncate dark:text-slate-200"><?= str_replace('.', ' ', ucfirst($data->nama_guru)) ?></a>
              <div class="text-slate-500 font-medium text-sm sm:text-base leading-tight truncate dark:text-slate-400 font-txt"><?= $data->pendidikan ?></div>
            </div>
          </div>
          <div style="margin-right: 1.5rem !important">
            <button id="dropdownButton" data-dropdown-toggle="<?= $data->kode_guru ?>" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
              <span class="sr-only">Open dropdown</span>
              <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
              </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="<?= $data->kode_guru; ?>" class="z-40 hidden absolute text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
              <ul class="py-2" aria-labelledby="dropdownButton">
                <li>
                  <a href="?v=guru&n=<?= strtolower(urlencode($data->nama_guru)) ?>&m=edit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                </li>
                <li>
                  <button data-modal-target="hpaus-#<?= $data->kode_guru ?>" data-modal-toggle="hpaus-#<?= $data->kode_guru ?>" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white" type="button">
                    Hapus
                  </button>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!-- Main modal -->
        <div id="hpaus-#<?= $data->kode_guru ?>" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
          <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                  Peringatan
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                  </svg>
                  <span class="sr-only">Close modal</span>
                </button>
              </div>
              <!-- Modal body -->
              <div class="p-6 text-left">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-300">
                  Guru <b class="capitalize"><?= str_replace('.', ' ', ucfirst($data->nama_guru)) ?></b> bakal adios, Anda yakin?
                </p>
              </div>
              <!-- Modal footer -->
              <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <form action="guru/destroy.php" method="post">
                  <input type="hidden" name="nama" value="<?= $data->nama_guru; ?>">
                  <button type="submit" class="inline-block w-full px-4 py-2 text-sm text-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 text-left dark:border dark:border-red-500 bg-red-500 hover:bg-red-600 dark:text-white rounded-lg">Delete</button>
                </form>
                <button data-modal-hide="hpaus-#<?= $data->kode_guru ?>" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Batal</button>
              </div>
            </div>
          </div>
        </div>

      <?php endwhile; ?>
    </div>
  </div>
</section>