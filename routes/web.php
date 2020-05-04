<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'Controller@multiLogin');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/multilogin', 'Controller@multiLogin')->name('multilogin');

Route::prefix('user')->namespace('Auth\User')->group(function () {

    Route::get('/register', 'AuthController@registerView');
    Route::post('/register', 'AuthController@register')->name('user.register');
    Route::get('/login', 'AuthController@loginView')->name('user.login');
    Route::post('/login', 'AuthController@login')->name('user.login');
    Route::post('/logout', 'AuthController@logout')->name('user.logout');
    Route::get('/dashboard', 'UserController@dashboard')->name('user.dashboard');
});


Route::prefix('support')->namespace('Auth\Support')->group(function () {

    Route::get('/register', 'AuthController@registerView');
    Route::post('/register', 'AuthController@register')->name('support.register');
    Route::get('/login', 'AuthController@loginView')->name('support.login');
    Route::post('/login', 'AuthController@login')->name('support.login');
    Route::post('/logout', 'AuthController@logout')->name('support.logout');
    Route::get('/dashboard', 'SupportController@dashboard')->name('support.dashboard');
});

Route::prefix('admin')->namespace('Auth\Admin')->group(function () {

    Route::get('/register', 'AuthController@registerView');
    Route::post('/register', 'AuthController@register')->name('admin.register');
    Route::get('/login', 'AuthController@loginView')->name('admin.login');
    Route::post('/login', 'AuthController@login')->name('admin.login');
    Route::post('/logout', 'AuthController@logout')->name('admin.logout');
    Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
});


Route::prefix('marketing')->namespace('Auth\Marketing')->group(function () {

    Route::get('/register', 'AuthController@registerView');
    Route::post('/register', 'AuthController@register')->name('marketing.register');
    Route::get('/login', 'AuthController@loginView')->name('marketing.login');
    Route::post('/login', 'AuthController@login')->name('marketing.login');
    Route::post('/logout', 'AuthController@logout')->name('marketing.logout');
    Route::get('/dashboard', 'MarketingController@dashboard')->name('marketing.dashboard');
});
