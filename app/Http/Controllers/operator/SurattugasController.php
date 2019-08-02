<?php

namespace App\Http\Controllers\operator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;

use App\Surattugas;
use App\Suratperiode;
use App\Jenistugas;
use PDF;
use DB;
use Storage;

class SurattugasController extends Controller
{
    public function getsurattugas(){
        $surat_tugas    = Surattugas::orderBy('id','DESC')->paginate(10);
        $suratperiode   = Suratperiode::all();
        $jenis_tugas    = Jenistugas::all();

    	return view('operator/surattugas')->with([
            'surat_tugas'      => $surat_tugas,
            'suratperiode'     => $suratperiode,
            'jenis_tugas'      => $jenis_tugas
        ]);

    }


    public function create_surat_tugas(Request $request){
    	$this->validate($request, [
            'id_periode'   => 'required',
            'id_tugas'     => 'required',
    		'nomorsurat'   => 'required',
    		'prihal'       => 'required',
    		'tglsurat'     => 'required',
    		'kabupaten'    => 'required',
            'kecamatan'    => 'required',
            'desa'         => 'required'
    	]);

        $upload = DB::table('surat_tugas')->insert([
            'id_periode'    => $request->input('id_periode'),
            'id_tugas'      => $request->input('id_tugas'),
            'nomorsurat'    => $request->input('nomorsurat'),
            'prihal'        => $request->input('prihal'),
            'tglsurat'      => $request->input('tglsurat'),
            'kabupaten'     => $request->input('kabupaten'),
            'kecamatan'     => $request->input('kecamatan'),
            'desa'          => $request->input('desa'),
            'namafile'      => $this->uploadFile($request)
        ]);

        // data dari email
        $email="fahrulefendi46@gmail.com";
        $data= array(
            'email_body' => "Anda Memiliki File Surat Tugas Terbaru"    
        );

        // mengirim email ke alamat email kkn
        Mail::send('operator/emailtugas', $data, function($mail) use ($email){
            $mail->to($email, 'no-reply')
            ->subject('Surat Tugas');
            $mail->from('fahrulefendi25@gmail.com','Surat Tugas Baru');
        });

        
        return redirect('operator/surattugas')->with('sukses','Data Berhasil Diinput');
    }


    protected function uploadFile($request){
        if ($request->hasFile('namafile')) {
            $upload           = $request->file('namafile');
            $originalFileName = $upload->getClientOriginalName();
            $extension        = $upload->getClientOriginalExtension();
            $filenameonly     = pathinfo($originalFileName, PATHINFO_FILENAME);
            $filename         = str_slug($filenameonly). "-".time().".". $extension;

            return $upload ->storeAs('surattugas', $filename);
        }
        return null;
    }


    public function edit($id){
        $surattugas= Surattugas:: where('id',$id)->first();
        return view('operator.editsurattugas', compact('surattugas','id'));
    }

    public function update(Request $request,$id){
        $tugas = Surattugas:: where('id', $id)->first();
        $tugas->nomorsurat = $request->nomorsurat;
        $tugas->prihal = $request->prihal;
        $tugas->tglsurat = $request->tglsurat;
        $tugas->kabupaten = $request->kabupaten;
        $tugas->kecamatan = $request->kecamatan;
        $tugas->desa= $request->desa;
        $tugas->save();
        return redirect()->route('operator.tugas')->with('update','Data Berhasil Diupdate');

    }

    public function delete($id){
        //delete file dalam path
        $file = Surattugas::where('id', $id)->pluck('namafile')->all();
        Storage::delete($file);

        //delete data pada database
        Surattugas::where('id',$id)->delete();

        return redirect('operator/surattugas')->with('delete','Data Berhasil Dihapus ');
    }

    public function viewpdf($id){
        $file = Surattugas::where('id', $id)->pluck('namafile')->first();
        // $filename = $request->namafile;
        $path = storage_path('app/'.$file);

        return response()->file($path);

    }
}
