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

Route::get('/','FrontendController@index')->name('front');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function (){
    Route::get('/login', 'Auth\AdminLoginController@showLoginform')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});
Route::group(['middleware' => ['auth:admin']], function() {
    Route::prefix('admin')->group(function() {

        Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');

        //general settings
        Route::get('/general-setting', 'Admin\AdminController@general_settings')->name('general.settings');
        Route::post('/general-setting-save', 'Admin\AdminController@general_settings_save')->name('admin.general.setting.save');

        //album
        Route::get('/albums', 'Admin\AdminMusicController@almub')->name('admin.album');
        Route::post('/albums-save', 'Admin\AdminMusicController@album_save')->name('admin.create.album');
        Route::post('/albums-update', 'Admin\AdminMusicController@album_update')->name('admin.update.album');
        Route::post('/albums-delete', 'Admin\AdminMusicController@album_delete')->name('admin.delete.album');

        //artist
        Route::get('/artist', 'Admin\AdminMusicController@artist')->name('admin.artist');
        Route::post('/artist-save', 'Admin\AdminMusicController@artist_save')->name('admin.create.artist');
        Route::post('/artist-update', 'Admin\AdminMusicController@artist_update')->name('admin.update.artist');
        Route::post('/artist-delete', 'Admin\AdminMusicController@artist_delete')->name('admin.delete.artist');

        //genres
        Route::get('/genres', 'Admin\AdminMusicController@genres')->name('admin.genres');
        Route::post('/genres-save', 'Admin\AdminMusicController@genres_save')->name('admin.create.genres');
        Route::post('/genres-update', 'Admin\AdminMusicController@genres_update')->name('admin.update.genres');
        Route::post('/genres-delete', 'Admin\AdminMusicController@genres_delete')->name('admin.delete.genres');


        //genres
        Route::get('/songs-language', 'Admin\AdminMusicController@songs_language')->name('admin.song.language');
        Route::post('/songs-language-save', 'Admin\AdminMusicController@songs_language_save')->name('admin.create.songs.language');
        Route::post('/songs-language-update', 'Admin\AdminMusicController@songs_language_update')->name('admin.update.songs.language');
        Route::post('/songs-language-delete', 'Admin\AdminMusicController@songs_language_delete')->name('admin.delete.songs.language');




        //songs
        Route::get('/songs', 'Admin\AdminMusicController@songs')->name('admin.songs');
        Route::post('/songs-save', 'Admin\AdminMusicController@songs_save')->name('admin.create.song');
        Route::post('/songs-update', 'Admin\AdminMusicController@songs_update')->name('admin.update.song');
        Route::post('/songs-delete', 'Admin\AdminMusicController@songs_delete')->name('admin.delete.song');
    });
});
