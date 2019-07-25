<?php

namespace App\Http\Controllers\operator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\suratmasuk;
use App\Suratperiode;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

class SuratMasukController extends Controller
{
    public function getsuratmasuk(){
    	$data_surat_masuk= suratmasuk::orderBy('id','DESC')->paginate(10);
        $suratperiode    = Suratperiode::all();
    	return view('operator.suratmasuk')->with([
            'data_surat_masuk'=>$data_surat_masuk,
            'suratperiode'    =>$suratperiode
        ]);
    }

    public function create_surat_masuk(Request $request){
    	$this->validate($request,[
            'id_periode'   => 'required',	
    		'nomorsurat'   => 'required',
    		'pengirim'     => 'required',
    		'penerima'     => 'required',
    		'prihal'       => 'required',
    		'tglsurat'     => 'required',
    		'tglterima'    => 'required',
    		'namafile'     => 'required',
    	]);

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

        // data dari email
        $email="fahrulefendi46@gmail.com";
        $data= array(
            'email_body' => "Anda Memiliki File Surat Masuk Terbaru"    
        );

        // mengirim email ke alamat email kkn
        Mail::send('admin/email_template', $data, function($mail) use ($email){
            $mail->to($email, 'no-reply')
            ->subject('Surat Masuk');
            $mail->from('fahrulefendi25@gmail.com','Surat Masuk Baru');
        });
        
        return redirect('operator/suratmasuk')->with('sukses','Data Berhasil Diinput');
    }

    protected function uploadFile($request){
    	 if ($request->hasFile('namafile')) {
            $upload 		  = $request->file('namafile');
            $originalFileName = $upload->getClientOriginalName();
            $extension 		  = $upload->getClientOriginalExtension();
            $filenameonly 	  = pathinfo($originalFileName, PATHINFO_FILENAME);
            $filename 		  = str_slug($filenameonly). "-".time().".". $extension;

            return $upload ->storeAs('suratmasuk', $filename);
        }
        return null;
    }

    public function edit($id){
    	$suratmasuk= suratmasuk:: where('id',$id)->first();
        return view('operator.editsuratmasuk', compact('suratmasuk','id'));
    }

    public function update(Request $request,$id){
        if ($request->file('namafile')==null) {
            $file="";
        }else{
            $filee= suratmasuk::where('id', $id)->pluck('namafile')->all();
            Storage::delete($filee);
        }

        $masuk = suratmasuk:: where('id', $id)->first();
        $masuk->nomorsurat	 = $request->nomorsurat;
        $masuk->pengirim	 = $request->pengirim;
        $masuk->penerima 	 = $request->penerima;
        $masuk->prihal 		 = $request->prihal;
        $masuk->tglsurat 	 = $request->tglsurat;
        $masuk->namafile 	 = $this->editFile($request);

        $masuk->save();
        return redirect()->route('opr.getsuratmasuk')->with('update','Data Berhasil Diupdate');

    }

    protected function editFile($request){
        if ($request->hasFile('namafile')) {
            $masuk 			  = $request->file('namafile');
            $originalFileName = $masuk->getClientOriginalName();
            $extension 		  = $masuk->getClientOriginalExtension();
            $filenameonly 	  = pathinfo($originalFileName, PATHINFO_FILENAME);
            $filename 		  = str_slug($filenameonly). "-".time().".". $extension;

            return $masuk ->storeAs('suratmasuk', $filename);
        }
        return null;
    }

    public function delete($id){
    	// delete file dalam path storage
    	$file = suratmasuk::where('id', $id)->pluck('namafile')->all();
        Storage::delete($file);

        //delete data pada database
        suratmasuk::where('id',$id)->delete();

        return redirect('operator/suratmasuk')->with('delete','Data Berhasil Dihapus ');
    }

    public function viewpdf($id){
        $file = suratmasuk::where('id', $id)->pluck('namafile')->first();
        // $filename = $request->namafile;
        $path = storage_path('app/'.$file);

        return response()->file($path);

    }

    
}
