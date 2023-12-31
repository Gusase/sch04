<?php
try {
  $connection = connect();

  if ($connection->connect_errno) {
    throw new Exception(
      "Error to connect :" . $connection->connect_error
    );
  }

  $query = "SELECT k.*,g.nama_guru,COUNT(s.id_kelas) AS kelas_terisi from kelas k LEFT JOIN gurus g ON g.kode_guru = k.kode_guru LEFT JOIN siswas s ON k.id = s.id_kelas GROUP BY k.nama ORDER BY k.nama ASC;";

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

<section class="container mx-auto bg-white dark:bg-gray-900 mt-14 ">
  <div class="flex-row items-center justify-between p-4 space-y-3 rounded-ss-lg dark:bg-gray-800 sm:flex sm:space-y-0 sm:space-x-4">
    <div>
      <h4 class="mr-3 text-2xl font-semibold dark:text-white font-heading">Semua kelas</h4>
      <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400 font-subHeading"><?= $byk > 0 ? "Menampilkan $byk kelas" : 'Tidak ada data kelas'; ?></p>
    </div>
    <button data-modal-target="authentication-modal" id="addsiswa" data-modal-toggle="authentication-modal" class="text-white capitalize bg-[#404eed] hover:bg-blue-800/95 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-2 -ml-1" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
        <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path>
      </svg>
      tambah kelas
    </button>
  </div>
  <div class="relative overflow-x-auto shadow-md sm:rounded-bb-lg">
    <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 sticky">
        <tr>
          <th scope="col" class="px-6 py-3">
            no
          </th>
          <th scope="col" class="px-6 py-3 w-1/5">
            nama
          </th>
          <th scope="col" class="px-6 py-3 w-1/5">
            kapasitas kelas
          </th>
          <th scope="col" class="px-6 py-3 w-1/5">
            jumlah siswa
          </th>
          <th scope="col" class="px-6 py-3 w-full">
            nama guru
          </th>
          <th scope="col" class="px-6 py-3">
            <span class="sr-only">Action</span>
          </th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1;
        while ($data = $datas->fetch_object()) : ?>
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-900 dark:hover:text-white">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              <?= $i ?>
            </th>
            <td class="px-6 py-4">
              <?= $data->nama; ?>
            </td>
            <td class="px-6 py-4">
              <?= $data->kapasitas; ?>
            </td>
            <td class="px-6 py-4">
              <?= $data->kelas_terisi . ' / ' . $data->kapasitas ?>
            </td>
            <td class="px-6 py-4">
              <?= is_null($data->nama_guru) ? '~' : str_replace('.', ' ', ucfirst($data->nama_guru)) ?>
            </td>
            <td class="px-6 py-4 text-right inline-flex">
              <a href="?v=kelas&i=<?= $data->id ?>&m=edit" class="text-white capitalize bg-[#404eed] hover:bg-blue-800/95 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-2 -ml-1" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path>
                </svg>
                edit
              </a>
              <button data-modal-target="modal-#<?= $data->id ?>" data-modal-toggle="modal-#<?= $data->id ?>" class="text-white capitalize bg-[#404eed] hover:bg-blue-800/95 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" type="button">
                Hapus
              </button>
              <!-- Modal toggle -->

              <!-- Main modal -->
              <div id="modal-#<?= $data->id ?>" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md max-h-full">
                  <!-- Modal content -->
                  <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-start text-left justify-between p-4 border-b rounded-t dark:border-gray-600">
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
                        Hapus kelas <b class="capitalize"><?= $data->nama; ?></b> dari database, Anda yakin?
                      </p>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                      <form action="kelas/destroy.php" method="post">
                        <input type="hidden" name="k" value="<?= $data->id; ?>">
                        <button data-modal-hide="modal-#<?= $data->id ?>" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800">Ok</button>
                      </form>
                      <button data-modal-hide="modal-#<?= $data->id ?>" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Batal</button>
                    </div>
                  </div>
                </div>
              </div>

            </td>
          </tr>
        <?php $i++;
        endwhile; ?>
      </tbody>
    </table>
  </div>

</section>