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

Route::get('/', 'App\Http\Controllers\TeamController@index');
Route::post('/count', 'App\Http\Controllers\TeamController@count');
Route::post('/list', 'App\Http\Controllers\TeamController@listPage');
Route::get('/delete', 'App\Http\Controllers\TeamController@deleteItem');
Route::put('/update', 'App\Http\Controllers\TeamController@update');
Route::post('authenticate', 'App\Http\Controllers\UserController@authenticate');
