<?php

namespace App\Http\Controllers\ketua;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\suratmasuk;
use App\Disposisi;
use App\Sifat;
use App\Role;
use Illuminate\Support\Facades\Input;

class DisposisiController extends Controller
{
    public function viewdisposisi()
    {
        $disposisi= DB::table('disposisi')
         ->join('surat_masuk', 'disposisi.id_suratmasuk', '=', 'surat_masuk.id')
         ->join('sifat', 'disposisi.id_sifat', '=', 'sifat.id_sifat')
         ->join('roles', 'disposisi.id_role', '=', 'roles.id')
         ->select('disposisi.*', 'sifat.sifat','roles.namarole','surat_masuk.nomorsurat','surat_masuk.prihal','surat_masuk.pengirim')
         ->get(); 
        
    	return view('ketua.viewdisposisi', compact('disposisi'));
    }

    public function editdisposisi($id)
    {
        $dispo= Disposisi:: where('id',$id)->first();
        $role= Role::all();
        $sifatsurat= Sifat::all();

        return view('ketua.editdisposisi')->with([
            'dispo'        => $dispo,
            'sifatsurat'   => $sifatsurat,
            'role'         => $role
        ]);
    }

    public function updatedisposisi(Request $request,$id)
    {
        $disposisi = Disposisi:: where('id', $id)->first();
        $disposisi->id_sifat = $request->id_sifat;
        $disposisi->id_role = $request->id_role;
        $disposisi->tgldispo = $request->tgldispo;
        $disposisi->catatan = $request->catatan;
        $disposisi->update();

        return redirect('ketua/disposisi/viewdisposisi')->with('update','Surat Berhasil Teredit');
    }




}
