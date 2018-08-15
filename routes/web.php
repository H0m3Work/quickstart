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

Route::get('/submit', function () {
	return view('submit');
});

Route::post('/submit', function (Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'url' => 'required|url|max:255',
        'description' => 'required|max:255',
    ]);

    $link = tap(new App\Models\Link($data))->save();

    return redirect('/');
});

Route::namespace('Admin')->group(function () {
    Route::get('excel', [
        'uses' => 'LinkController@excelPage'
    ]);

    Route::get('downloadExcel/{type}', [
        'uses' => 'LinkController@downloadExcel'
    ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
