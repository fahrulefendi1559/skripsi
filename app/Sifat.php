<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sifat extends Model
{
    protected $table= 'sifat';
    protected $fillable= ['sifat'];

    public function Disposisi ()
    {
        return $this->belongsTo('App\Disposisi');
    }
}
