<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Frecuencia extends Model
{
    protected $fillable = [
        'hora_desde','hora_hasta', 'lunes', 'martes','miercoles','jueves', 'viernes','sabado','domingo'
    ];

    public function invitacion(){
        return $this->hasOne('App\Invitation');
    }

    
}
