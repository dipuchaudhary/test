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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'PagesController@index' );

Route::get('/about','PagesController@about');

Route::get('/service','PagesController@services');

Route::resource('posts','PostsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//form handling

Route::get('/form','FormController@index')->name('form');

Route::post('/form/store','FormController@store')->name('form.store');

Route::delete('/form/{id}/delete','FormController@destroy')->name('form.destroy');

Route::get('/form/{id}/edit','FormController@edit')->name('form.edit');

Route::get('/menu', 'MenuController@index')->name('menu');

Route::post('/menu/store','MenuController@store')->name('menu.store');

Route::get('/signup','AuthController@register')->name('signUp');

Route::get('/signin','AuthController@login')->name('signIn');

Route::post('/signup','AuthController@postRegister')->name('post-signUp');

Route::post('/signin','AuthController@postLogin')->name('post-signIn');

Route::get('/dashboard','dashboardController@index')->name('dashboard');

Route::get('/signout','AuthController@signOut')->name('signOut');
