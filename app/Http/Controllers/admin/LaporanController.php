<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\suratmasuk;
use App\Suratkeluar;
use PDF;

class LaporanController extends Controller
{
    public function laporan(){
    	$laporan = suratmasuk::all();
    	$lapkel  = Suratkeluar::all();

    	return view('admin.laporan', compact('laporan', 'lapkel'));
    }

    public function masukPdf(){
        $datas = suratmasuk::all();
        $pdf = PDF::loadView('admin.laporanmasukpdf', compact('datas'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('laporan_suratmasuk_'.date('Y-m-d_H-i-s').'.pdf');
    }

     public function keluarPdf(){
        $datas = suratmasuk::all();
        $pdf = PDF::loadView('admin.laporankeluarpdf', compact('datas'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('laporan_suratkeluar_'.date('Y-m-d_H-i-s').'.pdf');
    }
}
