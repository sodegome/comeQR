<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Frecuencia extends Model
{
     
    

    protected $fillable = [
        'hora_desde','hora_hasta', 'lunes', 'martes','miercoles','jueves', 'viernes','sabado','domingo'
    ];

    public function invitacion(){
        return $this->hasOne('App\Invitation');
    }

    public function checkTime(){
        $days_dias = array(
            'Monday'=>'lunes',
            'Tuesday'=>'martes',
            'Wednesday'=>'miercoles',
            'Thursday'=>'jueves',
            'Friday'=>'viernes',
            'Saturday'=>'sabado',
            'Sunday'=>'domingo'
       );
       setLocale(LC_ALL,"es_ES", 'Spanish_Spain', 'Spanish');
       $day = Carbon::now()->formatLocalized('%A');
       $dia = $days_dias[$day];

       $now = date('H:i:s');
       $atdesde = strtotime($this->hora_desde) < strtotime($now); 
       $athasta = strtotime($this->hora_hasta) > strtotime($now);     

       $atTime = $atdesde && $athasta && $this->attributes[$dia]=='S'; 
       
       return $atTime ? true : false;
       
    }

  


    
}
