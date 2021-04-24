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

Route::get('project/', 'Api\ProjectController@index')->name('products.index');
Route::post('project/', 'Api\ProjectController@store')->name('products.store');
Route::get('project/{id}', 'Api\ProjectController@show')->name('products.show');
Route::put('project/{id}', 'Api\ProjectController@update')->name('products.update');
Route::delete('project/{id}', 'Api\ProjectController@destroy')->name('products.delete');

Route::get('board/', 'Api\BoardController@index')->name('boards.index');
Route::post('board/', 'Api\BoardController@store')->name('boards.store');
Route::get('board/{id}', 'Api\BoardController@show')->name('boards.show');
Route::put('board/{id}', 'Api\BoardController@update')->name('boards.update');
Route::delete('board/{id}', 'Api\BoardController@destroy')->name('boards.delete');

Route::get('checkItem/', 'Api\CheckItemController@index')->name('CheckItems.index');
Route::post('checkItem/', 'Api\CheckItemController@store')->name('CheckItems.store');
Route::get('checkItem/{id}', 'Api\CheckItemController@show')->name('CheckItems.show');
Route::put('checkItem/{id}', 'Api\CheckItemController@update')->name('CheckItems.update');
Route::delete('checkItem/{id}', 'Api\CheckItemController@destroy')->name('CheckItems.delete');

Route::get('ListItem/', 'Api\ListItemController@index')->name('ListItems.index');
Route::post('ListItem/', 'Api\ListItemController@store')->name('ListItems.store');
Route::get('ListItem/{id}', 'Api\ListItemController@show')->name('ListItems.show');
Route::put('ListItem/{id}', 'Api\ListItemController@update')->name('ListItems.update');
Route::delete('ListItem/{id}', 'Api\ListItemController@destroy')->name('ListItems.delete');


Route::get('todo/', 'Api\TodoController@index')->name('todos.index');
Route::post('todo/', 'Api\TodoController@store')->name('todos.store');
Route::get('todo/{id}', 'Api\TodoController@show')->name('todos.show');
Route::put('todo/{id}', 'Api\TodoController@update')->name('todos.update');
Route::delete('todo/{id}', 'Api\TodoController@destroy')->name('todos.delete');