<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('piece')->group(function () {
    Route::get('/', 'PieceRechangeController@index');
    Route::post('/store', 'PieceRechangeController@store');
    Route::get('/show/{id}', 'PieceRechangeController@show');
    Route::patch('/update/{id}', 'PieceRechangeController@update');
    Route::delete('/delete/{id}', 'PieceRechangeController@destroy');
 });


