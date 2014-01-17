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
View::share('times', array(
	'1600' => '16:00hs',
	'1630' => '16:30hs',
	'1900' => '19:00hs',
));

Route::get('/', function()
{
	return View::make('home.index', [
		'list' => Product::lists('name', 'id'),
		'products' => Product::all()
	]);
});
Route::post('/', 'ContactController@sendContact');

Route::post('upload', function () {
	$rules = array(
		'file' => 'required|mimes:jpeg,bmp,png',
		'location' => 'required',
	);
	$validator = Validator::make(Input::all(), $rules);
	$response = array();
	
	if ($validator->passes()) {
		$location = public_path().'/'.Input::get('location');
		$file = Input::file('file');
		$response['file'] = Str::random(16).'.'.$file->getClientOriginalExtension();
		$file->move($location, $response['file']);
		// $response['status'] = 200;
		$response['success'] = true;
	} else {
		// $response['status'] = 505;
		$response['success'] = false;
		$response['error'] = $validator->messages();
	}
	return Response::json($response);
});

Route::resource('services', 'ServicesController');

Route::resource('works', 'WorksController');

Route::resource('user', 'UserController');

Route::get('register', function()
{
	return Redirect::route('user.create');
});

Route::get('login', function()
{
	return View::make('user.login');
});

Route::post('login', function()
{
	$validator = Validator::make(Input::all(), [
		'email' => 'required|email',
		'password' => 'required'
	]);

	if ($validator->passes()) {
		$data = array(
			'email' => Input::get('email'),
			'password' => Input::get('password'),
		);
		if (Auth::attempt($data, true)) {
			return Redirect::to('/');
		} else {
			return View::make('user.login')->with('incorrect', true);
		}
	} else {
		return View::make('user.login')->withErrors($validator);
	}
});

Route::get('edit', function()
{
	return View::make('user.edit')->with('user', Auth::user());
});

Route::get('logout', function()
{
	Auth::logout();
	return Redirect::to('/');
});

Route::get('orders', function()
{
	return Redirect::to('order');
});

Route::get('order', 'OrderController@showIndex');
Route::post('order', 'OrderController@sendOrder');
Route::get('order/getDetail', 'OrderController@getDetail');

Route::get('budget', ['as' => 'budget', 'uses' => 'BudgetController@showIndex']);
Route::post('budget', 'BudgetController@sendBudget');
Route::get('budget/getDetail', 'BudgetController@getDetail');

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

Route::get('contact', 'ContactController@showContact');
Route::post('contact', 'ContactController@sendContact');

Route::get('we-use-laravel', function()
{
	return View::make('hello');
});
