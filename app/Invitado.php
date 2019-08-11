<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitado extends Model
{


     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','last_name', 'email', 'type_id','identification','cell', 'user_id','state'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function invitations(){
        return $this->hasMany('App\Invitation')->orderBy('state');
    }



}
