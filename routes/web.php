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

Route::get('/','FamilyController@showList' );

Route::post('/save','FamilyController@save')->name('save');
Route::put('/put/{$id}','FamilyController@update')->name('update');
Route::delete('/delete/{$id}','FamilyController@delete_member')->name('delete');
Route::get('/member/{$id}','FamilyController@show')->name('show');
