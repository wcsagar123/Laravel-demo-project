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

Route::get('/', function () {
    return view('login');
});



Route::get('create-account','User@createuser');
Route::post('loginsubmit','User@loginsubmit');
Route::post('createsubmit','User@createsubmit');

Route::group(array('middleware'=>array('logCheck')),function(){
	Route::get('userlist','User@listuser');
	Route::get('userlist/edit/{id}', 'User@edituser');
	Route::get('userlist/delete/{id}', 'User@deleteuser');
	Route::post('userlist/update/{id}', 'User@updateuser');
});