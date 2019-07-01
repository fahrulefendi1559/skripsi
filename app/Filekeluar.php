<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filekeluar extends Model
{
    protected $table= 'filekeluar';
    protected $fillable= ['id_keluar','namafile'];

    public function Suratkeluar ()
    {
        return $this->belongsTo('App\Suratkeluar');
    }
}
