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
    public function viewdisposisi(){
        $disposisi= DB::table('disposisi')
         ->join('surat_masuk', 'disposisi.id_suratmasuk', '=', 'surat_masuk.id')
         ->join('sifat', 'disposisi.id_sifat', '=', 'sifat.id_sifat')
         ->join('roles', 'disposisi.id_role', '=', 'roles.id')
         ->select('disposisi.*', 'sifat.sifat','roles.namarole','surat_masuk.nomorsurat','surat_masuk.prihal','surat_masuk.pengirim')
         ->get(); 
        
    	return view('ketua.viewdisposisi', compact('disposisi'));
    }

    public function editdisposisi($id){
        $dispo= Disposisi:: where('id',$id)->first();
        $editdispo= DB::table('disposisi')
        ->join('surat_masuk', 'disposisi.id_suratmasuk', '=', 'surat_masuk.id')
        ->join('sifat', 'disposisi.id_sifat', '=', 'sifat.id_sifat')
        ->join('roles', 'disposisi.id_role', '=', 'roles.id')
        ->select('disposisi.*', 'sifat.sifat','roles.namarole','surat_masuk.nomorsurat','surat_masuk.prihal','surat_masuk.pengirim')
        ->get();

        return view('ketua.editdisposisi',compact('dispo','editdispo'));
    }


}
