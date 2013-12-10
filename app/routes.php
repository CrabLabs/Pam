<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
View::share('title', 'Imprenta PAM');

Route::get('/', function()
{
	return View::make('index', [
		'list' => Product::lists('name', 'id'),
		'products' => Product::all()
	]);
});

Route::resource('services', 'ServicesController');

Route::resource('user', 'UserController');

Route::get('register', function()
{
	return Redirect::route('user.create');
});

Route::get('orders', function()
{
	return Redirect::to('order');
});

Route::get('order', 'OrderController@showIndex');

Route::get('order/getDetail', 'OrderController@getDetail');

Route::get('faq', function()
{
	return View::make('faq.index', [
		'faqs' => FAQ::all()
	]);
});

Route::get('about-us', function()
{
	return View::make('about-us.index', [
		
	]);
});

Route::get('products', function()
{
	return View::make('products', [
		'products' => Product::all()
	]);
});

Route::get('we-use-laravel', function()
{
	return View::make('hello');
});
