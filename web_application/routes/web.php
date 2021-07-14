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

Route::get('/', 'welcomeController@main')->name('welcome');
Route::group(['middleware' => 'visitors'], function() {
	Route::get('register', 'RegistrationController@register');
	Route::post('register', 'RegistrationController@postregister');
	Route::get('login', 'LoginController@login');
	Route::post('login', 'LoginController@postlogin');
	Route::get('forget_password', 'ForgetPasswordController@forgetpassword');
	Route::post('forget_password', 'ForgetPasswordController@postforgetpassword');
	Route::get('reset/{email}/{resetCode}', 'ForgetPasswordController@resetpassword');
	Route::post('reset/{email}/{resetCode}', 'ForgetPasswordController@postresetpassword');
});
Route::post('logout', 'LoginController@logout');
Route::get('admin', 'AdminController@admin_page')->middleware('admin');
Route::get('user', 'ManagerController@user_page')->middleware('manager')->name('user');
Route::get('mydevice/{device_Id}', 'ManagerController@mydevice')->name('mydevice');
Route::get('ajax/{device_Id}/{pin_number}/{status}', 'ManagerController@ajax')->name('ajax');
Route::get('activate/{email}/{activationCode}', 'ActivationController@activate');
Route::get('new_device', 'AdminController@new_device_page');
Route::post('post_new_device', 'AdminController@post_new_device');
Route::get('user_device', 'ManagerController@user_device');
Route::post('activate_device', 'ManagerController@activate_user_device');
Route::get('del_user', 'AdminController@deleteUser');
Route::get('del_device', 'AdminController@deleteDevice');
Route::post('postRemoveUser', 'AdminController@delUser');
Route::post('postRemoveDevice', 'AdminController@delDevice');
Route::get('data/{device_Id}', 'FileController@showdata');