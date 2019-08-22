<?php

namespace App\Http\Controllers\ketuabidang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\suratmasuk;

class BendaharaController extends Controller
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
        $Tahun=DB::table('surat_periode')->orderBy('id_periode', 'DESC')->value('tahun');
        $Periode=DB::table('surat_periode')->orderBy('id_periode', 'DESC')->value('periode');
        $countsurat=DB::table('disposisi')
        ->where('id_role', '8')
        ->count();

        return view('bendahara.home')->with([
            'Tahun' => $Tahun,
            'Periode' => $Periode,
            'countsurat' => $countsurat,
        ]);;
    }

    public function suratmasukbendahara()
    {
        $suratmasuk= DB::table('disposisi')
        ->join('surat_masuk', 'disposisi.id_suratmasuk', '=', 'surat_masuk.id')
        ->select('disposisi.catatan','disposisi.id_suratmasuk', 'surat_masuk.nomorsurat','surat_masuk.pengirim','surat_masuk.prihal','surat_masuk.tglsurat')
        ->where('id_role','9')
        ->get(); 
        return view('bendahara.suratmasuk')->with([
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
