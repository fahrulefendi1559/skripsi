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

//route login 
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');

Route::group(['middleware' => 'auth'], function () {
	Route::get('/home', function () {
		return view('home');
	});
});

//route admin
Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
	Route::get('/home',				'admin\HomeController@indexHome')->name('admin.home');

});

//route operator
Route::group(['middleware' => 'operator', 'prefix' => 'operator'], function () {
	//Route::get('/home',				'admin\HomeController@indexHome')->name('admin.home');
});


//route ketua 

Route::group(['middleware' => 'ketua', 'prefix' => 'ketua'], function () {
	Route::get('/home',				'ketua\HomeController@indexHome')->name('ketua.home');

});

/**
// route untuk login
Route::group(['middleware'=>'auth'], function (){
	Route::get('/home', function(){
// dd(Auth::User());
if(Auth::User()->roles_id == 999){
	return view('admin.home');
}

elseif (Auth::User()->roles_id==888) {
	return view('admin.home');
}
else if(Auth::User()->roles_id == 1){
	return view('ketua.home');
}
		return view('home');
	});
});


//route admin
Route::group(['middleware'=>'admin','prefix' => 'admin'], function (){
	Route::get('/home', function(){
		return view('admin.home');
	});
});

//Route::get('/home', 'HomeController@index')->name('home');
*/
