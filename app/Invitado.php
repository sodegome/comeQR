<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitado extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function invitations(){
        return $this->hasMany('App\Invitation');
    }



}
