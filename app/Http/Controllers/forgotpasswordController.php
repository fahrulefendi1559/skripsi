<?php

namespace App\Http\Controllers;
use App\User;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class forgotpasswordController extends Controller
{
    public function forgot(Request $request)
   {    date_default_timezone_set("Asia/Jakarta");

        if ($request->input('pw1') == $request->input('pw2')) {
                DB::table('users')->where('username', Auth::user()->username)->update([
                        'password'          => bcrypt($request->input('pw1')),
                        'updated_at'        => date("Y-m-d H:i:s")
                        ]);
                return back()->with('message', "Password Berhasil di Ganti");
        } else {
                return back()->with('messagee', "Password & Password Konfirmasi Harus Sama");
        }
}
}
