<?php

namespace suvinando;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Invoice extends Model {

    public function transactions() {
      return $this->hasMany('suvinando\Transaction');
    }

    public function payments() {
      return $this->hasMany('suvinando\Payment');
    }

    public function family() {
      return $this->belongsTo('suvinando\Family');
    }

}
