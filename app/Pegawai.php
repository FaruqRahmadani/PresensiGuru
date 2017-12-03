<?php

namespace App;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
  public function Sekolah()
  {
    return $this->belongsTo('App\Sekolah');
  }

  public function getTanggalLahirAttribute($value)
  {
    return Carbon::parse($value)->format('d F Y');
  }
}
