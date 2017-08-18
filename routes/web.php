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

Route::get('admin/login','LoginController@getLogin');
Route::post('admin/login','LoginController@postLogin');

Route::get('admin','HomeController@getIndex')->where('id','[0-9]+');
Route::get('admin/logout','HomeController@getLogout');

//Route::get('admin/product',['as' => 'getProduct', 'uses' => 'ProductController@getProduct']);
//Route::post('admin/Add','ProductController@postProductAdd');
//Route::post('admin/Update','ProductController@postProductUpdate');
//Route::post('admin/Delete','ProductController@postProductDelete');

Route::get('admin/User','UserController@getUser');
Route::post('admin/createuser','UserController@CreateUser');
Route::post('admin/deleteuser','UserController@DeleteUser');
Route::post('admin/edituser','UserController@EditUser');

Route::get('admin/Server','ServerController@getServer');

Route::post('admin/insertserver','ServerController@postServerInsert');
Route::post('admin/updateserver','ServerController@postServerUpdate');
Route::post('admin/deleteserver','ServerController@postServerDelete');



