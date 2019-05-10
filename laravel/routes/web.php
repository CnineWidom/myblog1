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

Route::get('/', function () {
    return view('welcome');
});

Route::get('test','loginController@index')->name('test');

Route::post('dologin','loginController@dologin');
Route::get('dologin','loginController@dologin')->name('dologin');

Route::get('upload/doupload','uploadController@doupload')->name('doupload');
Route::post('upload/doupload','uploadController@doupload');

Route::post('upload/download','uploadController@download');
//Route::group(['prefix'=>'upload','middleware'=>'doupload'],function (){
//    Route::get('/doupload','loginController@dologin');
//});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
