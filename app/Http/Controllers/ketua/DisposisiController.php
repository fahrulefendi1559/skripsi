<?php

namespace App\Http\Controllers\ketua;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\suratmasuk;
use App\suratmasuk_ex;
use App\Disposisi;
use App\Disposisiex;
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
         ->select('disposisi.*', 'sifat.sifat','roles.namarole','surat_masuk.nomorsurat','surat_masuk.id','surat_masuk.prihal','surat_masuk.pengirim')
         ->get(); 
        
         $disposisiex= DB::table('disposisi_ex')
         ->join('surat_masuk_ex', 'disposisi_ex.id_suratmasuk', '=', 'surat_masuk_ex.id')
         ->join('sifat', 'disposisi_ex.id_sifat', '=', 'sifat.id_sifat')
         ->join('roles', 'disposisi_ex.id_role', '=', 'roles.id')
         ->select('disposisi_ex.*', 'sifat.sifat','roles.namarole','surat_masuk_ex.nomorsurat','surat_masuk_ex.id','surat_masuk_ex.prihal','surat_masuk_ex.pengirim')
         ->get(); 
        
    	return view('ketua.viewdisposisi', compact('disposisi','disposisiex'));
    }

    public function viewpdf($id)
    {
        $file = suratmasuk::where('id', $id)->pluck('namafile')->first();
        // $filename = $request->namafile;
        $path = storage_path('app/'.$file);

        return response()->file($path);
    }

    public function viewpdfex($id)
    {
        $file = suratmasuk_ex::where('id', $id)->pluck('namafile')->first();
        // $filename = $request->namafile;
        $path = storage_path('app/'.$file);

        return response()->file($path);
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

    public function editdisposisiex($id)
    {
        $dispo= Disposisiex:: where('id',$id)->first();
        $role= Role::all();
        $sifatsurat= Sifat::all();

        return view('ketua.editdisposisiex')->with([
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

        return redirect('ketua/disposisi/viewdisposisi')->with('update','Disposisi Dirubah');
    }

    public function updatedisposisiex(Request $request,$id)
    {
        $disposisi = Disposisiex:: where('id', $id)->first();
        $disposisi->id_sifat = $request->id_sifat;
        $disposisi->id_role = $request->id_role;
        $disposisi->tgldispo = $request->tgldispo;
        $disposisi->catatan = $request->catatan;
        $disposisi->update();

        return redirect('ketua/disposisi/viewdisposisi')->with('update','Disposisi Dirubah');
    }




}
