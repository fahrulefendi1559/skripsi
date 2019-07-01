<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filekeluarex extends Model
{
    protected $table= 'filekeluar_ex';
    protected $fillable= ['id_keluar','namafile'];

    public function Suratkeluar ()
    {
        return $this->belongsTo('App\Suratkeluar');
    }
}
