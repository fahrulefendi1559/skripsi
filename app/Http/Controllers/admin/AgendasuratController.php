<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgendasuratController extends Controller
{
    public function agenda(){
    	return view('admin.agendasurat');
    }
}
