<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Guru extends Model
{
    public function mapel(){
        return $this->HasMany('App\Mapel');
    }
}
