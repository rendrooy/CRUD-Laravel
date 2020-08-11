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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('halo', function() {
//     return 'Halo, Selamat Belajar Laravel!';
// });

// Route::get('halaman-rahasia', function() {
//     return 'Anda sedang melihat <strong>Halaman Rahasia.</strong>';
// })->name('secret');


// Route::get('halaman-rahasia', ['as' => 'secret', function() {
//     return 'Anda sedang melihat <strong>Halaman Rahasia.</strong>';
// }]);

// Route::get('showme-secret', function() {
//     return redirect()->route('secret');
// });


// Route::get('/', function () {
//     return view('pages.homepage');
// });

// Route::get('about', function() {
//     $halaman = 'about';
//     return view('pages.about', compact('halaman'));
// });

// Route::get('siswa', function() {
//     $halaman = 'siswa';
//     $siswa = ['Rasmus Lerdorf',
//         'Taylor Otwell',
//         'Brendan Eich',
//         'John Resig'
//     ];
//     return view('siswa.index', compact('halaman', 'siswa'));
// });

// Route::get('halaman-rahasia', [
//     'as' => 'secret',
//     'uses' => 'RahasiaController@halamanRahasia'
// ]);

// NAMED ROUTE
// Route::get('halaman-rahasia', 'RahasiaController@halamanRahasia')->name('secret');
// Route::get('showme-secret', 'RahasiaController@showMeSecret');

Route::get('/', 'PagesController@homepage');
Route::get('about', 'PagesController@about');
Auth::routes(['register' => true]);
Route::get('obat/cari', 'ObatController@cari');
Route::resource('obat', 'ObatController');
Route::resource('jenis', 'JenisController')->parameters([
    'jenis' => 'jenis'
]);
Route::resource('perusahaan', 'PerusahaanController');
Route::resource('user', 'UserController');
Route::post('/obat/store', 'ObatController@store');