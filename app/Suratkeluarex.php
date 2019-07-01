<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suratkeluarex extends Model
{
    protected $table= 'surat_keluar_ex';
    protected $fillable= ['nomorsurat','pengirim','penerima','prihal','lampiran','tglsurat'];

    public function FileKeluar ()
    {
        return $this->belongsTo('App\FileKeluarex');
    }
}
