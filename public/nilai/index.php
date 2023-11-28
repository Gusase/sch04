<?php
require_once __DIR__ . '/../../utils/Helper.php';

try {
  $connection = connect();

  if ($connection->connect_errno) {
    throw new Exception(
      "Error to connect :" . $connection->connect_error
    );
  }

  if (isset($_POST['inMapel']) && isset($_POST['goAdv'])) {
    $nis = $_POST['inSiswa'];
    $mpl = $_POST['inMapel'];

    if ($_POST['inSiswa'] == 'x' || $_POST['inMapel'] == 'x') {
      throw new Exception("Harap masukkan data");
    }

    $qr = "SELECT * FROM nilai WHERE nis_siswa = '$nis' AND kd_mapel = '$mpl'";

    $row = $connection->query($qr);

    if ($row->num_rows > 0) {
      throw new Exception("nis_siswa = '$nis' dan kd_mapel = '$mpl' sudah ada.");
    } else {
      $query = "INSERT INTO nilai(kd_mapel, nis_siswa) VALUES ('$mpl', '$nis')";
      // var_dump($query);
      // die;
      $datas = $connection->query($query);
    }
  }

  $query = "SELECT * from siswas
            JOIN nilai on nilai.nis_siswa = siswas.nis
            JOIN mapel ON mapel.kode_mapel = nilai.kd_mapel
            JOIN kelas ON kelas.id=siswas.id_kelas";

  if (isset($_POST['go']) && $_POST['mapel'] != 'x') {
    $selected = $_POST['mapel'];
    $query .= " WHERE nilai.kd_mapel = '$selected'";
  } else {
    $query .= " ORDER BY siswas.nama_lengkap ASC";
  }

  var_dump($query);
  // die;
  $datas = $connection->query($query);
  $byk = (mysqli_num_rows($datas) > 0) ? 'Menampilkan ' . mysqli_num_rows($datas) . ' nilai' : 'Tidak ada data';

  if (!$datas) {
    throw new Exception("Error to get data");
  }

  // if (!$connection->affected_rows > 0) {
  //   throw new Exception("Error Processing Request");
  // }

  $connection->close();
} catch (\Exception $e) {
  $errors[] = $e->getMessage();
}

?>

