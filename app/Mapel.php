<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Mapel extends Model
{
    public function guru(){
        return $this->belongsTo('App\Guru');
    }

    public function koneksi(){
        return $this->belongsToMany('App\Siswa','koneksi','mapel_id','siswa_id');
    } 
}
