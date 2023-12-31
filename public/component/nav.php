<nav class="sticky top-0 font-subHeading z-40 w-full backdrop-blur-sm duration-300 transition-all lg:border-b lg:border-slate-900/10 dark:border-slate-50/[0.06] bg-white/80 dark:bg-slate-900/90">
  <div class="max-w-screen-lg flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="" class="flex items-center justify-center space-x-3">
      <img src="../client/img/sss.gif" class="aspect-square w-7 rounded-full object-cover" alt="">
      <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Ev</span>
    </a>
    <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
      </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul class="font-medium flex flex-col items-center p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-transparent dark:border-gray-700">
        <li>
          <a href="<?= HOME ?>" class="block py-2 pl-3 pr-4 text-gray-900 bg-gray-100 hover:underline hover:underline-offset-2 rounded md:bg-transparent dark:hover:decoration-sky-600 hover:text-blue-700 md:p-0 dark:text-white" aria-current="page">Home</a>
        </li>
        <li>
          <a href="<?= HOME ?>?v=siswa" class="block py-2 pl-3 pr-4 text-gray-900 bg-gray-100 hover:underline hover:underline-offset-2 rounded md:bg-transparent dark:hover:decoration-sky-600 hover:text-blue-700 md:p-0 dark:text-white">Siswa</a>
        </li>
        <li>
          <a href="<?= HOME ?>?v=guru" class="block py-2 pl-3 pr-4 text-gray-900 bg-gray-100 hover:underline hover:underline-offset-2 rounded md:bg-transparent dark:hover:decoration-sky-600 hover:text-blue-700 md:p-0 dark:text-white">Guru</a>
        </li>
        <li>
          <a href="<?= HOME ?>?v=kelas" class="block py-2 pl-3 pr-4 text-gray-900 bg-gray-100 hover:underline hover:underline-offset-2 rounded md:bg-transparent dark:hover:decoration-sky-600 hover:text-blue-700 md:p-0 dark:text-white">Kelas</a>
        </li>
        <li>
          <a href="<?= HOME ?>?v=mapel" class="block py-2 pl-3 pr-4 text-gray-900 bg-gray-100 hover:underline hover:underline-offset-2 rounded md:bg-transparent dark:hover:decoration-sky-600 hover:text-blue-700 md:p-0 dark:text-white">Mata Pelajaran</a>
        </li>
        <li>
          <a href="<?= HOME ?>?v=nilai" class="block py-2 pl-3 pr-4 text-gray-900 bg-gray-100 hover:underline hover:underline-offset-2 rounded md:bg-transparent dark:hover:decoration-sky-600 hover:text-blue-700 md:p-0 dark:text-white">Nilai</a>
        </li>
        <li>
          <a href="<?= HOME ?>?v=user" class="block py-2 pl-3 pr-4 text-gray-900 bg-gray-100 hover:underline hover:underline-offset-2 rounded md:bg-transparent dark:hover:decoration-sky-600 hover:text-blue-700 md:p-0 dark:text-white">User</a>
        </li>
        <li>
          <button id="dropdownNavbarLink" data-dropdown-toggle="animTop" data-dropdown-trigger="" class="inline-flex items-center py-2 pl-3 pr-4 text-gray-900 bg-gray-100 hover:underline hover:underline-offset-2 rounded md:bg-transparent dark:hover:decoration-sky-600 hover:text-blue-700 md:p-0 dark:text-white">Laporan
            <svg class="ml-2 h-2.5 w-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
            </svg></button>
        </li>
        <li>
          <div id="animTop" class="z-50 mt-1 hidden w-full border-y border-gray-200 bg-gray-50 shadow-sm dark:border-transparent dark:bg-gray-800 max-md:!inset-auto max-md:!transform-none md:w-auto md:bg-white md:shadow-2xl">
            <ul class="mx-auto grid gap-1 px-0.5 py-1 text-gray-900 dark:text-white sm:grid-cols-2 md:max-w-screen-2xl md:p-2">
              <li>
                <a href="<?= HOME ?>?v=raport" class="block py-2 pl-3 pr-4 text-gray-900 dark:bg-gray-900 bg-gray-100 dark:hover:bg-gray-950 hover:underline hover:underline-offset-2 rounded md:bg-transparent dark:hover:decoration-sky-600 hover:text-blue-700 md:p-2.5 dark:text-white">
                  <div class="font-semibold text-white">Raport</div>
                </a>
              </li>
              <li>
                <a href="<?= HOME ?>?v=nilai&m=tertinggi" class="block py-2 pl-3 pr-4 text-gray-900 dark:bg-gray-900 bg-gray-100 dark:hover:bg-gray-950 hover:underline hover:underline-offset-2 rounded md:bg-transparent dark:hover:decoration-sky-600 hover:text-blue-700 md:p-2.5 dark:text-white">
                  <div class="font-semibold text-white">Nilai Tertinggi</div>
                </a>
              </li>
              <li>
                <a href="<?= HOME ?>?v=nilai&m=rank" class="block py-2 pl-3 pr-4 text-gray-900 dark:bg-gray-900 bg-gray-100 dark:hover:bg-gray-950 hover:underline hover:underline-offset-2 rounded md:bg-transparent dark:hover:decoration-sky-600 hover:text-blue-700 md:p-2.5 dark:text-white">
                  <div class="font-semibold text-white">Rangking</div>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <?php
        if ($_REQUEST && $_REQUEST['v'] != 'raport' && $_REQUEST['v'] != 'nilai') : ?>
          <li>
            <div class="inline-flex">
              <button type="button" data-dropdown-toggle="language-dropdown-menu" class="inline-flex items-center font-medium space-x-3 px-4 py-3 border border-gray-500 rounded-lg cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                <svg class="w-3 h-3 text-gray-800 dark:text-gray-300/60" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                </svg>
                <svg class="w-3 h-3 ml-2 text-gray-800 dark:text-gray-300/60" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 8">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 5.326 5.7a.909.909 0 0 0 1.348 0L13 1" />
                </svg>
              </button>
              <!-- Dropdown -->
              <?php if (!empty($_REQUEST)) : ?>
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-800" id="language-dropdown-menu">
                  <ul class="py-2 font-medium" role="none">
                    <li>
                      <button data-modal-target="authentication-modal" id="addsiswa" data-modal-toggle="authentication-modal" class="inline-flex items-center capitalize px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 duration-150 dark:hover:text-white" role="menuitem">
                        tambah <?= $_REQUEST['v'] ?>
                      </button>
                    </li>
                  </ul>
                </div>
              <?php else : ?>
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-800" id="language-dropdown-menu">
                  <ul class="py-2 font-medium" role="none">
                    <li>
                      <button data-modal-target="authentication-modal" id="addsiswa" data-modal-toggle="authentication-modal" class="inline-flex items-center capitalize px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 duration-150 dark:hover:text-white" role="menuitem">
                        tambah Siswa
                      </button>
                    </li>
                    <li>
                      <button data-modal-target="authentication-modal" id="addsiswa" data-modal-toggle="authentication-modal" class="inline-flex items-center capitalize px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 duration-150 dark:hover:text-white" role="menuitem">
                        tambah Mapel
                      </button>
                    </li>
                  </ul>
                </div>
              <?php endif; ?>
            </div>
          <li>
          <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>