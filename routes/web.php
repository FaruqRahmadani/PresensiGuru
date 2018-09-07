<?php
Route::GET('', 'Auth\LoginController@showLoginForm')->name('loginForm');
Route::POST('', 'Auth\LoginController@Login')->name('login');
Route::GET('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => 'lupa-password', 'as' => 'lupaPassword'], function () {
  Route::GET('', 'Auth\LupaPasswordController@Form')->name('Form');
  Route::POST('', 'Auth\LupaPasswordController@FormSubmit')->name('FormSubmit');
  Route::GET('{id}/{token}', 'Auth\LupaPasswordController@ResetForm')->name('ResetForm');
  Route::POST('{id}/{token}', 'Auth\LupaPasswordController@ResetFormSubmit')->name('ResetFormSubmit');
});

Route::group(['middleware' => 'User'], function(){
  Route::GET('home', 'UserController@Dashboard')->name('home');
  Route::GET('edit-profil', 'UserController@EditProfil');
  Route::POST('edit-profil', 'UserController@storeEditProfil');

  Route::group(['middleware' => 'SuperAdmin'], function(){
    Route::group(['prefix' => 'admin', 'as' => 'admin'], function () {
      Route::GET('', 'AdminController@Data')->name('Data');
      Route::GET('tambah', 'AdminController@Tambah')->name('Tambah');
      Route::POST('tambah', 'AdminController@storeTambah')->name('TambahSubmit');
      Route::GET('{id}/edit', 'AdminController@Edit')->name('Edit');
      Route::POST('{id}/edit', 'AdminController@storeEdit')->name('EditSubmit');
      Route::GET('{id}/hapus', 'AdminController@Hapus')->name('Hapus');
    });

    // Data Kecamatan
    Route::GET('data-kecamatan', 'UserController@DataKecamatan');
    Route::GET('data-kecamatan/tambah', 'UserController@TambahKecamatan');
    Route::POST('data-kecamatan/tambah', 'UserController@storeTambahKecamatan');
    Route::GET('data-kecamatan/{id}/edit', 'UserController@EditKecamatan');
    Route::POST('data-kecamatan/{id}/edit', 'UserController@storeEditKecamatan');
    Route::GET('data-kecamatan/{id}/hapus', 'UserController@HapusKecamatan');

    // Data Kelurahan
    Route::GET('data-kelurahan', 'UserController@DataKelurahan');
    Route::GET('data-kelurahan/tambah', 'UserController@TambahKelurahan');
    Route::POST('data-kelurahan/tambah', 'UserController@storeTambahKelurahan');
    Route::GET('data-kelurahan/{id}/edit', 'UserController@EditKelurahan');
    Route::POST('data-kelurahan/{id}/edit', 'UserController@storeEditKelurahan');
    Route::GET('data-kelurahan/{id}/hapus', 'UserController@HapusKelurahan');

    // Data Jenjang
    Route::group(['prefix' => 'jenjang', 'as' => 'jenjang'], function () {
      Route::GET('', 'JenjangController@Data')->name('Data');
      Route::GET('tambah', 'JenjangController@Tambah')->name('Tambah');
      Route::POST('tambah', 'JenjangController@storeTambah')->name('TambahSubmit');
      Route::GET('{id}/edit', 'JenjangController@Edit')->name('Edit');
      Route::POST('{id}/edit', 'JenjangController@storeEdit')->name('EditSubmit');
      Route::GET('{id}/hapus', 'JenjangController@Hapus')->name('Hapus');
    });

    // Data Status
    Route::group(['prefix' => 'status-sekolah', 'as' => 'statusSekolah'], function () {
      Route::GET('', 'StatusSekolahController@Data')->name('Data');
      Route::GET('tambah', 'StatusSekolahController@Tambah')->name('Tambah');
      Route::POST('tambah', 'StatusSekolahController@storeTambah')->name('TambahSubmit');
      Route::GET('{id}/edit', 'StatusSekolahController@Edit')->name('Edit');
      Route::POST('{id}/edit', 'StatusSekolahController@storeEdit')->name('EditSubmit');
      Route::GET('{id}/hapus', 'StatusSekolahController@Hapus')->name('Hapus');
    });

    // Data Admin Sekolah
    Route::GET('data-admin-sekolah', 'UserController@DataAdminSekolah');
    Route::GET('data-admin-sekolah/tambah', 'UserController@TambahAdminSekolah');
    Route::POST('data-admin-sekolah/tambah', 'UserController@storeTambahAdminSekolah');
    Route::GET('data-admin-sekolah/{id}/edit', 'UserController@EditAdminSekolah');
    Route::POST('data-admin-sekolah/{id}/edit', 'UserController@storeEditAdminSekolah');
    Route::GET('data-admin-sekolah/{id}/hapus', 'UserController@HapusAdminSekolah');

    // Data Sekolah
    Route::GET('data-sekolah', 'UserController@DataSekolah');
    Route::GET('data-sekolah/tambah', 'UserController@TambahSekolah');
    Route::POST('data-sekolah/tambah', 'UserController@storeTambahSekolah');
    Route::GET('data-sekolah/{id}/edit', 'UserController@EditSekolah');
    Route::POST('data-sekolah/{id}/edit', 'UserController@storeEditSekolah');
    Route::GET('data-sekolah/{id}/info', 'UserController@InfoSekolah');
    Route::GET('data-pegawai', 'UserController@DataPegawai');
    Route::GET('data-pegawai/tambah', 'UserController@TambahPegawai');
    Route::POST('data-pegawai/tambah', 'UserController@storeTambahPegawai');
    Route::GET('data-pegawai/{id}/edit', 'UserController@EditPegawai');
    Route::POST('data-pegawai/{id}/edit', 'UserController@storeEditPegawai');
    Route::GET('data-pegawai/{id}/info', 'UserController@InfoPegawai');

    // Presensi
    Route::GET('data-presensi', 'UserController@DataPresensi');
    Route::POST('data-presensi', 'UserController@PostDataPresensi');

    // Kategori Presensi
    Route::GET('data-kategori-presensi', 'UserController@DataKategoriPresensi');
    Route::GET('data-kategori-presensi/tambah', 'UserController@TambahKategoriPresensi');
    Route::POST('data-kategori-presensi/tambah', 'UserController@storeTambahKategoriPresensi');
    Route::GET('data-kategori-presensi/{id}/edit', 'UserController@EditKategoriPresensi');
    Route::POST('data-kategori-presensi/{id}/edit', 'UserController@storeEditKategoriPresensi');

  });

  Route::group(['middleware' => 'Admin'], function(){
    // Sekolah Saya
    Route::GET('sekolah-saya', 'UserController@SekolahSaya');
    Route::GET('sekolah-saya/edit', 'UserController@EditSekolahSaya');
    Route::POST('sekolah-saya/edit', 'UserController@storeEditSekolahSaya');

    // Pegawai Sekolah Saya
    Route::GET('pegawai-sekolah', 'UserController@DataPegawaiSekolah');
    Route::GET('pegawai-sekolah/tambah', 'UserController@TambahPegawaiSekolah');
    Route::POST('pegawai-sekolah/tambah', 'UserController@storeTambahPegawaiSekolah');
    Route::GET('pegawai-sekolah/{id}/edit', 'UserController@EditPegawaiSekolah');
    Route::POST('pegawai-sekolah/{id}/edit', 'UserController@storeEditPegawaiSekolah');
    Route::GET('pegawai-sekolah/{id}/info', 'UserController@InfoPegawaiSekolah');

    // Presensi
    Route::GET('input-presensi-sekolah', 'UserController@InputPresensiSekolah');
    Route::POST('input-presensi-sekolah', 'UserController@PostInputPresensiSekolah');
    Route::POST('input-presensi-sekolah/submit', 'UserController@StorePostInputPresensiSekolah');
    Route::GET('data-presensi-sekolah', 'UserController@DataPresensiSekolah');
    Route::GET('data-presensi-sekolah/{idSekolah}/{tanggal}', 'UserController@DetailDataPresensiSekolah');

    // Pengaturan
    Route::GET('pengaturan-jam-kerja', 'UserController@DataJamKerja');
    Route::GET('pengaturan-jam-kerja/tambah', 'UserController@TambahDataJamKerja');
    Route::POST('pengaturan-jam-kerja/tambah', 'UserController@storeTambahDataJamKerja');
    Route::GET('pengaturan-jam-kerja/{id}/edit', 'UserController@EditDataJamKerja');
    Route::POST('pengaturan-jam-kerja/{id}/edit', 'UserController@storeEditDataJamKerja');

    // Laporan
    Route::GET('laporan-rekap-presensi', 'UserController@LaporanRekapPresensi');
    Route::POST('laporan-rekap-presensi', 'UserController@LaporanRekapPresensiFilter');
    Route::GET('laporan-rekap-presensi/{periode}/cetak', 'UserController@PrintLaporanRekapPresensi');

  });

  // JSON !!!!!!!!
  Route::GET('json/kecamatan/{id}/kelurahan.json', 'UserController@JsonKelurahan');
  Route::GET('json/infosekolah/{id}/sekolah.json', 'UserController@JsonSekolah');
  Route::GET('json/infopegawai/{id}/pegawai.json', 'UserController@JsonPegawai');
  Route::GET('json/infoabsen/{tanggal}/{idSekolah}/absensi.json', 'UserController@JsonAbsensi');
});
