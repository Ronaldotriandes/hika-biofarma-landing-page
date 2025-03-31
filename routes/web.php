<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', 'BeritaController@index')->name('landing-age');
Route::post('/login', 'AuthController@authenticate')->name('login');
Route::get('/logout', 'AuthController@logout')->name('logout');

Route::get('/berita/{kategori}/{slug}', 'BeritaController@getDetailBerita')->name('getDetailBerita');

Route::get('/profile', 'LandingController@profile')->name('profile');
Route::get('/pengurus-hika', 'LandingController@pengurusHika')->name('pengurus-hika');
Route::get('/form-registrasi', 'LandingController@formregistrasi')->name('form-registrasi');
