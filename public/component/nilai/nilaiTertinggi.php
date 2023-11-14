<?php
try {
  $connection = connect();

  if ($connection->connect_errno) {
    throw new Exception(
      "Error to connect :" . $connection->connect_error
    );
  }

  $criteria = '';
  $isFilter = false;

  if (isset($_POST['kelas']) && $_POST['kelas'] != 'x') {
    $filKelas = $_POST['kelas'];
    $criteria .= " s.id_kelas='$filKelas'";
    $isFilter = true;
  }

  if (isset($_POST['mapel']) && $_POST['mapel'] != 'x') {
    $filMapel = $_POST['mapel'];
    $criteria .= ($isFilter ? " AND " : "") . "n.kd_mapel='$filMapel'";
    $isFilter = true;
  }

  if ($isFilter) $criteria = " WHERE $criteria";

  $queryAll = "SELECT s.nis, s.nama_lengkap, k.nama AS kelas, m.nama_mapel, n.uts AS  max_uts, n.uas AS max_uas, ((n.uas + n.uts)/2) AS max_nilai_akhir 
              FROM nilai n
              JOIN siswas s ON n.nis_siswa = s.nis
              JOIN mapel m ON n.kd_mapel = m.kode_mapel
              JOIN kelas k ON s.id_kelas = k.id
              $criteria
              GROUP BY s.nis,s.nama_lengkap,m.nama_mapel
              ORDER BY max_nilai_akhir DESC";

  // var_dump($queryAll);
  // die;

  $datas = $connection->query($queryAll);
  // die;
  // $datas = $connection->query($query);
  $byk = (mysqli_num_rows($datas) > 0) ? 'Menampilkan ' . mysqli_num_rows($datas) . ' nilai' : 'Tidak ada data';

  if (!$datas) {
    throw new Exception("Error to get data");
  }

  $connection->close();
} catch (\Exception $e) {
  $errors[] = $e->getMessage();
}

?>

<section class="container -mt-6 mx-auto bg-white dark:bg-gray-900 mb-14 relative z-10">
  <div class="flex-row items-center justify-between p-4 space-y-3 rounded-ss-lg dark:bg-gray-800 sm:flex sm:space-y-0 sm:space-x-4 sticky top-20 shadow-2xl w-full">
    <div>
      <h4 class="mr-3 text-2xl font-semibold dark:text-white font-heading leading-tight">Semua nilai tertinggi</h4>
      <p class="mt-1 text-sm font-normal font-subHeading text-gray-500 dark:text-gray-400"><?= $byk ?? "Silahkan <span class=\"underline hover:no-underline cursor-pointer\" onclick=\"window.location.href = '<?= HOME ?>?v=nilai&m=tertinggi'\">Refresh</span>" ?></p>
    </div>
    <div class="flex items-center justify-between pb-4">

      <!-- FILTER  -->
      <button id="dropdownToggleButton" data-dropdown-toggle="dropFilter" class="mr-2 inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
        <svg class="h-3.5 w-3.5 mr-2 -ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m2.133 2.6 5.856 6.9L8 14l4 3 .011-7.5 5.856-6.9a1 1 0 0 0-.804-1.6H2.937a1 1 0 0 0-.804 1.6Z" />
        </svg>
        Filter Kelas
      </button>
    </div>

    <!-- Dropdown filter maoel -->
    <div id="dropFilter" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-72 dark:bg-gray-700 dark:divide-gray-600">
      <form action="<?= HOME ?>?v=nilai&m=tertinggi" method="post">
        <ul class="p-3 space-y-3 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownToggleButton">
          <li>
            <label for="mapel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mata pelajaran</label>
            <select id="mapel" name="mapel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              <option value="x">Mapel...</option>
              <?php
              $datasMapel = Helper::get('mapel', ['kolom' => ['nama_mapel', 'kode_mapel']]);

              foreach ($datasMapel as $data) :
                if ($selected === $data['kode_mapel']) :
              ?>
                  <option selected value="<?= $data['kode_mapel'] ?>"><?= ucfirst($data['nama_mapel']) ?> <small class="dark:text-gray-400">(<?= $data['kode_mapel'] ?></small>)</option>
                <?php else : ?>
                  <option value="<?= $data['kode_mapel'] ?>"><?= ucfirst($data['nama_mapel']) ?> <small class="dark:text-gray-400">(<?= $data['kode_mapel'] ?></small>)</option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
          </li>
          <li>
            <label for="kelas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
            <select id="kelas" name="kelas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              <option value="x">Kelas...</option>
              <?php
              $datasMapel = Helper::get('kelas', ['kolom' => ['nama', 'id']]);

              foreach ($datasMapel as $data) :
                if ($selected === $data['id']) :
              ?>
                  <option selected value="<?= $data['id'] ?>"><?= ucfirst($data['nama']) ?> <small class="dark:text-gray-400">(<?= $data['id'] ?>)</small></option>
                <?php else : ?>
                  <option value="<?= $data['id'] ?>"><?= ucfirst($data['nama']) ?> <small class="dark:text-gray-400">(<?= $data['id'] ?>)</small></option>
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
          <th scope="col" class="px-6 py-3">
            mata pelajaran
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
                <?= $data->kelas ?? '-' ?>
              </td>
              <td class="px-6 py-4">
                <?= $data->nama_mapel; ?>
              </td>
              <td class="px-6 py-4 text-center">
                <?= number_format($data->max_nilai_akhir) ?? '-'; ?>
              </td>
            </tr>
          <?php $i++;
          endwhile; ?>
        </tbody>
      <?php endif; ?>
    </table>
  </div>

</section>