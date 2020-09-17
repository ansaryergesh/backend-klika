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
Route::put('singers/{id}', 'Api\SingerController@updateSinger');
Route::delete('singers/{id}', 'Api\SingerController@deleteSinger');

Route::get('genres', 'Api\GenreController@index');
Route::get('genres/{id}', 'Api\GenreController@getGenre');
Route::post('genres', 'Api\GenreController@createGenre');
Route::put('genres/{id}', 'Api\GenreController@updateGenre');
Route::delete('genres/{id}', 'Api\GenreController@deleteGenre');