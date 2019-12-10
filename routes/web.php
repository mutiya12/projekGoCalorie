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

Route::get('/', 'OutletMapController@index');

Auth::routes();



Route::group(['middleware' => ['auth','checkRole:ahli gizi,restoran,admin,customer']], function(){

Route::get('/home', 'HomeController@isRole')->name('home');

Route::get('/artikel-dan-tips','ForumController@index');

Route::get('/artikel-dan-tips/{id}','ForumController@detail');

Route::get('/ahli-gizi','AhliGiziController@index');

});

Route::group(['middleware' => ['auth','checkRole:customer']], function(){

Route::get('/hitung-kalori','KaloriController@index');

Route::post('/cari-rekom','KaloriController@rekom');

});


Route::group(['middleware' => ['auth','checkRole:ahli gizi']], function(){

Route::get('/tinjau-makanan','MenuController@lokasiTinjau');

Route::get('/outlets/{id}/menu','MenuController@menuOnId');

Route::get('/input-komposisi/{id}','MenuController@menuShow');

Route::post('/store-kalori','MenuController@storeKalori');

Route::get('/setting-profil-ahli-gizi','ProfilController@ahliGizi');

Route::post('/edit-profil-ahli','ProfilController@editAhliGizi');

});

Route::group(['middleware' => ['auth','checkRole:restoran']], function(){

Route::get('/outlets','OutletController@index');

Route::get('/menu-makanan','MenuController@index');

Route::get('/buat-menu','MenuController@form');

Route::post('/buat-menu-yang-baru','MenuController@store');

Route::get('/outlets/{id}/edit-menu','MenuController@editMenuResto');

Route::post('/edit-menu-yang-lama','MenuController@updatesNow');

Route::get('/setting-profil-rumah-makan','ProfilController@resto');

Route::post('/edit-profil-resto','ProfilController@editResto');

Route::post('/deleteMenu/{id}','MenuController@delete');


});

Route::group(['middleware' => ['auth','checkRole:admin']], function(){

Route::get('/list-warung','OutletController@indexAdmin');


Route::get('/buat-ahli-gizi','AhliGiziController@form');

Route::get('/edit-artikel-dan-tips/{id}','ForumController@edit');

Route::get('/buat-artikel-tips','ForumController@form');

Route::post('/create-article-now','ForumController@formPost');

Route::post('/update-article-now','ForumController@update');

Route::post('/buat-ahli-gizi-baru','AhliGiziController@create');

Route::get('/delete/{id}','ForumController@delete');



});

/*
 * Outlets Routes
 */
Route::get('/our_outlets', 'OutletMapController@index')->name('outlet_map.index');
Route::resource('outlets', 'OutletController');


Route::post('/verify-now','VerifyController@accThisOutlets');