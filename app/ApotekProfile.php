<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApotekProfile extends Model
{
    protected $table = "apotek_profiles";

    protected $fillable = ['user_id','alamat','jam_buka','jam_tutup'];

    public function pengguna()
    {
      return $this->belongsTo('App\User');
    }
}
