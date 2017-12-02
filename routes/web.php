<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/password', function()
// {
//   dd(bcrypt('123456'));
// });

// User
Route::group(['middleware' => 'User'], function(){
  Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
  Route::get('/home', 'UserController@Dashboard')->name('home');

  Route::group(['middleware' => 'SuperAdmin'], function(){
    // Super Admin
    Route::get('/data-admin', 'UserController@DataAdmin');
    Route::get('/data-admin/tambah', 'UserController@TambahAdmin');
    Route::POST('/data-admin/tambah', 'UserController@storeTambahAdmin');
    Route::get('/data-admin/{id}/edit', 'UserController@EditAdmin');
    Route::POST('/data-admin/{id}/edit', 'UserController@storeEditAdmin');
    Route::get('/data-admin/{id}/hapus', 'UserController@HapusAdmin');

    // Data Kecamatan
    Route::get('/data-kecamatan', 'UserController@DataKecamatan');
    Route::get('/data-kecamatan/tambah', 'UserController@TambahKecamatan');
    Route::POST('/data-kecamatan/tambah', 'UserController@storeTambahKecamatan');
    Route::get('/data-kecamatan/{id}/edit', 'UserController@EditKecamatan');
    Route::POST('/data-kecamatan/{id}/edit', 'UserController@storeEditKecamatan');
    Route::get('/data-kecamatan/{id}/hapus', 'UserController@HapusKecamatan');

    // Data Kelurahan
    Route::get('/data-kelurahan', 'UserController@DataKelurahan');
    Route::get('/data-kelurahan/tambah', 'UserController@TambahKelurahan');
    Route::POST('/data-kelurahan/tambah', 'UserController@storeTambahKelurahan');
    Route::get('/data-kelurahan/{id}/edit', 'UserController@EditKelurahan');
    Route::POST('/data-kelurahan/{id}/edit', 'UserController@storeEditKelurahan');
    Route::get('/data-kelurahan/{id}/hapus', 'UserController@HapusKelurahan');

    // Data Jenjang
    Route::get('/data-jenjang', 'UserController@DataJenjang');
    Route::get('/data-jenjang/tambah', 'UserController@TambahJenjang');
    Route::POST('/data-jenjang/tambah', 'UserController@storeTambahJenjang');
    Route::get('/data-jenjang/{id}/edit', 'UserController@EditJenjang');
    Route::POST('/data-jenjang/{id}/edit', 'UserController@storeEditJenjang');
    Route::get('/data-jenjang/{id}/hapus', 'UserController@HapusJenjang');

    // Data Status
    Route::get('/data-status-sekolah', 'UserController@DataStatusSekolah');
    Route::get('/data-status-sekolah/tambah', 'UserController@TambahStatusSekolah');
    Route::POST('/data-status-sekolah/tambah', 'UserController@storeTambahStatusSekolah');
    Route::get('/data-status-sekolah/{id}/edit', 'UserController@EditStatusSekolah');
    Route::POST('/data-status-sekolah/{id}/edit', 'UserController@storeEditStatusSekolah');
    Route::get('/data-status-sekolah/{id}/hapus', 'UserController@HapusStatusSekolah');

    // Data Admin Sekolah
    Route::get('/data-admin-sekolah', 'UserController@DataAdminSekolah');
    Route::get('/data-admin-sekolah/tambah', 'UserController@TambahAdminSekolah');
    Route::POST('/data-admin-sekolah/tambah', 'UserController@storeTambahAdminSekolah');
    Route::get('/data-admin-sekolah/{id}/edit', 'UserController@EditAdminSekolah');
    Route::POST('/data-admin-sekolah/{id}/edit', 'UserController@storeEditAdminSekolah');

    // Data Sekolah
    Route::get('/data-sekolah', 'UserController@DataSekolah');
    Route::get('/data-sekolah/tambah', 'UserController@TambahSekolah');
    Route::POST('/data-sekolah/tambah', 'UserController@storeTambahSekolah');
    Route::get('/data-sekolah/{id}/edit', 'UserController@EditSekolah');
    Route::POST('/data-sekolah/{id}/edit', 'UserController@storeEditSekolah');
    Route::get('/data-sekolah/{id}/info', 'UserController@InfoSekolah');
    Route::get('/data-pegawai', 'UserController@DataPegawai');
    Route::get('/data-pegawai/tambah', 'UserController@TambahPegawai');
    Route::POST('/data-pegawai/tambah', 'UserController@storeTambahPegawai');
    Route::get('/data-pegawai/{id}/edit', 'UserController@EditPegawai');
    Route::POST('/data-pegawai/{id}/edit', 'UserController@storeEditPegawai');
    Route::get('/data-pegawai/{id}/info', 'UserController@InfoPegawai');
  });

  // Sekolah Saya
  Route::get('/sekolah-saya', 'UserController@SekolahSaya');
  Route::get('/sekolah-saya/edit', 'UserController@EditSekolahSaya');
  Route::POST('/sekolah-saya/edit', 'UserController@storeEditSekolahSaya');

  // Pegawai Sekolah Saya
  Route::get('/pegawai-sekolah', 'UserController@DataPegawaiSekolah');
  Route::get('/pegawai-sekolah/tambah', 'UserController@TambahPegawaiSekolah');
  Route::POST('/pegawai-sekolah/tambah', 'UserController@storeTambahPegawaiSekolah');
  Route::get('/pegawai-sekolah/{id}/edit', 'UserController@EditPegawaiSekolah');
  Route::POST('/pegawai-sekolah/{id}/edit', 'UserController@storeEditPegawaiSekolah');
  Route::get('/pegawai-sekolah/{id}/info', 'UserController@InfoPegawaiSekolah');


});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
