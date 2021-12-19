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
        Route::post('/logout', 'AuthController@logout')->name('auth.post.logout');

        Route::middleware(['auth'])->group(function() {
            Route::get('/', 'HomeController@index')->name('dashboard');
            // user
            Route::get('/users', 'UserController@index')->name('user.list');
            Route::get('/users/create', 'UserController@create')->name('user.create');
            Route::post('/users/create', 'UserController@store')->name('user.store');
            Route::get('/users/{id}/destroy', 'UserController@destroy')->name('user.delete');
            Route::get('/users/profile', 'UserController@profile')->name('user.profile');
            Route::post('/users/update', 'UserController@update')->name('user.profile.update');

            //department
            Route::get('/departments', 'DepartmentController@index')->name('department.list');
            Route::post('/departments', 'DepartmentController@store')->name('department.store');
            Route::get('/departments/{id}/destroy', 'DepartmentController@destroy')->name('department.delete');

            Route::resource('categories', 'CategoryController');

            Route::resource('posts', 'PostController');
        });
    });
});


Route::group(['middleware' => 'locale'], function() {
    Route::namespace('Client')->group(function () {
        Route::get('change-language/{language}', 'HomeController@changeLanguage')->name('user.change-language');
        
        Route::get('/', function() {
            return view("client.home");
        });
    });
});

