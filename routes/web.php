<?php

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

Route::get('/dashboard', function (App\Service\SheetService $sheetService) {

    $sheets = $sheetService->fetchAll();
    return view('dashboard', [
        'sheets' => $sheets,
    ]);
})->name('dashboard');

Route::get('/task/{sheet}/create', 'TaskController@create');
Route::post('/task/{sheet}/store', 'TaskController@store');
Route::any('/task/show/{task}', 'TaskController@show');
Route::any('/task/trash', 'TaskController@trash');
Route::any('/task/delete', 'TaskController@destroy');

/**
 * Sheet
 */
Route::any('/sheet/{sheet}/{priority}/', 'SheetController@show')->name('tasklist');
Route::get('/sheet/create/', 'SheetController@create');
Route::post('/sheet/store/', 'SheetController@store');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
