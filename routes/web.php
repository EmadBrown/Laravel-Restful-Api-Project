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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('employee', 'EmployeeController');

Route::get('login' , 'auth\LoginController@index');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');


Route::prefix('profile')->group(function(){
    
    Route::get('/admin', 'AdminController@profile')->name('admin.profile');
    Route::put('/change_admin', 'AdminController@changeNameOrEmail')->name('admin.change-name-email');
    Route::put('/change_password_admin', 'AdminController@changePassword')->name('admin.change-password');
    Route::get('/user', 'HomeController@profile')->name('user.profile');
    Route::put('/change_user', 'HomeController@changeNameOrEmail')->name('user.change-name-email');
    Route::put('/change_password_user', 'HomeController@changePassword')->name('user.change-password');
    
});

Route::prefix('admin')->group(function(){
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name  ('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    // Password reset routes
    Route::prefix('password')->group(function(){
    Route::post('/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/reset', 'Auth\AdminResetPasswordController@reset');
    Route::get('/rest/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
    });

});
