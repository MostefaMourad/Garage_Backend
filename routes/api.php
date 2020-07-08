<?php

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

Route::prefix('vehicule')->group(function () {
    Route::get('/', 'VehiculeController@index');
    Route::post('/store', 'VehiculeController@store');
    Route::get('/show/{id}', 'VehiculeController@show');
    Route::get('/searchMatricule/{immatriculation}', 'VehiculeController@search_immatriculation');
    Route::get('/searchMarque/{marque}', 'VehiculeController@search_marque');
    Route::patch('/update/{id}', 'VehiculeController@update');
    Route::delete('/delete/{id}', 'VehiculeController@destroy');
    Route::patch('/etat/{id}', 'VehiculeController@update');
 });

Route::prefix('conducteur')->group(function () {
    Route::get('/', 'ConducteurController@index');
    Route::post('/store', 'ConducteurController@store');
    Route::get('/show/{id}', 'ConducteurController@show');
    Route::patch('/update/{id}', 'ConducteurController@update');
    Route::delete('/delete/{id}', 'ConducteurController@destroy');
 });

Route::prefix('planning')->group(function () {
    Route::get('/','PlanningController@index');
    Route::post('/store', 'PlanningController@store');
    Route::get('/show/{id}', 'PlanningController@show');
    Route::patch('/update/{id}', 'PlanningController@update');
    Route::delete('/delete/{id}', 'PlanningController@destroy');
 });

Route::prefix('maintenance')->group(function () {
    Route::get('/','MaintenanceController@index');
    Route::post('/store', 'MaintenanceController@store');
    Route::get('/show/{id}', 'MaintenanceController@show');
    Route::get('/searchMatricule/{immatriculation}', 'MaintenanceController@search_immatriculation');
    Route::patch('/update/{id}', 'MaintenanceController@update');
    Route::delete('/delete/{id}', 'MaintenanceController@destroy');
 });