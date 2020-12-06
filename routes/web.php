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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@kiddos')->name('home.kiddos');
Route::get('/detail-menu/{slug}', 'HomeController@detailMenu')->name('home.detail');

Route::get('/admin/kategori', 'Admin\KategoriController@index')->name('kategori.index');
Route::post('/admin/kategori/create', 'Admin\KategoriController@store')->name('kategori.store');
Route::get('/admin/kategori/{kategori:slug}', 'Admin\KategoriController@edit')->name('kategori.edit');
Route::patch('/admin/kategori/{kategori:slug}', 'Admin\KategoriController@update')->name('kategori.update');
Route::delete('/admin/kategori/{kategori:slug}/delete', 'Admin\KategoriController@destroy')->name('kategori.delete');

Route::get('/admin/sub-kategori', 'Admin\Sub_kategoriController@index')->name('sub_kategori.index');
Route::get('/admin/sub-kategori/create', 'Admin\Sub_kategoriController@create')->name('sub_kategori.create');
Route::post('/admin/sub-kategori/create', 'Admin\Sub_kategoriController@store')->name('sub_kategori.store');
Route::get('/admin/sub-kategori/{sub_kategori:slug}', 'Admin\Sub_kategoriController@edit')->name('sub_kategori.edit');
Route::patch('/admin/sub-kategori/{sub_kategori:slug}', 'Admin\Sub_kategoriController@update')->name('sub_kategori.update');
Route::delete('/admin/sub-kategori/{sub_kategori:slug}/delete', 'Admin\Sub_kategoriController@destroy')->name('sub_kategori.delete');

Route::get('/admin/menu', 'Admin\MenuController@index')->name('menu.index');
Route::get('/admin/menu/create', 'Admin\MenuController@create')->name('menu.create');
Route::post('/admin/menu/create', 'Admin\MenuController@store')->name('menu.store');
Route::delete('/admin/menu/{menu:slug}', 'Admin\MenuController@destroy')->name('menu.delete');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
