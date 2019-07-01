<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suratkeluar extends Model
{
    protected $table= 'surat_keluar';
    protected $fillable= ['nomorsurat','pengirim','penerima','prihal','lampiran','tglsurat'];

    public function FileKeluar ()
    {
        return $this->belongsTo('App\FileKeluar');
    }
}
