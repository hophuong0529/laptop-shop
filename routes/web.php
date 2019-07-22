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
Route::get('/','Ccontroller@index');

Route::get('introduce','Ccontroller@introduce');

Route::get('contact','Ccontroller@contact');
Route::post('contact','Ccontroller@postContact');

Route::get('search/{action?}/{id?}','Ccontroller@search');

Route::get('login','Ccontroller@login');
Route::post('login','Ccontroller@postLogin');

Route::get('logout','Ccontroller@logout');

Route::get('register','Ccontroller@register');
Route::post('register','Ccontroller@postRegister');

Route::get('cart/{action?}/{id?}','Ccontroller@cart');
Route::post('cart/{action?}/{id?}','Ccontroller@cart');

Route::get('order','Ccontroller@order');
Route::post('order','Ccontroller@postOrder');

Route::post('updateinfo','Ccontroller@updateInfo');
Route::get('viewInfo','Ccontroller@vInfo');
Route::get('changeInfo','Ccontroller@cInfo');

Route::get('detailProduct/{id}','Ccontroller@showDetail');

Route::get('detailNew/{id}','Ccontroller@showNew');

Route::get('products','Ccontroller@index');

Route::get('news','Ccontroller@news');

Route::prefix('admin')->group(function(){
	Route::get('/','Acontroller@index');
	Route::post('/','Acontroller@postLoginAdmin');
	Route::get('/logout','Acontroller@logout');
	Route::get('/products','Acontroller@index');
	Route::get('/orders','Acontroller@orders');
	Route::get('/members','Acontroller@members');
	Route::get('/news','Acontroller@news');

	Route::get('productEdit/{id}','Acontroller@productEdit');
	Route::post('productEdit/{id}','Acontroller@postProductEdit');
	Route::get('productDelete/{id}','Acontroller@productDelete');
	Route::get('productAdd','Acontroller@productAdd');
	Route::post('productAdd','Acontroller@postProductAdd');

	Route::get('orderEdit/{id}','Acontroller@orderEdit');
	Route::post('orderEdit/{id}','Acontroller@postOrderEdit');
	Route::get('orderDelete/{id}','Acontroller@orderDelete');
	
	Route::get('newEdit/{id}','Acontroller@newEdit');
	Route::post('newEdit/{id}','Acontroller@postNewEdit');
	Route::get('newDelete/{id}','Acontroller@newDelete');
	Route::get('newAdd','Acontroller@newAdd');
	Route::post('newAdd','Acontroller@postNewAdd');
	
	Route::get('memberDelete/{id}','Acontroller@memberDelete');
});
