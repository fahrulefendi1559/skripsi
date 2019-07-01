<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    protected $table= 'disposisi';

    protected $primaryKey = 'id';

    protected $fillable= ['id_suratmasuk','user_id','diteruskan','isi_disposisi','batas_waktu','catatan'];

    public function surat ()
    {
        return $this->belongsTo('App\suratmasuk');
    }

    public function user ()
    {
        return $this->belongsTo('App\User');
    }
}
