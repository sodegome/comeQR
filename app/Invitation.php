<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Invitation extends Model
{

    protected $fillable = [
                'serial','placa_vehiculo', 'fecha_desde', 'fecha_hasta', 'state','invitado_id','frecuencia_id'
    ];
  
    public function invitado(){
        return $this->belongsTo('App\Invitado');
    }

    public function ingresos(){
        return $this->hasMany('App\Ingreso');
    }

    public function frecuencia(){
        return $this->belongsTo('App\Frecuencia');
    }
    
}
