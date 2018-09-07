<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use HCrypt;

class Status extends Model
{
  protected $fillable = ['nama_status'];

  public function Sekolah(){
    return $this->hasMany('App\Sekolah');
  }

  public function getUUIDAttribute($value){
    return HCrypt::Encrypt($this->id);
  }
}
