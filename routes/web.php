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
	//surat masuk
	Route::get('/suratmasuk', 'admin\SuratmasukController@getsuratmasuk')->name('admin.suratmasuk');

	Route::post('/createsuratmasuk', 'admin\SuratmasukController@create_surat_masuk')->name('admin.createsuratmasuk');

	Route::get('/suratmasuk/edit/{id}', 'admin\SuratmasukController@editsuratmasuk')->name('admin.editsurat');
	Route::post('/suratmasuk/edit/post/{id}', 'admin\SuratmasukController@update')->name('admin.update');

	Route::get('/suratmasuk/delete/{id}','admin\SuratmasukController@delete_surat_masuk')->name('admin.deletesuratmasuk');
	Route::get('suratmasuk/viewpdf/{id}', 'admin\SuratmasukController@viewpdf')->name('admin.viewpdfsuratmasuk');

	//surat keluar
		Route::get('/suratkeluar','admin\suratkeluarController@getsuratkeluar')->name('admin.suratkeluar');
		
		//internal surat keluar
		Route::post('/createsuratkeluar','admin\SuratkeluarController@internal')->name('admin.createsuratkeluar'); 

		Route::get('/suratkeluar/delete/{id}','admin\SuratkeluarController@destroy')->name('admin.deletesuratkeluar');

		Route:: get('/suratkeluar/edit/{id}', 'admin\SuratkeluarController@edit')->name('admin.edit_suratkeluar');

		Route::post('/suratkeluar/edit/post/{id}', 'admin\SuratkeluarController@update')->name('admin.updatekeluar');

		Route::get('/suratkeluar/viewpdf/{id}', 'admin\SuratkeluarController@viewpdf')->name('admin.viewpdfsuratseluar');
		
		Route::post('/suratkeluar/uploadfile', 'admin\SuratkeluarController@createfile')->name('admin.createfilekeluar');

		Route::get('/suratkeluar/filesuratkeluar/pdf/{id}', 'admin\SuratkeluarController@createsuratpdf')->name('admin.keluarfilepdf');

		// external surat keluar
		Route::post('/createsuratkeluarexternal', 'admin\SuratkeluarController@external')->name('admin.createsuratkeluarexternal');
		Route::post('/suratkeluar_ex/uploadfileexternal', 'admin\SuratkeluarController@createfile_ex')->name('admin.createfilekeluar_ex');
		Route::get('/suratkeluar_ex/delete/{id}','admin\SuratkeluarController@destroy_ex')->name('admin.deletesuratkeluar_ex');
		Route::get('/suratkeluar_ex/filesuratkeluar/pdf/{id}', 'admin\SuratkeluarController@createsuratpdf_ex')->name('admin.keluarfilepdf_ex');
		Route::get('/suratkeluar_ex/viewpdf/{id}', 'admin\SuratkeluarController@viewpdf_ex')->name('admin.viewpdfsuratseluar_ex');
		
		
		Route:: get('/suratkeluar_ex/edit/{id}', 'admin\SuratkeluarController@edit_ex')->name('admin.edit_suratkeluar_ex');
		Route::post('/suratkeluar_ex/edit/post/{id}', 'admin\SuratkeluarController@update_ex')->name('admin.updatekeluar_ex');
		


	// surat tugas
	Route::get('/surattugas', 'admin\SurattugasController@getsurattugas')->name('admin.getsurattugas');
	Route::post('surattugas','admin\SurattugasController@create_surat_tugas')->name('admin.savetugas');
	Route::get('surattugas/edit/{id}','admin\SurattugasController@edit')->name('admin.edittugas');
	Route::post('surattugas/edit/post/{id}', 'admin\SurattugasController@update')->name('admin.update');
	Route::get('surattugas/delete/{id}','admin\SurattugasController@delete')->name('admin.delete');
	Route::get('surattugas/viewpdf/{id}','admin\SurattugasController@viewpdf')->name('admin.viewpdftugas');

	//laporan
	Route::get('/laporan/','admin\LaporanController@laporan')->name('admin.laporan');
	Route::get('/laporan/suratmasuk/', 'admin\LaporanController@masukPdf');
	Route::get('/laporan/suratkeluar/', 'admin\LaporanController@keluarPdf');

	//manajemen struktur organisasi
	Route::get('/strukturorganisasi/', 'admin\StrukturorganisasiController@list')->name('admin.struktur');
	Route::get('/strukturorganisasi/edit/{id_detail_struktur}', 'admin\StrukturorganisasiController@edit')->name('admin.editstruktur');
	Route::post('/strukturorganisasi/edit/post','admin\StrukturorganisasiController@updateketua')->name('admin.editketua');

	// disposisi
	Route::get('/suratmasuk/disposisi/{id}', 'admin\DisposisiController@index')->name('admin.disposisi');

	// kelola tanggal periode surat
	Route::get('/tanggalperiode', 'admin\KelolatanggalController@index')->name('admin.kelolatanggal');
	Route::post('/tanggalperiode/post', 'admin\KelolatanggalController@createperiode')->name('admin.createperiode');
	

	//manajemen user
	Route::get('/registerusers', 'admin\UsersController@index')->name('createuser');
	Route::post('/createusers','admin\UsersController@create_user')->name('createusers');
	Route::get('/user/edit/{id}', 'admin\UsersController@edit')->name('admin.edituser');
	Route::post('/user/edit/post/{id}', 'admin\UsersController@update')->name('admin.updateuser');
	Route::get('/user/delete/{id}', 'admin\UsersController@delete');

});

