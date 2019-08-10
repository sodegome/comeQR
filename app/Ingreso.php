<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $fillable = [
        'fecha_ingreso'
    ];
    
    public function invitacion(){
        return $this->belongsTo('App\Invitation');
    }
}
