<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Role;
use App\User;
use App\register;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;

class UsersController extends Controller
{

	use RegistersUsers;


    public function index(){
        $data_user= DB::table('users')
        ->join('roles', 'users.roles_id', '=', 'roles.id')
        ->select('users.*', 'roles.namarole')
        ->get(); 


    	$role = Role::all();
    	return view('admin.daftaruser')->with([
    		'data_user'=>$data_user,
    		'role'     => $role
    	]);
    }


    public function create_user(Request $data)
    {
    	$this->validate($data, [
    		'username' => 'required',
    		'roles_id' => 'required',
    		'name'     => 'required',
    		'email'    => 'required',
    		'password' => 'required',
    	]);

    	$user = User::create([
    		'username'    => request()->get('username'),
    		'roles_id'    => request()->get('roles_id'),
    		'name'        => request()->get('name'),
    		'email'       => request()->get('email'),
    		'password'    => bcrypt(request()->get('password')),
    	]);

    	$user->save();
    	return redirect()->route('createuser')->with('sukses','Data Berhasil diinput');

    }

    public function edit($id){
        $edituser= User::where('id',$id)->first();
        return view('admin.edituser', compact('edituser','id'));
    }

    public function update(Request $request){

        $this->validate($request, [
            'name'           => 'required',
            'username'       => 'required',
            'email'          => 'required',
        ]);

        Auth::User()->update([
            'name'      => $request->name,
            'username'  => $request->username,
            'email'     => $request->email
        ]);

        return redirect('admin/registerusers')->with('update','Data Berhasil Diupdate');

    }

    public function delete($id){
        DB:: table('users')->where('id',$id)->delete();
        return back()->with('delete','Berhasil Hapus Data');
    }
}
