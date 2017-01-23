<?php

namespace suvinando;

use Illuminate\Database\Eloquent\Model;

class Family extends Model {

  protected $fillable = array('description','name');
  protected $guarded = ['id'];

  public function invoices() {
    return $this->hasMany('suvinando\Invoice');
  }

  public function users() {
    return $this->hasMany('suvinando\User');
  }

}
