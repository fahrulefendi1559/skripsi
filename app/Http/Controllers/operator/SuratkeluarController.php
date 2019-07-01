<?php

namespace App\Http\Controllers\operator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Suratkeluar;
use App\Suratperiode;
use App\Filekeluar;
use App\Suratkeluarex;
use App\Filekeluarex;
use Storage;
use Response;
use PDF;
use DB;

class SuratkeluarController extends Controller
{
    public function getsuratkeluar(){
		$data_surat_keluar  = Suratkeluar::orderby('id','DESC')->paginate(5);
        $data_surat_keluar_ex= Suratkeluarex::orderby('id','DESC')->paginate(5);
        $datakeluar         = Suratkeluar::count();
        $suratperiode       = Suratperiode::all();
        $status             = DB::table('surat_keluar')->select('status')->get();
    	return view('operator.suratkeluar')->with([

            'data_surat_keluar' => $data_surat_keluar,
            'suratperiode'      => $suratperiode,
            'status'            =>  $status ,
            'cek_keluar'        => $datakeluar,
            'data_surat_keluar_ex'=> $data_surat_keluar_ex
        ]);
    }

    // awal dari controller internal surat keluar
    // controller insert data internal
    public function internal(Request $request){

    	$this->validate($request, [
            'id_periode'   => 'required',
            'nomorsurat'   => 'required',
            'pengirim'     => 'required',
            'penerima'     => 'required',
            'prihal'       => 'required',
            'lampiran'     => 'required',
            'tglsurat'     => 'required',
        ]);

        // $upload = new Suratkeluar();
        // $upload->id_periode = $request->id_periode;
        // $upload->nomorsurat = $request->nomorsurat;
        // $upload->pengirim   = $request->pengirim;
        // $upload->penerima   = $request->penerima;
        // $upload->prihal     = $request->prihal;
        // $upload->lampiran   = $request->lampiran;
        // $upload->tglsurat   = $request->tglsurat;
        // $upload->save();

        $upload = DB::table('surat_keluar')->insert([
            'id_periode'    => $request->input('id_periode'),
            'status'        => '0',
            'nomorsurat'    => $request->input('nomorsurat'),
            'pengirim'      => $request->input('pengirim'),
            'penerima'      => $request->input('penerima'),
            'prihal'        => $request->input('prihal'),
            'lampiran'      => $request->input('lampiran'),
            'tglsurat'      => $request->input('tglsurat'),
        ]);

        return redirect('operator/suratkeluar')->with('sukses','Data Berhasil Diinput');
    }

    // create file menyimpan data dan dokumen 
     public function createfile(Request $request){
        $this->validate($request, [
            'namafile'   => 'required'
        ]);
        DB::table('surat_keluar')->update([
            'status'        => '1'
        ]);
        // $file= Filekeluar::where('id', $id)->pluck('namafile')->all();
        $file= DB::table('filekeluar')->insert([
            'id_suratkeluar'=> $request->input('id_keluar'),
            'namafile' => $this->uploadFile($request)
        ]);
        return redirect('operator/suratkeluar')->with('sukses','Data Berhasil Diinput');    
    }

    protected function uploadFile($request){
        if ($request->hasFile('namafile')) {
            $file = $request->file('namafile');
            $originalFileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $filenameonly =pathinfo($originalFileName, PATHINFO_FILENAME);
            $filename = str_slug($filenameonly). "-".time().".". $extension;

            return $file ->storeAs('suratkeluar', $filename);
        }
        return null;
    }

    // edit data internal surat keluar
    public function edit($id){
		$keluar= Suratkeluar:: where('id',$id)->first();
  
        return view('operator.editsuratkeluar', compact('keluar','id'));
    }

    // update data internal surat keluar
    public function update(Request $request,$id){
    	if ($request->file('namafile')==null) {
            $filee="";
        }
        else{
             $filee= Suratkeluar::where('id', $id)->pluck('namafile')->all();
            Storage::delete($filee);
        }

        $keluar = Suratkeluar::where('id', $id)->first();
        $keluar->nomorsurat = $request->nomorsurat;
        $keluar->pengirim 	= $request->pengirim;
        $keluar->penerima 	= $request->penerima;
        $keluar->prihal 	= $request->prihal;
        $keluar->tglsurat 	= $request->tglsurat;
        // $keluar->namafile 	= $this->editFile($request);

        $keluar->save();
        return redirect()->route('opr.suratkeluar')->with('update', 'Data Berhasil Diupdate');

    }

    // bagian dari edit file
    // bagian ini sementara tidak dijalankan
    protected function editFile($request){
         if ($request->hasFile('namafile')) {
            $keluar 			= $request->file('namafile');
            $originalFileName 	= $keluar->getClientOriginalName();
            $extension 			= $keluar->getClientOriginalExtension();
            $filenameonly 		= pathinfo($originalFileName, PATHINFO_FILENAME);
            $filename 			= str_slug($filenameonly). "-".time().".". $extension;

            return $keluar ->storeAs('suratkeluar', $filename);
        }
        return null;
    }

    // delete data dan berkas yang disimpan 
    public function delete($id){
    	//delete file dalam path
        $file = Filekeluar::where('id_suratkeluar', $id)->pluck('namafile')->all();
        Storage::delete($file);

        //delete data pada database
        Suratkeluar::where('id',$id)->delete();
        return redirect('operator/suratkeluar')->with('delete','Data Berhasil Dihapus ');
    }
    
