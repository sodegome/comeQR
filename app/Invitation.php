<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Invitation extends Model
{

    protected $fillable = [
                'serialQR','placa_vehiculo', 'fecha_desde', 'fecha_hasta','hora_desde','hora_hasta', 'state','invitado_id','fecha_ingreso'
    ];
  
    public function invitado(){
        return $this->belongsTo('App\Invitado');
    }
    
}
