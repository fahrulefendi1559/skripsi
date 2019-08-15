<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class suratmasuk_ex extends Model
{
    protected $table= 'surat_masuk_ex';
    protected $fillable= ['nomorsurat','pengirim','penerima','prihal','tglsurat','tglterima','namafile'];
}