    // view pdf yang disimpan di path surat keluar 
    public function viewpdf($id){
        $file = Filekeluar::where('id_suratkeluar', $id)->pluck('namafile')->first();
        // $filename = $request->namafile;
        $path = storage_path('app/'.$file);

        return response()->file($path);
        
    }

    // create surat keluar dengan data surat yang ada didalam database surat keluar
    public function createsuratpdf(){
        $nomorsurat = DB::table('surat_keluar')->orderBy('id', 'DESC')->value('nomorsurat');
        $prihal = DB::table('surat_keluar')->orderBy('id', 'DESC')->value('prihal');
        $tglsurat = DB::table('surat_keluar')->orderBy('id', 'DESC')->value('tglsurat');
        $penerima = DB::table('surat_keluar')->orderBy('id', 'DESC')->value('penerima');
        $pengirim = DB::table('surat_keluar')->orderBy('id', 'DESC')->value('pengirim');


        $pdf = PDF::loadView('admin.createsuratpdf', compact('nomorsurat', 'prihal', 'tglsurat', 'penerima', 'pengirim'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('suratkeluar_'.date('Y-m-d_H-i-s').'.pdf');
    }
    // akhir dari controller surat keluar internal


    // awal dari controller surat keluar external
    // tambah data surat keluar external
    public function external(Request $request){

    	$this->validate($request, [
            'id_periode'   => 'required',
            'nomorsurat'   => 'required',
            'pengirim'     => 'required',
            'penerima'     => 'required',
            'prihal'       => 'required',
            'lampiran'     => 'required',
            'tglsurat'     => 'required',
        ]);


        $upload = DB::table('surat_keluar_ex')->insert([
            'id_periode'    => $request->input('id_periode'),
            'status'        => '0',
            'nomorsurat'    => $request->input('nomorsurat'),
            'pengirim'      => $request->input('pengirim'),
            'penerima'      => $request->input('penerima'),
            'prihal'        => $request->input('prihal'),
            'lampiran'      => $request->input('lampiran'),
            'tglsurat'      => $request->input('tglsurat'),
        ]);

        return redirect('operator/suratkeluar')->with('sukses','Data Berhasil Diinput');
    }

     // delete data dan berkas yang disimpan 
     public function delete_ex($id){
    	//delete file dalam path
        $file = Filekeluarex::where('id_suratkeluar_ex', $id)->pluck('namafile')->all();
        Storage::delete($file);
        
        //delete data pada database
        Suratkeluarex::where('id',$id)->delete();
        return redirect('operator/suratkeluar')->with('delete','Data Berhasil Dihapus ');
    }

    // edit data internal surat keluar
    public function edit_ex($id){
		$keluar_ex= Suratkeluarex:: where('id',$id)->first();
  
        return view('operator.editsuratkeluar_ex', compact('keluar_ex','id'));
    }

    // update data internal surat keluar
    public function update_ex(Request $request,$id){
    	// if ($request->file('namafile')==null) {
        //     $filee="";
        // }
        // else{
        //      $filee= Suratkeluarex::where('id', $id)->pluck('namafile')->all();
        //     Storage::delete($filee);
        // }

        $keluar_ex = Suratkeluarex::where('id', $id)->first();
        $keluar_ex->nomorsurat = $request->nomorsurat;
        $keluar_ex->pengirim = $request->pengirim;
        $keluar_ex->penerima = $request->penerima;
        $keluar_ex->prihal = $request->prihal;
        $keluar_ex->tglsurat = $request->tglsurat;
        // $keluar->namafile = $this->editFile($request);

        $keluar_ex->save();
        return redirect()->route('opr.suratkeluar')->with('update', 'Data Berhasil Diupdate');

    }

    // view pdf yang disimpan di path surat keluar 
    public function viewpdf_ex($id){
        $file = Filekeluarex::where('id_suratkeluar_ex', $id)->pluck('namafile')->first();
        // $filename = $request->namafile;
        $path = storage_path('app/'.$file);

        return response()->file($path);
        
    }

    // create file dan disimpan kedalam
    public function createfile_ex(Request $request){
        $this->validate($request, [
            'namafile'   => 'required'
        ]);
        DB::table('surat_keluar_ex')->update([
            'status'        => '1'
        ]);
        
        $file= DB::table('filekeluar_ex')->insert([
            'id_suratkeluar_ex'=> $request->input('id_keluar_ex'),
            'namafile' => $this->uploadFile_ex($request)
        ]);
        return redirect('operator/suratkeluar')->with('sukses','Data Berhasil Diinput');    
    }
    // untuk memberi nama file yang disimpan dan meletakkan direktori penyimpanan
    protected function uploadFile_ex($request){
        if ($request->hasFile('namafile')) {
            $file = $request->file('namafile');
            $originalFileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $filenameonly =pathinfo($originalFileName, PATHINFO_FILENAME);
            $filename = str_slug($filenameonly). "-".time().".". $extension;

            return $file ->storeAs('suratkeluar_ex', $filename);
        }
        return null;
    }




    // akhir dari controller surat keluar external



}
