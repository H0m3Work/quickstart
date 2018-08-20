<?php

use Illuminate\Http\Request;
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

Route::get('/', function () {
    $links = \App\Models\Link::all();

    return view('welcome', ['links' => $links]);
});

Route::namespace('Admin')->group(function () {
    Route::get('links', [
        'uses' => 'LinkController@index',
        'as' => 'links'
    ]);

    Route::get('excel', [
        'uses' => 'LinkController@excel',
        'as' => 'links.excel'
    ]);

    Route::get('links/download', [
        'uses' => 'LinkController@download',
        'as' => 'links.download'
    ]);

    Route::get('links/import', [
        'uses' => 'LinkController@import',
        'as' => 'links.import'
    ]);

    Route::get('links/create', [
    'uses' => 'LinkController@create',
    'as' => 'links.create'
    ]);

    Route::post('links/store', [
        'uses' => 'LinkController@store',
        'as' => 'links.store'
    ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