//route operator
Route::group(['middleware' => 'operator', 'prefix' => 'operator'], function () {
	Route::get('/home',				'operator\HomeController@indexHome')->name('opr.home');
	// surat masuk
	Route::get('/suratmasuk', 'operator\SuratmasukController@getsuratmasuk')->name('opr.getsuratmasuk');
	Route::post('/createsuratmasuk', 'operator\SuratmasukController@create_surat_masuk')->name('opr.createsuratmasuk');
	Route::get('/suratmasuk/edit/{id}', 'operator\SuratmasukController@edit')->name('opr.edit');
	Route::post('/suratmasuk/edit/post/{id}', 'operator\SuratmasukController@update')->name('opr.update');
	Route::get('/suratmasuk/delete/{id}', 'operator\SuratmasukController@delete')->name('opr.delete');
	Route::get('/suratmasuk/viewpdf/{id}', 'operator\SuratmasukController@viewpdf')->name('opr.viewsuratmasuk');

	// surat keluar
	Route::get('/suratkeluar', 'operator\SuratkeluarController@getsuratkeluar')->name('opr.suratkeluar');
		// Surat Keluar Internal
		Route::post('/createsuratkeluar', 'operator\SuratkeluarController@internal')->name('opr.createsuratkeluar');

		Route::get('/suratkeluar/edit/{id}', 'operator\SuratkeluarController@edit')->name('opr.editsuratkeluar');
		Route::post('/suratkeluar/edit/post/{id}', 'operator\SuratkeluarController@update')->name('opr.updatekeluar');

		Route::get('/suratkeluar/delete/{id}', 'operator\SuratkeluarController@delete')->name('opr.deletekeluar');

		Route::get('/suratkeluar/viewpdf/{id}/', 'operator\SuratkeluarController@viewpdf')->name('opr.viewpdf');
		Route::post('/suratkeluar/uploadfile', 'operator\SuratkeluarController@createfile')->name('opr.createfilekeluar');
		
		Route::get('/suratkeluar/filesuratkeluar/pdf/{id}', 'operator\SuratkeluarController@createsuratpdf')->name('opr.keluarfilepdf');


		// Surat Keluar External
		Route::post('/createsuratkeluar_ex', 'operator\SuratkeluarController@external')->name('opr.createsuratkeluar_ex');
		Route::get('/suratkeluar_ex/edit/{id}', 'operator\SuratkeluarController@edit_ex')->name('opr.editsuratkeluar_ex');
		Route::post('/suratkeluar_ex/edit/post/{id}', 'operator\SuratkeluarController@update_ex')->name('opr.updatekeluar_ex');
		Route::get('/suratkeluar_ex/delete/{id}', 'operator\SuratkeluarController@delete_ex')->name('opr.deletekeluar_ex');
		Route::get('/suratkeluar_ex/viewpdf/{id}/', 'operator\SuratkeluarController@viewpdf_ex')->name('opr.viewpdf_ex');
		Route::post('/suratkeluar_ex/uploadfile', 'operator\SuratkeluarController@createfile_ex')->name('opr.createfilekeluar_ex');
		Route::get('/suratkeluar_ex/filesuratkeluar/pdf/{id}', 'operator\SuratkeluarController@createsuratpdf_ex')->name('opr.createsuratpdf_ex');

	// surat tugas
	Route::get('/surattugas', 'operator\SurattugasController@getsurattugas')->name('operator.tugas');
	Route::post('surattugas/','operator\SurattugasController@create_surat_tugas')->name('opr.savetugas');
	Route::get('surattugas/delete/{id}', 'operator\SurattugasController@delete')->name('opr.deletetugas');
	Route::get('surattugas/edit/{id}','operator\SurattugasController@edit')->name('opr.edittugas');
	Route::post('surattugas/edit/post/{id}','operator\SurattugasController@update')->name('opr.update');
	Route::get('surattugas/viewpdf/{id}','operator\SurattugasController@viewpdf')->name('opr.viewpdf');


	// laporan
	Route::get('/laporan', 'operator\LaporanController@laporan')->name('opr.laporan');
	Route::get('/laporan/suratmasuk/', 'operator\LaporanController@masukPdf')->name('opr.masukpdf');
	Route::get('/laporan/suratkeluar/', 'operator\LaporanController@keluarPdf');
});


