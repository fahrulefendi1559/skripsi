<?php

namespace App\Http\Controllers\admin;
/*
 * File ini adalah Controller dari surat keluar dengan hak akses admin
 *
 * (C) Fahrul Efendi, Jurusan Ilmu Komputer Universitas Lampung
 *
 * Paket ini adalah Perangkat lunak yang tidak terbuka
 * untuk hak cipta dan lisensi penuh milik Badan Pelaksana Kuliah Kerja Nyata (BP-KKN) Universitas Lampung
 */
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use DB;
use App\Filekeluar;
use App\Filekeluarex;
use PDF;
use Response;
use Storage;
use App\Suratkeluar;
use App\Suratperiode;
use App\Suratkeluarex;
/**
 * class untuk surat keluar internal dan external
*/
class SuratkeluarController extends Controller
{
    // awal untuk surat keluar internal
    public function getsuratkeluar()
    {
        $data_surat_keluar  = Suratkeluar::orderby('id','DESC')->paginate(5);
        $data_surat_keluar_ex= Suratkeluarex::orderby('id','DESC')->paginate(5);
        $datakeluar         = Suratkeluar::count();
        $suratperiode       = Suratperiode::all();

        
    	return view('admin.suratkeluar')->with([
            'data_surat_keluar' => $data_surat_keluar,
            'suratperiode'      => $suratperiode,
            'cek_keluar'        => $datakeluar,
            'data_surat_keluar_ex'=> $data_surat_keluar_ex
        ]);
    }


    // fungsi untuk input data surat keluar internal
    public function internal (Request $request)
    {
        $this->validate($request, [
            'id_periode'   => 'required',       
            'nomorsurat'   => 'required',
            'pengirim'     => 'required',
            'penerima'     => 'required',
            'prihal'       => 'required',
            'lampiran'     => 'required',
            'tglsurat'     => 'required',
        ]);
        
        
        DB::table('surat_keluar')->insert([
            'id_periode'    => $request->input('id_periode'),
            'status'        => '0',
            'nomorsurat'    => $request->input('nomorsurat'),
            'pengirim'      => $request->input('pengirim'),
            'penerima'      => $request->input('penerima'),
            'prihal'        => $request->input('prihal'),
            'lampiran'      => $request->input('lampiran'),
            'tglsurat'      => $request->input('tglsurat'),
        ]);

        // data dari email
        $email="fahrulefendi46@gmail.com";
        $data= array(
            'email_body' => "Anda Memiliki File Surat Keluar Terbaru"    
        );

        // mengirim email ke alamat email kkn
        Mail::send('admin/email_templatekeluarinternal', $data, function($mail) use ($email){
            $mail->to($email, 'no-reply')
            ->subject('Surat Keluar Internal');
            $mail->from('fahrulefendi25@gmail.com','Surat Keluar Internal');
        });

        return redirect('admin/suratkeluar')->with('sukses','Data Berhasil Diinput');
    }

    
    // fungsi unti edit data surat keluar internal
    public function edit($id)
    {
        // variabel keluar digunakan untuk memanggil data dari surat keluar yang diedit berdasarkan id surat keluar internal
        $keluar= Suratkeluar:: where('id',$id)->first();
  
        return view('admin.editsuratkeluar', compact('keluar','id'));
    }

    // fungsi untuk update data dari surat keluar internal
    public function update(Request $request,$id)
    {
        if ($request->file('namafile')==null) 
        {
            $filee="";
        }
        else{
            $filee= Filekeluar::where('id', $id)->pluck('namafile')->all();
            Storage::delete($filee);
        }

        $keluar = Suratkeluar::where('id', $id)->first();
        $keluar->nomorsurat = $request->nomorsurat;
        $keluar->pengirim = $request->pengirim;
        $keluar->penerima = $request->penerima;
        $keluar->prihal = $request->prihal;
        $keluar->tglsurat = $request->tglsurat;
        $keluar->save();

        return redirect()->route('admin.suratkeluar')->with('update', 'Data Berhasil Diudate'
            );

    }

    // fungsi untuk menyimpan nama file kedalam database
    public function createfile(Request $request)
    {
        $this->validate($request, [
            'namafile'   => 'required'
        ]);
        // query untuk update data status surat keluar
        DB::table('surat_keluar')->update([
            'status'        => '1'
        ]);
        
        // variabel file digunakan untuk menampung data dari file dan kemudian akan memanggil fungsi upload file
        $file= DB::table('filekeluar')->insert([
            'id_suratkeluar'=> $request->input('id_keluar'),
            'namafile' => $this->uploadFile($request)
        ]);
        return redirect('admin/suratkeluar')->with('sukses','Data Berhasil Diinput');    
    }

