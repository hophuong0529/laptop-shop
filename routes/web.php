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
Route::get('/','CustomerController@index');

Route::get('introduce','CustomerController@introduce');

Route::get('contact','CustomerController@contact');
Route::post('contact','CustomerController@postContact');

Route::get('search/{action?}/{id?}','CustomerController@search');

Route::get('login','CustomerController@login')->middleware('guest');
Route::post('login','CustomerController@postLogin');

Route::get('logout','CustomerController@logout');

Route::get('register','CustomerController@register')->middleware('guest');
Route::post('register','CustomerController@postRegister');

Route::get('cart/{action?}/{id?}','CustomerController@cart');
Route::post('cart/{action?}/{id?}','CustomerController@cart');

Route::get('order','CustomerController@order')->middleware('user');
Route::post('order','CustomerController@postOrder');

Route::post('updateInfo','CustomerController@updateInfo');
Route::get('viewInfo','CustomerController@viewInfo')->middleware('user');;
Route::get('changeInfo','CustomerController@changeInfo')->middleware('user');;

Route::get('detailProduct/{id}','CustomerController@detailProduct');

Route::get('detailNew/{id}','CustomerController@detailNew');

Route::get('news','CustomerController@news');

Route::get('page=2','CustomerController@page2');

Route::prefix('admin')->group(function(){
	Route::get('/','AdminController@index');
	Route::post('/','AdminController@postLoginAdmin');
	Route::get('/logout','AdminController@logout');
	Route::get('/products','AdminController@index')->middleware('admin');
	Route::get('/orders','AdminController@orders')->middleware('admin');
	Route::get('/members','AdminController@members')->middleware('admin');
	Route::get('/news','AdminController@news')->middleware('admin');
	Route::get('/feedbacks','AdminController@feedbacks')->middleware('admin');

	Route::get('productEdit/{id}','AdminController@productEdit');
	Route::post('productEdit/{id}','AdminController@postProductEdit');
	Route::get('productDelete/{id}','AdminController@productDelete');
	Route::get('productAdd','AdminController@productAdd');
	Route::post('productAdd','AdminController@postProductAdd');

	Route::get('orderEdit/{id}','AdminController@orderEdit');
	Route::post('orderEdit/{id}','AdminController@postOrderEdit');
	Route::get('orderDelete/{id}','AdminController@orderDelete');
	
	Route::get('newEdit/{id}','AdminController@newEdit');
	Route::post('newEdit/{id}','AdminController@postNewEdit');
	Route::get('newDelete/{id}','AdminController@newDelete');
	Route::get('newAdd','AdminController@newAdd');
	Route::post('newAdd','AdminController@postNewAdd');
	
	Route::get('memberDelete/{id}','AdminController@memberDelete');
	Route::get('feedbackReply/{id}','AdminController@feedbackReply');
	Route::post('feedbackReply/{id}','AdminController@postFeedbackReply');
	Route::get('feedbackDelete/{id}','AdminController@feedbackDelete');
});
