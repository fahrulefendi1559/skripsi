<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Detailstruktur;
use App\Strukturorganisasi;
use DB;

class StrukturorganisasiController extends Controller
{
   // query untuk menampilkan data dari database
   public function list(){

      $data= DB::table('users')
      ->join('roles', 'users.roles_id', '=', 'roles.id')
      ->select('users.*', 'roles.namarole')
      ->get(); 
      
      // $datasekretaris= DB::table('detail_struktur')
      //    ->join('struktur_organisasi', 'detail_struktur.id_struktur_organisasi', '=', 'struktur_organisasi.id_struktur')
      //    ->select('detail_struktur.*', 'struktur_organisasi.nama_struktur')
      //    ->where('id_detail_struktur','2')
      //    ->get();
         
      // $datakrt= DB::table('detail_struktur')
      //    ->join('struktur_organisasi', 'detail_struktur.id_struktur_organisasi', '=', 'struktur_organisasi.id_struktur')
      //    ->select('detail_struktur.*', 'struktur_organisasi.nama_struktur')
      //    ->where('id_detail_struktur','3')
      //    ->get(); 
      
      // $datapenpel= DB::table('detail_struktur')
      //    ->join('struktur_organisasi', 'detail_struktur.id_struktur_organisasi', '=', 'struktur_organisasi.id_struktur')
      //    ->select('detail_struktur.*', 'struktur_organisasi.nama_struktur')
      //    ->where('id_detail_struktur','4')
      //    ->get();

      // $dataop= DB::table('detail_struktur')
      //    ->join('struktur_organisasi', 'detail_struktur.id_struktur_organisasi', '=', 'struktur_organisasi.id_struktur')
      //    ->select('detail_struktur.*', 'struktur_organisasi.nama_struktur')
      //    ->where('id_detail_struktur','5')
      //    ->get(); 
      
      // $datapengker= DB::table('detail_struktur')
      //    ->join('struktur_organisasi', 'detail_struktur.id_struktur_organisasi', '=', 'struktur_organisasi.id_struktur')
      //    ->select('detail_struktur.*', 'struktur_organisasi.nama_struktur')
      //    ->where('id_detail_struktur','6')
      //    ->get();
      
      // $datati= DB::table('detail_struktur')
      //    ->join('struktur_organisasi', 'detail_struktur.id_struktur_organisasi', '=', 'struktur_organisasi.id_struktur')
      //    ->select('detail_struktur.*', 'struktur_organisasi.nama_struktur')
      //    ->where('id_detail_struktur','7')
      //    ->get(); 
      
      // $dataeval= DB::table('detail_struktur')
      //    ->join('struktur_organisasi', 'detail_struktur.id_struktur_organisasi', '=', 'struktur_organisasi.id_struktur')
      //    ->select('detail_struktur.*', 'struktur_organisasi.nama_struktur')
      //    ->where('id_detail_struktur','8')
      //    ->get();
         
      // $struktur= DB::table('detail_struktur')
      // ->join('struktur_organisasi', 'detail_struktur.id_struktur_organisasi', '=', 'struktur_organisasi.id_struktur')
      // ->select('detail_struktur.*', 'struktur_organisasi.nama_struktur')
      // ->get(); 
      
      // $suratperiode    = Strukturorganisasi::all();

     return view('admin.strukturorganisasi')->with([
          'data'         => $data,
         
      ]);
   }

   // mengalihkan tampilan ke tampilan edit
   public function edit($id_detail_struktur){
      $struktur= Detailstruktur:: where('id_detail_struktur',$id_detail_struktur)->first();
      return view('admin.editstruktur', compact('struktur','id_detail_struktur'));
   }

   public function updateketua(Request $request){
      DB::table('detail_struktur')->where('id_detail_struktur',$request->id)->update([
         'nama' => $request->nama,
         'nip' => $request->nip
      ]);

      
      return redirect()->route('admin.struktur')->with('update', 'Data Berhasil Diupdate'
            );
   }
}
