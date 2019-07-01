<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Detailstruktur;
use App\Strukturorganisasi;
use DB;

class StrukturorganisasiController extends Controller
{
   public function list(){

      $data_organisasi= Detailstruktur::all();
      $suratperiode    = Strukturorganisasi::all();

     return view('admin.strukturorganisasi')->with([
          'data_organisasi' => $data_organisasi,
          'suratperiode'     => $suratperiode,
      ]);
   }
}
