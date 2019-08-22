<?php

namespace App\Http\Controllers\kdpl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Suratperiode;
use App\Surattugas;

class KdplController extends Controller
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

        return view('kdpl.home')->with([
            'Tahun' => $Tahun,
            'Periode' => $Periode,
            'countsurat' => $countsurat,
        ]);;
    }

    public function cari(Request $request)
    {
        $suratperiode       = Suratperiode::all();
        

        // menangkap data pencarian
		$cari = $request->cari;
 
        // mengambil data dari table pegawai sesuai pencarian data
        $filter = DB::table('surat_tugas')
        ->join('jenis_tugas', 'surat_tugas.id_tugas', '=', 'jenis_tugas.id_jenis_tugas')
        ->select('surat_tugas.*','jenis_tugas.nama_tugas')
        ->where('id_periode','like',"%".$cari."%")
        ->paginate();

        return view('kdpl.carisurat')->with([
            'filter'            => $filter,
            'suratperiode'      => $suratperiode,
        ]);
    }

    public function surattugaskdpl()
    {
        $surat_tugas = DB::table('surat_tugas')
        ->join('jenis_tugas', 'surat_tugas.id_tugas', '=', 'jenis_tugas.id_jenis_tugas')
        ->select('surat_tugas.*','jenis_tugas.nama_tugas')
        ->get(); 
        $suratperiode   = Suratperiode::all();
        return view('kdpl.surattugas')->with([
            'surat_tugas'   => $surat_tugas,
            'suratperiode'  => $suratperiode
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
