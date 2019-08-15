<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Excel;


class HomeController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexHome(){

        $Tahun=DB::table('surat_periode')->orderBy('id_periode', 'DESC')->value('tahun');
        $periode=DB::table('surat_periode')->orderBy('id_periode', 'DESC')->value('periode');
        $IDPeriode=DB::table('surat_periode')->orderBy('id_periode', 'DESC')->value('id_periode');

        $countsurat=DB::table('surat_masuk')
        ->where('id_periode', $IDPeriode)
        ->count();

        
        $countsurat_ex=DB::table('surat_masuk_ex')
        ->where('id_periode', $IDPeriode)
        ->count();

        $countkeluarex=DB::table('surat_keluar_ex')
        ->where('id_periode', $IDPeriode)
        ->count();

        $countkeluar=DB::table('surat_keluar')
        ->where('id_periode', $IDPeriode)
        ->count();

        $counttugas=DB::table('surat_tugas')
        ->where('id_periode', $IDPeriode)
        ->count();

    	return view('admin.home')->with([

            'Tahun'         =>$Tahun,
            'countsurat'    =>$countsurat,
            'countsurat_ex' =>$countsurat_ex,
            'counttugas'    =>$counttugas,
            'countkeluar'   =>$countkeluar,
            'countkeluarex' =>$countkeluarex,
            'periode'       =>$periode
        ]);
    }

}
