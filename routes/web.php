<?php
Route::GET('', 'Auth\LoginController@showLoginForm')->name('login');
Route::GET('lupa-password', 'UserController@LupaPassword');
Route::POST('lupa-password', 'UserController@PostLupaPassword');
Route::GET('lupa-password/{id}/{token}', 'UserController@GetLupaPassword');
Route::POST('lupa-password/{id}/{token}', 'UserController@postGetLupaPassword');

// User
Route::group(['middleware' => 'User'], function(){
  Route::GET('logout', 'Auth\LoginController@logout')->name('logout');
  Route::GET('home', 'UserController@Dashboard')->name('home');
  Route::GET('edit-profil', 'UserController@EditProfil');
  Route::POST('edit-profil', 'UserController@storeEditProfil');

  Route::group(['middleware' => 'SuperAdmin'], function(){
    // Super Admin
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
    Route::GET('data-jenjang', 'UserController@DataJenjang');
    Route::GET('data-jenjang/tambah', 'UserController@TambahJenjang');
    Route::POST('data-jenjang/tambah', 'UserController@storeTambahJenjang');
    Route::GET('data-jenjang/{id}/edit', 'UserController@EditJenjang');
    Route::POST('data-jenjang/{id}/edit', 'UserController@storeEditJenjang');
    Route::GET('data-jenjang/{id}/hapus', 'UserController@HapusJenjang');

    // Data Status
    Route::GET('data-status-sekolah', 'UserController@DataStatusSekolah');
    Route::GET('data-status-sekolah/tambah', 'UserController@TambahStatusSekolah');
    Route::POST('data-status-sekolah/tambah', 'UserController@storeTambahStatusSekolah');
    Route::GET('data-status-sekolah/{id}/edit', 'UserController@EditStatusSekolah');
    Route::POST('data-status-sekolah/{id}/edit', 'UserController@storeEditStatusSekolah');
    Route::GET('data-status-sekolah/{id}/hapus', 'UserController@HapusStatusSekolah');

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

Route::GET('asd', 'UserController@asd');

// Route::GET('', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::GET('home', 'HomeController@index')->name('home');
