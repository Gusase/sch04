<?php
$connection = connect();

$id = (isset($_GET['n'])) ? $_GET['n'] : die('Unauthorized');

$query = "SELECT * FROM gurus where gurus.nama_guru = '$id'";

$datas = $connection->query($query);

$data = $datas->fetch_object();
?>

<div class="py-8 px-4 mx-auto max-w-screen-lg text-left lg:py-16">
  <!-- Modal content -->
  <div class="relative bg-white rounded-lg shadow-2xl dark:bg-gray-700">
    <form action="siswa/edit.php" method="post">
      <input type="hidden" name="kode" value="<?= $data->kode_guru; ?>">
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <div class="px-6 py-6 lg:px-8 space-y-4">
          <h3 class="mb-4 text-xl md:text-2xl font-medium text-gray-900 dark:text-white"><?= $data->nama_guru; ?> Data</h3>
          <div class="space-y-3">
            <div>
              <label class="capitalize block mb-2 mt-3 text-sm font-medium text-gray-900 dark:text-white">kode <?= $data->nama_guru ?></label>
              <!-- <div class="bg-gray-50 select-none border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                <?= $data->kode_guru; ?>
              </div> -->
              <input type="text" name="kode_guru" id="nama" placeholder="~" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" fdprocessedid="ju39cs" value="<?= $data->kode_guru ?>">
            </div>
            <div>
              <label class="capitalize block mb-2 mt-3 text-sm font-medium text-gray-900 dark:text-white">nama</label>
              <input type="text" name="nama" id="nama" placeholder="~" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" fdprocessedid="ju39cs" value="<?= $data->nama_guru ?>">
              <!-- <div class="bg-gray-50 select-none border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                <?= $data->nama_guru; ?>
              </div> -->
            </div>
            <div>
              <label for="pendidikan" class="capitalize block mb-2 mt-3 text-sm font-medium text-gray-900 dark:text-white">pendidikan</label>
              <input type="text" name="pendidikan" id="pendidikan" placeholder="~" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" fdprocessedid="ju39cs" value="<?= $data->pendidikan ?>">
            </div>
            <div>
              <label for="prodi" class="capitalize block mb-2 mt-3 text-sm font-medium text-gray-900 dark:text-white">prodi</label>
              <input type="text" name="prodi" id="prodi" placeholder="~" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" fdprocessedid="ju39cs" value="<?= $data->prodi ?>">
            </div>

            <div class="flex items-center pt-6 pb-3 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
              <button type="submit" class="text-white uppercase bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">update</button>
              <button type="reset" class="text-gray-500 uppercase bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">kembali</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>