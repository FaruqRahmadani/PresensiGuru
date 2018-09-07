<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use HCrypt;

class User extends Authenticatable
{
  use Notifiable;

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'nama', 'username', 'password', 'email', 'foto', 'tipe', 'sekolah_id'
  ];

  /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
  protected $hidden = [
    'password', 'remember_token',
  ];

  public function Sekolah(){
    return $this->belongsTo('App\Sekolah');
  }

  public function getUUIDAttribute($value){
    return HCrypt::Encrypt($this->id);
  }
  
  public function setPasswordAttribute($value){
    if ($value) {
      $this->attributes['password'] = bcrypt($value);
    }
  }
}
