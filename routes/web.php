<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', 'BookController@show');

Route::get('/wishlist', 'BookController@showWishlist');

Route::get('/books/wishlist/{id}', 'BookController@wishlist')->middleware('auth');

Route::post('/books/wishlist/{id}', 'BookController@wishlist')->middleware('auth');

Route::get('/books/leave/{id}', 'BookController@leaveWishlist')->middleware('auth');

Route::delete('/books/leave/{id}', 'BookController@leaveWishlist')->middleware('auth');

Route::get('/admin', 'BookController@admin', 'GenreController@admin')->middleware('auth');;

Route::get('/books/create', 'BookController@create')->middleware('auth');

Route::post('/books/create', 'BookController@store')->middleware('auth');

Route::get('/books/update/{id}', 'BookController@edit')->middleware('auth');

Route::put('/books/update/{id}', 'BookController@update')->middleware('auth');

Route::delete('/books/delete/{id}', 'BookController@destroy')->middleware('auth');

Route::get('/genre/create', 'GenreController@create')->middleware('auth');

Route::post('/genre/create', 'GenreController@store')->middleware('auth');

Route::get('/genre/update/{id}', 'GenreController@edit')->middleware('auth');

Route::put('/genre/update/{id}', 'GenreController@update')->middleware('auth');

Route::delete('/genre/delete/{id}', 'GenreController@destroy')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
