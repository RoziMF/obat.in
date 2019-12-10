<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $primaryKey = 'orderid';

    public function med(){
      return $this->hasMany('App\Obat');
    }

    public function user(){
    return $this->belongsTo('App\User');
    }
}
