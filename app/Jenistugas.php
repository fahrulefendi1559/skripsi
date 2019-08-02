<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenistugas extends Model
{
    protected $table= 'jenis_tugas';
    protected $fillable= ['id_jenis_tugas','nama_tugas'];

}
