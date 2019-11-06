<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
  protected $fillable = ['apotek_id','namaobat','stok','harga'];

  public function user(){
  return $this->belongsTo('App\User');
  }
}
