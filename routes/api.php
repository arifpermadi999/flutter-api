<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//App/Http/Controllers/API

Route::get('pelaporan', 'PelaporanController@index');
Route::post('pelaporan/store', 'PelaporanController@store');
Route::post('pelaporan/update', 'PelaporanController@update');
Route::post('pelaporan/show', 'PelaporanController@show');
Route::get('pelaporan/delete/{id}', 'PelaporanController@destroy');
