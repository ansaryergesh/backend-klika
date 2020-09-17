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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('singers', 'Api\SingerController@index');
Route::get('singers/{id}', 'Api\SingerController@getSinger');
Route::post('singers', 'Api\SingerController@createSinger');
Route::put('singer/{id}', 'Api\SingerController@updateSinger');
Route::delete('singer/{id}', 'Api\SingerController@deleteSinger');