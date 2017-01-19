<?php

namespace suvinando;

use Illuminate\Database\Eloquent\Model;

class Family extends Model {

  public function invoices() {
    return $this->hasMany('suvinando\Invoice');
  }

  public function users() {
    return $this->hasMany('suvinando\User');
  }

}
