<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| StockList Routes
|--------------------------------------------------------------------------
*/
Route::get('stocklist', 'App\Http\Controllers\API\StockListController@index');
Route::get('stocklist/{no}', 'App\Http\Controllers\API\StockListController@show');
Route::get('stocklist/{no}/{date}', 'App\Http\Controllers\API\StockListController@show_specified');
Route::post('stocklist', 'App\Http\Controllers\API\StockListController@store');
Route::patch('stocklist/{id}', 'App\Http\Controllers\API\StockListController@update');
Route::delete('stocklist/{id}', 'App\Http\Controllers\API\StockListController@destroy');
/*
|--------------------------------------------------------------------------
| StockInfo Routes
|--------------------------------------------------------------------------
*/
Route::get('stockinfo', 'App\Http\Controllers\API\StockInfoController@index');
Route::get('stockinfo/{no}', 'App\Http\Controllers\API\StockInfoController@show');
Route::get('stockinfo/{no}/{date}', 'App\Http\Controllers\API\StockInfoController@show_specified');
Route::post('stockinfo', 'App\Http\Controllers\API\StockInfoController@store');
Route::patch('stockinfo/{id}', 'App\Http\Controllers\API\StockInfoController@update');
Route::delete('stockinfo/{id}', 'App\Http\Controllers\API\StockInfoController@destroy');