<?php

namespace App\Http\Controllers\operator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\suratmasuk;
use App\Suratkeluar;
use App\Suratkeluarex;
use App\Surattugas;
use App\Suratperiode;
use PDF;
use DB;

class LaporanController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function laporan(){
    	$laporan            = suratmasuk::all();
        $lapkel             = Suratkeluar::all();
        $lapkel_ex          = Suratkeluarex::all();
        $laptug             = Surattugas::all();
        $suratperiode       = Suratperiode::all();
    	return view('operator.laporan', compact('laporan','lapkel','suratperiode','lapkel_ex', 'laptug'));
    }

    public function cari(Request $request)
    {
        $data_surat_keluar  = Suratkeluar::orderby('id','DESC')->paginate(10);
        $data_surat_keluar_ex= Suratkeluarex::orderby('id','DESC')->paginate(10);
        $suratperiode       = Suratperiode::all();
        // menangkap data pencarian
		$cari = $request->cari;
 
        // mengambil data dari table pegawai sesuai pencarian data
        $filtermasuk = DB::table('surat_masuk')
        ->where('id_periode','like',"%".$cari."%")
        ->paginate();

        $filterkeluar = DB::table('surat_keluar')
        ->where('id_periode','like',"%".$cari."%")
        ->paginate();

        $filterkeluarex = DB::table('surat_keluar_ex')
        ->where('id_periode','like',"%".$cari."%")
        ->paginate();

        $filtertugas = DB::table('surat_tugas')
        ->where('id_periode','like',"%".$cari."%")
        ->paginate();

        return view('operator.carilaporan')->with([
            'filterkeluar'      => $filterkeluar,
            'filterkeluarex'    => $filterkeluarex,
            'filtermasuk'       => $filtermasuk,
            'filtertugas'       => $filtertugas,
            'data_surat_keluar' => $data_surat_keluar,
            'suratperiode'      => $suratperiode,
        'data_surat_keluar_ex'  => $data_surat_keluar_ex,
        ]);
    }

    public function masukPdf()
    {

        $datas = suratmasuk::all();
        $pdf = PDF::loadView('operator.laporanmasukpdf', compact('datas'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('laporan_suratmasuk_'.date('Y-m-d_H-i-s').'.pdf');
    }

    public function keluarPdf(){
    	$datas = Suratkeluar::all();
        $pdf = PDF::loadView('operator.laporankeluarpdf', compact('datas'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('laporan_suratkeluar_'.date('Y-m-d_H-i-s').'.pdf');
    }

    public function keluarexPdf(){
    	$datas = Suratkeluarex::all();
        $pdf = PDF::loadView('operator.laporankeluarexpdf', compact('datas'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('laporan_suratkeluar_'.date('Y-m-d_H-i-s').'.pdf');
    }


    public function tugasPdf(){
    	$datas = Surattugas::all();
        $pdf = PDF::loadView('operator.laporantugaspdf', compact('datas'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('laporan_suratkeluar_'.date('Y-m-d_H-i-s').'.pdf');
    }


}
