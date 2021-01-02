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

/*
Route::get('admin', function () {
    return view('adminlte');
});
*/

Route::get('/test', function() {
    return view('menu.test');
});

Route::get( '/', '\App\Http\Controllers\timeController@index');
Route::post('/', '\App\Http\Controllers\timeController@post'); //メインページからのポスト

//Route::get('/test', [timeController::class, 'index']);

//Route::get('/', 'indexController@index');
