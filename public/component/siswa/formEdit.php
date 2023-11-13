<?php
require_once __DIR__ . '/../../../utils/Helper.php';

$id = (isset($_GET['n'])) ? $_GET['n'] : die('Unauthorized');

$connection = connect();

$query = "SELECT * FROM siswas where siswas.nama_lengkap = '$id'";

$datas = $connection->query($query);

$data = $datas->fetch_object();
$selected = $data->jurusan;
$selectedA = $data->agama;
?>

<div class="py-8 px-4 mx-auto max-w-screen-lg text-left lg:py-16">
  <!-- Modal content -->
  <div class="relative bg-white rounded-lg shadow-2xl dark:bg-gray-700">
    <form action="siswa/edit.php" method="post">
      <input type="hidden" name="kode" value="<?= $data->nis; ?>">
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <div class="px-6 py-6 lg:px-8 space-y-4">
          <h3 class="mb-4 text-xl md:text-2xl font-medium text-gray-900 dark:text-white"><?= str_replace('.', ' ', ucfirst($data->nama_lengkap)) ?> Data</h3>
          <div class="space-y-3">
            <div>
              <label class="capitalize block mb-2 mt-3 text-sm font-medium text-gray-900 dark:text-white">nis</label>
              <input type="text" name="nis" id="nama" placeholder="~" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" fdprocessedid="ju39cs" value="<?= $data->nis ?>">
            </div>
            <div>
              <label class="capitalize block mb-2 mt-3 text-sm font-medium text-gray-900 dark:text-white">nama</label>
              <input type="text" name="nama" id="nama" placeholder="~" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" fdprocessedid="ju39cs" value="<?= $data->nama_lengkap ?>">
            </div>
            <div>
              <label for="nama" class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">tanggal lahir</label>
              <input type="date" value="<?= $data->tgl_lahir; ?>" name="tanggal" id="nama" placeholder="~" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white select-all" required="">
            </div>
            <div>
              <label for="nomor" class="capitalize block mb-2 mt-3 text-sm font-medium text-gray-900 dark:text-white">nomor telepon</label>
              <input type="text" name="nomor" id="nomor" placeholder="~" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" fdprocessedid="ndtfi" value="<?= $data->telp ?>">
            </div>
            <div>
              <h4 class="mb-4 md:mb-2  mt-3 capitalize text-sm font-medium text-gray-900 dark:text-white">jenis kelamin</h4>
              <ul class="grid w-full gap-4 md:grid-cols-2">
                <li>
                  <input type="radio" id="laki" name="gender" value="l" class="hidden peer" <?= ($data->jk == 'l') ? 'checked' : null; ?>>
                  <label for="laki" class="capitalize inline-flex justify-center items-center w-full p-3 md:p-4 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-600 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-600">
                    <div class="block">
                      <div class="w-full text-base">Laki-laki</div>
                    </div>
                  </label>
                </li>
                <li>
                  <input type="radio" id="perem" name="gender" value="p" class="hidden peer" <?= ($data->jk == 'p') ? 'checked' : null; ?>>
                  <label for="perem" class="capitalize inline-flex justify-center items-center w-full p-3 md:p-4 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-600">
                    <div class="block">
                      <div class="w-full text-base">Perempuan</div>
                    </div>
                  </label>
                </li>
              </ul>
            </div>
            <div>
              <label for="alamat" class="capitalize block mb-2 mt-3 text-sm font-medium text-gray-900 dark:text-white">alamat</label>
              <textarea id="alamat" rows="4" name="alamat" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Alamat lengkap..."><?= $data->alamat ?></textarea>
            </div>
            <div>
              <label for="sel" class="capitalize block mb-2 mt-3 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
              <select id="sel" name="agama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" fdprocessedid="7bq3m7">
                <option value="-1">~</option>
                <!--semua agama -->
                <?php
                $datasMapel = Helper::get('siswas', ['kolom' => 'agama', 'operator' => 'DISTINCT']);

                foreach ($datasMapel as $data) :
                  if ($selectedA === $data['agama']) :
                ?>
                    <option selected value="<?= $data['agama'] ?>"><?= ucfirst($data['agama']) ?></option>
                  <?php else : ?>
                    <option value="<?= $data['agama'] ?>"><?= ucfirst($data['agama']) ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
            </div>
            <div>
              <label for="jurs" class="capitalize block mb-2 mt-3 text-sm font-medium text-gray-900 dark:text-white">Jurusan</label>
              <select id="jurs" name="jurusan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" fdprocessedid="yngzd">
                <option value="-1">~</option>
                <!-- semua jursan -->
                <?php
                $datasMapel = Helper::get('siswas', ['kolom' => 'jurusan', 'operator' => 'DISTINCT']);

                foreach ($datasMapel as $data) :
                  if ($selected === $data['jurusan']) :
                ?>
                    <option selected value="<?= $data['jurusan'] ?>"><?= ucfirst($data['jurusan']) ?></option>
                  <?php else : ?>
                    <option value="<?= $data['jurusan'] ?>"><?= ucfirst($data['jurusan']) ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="flex items-center pt-6 pb-3 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
              <button type="submit" class="text-white uppercase bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">update</button>
              <button type="reset" onclick="window.location.href='https://ev.final.test/?v=siswa'" class="text-gray-500 uppercase bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">kembali</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>