<?php

namespace suvinando;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Invoice extends Model {

    /**
    * Método responsável por recalcular os valores de uma fatura.
    */
    public function recalculate() {
      $this->amount = 0;
      foreach ($this->transactions as $tx) {
        $this->amount += $tx->amount;
      }
      $this->save();
    }

    public function transactions() {
      return $this->hasMany('suvinando\Transaction');
    }

    public function payments() {
      return $this->hasMany('suvinando\Payment');
    }

}
