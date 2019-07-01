<?php

namespace App\Http\Controllers\ketua;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use App\suratmasuk;
use App\Suratkeluar;
use App\Sifat;
use App\Disposisi;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
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

    public function indexHome(){

        $Tahun=DB::table('surat_periode')->orderBy('id_periode', 'DESC')->value('tahun');
        $Periode=DB::table('surat_periode')->orderBy('id_periode', 'DESC')->value('periode');
        $IDPeriode=DB::table('surat_periode')->orderBy('id_periode', 'DESC')->value('id_periode');

        $countsurat=DB::table('surat_masuk')
        ->where('id_periode', $IDPeriode)
        ->count();

        $countkeluar=DB::table('surat_keluar')
        ->where('id_periode', $IDPeriode)
        ->count();

        $disposisi= DB::table('surat_masuk')
        ->where('status', "1")
        ->count();

        $asalsurat=DB::table('surat_masuk')->value('pengirim');
        $prihal=DB::table('surat_masuk')->value('prihal');

 


        $datasuratmasuk = suratmasuk::orderBy('id','DESC')->paginate(10);

    	return view('ketua.home')->with([

            'Tahun'         => $Tahun,
            'countsurat'    => $countsurat,
            'countkeluar'   => $countkeluar,
            'disposisi'     => $disposisi,
            'datasuratmasuk'=> $datasuratmasuk,
            'Periode'       => $Periode,
            'asalsurat'     => $asalsurat,
            'prihal'        => $prihal
    
        ]);
    }

    public function dispo($id){
        $sifatsurat = Sifat::all();
        $masuk      = suratmasuk:: where('id',$id)->first();
        
        
        return view('ketua.disposisi', compact('sifatsurat','id','masuk'));
    }

    public function send(Request $request,$id){
        $this->validate($request, [
            'id_suratmasuk'   => 'required',
            'id_sifat'        => 'required',
            'diteruskan'      => 'required',
            'bataswaktu'      => 'required',
            'catatan'         => 'required'
        ]);

        DB::table('disposisi')->insert([
              'id_suratmasuk'=> $request->input('id_suratmasuk'),
              'id_sifat'     => $request->input('id_sifat'),
              'diteruskan'   => $request->input('diteruskan'),
              'bataswaktu'   => $request->input('bataswaktu'),
              'catatan'      => $request->input('catatan')
          ]);

        return redirect('ketua/home')->with('dissuk','Surat Berhasil Didisposisikan');
    }
    
}
