<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\suratmasuk;
use App\Disposisi;
use App\Suratperiode;
use Storage;
use DB;
use Illuminate\Support\Facades\Input;


class SuratmasukController extends Controller
{
    public function getsuratmasuk(){
    	$data_surat_masuk= suratmasuk::orderBy('id','DESC')->paginate(10);
        $suratperiode    = Suratperiode::all();

    	return view('admin.suratmasuk')->with([
            'data_surat_masuk' => $data_surat_masuk,
            'suratperiode'     => $suratperiode,
        ]);
    }

    public function create_surat_masuk(Request $request){
    	$this->validate($request, [
            'id_periode'   => 'required',
    		'nomorsurat'   => 'required',
    		'pengirim'     => 'required',
    		'penerima'     => 'required',
    		'prihal'       => 'required',
    		'tglsurat'     => 'required',
    		'tglterima'    => 'required',
    		'namafile'     => 'required',
    	]);



        // $upload = new suratmasuk();
        // $upload->id_periode = $request->id_periode;
        // $upload->nomorsurat = $request->nomorsurat;
        // $upload->pengirim   = $request->pengirim;
        // $upload->penerima   = $request->penerima;
        // $upload->prihal     = $request->prihal;
        // $upload->tglsurat   = $request->tglsurat;
        // $upload->tglterima  = $request->tglterima;
        // $upload->namafile   = $this->uploadFile($request);
        // $upload->save();

        $upload = DB::table('surat_masuk')->insert([
            'id_periode'    => $request->input('id_periode'),
            'status'        => '1',
            'nomorsurat'    => $request->input('nomorsurat'),
            'pengirim'      => $request->input('pengirim'),
            'penerima'      => $request->input('penerima'),
            'prihal'        => $request->input('prihal'),
            'tglsurat'      => $request->input('tglsurat'),
            'tglterima'     => $request->input('tglterima'),
            'namafile'      => $this->uploadFile($request)
        ]);
        
        return redirect('admin/suratmasuk')->with('sukses','Data Berhasil Diinput');
    }

    protected function uploadFile($request){
        if ($request->hasFile('namafile')) {
            $upload           = $request->file('namafile');
            $originalFileName = $upload->getClientOriginalName();
            $extension        = $upload->getClientOriginalExtension();
            $filenameonly     = pathinfo($originalFileName, PATHINFO_FILENAME);
            $filename         = str_slug($filenameonly). "-".time().".". $extension;

            return $upload ->storeAs('suratmasuk', $filename);
        }
        return null;
    }


    public function editsuratmasuk($id){
        $suratmasuk= suratmasuk:: where('id',$id)->first();
        return view('admin.editsuratmasuk', compact('suratmasuk','id'));
    }

    public function update(Request $request,$id){
        if ($request->file('namafile')==null) {
            $file="";
        }else{
            $filee= suratmasuk::where('id', $id)->pluck('namafile')->all();
            Storage::delete($filee);
        }

        $masuk = suratmasuk:: where('id', $id)->first();
        $masuk->nomorsurat = $request->nomorsurat;
        $masuk->pengirim = $request->pengirim;
        $masuk->penerima = $request->penerima;
        $masuk->prihal = $request->prihal;
        $masuk->tglsurat = $request->tglsurat;
        $masuk->namafile = $this->editFile($request);

        $masuk->save();
        return redirect()->route('admin.suratmasuk')->with('update','Data Berhasil Diupdate');

    }

    protected function editFile($request){
        if ($request->hasFile('namafile')) {
            $masuk = $request->file('namafile');
            $originalFileName = $masuk->getClientOriginalName();
            $extension = $masuk->getClientOriginalExtension();
            $filenameonly =pathinfo($originalFileName, PATHINFO_FILENAME);
            $filename = str_slug($filenameonly). "-".time().".". $extension;

            return $masuk ->storeAs('suratmasuk', $filename);
        }
        return null;
    }



    public function delete_surat_masuk($id){
        //delete file dalam path
        $file = suratmasuk::where('id', $id)->pluck('namafile')->all();
        Storage::delete($file);

        //delete data pada database
        suratmasuk::where('id',$id)->delete();

        return redirect('admin/suratmasuk')->with('delete','Data Berhasil Dihapus ');
    }

    public function viewpdf($id){
        $file = suratmasuk::where('id', $id)->pluck('namafile')->first();
        // $filename = $request->namafile;
        $path = storage_path('app/'.$file);

        return response()->file($path);

    }

} 