<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Casa extends Model
{
    protected $fillable = [
        'manzana','villa', 'telefono'
    ];
    public function users(){
        return $this->hasMany('App\User');
    }






}
