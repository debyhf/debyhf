<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Siswa extends Model
{
    public function koneksi()
{
        return $this->belongsToMany('App\Mapel','koneksi','siswa_id','mapel_id');
    }
    public function ortu(){
        return $this->belongsTo('App\Ortu','ortu_id');
    }
}
