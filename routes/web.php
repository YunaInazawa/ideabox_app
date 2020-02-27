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


Auth::routes();

Route::get('/', 'HomeController@index')                 ->name('home');
Route::get('/report/{id?}', 'ReportController@index')   ->name('report');
Route::get('/mypage', 'MypageController@index')         ->name('mypage');
Route::get('/mypage/{id?}', 'MypageController@del')     ->name('mypage');
Route::get('/edit', 'EditController@index')             ->name('edit');
Route::get('/edit/{id?}', 'EditController@edit')        ->name('edit');
Route::post('/edit', 'EditController@ok')               ->name('ok');
Route::get('/success', 'SuccessController@index')       ->name('success');
