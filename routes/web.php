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
Auth::routes();

Route::middleware('auth')
    ->namespace('admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::get('/students', 'StudentsController@index')->name('students');
        Route::resource('posts', 'PostController');
        Route::resource('categories', 'CategoryController');
    });


Route::get("{any?}", function(){
    return view("guest.welcome");
})->where("any", ".*");


