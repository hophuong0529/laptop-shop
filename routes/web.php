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
Route::get('/','Ccontroller@search');

Route::get('search/{type?}/{id?}','Ccontroller@search');

Route::get('login', function () {
    return view('login');
});

Route::post('login','Ccontroller@postLogin');

Route::get('logout','Ccontroller@logOut');