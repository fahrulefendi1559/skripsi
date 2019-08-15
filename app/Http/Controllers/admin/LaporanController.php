<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\suratmasuk;
use App\suratmasuk_ex;
use App\Suratkeluar;
use App\Suratkeluarex;
use App\Surattugas;
use App\Suratperiode;
use PDF;
use DB;


class LaporanController extends Controller
{
    public function laporan(){
        $laporan            = suratmasuk::all();
        $lapsuk_ex          = suratmasuk_ex::all();
        $lapkel             = Suratkeluar::all();
        $lapkel_ex          = Suratkeluarex::all();
        $laptug             = Surattugas::all();
        $suratperiode       = Suratperiode::all();
    	return view('admin.laporan', compact('laporan','lapsuk_ex','lapkel','suratperiode','lapkel_ex', 'laptug'));
    }

    public function cari(Request $request)
    {
        $suratperiode       = Suratperiode::all();
        // menangkap data pencarian
		$cari = $request->cari;
 
        // mengambil data dari table pegawai sesuai pencarian data
        $filtermasuk = DB::table('surat_masuk')
        ->where('id_periode','like',"%".$cari."%")
        ->paginate();

        $filtermasukex = DB::table('surat_masuk_ex')
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

        return view('admin.carilaporan')->with([
            'filterkeluar'      => $filterkeluar,
            'filterkeluarex'    => $filterkeluarex,
            'filtermasuk'       => $filtermasuk,
            'filtermasukex'       => $filtermasukex,
            'filtertugas'       => $filtertugas,
            'suratperiode'      => $suratperiode,
        ]);
    }

    public function masukPdf(){
        $datas = suratmasuk::all();
        $pdf = PDF::loadView('admin.laporanmasukpdf', compact('datas'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('laporan_suratmasuk_Internal_'.date('Y-m-d_H-i-s').'.pdf');
    }

    public function masuk_exPdf(){
        $datas = suratmasuk_ex::all();
        $pdf = PDF::loadView('admin.suratmasuk_ex.laporanmasuk_expdf', compact('datas'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('laporan_suratmasuk_External_'.date('Y-m-d_H-i-s').'.pdf');
    }

     public function keluarPdf(){
        $datas = Suratkeluar::all();
        $pdf = PDF::loadView('admin.laporankeluarpdf', compact('datas'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('laporan_suratkeluar_Internal_'.date('Y-m-d_H-i-s').'.pdf');
    }

    public function keluarexPdf(){
    	$datas = Suratkeluarex::all();
        $pdf = PDF::loadView('admin.laporankeluarex', compact('datas'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('laporan_suratkeluar_External_'.date('Y-m-d_H-i-s').'.pdf');
    }


    public function tugasPdf(){
    	$datas = Surattugas::all();
        $pdf = PDF::loadView('admin.laporantugaspdf', compact('datas'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('laporan_suratkeluar_'.date('Y-m-d_H-i-s').'.pdf');
    }

}
