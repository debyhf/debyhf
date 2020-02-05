<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
 //   return $request->user();
// }); 

Route::middleware(['auth:api'])->group(function(){
//ORTU
Route::get('/ortu','Api\OrtuController@index');
Route::post('/ortu', 'Api\OrtuController@store');
Route::get('/ortu/{id}','Api\OrtuController@show');
Route::post('/ortu/{id}', 'Api\OrtuController@update');
Route::delete('/ortu/{id}', 'Api\OrtuController@destroy');

});

//SISWA
Route::get('/siswa','Api\SiswaCOntroller@index');
Route::post('/siswa', 'Api\SiswaCOntroller@store');
Route::get('/siswa/{id}','Api\SiswaCOntroller@show');
Route::post('/siswa/{id}', 'Api\SiswaCOntroller@update');
Route::delete('/siswa/{id}', 'Api\SiswaCOntroller@destroy');

//GURU
Route::get('/guru','Api\GuruController@index');
Route::post('/guru', 'Api\GuruController@store');
Route::get('/guru/{id}','Api\GuruController@show');
Route::post('/guru/{id}', 'Api\GuruController@update');
Route::delete('/guru/{id}', 'Api\GuruController@destroy');

//MAPEL
Route::get('/mapel','Api\MapelController@index');
Route::post('/mapel', 'Api\MapelController@store');
Route::get('/mapel/{id}','Api\MapelController@show');
Route::post('/mapel/{id}', 'Api\MapelController@update');
Route::delete('/mapel/{id}', 'Api\MapelController@destroy');

//Register
Route::post('/register','Api\AuthController@register');

//Login
Route::post('/login','Api\AuthController@login');