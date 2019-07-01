<?php

namespace App\Http\Controllers\ketua;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\suratmasuk;
use App\Suratkeluar;
use PDF;

class LaporanController extends Controller
{
    public function index(){
    	$laporan = suratmasuk::all();
    	$lapkel  = Suratkeluar::all();
    	return view('ketua.laporan', compact('laporan','lapkel'));
    }

    public function masukPdf(){
        $datas = suratmasuk::all();
        $pdf = PDF::loadView('ketua.laporanmasukpdf', compact('datas'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('laporan_suratmasuk_'.date('Y-m-d_H-i-s').'.pdf');
    }

     public function keluarPdf(){
        $datas = suratmasuk::all();
        $pdf = PDF::loadView('ketua.laporankeluarpdf', compact('datas'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('laporan_suratkeluar_'.date('Y-m-d_H-i-s').'.pdf');
    }
}
