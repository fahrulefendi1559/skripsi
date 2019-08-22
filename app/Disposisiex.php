<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disposisiex extends Model
{
    protected $table= 'disposisi_ex';

    protected $primaryKey = 'id';

    protected $fillable= ['id_suratmasuk','id_sifat','id_role','tgldispo','catatan'];

    public function surat ()
    {
        return $this->belongsTo('App\suratmasuk');
    }

    public function user ()
    {
        return $this->belongsTo('App\User');
    }
}
