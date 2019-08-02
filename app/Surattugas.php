<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surattugas extends Model
{
    protected $table= 'surat_tugas';
    protected $fillable= ['nomorsurat','prihal', 'tglsurat','kabupaten','kecamatan','desa','namafile'];

   
}
