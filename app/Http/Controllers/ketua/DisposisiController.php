<?php

namespace App\Http\Controllers\ketua;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\suratmasuk;
use App\Disposisi;
use App\Sifat;
use Illuminate\Support\Facades\Input;

class DisposisiController extends Controller
{
    public function index($id){
        $sifatsurat = Sifat::all();
        
    	return view('ketua.disposisi', compact('sifatsurat','id'));
    }

    public function suratmasuk($id){
        $masuk      = suratmasuk::where('id', $id)->first();
    }


    public function send(Request $request,$id){
        $this->validate($request, [
            'id_suratmasuk'   => 'required',
            'id_sifat'        => 'required',
            'diteruskan'      => 'required',
            'bataswaktu'      => 'required',
            'catatan'         => 'required'
        ]);

        // DB::table('disposisi')->insert([
        //      'id_suratmasuk'=> $request->input('id_suratmasuk'),
        //      'id_sifat'     => $request->input('id_sifat'),
        //      'diteruskan'   => $request->input('diteruskan'),
        //      'bataswaktu'   => $request->input('bataswaktu'),
        //      'catatan'      => $request->input('catatan')
        //  ]);

        $dispo = Disposisi::where('id', $id)->first();
        $dispo->id_suratmasuk = $request->id_suratmasuk;
        $dispo->id_sifat      = $request->id_sifat;
        $dispo->diteruskan    = $request->diteruskan;
        $dispo->bataswaktu    = $request->bataswaktu;
        $dispo->catatan       = $request->catatan;

        $dispo->save();


        return redirect('ketua/home')->with('dissuk','Surat Berhasil Didisposisikan');
    }


    // public function senddispo($id){
    // DB::table('surat_masuk')->where('id', $id)
    // ->update([
    //     'status'    => "0"
    //     ]);

    //     return back()->with('alertt', 'Data Sengaja Tidak Didisposisikan');
    // }

}