<section class="container -mt-6 mx-auto bg-white dark:bg-gray-900 mb-14 relative z-10">
  <div class="flex-row items-center justify-between p-4 space-y-3 rounded-ss-lg dark:bg-gray-800 sm:flex sm:space-y-0 sm:space-x-4 shadow-2xl w-full">
    <div>
      <h4 class="mr-3 text-2xl font-semibold dark:text-white font-heading leading-tight">Semua data</h4>
      <p class="mt-1 text-sm font-normal font-subHeading text-gray-500 dark:text-gray-400"><?= $byk ?? "Silahkan <span class=\"underline hover:no-underline cursor-pointer\" onclick=\"window.location.href = 'http://ev.final.test/?v=nilai'\">Refresh</span>" ?></p>
    </div>
    <div class="flex items-center justify-between pb-4">

      <!-- FILTER  -->
      <button id="dropdownToggleButton" data-dropdown-toggle="dropFilter" class="mr-2 inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
        <svg class="h-3.5 w-3.5 mr-2 -ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m2.133 2.6 5.856 6.9L8 14l4 3 .011-7.5 5.856-6.9a1 1 0 0 0-.804-1.6H2.937a1 1 0 0 0-.804 1.6Z" />
        </svg>
        Filter
      </button>

      <!-- FILTER LANJUTAN -->
      <div>
        <button id="dropdownRadioButton" data-dropdown-toggle="dropAdvance" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
          <svg class="w-3 h-3  mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.75 4H19M7.75 4a2.25 2.25 0 0 1-4.5 0m4.5 0a2.25 2.25 0 0 0-4.5 0M1 4h2.25m13.5 6H19m-2.25 0a2.25 2.25 0 0 1-4.5 0m4.5 0a2.25 2.25 0 0 0-4.5 0M1 10h11.25m-4.5 6H19M7.75 16a2.25 2.25 0 0 1-4.5 0m4.5 0a2.25 2.25 0 0 0-4.5 0M1 16h2.25" />
          </svg>
          Advance Filter
        </button>
      </div>
    </div>

    <!-- Dropdown filter siswa maoel -->
    <div id="dropAdvance" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-72 dark:bg-gray-700 dark:divide-gray-600">
      <form action="http://ev.final.test/?v=nilai" method="post">
        <ul class="p-3 space-y-3 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownToggleButton">
          <li>
            <label for="siswa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih siswa</label>
            <select id="siswa" name="inSiswa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              <option value="x">Siswa...</option>
              <?php
              $datasMapel = Helper::get('siswas', ['kolom' => ['nama_lengkap', 'nis']]);

              foreach ($datasMapel as $data) :
                // if ($selected === $data['nis']) :
              ?>
                <option value="<?= $data['nis'] ?>"><?= Helper::username($data['nama_lengkap']) ?></option>
              <?php endforeach; ?>
            </select>
          </li>
          <li>
            <label for="mapel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih mapel</label>
            <select id="mapel" name="inMapel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              <option value="x">Pelajaran...</option>
              <?php
              $datasMapel = Helper::get('mapel');

              foreach ($datasMapel as $data) :
                // if ($selected === $data['kode_mapel']) :
              ?>
                <option value="<?= $data['kode_mapel'] ?>"><?= ucfirst($data['nama_mapel']) ?></option>
              <?php endforeach; ?>
            </select>
          </li>
        </ul>
        <hr class="h-px bg-gray-200 border-0 dark:bg-gray-600">
        <div class="p-3">
          <button type="submit" name="goAdv" class="text-white capitalize bg-[#404eed] block w-full hover:bg-blue-800/95 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
        </div>
      </form>
    </div>

    <!-- dropdown filter -->
    <div id="dropFilter" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-72 dark:bg-gray-700 dark:divide-gray-600">
      <form action="http://ev.final.test/?v=nilai" method="post">
        <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownToggleButton">
          <li>
            <label for="mapel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih mapel</label>
            <select id="mapel" name="mapel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              <option value="x">Pelajaran...</option>
              <?php
              $datasMapel = Helper::get('mapel');

              foreach ($datasMapel as $data) :
                if ($selected === $data['kode_mapel']) :
              ?>
                  <option selected value="<?= $data['kode_mapel'] ?>"><?= ucfirst($data['nama_mapel']) ?></option>
                <?php else : ?>
                  <option value="<?= $data['kode_mapel'] ?>"><?= ucfirst($data['nama_mapel']) ?></option>
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
          <th scope="col" class="px-6 py-3">
            nO
          </th>
          <th scope="col" class="px-6 py-3">
            kode siswa
          </th>
          <th scope="col" class="px-6 py-3">
            nama siswa
          </th>
          <th scope="col" class="px-6 py-3">
            Kelas
          </th>
          <th scope="col" class="px-6 py-3">
            nama mapel
          </th>
          <th scope="col" class="px-6 py-3">
            kehadiran
          </th>
          <th scope="col" class="px-6 py-3">
            tugas
          <th scope="col" class="px-6 py-3">
            formatif
          </th>
          <th scope="col" class="px-6 py-3">
            uts
          </th>
          <th scope="col" class="px-6 py-3">
            uas
          </th>
          <th scope="col" class="px-6 py-3">
            nilai akhir
          </th>
          <th scope="col" class="px-6 py-3">
            grade
          </th>
          <th scope="col" class="px-6 py-3">
            <span class="sr-only">Action</span>
          </th>
        </tr>
      </thead>
      <?php if (isset($datas)) : ?>
        <tbody>
          <?php $i = 1;
          while ($data = $datas->fetch_object()) : ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-900 dark:hover:text-white">
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <?= $i ?>
              </th>
              <td class="px-6 py-4">
                <?= $data->nis_siswa; ?>
              </td>
              <td class="px-6 py-4">
                <?= Helper::username($data->nama_lengkap) ?>
              </td>
              <td class="px-6 py-4">
                <a class="underline underline-offset-2 hover:decoration-2 decoration-gray-500" href="?v=siswa&kelas=<?= is_null($data->nama) ? 'all' : str_replace(' ', '_', $data->nama) ?>"><?= $data->nama ?? null ?></a>
              </td>
              <td class="px-6 py-4">
                <?= $data->nama_mapel; ?>
              </td>
              <td class="px-6 py-4">
                <?= $data->kehadiran ?? '-'; ?>
              </td>
              <td class="px-6 py-4">
                <?= $data->tugas ?? '-'; ?>
              </td>
              <td class="px-6 py-4">
                <?= $data->formatif ?? '-'; ?>
              </td>
              <td class="px-6 py-4">
                <?= $data->uts ?? '-'; ?>
              </td>
              <td class="px-6 py-4">
                <?= $data->uas ?? '-'; ?>
              </td>
              <td class="px-6 py-4">
                <?= $data->nilai_akhir ?? '-'; ?>
              </td>
              <td class="px-6 py-4">
                <?= $data->grade ?? '-'; ?>
              </td>
              <td class="px-6 py-4 text-right inline-flex">
                <a href="?v=nilai&i=<?= $data->nis_siswa; ?>&m=edit&r=<?= $data->kd_nilai ?>" class="text-white capitalize bg-[#404eed] hover:bg-blue-800/95 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-2 -ml-1" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path>
                  </svg>
                  edit
                </a>
                <form action="nilai/destroy.php" method="post">
                  <input type="hidden" name="k" value="<?= $data->kd_nilai; ?>">
                  <button type="submit" onclick="return confirm('Hapus <?= Helper::username($data->nama_lengkap) ?>')" class="text-white capitalize bg-[#404eed] hover:bg-blue-800/95 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                    <svg class="h-3.5 w-3.5 mr-2 -ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                    </svg>
                    Hapus
                  </button>
                </form>
              </td>
            </tr>
          <?php $i++;
          endwhile; ?>
        </tbody>
      <?php endif; ?>
    </table>
  </div>

</section>