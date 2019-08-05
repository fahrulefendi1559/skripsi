<?php

namespace App\Http\Controllers\ketua;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use App\suratmasuk;
use App\Suratkeluar;
use App\Sifat;
use App\Disposisi;
use App\Role;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
  /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexHome(){

        $Tahun=DB::table('surat_periode')->orderBy('id_periode', 'DESC')->value('tahun');
        $Periode=DB::table('surat_periode')->orderBy('id_periode', 'DESC')->value('periode');
        $IDPeriode=DB::table('surat_periode')->orderBy('id_periode', 'DESC')->value('id_periode');

        $countsurat=DB::table('surat_masuk')
        ->where('id_periode', $IDPeriode)
        ->count();

        $countkeluar=DB::table('surat_keluar')
        ->where('id_periode', $IDPeriode)
        ->count();

        $countkeluarex=DB::table('surat_keluar_ex')
        ->where('id_periode', $IDPeriode)
        ->count();

        $counttugas=DB::table('surat_tugas')
        ->where('id_periode', $IDPeriode)
        ->count();

        $disposisi= DB::table('surat_masuk')
        ->where('status', "1")
        ->count();

        $asalsurat=DB::table('surat_masuk')->value('pengirim');
        $prihal=DB::table('surat_masuk')->value('prihal');

 
        $datasuratmasuk = suratmasuk::where('status', "1")->get();

    	return view('ketua.home')->with([

            'Tahun'         => $Tahun,
            'countsurat'    => $countsurat,
            'countkeluar'   => $countkeluar,
            'disposisi'     => $disposisi,
            'datasuratmasuk'=> $datasuratmasuk,
            'Periode'       => $Periode,
            'asalsurat'     => $asalsurat,
            'countkeluarex' => $countkeluarex,
            'counttugas'    => $counttugas,
            'prihal'        => $prihal
    
        ]);
    }

    public function dispo($id){
        $sifatsurat = Sifat::all();
        $masuk      = suratmasuk:: where('id',$id)->first();
        $roles      = Role::all();  
        return view('ketua.disposisi', compact('sifatsurat', 'id','masuk','roles'));
    }

    public function send(Request $request){
        
        DB::table('surat_masuk')->where('id', $request->input('id_suratmasuk'))->update([
            'status'        => '0'
        ]);

        $a  = DB::table('disposisi')->insert([
            'id_suratmasuk'=> $request->input('id_suratmasuk'),
            'id_sifat'     => $request->input('id_sifat'),
            'id_role'      => $request->input('id_role'),
            'tgldispo'     => $request->input('tgldispo'),
            'catatan'      => $request->input('catatan')
          ]);

          
        // $b=User::all();

        // if($b->roles_id = 2)
        // {
        //     $email=User::select('email')->where('roles_id','2');
        //     $data= array(
        //         'email_body' => "Anda Memiliki File Surat Masuk Terbaru"    
        //     );

        //     // mengirim email ke alamat email kkn
        //     Mail::send('ketua/emailtemplate', $data, function($mail) use ($email){
        //         $mail->to($email, 'no-reply')
        //         ->subject('Surat Masuk');
        //         $mail->from('fahrulefendi25@gmail.com','Surat Masuk Baru');
        //     });
        //  }


        return redirect('ketua/home')->with('sukses','Surat Berhasil Didisposisikan');
    }
    
}
