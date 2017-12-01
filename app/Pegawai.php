<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
  public function Sekolah()
  {
    return $this->belongsTo('App\Sekolah');
  }
}
