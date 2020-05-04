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
    Route::post('/password/email', 'UserForgotPasswordController@sendResetLinkEmail')->name('user.password.email');
    Route::post('/password/reset', 'UserResetPasswordController@reset')->name('user.password.update');
    Route::get('/password/reset', 'UserForgotPasswordController@showLinkRequestForm')->name('user.password.request');
    Route::get('/password/reset/{token}', 'UserResetPasswordController@showResetForm')->name('user.password.reset');
});


Route::prefix('support')->namespace('Auth\Support')->group(function () {

    Route::get('/register', 'AuthController@registerView');
    Route::post('/register', 'AuthController@register')->name('support.register');
    Route::get('/login', 'AuthController@loginView')->name('support.login');
    Route::post('/login', 'AuthController@login')->name('support.login');
    Route::post('/logout', 'AuthController@logout')->name('support.logout');
    Route::get('/dashboard', 'SupportController@dashboard')->name('support.dashboard');
    Route::post('/password/email', 'SupportForgotPasswordController@sendResetLinkEmail')->name('support.password.email');
    Route::post('/password/reset', 'SupportResetPasswordController@reset')->name('support.password.update');
    Route::get('/password/reset', 'SupportForgotPasswordController@showLinkRequestForm')->name('support.password.request');
    Route::get('/password/reset/{token}', 'SupportResetPasswordController@showResetForm')->name('support.password.reset');
});


Route::prefix('admin')->namespace('Auth\Admin')->group(function () {

    Route::get('/register', 'AuthController@registerView');
    Route::post('/register', 'AuthController@register')->name('admin.register');
    Route::get('/login', 'AuthController@loginView')->name('admin.login');
    Route::post('/login', 'AuthController@login')->name('admin.login');
    Route::post('/logout', 'AuthController@logout')->name('admin.logout');
    Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    Route::post('/password/email', 'AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::post('/password/reset', 'AdminResetPasswordController@reset')->name('admin.password.update');
    Route::get('/password/reset', 'AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::get('/password/reset/{token}', 'AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});


Route::prefix('marketing')->namespace('Auth\Marketing')->group(function () {

    Route::get('/register', 'AuthController@registerView');
    Route::post('/register', 'AuthController@register')->name('marketing.register');
    Route::get('/login', 'AuthController@loginView')->name('marketing.login');
    Route::post('/login', 'AuthController@login')->name('marketing.login');
    Route::post('/logout', 'AuthController@logout')->name('marketing.logout');
    Route::get('/dashboard', 'MarketingController@dashboard')->name('marketing.dashboard');
    Route::post('/password/email', 'MarketingForgotPasswordController@sendResetLinkEmail')->name('marketing.password.email');
    Route::post('/password/reset', 'MarketingResetPasswordController@reset')->name('marketing.password.update');
    Route::get('/password/reset', 'MarketingForgotPasswordController@showLinkRequestForm')->name('marketing.password.request');
    Route::get('/password/reset/{token}', 'MarketingResetPasswordController@showResetForm')->name('marketing.password.reset');
});