    // fungsi upload file digunakan untuk upload file kedalam storage/app/suratkeluar
    protected function uploadFile($request)
    {
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

    // // edit file surat keluar
    // protected function editFile($request)
    // {
    //     if ($request->hasFile('namafile')) 
    //         {
    //             $keluar = $request->file('namafile');
    //             $originalFileName = $keluar->getClientOriginalName();
    //             $extension = $keluar->getClientOriginalExtension();
    //             $filenameonly =pathinfo($originalFileName, PATHINFO_FILENAME);
    //             $filename = str_slug($filenameonly). "-".time().".". $extension;

    //             return $keluar ->storeAs('suratkeluar', $filename);
    //         }
    //     return null;
    // }

    // hapus data dan file surat keluar
    public function destroy($id)
    {
        //delete file dalam path
        $file = Filekeluar::where('id_suratkeluar', $id)->pluck('namafile')->all();
        Storage::delete($file);

        //delete data pada database
        Suratkeluar::where('id',$id)->delete();
        return redirect('admin/suratkeluar')->with('delete','Data Berhasil Dihapus ');

    }

    // fungsi untuk melihat file yang tersimpan ke dalam path storage/app/suratkeluar
    public function viewpdf($id)
    {
        $file = Filekeluar::where('id_suratkeluar', $id)->pluck('namafile')->first();
        // $filename = $request->namafile;
        $path = storage_path('app/'.$file);

        return response()->file($path);
    }

    // fungsi untuk membuat file pdf berdasarkan data yang telah diinputkan
    public function createsuratpdf()
    {
        $nomorsurat = DB::table('surat_keluar')->orderBy('id', 'DESC')->value('nomorsurat');
        $prihal = DB::table('surat_keluar')->orderBy('id', 'DESC')->value('prihal');
        $tglsurat = DB::table('surat_keluar')->orderBy('id', 'DESC')->value('tglsurat');
        $penerima = DB::table('surat_keluar')->orderBy('id', 'DESC')->value('penerima');
        $pengirim = DB::table('surat_keluar')->orderBy('id', 'DESC')->value('pengirim');

        // variabel pdf digunakan untuk memanggil library PDF dan akan menampilkan tamplate dari surat keluar dengan ketentuan kertas a4 potrait
        $pdf = PDF::loadView('admin.createsuratpdf', compact('nomorsurat', 'prihal', 'tglsurat', 'penerima', 'pengirim'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('suratkeluar_'.date('Y-m-d_H-i-s').'.pdf');
    }
    // akhir dari surat keluar internal



    // awal dari surat keluar external
    public function external (Request $request)
    {
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

         // data dari email
         $email="fahrulefendi46@gmail.com";
         $data= array(
             'email_body' => "Anda Memiliki File Surat Keluar Terbaru"    
         );
 
         // mengirim email ke alamat email kkn
         Mail::send('admin/email_templatekeluarexternal', $data, function($mail) use ($email){
             $mail->to($email, 'no-reply')
             ->subject('Surat Keluar External');
             $mail->from('fahrulefendi25@gmail.com','Surat Keluar External');
         });

        return redirect('admin/suratkeluar')->with('sukses','Data Berhasil Diinput');
    }

    // create file external
    public function createfile_ex(Request $request)
    {
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
        return redirect('admin/suratkeluar')->with('sukses','Data Berhasil Diinput');    
    }

    // untuk memberi nama file yang disimpan dan meletakkan direktori penyimpanan
    protected function uploadFile_ex($request)
    {
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

    // delete file and data external
    public function destroy_ex($id)
    {
        //delete file dalam path
        $file = Filekeluarex::where('id_suratkeluar_ex', $id)->pluck('namafile')->all();
        Storage::delete($file);

        //delete data pada database
        Suratkeluarex::where('id',$id)->delete();
        return redirect('admin/suratkeluar')->with('delete','Data Berhasil Dihapus ');

    }

    // view pdf external
    public function viewpdf_ex($id)
    {
        $file = Filekeluarex::where('id_suratkeluar_ex', $id)->pluck('namafile')->first();
        $path = storage_path('app/'.$file);

        return response()->file($path);
    }

    // create pdf suratkeluar external
    public function createsuratpdf_ex()
    {
        $nomorsurat = DB::table('surat_keluar')->orderBy('id', 'DESC')->value('nomorsurat');
        $prihal = DB::table('surat_keluar')->orderBy('id', 'DESC')->value('prihal');
        $tglsurat = DB::table('surat_keluar')->orderBy('id', 'DESC')->value('tglsurat');
        $penerima = DB::table('surat_keluar')->orderBy('id', 'DESC')->value('penerima');
        $pengirim = DB::table('surat_keluar')->orderBy('id', 'DESC')->value('pengirim');


        $pdf = PDF::loadView('admin.createsuratpdf', compact('nomorsurat', 'prihal', 'tglsurat', 'penerima', 'pengirim'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('suratkeluar_'.date('Y-m-d_H-i-s').'.pdf');
    }

    // fungsi untuk edit data berdasarkan id
    public function edit_ex($id)
    {
        $keluar_ex= Suratkeluarex:: where('id',$id)->first();
  
        return view('admin.editsuratkeluar_ex', compact('keluar_ex','id'));
    }

    // update data surat keluar external
    public function update_ex(Request $request,$id)
    {
        $keluar_ex = Suratkeluarex::where('id', $id)->first();
        $keluar_ex->nomorsurat = $request->nomorsurat;
        $keluar_ex->pengirim = $request->pengirim;
        $keluar_ex->penerima = $request->penerima;
        $keluar_ex->prihal = $request->prihal;
        $keluar_ex->tglsurat = $request->tglsurat;
        $keluar_ex->save();
        return redirect()->route('admin.suratkeluar')->with('update', 'Data Berhasil Diudate'
            );

    }


}
// polymorphism sesuatu yang memiliki banyak bentuk, modul yang memiliki nama sama tapi behavior yang berbeda
// membuat interface Perkebunan