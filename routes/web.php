<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@index')->name('home');
Route::post('/logout', [LoginController::class, 'logout']);

// Route::get('/', 'HomeController@index')->name('home');
// Route::get('/berhasil-ganti-kata-sandi', 'Auth\ResetPasswordController@index');
// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/redirects', [HomeController::class, "index"]);

Auth::routes(['verify' => true, 'register' => false, 'reset' => true]);


Route::view('watch-movie', 'movie')->middleware('verified');

Route::group(['middleware' => ['auth', 'level:ADMIN']], function () {
    Route::get('/admin-beranda', 'Admin\BerandaAdminController@index');
    Route::get('/admin-ganti-password', 'Auth\GantiPasswordController@index_admin');
    Route::post('/admin-ganti-password', 'Auth\GantiPasswordController@update_admin');
    // Route::get('/berhasil-ganti-kata-sandi', 'Auth\ResetPasswordController@index');

    Route::get('/admin-unggah-dokumen', 'Admin\UnggahDokumenAdminController@index');
    Route::post('/admin-unggah-dokumen', 'Admin\UnggahDokumenAdminController@store');
    Route::get('/admin-hapus-unggah-dokumen/{id}', 'Admin\UnggahDokumenAdminController@destroy');

    Route::get('/admin-laporan-asesmen', 'Admin\AsesmenDokumenAdminController@index');
    Route::get('/admin-hapus-laporan-asesmen/{id}', 'Admin\AsesmenDokumenAdminController@destroy');

    Route::get('/admin-laporan-perjalanan-visitasi', 'Admin\VisitasiPerjalananAdminController@index');
    Route::get('/admin-hapus-laporan-perjalanan-visitasi/{id}', 'Admin\VisitasiPerjalananAdminController@destroy');

    Route::get('/admin-laporan-penginapan-visitasi', 'Admin\VisitasiPenginapanAdminController@index');
    Route::get('/admin-hapus-laporan-penginapan-visitasi/{id}', 'Admin\VisitasiPenginapanAdminController@destroy');

    Route::get('/admin-laporan-visitasi', 'Admin\VisitasiDokumenAdminController@index');
    Route::get('/admin-hapus-laporan-visitasi/{id}', 'Admin\VisitasiDokumenAdminController@destroy');

    Route::get('/admin-laporan-validasi', 'Admin\ValidasiDokumenAdminController@index');
    Route::get('/admin-hapus-laporan-validasi/{id}', 'Admin\ValidasiDokumenAdminController@destroy');

    // Route::get('/admin-informasi', 'Admin\InformasiAdminController@index');
    // Route::post('/admin-informasi', 'Admin\InformasiAdminController@store');
    // Route::get('/admin-hapus-informasi/{id}', 'Admin\InformasiAdminController@destroy');

    Route::get('/admin-kritik-dan-saran', 'Admin\KritikAdminController@index');
    Route::get('/admin-hapus-kritik-dan-saran/{id}', 'Admin\KritikAdminController@destroy');

    Route::get('/admin-riwayat-kelompok-asesor', 'Admin\KelompokAsesorAdminController@index');
    // Route::get('/admin-tambah-riwayat-kelompok-asesor', 'Admin\KelompokAsesorAdminController@show');
    Route::post('/admin-riwayat-kelompok-asesor', 'Admin\KelompokAsesorAdminController@store');
    Route::get('/admin-hapus-riwayat-kelompok-asesor/{id}', 'Admin\KelompokAsesorAdminController@destroy');

    Route::get('/admin-pengguna', 'Admin\PenggunaAdminController@index');
    Route::get('/admin-tambah-pengguna', 'Admin\PenggunaAdminController@show');
    Route::get('/admin-hapus-pengguna/{id}', 'Admin\PenggunaAdminController@destroy');

    Route::get('/admin-ketersediaan', 'Admin\KetersediaanAsesorAdminController@index');
    Route::post('/admin-ketersediaan', 'Admin\KetersediaanAsesorAdminController@store');
    Route::get('/admin-hapus-ketersediaan/{id}', 'Admin\KetersediaanAsesorAdminController@destroy');

    route::post('/simpanregistrasi', 'Admin\PenggunaAdminController@simpanregistrasi')->name('simpanregistrasi');

    Route::get('/admin-export-pengguna', 'Admin\PenggunaAdminController@userexport')->name('export-pengguna');
    Route::post('/admin-import-pengguna', 'Admin\PenggunaAdminController@userimport')->name('import-pengguna');

    Route::get('/admin-export-kelompok-asesor', 'Admin\KelompokAsesorAdminController@kelompokasesorexport')->name('export-kelompok-asesor');
    Route::post('/admin-import-kelompok-asesor', 'Admin\KelompokAsesorAdminController@kelompokasesorimport')->name('import-kelompok-asesor');

    Route::get('/admin-pengumuman', 'Admin\PengumumanAdminController@index');
    Route::post('/admin-pengumuman', 'Admin\PengumumanAdminController@store')->name('send.email.admin');
    Route::get('/admin-hapus-pengumuman/{id}', 'Admin\PengumumanAdminController@destroy');

    Route::get('/admin-akun', 'Admin\PenggunaAdminController@edit');
    Route::post('/simpan-perubahan-akun-admin', 'Admin\PenggunaAdminController@simpanperubahan')->name('simpan-perubahan-akun-admin');
});

