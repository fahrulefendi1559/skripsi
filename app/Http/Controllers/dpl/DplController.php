<?php

namespace App\Http\Controllers\dpl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jenistugas;
use App\Suratperiode;
use App\Surattugas;
use DB;

class DplController extends Controller
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
        $IDPeriode=DB::table('surat_periode')->orderBy('id_periode', 'DESC')->value('id_periode');
        $countsurat=DB::table('surat_tugas')
        ->where('id_periode', $IDPeriode)
        ->count();

        return view('dpl.home')->with([
            'Tahun' => $Tahun,
            'Periode' => $Periode,
            'countsurat' => $countsurat,
        ]);;
    }

    public function cari(Request $request)
    {
        $surat_tugas        = Surattugas::orderby('id','DESC')->paginate(10);
        $suratperiode       = Suratperiode::all();
        $jenis_tugas        = Jenistugas::all();

        // menangkap data pencarian
		$cari = $request->cari;
 
        // mengambil data dari table pegawai sesuai pencarian data
        $filter = DB::table('surat_tugas')
        ->where('id_periode','like',"%".$cari."%")
        ->paginate();

        return view('dpl.carisurat')->with([
            'filter'            => $filter,
            'jenis_tugas'       => $jenis_tugas,
            'suratperiode'      => $suratperiode,
            'surat_tugas'       => $surat_tugas
        ]);
    }

    public function surattugasdpl()
    {
        $tugas1 = Surattugas::all();
        $suratperiode   = Suratperiode::all();

        return view('dpl.surattugas')->with([
            'tugas1'         => $tugas1,
            'suratperiode'   => $suratperiode
        ]);
    }

    public function viewpdf($id)
    {
        $file = Surattugas::where('id', $id)->pluck('namafile')->first();
        // $filename = $request->namafile;
        $path = storage_path('app/'.$file);

        return response()->file($path);
    }
}
