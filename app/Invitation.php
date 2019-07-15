<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    public function invitado(){
        return $this->belongsTo('App\Invitado');
    }
}
