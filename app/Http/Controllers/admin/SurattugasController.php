<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use DB;


class SurattugasController extends Controller
{
    public function getsurattugas(){

    	return view('admin/surattugas');
    }

    public function createsuratpdf(){
    	$pdf = PDF::loadView('admin.createsurattugaspdf');
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('suratkeluar_'.date('Y-m-d_H-i-s').'.pdf');
    }
}
