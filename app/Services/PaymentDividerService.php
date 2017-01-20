<?php

namespace suvinando\Services;
use Illuminate\Support\Facades\Log;
use suvinando\Payment;

class PaymentDividerService {

  public function divide($invoice) {
    $invoice->amount = 0;
    foreach ($invoice->transactions as $tx) {
      $invoice->amount += $tx->amount;
    }

    $vlrUnit = $invoice->amount / sizeof($invoice->family->users);
    foreach ($invoice->payments as $payment) {
      $payment->amount = $vlrUnit;
    }
  }

}