//route ketua 

Route::group(['middleware' => 'ketua', 'prefix' => 'ketua'], function () {
	Route::get('/home',				'ketua\HomeController@indexHome')->name('ketua.home');
	Route::get('/suratmasuk/disposisi/{id}', 'ketua\HomeController@dispo')->name('ketua.disposisi');
	Route::post('/disposisi/post/', 'ketua\HomeController@send')->name('ketua.send');

	Route::get('/disposisi/viewdisposisi/', 'ketua\DisposisiController@viewdisposisi')->name('ketua.viewdisposisi');
	Route::get('/disposisi/edit/{id}','ketua\DisposisiController@editdisposisi');
	Route::post('/disposisi/edit/post/{id}','ketua\DisposisiController@updatedisposisi')->name('ketua.updatedisposisi');
	
	// laporan
	Route::get('/laporan', 'ketua\LaporanController@index')->name('ketua.laporan');
	Route::get('/laporan/suratmasuk/', 'ketua\LaporanController@masukPdf');
	Route::get('/laporan/suratkeluar', 'ketua\LaporanController@keluarPdf');

});

Route::group(['middleware' => 'sekre', 'prefix' => 'sekre'], function () {
	Route::get('/home',				'ketuabidang\SekreController@indexHome')->name('sekre.home');
	Route::get('/suratmasuk/', 'ketuabidang\SekreController@suratmasuksekre')->name('sekre.lihatsurat');
	Route::get('/suratmasuk/viewpdf/{id}','ketuabidang\SekreController@viewpdf')->name('sekre.viewpdf');

});

Route::group(['middleware' => 'operasional', 'prefix' => 'operasional'], function () {
	Route::get('/home',				'ketuabidang\OperasionalController@indexHome')->name('operasional.home');
	Route::get('/suratmasuk/', 'ketuabidang\OperasionalController@suratmasuksekre')->name('operasional.lihatsurat');
	Route::get('/suratmasuk/viewpdf/{id}','ketuabidang\OperasionalController@viewpdf')->name('operasional.viewpdf');

});

Route::group(['middleware' => 'pendikpel', 'prefix' => 'pendikpel'], function () {
	Route::get('/home',				'ketuabidang\PendikpelController@indexHome')->name('pendikpel.home');
	Route::get('/suratmasuk/', 'ketuabidang\PendikpelController@suratmasuksekre')->name('pendikpel.lihatsurat');
	Route::get('/suratmasuk/viewpdf/{id}','ketuabidang\PendikpelController@viewpdf')->name('pendikpel.viewpdf');

});