<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

$subDomainPortal = config('app.subdomain_portal');

Route::domain($subDomainPortal)->group(function () {
    Route::namespace('Portal')->group(function () {
        Route::get('/login', 'AuthController@index')->name('login');
        Route::post('/login', 'AuthController@login')->name('auth.post.login');

        Route::middleware(['auth'])->group(function() {
            Route::get('/', 'HomeController@index')->name('dashboard');
            Route::get('/users', 'UserController@index')->name('user.list');
            Route::get('/users/create', 'UserController@create')->name('user.create');
            Route::post('/users/create', 'UserController@store')->name('user.store');
            Route::get('/users/edit', 'UserController@index')->name('user.edit');
            Route::get('/users/{id}/destroy', 'UserController@destroy')->name('user.delete');
        });
    });
});


Route::group(['middleware' => 'locale'], function() {
    Route::namespace('Client')->group(function () {
        Route::get('change-language/{language}', 'HomeController@changeLanguage')->name('user.change-language');
        
        Route::get('/', function() {
            return view("welcome");
        });
    });
});

