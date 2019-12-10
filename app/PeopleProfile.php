<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeopleProfile extends Model
{
  protected $primaryKey = 'profileid';
  protected $table = "people_profiles";

  protected $fillable = ['user_id','alamat','tgl_lahir','no_hp'];

  public function pengguna()
  {
    return $this->belongsTo('App\User');
  }
}
