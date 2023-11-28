<?php
try {
  $connection = connect();

  if ($connection->connect_errno) {
    throw new Exception(
      "Error to connect :" . $connection->connect_error
    );
  }

  $query = "SELECT s.nama_lengkap , s.nis, k.nama AS nama_kelas, k.id AS id_kelas, AVG(n.nilai_akhir) AS total 
              FROM siswas s 
              JOIN kelas k ON k.id=s.id_kelas
              JOIN nilai n ON n.nis_siswa=s.nis 
              GROUP BY s.nama_lengkap, k.nama 
              ORDER BY total DESC";


  if (isset($_POST['limit']) && $_POST['limit'] != 'x') {
    $limit = $_POST['limit'];
    $query .= " LIMIT $limit";
  }

  $datas = $connection->query($query);
  $byk = (mysqli_num_rows($datas) > 0) ? 'Menampilkan ' . mysqli_num_rows($datas) . ' data' : 'Tidak ada data';

  if (!$datas) {
    throw new Exception("Error to get data");
  }

  $connection->close();
} catch (\Exception $e) {
  $errors[] = $e->getMessage();
}

?>

<section class="container -mt-6 mx-auto bg-white dark:bg-gray-900 mb-14 relative z-10">
  <div class="flex-row items-center justify-between p-4 space-y-3 rounded-ss-lg dark:bg-gray-800 sm:flex sm:space-y-0 sm:space-x-4 shadow-2xl w-full">
    <div>
      <h4 class="mr-3 text-2xl font-semibold dark:text-white font-heading leading-tight">Semua rank siswa</h4>
      <p class="mt-1 text-sm font-normal font-subHeading text-gray-500 dark:text-gray-400"><?= $byk ?? "Silahkan <span class=\"underline hover:no-underline cursor-pointer\" onclick=\"window.location.href = 'https://ev.final.test/?v=nilai&m=rank'\">Refresh</span>" ?></p>
    </div>
    <div class="flex items-center justify-between pb-4">

      <!-- FILTER  -->
      <button id="dropdownToggleButton" data-dropdown-toggle="dropFilter" class="mr-2 inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
        <svg class="h-3.5 w-3.5 mr-2 -ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m2.133 2.6 5.856 6.9L8 14l4 3 .011-7.5 5.856-6.9a1 1 0 0 0-.804-1.6H2.937a1 1 0 0 0-.804 1.6Z" />
        </svg>
        Filter
      </button>
    </div>

    <!-- Dropdown filter maoel -->
    <div id="dropFilter" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-72 dark:bg-gray-700 dark:divide-gray-600">
      <form action="<?= HOME ?>?v=nilai&m=rank" method="post">
        <ul class="p-3 space-y-3 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownToggleButton">
          <li>
            <label for="limit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Limit Row</label>
            <select id="limit" name="limit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              <option value="x">Limit...</option>
              <?php
              $limit = [1, 3, 5, 10, 15, 20];

              foreach ($limit as $index) :
                if ($limitless === $index) :
              ?>
                  <option selected value="<?= $index ?>">Top <?= $index ?></option>
                <?php else : ?>
                  <option value="<?= $index ?>">Top <?= $index ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
          </li>
        </ul>
        <hr class="h-px bg-gray-200 border-0 dark:bg-gray-600">
        <div class="p-3">
          <button type="submit" name="go" class="text-white capitalize bg-[#404eed] block w-full hover:bg-blue-800/95 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
        </div>
      </form>
    </div>
  </div>

  <div class="overflow-x-auto shadow-md sm:rounded-bb-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="px-6 py-3 w-9 text-center">
            nO
          </th>
          <th scope="col" class="px-6 py-3 w-16">
            nis
          </th>
          <th scope="col" class="px-6 py-3">
            nama siswa
          </th>
          <th scope="col" class="px-6 py-3">
            kelas
          </th>
          <th scope="col" class="px-6 py-3 w-16">
            ID kelas
          </th>
          <th scope="col" class="px-6 py-3 w-40 text-center">
            total nilai
          </th>
        </tr>
      </thead>
      <?php if (isset($datas)) : ?>
        <tbody>
          <?php $i = 1;
          while ($data = $datas->fetch_object()) : ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-900 dark:hover:text-white">
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                <?= $i ?>
              </th>
              <td class="px-6 py-4">
                <?= $data->nis; ?>
              </td>
              <td class="px-6 py-4">
                <?= Helper::username($data->nama_lengkap) ?>
              </td>
              <td class="px-6 py-4">
                <a class="underline underline-offset-2 hover:decoration-2 decoration-gray-500" href="?v=siswa&kelas=<?= is_null($data->nama_kelas) ? 'all' : str_replace(' ', '_', $data->nama_kelas) ?>"><?= $data->nama_kelas ?? null ?></a>
              </td>
              <td class="px-6 py-4">
                <?= $data->id_kelas; ?>
              </td>
              <td class="px-6 py-4 text-center">
                <?= is_null($data->total) ?  '-' : number_format($data->total, 2); ?>
              </td>
            </tr>
          <?php $i++;
          endwhile; ?>
        </tbody>
      <?php endif; ?>
    </table>
  </div>

</section>