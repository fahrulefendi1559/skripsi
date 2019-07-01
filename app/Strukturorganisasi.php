<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Strukturorganisasi extends Model
{
    protected $table= 'struktur_organisasi';
    protected $fillable= ['nama_struktur'];
}
