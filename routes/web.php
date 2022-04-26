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

Route::prefix('admin')->group(function () {
    Route::namespace('Portal')->group(function () {
        Route::get('/login', 'AuthController@index')->name('portal.login');
        Route::post('/login', 'AuthController@login')->name('portal.auth.login');
        Route::post('/logout', 'AuthController@logout')->name('portal.auth.logout');

        Route::middleware(['auth'])->group(function() {
            Route::get('/', 'HomeController@index')->name('dashboard');
            Route::get('/images/list', 'ImageController@list')->name('images.list');
            Route::post('/images/upload', 'ImageController@upload')->name('images.upload');
            Route::delete('/images/remove', 'ImageController@remove')->name('images.remove');
            Route::resource('images', 'ImageController')->only(['update', 'show']);

            Route::resource('users', 'UserController');
            Route::resource('categories', 'CategoryController')->except(['show']);
            Route::resource('posts', 'PostController')->except(['show']);
            Route::resource('contacts', 'ContactController')->only(['index', 'edit', 'update', 'destroy']);
        });
    });
});


Route::group(['middleware' => 'locale'], function() {
    Route::namespace('Client')->group(function () {
        // language
        Route::get('change-language/{language}', 'HomeController@changeLanguage')->name('user.change-language');
        
        // home
        Route::get('/', 'HomeController@index')->name('home.index');

        // category
        Route::get('/categories/{parent_id}/{child_id?}', 'CategoryController@show')->name('categories.show');

        // user
        Route::get('/user/info', 'HomeController@previewUser')->name('user.info');

        // gallery
        Route::get('/galleries/{id}', 'HomeController@showGallery')->name('galleries.show');

        // post
        Route::post('/posts/search', 'PostController@handleSearch')->name('posts.handleSearch');
        Route::get('/search/{keyword?}', 'PostController@search')->name('posts.search');
        Route::get('/{slug}', 'PostController@show')->name('posts.show');

        // contact
        Route::post('/contact', 'ContactController@store')->name('contacts.store');
    });
});

