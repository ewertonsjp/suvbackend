<?php

namespace suvinando;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model {

    public function transactions() {
      return $this->hasMany('suvinando\Transaction');
    }

    public function payments() {
      return $this->hasMany('suvinando\Payment');
    }

}
