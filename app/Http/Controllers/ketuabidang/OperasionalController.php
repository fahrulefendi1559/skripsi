<?php

namespace App\Http\Controllers\ketuabidang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\suratmasuk;
use DB;

class OperasionalController extends Controller
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


    public function indexHome()
    {
        
        return view('operasional.home');
    }

    public function suratmasuksekre()
    {
        $suratmasuk= DB::table('disposisi')
        ->join('surat_masuk', 'disposisi.id_suratmasuk', '=', 'surat_masuk.id')
        ->select('disposisi.catatan','disposisi.id_suratmasuk', 'surat_masuk.nomorsurat','surat_masuk.pengirim','surat_masuk.prihal','surat_masuk.tglsurat')
        ->where('id_role','4')
        ->get(); 
        return view('operasional.suratmasuk')->with([
            'suratmasuk'         => $suratmasuk
        ]);
    }

    public function viewpdf($id)
    {
        $file = suratmasuk::where('id', $id)->pluck('namafile')->first();
        // $filename = $request->namafile;
        $path = storage_path('app/'.$file);

        return response()->file($path);
    }
}
