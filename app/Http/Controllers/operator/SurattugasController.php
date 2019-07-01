<?php

namespace App\Http\Controllers\operator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SurattugasController extends Controller
{
    public function getsurattugas(){
    return view('operator/surattugas');
    }
}
