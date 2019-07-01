<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suratperiode extends Model
{
    protected $table='surat_periode';
    protected $fillable= ['periode','tahun'];
}
