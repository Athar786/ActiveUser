<?php

use Illuminate\Support\Facades\Route;
use App\Mail\NewUserWelcomeMail;
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

Auth::routes();

Route::get('/email',function(){
	return new NewUserWelcomeMail();
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('change-status', 'AdminController@changeStatus')->name('changeStatus');


Route::group(['middleware'=>['auth','admin']],function(){
	Route::get('/dashbord', 'AdminController@index')->name('dashbord');
	Route::get('/admin',function(){
		return view('dashbord');
	});
});