<?php
Route::get('auth/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('auth/login', 'Auth\LoginController@login');
Route::get('auth/logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes
Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('auth/register', 'Auth\RegisterController@register');

// Password Reset Routes
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/', 'PageController@index');
Route::get('/about', 'PageController@about');
Route::get('/contact', 'PageController@contact');

Route::resource('products', 'ProductController');
Route::resource('costumers', 'CostumerController', ['except' => ['show']]);
Route::resource('orders', 'OrderController', ['except' => ['show']]);

Route::resource('categories', 'CategoryController', ['except' => ['show', 'edit', 'update', 'create']]);
Route::resource('shippers', 'ShipperController', ['except' => ['show', 'edit', 'update', 'create']]);

Route::get('ajax/getProduct/{request}', 'AjaxController@getProduct');
Route::get('ajax/getCostumer/{request}', 'AjaxController@getCostumer');
