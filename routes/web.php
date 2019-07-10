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
Route::get('/{action?}','Ccontroller@index');

Route::get('search/{action?}/{id?}','Ccontroller@search');

Route::get('login', function () {
    return view('login');
});

Route::post('login','Ccontroller@postLogin');

Route::get('register', function () {
    return view('register');
});

Route::post('register','Ccontroller@postRegister');

Route::get('cart/{action?}/{id?}', 'Ccontroller@cart');

Route::post('cart/{action?}/{id?}', 'Ccontroller@cart');

Route::post('order','Ccontroller@postOrder');

Route::post('updateinfo','Ccontroller@updateInfo');

Route::get('viewInfo', function () {
    return view('viewInfo');
});

Route::get('changeInfo', function () {
    return view('changeInfo');
});

Route::get('detailProduct/{id}','Ccontroller@showDetail');