Route::group(['middleware' => ['auth', 'level:ASESOR']], function () {
    Route::get('/asesor-beranda', 'Asesor\BerandaAsesorController@index');
    // Route::get('/dashboard-asesor', 'asesor\NotifikasiAsesorController@index');
    Route::get('/asesor-ganti-password', 'Auth\GantiPasswordController@index_asesor');
    Route::post('/asesor-ganti-password', 'Auth\GantiPasswordController@update_asesor');
    // Route::get('/berhasil-ganti-kata-sandi', 'Auth\ResetPasswordController@index');

    Route::get('/asesor-unduh-dokumen', 'Asesor\UnduhDokumenAsesorController@index');

    Route::get('/asesor-laporan-asesmen', 'Asesor\AsesmenDokumenAsesorController@index');
    Route::post('/asesor-laporan-asesmen', 'Asesor\AsesmenDokumenAsesorController@store');
    Route::get('/asesor-hapus-laporan-asesmen/{id}', 'Asesor\AsesmenDokumenAsesorController@destroy');

    Route::get('/asesor-laporan-perjalanan-visitasi', 'Asesor\VisitasiPerjalananAsesorController@index');
    Route::post('/asesor-laporan-perjalanan-visitasi', 'Asesor\VisitasiPerjalananAsesorController@store');
    Route::get('/asesor-hapus-laporan-perjalanan-visitasi/{id}', 'Asesor\VisitasiPerjalananAsesorController@destroy');

    Route::get('/download-laporan', 'Asesor\VisitasiPerjalananAsesorController@exportPDF');

    Route::get('/asesor-laporan-penginapan-visitasi', 'Asesor\VisitasiPenginapanAsesorController@index');
    Route::post('/asesor-laporan-penginapan-visitasi', 'Asesor\VisitasiPenginapanAsesorController@store');
    Route::get('/asesor-hapus-laporan-penginapan-visitasi/{id}', 'Asesor\VisitasiPenginapanAsesorController@destroy');

    Route::get('/asesor-laporan-visitasi', 'Asesor\VisitasiDokumenAsesorController@index');
    Route::post('/asesor-laporan-visitasi', 'Asesor\VisitasiDokumenAsesorController@store');
    Route::get('/asesor-hapus-laporan-visitasi/{id}', 'Asesor\VisitasiDokumenAsesorController@destroy');

    Route::get('/asesor-laporan-validasi', 'Asesor\ValidasiDokumenAsesorController@index');
    Route::post('/asesor-laporan-validasi', 'Asesor\ValidasiDokumenAsesorController@store');
    Route::get('/asesor-hapus-laporan-validasi/{id}', 'Asesor\ValidasiDokumenAsesorController@destroy');

    // Route::get('/asesor-informasi', 'Asesor\InformasiAsesorController@index');
    // Route::post('/asesor-informasi', 'Asesor\InformasiAsesorController@store');
    // Route::get('/asesor-hapus-informasi/{id}', 'Asesor\InformasiAsesorController@destroy');

    Route::get('/asesor-kritik-dan-saran', 'Asesor\KritikAsesorController@index');
    Route::post('/asesor-kritik-dan-saran', 'Asesor\KritikAsesorController@store');
    Route::get('/asesor-hapus-kritik-dan-saran/{id}', 'Asesor\KritikAsesorController@destroy');

    Route::get('/asesor-ketersediaan', 'Asesor\KetersediaanAsesorController@index');
    Route::post('/asesor-ketersediaan', 'Asesor\KetersediaanAsesorController@store');
    Route::get('/asesor-hapus-ketersediaan/{id}', 'Asesor\KetersediaanAsesorController@destroy');

    Route::get('/asesor-riwayat-kelompok-asesor', 'Asesor\KelompokAsesorController@index');

    Route::get('/asesor-pengumuman', 'Asesor\PengumumanAsesorController@index');
    Route::post('/asesor-pengumuman', 'Asesor\PengumumanAsesorController@store')->name('send.email.asesor');
    Route::get('/asesor-hapus-pengumuman/{id}', 'Asesor\PengumumanAsesorController@destroy');

    Route::get('/asesor-akun', 'Asesor\PenggunaAsesorController@edit');
    Route::post('/simpan-perubahan-akun-asesor', 'Asesor\PenggunaAsesorController@simpanperubahan')->name('simpan-perubahan-akun-asesor');
});

Route::group(['middleware' => ['auth', 'level:SEKOLAH']], function () {
    Route::get('/sekolah-beranda', 'Sekolah\BerandaSekolahController@index');
    // Route::get('/dashboard-sekolah', 'sekolah\NotifikasiSekolahController@index');
    Route::get('/sekolah-ganti-password', 'Auth\GantiPasswordController@index_sekolah');
    Route::post('/sekolah-ganti-password', 'Auth\GantiPasswordController@update_sekolah');
    // Route::get('/berhasil-ganti-kata-sandi', 'Auth\ResetPasswordController@index');

    Route::get('/sekolah-akun', 'Sekolah\PenggunaSekolahController@edit');
    Route::post('/simpan-perubahan-akun-sekolah', 'Sekolah\PenggunaSekolahController@simpanperubahan')->name('simpan-perubahan-akun-sekolah');
});
