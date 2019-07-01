<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Suratperiode;
use App\suratmasuk;
use DB;

class KelolatanggalController extends Controller
{
    public function index(){

    	return view('admin.kelolatanggal');
    }

    public function createperiode(Request $request){
    	// $this->validate($request, [
    	// 	'periode'	=>	'required',
    	// 	'tahun'		=>	'required'
    	// ]);

    	$cek = DB::table('surat_periode')
    	->where('periode', $request->input('periode'))
    	->where('tahun', $request->input('tahun'))
    	->get()->toArray();

    	
    	if (empty($cek)) {
    		DB::table('surat_periode')->insert([
    			'periode' => $request->input('periode'),
    			'tahun'	  => $request->input('tahun')
    		]);

	    	return back()->with('sukses', "Periode Surat Berhasil Disimpan");

    	}
    	else{
    		return back()->with('gagal', "Periode Surat Sudah Ada ");
    	}
    	
    }
}
