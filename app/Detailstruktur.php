<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detailstruktur extends Model
{
    protected $table= 'detail_struktur';
    protected $fillable= ['	id_struktur_organisasi','nama','nip'];

    // public function Suratkeluar ()
    // {
    //     return $this->belongsTo('App\Suratkeluar');
    // }
}
