<?php

namespace suvinando;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model {

    public function user() {
      return $this->belongsTo('suvinando\User');
    }

    public function invoice() {
      return $this->belongsTo('suvinando\Invoice');
    }

}
