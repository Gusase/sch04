<?php
try {
  $connection = connect();

  if ($connection->connect_errno) {
    throw new Exception(
      "Error to connect :" . $connection->connect_error
    );
  }

  $query = "SELECT s.nis,s.nama_lengkap AS nama_siswa,k.nama AS nama_kelas FROM siswas s INNER JOIN kelas k ON k.id = s.id_kelas ORDER BY s.nama_lengkap";

  $datas = $connection->query($query);
  $byk = mysqli_num_rows($datas);

  if (!$datas) {
    throw new Exception("Error to get data");
  }

  $connection->close();
} catch (\Throwable $e) {
  $errors = $e->getMessage();
}

?>


<section class="container mx-auto bg-white dark:bg-gray-900 mt-14">
  <div class="flex-row items-center justify-between p-4 space-y-3 rounded-ss-lg dark:bg-gray-800 sm:flex sm:space-y-0 sm:space-x-4  shadow-2xl w-full z-20">
    <div>
      <h4 class="mr-3 text-2xl font-semibold dark:text-white font-heading">Raport siswa</h4>
      <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400 font-subHeading"><?= $byk > 0 ? "Menampilkan $byk data raport" : 'Tidak ada data raport'; ?></p>
    </div>
  </div>
  <div class="relative shadow-md sm:rounded-bb-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="px-6 py-3 w-14 text-center">
            nO
          </th>
          <th scope="col" class="px-6 py-3 w-1/12">
            nis
          </th>
          <th scope="col" class="px-6 py-3">
            nama siswa
          </th>
          <th scope="col" class="px-6 py-3">
            kelas
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
            <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap dark:text-white">
              <?= $i ?>
            </th>
            <td class="px-6 py-4">
              <?= $data->nis; ?>
            </td>
            <td class="px-6 py-4">
              <?= Helper::username($data->nama_siswa) ?>
            </td>
            <td class="px-6 py-4">
              <a class="underline underline-offset-2 hover:decoration-2 decoration-gray-500" href="?v=siswa&kelas=<?= is_null($data->nama_kelas) ? 'all' : str_replace(' ', '_', $data->nama_kelas) ?>"><?= $data->nama_kelas ?? null ?></a>
            </td>
            <td class="px-4 py-3 flex items-center justify-end">
              <button data-dropdown-toggle="#<?= $i ?>" class="inline-flex items-center text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-700 p-1.5 dark:hover-bg-gray-800 text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button">
                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                </svg>
              </button>
              <div id="#<?= $i ?>" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-1 text-sm" aria-labelledby="">
                  <li>
                    <a href="?v=raport&i=<?= $data->nis; ?>&m=print" class="text-white capitalize bg-[#404eed] hover:bg-blue-800/95 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium text-sm flex w-full items-center py-2 px-4 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                      <svg class="h-3.5 w-3.5 mr-2 -ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 19">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15h.01M4 12H2a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-3M9.5 1v10.93m4-3.93-4 4-4-4" />
                      </svg>
                      cetak
                    </a>
                  </li>
                  <button type="button" data-modal-target="deleteModal" data-modal-toggle="deleteModal" class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 text-red-500 dark:hover:text-red-400">
                    <svg class="w-4 h-4 mr-2" viewbox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                      <path fill-rule="evenodd" clip-rule="evenodd" fill="currentColor" d="M6.09922 0.300781C5.93212 0.30087 5.76835 0.347476 5.62625 0.435378C5.48414 0.523281 5.36931 0.649009 5.29462 0.798481L4.64302 2.10078H1.59922C1.36052 2.10078 1.13161 2.1956 0.962823 2.36439C0.79404 2.53317 0.699219 2.76209 0.699219 3.00078C0.699219 3.23948 0.79404 3.46839 0.962823 3.63718C1.13161 3.80596 1.36052 3.90078 1.59922 3.90078V12.9008C1.59922 13.3782 1.78886 13.836 2.12643 14.1736C2.46399 14.5111 2.92183 14.7008 3.39922 14.7008H10.5992C11.0766 14.7008 11.5344 14.5111 11.872 14.1736C12.2096 13.836 12.3992 13.3782 12.3992 12.9008V3.90078C12.6379 3.90078 12.8668 3.80596 13.0356 3.63718C13.2044 3.46839 13.2992 3.23948 13.2992 3.00078C13.2992 2.76209 13.2044 2.53317 13.0356 2.36439C12.8668 2.1956 12.6379 2.10078 12.3992 2.10078H9.35542L8.70382 0.798481C8.62913 0.649009 8.5143 0.523281 8.37219 0.435378C8.23009 0.347476 8.06631 0.30087 7.89922 0.300781H6.09922ZM4.29922 5.70078C4.29922 5.46209 4.39404 5.23317 4.56282 5.06439C4.73161 4.8956 4.96052 4.80078 5.19922 4.80078C5.43791 4.80078 5.66683 4.8956 5.83561 5.06439C6.0044 5.23317 6.09922 5.46209 6.09922 5.70078V11.1008C6.09922 11.3395 6.0044 11.5684 5.83561 11.7372C5.66683 11.906 5.43791 12.0008 5.19922 12.0008C4.96052 12.0008 4.73161 11.906 4.56282 11.7372C4.39404 11.5684 4.29922 11.3395 4.29922 11.1008V5.70078ZM8.79922 4.80078C8.56052 4.80078 8.33161 4.8956 8.16282 5.06439C7.99404 5.23317 7.89922 5.46209 7.89922 5.70078V11.1008C7.89922 11.3395 7.99404 11.5684 8.16282 11.7372C8.33161 11.906 8.56052 12.0008 8.79922 12.0008C9.03791 12.0008 9.26683 11.906 9.43561 11.7372C9.6044 11.5684 9.69922 11.3395 9.69922 11.1008V5.70078C9.69922 5.46209 9.6044 5.23317 9.43561 5.06439C9.26683 4.8956 9.03791 4.80078 8.79922 4.80078Z" />
                    </svg>
                    Delete
                  </button>
                  </li>
                </ul>
              </div>
            </td>
          </tr>
        <?php $i++;
        endwhile; ?>
      </tbody>
    </table>
  </div>

</section>