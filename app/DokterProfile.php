<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DokterProfile extends Model
{
  protected $primaryKey = 'profileid';
  protected $table = "dokter_profiles";

  protected $fillable = ['user_id','alamatdinas','nip','no_hp'];

  public function pengguna()
  {
    return $this->belongsTo('App\User');
  }
}
