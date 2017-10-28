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

Route::get('employee' ,'EmployeeController@show');

Route::get('add', function () {
    return view('employee/add');
});

Route::post('addEmployee' , 'EmployeeController@add');

Route::get('login' , 'auth\LoginController@index');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function(){
Route::get('/', 'AdminController@index')->name('admin.dashboard');
Route::get('/login', 'auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/login', 'auth\AdminLoginController@login')->name('admin.login.submit');
});
